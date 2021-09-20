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

            case "cancelarActualizarSoportes":
                $this->cancelarActualizarSoportes();
                break;
        
            case "mostrarInsertarSoportes":
                $this->mostrarInsertarSoportes();
                break;
        
            case "insertarSoportes":
                 $this->insertarSoportes();
                break;
        
            case "cancelarInsertarSoportes":
                $this->cancelarInsertarSoportes();
                break;
            
            case "eliminarSoportes":
                $this->eliminarSoportes();
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

    public function cancelarActualizarSoportes(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarSoportes");	
    }

    public function mostrarInsertarSoportes(){


        $gestarMovimientos = new MovimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMovimientos = $gestarMovimientos->seleccionarTodos();

        session_start();
        $_SESSION['registroMovimientos'] = $registroMovimientos;
        $registroMovimientos = null;

        header("Location: principal.php?contenido=vistas/vistasSoportes/vistaInsertarSoportes.php");

    }

    public function insertarSoportes(){

        //Se instancia usuariosDAO para insertar
        $buscarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $SoporteHallado = $buscarSoportes->seleccionarId(array($this->datos['idSoportes']));
        //Si no existe el usuario en la base se procede a insertar ****  		
        if (!$SoporteHallado['exitoSeleccionId']){
            $insertarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoSoportes = $insertarSoportes->insertar($this->datos);  //inserción de los campos en la tabla Soportes

            $resultadoInsercionSoportes = $insertoSoportes['resultado'];  //Traer el id con que quedó el usuario de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idSoportes'] . " con éxito.  Agregado Nuevo Soporte con " . $resultadoInsercionSoportes;					
            
            header("location:Controlador.php?ruta=listarSoportes");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['idSoportes'] = $this->datos['idSoportes'];
            $_SESSION['sopNomComporbante'] = $this->datos['sopNomComporbante'];
            $_SESSION['Movimientos_idMovimientos'] = $this->datos['Movimientos_idMovimientos'];					
            
            $_SESSION['mensaje'] = "   El código " . $this->datos['idSoportes'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarSoportes");					

        }					
    }

    public function cancelarInsertarSoportes(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarSoportes");	
    }

    public function eliminarSoportes (){
        $gestarSoportes = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeSoportes =$gestarSoportes->eliminarLogico(array($this->datos['idAct']));

        header("location:Controlador.php?ruta=listarSoportes");	

    }

}

?>