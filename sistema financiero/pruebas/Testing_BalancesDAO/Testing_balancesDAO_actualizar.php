<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$registro[0]['idBalances'] =3;
$registro[0]['balTotal'] =454500;


$balanceActualizado=new balancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$balanceActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>