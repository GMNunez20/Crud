<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id = $_POST['id_ventas'];
	$id_ventas_cliente = $_POST['id_ventas_cliente'];
	$id_empleado = $_POST['id_empleado'];
	$fecha_venta = $_POST['fecha_venta'];
	$precio_total = $_POST['precio_total'];
	$extras = $_POST['extras'];
	$vin = $_POST['vin'];
	$descuento = $_POST['descuento'];

	// Verificar campos vacíos
	if (empty($id_ventas_cliente) || empty($id_empleado) || empty($fecha_venta) || empty($precio_total) || empty($extras) || empty($vin) || empty($descuento)) {
		if (empty($id_ventas_cliente)) {
			echo "<font color='red'>El campo de cantidad en stock está vacío.</font><br/>";
		}

		if (empty($id_empleado)) {
			echo "<font color='red'>El campo de tallas disponibles está vacío.</font><br/>";
		}

		if (empty($fecha_venta)) {
			echo "<font color='red'>El campo de fecha_venta está vacío.</font><br/>";
		}

		if (empty($precio_total)) {
			echo "<font color='red'>El campo de precio de compra está vacío.</font><br/>";
		}

		if (empty($extras)) {
			echo "<font color='red'>El campo de precio de venta está vacío.</font><br/>";
		}

		if (empty($vin)) {
			echo "<font color='red'>El campo de nombre del producto está vacío.</font><br/>";
		}

		if (empty($descuento)) {
			echo "<font color='red'>El campo de fecha de reposición está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE ventas SET id_ventas_cliente='$id_ventas_cliente', id_empleado='$id_empleado', fecha_venta='$fecha_venta', precio_total='$precio_total', extras='$extras', vin='$vin', descuento='$descuento' WHERE id_ventas='$id'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id = $_GET['id_ventas'];

if ($id != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id_ventas=$id");

	while ($res = mysqli_fetch_array($resultado)) {
		$id_ventas = $res['id_ventas'];
		$id_ventas_cliente = $res['id_ventas_cliente'];
		$id_empleado = $res['id_empleado'];
		$fecha_venta = $res['fecha_venta'];
		$precio_total = $res['precio_total'];
		$extras = $res['extras'];
		$vin = $res['vin'];
		$descuento = $res['descuento'];
	}
} else {
	echo "ID de producto no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>ID Ventas</td>
				<td><input type="text" name="id_ventas" value="<?php echo $descuento; ?>"></td>
			</tr>
			<tr>
				<td>Id Ventas Cliente</td>
				<td><input type="text" name="id_ventas_cliente" value="<?php echo $id_ventas_cliente; ?>"></td>
			</tr>
			<tr>
				<td>Id Emplead</td>
				<td><input type="text" name="id_empleado" value="<?php echo $id_empleado; ?>"></td>
			</tr>
			<tr>
				<td>fecha_venta</td>
				<td><input type="date" name="fecha_venta" value="<?php echo $fecha_venta; ?>"></td>
			</tr>
			<tr>
				<td>Precio Total</td>
				<td><input type="text" name="precio_total" value="<?php echo $precio_total; ?>"></td>
			</tr>
			<tr>
				<td>Extras</td>
				<td><input type="text" name="extras" value="<?php echo $extras; ?>"></td>
			</tr>
			<tr>
				<td>Vin</td>
				<td><input type="number" name="vin" value="<?php echo $vin; ?>"></td>
			</tr>
			<tr>
				<td>descuento</td>
				<td><input type="number" name="descuento" value="<?php echo $descuento; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_ventas" value=<?php echo $_GET['id_ventas']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>