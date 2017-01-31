var cliente = new cliente();
var tblCliente = $("#tblListar");
var btnCadastrarCliente = $("#btnCadastrarCliente");
var btnAlterarCliente = $("#btnAlterarCliente");
var btnCalcularFrete = $("#btnCalcularFrete");


(function($){
  $(function(){
      
      $('.modal-trigger').leanModal();
      
      cliente.listarCliente(tblCliente.find("tbody"));
      
      btnCadastrarCliente.click(function(){
         cliente.cadastrar($("#formCadastro"));
      });
      
      btnAlterarCliente.click(function(){
         cliente.executaAlteracao($("#formAlterar"));
      });
      
      btnCalcularFrete.click(function(){
         cliente.procurarCliente($("#formFrete"));
      });

  }); // end of document ready
})(jQuery); // end of jQuery name space