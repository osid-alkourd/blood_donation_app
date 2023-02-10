<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\AuthenticationController;
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

// Authentication
Route::post('user/create', [AuthenticationController::class , 'register'])->middleware('guest:sanctum');
Route::post('user/login', [AuthenticationController::class , 'login'])->middleware('guest:sanctum');
Route::delete('user/logout' , [AuthenticationController::class , 'logout'])->middleware('auth:sanctum');


