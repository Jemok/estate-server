<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'mining', 'namespace' => 'App\Api\V1\Modules\DataMining\Http\Controllers'], function($api){
        $api->post('search', 'DataMiningController@search');
    });
});