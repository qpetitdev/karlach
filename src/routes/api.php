<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->prefix("v1.0")->group(function () {
    Route::get('/test', function (Request $request) {
        return "test";
    });

    Route::prefix("/users")->controller(UserController::class)->group(function () {
        Route::post('', 'create')->withoutMiddleware("auth:api");
    });

    Route::prefix("/events")->controller(EventController::class)->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'show');
        Route::post('', 'create');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
});

