<?php

include_once PATH . 'modelos/modeloCuentas/CuentasDAO.php';

class CuentasControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->cuentasControlador();
    }

    public function cuentasControlador() {
        switch ($this->datos['ruta']) {
            case "listarCuentas": //provisionalmente para trabajar con datatables
                $this->listarCuentas();
                break;

            case "actualizarCuentas": //provisionalmente para trabajar con datatables
                $this->actualizarCuentas();
                break;

            case "confirmaActualizarCuentas": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarCuentas();
                break;

            case "cancelarActualizarCuentas":
                $this->cancelarActualizarCuentas();
                break;
                
            case "mostrarInsertarCuentas": 
                $this->mostrarInsertarCuentas();
                break;
                    
            case "insertarCuentas": 
                $this->insertarCuentas();
                break;

            case "cancelarInsertarCuentas":
                $this->cancelarInsertarCuentas();
                break;

            case "eliminarCuentas":
                $this->eliminarCuentas();
                break;
        }
    }

    public function listarCuentas() {

        $gestarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCuentas = $gestarCuentas->seleccionarTodos();

        session_start();

        $_SESSION['listaDeCuentas'] = $registroCuentas;

        header("location:principal.php?contenido=vistas/vistasCuentas/listarDTRegistrosCuentas.php");
    }

    public function actualizarCuentas (){
        $gestarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeCuentas =$gestarCuentas->seleccionarId(array($this->datos['idAct']));

        $actualizarDatosCuentas = $consultaDeCuentas['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosCuentas'] = $actualizarDatosCuentas;


        header("location:principal.php?contenido=vistas/vistasCuentas/vistaActualizarCuentas.php");	

    }

    public function confirmaActualizarCuentas(){
        $gestarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarCuentas = $gestarCuentas->actualizar(array($this->datos)); 			

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarCuentas");	

    }

    public function cancelarActualizarCuentas(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarCuentas");	
    }

    public function mostrarInsertarCuentas(){



        /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();
        /*                 * ************************************************************************* */

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;

        header("Location: principal.php?contenido=vistas/vistasCuentas/vistaInsertarCuentas.php");

    }

    public function insertarCuentas(){

        $buscarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $CuentaHallada = $buscarCuentas->seleccionarId(array($this->datos['idCuentas']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$CuentaHallada['exitoSeleccionId']) {
            $insertarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoCuentas = $insertarCuentas->insertar($this->datos);  //inserción de los campos en la tabla 
            $resultadoInsercionCuentas = $insertoCuentas['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idCuentas'] . " con éxito.  Agregada Nueva Cuenta con " . $resultadoInsercionCuentas;					
            
            header("location:Controlador.php?ruta=listarCuentas");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['idCuentas'] = $this->datos['idCuentas'];
            $_SESSION['cueTipo'] = $this->datos['cueTipo'];
            $_SESSION['cueNombre'] = $this->datos['CueNombre'];
            $_SESSION['CueSaldo'] = $this->datos['CueSaldo'];
            $_SESSION['Usuarios_idUsuarios'] = $this->datos['Usuarios_idUsuarios'];					
            
            $_SESSION['mensaje'] = "   El código " . $this->datos['idCuentas'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarCuentas");					

        }					
    }

    public function cancelarInsertarCuentas(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarCuentas");	
    }

    public function eliminarCuentas (){
        $gestarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeCuentas =$gestarCuentas->eliminarLogico(array($this->datos['idAct']));

        header("location:Controlador.php?ruta=listarCuentas");	

    }

}

?>