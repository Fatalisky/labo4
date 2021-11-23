<?php
	
	class Cargos 
	{
		var $idCargo;
		var $nombre;
				
		function __construct($idCargo, $nombre)
		{
			$this->idCargo=$idCargo;
			$this->nombre=$nombre;					
		}

		function setIdCargo($idCargo){
			$this->idCargo=$idCargo;
		}
		function getIdCargo(){
			return $this->idCargo;
		}
		function setNombre($nombre){
			$this->nombre=$nombre;
		}
		function getNombre(){
			return $this->nombre;
		}			
	}

?>