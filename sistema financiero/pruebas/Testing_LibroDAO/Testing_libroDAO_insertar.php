<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloLibros/LibroDAO.php';

$registro['isbn'] =127;
$registro['titulo'] ="2252819 R1 CRUD INSERTAR";
$registro['autor'] ="LUIS";
$registro['precio'] ="100000";
$registro['categoriaLibro_catLibId'] =2;

$libros=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$libroinsertado=$libros->insertar($registro);

echo "<pre>";
print_r($libroinsertado);
echo "<pre>";





?>