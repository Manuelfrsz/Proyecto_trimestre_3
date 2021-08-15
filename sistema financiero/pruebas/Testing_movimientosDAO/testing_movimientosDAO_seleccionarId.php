<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloMovimientos/movimientosDAO.php';

$sId=array(5);


$Movimientos=new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Movimientos->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
