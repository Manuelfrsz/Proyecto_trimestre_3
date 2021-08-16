<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCalendarios/calendariosDAO.php';

$sId=array(9);


$Calendarios=new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$calendarioSeleccionado=$Calendarios->seleccionarId($sId);

echo "<pre>";
print_r($calendarioSeleccionado);
echo "</pre>";
