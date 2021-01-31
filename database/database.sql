SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

--
-- Base de datos: `transcron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id` int(10) NOT NULL,
  `no_documento` bigint(12) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id`, `no_documento`, `tipo`, `nombre`, `direccion`, `ciudad`, `departamento`, `pais`, `telefono`) VALUES
('1','50334567','CC','JOSE ANTONIO CAMACHO LEON','Carrera 68 No 20 - 23','Bogotá','Cundinamarca','Colombia','3158569697'),
('2','1028827654','CC','MARTIN BLASCO PLAZA','Calle 26 No 50 - 1','Bogotá','Cundinamarca','Colombia','3153860606'),
('3','41322897','CC','JUAN JOSE ADRIAN AZNAR','Transversal 32 No 36 i 3','Bogotá','Cundinamarca','Colombia','3149151515'),
('4','64602944','CC','JOSE LUIS DURO CALLEJA','Diagonal 22 No 30 - 5','Madrid','Cundinamarca','Colombia','3144442424'),
('5','32601612','CC','ALFONSO CABRERO MAZA','Calle 23 No 20 - 3','Soacha','Cundinamarca','Colombia','3139733333'),
('6','37454533','CC','MARIANO PLANA PERELLO','Carrera 68 No 20 - 24','Bogotá','Cundinamarca','Colombia','3135024242'),
('7','33093890','CC','MARIA ROSARIO ARREDONDO ROVIRA','Calle 26 No 50 - 2','Bogotá','Cundinamarca','Colombia','3130315152'),
('8','28733248','CC','JOSEP PAREJO MONEDERO','Transversal 32 No 36 i 4','Bogotá','Cundinamarca','Colombia','3125606061'),
('9','24372605','CC','JULIAN LABRADOR AROCA','Diagonal 22 No 30 - 6','Madrid','Cundinamarca','Colombia','3120896970'),
('10','20011963','CC','ALFREDO ARAGONES DEL CAMPO','Calle 23 No 20 - 4','Soacha','Cundinamarca','Colombia','3116187879'),
('11','15651320','CC','SANTIAGO CEREZO ARMENDARIZ','Carrera 68 No 20 - 25','Bogotá','Cundinamarca','Colombia','3111478788'),
('12','1038823122','CC','MARIA JOSEFA LOBATO CRISTOBAL','Calle 26 No 50 - 3','Bogotá','Cundinamarca','Colombia','3106769697'),
('13','52299964','CC','ESTEBAN MOURE JUSTO','Transversal 32 No 36 i 5','Bogotá','Cundinamarca','Colombia','3102060606'),
('14','60503450','CC','ANTONIO MARCO VILALTA','Diagonal 22 No 30 - 7','Madrid','Cundinamarca','Colombia','3097351515'),
('15','68706936','CC','GABRIEL GRANADOS IÑIGUEZ','Calle 23 No 20 - 5','Soacha','Cundinamarca','Colombia','3092642424'),
('16','76910422','CC','ALFONSO BADIA BELENGUER','Carrera 68 No 20 - 26','Bogotá','Cundinamarca','Colombia','3087933333'),
('17','85113908','CC','MIGUEL TOLEDO MOTA','Calle 26 No 50 - 4','Bogotá','Cundinamarca','Colombia','3083224243'),
('18','93317393','CC','ALFREDO CORONADO ENCINAS','Transversal 32 No 36 i 6','Bogotá','Cundinamarca','Colombia','3078515152'),
('19','1015208796','CC','JOSE IGNACIO MORENO CANOVAS','Diagonal 22 No 30 - 8','Madrid','Cundinamarca','Colombia','3073806061');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) NOT NULL,
  `no_documento` bigint(12) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `no_documento`, `tipo`, `nombre`, `direccion`, `ciudad`, `departamento`, `pais`, `telefono`) VALUES
('1','103232023','NIT','Buses Blancos','Carrera 68 No 20 - 31','Bogotá','Cundinamarca','Colombia','3212121212'),
('2','114465653','NIT','Coopetrans','Calle 26 No 50 - 11','Bogotá','Cundinamarca','Colombia','3118181818'),
('3','125699283','NIT','Buses Azules','Transversal 32 No 36 i 21 Sur','Bogotá','Cundinamarca','Colombia','3201010101'),
('4','136932913','NIT','Gaviota','Diagonal 22 No 30 - 10','Madrid','Cundinamarca','Colombia','3169010101'),
('5','148166543','NIT','Gacela','Calle 23 No 20 - 86','Soacha','Cundinamarca','Colombia','3163161616');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_legal`
--

