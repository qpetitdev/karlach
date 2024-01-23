<?php

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
});

