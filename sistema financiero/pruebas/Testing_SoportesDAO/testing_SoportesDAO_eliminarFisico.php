<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/SoportesDAO.php';

$sId=array(10);

$Soportes=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$SoportesEliminadoFisico=$Soportes->eliminar($sId);

echo "<pre>";
print_r($SoportesEliminadoFisico);
echo "</pre>";
