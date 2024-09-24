-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2023 a las 20:33:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `cod_alumno` int(11) NOT NULL,
  `nombre_alumnos` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cod_alumno`, `nombre_alumnos`, `apellidos`, `DNI`, `fecha_nac`) VALUES
(1, 'Rufino', 'Porta Agustí', '11111111A', '2006-05-12'),
(2, 'Toni', 'Lucas Calvo', '22222222B', '2005-08-29'),
(3, 'Ramón', 'Rodriguez', '33333333C', '2004-05-17'),
(4, 'Claudia', 'Romero', '44444444D', '2003-01-08'),
(5, 'Pedro', 'Diaz', '66666666E', '2005-02-13'),
(6, 'Luis', 'Gomez', '77777777F', '2003-03-11'),
(7, 'Sergio', 'Acosta', '88888888G', '2004-04-23'),
(8, 'Miguel', 'Sanchez', '99999999Q', '2006-12-12'),
(9, 'Raúl ', 'Suarez', '10101010H', '2004-05-25'),
(27, 'jona', 'jona', 'jona', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `cod_departamento` int(11) NOT NULL,
  `Nombre_departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`cod_departamento`, `Nombre_departamento`) VALUES
(1, 'Dpto Informática'),
(2, 'Dpto Lengua'),
(3, 'Dpto Matemáticas'),
(4, 'Dpto Historia y Geografía'),
(5, 'Dpto Íngles'),
(6, 'Dpto Música'),
(7, 'Dpto Ed.Física'),
(8, 'Dpto Física y química'),
(9, 'Dpto Biología'),
(10, 'Dpto Economía'),
(13, 'Dept. Mates2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `cod_curso` int(11) NOT NULL,
  `cod_alumno` int(11) NOT NULL,
  `cod_profesor` int(30) NOT NULL,
  `curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`cod_curso`, `cod_alumno`, `cod_profesor`, `curso`) VALUES
(1, 1, 1, '3A'),
(2, 2, 12, '4B'),
(3, 3, 17, '1GM'),
(4, 4, 10, '2GM'),
(5, 5, 6, '4A'),
(6, 6, 2, '2GM'),
(7, 7, 4, '1GM'),
(8, 8, 13, '3A'),
(9, 9, 9, '1GM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `cod_profesor` int(11) NOT NULL,
  `cod_departamento` int(11) NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `apellido_profesor` varchar(100) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel_pro` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`cod_profesor`, `cod_departamento`, `nombre_profesor`, `apellido_profesor`, `nick`, `password`, `nivel_pro`) VALUES
(1, 1, 'Julio', 'Ruiz', 'julio', '52336104be246289fc8c4a76561d0b4fb825755a', 2),
(2, 2, 'Miguel', 'Perez', 'miguel', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1),
(3, 2, 'Horacio', 'Suarez', '', '', 1),
(4, 3, 'Mónica', 'Garcia', '', '', 2),
(5, 4, 'Silvia', 'Perez', '', '', 1),
(6, 1, 'Daniel', 'Sanchez', '', '', 1),
(7, 5, 'Carlos', 'Acosta', '', '', 1),
(8, 7, 'Pedro', 'Torres', '', '', 2),
(9, 4, 'Marta', 'Diaz', '', '', 1),
(10, 8, 'Lucía', 'Rodriguez', '', '', 2),
(11, 9, 'Oscar', 'Aguirre', '', '', 1),
(12, 10, 'María', 'Gonzalez', '', '', 2),
(13, 3, 'Juana', 'Gonzalez', '', '', 2),
(14, 6, 'Roberto', 'Ramirez', '', '', 1),
(15, 6, 'Hector', 'Rodriguez', '', '', 2),
(25, 4, 'jona', 'jona', '', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`cod_alumno`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`cod_departamento`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`cod_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `cod_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `cod_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `cod_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos` FOREIGN KEY (`cod_alumno`) REFERENCES `alumnos` (`cod_alumno`),
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `profesores` (`cod_profesor`),
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`cod_alumno`) REFERENCES `alumnos` (`cod_alumno`),
  ADD CONSTRAINT `grupos_ibfk_3` FOREIGN KEY (`cod_profesor`) REFERENCES `profesores` (`cod_profesor`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores` FOREIGN KEY (`cod_departamento`) REFERENCES `departamentos` (`cod_departamento`),
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`cod_departamento`) REFERENCES `departamentos` (`cod_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
