@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('produtos') }}">Retornar</a></adiv>

                <div class="card-body">
                @if(Request::is('*/baixa'))
                    <form action="{{url('produtos/registra_baixa')}}/{{$produto->id_produto}}" method="post">
                    @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                        </div>
                     @endif
                    @csrf
                    <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome_produto" class="form-control" value="{{$produto->nome_produto}}" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição</label>
                                <textarea name="descricao_produto" class="form-control"  rows="5" cols="33" disabled="" >{{$produto->descricao_produto}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" disabled="">SKU</label>
                                <input type="text" name="SKU" class="form-control" value="{{$produto->SKU}}" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantidade do produto a ser baixada do estoque</label>
                                <input type="number" name="quantidade_produto" class="form-control" min="1" >
                            </div>                       

                            <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>
                @else
                <div class="form-group"> <a href="{{url('produtos/reports')}}" class="btn btn-info">Retornar</a>
                    <div class="alert alert-success" role="alert">
                                <p>Ação inapropriada!</p>
                    </div>
                 </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
