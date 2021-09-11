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
                
            case "mostrarInsertarAyudas": 
                $this->mostrarInsertarAyudas();
                break;
                    
            case "insertarAyudas": 
                $this->insertarAyudas();
                break;

            case "cancelarInsertarAyudas":
                $this->cancelarInsertarAyudas();
                break;

            case "eliminarAyudas":
                $this->eliminarAyudas();
                break;
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

    public function mostrarInsertarAyudas(){

        $gestarUsuarios = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroUsuarios = $gestarUsuarios->seleccionarTodos();

        session_start();
        $_SESSION['registroUsuarios'] = $registroUsuarios;
        $registroUsuarios = null;


        header("Location: principal.php?contenido=vistas/vistasAyudas/vistaInsertarAyudas.php");

    }

    public function insertarAyudas(){

        
        $buscarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);		
        //Se consulta si existe ya el registro
        $AyudaHallada = $buscarAyudas->seleccionarId(array($this->datos['idAyudas']));
        //Si no existe el usuario en la base se procede a insertar ****  		
        if (!$AyudaHallada['exitoSeleccionId']){
            $insertarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);	
            $insertoAyudas = $insertarAyudas->insertar($this->datos);  //inserción de los campos en la tabla Ayudas

            $resultadoInsercionAyudas = $insertoAyudas['resultado'];  //Traer el id con que quedó el Ayuda de lo contrario la excepción o fallo  

            session_start();
           $_SESSION['mensaje'] = "Registrado " . $this->datos['idAyudas'] . " con éxito.  Agregado Nuevo Ayuda con " . $resultadoInsercionAyudas;					
            
            header("location:Controlador.php?ruta=listarAyudas");
            
        }else{// Si existe se retornan los datos y se envía el mensaje correspondiente ****
        
            session_start();
            $_SESSION['ayuCodigoConsejo'] = $this->datos['ayuCodigoConsejo'];
            $_SESSION['ayuConsejo'] = $this->datos['ayuConsejo'];
            $_SESSION['Usuarios_idUsuarios'] = $this->datos['Usuarios_idUsuarios'];
            					
            $_SESSION['mensaje'] = "   El código " . $this->datos['idAyudas'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarAyudas");					

        }					
    }

    public function cancelarInsertarAyudas(){
        session_start();
        $_SESSION['mensaje'] = "Desistió de la insercion";
        
        header("location:Controlador.php?ruta=listarAyudas");	
    }

    public function eliminarAyudas (){
        $gestarAyudas = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeAyudas =$gestarAyudas->eliminarLogico(array($this->datos['idAct']));

        header("location:Controlador.php?ruta=listarAyudas");	

    }

}

?>