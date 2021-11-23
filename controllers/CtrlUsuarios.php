<?php
class CtrlUsuarios{

	var $objUsuarios;

    // se crea el objeto de la clase clientes, para acceder a los atributos que hay en el
	function __construct($objUsuarios){

		$this->objUsuarios=$objUsuarios;
	}

    function guardar(){
        // se obtiene a traves del objeto cliente los valores de los atributos de la clase Clientes
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $rol=$this->objUsuarios->getRol();
        $est=$this->objUsuarios->getEstatus();

        $objCtrlConexion = new CtrlConexion();
        //se abre la base de datos
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $cmdSql="INSERT INTO usuarios VALUES('".$id."','".$pass."',".$rol.",".$est.")";
        $objCtrlConexion->ejecutarComandoSql($cmdSql);
        $objCtrlConexion->cerrarBd();

    }

    function consultar(){

        $dato;
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios WHERE username = '".$id."' and password = '".$pass."' and estatus = "."1"."";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);


        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setRol($row["idRol"]);
            $dato=$row["idRol"];
        }

        $cont=mysqli_num_rows($recordSet);


        if($cont==1){
            header("location: home.php");

        }

        $objCtrlConexion->cerrarBd();
        return $this->objUsuarios;
    }


    function consult(){

        $id=$this->objUsuarios->getIdUsuario();
        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios WHERE username = '".$id."' and estatus = "."1"."";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);

        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setPassword($row["password"]);
            $this->objUsuarios->setRol($row["idRol"]);
        }

        $objCtrlConexion->cerrarBd();
        return $this->objUsuarios;
    }

    function consultarRol(){
        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM roles ";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);

        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setRol($row["idRol"]);
        }
        
        $objCtrlConexion->cerrarBd();
        return $this->objUsuarios;
    }

    function listar(){

        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios where estatus = "."1";
        $recordSet = $objCtrlConexion->ejecutarSelect($sql);
        $objCtrlConexion->cerrarBd();
        return $recordSet;

    }

    function modificar(){
        // se obtiene a traves del objeto cliente los valores de los atributos de la clase Clientes
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $rol=$this->objUsuarios->getRol();

        $objCtrlConexion = new CtrlConexion();

        //se abre la base de datos
        $objCtrlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $cmdSql="UPDATE usuarios SET username='".$id."', password='".$pass."', idRol=".$rol." WHERE usuario='".$id."'";
        $objCtrlConexion->ejecutarComandoSql($cmdSql);
        $objCtrlConexion->cerrarBd();
    }

    function eliminar(){
        
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $objCtrlConexion = new CtrlConexion();
        $objCtrlConexion->abrirBD("localhost","root","","mesa_ayuda");
        $cmdSql="UPDATE usuarios set  estatus = 0 where username='".$id."'";
        $objCtrlConexion->ejecutarComandoSql($cmdSql);
        $objCtrlConexion->cerrarBD();
    }
}
?>