<?php
	
	class Areas 
	{
		var $idArea;
		var $nombre;
		var $fkEmple_Jefe;
		
		function __construct($idArea, $nombre, $fkEmple_Jefe)
		{
			$this->idArea=$idArea;
			$this->nombre=$nombre;
			$this->fkEmple_Jefe=$fkEmple_Jefe;		
		}

		function setIdArea($idArea){
			$this->idArea=$idArea;
		}
		function getIdArea(){
			return $this->idArea;
		}
		function setNombre($nombre){
			$this->nombre=$nombre;
		}
		function getNombre(){
			return $this->nombre;
		}
		function setFkEmple_Jefe($fkEmple_Jefe){
			$this->fkEmple_Jefe=$fkEmple_Jefe;
		}
		function getFkEmple_Jefe(){
			return $this->fkEmple_Jefe;
		}		
	}

?>