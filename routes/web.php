<?php

use App\Models\pemains;
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

Route::get('/pemain', [PemainController::class, 'index']);
Route::get('/pemain/tambah', [PemainController::class, 'create']);
Route::post('/pemain/store', [PemainController::class, 'store']);
Route::get('/pemain/ubah/{id}', [PemainController::class, 'ubah']);
Route::put('/pemain/update/{id}', [PemainController::class, 'update']);
Route::get('/pemain/hapus/{id}', [PemainController::class, 'delete']);
Route::get('/pemain/destroy/{id}', [PemainController::class, 'destroy']);
