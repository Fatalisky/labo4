<?php
	
	class DetalleReq
	{
		var $idDetalle;
		var $fecha;
        var $observacion;
		var $fkReque;
        var $fkEstado;
		var $fkEmple;
        var $fkEmpleAsignado;
		var $RequeActivo;
	
				
		function __construct($idDetalle, $fecha,$observacion,$fkReque,$fkEstado,$fkEmple,$fkEmpleAsignado,$RequeActivo)
		{
			$this->idDetalle=$idDetalle;
			$this->fecha=$fecha;
            $this->observacion=$observacion;
            $this->fkReque=$fkReque;
			$this->fkEstado=$fkEstado;
            $this->fkEmple=$fkEmple;
            $this->fkEmpleAsignado=$fkEmpleAsignado;
			$this->RequeActivo=$RequeActivo;
			
		}

		function setRequeActivo($RequeActivo){
			$this->RequeActivo=$RequeActivo;
		}
		function getRequeActivo(){
			return $this->RequeActivo;
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