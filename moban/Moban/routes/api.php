<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ChartController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/adminset', [adminController::class, 'dataSetting'])->name("adminset");
Route::post('/updateset', [adminController::class, 'updateSetting'])->name("updateset");
Route::post('/insert', [ChartController::class, 'uploadData'])->name("insert");
Route::get('/date', [ChartController::class, 'getDateTime']);