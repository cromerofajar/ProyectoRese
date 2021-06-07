-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 01:13:35
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crfdatospagina`
--
CREATE DATABASE IF NOT EXISTS `crfdatospagina` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crfdatospagina`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE `juegos` (
  `titulo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`titulo`) VALUES
('Crash Bandicoot'),
('Rayman'),
('Terraria'),
('bomberman'),
('Starcraft'),
('Minecraft'),
('Lego'),
('Rainbow six Siege');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--

DROP TABLE IF EXISTS `resenas`;
CREATE TABLE `resenas` (
  `juego` varchar(30) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `resena` varchar(2000) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resenas`
--

INSERT INTO `resenas` (`juego`, `titulo`, `resena`, `usuario`, `id`) VALUES
('Crash Bandicoot', 'Un buen plataformas', 'Crash Bandicoot es posiblemente el juego de plataf...', 'Russell', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `rango` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `clave`, `rango`) VALUES
('Ban', '$2y$10$.JIac/ZmTYYYQKQ2RpiT.OY1Lg2oNOufqi4kemOyQVbiFOIzhWw5W', 0),
('Carlos', '$2y$10$s4FrpRa5w2b7ImCKwCGpVOe/WQymUJkTn0FWKzB4sR11MGGPBLuJO', 0),
('cesar', '$2y$10$kdntwm7Is2JsYKPg2Gr7Y.4YR8duSdZ.YiKfA0kYdQbLPBRiopc0e', 1),
('pepe', '$2y$10$1k9cUIwplroE12a44S5fvuAh.GUVdGsda7QjW2TO4nRLHbL2rDOvm', 0),
('Russell', '$2y$10$foq33reCNr3pjZADriMFDOLV9XAsHp..vR8Rwi4GcIgJ9wPIQjv.G', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
