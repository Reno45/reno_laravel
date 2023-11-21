<?php

use App\Http\Controllers\FakulitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('fakulitas', FakulitasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);

// Route::get('/fakulitas', function () {
//     return view('fakulitas');
// });
// Route::resource(
//     'fakulitas',
//     FakulitasController::class
// );

// Route::get('/prodi', function () {
//     return view('prodi');
// });

// Route::get('/mahasiswa', function () {
//     $data = [
//         ["npm" => 2226250101, "nama" => "Dewa"],
//         ["npm" => 2226250100, "nama" => "Reno"]
//     ];
//     return view('mahasiswa.index')->with('mahasiswa', $data);
// });

