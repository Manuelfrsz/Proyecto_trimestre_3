<?php

include_once "../../modelos/ConstantesConexion.php";
include_once PATH."modelos/ConBdMysql.php";
include_once PATH.'modelos/modeloSoportes/SoportesDAO.php';


$registro['idSoportes']=10;
$registro['Movimientos_idMovimientos']=9;
$registro['sopEstado']=1;
$registro['sopNomComprobante']="prueba soporte";


$Soportes=new SoportesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$SoportesInsertado=$Soportes->insertar($registro);


echo "<pre>";
print_r($SoportesInsertado);
echo "</pre>";