<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';

$Balances=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Balances->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>