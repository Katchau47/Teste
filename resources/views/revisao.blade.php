@extends('adminlte::page')

@section('title', 'Cadastro de revisões')

@section('content_header')
    <h1>Dados das revisões </h1>
@stop

@section('content')
<div class="text mt-5">
<!-- Inicio da chamada do modal -->

<button class="btn btn-success" data-toggle="modal" data-target="#cadastrorevisao">+ Cadastrar Novo </button> 

    <div class="modal fade" id="cadastrorevisao" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Revisão</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <!-- Fim da chamada do modal -->
  </div>
 <!-- Inicio da função de envio dos dados ao servidor -->
  <form action="{{action('RevController@store')}}" method="POST" > 

    {{@csrf_field()}}

<!-- Inicio do Corpo do modal -->
  <div class="modal-body">

      <!--Seleção do carro  -->
   <select class="form-control" name="carro" id="carro" required>
        <option value="">Selecione o carro revisado</option>
        @foreach($carros as $carro)
            <option value="{{$carro->placa}}">{{$carro->placa}} - {{$carro->modelo}}</option>
        @endforeach
    </select></br>

        <!--Quilometragem -->
    <input class="form-control" type="number" name="fabricante" id="fabricante" placeholder="Digite a quilometragem do veículo" required></input></br>

    <!--estado da lataria  -->
<div class="form-group">
        <a class="col-6 col-md-4">O veículo apresenta sinais de colisão? </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>
    <label class="radio-inline">
            <input type="radio" value="Sim" name="cpf" required> <span class="label label-info">Sim</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Não" name="cpf" required> <span class= "label label-warning">Não </span>
        </label> 
</div>
   
        <!-- Botão rádio -->
    <div class="form-group">
        <a class="col-6 col-md-4">Estado dos pneus: </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>

        <label class="radio-inline">
            <input type="radio" value="Ótimo" name="pneus" required> <span class="label label-info">Ótimo</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Bom" name="pneus" required> <span class= "label label-warning">Bom </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Regular" name="pneus" required> <span class="label label-info">Regular</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Ruim" name="pneus" required> <span class= "label label-warning">Ruim </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Péssimo" name="pneus" required> <span class= "label label-warning">Péssimo </span>
        </label> 
    </div>
            <!-- Fim Botão rádio -->

            <!-- Botão rádio -->
        <div class="form-group">
        <a class="col-6 col-md-4">Estado do motor: </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>

        <label class="radio-inline">
            <input type="radio" value="Ótimo" name="motor" required> <span class="label label-info">Ótimo</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Bom" name="motor" required> <span class= "label label-warning">Bom </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Regular" name="motor" required> <span class="label label-info">Regular</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Ruim" name="motor" required> <span class= "label label-warning">Ruim </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Péssimo" name="motor" required> <span class= "label label-warning">Péssimo </span>
        </label> 
    </div>
            <!-- Fim Botão rádio -->

            <!-- Botão rádio -->
        <div class="form-group">
        <a class="col-6 col-md-4">Estado dos freios: </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>

        <label class="radio-inline">
            <input type="radio" value="Ótimo" name="freios" required> <span class="label label-info">Ótimo</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Bom" name="freios" required> <span class= "label label-warning">Bom </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Regular" name="freios" required> <span class="label label-info">Regular</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Ruim" name="freios" required> <span class= "label label-warning">Ruim </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Péssimo" name="freios" required> <span class= "label label-warning">Péssimo </span>
        </label> 
    </div>
            <!-- Fim Botão rádio -->

        <!-- Botão rádio -->
    <div class="form-group">
    <a class="col-6 col-md-4">Estado da suspensão: </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>

        <label class="radio-inline">
            <input type="radio" value="Ótimo" name="suspensao" required> <span class="label label-info">Ótimo</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Bom" name="suspensao" required> <span class= "label label-warning">Bom </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Regular" name="suspensao" required> <span class="label label-info">Regular</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Ruim" name="suspensao" required> <span class= "label label-warning">Ruim </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Péssimo" name="suspensao" required> <span class= "label label-warning">Péssimo </span>
        </label> 
    </div>
            <!-- Fim Botão rádio -->

            <!-- Botão rádio -->
    <div class="form-group">
    <a class="col-6 col-md-4">Estado da iluminação: </a>
        <label for="inputEmail3" class="col-sm-2 control-label"></label></br>

        <label class="radio-inline">
            <input type="radio" value="Ótimo" name="iluminacao" required> <span class="label label-info">Ótimo</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Bom" name="iluminacao" required> <span class= "label label-warning">Bom </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Regular" name="iluminacao" required> <span class="label label-info">Regular</span>
        </label>

        <label class="radio-inline">
            <input type="radio" value="Ruim" name="iluminacao" required> <span class= "label label-warning">Ruim </span>
        </label> 

        <label class="radio-inline">
            <input type="radio" value="Péssimo" name="iluminacao" required> <span class= "label label-warning">Péssimo </span>
        </label> 
    </div>
            <!-- Fim Botão rádio -->

        <a class="col-6 col-md-4"></a>
    <span> Preço da revisão: </span>
        <input class="dinheiro form-control" type="text"  name="preco" id="preco" placeholder="Preco da revisão " required>  </input></br>
        </div>
        <!-- Fim do Corpo do modal -->

  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
    </div>
  </div>
</form>
<!-- Fim da função de envio dos dados ao servidor -->

</div>
<div class= col-8 m-auto></div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Placa do Carro</th>
      <th scope="col">Sinais de colisão recente?</th>
      <th scope="col">Quilometragem rodada</th>
      <th scope="col">Pneus</th>
      <th scope="col">Motor</th>
      <th scope="col">Freios</th>
      <th scope="col">Suspensão</th>
      <th scope="col">Iluminação</th>
      <th scope="col">Preço</th>
      <th scope="col">Criado</th>
    </tr>
  </thead>
  <tbody>

    @foreach($revisao as $revisaos)
    <tr>
      <th scope="row">{{$revisaos->id}}</th>
      <td>{{$revisaos->carro}}</td>
      <td>{{$revisaos->cpf}}</td>
      <td>{{$revisaos->fabricante}} KM</td>
      <td>{{$revisaos->pneus}}</td>
      <td>{{$revisaos->motor}}</td>
      <td>{{$revisaos->freios}}</td>
      <td>{{$revisaos->suspensao}}</td>
      <td>{{$revisaos->iluminacao}}</td>
      <td>R$ {{$revisaos->preco}}</td>
      <td>{{$revisaos->created_at}}</td>
      <td>
            
        <a href="{{url("revisao/$revisaos->id/edit")}}">
              <button class="btn btn-outline-warning"> Editar</button>
        </a>

          <a class="js-del" href="{{url("revisao/$revisaos->id")}}">
              <button class="btn btn-outline-danger"> Deletar</button>
          </a>
      </td>
    </tr>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
    $('.dinheiro').mask('#.##0,00', {reverse: true});
    </script>
    <script src="{{url('assets/js/javascriptrev.js')}}"></script>

@stop