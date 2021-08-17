<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';

$sId=array(1);


$Usuarios=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$Usuarios->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
