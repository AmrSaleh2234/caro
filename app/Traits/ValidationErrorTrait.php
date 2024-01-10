<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ValidationErrorTrait{

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => '0',
            'message' => $validator->errors()->first(),
            'errors' =>  $validator->errors()->messages(),
        ]));
    }
}
