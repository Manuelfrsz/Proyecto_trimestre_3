use asistente_financiero;

insert into `usuarios` (`idUsuarios`, `usuEstado`, `usuTipoDocumento`, `usuDocumento`, `usuNombres`, `usuApellidos`, `usuFechaNacimiento`, `usuEdad`, `usuEstrato`)
values
(1, 1, 'cc', '1032500387', 'Manuel Fernando', 'Romero Suarez', '1998-06-29', 23, 2),
(2, 1, 'cc', '1022989588', 'Luis Eduardo', 'Jimenez Cangrejo', '1993-09-19', 27, 1),
(3, 1, 'cc', '1033759092', 'Oscar Mauricio', 'Ramirez Narvaez', '1993-11-07', 27, 2);

insert into `cuentas`(`idcuentas` , `usuarios_idUsuarios` , `cueEstado` , `cueTipo` , `cueNombre` , `cueSaldo`) 
values
(1, 1, 1, 'Nomina', 'Nomina Banco Davivienda', 254000),
(2, 2, 1, 'Ahorros', 'Ahorros Banco Bogota', 304000),
(3, 3, 1, 'Nomina', 'Nomina Banco Bogota', 454000),
(4, 2, 1, 'Efectivo', 'billetera luis', 180000),
(5, 1, 1, 'Credito', 'Prestamo computador', 1000000),
(6, 2, 1, 'Credito', 'Prestamo Motocicleta', 7553900),
(7, 3, 1, 'Efectivo', 'bolsillo Oscar', 500);

insert into `balances`(`idBalances`,`Usuarios_idUsuarios`, `balEstado`, `balTotal`)
values
(1, 1, 1, 254000), 
(2, 2, 1, 484000), 
(3, 3, 1, 454500); 

insert into `movimientos`(`idmovimientos` , `Usuarios_idUsuarios` ,`Cuentas_idCuentas`, `Balances_idBalances`, `movEstado` , `movNumero` , `movTipo` , `movNombre` , `movCuentaUso` , `movValor` , `movFecha`)
values
(1, 2, 2, 2, 1, 1, 'Pago de nomina', 'sueldo', 'Ahorros banco Bogota', 454000, '2021-08-23'),
(2, 1, 1, 1, 1, 2, 'Pago de nomina', 'sueldo', 'Nomina banco Davivienda', 454000, '2021-08-23'),
(3, 3, 3, 3, 1, 3, 'Pago de nomina', 'sueldo', 'Nomina banco Bogota', 454000, '2021-08-23'),
(4, 2, 4, 2, 1, 4, 'Compra', 'Celular', 'billetera luis', 70000, '2021-09-05'),
(5, 1, 1, 1, 1, 5, 'Pago Cuota', 'Cuota computador', 'Nomina banco Davivienda', 200000, '2021-08-30'),
(6, 1, 5, 1, 1, 6, 'Cuota pagada', 'Cuota pagada PC', 'Prestamo computador', 200000, '2021-08-30'),
(7, 3, 7, 3, 1, 7, 'Compra', 'Canilleras y tenis', 'Bolsillo Oscar', 100000, '2021-09-03'),
(8, 2, 2, 2, 1, 8, 'Retiro', 'Retiro 150000', 'Ahorros banco Bogota', 150000, '2021-09-07'),
(9, 2, 4, 2, 1, 9, 'Ingreso', 'Sumo el retiro', 'billetera luis', 150000, '2021-09-07');