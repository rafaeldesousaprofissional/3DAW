<?php
        $id = "";
        $nome = "";
        $valor = "";
        $quant = "";
        $arqCarrinho= fopen("Carrinho.txt", "r") or die("erro ao abrir arquivo");
        $x = 0;
		$linhas[] = fgets($arqCarrinho);
        if(feof($arqCarrinho)){
            echo "<h1>Carrinho Vazio</h1>";
        }
        else{
            //tabela carrinho
            echo 
                "<h1>Carrinho</h1>
                <table>
                <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Quant</th>
                <th>Valor</th>
                <th>Subtotal</th>
                <th>Opção</th>
                </tr>";

        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrinho</title>
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

<a href="ListarProdutos.php">Adicionar mais produtos?</a>

<?php
while (!feof($arqCarrinho)) {
            $linhas[] = fgets($arqCarrinho);
			$colunaDados = explode(";", $linhas[$x]);
			$id = $colunaDados[0];
            $nome = $colunaDados[1];
            $quant = $colunaDados[2];
			$valor = $colunaDados[3];

            $subtotal = 0;
            $subtotal = $quant * $valor;
            $total += $subtotal;
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome  . "</td>";
            echo "<td>" . $quant . "</td>";
            echo "<td>R$" . $valor . "</td>";
            echo "<td>R$" . $subtotal ."</td>";
            echo "<td> <form action ='RemoverCarrinho.php' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' value='Remover'></button> <br>
            </form> </td>";
            echo "</tr>";
			$x++;
}

//total produtos
echo
"<table>
<tr>
<th>Total: </th>
<th>R$ $total </th>         
</tr>";

fclose($arqCarrinho);
?>
</body>
</html>