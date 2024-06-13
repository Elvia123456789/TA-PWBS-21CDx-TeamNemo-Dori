<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//  Route::controller(Register::class)->group(function(){

// // route untuk register
//  Route::post('register', 'register');
    

// });

// Route untuk Login
Route::post('login', [AuthController::class, 'login']);

// Route untuk Login
Route::post('register', [AuthController::class, 'register']);

// Route untuk Logout
Route::post('logout', [AuthController::class, 'logout']);
