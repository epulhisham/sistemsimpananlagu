<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\LaguDihantarController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('login.index');
});

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::resource('mainpage/songs',SongController::class)->middleware('auth');
Route::get('/dihantar/songs',[SongController::class,'index1'])->middleware('auth');
Route::get('/menilai/songs',[SongController::class,'index2'])->middleware('auth');
Route::get('/meluluskan/songs',[SongController::class,'index3'])->middleware('auth');
Route::get('/diterbit/songs',[SongController::class,'index4'])->middleware('auth');

Route::get('/edit-profile/{user:id}/edit',[UserController::class,'edit'])->middleware('auth');
Route::put('/edit-profile/{user:id}',[UserController::class,'update'])->middleware('auth');

Route::get('/tukar-password/{user:id}',[UserController::class,'changepassword'])->middleware('auth');
Route::post('/tukar-password/{user:id}',[UserController::class,'updatePassword'])->middleware('auth');