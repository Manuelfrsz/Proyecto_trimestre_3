<?php

include_once PATH . 'modelos/modeloMovimientos/movimientosDAO.php';

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

}

?>