<?php


class CtrlRequerimiento
{
	var $objRequerimiento;

	function __construct($objRequerimiento)
	{
		$this->objRequerimiento=$objRequerimiento;
	}

	function guardar()
	{
		
		$are=$this->objRequerimiento->getfkArea();

		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO requerimiento VALUES (NULL,'".$are."')";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		$objCtrlConexion->cerrarBd();
	}

		
    function Idreque(){

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "select IDREQ from requerimiento order by IDREQ desc limit 1";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);

		$idreque=$recordSet->fetch_assoc();
		$id=$idreque['IDREQ'];
        $objCtrlConexion->cerrarBd();
        return $id;
    }
}
	
?>