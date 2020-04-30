<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});

Route::get('/admin', function() {
    return view('admin/home-pt-BR');
});

Route::get('/admin/collection/{id}', function() {
    return view('admin/collection-pt-BR');
});

Route::get('/admin/task/{id}', function() {
    return view('admin/task-pt-BR');
});

Route::get('/dashboard', function() {
    return view('dashboard/home-pt-BR');
});

Route::get('/dashboard/login', function() {
    return view('dashboard/signin-pt-BR');
});

Route::get('/dashboard/logout', function() {
    return view('dashboard/logout-pt-BR');
});