<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/usuariosControlador.php';
include_once PATH . 'controladores/cuentasControlador.php';
include_once PATH . 'controladores/balancesControlador.php';
include_once PATH . 'controladores/movimientosControlador.php';
include_once PATH . 'controladores/calendariosControlador.php';
include_once PATH . 'controladores/soportesControlador.php';
include_once PATH . 'controladores/ayudasControlador.php';

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

            case "cancelarActualizarLibro":
                $this->cancelarActualizarLibro();
                break;

            case "mostrarInsertarLibros":
                $this->mostrarInsertarLibros();
                break;

            case "insertarLibro":
                $this->insertarLibro();
                break;	

            case "listarUsuarios":
                $this->listarUsuarios();
                break;
                
            case "actualizarUsuarios":
                $this->actualizarUsuarios();
                break;
    
            case "confirmaActualizarUsuarios":
                $this->confirmaActualizarUsuarios();
                break;

            case "cancelarActualizarUsuarios":
                $this->cancelarActualizarUsuarios();
                break;

            case "mostrarInsertarUsuarios":
                $this->mostrarInsertarUsuarios();
                break;

            case "insertarUsuarios":
                $this->insertarUsuarios();
                break;

            case "cancelarInsertarUsuarios":
                $this->cancelarInsertarUsuarios();
                break;

            case "eliminarUsuarios":
                $this->eliminarUsuarios();
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
                
            case "cancelarActualizarBalances":
                $this->cancelarActualizarBalances();
                break;

            case "mostrarInsertarBalances":
                $this->mostrarInsertarBalances();
                break;

            case "insertarBalances":
                $this->insertarBalances();
                break;

            case "cancelarInsertarBalances":
                $this->cancelarInsertarBalances();
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
                
            case "listarCalendarios":
                $this->listarCalendarios();
                break;
                
            case "actualizarCalendarios":
                $this->actualizarCalendarios();
                break;
    
            case "confirmaActualizarCalendarios":
                $this->confirmaActualizarCalendarios();
                break;

            case "cancelarActualizarCalendarios":
                $this->cancelarActualizarCalendarios();
                break;

            case "mostrarInsertarCalendarios":
                $this->mostrarInsertarCalendarios();
                break;

            case "insertarCalendarios":
                $this->insertarCalendarios();
                break;

            case "cancelarInsertarCalendarios":
                $this->cancelarInsertarCalendarios();
                break;

            case "eliminarCalendarios":
                $this->eliminarCalendarios();
                break;

            case "listarMovimientos":
                $this->listarMovimientos();
                break;
                
            case "actualizarMovimientos":
                $this->actualizarMovimientos();
                break;
    
            case "confirmaActualizarMovimientos":
                $this->confirmaActualizarMovimientos();
                break;

            case "cancelarActualizarMovimientos":
                $this->cancelarActualizarMovimientos();
                break;
    
            case "mostrarInsertarMovimientos":
                $this->mostrarInsertarMovimientos();
                break;
    
            case "insertarMovimientos":
                $this->insertarMovimientos();
                break;
    
            case "cancelarInsertarMovimientos":
                $this->cancelarInsertarMovimientos();
                break;

            case "eliminarMovimientos":
                $this->eliminarMovimientos();
                break;

            case "listarSoportes":
                $this->listarSoportes();
                break;

            case "actualizarSoportes":
                $this->actualizarSoportes();
                break;

            case "confirmaActualizarSoportes":
                $this->confirmaActualizarSoportes();
                break;

            case "cancelarActualizarSoportes":
                $this->cancelarActualizarSoportes();
                break;
    
            case "mostrarInsertarSoportes":
                $this->mostrarInsertarSoportes();
                break;
    
            case "insertarSoportes":
                $this->insertarSoportes();
                break;
    
            case "cancelarInsertarSoportes":
                $this->cancelarInsertarSoportes();
                break;

            case "listarAyudas":
                $this->listarAyudas();
                break;

            case "actualizarAyudas":
                $this->actualizarAyudas();
                break;

            case "confirmaActualizarAyudas":
                $this->confirmaActualizarAyudas();
                break;

            case "cancelarActualizarAyudas":
                $this->cancelarActualizarAyudas();
                break;

            case "mostrarInsertarAyudas":
                $this->mostrarInsertarAyudas();
                break;

            case "insertarAyudas":
                $this->insertarAyudas();
                break;

            case "cancelarInsertarAyudas":
                $this->cancelarInsertarAyudas();
                break;

            case "eliminarAyudas":
                $this->eliminarAyudas();
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

    public function cancelarActualizarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }	
	
    public function mostrarInsertarLibros() {

        $librosControlador = new LibrosControlador($this->datos);
    }	
	
    public function insertarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }
    
    public function listarUsuarios(){
        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function actualizarUsuarios(){
        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function confirmaActualizarUsuarios(){

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function cancelarActualizarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function mostrarInsertarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function insertarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function cancelarinsertarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function eliminarUsuarios() {

        $usuariosControlador = new usuariosControlador($this->datos);
    }

    public function listarBalances(){
        $balancesControlador = new balancesControlador($this->datos);
    }

    public function actualizarBalances() {
        $balancesControlador = new balancesControlador($this->datos);
    }

    public function confirmaActualizarBalances() {

        $balancesControlador = new balancesControlador($this->datos);
    }

    public function cancelarActualizarBalances() {

        $BalancesControlador = new BalancesControlador($this->datos);
    }

    public function mostrarInsertarBalances() {

        $BalancesControlador = new BalancesControlador($this->datos);
    }

    public function insertarBalances() {

        $BalancesControlador = new BalancesControlador($this->datos);
    }

    public function cancelarinsertarBalances() {

        $BalancesControlador = new BalancesControlador($this->datos);
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

    public function cancelarActualizarCuentas() {

        $CuentasControlador = new CuentasControlador($this->datos);
    }

    public function mostrarInsertarCuentas() {

        $CuentasControlador = new CuentasControlador($this->datos);
    }

    public function insertarCuentas() {

        $CuentasControlador = new CuentasControlador($this->datos);
    }

    public function cancelarinsertarCuentas() {

        $CuentasControlador = new CuentasControlador($this->datos);
    }

    public function eliminarCuentas() {

        $CuentasControlador = new CuentasControlador($this->datos);
    }

    public function listarCalendarios() {
        $calendariosControlador = new calendariosControlador($this->datos);
    }

    public function actualizarCalendarios() {
        $calendariosControlador = new calendariosControlador($this->datos);
    }

    public function confirmaActualizarCalendarios() {

        $calendariosControlador = new calendariosControlador($this->datos);
    }

    public function cancelarActualizarCalendarios() {

        $CalendariosControlador = new CalendariosControlador($this->datos);
    }

    public function mostrarInsertarCalendarios() {

        $CalendariosControlador = new CalendariosControlador($this->datos);
    }

    public function insertarCalendarios() {

        $CalendariosControlador = new CalendariosControlador($this->datos);
    }

    public function cancelarinsertarCalendarios() {

        $CalendariosControlador = new CalendariosControlador($this->datos);
    }

    public function eliminarCalendarios() {

        $CalendariosControlador = new CalendariosControlador($this->datos);
    }

    public function listarMovimientos() {
        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function actualizarMovimientos() {
        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function confirmaActualizarMovimientos() {

        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function cancelarActualizarMovimientos() {

        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function mostrarInsertarMovimientos() {

        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function insertarMovimientos() {

        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function cancelarinsertarMovimientos() {

        $movimientosControlador = new movimientosControlador($this->datos);
    }

    public function eliminarMovimientos() {

        $MovimientosControlador = new MovimientosControlador($this->datos);
    }

    public function listarSoportes() {
        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function actualizarSoportes() {
        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function confirmaActualizarSoportes() {

        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function cancelarActualizarSoportes() {

        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function mostrarInsertarSoportes() {

        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function insertarSoportes() {

        $SoportesControlador = new SoportesControlador($this->datos);
    }

    public function cancelarinsertarSoportes() {

        $SoportesControlador = new SoportesControlador($this->datos);
    }


    public function listarAyudas() {
        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function actualizarAyudas() {
        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function confirmaActualizarAyudas() {

        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function cancelarActualizarAyudas() {

        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function mostrarInsertarAyudas() {

        $AyudasControlador = new CuentasControlador($this->datos);
    }

    public function insertarAyudas() {

        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function cancelarinsertarAyudas() {

        $AyudasControlador = new AyudasControlador($this->datos);
    }

    public function eliminarAyudas() {

        $AyudasControlador = new AyudasControlador($this->datos);
    }
}

?>