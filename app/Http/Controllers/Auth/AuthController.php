<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\SiteController;

use Auth;
use Socialite;
use Illuminate\Support\Facades\DB ;
use App\Models\Device ;
use App\Models\User;
// use App\Models\City;
// use App\Models\UserMeta;
// use App\Models\Order ;
// use App\Models\Item ;
// use App\Models\Cart;
// use App\Models\CartItem ;
use Illuminate\Http\Request;
use Carbon\Carbon ;
use Hash;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AuthController extends SiteController
{

    protected $redirectTo = '/home' ;
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect() ;
    }


    public function handleProviderCallback($provider)
    {
        if( $provider == 'twitter' ) {
            $user = Socialite::driver($provider)->user();
        }else{
            $user = Socialite::driver($provider)->stateless()->user();
        }
        $token = $user->token;

        if( !$token ){
            return response()->json(['status'=>$this->error,'user'=>null,'message'=>__('Unauthorise')], $this->errorStatus);
        }

        $secret = '' ;
        if( isset($user->tokenSecret)){
            $secret = $user->tokenSecret ;
        }

        if( $provider == 'twitter' and $secret != '' ) {
            $user = Socialite::driver($provider)->userFromTokenAndSecret( $token , $secret ) ;
        }else{
            $user = Socialite::driver($provider)->userFromToken( $token ) ;
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser) {
            // if ($authUser->active == 1 && $authUser->type == 'client' && $authUser->deleted_at == null) {
                $authUser->addresses;
                $tokenResult = $authUser->createToken('Personal Access Token');
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addMonths(6);
                $token->save();
                return response()->json([
                'access_token' => $tokenResult->accessToken,'token_type' => 'Bearer','status' => $this->success,
                'notifications'=>$this->unreadNotifications($authUser->id),'cart_count'=>$this->cartCount($authUser->id),
                'user' => $authUser ,'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ], $this->successStatus);
            // } else {
            //     return response()->json(['status' => $this->error, 'message' => __('Account Suspended')], $this->errorStatus);
            // }
        }else{
                return response()->json(['status'=>$this->error,'message'=>__('Unauthorise')], $this->errorStatus);
            }

    }

    public function tokenLogin($provider, Request $request)
    {

        $input = $request->all();
        $token = $input['token'] ;
        if( !$token){
            return response()->json(['status'=>$this->error,'user'=>null,'message'=>__('Unauthorise')], $this->errorStatus);
        }
        $secret = isset($input['secret']) ? $input['secret'] : '';
        $firebase_token = isset($input['firebasetoken']) ? $input['firebasetoken'] : NULL;
        $imei = isset($input['imie']) ? $input['imie'] : NULL;
        $device_type = isset($input['device_type']) ? $input['device_type'] : NULL;
        // if( isset($user->tokenSecret)){//  $secret = $user->tokenSecret ;// }// $token = $user->token;// if( isset($input['secret']) ){//     $secret = $input['secret'] ;// }
        if( $provider == 'twitter' and $secret != '' ) {
            $user = Socialite::driver($provider)->userFromTokenAndSecret( $token , $secret ) ;
        }else{
            $user = Socialite::driver($provider)->userFromToken( $token ) ;
        }
        $authUser = $this->findOrCreateUser($user, $provider,$imei,$firebase_token,$device_type);
        if($authUser){
            // if ($authUser->active == 1 && $authUser->type == 'client' && $authUser->deleted_at == NULL) {
            $authUser->addresses;
            $tokenResult = $authUser->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addMonths(6);
            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,'token_type' => 'Bearer','status' => $this->success,
                'notifications'=>$this->unreadNotifications($authUser->id),'cart_count'=>$this->cartCount($authUser->id),
                'user' => $authUser ,'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ],$this->successStatus);
            // }else{
            // return response()->json(['status' => $this->error, 'message' => __('Account Suspended')], $this->errorStatus);
            // }
            }else{
                return response()->json(['status'=>$this->error,'message'=>__('Unauthorise')], $this->errorStatus);
            }
    }

    public function findOrCreateUser( $user , $provider,$imei=NULL,$firebase_token=NULL,$device_type=NULL)
    {

        //$token = $user->token;//$tokenSecret = $user->tokenSecret;// $username  = $user->getNickname();
        $id = $user->getId();
        $name  = $user->getName();
        $email = $user->getEmail();
        $image = $user->getAvatar();
        $authUser = User::withTrashed()->where('provider_id', $id )->where('provider', $provider)->where('type' , 'client' )->orWhere('email',$email)->where('type' , 'client')->first();
        if ($device_type != "android" && $device_type != NULL) {
            $device_type = "apple";
        }

        if ($authUser) {
            $authUser->update([
                'name'     => $name,
                'email'    => $email,
                'image'    => $image,
                'type'     => 'client',
                'provider' => $provider,
                'provider_id' => $id,
            ]);
            if ($device_type != null) {
                $authUser->update([
                'device_type'     => $device_type,
            ]);
            }
        }else{
            $authUser = User::create([
            'name'     => $name,
            'email'    => $email,
            'image'    => $image,
            'device_type' => $device_type,
            'provider' => $provider,
            'provider_id' => $id,
            'type' => 'client',
            'active' => 1,
            'password' => Hash::make($id),
            'wallet' => 0,
            'active' => 1,
            'locale' => "ar",
            'city_id' => NULL,
            'country_id' =>  $this->country_id,
            'deleted_at' => NULL,
        ]);
            $authUser->attachRole($this->client_id);
        }
        if($imei != NUll && $firebase_token != NUll){
        Device::updateDevice($authUser->id,$imei,$firebase_token);
        }
        return $authUser ;
    }

    public function googleLogin(Request $request)
    {
        $input = $request->all();
        $id = isset($input['id']) ? $input['id'] : NULL;
        $name = isset($input['name']) ? $input['name'] : NULL;
        $email = isset($input['email']) ? $input['email'] : NULL;
        $image = isset($input['image']) ? $input['image'] : NULL;
        $token = isset($input['token']) ? $input['token'] : NULL;
        $imei = isset($input['imei']) ? $input['imei'] : NULL;
        $device_type = isset($input['device_type']) ? $input['device_type'] : NULL;
        if ($device_type != "android" && $device_type != NULL) {
            $device_type = "apple";
        }
        $provider ="google";
        if($id != NULL && $name != NULL && $email != NULL  && $token != NULL &&  $imei != NULL  ){
            $authUser = User::withTrashed()->where( 'provider_id', $id )->where('provider', $provider)->where('type' , 'client' )->orWhere('email',$email)->first();
            if ($authUser) {
                $authUser->update([
                    'name'     => $name,
                    'email'    => $email,
                    'image'    => $image,
                    'type'     => 'client',
                    'provider' => $provider,
                    'provider_id' => $id,
                ]);
                if ($device_type != null) {
                    $authUser->update([
                    'device_type'     => $device_type,
                ]);
                }
            }else{
                $authUser = User::create([
                'name'     => $name,
                'email'    => $email,
                'image'    => $image,
                'device_type' => $device_type,
                'provider' => $provider,
                'provider_id' => $id,
                'type' => 'client',
                'active' => 1,
                'password' => Hash::make($id),
                'wallet' => 0,
                'active' => 1,
                'locale' => "ar",
                'city_id'       => NULL,
                'country_id'    =>  $this->country_id,
                'deleted_at'    => NULL,
            ]);
                $authUser->attachRole($this->client_id);
            }
            Device::updateDevice($authUser->id,$imei,$token);
            return $this->token($authUser);
        }else{
            return response()->json(['status'=>$this->error,'message'=>__('Unauthorise')], $this->errorStatus);
        }

    }

    public function token($authUser){
        if($authUser){
            // if ($authUser->active == 1 && $authUser->type == 'client' && $authUser->deleted_at == NULL) {
                $authUser->addresses;
                $tokenResult = $authUser->createToken('Personal Access Token');
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addMonths(6);
                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'status' => $this->success,
                    'notifications'=>$this->unreadNotifications($authUser->id),'cart_count'=>$this->cartCount($authUser->id),
                    'user' => $authUser ,'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ],$this->successStatus);
                // }else{
                // return response()->json(['status' => $this->error, 'message' => __('Account Suspended')], $this->errorStatus);
                // }
                }else{
                    return response()->json(['status'=>$this->error,'message'=>__('Unauthorise')], $this->errorStatus);
                }

    }
}
