<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Contact;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactCollection;

class ContactController extends ApiHomeController
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
        $rules = [
            'phone' => 'nullable',
            'title' => 'required|string',
            'content' => 'required|string',
        ];

        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $user = $this->authUser();
        $input['user_id'] =$user->id;
        if(!isset($input['phone']) || (isset($input['phone']) && $input['phone'] == "")){
            $input['phone'] =$user->phone;
        }
        $input['is_read'] = 0;
        $contact = Contact::create($input);
        $data = ['contact' => new ContactResource($contact)];
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
        $contact = Contact::where('id', $id)->where('user_id', $this->authUserID())->with('user')->first();
        $data = ['contact' => new ContactResource($contact)];
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
        $contact = Contact::find($id);
        if (!empty($contact) && $contact->user_id == $this->authUserID()) {
            return $this->successResponse();
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
        $contact = Contact::find($id);
        if (!empty($contact) && $contact->user_id == $this->authUserID()) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
