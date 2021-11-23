<?php


Class Informes {

    var $idDetalle;
    var $fecha;
    var $observacion;
    var $fkReque;
    var $fkEstado;
    var $fkEmple;
    var $fkEmpleAsignado;
    var $idArea;
	var $nombre;
    var $emple;
	var $estado;

function __construct($idDetalle, $fecha,$observacion,$fkReque,$fkEstado,$fkEmple,$fkEmpleAsignado,$idArea, $nombre,$emple,$estado)
		{
			$this->idDetalle=$idDetalle;
			$this->fecha=$fecha;
            $this->observacion=$observacion;
            $this->fkReque=$fkReque;
			$this->fkEstado=$fkEstado;
            $this->fkEmple=$fkEmple;
            $this->fkEmpleAsignado=$fkEmpleAsignado;
            $this->idArea=$idArea;
			$this->nombre=$nombre;
            $this->emple=$emple;
			$this->estado=$estado;
		}
		function setestado($estado){
			$this->estado=$estado;
		}
		function getestado(){
			return $this->estado;
		}
        function setemple($emple){
			$this->emple=$emple;
		}
		function getemple(){
			return $this->emple;
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

		function setIdidDetalle($idDetalle){
			$this->idDetalle=$idDetalle;
		}
		function getidDetalle(){
			return $this->idDetalle;
		}

		function setfecha($fecha){
			$this->fecha=$fecha;
		}
		function getfecha(){
			return $this->fecha;
		}	
        
        function setobservacion($observacion){
			$this->observacion=$observacion;
		}
		function getobservacion(){
			return $this->observacion;
		}

		function setfkReque($fkReque){
			$this->fkReque=$fkReque;
		}
		function getfkReque(){
			return $this->fkReque;
		}
        
		function setfkEstado($fkEstado){
			$this->fkEstado=$fkEstado;
		}
		function getfkEstado(){
			return $this->fkEstado;
		}

        function setfkEmple($fkEmple){
			$this->fkEmple=$fkEmple;
		}
		function getfkEmple(){
			return $this->fkEmple;
		}

		function setfkEmpleAsignado($fkEmpleAsignado){
			$this->fkEmpleAsignado=$fkEmpleAsignado;
		}
		function getfkEmpleAsignado(){
			return $this->fkEmpleAsignado;
		}
}
?>