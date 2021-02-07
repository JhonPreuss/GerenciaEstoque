<?php

namespace App\Http\Controllers;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Redirect;
class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produtos::get();
        //retorna a view definida no subdiretorio produtos, que irá gerar a tabela dos produtos no estoque
        return view('produtos.list', ['produtos'=> $produtos]);
    }
    //método para retornar a view contendo o formulario de cadastro de novos produtos no estoque
    public function new(){
        return view('produtos.form');
    }
    //metodo para tratar o post feito no form de cadastro
    //parâmetros recebidos através do método Request
public function add( Request $request){
    $produto = new Produtos;
    $produto = $produto->create( $request->all());
    return Redirect::to('/produtos');

}
public function edit(){
    return view('produtos.form');
}
}
