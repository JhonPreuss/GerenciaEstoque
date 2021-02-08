@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header"><a href="{{url('produtos/new')}}" class="btn btn-success">Cadastro novo produto</a> <a href="{{url('/produtos')}}" class="btn btn-info">Estoque Geral</a> <a href="{{url('historico/new')}}" class="btn btn-info">Relatório Produtos Cadastrados</a> <a href="{{url('historico/vendidosnew')}}" class="btn btn-success">Relatório Produtos Vendidos</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                        </div>
                     @endif
                     @if(Session::has('msg-sucess'))
                        <div class="alert alert-success" role="alert">
                        {{ Session::get('msg-sucess') }}
                        </div>
                     @endif

                    <h1>Listagem dos item em estoques</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Método</th>
                            <th scope="col">Baixa no estoque</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach( $produtos as $u)

                            <tr>
                            <th scope="row">{{ $u->id_produto}}</th>
                            <td>{{ $u->nome_produto}}</td>
                            <td>{{ $u->descricao_produto}}</td>
                            <td>{{ $u->SKU}}</td>                            
                            <td>{{ $u->quantidade_produto}}</td>
                            <td>sistema</td>
                            <!--<td>{{ $u->metodo_cadastro}}</td> TODO consultar da outra tabela-->
                            <td><a href="produtos/{{$u->id_produto}}/baixa" class="btn btn btn-info">Baixa</a></td>
                            <td><a href="produtos/{{$u->id_produto}}/edit" class="btn btn-warning">Editar</a></td>
                            <td>
                            <form action="produtos/delete/{{$u->id_produto}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger">Excluir</button>
                            </form>
                            
                            </td>
                            </tr>                  
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
