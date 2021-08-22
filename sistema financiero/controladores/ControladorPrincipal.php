<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/usuariosControlador.php';
include_once PATH . 'controladores/cuentasControlador.php';


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

                case "listarUsuarios":
                    $this->listarUsuarios();
                    break;
                
                case "actualizarUsuarios":
    
                    $this->actualizarUsuarios();
    
                    break;
    
                case "confirmaActualizarUsuario":
                    $this->confirmaActualizarUsuarios();
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
    
    public function listarUsuarios() {
        $usuariosControlador = new usuariosControlador($this->datos);
    }
    public function listarCuentas() {
        $cuentasControlador = new cuentasControlador($this->datos);
    }

    public function actualizarUsuarios() {
        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function confirmaActualizarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
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

    public function actualizarCuentas() {
        $cuentasControlador = new cuentasControlador($this->datos);
    }

    public function confirmaActualizarCuentas() {

        $cuentasControlador = new cuentasControlador($this->datos);
    }

}

?>