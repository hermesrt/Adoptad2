-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-10-2018 a las 18:19:58
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `adopcion`;
CREATE TABLE IF NOT EXISTS `adopcion` (
  `id_adopcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_adopcion` date NOT NULL,
  `detalle_adopcion` text NOT NULL,
  `estado_adopcion` varchar(8) NOT NULL,
  `id_adoptante` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  PRIMARY KEY (`id_adopcion`),
  KEY `id_adoptante` (`id_adoptante`,`id_animal`),
  KEY `id_animal` (`id_animal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`id_adopcion`, `fecha_adopcion`, `detalle_adopcion`, `estado_adopcion`, `id_adoptante`, `id_animal`) VALUES
(1, '2018-10-18', '', 'activa', 1, 3),
(2, '2018-10-18', '', 'activa', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoptante`
--

DROP TABLE IF EXISTS `adoptante`;
CREATE TABLE IF NOT EXISTS `adoptante` (
  `id_adoptante` int(11) NOT NULL AUTO_INCREMENT,
  `dni_adoptante` int(8) NOT NULL,
  `nombre_adoptante` varchar(50) NOT NULL,
  `apellido_adoptante` varchar(50) NOT NULL,
  `direccion_adoptante` varchar(80) NOT NULL,
  `telefono_adoptante` int(15) NOT NULL,
  `email_adoptante` varchar(50) NOT NULL,
  `ciudad_adoptante` varchar(50) NOT NULL,
  `estado_adoptante` varchar(20) NOT NULL,
  PRIMARY KEY (`id_adoptante`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adoptante`
--

INSERT INTO `adoptante` (`id_adoptante`, `dni_adoptante`, `nombre_adoptante`, `apellido_adoptante`, `direccion_adoptante`, `telefono_adoptante`, `email_adoptante`, `ciudad_adoptante`, `estado_adoptante`) VALUES
(1, 40209836, 'Juanfer', 'Quinteros', 'Av. Libertador 4865', 155798465, 'estamosMelos@gmail.com', 'Bs As', '1'),
(2, 17495635, 'Carola', 'Estevez', 'Granaderos 487', 155487956, 'caritoooo@gmail.com', 'Comodoro Rivadavia', '1'),
(3, 16489158, 'Guillermo', 'Barros Schelotto', 'Hirigoyen 1586', 112486579, 'lloron@gmail.com', 'Bs As', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id_animal` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY (`id_animal`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_animal`, `nombre_animal`, `raza_animal`, `especie_animal`, `sexo_animal`, `descripcion_animal`, `estado_animal`, `castrado`, `adoptado`, `nombre_imagen_animal`, `fechaNacimiento`, `id_centro`) VALUES
(1, 'Boby', 'Manto Negro', 'Perro', 'Masculino', '', 'activo', 1, 0, 'mantoNegro.jpg', '2018-10-09', 1),
(2, 'Manchitas									', 'Dalmata', 'Perro', 'Masculino', 'Tiene una mancha grande en la pata izquierda', 'activo', 0, 1, 'dalmata.jpg', '2018-10-11', 1),
(3, 'Botones									', 'Siames', 'Gato', 'Masculino', '', 'activo', 0, 1, 'gatoSiames.jpg', '2018-06-05', 1),
(4, 'Blanca									', 'Gato Napoleon', 'Gato', 'Femenino', 'No le gusta que la acaricien', 'activo', 0, 0, 'gatoNapoleon.jgp.jpg', '2018-05-26', 1),
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

DROP TABLE IF EXISTS `centro_adopcion`;
CREATE TABLE IF NOT EXISTS `centro_adopcion` (
  `id_centro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ca` varchar(50) NOT NULL,
  `direccion_ca` varchar(80) NOT NULL,
  `telefono_ca` int(15) NOT NULL,
  `email_ca` varchar(50) NOT NULL,
  `ciudad_ca` varchar(50) NOT NULL,
  `estado_ca` varchar(20) NOT NULL,
  PRIMARY KEY (`id_centro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE IF NOT EXISTS `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_denuncia` date NOT NULL,
  `id_adoptante` int(11) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `detalle_denuncia` varchar(180) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `id_adoptante` (`id_adoptante`,`id_motivo`),
  KEY `id_motivo` (`id_motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id_denuncia`, `fecha_denuncia`, `id_adoptante`, `id_motivo`, `detalle_denuncia`, `id_usuario`) VALUES
(1, '2018-10-17', 1, 2, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_baja_animal`
--

DROP TABLE IF EXISTS `historial_baja_animal`;
CREATE TABLE IF NOT EXISTS `historial_baja_animal` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) NOT NULL,
  `fecha_baja` date NOT NULL,
  `descripcion_baja` varchar(255) NOT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_baja_animal`
--

INSERT INTO `historial_baja_animal` (`id_historial`, `id_animal`, `fecha_baja`, `descripcion_baja`) VALUES
(1, 40, '2018-10-31', 'Fallecimiento'),
(2, 39, '2018-10-14', 'Fallecimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_denuncia`
--

DROP TABLE IF EXISTS `motivo_denuncia`;
CREATE TABLE IF NOT EXISTS `motivo_denuncia` (
  `id_motivo` int(11) NOT NULL AUTO_INCREMENT,
  `motivo_denuncia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `periodo_seguimiento`;
CREATE TABLE IF NOT EXISTS `periodo_seguimiento` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_periodo` varchar(50) NOT NULL,
  `fecha_inicio_periodo` date NOT NULL,
  `fecha_fin_periodo` date NOT NULL,
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY (`id_periodo`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

DROP TABLE IF EXISTS `revision`;
CREATE TABLE IF NOT EXISTS `revision` (
  `id_revision` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_revision` date NOT NULL,
  `tipo_revision` varchar(15) NOT NULL,
  `detalle_revision` varchar(150) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_revision`),
  KEY `id_animal` (`id_animal`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`id_revision`, `fecha_revision`, `tipo_revision`, `detalle_revision`, `id_animal`, `id_usuario`) VALUES
(1, '2018-09-10', 'seguimiento', 'Se realizo un seguimiento y el animal estaba en perfectas condiciones de salud.', 2, 2),
(2, '2018-07-10', 'castración', 'El animal no estaba castrado. Se le informo a el adoptante que debe castrarlo.', 6, 2),
(3, '2018-10-04', 'Castración', 'sdasd', 3, 1),
(4, '2018-10-12', 'Vacunacion', 'sadasd', 3, 1),
(5, '2018-10-10', 'Vacunacion', 'dsadas', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revocaciones`
--

DROP TABLE IF EXISTS `revocaciones`;
CREATE TABLE IF NOT EXISTS `revocaciones` (
  `id_revoacaion` int(11) NOT NULL AUTO_INCREMENT,
  `id_animal` int(11) NOT NULL,
  `fecha_revocacion` date NOT NULL,
  `motivo_revocacion` varchar(100) NOT NULL,
  `detalle_revocacion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_revoacaion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revocaciones`
--

INSERT INTO `revocaciones` (`id_revoacaion`, `id_animal`, `fecha_revocacion`, `motivo_revocacion`, `detalle_revocacion`) VALUES
(1, 1, '2018-10-14', 'Perro agresivo', 'Mordio a tu vieja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni_usuario` int(8) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuarrio` varchar(50) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `telefono_usuario` int(15) NOT NULL,
  `domicilio_usuario` varchar(50) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `tipo_usuario` varchar(15) NOT NULL,
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `vacuna`;
CREATE TABLE IF NOT EXISTS `vacuna` (
  `id_vacuna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_vacuna` varchar(50) NOT NULL,
  PRIMARY KEY (`id_vacuna`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id_vacuna`, `nombre_vacuna`) VALUES
(1, 'Antirrábica'),
(2, 'Parvovirus y moquillo'),
(3, 'Polivalente'),
(4, 'Trivalente'),
(5, 'Pentavalente'),
(6, 'Tos de las perreras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna_aplicada`
--

DROP TABLE IF EXISTS `vacuna_aplicada`;
CREATE TABLE IF NOT EXISTS `vacuna_aplicada` (
  `id_vacuna_aplicada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_aplicacion_vacuna` date NOT NULL,
  `id_revision` int(11) NOT NULL,
  `id_vacuna` int(11) NOT NULL,
  PRIMARY KEY (`id_vacuna_aplicada`),
  KEY `id_animal` (`id_revision`,`id_vacuna`),
  KEY `id_vacuna` (`id_vacuna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacuna_aplicada`
--

INSERT INTO `vacuna_aplicada` (`id_vacuna_aplicada`, `fecha_aplicacion_vacuna`, `id_revision`, `id_vacuna`) VALUES
(1, '2018-10-12', 4, 3),
(2, '2018-10-10', 5, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptante` (`id_adoptante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adopcion_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `denuncia_ibfk_2` FOREIGN KEY (`id_adoptante`) REFERENCES `adoptante` (`id_adoptante`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `revision_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro_adopcion` (`id_centro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacuna_aplicada`
--
ALTER TABLE `vacuna_aplicada`
  ADD CONSTRAINT `vacuna_aplicada_ibfk_2` FOREIGN KEY (`id_vacuna`) REFERENCES `vacuna` (`id_vacuna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vacuna_aplicada_ibfk_3` FOREIGN KEY (`id_revision`) REFERENCES `revision` (`id_revision`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
