<?php

/**
 * MemberRegistrationValidator Class
 * This class validates Member Registration Data
 */

namespace App\Api\V1\Modules\Authentication\Registration\Http\Validators;

use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Validator;

class MemberRegistrationValidator
{
    // The Dingo API Routing Helpers trait
    use Helpers;

    // The rules that will be used during validation
    private $rules = [
        'password'            => 'required|min:8'
    ];

    /**
     * Validates incoming Member registration data
     * @param array $memberData
     * @return bool
     */
    public function validate(array $memberData){

        // We make a validator, pass memberData, and the validaton rules
        $validator = Validator::make($memberData, $this->rules);

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