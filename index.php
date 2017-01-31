<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Sistema Pizzaria</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Pizzaria</a>
      </div>  
      <div class="container">
        <div class="row">
            <div class="col s12">
            
                <a class="waves-effect waves-light btn-large right modal-trigger" href="#modalCadastro"><i class="mdi-file-add-circle-outline right"></i>Cadastrar Cliente</a>
                <a class="waves-effect waves-light btn-large right modal-trigger" href="#modalFrete"><i class="mdi-file-add-circle-outline right"></i>Calcular Frete</a>
                
            </div>
            
        </div>
      </div>
     </nav> 
      <div class="container">
        <div class="row">
            <div class="col s12">
               <table class="striped" id="tblListar">
                <thead>
                  <tr>
                      <th data-field="id">ID</th>
                      <th data-field="name">Nome</th>
                      <th data-field="email">Telefone</th>
                      <th data-field="endereço">Endereço</th>
                      <th data-field="acoes" width="140">-</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div>
          </div>
      </div>

    <!-- Modal Structure -->
  <div id="modalCadastro" class="modal madal-fixed-footer">
    <div class="modal-content">
      <h4>Cadastro Cliente</h4>
      <div class="row">
    <form class="col s12" id="formCadastro">
      <div class="row">
        <div class="input-field col s4">
          <input  id="nomeprofessor" name="nomecliente" type="text" class="validate" required>
          <label for="nomecliente">Nome</label>
        </div>
        <div class="input-field col s4">
            <input id="telefonecliente" name="telefonecliente"type="text" class="validate" required>
          <label for="telefonecliente">Telefone</label>
        </div>
        <div class="input-field col s4">
            <input id="endereço" name="enderecocliente" type="text" class="validade" required>
            <label for="enderecocliente">Endereço</label>            
        </div>
      </div>
      
      
    </form>
  </div>
    </div>
    <div class="modal-footer">
        
        <a href="#" class=" modal-action waves-effect waves-green btn-flat" id="btnCadastrarCliente">Confirmar</a>
        
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar / Fechar</a>
    </div>
  </div>
  
  <!--Modal Structure -->
  <div id="">
      
  </div>
    
     <!-- Modal Structure -->
  <div id="modalAlterar" class="modal madal-fixed-footer">
    <div class="modal-content">
      <h4>Alterar Cliente</h4>
      <form class="col s12" id="formAlterar">
      <div class="row">
        <div class="input-field col s4">
            <input  id="cpalterar-nomecliente" placeholder="" name="nomecliente" type="text" class="validate" required>
            <label for="cpalterar-nomecliente">Nome</label>
        </div>
        <div class="input-field col s4">
            <input id="cpalterar-telefonecliente" placeholder="" name="telefonecliente" type="text" class="validate" required>
            <label for="cpalterar-telefonecliente">Telefone</label>
        </div>
        <div class="input-field col s4">
            <label for="cpalterar-enderecocliente">Endereço</label>
            <input id="cpalterar-enderecocliente" placeholder="" name="enderecocliente" type="text" class="validade" required>
        </div>
      </div>
          <input id="cpalterar-idcliente" name="idcliente" type="hidden" value="0" >
        
      
      
    </form>
    </div>
    <div class="modal-footer">
         <a href="#" class=" modal-action waves-effect waves-green btn-flat" id="btnAlterarCliente">Confirmar</a>
        
        
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar / Fechar</a>
    </div>
  </div>
     
     <!-- Modal Structure -->
  <div id="modalFrete" class="modal madal-fixed-footer">
    <div class="modal-content">
      <h4>Calcular Frete</h4>
      <div class="row">
    <form class="col s12" id="formFrete">
      <div class="row">
          <div class="input-field col s6">
            <input  id="cpachar-telefonecliente" placeholder="" name="telefonecliente" type="text" class="validate" required>
            <label for="cpachar-telefone">Telefone</label>
          </div>
          <div class="input-field col s4">
            <input id="cpachar-fretecliente" placeholder="" name="fretecliente" type="text" class="validate">
            <label for="cpachar-fretecliente">Frete</label>
          </div>
        
      </div>
      
      
    </form>
          <input id="cpachar-idcliente" name="idcliente" type="hidden" value="0" >
  </div>
    </div>
    <div class="modal-footer">
        
        <a href="#" class=" modal-action waves-effect waves-green btn-flat" id="btnCalcularFrete">Calcular Frete</a>
        
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar / Fechar</a>
    </div>
  </div>

  <!--  Scripts-->
  <script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/cliente.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
