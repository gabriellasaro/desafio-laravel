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

Route::middleware('api')->get('/users/{id}', 'UsersController@getUser')->where('id', '[0-9]+');

Route::middleware('api')->post('/users', 'UsersController@create');

Route::middleware('api')->get('/collections', 'CollectionsController@getAll');

Route::middleware('api')->post('/collections', 'CollectionsController@create');

Route::middleware('api')->put('/collections/{id}', 'CollectionsController@update')->where('id', '[0-9]+');

Route::middleware('api')->delete('/collections/{id}', 'CollectionsController@delete')->where('id', '[0-9]+');