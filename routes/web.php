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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[App\Http\Controllers\UserController::class,'dashboard'])->name('dashboard');
Route::get('/login',[App\Http\Controllers\UserController::class,'index'])->name('login');
Route::post('/post-login', [App\Http\Controllers\UserController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
