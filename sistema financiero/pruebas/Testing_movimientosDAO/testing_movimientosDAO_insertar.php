<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloMovimientos/movimientosDAO.php';


$registro['idmovimientos']=10;
$registro['Usuarios_idUsuarios']=1;
$registro['Cuentas_idCuentas']=1;
$registro['Balances_idBalances']=1;
$registro['movEstado']=1;
$registro['movNumero']=10;
$registro['movTipo']='me pagan deuda';
$registro['movNombre']='deuda';
$registro['movCuentaUso']='Nomina banco Davivienda';
$registro['movValor']=500000;
$registro['movFecha']='2021-10-15';


$Movimientos=new movimientosDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$movimientoInsertado=$Movimientos->insertar($registro);


echo "<pre>";
print_r($movimientoInsertado);
echo "</pre>";