<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPakan;

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

// Route untuk Data Pakan
// route untuk tampil data
Route::get("/view",[DataPakan::class,'viewData']);
// route untuk tambah data
Route::post("/save", [DataPakan::class,'saveData']);
// route untuk delete data
Route::delete("/delete/{kode}", [DataPakan::class,'deleteData']);
// route untuk edit data
Route::put("/edit/{kode}", [DataPakan::class,'editData']);