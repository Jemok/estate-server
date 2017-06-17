<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/18/17
 * Time: 10:57 AM
 */

namespace App\Api\V1\Modules\Authentication\Login\Http\Validators;

use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Validator;


class LoginValidator
{
    // The Dingo Api Routing Helper class
    use Helpers;

    // The rules used during authenticationData validation
    private $rules = [
      'email'  => 'required',
      'password'            => 'required'
    ];

    public function validate(array $loginData){

        // We make the validation rules, match the loginData to the validation rules
        $validator = Validator::make($loginData, $this->rules);

        // If validation fails,
        // we return the error messages
        if($validator->fails()){
            // Return an array of the error messages with a status code 422
            return $this->response->array($validator->errors()->all())->setStatusCode(422);
        }

        // If validation passes,
        // we return a false 'no' that validation did not fail
        return false;
    }
}