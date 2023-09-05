<?php
        $nome = "";
        $email = "";
        $idade = "";
		$msg = "";
        $arquivoAlunoIn = fopen("aluno.txt", "r") or die("erro ao abrir arquivo");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);

?>
<!DOCTYPE html>
<html>
<head>
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
<h1>Buscar Aluno</h1>
<h3>Entre com a matricula do aluno que deseja encontrar:</h3>
<form action="procurarAluno.php" method="POST">
    Matricula: <input type="text" name="matricula">
    <br><br>
    <input type="submit" value="Procurar Aluno">

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
$matricula = $_POST["matricula"];
echo "<table>";
echo "<tr>";
echo "<th>Nome</th>";
echo "<th>Email</th>";
echo "<th>Matricula</th>";
echo "<th>Idade</th>";
echo "</tr>";
echo "<h3>Aluno(s) Encontrado(s)</h3>";
while (!feof($arquivoAlunoIn)) {
			$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);

			if($matricula == $colunaDados[2]){
                echo "<p>Aluno n°" . $x+1 . " na lista</p>";
              
            echo "<tr>";
            echo "<td>" . $colunaDados[0] . "</td>";
            echo "<td>" . $colunaDados[1] . "</td>";
            echo "<td>" . $colunaDados[2] . "</td>";
            echo "<td>" . $colunaDados[3] . "</td>";
            echo "</tr>";
            }
			$x++;
}
}

fclose($arquivoAlunoIn);
?>
</body>
</html>