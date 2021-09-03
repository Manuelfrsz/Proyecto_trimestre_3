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
                
           /* case "mostrarInsertarCuentas": 
                $this->mostrarInsertarCuentas();
                break;
                    
            case "insertarCuentas": 
                $this->insertarCuentas();
                break;

            case "cancelarInsertarCuentas":
                $this->cancelarInsertarCuentas();
                break;*/
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

}

?>