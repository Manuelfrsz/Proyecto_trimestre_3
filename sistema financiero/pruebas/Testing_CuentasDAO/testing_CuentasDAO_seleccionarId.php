<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/CuentasDAO.php';

$sId=array(6);


$Cuentas=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Cuentas->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
