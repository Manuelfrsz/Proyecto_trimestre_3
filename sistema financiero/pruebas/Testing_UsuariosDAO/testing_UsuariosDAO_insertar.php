<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloUsuarios/UsuariosDAO.php';


$registro['idUsuarios']=4;
$registro['usuEstado']=1;
$registro['usuTipoDocumento']="cc";
$registro['usuDocumento']=1034576342;
$registro['usuNombres']='raul alverto';
$registro['usuApellidos']='ramirez cardona';
$registro['usuNombres']='raul alverto';
$registro['usuFechaNacimiento']='1992-06-06';
$registro['usuEdad']=29;
$registro['usuEstrato']=3;


$Usuarios=new UsuariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$UsuariosInsertado=$Usuarios->insertar($registro);


echo "<pre>";
print_r($UsuariosInsertado);
echo "</pre>";