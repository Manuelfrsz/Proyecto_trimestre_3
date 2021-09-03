<?php

include_once PATH . 'modelos/modeloMovimientos/movimientosDAO.php';
include_once PATH . 'modelos/modeloCuentas/cuentasDAO.php';

class movimientosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->movimientosControlador();
    }

    public function movimientosControlador() {
        switch ($this->datos['ruta']) {
            case "listarMovimientos": //provisionalmente para trabajar con datatables
                $this->listarMovimientos();
                break;

            case "actualizarMovimientos": 
                $this->actualizarMovimientos();
                break;
    
            case "confirmaActualizarMovimientos":
                $this->confirmaActualizarMovimientos();
                break;

            case "cancelarActualizarMovimientos":
                $this->cancelarActualizarMovimientos();
                break;
                    
            case "mostrarInsertarMovimientos": 
                $this->mostrarInsertarMovimientos();
                break;
                        
            case "insertarMovimientos": 
                $this->insertarMovimientos();
                break;
    
            case "cancelarInsertarMovimientos":
                $this->cancelarInsertarMovimientos();
                break;
            
        }
    }

    public function listarMovimientos() {

        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroMovimientos = $gestarMovimientos->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeMovimientos'] = $registroMovimientos;

        header("location:principal.php?contenido=vistas/vistasMovimientos/listarDTRegistrosMovimientos.php");
    }

    public function actualizarMovimientos (){
        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeMovimientos =$gestarMovimientos->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

        $actualizarDatosMovimientos = $consultaDeMovimientos['registroEncontrado'][0];

        $gestarCuentas = new cuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCuentas = $gestarCuentas->seleccionarTodos();

        
        session_start();
        $_SESSION['actualizarDatosMovimientos'] = $actualizarDatosMovimientos;

        $_SESSION['registroCuentas'] = $registroCuentas;

        header("location:principal.php?contenido=vistas/vistasMovimientos/vistaActualizarMovimientos.php");	

    }

    public function confirmaActualizarMovimientos(){
        $gestarMovimientos = new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarMovimientos = $gestarMovimientos->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarMovimientos");	

    }

    public function cancelarActualizarMovimientos(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarMovimientos");	
    }

    public function mostrarInsertarMovimientos(){


       /* $gestarUsuarios = new usuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;*/

        header("Location: principal.php?contenido=vistas/vistasMovimientos/vistaInsertarMovimientos.php");

    }

    public function insertarMovimientos(){

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

    public function cancelarInsertarMovimientos(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarUsuarios");	
    }

}

?>