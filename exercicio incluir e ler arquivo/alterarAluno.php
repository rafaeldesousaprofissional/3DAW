<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $matricula = $_POST["matricula"];
        $nomeN = $_POST["nomeN"];
        $emailN = $_POST["emailN"];
        $matriculaN = $_POST["matriculaN"];
        $idadeN = $_POST["idadeN"];
		$msg = "";
}
        $arquivoAlunoIn = fopen("aluno.txt", "r") or die("erro ao abrir arquivo");
        $arqDisc = fopen("alunoN.txt","w") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Alterar Aluno</title>
     <style>
        table, th, td {
            text-align:center;
            border: 2px solid black;
            border-collapse: collapse;
            font-size: 20px;
        }
    </style>
</head>
<body>

<h1>Alterar Aluno</h1>
<form action="alterarAluno.php" method="POST">
    Nome: <input type="text" name="nomeN">
    <br><br>
    Email: <input type="text" name="emailN">
    <br><br>
    Matricula: <input type="text" name="matriculaN">
    <br><br>
    Idade: <input type="text" name="idadeN">
    <br><br>
    <?php echo" <button type='submit' name='matricula' value='$matricula'>Alterar</button>";?>
</form>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

    while (!feof($arquivoAlunoIn)) {
        $linhas[] = fgets($arquivoAlunoIn);
        $colunaDados = explode(";", $linhas[$x]);

        if($matricula != $colunaDados[2]){

            $linha = "nome;email;matricula;idade\n";
            $linha = $colunaDados[0] . ";" . $colunaDados[1] . ";" . $colunaDados[2] . ";" .  $colunaDados[3];
            fwrite($arqDisc,$linha);
        }
        $x++;
    }
        $linha = $nomeN . ";" . $emailN . ";" . $matriculaN . ";" .  $idadeN . "\n";
        fwrite($arqDisc,$linha);
}
copy("alunoN.txt","aluno.txt");
fclose($arquivoAlunoIn);
fclose($arqDisc);
unlink('alunoN.txt');

?>
</body>
</html>