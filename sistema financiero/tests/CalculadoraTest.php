<?php

use PHPUnit\Framework\TestCase;
require_once "Calculadora.php";

final class CalculadoraTest extends TestCase{

public function testSuma(){
	$calc = new Calculadora();
	$this->assertEquals(7, $calc->suma(3, 4));
   }
}
?>