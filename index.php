<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Calculo</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
		}
		form {
			background: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		h3 {
			margin: 10px 0;
		}
		label {
			display: inline-block;
			width: 100px;
		}
		input[type="text"] {
			padding: 10px;
			width: calc(100% - 120px);
			border: 1px solid #ddd;
			border-radius: 4px;
		}
		input[type="submit"] {
			padding: 10px 20px;
			margin: 10px 5px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			color: #fff;
		}
		input[type="submit"]:nth-child(1) { background-color: #4CAF50; }
		input[type="submit"]:nth-child(2) { background-color: #f44336; }
		input[type="submit"]:nth-child(3) { background-color: #008CBA; }
		input[type="submit"]:nth-child(4) { background-color: #f0ad4e; }
		#result {
			margin-top: 20px;
			font-size: 1.2em;
		}
	</style>
	<script>
		function setOperation(operation) {
			document.getElementById('operation').value = operation;
			document.getElementById('calcForm').submit();
		}
	</script>
</head>
<body>

	<form id="calcForm" action="" method="POST">
		<h3><label>1er valor:</label>
		<input type="text" name="n1" id="n1" required></h3>

		<h3><label>2do valor:</label>
		<input type="text" name="n2" id="n2" required></h3>

		<input type="hidden" name="operation" id="operation">

		<div>
			<input type="button" value="Sumar" onclick="setOperation('sumar')" style="background-color: #4CAF50;">
			<input type="button" value="Restar" onclick="setOperation('restar')" style="background-color: #f44336;">
			<br>
			<input type="button" value="Dividir" onclick="setOperation('dividir')" style="background-color: #008CBA;">
			<input type="button" value="Multiplicar" onclick="setOperation('multiplicar')" style="background-color: #f0ad4e;">
		</div>
	</form>

	<div id="result">
		<?php 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$n1 = isset($_POST['n1']) ? floatval($_POST['n1']) : 0;
				$n2 = isset($_POST['n2']) ? floatval($_POST['n2']) : 0;
				$operation = $_POST['operation'];
				$result = '';

				switch($operation) {
					case 'sumar':
						$result = 'Tu sumatoria es: ' . ($n1 + $n2);
						break;
					case 'restar':
						$result = 'Tu resta es: ' . ($n1 - $n2);
						break;
					case 'dividir':
						if ($n2 != 0) {
							$result = 'Tu división es: ' . ($n1 / $n2);
						} else {
							$result = 'No se puede dividir entre cero';
						}
						break;
					case 'multiplicar':
						$result = 'Tu multiplicación es: ' . ($n1 * $n2);
						break;
					default:
						$result = 'Operación no válida';
						break;
				}

				echo $result;
			}
		?>
	</div>

</body>
</html>
