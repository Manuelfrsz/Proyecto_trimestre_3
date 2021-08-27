<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';

$registro[0]['idUsuarios'] =1;
$registro[0]['usuTipoDocumento'] =" cc ";
$registro[0]['usuDocumento'] =1032500387;
$registro[0]['usuNombres'] =" Manuel Fernando ";
$registro[0]['usuApellidos'] =" Romero Zuares ";
$registro[0]['usuFechaNacimiento'] =" 1998-06-29 ";
$registro[0]['usuEdad'] = 23;
$registro[0]['usuEstrato'] = 2;

$usuarioActualizado=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion=$usuarioActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "<pre>";





?>