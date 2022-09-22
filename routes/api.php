<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Client;
use App\Models\User;
use App\Http\Controllers\ClientController;
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

//Public Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/clients/search/{firstname}',[ClientController::class,'search']);
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'show']);
Route::get('/clients/dashboard',[ClientController::class,'dashboard']);


//Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::post('/clients',[ClientController::class,'store']);
    Route::put('/clients/{id}',[ClientController::class,'update']);
    Route::delete('/clients/{id}',[ClientController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('clients', ClientController::class);
