<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//resource = representa todas as rotas HTTP (index, store, create, etc) sem a necessidade de declará-las.
// Para consultar as rotas no cmd: php artisan route:list
Route::resource('clientes', 'ClienteController');  

Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');

// Parâmetro 'opcao' é opcional
Route::get('opcoes/{opcao?}', function($opcao = null){
    return view('outras.opcoes',compact('opcao'));
})->name('opcoes');

Route::get('bootstrap', function(){
    return view('outras.exemploBootstrap');
})->name('bootstrap');