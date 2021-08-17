<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/CuentasDAO.php';

$sId=array(5);

$Cuentas=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$CuentasHabilitado=$Cuentas->habilitar($sId);

echo "<pre>";
print_r($CuentasHabilitado);
echo "</pre>";