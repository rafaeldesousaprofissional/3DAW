<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $quant = $_POST["quant"];
    $arqCarrinho = fopen("Carrinho.txt","a+") or die("erro ao abrir arquivo");
        
    $linha = "id;nome;valor;quant\n";
    $linha = $id . ";" . $nome . ";" . $quant . ";" . $valor;
    fwrite($arqCarrinho,$linha);
    fclose($arqCarrinho);
    $msg = "Produto Adicionado com sucesso";
    echo "<h2> $msg </h2>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar no Carrinho</title>
</head>
<body>
<h1>O que deseja fazer?</h1>
<a href="ListarProdutos.php">Adicionar mais produtos?</a>
<p>ou</p>
<a href="ListarCarrinho.php">Ver Carrinho</a>

</body>
</html>
