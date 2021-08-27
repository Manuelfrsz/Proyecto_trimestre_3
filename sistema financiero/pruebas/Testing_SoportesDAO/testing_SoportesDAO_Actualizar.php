<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/soportesDAO.php';

$registro[0]['sopNomComprobante'] ="pago sueldo Luis";
$registro[0]['idSoportes'] = 1;


$SoportesActualizado=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$SoportesActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>