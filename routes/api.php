<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/users/login', [AuthController::class, 'login']);





Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/shopping', [ShoppingController::class, 'index']);
    Route::post('/shopping', [ShoppingController::class, 'create']);
    Route::get('/shopping/{id}', [ShoppingController::class, 'search']);
    Route::put('/shopping/{shopping}', [ShoppingController::class, 'update']);
    Route::delete('/shopping/{shopping}', [ShoppingController::class, 'destroy']);



    Route::get('/users/getall', [AuthController::class, 'getall']);
    // API route for logout user
    Route::post('/users/logout', [AuthController::class, 'logout']);
});