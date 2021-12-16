<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('getUser/{id}', 'Api\MessageController@getUser')->name('api.get-user');
Route::get('getChatList/{to}', 'Api\MessageController@getChatLists')->name('api.get-chat-list');
Route::get( 'getMessage/{from}/{to}', 'Api\MessageController@getMessage')->name('api.get-message-from');
// Route::get('getMessageFrom/{from}', 'Api\MessageController@getMessage')->name('api.get-message-from');
Route::post('sendMessage', 'Api\MessageController@sendMessage')->name('api.send-message');
