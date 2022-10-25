<?php

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API_userController;
use App\Http\Controllers\API_newsController;
use App\Http\Controllers\API_promotionController;
use App\Http\Controllers\API_forgetPasswordController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Api routes for News with custom authentication;
Route::middleware(['api_auth'])->get('news', [API_newsController::class, 'index']);
Route::middleware(['api_auth'])->get('news/{id}', [API_newsController::class, 'show']);
Route::middleware(['api_auth'])->post('news', [API_newsController::class, 'store']);
Route::middleware(['api_auth'])->put('news/{id}', [API_newsController::class, 'update']);
Route::middleware(['api_auth'])->delete('news/{id}', [API_newsController::class, 'destroy']);


// Api routes for Promotions with custom authentication;
Route::middleware('api_auth')->get('promotion', [API_promotionController::class, 'index']);
Route::middleware('api_auth')->get('promotion/{id}', [API_promotionController::class, 'show']);
Route::middleware('api_auth')->post('promotion', [API_promotionController::class, 'store']);
Route::middleware('api_auth')->post('updatepromotion/{id}', [API_promotionController::class, 'update']);
Route::middleware('api_auth')->delete('promotion/{id}', [API_promotionController::class, 'destroy']);


// Api routes for Users with custom authentication;
// Route::middleware('auth:api')->get('user', [API_userController::class, 'index']);
Route::post('userLogin', [API_userController::class, 'show']); // Login
Route::post('user', [API_userController::class, 'store']); // Registration
Route::put('user', [API_userController::class, 'update']); //Update
// Route::middleware('auth:api')->delete('user/{id}', [API_userController::class, 'destroy']);


Route::post(
    'forget-password',
    [API_forgetPasswordController::class, 'forget_password']
); // Forget password

Route::post(
    'reset-password',
    [API_forgetPasswordController::class, 'reset_password']
); // reset password
