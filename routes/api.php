<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['prefix' => 'mining', 'namespace' => 'App\Api\V1\Modules\DataMining\Http\Controllers'], function($api){
        $api->post('search', 'DataMiningController@search');
    });

    $api->group(['prefix' => 'properties', 'namespace' => 'App\Api\V1\Modules\Property\Http\Controllers'], function($api){
        $api->post('/', 'PropertyController@index');
        $api->post('/add', 'PropertyController@store');
        $api->post('/show', 'PropertyController@show');
        $api->post('/update', 'PropertyController@update');
        $api->post('/delete', 'PropertyController@delete');
        $api->post('/image', 'PropertyController@image');

    });

    $api->group(['prefix' => 'auth', 'namespace' => 'App\Api\V1\Modules\Authentication\Login\Http\Controllers'], function($api){
        $api->post('login', 'LoginController@Login');
    });
});
