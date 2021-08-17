<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloCuentas/CuentasDAO.php';


$registro['idCuentas']=8;
$registro['Usuarios_idUsuarios']=1;
$registro['cueEstado']=1;
$registro['cueTipo']="efectivo";
$registro['cueNombre']="bolsillo manuel";
$registro['cueSaldo']=30000;


$Cuentas=new CuentasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$CuentasInsertado=$Cuentas->insertar($registro);


echo "<pre>";
print_r($CuentasInsertado);
echo "</pre>";