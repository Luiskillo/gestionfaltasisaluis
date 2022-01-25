-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2022 a las 18:04:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionfaltasisaluis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `pk_name_alumno` varchar(50) NOT NULL,
  `grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`pk_name_alumno`, `grupo`) VALUES
('Isabel', 'DAW'),
('Lucia', 'DAM'),
('Luis', 'DAW'),
('Manuel', 'ADE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circustancia`
--

CREATE TABLE `circustancia` (
  `pk_motivo_circustancia` varchar(80) NOT NULL,
  `cod_circustancia` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `circustancia`
--

INSERT INTO `circustancia` (`pk_motivo_circustancia`, `cod_circustancia`) VALUES
('Acto inintencionado', 'AT'),
('Acto intencionado', 'AG'),
('Acto reitarado en el tiempo', 'AG'),
('Arrepentimiento', 'AT'),
('Sin circustancias relevantes', 'SC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `falta`
--

CREATE TABLE `falta` (
  `pk_motivo_falta` varchar(80) NOT NULL,
  `fk_cod_gravedad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `falta`
--

INSERT INTO `falta` (`pk_motivo_falta`, `fk_cod_gravedad`) VALUES
('Perdida de material', 'G'),
('Rotura de mobiliario', 'G'),
('Comer en clase', 'L'),
('Hablar en clase', 'L'),
('Violencia fisica', 'MG'),
('Violencia verbal', 'MG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gravedad`
--

CREATE TABLE `gravedad` (
  `pk_cod_gravedad` varchar(2) NOT NULL,
  `definicion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gravedad`
--

INSERT INTO `gravedad` (`pk_cod_gravedad`, `definicion`) VALUES
('G', 'Grave'),
('L', 'Leve'),
('MG', 'Muy grave');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `pk_id_falta` int(3) NOT NULL,
  `fk_name_alumno` varchar(50) NOT NULL,
  `fk_name_prof` varchar(50) NOT NULL,
  `fk_cod_gravedad` varchar(2) NOT NULL,
  `fk_motivo_falta` varchar(80) NOT NULL,
  `fk_motivo_sancion` varchar(80) NOT NULL,
  `fk_motivo_circustancia` varchar(80) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`pk_id_falta`, `fk_name_alumno`, `fk_name_prof`, `fk_cod_gravedad`, `fk_motivo_falta`, `fk_motivo_sancion`, `fk_motivo_circustancia`, `fecha`, `observacion`) VALUES
(1, 'Isabel', 'Juanjo', 'G', 'Perdida de material', 'Severa llamada de atencion al tutor legal', 'Acto intencionado', '2022-01-25', 'Sin mas informacion'),
(2, 'Luis', 'Juanjo', 'G', 'Rotura de mobiliario', 'Severa llamada de atencion al tutor legal', 'Arrepentimiento', '2022-01-25', 'Rotura de silla'),
(3, 'Manuel', 'Juanjo', 'MG', 'Violencia verbal', 'Expulsion de 5 a 7 dias', 'Sin circustancias relevantes', '2022-01-25', ''),
(4, 'Lucia', 'Monica', 'L', 'Hablar en clase', 'Amonestacion escrita', 'Sin circustancias relevantes', '2022-01-25', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sancion`
--

CREATE TABLE `sancion` (
  `pk_motivo_sancion` varchar(80) NOT NULL,
  `fk_cod_gravedad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sancion`
--

INSERT INTO `sancion` (`pk_motivo_sancion`, `fk_cod_gravedad`) VALUES
('Expulsion de 1 a 3 dias', 'G'),
('Severa llamada de atencion al tutor legal', 'G'),
('Amonestacion escrita', 'L'),
('Llamada de atencion al alumno', 'L'),
('Expulsion de 5 a 7 dias', 'MG'),
('Expulsion definitiva del centro', 'MG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_name_prof` varchar(50) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_name_prof`, `rol`) VALUES
('Juanjo', 'Director'),
('Monica', 'Profesor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`pk_name_alumno`);

--
-- Indices de la tabla `circustancia`
--
ALTER TABLE `circustancia`
  ADD PRIMARY KEY (`pk_motivo_circustancia`);

--
-- Indices de la tabla `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`pk_motivo_falta`),
  ADD KEY `cod_gravedad` (`fk_cod_gravedad`);

--
-- Indices de la tabla `gravedad`
--
ALTER TABLE `gravedad`
  ADD PRIMARY KEY (`pk_cod_gravedad`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`pk_id_falta`),
  ADD KEY `fk_cod_gravedad` (`fk_cod_gravedad`),
  ADD KEY `fk_motivo_circustancia` (`fk_motivo_circustancia`),
  ADD KEY `fk_motivo_falta` (`fk_motivo_falta`),
  ADD KEY `fk_motivo_sancion` (`fk_motivo_sancion`),
  ADD KEY `fk_name_alumno` (`fk_name_alumno`),
  ADD KEY `fk_name_prof` (`fk_name_prof`);

--
-- Indices de la tabla `sancion`
--
ALTER TABLE `sancion`
  ADD PRIMARY KEY (`pk_motivo_sancion`),
  ADD KEY `fk_cod_gravedad` (`fk_cod_gravedad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_name_prof`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `falta_ibfk_1` FOREIGN KEY (`fk_cod_gravedad`) REFERENCES `gravedad` (`pk_cod_gravedad`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`fk_cod_gravedad`) REFERENCES `gravedad` (`pk_cod_gravedad`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`fk_motivo_circustancia`) REFERENCES `circustancia` (`pk_motivo_circustancia`),
  ADD CONSTRAINT `historial_ibfk_3` FOREIGN KEY (`fk_motivo_falta`) REFERENCES `falta` (`pk_motivo_falta`),
  ADD CONSTRAINT `historial_ibfk_4` FOREIGN KEY (`fk_motivo_sancion`) REFERENCES `sancion` (`pk_motivo_sancion`),
  ADD CONSTRAINT `historial_ibfk_5` FOREIGN KEY (`fk_name_alumno`) REFERENCES `alumno` (`pk_name_alumno`),
  ADD CONSTRAINT `historial_ibfk_6` FOREIGN KEY (`fk_name_prof`) REFERENCES `usuario` (`pk_name_prof`);

--
-- Filtros para la tabla `sancion`
--
ALTER TABLE `sancion`
  ADD CONSTRAINT `sancion_ibfk_1` FOREIGN KEY (`fk_cod_gravedad`) REFERENCES `gravedad` (`pk_cod_gravedad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
