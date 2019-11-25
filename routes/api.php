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
Route::post('/refresh', 'PassportController@refresh');
Route::post('/logout', 'PassportController@logout');

// 授權後才可訪問的測試頁面
Route::get('/page', function(){
   return 'ok';
})->middleware('auth'); // 授權全部範圍

// Scope用法:透過中間件授權
Route::get('/page1', function(){
   return 'ok';
// })->middleware('auth'); // 授權全部範圍
// })->middleware('scopes:test1'); // 授權範圍 test1
// })->middleware('scopes:test2'); // 授權範圍 test2
// })->middleware('scopes:test1, test2'); // 必須授權 test1 和 test2
})->middleware('scope:test1, test2'); // 授權範圍 test1 或 test2


// Scope用法:非透過中間件方式
Route::get('/page2', function(){
    if(auth()->user()->tokenCan('test2')) {
        return '授權 通過';
    } else {
        return '授權 失敗';
    }
})->middleware('auth');

// 其他操作方式
Route::get('/page3', function(){
//    return laravel\Passport\Passport::scopeIds(); // 回傳scope值 ['test1', 'test2']
//    return laravel\Passport\Passport::scopes(); // 回傳scope資料 [{ "id": "test1", "description": "for test1" }, { "id": "test2", "description": "for test2"}]
//    return laravel\Passport\Passport::scopesFor(['test1']); // 回傳指定(可多筆)scope資料 [{ "id": "test1", "description": "for test1" }]
dd(laravel\Passport\Passport::hasScope('test2')); // 是否有此scope值:true / false , 因laravel無法返回布林值,故改以dd輸出

})->middleware('auth');
