<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function (){
Route::get('vet/list' ,[\App\Http\Controllers\VetController::class,'VetListApi']);
Route::get('vet/detail/{id}' ,[\App\Http\Controllers\VetController::class,'VetDetailApi']);
Route::post('vet/create' ,[\App\Http\Controllers\VetController::class,'VetCreate']);
    });
Route::post('token/create',[\App\Http\Controllers\UserController::class,'createToken']);

Route::get('pet/list' , [\App\Http\Controllers\PetController::class,'petListApi']);
Route::get('pet/list/{id}' , [\App\Http\Controllers\PetController::class,'petDetailListApi']);
