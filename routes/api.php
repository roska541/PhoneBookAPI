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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('contacts', 'ContactController');
Route::get('/search', 'ContactController@search');
Route::get('/contacts/call_logs/{contact_id}', 'CallLogController@show');

Route::fallback(function () {
    return response()->json(['message' => 'Endpoint Not Found!'], 404);
});
