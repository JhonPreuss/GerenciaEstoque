@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('produtos/new')}}">Cadastro novo produto</a> <a href="{{url('produtos/reports')}}">Histórico Estoque</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                            <!--<td>{{ $u->metodo_cadastro}}</td> TODO consultar da outra tabela-->
                            <td>TO DO</td>
                            <td><a href="produtos/{{$u->id}}/edit" class="btn btn-info">Editar</a></td>
                            <td>
                            <form action="produtos/delete/{{$u->id}}" method="post">
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