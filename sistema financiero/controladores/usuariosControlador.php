<?php

include_once PATH . 'modelos/modeloUsuarios/usuariosDAO.php';

class usuariosControlador{

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->usuariosControlador();
    }

    public function usuariosControlador(){
        switch($this->datos['ruta']) {
            case "listarUsuarios":
                $this->listarUsuarios();
                break;

            case "actualizarUsuarios": 
                $this->actualizarUsuarios();
                break;

            case "confirmaActualizarUsuarios":
                $this->confirmaActualizarUsuarios();
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

    public function actualizarUsuarios (){
        $gestarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeUsuarios =$gestarUsuarios->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosUsuarios = $consultaDeUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios'] = $actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios/vistaActualizarUsuarios.php");	

}

public function confirmaActualizarUsuarios(){
        $gestarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUsuarios = $gestarUsuarios->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarUsuarios");	

}


}

?>