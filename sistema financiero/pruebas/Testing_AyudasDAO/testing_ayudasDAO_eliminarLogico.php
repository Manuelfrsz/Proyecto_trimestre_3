<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';

$sId=array(5);

$Ayudas=new ayudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$ayudaElimandoLogico=$Ayudas->eliminarLogico($sId);

echo "<pre>";
print_r($ayudaElimandoLogico);
echo "</pre>";