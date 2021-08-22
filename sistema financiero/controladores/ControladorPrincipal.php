<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/balancesControlador.php';
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

            case "listarBalances":
                $this->listarBalances();
                break;
            case "actualizarBalances":
    
                $this->actualizarBalances();
    
                break;
    
            case "confirmaActualizarBalances":
                $this->confirmaActualizarBalances();
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

    public function listarBalances() {
        $balancesControlador = new balancesControlador($this->datos);
    }

    public function actualizarBalances() {
        $balancesControlador = new balancesControlador($this->datos);
    }

    public function confirmaActualizarBalances() {

        $balancesControlador = new balancesControlador($this->datos);
    }

}

?>