<?php

require_once "modelos/ConstantesConexion.php";
require_once "modelos/modeloMovimientos/movimientosDAO.php";

use PHPUnit\Framework\TestCase;

final class MovimientosDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new MovimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
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
        $cueIdCue = readline("ingrese el id de la cuenta: ");
        $movTipo = readline("ingrese tipo de movimiento: ");
        $movNom = readline("ingrese nombre de movimiento: ");
        $movCueUso = readline("ingrese cuenta de uso: ");
        $movValor = readline("ingrese valor del movimiento: ");
        $movFec = readline("ingrese fecha del movimiento: ");
        $realizado = $this->op->insertar($dato = array('Usuarios_idUsuarios' => $usuIdUsu, 'Cuentas_idCuentas' => $cueIdCue, 'movTipo' => $movTipo, 'movNombre' => $movNom, 'movCuentaUso' => $movCueUso, 'movValor' =>$movValor, 'movFecha' => $movFec));
        $this->assertTrue(($realizado['inserto']));
    }

    public function testActualizar(){
        $id = readline("Para provar Actualizar: ingrese el id del registro que quiere modificar: ");
        $cueIdCue = readline("ingrese el id de la cuenta: ");
        $movTipo = readline("ingrese tipo de movimiento: ");
        $movNom = readline("ingrese nombre de movimiento: ");
        $movCueUso = readline("ingrese cuenta de uso: ");
        $movValor = readline("ingrese valor del movimiento: ");
        $movFec = readline("ingrese fecha del movimiento: ");
        $realizado = $this->op->actualizar($dato = array(array('Cuentas_idCuentas' => $cueIdCue, 'movTipo' => $movTipo, 'movNombre' => $movNom, 'movCuentaUso' => $movCueUso, 'movValor' => $movValor, 'movFecha' => $movFec, 'idMovimientos' => $id)));
        $this->assertTrue(($realizado['actualizacion']));
    }

    /*public function testEliminar() {
        $id = readline("Para provar eliminar: ingrese el id del registro que quiere eliminar: ");
        $realizado = $this->op->eliminar($dato = array($id));
        $this->assertTrue(($realizado['eliminar']));
    }*/

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