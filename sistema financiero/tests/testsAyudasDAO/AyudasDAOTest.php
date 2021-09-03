<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloAyudas/AyudasDAO.php";

use PHPUnit\Framework\TestCase;

final class AyudasDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
    }

    public function testSeleccionarTodos() {
        $this->assertEmpty(!$this->op->seleccionarTodos());
    }

    public function testSeleccionarID() {
        $dato = readline("Para provar seleccionarId, ingrese un ID: ");
        $realizado = $this->op->seleccionarId($dato);
        $this->assertTrue(($realizado['exitoSeleccionId']));
    }

    public function testInsertar() {
        $idUsuarios = readline("Para provar insertar, ingrese: un ID de Usuarios: ");
        $codigo = readline("ingrese el Codigo del consejo: ");
        $consejo = readline("ingrese el Consejo: ");
        $realizado = $this->op->insertar($dato = array('Usuarios_idUsuarios' => $idUsuarios, 'ayuCodigoConsejo' => $codigo, 'ayuConsejo' => $consejo));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar() {
        $idAyudas = readline("Para provar Actualizar, ingrese el id del registro a modificar:  ");
        $consejo = readline("ingrese el consejo: ");
        $realizado = $this->op->actualizar($dato = array(array('ayuConsejo' => $consejo, 'idAyudas' => $idAyudas)));
        $this->assertTrue(($realizado['actualizacion']));
    }

    public function testEliminar() {
        $id = readline("Para provar Eliminar, ingrese el id del registro a eliminar:  ");
        $realizado = $this->op->eliminar($dato = array($id));
        $this->assertTrue(($realizado['eliminar']));
    }

    public function testEliminarLogico() {
        $id = readline("Para provar Eliminar logico, ingrese el id del registro a eliminar:  ");
        $realizado = $this->op->eliminarLogico($dato = array($id));
        $this->assertTrue(($realizado['actualizacion']));
    }

    public function testHabilitar() {
        $id = readline("Para provar Habilitar, ingrese el id del registro a Habilitar:  ");
        $realizado = $this->op->habilitar($dato = array($id));
        $this->assertTrue(($realizado['actualizacion']));
    }

}

//https://phpunit.readthedocs.io/es/latest/assertions.html
?>