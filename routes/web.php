<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

//Route::resource("produto", ProdutosController::class);
//Route::resource("users", UserController::class);
//Rotas de acesso das paginas
Route::get('/', [SiteController::class, 'index'])->name('site/index');
Route::get('/produtos/{slug}',[SiteController::class, 'details'])->name('site/details');
Route::get('/categoria/{id}',[SiteController::class, 'categoria'])->name('site/categoria');

//Caminhos para as funções do site 
Route::get('/carrinho',[CarrinhoController::class, 'CarrinhoLista'])->name('site/carrinho');
Route::post('/carrinho',[CarrinhoController::class, 'adicionarCarrinho'])->name('site/addcarrinho');
Route::post('/remover',[CarrinhoController::class, 'removerCarrinho'])->name('site/removecarrinho');
Route::post('/atualizar',[CarrinhoController::class, 'atualizarCarrinho'])->name('site/atualizacarrinho');
Route::get('limpar', [CarrinhoController::class, 'LimparCarrinho'])->name('site/limparcarrinho');

Route::view('/login', 'login/form')->name('login/form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login/auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login/logout');
Route::get('/register', [LoginController::class, 'create'])->name('login/create');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard')->middleware(['auth','checkemail']);
Route::get('/admin/produtos', [ProdutosController::class, 'index'])->name('admin/produtos');