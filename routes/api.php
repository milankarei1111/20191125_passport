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

// 安裝laravel/作用:發送令牌
Route::post('/oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

Route::post('/register', 'PassportController@register');
Route::post('/login', 'PassportController@login');
Route::post('/logout', 'PassportController@logout');
Route::post('/refresh', 'PassportController@refresh');

// 授權後才可訪問的測試頁面
Route::get('/test', function(){
        return 'ok';
})->middleware('auth');
