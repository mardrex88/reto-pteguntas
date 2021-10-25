-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 15:01:13
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_preguntas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `nivel`, `puntos`, `created_at`, `updated_at`) VALUES
(1, 'Facil', 1, 10, '2021-10-24 01:08:14', '2021-10-24 01:08:14'),
(2, 'Normal', 2, 20, '2021-10-24 01:08:14', '2021-10-24 01:08:14'),
(3, 'Dificil', 3, 30, '2021-10-24 01:08:14', '2021-10-24 01:08:14'),
(4, 'Experto', 4, 40, '2021-10-24 01:08:14', '2021-10-24 01:08:14'),
(5, 'Leyenda', 5, 50, '2021-10-24 01:08:14', '2021-10-24 01:08:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_jugador` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntaje` int(11) NOT NULL,
  `nivel_alcanzado` int(11) NOT NULL,
  `juego_completado` int(1) NOT NULL,
  `juego_abandonado` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `pregunta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `categoria_id`, `pregunta`, `created_at`, `updated_at`) VALUES
(1, 1, 'De que color es la capa roja de Superman', '2021-10-24 02:11:17', '2021-10-24 02:11:17'),
(2, 1, 'De que color son las mangas del chaleco de Simon Bolivar', '2021-10-24 03:17:29', '2021-10-24 03:17:29'),
(3, 1, 'Cuantos lados tiene un Trangulo', '2021-10-24 03:18:45', '2021-10-24 03:18:45'),
(4, 2, 'Cual es la capital de Venezuela', '2021-10-24 05:01:43', '2021-10-24 05:01:43'),
(5, 1, 'De que color es la Leche', '2021-10-24 10:15:48', '2021-10-24 10:15:48'),
(6, 2, 'Cuanto es 5 x 8', '2021-10-24 11:44:01', '2021-10-24 11:44:01'),
(7, 1, 'Cuanto es 2 x 2', '2021-10-24 11:44:26', '2021-10-24 11:44:26'),
(8, 2, 'Cual es la capital de Antioquia', '2021-10-24 11:45:48', '2021-10-24 11:45:48'),
(9, 2, 'Que sonido hacen los perros', '2021-10-24 11:48:23', '2021-10-24 11:48:23'),
(10, 2, 'cual de los siguientes es un color primario', '2021-10-24 18:55:00', '2021-10-24 18:55:00'),
(11, 4, 'Cuantos jugadores tiene un equipo de futbol', '2021-10-24 18:57:23', '2021-10-24 18:57:23'),
(12, 4, 'Cuantos departamentos tiene Colombia', '2021-10-24 18:58:07', '2021-10-24 18:58:07'),
(13, 4, 'Capital de Inglaterra', '2021-10-24 18:59:12', '2021-10-24 18:59:12'),
(14, 3, 'Dia de la independecia de Colombia', '2021-10-24 19:01:36', '2021-10-24 19:01:36'),
(15, 3, 'Cuantos lados tiene un exagono', '2021-10-24 19:05:45', '2021-10-24 19:05:45'),
(16, 3, 'Cuantas patas tiene un gato', '2021-10-24 19:08:27', '2021-10-24 19:08:27'),
(17, 3, 'Cuál es la capital España', '2021-10-24 19:10:21', '2021-10-24 19:10:21'),
(18, 3, 'Cuál de los siguientes no es mamífero', '2021-10-24 19:13:34', '2021-10-24 19:13:34'),
(19, 4, 'Cuál de los siguientes piases no pertenece al continente europeo', '2021-10-24 19:16:51', '2021-10-24 19:16:51'),
(20, 4, 'La raíz cuadrada de 144 es:', '2021-10-24 19:18:34', '2021-10-24 19:18:34'),
(21, 5, 'En qué continente está ubicado el país Belice', '2021-10-24 19:20:57', '2021-10-24 19:20:57'),
(22, 5, 'Cual de los siguientes pares de palabras son homófonas', '2021-10-24 19:23:26', '2021-10-24 19:23:26'),
(23, 5, 'En qué país están las cataratas del Niagara', '2021-10-24 19:25:55', '2021-10-24 19:25:55'),
(24, 5, 'un polígono regular es aquel', '2021-10-24 19:27:30', '2021-10-24 19:27:30'),
(25, 5, 'quién inventó la bombilla', '2021-10-24 19:30:52', '2021-10-25 10:20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `respuesta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `es_correcta` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta_id`, `respuesta`, `es_correcta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Roja', 1, '2021-10-24 02:11:17', '2021-10-24 02:11:17'),
(2, 1, 'Verde', 0, '2021-10-24 02:11:17', '2021-10-24 02:11:17'),
(3, 1, 'Cafe', 0, '2021-10-24 02:11:17', '2021-10-24 02:11:17'),
(4, 1, 'Azul', 0, '2021-10-24 02:11:17', '2021-10-24 02:11:17'),
(5, 2, 'Un Chaleco no tiene mangas', 1, '2021-10-24 03:17:29', '2021-10-24 03:17:29'),
(6, 2, 'Las Mangas son Rojas', 0, '2021-10-24 03:17:29', '2021-10-24 03:17:29'),
(7, 2, 'Las Mangas Son Azules', 0, '2021-10-24 03:17:29', '2021-10-24 03:17:29'),
(8, 2, 'Las mangas son Doradas', 0, '2021-10-24 03:17:29', '2021-10-24 03:17:29'),
(9, 3, '3', 1, '2021-10-24 03:18:45', '2021-10-24 03:18:45'),
(10, 3, '6', 0, '2021-10-24 03:18:45', '2021-10-24 03:18:45'),
(11, 3, '7', 0, '2021-10-24 03:18:45', '2021-10-24 03:18:45'),
(12, 3, '2', 0, '2021-10-24 03:18:45', '2021-10-24 03:18:45'),
(13, 4, 'Caracas', 1, '2021-10-24 05:01:43', '2021-10-24 19:00:05'),
(14, 4, 'Lima', 0, '2021-10-24 05:01:43', '2021-10-24 05:01:43'),
(15, 4, 'Envigado', 0, '2021-10-24 05:01:43', '2021-10-24 05:35:45'),
(16, 4, 'Madrid', 0, '2021-10-24 05:01:43', '2021-10-24 05:01:43'),
(17, 5, 'Blanco', 1, '2021-10-24 10:15:48', '2021-10-24 10:15:48'),
(18, 5, 'Negro', 0, '2021-10-24 10:15:48', '2021-10-24 10:15:48'),
(19, 5, 'Gris', 0, '2021-10-24 10:15:48', '2021-10-24 10:15:48'),
(20, 5, 'Azul', 0, '2021-10-24 10:15:48', '2021-10-24 10:15:48'),
(21, 6, '40', 1, '2021-10-24 11:44:01', '2021-10-24 11:44:01'),
(22, 6, '25', 0, '2021-10-24 11:44:01', '2021-10-24 11:44:01'),
(23, 6, '16', 0, '2021-10-24 11:44:01', '2021-10-24 11:44:01'),
(24, 6, '64', 0, '2021-10-24 11:44:01', '2021-10-24 11:44:01'),
(25, 7, '4', 1, '2021-10-24 11:44:26', '2021-10-24 11:44:26'),
(26, 7, '16', 0, '2021-10-24 11:44:26', '2021-10-24 11:44:26'),
(27, 7, '22', 0, '2021-10-24 11:44:26', '2021-10-24 11:44:26'),
(28, 7, '1', 0, '2021-10-24 11:44:26', '2021-10-24 11:44:26'),
(29, 8, 'Medellin', 1, '2021-10-24 11:45:48', '2021-10-24 11:45:48'),
(30, 8, 'Santuario', 0, '2021-10-24 11:45:48', '2021-10-24 11:45:48'),
(31, 8, 'Bogota', 0, '2021-10-24 11:45:48', '2021-10-24 11:45:48'),
(32, 8, 'Manizales', 0, '2021-10-24 11:45:48', '2021-10-24 11:45:48'),
(33, 9, 'ladran', 1, '2021-10-24 11:48:23', '2021-10-24 11:48:23'),
(34, 9, 'maullan', 0, '2021-10-24 11:48:23', '2021-10-24 11:48:23'),
(35, 9, 'silvan', 0, '2021-10-24 11:48:23', '2021-10-24 11:48:23'),
(36, 9, 'hablan', 0, '2021-10-24 11:48:23', '2021-10-24 11:48:23'),
(37, 10, 'Azul', 1, '2021-10-24 18:55:00', '2021-10-24 18:55:00'),
(38, 10, 'Negro', 0, '2021-10-24 18:55:00', '2021-10-24 18:55:00'),
(39, 10, 'Verde', 0, '2021-10-24 18:55:00', '2021-10-24 18:55:00'),
(40, 10, 'Blanco', 0, '2021-10-24 18:55:00', '2021-10-24 18:55:00'),
(41, 11, '11', 1, '2021-10-24 18:57:23', '2021-10-24 18:57:23'),
(42, 11, '8', 0, '2021-10-24 18:57:23', '2021-10-24 18:57:23'),
(43, 11, '12', 0, '2021-10-24 18:57:23', '2021-10-24 18:57:23'),
(44, 11, '5', 0, '2021-10-24 18:57:23', '2021-10-24 18:57:23'),
(45, 12, '32', 1, '2021-10-24 18:58:07', '2021-10-24 18:58:07'),
(46, 12, '16', 0, '2021-10-24 18:58:07', '2021-10-24 18:58:07'),
(47, 12, '25', 0, '2021-10-24 18:58:07', '2021-10-24 18:58:07'),
(48, 12, '84', 0, '2021-10-24 18:58:07', '2021-10-24 18:58:07'),
(49, 13, 'Londres', 1, '2021-10-24 18:59:12', '2021-10-24 18:59:12'),
(50, 13, 'Tokio', 0, '2021-10-24 18:59:12', '2021-10-24 18:59:12'),
(51, 13, 'Boston', 0, '2021-10-24 18:59:12', '2021-10-24 18:59:12'),
(52, 13, 'Toronto', 0, '2021-10-24 18:59:12', '2021-10-24 18:59:12'),
(53, 14, '20 Julio', 1, '2021-10-24 19:01:36', '2021-10-24 19:01:36'),
(54, 14, '2 Agosto', 0, '2021-10-24 19:01:36', '2021-10-24 19:01:36'),
(55, 14, '7 septiembre', 0, '2021-10-24 19:01:36', '2021-10-24 19:01:36'),
(56, 14, '3 Octubre', 0, '2021-10-24 19:01:36', '2021-10-24 19:01:36'),
(57, 15, '6', 1, '2021-10-24 19:05:45', '2021-10-24 19:05:45'),
(58, 15, '5', 0, '2021-10-24 19:05:45', '2021-10-24 19:05:45'),
(59, 15, '1', 0, '2021-10-24 19:05:45', '2021-10-24 19:05:45'),
(60, 15, '3', 0, '2021-10-24 19:05:45', '2021-10-24 19:05:45'),
(61, 16, '4', 1, '2021-10-24 19:08:27', '2021-10-24 19:08:27'),
(62, 16, '6', 0, '2021-10-24 19:08:27', '2021-10-24 19:08:27'),
(63, 16, '3', 0, '2021-10-24 19:08:28', '2021-10-24 19:08:28'),
(64, 16, '2', 0, '2021-10-24 19:08:28', '2021-10-24 19:08:28'),
(65, 17, 'Madrid', 1, '2021-10-24 19:10:21', '2021-10-24 19:10:21'),
(66, 17, 'Barcelona', 0, '2021-10-24 19:10:21', '2021-10-24 19:10:21'),
(67, 17, 'París', 0, '2021-10-24 19:10:21', '2021-10-24 19:10:21'),
(68, 17, 'Valencia', 0, '2021-10-24 19:10:21', '2021-10-24 19:10:21'),
(69, 18, 'Lagartija', 1, '2021-10-24 19:13:34', '2021-10-24 19:13:49'),
(70, 18, 'Vaca', 0, '2021-10-24 19:13:34', '2021-10-24 19:13:34'),
(71, 18, 'perro', 0, '2021-10-24 19:13:34', '2021-10-24 19:13:34'),
(72, 18, 'Gato', 0, '2021-10-24 19:13:34', '2021-10-24 19:13:34'),
(73, 19, 'Japón', 1, '2021-10-24 19:16:51', '2021-10-24 19:19:06'),
(74, 19, 'Holanda', 0, '2021-10-24 19:16:51', '2021-10-24 19:16:51'),
(75, 19, 'Francia', 0, '2021-10-24 19:16:51', '2021-10-24 19:16:51'),
(76, 19, 'Inglaterra', 0, '2021-10-24 19:16:51', '2021-10-24 19:16:51'),
(77, 20, '12', 1, '2021-10-24 19:18:34', '2021-10-24 19:18:34'),
(78, 20, '14', 0, '2021-10-24 19:18:34', '2021-10-24 19:18:34'),
(79, 20, '10', 0, '2021-10-24 19:18:34', '2021-10-24 19:18:34'),
(80, 20, '16', 0, '2021-10-24 19:18:34', '2021-10-24 19:18:34'),
(81, 21, 'América', 1, '2021-10-24 19:20:57', '2021-10-24 19:20:57'),
(82, 21, 'Europa', 0, '2021-10-24 19:20:57', '2021-10-24 19:20:57'),
(83, 21, 'Asia', 0, '2021-10-24 19:20:57', '2021-10-24 19:20:57'),
(84, 21, 'África', 0, '2021-10-24 19:20:57', '2021-10-24 19:20:57'),
(85, 22, 'Ahí-Hay', 1, '2021-10-24 19:23:26', '2021-10-24 19:23:26'),
(86, 22, 'Lindo-Feo', 0, '2021-10-24 19:23:26', '2021-10-24 19:23:26'),
(87, 22, 'Feliz-Contento', 0, '2021-10-24 19:23:26', '2021-10-24 19:23:26'),
(88, 22, 'Agua - Rio', 0, '2021-10-24 19:23:26', '2021-10-24 19:23:26'),
(89, 23, 'Canadá', 1, '2021-10-24 19:25:55', '2021-10-24 19:25:55'),
(90, 23, 'Francia', 0, '2021-10-24 19:25:55', '2021-10-24 19:25:55'),
(91, 23, 'Brasil', 0, '2021-10-24 19:25:55', '2021-10-24 19:25:55'),
(92, 23, 'Argentina', 0, '2021-10-24 19:25:55', '2021-10-24 19:25:55'),
(93, 24, 'que tiene todos sus lados iguales', 1, '2021-10-24 19:27:30', '2021-10-24 19:27:38'),
(94, 24, 'que tiene todos sus lados desiguales', 0, '2021-10-24 19:27:30', '2021-10-24 19:27:30'),
(95, 24, 'que su perímetro es la suma sus lados', 0, '2021-10-24 19:27:30', '2021-10-24 19:27:30'),
(96, 24, 'que su área es la suma de sus lados', 0, '2021-10-24 19:27:30', '2021-10-24 19:27:30'),
(97, 25, 'Thomás Alba Edison', 1, '2021-10-24 19:30:52', '2021-10-25 10:20:45'),
(98, 25, 'Isaac Newton', 0, '2021-10-24 19:30:52', '2021-10-24 19:30:52'),
(99, 25, 'Nicola Tesla', 0, '2021-10-24 19:30:52', '2021-10-24 19:30:52'),
(100, 25, 'Neil Amstrong', 0, '2021-10-24 19:30:52', '2021-10-24 19:30:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
