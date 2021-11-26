<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('register', [AuthController::class,'register']);

});
Route::get('/projects', [ProjectController::class,'index']); //mostrar todos done \
Route::get('/projects/{id}', [ProjectController::class,'show']); //mostrar uno 
Route::post('/projects', [ProjectController::class,'store']); // crear done 
Route::put('/projects/{id}', [ProjectController::class,'update']); // actualizar done 
Route::delete('/projects/{id}', [ProjectController::class,'destroy']); // borrar 
