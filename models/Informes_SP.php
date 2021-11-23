<?php


 Class InformesProcedimientos {

    private $nombre;
    private $nombrejefe;
    private $nroempleados;
    private $nombrearea;
      

		public function setnombre($nombre){
			$this->nombre=$nombre;
		}
		public function getnombre(){
			return $this->nombre;
		}
        public function setnombrejefe($nombrejefe){
			$this->nombrejefe=$nombrejefe;
		}
		public function getnombrejefe(){
			return $this->nombrejefe;
		}
        public function setnroempleados($nroempleados){
			$this->nroempleados=$nroempleados;
		}
		public function getnroempleados(){
			return $this->nroempleados;
		}
		public function setnombrearea($nombrearea){
			$this->nombrearea=$nombrearea;
		}
		public function getnombrearea(){
			return $this->nombrearea;
		}
}
?>