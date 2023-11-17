<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logger\LoggerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('log')->group(function () {

    Route::get('/', [LoggerController::class, 'log']);
    Route::get('to/{type}', [LoggerController::class, 'logTo']);
    Route::get('to-all', [LoggerController::class, 'logToAll']);
});
