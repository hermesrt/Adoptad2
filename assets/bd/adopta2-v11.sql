-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2018 a las 23:12:39
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
(1, 'Boby', 'Manto Negro', 'Perro', 'Masculino', '', 'activo', 1, 0, 'mantoNegro.jpg', '2018-10-09', 1),
(2, 'Manchitas', 'Dalmata', 'Perro', 'Masculino', 'Tiene una mancha grande en la pata izquierda', 'activo', 0, 1, 'dalmata.jpg', '2018-10-11', 1),
(3, 'Botones', 'Siames', 'Gato', 'Masculino', '', 'activo', 0, 1, 'gatoSiames.jpg', '2018-06-05', 1),
(4, 'Blanca', 'Gato Napoleon', 'Gato', 'Femenino', 'No le gusta que la acaricien', 'activo', 0, 0, 'gatoNapoleon.jgp.jpg', '2018-05-26', 1),
(5, 'Olivia', 'Pastor Aleman', 'Perro', 'Femenino', 'Tiene un collar rosa con un cascabel', 'activo', 0, 0, 'pastorAleman.jpg', '2018-02-23', 1),
(6, 'Lola', 'Caniche', 'Perro', 'Femenino', 'Tiene una marca rosada en la nariz', 'activo', 0, 0, 'caniche.jpg', '2016-12-12', 1),
(7, 'Bolt', 'Beagle', 'Perro', 'Masculino', 'Le tiene miedo a las palomas', 'inactivo', 0, 0, 'beagle.jpg', '2017-06-19', 1),
(36, 'hermes', 'dsfsdf', 'sdfsd', 'Femenino', 'asdsaf', 'inactivo', 0, 0, 'http://localhost/Adoptad2/assets/img/animales/dalmata.jpg', '2018-10-13', 1),
(37, 'asdas', 'sdsf', 'sadsa', 'Femenino', 'dsad', 'activo', 0, 1, 'dalmata.jpg', '2018-10-13', 1),
(38, 'dasd', 'asdasd', 'asd', 'Femenino', 'adsdsa', 'activo', 0, 0, 'dalmata.jpg', '2018-10-13', 1),
(39, 'dasd', 'asdasd', 'asd', 'Femenino', 'adsdsa', 'inactivo', 0, 0, 'EsquemaBD-Adopta2.png', '2018-10-13', 1),
(40, 'heres', 'asdasd', 'asd', 'Femenino', 'adsdsa', 'inactivo', 0, 0, 'EsquemaBD-Adopta21.png', '2018-10-13', 1),
(41, 'pruebaaaa', 'sad', 'dasdas', 'Femenino', 'sadsad', '1', 0, 0, 'EsquemaBD-Adopta22.png', '2018-10-13', 1);

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
(3, 'Adopciones Caninas Concordia', 'Los Alamos 346', 4865132, 'canesEntreRios@gmail.com', 'Concordia', 'activo');

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
  `id_vacuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni_usuario` int(8) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuarrio` varchar(50) NOT NULL,
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

INSERT INTO `usuario` (`id_usuario`, `dni_usuario`, `password`, `nombre_usuario`, `apellido_usuarrio`, `email_usuario`, `telefono_usuario`, `domicilio_usuario`, `matricula`, `tipo_usuario`, `id_centro`) VALUES
(1, 12345678, '21232f297a57a5a743894a0e4a801fc3', 'Hermes', 'Flores', 'hermesrt@gmail.com', 158498785, 'Av. Gaona 1948', '71655', 'administrativo', 1),
(2, 37665936, '21232f297a57a5a743894a0e4a801fc3', 'Lucas', 'Vejar', 'lucasficus@gmail.com', 154390365, 'Av. Rivadavia 3165', '', 'veterinario', 1);

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
  MODIFY `id_adopcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `adoptante`
--
ALTER TABLE `adoptante`
  MODIFY `id_adoptante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `centro_adopcion`
--
ALTER TABLE `centro_adopcion`
  MODIFY `id_centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id_revision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
