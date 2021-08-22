<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/cuentasControlador.php';

class ControladorPrincipal {

    private $datos = array();

    public function __construct() {

        if (!empty($_POST) && isset($_POST["ruta"])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET["ruta"])) {
            $this->datos = $_GET;
        }

        $this->control();
    }

    public function control() {

        switch ($this->datos['ruta']) {
            case "listarLibros":
                $this->listarLibros();
                break;
            case "actualizarLibro":

                $this->actualizarLibro();

                break;

            case "confirmaActualizarLibro":
                $this->confirmaActualizarLibro();
                break;

            case "listarCuentas":
                $this->listarCuentas();
                break;
            case "actualizarCuentas":

                $this->actualizarCuentas();

                break;

            case "confirmaActualizarCuentas":
                $this->confirmaActualizarCuentas();
                break;    
        }
    }

    public function listarLibros() {
        $librosControlador = new LibrosControlador($this->datos);
    }

    public function actualizarLibro() {
        $librosControlador = new LibrosControlador($this->datos);
    }

    public function confirmaActualizarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }
    public function listarCuentas() {
        $cuentasControlador = new cuentasControlador($this->datos);
    }

    public function actualizarCuentas() {
        $cuentasControlador = new cuentasControlador($this->datos);
    }

    public function confirmaActualizarCuentas() {

        $cuentasControlador = new cuentasControlador($this->datos);
    }

}

?>