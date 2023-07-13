<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterAdminController;

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
    return view('auth.login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterAdminController::class, 'index'])->name('reg');
Route::post('/register', [RegisterAdminController::class, 'register']);



