<?php

include_once PATH . 'modelos/modeloCalendarios/calendariosDAO.php';

class calendariosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->calendariosControlador();
    }

    public function calendariosControlador() {
        switch ($this->datos['ruta']) {
            case "listarCalendarios": //provisionalmente para trabajar con datatables
                $this->listarCalendarios();
                break;
        }
    }

    public function listarCalendarios() {

        $gestarCalendarios = new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCalendarios = $gestarCalendarios->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeCalendarios'] = $registroCalendarios;

        header("location:principal.php?contenido=vistas/vistasCalendarios/listarDTRegistrosCalendarios.php");
    }

}

?>