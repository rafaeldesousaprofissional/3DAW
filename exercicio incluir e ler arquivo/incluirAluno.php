<?php
    $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $matricula = $_POST["matricula"];
    $idade = $_POST["idade"];
    $msg = "";
    echo "nome: " . $nome . " email: " . $email . "matricula: " .$matricula . " idade: " . $idade;
    $arqDisc = fopen("aluno.txt","a") or die("erro ao criar arquivo");
    $linha = "nome;email;matricula;idade\n";
    $linha = $nome . ";" . $email . ";" . $matricula . ";" .  $idade . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
    $msg = "Salvo com sucesso";
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Criar Novo Aluno</h1>
<form action="incluirAluno.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    Matricula: <input type="text" name="matricula">
    <br><br>
    Idade: <input type="text" name="idade">
    <br><br>
    <input type="submit" value="Criar Novo Aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>