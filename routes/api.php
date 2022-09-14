<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FrontEndController;
use App\Http\Controllers\Api\DashboardController;

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
Route::resource('/blogs', FrontEndController::class); // View All Blog List
Route::get('/blogs-similler-cat/{cat_id}', [FrontEndController::class, 'simillerCat']); //get similler category post

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/dash/{id}', [DashboardController::class, 'dash']); // Category Route List
    Route::resource('/category', CategoryController::class); // Category Route List
    Route::resource('/blog', BlogController::class); // Blog Route List
    Route::post('/logout', [AuthController:: class, 'Logout']); //Logout User
});
