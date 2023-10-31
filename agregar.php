<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_ventas = $_POST['id_ventas'];
	$id_ventas_cliente = $_POST['id_ventas_cliente'];
	$id_empleado = $_POST['id_empleado'];
	$fecha_venta = $_POST['fecha_venta'];
	$precio_total = $_POST['precio_total'];
	$extras = $_POST['extras'];
	$vin = $_POST['vin'];
	$descuento = $_POST['descuento'];
	$id_cliente = $_SESSION['id_cliente']; // ID de usuario obtenido de la sesión

	if(empty($id_ventas) || empty($id_ventas_cliente) || empty($id_empleado) || empty($fecha_venta) || empty($precio_total) || empty($extras) || empty($vin) || empty($descuento)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO ventas (id_ventas, id_ventas_cliente, id_empleado, fecha_venta, precio_total, extras, vin, descuento, id_cliente) VALUES ('$id_ventas', '$id_ventas_cliente', '$id_empleado', '$fecha_venta', '$precio_total', '$extras', '$vin', '$descuento', '$id_cliente')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
