<?php
//6 – Faça um programa que receba dois números. Um será o valor inicial e o outro será o final. Utilizando a função range() do php mostre a //lista destes números (inicial até o final) através de um foreach.
			$x = $_GET['x'];
			$y = $_GET['y'];
			$number = range($x,$y);
			foreach ($number as $n ){
			echo $n . " ";
}

?>

<html>
	<head>
		
	</head>
	<body>
		<form method="GET" action="prova.php">
			<input type="number" name="x">
			<input type="number" name="y">
			<button type="submit">
				enviar
			</button><br>
			
			
		</form>
	</body>
</html>

