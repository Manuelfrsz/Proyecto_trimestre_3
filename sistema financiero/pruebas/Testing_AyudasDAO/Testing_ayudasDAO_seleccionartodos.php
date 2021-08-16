<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';

$Ayudas=new ayudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Ayudas->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>