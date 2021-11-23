<?php

class CtrlAreas
{
	var $objAreas;

	function __construct($objAreas)
	{
		$this->objAreas=$objAreas;
	}

	function guardar()
	{
		$ida=$this->objAreas->getIdArea();	
		$nom=$this->objAreas->getNombre();
		$fke=$this->objAreas->getFkEmple_Jefe();

		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		if(empty($ida)){
			echo '<script> alert("El campo area no debe ser vacio")</script>';
		}else{
			$comandoSql = "insert into area values('".$ida."','".$nom."','".$fke."')";
			$objCtrlConexion->ejecutarComandoSql($comandoSql);
			echo '<script> alert("Area guardada con exito")</script>';
		}
		
		$objCtrlConexion->cerrarBd();
	}

	function consultar()
	{
		$ida=$this->objAreas->getIdArea();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from area where idArea = '".$ida."'";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		//valida si existe el area
		$comandoSqlValidacion="select exists (select * from area where idArea = '".$ida."')";
		$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registroo[0];
		//si está vacio el campo muestra alerta
			
		if(empty($ida)){
			echo '<script> alert("El campo no debe estar vacio")</script>';
		}elseif($dato==0){ //si el valor no existe en la bdd muestra alerta
			echo '<script>alert("Registro no encontrado en la base de datos")</script>';		
		}else{
			$nom = $registro["NOMBRE"];
			$fke = $registro["FKEMPLE"];		
			$this->objAreas->setNombre($nom);
			$this->objAreas->setFkEmple_Jefe($fke);	
			
			
		}
				
		$objCtrlConexion->cerrarBd();
		return $this->objAreas;
	}

	
	function modificar()
	{	
		$ida=$this->objAreas->getIdArea();
		$nom=$this->objAreas->getNombre();
		$fke=$this->objAreas->getFkEmple_Jefe();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		//Consulta si el registro existe
		$comandoSqlValidacion="select exists (select * from area where idArea = '".$ida."')";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		//valida si el campo está vacio
		if(empty($ida)){
			echo '<script> alert("El campo no debe estar vacio")</script>';
		} //valida que el campo ingresado exista en la bdd
		elseif ($dato==0) { 
			echo '<script> alert("Registro no encontrado en la base de datos, por favor ingrese un registro valido")</script>';		
		}else{
		$comandoSql = "update area set NOMBRE = '".$nom."', FKEMPLE = '".$fke."' where idArea = '".$ida."'";
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		echo '<script> alert("Registro modificado con exito")</script>';		
		}
		$objCtrlConexion->cerrarBd();
	}

	function borrar()
	{
		/*
		$ida=$this->objAreas->getIdArea();
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from area where idArea = '".$ida."'";
		//Consulta si el registro existe
		$comandoSqlValidacion="select exists (select * from area where idArea = '".$ida."')";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		//valida si el campo está vacio
		if(empty($ida)){
			echo '<script> alert("El campo no debe estar vacio")</script>';
		}elseif($dato==0){
			echo '<script> alert("El registro no se puede borrar por que no existe en la bdd")</script>';			
		}else {
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		echo '<script> alert("El area ha sido borrada con exito")</script>';
		}
		$objCtrlConexion->cerrarBd();
		*/
		echo '<script> alert("Para Borrar el Area por favor contacte al administrador de base de datos")</script>';
	}

	
	function comboBoxArea($ide){
		$idee = $ide;

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

		if($ide==null){	
			$sql = "SELECT * FROM area";
		}else{
			
			$sql = "select area.IDAREA AS IDAREA, area.NOMBRE AS NOMBRE, area.FKEMPLE AS FKEMPLE FROM empleado INNER JOIN area on empleado.IDEMPLEADO = area.FKEMPLE INNER JOIN cargo_por_empleado ON empleado.IDEMPLEADO = cargo_por_empleado.FKEMPLE INNER JOIN cargo ON cargo_por_empleado.FKCARGO = cargo.IDCARGO WHERE empleado.EmpleActivo = '1' ORDER BY empleado.IDEMPLEADO = '".$idee."' DESC";
		}
        
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idArea = $row['IDAREA'];
			$EmpleadoEncargado = $row['FKEMPLE'];
			$objArea = new Areas($idArea, $nombre, $EmpleadoEncargado);
			$matriz[$i] = $objArea;
			$i++;
			}
        $objCtrlConexion->cerrarBd();
        return $matriz;
    }

	function comboBoxAreaReque(){

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM `area` WHERE IDAREA IN (10,20,30)";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idArea = $row['IDAREA'];
			$EmpleadoEncargado = $row['FKEMPLE'];
			$objArea = new Areas($idArea, $nombre, $EmpleadoEncargado);
			$matriz[$i] = $objArea;
			$i++;
			}
        $objCtrlConexion->cerrarBd();
        return $matriz;
    }
}
	
?>