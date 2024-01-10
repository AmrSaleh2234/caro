<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;

class AddressController extends ApiHomeController
{
    protected $rules = [
        'address' => 'required|string',
        'type' => 'required|string',
        // 'region_id' => 'required|integer|exists:regions,id',
        // 'city_id' => 'required|integer|exists:cities,id',
        'latitude' => 'required|string',
        'longitude' => 'required|string',
        'geo_address' => 'nullable|string',
        'geo_state' => 'nullable|string',
        'geo_city' => 'nullable|string',
        'place_id' => 'nullable|string',
        'postcode' => 'nullable|string',
        'building' => 'nullable|string',
        'floor' => 'nullable|string',
        'apartment' => 'nullable|string',
        'additional_info' => 'nullable|string',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $addresses = Address::where('user_id', $this->authUserID())->paginate($this->limit);
            return $this->collectionResponse(new AddressCollection($addresses));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateRequest = $this->validateRequest($request, $this->rules);
        if (isset($validateRequest)) {
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $user = $this->authUser();
        $input['user_id'] = $user->id;
        $address = Address::create($input);
        if ((int) $user->address_id == 0) {
            $user->update(['address_id' => $address->id]);
        }
        $data = ['address' => new AddressResource($address)];
        return $this->successResponse($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::where('id', $id)->where('user_id', $this->authUserID())->first();
        $data = ['address' => new AddressResource($address)];
        return $this->successResponse($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        if (!empty($address) && $address->user_id == $this->authUserID()) {
            $validateRequest = $this->validateRequest($request, $this->rules);
            if (isset($validateRequest)) {
                return $validateRequest;
            }
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input = Arr::except($input, array('user_id', 'region_id', 'city_id'));
            $address->update($input);
            $data = ['address' => new AddressResource($address)];
            return $this->successResponse($data);
        } else {
            return $this->errorResponse();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $user = $this->authUser();
        if (!empty($address)) {
            if($address->user_id == $this->authUserID() && $address->id == $user->address_id){
                $message =$this->getMessageError("address_delete");
                return $this->errorResponse($message);
            }
            $address->delete();
            return $this->successResponse();
        } else {
            $message =$this->getMessageError("address_not_found");
            return $this->errorResponse($message);
        }
    }
}
