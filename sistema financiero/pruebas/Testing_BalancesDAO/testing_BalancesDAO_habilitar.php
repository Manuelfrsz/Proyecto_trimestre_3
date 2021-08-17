<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$sId=array(3);

$Balances=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$BalancesHabilitado=$Balances->habilitar($sId);

echo "<pre>";
print_r($BalancesHabilitado);
echo "</pre>";