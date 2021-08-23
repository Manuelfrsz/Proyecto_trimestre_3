<?php

include_once PATH . 'modelos/modeloLibros/LibroDAO.php';
include_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroDAO.php';

class LibrosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->librosControlador();
    }

    public function librosControlador() {
        switch ($this->datos['ruta']) {
            case "listarLibros": //provisionalmente para trabajar con datatables
                $this->listarLibros();
                break;
            case "actualizarLibro": //provisionalmente para trabajar con datatables
                $this->actualizarLibro();
                break;
            case "confirmaActualizarLibro": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarLibro();
                break;					
        }
    }

    public function listarLibros() {

        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroLibros = $gestarLibros->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeLibros'] = $registroLibros;

        header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosLibros.php");
    }
	public function actualizarLibro (){
                $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
				$consultaDeLibro =$gestarLibros->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

                $actualizarDatosLibro = $consultaDeLibro['registroEncontrado'][0];

                /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
                $gestarCategoriaLibros = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroCategoriasLibros = $gestarCategoriaLibros->seleccionarTodos();
                /*                 * ************************************************************************* */


                session_start();
                $_SESSION['actualizarDatosLibro'] = $actualizarDatosLibro;
                $_SESSION['registroCategoriasLibros'] = $registroCategoriasLibros;


                header("location:principal.php?contenido=vistas/vistasLibros/vistaActualizarLibro.php");	
		
	}
	
	public function confirmaActualizarLibro(){
                $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarLibro = $gestarLibros->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarLibros");	
		
	}

}

?>