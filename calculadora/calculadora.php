<html>
 <head>
 <title>Calculadora</title>
 <style>
 button {
 width:15%;
 height:5%;
 background-color:#1C1C1C;
 color: white;
 border-radius: 5px;
 border: solid 2px black;

 }
 button:hover{
 background-color:white;
 color: black;
 }
 </style>
 </head>
 <body style="text-align: center; background-color:#3B3B3B;color:white; ">

 <div style="margin-left:25%; width: 50%; border: solid 5px black; ">
 <h1>CALCULADORA</h1>
 <h2>Insira dois numeros</h2>
 <form action="calculadora.php" method="GET">
 <input type="text" name="op1" placeholder="1° numero" style="width: 20%; height: 5%;">
 <input type="text" name="op2" placeholder="2° numero" style="width: 20%; height: 5%;">
 <br/>
 <h3>Escolha a operação a ser realizada:</h3>


 <button action="calculadora.php" name="valor" value="0">Soma</button><br><br>

 <button action="calculadora.php" name="valor" value="1">Subtracao</button><br><br>

 <button action="calculadora.php" name="valor" value="2">Multiplicacao</button><br><br>

 <button action="calculadora.php" name="valor" value="3">Divisao</button><br><br>

 <button action="calculadora.php" name="valor" value="4">Potencia</button><br><br>

 <button action="calculadora.php" name="valor" value="5">Raiz</button><br><br>

 <button action="calculadora.php" name="valor" value="6">Seno</button><br><br>

 <button action="calculadora.php" name="valor" value="7">Coseno</button><br><br>

 <button action="calculadora.php" name="valor" value="8">Tangente</button><br><br>

 <button action="calculadora.php" name="valor" value="9">Log10</button><br><br>

 <?php

 $valor= $_GET["valor"];
 $v1= $_GET["op1"];
 $v2= $_GET["op2"];

 function soma($v1, $v2){
 return $v1 + $v2;
 }
 function subtracao($v1, $v2){
 return $v1 - $v2;
 }
 function multiplicacao($v1, $v2){
 return $v1 * $v2;
 }
 function divisao($v1, $v2){
 return $v1 / $v2;
 }

 switch($valor){

 case "0": $result = soma($v1, $v2);
 break;
 case "1": $result = subtracao($v1, $v2);
 break;
 case "2": $result = multiplicacao($v1, $v2);
 break;
 case "3": $result = divisao($v1, $v2);
 break;
 case "4": $result = pow($v1, $v2);
 break;
 case "5": $result = sqrt($v1);
 break;
 case "6": $result = sin($v1);
 break;
 case "7": $result = cos($v1);
 break;
 case "8": $result = tan($v1);
 break;
 case "9": $result = log10($v1);
 break;

 }
 echo "<h1>Resultado: $result </h1>";
 ?>

 </div>
 </body>
</html>