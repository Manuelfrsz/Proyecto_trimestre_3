<?php

//include_once "../modelos/ConstantesConexion.php";
//include_once PATH."modelos/ConBdMysql.php";

class CuentasDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select u.idUsuarios, u.usuTipoDocumento, u.usuDocumento, u.usuNombres, u.usuApellidos, c.cueTipo, c.cueNombre, c.cueSaldo ";
        $planconsulta.="from cuentas c ";
        $planconsulta.="join usuarios u on c.Usuarios_idUsuarios = u.idUsuarios ";
        $planconsulta.="order by u.idUsuarios ASC; ";
    

        $registroCuentas = $this->conexion->prepare($planconsulta);
        $registroCuentas->execute();

        $listadoRegistrosCuentas = array();

        while( $registro = $registroCuentas->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosCuentas[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosCuentas;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from cuentas c ";
        $planConsulta .= "where c.idCuentas = ? ;";

        $listar = $this->conexion->prepare($planConsulta);

        $listar->execute(array($sId[0]));

        $registroEncontrado = array();

        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {

            $registroEncontrado[] = $registro;
        }

        $this->cierreBd();

        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro){
        try {
            $consulta = "insert into `cuentas`(`idCuentas` , `Usuarios_idUsuarios` , `cueEstado` , `cueTipo` , `cueNombre` , `cueSaldo`) 
            values (:idCuentas , :Usuarios_idUsuarios , :cueEstado , :cueTipo, :cueNombre, :cueSaldo );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":idCuentas", $registro['idCuentas']);
            $insertar->bindParam(":Usuarios_idUsuarios", $registro['Usuarios_idUsuarios']);
            $insertar->bindParam(":cueEstado", $registro['cueEstado']);
            $insertar->bindParam(":cueTipo", $registro['cueTipo']);
            $insertar->bindParam(":cueNombre", $registro['cueNombre']);
            $insertar->bindParam(":cueSaldo", $registro['cueSaldo']);
            
            
            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimaria];

            $this->cierreBd();
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, $pdoExc->errorInfo[1]];
        }
    }

    public function actualizar($registro){
        
    }

    public function eliminar($sId = array()){
        $planConsulta = "delete from cuentas ";
        $planConsulta .= " where idCuentas = :idCuentas ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idCuentas', $sId[0], PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($sId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($sId[0])];
        }
    }

    public function habilitar($sId = array()){
        
        
        try {

            $cambiarEstado = 1;

            if (isset($sId[0])) {
                $actualizar = "UPDATE cuentas SET cueEstado = ? WHERE idCuentas= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }		
    }

    public function eliminarLogico($sId = array()){
        try {

            $cambiarEstado = 0;

            if (isset($sId[0])) {
                $actualizar = "UPDATE cuentas SET cueEstado = ? WHERE idCuentas= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }		
    }
}
?>