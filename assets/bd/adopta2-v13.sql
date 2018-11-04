-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2018 a las 15:47:18
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adopta2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `id_adopcion` int(11) NOT NULL,
  `fecha_adopcion` date NOT NULL,
  `detalle_adopcion` text NOT NULL,
  `estado_adopcion` varchar(8) NOT NULL,
  `id_adoptante` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`id_adopcion`, `fecha_adopcion`, `detalle_adopcion`, `estado_adopcion`, `id_adoptante`, `id_animal`, `id_centro`) VALUES
(1, '2018-05-09', 'Adopto a el gatito', 'inactiva', 1, 3, 1),
(2, '2018-08-16', 'Bitacora de Buzz Lightgear: Todo en orden.', 'inactiva', 2, 2, 1),
(3, '2018-07-17', 'Se llevo a el perrito corriendo', 'inactiva', 3, 7, 1),
(4, '2018-11-04', 'El tipo queria un pajarito', 'activa', 1, 58, 1),
(5, '2018-11-04', '', 'activa', 2, 2, 1),
(6, '2018-11-04', '', 'activa', 7, 4, 1),
(7, '2018-11-04', '', 'activa', 5, 47, 1),
(8, '2018-11-04', '', 'activa', 6, 7, 1),
(9, '2018-11-04', '', 'activa', 3, 1, 3),
(10, '2018-11-04', '', 'activa', 10, 52, 3),
(11, '2018-11-04', '', 'activa', 9, 56, 3),
(12, '2018-11-04', '', 'activa', 9, 57, 2),
(13, '2018-11-04', '', 'activa', 10, 51, 2),
(14, '2018-11-04', '', 'activa', 4, 43, 2),
(15, '2018-11-04', '', 'activa', 8, 49, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptante`
--

CREATE TABLE `adoptante` (
  `id_adoptante` int(11) NOT NULL,
  `dni_adoptante` int(8) NOT NULL,
  `nombre_adoptante` varchar(50) NOT NULL,
  `apellido_adoptante` varchar(50) NOT NULL,
  `direccion_adoptante` varchar(80) NOT NULL,
  `telefono_adoptante` int(15) NOT NULL,
  `email_adoptante` varchar(50) NOT NULL,
  `ciudad_adoptante` varchar(50) NOT NULL,
  `estado_adoptante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adoptante`
--

INSERT INTO `adoptante` (`id_adoptante`, `dni_adoptante`, `nombre_adoptante`, `apellido_adoptante`, `direccion_adoptante`, `telefono_adoptante`, `email_adoptante`, `ciudad_adoptante`, `estado_adoptante`) VALUES
(1, 40209836, 'Juanfer', 'Quinteros', 'Av. Libertador 4865', 155798465, 'lucasficus@gmail.com', 'Bs As', '1'),
(2, 17495635, 'Carola', 'Estevez', 'Granaderos 487', 155487956, 'meliito7545@gmail.com', 'Comodoro Rivadavia', '1'),
(3, 16489158, 'Guillermo', 'Barros Schelotto', 'Hirigoyen 1586', 112486579, 'hermesrt@gmail.com', 'Bs As', '1'),
(4, 16594887, 'Liliana', 'Mendez', 'Florencio Varela 1623', 156849785, 'meliito7545@gmail.com', 'Comodoro Rivadavia', '1'),
(5, 38469020, 'Lucas', 'Moron', 'Av. Roca 364', 4462513, 'lucasficus@gmail.com', 'Rada Tilly', '1'),
(6, 37268013, 'Ursula', 'Captovich', 'Av. Chile 1455', 155203160, 'hermesrt@gmail.com', 'Comodoro Rivadavia', '1'),
(7, 36021549, 'Tamara', 'Nieves', 'Av. San Martin 1563', 112485693, 'meliito7545@gmail.com', 'Comodoro Rivadavia', '1'),
(8, 20156482, 'Elias', 'Jerez', 'Av. Tehuelches 132', 156492302, 'lucasficus@gmail.com', 'Comodoro Rivadavia', '1'),
(9, 37130549, 'Juan', 'Perez', 'Av. Moyano 1326', 4469521, 'lucasficus@gmail.com', 'Rada Tilly', '1'),
(10, 37410256, 'Raul', 'Villalba', 'Av. Moyano 487', 154301620, 'hermesrt@gmail.com', 'Rada Tilly', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nombre_animal` varchar(50) NOT NULL,
  `raza_animal` varchar(50) NOT NULL,
  `especie_animal` varchar(50) NOT NULL,
  `sexo_animal` varchar(10) NOT NULL,
  `descripcion_animal` varchar(100) NOT NULL,
  `estado_animal` varchar(20) NOT NULL,
  `castrado` int(1) NOT NULL,
  `adoptado` tinyint(1) NOT NULL DEFAULT '0',
  `nombre_imagen_animal` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_animal`, `nombre_animal`, `raza_animal`, `especie_animal`, `sexo_animal`, `descripcion_animal`, `estado_animal`, `castrado`, `adoptado`, `nombre_imagen_animal`, `fechaNacimiento`, `id_centro`) VALUES
(1, 'Boby', 'Manto Negro', 'Perro', 'Masculino', '', 'activo', 1, 1, 'mantoNegro.jpg', '2013-10-09', 1),
(2, 'Manchitas', 'Dalmata', 'Perro', 'Masculino', 'Tiene una mancha grande en la pata izquierda', 'activo', 0, 1, 'dalmata.jpg', '2015-10-11', 1),
(3, 'Botones', 'Siames', 'Gato', 'Masculino', '', 'activo', 0, 0, 'gatoSiames.jpg', '2018-06-05', 1),
(4, 'Blanca', 'Gato Napoleon', 'Gato', 'Femenino', 'No le gusta que la acaricien', 'activo', 0, 1, 'gatoNapoleon.jpg', '2018-05-26', 1),
(5, 'Olivia', 'Pastor Aleman', 'Perro', 'Femenino', 'Tiene un collar rosa con un cascabel', 'activo', 0, 0, 'pastorAleman.jpg', '2018-02-23', 1),
(6, 'Lola', 'Caniche', 'Perro', 'Femenino', 'Tiene una marca rosada en la nariz', 'activo', 0, 0, 'caniche.jpg', '2016-12-12', 1),
(7, 'Bolt', 'Beagle', 'Perro', 'Masculino', 'Le tiene miedo a las palomas', 'activo', 0, 1, 'beagle.jpg', '2017-06-19', 1),
(42, 'Pupy', 'Pastor Alemán', 'Perro', 'Femenino', 'Es tímido con otros animales', 'activo', 0, 0, 'pastorAleman21.jpg', '2018-07-11', 1),
(43, 'Robi', 'Beagle', 'Perro', 'Masculino', 'Hay que sacarlo a pasear seguido, es muy hiperactivo', 'activo', 0, 1, 'beagle21.jpg', '2018-03-30', 1),
(44, 'Pepo', 'Bulldog', 'Perro', 'Masculino', '', 'activo', 0, 0, 'bulldog1.jpg', '2016-02-03', 2),
(45, 'Pua', 'Cacatua', 'Ave', 'Masculino', 'Tiene un ala mas corta que la otra', 'activo', 0, 0, 'cacatua11.jpg', '2010-10-20', 2),
(46, 'Negrita', 'Manto Negro', 'Perro', 'Femenino', 'Muy docil con los niños', 'activo', 0, 0, 'mantoNegro21.jpg', '2011-05-04', 2),
(47, 'Mini', 'Chihuahua', 'Perro', 'Femenino', 'No le gustan mucho las caricias', 'activo', 0, 1, 'chihuahua1.jpg', '2016-02-16', 2),
(48, 'Junior', 'Beagle', 'Perro', 'Masculino', '', 'activo', 0, 0, 'beagle31.jpg', '2018-03-15', 2),
(49, 'Gumi', 'Ragdoll', 'Gato', 'Masculino', 'Es un gato muy hogareño', 'activo', 0, 1, 'gatoRagdoll1.jpg', '2015-06-10', 2),
(50, 'Bimbo', 'Golden', 'Perro', 'Masculino', 'Le tiene miedo a las aves', 'activo', 0, 0, 'golden1.jpg', '2018-10-23', 2),
(51, 'Lolita', 'Chihuahua', 'Perro', 'Femenino', 'Es de escaparse frecuentemente.', 'activo', 0, 1, 'chihuahua21.jpg', '2016-04-05', 3),
(52, 'Peludito', 'Bobtail Americano', 'Gato', 'Masculino', 'Es un gato muy tranquilo', 'activo', 1, 1, 'gatoBobTailAmericano21.jpg', '2014-07-18', 3),
(53, 'Snoop', 'Doberman', 'Perro', 'Masculino', 'Muerde a las palomas, mantenerlo alejado de ellas.', 'activo', 0, 0, 'doberman1.jpg', '2015-01-18', 3),
(54, 'Gigi', 'Manes', 'Gato', 'Femenino', 'Es muy juguetona.', 'activo', 0, 0, 'manes11.jpg', '2015-08-04', 3),
(55, 'Minish', 'Siberiano', 'Gato', 'Femenino', 'Le gusta perseguir su cola', 'activo', 0, 0, 'gatoSiberiano21.jpg', '2018-08-25', 3),
(56, 'William', 'Boxer', 'Perro', 'Masculino', 'Le gustan los paseos', 'activo', 1, 1, 'perroBoxer21.jpg', '2014-09-30', 3),
(57, 'Godel', 'Pastor Alemán', 'Perro', 'Masculino', 'Esta entrenado para cuidado a personas no videntes.', 'activo', 1, 1, 'pastorAleman31.jpg', '2016-07-25', 3),
(58, 'Milton', 'Cacatua', 'Ave', 'Masculino', 'Tiene el pico de color negro', 'activo', 0, 1, 'cacatua21.jpg', '2012-12-04', 1),
(59, 'Marina', 'Doberman', 'Perro', 'Femenino', 'Es muy dócil con los niños', 'activo', 0, 0, 'doberman21.jpg', '2014-10-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_adopcion`
--

CREATE TABLE `centro_adopcion` (
  `id_centro` int(11) NOT NULL,
  `nombre_ca` varchar(50) NOT NULL,
  `direccion_ca` varchar(80) NOT NULL,
  `telefono_ca` int(15) NOT NULL,
  `email_ca` varchar(50) NOT NULL,
  `ciudad_ca` varchar(50) NOT NULL,
  `estado_ca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centro_adopcion`
--

INSERT INTO `centro_adopcion` (`id_centro`, `nombre_ca`, `direccion_ca`, `telefono_ca`, `email_ca`, `ciudad_ca`, `estado_ca`) VALUES
(1, 'Centro Adopciones Roca', 'Av. Roca 1654', 4471548, 'adopcionesRoca@gmail.com', 'Comodoro Rivadavia', 'activo'),
(2, 'Veterinaria Rada', 'Av. Moyano 1050', 4481749, 'radaPerritos@gmail.com', 'Rada Tilly', 'activo'),
(3, 'Adopciones Caninas Concordia', 'Los Alamos 346', 4865132, 'canesEntreRios@gmail.com', 'Concordia', 'activo'),
(4, 'Centro Adopciones  Km 3', 'Ingeniero Ordones 1548', 449563152, 'km3@gmail.com', 'Comodoro Rivadavia', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL,
  `fecha_denuncia` date NOT NULL,
  `id_adoptante` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `detalle_denuncia` varchar(180) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `especie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`especie`) VALUES
('Ave'),
('Gato'),
('Otro'),
('Perro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_baja_animal`
--

CREATE TABLE `historial_baja_animal` (
  `id_animal` int(11) NOT NULL,
  `fecha_baja` date NOT NULL,
  `descripcion_baja` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_denuncia`
--

CREATE TABLE `motivo_denuncia` (
  `id_motivo` int(11) NOT NULL,
  `motivo_denuncia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motivo_denuncia`
--

INSERT INTO `motivo_denuncia` (`id_motivo`, `motivo_denuncia`) VALUES
(1, 'Maltrato'),
(2, 'Abandono'),
(3, 'Tenencia Irresponsable'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_seguimiento`
--

CREATE TABLE `periodo_seguimiento` (
  `id_periodo` int(11) NOT NULL,
  `tipo_periodo` varchar(50) NOT NULL,
  `fecha_inicio_periodo` date NOT NULL,
  `fecha_fin_periodo` date NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo_seguimiento`
--

INSERT INTO `periodo_seguimiento` (`id_periodo`, `tipo_periodo`, `fecha_inicio_periodo`, `fecha_fin_periodo`, `id_centro`) VALUES
(1, 'Seguimiento', '2018-06-05', '2018-06-10', 1),
(2, 'Castracion', '2018-03-06', '2018-03-18', 1),
(3, 'Vacunacion', '2018-09-17', '2018-09-26', 1),
(18, 'Vacunacion', '2018-11-17', '2018-11-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `especie` varchar(25) NOT NULL,
  `raza` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`especie`, `raza`) VALUES
('Ave', 'Cacatua'),
('Ave', 'Canario'),
('Ave', 'Jilgueros'),
('Ave', 'Loro'),
('Ave', 'No Definido'),
('Ave', 'Perico'),
('Gato', 'Azul Ruso'),
('Gato', 'Bobtail Americano'),
('Gato', 'Burmés'),
('Gato', 'Diamantes mandarín'),
('Gato', 'Gato Napoleon'),
('Gato', 'Maine Coon'),
('Gato', 'Manes'),
('Gato', 'No Definido'),
('Gato', 'Persa'),
('Gato', 'Ragdoll'),
('Gato', 'Siames'),
('Gato', 'Siberiano'),
('Otro', 'No Definido'),
('Perro', 'Beagle'),
('Perro', 'Boxer'),
('Perro', 'Bulldog'),
('Perro', 'Caniche'),
('Perro', 'Chihuahua'),
('Perro', 'Doberman'),
('Perro', 'Golden'),
('Perro', 'Gran Danes'),
('Perro', 'Husky'),
('Perro', 'Labrador'),
('Perro', 'Manto Negro'),
('Perro', 'No Definido'),
('Perro', 'Pastor Alemán'),
('Perro', 'Pug'),
('Perro', 'Rottweiler'),
('Perro', 'Salchicha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE `revision` (
  `id_revision` int(11) NOT NULL,
  `fecha_revision` date NOT NULL,
  `tipo_revision` varchar(15) NOT NULL,
  `detalle_revision` varchar(150) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vacuna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`id_revision`, `fecha_revision`, `tipo_revision`, `detalle_revision`, `id_animal`, `id_usuario`, `id_vacuna`) VALUES
(1, '2018-11-04', 'Seguimiento', 'El ave se encuentra en muy buenas condiciones', 58, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revocaciones`
--

CREATE TABLE `revocaciones` (
  `id_adopcion` int(11) NOT NULL,
  `fecha_revocacion` date NOT NULL,
  `motivo_revocacion` varchar(100) NOT NULL,
  `detalle_revocacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revocaciones`
--

INSERT INTO `revocaciones` (`id_adopcion`, `fecha_revocacion`, `motivo_revocacion`, `detalle_revocacion`) VALUES
(1, '2018-11-04', 'Problemas presonales', ''),
(2, '2018-11-04', 'Otro', 'El adoptante se muda a otra ciudad y no quiere dejar a la mascota en otro lugar'),
(3, '2018-11-04', 'Mal comportamiento', 'El perro rompia todas las cosas de la casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni_usuario` int(8) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `telefono_usuario` int(15) NOT NULL,
  `domicilio_usuario` varchar(50) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `tipo_usuario` varchar(15) NOT NULL,
  `id_centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni_usuario`, `password`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `telefono_usuario`, `domicilio_usuario`, `matricula`, `tipo_usuario`, `id_centro`) VALUES
(1, 12345678, '21232f297a57a5a743894a0e4a801fc3', 'Hermes', 'Flores', 'hermesrt@gmail.com', 158498785, 'Av. Gaona 1948', '', 'administrativo', 1),
(2, 37665936, '21232f297a57a5a743894a0e4a801fc3', 'Lucas', 'Vejar', 'lucasficus@gmail.com', 154390365, 'Av. Rivadavia 3165', '71655', 'veterinario', 1),
(3, 37695154, '21232f297a57a5a743894a0e4a801fc3', 'Abi', 'Saez', 'meliito7545@gmail.com', 155556635, 'Psje. Ing. Weis 658', '1596', 'veterinario', 1),
(4, 16485978, '21232f297a57a5a743894a0e4a801fc3', 'Roberto', 'Funes', 'robertoFunes@gmail.com', 448652184, 'Av. Portugal 1564', '', 'administrativo', 2),
(5, 14282354, '21232f297a57a5a743894a0e4a801fc3', 'Adelmo', 'Rodriguez', 'adelmo@gmail.com', 158479625, 'Av. 13 de Diciembre 899', '', 'administrativo', 2),
(6, 16985423, '21232f297a57a5a743894a0e4a801fc3', 'Manuela', 'Bing', 'bing@gmail.com', 156235487, 'Aristobulo del Valle 2184', '4889', 'veterinario', 2),
(7, 16352449, '21232f297a57a5a743894a0e4a801fc3', 'Paola', 'Guevara', 'pao@gmail.com', 156895410, 'Jesus Marcial 156', '', 'administrativo', 2),
(8, 37541623, '21232f297a57a5a743894a0e4a801fc3', 'Laila', 'Mora', 'morita@gmail.com', 154216489, 'Jose G. Artigas 1478', '', 'administrativo', 3),
(9, 36487021, '21232f297a57a5a743894a0e4a801fc3', 'Nicolas', 'Martinez', 'nico@gmail.com', 124586923, 'Aristobulo del Valle 1569', '7845', 'veterinario', 3),
(10, 33568912, '21232f297a57a5a743894a0e4a801fc3', 'Omar', 'Tishck', 'omar@gmail.com', 447951632, 'Clarin 632', '', 'administrativo', 3),
(11, 38497562, '21232f297a57a5a743894a0e4a801fc3', 'Ivo', 'Santaibañez', 'ivo@gmail.com', 165487923, 'Bouchardo 2514', '1002', 'veterinario', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id_vacuna` int(11) NOT NULL,
  `nombre_vacuna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id_vacuna`, `nombre_vacuna`) VALUES
(1, 'Antirrábica'),
(3, 'Polivalente'),
(4, 'Trivalente'),
(5, 'Pentavalente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`id_adopcion`),
  ADD KEY `id_adoptante` (`id_adoptante`,`id_animal`),
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `adoptante`
--
ALTER TABLE `adoptante`
  ADD PRIMARY KEY (`id_adoptante`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `centro_adopcion`
--
ALTER TABLE `centro_adopcion`
  ADD PRIMARY KEY (`id_centro`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id_denuncia`),
  ADD KEY `id_adoptante` (`id_adoptante`,`id_motivo`),
  ADD KEY `id_motivo` (`id_motivo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`especie`);

--
-- Indices de la tabla `historial_baja_animal`
--
ALTER TABLE `historial_baja_animal`
  ADD PRIMARY KEY (`id_animal`,`fecha_baja`);

--
-- Indices de la tabla `motivo_denuncia`
--
ALTER TABLE `motivo_denuncia`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Indices de la tabla `periodo_seguimiento`
--
ALTER TABLE `periodo_seguimiento`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`especie`,`raza`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id_revision`),
  ADD KEY `id_animal` (`id_animal`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_vacuna` (`id_vacuna`);

--
-- Indices de la tabla `revocaciones`
--
ALTER TABLE `revocaciones`
  ADD PRIMARY KEY (`id_adopcion`,`fecha_revocacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id_vacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `id_adopcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `adoptante`
--
ALTER TABLE `adoptante`
  MODIFY `id_adoptante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `centro_adopcion`
--
ALTER TABLE `centro_adopcion`
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id_denuncia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `motivo_denuncia`
--
ALTER TABLE `motivo_denuncia`
  MODIFY `id_motivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `periodo_seguimiento`
--
ALTER TABLE `periodo_seguimiento`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id_revision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptante` (`id_adoptante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adopcion_ibfk_3` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`);

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `denuncia_ibfk_1` FOREIGN KEY (`id_motivo`) REFERENCES `motivo_denuncia` (`id_motivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `denuncia_ibfk_2` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptante` (`id_adoptante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `denuncia_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `denuncia_ibfk_4` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`);

--
-- Filtros para la tabla `periodo_seguimiento`
--
ALTER TABLE `periodo_seguimiento`
  ADD CONSTRAINT `periodo_seguimiento_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revision_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revision_ibfk_3` FOREIGN KEY (`id_vacuna`) REFERENCES `vacuna` (`id_vacuna`);

--
-- Filtros para la tabla `revocaciones`
--
ALTER TABLE `revocaciones`
  ADD CONSTRAINT `revocaciones_ibfk_1` FOREIGN KEY (`id_adopcion`) REFERENCES `adopcion` (`id_adopcion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
