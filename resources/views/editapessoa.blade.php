@extends('adminlte::page')

@section('title', 'Editar Dados do cliente')

@section('content_header')
    <h1>Insira os dados abaixo: </h1>
@stop

@section('content')
<form method="POST" action="{{route('clientes.update', $pessoas->id)}}">
@csrf
@method('PUT')
<input class="form-control" type="text" name="a_name" id="a_name" placeholder="Nome do cliente: " required value="{{$pessoas->a_name}}">  </input></br>
<input class="form-control" type="text" name="n_cpf" id="n_cpf" onkeypress="return mask(event, this, '###.###.###-##')" minlenght="14" maxlength="14" placeholder=" Insira o CPF do cliente" required value="{{$pessoas->n_cpf}}">  </input></br>
        <input class="form-control" type="email"  name="email" id="email" placeholder="Email do cliente " required value="{{$pessoas->email}}">  </input></br>
        <div class="form-group">
            <label for="inputEmail3" class="text-dark" >Sexo: </label>

                <label class="radio-inline">
                    <input type="radio" value="Masculino" name="sexo" required> <span class="text-dark">Masculino  </span>
                </label>

                <label class="radio-inline">
                    <input type="radio" value="Feminino" name="sexo" required> <span class= "text-dark">Feminino </span>
                </label> 
                </div>
        <input class="form-control" type="integer" minlength="2" maxlength="2"  onkeypress="return onlynumber();" name="Data_de_nascimento" id="Data_de_nascimento" placeholder="Idade "required  value="{{$pessoas->Data_de_nascimento}}">  </input></br>
        <input class="form-control" type="text" name="Telefone" id="Telefone" onkeypress="return mask(event, this, '(##) # ####-####')" minlenght="16" maxlength="16" placeholder=" (DDD) 0 0000-0000" required value="{{$pessoas->Telefone}}">  </></br>
        
        <button type="submit" class="btn btn-success">Confirmar Edição</button>
        <a href="/clientes" type="button" class="btn btn-danger" data-dismiss="modal">Retornar</a>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
   <script>
function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}
</script>
    <script> console.log('Hi!'); </script>
@stop