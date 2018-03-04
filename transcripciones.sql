-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2018 a las 07:47:05
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transcripciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `cargo`) VALUES
(1, 'TRANSCRIPTOR'),
(2, 'TIMECODER'),
(3, 'POSTPRODUCTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idprocedimiento` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idlog`, `accion`, `usuario`, `fecha`, `idprocedimiento`) VALUES
(1, 'Edicion Planificacion', 'carlos.sanchez', '2018-01-14 19:11:33', 'HD327194'),
(2, 'Edicion Planificacion', 'carlos.sanchez', '2018-01-14 19:11:49', 'HD327194'),
(3, 'Edicion Planificacion', 'carlos.sanchez', '2018-01-14 19:17:45', 'HD327194'),
(4, 'Edicion Planificacion', 'andre.autran', '2018-01-16 00:12:08', 'HD327194'),
(5, 'Edicion Planificacion', 'andre.autran', '2018-01-16 00:16:52', 'HD327194'),
(6, 'Agrega Planificacion', '', '2018-01-16 00:50:21', 'TMR8C'),
(7, 'Agrega Planificacion', '', '2018-01-16 00:53:08', 'TMR9C'),
(8, 'Agrega Planificacion', '', '2018-01-16 00:54:32', 'TMR10C'),
(9, 'Agrega Planificacion', '', '2018-01-16 00:57:09', 'TMR11C'),
(10, 'Agrega Planificacion', '', '2018-01-16 00:59:03', 'TMR12C'),
(11, 'Agrega Planificacion', '', '2018-01-16 01:00:16', 'TMR13C'),
(12, 'Agrega Planificacion', '', '2018-01-16 01:38:20', 'TMR15C'),
(13, 'Agrega Planificacion', 'andre.autran', '2018-01-16 01:39:47', 'TMR16C'),
(14, 'Agrega Planificacion', 'andre.autran', '2018-01-16 01:40:59', 'TMR17C'),
(15, 'Agrega Planificacion', 'andre.autran', '2018-01-16 01:40:59', 'TMR18C'),
(16, 'Agrega Planificacion', 'andre.autran', '2018-01-16 01:40:59', 'TMR19C'),
(17, 'Agrega Planificacion', 'andre.autran', '2018-01-16 01:40:59', 'TMR20C'),
(18, 'Modificacion del Tiempo Transcriptor 2', 'andre.autran', '2018-01-18 07:52:22', 'HD327194'),
(19, 'Modificacion del Tiempo Transcriptor 4', 'andre.autran', '2018-01-18 07:52:22', 'HD327194'),
(20, 'Modificacion del Tiempo Transcriptor 2', 'andre.autran', '2018-01-18 07:53:51', 'HD327194'),
(21, 'Modificacion del Tiempo Transcriptor 4', 'andre.autran', '2018-01-18 07:53:51', 'HD327194'),
(22, 'Modificacion del Transcriptor 1', 'andre.autran', '2018-01-18 07:54:12', 'HD327194'),
(23, 'Modificacion del Transcriptor 2', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(24, 'Modificacion del Transcriptor 3', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(25, 'Modificacion del Transcriptor 4', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(26, 'Modificacion del Transcriptor 5', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(27, 'Modificacion del TimeCoder 1', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(28, 'Modificacion del TimeCoder 2', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(29, 'Modificacion del TimeCoder 3', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(30, 'Modificacion del TimeCoder 4', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(31, 'Modificacion del TimeCoder 5', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(32, 'Modificacion del TimeCoder 6', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(33, 'Modificacion del Tiempo TimeCoder 1', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(34, 'Modificacion del Tiempo TimeCoder 2', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(35, 'Modificacion del Tiempo TimeCoder 5', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(36, 'Modificacion de la Fecha Interna 2', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(37, 'Modificacion del Estado Cliente', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(38, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(39, 'Modificacion de la Nota', 'andre.autran', '2018-01-18 07:55:17', 'HD327194'),
(40, 'Modificacion del Transcriptor 3', 'andre.autran', '2018-01-18 08:25:51', 'TMR13C'),
(41, 'Modificacion de la Nota', 'andre.autran', '2018-01-18 08:26:06', 'TMR13C'),
(42, 'Borrar Planificacion', 'andre.autran', '2018-01-18 08:26:27', 'TMR13C'),
(43, 'Borrar Planificacion', 'andre.autran', '2018-01-18 08:26:27', 'TMR13C'),
(44, 'Agrega Planificacion', 'andre.autran', '2018-01-18 08:27:59', '123C'),
(45, 'Modificacion de la Duracion', 'andre.autran', '2018-01-20 08:05:52', '123C'),
(46, 'Modificacion del PostProductor Dos 1', 'andre.autran', '2018-01-20 08:05:52', '123C'),
(47, 'Modificacion de la Fecha Interna 3', 'andre.autran', '2018-01-20 08:05:52', '123C'),
(48, 'Modificacion de la Fecha Interna 4', 'andre.autran', '2018-01-20 08:05:52', '123C'),
(49, 'Modificacion del PostProductor 2', 'andre.autran', '2018-01-20 08:06:08', '123C'),
(50, 'Modificacion del PostProductor Dos 2', 'andre.autran', '2018-01-20 08:06:08', '123C'),
(51, 'Modificacion del Tiempo PostProductor Dos 1', 'andre.autran', '2018-01-20 08:06:22', '123C'),
(52, 'Modificacion del Tiempo PostProductor Dos 1', 'andre.autran', '2018-01-20 08:09:59', '123C'),
(53, 'Modificacion del PostProductor Dos 2', 'andre.autran', '2018-01-20 08:22:52', '123C'),
(54, 'Modificacion del PostProductor Dos 1', 'andre.autran', '2018-01-20 08:23:02', '123C'),
(55, 'Modificacion de la Fecha Interna 3', 'andre.autran', '2018-01-20 08:23:22', '123C'),
(56, 'Modificacion de la Fecha Interna 4', 'andre.autran', '2018-01-20 08:23:22', '123C'),
(57, 'Modificacion del PostProductor Dos 1', 'andre.autran', '2018-01-20 08:23:39', '123C'),
(58, 'Modificacion de la Fecha Interna 4', 'andre.autran', '2018-01-20 08:23:50', '123C'),
(59, 'Modificacion del Estado Cliente', 'andre.autran', '2018-01-21 18:09:07', '123C'),
(60, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-21 18:09:07', '123C'),
(61, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-21 18:17:18', '123C'),
(62, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-21 18:17:43', 'TMR12C'),
(63, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-22 07:32:18', 'TMR15C'),
(64, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-22 07:32:27', '123C'),
(65, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-22 07:32:37', 'TMR15C'),
(66, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-22 07:33:38', 'TMR12C'),
(67, 'Borrar Planificacion', 'andre.autran', '2018-01-22 18:21:05', '123C'),
(68, 'Agrega Planificacion', 'andre.autran', '2018-01-22 18:25:03', 'TMR16C'),
(69, 'Agrega Planificacion', 'andre.autran', '2018-01-22 18:25:03', 'TMR17C'),
(70, 'Agrega Planificacion', 'andre.autran', '2018-01-22 18:25:03', 'TMR18C'),
(71, 'Agrega Planificacion', 'andre.autran', '2018-01-22 18:25:03', 'TMR19C'),
(72, 'Agrega Planificacion', 'andre.autran', '2018-01-22 18:25:03', '123C'),
(73, 'Modificacion del PostProductor Dos 1', 'andre.autran', '2018-01-22 20:20:25', '123C'),
(74, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-27 08:59:34', '123C'),
(75, 'Modificacion del Estado Cliente', 'andre.autran', '2018-01-27 09:36:24', '123C'),
(76, 'Modificacion del Estado Cliente', 'andre.autran', '2018-01-27 09:36:33', 'MD15520'),
(77, 'Modificacion del Estado Cliente', 'andre.autran', '2018-01-27 09:37:02', 'MD15520'),
(78, 'Modificacion del Estado Interno', 'andre.autran', '2018-01-28 18:40:27', 'MD15520'),
(79, 'Modificacion del PostProductor 1', 'andre.autran', '2018-01-29 17:46:49', '123C'),
(80, 'Modificacion del PostProductor Dos 1', 'andre.autran', '2018-01-29 17:46:49', '123C'),
(81, 'Modificacion del Tiempo PostProductor 1', 'andre.autran', '2018-01-29 17:48:26', '123C'),
(82, 'Modificacion del Tiempo PostProductor Dos 1', 'andre.autran', '2018-01-29 17:48:26', '123C'),
(83, 'Agrega Planificacion', 'andre.autran', '2018-01-31 21:20:02', 'TMR99C'),
(84, 'Modificacion del Transcriptor 1', 'ASD', '2018-01-31 21:32:47', 'MD15520'),
(85, 'Modificacion del Transcriptor 1', 'ASD', '2018-01-31 21:33:04', '123C'),
(86, 'Modificacion de la Nota', 'ASD', '2018-01-31 21:33:04', '123C'),
(87, 'Modificacion del Transcriptor 2', 'ASD', '2018-01-31 21:34:42', '123C'),
(88, 'Modificacion de la Nota', 'andre.autran', '2018-01-31 21:39:07', '123C'),
(89, 'Modificacion de la Nota', 'asd', '2018-01-31 21:39:35', '123C'),
(90, 'Modificacion de la Nota', 'andre.autran', '2018-01-31 21:40:48', '123C'),
(91, 'Modificacion de la Nota', 'asd', '2018-01-31 21:41:03', '123C'),
(92, 'Modificacion de la Nota', 'andre.autran', '2018-01-31 21:46:58', '123C'),
(93, 'Modificacion del Transcriptor 2', 'asd', '2018-01-31 21:48:02', '123C'),
(94, 'Modificacion de la Nota', 'asd', '2018-01-31 21:48:02', '123C'),
(95, 'Modificacion de la Nota', 'andre.autran', '2018-01-31 21:48:30', '123C'),
(96, 'Modificacion del Transcriptor 2', 'asd', '2018-01-31 21:48:43', '123C'),
(97, 'Modificacion del TimeCoder 1', 'andre.autran', '2018-01-31 22:12:23', '123C'),
(98, 'Modificacion del Transcriptor 1', 'andre.autran', '2018-02-03 09:38:29', '123C'),
(99, 'Modificacion de la Nota', 'andre.autran', '2018-02-03 21:34:31', 'MD15520'),
(100, 'Modificacion del Estado Interno', 'andre.autran', '2018-02-04 07:46:58', '123C'),
(101, 'Modificacion del Estado Interno', 'andre.autran', '2018-02-04 07:47:08', 'MD15520'),
(102, 'Modificacion del Estado Interno', 'andre.autran', '2018-02-04 07:49:01', '123C'),
(103, 'Modificacion del Estado Interno', 'andre.autran', '2018-02-04 07:49:15', '123C'),
(104, 'Modificacion del Transcriptor 2', 'andre.autran', '2018-02-04 09:11:37', '123C'),
(105, 'Modificacion del Transcriptor 3', 'andre.autran', '2018-02-04 09:11:37', '123C'),
(106, 'Modificacion del Transcriptor 4', 'andre.autran', '2018-02-04 09:11:37', '123C'),
(107, 'Modificacion del TimeCoder 2', 'andre.autran', '2018-02-04 09:11:37', '123C'),
(108, 'Modificacion del PostProductor Dos 3', 'andre.autran', '2018-02-04 09:11:37', '123C'),
(109, 'Modificacion del PostProductor 6', 'andre.autran', '2018-02-04 09:11:50', '123C'),
(110, 'Modificacion del PostProductor Dos 2', 'andre.autran', '2018-02-04 09:11:50', '123C'),
(111, 'Modificacion del Tiempo Transcriptor 1', 'andre.autran', '2018-02-04 18:16:43', 'MD15520'),
(112, 'Modificacion del Estado Interno', 'andre.autran', '2018-02-04 18:16:43', 'MD15520');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE `procedimiento` (
  `idprocedimiento` varchar(100) NOT NULL,
  `nombrearchivo` varchar(300) DEFAULT NULL,
  `duracion` int(10) DEFAULT '0',
  `cliente` varchar(300) DEFAULT NULL,
  `fechacliente` date DEFAULT '0000-00-00',
  `idtranscriptor1` int(3) DEFAULT '0',
  `idtranscriptor2` int(3) DEFAULT '0',
  `idtranscriptor3` int(3) DEFAULT '0',
  `idtranscriptor4` int(3) DEFAULT '0',
  `idtranscriptor5` int(3) DEFAULT '0',
  `idtranscriptor6` int(3) DEFAULT '0',
  `tiempotr1` int(11) DEFAULT '0',
  `tiempotr2` int(11) DEFAULT '0',
  `tiempotr3` int(11) DEFAULT '0',
  `tiempotr4` int(11) DEFAULT '0',
  `tiempotr5` int(11) DEFAULT '0',
  `tiempotr6` int(11) DEFAULT '0',
  `fechainterna1` date DEFAULT '0000-00-00',
  `idtimecoder1` int(3) DEFAULT '0',
  `idtimecoder2` int(3) DEFAULT '0',
  `idtimecoder3` int(3) DEFAULT '0',
  `idtimecoder4` int(3) DEFAULT '0',
  `idtimecoder5` int(3) DEFAULT '0',
  `idtimecoder6` int(3) DEFAULT '0',
  `tiempotc1` int(11) DEFAULT '0',
  `tiempotc2` int(11) DEFAULT '0',
  `tiempotc3` int(11) DEFAULT '0',
  `tiempotc4` int(11) DEFAULT '0',
  `tiempotc5` int(11) DEFAULT '0',
  `tiempotc6` int(11) DEFAULT '0',
  `fechainterna2` date DEFAULT '0000-00-00',
  `idpostproductor1` int(3) DEFAULT '0',
  `idpostproductor2` int(3) DEFAULT '0',
  `idpostproductor3` int(3) DEFAULT '0',
  `idpostproductor4` int(3) DEFAULT '0',
  `idpostproductor5` int(3) DEFAULT '0',
  `idpostproductor6` int(3) DEFAULT '0',
  `tiempopp1` int(11) NOT NULL DEFAULT '0',
  `tiempopp2` int(11) DEFAULT '0',
  `tiempopp3` int(11) DEFAULT '0',
  `tiempopp4` int(11) DEFAULT '0',
  `tiempopp5` int(11) DEFAULT '0',
  `tiempopp6` int(11) DEFAULT '0',
  `fechainterna3` date DEFAULT '0000-00-00',
  `estadointerno` varchar(50) DEFAULT '0',
  `estadocliente` varchar(50) DEFAULT '0',
  `observaciones` varchar(5000) DEFAULT '(Sin Observaciones)',
  `idpostproductordos1` int(3) NOT NULL DEFAULT '0',
  `idpostproductordos2` int(3) NOT NULL DEFAULT '0',
  `idpostproductordos3` int(3) NOT NULL DEFAULT '0',
  `idpostproductordos4` int(3) NOT NULL DEFAULT '0',
  `idpostproductordos5` int(3) NOT NULL DEFAULT '0',
  `idpostproductordos6` int(3) NOT NULL DEFAULT '0',
  `tiempoppdos1` int(11) NOT NULL DEFAULT '0',
  `tiempoppdos2` int(11) NOT NULL DEFAULT '0',
  `tiempoppdos3` int(11) NOT NULL DEFAULT '0',
  `tiempoppdos4` int(11) NOT NULL DEFAULT '0',
  `tiempoppdos5` int(11) NOT NULL DEFAULT '0',
  `tiempoppdos6` int(11) NOT NULL DEFAULT '0',
  `fechaingreso` date DEFAULT '0000-00-00',
  `fechainterna4` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procedimiento`
--

INSERT INTO `procedimiento` (`idprocedimiento`, `nombrearchivo`, `duracion`, `cliente`, `fechacliente`, `idtranscriptor1`, `idtranscriptor2`, `idtranscriptor3`, `idtranscriptor4`, `idtranscriptor5`, `idtranscriptor6`, `tiempotr1`, `tiempotr2`, `tiempotr3`, `tiempotr4`, `tiempotr5`, `tiempotr6`, `fechainterna1`, `idtimecoder1`, `idtimecoder2`, `idtimecoder3`, `idtimecoder4`, `idtimecoder5`, `idtimecoder6`, `tiempotc1`, `tiempotc2`, `tiempotc3`, `tiempotc4`, `tiempotc5`, `tiempotc6`, `fechainterna2`, `idpostproductor1`, `idpostproductor2`, `idpostproductor3`, `idpostproductor4`, `idpostproductor5`, `idpostproductor6`, `tiempopp1`, `tiempopp2`, `tiempopp3`, `tiempopp4`, `tiempopp5`, `tiempopp6`, `fechainterna3`, `estadointerno`, `estadocliente`, `observaciones`, `idpostproductordos1`, `idpostproductordos2`, `idpostproductordos3`, `idpostproductordos4`, `idpostproductordos5`, `idpostproductordos6`, `tiempoppdos1`, `tiempoppdos2`, `tiempoppdos3`, `tiempoppdos4`, `tiempoppdos5`, `tiempoppdos6`, `fechaingreso`, `fechainterna4`) VALUES
('123C', 'KNIGHT S TALE A', 60, 'televisa', '2017-12-25', 0, 1, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 1, 0, 0, 0, 0, 4, 20, 0, 0, 0, 0, 0, '0000-00-00', '0', '4', 'ASDASDASD', 1, 4, 1, 0, 0, 0, 10, 0, 0, 0, 0, 0, '2018-02-04', '0000-00-00'),
('HD327194', 'REGULAR SHOW II THE', 126, '', '2017-12-25', 2, 1, 1, 1, 2, 0, 123, 1, 1, 1, 0, 0, '2018-01-17', 2, 2, 2, 2, 2, 2, 120, 3, 0, 0, 3, 0, '2018-01-26', 0, 0, 0, 0, 0, 0, 126, 0, 0, 0, 0, 0, '0000-00-00', '1', '1', 'asdasdad', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-18', '0000-00-00'),
('HD327586', 'REGULAR SHOW II THE', 11, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD327587', 'REGULAR SHOW II THE', 27, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD332618', 'REGULAR SHOW II THE', 32, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD332619', 'REGULAR SHOW II THE', 50, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD337117', 'EL CHAVO DEL OCHO REMASTERIZAD', 66, '', '2017-12-26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD385058', 'MR YOUNG', 130, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD385059', 'MR YOUNG', 126, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('HD386276', 'WALKING DEAD THE VII', 20, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD114072', 'LETTERS FROM IWO JIMA                                                                               ', 11, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD14230', 'LAST ACTION HERO', 25, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD15520', 'LOS TRES MOSQUETEROS                                                                                     ', 26, '', '2017-12-25', 1, 0, 0, 0, 0, 0, 26, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '2', '3', 'ASDASD', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-02-04', '0000-00-00'),
('MD22247', 'LONGITUD DE GUERRA                                                                                    ', 15, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD22753', 'LEGENDS OF THE FALL', 10, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD23352', 'LIFE OF DAVID GALE THE', 12, '', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD27293', 'KNIGHT S TALE A', 60, '', '2017-12-26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('MD68872', 'LAST CASTLE THE', 42, 'vitac', '2017-12-26', 1, 2, 0, 0, 0, 0, 67, 88, 999, 0, 0, 0, '2018-01-03', 2, 2, 2, 2, 2, 2, 100, 200, 0, 0, 0, 0, '2017-12-30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-02-16', '1', '2', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('TMR16C', 'KNIGHT S TALE A', 60, 'televisa', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', '(Sin Observaciones)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-22', '0000-00-00'),
('TMR17C', 'KNIGHT S TALE A', 60, 'televisa', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', '(Sin Observaciones)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-22', '0000-00-00'),
('TMR18C', 'KNIGHT S TALE A', 60, 'televisa', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', '(Sin Observaciones)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-22', '0000-00-00'),
('TMR19C', 'KNIGHT S TALE A', 60, 'televisa', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', '(Sin Observaciones)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-22', '0000-00-00'),
('TMR6C', 'KNIGHT S TALE A', 60, 'telemundo\r\n', '2017-12-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00'),
('TMR99C', 'DRAGON BALL SUPER', 60, 'TELEVISA', '2018-01-30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', '0', '0', '(Sin Observaciones)', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-01-31', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `tipousuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipousuario`) VALUES
(1, 'USUARIO'),
(2, 'ADMINISTRADOR'),
(3, 'ASISTENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(12) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idtipousuario` int(11) DEFAULT NULL,
  `idcargo1` int(11) DEFAULT NULL,
  `idcargo2` int(11) NOT NULL,
  `idcargo3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `password`, `usuario`, `nombre`, `apellido`, `fechaIngreso`, `estado`, `idtipousuario`, `idcargo1`, `idcargo2`, `idcargo3`) VALUES
(1, '62631408', 'ANDRE.AUTRAN', 'ANDRE', 'AUTRAN', '1989-08-30', 1, 2, 1, 3, 0),
(3, '1234', 'CARLOS.SANCHEZ', 'carlos', 'sanchez', '2018-01-14', NULL, 3, 0, 0, 0),
(9, '1234', 'JUAN.DIAZ', 'JUAN', 'DIAZ', '2018-02-04', NULL, 2, 1, 2, 3),
(10, '1234', 'VANESSA.LAVERDE', 'VANESSA', 'LAVERDE', '2018-02-04', NULL, 3, 3, 0, 0),
(11, '1234', 'MARCELO.BAEZ', 'MARCELO', 'BAEZ', '2018-02-04', NULL, 2, 2, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`idprocedimiento`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
