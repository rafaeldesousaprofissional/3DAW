<?php
        $nome = "";
        $email = "";
        $matricula = "";
        $idade = "";
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
<h1>Listar Novo Aluno</h1>
<table>
<tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Matricula</th>
    <th>Idade</th>
</tr>
<?php
while (!feof($arquivoAlunoIn)) {
			$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);
			$nome = $colunaDados[0];
			$email = $colunaDados[1];
			$matricula = $colunaDados[2];
            $idade = $colunaDados[3];
            echo "<tr>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $matricula . "</td>";
            echo "<td>" . $idade . "</td>";
            echo "</tr>";
			$x++;
}
fclose($arquivoAlunoIn);
?>
</body>
</html>