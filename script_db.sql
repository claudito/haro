-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-08-2019 a las 18:24:01
-- Versión del servidor: 5.7.27-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-8+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_haro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_documentos`
--

CREATE TABLE `aprobacion_documentos` (
  `id` int(11) NOT NULL,
  `tipo` enum('RQ','RS','OC','OS') NOT NULL,
  `nro_documento` int(11) NOT NULL,
  `firma` enum('1','2','3','4') NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `fecha_update` datetime NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aprobacion_documentos`
--

INSERT INTO `aprobacion_documentos` (`id`, `tipo`, `nro_documento`, `firma`, `estado`, `id_usuario`, `fecha_update`, `fecha_creacion`) VALUES
(1, 'RQ', 1, '1', 1, 1, '2019-02-25 23:19:29', '2019-02-26 04:16:43'),
(2, 'RQ', 1, '2', 0, 0, '2019-02-25 23:19:29', '2019-02-26 04:16:43'),
(3, 'RQ', 1, '3', 0, 0, '2019-02-25 23:19:29', '2019-02-26 04:16:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_documentos_plantilla`
--

CREATE TABLE `aprobacion_documentos_plantilla` (
  `id` int(11) NOT NULL,
  `tipo` enum('RQ','RS','OC','OS') NOT NULL,
  `firma` enum('1','2','3','4') NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aprobacion_documentos_plantilla`
--

INSERT INTO `aprobacion_documentos_plantilla` (`id`, `tipo`, `firma`, `descripcion`, `fecha_creacion`) VALUES
(1, 'RQ', '1', '', '2019-02-26 04:16:00'),
(2, 'RQ', '2', '', '2019-02-26 04:16:00'),
(3, 'RQ', '3', '', '2019-02-26 04:16:00'),
(4, 'OC', '1', '', '2019-02-26 04:16:00'),
(5, 'OC', '2', '', '2019-02-26 04:16:00'),
(6, 'OC', '3', '', '2019-02-26 04:16:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, '01', 'SISTEMAS', '2017-08-23 16:04:36'),
(4, '04', 'VENTAS', '2017-08-23 16:05:20'),
(7, '03', 'CONTABILIDAD', '2018-01-05 18:06:48'),
(8, '02', 'ALMACÉN', '2018-01-05 18:07:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `codigo2` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `descripcion2` varchar(200) NOT NULL,
  `ficha` text NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `estado` enum('1','2') NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `codigo`, `codigo2`, `descripcion`, `descripcion2`, `ficha`, `id_familia`, `id_unidad`, `id_tipo`, `estado`, `fecha_creacion`) VALUES
(1, '101-04535', '101-04535', 'TORNILLO POLIAXIAL 4.5X35MM DENELI K2M', 'TORNILLO POLIAXIAL 4.5X35MM DENELI K2M', 'XXXX', 2, 1, 1, '1', '2019-02-26 03:26:27'),
(2, '375627000', '375627000', 'HOJA DE SHAVER MINI 2.5MM FULL RADIUS', 'HOJA DE SHAVER MINI 2.5MM FULL RADIUS', 'HHHHH', 2, 1, 1, '1', '2019-02-26 03:27:05'),
(3, '1002052', '1002052', 'ACCESORIO PARA MANGUERA DE CONEXIÓN', 'ACCESORIO PARA MANGUERA DE CONEXIÓN', 'NNNN', 2, 1, 1, '1', '2019-02-26 03:27:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_file`
--

CREATE TABLE `articulo_file` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo_file`
--

INSERT INTO `articulo_file` (`id`, `nombre`, `ruta`, `id_articulo`) VALUES
(1, 'FOTO DE ARTICULO', '40155bd2aaaff7221ff1d54d0f04a60e.png', 7),
(4, '200', 'd89621f3ed69a37f1ba30a17f3f1e49a.png', 1),
(5, '300', '50c301ce2c8bb1217a098c01ee73525b.txt', 1),
(6, 'IMAGEN', '4479c7f5151a0e136f13ada6cea5133b.xls', 1),
(7, 'IMG', 'fc8aee32dcf75f18cd716dc9f9df9f52.png', 10),
(8, 'MORI', '9cacec8ce96c31798040276f32e11054.png', 1),
(9, 'IMG', 'd4a8a01ae0a96b2e8aebe297c4f9d223.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_tipo`
--

CREATE TABLE `articulo_tipo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo_tipo`
--

INSERT INTO `articulo_tipo` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'N', 'ARTÍCULOS CON MOVIMIENTOS', '2017-08-23 15:52:36'),
(2, 'S', 'ARTÍCULOS DE TIPO SERVICIO', '2017-08-23 15:52:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_ubicacion`
--

CREATE TABLE `articulo_ubicacion` (
  `id` int(11) NOT NULL,
  `codigo_articulo` varchar(20) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo_ubicacion`
--

INSERT INTO `articulo_ubicacion` (`id`, `codigo_articulo`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, '140600163-114', 'B5', 'B', '2017-11-08 23:37:21'),
(2, '0513100-45', 'A9', 'ASSSS', '2017-11-08 23:50:30'),
(3, '0513100-50', 'A12', 'AS', '2018-01-05 18:40:00'),
(4, '0513100-45', 'SDF', 'DKDKF', '2018-01-12 19:51:57'),
(5, '0513100-45', 'TUSSSS', 'EJEMPLO', '2018-01-12 19:52:31'),
(6, '231', '3', '--', '2018-06-06 22:31:32'),
(7, '333', '--', 'KK', '2018-06-06 22:31:45'),
(8, '231', '--', '--', '2018-06-12 23:22:29'),
(9, '12062018', 'A1', 'A1', '2018-06-12 23:37:17'),
(10, '101-04535', 'A1', '-', '2019-02-26 03:33:35'),
(11, '375627000', 'B', '-', '2019-02-26 03:33:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizante`
--

CREATE TABLE `autorizante` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autorizante`
--

INSERT INTO `autorizante` (`id`, `nombres`, `apellidos`, `fecha_creacion`) VALUES
(1, 'MIGUEL ANGEL', 'PEREZ TORRES', '2017-11-18 18:45:04'),
(2, 'CARLOS', 'RODRIGUEZ VERA', '2017-11-18 18:45:04'),
(3, 'CECILIA', 'GALLARDO TAPIA', '2017-11-20 15:09:04'),
(4, 'SERGIO', 'IBAÑEZ TORRES', '2017-11-20 15:09:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costo`
--

CREATE TABLE `centro_costo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centro_costo`
--

INSERT INTO `centro_costo` (`id`, `codigo`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(1, '000001', 'ACCESORIOS DE PERFORACIÓN', 1, '2017-08-23 16:06:12'),
(2, '000002', 'MAQUINARIA', 1, '2017-08-23 16:06:20'),
(3, '000003', 'SERVICIOS', 1, '2017-08-23 16:06:27'),
(4, '000004', 'ENTRENAMIENTO', 1, '2017-08-23 16:06:36'),
(5, '000005', 'COSTOS Y PLANEAMIENTO', 1, '2017-08-23 16:06:44'),
(6, '000006', 'INGENIERÍA', 1, '2017-08-23 16:07:08'),
(9, '000007', 'COMPRAS', 1, '2018-01-05 18:08:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion1` varchar(200) NOT NULL,
  `direccion2` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `codigo`, `contacto`, `razon_social`, `ruc`, `dni`, `direccion1`, `direccion2`, `telefono`, `correo`, `fecha_creacion`) VALUES
(1, '001', 'GENARO ZEA', 'PEUSAC S.A.', '20114663616', '46636118', 'CALLE LAS ORQUÍDEAS', 'SAN JUAN DE LURIGANCHO', '943502140', 'JOSE@PERUTEC.COM.PE', '2017-08-23 17:25:51'),
(2, '002', 'JOEL FLORES', 'FLORES S.A.C.', '20074567997', '87654321', 'LOS JAZMINES', 'SAN JUAN DE LURIGANCHO', '123-4567', 'FLORESSAC@GMAIL.COM', '2017-08-24 20:50:27'),
(3, '003', 'JOSE ADRIAN', 'ADRIAN YUPANQUI JOSE CARLOS', '10451197351', '45119735', 'SAN JUAN DE LURIGANCHO', 'SAN ISIDRO', '991564111', 'JOSE.ADRIAN@GMAIL.COM', '2017-10-30 18:30:27'),
(4, '004', 'OMAR', 'KOURTNY', '645454543', '86343363', 'LIMA', 'CERCADO', '6343567', 'AZRAEL@GMAIL', '2018-01-11 17:17:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comovc`
--

CREATE TABLE `comovc` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `requerimiento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `centro_costo` varchar(200) NOT NULL,
  `ot` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` enum('OC','OS') NOT NULL,
  `estado` enum('00','01','02','03','04','05') DEFAULT NULL,
  `prioridad` enum('1','2','3') NOT NULL,
  `cotizacion` varchar(100) NOT NULL,
  `condiciones_pago` varchar(100) NOT NULL,
  `lugar_entrega` varchar(300) NOT NULL,
  `modo_entrega` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comovd`
--

CREATE TABLE `comovd` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `numero_rq` int(11) NOT NULL,
  `id_requerimiento` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `saldo` decimal(15,6) NOT NULL,
  `precio` decimal(15,6) NOT NULL,
  `estado` enum('00','01','02','03','04','05') NOT NULL DEFAULT '00',
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(100) NOT NULL,
  `tipo` enum('OC','OS') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_ot`
--

CREATE TABLE `control_ot` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `kilometraje` decimal(15,6) NOT NULL,
  `horometro` decimal(15,6) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('inicio','fin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_ot`
--

INSERT INTO `control_ot` (`id`, `numero`, `kilometraje`, `horometro`, `fecha`, `tipo`) VALUES
(3, 1, '42.000000', '23.000000', '2018-04-13', 'inicio'),
(5, 1, '12.000000', '33.000000', '2018-04-20', 'fin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contro_ot`
--

CREATE TABLE `contro_ot` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `km_inicio` decimal(15,6) NOT NULL,
  `km_fin` decimal(15,6) NOT NULL,
  `h_inicio` time NOT NULL,
  `h_fin` time NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `codigo`, `descripcion`, `numero`, `fecha_creacion`) VALUES
(1, 'RQ', 'REQUERIMIENTO DE COMPRA', 1, '2017-08-23 16:07:54'),
(2, 'RS', 'REQUERIMIENTO DE SERVICIO', 0, '2017-08-23 16:08:10'),
(3, 'OC', 'ORDEN DE COMPRA', 0, '2017-08-23 16:08:21'),
(4, 'OS', 'ORDEN  DE SERVICIO', 0, '2017-08-23 16:08:35'),
(6, 'NS', 'NOTAS DE SALIDA', 0, '2017-08-23 16:35:12'),
(7, 'GS', 'GUÍA DE SALIDA', 0, '2017-08-23 16:35:23'),
(8, 'NI', 'NOTA DE INGRESO', 0, '2018-01-30 21:17:35'),
(9, 'OT', 'ORDEN TRABAJO', 0, '2018-02-26 17:43:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'SERV', 'SERVICIOS', '2017-08-23 15:57:17'),
(2, 'IN', 'INSUMOS', '2017-08-23 15:57:25'),
(3, 'EQUIINFO', 'EQUIPOS DE INFORMATICA', '2017-10-30 18:24:15'),
(4, '02', 'INSTRUMENTAL', '2019-02-26 03:25:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `contrato_factura` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `descripcion_abrv` varchar(200) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`id`, `codigo`, `fecha_adquisicion`, `fecha_inicio`, `fecha_termino`, `cantidad`, `contrato_factura`, `descripcion`, `descripcion_abrv`, `modelo`, `serie`, `marca`, `estado`, `fecha_creacion`) VALUES
(1, '001', '2017-08-01', '2017-08-08', '2017-08-31', 3, 'F-01', 'MAQUINARIA PESADA', 'MP', 'M-01', 'K310', 'CAT', 'ACTIVO', '2017-08-25 17:02:21'),
(2, '002', '2017-11-01', '2017-11-03', '2017-11-20', 3, '0002', 'PERFORADORA', 'PERF', 'S300', '143-1', 'UNICRON', 'ACTIVO', '2017-11-20 14:56:21'),
(4, '003', '2017-01-01', '2017-02-01', '2017-03-01', 1, '001-1234', '1', '1', '1', '00124541', '1244', 'ACTIVO', '2018-01-05 18:39:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_utilizados`
--

CREATE TABLE `materiales_utilizados` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `requerida` decimal(15,6) NOT NULL,
  `utilizada` decimal(15,6) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales_utilizados`
--

INSERT INTO `materiales_utilizados` (`id`, `numero`, `codigo`, `descripcion`, `requerida`, `utilizada`, `unidad_medida`, `fecha_creacion`) VALUES
(20, 1, 'YTY', 'EJEMPLO', '12.000000', '22.000000', 'GL', '2018-04-13 00:46:34'),
(21, 1, '231', '---', '2.000000', '232.000000', 'PC', '2018-04-13 01:02:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_ut`
--

CREATE TABLE `mat_ut` (
  `id` int(11) NOT NULL,
  `codigo_maquina` varchar(20) NOT NULL,
  `codigo_articulo` varchar(20) NOT NULL,
  `descripcion_articulo` varchar(200) NOT NULL,
  `c_requerida` int(11) NOT NULL,
  `c_utilizada` int(11) NOT NULL,
  `codigo_unidad` varchar(20) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mat_ut`
--

INSERT INTO `mat_ut` (`id`, `codigo_maquina`, `codigo_articulo`, `descripcion_articulo`, `c_requerida`, `c_utilizada`, `codigo_unidad`, `fecha_creacion`) VALUES
(1, '3333', '23', 'prueba', 12, 2, 'ed', '2018-02-08 16:20:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `item` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `descripcion`, `item`) VALUES
(1, 'BASE DE DATOS', 1),
(2, 'TABLAS DE AYUDA', 2),
(3, 'GESTIÓN DE COMPRAS', 3),
(4, 'ADMINISTRADOR', 7),
(5, 'ANALÍTICAS', 6),
(6, 'INVENTARIOS', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movalmcab`
--

CREATE TABLE `movalmcab` (
  `id` int(11) NOT NULL,
  `alm` varchar(3) NOT NULL,
  `numero` int(11) NOT NULL,
  `tran` varchar(20) NOT NULL,
  `doc_ref` varchar(10) DEFAULT NULL,
  `num_ref` varchar(20) DEFAULT NULL,
  `doc_oc` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` text,
  `centro_costo` varchar(200) NOT NULL,
  `ot` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `estado` enum('V','F') NOT NULL DEFAULT 'V',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `moneda` enum('MN','ME') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movalmcab`
--

INSERT INTO `movalmcab` (`id`, `alm`, `numero`, `tran`, `doc_ref`, `num_ref`, `doc_oc`, `id_usuario`, `id_proveedor`, `fecha_inicio`, `fecha_fin`, `comentario`, `centro_costo`, `ot`, `area`, `tipo`, `estado`, `fecha_creacion`, `moneda`) VALUES
(3, '01', 1, 'CI', 'FT', '1234', 1234, 7, 7, '2018-06-21', '0000-00-00', '-', '000007', '', '8', 'NI', 'V', '2018-06-13 00:07:44', 'ME'),
(4, '01', 2, 'CI', 'FT', '159', 123, 7, 7, '2018-06-13', '0000-00-00', '-', '000001', '', '8', 'NI', 'V', '2018-06-13 00:10:07', 'MN'),
(5, '01', 3, 'CI', 'FT', '123', 123, 7, 7, '2018-06-01', '0000-00-00', '1', '000001', '', '7', 'NI', 'V', '2018-06-13 00:18:41', 'MN'),
(6, '01', 1, 'SO', NULL, NULL, 0, 7, 0, '2018-06-12', '0000-00-00', '-', '000007', '', '7', 'NS', 'V', '2018-06-13 00:28:27', 'MN'),
(7, '01', 4, 'EP', 'FT', '42234', 255553, 7, 8, '2018-06-18', '0000-00-00', '--', '000007', '', '7', 'NI', 'V', '2018-06-18 21:42:17', 'MN'),
(8, '01', 2, 'SO', NULL, NULL, 0, 7, 0, '2018-06-09', '0000-00-00', '--', '000004', '', '7', 'NS', 'V', '2018-06-18 21:43:26', 'ME'),
(9, '01', 3, 'SO', NULL, NULL, 0, 7, 0, '2018-06-09', '0000-00-00', '--', '000001', '', '8', 'NS', 'V', '2018-06-18 23:28:18', 'MN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movalmdet`
--

CREATE TABLE `movalmdet` (
  `id` int(11) NOT NULL,
  `alm` varchar(3) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `id_importado` int(11) NOT NULL,
  `numero_oc` int(11) NOT NULL,
  `tran` varchar(20) NOT NULL,
  `item` int(11) NOT NULL,
  `item_importado` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `costo` decimal(15,6) NOT NULL,
  `fecha` date NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(20) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `estado` enum('A','I') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movalmdet`
--

INSERT INTO `movalmdet` (`id`, `alm`, `numero`, `id_importado`, `numero_oc`, `tran`, `item`, `item_importado`, `codigo`, `descripcion`, `unidad`, `cantidad`, `costo`, `fecha`, `centro_costo`, `ot`, `tipo`, `estado`, `fecha_creacion`) VALUES
(1, '01', '1', 7, 4, '', 1, 1, '231', 'CELULAR', 'CAJA', '22.000000', '4.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 22:46:26'),
(2, '01', '1', 9, 4, '', 2, 2, '312', 'PRUEBA3', 'GALÓN', '3.000000', '7.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 22:47:25'),
(3, '01', '1', 7, 4, '', 3, 1, '231', 'CELULAR', 'CAJA', '1.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 22:47:46'),
(4, '01', '4', 10, 5, '', 1, 1, '231', 'CELULAR', 'CAJA', '23.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 23:07:35'),
(6, '01', '4', 12, 6, '', 2, 1, '333', 'LINEA BLANCA', 'GALÓN', '40.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 23:26:45'),
(7, '01', '4', 12, 6, '', 3, 1, '333', 'LINEA BLANCA', 'GALÓN', '3.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 23:26:57'),
(8, '01', '4', 13, 6, '', 4, 2, '312', 'PRUEBA3', 'GALÓN', '87.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 23:27:08'),
(9, '01', '3', 0, 0, '', 1, 0, '333', 'LINEA BLANCA', 'GALÓN', '40.000000', '0.000000', '0000-00-00', '', '', 'NS', 'A', '2018-06-18 23:29:07'),
(10, '01', '4', 14, 7, '', 5, 1, '12062018', 'MOUSE INALAMBRICO MICROSOFT', 'CAJA', '13.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-18 23:45:45'),
(11, '01', '1', 18, 3, '', 4, 5, '122', 'TV', 'CAJA', '30.000000', '0.000000', '0000-00-00', '', '', 'NI', 'A', '2018-06-20 00:08:05');

--
-- Disparadores `movalmdet`
--
DELIMITER $$
CREATE TRIGGER `add_stock` AFTER INSERT ON `movalmdet` FOR EACH ROW BEGIN

if NOT exists (select * from movalmdet where NEW.tipo='NS') THEN
INSERT INTO stock(alm,codigo,cantidad,numero,tipo)
VALUES('01',new.codigo,new.cantidad,new.numero,new.tipo) ;
else 
INSERT INTO stock(alm,codigo,cantidad,numero,tipo)
VALUES('01',new.codigo,cantidad - new.cantidad,new.numero,new.tipo) ;

END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_guia`
--

CREATE TABLE `mov_guia` (
  `id` int(11) NOT NULL,
  `alm` varchar(3) NOT NULL,
  `numero` int(11) NOT NULL,
  `tran` varchar(20) NOT NULL,
  `doc_ref` varchar(20) NOT NULL,
  `num_ref` varchar(20) NOT NULL,
  `doc_oc` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(200) NOT NULL,
  `ot` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `estado` enum('V','F') NOT NULL DEFAULT 'V',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_guiadet`
--

CREATE TABLE `mov_guiadet` (
  `id` int(11) NOT NULL,
  `alm` varchar(3) NOT NULL,
  `numero` int(11) NOT NULL,
  `tran` varchar(20) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `precio` decimal(15,6) NOT NULL,
  `fecha` date NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(20) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE `orden_trabajo` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `codigo_maquina` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` text NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `responsable_finalizacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`id`, `numero`, `codigo_maquina`, `usuario`, `descripcion`, `fecha_creacion`, `observaciones`, `fecha_finalizacion`, `hora_finalizacion`, `responsable_finalizacion`) VALUES
(5, 1, '002', 'LUIS AUGUSTO CLAUDIO PONCE', 'PRUEBA', '2018-04-12 21:38:40', 'PRESUNTA', '2018-04-13', '12:02:00', 'JORGE'),
(6, 2, '001', 'LUIS AUGUSTO CLAUDIO PONCE', 'PEROS', '2018-04-12 21:39:25', 'PERSONAS', '2018-04-13', '12:33:00', 'OMAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo1`
--

CREATE TABLE `orden_trabajo1` (
  `id` int(11) NOT NULL,
  `codigo_maquina` varchar(20) NOT NULL,
  `solicitante` varchar(300) NOT NULL,
  `autorizante` varchar(300) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_trabajo1`
--

INSERT INTO `orden_trabajo1` (`id`, `codigo_maquina`, `solicitante`, `autorizante`, `descripcion`, `fecha_creacion`) VALUES
(5, '002', 'LUIS AUGUSTO CLAUDIO PONCE', '1', 'EJEMPLO', '2017-11-20 15:25:50'),
(6, '001', 'LUIS AUGUSTO CLAUDIO PONCE', '3', 'ADQUISICION', '2017-11-20 15:26:10'),
(7, '003', 'LUIS AUGUSTO CLAUDIO PONCE', '2', 'REPARACION', '2017-11-20 15:28:02'),
(8, '001', 'JOSE ADRIAN', '1', 'ORDE DE TRABAJO DE PRUEBA', '2018-01-05 16:57:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ord_fab`
--

CREATE TABLE `ord_fab` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `codigo_cliente` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `observacion` text NOT NULL,
  `estado` enum('ACTIVO','LIQUIDADO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_menu`
--

CREATE TABLE `permiso_menu` (
  `id` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso_menu`
--

INSERT INTO `permiso_menu` (`id`, `id_submenu`, `id_usuario`, `estado`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 0),
(8, 8, 1, 1),
(9, 10, 1, 1),
(10, 11, 1, 1),
(11, 17, 1, 1),
(17, 1, 2, 1),
(18, 3, 2, 1),
(19, 6, 2, 1),
(20, 4, 2, 1),
(21, 8, 2, 1),
(22, 7, 2, 1),
(23, 5, 2, 1),
(24, 10, 2, 1),
(25, 2, 2, 1),
(26, 11, 2, 1),
(27, 17, 2, 1),
(28, 18, 1, 0),
(29, 18, 2, 1),
(34, 21, 1, 1),
(35, 21, 2, 1),
(36, 22, 1, 1),
(37, 22, 2, 1),
(38, 23, 1, 0),
(39, 23, 2, 1),
(42, 25, 1, 0),
(43, 25, 2, 1),
(44, 26, 1, 1),
(45, 26, 2, 1),
(46, 4, 4, 1),
(47, 4, 3, 0),
(48, 5, 4, 1),
(49, 5, 3, 0),
(50, 3, 4, 1),
(51, 3, 3, 0),
(52, 23, 4, 1),
(53, 23, 3, 0),
(56, 25, 4, 1),
(57, 25, 3, 0),
(58, 10, 4, 1),
(59, 10, 3, 0),
(60, 26, 4, 1),
(61, 26, 3, 0),
(62, 1, 4, 1),
(63, 1, 3, 0),
(64, 11, 4, 1),
(65, 11, 3, 0),
(66, 2, 4, 1),
(67, 2, 3, 0),
(68, 17, 4, 1),
(69, 17, 3, 0),
(70, 8, 4, 1),
(71, 8, 3, 0),
(74, 7, 4, 1),
(75, 7, 3, 0),
(76, 18, 4, 1),
(77, 18, 3, 0),
(78, 21, 4, 1),
(79, 21, 3, 0),
(80, 6, 4, 1),
(81, 6, 3, 0),
(82, 22, 4, 1),
(83, 22, 3, 0),
(84, 27, 4, 1),
(85, 27, 3, 0),
(86, 27, 1, 1),
(87, 27, 2, 1),
(88, 28, 4, 1),
(89, 28, 3, 0),
(90, 28, 1, 0),
(91, 28, 2, 1),
(104, 32, 4, 1),
(105, 32, 3, 1),
(106, 32, 1, 1),
(107, 32, 2, 1),
(108, 3, 5, 1),
(109, 4, 5, 1),
(110, 5, 5, 1),
(111, 23, 5, 1),
(113, 10, 5, 1),
(114, 26, 5, 1),
(115, 1, 5, 1),
(116, 11, 5, 1),
(117, 27, 5, 1),
(118, 2, 5, 1),
(119, 17, 5, 1),
(120, 28, 5, 1),
(121, 8, 5, 1),
(122, 25, 5, 1),
(123, 6, 5, 1),
(124, 32, 5, 1),
(125, 7, 5, 1),
(126, 18, 5, 1),
(127, 21, 5, 1),
(128, 22, 5, 1),
(134, 34, 5, 0),
(135, 34, 4, 1),
(136, 34, 3, 0),
(137, 34, 1, 0),
(138, 34, 2, 0),
(139, 35, 5, 0),
(140, 35, 4, 1),
(141, 35, 3, 0),
(142, 35, 1, 0),
(143, 35, 2, 0),
(144, 36, 5, 0),
(145, 36, 4, 1),
(146, 36, 3, 0),
(147, 36, 1, 1),
(148, 36, 2, 1),
(149, 37, 5, 0),
(150, 37, 4, 1),
(151, 37, 3, 0),
(152, 37, 1, 0),
(153, 37, 2, 0),
(154, 38, 5, 0),
(155, 38, 4, 1),
(156, 38, 3, 0),
(157, 38, 1, 0),
(158, 38, 2, 1),
(159, 39, 5, 0),
(160, 39, 4, 1),
(161, 39, 3, 0),
(162, 39, 1, 0),
(163, 39, 2, 1),
(164, 3, 6, 1),
(165, 4, 6, 1),
(166, 5, 6, 1),
(167, 23, 6, 1),
(168, 8, 6, 1),
(169, 25, 6, 1),
(170, 36, 6, 1),
(171, 10, 6, 1),
(172, 26, 6, 1),
(173, 38, 6, 1),
(174, 1, 6, 1),
(175, 11, 6, 1),
(176, 27, 6, 1),
(177, 39, 6, 1),
(178, 2, 6, 1),
(179, 17, 6, 1),
(180, 28, 6, 1),
(181, 6, 6, 1),
(182, 32, 6, 1),
(183, 7, 6, 1),
(184, 18, 6, 1),
(185, 21, 6, 1),
(186, 37, 6, 1),
(188, 34, 6, 1),
(189, 35, 6, 1),
(190, 22, 6, 1),
(197, 3, 7, 1),
(198, 4, 7, 1),
(199, 5, 7, 1),
(200, 23, 7, 1),
(201, 27, 7, 1),
(202, 39, 7, 1),
(203, 1, 7, 1),
(204, 11, 7, 1),
(205, 28, 7, 1),
(207, 2, 7, 1),
(208, 17, 7, 1),
(209, 36, 7, 1),
(210, 8, 7, 1),
(211, 25, 7, 1),
(212, 38, 7, 1),
(213, 10, 7, 1),
(214, 26, 7, 1),
(215, 7, 7, 1),
(216, 18, 7, 1),
(217, 21, 7, 1),
(218, 6, 7, 1),
(219, 32, 7, 1),
(221, 34, 7, 1),
(222, 35, 7, 1),
(223, 37, 7, 1),
(224, 22, 7, 1),
(225, 40, 7, 1),
(226, 40, 5, 0),
(227, 40, 4, 0),
(228, 40, 3, 0),
(229, 40, 1, 0),
(230, 40, 2, 0),
(231, 40, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_trabajos`
--

CREATE TABLE `personal_trabajos` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal_trabajos`
--

INSERT INTO `personal_trabajos` (`id`, `numero`, `categoria`, `nombre`, `fecha_creacion`) VALUES
(6, 1, '12', 'SAUL', '2018-04-12 21:40:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `cuenta_soles` varchar(20) NOT NULL,
  `cuenta_dolares` varchar(20) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion1` varchar(200) NOT NULL,
  `direccion2` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `codigo`, `contacto`, `cuenta_soles`, `cuenta_dolares`, `razon_social`, `ruc`, `dni`, `direccion1`, `direccion2`, `telefono`, `correo`, `fecha_creacion`, `comentario`) VALUES
(1, '20100162742', '-', '0', '0', 'CLINICA SAN FELIPE S.A.', '20100162742', '-', 'AV GREGORIO ESCOBEDO Nº650 JESUS MARIA-LIMA', '-', '-', '-', '2019-02-26 03:31:54', '-'),
(2, '20505018509', '-', '0', '0', 'CLINICA SAN GABRIEL S.A.C.', '20505018509', '-', 'AV. LA MARINA 2955 - SAN MIGUEL-LIMA', '-', '-', '-', '2019-02-26 03:32:52', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisc`
--

CREATE TABLE `requisc` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `tipo` enum('RQ','RS') NOT NULL,
  `estado` enum('A','P','AT') NOT NULL DEFAULT 'P',
  `prioridad` enum('1','2','3') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requisc`
--

INSERT INTO `requisc` (`id`, `numero`, `id_usuario`, `fecha_inicio`, `fecha_fin`, `centro_costo`, `area`, `tipo`, `estado`, `prioridad`, `fecha_creacion`, `comentario`) VALUES
(1, 1, 1, '2019-02-25', '2019-02-25', '000001', '02', 'RQ', 'P', '2', '2019-02-26 04:10:47', 'XXXX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisd`
--

CREATE TABLE `requisd` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `saldo` decimal(15,6) NOT NULL,
  `estado` enum('A','P') NOT NULL DEFAULT 'P',
  `fecha` date DEFAULT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(20) NOT NULL,
  `maquina` varchar(100) NOT NULL,
  `tipo` enum('RQ','RS') NOT NULL DEFAULT 'RS',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requisd`
--

INSERT INTO `requisd` (`id`, `numero`, `item`, `codigo`, `descripcion`, `unidad`, `cantidad`, `saldo`, `estado`, `fecha`, `comentario`, `centro_costo`, `ot`, `maquina`, `tipo`, `fecha_creacion`) VALUES
(1, 1, 1, '1002052', 'ACCESORIO PARA MANGUERA DE CONEXIÓN', 'UNIDAD', '2.000000', '2.000000', 'P', '2019-02-25', 'tttt', '000007', '', '', 'RQ', '2019-02-26 04:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `alm` varchar(10) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cant_min` decimal(15,6) NOT NULL DEFAULT '0.000000',
  `cant_max` decimal(15,6) NOT NULL DEFAULT '0.000000',
  `costo_prom` decimal(15,6) NOT NULL DEFAULT '0.000000',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo` enum('NI','NS') NOT NULL,
  `estado` enum('A','I') NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `item` int(10) UNSIGNED NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`id`, `descripcion`, `ruta`, `item`, `id_menu`) VALUES
(1, 'ARTÍCULOS', 'pages/articulo', 1, 1),
(2, 'FAMILIA', 'pages/familia', 4, 1),
(3, 'MENÚ', 'pages/menu', 1, 4),
(4, 'SUB MENÚ', 'pages/submenu', 2, 4),
(5, 'USUARIOS', 'pages/usuario', 3, 4),
(6, 'REQUERIMIENTO DE COMPRAS', 'pages/rq-compra', 1, 3),
(7, 'REQUERIMIENTO DE SERVICIO', 'pages/rq-servicio', 2, 3),
(8, 'UNIDAD DE MEDIDA', 'pages/unidad', 2, 1),
(10, 'ÁREA', 'pages/area', 3, 1),
(11, 'CENTRO DE COSTO', 'pages/centro-costo', 5, 1),
(17, 'PROVEEDOR', 'pages/proveedor', 6, 1),
(18, 'ORDENES DE SERVICIO', 'pages/ordenes-servicio', 4, 3),
(21, 'ORDENES DE COMPRA', 'pages/ordenes-compra', 3, 3),
(22, 'CORRELATIVOS', 'pages/correlativo', 1, 2),
(23, 'STOCK', 'pages/stock', 1, 5),
(25, 'ORDEN DE TRABAJO', 'pages/orden_trabajo', 8, 1),
(26, 'TIPO DE ARTICULO', 'pages/articulo-tipo', 7, 1),
(27, 'CLIENTE', 'pages/cliente', 9, 1),
(28, 'MÁQUINA', 'pages/maquina', 10, 1),
(32, 'APROBACIÓN DE DOCUMENTOS', 'pages/aprobacion-documentos', 5, 3),
(34, 'NOTAS DE INGRESO', 'pages/nota-ingreso', 2, 6),
(35, 'GUÍAS', 'pages/guia-salida', 4, 6),
(36, 'UBICACIÓN ARTICULOS', 'pages/articulo-ubicacion', 11, 1),
(37, 'NOTAS DE SALIDA', 'pages/nota_salida', 3, 6),
(38, 'TIPO DE TRANSACCIÓN', 'pages/transaccion-tipo', 12, 1),
(39, 'TIPO DE DOCUMENTO', 'pages/documento-tipo', 13, 1),
(40, 'REPORTE DE VENTAS', 'pages/ventas', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_ejecutar`
--

CREATE TABLE `tareas_ejecutar` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estimado` time NOT NULL,
  `t_real` time NOT NULL,
  `solucionado` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas_ejecutar`
--

INSERT INTO `tareas_ejecutar` (`id`, `numero`, `descripcion`, `estimado`, `t_real`, `solucionado`) VALUES
(13, 1, 'ESFPR', '12:02:00', '23:43:00', 'no'),
(14, 1, '---', '12:22:00', '22:03:00', 'no'),
(15, 1, 'PRUEBA', '12:22:00', '22:03:00', 'si'),
(16, 1, 'CABRERA', '11:22:00', '22:03:00', 'no'),
(17, 1, 'JJ', '04:04:00', '05:59:00', 'si'),
(18, 2, '--', '03:04:00', '05:59:00', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_ej`
--

CREATE TABLE `tarea_ej` (
  `id` int(11) NOT NULL,
  `codigo_maquina` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `t_estimado` time NOT NULL,
  `t_real` time NOT NULL,
  `solucion` enum('S','N') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea_ej`
--

INSERT INTO `tarea_ej` (`id`, `codigo_maquina`, `descripcion`, `t_estimado`, `t_real`, `solucion`, `fecha_creacion`) VALUES
(1, '001', 'REPARACION NOCTURNA', '09:00:00', '10:00:00', 'N', '2017-11-20 20:35:13'),
(2, '002', 'MANTENIMIENTO DE ENGRANAJE', '11:45:00', '14:30:00', 'N', '2017-11-20 21:21:48'),
(3, '003', 'REPARACION', '14:00:00', '16:50:00', 'S', '2017-11-20 21:26:28'),
(4, '', 'PRUEBA', '12:23:00', '11:32:00', 'N', '2018-02-07 16:10:53'),
(5, '', 'EJEMPLO', '12:22:00', '11:22:00', 'N', '2018-02-07 16:24:56'),
(6, '', 'PRUEBA2.0', '12:23:00', '12:59:00', 'N', '2018-02-08 16:21:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(2, 'FT', 'FACTURA', '2017-09-27 16:52:11'),
(3, 'GUIA', 'GUIA', '2017-09-27 16:52:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones_mov`
--

CREATE TABLE `transacciones_mov` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `ni` tinyint(4) NOT NULL DEFAULT '0',
  `ns` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transacciones_mov`
--

INSERT INTO `transacciones_mov` (`id`, `codigo`, `descripcion`, `ni`, `ns`, `fecha_creacion`) VALUES
(1, 'CL', 'COMPRA LOCAL', 1, 0, '2017-09-19 20:02:24'),
(3, 'SO', 'SALIDA A PRODUCCIÓN', 0, 1, '2017-09-27 16:49:56'),
(4, 'EP', 'ENTRADA A ALMACEN', 1, 0, '2017-09-27 17:07:06'),
(5, 'CI', 'COMPRA DE IMPORTACIÓN', 1, 0, '2018-01-31 16:46:37'),
(6, 'SM', 'SALIDA POR MUESTRA', 0, 1, '2018-02-06 16:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'UND', 'UNIDAD', '2017-08-23 15:55:15'),
(2, 'PC', 'PIEZA', '2017-08-23 15:55:28'),
(3, 'CJA', 'CAJA', '2017-08-23 15:55:37'),
(4, 'GL', 'GALÓN', '2017-08-23 15:55:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tipo` enum('user','admin') NOT NULL DEFAULT 'user',
  `img_firma` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `correo`, `celular`, `user`, `pass`, `tipo`, `img_firma`, `fecha_creacion`) VALUES
(1, 'LUIS AUGUSTO', 'CLAUDIO PONCE', 'luis.claudio@perutec.com.pe', '997935085', 'luis.claudio@perutec.com.pe', '502ff82f7f1f8218dd41201fe4353687', 'admin', '0849217205d2a17e627e8c754ec3bc22.jpg', '2017-07-04 22:14:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo`
--

CREATE TABLE `usuario_tipo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `solicitante` tinyint(1) NOT NULL DEFAULT '0',
  `compras` tinyint(1) NOT NULL DEFAULT '0',
  `jefe_area` tinyint(1) NOT NULL DEFAULT '0',
  `gerente` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`id`, `id_usuario`, `solicitante`, `compras`, `jefe_area`, `gerente`, `fecha_creacion`) VALUES
(1, 1, 1, 1, 1, 1, '2017-08-16 22:36:56'),
(2, 2, 1, 1, 1, 1, '2017-08-16 22:36:56'),
(3, 3, 0, 1, 0, 0, '2017-08-17 01:00:24'),
(4, 4, 1, 1, 1, 1, '2017-08-17 01:04:43'),
(5, 5, 0, 0, 0, 1, '2017-09-15 23:48:30'),
(6, 7, 1, 1, 1, 1, '2018-01-10 14:28:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprobacion_documentos`
--
ALTER TABLE `aprobacion_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aprobacion_documentos_plantilla`
--
ALTER TABLE `aprobacion_documentos_plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo_file`
--
ALTER TABLE `articulo_file`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo_tipo`
--
ALTER TABLE `articulo_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulo_ubicacion`
--
ALTER TABLE `articulo_ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autorizante`
--
ALTER TABLE `autorizante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comovc`
--
ALTER TABLE `comovc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comovd`
--
ALTER TABLE `comovd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_ot`
--
ALTER TABLE `control_ot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contro_ot`
--
ALTER TABLE `contro_ot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales_utilizados`
--
ALTER TABLE `materiales_utilizados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mat_ut`
--
ALTER TABLE `mat_ut`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movalmcab`
--
ALTER TABLE `movalmcab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movalmdet`
--
ALTER TABLE `movalmdet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mov_guia`
--
ALTER TABLE `mov_guia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mov_guiadet`
--
ALTER TABLE `mov_guiadet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_trabajo1`
--
ALTER TABLE `orden_trabajo1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ord_fab`
--
ALTER TABLE `ord_fab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_trabajos`
--
ALTER TABLE `personal_trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisc`
--
ALTER TABLE `requisc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisd`
--
ALTER TABLE `requisd`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas_ejecutar`
--
ALTER TABLE `tareas_ejecutar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea_ej`
--
ALTER TABLE `tarea_ej`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transacciones_mov`
--
ALTER TABLE `transacciones_mov`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprobacion_documentos`
--
ALTER TABLE `aprobacion_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `aprobacion_documentos_plantilla`
--
ALTER TABLE `aprobacion_documentos_plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `articulo_file`
--
ALTER TABLE `articulo_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `articulo_tipo`
--
ALTER TABLE `articulo_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `articulo_ubicacion`
--
ALTER TABLE `articulo_ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `autorizante`
--
ALTER TABLE `autorizante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comovc`
--
ALTER TABLE `comovc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comovd`
--
ALTER TABLE `comovd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `control_ot`
--
ALTER TABLE `control_ot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `contro_ot`
--
ALTER TABLE `contro_ot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `materiales_utilizados`
--
ALTER TABLE `materiales_utilizados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `mat_ut`
--
ALTER TABLE `mat_ut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `movalmcab`
--
ALTER TABLE `movalmcab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `movalmdet`
--
ALTER TABLE `movalmdet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `mov_guia`
--
ALTER TABLE `mov_guia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mov_guiadet`
--
ALTER TABLE `mov_guiadet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `orden_trabajo1`
--
ALTER TABLE `orden_trabajo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ord_fab`
--
ALTER TABLE `ord_fab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT de la tabla `personal_trabajos`
--
ALTER TABLE `personal_trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `requisc`
--
ALTER TABLE `requisc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `requisd`
--
ALTER TABLE `requisd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `tareas_ejecutar`
--
ALTER TABLE `tareas_ejecutar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tarea_ej`
--
ALTER TABLE `tarea_ej`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transacciones_mov`
--
ALTER TABLE `transacciones_mov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
