<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCalendarios/calendariosDAO.php';

$sId=array(11);

$Calendarios=new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$calendarioEliminadoFisico=$Calendarios->eliminar($sId);

echo "<pre>";
print_r($calendarioEliminadoFisico);
echo "</pre>";
