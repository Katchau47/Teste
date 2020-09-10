@extends('adminlte::page')

@section('title', 'Cadastro de carros')

@section('content_header')
    <h1>Dados dos veículos:  </h1>
@stop

@section('content')

<div class="text mt-5">
<!-- Inicio da chamada do modal -->

<button class="btn btn-success" data-toggle="modal" data-target="#cadastrocarro">+ Cadastrar Novo </button> 

    <div class="modal fade" id="cadastrocarro" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo veículo</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <!-- Fim da chamada do modal -->
  </div>
 <!-- Inicio da função de envio dos dados ao servidor -->
  <form action="{{action('CarController@store')}}" method="POST" > 

    {{@csrf_field()}}

<!-- Inicio do Corpo do modal -->
  <div class="modal-body">
  <span> Selecione o proprietário </span>
   <select class="form-control" name="proprietario" id="proprietario" required>
        @foreach($cliente as $clientes)
            <option value="{{$clientes->n_cpf}}">{{$clientes->a_name}} - {{$clientes->n_cpf}}</option>
        @endforeach
    </select></br>

    <input class="form-control" type="text" name="placa" onkeyup="validarPlaca(this)" placeholder="Digite a placa do carro" minlenght="8" maxlength="8" autofocus id="placa" placeholder="Digite a placa do carro" required>  </input></br>
    <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Digite o modelo do carro " required>  </input></br>
    <input class="form-control" type="integer" minlenght="4" maxlength="4" name="ano" id="ano" placeholder="Digite o ano de fabricação do veículo "required>  </input></br>
    <input class="form-control" type="text" name="n_fabricante" id="n_fabricante" placeholder="Digite a marca do carro" required>  </input></br>
    <input class="form-control" type="varchar" onkeypress="return onlynumber();" minlenght="11" maxlength="11" name="Renavan" id="Renavan" placeholder=" Digite o Renavam " required>  </input></br>
  </div>
  <!-- Fim do Corpo do modal -->

  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </div>
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
      <th scope="col">Modelo</th>
      <th scope="col">Placa</th>
      <th scope="col">Proprietário</th>
      <th scope="col">Ano</th>
      <th scope="col">Marca</th>
      <th scope="col">Renavan</th>
      <th scope="col">Cadastrado</th>
      <th scope="col">Ultima atualização</th>
    </tr>
  </thead>
  <tbody>

    @foreach($carros as $carro)
    <tr>
      <th scope="row">{{$carro->id}}</th>
      <td>{{$carro->modelo}}</td>
      <td>{{$carro->placa}}</td>
      <td>{{$carro->proprietario}}</td>
      <td>{{$carro->ano}}</td>
      <td>{{$carro->n_fabricante}}</td>
      <td>{{$carro->Renavan}}</td>
      <td>{{$carro->created_at}}</td>
      <td>{{$carro->updated_at}}</td>
      <td>

          <a href="{{url("carros/$carro->id/edit")}}">
              <button class="btn btn-outline-warning"> Editar</button>
          </a>

          <a class="js-del" href="{{url("carros/$carro->id")}}">
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
<script>
function validarPlaca(entradaDoUsuario) {
        var placa = entradaDoUsuario.value; // Passa para a variável 'placa' o que o usuário digitar no formulário
        
        if (placa.length === 1 || placa.length === 2) {                       // Quando a string possuir 1 ou 2 dígitos
                placaMaiuscula = placa.toUpperCase();                      // Passa a string para letras maiúsculas
                document.forms[0].placa.value = placaMaiuscula;    // Coloca a string modificada de volta no formulário
                return true;
        }
 
        if (placa.length === 3){                                                        // Quando a string possuir 3 dígitos
                placa += "-";                                                                 // Adiciona um hífen
                placaMaiuscula = placa.toUpperCase();                   // Passa a string para letras maiúsculas
                document.forms[0].placa.value = placaMaiuscula; // Coloca a nova string de volta no formulário
                return true;
    }
}
</script>

<script>
function onlynumber(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /^[0-9.]+$/;
  if( !regex.test(key) ) {
     theEvent.returnValue = false;
     if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
  </script>
    <script> console.log('Hi!'); </script>
    <script src="{{url('assets/js/javascriptcarro.js')}}"></script>
@stop