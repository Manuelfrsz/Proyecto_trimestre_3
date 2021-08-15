<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloLibros/LibroDAO.php';

$Libros=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadoCompleto=$Libros->seleccionarTodos();
echo "hola";
echo "<pre>";
print_r ($listadoCompleto);
echo "<pre>";





?>