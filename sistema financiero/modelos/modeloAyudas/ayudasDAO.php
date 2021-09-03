<?php

//include_once "../modelos/ConstantesConexion.php";
include_once "modelos/ConBdMysql.php";

class ayudasDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select a.idAyudas, ayuConsejo ";
        $planconsulta.="from ayudas a ";
    

        $registroAyudas = $this->conexion->prepare($planconsulta);
        $registroAyudas->execute();

        $listadoRegistrosAyudas = array();

        while( $registro = $registroAyudas->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosAyudas[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosAyudas;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from ayudas a ";
        $planConsulta .= "where a.idAyudas = ? ;";

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
            $consulta = "insert into `ayudas`( `Usuarios_idUsuarios`, `ayuCodigoConsejo` , `ayuConsejo`)
            values (:Usuarios_idUsuarios , :ayuCodigoConsejo , :ayuConsejo );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":Usuarios_idUsuarios", $registro['Usuarios_idUsuarios']);
            $insertar->bindParam(":ayuCodigoConsejo", $registro['ayuCodigoConsejo']);
            $insertar->bindParam(":ayuConsejo", $registro['ayuConsejo']);
            
            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['inserto' => true, 'resultado' => $clavePrimaria];

            $this->cierreBd();
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, $pdoExc->errorInfo[1]];
        }
    }

    public function actualizar($registro){
        try{
            $consejo = $registro[0]['ayuConsejo'];
            $idAyudas = $registro[0]['idAyudas'];	
			
			
			if(isset($idAyudas)){
				
                $actualizar = "UPDATE ayudas SET ayuConsejo= ?  ";
                $actualizar .= " WHERE idAyudas= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($consejo,$idAyudas));
				
				        $this->cierreBd();
						
				//MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){
        $planConsulta = "delete from ayudas ";
        $planConsulta .= " where idAyudas = :idAyudas ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idAyudas', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE ayudas SET ayuEstado = ? WHERE idAyudas= ? ;";
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
                $actualizar = "UPDATE ayudas SET ayuEstado = ? WHERE idAyudas= ? ;";
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