<?php


include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$sId=array(1);


$Balances=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Balances->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
