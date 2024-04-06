<?php

use App\Http\Controllers\TermekekController;
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

Route::get('/', [TermekekController::class, 'index'])->name('termek.index');
Route::get('/create',[TermekekController::class, 'create'])->name('termek.create');
Route::post('/create',[TermekekController::class, 'store'])->name('termek.store');
Route::get('/termek/modify/{termek}',[TermekekController::class, 'edit'])->name('termek.edit');
Route::post('/termek/modify/{termek}',[TermekekController::class, 'update'])->name('termek.update');
Route::delete('termek/delete/{termek}',[TermekekController::class,'destroy'])->name('termek.delete');
