<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlatillosController as PlatillosController;
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
    return view('welcome');
});

Route::get('/platillos', [PlatillosController::class,'index'])->name('platillos.index');
Route::get('/platillos/create', [PlatillosController::class,'create'])->name('platillos.create');
Route::post('/platillos/store', [PlatillosController::class,'store'])->name('platillos.store');
Route::get('/platillos/{id}/edit', [PlatillosController::class,'edit'])->name('platillos.edit');
Route::put('/platillos/{id}/update', [PlatillosController::class,'update'])->name('platillos.update');
Route::delete('/platillos/{id}/destroy', [PlatillosController::class,'destroy'])->name('platillos.destroy');