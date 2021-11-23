<?php


class CtrlCargos
{
	var $objCargos;

	function __construct($objCargos)
	{
		$this->objCargos=$objCargos;
	}

	function guardar()
	{
		$idCargo=$this->objCargos->getIdCargo();
		$nom=$this->objCargos->getNombre();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		if (empty($nom)){
			echo '<script> alert("El campo nombre no debe ser vacio")</script>';
		}else {
			$comandoSql = "INSERT INTO cargo VALUES (NULL,'".$nom."')";
			$rs=$objCtrlConexion->ejecutarComandoSql($comandoSql);
			echo '<script> alert("Registro guardado exitosamente")</script>';
			}
		$objCtrlConexion->cerrarBd();
	}

		function consultar()
	{
		$idc=$this->objCargos->getIdCargo();		
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo where idCargo = '".$idc."'";
		$rs = $objCtrlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);
		//Consulta primero si el dato existe
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registroo[0];

		if(empty($idc)){
			echo '<script> alert("El campo no puede estar vacio")</script>';
			//echo "la consulta no devolvio nada "; 
		}elseif($dato==0){
			echo '<script>alert("Registro no encontrado en la base de datos")</script>';			
		}else{
			$nom = $registro["NOMBRE"];	
			$this->objCargos->setNombre($nom);	
		}
		$objCtrlConexion->cerrarBd();
		return $this->objCargos;
	}

	function modificar()
	{	
		$idc=$this->objCargos->getIdCargo();
		$nom=$this->objCargos->getNombre();				
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		//primero consulta si existe el registro
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		if(empty($idc)){
			echo '<script> alert("El campo no puede estar vacio")</script>';
		}elseif ($dato==0) {    
			echo '<script> alert("Registro no encontrado en la base de datos, por favor ingrese un registro valido")</script>';		
		}else{		
			$comandoSql = "update cargo set NOMBRE = '".$nom."' where idCargo = '".$idc."'";
			$rs =$objCtrlConexion->ejecutarComandoSql($comandoSql);             
			echo '<script> alert("Registro modificado con exito")</script>';		
		}	
		$objCtrlConexion->cerrarBd();	
	}

	function borrar()
	{ 
		/*
		$idc=$this->objCargos->getIdCargo();
		$objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo where idCargo = '".$idc."'";
		//primero consulta si existe el registro
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objCtrlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		if(empty($idc)){
			echo '<script> alert("El campo no debe estar vacio")</script>';
		}elseif($dato==0){
			echo '<script> alert("El registro no se puede borrar por que no existe en la bdd")</script>';				
		
		}else {
		$objCtrlConexion->ejecutarComandoSql($comandoSql);
		echo '<script> alert("El Cargo ha sido borrado con exito")</script>';
	}
		$objCtrlConexion->cerrarBd();
		*/
		echo '<script> alert("Para Borrar el Cargo por favor contacte al administrador de base de datos")</script>';
	}
		

	function comboBoxCargo($ide){
		$idee = $ide;
        $objCtrlConexion = new CtrlConexion();
		$objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
		if($ide==null){		
			$sql = "SELECT * FROM cargo";
		}else{
			$sql = "select cargo.NOMBRE AS NOMBRE, cargo.IDCARGO AS IDCARGO FROM empleado INNER JOIN area on empleado.IDEMPLEADO = area.FKEMPLE INNER JOIN cargo_por_empleado ON empleado.IDEMPLEADO = cargo_por_empleado.FKEMPLE INNER JOIN cargo ON cargo_por_empleado.FKCARGO = cargo.IDCARGO WHERE empleado.EmpleActivo = '1' ORDER BY empleado.IDEMPLEADO = '".$idee."' DESC";
			
		}
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idCargo = $row['IDCARGO'];
			$objArea = new Cargos($idCargo, $nombre);
			$matriz[$i] = $objArea;
			$i++;
			}
        $objCtrlConexion->cerrarBd();
        return $matriz;
    }
}
	
?>