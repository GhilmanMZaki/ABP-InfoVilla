<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\villaController;
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
    return view('home');
});

Route::get('/home', [homeController::class, 'index']);

Route::get('/dashboard', [villaController::class, 'index']);
Route::get('/dashboard/villa', [villaController::class, 'index']);
Route::get('/dashboard/villa/delete/{id}', [villaController::class, 'destroy']);
Route::post('/dashboard/villa/store', [villaController::class, 'store']);
Route::get('/dashboard/review', [reviewController::class, 'index']);

Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/signup', [UserController::class, 'create'])->middleware('guest');
Route::post('/signup/store', [UserController::class, 'store']);
