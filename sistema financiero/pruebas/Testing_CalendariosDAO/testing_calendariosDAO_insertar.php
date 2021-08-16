<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCalendarios/calendariosDAO.php';


$registro['idcalendarios']=11;
$registro['Usuarios_idUsuarios']=3;
$registro['calEstado']=1;
$registro['calTipoPago']='pago arriendo';
$registro['calNomPago']='pago mes del arriendo';
$registro['calFechaPago']='2021-11-23';

$Calendarios=new calendariosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$calendarioInsertado=$Calendarios->insertar($registro);


echo "<pre>";
print_r($calendarioInsertado);
echo "</pre>";