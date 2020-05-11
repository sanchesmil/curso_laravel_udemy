<!-- Define um Componente de Alerta -->

<div class="box {{$tipo}}">
    <div class="title">{{$titulo}}</div>

    <!-- Obs.: A variável '$slot' é criada automaticamente e traz TODO o conteúdo de quem chamou o componente--> 
    <div class="msg">{{$slot}}</div> 
</div>