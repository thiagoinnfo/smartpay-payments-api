<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentsController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->middleware(['auth:api']);
    Route::post('refresh', 'refresh')->middleware(['auth:api']);
});

Route::middleware(['auth:api'])->group(function () {
    Route::post('payments', [PaymentsController::class, 'store']);
    Route::get('payments', [PaymentsController::class, 'index']);
    Route::get('payments/:id', [PaymentsController::class, 'show']);
});

