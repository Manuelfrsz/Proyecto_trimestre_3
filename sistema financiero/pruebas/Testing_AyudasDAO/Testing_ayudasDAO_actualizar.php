<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';

$registro[0]['ayuConsejo'] ="23A";
$registro[0]['idAyudas'] =1;


$ayudasActualizado=new AyudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$ayudasActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>