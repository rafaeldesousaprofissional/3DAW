<?php
    $busca = $_POST["id"];
    $arqProduto= fopen("../Produto.txt", "r");
    $linhas[] = fgets($arqProduto);
    $x = 1;
    $achou = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buscar Produto</title>
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
<h1>Produto</h1>

<?php
    $linhas[] = fgets($arqProduto);
    while (!feof($arqProduto)) {
                $colunaDados = explode(";", $linhas[$x]);
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];
                if($busca == $id){
                    $achou = 1;
                    break;
                }
                
                $x++;
                $linhas[] = fgets($arqProduto);
    }
    if($achou){
        echo "<table>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Opções</th>
        </tr>";
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
    }
    else{
        echo "<h3>Produto Não Encontrado</h3>";
    }
fclose($arqProduto);
?>
<a href="ListaProduto.php">Voltar a lista</a>
</body>
</html>