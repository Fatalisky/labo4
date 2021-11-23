<?php
	
	class Requerimiento 
	{
		var $IdReque;
		var $fkArea;
				
		function __construct($IdReque, $fkArea)
		{
			$this->IdReque=$IdReque;
			$this->fkArea=$fkArea;			
			
		}

		function setIdIdReque($IdReque){
			$this->IdReque=$IdReque;
		}
		function getIdReque(){
			return $this->IdReque;
		}
		function setfkArea($fkArea){
			$this->fkArea=$fkArea;
		}
		function getfkArea(){
			return $this->fkArea;
		}		
	}

?>