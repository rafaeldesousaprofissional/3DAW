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
		

		<button action="calculadora.php" name="valor" value="soma">Soma</button><br><br>
		
		<button action="calculadora.php" name="valor" value="subtracao">Subtracao</button><br><br>
		
		<button action="calculadora.php" name="valor" value="divisao">Divisao</button><br><br>
		
		<button action="calculadora.php" name="valor" value="multiplicacao">Multiplicacao</button><br><br>
		<?php

		$valor= $_GET["valor"];
		$v1= $_GET["op1"];
		$v2= $_GET["op2"];

		switch($valor){

		case "soma":   
					$result = $v1+$v2;
					break;
		case "subtracao":
					$result = $v1-$v2;
					break;
		case "multiplicacao":
					$result = $v1*$v2;
					break;
		case "divisao":
					$result = $v1/$v2;
					break;
		}

		echo "<h1>Resuldado: $result </h1>";
				   
				?>
				
		</div>
    </body>
</html>