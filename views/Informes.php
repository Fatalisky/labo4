<?php
	error_reporting(E_ALL ^ E_NOTICE);
    include "../controllers/CtrlConexion.php";
    include "../controllers/CtrlInformes.php";
	
	$clsinformes = new CtrlInformes();
	$respuestaSelect = isset($_POST['selectInformes']) ? $_POST['selectInformes']:null;	
	$bot = isset($_POST['btn']) ?$_POST['btn']:null;

	switch ($bot) {		
        case 'Consultar':
            $clsinformes->setSelect($respuestaSelect);  
		default:
			break;
	}	
	?>
<!DOCTYPE html>

<html>
<head>
	<title>Informes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="../css/estilos3.css" type="text/css" rel="stylesheet">
	
    <style>
        table {
            margin: 50px auto;
            
        }
 
    </style>

</head>
<body>
	<div class="container">		   
		<header class="cabecera-principal">
			<div id=contenedor-cabecera>
				<img id="logo" src="../img/logo1.jpg" alt="Logo Responsive">
			</div>
			<nav class="nav-principal">
				<ul>
					<li><a href="../index.php">Inicio</a></li>
	                <li><a href="Equipo.php">Equipo</a></li>
	                <li><a href="Servicios.php">Servicios</a></li>	                                    
	                <li aling=right class="cerrar-sesion">
	                <a href="../includes/CerrarSesion.php">Cerrar Sesion</a>						
				</ul>
			</nav>
		</header>
	<form method="POST" action="Informes.php">		
	<?php 
		session_start();
		include "../rol.php"  ?>
		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>Generación de informes</h1></td>				
			</thread>			
		</table>
        <table class="form-table"  style="margin: 50px auto;" >
        <td>
            <select class="form-control" name="selectInformes" style="width: 300px;" id="idSelInformes">
                <option value="0" selected="true" disabled>Seleccione informe</option>
                <option value="1">Informe 1</option>
                <option value="2">Informe 2</option>
            </select>
        </td>
        </table>
        <table class="default"  style="width: 500px;" >
        <?php               
            if($clsinformes->getSelect()==1){
               $resultado= $clsinformes->ejecutarProcedimientoInformes($respuestaSelect);
        ?>   
            <tr>
            <td style="font-weight:bold">NOMBRE</td>
            <td style="font-weight:bold">NOMBRE JEFE</td>
            <td style="font-weight:bold">NRO EMPLEADOS</td>
            </tr>
        <?php  
            while($fila = mysqli_fetch_array($resultado)){
        ?> 
            <tr>
            <td><?php echo $fila[0]             ?></td>
            <td><?php echo $fila[1]              ?></td>           
            <td><?php echo $fila[2]              ?></td>
            </tr>
        <?php 
            }       
        ?>    
        <?php  
            }else if($clsinformes->getSelect()==2){
                $resultado= $clsinformes->ejecutarProcedimientoInformes($respuestaSelect);
        ?>
            <tr>
            <td style="font-weight:bold">NOMBRE</td>
            <td style="font-weight:bold">NOMBRE JEFE</td>
            <td style="font-weight:bold">NOMBRE AREA</td>
            </tr>
        <?php 
            while($fila = mysqli_fetch_array($resultado)){
        ?>
            <tr>
            <td><?php echo $fila[0]             ?></td>
            <td><?php echo $fila[1]              ?></td>               
            <td><?php echo $fila[2]              ?></td>
            </tr>
            <?php 
            }
        }
            ?>            
        </table>
		<table class="form-table" style="margin: 50px auto;">
			<tr>
                <td><input class="btn btn-info" type="submit" name="btn" value="Consultar"></td>				
				
			</tr>			
		</table>
		<table class="form-table" style="margin: 50px auto;">
			<tr>
				<td><a class="btn btn-primary" href="../index.php" role="button" >Regresar</a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>