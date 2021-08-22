<?php

include_once PATH . 'modelos/modeloUsuarios/usuariosDAO.php';

class usuariosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->usuariosControlador();
    }

    public function usuariosControlador() {
        switch ($this->datos['ruta']) {
            case "listarUsuarios": //provisionalmente para trabajar con datatables
                $this->listarUsuarios();
                break;
        }
    }

    public function listarUsuarios() {

        $gestarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeUsuarios'] = $registroUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios/listarDTRegistrosUsuarios.php");
    }

}

?>