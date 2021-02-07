@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('usuarios') }}">Retornar</a></adiv>

                <div class="card-body">
                <!-- rever  if das sessões -->
                @if(Request::is('*/edit'))
                    <form action="{{url('usuarios/update')}}/{{$usuario->id}}" method="post">
                    @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="name" class="form-control" value="{{$usuario->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{$usuario->email}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastro</button>
                    </form>
                @else
                    <form action="{{url('usuarios/add')}}" method="post">
                    @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Digite o nome">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Digite o  email">
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Cadastro</button>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
