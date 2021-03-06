@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Bem-vindo ao App-Max sistema de gerência de estoques</h1>
                    <a href="{{url('usuarios')}}">Teste de listagem de usuários</a>
                    <a href="{{url('produtos')}}">Cadastro novo produto</a>
                    <a href="{{url('produtos/reports')}}">Histórico Estoque</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
