<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "../models/Areas.php";
	include "../controllers/CtrlAreas.php";
	include "../controllers/CtrlConexion.php";
	include "../models/Empleados.php";
	include "../controllers/CtrlEmpleados.php";


	$objEmpleados = new Empleados("","","","","");
	$objCtrlEmpleados = new CtrlEmpleados($objEmpleados);
	
	

	$ida = isset($_POST['txtIdArea']) ? $_POST['txtIdArea']:null;
	$nom = isset($_POST['txtNombre']) ?$_POST['txtNombre']:null;
	$fke = isset($_POST['txtFkEmple_Jefe']) ? $_POST['txtFkEmple_Jefe']:null;	
	$bot = isset($_POST['btn']) ?$_POST['btn']:null;
	$matriz = $objCtrlEmpleados->comboBoxEmplea($ida);

	switch ($bot) {
		case 'Guardar':
		$objAreas = new Areas($ida, $nom, $fke);
		$objCtrlAreas = new CtrlAreas($objAreas);
		$objCtrlAreas->guardar();
		break;

		case 'Consultar':
		$objAreas = new Areas($ida,"","");
		$objCtrlAreas = new CtrlAreas($objAreas);
		$objAreas = $objCtrlAreas->consultar();
		$nom=$objAreas->getNombre();		
		$fke=$objAreas->getFkEmple_Jefe();		
			
		break;

		case 'Modificar':
		$objAreas = new Areas($ida, $nom, $fke);
		$objCtrlAreas = new CtrlAreas($objAreas);
		$objCtrlAreas->modificar();
		break;

		case 'Borrar':
		$objAreas = new Areas($ida,"","");
		$objCtrlAreas = new CtrlAreas($objAreas);
		$objCtrlAreas->borrar();
		break;
		
		default:
			# code...
			break;
	}


	
	?>
	
	<!DOCTYPE html>
<html>
<head>
	<title>HelpMe-Áreas</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="../css/estilos3.css" type="text/css" rel="stylesheet">
	

</head>
<body>

<?php 
		session_start();
		include "../rol.php"  ?>
	<div class="container">		   
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
	<form method="POST" action="vistaAreas.php">		

		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>Áreas</h1></td>				
			</thread>
			<tr>
				<td><h4>id Área</h4></td>
				<td><input class="form-control" type="text" name="txtIdArea" value="<?php echo $ida?>">
				</td>
			</tr>
			<tr>
				<td><h4>Nombre Área</h4></td>
				<td><input class="form-control" type="text" name="txtNombre" value="<?php echo $nom ?>" >
				</td>
			</tr>			
			<tr>
				<td><h4>Jefe De Area</h4></td>
				<td><select class="form-control" name="txtFkEmple_Jefe">
				
				<?php

				
				foreach ($matriz as $row){ 					
					echo'
					
					<option value='.$row->getIdEmpleado().'>'.$row->getNombre().'</option>' ;

				}
				?>
				
			
			  </select>
				</td>
			</tr>				
		</table>
		<table class="form-table" style="margin: 50px auto;">
			<tr>
				<td><input class="btn btn-success" type="submit" name="btn" value="Guardar"></td>
				<td><input class="btn btn-info" type="submit" name="btn" value="Consultar"></td>
				<td><input class="btn btn-warning" type="submit" name="btn" value="Modificar"></td>
				<td><input class="btn btn-danger" type="submit" name="btn" value="Borrar"></td>
			</tr>			
		</table>
		<table class="form-table" style="margin: 50px auto;">
			<tr>
				<td><a class="btn btn-primary" href="../index.php" role="button">Regresar</a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>


