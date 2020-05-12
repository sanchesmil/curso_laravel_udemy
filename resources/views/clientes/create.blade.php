@extends('layouts.principal')

@section('titulo','Novo Cliente')

@section('conteudo')
    <h3>Clientes: </h3>

    <form action="{{route('clientes.store')}}"  method="POST">
        @csrf
        <input type="text" name="nome">
        <input type="submit" value="Salvar">

    </form>

@endsection