<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCalendarios/calendariosDAO.php';

$sId=array(4);

$Calendarios=new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$calendarioHabilitado=$Calendarios->habilitar($sId);

echo "<pre>";
print_r($calendarioHabilitado);
echo "</pre>";