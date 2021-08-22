<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/SoportesDAO.php';

$Soportes=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Soportes->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>