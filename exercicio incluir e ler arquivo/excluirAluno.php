<?php
        $arquivoAlunoIn = fopen("aluno.txt", "r") or die("erro ao abrir arquivo");
        $arqDisc = fopen("alunoN.txt","w") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);
        $matricula = $_POST["matricula"];
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excluir Aluno</title>
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
<h1>Excluir Aluno</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
$matricula = $_POST["matricula"];
echo "<h2>Excluido com sucesso</h2>";


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
copy("alunoN.txt","aluno.txt");

fclose($arquivoAlunoIn);
fclose($arqDisc);
unlink('alunoN.txt');

}


?>
</body>
</html>