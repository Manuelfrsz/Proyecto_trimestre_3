<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloAyudas/ayudasDAO.php';


$registro['idAyudas']=16;
$registro['Usuarios_idUsuarios']=2;
$registro['ayuEstado']=1;
$registro['ayuCodigoConsejo']=16;
$registro['ayuConsejo']='No ignores los pequeños gastos';

$Ayudas=new ayudasDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$ayudasInsertado=$Ayudas->insertar($registro);


echo "<pre>";
print_r($ayudasInsertado);
echo "</pre>";