<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Coupon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\CouponResource;
use App\Http\Resources\CouponCollection;

class CouponController extends ApiHomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware(['auth:sanctum','check.client'], ['only' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = $this->checkCouponCode($request);
        if ($save['status'] == $this->errorStatus) {
            if ($save['message'] == "validation_error") {
                return $this->validationErrorResponse($save['errors']);
            }
            return $this->errorResponse($save['message']);
        } else if ($save['status'] == $this->successStatus) {
            return $this->successResponse($save['data'],$save['message']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::where('id', $id)->where('user_id', $this->authUserID())->with('user')->first();
        $data = ['coupon' => new CouponResource($coupon)];
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
        $coupon = Coupon::find($id);
        if (!empty($coupon) && $coupon->user_id == $this->authUserID()) {
            $rules = [
                'coupon' => 'required|string',
                'type' => 'required|string',
                // 'region_id' => 'required|integer|exists:regions,id',
                // 'city_id' => 'required|integer|exists:cities,id',
                'latitude' => 'required|string',
                'longitude' => 'required|string',
                'geo_coupon' => 'nullable|string',
                'geo_state' => 'nullable|string',
                'geo_city' => 'nullable|string',
                'place_id' => 'nullable|string',
                'postcode' => 'nullable|string',
            ];


            $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input = Arr::except($input, array('user_id','region_id','city_id'));
            $coupon->update($input);
            $data = ['coupon' => new CouponResource($coupon)];
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
        $coupon = Coupon::find($id);
        $user = $this->authUser();
        if (!empty($coupon) && $coupon->user_id == $this->authUserID() && $coupon->id != $user->coupon_id) {
            $coupon->delete();
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
