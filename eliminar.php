<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include("conexion.php");

$id = $_GET['id'];

$resultado = mysqli_query($mysqli, "DELETE FROM ventas WHERE id_ventas=$id");

header("Location:ver.php");
?>