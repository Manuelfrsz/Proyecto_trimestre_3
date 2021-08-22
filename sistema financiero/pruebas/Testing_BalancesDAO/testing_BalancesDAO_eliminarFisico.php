<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$sId=array(4);

$Balances=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$BalancesEliminadoFisico=$Balances->eliminar($sId);

echo "<pre>";
print_r($BalancesEliminadoFisico);
echo "</pre>";
