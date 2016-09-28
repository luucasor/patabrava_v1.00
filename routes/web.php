<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Rotas para login laravel
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//Rotas para Produtos
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/lista/filtro', 'ProdutoController@filtro');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');
Route::get('/produtos/altera/{id}', 'ProdutoController@altera');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Route::post('/produtos/atualiza', 'ProdutoController@atualiza');
Route::post('/produtos/upload', 'ProdutoController@uploadFiles');
