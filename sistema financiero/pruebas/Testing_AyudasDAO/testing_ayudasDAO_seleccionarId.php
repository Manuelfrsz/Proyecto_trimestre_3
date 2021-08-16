<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';

$sId=array(7);


$Ayudas=new ayudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Ayudas->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
