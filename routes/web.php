<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');


Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');

Route::get('clientes', function(){
    return view('clientes.index');
})->name('clientes.index');

Route::get('opcoes/{opcao?}', function($opcao = null){
    return view('outras.opcoes',compact('opcao'));
})->name('opcoes');