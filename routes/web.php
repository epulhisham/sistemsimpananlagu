<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelulusController;
use App\Http\Controllers\PenilaiController;
use App\Http\Controllers\DiterbitController;
use App\Http\Controllers\RegisterController;

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

//homepage
Route::get('/', function () {
    return view('login.index');
});

//login and logout
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

//register
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

//admin
Route::resource('/admin', AdminController::class)->middleware('admin');

//user syarikat rakaman dan stesen
Route::resource('/lagu', LaguController::class)->middleware('syarikat_rakam')->middleware('syarikat_stesen');

//user admin and superAdmin
Route::resource('/pelulus-lagu', PelulusController::class)->middleware('auth');
Route::get('/lagu-tak-lulus',[PelulusController::class,'index_taklulus'])->middleware('auth');
Route::get('/statistik',[PelulusController::class,'index_statistik'])->middleware('auth');

//user penilai
Route::resource('/penilai-lagu',PenilaiController::class)->middleware('penilai');
Route::get('/lagu-dinilai',[PenilaiController::class,'index_lagudinilai'])->middleware('penilai');
Route::get('/belum-dinilai',[PenilaiController::class,'index_belumdinilai'])->middleware('penilai');
Route::get('/lagu-lulus',[PenilaiController::class,'index_lulus'])->middleware('penilai');
Route::get('/lagu-taklulus',[PenilaiController::class,'index_taklulus'])->middleware('penilai');


//lagu diterbit utk pelulus dan syarikat stesen
Route::resource('/lagu-diterbit',DiterbitController::class)->middleware('pelulus')->middleware('syarikat_stesen');
Route::get('downloadCount',[DiterbitController::class,'downloadCount'])->name('downloadCount');

Route::get('/edit-profile/{user:id}/edit',[UserController::class,'edit'])->middleware('auth');
Route::put('/edit-profile/{user:id}',[UserController::class,'update'])->middleware('auth');

Route::get('/tukar-password/{user:id}',[UserController::class,'changepassword'])->middleware('auth');
Route::post('/tukar-password/{user:id}',[UserController::class,'updatePassword'])->middleware('auth');

Route::get('/admin/tukar-password/{user:id}',[AdminController::class,'changeUserPassword'])->middleware('admin');
Route::post('/admin/tukar-password/{user:id}',[AdminController::class,'updateUserPassword'])->middleware('admin');

