<?php

class Operaciones{
	
	public function __constructor(){
		echo "Calculadora Numerica 2.0";
    }
	
	public function sum($n1, $n2){
		if ($n1 === null || $n2 === null || !is_numeric($n1) || !is_numeric($n2)){
			throw new InvalidArgumentException('Valores no son Numericos');
		}
		
		return $n1 + $n2;
	}
	
	public function division($n1, $n2){
		if ($n1 === null || $n2 === null || !is_numeric($n1) || !is_numeric($n2)){
			throw new InvalidArgumentException('Valores no son Numericos');
		}
	    if ($n2 == 0){
			throw new InvalidArgumentException('Division por Cero');
		}
		
		return $n1 / $n2;
    }
}

?>