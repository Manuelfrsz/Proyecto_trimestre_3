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
        }
    }

    public function listarBalances() {

        $gestarBalances = new balancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroBalances = $gestarBalances->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeBalances'] = $registroBalances;

        header("location:principal.php?contenido=vistas/vistasBalances/listarDTRegistrosBalances.php");
    }

}

?>