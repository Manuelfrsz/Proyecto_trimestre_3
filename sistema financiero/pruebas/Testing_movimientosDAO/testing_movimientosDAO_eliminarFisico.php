<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloMovimientos/movimientosDAO.php';

$sId=array(10);

$Movimientos=new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$movimientoEliminadoFisico=$Movimientos->eliminar($sId);

echo "<pre>";
print_r($movimientoEliminadoFisico);
echo "</pre>";
