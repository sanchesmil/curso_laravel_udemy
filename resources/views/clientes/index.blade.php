@extends('layouts.principal')

@section('titulo','Clientes')

@section('conteudo')
    <h3>Clientes</h3>
    <a href="#">NOVO CLIENTE</a>
    
    <hr>  

    @if(isset($clientes))

        @for($i = 0; $i < 10; $i++)
            {{$i}},
        @endfor

        <br>
        
        @for($i = 0; $i < count($clientes); $i++)
            {{$clientes[$i]['nome']}},
        @endfor

        <br> 

        <!-- Foreach e a Variável $LOOP => permite obter dados da estrutura do Foreach -->
        @foreach($clientes as $c)
            <p>{{$c['nome']}} |
                @if($loop->first)   <!-- Verifica se é o 1º elemento do array-->
                    (primeiro) | 
                @endif
                @if($loop->last)   <!-- Verifica se é o último elemento do array-->
                    (último) |
                @endif

                (Índice: {{$loop->index}})  - {{$loop->iteration}} / {{$loop->count}} 
            </p>
        @endforeach
       
    @else
        <h4>Nao existem clientes cadastrados!</h4>
    @endif

    @empty($clientes)
        <h4>Nao existem clientes cadastrados!</h4>
    @endempty
@endsection