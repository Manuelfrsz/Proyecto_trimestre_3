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
                
            case "mostrarInsertarBalances": 
                $this->mostrarInsertarBalances();
                break;
                    
            case "insertarBalances": 
                $this->insertarBalances();
                break;

            case "cancelarInsertarBalances":
                $this->cancelarInsertarBalances();
                break;
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

    public function mostrarInsertarBalances(){



        /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();
        /*                 * ************************************************************************* */

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;

        header("Location: principal.php?contenido=vistas/vistasBalances/vistaInsertarBalances.php");

    }

    public function insertarBalances(){

        $buscarBalances = new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $BalanceHallado = $buscarBalances->seleccionarId(array($this->datos['idBalances']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$BalanceHallado['exitoSeleccionId']) {
            $insertarBalances = new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoBalances = $insertarBalances->insertar($this->datos);  //inserción de los campos en la tabla 
            $resultadoInsercionBalances = $insertoBalances['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idBalances'] . " con éxito.  Agregado un nuevo balance " . $resultadoInsercionBalances;					
            
            header("location:Controlador.php?ruta=listarBalances");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['idBalances'] = $this->datos['idBalances'];
            $_SESSION['balTotal'] = $this->datos['balTotal'];
            $_SESSION['Usuarios_idUsuarios'] = $this->datos['Usuarios_idUsuarios'];					
            
            $_SESSION['mensaje'] = "   El código " . $this->datos['idBalances'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarBalances");					

        }					
    }

    public function cancelarInsertarBalances(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarBalances");	
    }


}

?>