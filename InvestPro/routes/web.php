<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/painel', function () {
    return view('painel');
});
Route::get('/investimentos', function () {
    return view('investimentos');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/usuarios', function () {
        return view('usuarios.index');
    })->name('usuarios.index');

    Route::get('/usuarios/criar', function () {
        return view('usuarios.create');
    })->name('usuarios.create');
});
Route::get('/meu-perfil', function () {
    return view('profile.meu-perfil');
})->middleware(['auth'])->name('meu-perfil');
require __DIR__.'/auth.php';
