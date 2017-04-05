<!DOCTYPE html>
<html lang="en">
<head>
	<!-- la ruta del proyecto -->
	<base href="<? php echo base_url(); ?>">
</head>
	
<body>
	<h1>Operaciones Básicas en CodeIgniter</h1>

<form class="" action="index.php/MiControlador/recibirdatos/" method="post">
		Teclea primer número:<input type="text" name="num1" >
		<br/><br/>
		Teclea segundo número:<input type="text" name="num2" >
	    <br/><br/>
	  <input type="submit" name="btnSuma"  value="Sumar">
	  <input type="submit" name="btnResta"  value="Restar">
	  <input type="submit" name="btnMultiplica"  value="Multiplicar">
	  <input type="submit" name="btnDivide"  value="Dividir">
</form>

</body>
</html>