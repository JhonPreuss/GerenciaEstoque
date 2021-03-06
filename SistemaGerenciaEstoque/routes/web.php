<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //rota de autenticação, apos logar é direcionado para home.
});
//teste para listagem de usuários
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios')->middleware('auth');
//teste para cadastro de novos de usuários
//retorna uma nova view para cadastro de outros usuários
Route::get('/usuarios/new', [App\Http\Controllers\UsuariosController::class, 'new'])->name('usuarios')->middleware('auth');
//encaminha os dados do form para o método que irá cadastrar no banco
Route::post('/usuarios/add', [App\Http\Controllers\UsuariosController::class, 'add'])->name('usuarios')->middleware('auth');
//Rota para editar os dados 
Route::get('/usuarios/{id}/edit',  [App\Http\Controllers\UsuariosController::class, 'edit'])->name('usuarios')->middleware('auth');
//Rota para realizar update do formulario dos usuarios
Route::post('/usuarios/update/{id}',  [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuarios')->middleware('auth');
//Rota para realizar as exclusões
Route::delete('/usuarios/delete/{id}',  [App\Http\Controllers\UsuariosController::class, 'delete'])->name('usuarios')->middleware('auth');

/*Rotas para o sistema de cadastro e manipulação dos produtos
*/
//Rota para exibição dos produtos
Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index'])->name('produtos');
//Rota para cadastro de novos produtos no estoque
Route::get('/produtos/new', [App\Http\Controllers\ProdutosController::class, 'new'])->name('produtos');
//Rota para enviar os dados de cadastro de novos produtos no estoque para o método add no controlador  do produto
Route::post('/produtos/add', [App\Http\Controllers\ProdutosController::class, 'add'])->name('produtos');
//Rota para editar os dados de cadastro de um produtos no estoque 
Route::get('/produtos/{id_produto}/edit', [App\Http\Controllers\ProdutosController::class, 'edit'])->name('produtos');
//Rota para fazer o update os dados de cadastro alterado de um produtos no estoque 
Route::post('/produtos/update/{id_produto}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('produtos');
//Rota para fazer a baixa de um produtos no estoque 
Route::get('/produtos/{id_produto}/baixa', [App\Http\Controllers\ProdutosController::class, 'baixa'])->name('produtos');
//Rota para fazer o update da quantidade de produtos no estoque 
Route::post('/produtos/registra_baixa/{id_produto}', [App\Http\Controllers\ProdutosController::class, 'registra_baixa'])->name('produtos');







//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
