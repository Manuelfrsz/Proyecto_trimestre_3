<?php

include_once "../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";

class LibroDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginBD, $passwordBD){
        parent::__construct($servidor, $base, $loginBD, $passwordBD);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT l.isbn,l.titulo,l.autor,l.precio,cl.catLibId,cl.catLibNombre ";
        $planconsulta.="FROM libros l ";
        $planconsulta.="JOIN categorialibro cl ON l.categoriaLibro_catLibId=cl.catLibId "; 
        $planconsulta.="ORDER BY l.isbn ASC ";

        $registroLibros = $this->conexion->prepare($planconsulta);
        $registroLibros->execute();

        $listadoRegistrosLibros = array();

        while( $registro = $registroLibros->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosLibros[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosLibros;
    }

    public function seleccionarID($sId){
         $planconsulta = "select * from Libros l ";
         $planconsulta.= "where l.isbn = ? ";

         $listar = $this->conexion->prepare($planconsulta);
         $listar->execute(array($sId[0]));
         $registroEncontrado = array();
         
         while( $registro = $listar->fetch(PDO::FETCH_OBJ)){
            $registroEncontrado[] = $registro;
         }
         $this->cierreBd();

         if(!empty($registroEncontrado)){
             return['exitoSeleccionId'=>true, 'registroEncontrado'=>$registroEncontrado];
        } else {
             return['exitoSeleccionId'=>false, 'registroEncontrado'=>$registroEncontrado];
            }
    }
    
    public function insertar($registro){
        try {
            $consulta = "INSERT INTO libros (isbn, titulo, autor, 
            precio, categoriaLibro_catLibId) VALUES (:isbn , :titulo , 
            :autor , :precio , :categoriaLibro_catLibId );";	
            
            $inserta = $this->conexion->prepare($consulta);
            
            $inserta->bindParam(":isbn ", $registro['isbn']);
            $inserta->bindParam(":titulo ", $registro['titulo']);
            $inserta->bindParam(":autor ", $registro['autor']);
            $inserta->bindParam(":precio ", $registro['precio']);
            $inserta->bindParam(":categpriaLibro_catLibid ", $registro['categpriaLibro_catLibid']);

            $insercion = $inserta->execute();
            $clavePrimaria = $this->conexion->lastInsertId();

            return['inserto' => 1, 'resultado' => $clavePrimaria];
            $this->cierreBd();
		
        } catch (PDOException $pdoExc){
			return['inserto' => 0, $pdoExc->errorInfo[2]];			
        } 
        
    }

    public function actualizar($registro){
        
    }

    public function eliminar($sId = array()){
          
          $planconsulta = "delete from libros ";
          $planconsulta.= "where isbn = :isbn ";
          $eliminar = $this->conexion->prepare($planconsulta);
          $eliminar->bindParam(':isbn', $sId[0], PDO::PARAM_INT);
          $resultado = $eliminar->execute();

          $this->cierreBd();

          if(!empty($resultado)){
              return['eliminar' => true, 'registroEliminado' => array($sId['0'])];
          } else{
              return ['eliminar' => false,'registroEliminado' => array($sId['0'])];
          }
    }

    public function habilitar($sId = array()){
        try{  
            $cambiarEstado = 1;

          if (isset($sId['isbn'])){
              $actualizar ="UPDATE libros set estado = ? where isbn = ? ;";
          $actualizacion = $this->conexion->prepare($actualizar);
          $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId['0']));

          return ['actualiuzacion' => $actualizacion, 'mensaje' => "Registro Activado."];
          }
        }
        catch (PDOException $pdoExc){
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminarLogico($sId = array()){
        try{  
            $cambiarEstado = 0;

          if (isset($sId['isbn'])){
              $actualizar ="UPDATE libros set estado = ? where isbn = ? ;";
          $actualizacion = $this->conexion->prepare($actualizar);
          $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId['0']));

          return ['actualiuzacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
          }
        }
        catch (PDOException $pdoExc){
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
}
?>