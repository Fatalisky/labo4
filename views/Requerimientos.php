<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include '../models/Requerimientos.php';
	include '../controllers/CtrlRequerimiento.php';
	include '../models/DetalleReq.php';
	include '../controllers/CtrlDetalleReq.php';
	include '../controllers/CtrlConexion.php';
	include "../models/Areas.php";
	include "../controllers/CtrlAreas.php";

	$objAreas = new Areas("","","");
	$objCtrlAreas = new CtrlAreas($objAreas);
	$matrizArea = $objCtrlAreas->comboBoxAreaReque();

	$ida = isset ($_POST['txtArea']) ? $_POST['txtArea']: null;
	$ide = isset ($_POST['txtIdEmpleado']) ? $_POST['txtIdEmpleado']: null;
	$req = isset ($_POST['txtRequerimiento']) ? $_POST['txtRequerimiento']: null;
	$bot = isset ($_POST['btn']) ? $_POST['btn']: null;

	switch ($bot) {
		case 'Radicar':
	    

		$objReque = new Requerimiento("", $ida);
		$objCtrlRerquerimiento = new CtrlRequerimiento($objReque);
		$objCtrlRerquerimiento->guardar();
		date_default_timezone_set('America/Argentina');	
		$hoy = date('Y-m-d H:i:s');
		
	  $fkReque=$objCtrlRerquerimiento->Idreque();	
	// echo $fkReque ;

	  $obDetalleReq = new DetalleReq("",$hoy, $req,$fkReque,"1",$ide,NULL,1);
	  $objCtrlDetalleReq = new CtrlDetalleReq($obDetalleReq);
	  $objCtrlDetalleReq->guardar();
		break;
		
		default:
			# code...
			break;
	}
	?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario Requerimientos</title>
		
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link href="../css/estilos3.css" type="text/css" rel="stylesheet">
		
	</head>
	<body>
		<div class="container">		   
			<header class="cabecera-principal">
				<div id=contenedor-cabecera>
					<img id="logo" src="../img/logo1.jpg" alt="Logo Responsive">
				</div>
				<nav class="nav-principal">
					<ul>
						<<li><a href="../index.php">Inicio</a></li>
		                <li><a href="vistaEquipo.php">Equipo</a></li>
		                <li><a href="vistaServicios.php">Servicios</a></li>		                                    
		                <li aling=right class="cerrar-sesion">
		                <a href="../includes/CerrarSesion.php">Cerrar Sesion</a>					
					</ul>
				</nav>
			</header>       
		<form method="POST">		
		<?php 
		session_start();
		include "../rol.php"  ?>
		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>REQUERIMIENTOS</h1></td>				
			</thread>
				<tr>
				<td><h4>Área Requerimiento</h4></td>
				<td><select class="form-controllers"name="txtArea">
				<?php
				foreach ($matrizArea as $row) { 
					echo'
				
					<option value='.$row->getIdArea().'>'.$row->getNombre().'</option>';

				}
				?>
				
				</td>
				</tr>
				<tr>
				<td><h4>ID Empleado</h4></td>
				<td><input class="form-controllers" type="text" name="txtIdEmpleado"  readonly value="<?php echo $_SESSION['id']; ?>"  />
				</td>
				</tr>
				<tr>
				<td><h4>Observación</td>
				<td><textarea name="txtRequerimiento" placeholder="Ingrese el requerimiento" rows="10"></textarea>
				</td>
				</tr>
				</table>
				<table class="form-table" style="margin: 50px auto;">			
				<tr>							
				<td><input class="btn btn-success" align = "center" type="submit" name="btn" value="Radicar"/></td>
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