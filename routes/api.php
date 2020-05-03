<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'Api\AuthController@login')->name('login');
Route::get('users','Api\\UserController@index')->name('AllUsers');

Route::namespace('Api')->name('api.')->group(function(){
    Route::prefix('cadastros')->group(function(){
        Route::get('/TipoProdutos','tipo_produtoController@all')->name('TipoProdutos');
        Route::get('/TipoProdutos/{id}','tipo_produtoController@show')->name('TipoProdutos');
        Route::post('/TipoProdutos','tipo_produtoController@cadastro')->name('CadastroTipoProdutos');
        Route::put('/TipoProdutos/{id}','tipo_produtoController@atualizar')->name('AtualizarTipoProdutos');
        Route::delete('/TipoProdutos/{id}','tipo_produtoController@delete')->name('DeleteTipoProdutos');


    });
});
    