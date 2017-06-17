<?php
/**
 * LoginTrait Class
 * Handles user authentication
 */

namespace App\Api\V1\Modules\Authentication\Login\Traits;

use App\Api\V1\Modules\Authentication\Login\Transformers\LoginTransformer;
use App\Api\V1\Modules\Authorization\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

trait LoginTrait
{
    /**
     * Authenticates a user from the credentials passed to this method
     * @param array $authenticationData
     * @param LoginTransformer $loginTransformer
     * @return array
     */
    public function authenticate(array $authenticationData, LoginTransformer $loginTransformer){

        // We try to authenticate the user, if the authentication fails, we catch an authentication Exception
        try {
            // We attempt to authenticate the user with the credential passed,
            // If authentication fails, we throw a 401 unauthenticated response with an error message
            if (!$token = JWTAuth::attempt($authenticationData)) {
                return $this->response->array(['Invalid credentials, please try again'])->setStatusCode(401);
            }
        } catch (JWTException $e) {
            return $this->response->array(['An error occurred, we are working hard to fix it, please try again later'])->setStatusCode(500);
        }

        // We create an array of authenticationData
        // and pass the array items 1. token
        $authenticationData = [
            'token'           => $token,
            'name'            => Auth::user()->name,
            'email'           => Auth::user()->email
        ];

        // We transform an authentication response
        return $loginTransformer->transform($authenticationData);
    }
}