-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 18-03-2022 a las 00:43:09
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_decocredito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuariocredito`
--

CREATE TABLE `tbl_usuariocredito` (
  `id_credito` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula_credito` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `numerocontacto` varchar(100) NOT NULL,
  `documento` varchar(100) NOT NULL,
  `labora` varchar(100) NOT NULL,
  `quetrabaja` varchar(100) NOT NULL,
  `nombre_laboral1` varchar(100) NOT NULL DEFAULT 'nulo',
  `apellido_laboral1` varchar(100) NOT NULL DEFAULT 'nulo',
  `cedula_laboral1` varchar(100) NOT NULL DEFAULT '0',
  `numero_laboral1` varchar(100) NOT NULL DEFAULT '0',
  `nombre_laboral2` varchar(100) NOT NULL DEFAULT 'nulo',
  `apellido_laboral2` varchar(100) NOT NULL DEFAULT 'nulo',
  `cedula_laboral2` varchar(100) NOT NULL DEFAULT '0',
  `numero_laboral2` varchar(100) NOT NULL DEFAULT '0',
  `nombre_familiar3` varchar(100) NOT NULL DEFAULT 'nulo',
  `apellido_familiar3` varchar(100) NOT NULL DEFAULT 'nulo',
  `cedula_familiar3` varchar(100) NOT NULL DEFAULT '0',
  `numero_familiar3` varchar(100) NOT NULL DEFAULT '0',
  `nombre_familiar4` varchar(100) NOT NULL DEFAULT 'nulo',
  `apellido_familiar4` varchar(100) NOT NULL DEFAULT 'nulo',
  `cedula_familiar4` varchar(100) NOT NULL DEFAULT '0',
  `numero_familiar4` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuariocredito`
--

INSERT INTO `tbl_usuariocredito` (`id_credito`, `nombre`, `cedula_credito`, `apellido`, `direccion`, `correo`, `numerocontacto`, `documento`, `labora`, `quetrabaja`, `nombre_laboral1`, `apellido_laboral1`, `cedula_laboral1`, `numero_laboral1`, `nombre_laboral2`, `apellido_laboral2`, `cedula_laboral2`, `numero_laboral2`, `nombre_familiar3`, `apellido_familiar3`, `cedula_familiar3`, `numero_familiar3`, `nombre_familiar4`, `apellido_familiar4`, `cedula_familiar4`, `numero_familiar4`) VALUES
(5, 'adfdfas', '3214123', 'asdfasd', 'sadfasd', 'asdfasd@correo.com', '1234213', 'texto plano', 'si', 'sadfasdfasd', 'asfasd', 'asdfasd', '213412', '2421', 'nulo', 'nulo', '0', '0', 'nulo', 'nulo', '0', '0', 'nulo', 'nulo', '0', '0'),
(6, 'Daniel', '1152186380', 'Arango', 'calle 59A #37-54', 'daniel@correo.com', '3205936059', 'texto plano', 'si', 'web', 'catalina', 'arango', '123456', '123456', 'nulo', 'nulo', '0', '0', 'nulo', 'nulo', '0', '0', 'nulo', 'nulo', '0', '0'),
(7, 'daniel', '123456', 'arango', 'calle 59A #45-43', 'danielarango990@gmail.com', '12345345234554', 'texto plano', 'si', 'web app developer ftony', 'catalina', 'arang villegas', '123456789', '123456789', '', 'villegas arango', '123456789', '123456789', 'nulo', 'nulo', '0', '0', 'nulo', 'nulo', '0', '0'),
(8, 'daniel', '123186390', 'arango villegas', 'calle 10 A 4suer - este #23-43', 'danielarango990@gmail.com', '32057943423', 'texto plano', 'no', 'web app developer apps webs', '', '', '', '', '', '', '', '', 'catalina', 'arang villegas', '123456', '123456', 'nulo', 'nulo', '0', '0'),
(9, 'Daniel', '1152186380', 'arango villegas', 'calle 59a #37-54', 'danielarango990@gmail.com', '3205936059', 'texto plano', 'si', 'web app developer', 'catalina', 'arango villegas', '115217639823', '115217639823', 'maria helena', 'villegas arango', '115217639823', '115217639823', '', '', '', '', '', '', '', ''),
(10, 'daniel', '11521862890', 'arango villegas', 'calle 59a #45-54', 'danielarango99_0@gmail.com', '3205936059', 'texto plano', 'no', '', '', '', '', '', '', '', '', '', 'catalina', 'arango', '115218634890', '115218634890', 'maria', 'villegas', '115218634890', '115218634890'),
(11, 'Daniel', '1152186380', 'Arango Villegas', 'calle 59a #37-54', 'danielarango990@gmail.com', '3205936059', '', 'si', 'web app developer', 'catalina alejandra', 'arango villegas', '123456789', '123456789', 'maria elena', 'villegas arango', '123456789', '123456789', '', '', '', '', '', '', '', ''),
(12, 'dasd', '21342134132', 'asdfasd', 'asdfasd', 'asdfasd@web.com', '12341234123', '', 'no', 'asdfasdf', '', '', '', '', '', '', '', '', 'asdfasd', 'asdfasd', '21341234', '12341234', 'asdfasd', 'asdfasdf', '12341234', '12341234'),
(13, 'sdfasdf', '1234123', 'asdfasdfasd', 'asdfasdf', 'asdfasd@gmail.com', '21341234', '', 'si', 'asdfasdfas', 'asdfasd', 'asdfasdf', '1234124', '12341234', 'asdfasdf', 'asdfasdf', '12341234', '12341234', '', '', '', '', '', '', '', ''),
(14, 'Daniel', '1152186380', 'Arango Villegas', 'calle 59a #37-54', 'danielarango990@gmail.com', '1152186380', 'firma_digital_1.jpg', 'si', 'web', 'catalina', 'Arango', '11521873232', '11521873232', 'maria', 'Villegas', '11521873232', '11521873232', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_usuariocredito`
--
ALTER TABLE `tbl_usuariocredito`
  ADD PRIMARY KEY (`id_credito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_usuariocredito`
--
ALTER TABLE `tbl_usuariocredito`
  MODIFY `id_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
