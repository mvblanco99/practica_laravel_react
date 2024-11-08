<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\client\EmpresaController;
use App\Http\Controllers\Api\admin\EmpresaController as AdEmpresaController;
use App\Http\Controllers\Api\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function(){
    //PUBLIC
    //::public
    Route::get('/public/{slug}',[FrontController::class,'categoria']);
    //::auth
    Route::get('/auth/login',[AuthController::class,'register']);
    Route::get('/auth/login',[AuthController::class,'login']);

    //PRIVATE
    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::get('/auth/logout',[AuthController::class,'logout']);

        //::rol client
        Route::apiResource('/client/empresa', EmpresaController::class);

        //::rol admin
        Route::apiResource('/admin/empresa', AdEmpresaController::class);
    });
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
