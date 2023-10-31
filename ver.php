<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id_cliente=".$_SESSION['id_cliente']." ORDER BY id_ventas DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id ventas</td>
			<td>Id Ventas Cliente</td>
			<td>Id Empleado</td>
			<td>fecha venta</td>
			<td>precio total</td>
			<td>extras</td>
			<td>vin</td>
			<td>Descuento</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_ventas']."</td>";
			echo "<td>".$res['id_ventas_cliente']."</td>";
			echo "<td>".$res['id_empleado']."</td>";
			echo "<td>".$res['fecha_venta']."</td>";
			echo "<td>".$res['precio_total']."</td>";
			echo "<td>".$res['extras']."</td>";	
			echo "<td>".$res['vin']."</td>";
			echo "<td>".$res['descuento']."</td>";
			echo "<td><a href=\"editar.php?id_ventas=$res[id_ventas]\">Editar</a> | <a href=\"eliminar.php?id=$res[id_ventas]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
