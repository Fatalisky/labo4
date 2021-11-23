<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include "../controllers/CtrlConexion.php";
	include "../models/Empleados.php";
	include "../controllers/CtrlEmpleados.php";
	include "../models/Areas.php";
	include "../controllers/CtrlAreas.php";
	include "../models/Cargos.php";
	include "../controllers/CtrlCargos.php";
	include "../models/CargoEmpleado.php";
	include "../controllers/CtrlCargoEmpleado.php";
	
	$objEmpleados = new Empleados("","","","","");
	$objCtrlEmpleados = new CtrlEmpleados  ($objEmpleados);
	
	$objAreas = new Areas("","","");
	$objCtrlAreas = new CtrlAreas($objAreas);
	
	$objCargos = new Cargos("","");
	$objControlCargos = new CtrlCargos($objCargos);

	$ide = isset($_POST['txtIdEmpleado']) ? $_POST['txtIdEmpleado']: null;
	$nom = isset($_POST['txtNombre']) ? $_POST['txtNombre']: null;
	$fke = isset($_POST['txtFkRmple']) ? $_POST['txtFkRmple']: null;
	$fki = isset($_POST['txtFkIdArea']) ? $_POST['txtFkIdArea']: null;
	$bot = isset($_POST['btn']) ? $_POST['btn']: null;

	$matrizCargo = $objControlCargos->comboBoxCargo($ide);
	$matriz = $objCtrlEmpleados->comboBoxJefe($ide);
	$matrizArea = $objCtrlAreas->comboBoxArea($ide);
	switch ($bot) {
		case 'Guardar':
		$objEmpleados = new Empleados($ide, $nom,$fke, $fki,1);
		$objCtrlEmpleados = new CtrlEmpleados($objEmpleados);
		$objCtrlEmpleados->guardar();

		date_default_timezone_set('America/Argentina');	
		$hoy = date('Y-m-d H:i:s');
     
		$objCargoEmpleado= new CargoEmpleado($car,$ide,$hoy,""); 
        $objCtrlCargoEmpleado = new CtrlCargoEmpleado($objCargoEmpleado);
		$objCtrlCargoEmpleado->guardar();
		break;

		case 'Consultar':
		$objEmpleados = new Empleados($ide,"","","","");
		$objCtrlEmpleados = new CtrlEmpleados($objEmpleados);
		$objEmpleados = $objCtrlEmpleados->consultar();
		$ide=$objEmpleados->getIdEmpleado();
		$nom=$objEmpleados->getNombre();
		$fki=$objEmpleados->getFkArea();
		$fke=$objEmpleados->getFkEmple_Jefe();
			
		break;

		case 'Modificar':
		$objEmpleados = new Empleados($ide, $nom,$fke, $fki,"");
		$objCtrlEmpleados = new CtrlEmpleados($objEmpleados);
		$objCtrlEmpleados->modificar();
		break;

		case 'Borrar':
		$objEmpleados = new Empleados($ide,"","","","");
		$objCtrlEmpleados = new CtrlEmpleados($objEmpleados);
		$objCtrlEmpleados->borrar();

		date_default_timezone_set('America/Argentina');	
		$hoy = date('Y-m-d H:i:s');

		$objCargoEmpleado= new CargoEmpleado($car,$ide,"",$hoy); 
        $objCtrlCargoEmpleado = new CtrlCargoEmpleado($objCargoEmpleado);
		$objCtrlCargoEmpleado->modificar();

		break;
		
		default:
			# code...
			break;
	}
	
	?>
	
<!DOCTYPE html>
<html>
<head>
	<title>HelpMe-Empleados</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
	<form method="POST">		

		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>EMPLEADOS</h1></td>				
			</thread>
			<tr>
				<td><h4>idEmpleado</h4></td>
				<td><input class="form-control" type="text" name="txtIdEmpleado" value="<?php  echo$ide ?>">
				</td>
			</tr>
			<tr>
				<td><h4>Nombre</h4></td>
				<td><input class="form-control" type="text" name="txtNombre" value="<?php  echo$nom?>" >
				</td>
			</tr>
			
			<tr>
				<td><h4>Cargo</h4></td>
				
				<td><select class="form-control" name="txtCargo">
				
				<?php

				foreach ($matrizCargo as $row){ 
					echo'
					
					<option value='.$row->getIdCargo().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value="NULL">Sin asignar</option>
				</td>
			</tr>
			<tr>
				<td><h4>Jefe inmediato</h4></td>
				
				<td><select class="form-control" name="txtFkRmple" selected disabled>
				<?php
				foreach ($matriz as $row){ 
					echo'
					
					<option value='.$row->getIdEmpleado().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value=NULL>Sin asignar</option>
				</td>
			</tr>
			<tr>
				<td><h4>Área</h4></td>
				<td>
				<select class="form-control" name="txtFkIdArea">
				<?php
				foreach ($matrizArea as $row) { 
					echo'
				
					<option value='.$row->getIdArea().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value="NULL">Sin asignar</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/vistaEmpleados.js"></script>
</body>
</html>

