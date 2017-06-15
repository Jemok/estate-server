<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['middleware' => ['api.auth'], 'prefix' => 'accounts', 'namespace' => 'App\Api\V1\Modules\Account\Http\Controllers'], function($api){
        $api->post('profiles', 'ProfileController@store');

        $api->put('profiles', 'ProfileController@update');
    });
});