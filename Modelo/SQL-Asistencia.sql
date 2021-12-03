-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2021 a las 03:13:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `IdActividad` int(11) NOT NULL,
  `trimestre` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`IdActividad`, `trimestre`, `nombre`) VALUES
(1, '1', 'Programación Avanzada en Laravel'),
(2, '3', 'Seguimiento a Proyecto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(15) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellido`, `correo`, `contraseña`, `estado`) VALUES
(2, 'Santiago', 'Romero', '123@123.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `idAprendiz` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL,
  `ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`idAprendiz`, `imagen`, `nombre`, `apellido`, `correo`, `contraseña`, `estado`, `ficha`) VALUES
(1, '', 'Daniel', 'Lopez', '1234@123.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 5),
(2, 'img/Disney.jpg', 'Anibal', 'Gonzales', '123489@123.com', '2b3e8ef5555238a1ee75f46de7a9a39c', 1, 1),
(3, 'img/hime-top.png', '1322231', '123', 'familia71@123.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_programa`
--

CREATE TABLE `asignacion_programa` (
  `idAsignacion` int(11) NOT NULL,
  `programa` int(11) NOT NULL,
  `actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion_programa`
--

INSERT INTO `asignacion_programa` (`idAsignacion`, `programa`, `actividad`) VALUES
(8, 3, 2),
(9, 1, 1),
(10, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `tipoa` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `aprendiz` int(11) NOT NULL,
  `actividad` varchar(45) NOT NULL,
  `instructor` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `idControl` int(11) NOT NULL,
  `IdFicha` int(11) NOT NULL,
  `idInstructor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`idControl`, `IdFicha`, `idInstructor`) VALUES
(1, 1, 1),
(2, 11, 1),
(3, 12, 1),
(4, 10, 1),
(5, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

CREATE TABLE `coordinador` (
  `idcoordinador` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`idcoordinador`, `imagen`, `nombre`, `apellido`, `correo`, `contraseña`, `estado`) VALUES
(1, '', 'Jostin', 'araujo', '123456@123.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'img/DN1O8hDVQAAD75h.jpg', 'David', 'Niño', 'wos@misena.edu.co', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excusa`
--

CREATE TABLE `excusa` (
  `IdExcusa` int(11) NOT NULL,
  `Validacion_Fecha` datetime NOT NULL,
  `Fecha_Registrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `IdFicha` int(11) NOT NULL,
  `Numero` varchar(20) NOT NULL,
  `Tipo` varchar(35) NOT NULL,
  `FechaIni` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `Programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`IdFicha`, `Numero`, `Tipo`, `FechaIni`, `FechaFin`, `Estado`, `Programa`) VALUES
(1, '2242789', 'Articulación', '2021-10-30', '2021-12-10', 'Inactivo', 3),
(2, '2242726', 'articulacion', '2021-01-30', '2021-12-10', 'Activo', 1),
(3, '2242757', 'articulacion', '2021-01-30', '2021-12-10', 'Activo', 1),
(4, '2242762', 'articulacion', '2021-01-30', '2021-12-10', 'Activo', 1),
(5, '2242742', 'articulacion', '2021-01-30', '2021-12-10', 'Activo', 1),
(10, '5474815', 'Regular', '2021-10-14', '2021-10-28', 'Inactivo', 2),
(11, '54748156', 'Regular', '2021-10-01', '2021-10-30', 'Inactivo', 2),
(12, '547481565', 'Regular', '2021-10-06', '2021-10-14', 'Inactivo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `idInstructor` int(11) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`idInstructor`, `imagen`, `nombre`, `apellido`, `correo`, `contraseña`, `estado`) VALUES
(1, '', 'Lucas', 'penelope', '1234@1234.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'img/Disney.jpg', 'asdasd', 'asdasd', '12345@1234.com', '7969c257e63417cdc62ea28fa3cef7c8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `IdNotificacion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Mensaje` varchar(505) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_excusa`
--

CREATE TABLE `notificacion_excusa` (
  `Notificacion_IdNotificacion_FK` int(11) NOT NULL,
  `Excusa_IdExcusa_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `IdNovedad` int(11) NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `Hora` time NOT NULL,
  `fecha` date NOT NULL,
  `aprendiz` int(11) NOT NULL,
  `notificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `IdPrograma` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Version` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`IdPrograma`, `Nombre`, `Version`) VALUES
(1, 'ADSI', 'AC2022'),
(2, 'Redes', 'AC2022'),
(3, 'Mantenimiento', 'AC2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `IdProgramacion` int(11) NOT NULL,
  `Trimestre_Año` varchar(15) NOT NULL,
  `Fecha_Comienzo` date NOT NULL,
  `Fecha_Finalizacion` date NOT NULL,
  `Ficha_IdFicha_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`IdProgramacion`, `Trimestre_Año`, `Fecha_Comienzo`, `Fecha_Finalizacion`, `Ficha_IdFicha_FK`) VALUES
(1, '0000-00-00 00:0', '2021-01-01', '2021-03-30', 1),
(2, '0000-00-00 00:0', '2021-01-01', '2021-03-30', 2),
(3, '0000-00-00 00:0', '2021-01-01', '2021-03-30', 3),
(4, '0000-00-00 00:0', '2021-01-01', '2021-03-30', 4),
(5, '0000-00-00 00:0', '2021-01-01', '2021-03-30', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`IdActividad`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`idAprendiz`),
  ADD KEY `Ficha_IdFicha_FK` (`ficha`);

--
-- Indices de la tabla `asignacion_programa`
--
ALTER TABLE `asignacion_programa`
  ADD PRIMARY KEY (`idAsignacion`,`programa`,`actividad`),
  ADD KEY `fk_Asignacion_programa_programa1_idx` (`programa`),
  ADD KEY `fk_Asignacion_programa_actividad1_idx` (`actividad`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`),
  ADD KEY `aprendiz` (`aprendiz`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`idControl`,`IdFicha`,`idInstructor`),
  ADD KEY `fk_Control_ficha1_idx` (`IdFicha`),
  ADD KEY `fk_Control_instructor1_idx` (`idInstructor`);

--
-- Indices de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD PRIMARY KEY (`idcoordinador`);

--
-- Indices de la tabla `excusa`
--
ALTER TABLE `excusa`
  ADD PRIMARY KEY (`IdExcusa`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`IdFicha`),
  ADD KEY `Programa_IdPrograma_FK` (`Programa`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`idInstructor`),
  ADD UNIQUE KEY `Numero_Documento` (`contraseña`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`IdNotificacion`);

--
-- Indices de la tabla `notificacion_excusa`
--
ALTER TABLE `notificacion_excusa`
  ADD KEY `Notificacion_IdNotificacion_FK` (`Notificacion_IdNotificacion_FK`),
  ADD KEY `Excusa_IdExcusa_FK` (`Excusa_IdExcusa_FK`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`IdNovedad`),
  ADD KEY `Notificacion_IdNotificacion_FK` (`notificacion`),
  ADD KEY `aprendiz` (`aprendiz`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`IdPrograma`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`IdProgramacion`),
  ADD KEY `Ficha_IdFicha_FK` (`Ficha_IdFicha_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `IdActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `idAprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `asignacion_programa`
--
ALTER TABLE `asignacion_programa`
  MODIFY `idAsignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `idControl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  MODIFY `idcoordinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `excusa`
--
ALTER TABLE `excusa`
  MODIFY `IdExcusa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `IdFicha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `IdNotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `IdNovedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `IdPrograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `IdProgramacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_2` FOREIGN KEY (`ficha`) REFERENCES `ficha` (`IdFicha`);

--
-- Filtros para la tabla `asignacion_programa`
--
ALTER TABLE `asignacion_programa`
  ADD CONSTRAINT `fk_Asignacion_programa_actividad1` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`IdActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asignacion_programa_programa1` FOREIGN KEY (`programa`) REFERENCES `programa` (`IdPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`aprendiz`) REFERENCES `aprendiz` (`idAprendiz`);

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `fk_Control_ficha1` FOREIGN KEY (`IdFicha`) REFERENCES `ficha` (`IdFicha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Control_instructor1` FOREIGN KEY (`idInstructor`) REFERENCES `instructor` (`idInstructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`Programa`) REFERENCES `programa` (`IdPrograma`);

--
-- Filtros para la tabla `notificacion_excusa`
--
ALTER TABLE `notificacion_excusa`
  ADD CONSTRAINT `notificacion_excusa_ibfk_1` FOREIGN KEY (`Notificacion_IdNotificacion_FK`) REFERENCES `notificacion` (`IdNotificacion`),
  ADD CONSTRAINT `notificacion_excusa_ibfk_2` FOREIGN KEY (`Excusa_IdExcusa_FK`) REFERENCES `excusa` (`IdExcusa`);

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`notificacion`) REFERENCES `notificacion` (`IdNotificacion`),
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`aprendiz`) REFERENCES `aprendiz` (`idAprendiz`);

--
-- Filtros para la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD CONSTRAINT `programacion_ibfk_1` FOREIGN KEY (`Ficha_IdFicha_FK`) REFERENCES `ficha` (`IdFicha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
