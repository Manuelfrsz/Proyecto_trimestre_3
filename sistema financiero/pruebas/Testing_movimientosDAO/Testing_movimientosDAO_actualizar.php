<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloMovimientos/movimientosDAO.php';

$registro[0]['Cuentas_idCuentas']=2;	
$registro[0]['movNumero']=1;
$registro[0]['movTipo']='Pago de nomina';
$registro[0]['movNombre']="sueldo";
$registro[0]['movCuentaUso']="Ahorros banco Bogota";
$registro[0]['movValor']=454000;
$registro[0]['movFecha']=" 2021-08-23 ";
$registro[0]['idMovimientos']=1;

$movimientoActualizado=new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$movimientoActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>