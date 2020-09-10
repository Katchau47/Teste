@extends('adminlte::page')

@section('title', 'Tabela de pessoas')

@section('content_header')
    <h1>Tabelas relacionadas aos clientes: </h1>
@stop

@section('content')
</br></br>
<div class="container-fluid">
<h4>Sexo Masculino</h4> 
</div></br>

<div class="container-fluid">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Sexo</th>
      <th scope="col">Idade</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($pesm as $pessoas)
    <tr>
      <td scope="row">{{$pessoas->a_name}}</td>
      <td>{{$pessoas->sexo}}</td>
      <td>{{$pessoas->Data_de_nascimento}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>

</div></br>
</br>

<div class="container-fluid">
<h4>Sexo Feminino</h4> 
</div></br>

<div class="container-fluid">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Sexo</th>
      <th scope="col">Idade</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($pesf as $pessoas)
    <tr>
      <td scope="row">{{$pessoas->a_name}}</td>
      <td>{{$pessoas->sexo}}</td>
      <td>{{$pessoas->Data_de_nascimento}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>
</br></br>


<div class="container">
<h4>Média de Idade</h4> 
</div></br>

<div class="container">
<a href="clientes/grafico">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Sexo</th>
      <th scope="col">Número de clientes</th>
      <th scope="col">Média de idade</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($Med as $pessoas)
    <tr>
      <td scope="row">{{$pessoas->sexo}}</td>
      <td>{{$pessoas->N}}</td>
      <td>{{$pessoas->sum}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>
</br></br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop