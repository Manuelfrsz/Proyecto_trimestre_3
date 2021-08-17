<?php


include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/SoportesDAO.php';

$sId=array(5);

$Soportes=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$SoportesElimandoLogico=$Soportes->eliminarLogico($sId);

echo "<pre>";
print_r($SoportesElimandoLogico);
echo "</pre>";