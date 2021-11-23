<?php

class CtrlCargoEmpleado{


    var $objCargoEmpleado;

	function __construct($objCargoEmpleado)
	{
		$this->objCargoEmpleado=$objCargoEmpleado;
	}

	function guardar()
	{
		$idCargo=$this->objCargoEmpleado->getFkCargo();	
		$idEmple=$this->objCargoEmpleado->getFkEmple();
		$fechaIni=$this->objCargoEmpleado->getFechaIni();
    //    $fechaFin=$this->objCargoEmpleado->getFechaFin();
       
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO cargo_por_empleado values('".$idCargo."','".$idEmple."','".$fechaIni."', NULL)";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		$objCtrlConexion->cerrarBd();
	}

	function consultar()
	{
		$idCargo=$this->objCargoEmpleado->getFkCargo();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo_por_empleado where idArea = '".$ida."'";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["NOMBRE"];
		$fke = $registro["FKEMPLE"];		
		$this->objCargoEmpleado->setNombre($nom);
		$this->objCargoEmpleado->setFkEmple_Jefe($fke);		
		$objCtrlConexion->cerrarBd();
		return $this->objCargoEmpleado;
	}

	function modificar()
	{	


		$idCargo=$this->objCargoEmpleado->getFkCargo();	
		$idEmple=$this->objCargoEmpleado->getFkEmple();
		$fechaIni=$this->objCargoEmpleado->getFechaIni();
		$fechaFin=$this->objCargoEmpleado->getFechaFin();
         
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "UPDATE cargo_por_empleado SET FECHAFIN = '".$fechaFin."' where FKEMPLE ='".$idEmple."'";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		$objCtrlConexion->cerrarBd();
	}

	function borrar()
	{
		$idCargo=$this->objCargoEmpleado->getFkCargo();	
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo_por_empleado where FKEMPLE = '".$idCargo."'";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		$objCtrlConexion->cerrarBd();
	}



    
}


?>