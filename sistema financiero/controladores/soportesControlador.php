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
                
            case "actualizarSoportes": //provisionalmente para trabajar con datatables
                $this->actualizarSoportes();
                break;

            case "confirmaActualizarSoportes": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarSoportes();
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
    
    public function actualizarSoportes (){
        $gestarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeSoportes =$gestarSoportes->seleccionarId(array($this->datos['idAct']));

        $actualizarDatosSoportes = $consultaDeSoportes['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosSoportes'] = $actualizarDatosSoportes;


        header("location:principal.php?contenido=vistas/vistasSoportes/vistaActualizarSoportes.php");	

    }

    public function confirmaActualizarSoportes(){
        $gestarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarSoportes = $gestarSoportes->actualizar(array($this->datos)); 			

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarSoportes");	

    }

}

?>