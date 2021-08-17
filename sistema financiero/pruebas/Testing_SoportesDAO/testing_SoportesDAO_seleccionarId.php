<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/SoportesDAO.php';

$sId=array(6);


$Soportes=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Soportes->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
