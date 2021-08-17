<?php

//include_once "../modelos/ConstantesConexion.php";
//include_once PATH."modelos/ConBdMysql.php";

class balancesDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select u.idUsuarios, u.usuTipoDocumento, u.usuDocumento, u.usuNombres, u.usuApellidos, u.usuEstrato, b.balTotal ";
        $planconsulta.="from balances b ";
        $planconsulta.="join usuarios u on b.Usuarios_idUsuarios = u.idUsuarios ";
        $planconsulta.="order by u.idusuarios ASC; ";
    

        $registroBalances = $this->conexion->prepare($planconsulta);
        $registroBalances->execute();

        $listadoRegistrosBalances = array();

        while( $registro = $registroBalances->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosBalances[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosBalances;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from balances b ";
        $planConsulta .= "where b.idBalances = ? ;";

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
            $consulta = "insert into `balances`(`idBalances`,`Usuarios_idUsuarios`, `balEstado`, `balTotal`)
            values (:idBalances , :Usuarios_idUsuarios , :balEstado , :balTotal );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":idBalances", $registro['idBalances']);
            $insertar->bindParam(":Usuarios_idUsuarios", $registro['Usuarios_idUsuarios']);
            $insertar->bindParam(":balEstado", $registro['balEstado']);
            $insertar->bindParam(":balTotal", $registro['balTotal']);
            
            
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
        $planConsulta = "delete from balances ";
        $planConsulta .= " where idBalances = :idBalances ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idBalances', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE balances SET balEstado = ? WHERE idBalances= ? ;";
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
                $actualizar = "UPDATE balances SET balEstado = ? WHERE idBalances= ? ;";
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