-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-06-2026 a las 15:02:17
-- Versión del servidor: 8.4.7
-- Versión de PHP: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial_itech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas_interes`
--

DROP TABLE IF EXISTS `areas_interes`;
CREATE TABLE IF NOT EXISTS `areas_interes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_areas_nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `areas_interes`
--

INSERT INTO `areas_interes` (`id`, `nombre`) VALUES
(2, 'Big Data'),
(4, 'Ciberseguridad'),
(1, 'Cloud Computing'),
(3, 'Desarrollo Móvil'),
(7, 'DevOps'),
(5, 'IoT (Internet de las Cosas)'),
(6, 'Machine Learning'),
(8, 'Python');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptores`
--

DROP TABLE IF EXISTS `inscriptores`;
CREATE TABLE IF NOT EXISTS `inscriptores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identidad` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int NOT NULL,
  `sexo` enum('Masculino','Femenino','Otro') NOT NULL,
  `pais_residencia_id` int NOT NULL,
  `nacionalidad_id` int NOT NULL,
  `correo` varchar(150) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `observaciones` text,
  `firma` varchar(64) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_inscriptores_identidad` (`identidad`),
  UNIQUE KEY `uq_inscriptores_correo` (`correo`),
  UNIQUE KEY `uq_inscriptores_celular` (`celular`),
  KEY `fk_inscriptor_pais_residencia` (`pais_residencia_id`),
  KEY `fk_inscriptor_nacionalidad` (`nacionalidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inscriptores`
--

INSERT INTO `inscriptores` (`id`, `identidad`, `nombre`, `apellido`, `edad`, `sexo`, `pais_residencia_id`, `nacionalidad_id`, `correo`, `celular`, `observaciones`, `firma`, `fecha_registro`) VALUES
(1, '8-1033-934', 'Elisa', 'Oses', 23, 'Femenino', 1, 11, 'oseselisa@gmail.com', '68397229', 'Necesito saber mas información', NULL, '2026-06-30 14:10:55'),
(3, '3-9034-9033', 'Jose', 'Perez', 30, 'Masculino', 4, 12, 'jhose@gmail.com', '64407134', 'Me gustaria contactar a un profesor', NULL, '2026-06-30 14:32:54'),
(4, '8-1034-893', 'Maria', 'Sanchez', 39, 'Femenino', 1, 11, 'maria_linda@gmail.com', '69605566', 'Me encantaria saber mas de todo me avisan cuando ya sea aceptada', '9e4dcd6dd4684ee986e1c014e631bef8bd6bd7e92f38f0c8df47aa5dbff60839', '2026-06-30 14:41:21'),
(5, '3-902-899', 'Juan', 'Torres', 33, 'Masculino', 1, 11, 'juan@gmail.com', '64407145', 'Nada que decir', 'b919e9baba1ff69c262c2a0403d52847019b172ff87b53c302e092d75851b15d', '2026-06-30 14:43:07'),
(6, '4-894-890', 'Julia', 'Max', 22, 'Femenino', 1, 11, 'juliannn@gmail.com', '6849345', 'Nada que decir', '2d7d88628d41b0e40e7382f7766ec3c0770f5420de05d09fab61fff0e4cf2f09', '2026-06-30 14:52:34'),
(8, '6-1034-903', 'Emma', 'Lopez', 22, 'Femenino', 1, 11, 'emma@gmail.com', '67459034', 'Me encantaria tener mas info', '1aeed1c8af5e692d5b2b66087ce9a20c6ea022945d0054831caa38861a8387f8', '2026-06-30 15:00:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptor_temas`
--

DROP TABLE IF EXISTS `inscriptor_temas`;
CREATE TABLE IF NOT EXISTS `inscriptor_temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inscriptor_id` int NOT NULL,
  `area_interes_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_inscriptor_tema` (`inscriptor_id`,`area_interes_id`),
  KEY `fk_tema_area` (`area_interes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inscriptor_temas`
--

INSERT INTO `inscriptor_temas` (`id`, `inscriptor_id`, `area_interes_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 4, 1),
(4, 6, 2),
(5, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_paises_nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`) VALUES
(7, 'Argentina'),
(8, 'Chile'),
(2, 'Colombia'),
(3, 'Costa Rica'),
(6, 'España'),
(5, 'Estados Unidos'),
(12, 'Mexicano'),
(4, 'México'),
(1, 'Panamá'),
(11, 'Panameña'),
(9, 'Perú'),
(10, 'Venezuela');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscriptores`
--
ALTER TABLE `inscriptores`
  ADD CONSTRAINT `fk_inscriptor_nacionalidad` FOREIGN KEY (`nacionalidad_id`) REFERENCES `paises` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inscriptor_pais_residencia` FOREIGN KEY (`pais_residencia_id`) REFERENCES `paises` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscriptor_temas`
--
ALTER TABLE `inscriptor_temas`
  ADD CONSTRAINT `fk_tema_area` FOREIGN KEY (`area_interes_id`) REFERENCES `areas_interes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tema_inscriptor` FOREIGN KEY (`inscriptor_id`) REFERENCES `inscriptores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
