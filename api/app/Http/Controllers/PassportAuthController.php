<?php

//namespace App\Http\Controllers\API;//subdiretorio api

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;//adicionado

use Illuminate\Http\Request;

use App\Models\User;//adicionado

class PassportAuthController extends Controller
{
     // Definição do método para registar um usuario para api
     public function register(Request $request)
     {
         $this->validate($request, [
             'name' => 'required|min:4',
             'email' => 'required|email',
             'password' => 'required|min:8',
         ]);
   
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password)
         ]);
   
         $token = $user->createToken('Laravel8PassportAuth')->accessToken;
   
         return response()->json(['token' => $token], 200);
     }
  
     // Definição do método para efetuar login de um usuario para api
     public function login(Request $request)
     {
         $data = [
             'email' => $request->email,
             'password' => $request->password
         ];
   
         if (auth()->attempt($data)) {
             $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
             return response()->json(['token' => $token], 200);
         } else {
             return response()->json(['error' => 'Unauthorised'], 401);
         }
     }
  
     public function userInfo() 
     {
  
      $user = auth()->user();
       
      return response()->json(['user' => $user], 200);
  
     } 
}
