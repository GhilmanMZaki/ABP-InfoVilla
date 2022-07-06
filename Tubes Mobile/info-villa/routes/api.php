<?php


use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\villaController;
use App\Http\Controllers\favoriteController;
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

// Public routes
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/signup', [UserController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Auth User
    Route::post('/logout', [loginController::class, 'logout']);

    // Profile
    Route::get('/profile', [UserController::class, 'user']);
    Route::post('/profile', [UserController::class, 'update']);

    // Villa
    Route::get('/villa', [villaController::class, 'index']);  // view all villa
    Route::get('/villa/{id}', [villaController::class, 'show']);  // view single villa
    Route::post('/villa', [villaController::class, 'store']); // add new villa
    Route::delete('/villa/{id}', [villaController::class, 'destroy']); //delete villa

    // Review
    Route::get('/review', [reviewController::class, 'index']); // view all review
    Route::get('/villa/{id}/review', [reviewController::class, 'show']); // view all review on single post
    Route::post('villa/{id}/review', [reviewController::class, 'store']); // add new review
    Route::delete('/review/{id}', [reviewController::class, 'destroy']); // delete single review

    // Favorite
    Route::get('/favorite', [favoriteController::class, 'show']);
    Route::post('villa/{id}/favorite', [favoriteController::class, 'index']);
});
