<?php
if(!file_exists("../Produto.txt")){
    $arqProduto = fopen("../Produto.txt","w") or die("erro ao abrir arquivo");
        
    $linha = "Id;Nome;Valor\n";
    fwrite($arqProduto,$linha);
    fclose($arqProduto);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $arqProduto = fopen("../Produto.txt","a+") or die("erro ao abrir arquivo");
        
    $linha = "id;nome;valor;quant\n";
    $linha = $id . ";" . $nome . ";" . $valor."\n";
    fwrite($arqProduto,$linha);
    fclose($arqProduto);
    echo "<h2>Adicionado com sucesso</h2>";
    echo "<h4>Aguarde o redirecionamento</h4>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Produto</title>
    <meta http-equiv="refresh" content="2; URL='ListaProduto.php'"/>
</head>
<body>

</body>
</html>
