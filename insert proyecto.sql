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

insert into `soportes`(`idsoportes` , `Movimientos_idMovimientos` , `sopEstado` , `sopNomComprobante`)
values 
(1, 1, 1, 'pago sueldo luis'),
(2, 2, 1, 'pago sueldo Manuel'),
(3, 3, 1, 'pago sueldo oscar'),
(4, 4, 1, 'Compra cel y billetera'),
(5, 5, 1, 'cuota computador'),
(6, 6, 1, 'cuota paga pc'),
(7, 7, 1, 'compra canill y tenis'),
(8, 8, 1, '150000 retiro'),
(9, 9, 1, 'ingreso a Billetera');

insert into `ayudas`(`idAyudas` , `Usuarios_idUsuarios` , `ayuEstado` , `ayuCodigoConsejo` , `ayuConsejo`)
values
(1, 1, 1, 1, 'Apunta tus gastos fijos'),
(2, 1, 1, 2, 'separa al menos el 10'),
(3, 1, 1, 3, 'Manten tus gastos personales separados de lo de tu negocio'),
(4, 1, 1, 4, 'Trata de lo posible de no pedir financiaciones'),
(5, 1, 1, 5, 'Amortiza tus deudas lo antes posible'),
(6, 2, 1, 6, 'Estudia sobre inversiones'),
(7, 2, 1, 7, 'Establece objetivos financieros'),
(8, 2, 1, 8, 'paga al contado siempre que puedas'),
(9, 2, 1, 9, 'Establece limites a los gastos variables'),
(10, 2, 1, 10, 'Evita usar tu tarjeta de credito'),
(11, 3, 1, 11, 'Utiliza herramientas de gestion financiera'),
(12, 3, 1, 12, 'Busca fuentes alternativas de renta'),
(13, 3, 1, 13, 'Define un presupuesto promedio'),
(14, 3, 1, 14, 'Usa internet para comparar precios'),
(15, 3, 1, 15, 'Unete a los programas de recompensas de tarjetas de credito');


 

insert into `calendarios`(`idcalendarios`, `Usuarios_idUsuarios`, `calEstado`, `calTipoPago`, `calNomPago`, `calFechaPago`)
values
(1, 1, 1, 'Sueldo', 'cobro nomina Manuel','2021-09-25'),
(2, 2, 1, 'Sueldo', 'cobro nomina Luis','2021-09-25'),
(3, 3, 1, 'Sueldo', 'cobro nomina oscar','2021-09-25'),
(4, 1, 1, 'Pago Cuota', 'Cuota del computador','2021-09-30'),
(5, 1, 1, 'compra', 'compra comida animales','2021-10-01'),
(6, 2, 1, 'Pago Servicio', 'pago resivo de la luz', '2021-09-15'),
(7, 3, 1, 'pago servicio', 'pagar resivo de gas','2021-09-17'),
(8, 2, 1, 'pago servicio', 'pago internet hogar','2021-09-20'),
(9, 1, 1, 'pago servicio', 'pagar plan de datos','2021-09-25'),
(10, 3, 1, 'compra', 'comprar regalo amigo','2021-09-30');