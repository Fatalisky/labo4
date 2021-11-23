<?php
    include_once '../models/Informes.php';
class CtrlInformes {

    private $rSelect;
    private $rConsulta;

    function requerimientosActivos(){

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT detallereq.IDDETALLE, detallereq.OBSERVACION ,detallereq.FKREQ,detallereq.FKESTADO,detallereq.FKEMPLE ,detallereq.FKEMPLEASIGNADO,detallereq.FECHA, area.IDAREA, area.NOMBRE as NOMBREAREA , estado.NOMBRE AS ESTADOREQUE , empleado.NOMBRE 
        FROM detallereq 
        INNER JOIN requerimiento 
            ON requerimiento.IDREQ = detallereq.FKREQ 
        INNER JOIN area 
            ON requerimiento.FKAREA = area.IDAREA
        INNER JOIN estado 
            ON detallereq.FKESTADO = estado.IDESTADO
            INNER JOIN empleado
            ON detallereq.FKEMPLE=empleado.IDEMPLEADO
        WHERE detallereq.RequeActivo =1
            ORDER BY detallereq.FECHA, estado.IDESTADO DESC";

        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
        $matriz = array();
        $i = 0;
        while($row = $recordSet->fetch_assoc()){ 
        
            $idDetalle= $row['IDDETALLE'];
            $fecha= $row['FECHA'];
            $observacion= $row['OBSERVACION'];
            $fkReque= $row['FKREQ'];
            $fkEstado= $row['FKESTADO'];
            $fkEmple= $row['FKEMPLE'];
            $fkEmpleAsignado= $row['FKEMPLEASIGNADO'];
            $idArea= $row['IDAREA'];
	        $nombre= $row['NOMBREAREA'];
            $emple= $row['NOMBRE'];
            $estado=$row['ESTADOREQUE']; 
            $objReque = new Informes($idDetalle, $fecha,$observacion,$fkReque,$fkEstado,$fkEmple,$fkEmpleAsignado,$idArea, $nombre,$emple,$estado);
            $matriz[$i] = $objReque;
            $i++;
            }
        $objCtrlConexion->cerrarBd();
        return $matriz;

        }

        function ejecutarProcedimientoInformes($respuestaSelect){
            $objCtrlConexion = new CtrlConexion();
            $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

            if($respuestaSelect==1){              
                $comandoSql = "CALL spInformeUno";
                $rs = $objCtrlConexion->ejecutarSelect($comandoSql);
                $this->rConsulta =$rs;
                return $rs;                              
            }else if($respuestaSelect==2){
                $comandoSql = "CALL spInformeDos";
                $rs = $objCtrlConexion->ejecutarSelect($comandoSql);         
                $this->rConsulta =$rs;
                return $rs;               
            }                       
    
            }

            public function getSelect(){
                return $this->rSelect;
            }
        
            public function setSelect($rSelect){
                $this->rSelect=$rSelect;
            }

            public function getRconsulta(){
                return $this->rConsulta;
            }
        
            public function setRconsulta($rConsulta){
                $this->rConsulta=$rConsulta;
            }

}


?>