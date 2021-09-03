<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modelosoportes/SoportesDAO.php";

use PHPUnit\Framework\TestCase;

final class SoportesDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
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
        $idmov = readline("Para provar insertar, ingrese: un ID de Movimiento: ");
        $sopNombre = readline("ingrese el nombre del comporbante: ");
        $realizado = $this->op->insertar($dato = array('Movimientos_idMovimientos' => $idmov, 'sopNomComprobante' => $sopNombre));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar() {
        $idSop = readline("Para provar Actualizar, ingrese el id del registro a modificar:  ");
        $sopNom = readline("ingrese el nombre del soporte: ");
        $realizado = $this->op->actualizar($dato = array(array('sopNomComprobante' => $sopNom, 'idSoportes' => $idSop)));
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