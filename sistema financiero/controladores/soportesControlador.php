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


       /* $gestarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;*/

        header("Location: principal.php?contenido=vistas/vistasMovimientos/vistaInsertarMovimientos.php");

    }

    public function insertarSoportes(){

        //Se instancia usuariosDAO para insertar
        $buscarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $UsuariosHallado = $buscarUsuarios->seleccionarId(array($this->datos['idUsuarios']));
        //Si no existe el usuario en la base se procede a insertar ****  		
        if (!$UsuariosHallado['exitoSeleccionId']){
            $insertarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoUsuarios = $insertarUsuarios->insertar($this->datos);  //inserción de los campos en la tabla usuarios 

            $resultadoInsercionUsuarios = $insertoUsuarios['resultado'];  //Traer el id con que quedó el usuario de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idUsuarios'] . " con éxito.  Agregado Nuevo Usuario con " . $resultadoInsercionUsuarios;					
            
            header("location:Controlador.php?ruta=listarUsuarios");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['idUsuarios'] = $this->datos['idUsuarios'];
            $_SESSION['usuTipoDocumento'] = $this->datos['usuTipoDocumento'];
            $_SESSION['usuDocumento'] = $this->datos['usuDocumento'];
            $_SESSION['usuNombres'] = $this->datos['usuNombres'];
            $_SESSION['usuApellidos'] = $this->datos['usuApellidos'];
            $_SESSION['usuFechaNacimiento'] = $this->datos['usuFechaNacimiento'];
            $_SESSION['usuEdad'] = $this->datos['usuEdad'];
            $_SESSION['usuEstrato'] = $this->datos['usuEstrato'];					
            
            $_SESSION['mensaje'] = "   El código " . $this->datos['idUsuarios'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=InsertarUsuarios");					

        }					
    }

    public function cancelarInsertarSoportes(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarUsuarios");	
    }

}

?>