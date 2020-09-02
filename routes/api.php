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

Route::post('/login','Api\loginController@login');

// Route::middleware('auth:api')->get('/userslist','Api\loginController@index');

Route::group(['prefix' => 'auth',  'middleware' => 'auth:api'], function()
{
    Route::get('/userslist', 'Api\loginController@index');
    Route::get('/logout', 'Api\loginController@logout');
});
