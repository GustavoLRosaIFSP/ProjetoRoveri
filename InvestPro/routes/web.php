<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestimentoController;
use App\Http\Controllers\AtivoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarteiraController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/painel', function () {
    return view('painel');
})->name('painel');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/carteira', [CarteiraController::class, 'index'])
        ->name('carteira.index');

    Route::delete('/carteira/investimentos/remover', [CarteiraController::class, 'removerInvestimento'])
        ->name('carteira.investimentos.destroy');
    Route::get('/carteira/retorno', [CarteiraController::class, 'calcularRetornoTotal'])
        ->name('carteira.retorno');
    Route::get('/carteira/{id}/retorno', [CarteiraController::class, 'calcularRetornoTotal'])
        ->name('carteiras.retorno');
    Route::post('/carteira/adicionar-saldo', [CarteiraController::class, 'adicionarSaldo'])
    ->name('carteira.adicionarSaldo');
    Route::post('/carteira/sacar-saldo', [CarteiraController::class, 'sacarSaldo'])
    ->name('carteira.sacarSaldo');


});

Route::middleware('auth')->group(function () {
    Route::resource('investimentos', InvestimentoController::class);
});

Route::post('/carteira/nome', [CarteiraController::class, 'updateNome'])
    ->name('carteira.updateNome');

Route::get('/meu-perfil', function () {
    return view('profile.meu-perfil');
})->middleware(['auth'])->name('meu-perfil');

Route::middleware('auth')->group(function () {
    Route::resource('ativos', AtivoController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('usuarios', UsuarioController::class);
});

Route::get('/testar-alpha', function (AlphaVantageService $alpha) {
    $tickers = ['PETR4', 'VALE3', 'ITUB4', 'BBAS3'];

    return $alpha->getPrecos($tickers);
});


Route::get('/investimentos/selecionar/{idAtivo}', 
    [InvestimentoController::class, 'selecionarAtivo']
)->name('investimentos.selecionar');

require __DIR__.'/auth.php';