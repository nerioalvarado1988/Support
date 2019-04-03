-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2019 a las 13:03:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `support`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1550499175),
('m130524_201442_init', 1550499180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `Nro_Ticket` int(6) NOT NULL,
  `Respuesta` varchar(400) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`Nro_Ticket`, `Respuesta`) VALUES
(254712, 'Respuesta a la prueba'),
(254714, 'Respuesta a la prueba 3'),
(254713, 'Prueba final'),
(254717, 'en coordinacion con cycely'),
(254717, 'listo el cambio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `Nro_Ticket` int(6) NOT NULL,
  `Departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Prioridad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Detalle` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` datetime(6) NOT NULL,
  `Estatus` int(1) NOT NULL,
  `FechaSolucion` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`Nro_Ticket`, `Departamento`, `Prioridad`, `Detalle`, `Usuario`, `FechaRegistro`, `Estatus`, `FechaSolucion`) VALUES
(254712, 'Cuentas por cobrar', 'Alta', 'Prueba', 'Prueba', '2019-03-07 16:35:31.000000', 1, '2019-03-07 19:06:35.000000'),
(254713, 'Sistemas', 'Alta', 'Prueba 2', 'Sistemas', '2019-03-07 18:43:39.000000', 1, '2019-03-07 19:07:24.000000'),
(254714, 'RRHH', 'Alta', 'Prueba 3', 'Prueba', '2019-03-07 18:45:25.000000', 1, '2019-03-07 19:04:42.000000'),
(254715, 'Cuentas por cobrar', 'Alta', 'Prueba 4', 'Prueba', '2019-03-07 19:19:48.000000', 0, '0000-00-00 00:00:00.000000'),
(254716, 'Cuentas por cobrar', 'Alta', 'Prueba ·6', 'Prueba', '2019-03-07 19:22:27.000000', 0, '0000-00-00 00:00:00.000000'),
(254717, 'Mantenimiento', 'Media', 'Fuente de poder quemada', 'Sistemas', '2019-03-14 15:06:40.000000', 1, '2019-03-14 15:12:39.000000'),
(254718, 'RRHH', 'Alta', 'Problemas con profit', 'Sistemas', '2019-03-14 15:30:15.000000', 0, '0000-00-00 00:00:00.000000'),
(254719, 'RRHH', 'Alta', 'Problemas con profit', 'Sistemas', '2019-03-14 15:30:15.000000', 0, '0000-00-00 00:00:00.000000'),
(254720, 'Sistemas', 'Alta', 'Prueba', 'Sistemas', '2019-03-14 16:14:14.000000', 0, '0000-00-00 00:00:00.000000'),
(254721, 'Sistemas', 'Alta', 'Prueba', 'Sistemas', '2019-03-14 16:14:14.000000', 0, '0000-00-00 00:00:00.000000'),
(254722, 'RRHH', 'Alta', 'prueba 11', 'Sistemas', '2019-03-14 16:36:59.000000', 0, '0000-00-00 00:00:00.000000'),
(254723, 'Cuentas por cobrar', 'Alta', 'Prueba Definitiva', 'Prueba', '2019-03-18 11:04:20.000000', 0, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `Departamento` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `Usuario`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `Departamento`, `Rol`) VALUES
(1, 'Sistemas', 'SQezH-4aZg-s_bVbXsYa3nRxJ3g8_Ni1', '$2y$13$9y1hX1yHr7ZNUNHbuYL0gejOBiDL0/HPXMz0jdNcSIhTSUGvw1SyO', NULL, 'nerioalvarado_1988@hotmail.com', 10, 1550499516, 1551967614, 'SISTEMAS', 1),
(2, 'Prueba', '1ri0D1zKOi_jTOYfSY1Y-crVYPGG-fvH', '$2y$13$gcLTcytF0m349FrK0wkmdeTUMD.CBHKK0F.uU8Z6TLRs1bPVX/hAu', NULL, 'nerioalvarado@hotmail.com', 10, 1550602215, 1550602215, 'Cuentas por cobrar', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Nro_Ticket`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`Usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `Nro_Ticket` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254724;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
