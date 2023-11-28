<?php

    $nome = $_GET["nome"];
    $cpf = $_GET["cpf"];
    $sala = $_GET["sala"];


    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "KeyFalls";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "SELECT * from `Canditados`";
    $resultado = $conn->query($comandoSQL);

     $arrCanditados[] = array();
    $i = 0;
    While ($linha = $resultado->fetch_assoc()){
        $arrCanditados[$i] = $linha;
        $i++;
    }
    if ($resultado=true){
        $retorno=json_encode($arrCanditados);
    } else {
        $retorno=json_encode("DEU RUIM!😭😭");
    }

    echo $retorno;
?>