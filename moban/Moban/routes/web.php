<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FirebaseController::class, 'getData']);
Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::view('admin', 'admin')->name('admin');
});
Route::view('about', 'about');
Route::view('feedback', 'feedback');
Route::view('log', 'log');
Route::get('dashboard', function () {
    return view('lagi');
}); //welcome
Route::get('chart-banjir', [ChartController::class, 'chartBanjir'])->name('chart-banjir');
Route::get('chart-tinggi', [ChartController::class, 'chartTinggi'])->name('chart-tinggi');
Route::get('chart-hujan', [ChartController::class, 'chartHujan'])->name('chart-hujan');
Route::get('chart-intensitas', [ChartController::class, 'chartIntensitas'])->name('chart-intensitas');
//sampai sini
Route::view('jadi', 'jadi');
Route::view('mon', 'monitor');
Route::view('latihan', 'latihan');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'login'])->name('signin');
