<?php

include_once PATH . 'modelos/modeloAyudas/AyudasDAO.php';

class AyudasControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->AyudasControlador();
    }

    public function AyudasControlador() {
        switch ($this->datos['ruta']) {
            case "listarAyudas": //provisionalmente para trabajar con datatables
                $this->listarAyudas();
                break;
        }
    }

    public function listarAyudas() {

        $gestarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroAyudas = $gestarAyudas->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeAyudas'] = $registroAyudas;

        header("location:principal.php?contenido=vistas/vistasAyudas/listarDTRegistrosAyudas.php");
    }

}

?>