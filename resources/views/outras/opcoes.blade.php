@extends('layouts.principal')

@section('titulo','Opções')

@section('conteudo')

    <h3>Opções</h3>

   <div class="options">
       <ul>
           <!-- Adiciona o atributo 'selected' conforme a rota passada -->
           <li><a class="warning {{request()->is('opcoes/1') ? 'selected' : '' }}" href="{{route('opcoes',1)}}">warning</a></li>
           <li><a class="info {{request()->is('opcoes/2') ? 'selected' : '' }}"    href="{{route('opcoes',2)}}">info</a></li>
           <li><a class="success {{request()->is('opcoes/3') ? 'selected' : '' }}" href="{{route('opcoes',3)}}">success</a></li>
           <li><a class="error {{request()->is('opcoes/4') ? 'selected' : '' }}"   href="{{route('opcoes',4)}}">error</a></li>
       </ul>
   </div>

   @if(isset($opcao))
        @switch($opcao)

            @case (1)
                <!-- Chama o componente 'alerta' -->
                <!-- Obs.: Para ser chamado dessa forma, esse componente foi registrado em 'AppServiveProvider -->
                @alerta(['titulo'=>'Erro Fatal','tipo'=>'warning'])
                    <p><strong>Warning</strong></p>
                    <p>Ocorreu um erro inesperado.</p>
                @endalerta
                @break
            @case (2)
                <!-- Chama o componente 'alerta' -->
                @alerta(['titulo'=>'Erro Fatal','tipo'=>'info'])
                    <p><strong>Info</strong></p>
                    <p>Ocorreu um erro inesperado.</p>
                @endalerta
                @break
            @case (3)
                <!-- Chama o componente 'alerta' -->
                @alerta(['titulo'=>'Erro Fatal','tipo'=>'success'])
                    <p><strong>Success</strong></p>
                    <p>Ocorreu um erro inesperado.</p>
                @endalerta
                @break
            @case (4)
                <!-- Chama o componente 'alerta' -->
                @alerta(['titulo'=>'Erro Fatal','tipo'=>'error'])
                    <p><strong>Error</strong></p>
                    <p>Ocorreu um erro inesperado.</p>
                @endalerta
                @break

        @endswitch
   @endif

@endsection