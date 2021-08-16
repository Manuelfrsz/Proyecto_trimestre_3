<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloMovimientos/movimientosDAO.php';

$sId=array(1);

$Movimientos=new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$movimientoElimandoLogico=$Movimientos->eliminarLogico($sId);

echo "<pre>";
print_r($movimientoElimandoLogico);
echo "</pre>";