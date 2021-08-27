<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCalendarios/CalendariosDAO.php';

$registro[0]['calTipoPago'] ="actualizacion tipo";
$registro[0]['calNomPago'] ="actualizacion";
$registro[0]['calFechaPago'] ="1111-11-11";
$registro[0]['idCalendarios'] = 1;


$CalendariosActualizado=new CalendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$CalendariosActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>