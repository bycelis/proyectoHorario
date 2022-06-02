-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 21:41:39
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db-proyecto01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `car_id` int(10) UNSIGNED NOT NULL,
  `car_nombre` varchar(130) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`car_id`, `car_nombre`) VALUES
(18, 'Administración Financiera'),
(16, 'Administración de Empresas'),
(21, 'Contaduría Pública'),
(24, 'Ingeniería Ambiental'),
(23, 'Ingeniería Electromecánica'),
(26, 'Ingeniería Electrónica'),
(27, 'Ingeniería Eléctrica'),
(25, 'Ingeniería Industrial'),
(28, 'Ingeniería de Sistemas'),
(22, 'Ingeniería de Telecomunicaciones'),
(29, 'Ingeniería en Topografía'),
(20, 'Mercadeo'),
(17, 'Profesional en Cultura Física y Deporte'),
(19, 'Profesional en Diseño de Moda'),
(14, 'Tecnología en Desarrollo de Sistemas informáticos'),
(11, 'Tecnología en Electricidad Industrial'),
(7, 'Tecnología en Entrenamiento Deportivo'),
(6, 'Tecnología en Gestión Agroindustrial'),
(3, 'Tecnología en Gestión Bancaria y Financiera'),
(5, 'Tecnología en Gestión Empresarial'),
(13, 'Tecnología en Gestión de Sistemas de Telecomunicaciones'),
(2, 'Tecnología en Gestión de la Moda'),
(12, 'Tecnología en Implementación de Sistemas Electrónicos Industriales'),
(9, 'Tecnología en Levantamientos Topográficos'),
(10, 'Tecnología en Manejo de Recursos Ambientales'),
(1, 'Tecnología en Manejo de la Información Contable'),
(4, 'Tecnología en Mercadeo y Gestión Comercial'),
(8, 'Tecnología en Operación y Mantenimiento Electromecánico'),
(15, 'Tecnología en Producción Industrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_semana`
--

CREATE TABLE `dias_semana` (
  `dise_id` int(10) UNSIGNED NOT NULL,
  `dise_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dias_semana`
--

INSERT INTO `dias_semana` (`dise_id`, `dise_nombre`) VALUES
(7, 'DOMINGO'),
(4, 'JUEVES'),
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIERCOLES'),
(6, 'SABADO '),
(5, 'VIERNES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `gru_id` int(10) UNSIGNED NOT NULL,
  `gru_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`gru_id`, `gru_nombre`) VALUES
(1, 'A01'),
(2, 'A02'),
(3, 'A03'),
(4, 'A04'),
(5, 'A05'),
(6, 'B01'),
(7, 'B02'),
(8, 'B03'),
(9, 'B04'),
(10, 'B05'),
(11, 'C01'),
(12, 'C02'),
(13, 'C03'),
(14, 'C04'),
(15, 'C05'),
(16, 'D01'),
(17, 'D02'),
(18, 'D03'),
(19, 'D04'),
(20, 'D05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `hor_id` int(10) UNSIGNED NOT NULL,
  `hor_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`hor_id`, `hor_nombre`) VALUES
(3, '10:00 A 12:00'),
(4, '12:00 A 13:00'),
(5, '13:00 A 15:00'),
(6, '15:00 A 17:00'),
(7, '17:00 A 19:00'),
(8, '19:00 A 21:00'),
(1, '6:00 A 8:00'),
(2, '8:00 A 10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `inf_id` int(10) UNSIGNED NOT NULL,
  `inf_tido_id` int(10) UNSIGNED NOT NULL,
  `inf_documento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `inf_nombres` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inf_apellidos` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inf_correo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inf_usu_id` int(10) UNSIGNED NOT NULL,
  `inf_rol_id` int(10) UNSIGNED NOT NULL,
  `inf_car_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`inf_id`, `inf_tido_id`, `inf_documento`, `inf_nombres`, `inf_apellidos`, `inf_correo`, `inf_usu_id`, `inf_rol_id`, `inf_car_id`) VALUES
(1, 2, '123456', 'ADMIN', 'ADMIN', 'ADMIN@GMAIL.COM', 1, 1, 1),
(2, 2, '1234567', 'DOCENTES', 'DOCENTES', 'DOCENTES@GMAIL.COM', 2, 2, 14),
(3, 2, 'ESTUDIANTES', 'ESTUDIANTES', 'ESTUDIANTES', 'ESTUDIANTES@GMAIL.COM', 3, 3, 14),
(4, 2, 'A123456', 'EST01', 'EST01', 'EST01@GMAIL.COM', 4, 3, 14),
(10, 2, 'A1234567', 'EST02', 'EST02', 'EST02@GMAIL.COM', 7, 3, 14),
(11, 2, 'B123456', 'DOC010', 'DOC010', 'DOC010@GMAIL.COM', 8, 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_materia`
--

CREATE TABLE `informacion_materia` (
  `inma_id` int(10) UNSIGNED NOT NULL,
  `inma_inf_id` int(10) UNSIGNED NOT NULL,
  `inma_mat_id` int(10) UNSIGNED NOT NULL,
  `inma_car_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informacion_materia`
--

INSERT INTO `informacion_materia` (`inma_id`, `inma_inf_id`, `inma_mat_id`, `inma_car_id`) VALUES
(1, 3, 1, 2),
(2, 2, 1, 14),
(3, 2, 2, 14),
(4, 3, 2, 2),
(5, 10, 1, 14),
(12, 10, 3, 14),
(14, 11, 3, 18),
(15, 2, 4, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `mat_id` int(10) UNSIGNED NOT NULL,
  `mat_codigo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mat_nombre` varchar(230) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `mat_dise_id` int(10) UNSIGNED NOT NULL,
  `mat_sal_id` int(10) UNSIGNED NOT NULL,
  `mat_hor_id` int(10) UNSIGNED NOT NULL,
  `mat_gru_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`mat_id`, `mat_codigo`, `mat_nombre`, `mat_dise_id`, `mat_sal_id`, `mat_hor_id`, `mat_gru_id`) VALUES
(1, 'DCB001', 'ALGEBRA SUPERIOR', 1, 1, 1, 1),
(2, 'DCB002', 'CALCULO DIFERENCIAL', 2, 2, 1, 2),
(3, 'TSI101', 'HERRAMIENTAS DIGITALES', 3, 3, 1, 3),
(4, 'TSI102', ' MATEMATICAS DISCRETAS ', 4, 4, 1, 4),
(5, 'TSI001', 'PENSAMIENTO ALGORITMICO', 5, 1, 1, 5),
(6, 'DHI014', 'PROCESOS DE LECTURA Y ESCRITURA ', 6, 1, 1, 4),
(7, 'DHI016', 'CULTURA FISICA', 1, 4, 2, 1),
(8, 'TSI204', 'DISEÑO DE BASES DE DATOS', 1, 6, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(10) UNSIGNED NOT NULL,
  `rol_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`) VALUES
(1, 'ADMIN'),
(2, 'DOCENTES'),
(3, 'ESTUDIANTES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `sal_id` int(10) UNSIGNED NOT NULL,
  `sal_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`sal_id`, `sal_nombre`) VALUES
(1, 'A101'),
(2, 'A102'),
(3, 'A103'),
(4, 'A104'),
(5, 'A105'),
(6, 'A106'),
(7, 'A107'),
(8, 'A108'),
(9, 'A109'),
(10, 'A110'),
(11, 'A201'),
(12, 'A202'),
(13, 'A203'),
(14, 'A204'),
(15, 'A205'),
(16, 'A206'),
(17, 'A207'),
(18, 'A208'),
(19, 'A209'),
(20, 'A210'),
(21, 'A301'),
(22, 'A302'),
(23, 'A303'),
(24, 'A304'),
(25, 'A305'),
(26, 'A306'),
(27, 'A307'),
(28, 'A308'),
(29, 'A309'),
(30, 'A310'),
(31, 'A401'),
(32, 'A402'),
(33, 'A403'),
(34, 'A404'),
(35, 'A405'),
(36, 'A406'),
(37, 'A407'),
(38, 'A408'),
(39, 'A409'),
(40, 'A410'),
(41, 'B101'),
(42, 'B102'),
(43, 'B103'),
(44, 'B104'),
(45, 'B105'),
(46, 'B106'),
(47, 'B107'),
(48, 'B108'),
(49, 'B109'),
(50, 'B110'),
(51, 'B201'),
(52, 'B202'),
(53, 'B203'),
(54, 'B204'),
(55, 'B205'),
(56, 'B206'),
(57, 'B207'),
(58, 'B208'),
(59, 'B209'),
(60, 'B210'),
(61, 'B301'),
(62, 'B302'),
(63, 'B303'),
(64, 'B304'),
(65, 'B305'),
(66, 'B306'),
(67, 'B307'),
(68, 'B308'),
(69, 'B309'),
(70, 'B310'),
(71, 'B401'),
(72, 'B402'),
(73, 'B403'),
(74, 'B404'),
(75, 'B405'),
(76, 'B406'),
(77, 'B407'),
(78, 'B408'),
(79, 'B409'),
(80, 'B410'),
(81, 'C101'),
(82, 'C102'),
(83, 'C103'),
(84, 'C104'),
(85, 'C105'),
(86, 'C106'),
(87, 'C107'),
(88, 'C108'),
(89, 'C109'),
(90, 'C110'),
(91, 'C201'),
(92, 'C202'),
(93, 'C203'),
(94, 'C204'),
(95, 'C205'),
(96, 'C206'),
(97, 'C207'),
(98, 'C208'),
(99, 'C209'),
(100, 'C210'),
(101, 'C301'),
(102, 'C302'),
(103, 'C303'),
(104, 'C304'),
(105, 'C305'),
(106, 'C306'),
(107, 'C307'),
(108, 'C308'),
(109, 'C309'),
(110, 'C310'),
(111, 'C401'),
(112, 'C402'),
(113, 'C403'),
(114, 'C404'),
(115, 'C405'),
(116, 'C406'),
(117, 'C407'),
(118, 'C408'),
(119, 'C409'),
(120, 'C410');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tido_id` int(10) UNSIGNED NOT NULL,
  `tido_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`tido_id`, `tido_nombre`) VALUES
(2, 'CEDULA DE CIUDADANIA'),
(3, 'CEDULA DE EXTRANJERIA'),
(4, 'PASAPORTE'),
(1, 'TARJETA DE IDENTIDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(10) UNSIGNED NOT NULL,
  `usu_nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `usu_clave` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_clave`) VALUES
(1, 'admin', '123456'),
(2, 'docentes', '123456'),
(3, 'estudiantes', '123456'),
(4, 'est01', '123456'),
(7, 'est02', '123456'),
(8, 'doc010', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `nombre_car` (`car_nombre`);

--
-- Indices de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  ADD PRIMARY KEY (`dise_id`),
  ADD UNIQUE KEY `nombre_dise` (`dise_nombre`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`gru_id`),
  ADD UNIQUE KEY `gru_rol` (`gru_nombre`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`hor_id`),
  ADD UNIQUE KEY `nombre_hor` (`hor_nombre`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`inf_id`),
  ADD UNIQUE KEY `uk_inf_usu_id` (`inf_usu_id`),
  ADD KEY `fk_inf_rol_id` (`inf_rol_id`),
  ADD KEY `fk_inf_car_id` (`inf_car_id`),
  ADD KEY `fk_inf_tido_id` (`inf_tido_id`);

--
-- Indices de la tabla `informacion_materia`
--
ALTER TABLE `informacion_materia`
  ADD PRIMARY KEY (`inma_id`),
  ADD KEY `fk_inma_inf_id` (`inma_inf_id`),
  ADD KEY `fk_inma_car_id` (`inma_car_id`),
  ADD KEY `fk_inma_mat_id` (`inma_mat_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `fk_mat_dise_id` (`mat_dise_id`),
  ADD KEY `fk_mat_hor_id` (`mat_hor_id`),
  ADD KEY `fk_mat_gru_id` (`mat_gru_id`),
  ADD KEY `fk_mat_sal_id` (`mat_sal_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `nombre_rol` (`rol_nombre`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`sal_id`),
  ADD UNIQUE KEY `nombre_sal` (`sal_nombre`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tido_id`),
  ADD UNIQUE KEY `nombre_car` (`tido_nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `email` (`usu_nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `car_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  MODIFY `dise_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `gru_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `hor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `inf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `informacion_materia`
--
ALTER TABLE `informacion_materia`
  MODIFY `inma_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `mat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `sal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `tido_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `fk_inf_car_id` FOREIGN KEY (`inf_car_id`) REFERENCES `carrera` (`car_id`),
  ADD CONSTRAINT `fk_inf_rol_id` FOREIGN KEY (`inf_rol_id`) REFERENCES `roles` (`rol_id`),
  ADD CONSTRAINT `fk_inf_tido_id` FOREIGN KEY (`inf_tido_id`) REFERENCES `tipo_documento` (`tido_id`),
  ADD CONSTRAINT `fk_inf_usu_id` FOREIGN KEY (`inf_usu_id`) REFERENCES `usuario` (`usu_id`);

--
-- Filtros para la tabla `informacion_materia`
--
ALTER TABLE `informacion_materia`
  ADD CONSTRAINT `fk_inma_car_id` FOREIGN KEY (`inma_car_id`) REFERENCES `carrera` (`car_id`),
  ADD CONSTRAINT `fk_inma_inf_id` FOREIGN KEY (`inma_inf_id`) REFERENCES `informacion` (`inf_id`),
  ADD CONSTRAINT `fk_inma_mat_id` FOREIGN KEY (`inma_mat_id`) REFERENCES `materia` (`mat_id`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_mat_dise_id` FOREIGN KEY (`mat_dise_id`) REFERENCES `dias_semana` (`dise_id`),
  ADD CONSTRAINT `fk_mat_gru_id` FOREIGN KEY (`mat_gru_id`) REFERENCES `grupos` (`gru_id`),
  ADD CONSTRAINT `fk_mat_hor_id` FOREIGN KEY (`mat_hor_id`) REFERENCES `horas` (`hor_id`),
  ADD CONSTRAINT `fk_mat_sal_id` FOREIGN KEY (`mat_sal_id`) REFERENCES `salones` (`sal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
