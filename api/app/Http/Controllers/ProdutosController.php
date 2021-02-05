<?php

//namespace App\Http\Controllers\API;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;//adicionado

use Validator;//

class ProdutosController extends Controller
{
    /**
* método para listar os produtos.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
  $products = Product::all();
  return response()->json([
  "success" => true,
  "message" => "Product List",
  "data" => $products
  ]);
}
/**
* Método para armazenar um novo produdto.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  $input = $request->all();
  $validator = Validator::make($input, [
  'name' => 'required',
  'detail' => 'required'
  ]);
    if($validator->fails()){
    return $this->sendError('Validation Error.', $validator->errors());       
    }
  $product = Product::create($input);
  return response()->json([
  "success" => true,
  "message" => "Product created successfully.",
  "data" => $product
  ]);
} 
/**
* metodo para consulta sobre um determinado item.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
  $product = Product::find($id);
  if (is_null($product)) {
  return $this->sendError('Produto não encontrado.');
  }
  return response()->json([
  "success" => true,
  "message" => "Produto encontrado.",
  "data" => $product
  ]);
}
/**
* método para update de um produto.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Product $product)
{
  $input = $request->all();
  $validator = Validator::make($input, [
  'name' => 'required',
  'detail' => 'required'
  ]);
    if($validator->fails()){
    return $this->sendError('Validation Error.', $validator->errors());       
    }
  $product->name = $input['name'];
  $product->detail = $input['detail'];
  $product->save();
  return response()->json([
  "success" => true,
  "message" => "Product updated successfully.",
  "data" => $product
  ]);
}
/**
* método para deletar de um produto.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Product $product)
{
  $product->delete();
  return response()->json([
  "success" => true,
  "message" => "Product deleted successfully.",
  "data" => $product
  ]);
}
}
