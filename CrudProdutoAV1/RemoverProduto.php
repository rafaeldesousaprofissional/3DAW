<?php
        $arqProduto = fopen("../Produto.txt", "r") or die("erro ao abrir arquivo");
        $arqTemp = fopen("Temp.txt","w") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arqProduto);
        $id = $_POST["id"];
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remover Produto</title>
    <meta http-equiv="refresh" content="2; URL='ListaProduto.php'"/>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
$id = $_POST["id"];
echo "<h2>Removido com sucesso</h2>";
echo "<h4>Aguarde o redirecionamento</h4>";


while (!feof($arqProduto)) {
			$linhas[] = fgets($arqProduto);
			$colunaDados = explode(";", $linhas[$x]);

			if($id != $colunaDados[0]){

                $linha = "id;nome;valor\n";
                $linha = $colunaDados[0] . ";" . $colunaDados[1] . ";" . $colunaDados[2];
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

</body>
</html>