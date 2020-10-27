-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2017 a las 15:02:16
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `talonario-digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `dato` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `dato`, `descripcion`) VALUES
(1, 'numeroFactura', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `ingrediente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `hora` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `ingrediente` text COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `id_producto`, `ingrediente`, `precio`) VALUES
(1, 1, 'RES', 12000),
(3, 1, 'RES', 14000),
(4, 1, 'RES', 16000),
(5, 1, 'CERDO', 8000),
(6, 1, 'CERDO', 10000),
(7, 1, 'CERDO', 12000),
(8, 1, 'CERDO', 14000),
(9, 1, 'CERDO', 16000),
(10, 2, 'MIXTO', 3000),
(11, 2, 'CERDO', 3000),
(12, 2, 'CHORIQUESO', 4000),
(13, 1, 'MIXTA', 16000),
(14, 3, 'SOLA', 400),
(15, 3, 'SOLO QUESO', 1300),
(16, 3, 'DOBLE QUESO', 2600),
(17, 3, 'TRIPLE QUESO', 3800),
(18, 3, 'MORTADELA Y QUESO', 2800),
(19, 3, 'JAMON Y QUESO', 2800),
(20, 3, 'CON TODO', 4500),
(21, 3, 'AREPA BURGUER', 4500),
(22, 3, 'CON MANTEQUILLA', 600),
(23, 3, 'POLLO', 2800),
(24, 3, 'CARNE MOLIDA', 2800),
(25, 3, 'CHICHARRON', 2800),
(26, 3, 'HAWAIANA', 2800),
(27, 3, '2 INGREDIENTES', 3200),
(28, 3, '3 INGREDIENTES', 3700),
(29, 3, '4 INGREDIENTES', 4500),
(30, 4, 'SENCILLO', 1700),
(31, 4, 'ESPECIAL', 2500),
(32, 4, 'TRIPLE QUESO', 5000),
(33, 4, 'ESPECIAL CON POLLO', 4500),
(34, 4, 'ESPECIAL CO CARNE', 4500),
(35, 4, 'ESPECIAL CON CHICHARRON', 4500),
(37, 8, 'PAPA PEQUENA', 300),
(38, 8, 'PAPA MEDIANA', 400),
(39, 8, 'PAPA GRANDE', 500),
(40, 10, 'CPCQ', 1600),
(41, 10, 'PJQ', 1800),
(42, 11, 'GASEOSA 350', 1500),
(43, 11, 'GASEOSA 1.5L', 3500),
(44, 11, 'GASEOSA 3L', 6000),
(45, 11, 'DEL VALLE 1.5L', 3500),
(46, 11, 'HIT 350', 1500),
(47, 11, 'HIT 500ML', 2500),
(48, 11, 'CERVEZA', 2500),
(49, 11, 'H2O', 2500),
(50, 11, 'BOTELLA AGUA', 2000),
(51, 11, 'Mr TEA', 2500),
(52, 11, 'PONY MALTA 1L', 3000),
(53, 11, 'PONY MALTA 350ML', 1500),
(54, 12, 'CHICHARRON', 2000),
(55, 12, 'POLLO DESMECHADO', 2000),
(56, 12, 'CARNE MOLIDA', 2000),
(57, 12, 'CARNE BURGUER', 2500),
(58, 12, 'JAMON', 1000),
(59, 12, 'MORTADELA', 1000),
(60, 12, 'PAPA COCIDA', 500),
(61, 12, 'TOMATE', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoencurso`
--

CREATE TABLE `pedidoencurso` (
  `id` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `ingrediente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidopendiente`
--

CREATE TABLE `pedidopendiente` (
  `id` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `ingrediente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `ingredientes` int(11) NOT NULL,
  `cocina` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `ingredientes`, `cocina`, `precio`) VALUES
(1, 'CARNE ASADA', 1, 1, 0),
(2, 'CHORIZO', 1, 0, 0),
(3, 'AREPA', 1, 1, 0),
(4, 'ABORRAJADO', 1, 1, 0),
(5, 'ALA RELLENA', 0, 0, 3500),
(6, 'CARIMANOLA', 0, 0, 1700),
(7, 'EMPANADA', 0, 0, 600),
(8, 'PAPA ABORRAJADA', 1, 0, 0),
(9, 'PASTEL DE POLLO', 0, 0, 1600),
(10, 'MARRANITA', 1, 0, 0),
(11, 'BEBIDAS', 1, 0, 0),
(12, 'ADICIONAL', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'mesero', 'mesero', 2),
(2, 'caja', 'caja', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidoencurso`
--
ALTER TABLE `pedidoencurso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidopendiente`
--
ALTER TABLE `pedidopendiente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `pedidoencurso`
--
ALTER TABLE `pedidoencurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidopendiente`
--
ALTER TABLE `pedidopendiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
