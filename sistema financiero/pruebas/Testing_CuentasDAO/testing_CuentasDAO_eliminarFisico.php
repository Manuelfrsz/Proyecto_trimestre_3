<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/CuentasDAO.php';

$sId=array(8);

$Cuentas=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$CuentasEliminadoFisico=$Cuentas->eliminar($sId);

echo "<pre>";
print_r($CuentasEliminadoFisico);
echo "</pre>";
