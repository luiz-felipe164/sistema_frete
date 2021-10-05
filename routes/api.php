<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShippingController;
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

Route::post('/login', LoginController::class)->name('login');

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('shipping', ShippingController::class)->except(['create', 'edit']);
});
