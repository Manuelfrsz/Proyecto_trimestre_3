<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/cuentasDAO.php';

$registro[0]['cueTipo'] ="actualizacion tipo";
$registro[0]['cueNombre'] ="actualizacion";
$registro[0]['cueSaldo'] =2;
$registro[0]['idCuentas'] = 1;


$CuentasActualizado=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$CuentasActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>