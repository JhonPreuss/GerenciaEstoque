<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Redirect;

class UsuariosController extends Controller
{
    //função que ira buscar e renderizar a view que lista os usuários.
    public function index(){
        $usuarios = Usuarios::get();
        return view('usuarios.list', ['usuarios' => $usuarios]);//passa pro blade os usuários retornados do banco na variavel usuarios
    }
//função para cadastro de novos usuários
    public function new(){
        return view('usuarios.form');

    }
//metodo para tratar o post feito no form de cadastro
//parâmetros recebidos através do método Request
public function add( Request $request){
    $usuario = new Usuarios;
    $usuario = $usuario->create( $request->all());
    return Redirect::to('/usuarios');

}
//metodo para editar os dados do usuário

public function edit( $id){
    $usuario = Usuarios::findOrFail( $id);
    return view('usuarios.form', ['usuario' => $usuario]);//usamos o mesmo médoto de cadastro, atrelando uma condição para verificar se a ação vem de um cadastro ou alteração

}
public function update( $id, Request $request){
    $usuario = Usuarios::findOrFail( $id);
    $usuario->update( $request->all());
    //Session::flash('msg_update', 'Dados autalizados com sucesso!');
    return Redirect::to('/usuarios');
}
public function delete( $id){
    $usuario = Usuarios::findOrFail( $id);
    $usuario->delete();
    return Redirect::to('/usuarios');
}
}
