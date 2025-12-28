<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartijaGrozdjaController;
use App\Http\Controllers\FermentacijaController;
use App\Http\Controllers\BureController;
use App\Http\Controllers\VinoController;
use App\Http\Controllers\PublicController;

Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('partija-grozdjas', App\Http\Controllers\PartijaGrozdjaController::class)->except('show');

Route::resource('fermentacijas', App\Http\Controllers\FermentacijaController::class)->except('show');

Route::resource('bures', App\Http\Controllers\BureController::class)->except('show');

Route::resource('vinos', App\Http\Controllers\VinoController::class)->except('show');

// javne rute za use cases
Route::get('/vinoteka', [PublicController::class, 'vinoteka'])->name('public.vinoteka');
Route::get('/podrum-mapa', [PublicController::class, 'podrum'])->name('public.podrum');
Route::get('/pregled-sorti', [PublicController::class, 'sortastatistika'])->name('public.sortastatistika');

// Sve ove rute su dostupne samo ako je korisnik ulogovan
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('partija-grozdja', PartijaGrozdjaController::class);
    Route::resource('fermentacija', FermentacijaController::class);
    Route::resource('bure', BureController::class);
    Route::resource('vino', VinoController::class);
});