<?php
        $arqCarrinho = fopen("Carrinho.txt", "r") or die("erro ao abrir arquivo");
        $arqTemp = fopen("Temp.txt","w") or die("erro ao criar arquivo");
        $x = 0;
		$linhas[] = fgets($arqCarrinho);
        $id = $_POST["id"];
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remover do Carrinho</title>
    <meta http-equiv="refresh" content="3; URL='ListarCarrinho.php'"/>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
$id = $_POST["id"];
echo "<h2>Removido com sucesso</h2>";
echo "<h4>Aguarde o redirecionamento</h4>";


while (!feof($arqCarrinho)) {
			$linhas[] = fgets($arqCarrinho);
			$colunaDados = explode(";", $linhas[$x]);

			if($id != $colunaDados[0]){

                $linha = "id;nome;valor;quant\n";
                $linha = $colunaDados[0] . ";" . $colunaDados[1] . ";" . $colunaDados[2] . ";" .  $colunaDados[3];
                fwrite($arqTemp,$linha);
            }
			$x++;
}
copy("Temp.txt","Carrinho.txt");

fclose($arqCarrinho);
fclose($arqTemp);
unlink('Temp.txt');

}


?>

</body>
</html>