CREATE TABLE `representante_legal` (
  `id` int(10) NOT NULL,
  `no_documento` bigint(12) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `representante_legal`
--

INSERT INTO `representante_legal` (`id`, `no_documento`, `tipo`, `nombre`, `direccion`, `ciudad`, `departamento`, `pais`, `telefono`, `id_empresa`) VALUES
('1','50210211','CC','EDWIN JAVIER MONSALVE MOSTOLES','Carrera 68 No 20 - 31','Bogotá','Cundinamarca','Colombia','3212121212','1'),
('2','1028897654','CC','SARA SOFÍA HERNANDEZ PÉREZ','Calle 26 No 50 - 11','Bogotá','Cundinamarca','Colombia','3118181818','2'),
('3','41332897','CC','EMETERIO DÍAZ SALOM','Transversal 32 No 36 i 21 Sur','Bogotá','Cundinamarca','Colombia','3201010101','3'),
('4','64602940','CC','PEDRO EUSTAQUIO SUÁREZ LEAL','Diagonal 22 No 30 - 10','Madrid','Cundinamarca','Colombia','3169010101','4'),
('5','36016428','CC','FRANCISCO DE JESÚS LAVERDE ABRIL','Calle 23 No 20 - 86','Soacha','Cundinamarca','Colombia','3163161616','5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(10) NOT NULL,
  `placa` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `motor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `chasis` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` int(4) NOT NULL,
  `fecha_matricula` date NOT NULL,
  `p_sentados` int(3) NOT NULL,
  `p_pie` int(3) NOT NULL,
  `peso_seco` int(7) NOT NULL,
  `peso_bruto` int(7) NOT NULL,
  `puertas` int(2) NOT NULL,
  `marca` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `linea` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `motor`, `chasis`, `modelo`, `fecha_matricula`, `p_sentados`, `p_pie`, `peso_seco`, `peso_bruto`, `puertas`, `marca`, `linea`, `id_empresa`) VALUES
('1','FPR211','Yamaha','1HGBH41JXMN123390','2010','2011-01-24','30','50','11000','16000','4','Hyundai','Autobus','1'),
('2','VMV900','Honda','1FGBH41JXMP122312','2009','2009-02-25','25','45','13000','18000','4','Chevrolet','Autobus','2'),
('3','QOC821','Suzuki','1HGBH41JXMN123391','2012','2012-12-01','20','40','10000','15000','4','Kia','Autobus','3'),
('4','FPR212','Volvo','1FGBH41JXMP122313','2011','2011-05-08','15','35','12000','17000','4','Nissan','Autobus','4'),
('5','VMV901','Renault','1HGBH41JXMN123392','2012','2012-05-20','30','50','11500','16500','4','Volkswagen','Autobus','5'),
('6','QOC822','Yamaha','1FGBH41JXMP122314','2012','2012-01-08','25','45','11000','16000','4','Mercedes benz','Autobus','1'),
('7','FPR213','Honda','1HGBH41JXMN123393','2013','2013-07-10','20','40','13000','18000','4','Renault','Autobus','2'),
('8','VMV902','Suzuki','1FGBH41JXMP122315','2013','2014-08-01','30','50','10000','15000','4','Jinbei','Autobus','3'),
('9','QOC823','Volvo','1HGBH41JXMN123394','2014','2015-10-01','25','45','12000','17000','4','Hyundai','Autobus','4'),
('10','FPR214','Renault','1HGBH41JXMN123391','2015','2016-01-20','20','40','11000','16000','4','Chevrolet','Autobus','1'),
('11','VMV903','Yamaha','1FGBH41JXMP122313','2015','2016-08-16','40','60','13000','18000','4','Kia','Autobus','2'),
('12','QOC824','Honda','1HGBH41JXMN123392','2016','2017-09-04','30','50','10000','15000','4','Nissan','Autobus','3'),
('13','FPR215','Suzuki','1FGBH41JXMP122314','2016','2017-10-11','50','70','12000','17000','4','Volkswagen','Autobus','4'),
('14','VMV904','Volvo','1HGBH41JXMN123393','2017','2018-05-05','40','60','11000','16000','4','Mercedes benz','Autobus','1'),
('15','QOC825','Renault','1FGBH41JXMP122315','2010','2011-11-10','30','50','13000','18000','4','Renault','Autobus','2'),
('16','FPR216','Yamaha','1HGBH41JXMN123394','2009','2010-10-07','35','55','10000','15000','4','Jinbei','Autobus','3'),
('17','VMV905','Honda','1FGBH41JXMP122316','2012','2013-08-10','34','54','12000','17000','4','Hyundai','Autobus','4'),
('18','QOC826','Suzuki','1HGBH41JXMN123391','2011','2012-05-11','33','53','11000','16000','4','Chevrolet','Autobus','5'),
('19','FPR217','Volvo','1FGBH41JXMP122313','2012','2013-03-15','32','52','13000','18000','4','Kia','Autobus','1'),
('20','VMV906','Renault','1HGBH41JXMN123392','2012','2013-08-09','31','51','10000','15000','4','Nissan','Autobus','2'),
('21','QOC827','Yamaha','1FGBH41JXMP122314','2013','2014-05-05','30','50','12000','17000','4','Volkswagen','Autobus','3');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinculacion`
--

CREATE TABLE `vinculacion` (
  `id` int(10) NOT NULL,
  `id_conductor` int(10) NOT NULL,
  `id_vehiculo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `vinculacion` ADD UNIQUE KEY (`id_conductor`,`id_vehiculo`);
--
-- Volcado de datos para la tabla `vinculacion`
--

INSERT INTO `vinculacion` (`id`, `id_conductor`, `id_vehiculo`) VALUES
('1','19','21'),
('2','17','13'),
('3','15','12'),
('4','13','11'),
('5','11','10'),
('6','9','9'),
('7','7','8'),
('8','5','14'),
('9','3','20'),
('10','1','19'),
('11','2','18'),
('12','4','17'),
('13','6','16'),
('14','8','15'),
('15','10','7'),
('16','12','6'),
('17','14','5'),
('18','16','4'),
('19','18','3'),
('20','15','2'),
('21','13','1'),
('22','11','21'),
('23','9','13'),
('24','7','12'),
('25','5','11'),
('26','3','10'),
('27','1','9'),
('28','2','8'),
('29','4','6'),
('30','6','5'),
('31','8','4'),
('32','10','3'),
('33','12','2'),
('34','14','16'),
('35','9','15'),
('36','7','21'),
('37','5','13'),
('38','3','12'),
('39','1','11'),
('40','2','10'),
('41','4','9'),
('42','6','6'),
('43','8','5'),
('44','10','4'),
('45','12','3'),
('46','14','2'),
('47','18','21');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `representante_legal`
--
ALTER TABLE `representante_legal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `vinculacion`
--
  
  ALTER TABLE `vinculacion` 
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY (`id_conductor`,`id_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `representante_legal`
--
ALTER TABLE `representante_legal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vinculacion`
--
ALTER TABLE `vinculacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `representante_legal`
--
ALTER TABLE `representante_legal`
  ADD CONSTRAINT `representante_legal_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `vinculacion`
--
ALTER TABLE `vinculacion`
  ADD CONSTRAINT `vinculacion_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id`),
  ADD CONSTRAINT `vinculacion_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`);
COMMIT;
