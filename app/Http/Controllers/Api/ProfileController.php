<?php

namespace App\Http\Controllers\Api;

use DB;
use Hash;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Rate;
use App\Models\Address;
use App\Models\Favorite;
use App\Models\OrderItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\CityCollection;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;

class ProfileController extends ApiHomeController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('check.store', ['only' => ['changeBranch']]);
        $this->middleware('check.delivery', ['only' => ['changeLocation']]);
        $this->middleware('check.not.client', ['only' => ['changeAvailable']]);
        $this->middleware('check.client', ['only' => ['delete','changeAddress']]);
    }
    public function index(Request $request)
    {
        return $this->show($this->authUserID());
    }

    public function store()
    {
        return $this->successResponse();
    }
    public function show($id)
    {
        $country_id = 1;
        $cities  = City::active()->defaultOrder()->where('country_id',$country_id)->get();
        $data = ['user' => new UserResource($this->authUser()),'cities'=>new CityCollection($cities)];
        $data += $this->getSettingApi();
        return $this->successResponse($data);
    }

    public function update(Request $request)
    {
        //'birth_date','gender'
        $user = $this->authUser();
        $rules =  [
            'name_first'   => 'required|string',
            'name_last'   => 'required|string',
            'gender' => 'nullable|string|in:male,female',
            'birth_date' => 'nullable|date|date_format:Y-m-d|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d'),
            'address_id' => 'nullable|integer|exists:addresses,id',
            'city_id' => 'nullable|integer|exists:cities,id',
        ];

        if ($user->type == "client") {
            $rules +=  [
                'email' => "nullable|max:255|email|string|uniqueUserClientEmailUpdate:$user->id",
            ];
        } else {
            $rules +=  [
                'email' => "nullable|max:255|email|string|uniqueUserEmailUpdate:$user->id",
            ];
        }

        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            if ($input[$key] == "") {
                $input[$key] = NULL;
            }
        }

        if (isset($input['address_id']) && (int) $input['address_id'] > 0) {
            $input['address_id']  = (int) $input['address_id'];
        } else {
            $input['address_id'] = $user->address_id;
        }

        $input = Arr::except($input, array('phone','last_active','locale','all_branch','branch_id','group_id',
        'ode','code_expire' ,'sms_code' ,'sms_code_expire','type','image','country_id',
        'wallet','point','password','active','password','is_admin','is_message','is_delivery','is_client'));
        $input['user_name'] = $input['name_first']. " " .$input['name_last'];
        $input['name'] = $input['user_name'];
        $user->update($input);
        $data = ['user' => new UserResource($this->authUser())];
        return $this->successResponse($data);
    }

    public function delete()
    {
        $user = $this->authUser();
        return $this->destroy($user->id);
    }

    public function destroy($id)
    {
        $user = $this->authUser();
        if (in_array($id,$this->access_all_id) || in_array($user->id,$this->access_all_id)) {
            return $this->errorResponse();
        }
        $user->delete();
        return $this->successResponse();
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'password_old' => 'required|min:8',
            'password' => 'required|min:8|same:confirm_password|different:password_old',
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
        if (!Hash::check($input['password_old'], $user->password)) {
            $message =$this->getMessageError("password_old");
            return $this->errorResponse($message);
        } else {
            $password = Hash::make($input['password']);
            $data = $user->update(['password' => $password]);
            if ($data) {
                $message =$this->getMessageSuccess("password");
                return $this->successResponse(null,$message);
            } else {
                $message =$this->getMessageError("password");
                return $this->errorResponse($message);
            }
        }
    }

    public function changeLang(Request $request)
    {

        $rules = [
            'locale' => 'required|in:ar,en',
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        if (!in_array($input['locale'], $this->lang_array)) {
            $input['locale'] = "en";
        }
        $user = $this->authUser();
        $data = $user->update(['locale' => $input['locale']]);
        if ($data) {
            $message =$this->getMessageSuccess("locale");
            return $this->successResponse(null,$message);
        } else {
            $message =$this->getMessageError("locale");
            return $this->errorResponse($message);
        }
    }

    public function changeAvailable(Request $request)
    {
        $rules = [
            'is_available' => 'required|in:0,1',
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
        $data = $user->update(['is_available' => $input['is_available']]);
        if ($data) {
            $message =$this->getMessageSuccess('available');
            return $this->successResponse(null,$message);
        } else {
            $message =$this->getMessageError();
            return $this->errorResponse($message);
        }
    }
    public function changeAddress(Request $request)
    {

        $rules = [
            'address_id' => 'required|integer|exists:addresses,id',
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
        $address = Address::find($input['address_id']);
        $message =$this->getMessageError("address");
        if((int) $address->user_id != (int) $user->id){
            return $this->errorResponse($message);
        }
        $data = $user->update(['address_id' => $input['address_id']]);
        if ($data) {
            $message =$this->getMessageSuccess("address");
            return $this->successResponse(null,$message);
        } else {
            return $this->errorResponse($message);
        }
    }

    public function changeImage(Request $request)
    {
        $rules =  [
            'image' => 'required|mimes:jpeg,jpg,png,gif,svg|max:4096',
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $message =$this->getMessageError("image");
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = $this->uploadImage($image, 'profiles');
            $user = $this->authUser();
            $data = $user->update(['image' => $input['image']]);
            if ($data) {
                $message =$this->getMessageSuccess("image");
                return $this->successResponse(null,$message);
            } else {
                return $this->errorResponse($message);
            }
        } else {
            return $this->errorResponse($message);
        }
    }

    public function changeLocation(Request $request)
    {

        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
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
        $data = $user->update(['latitude' => $input['latitude'],'longitude' => $input['longitude']]);
        if ($data) {
            $message =$this->getMessageSuccess('location');
            return $this->successResponse(null,$message);
        } else {
            $message =$this->getMessageError();
            return $this->errorResponse($message);
        }
    }

}
