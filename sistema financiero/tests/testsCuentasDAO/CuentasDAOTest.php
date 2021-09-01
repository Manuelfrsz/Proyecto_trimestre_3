<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloCuentas/cuentasDAO.php";

use PHPUnit\Framework\TestCase;

final class CuentasDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
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
        $idUsuCue = readline("Para provar insertar, ingrese: un ID de usuario: ");
        $tipoCue = readline("ingrese un tipo de cuenta: ");
        $nombreCue = readline("ingreae un nombre de cuenta: ");
        $saldoCue = readline("ingrese el saldo de la cuenta: ");
        $realizado = $this->op->insertar($dato = array('Usuarios_idUsuarios' => $idUsuCue, 'cueTipo' => $tipoCue, 'cueNombre' => $nombreCue, 'cueSaldo' => $saldoCue ));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar() {
        $idcuentas = readline("Para provar Actualizar, ingrese el id del registro a modificar:  ");
        $idUsuCue = readline("ingrese un ID de usuario: ");
        $tipoCue = readline("ingrese un tipo de cuenta: ");
        $nombreCue = readline("ingreae un nombre de cuenta: ");
        $saldoCue = readline("ingrese el saldo de la cuenta: ");
        $realizado = $this->op->actualizar($dato = array(array('Usuarios_idUsuarios' => $idUsuCue, 'cueTipo' => $tipoCue, 'cueNombre' => $nombreCue, 'cueSaldo' => $saldoCue, 'idCuentas' => $idcuentas)));
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