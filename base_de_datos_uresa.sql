-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2017 a las 10:06:07
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'a'),
(3, 'b'),
(4, 'c'),
(5, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `CUIT` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `razon_social` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `Localidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`CUIT`, `email`, `nombre`, `razon_social`, `telefono`, `Localidad_id`) VALUES
(1, 'empresa@gmail.com', 'empresa s.a', 'rs', 15121212, 1),
(2, 'empresa2@gmail.com', 'empresa2 s.r.l', 'acbc', 1523212, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envase`
--

CREATE TABLE `envase` (
  `id` int(11) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `Material_id` int(11) NOT NULL,
  `Unidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `envase`
--

INSERT INTO `envase` (`id`, `capacidad`, `Material_id`, `Unidad_id`) VALUES
(18, 123, 50, 44),
(19, 433, 51, 45),
(20, 66, 52, 46),
(21, 66, 52, 46),
(22, 123, 53, 47),
(23, 123, 53, 44),
(24, 1324, 54, 45),
(25, 1324, 53, 48),
(26, 5665, 53, 48),
(27, 141, 50, 45),
(28, 34, 52, 45),
(29, 34, 53, 45),
(30, 12, 50, 44),
(31, 122, 54, 45),
(32, 1234, 50, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `id` int(11) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `fecha_carga` date DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `nro_RNE` varchar(45) DEFAULT NULL,
  `vencimiento_RNE` date DEFAULT NULL,
  `nro_factura` int(11) DEFAULT NULL,
  `Empresa_CUIT` int(11) NOT NULL,
  `Localidad_id` int(11) NOT NULL,
  `Categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id`, `direccion`, `fecha_carga`, `nombre`, `telefono`, `nro_RNE`, `vencimiento_RNE`, `nro_factura`, `Empresa_CUIT`, `Localidad_id`, `Categoria_id`) VALUES
(2, 'domicilio1', '2017-11-16', 'establecimiento 1', 155023212, '101', '2017-11-11', 1, 1, 1, 3),
(4, 'dom', '2017-11-16', 'establecimiento 2', 152322122, '100', '2017-11-11', 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento_has_rubro`
--

CREATE TABLE `establecimiento_has_rubro` (
  `Establecimiento_id` int(11) NOT NULL,
  `Rubro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `nombre`, `provincia_id`) VALUES
(1, 'bariloche', 1),
(2, 'el bolson', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombre`) VALUES
(50, 'aa'),
(51, 'aac'),
(52, 'null'),
(53, '544'),
(54, '353');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id`, `nombre`) VALUES
(9, 'aaa'),
(11, 'asdasd'),
(12, 'aaaa'),
(13, 'caca'),
(14, 'agag'),
(15, 'aa'),
(16, 'afa'),
(17, 'ff'),
(18, 'fff'),
(19, 'fazz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_alimenticio`
--

CREATE TABLE `producto_alimenticio` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nro_factura` int(10) UNSIGNED DEFAULT NULL,
  `nro_RNPA` int(10) UNSIGNED DEFAULT NULL,
  `rotulo` longtext,
  `CAA` varchar(45) DEFAULT NULL,
  `contenido` varchar(45) DEFAULT NULL,
  `denominacion` varchar(45) DEFAULT NULL,
  `fecha_duracion` date DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `nombre_comercial` varchar(45) NOT NULL,
  `num_y_tipo_reg_marca` varchar(45) DEFAULT NULL,
  `fecha_carga_solicitud` date DEFAULT NULL,
  `Controles_y_cuidados` varchar(45) DEFAULT NULL,
  `destino_prod` varchar(45) DEFAULT NULL,
  `forma_uso` varchar(45) DEFAULT NULL,
  `info_adicional` varchar(45) DEFAULT NULL,
  `instrucciones_preparacion` varchar(45) DEFAULT NULL,
  `lugar_venta` varchar(45) DEFAULT NULL,
  `modo_conservacion` varchar(45) DEFAULT NULL,
  `periodo_aptitud` varchar(45) DEFAULT NULL,
  `Vencimiento_RNPA` date DEFAULT NULL,
  `Establecimiento_idEstablecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_alimenticio`
--

INSERT INTO `producto_alimenticio` (`id`, `nro_factura`, `nro_RNPA`, `rotulo`, `CAA`, `contenido`, `denominacion`, `fecha_duracion`, `marca`, `nombre_comercial`, `num_y_tipo_reg_marca`, `fecha_carga_solicitud`, `Controles_y_cuidados`, `destino_prod`, `forma_uso`, `info_adicional`, `instrucciones_preparacion`, `lugar_venta`, `modo_conservacion`, `periodo_aptitud`, `Vencimiento_RNPA`, `Establecimiento_idEstablecimiento`) VALUES
(0000000002, 1, 1, 'rotulo', 'caa', 'contenido', 'denominacion', '2017-11-11', 'marca', 'nombre_com', 'num_y_tipo', '2017-11-12', 'control', 'destino', 'form_uso', 'info_ad', 'inst', 'lugar', 'modo', 'periodo', '2022-12-12', 2),
(0000000003, 1, 2, 'rotulo', 'caa', 'contenido', 'denominacion', '2017-11-11', 'marca', 'nombre_com', 'num_y_tipo', '2017-11-12', 'control', 'destino', 'form_uso', 'info_ad', 'inst', 'lugar', 'modo', 'periodo', '2022-12-12', 4),
(0000000004, 1, 3, 'rotulo', 'caa', 'contenido', 'denominacion', '2017-11-11', 'marca', 'nombre_com', 'num_y_tipo', '2017-11-12', 'control', 'destino', 'form_uso', 'info_ad', 'inst', 'lugar', 'modo', 'periodo', '2022-12-12', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_alimenticio_has_envase`
--

CREATE TABLE `producto_alimenticio_has_envase` (
  `Producto_Alimenticio_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Envase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_alimenticio_has_materia_prima`
--

CREATE TABLE `producto_alimenticio_has_materia_prima` (
  `Producto_Alimenticio_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `materia_prima_id` int(11) NOT NULL,
  `cantidad_mat_prima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`) VALUES
(1, 'Rio negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`id`, `nombre`) VALUES
(1, 'Panadería'),
(2, 'Carnes'),
(3, 'Congelados'),
(4, 'Heladería'),
(5, 'Ahumados'),
(6, 'Pescaderia'),
(7, 'Pastelería'),
(8, 'Lacteos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`) VALUES
(44, 'aa'),
(45, 'aac'),
(46, 'null'),
(47, '777'),
(48, '75');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`CUIT`),
  ADD KEY `fk_Empresa_Localidad1_idx` (`Localidad_id`);

--
-- Indices de la tabla `envase`
--
ALTER TABLE `envase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Envase_Material1_idx` (`Material_id`),
  ADD KEY `fk_Envase_Unidad1_idx` (`Unidad_id`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Establecimiento_Empresa1_idx` (`Empresa_CUIT`),
  ADD KEY `fk_Establecimiento_Localidad1_idx` (`Localidad_id`),
  ADD KEY `fk_Establecimiento_Categoria1_idx` (`Categoria_id`);

--
-- Indices de la tabla `establecimiento_has_rubro`
--
ALTER TABLE `establecimiento_has_rubro`
  ADD PRIMARY KEY (`Establecimiento_id`,`Rubro_id`),
  ADD KEY `fk_Establecimiento_has_Rubro_Rubro1_idx` (`Rubro_id`),
  ADD KEY `fk_Establecimiento_has_Rubro_Establecimiento1_idx` (`Establecimiento_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Localidad_provincia1_idx` (`provincia_id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_alimenticio`
--
ALTER TABLE `producto_alimenticio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_Prod_Alimenticio_UNIQUE` (`id`),
  ADD KEY `fk_Producto_Alimenticio_Establecimiento1_idx` (`Establecimiento_idEstablecimiento`);

--
-- Indices de la tabla `producto_alimenticio_has_envase`
--
ALTER TABLE `producto_alimenticio_has_envase`
  ADD PRIMARY KEY (`Producto_Alimenticio_id`,`Envase_id`),
  ADD KEY `fk_Producto_Alimenticio_has_Envase_Envase1_idx` (`Envase_id`),
  ADD KEY `fk_Producto_Alimenticio_has_Envase_Producto_Alimenticio1_idx` (`Producto_Alimenticio_id`);

--
-- Indices de la tabla `producto_alimenticio_has_materia_prima`
--
ALTER TABLE `producto_alimenticio_has_materia_prima`
  ADD PRIMARY KEY (`Producto_Alimenticio_id`,`materia_prima_id`),
  ADD KEY `fk_Producto_Alimenticio_has_materia_prima_materia_prima1_idx` (`materia_prima_id`),
  ADD KEY `fk_Producto_Alimenticio_has_materia_prima_Producto_Alimenti_idx` (`Producto_Alimenticio_id`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `envase`
--
ALTER TABLE `envase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `producto_alimenticio`
--
ALTER TABLE `producto_alimenticio`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_Empresa_Localidad1` FOREIGN KEY (`Localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `envase`
--
ALTER TABLE `envase`
  ADD CONSTRAINT `fk_Envase_Material1` FOREIGN KEY (`Material_id`) REFERENCES `material` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Envase_Unidad1` FOREIGN KEY (`Unidad_id`) REFERENCES `unidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `fk_Establecimiento_Categoria1` FOREIGN KEY (`Categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Establecimiento_Empresa1` FOREIGN KEY (`Empresa_CUIT`) REFERENCES `empresa` (`CUIT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Establecimiento_Localidad1` FOREIGN KEY (`Localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `establecimiento_has_rubro`
--
ALTER TABLE `establecimiento_has_rubro`
  ADD CONSTRAINT `fk_Establecimiento_has_Rubro_Establecimiento1` FOREIGN KEY (`Establecimiento_id`) REFERENCES `establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Establecimiento_has_Rubro_Rubro1` FOREIGN KEY (`Rubro_id`) REFERENCES `rubro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `fk_Localidad_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_alimenticio`
--
ALTER TABLE `producto_alimenticio`
  ADD CONSTRAINT `fk_Producto_Alimenticio_Establecimiento1` FOREIGN KEY (`Establecimiento_idEstablecimiento`) REFERENCES `establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_alimenticio_has_envase`
--
ALTER TABLE `producto_alimenticio_has_envase`
  ADD CONSTRAINT `fk_Producto_Alimenticio_has_Envase_Envase1` FOREIGN KEY (`Envase_id`) REFERENCES `envase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Alimenticio_has_Envase_Producto_Alimenticio1` FOREIGN KEY (`Producto_Alimenticio_id`) REFERENCES `producto_alimenticio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_alimenticio_has_materia_prima`
--
ALTER TABLE `producto_alimenticio_has_materia_prima`
  ADD CONSTRAINT `fk_Producto_Alimenticio_has_materia_prima_Producto_Alimenticio1` FOREIGN KEY (`Producto_Alimenticio_id`) REFERENCES `producto_alimenticio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_Alimenticio_has_materia_prima_materia_prima1` FOREIGN KEY (`materia_prima_id`) REFERENCES `materia_prima` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
