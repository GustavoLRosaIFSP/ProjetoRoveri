<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteiraController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/carteira', [CarteiraController::class, 'index'])->name('carteira.index');
    Route::get('/carteira/{id}', [CarteiraController::class, 'show'])->name('carteira.show');

    Route::post('/carteira/{id}/investimentos', [CarteiraController::class, 'adicionarInvestimento'])
        ->name('carteira.investimentos.add');

    Route::delete('/carteira/{id}/investimentos/{invest}', [CarteiraController::class, 'removerInvestimento'])
        ->name('carteira.investimentos.remove');

    Route::get('/carteira/{id}/retorno', [CarteiraController::class, 'calcularRetornoTotal'])
        ->name('carteiras.retorno');

});


require __DIR__.'/auth.php';
