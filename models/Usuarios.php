<?php

class Usuarios{
	
	var $idUsuario;
	var $password;
	var $rol;
	var $estatus;
	
     // Metodo constructor
	function __construct($idUsuario, $password, $rol, $estatus){
		$this->idUsuario = $idUsuario;
		$this->password = $password;
		$this->rol = $rol;
		$this->estatus = $estatus;
	}


	function getIdUsuario(){
		return $this->idUsuario;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function getPassword(){
		return $this->password;
	}

	function setPassword($password){
		$this->password= $password;
	}

	function getRol(){
		return $this->rol;
	}

	function setRol($rol){
		$this->rol= $rol;
	}
	
	function getEstatus(){
		return $this->estatus;
	}

	function setEstatus($estatus){
		$this->estatus = $estatus;
	}
}

?>