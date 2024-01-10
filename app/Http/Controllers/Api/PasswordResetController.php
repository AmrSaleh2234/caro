<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;

class PasswordResetController extends ApiHomeController
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {

        $rules =  [
            'email' => 'required|string',
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $user = User::where($field, $request->email)->first(); //whereNull('provider')->
        if (!$user) {
            $message =$this->getMessageError($field);
            return $this->errorResponse($message);
        }
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => str_random(60)
            ]
        );
        $code = NULL;
        if ($user && $passwordReset) {
            if ($field == "phone") {
                $code = $passwordReset->token;
            } else {
                $user->notify(new PasswordResetRequest($passwordReset->token));
            }
        }
        $data = ['code' => $code, 'message' =>  __('We have e-mailed your password reset link!')];
        return $this->successResponse($data);
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset) {
            $message =$this->getMessageError("token");
            return $this->errorResponse($message);
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(60)->isPast()) {
            $passwordReset->delete();
            $message =$this->getMessageError("token");
            return $this->errorResponse($message);
        }
        return $this->successResponse($token);
    }
    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */

    public function reset(Request $request)
    {
        $rules =  [
            'email' => 'required|string',
            'password' => 'required|string|min:8|same:confirm_password',
            'token' => 'required|string'
        ];
        $validateRequest = $this->validateRequest($request, $rules);
        if(isset($validateRequest)){
            return $validateRequest;
        }
        $passwordReset = PasswordReset::where([['token', $request->token], ['email', $request->email]])->first();
        if (!$passwordReset) {
            $message =$this->getMessageError("token");
            return $this->errorResponse($message);
        }
        $field = filter_var($passwordReset->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $user = User::where($field, $passwordReset->email)->first(); //whereNull('provider')->

        if (!$user) {
            $message =$this->getMessageError($field);
            return $this->errorResponse($message);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        if ($field == "email") {
            $user->notify(new PasswordResetSuccess());
        }
        $passwordReset->delete();
        return $this->collectionResponse(new UserCollection($user));
    }
}
