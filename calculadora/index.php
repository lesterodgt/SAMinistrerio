<?php
	require("funciones.php");

	$op = "";
	$par1 = "";
	$par2 = "";

	$error = false;
	$mensaje_par1 = "";
	$mensaje_par2 = "";
	$mensaje_op = "";

	if(isset($_POST["op"]))
	{
		if(!empty($_POST["op"]))
		{
			$op = trim($_POST["op"]);
		}
		else
		{
			$error = true;
			$mensaje_op = "<br>Ingrese el Operador";
		}
	}
	
	if(isset($_POST["par1"]))
	{
		if(trim($_POST["par1"]) != "")
		{
			$par1 = intval($_POST["par1"], 10);
		}
		else
		{
			$error = true;
			$mensaje_par1 = "<br>Ingrese Par�metro 1";
		}
	}

	if(isset($_POST["par2"]))
	{
		if(trim($_POST["par2"]) != "")
		{
			$par2 = intval($_POST["par2"], 10);
		}
		else
		{
			$error = true;
			$mensaje_par2 = "<br>Ingrese Par�metro 2";
		}
	}

	$resultado = "";
	if(!$error)
	{
		switch($op)
		{
			case "+": $resultado = sumar($par1, $par2); break;
	
			case "-": $resultado = restar($par1, $par2); break;

			case "*": $resultado = multiplicar($par1, $par2); break;
	
			case "/": 
				if($par2 != 0)
				{
					$resultado = dividir($par1, $par2);
				}
				else
				{
					$resultado = "ERR Divisi�n por 0";
				}; break;

			default: $resultado = "Ingrese la Operaci�n";
		}
	}
	else
	{
		$resultado = "Faltan Par�metros";
	}
?>
<html>
<head>
	<title>Calculadora</title>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	
	<style type="text/css">
		.cuadroBordeGrueso
		{
			border: solid 		
		}	
	</style>
</head>
<body>
  <h1 align="center">CALCULADORA</h1>
  <form action="calculadora.php" method="POST">

    <table border="1" align="center" width="400px" cellpadding="4">	
    <tr>		
	<td><b>Par�metro 1:</b></td>
	<td>
		<input type="text" name="par1" value="<?php echo $par1;?>" class="inputText">
		<font color="red"><?php echo $mensaje_par1;?></font>
	</td>
    </tr>
    <tr>		
	<td><b>Par�metro 2:</b></td>
	<td>
		<input type="text" name="par2" value="<?php echo $par2;?>" class="inputText">
		<font color="red"><?php echo $mensaje_par2;?></font>
	</td>
    </tr>
    <tr>		
	<td><b>Operador:</b></td>
	<td>
		<input type="text" name="op" value="<?php echo $op;?>" class="inputText">
		<font color="red"><?php echo $mensaje_op;?></font>
	</td>
    </tr>
    <tr>		
	<td colspan="2" align="center">
	  <input type="submit" name="enviar" value="Resultado" class="inputSubmit">
	</td>
    </tr>
    <tr>
	<td colspan="2" align="center">
	  <input type="text" name="res" size="40" value="<?php echo $resultado;?>" class="inputText">
	</td>
    </tr>
    </table>

  </form>
</body>
</html>