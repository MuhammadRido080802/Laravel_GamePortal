<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\WelcomeController;
use App\Models\pemain;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemainController;

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


});
//sini
Route::get('/pemain', [PemainController::class, 'index']);
Route::get('/pemain/tambah', [PemainController::class, 'create']);
Route::post('/pemain/store', [PemainController::class, 'store']);
Route::get('/pemain/ubah/{id}', [PemainController::class, 'ubah']);
Route::put('/pemain/update/{id}', [PemainController::class, 'update']);
Route::delete('/pemain/hapus/{id}', [PemainController::class, 'destroy']); // Pastikan ini menggunakan metode DELETE
Route::post('/Order', [WelcomeController::class, 'CreateGame'])->name('games');
Route::get('/game', [GameController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/games/cetak', [GameController::class, 'cetak']);
