<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    
    <title>@yield('titulo')</title>  // Incorpora o título de quem exteder esse layout
    
</head>
<body>
    <div class="row">
        <div class="col1">
            <div class="menu">
                <ul>    <!-- clientes.* = mantém o item 'Cliente' ativo enquanto estiver navegando dentro das subrotas de clientes  -->
                    <li><a class="{{request()->routeIs('clientes.*') ? 'active' : ''}}"  
                           href="{{route('clientes.index')}}">Clientes</a></li>
                    <li><a class="{{request()->routeIs('produtos') ? 'active' : ''}}" 
                           href="{{route('produtos')}}">Produtos</a></li>
                    <li><a class="{{request()->routeIs('departamentos') ? 'active' : ''}}" 
                           href="{{route('departamentos')}}">Departamentos</a></li>
                    <li><a class="{{request()->routeIs('opcoes') ? 'active' : ''}}" 
                           href="{{route('opcoes')}}">Opções</a></li>
                </ul>
            </div>
        </div>
        <div class="col2">
            @yield('conteudo')  <!--  Incorpora o título de quem exteder esse layout  -->
        </div>
    </div>
</body>
</html>