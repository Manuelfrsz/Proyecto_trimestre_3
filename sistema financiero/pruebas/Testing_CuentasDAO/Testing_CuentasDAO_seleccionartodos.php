<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/CuentasDAO.php';

$Cuentas=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Cuentas->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>