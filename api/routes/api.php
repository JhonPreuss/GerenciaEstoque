<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//rotas para os controladores da api
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

/*Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
    Route::resource('products', [ProdutosController::class]);
 
}*/
//rever essas rotas
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});