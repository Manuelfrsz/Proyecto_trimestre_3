<?php

include_once PATH . 'modelos/modeloLibros/LibroDAO.php';

class LibrosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->librosControlador();
    }

    public function librosControlador() {
        switch ($this->datos['ruta']) {
            case "listarLibros": //provisionalmente para trabajar con datatables
                $this->listarLibros();
                break;
        }
    }

    public function listarLibros() {

        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroLibros = $gestarLibros->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeLibros'] = $registroLibros;

        header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosLibros.php");
    }

}

?>