<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloBalances/BalancesDAO.php";

use PHPUnit\Framework\TestCase;

final class BalancesDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
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
        $idUsubal = readline("Para provar insertar, ingrese: un ID de usuario: ");
        $balTotal = readline("ingrese valor del balance: ");
        $realizado = $this->op->insertar($dato = array('Usuarios_idUsuarios' => $idUsubal, 'balTotal' => $balTotal));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar() {
        $idBalances = readline("Para provar Actualizar, ingrese el id del registro a modificar:  ");
        $balTotal = readline("ingrese el valor del balance: ");
        $realizado = $this->op->actualizar($dato = array(array('balTotal' => $balTotal, 'idBalances' => $idBalances)));
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