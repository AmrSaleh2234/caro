<?php
namespace App\Http\Controllers\Api;

use Hash;
use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Device;
use App\Models\Region;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Http\Request;
// use App\Models\UserMeta;
// use App\Models\Order;
// use App\Models\CartItem;
// use App\Models\Cart;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CityCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\CountryResource;
use App\Http\Resources\RegionCollection;
use App\Http\Resources\CountryCollection;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiHomeController
{
    protected $login_rules = [
        'phone'     => 'required|string',
        'password' => 'required|string|min:8',
        'imei' => 'required|string',
        'token' => 'required|string',
        'device_type' => 'required|string|in:android,huawei,apple',
        'type' => 'nullable|string|in:client,delivery,store',
    ];
    protected $register_rules;

    public function __construct()
    {
        parent::__construct();
        $this->register_rules = array_merge($this->login_rules, [
            'name_first' => 'required|max:255',
            'name_last' => 'required|max:255',
            'phone' => 'required|max:50|regex:/^01[0-2,5][0-9]{8}/|uniqueUserClientPhone',
            'email' => 'nullable|max:255|email|uniqueUserClientEmail',
            'password' => 'required|string|min:8|same:confirm_password',
            'city_id' => 'nullable|integer|exists:cities,id',

        ]);
    }
    public function country(Request $request)
    {
        $input  = $request->all();
        $country_id    = isset($input['country_id']) ? (int) $input['country_id'] : 1;
        $country    = Country::with('currency')->where('id',$country_id)->first();
        $countries  = Country::active()->defaultOrder()->get();
        $cities  = City::active()->defaultOrder()->where('country_id',$country_id)->get();
        $data = ['country' => new CountryResource($country),'cities'=>new CityCollection($cities)];
        return $this->collectionResponse(new CountryCollection($countries),$data,null,false);
    }

    public function city(Request $request)
    {
        $city_id =0;
        $rules =  [
            'city_id' => 'required|integer|exists:cities,id',
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            if ($$key == "") {
                $input[$key] = NULL;
            }
        }
        $regions  = Region::active()->defaultOrder()->where('city_id',$city_id)->get();
        return $this->collectionResponse(new RegionCollection($regions),null,null,false);
    }


    public function register(Request $request)
    {
        $phone = $device_type = $email = $password = $imei = $token = null ;
        $validateRequest = $this->validateRequest($request, $this->register_rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            if ($$key == "") {
                $input[$key] = NULL;
            }
        }
        if (!isset($email) || $email == "") {
            $email = NULL;
        }
        if (!isset($city_id) || $city_id == "") {
            $city_id = NULL;
        }
        $input['name'] = $input['user_name'] = $input['name_first']. " " .$input['name_last'];
        // $input['provider'] = $input['provider_id'] = NULL;
        $input['phone'] = $phone;
        $input['email'] = $email;
        $input['$city_id'] = $city_id;
        $input['country_id'] = 1;
        $input['email_verified_at'] = new Carbon();
        if (!in_array($device_type,$this->device_type_array)) {
            $device_type = "android";
        }
        $input['device_type'] = $device_type;
        $input['password'] = Hash::make($password);
        $input['active'] = $input['is_client'] = 1;
        $input['type'] = "client";
        $credentials['active'] = $credentials['is_client'] = 1;
        $credentials['type'] = "client";
        $credentials['password'] = $password;
        $credentials['phone'] = $phone;
        User::create($input);
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            Device::updateDevice($user->id, $imei, $token, $device_type);
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = ['access_token' => $token,'token_type' => 'Bearer'];
            return $this->resourceResponse(new UserResource($user),$data);
        } else {
            $message = $this->getMessageError("unauthorise");
            return $this->errorResponse($message);
        }
    }

    public function checkUser(Request $request)
    {
        $rules = [
            'phone' => 'nullable|regex:/^01[0-2,5][0-9]{8}/|required_without:email|max:50|uniqueUserClientPhone',
            'email' => 'nullable|required_without:phone|max:255|email|uniqueUserClientEmail',
        ];
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        return $this->successResponse();
    }

    public function login(Request $request)
    {
        $type = $phone = $device_type = $password = $imei = $token = null ;
        $validateRequest = $this->validateRequest($request, $this->login_rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        if (!in_array($device_type,$this->device_type_array)) {
            $device_type = "android";
        }
        $credentials['active'] = 1;
        // $credentials['type'] = "client";
        $credentials['password'] = $password;
        $credentials['phone'] = $phone;
        if(isset($type) && $type == "delivery"){
            $credentials['is_delivery'] = 1;
        }elseif(isset($type) && $type == "store"){
            $credentials['is_store'] = 1;
        }else{
            $credentials['is_client'] = 1;
        }
        // $credentials['provider'] = $credentials['provider_id'] = NULL;
        if (Auth::attempt($credentials)) {
            $user = $request->user();
            Device::updateDevice($user->id, $imei, $token, $device_type);
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = ['access_token' => $token,'token_type' => 'Bearer'];
            return $this->resourceResponse(new UserResource($user),$data);
        } else {
            $message = $this->getMessageError("unauthorise");
            return $this->errorResponse($message);
        }
    }

    public function logout(Request $request)
    {
        $imei = null;
        $rules = [
            'imei' => 'required|string',
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $user = $this->authUser();
        $user->devices()->where('imei', $imei)->delete();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return $this->successResponse();
    }

}

