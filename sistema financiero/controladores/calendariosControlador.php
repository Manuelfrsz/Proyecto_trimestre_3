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
                
            case "mostrarInsertarCalendarios": 
                $this->mostrarInsertarCalendarios();
                break;
                    
            case "insertarCalendarios": 
                $this->insertarCalendarios();
                break;

            case "cancelarInsertarCalendarios":
                $this->cancelarInsertarCalendarios();
                break;
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

    public function mostrarInsertarCalendarios(){

        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;


        header("Location: principal.php?contenido=vistas/vistasCalendarios/vistaInsertarCalendarios.php");

    }

    public function insertarCalendarios(){

        
        $buscarCalendarios = new CalendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $CalendarioHallado = $buscarCalendarios->seleccionarId(array($this->datos['idCalendarios']));
        //Si no existe el usuario en la base se procede a insertar ****  		
        if (!$CalendarioHallado['exitoSeleccionId']){
            $insertarCalendarios = new CalendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoCalendarios = $insertarCalendarios->insertar($this->datos);  //inserción de los campos en la tabla Calendarios

            $resultadoInsercionCalendarios = $insertoCalendarios['resultado'];  //Traer el id con que quedó el Calendario de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idCalendarios'] . " con éxito.  Agregado Nuevo CALENDARIO con " . $resultadoInsercionCalendarios;					
            
            header("location:Controlador.php?ruta=listarCalendarios");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['calTipoPago'] = $this->datos['calTipoPago'];
            $_SESSION['calNomPago'] = $this->datos['calNomPago'];
            $_SESSION['calFechaPago'] = $this->datos['calFechaPago'];
            $_SESSION['Usuarios_idUsuarios'] = $this->datos['Usuarios_idUsuarios'];
            					
            $_SESSION['mensaje'] = "   El código " . $this->datos['idCalendarios'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarCalendarios");					

        }					
    }

    public function cancelarInsertarCalendarios(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarCalendarios");	
    }

}

?>