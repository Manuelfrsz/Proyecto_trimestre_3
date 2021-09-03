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

            case "actualizarCalendarios": //provisionalmente para trabajar con datatables
                $this->actualizarCalendarios();
                break;

            case "confirmaActualizarCalendarios": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarCalendarios();
                break;

            case "cancelarActualizarCalendarios":
                $this->cancelarActualizarCalendarios();
                break;
                
           /* case "mostrarInsertarCalendarios": 
                $this->mostrarInsertarCalendarios();
                break;
                    
            case "insertarCalendarios": 
                $this->insertarCalendarios();
                break;

            case "cancelarInsertarCalendarios":
                $this->cancelarInsertarCalendarios();
                break;*/
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

    public function actualizarCalendarios (){
        $gestarCalendarios = new CalendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeCalendarios =$gestarCalendarios->seleccionarId(array($this->datos['idAct']));

        $actualizarDatosCalendarios = $consultaDeCalendarios['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosCalendarios'] = $actualizarDatosCalendarios;


        header("location:principal.php?contenido=vistas/vistasCalendarios/vistaActualizarCalendarios.php");	

    }

    public function confirmaActualizarCalendarios(){
        $gestarCalendarios = new CalendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarCalendarios = $gestarCalendarios->actualizar(array($this->datos)); 			

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarCalendarios");	

    }

    public function cancelarActualizarCalendarios(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarCalendarios");	
    }

}

?>