@extends('layouts.principal')

@section('titulo','Editar Cliente')

@section('conteudo')
    <h3>Editar Cliente</h3>

    <form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
        @csrf
        @method('PUT')  <!-- Força o método para PUT -->
        <input type="text" name="nome" value="{{$cliente['nome']}}">
        <input type="submit" value="Atualizar">
    </form>
@endsection