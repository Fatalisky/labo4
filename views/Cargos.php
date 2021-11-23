<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "../models/Cargos.php";
	include "../controllers/CtrlCargos.php";
	include "../controllers/CtrlConexion.php";

	$idc = isset($_POST['txtIdCargo']) ? $_POST['txtIdCargo']:NULL;
	$nom = isset($_POST['txtNombre']) ? $_POST['txtNombre']:NULL;		
	$bot = isset($_POST['btn']) ?  $_POST['btn']:NULL;

	switch ($bot) {
		case 'Guardar':
		$objCargos = new Cargos("", $nom);
		$objCtrlCargos = new CtrlCargos($objCargos);
		$objCtrlCargos->guardar();
		break;

		case 'Consultar':
		$objCargos = new Cargos($idc,"");
		$objCtrlCargos = new CtrlCargos($objCargos);
		$objCargos = $objCtrlCargos->consultar();
		$nom=$objCargos->getNombre();		
		
			
		break;

		case 'Modificar':
		$objCargos = new Cargos($idc,$nom);
		$objCtrlCargos = new CtrlCargos($objCargos);
		$objCtrlCargos->modificar();
		break;

		case 'Borrar':
		$objCargos = new Cargos($idc,""	);
		$objCtrlCargos = new CtrlCargos($objCargos);
		$objCtrlCargos->borrar();
		break;
		
		default:
			# code...
			break;
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Cargos</title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	<link href="../css/estilos3.css" type="text/css" rel="stylesheet">
	

</head>
<body>
	<div class="container">		
	<?php 
		session_start();
		include "../rol.php"  ?>   
		<header class="cabecera-principal">
			<div id=contenedor-cabecera>
				<img id="logo" src="../img/logo1.jpg" alt="Logo Responsive">
			</div>
			<nav class="nav-principal">
				<ul>
					<li><a href="../index.php">Inicio</a></li>
	                <li><a href="vistaEquipo.php">Equipo</a></li>
	                <li><a href="vistaServicios.php">Servicios</a></li>                                    
	                <li aling=right class="cerrar-sesion">
	                <a href="../includes/CerrarSesion.php">Cerrar Sesion</a>					
				</ul>
			</nav>
		</header>
	<form method='post' action='vistaCargos.php'>		

		<table class='form-table'  style='margin: 50px auto;' >
			<thread class='thead-dark'>
				<td colspan='2'><h1>Cargos</h1></td>				
			</thread>
			<tr>
				<td><h4>id Cargo</h4></td>
				<td><input class='form-control' type='text' name='txtIdCargo' value='<?php echo $idc ?>'>
				</td>
			</tr>
			<tr>
				<td><h4>Nombre Cargo</h4></td>
				<td><input class='form-control' type='text' name='txtNombre' value='<?php echo $nom ?>' >
				</td>
			</tr>					
		</table>
		<table class='form-table' style='margin: 50px auto;'>
			<tr>
				<td><input class='btn btn-success' type='submit' name='btn' value='Guardar'></td>
				<td><input class='btn btn-info' type='submit' name='btn' value='Consultar'></td>
				<td><input class='btn btn-warning' type='submit' name='btn' value='Modificar'></td>
				<td><input class='btn btn-danger' type='submit' name='btn' value='Borrar'></td>
			</tr>			
		</table>
		<table class='form-table' style='margin: 50px auto;'>
			<tr>
				<td><a class='btn btn-primary' href='../index.php' role='button'>Regresar</a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>


