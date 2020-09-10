@extends('adminlte::page')

@section('title', 'Relatório E')

@section('content_header')
    <h1>Tabelas relacionadas aos carros: </h1>
@stop

@section('content')
    <!-- Tabela 1 -->
</br></br>
<div class="container-fluid">
<h4>Marcas portadas por clientes do sexo Masculino</h4> 
</div></br>

<div class="container-fluid">
<a href="carros/grafico4">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Quantidade</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($marcam as $carro)
    <tr>
      <td scope="row">{{$carro->n_fabricante}}</td>
      <td>{{$carro->N}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>

</br></br>
<div class="container-fluid">
<h4>Marcas portadas por clientes do sexo Feminino</h4> 
</div></br>

<div class="container-fluid">
<a href="carros/grafico5">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Quantidade</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 2 -->
    @foreach($marcaf as $marc)
    <tr>
      <td scope="row">{{$marc->n_fabricante}}</td>
      <td>{{$marc->N}}</td>
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