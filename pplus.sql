-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24-0ubuntu0.16.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla pplus.operadores
CREATE TABLE IF NOT EXISTS `operadores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pplus.operadores: 1 rows
/*!40000 ALTER TABLE `operadores` DISABLE KEYS */;
INSERT INTO `operadores` (`id`, `nombre`) VALUES
	(1, 'CNT');
/*!40000 ALTER TABLE `operadores` ENABLE KEYS */;

-- Volcando estructura para tabla pplus.pago_facturas
CREATE TABLE IF NOT EXISTS `pago_facturas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `n_factura` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` double(10,2) DEFAULT NULL,
  `usuario` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pplus.pago_facturas: 3 rows
/*!40000 ALTER TABLE `pago_facturas` DISABLE KEYS */;
INSERT INTO `pago_facturas` (`id`, `nombres`, `cedula`, `n_factura`, `monto`, `usuario`) VALUES
	(1, 'JUAN RAMIREZ', '1700393723654', '004547237294', 25.00, NULL),
	(2, 'JOSE PANTO', '179934574743', '00485757466', 32.00, NULL),
	(4, 'judelvis tivas', '17456121', 'fac001', 1502.30, 1);
/*!40000 ALTER TABLE `pago_facturas` ENABLE KEYS */;

-- Volcando estructura para tabla pplus.recargas
CREATE TABLE IF NOT EXISTS `recargas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `operador` int(1) DEFAULT NULL,
  `numero` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` double(10,2) DEFAULT NULL,
  `usuario` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pplus.recargas: 3 rows
/*!40000 ALTER TABLE `recargas` DISABLE KEYS */;
INSERT INTO `recargas` (`id`, `operador`, `numero`, `monto`, `usuario`) VALUES
	(1, 1, '09840184009', 155.00, 1),
	(2, 1, '0984018400', 110.00, 1),
	(4, 1, '434444', 13435.00, 1);
/*!40000 ALTER TABLE `recargas` ENABLE KEYS */;

-- Volcando estructura para tabla pplus.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pplus.usuarios: 1 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `ci`, `email`, `clave`, `activo`) VALUES
	(1, 'Paul', 'Newman', '17341736', 'paul.newman.dev@gmail.com', '202cb962ac59075b964b07152d234b70', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
