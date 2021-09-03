<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloCalendarios/calendariosDAO.php";

use PHPUnit\Framework\TestCase;

final class CalendariosDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
    }

    public function testSeleccionarTodos() {
        $this->assertEmpty(!$this->op->seleccionarTodos());
    }

    public function testSeleccionarID(){
        $dato = readline("Para provar seleccionarId, ingrese un ID: ");
        $realizado = $this->op->seleccionarId($dato);
        $this->assertTrue(($realizado['exitoSeleccionId']));
    }

    public function testInsertar(){
        $usuIdUsu = readline("Para provar insertar: ingrese id del usuario: ");
        $calTipoPago = readline("ingrese tipo de pago: ");
        $calNomPago = readline("ingrese nombre de pago: ");
        $calFecha = readline("ingrese fecha de pago: ");
        $realizado = $this->op->insertar($dato = array('Usuarios_idUsuarios' => $usuIdUsu, 'calTipoPago' => $calTipoPago, 'calNomPago' => $calNomPago, 'calFechaPago' => $calFecha));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar(){
        $id = readline("Para provar Actualizar: ingrese el id del registro que quiere modificar: ");
        $usuIdUsu = readline("Para provar insertar: ingrese id del usuario: ");
        $calTipoPago = readline("ingrese tipo de pago: ");
        $calNomPago = readline("ingrese nombre de pago: ");
        $calFecha = readline("ingrese fecha de pago: ");
        $realizado = $this->op->actualizar($dato = array(array('Usuarios_idUsuarios' => $usuIdUsu, 'calTipoPago' => $calTipoPago, 'calNomPago' => $calNomPago, 'calFechaPago' => $calFecha, 'idCalendarios' => $id)));
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