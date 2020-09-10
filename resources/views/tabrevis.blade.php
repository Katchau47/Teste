@extends('adminlte::page')

@section('title', 'Cadastro de revisões')

@section('content_header')
    <h1>Consultas relacionadas as revisões </h1>
@stop

@section('content')
    <!-- Tabela 1 -->
</br></br>
<div class="container-fluid">
<h4>Marcas com maior número de revisões</h4> 
</div></br>

<div class="container-fluid">
<a href="revisao/grafico">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Nº de revisões</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($marca as $carro)
    <tr>
      <td scope="row">{{$carro->marca}}</td>
      <td>{{$carro->N}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>

   <!-- Tabela 2 -->
   </br></br>
<div class="container-fluid">
<h4>Pessoas com maior número de revisões</h4> 
</div></br>

<div class="container-fluid">
<a href="revisao/grafico2">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
        <th scope="col">Cpf do proprietário</th>
        <th scope="col">Nº de revisões</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 2 -->
    @foreach($proprietario as $pessoa)
    <tr>
        <td scope="row">{{$pessoa->proprietario}}</td>
        <td>{{$pessoa->N}}</td>

      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop