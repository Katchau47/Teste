@extends('adminlte::page')

@section('title', 'Tabela de carros')

@section('content_header')
    <h1>Tabelas relacionadas aos carros </h1>
@stop

@section('content')
<!-- Tabela 1 -->

</br></br>
<div class="container-fluid">
<h4>Todos os carros por pessoa</h4> 
</div></br>



<div class="container-fluid">
<a href="carros/grafico1">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Proprietário</th>
      <th scope="col">Placa</th>
      <th scope="col">Modelo</th>
    </tr>
  </thead>
  <tbody>
<!-- Alimentação da tabela 1 -->
    @foreach($carros as $carro)
    <tr>
      <td scope="row">{{$carro->a_name}}</td>
      <td>{{$carro->placa}}</td>
      <td>{{$carro->modelo}}</td>
      @endforeach
    </tr>
    </tbody>
    </table>
</div></br>

<div class="container-fluid">
<h4>Quantidade de carros portados (por sexo)</h4> 
</div></br>

<div class="position-relative">
<div class="container-fluid">
<a href="carros/grafico2">
    <button class="btn btn-primary"> Ver gráfico</button>
</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sexo</th>
      <th scope="col">Quantidade de carros</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Masculino</td>
      <td>{{$nm}}</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Feminino</td>
      <td>{{$nf}}</td>
    </tr>
  </tbody>
</table>
</div>
</div>


<!-- Tabela 3 -->
</br></br>
<div class="container-fluid">
<h4>Quantidade de carros de cada marca</h4> 
</div></br>

<div class="container-fluid">
<a href="carros/grafico3">
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
<!-- Alimentação da tabela 3 -->
    @foreach($marca as $marc)
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