<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloUsuarios/usuariosDAO.php";

use PHPUnit\Framework\TestCase;

final class UsuariosDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
    }

    public function testSeleccionarTodos() {
        $this->assertEmpty($this->op->seleccionarTodos());
    }

    public function testSeleccionarID(){
        $dato = readline("Para provar seleccionarId, ingrese un ID: ");
        $realizado = $this->op->seleccionarId($dato);
        $this->assertTrue(($realizado['exitoSeleccionId']));
    }

    public function testInsertar(){
        $usuTipoDOC = readline("Para provar insertar: ingrese tipo de documento: ");
        $numDoc = readline("ingrese documento: ");
        $nombres = readline("ingrese nombres: ");
        $apellidos = readline("ingrese apellidos: ");
        $fecNac = readline("ingrese fecha de nacimiento: ");
        $edad = readline("ingrese su edad: ");
        $estrato = readline("ingrese su estrato: ");
        $realizado = $this->op->insertar($dato = array('usuTipoDocumento' => $usuTipoDOC, 'usuDocumento' => $numDoc, 'usuNombres' => $nombres, 'usuApellidos' => $apellidos, 'usuFechaNacimiento' =>$fecNac, 'usuEdad' => $edad, 'usuEstrato' => $estrato));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar(){
        $id = readline("Para provar Actualizar: ingrese el id del registro que quiere modificar: ");
        $usuTipoDOC = readline("ingrese tipo de documento: ");
        $numDoc = readline("ingrese documento: ");
        $nombres = readline("ingrese nombres: ");
        $apellidos = readline("ingrese apellidos: ");
        $fecNac = readline("ingrese fecha de nacimiento: ");
        $edad = readline("ingrese su edad: ");
        $estrato = readline("ingrese su estrato: ");
        $realizado = $this->op->actualizar($dato = array(array('usuTipoDocumento' => $usuTipoDOC, 'usuDocumento' => $numDoc, 'usuNombres' => $nombres, 'usuApellidos' => $apellidos, 'usuFechaNacimiento' =>$fecNac, 'usuEdad' => $edad, 'usuEstrato' => $estrato, 'idUsuarios' => $id)));
        $this->assertTrue(($realizado['actualizacion']));
    }

    public function testEliminar() {
        $id = readline("Para provar eliminar: ingrese el id del registro que quiere eliminar: ");
        $realizado = $this->op->eliminar($dato = array($id));
        $this->assertTrue(($realizado['eliminar']));
    }

    public function testEliminarLogico() {
        $id = readline("Para provar eliminar logico : ingrese el id del registro que quiere eliminar: ");
        $realizado = $this->op->eliminarLogico($dato = array($id));
        $this->assertTrue(($realizado['actualizacion']));
    }

    public function testHabilitar() {
        $id = readline("Para provar habilitar: ingrese el id del registro que quiere habilitar: ");
        $realizado = $this->op->habilitar($dato = array($id));
        $this->assertTrue(($realizado['actualizacion']));
    }

}
?>