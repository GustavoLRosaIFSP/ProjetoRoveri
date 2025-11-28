<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestimentoController;
use Illuminate\Support\Facades\Route;
use App\Models\Ativo;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/painel', function () {
    return view('painel');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('investimentos', InvestimentoController::class);
    Route::get('/investimentos', [InvestimentoController::class, 'index'])
        ->name('investimentos.index');

    Route::get('/investimentos/criar', [InvestimentoController::class, 'create'])
        ->name('investimentos.create');

    Route::post('/investimentos', [InvestimentoController::class, 'store'])
        ->name('investimentos.store');
});


Route::get('/meu-perfil', function () {
    return view('profile.meu-perfil');
})->middleware(['auth'])->name('meu-perfil');


require __DIR__.'/auth.php';
