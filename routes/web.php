<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/generate-pdf/{cat}', [App\Http\Controllers\UserController::class, 'htmlPdf'])->name('htmlPdf');
Route::post('/post-request', [App\Http\Controllers\UserController::class, 'postRequest'])->name('post.request');
Route::get('/dashboard',[App\Http\Controllers\UserController::class,'dashboard'])->name('dashboard');
Route::get('/login',[App\Http\Controllers\UserController::class,'index'])->name('login');
Route::post('/post-login', [App\Http\Controllers\UserController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::get('/dashboard/allrequest',[App\Http\Controllers\UserController::class,'allrequest'])->name('allrequest');
Route::get('/dashboard/req/{cat}',[App\Http\Controllers\UserController::class,'req'])->name('req');
Route::get('/dashboard/insert_user',[App\Http\Controllers\UserController::class,'insert'])->name('insert');
Route::post('/post-register', [App\Http\Controllers\UserController::class, 'postRegister'])->name('post.register');
Route::get('/', function () {
    if(Auth::check()) {
        return redirect('dashboard');
    } else {
        return view('login');
    }
});
