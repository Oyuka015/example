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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', 'App\Http\Controllers\Controller@aa');
Route::get('/medeelel', 'App\Http\Controllers\Controller@medeelel');
Route::get('/exam', 'App\Http\Controllers\Controller@exam');
Route::get('/certi', 'App\Http\Controllers\Controller@certi');
Route::get('/faq', 'App\Http\Controllers\Controller@faq');
Route::get('/online', 'App\Http\Controllers\Controller@online');
Route::get('/feedback', 'App\Http\Controllers\Controller@feedback');
Route::get('/login', 'App\Http\Controllers\Controller@login');
