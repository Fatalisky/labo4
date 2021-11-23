<?php

class Empleados{

    var $idEmpleado;
    var $nombre;
    var $fkIdArea;
    var $fkRmple;
    var $empleActivo;

    function __construct($idEmpleado, $nombre, $fkEmple_Jefe, $fkIdArea,$empleActivo)
		{
			$this->idEmpleado=$idEmpleado;
			$this->nombre=$nombre;
			$this->fkEmple_Jefe=$fkEmple_Jefe;
			$this->fkIdArea=$fkIdArea;
			$this->empleActivo=$empleActivo;
        }

        function setempleActivo($empleActivo){
			$this->empleActivo=$empleActivo;
		}

        function getempleActivo(){
			return $this->empleActivo;
		}

		function setIdAmpleado($idEmpleado){
			$this->idEmpleado=$idEmpleado;
		}
		function getIdEmpleado(){
			return $this->idEmpleado;
		}
		function setNombre($nombre){
			$this->nombre=$nombre;
		}
		function getNombre(){
			return $this->nombre;
		}
        function setFkArea($fkIdArea){
			$this->fkIdArea=$fkIdArea;
		}
		function getFkArea(){
			return $this->fkIdArea;
		}
		function setFkEmple_Jefe($fkEmple_Jefe){
			$this->fkEmple_Jefe=$fkEmple_Jefe;
		}
		function getFkEmple_Jefe(){
			return $this->fkEmple_Jefe;
		}
    }

?>
