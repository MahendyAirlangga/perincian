<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ShipController;
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

Route::get('/ships', [ShipController::class, 'index'])->name('index.kapal');
Route::post('/ships/storeShip', [ShipController::class, 'storeShip'])->name('store.ship');

Route::get('/addPerincianIndex', [BarangController::class, 'indexaddperincian'])->name('index.add.perincian');
Route::get('/', [BarangController::class, 'indexPerincian'])->name('index.perincian');
Route::post('/addbarang',[BarangController::class,'add_barang'])->name('add.barang');


