<?php

include_once PATH . 'modelos/modeloUsuarios/usuariosDAO.php';

class usuariosControlador{

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->usuariosControlador();
    }

    public function usuariosControlador(){
        switch($this->datos['ruta']){
            case "listarUsuarios":
                $this->listarUsuarios();
                break;

            case "actualizarUsuarios": 
                $this->actualizarUsuarios();
                break;

            case "confirmaActualizarUsuarios":
                $this->confirmaActualizarUsuarios();
                break;

            case "cancelarActualizarUsuarios":
                $this->cancelarActualizarUsuarios();
                break;
                
            case "mostrarInsertarUsuarios": 
                $this->mostrarInsertarUsuarios();
                break;
                    
            case "insertarUsuarios": 
                $this->insertarUsuarios();
                break;

            case "cancelarInsertarUsuarios":
                $this->cancelarInsertarUsuarios();
                break;

            case "eliminarUsuarios":
                $this->eliminarUsuarios();
                break;
        }
    }

    public function listarUsuarios() {

        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeUsuarios'] = $registroUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios/listarDTRegistrosUsuarios.php");
    }

    public function actualizarUsuarios (){
        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeUsuarios =$gestarUsuarios->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosUsuarios = $consultaDeUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios'] = $actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios/vistaActualizarUsuarios.php");	

    }

    public function confirmaActualizarUsuarios(){
        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarUsuarios = $gestarUsuarios->actualizar(array($this->datos)); //Se env??a datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualizaci??n realizada.";
        header("location:Controlador.php?ruta=listarUsuarios");	

    }

    public function cancelarActualizarUsuarios(){
        session_start();
        $_SESSION['mensaje'] = "Desisti?? de la actualizaci??n";
        header("location:Controlador.php?ruta=listarUsuarios");	
    }

    public function mostrarInsertarUsuarios(){


        header("Location: principal.php?contenido=vistas/vistasUsuarios/vistaInsertarUsuarios.php");

    }

    public function insertarUsuarios(){

        //Se instancia usuariosDAO para insertar
        $buscarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $UsuarioHallado = $buscarUsuarios->seleccionarId(array($this->datos['idUsuarios']));
        //Si no existe el usuario en la base se procede a insertar ****  		
        if (!$UsuarioHallado['exitoSeleccionId']){
            $insertarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoUsuarios = $insertarUsuarios->insertar($this->datos);  //inserci??n de los campos en la tabla usuarios 

            $resultadoInsercionUsuarios = $insertoUsuarios['resultado'];  //Traer el id con que qued?? el usuario de lo contrario la excepci??n o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idUsuarios'] . " con ??xito.  Agregado Nuevo Usuario con " . $resultadoInsercionUsuarios;					
            
            header("location:Controlador.php?ruta=listarUsuarios");
            
        }else{// Si existe se retornan los datos y se env??a el mensaje correspondiente ****
        
            session_start();
            $_SESSION['idUsuarios'] = $this->datos['idUsuarios'];
            $_SESSION['usuTipoDocumento'] = $this->datos['usuTipoDocumento'];
            $_SESSION['usuDocumento'] = $this->datos['usuDocumento'];
            $_SESSION['usuNombres'] = $this->datos['usuNombres'];
            $_SESSION['usuApellidos'] = $this->datos['usuApellidos'];
            $_SESSION['usuFechaNacimiento'] = $this->datos['usuFechaNacimiento'];
            $_SESSION['usuEdad'] = $this->datos['usuEdad'];
            $_SESSION['usuEstrato'] = $this->datos['usuEstrato'];					
            
            $_SESSION['mensaje'] = "   El c??digo " . $this->datos['idUsuarios'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarUsuarios");					

        }					
    }

    public function cancelarInsertarUsuarios(){
        session_start();
        $_SESSION['mensaje'] = "Desisti?? de la insercion";
        
        header("location:Controlador.php?ruta=listarUsuarios");	
    }

    public function eliminarUsuarios (){
        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeUsuarios =$gestarUsuarios->eliminarLogico(array($this->datos['idAct']));

        header("location:Controlador.php?ruta=listarUsuarios");	

    }


}

?>