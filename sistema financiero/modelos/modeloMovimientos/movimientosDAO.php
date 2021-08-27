<?php

//include_once "../modelos/ConstantesConexion.php";
//include_once PATH."modelos/ConBdMysql.php";

class movimientosDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT 
        m.idMovimientos, m.Usuarios_idUsuarios, m.movTipo, m.movNombre, m.movCuentaUso, m.movValor, m.movFecha, 
        u.usuTipoDocumento, u.usuDocumento, u.usuNombres, u.usuApellidos, 
        c.idCuentas, c.cueTipo, c.cueSaldo,
        b.idBalances, b.balTotal ";
        $planconsulta.="FROM movimientos m ";
        $planconsulta.="JOIN usuarios u on m.Usuarios_idUsuarios = u.idUsuarios "; 
        $planconsulta.="JOIN cuentas c on m.Cuentas_idCuentas = c.idCuentas ";
        $planconsulta.="JOIN balances b on m.Balances_idBalances = b.idBalances ";
        $planconsulta.="order by m.idMovimientos ASC ";

        $registroMovimientos = $this->conexion->prepare($planconsulta);
        $registroMovimientos->execute();

        $listadoRegistrosMovimientos = array();

        while( $registro = $registroMovimientos->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosMovimientos[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosMovimientos;
    }

    public function seleccionarID($sId){
        $planConsulta = " select * from movimientos m ";
        $planConsulta .= "where m.idMovimientos = ? ;";

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
            $consulta = "insert into `movimientos`(`idMovimientos` , `Usuarios_idUsuarios` ,`Cuentas_idCuentas`, `Balances_idBalances`, `movEstado` , `movNumero` , `movTipo` , `movNombre` , `movCuentaUso` , `movValor` , `movFecha`)
            values (:idMovimientos , :Usuarios_idUsuarios ,:Cuentas_idCuentas , :Balances_idBalances , :movEstado , :movNumero , :movTipo , :movNombre , :movCuentaUso , :movValor , :movFecha );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":idMovimientos", $registro['idMovimientos']);
            $insertar->bindParam(":Usuarios_idUsuarios", $registro['Usuarios_idUsuarios']);
            $insertar->bindParam(":Cuentas_idCuentas", $registro['Cuentas_idCuentas']);
            $insertar->bindParam(":Balances_idBalances", $registro['Balances_idBalances']);
            $insertar->bindParam(":movEstado", $registro['movEstado']);
            $insertar->bindParam(":movNumero", $registro['movNumero']);
            $insertar->bindParam(":movTipo", $registro['movTipo']);
            $insertar->bindParam(":movNombre", $registro['movNombre']);
            $insertar->bindParam(":movCuentaUso", $registro['movCuentaUso']);
            $insertar->bindParam(":movValor", $registro['movValor']);
            $insertar->bindParam(":movFecha", $registro['movFecha']);

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
            $Cuentas_idCuentas = $registro[0]['Cuentas_idCuentas'];	
            $numeroDeMovimiento = $registro[0]['movNumero'];
            $tipoDeMovimiento = $registro[0]['movTipo'];
            $nombreDeMovimiento = $registro[0]['movNombre'];
            $cuentaDeUso = $registro[0]['movCuentaUso'];
            $valorMovimiento = $registro[0]['movValor'];
            $fechaMovimiento = $registro[0]['movFecha'];
            $idMovimientos = $registro[0]['idMovimientos'];	
            
			
			
			if(isset($idMovimientos)){
				
                $actualizar = "UPDATE movimientos SET Cuentas_idCuentas = ? , ";
                $actualizar .= " movNumero = ? , ";
                $actualizar .= " movTipo = ? , ";
                $actualizar .= " movNombre = ? , ";
                $actualizar .= " movCuentaUso = ? , ";
                $actualizar .= " movValor = ? , ";
                $actualizar .= " movFecha = ?  "; 
                $actualizar .= " WHERE idMovimientos= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array( $Cuentas_idCuentas, $numeroDeMovimiento, $tipoDeMovimiento, $nombreDeMovimiento, $cuentaDeUso, $valorMovimiento, $fechaMovimiento, $idMovimientos));
				
				        
						
				//MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        } 
    }

    public function eliminar($sId = array()){
        $planConsulta = "delete from movimientos ";
        $planConsulta .= " where idMovimientos = :idMovimientos ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':idMovimientos', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE movimientos SET movEstado = ? WHERE idMovimientos= ? ;";
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
                $actualizar = "UPDATE movimientos SET movEstado = ? WHERE idMovimientos= ? ;";
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