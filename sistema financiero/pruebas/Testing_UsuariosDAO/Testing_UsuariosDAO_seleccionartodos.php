<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';

$Usuarios=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Usuarios->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>