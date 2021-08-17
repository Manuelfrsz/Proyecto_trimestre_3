<?php


include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';

$sId=array(3);

$Usuarios=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$UsuariosElimandoLogico=$Usuarios->eliminarLogico($sId);

echo "<pre>";
print_r($UsuariosElimandoLogico);
echo "</pre>";