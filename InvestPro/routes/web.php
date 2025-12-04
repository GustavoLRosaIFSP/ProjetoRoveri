<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestimentoController;
use App\Http\Controllers\AtivoController;
use App\Http\Controllers\CarteiraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteiraController;


Route::get('/', function () {
    return view('home');
});

Route::get('/painel', function () {
    return view('painel');
})->name('painel');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/carteira', [CarteiraController::class, 'index'])
        ->name('carteira.index');
    Route::post('/carteira/investimentos/adicionar', [CarteiraController::class, 'adicionarInvestimento'])
        ->name('carteira.investimentos.add');

    Route::delete('/carteira/investimentos/{idInvest}/remover', [CarteiraController::class, 'removerInvestimento'])
        ->name('carteira.investimentos.remove');
    Route::get('/carteira/retorno', [CarteiraController::class, 'calcularRetornoTotal'])
        ->name('carteira.retorno');
    Route::get('/carteira/{id}/retorno', [CarteiraController::class, 'calcularRetornoTotal'])
        ->name('carteiras.retorno');

});

<<<<<<< HEAD
<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::resource('investimentos', InvestimentoController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('carteira', CarteiraController::class);
});

Route::post('/carteira/nome', [CarteiraController::class, 'updateNome'])
    ->name('carteira.updateNome');

Route::get('/meu-perfil', function () {
    return view('profile.meu-perfil');
})->middleware(['auth'])->name('meu-perfil');

Route::middleware('auth')->group(function () {
    Route::resource('ativos', AtivoController::class);
});

Route::get('/investimentos/selecionar/{ativo}', [InvestimentoController::class, 'selecionarAtivo'])
     ->name('investimentos.selecionar');

Route::post('/carteira/remover/{id}', [CarteiraController::class, 'remover'])
    ->name('carteira.remover');
=======
>>>>>>> origin/develop

require __DIR__.'/auth.php';
=======

require __DIR__.'/auth.php';
>>>>>>> f29627458a52026712f774bfc900bc0edfe2e5a7
