<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\MembershipsController;
use App\Http\Controllers\NoterController;

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


Route::group(['prefix' => 'auth'], function(){
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup',[AuthController::class, 'signup']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::Resource('personnes', PersonneController::class);
	Route::Resource('offre',OffreController::class);
	Route::Resource('memberships',MembershipsController::class);
	Route::Resource('noter',NoterController::class);
});