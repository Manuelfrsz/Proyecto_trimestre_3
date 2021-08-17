<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';

$sId=array(4);

$Usuarios=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$UsuariosEliminadoFisico=$Usuarios->eliminar($sId);

echo "<pre>";
print_r($UsuariosEliminadoFisico);
echo "</pre>";
