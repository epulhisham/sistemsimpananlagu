<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

//user syarikat rakaman dan stesen
Route::resource('/lagu', LaguController::class)->middleware('syarikat_rakam')->middleware('syarikat_stesen');


//user pelulus
Route::resource('/pelulus-lagu', PelulusController::class)->middleware('pelulus');
Route::get('/meluluskan',[PelulusController::class,'index_meluluskan'])->middleware('pelulus');
Route::get('/lagu-lulus',[PelulusController::class,'index_lulus'])->middleware('pelulus');
Route::get('/lagu-taklulus',[PelulusController::class,'index_taklulus'])->middleware('pelulus');
Route::get('/statistik',[PelulusController::class,'index_statistik'])->middleware('pelulus');

//user penilai
Route::resource('/penilai-lagu',PenilaiController::class)->middleware('penilai');
Route::get('/lagu-dinilai',[PenilaiController::class,'index_lagudinilai'])->middleware('penilai');
Route::get('/belum-dinilai',[PenilaiController::class,'index_belumdinilai'])->middleware('penilai');


//lagu diterbit utk pelulus dan syarikat stesen
Route::resource('/lagu-diterbit',DiterbitController::class)->middleware('pelulus')->middleware('syarikat_stesen');
Route::get('downloadCount',[DiterbitController::class,'downloadCount'])->name('downloadCount');
// Route::get('/songs/{song}/download', DiterbitController::class,'downloadCount')->name('songs.downloadCount');
// Route::post('/update-download-count',function(Request $request){
//     $requestBody = $request->getContent();
//     $song_id = $requestBody->song_id;
//     $songs = DB::table('songs')->where('id', $song_id);
//     $songs -> $downloadCount = $songs->downloadCount +1 ;
// });

Route::get('/edit-profile/{user:id}/edit',[UserController::class,'edit'])->middleware('auth');
Route::put('/edit-profile/{user:id}',[UserController::class,'update'])->middleware('auth');

Route::get('/tukar-password/{user:id}',[UserController::class,'changepassword'])->middleware('auth');
Route::post('/tukar-password/{user:id}',[UserController::class,'updatePassword'])->middleware('auth');