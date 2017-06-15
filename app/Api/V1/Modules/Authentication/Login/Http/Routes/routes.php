<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'auth', 'namespace' => 'App\Api\V1\Modules\Authentication\Login\Http\Controllers'], function($api){
        /**
         * Account Authentication Api Definition
         * POST /auth/login {{ Endpoint for user authentication }}
         *** PAYLOAD :
        {
        "Registration Number"         : "BIT-001-0745/2013",  // registration_number, required, string
        "password"      : "password", // required // string
        }
         *** RESPONSE :
        {
        "token" : "jwt token"
        }
         */
        $api->post('login', 'LoginController@Login');
    });
});