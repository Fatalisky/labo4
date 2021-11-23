<?php   

class CtrlDetalleReq
{
	var $objDetalleReq;

	function __construct($objDetalleReq)
	{
		$this->objDetalleReq=$objDetalleReq;
	}

		function guardar()
	{

		$ide=$this->objDetalleReq->getidDetalle();
		$fec=$this->objDetalleReq->getfecha();
		$obs=$this->objDetalleReq->getobservacion();
		$fkre=$this->objDetalleReq->getfkReque();
        $fkes=$this->objDetalleReq->getfkEstado();
		$fkem=$this->objDetalleReq->getfkEmple();
		$RequeActivo=$this->objDetalleReq->getRequeActivo();

		

		//$fkas=$this->objDetalleReq->getfkEmpleAsignado();
			
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."',NULL,'".$RequeActivo."')";
		//echo "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."','".$fkas."')";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		$objCtrlConexion->cerrarBd();
		echo '<script> alert("Su solicitud se ha radicada exitosamente")</script>';
	//	echo"<script> window.location='../index.html';</script>";

	}

	function guardarAsigEmple()
	{

		$ide=$this->objDetalleReq->getidDetalle();
		$fec=$this->objDetalleReq->getfecha();
		$obs=$this->objDetalleReq->getobservacion();
		$fkre=$this->objDetalleReq->getfkReque();
        $fkes=$this->objDetalleReq->getfkEstado();
		$fkem=$this->objDetalleReq->getfkEmple();
		$fkas=$this->objDetalleReq->getfkEmpleAsignado();
		$RequeActivo=$this->objDetalleReq->getRequeActivo();

		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");

		if($fkes==4 or $fkes==5){
			$comandoSql = "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."','".$fkas."','0')";
			//echo "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."','".$fkas."')";
			$objCtrlConexion->ejecutarComandoSql($comandoSql);
		}else{
			$comandoSql = "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."','".$fkas."','".$RequeActivo."')";
			//echo "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."','".$fkas."')";
			$objCtrlConexion->ejecutarComandoSql($comandoSql);
		}
		$objCtrlConexion->cerrarBd();
		echo '<script> alert("Su solicitud se ha radicado exitosamente")</script>';
		echo"<script> window.location='../vista/vistaAdminRequerimientos.php';</script>";

	}

	function modificar()
	{
		$ide=$this->objDetalleReq->getidDetalle();
		$obs=$this->objDetalleReq->getobservacion(); 
		$fkes=$this->objDetalleReq->getfkEstado();
		$fkas=$this->objDetalleReq->getfkEmpleAsignado();
	
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSqlValidacion="select exists (select * from detallereq where IDDETALLE = '".$ide."')";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		if ($dato==0) { 
			echo '<script> alert("Registro no encontrado en la base de datos, por favor ingrese un registro valido")</script>';		
		}else{
			$comandoSql = "UPDATE detallereq SET RequeActivo='0' WHERE IDDETALLE = '".$ide."';";
			$objCtrlConexion->ejecutarComandoSql($comandoSql);
			echo '<script> alert("Registro modificado con exito")</script>';
		}	
		$objCtrlConexion->cerrarBd();
	}
}

?>