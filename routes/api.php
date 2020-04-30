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

// Usuários/Facção

Route::middleware('api')->get('/users', 'UsersController@getAll');

Route::middleware('api')->get('/users/{id}', 'UsersController@getUser')->where('id', '[0-9]+');

Route::middleware('api')->post('/users', 'UsersController@create');

Route::middleware('checkToken:api')->get('/users/{id}/tasks', 'UsersController@getTask')->where('id', '[0-9]+'); // Precisa estar autenticado

Route::middleware('checkToken:api')->get('/users/{userID}/collections/{collectionID}/processes', 'UsersController@getProcesses')
->where(['userID' => '[0-9]+', 'collectionID' => '[0-9]+']); // Precisa estar autenticado

// Coleções

Route::middleware('api')->get('/collections', 'CollectionsController@getAll');

Route::middleware('api')->post('/collections', 'CollectionsController@create');

Route::middleware('api')->put('/collections/{id}', 'CollectionsController@update')->where('id', '[0-9]+');

Route::middleware('api')->delete('/collections/{id}', 'CollectionsController@delete')->where('id', '[0-9]+');

Route::middleware('checkToken:api')->get('/collections/production', 'CollectionsController@production'); // Precisa estar autenticado

// Modelos

Route::middleware('api')->get('/collections/{collectionID}/models', 'ModelsController@getAll')->where('collectionID', '[0-9]+');

Route::middleware('api')->post('/collections/{collectionID}/models', 'ModelsController@create')->where('collectionID', '[0-9]+');

Route::middleware('api')->put('/models/{id}', 'ModelsController@update')->where('id', '[0-9]+');

Route::middleware('api')->delete('/models/{id}', 'ModelsController@delete')->where('id', '[0-9]+');

// Tarefas

Route::middleware('api')->get('/tasks', 'TasksController@getAll');

Route::middleware('api')->post('/tasks', 'TasksController@create');

Route::middleware('api')->get('/tasks/{id}/users', 'TasksController@getUsers')->where('id', '[0-9]+');

// Sessão

Route::middleware('api')->post('/sessions', 'SessionsController@create');

Route::middleware('checkToken:api')->get('/sessions/check', 'SessionsController@check');

Route::middleware('api')->delete('/sessions', 'SessionsController@logout');