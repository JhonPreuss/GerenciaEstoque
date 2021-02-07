@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('produtos') }}">Retornar</a></adiv>

                <div class="card-body">
                <!-- rever  if das sessões -->
                @if(Request::is('*/edit'))
                    <form action="{{url('produtos/update')}}/{{$produto->id}}" method="post">
                    @csrf
                    <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome_produto" class="form-control" value="{{$produto->nome_produto}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição</label>
                                <textarea name="descricao_produto" class="form-control"  rows="5" cols="33" value="{{$produto->descricao_produto}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SKU</label>
                                <input type="text" name="SKU" class="form-control" value="{{$produto->SKU}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantidade</label>
                                <input type="text" name="quantidade_produto" class="form-control" value="{{$produto->quantidade_produto}}">
                            </div>                       

                            <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>
                @else
                    <form action="{{url('produtos/add')}}" method="post">
                    @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome_produto" class="form-control" placeholder="Digite o nome do produto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descrição</label>
                                <input type="text" name="descricao_produto" class="form-control" placeholder="Digite uma descrção sobre o produto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SKU</label>
                                <input type="text" name="SKU" class="form-control" placeholder="Digite o código SKU referente ao produto">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantidade</label>
                                <input type="number" name="quantidade_produto" class="form-control" placeholder="Digite a quantidade do produto a ser estocada" min="0" step="1"/>
                            </div>                          

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
