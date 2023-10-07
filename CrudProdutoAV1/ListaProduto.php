<?php
        $id = "";
        $nome = "";
        $valor = "";
        $quant = "";
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

<?php
 if (file_exists("../Produto.txt")) { 
    $arqProduto= fopen("../Produto.txt", "r");
    $linhas[] = fgets($arqProduto);
    $x = 1;
    echo "<table>
    <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Opções</th>
    
    </tr>";
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
                echo "<td> <form action ='RemoverProduto.php' method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='submit' value='Remover'></button> <br>
                </form>

                <form action ='AlterarProduto.php' method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='nome' value='$nome'>
                <input type='hidden' name='valor' value='$valor'>
                <input type='submit' value='Alterar'></button> <br>
                </form> 

                </td>";
                echo "</tr>";
                $x++;
                $linhas[] = fgets($arqProduto);
    }
fclose($arqProduto);
}
else{
    echo "<h2>Lista vazia</h2>";
}
?>
<h2>Adicionar Produto:</h2>
    <form action ="AdicionarProduto.php" method="POST">
        <input type="text" name="id" value="id">
        <input type="text" name="nome" value="nome">
        <input type="text" name="valor" value="valor">
        <input type="submit" value="Adicionar"></button> <br>   
    </form><br><br>
<h2>Buscar Produto:</h2>
    <form action ="BuscarProduto.php" method="POST">
        <input type="text" name="id" value="id">
        <input type="submit" value="Buscar"></button> <br>   
    </form><br><br>
</body>
</html>