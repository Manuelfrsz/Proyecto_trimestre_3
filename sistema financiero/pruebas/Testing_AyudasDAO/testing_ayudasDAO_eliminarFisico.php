<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';

$sId=array(16);

$Ayudas=new ayudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$ayudaEliminadoFisico=$Ayudas->eliminar($sId);

echo "<pre>";
print_r($ayudaEliminadoFisico);
echo "</pre>";
