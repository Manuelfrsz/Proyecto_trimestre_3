<?php


include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$sId=array(3);

$Balance=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$BalanceElimandoLogico=$Balance->eliminarLogico($sId);

echo "<pre>";
print_r($BalanceElimandoLogico);
echo "</pre>";