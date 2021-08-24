<?php

include_once PATH . 'modelos/modeloSoportes/soportesDAO.php';

class SoportesControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->SoportesControlador();
    }

    public function SoportesControlador() {
        switch ($this->datos['ruta']) {
            case "listarSoportes": //provisionalmente para trabajar con datatables
                $this->listarSoportes();
                break;
        }
    }

    public function listarSoportes() {

        $gestarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroSoportes = $gestarSoportes->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeSoportes'] = $registroSoportes;

        header("location:principal.php?contenido=vistas/vistasSoportes/listarDTRegistrosSoportes.php");
    }

}

?>