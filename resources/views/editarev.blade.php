@extends('adminlte::page')

@section('title', 'Editar Dados do cliente')

@section('content_header')
    <h1>Insira os dados abaixo: </h1>
@stop

@section('content')
<form method="POST" action="{{route('revisao.update', $revisao->id)}}">
@csrf
@method('PUT')
     <!--Seleção do carro  -->
   <select class="form-control" name="carro" id="carro" required>
        <option value="">Selecione o carro revisado</option>
        @foreach($carros as $carro)
            <option value="{{$carro->placa}}">{{$carro->placa}} - {{$carro->modelo}}</option>
        @endforeach
    </select></br>

        <!--Seleção de kilometragem  -->
        <span>Kilometragem </span>
        <input class="form-control" type="number" name="fabricante" id="fabricante" placeholder="Digite a quilometragem do veículo" value="{{$revisao->fabricante}}" required></select></br>

        <!--estado da lataria  -->
<div class="form-group">
        <a>O veículo apresenta sinais de colisão? </a>
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
        <a class="col-6 col-md-4">Estado dos pneus</a>
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
        <a class="col-6 col-md-4">Estado do motor</a>
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
        <a class="col-6 col-md-4">Estado dos freios</a>
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
    <a class="col-6 col-md-4">Estado da suspensão</a>
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
    <a class="col-6 col-md-4">Estado da iluminação</a>
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
    <span> Preço da revisão </span>
    <input class="dinheiro form-control" type="text"  name="preco" id="preco" placeholder="Preco da revisão " required value="{{$revisao->preco}}">  </input></br>
        
    <button type="submit" class="btn btn-success">Confirmar Edição</button>
        <a href="/carros" type="button" class="btn btn-danger" data-dismiss="modal">Retornar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
    $('.dinheiro').mask('#.##0,00', {reverse: true});
    </script>
    <script> console.log('Hi!'); </script>
@stop