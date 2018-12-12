-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2018 a las 11:29:53
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pplus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

DROP TABLE IF EXISTS `operadores`;
CREATE TABLE IF NOT EXISTS `operadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`id`, `nombre`) VALUES
(1, 'CNT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_facturas`
--

DROP TABLE IF EXISTS `pago_facturas`;
CREATE TABLE IF NOT EXISTS `pago_facturas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `n_factura` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_facturas`
--

INSERT INTO `pago_facturas` (`id`, `nombres`, `cedula`, `n_factura`, `monto`) VALUES
(1, 'JUAN RAMIREZ', '1700393723654', '004547237294', 25.00),
(2, 'JOSE PANTO', '179934574743', '00485757466', 32.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargas`
--

DROP TABLE IF EXISTS `recargas`;
CREATE TABLE IF NOT EXISTS `recargas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `operador` int(1) DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recargas`
--

INSERT INTO `recargas` (`id`, `operador`, `numero`, `monto`) VALUES
(1, 1, '0984018400', 5.00),
(2, NULL, '0984018400', 10.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `ci`, `email`, `clave`, `activo`) VALUES
(1, 'Paul', 'Newman', '17341736', 'paul.newman.dev@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
