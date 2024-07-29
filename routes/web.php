<?php

use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;



Route::resource("produto", ProdutosController::class);
//Rotas de acesso das paginas
Route::get('/', [SiteController::class, 'index'])->name('site/index');
Route::get('/produtos/{slug}',[SiteController::class, 'details'])->name('site/details');
Route::get('/categoria/{id}',[SiteController::class, 'categoria'])->name('site/categoria');

//Caminhos para as funções do site}}
Route::get('/carrinho',[CarrinhoController::class, 'CarrinhoLista'])->name('site/carrinho');
Route::post('/carrinho',[CarrinhoController::class, 'adicionarCarrinho'])->name('site/addcarrinho');
Route::post('/remover',[CarrinhoController::class, 'removerCarrinho'])->name('site/removecarrinho');
Route::post('/atualizar',[CarrinhoController::class, 'atualizarCarrinho'])->name('site/atualizacarrinho');
Route::get('limpar', [CarrinhoController::class, 'LimparCarrinho'])->name('site/limparcarrinho');

Route::view('/login', 'login/form')->name('login/form');
Route::post('/auth')