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
        }
    }

    public function listarCuentas() {

        $gestarCuentas = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCuentas = $gestarCuentas->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeCuentas'] = $registroCuentas;

        header("location:principal.php?contenido=vistas/vistasCuentas/listarDTRegistrosCuentas.php");
    }

}

?>