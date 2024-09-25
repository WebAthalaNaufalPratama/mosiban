<?php

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
});
Route::get('dashboard', function () {
    return view('lagi');
}); //welcome
Route::view('about', 'about');
Route::view('feedback', 'feedback');
Route::view('log', 'log');

//sampai sini
Route::view('jadi', 'jadi');
Route::view('admin', 'admin');
Route::view('mon', 'monitor');
Route::view('latihan', 'latihan');
