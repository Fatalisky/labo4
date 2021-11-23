<?php

class CtrlEmpleados
{
	var $objEmpleados;

	function __construct($objEmpleados)
	{
		$this->objEmpleados=$objEmpleados;
	}

	function guardar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
        $empleEstado=$this->objEmpleados->getempleActivo();
		
	
		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		if(empty($ide)){

		echo '<script>alert("el campo no puede estar vacio")</script>';

		}else{
			$comandoSql = "INSERT INTO empleado  values('".$ide."','".$nom."','".$fke."','".$fki."','".$empleEstado."')";
				
			$objCtrlConexion->ejecutarComandoSql($comandoSql);
		}
		$objCtrlConexion->cerrarBd();
		
	}

	function consultar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from empleado where IDEMPLEADO ='".$ide."'";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSql);
	
			
		//valida si existe el empleado
		$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."' AND EmpleActivo = '1')";
		$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registroo[0];
		//si el campo está vacio muestra alerta
		if(empty($ide)){
			echo '<script>alert("el campo no puede estar vacio")</script>';
		}
		elseif ($dato==0) { // si el registro no está en la bdd muestra alerta
			echo '<script>alert("Registro no encontrado en la base de datos")</script>';
		}else{ 
				if ($rs){
				$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
				$nom = $registro["NOMBRE"];
				$fke = $registro["fkEMPLE_JEFE"];
				$fki = $registro["fkAREA"];
				
				$this->objEmpleados->setNombre($nom);
				$this->objEmpleados->setFkArea($fki);
				$this->objEmpleados->setFkEmple_Jefe($fke);			
			}
		}
		$objCtrlConexion->cerrarBd();
		return $this->objEmpleados;
	}

	function modificar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
			//valida si existe el empleado
			$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."')";
			$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
			$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
			$dato = $registroo[0];
			//Si el campo está vacio muestra alerta
			if(empty($ide)){
				echo '<script>alert("el campo no puede estar vacio")</script>';
			}
			elseif ($dato==0) {//si el campo no existe en la bdd muestra alerta
				echo '<script>alert("Registro no encontrado Ingrese un registro valido")</script>';
			}else{ 
				$comandoSql = "update empleado set NOMBRE = '".$nom."', fkEMPLE_JEFE = '".$fke."' , fkAREA = '".$fki."' where IDEMPLEADO  = '".$ide."' AND EmpleActivo = '1'";
				$objCtrlConexion->ejecutarComandoSql($comandoSql);
				echo '<script> alert("Registro modificado con exito")</script>';					
			}
		$objCtrlConexion->cerrarBd();
	}

	function borrar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
			//valida si existe el empleado
			$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."')";
			$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
			$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
			$dato = $registroo[0];
			//Si el campo está vacio muestra alerta
			if(empty($ide)){
				echo '<script>alert("el campo no puede estar vacio")</script>';
			}
			elseif ($dato==0) {//si el campo no existe en la bdd muestra alerta
				echo '<script>alert("Registro no encontrado Ingrese un registro valido")</script>';
			}else{ 
				$comandoSql = "update empleado set EmpleActivo = '0' where IDEMPLEADO  = '".$ide."'";
				$objCtrlConexion->ejecutarComandoSql($comandoSql);
				echo '<script> alert("Registro modificado con exito")</script>';					
			}
		$objCtrlConexion->cerrarBd();
	}

	function comboBoxJefe($ide){
		$idee = $ide;

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
		
		if($ide==null){					
			$sql = "select * from area a INNER JOIN empleado b on a.FKEMPLE = b.IDEMPLEADO where b.EmpleActivo = '1'";
		}else{
			//valida primero el jefe de la persona
			$comandoSql = "select fkEMPLE_JEFE , IDEMPLEADO FROM empleado WHERE  EmpleActivo = '1' AND IDEMPLEADO = '".$ide."'";
			$rs = $objCtrlConexion->ejecutarSelect($comandoSql);
			$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro			
			$fkjefe = $registro["fkEMPLE_JEFE"];				

			$sql = "select empleado.IDEMPLEADO AS IDEMPLEADO, empleado.NOMBRE AS NOMBRE FROM empleado where empleado.EmpleActivo = '1' ORDER BY empleado.IDEMPLEADO = '".$fkjefe."' DESC";
			
			
		}
       
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idEmpleado = $row['IDEMPLEADO'];
			$objArea = new Empleados($idEmpleado, $nombre, "", "", "");
			$matriz[$i] = $objArea;
			$i++;
			}
        $objCtrlConexion->cerrarBd();
        return $matriz;
        }

		function comboBoxEmplea($ida){
			$idaa = $ida;
			$objCtrlConexion = new CtrlConexion();
			$objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
			if($ida==null){				
				$sql = "select * from empleado where EmpleActivo = '1'";
			}else{
				$sql = "select empleado.IDEMPLEADO as IDEMPLEADO, empleado.NOMBRE as NOMBRE FROM empleado INNER JOIN area on empleado.IDEMPLEADO = area.FKEMPLE INNER JOIN cargo_por_empleado ON empleado.IDEMPLEADO = cargo_por_empleado.FKEMPLE INNER JOIN cargo ON cargo_por_empleado.FKCARGO = cargo.IDCARGO WHERE empleado.EmpleActivo = '1' order by area.IDAREA = '".$idaa."' desc";
			}
			$recordSet = $objCtrlConexion->ejecutarSelect($sql);
			$matriz = array();
			$i = 0;
			while($row = $recordSet->fetch_assoc()){ 
			
				$nombre = $row['NOMBRE'];
				$idEmpleado = $row['IDEMPLEADO'];
				$objArea = new Empleados($idEmpleado, $nombre, "", "", "","", "", "", "", "", "","");
				$matriz[$i] = $objArea;
				$i++;
				}
			$objCtrlConexion->cerrarBd();
			return $matriz;
			}
}
	
?>