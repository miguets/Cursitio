-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2024 a las 12:50:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela_en_linea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_materias`
--

CREATE TABLE `calificaciones_materias` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `calfinal` int(11) DEFAULT NULL,
  `calexm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones_materias`
--

INSERT INTO `calificaciones_materias` (`id`, `estudiante_id`, `curso_id`, `calfinal`, `calexm`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 2, 0, 0),
(3, 1, 3, 7, 70),
(4, 1, 4, 7, 90),
(5, 15, 1, 0, 0),
(6, 15, 2, 0, 0),
(7, 15, 3, 0, 0),
(8, 15, 4, 0, 0),
(9, 16, 1, 0, 0),
(10, 16, 2, 0, 0),
(11, 16, 3, 0, 0),
(12, 16, 4, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `num_modulos` int(11) NOT NULL,
  `profesor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `materia`, `num_modulos`, `profesor_id`) VALUES
(1, 'Matemáticas', 3, 2),
(2, 'Español', 3, 3),
(3, 'Iniciación a la Programación', 3, 4),
(4, 'Habilidades de Aprendizaje y Desarrollo Personal', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` text DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `titulo`, `contenido`, `curso_id`) VALUES
(11, 'Matemáticas Básicas', 'Descripción...', 1),
(12, 'Geometría Divertida', 'Descripción...', 1),
(13, 'Problemas de Matemáticas Creativas', 'Descripción...', 1),
(21, 'Lectura y Comprensión de Textos', 'Descripción...', 2),
(22, 'Escritura Creativa y Gramática', 'Descripción...', 2),
(23, 'Oratoria y Expresión Oral', 'Descripción...', 2),
(31, 'Introducción a la Lógica de Programación', 'Descripción...', 3),
(32, 'Creación de Juegos Interactivos', 'Descripción...', 3),
(33, 'Desarrollo de Aplicaciones Simples', 'Descripción...', 3),
(41, 'Técnicas de Estudio Efectivas', 'Descripción...', 4),
(42, 'Creatividad y Resolución de Problemas', 'Descripción...', 4),
(43, 'Desarrollo de Habilidades Sociales', 'Descripción...', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso_estudiante`
--

CREATE TABLE `progreso_estudiante` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `leccion_actual` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `progreso_estudiante`
--

INSERT INTO `progreso_estudiante` (`id`, `estudiante_id`, `curso_id`, `leccion_actual`, `estado`, `calificacion`) VALUES
(1, 1, 1, 11, 1, 10),
(2, 1, 1, 12, 0, 0),
(3, 1, 1, 13, 0, 0),
(4, 1, 2, 21, 1, 10),
(5, 1, 2, 22, 0, 0),
(6, 1, 2, 23, 1, 10),
(7, 1, 3, 31, 1, 10),
(8, 1, 3, 32, 1, 10),
(9, 1, 3, 33, 1, 10),
(10, 1, 4, 41, 1, 10),
(11, 1, 4, 42, 1, 10),
(12, 1, 4, 43, 1, 10),
(13, 15, 1, 11, 0, 0),
(14, 15, 1, 12, 0, 0),
(15, 15, 1, 13, 0, 0),
(16, 15, 2, 21, 0, 0),
(17, 15, 2, 22, 0, 0),
(18, 15, 2, 23, 0, 0),
(19, 15, 3, 31, 0, 0),
(20, 15, 3, 32, 0, 0),
(21, 15, 3, 33, 0, 0),
(22, 15, 4, 41, 0, 0),
(23, 15, 4, 42, 0, 0),
(24, 15, 4, 43, 0, 0),
(25, 16, 1, 11, 0, 0),
(26, 16, 1, 12, 0, 0),
(27, 16, 1, 13, 0, 0),
(28, 16, 2, 21, 0, 0),
(29, 16, 2, 22, 0, 0),
(30, 16, 2, 23, 0, 0),
(31, 16, 3, 31, 0, 0),
(32, 16, 3, 32, 0, 0),
(33, 16, 3, 33, 0, 0),
(34, 16, 4, 41, 0, 0),
(35, 16, 4, 42, 0, 0),
(36, 16, 4, 43, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo_usuario` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nickname`, `nombres`, `apellidos`, `email`, `password`, `tipo_usuario`) VALUES
(1, 'juan', 'Juan', 'Perez', 'juan@gmail.com', 'juan', 1),
(2, 'lang', 'Miguel Angel', 'Rafael Villafuerte', 'miguel@gmail.com', 'lang', 2),
(3, 'itzel', 'itzel', 'Marquez Ruiz', 'itzel@gmail.com', 'itzel', 2),
(4, 'rodrigo', 'Rodrigo', 'Del Carmen', 'rodrigo@gmail.com', 'rodrigo', 2),
(5, 'fabiola', 'Fabiola', 'Perez', 'fabiola@gmail.com', 'fabiola', 2),
(15, 'juan2', 'juan', 'perez', 'juanp@gmail.com', 'juan2', 1),
(16, 'miguel2', 'miguel', 'prueba', 'pruebamiguel@gmail.com', 'miguel2', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_materias`
--
ALTER TABLE `calificaciones_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `progreso_estudiante`
--
ALTER TABLE `progreso_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `leccion_actual` (`leccion_actual`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones_materias`
--
ALTER TABLE `calificaciones_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `progreso_estudiante`
--
ALTER TABLE `progreso_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones_materias`
--
ALTER TABLE `calificaciones_materias`
  ADD CONSTRAINT `calificaciones_materias_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `calificaciones_materias_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`profesor_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `progreso_estudiante`
--
ALTER TABLE `progreso_estudiante`
  ADD CONSTRAINT `progreso_estudiante_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `progreso_estudiante_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `progreso_estudiante_ibfk_3` FOREIGN KEY (`leccion_actual`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
