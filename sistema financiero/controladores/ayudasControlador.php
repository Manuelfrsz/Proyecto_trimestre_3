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
            
            case "actualizarAyudas": //provisionalmente para trabajar con datatables
                    $this->actualizarAyudas();
                    break;
    
            case "confirmaActualizarAyudas": //provisionalmente para trabajar con datatables
                    $this->confirmaActualizarAyudas();
                    break;    

            case "cancelarActualizarAyudas":
                $this->cancelarActualizarAyudas();
                break;
                
           /* case "mostrarInsertarAyudas": 
                $this->mostrarInsertarAyudas();
                break;
                    
            case "insertarAyudas": 
                $this->insertarAyudas();
                break;

            case "cancelarInsertarAyudas":
                $this->cancelarInsertarAyudas();
                break;*/
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

    public function actualizarAyudas (){
        $gestarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeAyudas =$gestarAyudas->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosAyudas = $consultaDeAyudas['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosAyudas'] = $actualizarDatosAyudas;
        

        header("location:principal.php?contenido=vistas/vistasAyudas/vistaActualizarAyudas.php");	

    }

    public function confirmaActualizarAyudas(){
        $gestarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarAyudas = $gestarAyudas->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarAyudas");	

    }

    public function cancelarActualizarAyudas(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarAyudas");	
    }

}

?>