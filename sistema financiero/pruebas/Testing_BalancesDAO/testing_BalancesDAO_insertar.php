<?php


include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloBalances/balancesDAO.php';


$registro['idBalances']=4;
$registro['Usuarios_idUsuarios']=2;
$registro['balEstado']=1;
$registro['balTotal']=20000;


$Balances=new BalancesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$BalancesInsertado=$Balances->insertar($registro);


echo "<pre>";
print_r($BalancesInsertado);
echo "</pre>";