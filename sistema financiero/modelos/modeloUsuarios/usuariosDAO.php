<?php

//include_once "../modelos/ConstantesConexion.php";
include_once "modelos/ConBdMysql.php";

class UsuariosDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select u.idUsuarios, u.usuTipoDocumento, u.usuDocumento, u.usuNombres, u.usuApellidos, u.usuFechaNacimiento, u.usuEdad, u.usuEstrato ";
        $planconsulta.="from usuarios u ";
        $planconsulta.="order by u.idUsuarios ASC; ";
    

        $registroUsuarios= $this->conexion->prepare($planconsulta);
        $registroUsuarios->execute();

        $listadoRegistrosUsuarios = array();

        while( $registro = $registroUsuarios->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosUsuarios[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosUsuarios;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from Usuarios u ";
        $planConsulta .= "where u.idUsuarios = ? ;";

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
            $consulta = "insert into `usuarios` (`usuTipoDocumento`, `usuDocumento`, `usuNombres`, `usuApellidos`, `usuFechaNacimiento`, `usuEdad`, `usuEstrato`)
            values (:usuTipoDocumento , :usuDocumento, :usuNombres, :usuApellidos, :usuFechaNacimiento, :usuEdad, :usuEstrato );";

            $insertar = $this->conexion->prepare($consulta);

           
            $insertar->bindParam(":usuTipoDocumento", $registro['usuTipoDocumento']);
            $insertar->bindParam(":usuDocumento", $registro['usuDocumento']);
            $insertar->bindParam(":usuNombres", $registro['usuNombres']);
            $insertar->bindParam(":usuApellidos", $registro['usuApellidos']);
            $insertar->bindParam(":usuFechaNacimiento", $registro['usuFechaNacimiento']);
            $insertar->bindParam(":usuEdad", $registro['usuEdad']);
            $insertar->bindParam(":usuEstrato", $registro['usuEstrato']);
            
            
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
            $TipoDocumento = $registro[0]['usuTipoDocumento'];
            $Documento = $registro[0]['usuDocumento'];
            $Nombres = $registro[0]['usuNombres'];
            $Apellidos = $registro[0]['usuApellidos'];
            $FechaNacimiento = $registro[0]['usuFechaNacimiento'];
            $Edad = $registro[0]['usuEdad'];
            $Estrato = $registro[0]['usuEstrato'];
            $idUsuarios = $registro[0]['idUsuarios'];	
            
			
			
			if(isset($idUsuarios)){
				
                $actualizar = "UPDATE usuarios SET usuTipoDocumento = ? , ";
                $actualizar .= " usuDocumento = ? , ";
                $actualizar .= " usuNombres = ? , ";
                $actualizar .= " usuApellidos = ? , ";
                $actualizar .= " usuFechaNacimiento = ? , ";
                $actualizar .= " usuEdad = ? , ";
                $actualizar .= " usuEstrato = ?  "; 
                $actualizar .= " WHERE idUsuarios= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array( $TipoDocumento, $Documento, $Nombres, $Apellidos, $FechaNacimiento, $Edad, $Estrato, $idUsuarios));
				
				        
						
				//MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        } 
    }

    public function eliminar($sId = array()){
        $planConsulta = "delete from usuarios ";
        $planConsulta .= " where idUsuarios = :idUsuarios ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idUsuarios', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE usuarios SET usuEstado = ? WHERE idUsuarios= ? ;";
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
                $actualizar = "UPDATE usuarios SET usuEstado = ? WHERE idUsuarios= ? ;";
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