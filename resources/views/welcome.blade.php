@extends('adminlte::page')

@section('title', 'Bem vindo!!!')

@section('content_header')
<div class="text-dark"> 
    <h1>Seja bem vindo ao nosso sistema!!!  </h1>
    </br>
</div>
<div>

</br><h5><p>Temos o orgulho de oferecer um sistema responsivo e de fácil utilização,</p>
    <p>para tornar a sua experiencia a mais vantajosa possivel. </p>
    <p> Nesse sistema é possível:</p>
    <li>Cadastrar</li> 
    <li>Editar</li> 
    <li>Remover</li></br> 
    <p>Isso é possível para as classes:</p> 
    <li>Clientes</li>
    <li>Veículos</li> 
    <li>Dados das Revisões</li> </br>
    <p>Também disponibilizamos gráficos para tornara leitura dos dados adquiridos mais simples e rápida!!!</p></h5>
</div>
    </br>
    </br>
    
@stop

@section('content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
  