<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'auth', 'namespace' => 'App\Api\V1\Modules\Authentication\Registration\Http\Controllers'], function($api){
        $api->post('register-student', 'RegistrationController@registerStudent');
    });
});