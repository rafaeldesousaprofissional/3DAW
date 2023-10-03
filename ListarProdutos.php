<?php
        $id = "";
        $nome = "";
        $valor = "";
        $quant = "";
        $arqProduto= fopen("Produto.txt", "r") or die("erro ao abrir arquivo");
        $x = 1;
		$linhas[] = fgets($arqProduto);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista Produtos</title>
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
<h1>Lista Produtos</h1>
<table>
<tr>
    <th>id</th>
    <th>Nome</th>
    <th>Valor</th>
    <th>Adicionar</th>
</tr>
<?php
$linhas[] = fgets($arqProduto);
while (!feof($arqProduto)) {
			$colunaDados = explode(";", $linhas[$x]);
			$id = $colunaDados[0];
            $nome = $colunaDados[1];
			$valor = $colunaDados[2];
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome  . "</td>";
            echo "<td>" . $valor . "</td>";
            echo "<td> <form action ='AdicionarCarrinho.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='nome' value='$nome'>
            <input type='hidden' name='valor' value='$valor'>
            <input type='number' name='quant' value='$quant' min='1' style='width:30px;'>
            <input type='submit' value='Adicionar'></button> <br>
            </form> </td>";
            echo "</tr>";
			$x++;
            $linhas[] = fgets($arqProduto);
}
fclose($arqProduto);
?>
</body>
</html>