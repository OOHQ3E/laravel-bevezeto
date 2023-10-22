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

Route::get('/', [TermekekController::class, 'index'])->name('Index oldal');
Route::get('/create',[TermekekController::class, 'create'])->name('Termek hozzaadasa');
Route::post('/create',[TermekekController::class, 'store'])->name('Termek elmentese');
Route::get('/termek/modify/{termek}',[TermekekController::class, 'edit'])->name('Termek modositasa');
Route::post('/termek/modify/{termek}',[TermekekController::class, 'update'])->name('Termek modositas elmentese');
Route::delete('termek/delete/{termek}',[TermekekController::class,'destroy'])->name('Termek torlese');
