@extends('adminlte::page')

@section('title', 'Dados dos clientes')

@section('content_header')
<div class="text"> <h1>Dados dos Clientes </h1></div>
@stop

@section('content')

    <div class="text mt-5">

<!-- Inicio da chamada do modal -->
    <button class="btn btn-success" data-toggle="modal" data-target="#cadastrocliente">+ Cadastrar Novo </button> 

    <div class="modal fade" id="cadastrocliente" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- Fim da chamada do modal -->
      </div>
     <!-- Inicio da função de envio dos dados ao servidor -->
      <form action="{{action('ClientController@store')}}" method="POST" > 

        {{@csrf_field()}}
 <!-- Inicio do Corpo do modal -->
      <div class="modal-body">
        <input class="form-control" type="text" name="a_name" id="a_name" placeholder="Nome do cliente: " required>  </input></br>
        <input class="form-control" type="text" name="n_cpf" id="n_cpf" onkeypress="return mask(event, this, '###.###.###-##')" minlenght="14" maxlength="14" placeholder=" Insira o CPF do cliente" required> </input></br>
        <input class="form-control" type="email"  name="email" id="email" placeholder="Email do cliente " required>  </input></br>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Sexo: </label>

                <label class="radio-inline">
                    <input type="radio" value="Masculino" name="sexo" required> <span class="label label-info">Masculino</span>
                </label>

                <label class="radio-inline">
                    <input type="radio" value="Feminino" name="sexo" required> <span class= "label label-warning">Feminino </span>
                </label> 
                </div>
        <input class="form-control" type="text" onkeypress="return onlynumber();" maxlength="2" name="Data_de_nascimento" id="Data_de_nascimento" placeholder="Idade do cliente "required>  </input></br>
        <input class="form-control" type="text" name="Telefone" id="Telefone" onkeypress="return mask(event, this, '(##) # ####-####')" minlenght="16" maxlength="16" placeholder=" (DDD) 00000-0000"required>
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
</div>
<!-- Fim da função de envio dos dados ao servidor -->

<!-- Inicio da declaração da tabela -->
<div class= col-8 m-auto></div>
{{@csrf_field()}}
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Email</th>
      <th scope="col">Sexo</th>
      <th scope="col">Idade</th>
      <th scope="col">Telefone</th>
      <th scope="col">Cadastrado em:</th>
      <th scope="col">Ultima atualização</th>
      <th>
      </th>
    </tr>
  </thead>
  <!-- Fim da declaração da tabela -->

  <!-- Inicio do corpo da tabela -->
  <tbody>

<!-- Pesquisa de dados no BD -->
    @foreach($pessoas as $pessoa)
    <tr>
      <th scope="row">{{$pessoa->id}}</th>
      <td>{{$pessoa->a_name}}</td>
      <td>{{$pessoa->n_cpf}}</td>
      <td>{{$pessoa->email}}</td>
      <td>{{$pessoa->sexo}}</td>
      <td>{{$pessoa->Data_de_nascimento}}</td>
      <td>{{$pessoa->Telefone}}</td>
      <td>{{$pessoa->created_at}}</td>
      <td>{{$pessoa->updated_at}}</td>
      <td>

         <a href="{{url("clientes/$pessoa->id/edit")}}">
              <button class="btn btn-outline-warning"> Editar</button>
          </a>
         
          <a  class="js-del" href="{{url("clientes/$pessoa->id")}}">
              <button class="btn btn-outline-danger"> Deletar</button>
          </a>
          
      </td>
    </tr>
    @endforeach
<!-- Fim Pesquisa de dados no BD -->
    
  </tbody>
  <!-- Fim do corpo da tabela -->
</table>
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
    <script src="{{url('assets/js/javascript.js')}}"></script>
@stop