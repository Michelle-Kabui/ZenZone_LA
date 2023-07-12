<?php

use App\Mail\AuthMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthMailController;
use App\Http\Controllers\PasswordResetController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::post('send-mail', [UserController::class, 'send_email']);

Route::post('passwordreset', [PasswordResetController::class, 'reset']);


Route::post('analysis', [UserController::class, 'analysis']);

Route::post('journal', [UserController::class, 'journal']);
