<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        //retorna a view definida no subdiretorio produtos, que irá gerar a tabela dos produtos no estoque
        return view('produtos.list');
    }
}
