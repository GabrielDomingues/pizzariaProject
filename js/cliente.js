function cliente(){
    "use strict";
    this.url = "service/cliente.service.php";
    
    this.listarCliente = function(tbody){
        tbody.empty();
        $.ajax({
            url : this.url
        }).done(function(dados){
            $.each(dados, function(key, val){
               
                
                var tr = $("<tr />");
                tr.append($("<td />").text(val.cliente_id));
                tr.append($("<td />").text(val.cliente_nome));
                tr.append($("<td />").text(val.cliente_telefone));
                tr.append($("<td />").text(val.cliente_endereco));
                
                var btnAlterar = $("<a />").attr({
                    class : "btn-floating right",
                    title : "Alterar Registro",
                    href : "#modalAlterar"
                });
                
                var icone = $("<i />").attr("class", "mdi-content-create");
                var btnAlterar;
                btnAlterar.append(icone);
                btnAlterar.click(function(){
                    cliente.abrirAlteraCliente(val.cliente_id, $("#formAlterar"));
                });
                
                var btnExcluir = $("<a />").attr({
                    class : "btn-floating right excluirCliente",
                    title : "Excluir Cliente",
                    href : "#"
                });
                
                icone = $("<i />").attr("class", "mdi-content-clear");
                var btnExcluir;
                btnExcluir.append(icone);
                btnExcluir.click(function(){
                    cliente.excluir(val.cliente_id);
                });
                
                
                var tdBotoes = $("<td />");
                
                tdBotoes.append(btnAlterar);
                tdBotoes.append(btnExcluir);
                tr.append(tdBotoes);
                tbody.append(tr);
            });
        });
    }
    this.excluir = function (idcliente){
        if(confirm("Tem certeza que deseja excluir?")){
            $.ajax({
                url : this.url + "?passo=excluir&idcliente="+idcliente
            }).done(function(){
                cliente.listarCliente(tblCliente.find("tbody"));
            });
        }
    }
    this.cadastrar = function (form){
        $.post(
            this.url+"?passo=cadastrar", form.serialize()
        )
        .done(function(data){
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalCadastro").closeModal();
                
                cliente.listarCliente(tblCliente.find("tbody"));
            }
            alert(data.msg);
        });
    }
    
    this.abrirAlteraCliente = function(cliente_id, form){
        
        $("#cpalterar-idcliente").val(cliente_id);
        
        $.ajax({
            url : this.url + "?passo=dadosCliente&idcliente=" + cliente_id
        }).done(function(data){
            $("#cpalterar-nomecliente").val(data[0].cliente_nome);
            $("#cpalterar-telefonecliente").val(data[0].cliente_telefone);
            $("#cpalterar-enderecocliente").val(data[0].cliente_endereco);
            
            $("#modalAlterar").openModal();
        });
    }
    
//    this.procurarCliente =function(cliente_telefone,form){
//        
//        $("#cpachar-telefonecliente").val(cliente_telefone);
//        
//        $.ajax({
//            url : this.url + "?passo=acharCliente&telefonecliente=" + cliente_telefone
//        }).done(function(data){
//            $("#cpachar-fretecliente").val(data[0].cliente_frete);
//        });
//        
//    }
    
    this.procurarCliente = function(cliente_telefone,form){
        
        cliente_telefone = $("#cpachar-telefonecliente").val();
        $.ajax({
            url : this.url +"?passo=acharCliente&telefonecliente=" + cliente_telefone
        }).done(function(acharCliente){
            $.each(acharCliente, function(key, val){
               
               $("#cpachar-telefonecliente").val(acharCliente[0].cliente_telefone);
               $("#cpachar-nomecliente").val(acharCliente[0].cliente_nome);
               $("#cpachar-fretecliente").text(val(acharCliente[0].cliente_frete));
                
//                var tr = $("<tr />");
//                tr.append($("<td />").text(val.cliente_id));
//                tr.append($("<td />").text(val.cliente_nome));
//                tr.append($("<td />").text(val.cliente_telefone));
//                tr.append($("<td />").text(val.cliente_endereco));
            });
        });
//        $.ajax({
//            url : this.url + "?passo=acharCliente&telefonecliente=" + cliente_telefone
//        }).done(function(data){
//            $("#cpachar-telefonecliente").val(data[0].cliente_telefone);
//            $("cpachar-nomecliente").val(data[0].cliente_nome);
//            $("#cpachar-fretecliente").val(data[0].cliente_frete);
//
//        });
    }
    
    this.executaAlteracao = function (form){
        $.post(
            this.url+"?passo=alterar", form.serialize()
        )
        .done(function(data){
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalAlterar").closeModal();
                
                cliente.listarCliente(tblCliente.find("tbody"));
            }
            alert(data.msg);
        });
    }
    
    this.cadastrar = function (form){
        $.post(
            this.url+"?passo=cadastrar", form.serialize()
        )
        .done(function(data){
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalCadastro").closeModal();
                
                cliente.listarCliente(tblCliente.find("tbody"));
            }
            alert(data.msg);
        });
    }
    
}


