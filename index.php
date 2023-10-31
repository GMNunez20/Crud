<?php session_start(); ?>
<html>
<head>
	<title>Página principal</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		¡Bienvenido a mi página!
	</div>
	<?php
	if(isset($_SESSION['valido'])) {			
		include("conexion.php");					
		$resultado = mysqli_query($mysqli, "SELECT * FROM cliente");
	?>
				
		¡Bienvenido <?php echo $_SESSION['nombre'] ?>! <a href='cerrar.php'>Cerrar sesión</a><br/>
		<br/>
		<a href='ver.php'>Ver y agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debes iniciar sesión para ver esta página.<br/><br/>";
		echo "<a href='iniciar.php'>Iniciar sesión</a> | <a href='registro.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
	<a href=""></a>
		Creado por <a title="Mukesh Chapagain"> <a href="https://gmnunez20.github.io/lotesdecarros/">Gael Alberto Molina Nuñez</a></a>
	</div>
</body>
</html>
