<?php
    $sala = $_POST["sala"];
    $cpf1 = $_POST["cpf1"];
    $cpf2 = $_POST["cpf2"];

    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "KeyFalls";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    $comandoSQL = "INSERT INTO `salas` (num_sala,cpf_fiscal_1,cpf_fiscal_2) values ('$sala','$cpf1',$cpf2)";
    $resultado = $conn->query($comandoSQL);

    $retorno=json_encode($resultado);
    echo $retorno;
?>