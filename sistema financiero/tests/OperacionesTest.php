<?php

use PHPUnit\Framework\TestCase;
require_once "Operaciones.php";

final class OperacionesTest extends TestCase{

      private $op;
   
      public function setUp(): void{
	  $this->op = new Operaciones();
      }
   
      public function testSumaConDosValores(){
	  $this->assertEquals(7, $this->op->sum(2, 5));
      }
   
      public function testSumaConValoresNulos(){
	  $this->expectException(InvalidArgumentException::class);
	  $this->op->sum(null, null);
      }
   
      public function testSumaConValoresNoNumericos(){
	  $this->expectException(InvalidArgumentException::class);
	  $this->op->sum('a', 'hello');
      }
   
      public function testDividirConDosValores(){
	  $this->assertEquals(1, $this->op->division(5, 5));
      }
   
      public function testDividirConValoresNulos(){
	  $this->expectException(InvalidArgumentException::class);
	  $this->op->division(null, null);
      }
   
      public function testDividirConValoresNoNumericos(){
	  $this->expectException(InvalidArgumentException::class);
	  $this->op->division('a', 'hello');
      }
   
      public function testDividirEntreCero(){
	  $this->expectException(InvalidArgumentException::class);
	  $this->op->division(5, 0);
      }
    }

?>