<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/usuariosControlador.php';


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

                case "listarUsuarios":
                    $this->listarUsuarios();
                    break;
                
                case "actualizarUsuarios":
    
                    $this->actualizarUsuarios();
    
                    break;
    
                case "confirmaActualizarUsuario":
                    $this->confirmaActualizarUsuarios();
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
    
    public function listarUsuarios() {
        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function actualizarUsuarios() {
        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function confirmaActualizarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }
}

?>