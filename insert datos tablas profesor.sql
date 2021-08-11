use asistente_financiero;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40000 ALTER TABLE `categorialibro` DISABLE KEYS */;
INSERT INTO `categorialibro` (`catLibId`, `catLibNombre`, `catLibEstado`, `catLibObservacion`) VALUES
	(1, 'General', 1, 'Libros que implican varias categorías o que no se les ha definido'),
	(2, 'Cultura General', 1, 'Cultura General');
/*!40000 ALTER TABLE `categorialibro` ENABLE KEYS */;

/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` (`isbn`, `titulo`, `autor`, `precio`, `estado`, `categoriaLibro_catLibId`) VALUES
	(129, '24-TALLER DE FRUTAS Y HORTALIZAS', 'F.A.O', '39000', 1, 2),
	(258, 'ACTIVIDAD FISICA Y SALUD INTEGRAL', 'Medina Jimâenez, Eduardo', '55000', 1, 2),
	(387, 'AGUADA. Cuaderno de Pintura', 'OLMEDO SALVADOR', '42000', 1, 2),
	(516, 'ALTERACIONES DEL HABLA EN LA INFANCIA ASPECTOS CLINICOS', 'Gonzâalez, Jorge Nicolâas', '11900', 1, 2),
	(645, 'ANATOMIA CIENCIA EXPLICADA', 'Archila R., Leonardo, ed', '9514', 1, 1),
	(774, 'Antología de la narrativa mexicana del siglo XX, I', 'Domínguez Michael, Christopher', '144000', 1, 1),
	(903, 'APRENDIZAJE SERVICIO. EDUCAR PARA LA CIUDADANIA', 'PUIG ROVIRA, Josep', '70800', 1, 1),
	(1032, 'ARTE DE TOULOUSE-LAUTREC', 'Harris, Nathaniel', '300000', 1, 1),
	(1161, 'ATENCION A LOS DESPLAZADOS EXPERIENCIAS INSTITUCIONALES EN COLOMBIA', 'VARIOS, Autores', '24000', 1, 1),
	(1290, 'ATLAS DE PLANTAS VIVIENDAS', 'Schneider, Friederike ed', '100800', 1, 1),
	(1419, 'Auguste y Louis Lumière -Entre sombras y luces', 'Saad, Julián', '22500', 1, 1),
	(1548, 'BEBE', 'Levin, Ina Massler', '27300', 1, 1),
	(1677, 'BIOLOGIA LA UNIDAD Y DIVERSIDAD DE LA VIDA', 'Starr, Cecie', '116900', 1, 1),
	(1806, 'BREVE HISTORIA DEL ARTE AFRICANO', 'GILLO WERNER', '244800', 1, 1),
	(1935, 'CALDERON VIDA Y TEATRO', 'PEDRAZA JIMENEZ FELIPE B.', '45400', 1, 1),
	(2064, 'CANTATA DEL MAL, LA (E.N)', 'TOLEDO ZAMORA, Fernando', '39000', 1, 1),
	(2193, 'Casos prácticos de dirección financiera', 'Martín Fernández, Miguel; Martínez Solano, Pedro', '123100', 1, 1),
	(2322, 'CIENCIAS SOCIALES EN DISCUSION, LAS', 'BUNGE, MARIO', '33500', 1, 1),
	(2451, 'CLIMA, EL', 'HARRIS, CAROLINE', '34000', 1, 1),
	(2580, 'COMISIONES FILMICAS, LAS. UN NUEVO DISPOSITIVO PARA LA PROMOCION AUDIOVISUAL', 'Martínez Hermida, Marcelo', '93000', 1, 1),
	(2709, 'Compañia de sueños ilimitada', 'J.G. Ballard', '13200', 1, 1),
	(2838, 'CONCEPTOS FUNDAMENTALES EN LA HISTORIA DE LA MUSIC', 'SALAZAR ADOLFO', '144100', 1, 1),
	(2967, 'CONSULTOR DEL SABER', 'Elorza Martínez, Gustavo de, ed', '22900', 1, 1),
	(3096, 'Copos de espuma', 'Vargas Vila, J. M.', '22300', 1, 1),
	(3225, 'CRONICA DE AMERICA', 'García Jordán, Pilar', '61200', 1, 1),
	(3354, 'CUERPO (IR)', 'HANIF KUREISHI', '57900', 1, 1),
	(3483, 'CYBERGIRLS PORTAFOLIO', 'SHIROW HAR', '56000', 1, 1),
	(3612, 'DEL RACISMO A INTERCULTURALIDAD ', 'Garcia, Alfonso Y Saez, J', '101000', 1, 1),
	(3741, 'DESCUBRIMIENTO DEL UNIVERSO', 'Hacyan, Shahen, 1947-', '160000', 1, 1),
	(3870, 'DIBUJO Y DISENO EN INGENIERIA', 'Jensen, Cecil', '63700', 1, 1),
	(3999, 'DICCIONARIO DE CINE', 'Trueba, Fernando, 1955-', '120000', 1, 1),
	(4128, 'DICCIONARIO DE INTERPRETES Y DE LA INTERPRETACION MUSICAL', 'Paris, Alain, 1947-', '300000', 1, 1),
	(4257, 'DICCIONARIO DE PERIODISMO, PUBLICACIONES Y MEDIOS', ' Consuegra, Jorge ', NULL, 1, 1),
	(4386, 'DICCIONARIO DEL JAZZ', 'Carles, Philippe', '83900', 1, 1),
	(4515, 'DICCIONARIO HISTORICO DE LA ILUSTRACION', 'Ferrone, Vincenzo ed', '118105', 1, 1),
	(4644, 'DICCIONARIO RUSO-ESPANOL 000170.000 VOCES DE ENTRADA 00045', 'Martínez Calvo, Lorenzo', '80000', 1, 1),
	(4773, 'Dirección de empresas', 'Cabanelas Omil, José', '160500', 1, 1),
	(4902, 'DOMINE EXCEL 2007', 'Pérez', '42000', 1, 1),
	(5031, 'EDUCACION E IGUALDAD DE OPORTUNIDADES ENTRE SEXOS', 'Xosé R. Fernández Vazquez', '106000', 1, 1),
	(5160, 'El Mundo de la Célula, 6/ed.', 'BECKER', '215000', 1, 1),
	(5289, 'EN AMERICA', 'SONTAG, Susan', '45000', 1, 1),
	(5418, 'ENCICLOPEDIA DE LAS TECNICAS DE AEROGRAFIA', 'Leek, Michael', '69000', 1, 1),
	(5547, 'ENCICLOPEDIA PRACTICA DE LA PEDAGOGIA', 'Clifford, Margaret M', '80000', 1, 1),
	(5676, 'Enseñar a leer y escribir. Una aproximación histórica', 'Chartier, Anne-Marie', '43000', 1, 1),
	(5805, 'ESCRITOS FILOSOFICOS 2.', 'LAKATOS IMRE', '121800', 1, 1),
	(5934, 'ESTADISTICA Y MATEMATICAS APLICADAS. (EDICION DIRIGIDA A LOS ESTUDIOS DE FARMACIA)', 'SÁNCHEZ, M./FRUTOS, G./CUESTA, P. L.', '153800', 1, 1),
	(6063, 'ESTUCHE CARRASQUILLA', 'CARRASQUILLA, Tomás', '89000', 1, 1),
	(6192, 'Explora tus sentidos ', 'Helen Otway', '19500', 1, 1),
	(6321, 'FILOSOFIA DE LA LOGICA', 'QUINE W.', '72100', 1, 1),
	(6450, 'FISIOLOGIA APLICADA AL DEPORTE', 'Calderâon Montero, Francisco Javier', '52500', 1, 1),
	(6579, 'FREUD Y LA PSICOLOGIA DEL ARTE', 'DEL CONDE, TERESA', '28800', 1, 1),
	(6708, 'FUNDAMENTOS DE QUIMICA', 'ZUMDAHL, STE', '80000', 1, 1),
	(6837, 'GEOMETRIA DESCRIPTIVA SISTEMAS DE PROYECCION CILINDRICA', 'Sánchez Gallego, Juan Antonio', '16650', 1, 1),
	(6966, 'GOYA SU TIEMPO SU VIDA SU OBRA', 'Aribau, Ferrán', '88140', 1, 1),
	(7095, 'Grandes batallas de la historia - Batallas de Alej', 'Varios Autores', '21000', 1, 1),
	(7224, 'GUIA DE EQUIPOS BASICOS PARA EL PROCESAMIENTO AGROINDUSTRI', 'Romero, Arturo', '9350', 1, 1),
	(7353, 'HACIA UNA EDUCACION INFANTIL NO SEXISTA ', 'Browne', '76000', 1, 1),
	(7482, 'HISTOLOGIA VEGETAL', 'Garcia Breijo', '35000', 1, 1),
	(7611, 'HISTORIA DE LA VIDA PRIVADA II De la Europa feudal al Renacimiento', 'ARIES, Philippe / DUBY, Georges', '65000', 1, 1),
	(7740, 'HISTORIA ILUSTRADA DE COLOMBIA', 'OCAMPO LÓPEZ JAVIER', '25000', 1, 1),
	(7869, 'HORTALIZAS FRUTAS Y PLANTAS COMESTIBLES', 'Peel, Lucy', '24000', 1, 1),
	(7998, 'Indicadores de gestión y cuadro de mando', 'SALGUEIRO ANABITARTE A.', '32000', 1, 1),
	(8127, 'INTERACCION DEL COLOR', 'ALBERS JOSEF', '109100', 1, 1),
	(8256, 'INTRODUCCION A LA SOCIOLOGIA POLITICA', 'MICHELS, Roberto', '59800', 1, 1),
	(8385, 'ISO 009000 002000 CALIDAD Y EXCELENCIA', 'Senlle, Andrâes', '55740', 1, 1),
	(8514, 'JUGOS BATIDOS Y SORBETES', 'Gonzâalez, Jorge, fot', '90000', 1, 1),
	(8643, 'LAROUSSE DICCIONARIO ENCICLOPEDICO USUAL', NULL, '23000', 1, 1),
	(8772, 'LETRA', 'Blanchard, Gerard', '135200', 1, 1),
	(8901, 'LIDERAZGO Y LA COMUNICACION EFECTIVA PUNTO DE PARTIDA PARA', 'Cajiao de Pâerez, Gloria', '160000', 1, 1),
	(9030, 'LOS MITOS HEBREOS', 'GRAVES ROBERT', '78100', 1, 1),
	(9159, 'MANEJO POST-COSECHA Y MERCADEO DE TOMATE DE ARBOL CHYPHOMA', 'Gutiâerrez Vâasquez, Albeiro', '77675', 1, 1),
	(9288, 'MANUAL DE HORTICULTURA UNA GUIA PASO A PASO', 'Lesur Esquivel, Luis', '160000', 1, 1),
	(9417, 'MANUAL INTEGRADO DE DISENO Y CONSTRUCCION', 'Merrit, Frederick S., ed', '160000', 1, 1),
	(9546, 'MARKETING EMOCIONAL EL METODO DE HALLMARK PARA GANAR CLIEN', 'Robinette, Scott', '27870', 1, 1),
	(9675, 'MATEMATICAS PARA LOS ESTUDIANTES DE HUMANIDADES', 'Kline, Morris, 1908-', '160000', 1, 1),
	(9804, 'MEMORIA DEL FLAMENCO', 'GRANDE FELIX', '122300', 1, 1),
	(9933, 'MI PRIMER LAROUSSE DE LOS HEROES', 'EDICIONES LAROUSSE', '52400', 1, 1),
	(10062, 'MISTERIOS DE LOS OCEANOS', 'Dipper, Frances', '52200', 1, 1),
	(10191, 'MUJERES DE LA ANTIGUEDAD', 'VARIOS', '45400', 1, 1),
	(10320, 'NACIMIENTO DE LA HISTORIA, EL', 'CHATELET, Francois', '70000', 1, 1),
	(10449, 'NOVELA NATURALISTA HISPANOAMERICANA', 'Prendes, Manuel', '65950', 1, 1),
	(10578, 'NUTRICION DE PECES COMERCIALES EN ESTANQUES', 'Hepher, Balfour', '39000', 1, 1),
	(10707, 'OFICIO DE JURISTA, EL', 'DÍEZ PICAZO, Luis', '74000', 1, 1),
	(10836, 'OTROS ESTUDIOS SOBRE EL ESPAÑOL EN COLOMBIA', 'MONTES GIRALDO, José Joaquín', '30000', 1, 1),
	(10965, 'PASIÓN DE PAPEL- CTOS SOBRE EL MUNDO DEL LIBRO', 'AA.VV.', '67000', 1, 1),
	(11094, 'PERRO CALLEJERO(IR)', 'MARTIN AMIS', '64900', 1, 1),
	(11223, 'PLANTAS MEDICINALES EN VERSO ALIMENTESE Y SANESE', 'Gâomez Giraldo, Felipe, 1960-', '25000', 1, 1),
	(11352, 'Política y gestión pública', 'Bresser-Pereira, Luiz Carlos, et al.', '43000', 1, 1),
	(11481, 'PRIMAVERA DEL SER', 'MANTERO, Manuel', '26500', 1, 1),
	(11610, 'PROCESOS INDUSTRIALES EN FRUTAS Y HORTALIZAS', 'Osorio Dâiaz, Doris Liliana', '14073', 1, 1),
	(11739, 'PSICOTERAPIA Y SENTIDO DE VIDA', 'MARTINEZ ORTIZ,EFREN', '44000', 1, 1),
	(11868, 'QUIMICA GENERAL ORGANICA Y BIOLOGICA', 'Wolfe, Drew H', '51350', 1, 1),
	(11997, 'REDES NEURONALES', 'Anderson', '61000', 1, 1),
	(12126, 'REPENSAR LA RESURRECCION. (3ª ED) LA DIFERENCIA CRISTIANA EN LA CONTINUIDAD DE LAS RELIGIONES Y LA CULTURA', 'TORRES QUEIRUGA, Andrés', '82200', 1, 1),
	(12255, 'ROSTRO MAÑANA 2, TU.  BAILE Y SUEÑO', 'MARIAS, Javier', '45000', 1, 1),
	(12384, 'SEGUNDO SECRETO DE LA VIDA LAS NUEVAS MATEMATICAS DEL MUNDO', 'Stewart, Ian, 1945-', '160000', 1, 1),
	(12513, 'SIMBOLOS EN LA BIBLIA', 'ALVES, Herculano', '128900', 1, 1),
	(12642, 'SOCIOLOGIA URBANA DE MANUEL CASTELLS', 'SUSSER IDA (ed.)', '161200', 1, 1),
	(12771, 'TALMUD. TRATADO DE BERAJOT I', '0', '128000', 1, 1),
	(12900, 'TEOLOGIA DE LA LIBERACION Y REFUNDACION DE LA ESPERANZA', 'GIRARDI, Giulio', '44200', 1, 1),
	(13029, 'Textos políticos.', 'Burke, Edmund', '44000', 1, 1),
	(13158, 'TOXINAS AMBIENTALES Y SUS EFECTOS GENETICOS', 'Rodrâiguez Arnaiz, Rosario', '160000', 1, 1),
	(13287, 'TRIGONOMETRIA', 'Swokowski, Earl William, 1926-', '32200', 1, 1),
	(13416, 'UNIVERSALISMO CONSTRUCTIVO 2', 'TORRES GARCIA JOAQUIN', '209600', 1, 1),
	(13545, 'VIAJE AL CORAZON DE LA TORMENTA', 'EISNER WILL', '44000', 1, 1),
	(13674, 'Vitaminas y minerales esenciales para la salud ', 'Challem, Jack ', '37500', 1, 1),
	(13803, 'YO AMO A MI MAMI', 'JAIME BAYLY', '34900', 1, 1);
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;

/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`rolId`, `rolNombre`, `rolDescripcion`, `rolEstado`, `rolUsuSesion`, `rol_created_at`, `rol_updated_at`) VALUES
	(1, 'Administrador', 'Administrador', 1, NULL, '2019-06-07 10:18:36', '2019-06-07 10:18:36'),
	(2, 'Operario', 'Operario', 1, NULL, '2019-06-07 10:18:57', '2019-06-07 10:18:57'),
	(3, 'Cliente', 'Cliente', 1, NULL, '2019-06-07 10:19:16', '2019-06-07 10:19:16'),
	(4, 'Vendedor', 'Vendedor', 1, NULL, '2019-06-07 10:19:35', '2019-06-07 10:19:35'),
	(5, 'Almacenista', 'Almacenista', 1, NULL, '2019-06-07 10:20:42', '2019-06-07 10:20:42');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

/*!40000 ALTER TABLE `usuario_s` DISABLE KEYS */;
INSERT INTO `usuario_s` (`usuId`, `usuLogin`, `usuPassword`, `usuUsuSesion`, `usuEstado`, `usuRemember_token`, `usu_created_at`, `usu_updated_at`) VALUES
	(1, 'adminHAGS@si.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-05-29 11:48:38', '2018-06-08 15:18:53'),
	(2, 'ha@gs.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-06-06 15:02:04', '2018-06-06 15:02:04'),
	(3, 'hgprueba@si.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-06-08 15:17:07', '2018-06-08 15:17:07'),
	(4, 'halgarjr@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-06 21:25:08', '2019-06-06 21:25:08'),
	(5, 'halgarjr1@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 02:13:12', '2019-06-07 02:13:12'),
	(6, 'halgarjr3@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 02:19:06', '2019-06-07 02:19:06'),
	(7, 'notengo@no.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 17:41:59', '2019-06-07 17:41:59'),
	(8, 'jm@lk.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 19:38:40', '2019-06-07 19:38:40'),
	(9, 'huawei@juan.uei', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-13 13:45:27', '2019-06-13 13:45:27'),
	(10, 'cn@cn.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-11-19 18:38:40', '2019-11-19 19:42:41');
/*!40000 ALTER TABLE `usuario_s` ENABLE KEYS */;

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`perId`, `perDocumento`, `perNombre`, `perApellido`, `perEstado`, `perUsuSesion`, `per_created_at`, `per_updated_at`, `usuario_s_usuId`) VALUES
	(1, '8888888', 'has', 'gs', 1, NULL, '2018-06-06 15:02:04', '2018-10-09 21:10:14', 1),
	(2, '5555555', 'has', 'gs', 1, NULL, '2018-06-06 15:02:04', '2018-10-09 21:10:14', 2),
	(3, '123456789', 'Hprueba', 'Gprueba', 1, NULL, '2018-06-08 15:17:07', '2018-06-08 15:17:07', 3),
	(4, '7944444', 'henry', 'garzon', 1, NULL, '2019-06-06 21:25:08', '2019-06-06 21:25:08', 4),
	(5, '1234', 'Henry', 'garzon', 1, NULL, '2019-06-07 02:13:12', '2019-06-07 02:13:12', 5),
	(6, '12345', 'Henry', 'garzon', 1, NULL, '2019-06-07 02:19:06', '2019-06-07 02:19:06', 6),
	(7, '51879458', 'Ana', 'Sanchez', 1, NULL, '2019-06-07 17:41:59', '2019-06-07 17:41:59', 7),
	(8, '987654', 'jose', 'maria', 1, NULL, '2019-06-07 19:38:40', '2019-06-07 19:38:40', 8),
	(9, '666555', 'JUAN', 'PEREZ', 1, NULL, '2019-06-13 13:45:28', '2019-06-13 13:46:12', 9),
	(10, '98765499', 'Carolina', 'Neira', 1, NULL, '2019-11-19 18:38:40', '2019-11-19 18:38:40', 10);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

/*!40000 ALTER TABLE `usuario_s_roles` DISABLE KEYS */;
INSERT INTO `usuario_s_roles` (`id_usuario_s`, `id_rol`, `estado`, `fechaUserRol`, `obsFechaUserRol`, `usuRolUsuSesion`, `created_at`, `updated_at`) VALUES
	(3, 2, 1, '2019-10-29 18:52:00', NULL, NULL, '2019-10-29 18:52:00', '2019-10-29 18:52:00'),
	(4, 1, 1, '2019-10-29 18:51:41', NULL, NULL, '2019-10-29 18:51:41', '2019-10-29 18:51:41'),
	(9, 4, 1, '2019-10-29 18:52:17', NULL, NULL, '2019-10-29 18:52:17', '2019-10-29 18:52:17'),
	(10, 1, 1, '2019-11-19 18:38:40', NULL, NULL, '2019-11-19 18:38:40', '2019-11-19 18:38:40');
/*!40000 ALTER TABLE `usuario_s_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;