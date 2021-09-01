<?php

use PHPUnit\Framework\TestCase;
require_once "HolaMundo.php";

final class HolaMundoTest extends TestCase{
	
	public function testDiceHolaMundoCuandoSaluda(){
		$HolaMundo = new HolaMundo();
		$this->assertEquals("Hola Mundo!", $HolaMundo->saluda());
	}
}

?>