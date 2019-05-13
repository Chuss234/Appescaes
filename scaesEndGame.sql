-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-05-2019 a las 18:57:40
-- Versión del servidor: 10.1.29-MariaDB-6+b1
-- Versión de PHP: 7.2.4-1+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scaesDBF`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoralog`
--

CREATE TABLE `bitacoralog` (
  `id_log` int(11) NOT NULL,
  `id_usr` int(20) NOT NULL,
  `usuario` char(30) NOT NULL,
  `accion` char(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `contacto` varchar(25) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `tipo_cliente` int(11) NOT NULL,
  `nombres` char(20) NOT NULL,
  `apellidos` char(20) NOT NULL,
  `dui` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `contacto`, `correo`, `telefono`, `direccion`, `nit`, `tipo_cliente`, `nombres`, `apellidos`, `dui`) VALUES
(1, 'La Mielita sv', 'mielita@outlook.com', 22217809, 'Metapan', '25071995', 1, '', '', ''),
(2, '', 'Jvaldez21@gmail.com', 22347790, 'Santa ana', '46883992', 2, 'juan', 'Valdez', '123456783'),
(6, 'HoneyDream', 'HoDm@hotmail.com', 22217833, 'La unión', '25071443', 1, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_comp` int(11) NOT NULL,
  `usuario` char(25) NOT NULL,
  `proveedor` varchar(25) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_compras`
--

CREATE TABLE `det_compras` (
  `id_det_compra` int(11) NOT NULL,
  `Id_compra` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `producto` char(30) NOT NULL,
  `unidades` int(11) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE `det_venta` (
  `id_det_vent` int(11) NOT NULL,
  `id_vent` int(11) NOT NULL,
  `id_inv` int(11) NOT NULL,
  `producto` char(30) NOT NULL,
  `precio` double NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inv` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_muestra` int(11) NOT NULL,
  `humedad` double NOT NULL,
  `color` varchar(30) NOT NULL,
  `peso_neto` double NOT NULL,
  `apiario` varchar(50) NOT NULL,
  `existencia` int(11) NOT NULL,
  `fecha_extraccion` date NOT NULL,
  `lote` int(11) NOT NULL,
  `estado` char(20) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `fecha_entrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inv`, `id_prod`, `id_muestra`, `humedad`, `color`, `peso_neto`, `apiario`, `existencia`, `fecha_extraccion`, `lote`, `estado`, `fecha_vencimiento`, `fecha_entrada`) VALUES
(1, 1, 2, 0.3, 'amarillo claro', 195, 'San Miguel', 100, '2019-04-02', 1, 'Aceptado', '2020-12-31', '2019-03-14'),
(2, 2, 1, 0.5, 'amarillo', 70, 'Metapan', 40, '2019-05-04', 1, 'Aceptado', '2020-04-30', '2019-05-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE `muestras` (
  `id_muestra` int(10) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `detalle_muestra` varchar(20) NOT NULL,
  `estado` char(20) NOT NULL,
  `fecha_muestra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `muestras`
--

INSERT INTO `muestras` (`id_muestra`, `id_prod`, `detalle_muestra`, `estado`, `fecha_muestra`) VALUES
(1, 2, 'Muestra producto 2', 'Espera', '2019-05-05'),
(2, 1, 'Muestra producto 1', 'Aceptado', '2019-05-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio_usr`
--

CREATE TABLE `privilegio_usr` (
  `id_priv` int(10) NOT NULL,
  `tipo_priv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privilegio_usr`
--

INSERT INTO `privilegio_usr` (`id_priv`, `tipo_priv`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `n_serie` int(11) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `presentacion` varchar(30) NOT NULL,
  `precio_venta` double NOT NULL,
  `det_prod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `n_serie`, `producto`, `presentacion`, `precio_venta`, `det_prod`) VALUES
(1, 2350, 'Miel ', 'Barril', 50, 'Miel de abeja procesada'),
(2, 2347, 'Polen', 'Botella', 17, 'Polen para mezcla'),
(6, 123467, 'cera', 'frasco', 12, 'cera ok'),
(8, 33456, 'Propolio', 'empaque med', 10, 'sin detalle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `proveedor` varchar(40) NOT NULL,
  `telefono` int(12) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `proveedor`, `telefono`, `direccion`, `email`) VALUES
(1, 'Pablo escobar ', 22217809, 'Indefinida', 'pabloesco@hotmail.com'),
(2, 'Leonardo Valencia', 23980743, 'El salvador,santa ana', 'Lvcia@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL,
  `tipo_cliente` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id_tipo_cliente`, `tipo_cliente`) VALUES
(1, 'Empresa'),
(2, 'Persona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_venta`
--

CREATE TABLE `tipo_venta` (
  `id_inex` int(11) NOT NULL,
  `tipo_venta` varchar(20) NOT NULL COMMENT 'si es importada o exportada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_venta`
--

INSERT INTO `tipo_venta` (`id_inex`, `tipo_venta`) VALUES
(1, 'Importacion'),
(2, 'Exportacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL,
  `id_priv` int(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dui` varchar(30) DEFAULT NULL,
  `nit` varchar(30) DEFAULT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `id_priv`, `usuario`, `nombres`, `apellidos`, `dui`, `nit`, `password`) VALUES
(1, 1, 'user1', 'Geovanny', 'Valencia', '092822125', '25071995', 'a012869311d64a44b5a0d567cd20de04'),
(2, 2, 'KevinRZ', 'Kevin', 'Rodas', '23456', '000000000001', 'a012869311d64a44b5a0d567cd20de04'),
(3, 1, 'GeovannyX21', 'Geovanny', 'Valencia', '234569002', '345673332', 'a012869311d64a44b5a0d567cd20de04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_vent` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_inex` int(11) NOT NULL,
  `cliente` char(30) NOT NULL,
  `usuario` char(30) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacoralog`
--
ALTER TABLE `bitacoralog`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `tipo_cliente` (`tipo_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_prov` (`proveedor`),
  ADD KEY `id_usr` (`usuario`);

--
-- Indices de la tabla `det_compras`
--
ALTER TABLE `det_compras`
  ADD PRIMARY KEY (`id_det_compra`),
  ADD KEY `Id_compra` (`Id_compra`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD PRIMARY KEY (`id_det_vent`),
  ADD KEY `id_vent` (`id_vent`),
  ADD KEY `id_prod` (`id_inv`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_muestra` (`id_muestra`);

--
-- Indices de la tabla `muestras`
--
ALTER TABLE `muestras`
  ADD PRIMARY KEY (`id_muestra`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `privilegio_usr`
--
ALTER TABLE `privilegio_usr`
  ADD PRIMARY KEY (`id_priv`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id_tipo_cliente`);

--
-- Indices de la tabla `tipo_venta`
--
ALTER TABLE `tipo_venta`
  ADD PRIMARY KEY (`id_inex`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`),
  ADD KEY `id_priv` (`id_priv`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_vent`),
  ADD KEY `id_inex` (`id_inex`),
  ADD KEY `id_cliente_empersa` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacoralog`
--
ALTER TABLE `bitacoralog`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `det_compras`
--
ALTER TABLE `det_compras`
  MODIFY `id_det_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  MODIFY `id_det_vent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `muestras`
--
ALTER TABLE `muestras`
  MODIFY `id_muestra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `privilegio_usr`
--
ALTER TABLE `privilegio_usr`
  MODIFY `id_priv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_vent` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacoralog`
--
ALTER TABLE `bitacoralog`
  ADD CONSTRAINT `bitacoralog_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_usr`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id_tipo_cliente`);

--
-- Filtros para la tabla `det_compras`
--
ALTER TABLE `det_compras`
  ADD CONSTRAINT `det_compras_ibfk_1` FOREIGN KEY (`Id_compra`) REFERENCES `compra` (`id_comp`),
  ADD CONSTRAINT `det_compras_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`id_vent`) REFERENCES `ventas` (`id_vent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `inventario` (`id_inv`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_muestra`) REFERENCES `muestras` (`id_muestra`),
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `muestras`
--
ALTER TABLE `muestras`
  ADD CONSTRAINT `muestras_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_priv`) REFERENCES `privilegio_usr` (`id_priv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`id_inex`) REFERENCES `tipo_venta` (`id_inex`),
  ADD CONSTRAINT `ventas_ibfk_6` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
