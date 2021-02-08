<?php

namespace App\Http\Controllers;
use App\Models\Produtos;
use App\Models\Historico;
use Carbon\Carbon;
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
    if (Produtos::where('SKU', $request->get('SKU'))->first()){
        \Session::flash('message', 'Código SKU já existente!');
        return Redirect::to('/produtos/new');
    }else{
        //caso o SKU não exista, cadastro os dados do produto
        $produto = $produto->create( $request->all());

        //recupero dados para criar o registro de movimentação 
        $id_produto=$produto->id_produto;
        $quantidade_moviementacao=$produto->id_produto;
        $data_movimentacao = Carbon::now();
        //$produto->id_produto;
        $movimentacao = ['data_movimentacao'=>$data_movimentacao,'tipo_movimentacao'=>'"Cadastro"','metodo_movimentacao'=>'"Sistema"','quantidade_movimentacao'=>$quantidade_moviementacao,'id_produto'=> $id_produto];
        // novo objeto do tipo histórico para poder criar o registro da movimentação 
        $historico = new Historico;
        $historico = Historico::create($movimentacao);
        \Session::flash('msg-sucess', 'Dados cadastrado com sucesso!!');
        return Redirect::to('/produtos');

    }

}


public function edit($id_produto){
    $produto = Produtos::findOrFail($id_produto);
    return view('produtos.form', ['produto' => $produto]);

}


//método para realizar o update dos dados editados
public function update( $id_produto, Request $request){
    $usuario = Produtos::findOrFail( $id_produto);
    $usuario->update( $request->all());
    \Session::flash('msg-sucess', 'Dados alterados com sucesso!!');
    return Redirect::to('/produtos');
}

//retorno da view para realizar uma baixa no estoque
public function baixa($id_produto){
    $produto = Produtos::findOrFail($id_produto);
    return view('produtos.baixa', ['produto' => $produto]);

}

//método para dar baixa em um produto //rever
public function registra_baixa( $id_produto, Request $request){
    $usuario = Produtos::findOrFail( $id_produto);
    $quantidade_moviementacao=$request->get('quantidade_produto');
   
    $quantidade_produto_estoque=Produtos::where('id_produto', $id_produto)->value('quantidade_produto');
    
    //testar primeiramente se a quantidade a ser baixada é possivel
    if ($quantidade_produto_estoque >= $quantidade_moviementacao){

        $quantidade_produto_estoque=$quantidade_produto_estoque-$quantidade_moviementacao;
        //realiza update com a nova quantidade de produtos no estoque
        $usuario->update(['quantidade_produto' => $quantidade_produto_estoque]);
        //após aletar a quantidade do itens no estoque, criar o registro de movimentação 
        $data_movimentacao = Carbon::now();;
        //$produto->id_produto;
        $movimentacao = ['data_movimentacao'=>$data_movimentacao,'tipo_movimentacao'=>'Baixa','metodo_movimentacao'=>'Sistema','quantidade_movimentacao'=>$quantidade_moviementacao,'id_produto'=> $id_produto];
        // novo objeto do tipo histórico para poder criar o registro da movimentação 
        $historico = new Historico;
        $historico = Historico::create($movimentacao);

        \Session::flash('msg-sucess', 'Produto baixado com sucesso!!');
        return Redirect::to('/produtos');

    }else{
        //caso o valor de itens a serem baixados for superior ao permitido pelo estoque
        \Session::flash('message', 'Dados cadastrado com sucesso!!');
        return Redirect::to('/produtos');

    }
}
}
