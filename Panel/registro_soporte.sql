-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2023 a las 20:57:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_soporte`
--
CREATE DATABASE IF NOT EXISTS `registro_soporte` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registro_soporte`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `ID` int(11) NOT NULL,
  `AREA` varchar(5) DEFAULT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`ID`, `AREA`, `DESCRIPCION`) VALUES
(1, 'DGE', 'DIRECCION GENERAL EJECUTIVO'),
(2, 'DAF', 'DIRECCION ADMINISTRATIVO FINANCIERO'),
(3, 'DML', 'DIRECCION DE METROLOGIA LEGAL'),
(4, 'DTA', 'DIRECCION TECNICA DE ACREDITACION'),
(5, 'DMIC', 'DIRECCION DE METROLOGIA INDUSTRIAL Y CIENTIFICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

DROP TABLE IF EXISTS `dispositivos`;
CREATE TABLE `dispositivos` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`ID`, `DESCRIPCION`) VALUES
(1, 'Impresora'),
(2, 'Equipo Completo'),
(3, 'Telefono'),
(4, 'Correo Institucional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

DROP TABLE IF EXISTS `oficinas`;
CREATE TABLE `oficinas` (
  `ID` int(11) NOT NULL,
  `UBICACION_OFICINA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`ID`, `UBICACION_OFICINA`) VALUES
(1, 'Oficina Central'),
(2, 'Oficina El Alto'),
(3, 'Oficina Cochabamba'),
(4, 'Oficina Patacamaya'),
(5, 'Oficina Santa Cruz'),
(6, 'Oficina Tarija'),
(7, 'Oficina Oruro'),
(8, 'Oficina Pando'),
(9, 'Oficina Beni'),
(10, 'Oficina Potosi'),
(11, 'Oficina Chuquisaca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `ID` int(11) NOT NULL,
  `TIPO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `dispositivos` (`ID`, `TIPO`) VALUES
(1, 'Reparación / Cambio'),
(2, 'Instalación / Configuración'),
(3, 'Resguardo de Información'),
(4, 'Apoyo'),
(5, 'Formateo de PC'),
(6, 'Mantenimiento'),
(7, 'Equipo Completo');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_cl`
--

DROP TABLE IF EXISTS `soporte_cl`;
CREATE TABLE `soporte_cl` (
  `ID` int(11) NOT NULL,
  `OFICINAS` int(11) DEFAULT NULL,
  `AREA` int(11) DEFAULT NULL,
  `USUARIOS` int(11) DEFAULT NULL,
  `DISPOSITIVO` int(11) DEFAULT NULL,
  `SERVICIO` int(11) DEFAULT NULL,
  `PROBLEMA` varchar(200) DEFAULT NULL,
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `AREA` int(11) DEFAULT NULL,
  `NombreCompleto` varchar(75) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(25) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `AREA`, `NombreCompleto`, `username`, `PASSWORD`, `cargo`, `correo`) VALUES
(1, 2, 'Administrador', 'Administrator', 'K3rb+directori0', 'Administrador', 'sistemas@ibmetro.gob.bo'),
(2, 2, 'Soporte', 'Sistemas', 'Sitemas123', 'Soporte Técnico', 'soporte@ibmetro.gob.bo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `soporte_cl`
--
ALTER TABLE `soporte_cl`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_sop_ofi` (`OFICINAS`),
  ADD KEY `fk_sop_are` (`AREA`),
  ADD KEY `fk_sop_usu` (`USUARIOS`),
  ADD KEY `fk_sop_dis` (`DISPOSITIVO`),
  ADD KEY `fk_sop_ser` (`SERVICIO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_usu_are` (`AREA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `soporte_cl`
--
ALTER TABLE `soporte_cl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `soporte_cl`
--
ALTER TABLE `soporte_cl`
  ADD CONSTRAINT `fk_sop_are` FOREIGN KEY (`AREA`) REFERENCES `area` (`ID`),
  ADD CONSTRAINT `fk_sop_dis` FOREIGN KEY (`DISPOSITIVO`) REFERENCES `dispositivos` (`ID`),
  ADD CONSTRAINT `fk_sop_ofi` FOREIGN KEY (`OFICINAS`) REFERENCES `oficinas` (`ID`),
  ADD CONSTRAINT `fk_sop_ser` FOREIGN KEY (`SERVICIO`) REFERENCES `servicio` (`ID`),
  ADD CONSTRAINT `fk_sop_usu` FOREIGN KEY (`USUARIOS`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usu_are` FOREIGN KEY (`AREA`) REFERENCES `area` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
