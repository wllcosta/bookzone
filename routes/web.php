<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rotas públicas de autenticação
require __DIR__.'/auth.php';

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Rota principal redirecionando para /books
    Route::get('/', function () {
        return redirect()->route('books.index');
    });
    
    // Rotas de livros
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
        Route::post('/{book}/favorite', [BookController::class, 'favorite'])->name('books.favorite');
        Route::delete('/{book}/unfavorite', [BookController::class, 'unfavorite'])->name('books.unfavorite');
        
    });
    
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});