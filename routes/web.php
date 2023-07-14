<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;



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
    return view('AdminLogin');
});


Route::get('/register', [AdminRegisterController::class, 'index'])->name('adminreg');
Route::post('/register', [AdminRegisterController::class, 'register']);

Route::get('/login', [AdminLoginController::class, 'index'])->name('adminlog');
Route::post('/login', [AdminLoginController::class, 'login']);

Route::get('/dashboard', [AdminController::class, 'index'])->name('viewdashboard');
Route::get('/viewusers', [AdminController::class, 'viewusers'])->name('viewusers');
Route::get('/viewassessments', [AdminController::class, 'viewassessments'])->name('viewassessments');
Route::get('/viewjournals', [AdminController::class, 'viewjournals'])->name('viewjournals');

Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');









