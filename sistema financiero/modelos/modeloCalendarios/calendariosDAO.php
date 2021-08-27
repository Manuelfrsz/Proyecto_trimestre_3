<?php

//include_once "../modelos/ConstantesConexion.php";
//include_once PATH."modelos/ConBdMysql.php";

class calendariosDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = " select c.idCalendarios, u.usuNombres, u.usuApellidos, c.calTipoPago, c.calNomPago, c.calFechaPago ";
        $planconsulta.=" from calendarios c ";
        $planconsulta.=" join usuarios u on c.Usuarios_idUsuarios = u.idUsuarios ";
    

        $registroCalendarios = $this->conexion->prepare($planconsulta);
        $registroCalendarios->execute();

        $listadoRegistrosCalendarios = array();

        while( $registro = $registroCalendarios->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosCalendarios[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosCalendarios;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from calendarios c ";
        $planConsulta .= "where c.idCalendarios = ? ; ";

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
            $consulta = "insert into `calendarios`(`idcalendarios` , `Usuarios_idUsuarios` , `calEstado` , `calTipoPago` , `calNomPago` , `calFechaPago`)
            values (:idcalendarios , :Usuarios_idUsuarios , :calEstado , :calTipoPago , :calNomPago , :calFechaPago );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":idcalendarios", $registro['idcalendarios']);
            $insertar->bindParam(":Usuarios_idUsuarios", $registro['Usuarios_idUsuarios']);
            $insertar->bindParam(":calEstado", $registro['calEstado']);
            $insertar->bindParam(":calTipoPago", $registro['calTipoPago']);
            $insertar->bindParam(":calNomPago", $registro['calNomPago']);
            $insertar->bindParam(":calFechaPago", $registro['calFechaPago']);
            
            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimaria];

            $this->cierreBd();
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, $pdoExc->errorInfo[1]];
        }
    }

    public function actualizar($registro){

        try{
            $calTipoPago = $registro[0]['calTipoPago'];
            $calNomPago = $registro[0]['calNomPago'];
            $calFechaPago = $registro[0]['calFechaPago'];
            $idCalendarios = $registro[0]['idCalendarios'];	

			
			
			if(isset($idCalendarios)){
				
                $actualizar = "UPDATE calendarios SET calTipoPago = ? , ";
                $actualizar .= "calNomPago = ? , ";
                $actualizar .= "calFechaPago = ?   ";
                $actualizar .= " WHERE idCalendarios = ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($calTipoPago, $calNomPago, $calFechaPago, $idCalendarios));
				
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
        $planConsulta = "delete from calendarios ";
        $planConsulta .= " where idcalendarios = :idcalendarios ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idcalendarios', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE calendarios SET calEstado = ? WHERE idcalendarios= ? ;";
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
                $actualizar = "UPDATE calendarios SET calEstado = ? WHERE idcalendarios= ? ;";
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