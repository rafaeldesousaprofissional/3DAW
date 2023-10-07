<?php
        $arqProduto = fopen("../Produto.txt", "r") or die("erro ao abrir arquivo");
        $arqTemp = fopen("Temp.txt","w") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arqProduto);
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alterar Produto</title>
</head>
<body>
    <h1>Alterar Produto:</h1>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];

        echo
        "<form action ='AlterarProduto.php' method='GET'>
           <input type='text' name='idNovo' value='$id'>
            <input type='text' name='nomeNovo' value='$nome'>
            <input type='text' name='valorNovo' value='$valor'>
            <input type='hidden' name='id' value='$id'>
            <input type='submit' value='Alterar'></button> <br>   
        </form>";
    }
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')  {
$id = $_GET["id"];

$idNovo = $_GET["idNovo"];
$nomeNovo = $_GET["nomeNovo"];
$valorNovo = $_GET["valorNovo"];

while (!feof($arqProduto)) {
			$linhas[] = fgets($arqProduto);
			$colunaDados = explode(";", $linhas[$x]);

			if($id != $colunaDados[0]){

                $linha = "id;nome;valor\n";
                $linha = $colunaDados[0] . ";" . $colunaDados[1] . ";" . $colunaDados[2];
                fwrite($arqTemp,$linha);
            }
            else{
                $linha = "id;nome;valor\n";
                $linha = $idNovo . ";" . $nomeNovo . ";" . $valorNovo ."\n";
                fwrite($arqTemp,$linha);
            }
			$x++;
}
copy("Temp.txt","../Produto.txt");

fclose($arqProduto);
fclose($arqTemp);
unlink('Temp.txt');
}

?>

<a href="ListaProduto.php">voltar a Lista</a>

</body>
</html>