<?php

namespace App\Api\V1\Modules\Authentication\Login\Http\Controllers;

use App\Api\V1\Modules\Authentication\Login\Http\Validators\LoginValidator;
use App\Api\V1\Modules\Authentication\Login\Traits\LoginTrait;
use App\Api\V1\Modules\Authentication\Login\Transformers\LoginTransformer;
use App\Api\V1\Modules\Authorization\Repositories\RoleRepository;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // The Dingo Api Routing Package
    use Helpers;
    // The Login Trait
    use LoginTrait;

    public function login(Request $request, LoginValidator $loginValidator){

        // We validate the incoming user input and assign the returned response
        // to the $validation_response variable
        $validation_response = $loginValidator->validate($request->all());

        // If the validation did not pass
        // We return the validation response
        // which contains an array of the error messages
        if($validation_response != false){
            return $validation_response;
        }

        // We authenticate the user and return a response
        return $this->authenticate(['email' => $request->email, 'password' => $request->password], new LoginTransformer());
    }
}
