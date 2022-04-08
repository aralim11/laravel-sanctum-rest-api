<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FrontEndController;

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

Route::post('/register', [AuthController:: class, 'Register']); //Register User
Route::post('/login', [AuthController:: class, 'Login']); //Login User

Route::group(['middleware' => ['auth:sanctum']], function(){ 
    Route::resource('/category', CategoryController::class); // Category Route List
    Route::resource('/blog', BlogController::class); // Blog Route List
    Route::resource('/blogs', FrontEndController::class); // Front Blog View Route List
    Route::post('/logout', [AuthController:: class, 'Logout']); //Logout User 
}); 
