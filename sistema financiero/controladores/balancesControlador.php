<?php

include_once PATH . 'modelos/modeloBalances/balancesDAO.php';

class balancesControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->balancesControlador();
    }

    public function balancesControlador() {
        switch ($this->datos['ruta']) {
            case "listarBalances": //provisionalmente para trabajar con datatables
                $this->listarBalances();
                break;

            case "actualizarBalances": //provisionalmente para trabajar con datatables
                $this->actualizarBalances();
                break;

            case "confirmaActualizarBalances": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarBalances();
                break;    

            case "cancelarActualizarBalances":
                $this->cancelarActualizarBalances();
                break;
                
           /* case "mostrarInsertarBalances": 
                $this->mostrarInsertarBalances();
                break;
                    
            case "insertarBalances": 
                $this->insertarBalances();
                break;

            case "cancelarInsertarBalances":
                $this->cancelarInsertarBalances();
                break;*/
        }
    }

    public function listarBalances() {

        $gestarBalances = new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroBalances = $gestarBalances->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeBalances'] = $registroBalances;

        header("location:principal.php?contenido=vistas/vistasBalances/listarDTRegistrosBalances.php");
    }
    public function actualizarBalances (){
        $gestarBalances = new balancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeBalances =$gestarBalances->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosBalances = $consultaDeBalances['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosBalances'] = $actualizarDatosBalances;
        

        header("location:principal.php?contenido=vistas/vistasBalances/vistaActualizarBalances.php");	

}

public function confirmaActualizarBalances(){
        $gestarBalances = new balancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarBalances = $gestarBalances->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarBalances");	

}

public function cancelarActualizarBalances(){
    session_start();
    $_SESSION['mensaje'] = "Desistió de la actualización";
    header("location:Controlador.php?ruta=listarBalances");	
}


}

?>