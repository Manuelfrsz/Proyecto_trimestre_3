<?php

//include_once "../modelos/ConstantesConexion.php";
include_once "modelos/ConBdMysql.php";

class SoportesDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select s.idSoportes, s.sopNomComprobante, m.movTipo, m.movCuentaUso, m.movValor, m.movFecha ";
        $planconsulta.="from soportes s ";
        $planconsulta.="join movimientos m on s.Movimientos_idMovimientos = m.idMovimientos where sopEstado = 1 ";
        $planconsulta.="order by s.idSoportes ASC; ";
    

        $registroSoportes = $this->conexion->prepare($planconsulta);
        $registroSoportes->execute();

        $listadoRegistrosSoportes = array();

        while( $registro = $registroSoportes->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosSoportes[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosSoportes;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from soportes s ";
        $planConsulta .= "where s.idSoportes = ? ;";

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
            $consulta = "insert into `soportes`( `Movimientos_idMovimientos`, `sopNomComprobante`)
            values (:Movimientos_idMovimientos , :sopNomComprobante );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":Movimientos_idMovimientos", $registro['Movimientos_idMovimientos']);
            $insertar->bindParam(":sopNomComprobante", $registro['sopNomComprobante']);
            
            
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
            $sopNomComprobante = $registro[0]['sopNomComprobante'];
            $idSoportes = $registro[0]['idSoportes'];	

			
			
			if(isset($idSoportes)){
				
                $actualizar = "UPDATE soportes SET sopNomComprobante = ?  ";
                $actualizar .= " WHERE idSoportes = ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($sopNomComprobante,$idSoportes));
				
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
        $planConsulta = "delete from soportes ";
        $planConsulta .= " where idSoportes = :idSoportes ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idSoportes', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE soportes SET sopEstado = ? WHERE idSoportes= ? ;";
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
                $actualizar = "UPDATE soportes SET sopEstado = ? WHERE idSoportes= ? ;";
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