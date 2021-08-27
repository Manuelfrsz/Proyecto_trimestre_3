<?php

include_once PATH . 'modelos/modeloMovimientos/movimientosDAO.php';
include_once PATH . 'modelos/modeloCuentas/cuentasDAO.php';

class movimientosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->movimientosControlador();
    }

    public function movimientosControlador() {
        switch ($this->datos['ruta']) {
            case "listarMovimientos": //provisionalmente para trabajar con datatables
                $this->listarMovimientos();
                break;

            case "actualizarMovimientos": 
                $this->actualizarMovimientos();
                break;
    
            case "confirmaActualizarMovimientos":
                $this->confirmaActualizarMovimientos();
                break;
        }
    }

    public function listarMovimientos() {

        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMovimientos = $gestarMovimientos->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeMovimientos'] = $registroMovimientos;

        header("location:principal.php?contenido=vistas/vistasMovimientos/listarDTRegistrosMovimientos.php");
    }

    public function actualizarMovimientos (){
        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeMovimientos =$gestarMovimientos->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosMovimientos = $consultaDeMovimientos['registroEncontrado'][0];

        $gestarCuentas = new cuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCuentas = $gestarCuentas->seleccionarTodos();

        
        session_start();
        $_SESSION['actualizarDatosMovimientos'] = $actualizarDatosMovimientos;

        $_SESSION['registroCuentas'] = $registroCuentas;

        header("location:principal.php?contenido=vistas/vistasMovimientos/vistaActualizarMovimientos.php");	

    }

    public function confirmaActualizarMovimientos(){
        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarMovimientos = $gestarMovimientos->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarMovimientos");	

    }

}

?>