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
// route untuk pencarian
Route::get('/search/{keyword}',[DataPakan::class,'searchData']);
// route untuk tambah data
Route::post("/save", [DataPakan::class,'saveData']);
// route untuk delete data
Route::delete("/delete/{kode}", [DataPakan::class,'deleteData']);
// route untuk detail data
Route::get('/detail/{kode}',[DataPakan::class,'detailData']);
// route untuk edit data
Route::put("/edit/{kode}", [DataPakan::class,'editData']);

// Route untuk Data Kolam
// route untuk tampil data
Route::get("/view",[DataKolam::class,'viewData']);
// route untuk pencarian
Route::get('/search/{keyword}',[DataKolam::class,'searchData']);
// route untuk tambah data
Route::post("/save", [DataKolam::class,'saveData']);
// route untuk delete data
Route::delete("/delete/{kode}", [DataKolam::class,'deleteData']);
// route untuk detail data
Route::get('/detail/{kode}',[DataKolam::class,'detailData']);
// route untuk edit data
Route::put("/edit/{kode}", [DataKolam::class,'editData']);

// Route untuk Data Bibit
// route untuk tampil data
Route::get("/view",[DataBibit::class,'viewData']);
// route untuk pencarian
Route::get('/search/{keyword}',[DataBibit::class,'searchData']);
// route untuk tambah data
Route::post("/save", [DataBibit::class,'saveData']);
// route untuk delete data
Route::delete("/delete/{kode}", [DataBibit::class,'deleteData']);
// route untuk detail data
Route::get('/detail/{kode}',[DataBibit::class,'detailData']);
// route untuk edit data
Route::put("/edit/{kode}", [DataBibit::class,'editData']);

// Route untuk Data Panen
// route untuk tampil data
Route::get("/view",[DataPanen::class,'viewData']);
// route untuk pencarian
Route::get('/search/{keyword}',[DataPanen::class,'searchData']);
// route untuk tambah data
Route::post("/save", [DataPanen::class,'saveData']);
// route untuk delete data
Route::delete("/delete/{kode}", [DataPanen::class,'deleteData']);
// route untuk detail data
Route::get('/detail/{kode}',[DataPanen::class,'detailData']);
// route untuk edit data
Route::put("/edit/{kode}", [DataPanen::class,'editData']);

