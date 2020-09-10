@extends('adminlte::page')

@section('title', 'Editar Dados do cliente')

@section('content_header')
    <h1>Insira os dados abaixo: </h1>
@stop

@section('content')
<form method="POST" action="{{route('carros.update', $carros->id)}}">
@csrf
@method('PUT')
<select class="form-control" name="proprietario" id="proprietario" required>
<option value="{{$carros->proprietario}}">Selecione o proprietário</option>
@foreach($pessoas as $pessoa)
    <option value="{{$pessoa->n_cpf}}">{{$pessoa->a_name}} - {{$pessoa->n_cpf}}</option>
@endforeach
</select></br>

<input class="form-control" type="text" name="placa" onkeyup="validarPlaca(this)" placeholder="Digite a placa do carro" minlenght="8" maxlength="8" autofocus id="placa" placeholder="Digite a placa do carro" required value="{{$carros->placa}}">  </input></br>
<input class="form-control" type="text" name="modelo" id="modelo" placeholder="Digite o modelo do carro " required value="{{$carros->modelo}}">  </input></br>
<input class="form-control" type="integer" maxlength="4" name="ano" id="ano" placeholder="Digite o ano de fabricação do veículo "required value="{{$carros->ano}}">  </input></br>
<input class="form-control" type="text" name="n_fabricante" id="n_fabricante" placeholder="Digite a marca do carro" required value="{{$carros->n_fabricante}}">  </input></br>
<input class="form-control" type="varchar" onkeypress="return onlynumber();" minlenght="11" maxlength="11" name="Renavan" id="Renavan" placeholder=" Digite o Renavam " required value="{{$carros->Renavan}}">  </input></br>
</div>
        
    <button type="submit" class="btn btn-success">Confirmar Edição</button>
        <a href="/carros" type="button" class="btn btn-danger" data-dismiss="modal">Retornar</a>
    </form>
    
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
@stop