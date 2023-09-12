<?php
        $nome = "";
        $email = "";
        $idade = "";
		$msg = "";
        $encontrou = "";
        $arquivoAlunoIn = fopen("aluno.txt", "r") or die("erro ao abrir arquivo");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);

?>
<!DOCTYPE html>
<html>
<head>
<title>Procuar Aluno</title>
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

while (!feof($arquivoAlunoIn)) {
			$linhas[] = fgets($arquivoAlunoIn);
			$colunaDados = explode(";", $linhas[$x]);

			if($matricula == $colunaDados[2]){
                $encontrou=1;

                echo "<table>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Email</th>";
                echo "<th>Matricula</th>";
                echo "<th>Idade</th>";
                echo "</tr>";
                echo "<h3>Aluno Encontrado</h3>";
            
              
            echo "<tr>";
            echo "<td>" . $colunaDados[0] . "</td>";
            echo "<td>" . $colunaDados[1] . "</td>";
            echo "<td>" . $colunaDados[2] . "</td>";
            echo "<td>" . $colunaDados[3] . "</td>";
            echo "</tr>";
            break;
            }
			$x++;
}

if($encontrou==1){

    echo "<form action ='excluirAluno.php' method='POST'>
    Deseja excluir esse aluno ? <br><br>
    <button type='submit' name='matricula' value='$matricula'>Excluir</button> <br>
    </form> ";

    echo "<form action ='alterarAluno.php' method='POST'>
    Deseja alterar esse aluno ? <br><br>
    <button type='submit' name='matricula' value='$matricula'>Alterar</button>
    </form> ";
 
    }

}

fclose($arquivoAlunoIn);
?>
</body>
</html>