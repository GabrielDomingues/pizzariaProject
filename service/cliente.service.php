<?php
    require('Db.class.php');

    $db = new Db;


    $passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';



    switch ($passo){
        case 'excluir' :{excluirCliente($db); break;}
        case 'alterar' :{alterarCliente($db); break;}
        case 'cadastrar' :{cadastrarCliente($db); break;}
        case 'dadosCliente' :{dadosCliente($db); break;}
        case 'procurar' :{acharCliente($db);break;}
        default : {listarCliente($db); break;}
    }


    function excluirCliente($db){
        $idCliente = (int) $_GET['idcliente'];
        $sql = sprintf('DELETE FROM
                            tb_cliente
                        WHERE
                            cliente_id = :IDCLIENTE');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':IDCLIENTE', $idCliente);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            $retorno = array (
                            "erro"=>true,
                            "msg" => "Nenhum registro excluído!"
                            );
        }else{
            $retorno = array (
                            "erro"=>false,
                            "msg" => "Registro excluído!"
                            );
        }
        response($retorno);
    }

    function alterarCliente($db){
        $idCliente = (int) $_POST['idcliente'];
        $nomeCliente = trim($_POST['nomecliente']);
        $telefoneCliente = trim($_POST['telefonecliente']);
        $enderecoCliente = trim($_POST['enderecocliente']);
        
        
        if($nomeCliente==""){
            response (array (
                            "erro"=>true,
                            "msg" => "O nome deve ser preenchido!"
                            ));
        }
        
        if($telefoneCliente==""){
            response (array(
                            "erro"=>true,
                            "msg"=> "O telefone deve ser preenchido!"
                            )); 
        }
        
        if($enderecoCliente==""){
            response (array(
                            "erro"=>true,
                            "msg"=> "O endereço deve ser preenchido!"
            ));
        }
        
        $string = str_replace (" ", "+", urlencode($enderecoCliente));
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
 
        // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
        if ($response['status'] != 'OK') {
        return null;
        }

        $geometry = $response['results'][0]['geometry'];
 
        $latitudeCliente = $geometry['location']['lat'];
        $longitudeCliente = $geometry['location']['lng'];
        
        $freteCliente = calculaFrete($latitudeCliente, $longitudeCliente);
        
        $sql = sprintf('UPDATE 
                            tb_cliente
                        SET
                            cliente_nome = :NOMECLIENTE,
                            cliente_telefone = :TELEFONECLIENTE,
                            cliente_endereco= :ENDERECOCLIENTE,
                            cliente_frete= :FRETECLIENTE,
                            cliente_longitude= :LONGITUDECLIENTE,
                            cliente_latitude= :LATITUDECLIENTE
                        WHERE
                            cliente_id = :IDCLIENTE');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':IDCLIENTE', $idCliente);
        $consulta->bindParam(':NOMECLIENTE', $nomeCliente);
        $consulta->bindParam(':TELEFONECLIENTE', $telefoneCliente);
        $consulta->bindParam(':ENDERECOCLIENTE', $enderecoCliente);
        $consulta->bindParam(':FRETECLIENTE', $freteCliente);
        $consulta->bindParam(':LONGITUDECLIENTE',$longitudeCliente);
        $consulta->bindParam(':LATITUDECLIENTE', $latitudeCliente);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            $retorno = array (
                            "erro"=>true,
                            "msg" => "Nenhum registro alterado!"
                            );
        }else{
            $retorno = array (
                            "erro"=>false,
                            "msg" => "Registro alterado!"
                            );
        }
        response($retorno);
        
        
        
    }
    function cadastrarCliente($db){
        $nomeCliente = trim($_POST['nomecliente']);
        $telefoneCliente = trim($_POST['telefonecliente']);
        $enderecoCliente = trim($_POST['enderecocliente']);
        
        
        if($nomeCliente==""){
            response (array (
                            "erro"=>true,
                            "msg" => "O nome deve ser preenchido!"
                            ));
        }
        
        if($telefoneCliente==""){
            response (array(
                            "erro"=>true,
                            "msg"=> "O telefone deve ser preenchido!"
                            )); 
        }
        
        if($enderecoCliente==""){
            response (array(
                            "erro"=>true,
                            "msg"=> "O endereço deve ser preenchido!"
            ));
        }
        
        $string = str_replace (" ", "+", urlencode($enderecoCliente));
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
 
        // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
        if ($response['status'] != 'OK') {
        return null;
        }

        $geometry = $response['results'][0]['geometry'];
 
        $latiudeCliente = $geometry['location']['lat'];
        $longitudeCliente = $geometry['location']['lng'];
        
        $freteCliente = calculaFrete($latiudeCliente, $longitudeCliente);
        
        $sql = sprintf('INSERT INTO tb_cliente
                            (cliente_nome, cliente_telefone,cliente_endereco,cliente_frete,cliente_longitude,cliente_latitude)
                        VALUES 
                            (:CLIENTENOME, :CLIENTETELEFONE, :CLIENTEENDERECO, :CLIENTEFRETE, :CLIENTELONGITUDE, :CLIENTELATITUDE)');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':CLIENTENOME', $nomeCliente);
        $consulta->bindParam(':CLIENTETELEFONE', $telefoneCliente);
        $consulta->bindParam(':CLIENTEENDERECO', $enderecoCliente);
        $consulta->bindParam(':CLIENTEFRETE', $freteCliente);
        $consulta->bindParam(':CLIENTELONGITUDE', $longitudeCliente);
        $consulta->bindParam(':CLIENTELATITUDE', $latiudeCliente);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            $retorno = array (
                            "erro"=>true,
                            "msg" => "Nenhum registro inserido!"
                            );
        }else{
            $retorno = array (
                            "erro"=>false,
                            "msg" => "Registro inserido!"
                            );
        }
        response($retorno);
    }

    function dadosCliente($db){
        $idCliente = (int) $_GET['idcliente'];
        $sql = sprintf('SELECT 
                            cliente_id,
                            cliente_nome,
                            cliente_telefone,
                            cliente_endereco
                        FROM
                            tb_cliente
                        WHERE
                            cliente_id = :IDCLIENTE');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':IDCLIENTE', $idCliente);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }
    
    function acharCliente($db){
        $telefoneCliente = trim($_POST['telefonecliente']);
        $sql = sprintf('SELECT 
                            cliente_id,
                            cliente_telefone,
                            cliente_frete
                        FROM
                            tb_cliente
                        WHERE
                            cliente_telefone = :TELEFONECLIENTE');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':TELEFONECLIENTE', $telefoneClienteCliente);
        $consulta->execute();
        if($consulta->rowCount()==0){
            $retorno = array (
                            "erro"=>true,
                            "msg" => "Nenhum registro encontrado!"
                            );
        }else{
            $retorno = array (
                            "erro"=>false,
                            "msg" => "Registro encontrado!"
                            );
        }
        
        response($retorno);
    }

    function listarCliente($db){
        $sql = sprintf('SELECT 
                            cliente_id,
                            cliente_nome,
                            cliente_telefone,
                            cliente_endereco
                        FROM
                            tb_cliente');
        $consulta = $db->con->prepare($sql);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function response ($dados){
        header("Content-type: application/json");
        echo json_encode($dados);
        exit;
    }
    
    function calculaFrete($lat2,$long2){
        $lat1 = -20.457997;
        $long1 = -54.587305;
        $d2r = 0.017453292519943295769236;

        $dlong = ($long2 - $long1) * $d2r;
        $dlat = ($lat2 - $lat1) * $d2r;

        $temp_sin = sin($dlat/2.0);
        $temp_cos = cos($lat1 * $d2r);
        $temp_sin2 = sin($dlong/2.0);

        $a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
        $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

        $frete = 6368.1 * $c;
        
        if($frete > 0 && $frete<5){
            $freteCliente = 2.00;
        }else if($frete>5 && $frete<10){
            $freteCliente = 3.00;
        }else if($frete>10 && $frete<15){
            $freteCliente = 4.00;
        } else if($frete>15 && $frete<20){
            $freteCliente = 5.00;
        } else {
            $freteCliente = 7.00;
        }
        
        return($freteCliente);
    }


?>