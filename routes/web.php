<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\LivreHistoryController;
Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('livres', [LivreController::class, 'index'])->name('livres.index');
Route::get('livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('livres', [LivreController::class, 'store'])->name('livres.store');
Route::get('livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('livres/{livre}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');

Route::resource('auteurs', AuteurController::class);

Route::resource('emprunts', EmpruntController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/livre-history', [LivreHistoryController::class, 'index'])->name('livre-history.index');
