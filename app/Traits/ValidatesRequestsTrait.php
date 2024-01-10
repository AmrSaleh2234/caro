<?php
namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

trait ValidatesRequestsTrait
{
    use ApiResponseTrait;
    public function validateRequest(Request $request, array $rules,$default = false)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if($default == true){
                return $this->defaultValidationError($validator->errors());
            }else{
                return $this->validationError($validator->errors());
            }
        }
    }

    protected function validationError($errors)
    {
        return $this->validationErrorResponse($errors);
    }

    protected function defaultValidationError($errors)
    {
        return $this->defaultValidationErrorResponse($errors);
    }
}
