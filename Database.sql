-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-12-2017 a las 19:10:24
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carsale`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aranceles`
--

CREATE TABLE `aranceles` (
  `id` bigint(20) NOT NULL,
  `detalle` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `valor` double NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '1 -> VIGENTE, 2 -> NO VIGENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='detalle de los aranceles';

--
-- Volcado de datos para la tabla `aranceles`
--

INSERT INTO `aranceles` (`id`, `detalle`, `valor`, `estado`) VALUES
(1, 'SOAT', 320000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE `carros` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'esta es la placa del vehiculo, es un identificador, por lo que es unico e irrepetible',
  `propietario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `anio` varchar(4) COLLATE utf8_spanish_ci NOT NULL COMMENT 'anio del vehiculo',
  `ciudad` bigint(20) NOT NULL,
  `km` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cuantos kilometros ha recorrido el vehiculo',
  `tipo` bigint(20) NOT NULL COMMENT 'tipo de vehiculo, ejemplo: camioneta',
  `motor` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero del motor',
  `combustible` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `transmision` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cilindraje` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_id` bigint(20) NOT NULL,
  `pcompra` double NOT NULL,
  `pventa` double NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 disponible, 2 vendido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`id`, `propietario`, `anio`, `ciudad`, `km`, `tipo`, `motor`, `combustible`, `color`, `transmision`, `direccion`, `cilindraje`, `modelo_id`, `pcompra`, `pventa`, `estado`) VALUES
('abc123', '72000000', '2017', 145, '0', 2, 'mtr523za', 'Gasolina', 'blanco', 'Automatica', 'Hidraulica', '2000', 6, 70000000, 75000000, 1),
('CXD283', '1042440132', '2010', 145, '50000', 1, 'MTZ1234', 'Gasolina', 'RATA', 'Automatica', 'Hidraulica', '2000', 3, 45000000, 70000000, 2),
('HGO217', '1042440132', '2014', 145, '50000', 1, 'G4FCDU345051', 'Gasolina_y_Gas', 'NEGRO', 'Automatica', 'Hidraulica', '1250', 5, 20000000, 24000000, 2),
('HTR182', '1042440132', '2014', 145, '28000', 1, 'MTR2QW1', 'Gasolina', 'NEGRO', 'Automatica', 'Hidraulica', '1600', 1, 28000000, 32500000, 1),
('QHX790', '1042440132', '2009', 145, '90000000', 2, 'ZQWE145', 'Diesel', 'BEIGE OSCURO', 'Automatica', 'Hidraulica', '2700', 4, 62500000, 68000000, 1),
('UUZ416', '1042440132', '2016', 145, '12000', 1, 'MTR3SA', 'Gasolina', 'BALNCO', 'Mecanica', 'Hidraulica', '1250', 2, 32000000, 38000000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` bigint(20) NOT NULL,
  `det` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `depto` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `det`, `depto`) VALUES
(1, 'EL ENCANTO', 'AMA'),
(2, 'LA CHORRERA', 'AMA'),
(3, 'LA PEDRERA', 'AMA'),
(4, 'LA VICTORIA', 'AMA'),
(5, 'LETICIA', 'AMA'),
(6, 'MIRITI', 'AMA'),
(7, 'PUERTO ALEGRIA', 'AMA'),
(8, 'PUERTO ARICA', 'AMA'),
(9, 'PUERTO NARIÑO', 'AMA'),
(10, 'PUERTO SANTANDER', 'AMA'),
(11, 'TURAPACA', 'AMA'),
(12, 'ABEJORRAL', 'ANT'),
(13, 'ABRIAQUI', 'ANT'),
(14, 'ALEJANDRIA', 'ANT'),
(15, 'AMAGA', 'ANT'),
(16, 'AMALFI', 'ANT'),
(17, 'ANDES', 'ANT'),
(18, 'ANGELOPOLIS', 'ANT'),
(19, 'ANGOSTURA', 'ANT'),
(20, 'ANORI', 'ANT'),
(21, 'ANTIOQUIA', 'ANT'),
(22, 'ANZA', 'ANT'),
(23, 'APARTADO', 'ANT'),
(24, 'ARBOLETES', 'ANT'),
(25, 'ARGELIA', 'ANT'),
(26, 'ARMENIA', 'ANT'),
(27, 'BARBOSA', 'ANT'),
(28, 'BELLO', 'ANT'),
(29, 'BELMIRA', 'ANT'),
(30, 'BETANIA', 'ANT'),
(31, 'BETULIA', 'ANT'),
(32, 'BOLIVAR', 'ANT'),
(33, 'BRICEÑO', 'ANT'),
(34, 'BURITICA', 'ANT'),
(35, 'CACERES', 'ANT'),
(36, 'CAICEDO', 'ANT'),
(37, 'CALDAS', 'ANT'),
(38, 'CAMPAMENTO', 'ANT'),
(39, 'CANASGORDAS', 'ANT'),
(40, 'CARACOLI', 'ANT'),
(41, 'CARAMANTA', 'ANT'),
(42, 'CAREPA', 'ANT'),
(43, 'CARMEN DE VIBORAL', 'ANT'),
(44, 'CAROLINA DEL PRINCIPE', 'ANT'),
(45, 'CAUCASIA', 'ANT'),
(46, 'CHIGORODO', 'ANT'),
(47, 'CISNEROS', 'ANT'),
(48, 'COCORNA', 'ANT'),
(49, 'CONCEPCION', 'ANT'),
(50, 'CONCORDIA', 'ANT'),
(51, 'COPACABANA', 'ANT'),
(52, 'DABEIBA', 'ANT'),
(53, 'DONMATIAS', 'ANT'),
(54, 'EBEJICO', 'ANT'),
(55, 'EL BAGRE', 'ANT'),
(56, 'EL PENOL', 'ANT'),
(57, 'EL RETIRO', 'ANT'),
(58, 'ENTRERRIOS', 'ANT'),
(59, 'ENVIGADO', 'ANT'),
(60, 'FREDONIA', 'ANT'),
(61, 'FRONTINO', 'ANT'),
(62, 'GIRALDO', 'ANT'),
(63, 'GIRARDOTA', 'ANT'),
(64, 'GOMEZ PLATA', 'ANT'),
(65, 'GRANADA', 'ANT'),
(66, 'GUADALUPE', 'ANT'),
(67, 'GUARNE', 'ANT'),
(68, 'GUATAQUE', 'ANT'),
(69, 'HELICONIA', 'ANT'),
(70, 'HISPANIA', 'ANT'),
(71, 'ITAGUI', 'ANT'),
(72, 'ITUANGO', 'ANT'),
(73, 'JARDIN', 'ANT'),
(74, 'JERICO', 'ANT'),
(75, 'LA CEJA', 'ANT'),
(76, 'LA ESTRELLA', 'ANT'),
(77, 'LA PINTADA', 'ANT'),
(78, 'LA UNION', 'ANT'),
(79, 'LIBORINA', 'ANT'),
(80, 'MACEO', 'ANT'),
(81, 'MARINILLA', 'ANT'),
(82, 'MEDELLIN', 'ANT'),
(83, 'MONTEBELLO', 'ANT'),
(84, 'MURINDO', 'ANT'),
(85, 'MUTATA', 'ANT'),
(86, 'NARINO', 'ANT'),
(87, 'NECHI', 'ANT'),
(88, 'NECOCLI', 'ANT'),
(89, 'OLAYA', 'ANT'),
(90, 'PEQUE', 'ANT'),
(91, 'PUEBLORRICO', 'ANT'),
(92, 'PUERTO BERRIO', 'ANT'),
(93, 'PUERTO NARE', 'ANT'),
(94, 'PUERTO TRIUNFO', 'ANT'),
(95, 'REMEDIOS', 'ANT'),
(96, 'RIONEGRO', 'ANT'),
(97, 'SABANALARGA', 'ANT'),
(98, 'SABANETA', 'ANT'),
(99, 'SALGAR', 'ANT'),
(100, 'SAN ANDRES DE CUERQUIA', 'ANT'),
(101, 'SAN CARLOS', 'ANT'),
(102, 'SAN FRANCISCO', 'ANT'),
(103, 'SAN JERONIMO', 'ANT'),
(104, 'SAN JOSE DE LA MONTAÑA', 'ANT'),
(105, 'SAN JUAN DE URABA', 'ANT'),
(106, 'SAN LUIS', 'ANT'),
(107, 'SAN PEDRO DE LOS MILAGROS', 'ANT'),
(108, 'SAN PEDRO DE URABA', 'ANT'),
(109, 'SAN RAFAEL', 'ANT'),
(110, 'SAN ROQUE', 'ANT'),
(111, 'SAN VICENTE', 'ANT'),
(112, 'SANTA BARBARA', 'ANT'),
(113, 'SANTA ROSA DE OSOS', 'ANT'),
(114, 'SANTO DOMINGO', 'ANT'),
(115, 'SANTUARIO', 'ANT'),
(116, 'SEGOVIA', 'ANT'),
(117, 'SONSON', 'ANT'),
(118, 'SOPETRAN', 'ANT'),
(119, 'TAMESIS', 'ANT'),
(120, 'TARAZA', 'ANT'),
(121, 'TARSO', 'ANT'),
(122, 'TITIRIBI', 'ANT'),
(123, 'TOLEDO', 'ANT'),
(124, 'TURBO', 'ANT'),
(125, 'URAMITA', 'ANT'),
(126, 'URRAO', 'ANT'),
(127, 'VALDIVIA', 'ANT'),
(128, 'VALPARAISO', 'ANT'),
(129, 'VEGACHI', 'ANT'),
(130, 'VENECIA', 'ANT'),
(131, 'VIGIA DEL FUERTE', 'ANT'),
(132, 'YALI', 'ANT'),
(133, 'YARUMAL', 'ANT'),
(134, 'YOLOMBO', 'ANT'),
(135, 'YONDO', 'ANT'),
(136, 'ZARAGOZA', 'ANT'),
(137, 'ARAUCA', 'ARA'),
(138, 'ARAUQUITA', 'ARA'),
(139, 'CRAVO NORTE', 'ARA'),
(140, 'FORTUL', 'ARA'),
(141, 'PUERTO RONDON', 'ARA'),
(142, 'SARAVENA', 'ARA'),
(143, 'TAME', 'ARA'),
(144, 'BARANOA', 'ATL'),
(145, 'BARRANQUILLA', 'ATL'),
(146, 'CAMPO DE LA CRUZ', 'ATL'),
(147, 'CANDELARIA', 'ATL'),
(148, 'GALAPA', 'ATL'),
(149, 'JUAN DE ACOSTA', 'ATL'),
(150, 'LURUACO', 'ATL'),
(151, 'MALAMBO', 'ATL'),
(152, 'MANATI', 'ATL'),
(153, 'PALMAR DE VARELA', 'ATL'),
(154, 'PIOJO', 'ATL'),
(155, 'POLO NUEVO', 'ATL'),
(156, 'PONEDERA', 'ATL'),
(157, 'PUERTO COLOMBIA', 'ATL'),
(158, 'REPELON', 'ATL'),
(159, 'SABANAGRANDE', 'ATL'),
(160, 'SABANALARGA', 'ATL'),
(161, 'SANTA LUCIA', 'ATL'),
(162, 'SANTO TOMAS', 'ATL'),
(163, 'SOLEDAD', 'ATL'),
(164, 'SUAN', 'ATL'),
(165, 'TUBARA', 'ATL'),
(166, 'USIACURI', 'ATL'),
(167, 'ACHI', 'BOL'),
(168, 'ALTOS DEL ROSARIO', 'BOL'),
(169, 'ARENAL', 'BOL'),
(170, 'ARJONA', 'BOL'),
(171, 'ARROYOHONDO', 'BOL'),
(172, 'BARRANCO DE LOBA', 'BOL'),
(173, 'BRAZUELO DE PAPAYAL', 'BOL'),
(174, 'CALAMAR', 'BOL'),
(175, 'CANTAGALLO', 'BOL'),
(176, 'CARTAGENA DE INDIAS', 'BOL'),
(177, 'CICUCO', 'BOL'),
(178, 'CLEMENCIA', 'BOL'),
(179, 'CORDOBA', 'BOL'),
(180, 'EL CARMEN DE BOLIVAR', 'BOL'),
(181, 'EL GUAMO', 'BOL'),
(182, 'EL PENION', 'BOL'),
(183, 'HATILLO DE LOBA', 'BOL'),
(184, 'MAGANGUE', 'BOL'),
(185, 'MAHATES', 'BOL'),
(186, 'MARGARITA', 'BOL'),
(187, 'MARIA LA BAJA', 'BOL'),
(188, 'MONTECRISTO', 'BOL'),
(189, 'MORALES', 'BOL'),
(190, 'MORALES', 'BOL'),
(191, 'NOROSI', 'BOL'),
(192, 'PINILLOS', 'BOL'),
(193, 'REGIDOR', 'BOL'),
(194, 'RIO VIEJO', 'BOL'),
(195, 'SAN CRISTOBAL', 'BOL'),
(196, 'SAN ESTANISLAO', 'BOL'),
(197, 'SAN FERNANDO', 'BOL'),
(198, 'SAN JACINTO', 'BOL'),
(199, 'SAN JACINTO DEL CAUCA', 'BOL'),
(200, 'SAN JUAN DE NEPOMUCENO', 'BOL'),
(201, 'SAN MARTIN DE LOBA', 'BOL'),
(202, 'SAN PABLO', 'BOL'),
(203, 'SAN PABLO NORTE', 'BOL'),
(204, 'SANTA CATALINA', 'BOL'),
(205, 'SANTA CRUZ DE MOMPOX', 'BOL'),
(206, 'SANTA ROSA', 'BOL'),
(207, 'SANTA ROSA DEL SUR', 'BOL'),
(208, 'SIMITI', 'BOL'),
(209, 'SOPLAVIENTO', 'BOL'),
(210, 'TALAIGUA NUEVO', 'BOL'),
(211, 'TUQUISIO', 'BOL'),
(212, 'TURBACO', 'BOL'),
(213, 'TURBANA', 'BOL'),
(214, 'VILLANUEVA', 'BOL'),
(215, 'ZAMBRANO', 'BOL'),
(216, 'AQUITANIA', 'BOY'),
(217, 'ARCABUCO', 'BOY'),
(218, 'BELÉN', 'BOY'),
(219, 'BERBEO', 'BOY'),
(220, 'BETÉITIVA', 'BOY'),
(221, 'BOAVITA', 'BOY'),
(222, 'BOYACÁ', 'BOY'),
(223, 'BRICEÑO', 'BOY'),
(224, 'BUENAVISTA', 'BOY'),
(225, 'BUSBANZÁ', 'BOY'),
(226, 'CALDAS', 'BOY'),
(227, 'CAMPO HERMOSO', 'BOY'),
(228, 'CERINZA', 'BOY'),
(229, 'CHINAVITA', 'BOY'),
(230, 'CHIQUINQUIRÁ', 'BOY'),
(231, 'CHÍQUIZA', 'BOY'),
(232, 'CHISCAS', 'BOY'),
(233, 'CHITA', 'BOY'),
(234, 'CHITARAQUE', 'BOY'),
(235, 'CHIVATÁ', 'BOY'),
(236, 'CIÉNEGA', 'BOY'),
(237, 'CÓMBITA', 'BOY'),
(238, 'COPER', 'BOY'),
(239, 'CORRALES', 'BOY'),
(240, 'COVARACHÍA', 'BOY'),
(241, 'CUBARA', 'BOY'),
(242, 'CUCAITA', 'BOY'),
(243, 'CUITIVA', 'BOY'),
(244, 'DUITAMA', 'BOY'),
(245, 'EL COCUY', 'BOY'),
(246, 'EL ESPINO', 'BOY'),
(247, 'FIRAVITOBA', 'BOY'),
(248, 'FLORESTA', 'BOY'),
(249, 'GACHANTIVÁ', 'BOY'),
(250, 'GÁMEZA', 'BOY'),
(251, 'GARAGOA', 'BOY'),
(252, 'GUACAMAYAS', 'BOY'),
(253, 'GÜICÁN', 'BOY'),
(254, 'IZA', 'BOY'),
(255, 'JENESANO', 'BOY'),
(256, 'JERICÓ', 'BOY'),
(257, 'LA UVITA', 'BOY'),
(258, 'LA VICTORIA', 'BOY'),
(259, 'LABRANZA GRANDE', 'BOY'),
(260, 'MACANAL', 'BOY'),
(261, 'MARIPÍ', 'BOY'),
(262, 'MIRAFLORES', 'BOY'),
(263, 'MONGUA', 'BOY'),
(264, 'MONGUÍ', 'BOY'),
(265, 'MONIQUIRÁ', 'BOY'),
(266, 'MOTAVITA', 'BOY'),
(267, 'MUZO', 'BOY'),
(268, 'NOBSA', 'BOY'),
(269, 'NUEVO COLÓN', 'BOY'),
(270, 'OICATÁ', 'BOY'),
(271, 'OTANCHE', 'BOY'),
(272, 'PACHAVITA', 'BOY'),
(273, 'PÁEZ', 'BOY'),
(274, 'PAIPA', 'BOY'),
(275, 'PAJARITO', 'BOY'),
(276, 'PANQUEBA', 'BOY'),
(277, 'PAUNA', 'BOY'),
(278, 'PAYA', 'BOY'),
(279, 'PAZ DE RÍO', 'BOY'),
(280, 'PESCA', 'BOY'),
(281, 'PISBA', 'BOY'),
(282, 'PUERTO BOYACA', 'BOY'),
(283, 'QUÍPAMA', 'BOY'),
(284, 'RAMIRIQUÍ', 'BOY'),
(285, 'RÁQUIRA', 'BOY'),
(286, 'RONDÓN', 'BOY'),
(287, 'SABOYÁ', 'BOY'),
(288, 'SÁCHICA', 'BOY'),
(289, 'SAMACÁ', 'BOY'),
(290, 'SAN EDUARDO', 'BOY'),
(291, 'SAN JOSÉ DE PARE', 'BOY'),
(292, 'SAN LUÍS DE GACENO', 'BOY'),
(293, 'SAN MATEO', 'BOY'),
(294, 'SAN MIGUEL DE SEMA', 'BOY'),
(295, 'SAN PABLO DE BORBUR', 'BOY'),
(296, 'SANTA MARÍA', 'BOY'),
(297, 'SANTA ROSA DE VITERBO', 'BOY'),
(298, 'SANTA SOFÍA', 'BOY'),
(299, 'SANTANA', 'BOY'),
(300, 'SATIVANORTE', 'BOY'),
(301, 'SATIVASUR', 'BOY'),
(302, 'SIACHOQUE', 'BOY'),
(303, 'SOATÁ', 'BOY'),
(304, 'SOCHA', 'BOY'),
(305, 'SOCOTÁ', 'BOY'),
(306, 'SOGAMOSO', 'BOY'),
(307, 'SORA', 'BOY'),
(308, 'SORACÁ', 'BOY'),
(309, 'SOTAQUIRÁ', 'BOY'),
(310, 'SUSACÓN', 'BOY'),
(311, 'SUTARMACHÁN', 'BOY'),
(312, 'TASCO', 'BOY'),
(313, 'TIBANÁ', 'BOY'),
(314, 'TIBASOSA', 'BOY'),
(315, 'TINJACÁ', 'BOY'),
(316, 'TIPACOQUE', 'BOY'),
(317, 'TOCA', 'BOY'),
(318, 'TOGÜÍ', 'BOY'),
(319, 'TÓPAGA', 'BOY'),
(320, 'TOTA', 'BOY'),
(321, 'TUNJA', 'BOY'),
(322, 'TUNUNGUÁ', 'BOY'),
(323, 'TURMEQUÉ', 'BOY'),
(324, 'TUTA', 'BOY'),
(325, 'TUTAZÁ', 'BOY'),
(326, 'UMBITA', 'BOY'),
(327, 'VENTA QUEMADA', 'BOY'),
(328, 'VILLA DE LEYVA', 'BOY'),
(329, 'VIRACACHÁ', 'BOY'),
(330, 'ZETAQUIRA', 'BOY'),
(331, 'AGUADAS', 'CAL'),
(332, 'ANSERMA', 'CAL'),
(333, 'ARANZAZU', 'CAL'),
(334, 'BELALCAZAR', 'CAL'),
(335, 'CHINCHINÁ', 'CAL'),
(336, 'FILADELFIA', 'CAL'),
(337, 'LA DORADA', 'CAL'),
(338, 'LA MERCED', 'CAL'),
(339, 'MANIZALES', 'CAL'),
(340, 'MANZANARES', 'CAL'),
(341, 'MARMATO', 'CAL'),
(342, 'MARQUETALIA', 'CAL'),
(343, 'MARULANDA', 'CAL'),
(344, 'NEIRA', 'CAL'),
(345, 'NORCASIA', 'CAL'),
(346, 'PACORA', 'CAL'),
(347, 'PALESTINA', 'CAL'),
(348, 'PENSILVANIA', 'CAL'),
(349, 'RIOSUCIO', 'CAL'),
(350, 'RISARALDA', 'CAL'),
(351, 'SALAMINA', 'CAL'),
(352, 'SAMANA', 'CAL'),
(353, 'SAN JOSE', 'CAL'),
(354, 'SUPÍA', 'CAL'),
(355, 'VICTORIA', 'CAL'),
(356, 'VILLAMARÍA', 'CAL'),
(357, 'VITERBO', 'CAL'),
(358, 'ALBANIA', 'CAQ'),
(359, 'BELÉN ANDAQUIES', 'CAQ'),
(360, 'CARTAGENA DEL CHAIRA', 'CAQ'),
(361, 'CURILLO', 'CAQ'),
(362, 'EL DONCELLO', 'CAQ'),
(363, 'EL PAUJIL', 'CAQ'),
(364, 'FLORENCIA', 'CAQ'),
(365, 'LA MONTAÑITA', 'CAQ'),
(366, 'MILÁN', 'CAQ'),
(367, 'MORELIA', 'CAQ'),
(368, 'PUERTO RICO', 'CAQ'),
(369, 'SAN  VICENTE DEL CAGUAN', 'CAQ'),
(370, 'SAN JOSÉ DE FRAGUA', 'CAQ'),
(371, 'SOLANO', 'CAQ'),
(372, 'SOLITA', 'CAQ'),
(373, 'VALPARAÍSO', 'CAQ'),
(374, 'AGUAZUL', 'CAS'),
(375, 'CHAMEZA', 'CAS'),
(376, 'HATO COROZAL', 'CAS'),
(377, 'LA SALINA', 'CAS'),
(378, 'MANÍ', 'CAS'),
(379, 'MONTERREY', 'CAS'),
(380, 'NUNCHIA', 'CAS'),
(381, 'OROCUE', 'CAS'),
(382, 'PAZ DE ARIPORO', 'CAS'),
(383, 'PORE', 'CAS'),
(384, 'RECETOR', 'CAS'),
(385, 'SABANA LARGA', 'CAS'),
(386, 'SACAMA', 'CAS'),
(387, 'SAN LUIS DE PALENQUE', 'CAS'),
(388, 'TAMARA', 'CAS'),
(389, 'TAURAMENA', 'CAS'),
(390, 'TRINIDAD', 'CAS'),
(391, 'VILLANUEVA', 'CAS'),
(392, 'YOPAL', 'CAS'),
(393, 'ALMAGUER', 'CAU'),
(394, 'ARGELIA', 'CAU'),
(395, 'BALBOA', 'CAU'),
(396, 'BOLÍVAR', 'CAU'),
(397, 'BUENOS AIRES', 'CAU'),
(398, 'CAJIBIO', 'CAU'),
(399, 'CALDONO', 'CAU'),
(400, 'CALOTO', 'CAU'),
(401, 'CORINTO', 'CAU'),
(402, 'EL TAMBO', 'CAU'),
(403, 'FLORENCIA', 'CAU'),
(404, 'GUAPI', 'CAU'),
(405, 'INZA', 'CAU'),
(406, 'JAMBALÓ', 'CAU'),
(407, 'LA SIERRA', 'CAU'),
(408, 'LA VEGA', 'CAU'),
(409, 'LÓPEZ', 'CAU'),
(410, 'MERCADERES', 'CAU'),
(411, 'MIRANDA', 'CAU'),
(412, 'MORALES', 'CAU'),
(413, 'PADILLA', 'CAU'),
(414, 'PÁEZ', 'CAU'),
(415, 'PATIA (EL BORDO)', 'CAU'),
(416, 'PIAMONTE', 'CAU'),
(417, 'PIENDAMO', 'CAU'),
(418, 'POPAYÁN', 'CAU'),
(419, 'PUERTO TEJADA', 'CAU'),
(420, 'PURACE', 'CAU'),
(421, 'ROSAS', 'CAU'),
(422, 'SAN SEBASTIÁN', 'CAU'),
(423, 'SANTA ROSA', 'CAU'),
(424, 'SANTANDER DE QUILICHAO', 'CAU'),
(425, 'SILVIA', 'CAU'),
(426, 'SOTARA', 'CAU'),
(427, 'SUÁREZ', 'CAU'),
(428, 'SUCRE', 'CAU'),
(429, 'TIMBÍO', 'CAU'),
(430, 'TIMBIQUÍ', 'CAU'),
(431, 'TORIBIO', 'CAU'),
(432, 'TOTORO', 'CAU'),
(433, 'VILLA RICA', 'CAU'),
(434, 'AGUACHICA', 'CES'),
(435, 'AGUSTÍN CODAZZI', 'CES'),
(436, 'ASTREA', 'CES'),
(437, 'BECERRIL', 'CES'),
(438, 'BOSCONIA', 'CES'),
(439, 'CHIMICHAGUA', 'CES'),
(440, 'CHIRIGUANÁ', 'CES'),
(441, 'CURUMANÍ', 'CES'),
(442, 'EL COPEY', 'CES'),
(443, 'EL PASO', 'CES'),
(444, 'GAMARRA', 'CES'),
(445, 'GONZÁLEZ', 'CES'),
(446, 'LA GLORIA', 'CES'),
(447, 'LA JAGUA IBIRICO', 'CES'),
(448, 'MANAURE BALCÓN DEL CESAR', 'CES'),
(449, 'PAILITAS', 'CES'),
(450, 'PELAYA', 'CES'),
(451, 'PUEBLO BELLO', 'CES'),
(452, 'RÍO DE ORO', 'CES'),
(453, 'ROBLES (LA PAZ)', 'CES'),
(454, 'SAN ALBERTO', 'CES'),
(455, 'SAN DIEGO', 'CES'),
(456, 'SAN MARTÍN', 'CES'),
(457, 'TAMALAMEQUE', 'CES'),
(458, 'VALLEDUPAR', 'CES'),
(459, 'ACANDI', 'CHO'),
(460, 'ALTO BAUDO (PIE DE PATO)', 'CHO'),
(461, 'ATRATO', 'CHO'),
(462, 'BAGADO', 'CHO'),
(463, 'BAHIA SOLANO (MUTIS)', 'CHO'),
(464, 'BAJO BAUDO (PIZARRO)', 'CHO'),
(465, 'BOJAYA (BELLAVISTA)', 'CHO'),
(466, 'CANTON DE SAN PABLO', 'CHO'),
(467, 'CARMEN DEL DARIEN', 'CHO'),
(468, 'CERTEGUI', 'CHO'),
(469, 'CONDOTO', 'CHO'),
(470, 'EL CARMEN', 'CHO'),
(471, 'ISTMINA', 'CHO'),
(472, 'JURADO', 'CHO'),
(473, 'LITORAL DEL SAN JUAN', 'CHO'),
(474, 'LLORO', 'CHO'),
(475, 'MEDIO ATRATO', 'CHO'),
(476, 'MEDIO BAUDO (BOCA DE PEPE)', 'CHO'),
(477, 'MEDIO SAN JUAN', 'CHO'),
(478, 'NOVITA', 'CHO'),
(479, 'NUQUI', 'CHO'),
(480, 'QUIBDO', 'CHO'),
(481, 'RIO IRO', 'CHO'),
(482, 'RIO QUITO', 'CHO'),
(483, 'RIOSUCIO', 'CHO'),
(484, 'SAN JOSE DEL PALMAR', 'CHO'),
(485, 'SIPI', 'CHO'),
(486, 'TADO', 'CHO'),
(487, 'UNGUIA', 'CHO'),
(488, 'UNIÓN PANAMERICANA', 'CHO'),
(489, 'AYAPEL', 'COR'),
(490, 'BUENAVISTA', 'COR'),
(491, 'CANALETE', 'COR'),
(492, 'CERETÉ', 'COR'),
(493, 'CHIMA', 'COR'),
(494, 'CHINÚ', 'COR'),
(495, 'CIENAGA DE ORO', 'COR'),
(496, 'COTORRA', 'COR'),
(497, 'LA APARTADA', 'COR'),
(498, 'LORICA', 'COR'),
(499, 'LOS CÓRDOBAS', 'COR'),
(500, 'MOMIL', 'COR'),
(501, 'MONTELÍBANO', 'COR'),
(502, 'MONTERÍA', 'COR'),
(503, 'MOÑITOS', 'COR'),
(504, 'PLANETA RICA', 'COR'),
(505, 'PUEBLO NUEVO', 'COR'),
(506, 'PUERTO ESCONDIDO', 'COR'),
(507, 'PUERTO LIBERTADOR', 'COR'),
(508, 'PURÍSIMA', 'COR'),
(509, 'SAHAGÚN', 'COR'),
(510, 'SAN ANDRÉS SOTAVENTO', 'COR'),
(511, 'SAN ANTERO', 'COR'),
(512, 'SAN BERNARDO VIENTO', 'COR'),
(513, 'SAN CARLOS', 'COR'),
(514, 'SAN PELAYO', 'COR'),
(515, 'TIERRALTA', 'COR'),
(516, 'VALENCIA', 'COR'),
(517, 'AGUA DE DIOS', 'CUN'),
(518, 'ALBAN', 'CUN'),
(519, 'ANAPOIMA', 'CUN'),
(520, 'ANOLAIMA', 'CUN'),
(521, 'ARBELAEZ', 'CUN'),
(522, 'BELTRÁN', 'CUN'),
(523, 'BITUIMA', 'CUN'),
(524, 'BOGOTÁ DC', 'CUN'),
(525, 'BOJACÁ', 'CUN'),
(526, 'CABRERA', 'CUN'),
(527, 'CACHIPAY', 'CUN'),
(528, 'CAJICÁ', 'CUN'),
(529, 'CAPARRAPÍ', 'CUN'),
(530, 'CAQUEZA', 'CUN'),
(531, 'CARMEN DE CARUPA', 'CUN'),
(532, 'CHAGUANÍ', 'CUN'),
(533, 'CHIA', 'CUN'),
(534, 'CHIPAQUE', 'CUN'),
(535, 'CHOACHÍ', 'CUN'),
(536, 'CHOCONTÁ', 'CUN'),
(537, 'COGUA', 'CUN'),
(538, 'COTA', 'CUN'),
(539, 'CUCUNUBÁ', 'CUN'),
(540, 'EL COLEGIO', 'CUN'),
(541, 'EL PEÑÓN', 'CUN'),
(542, 'EL ROSAL1', 'CUN'),
(543, 'FACATATIVA', 'CUN'),
(544, 'FÓMEQUE', 'CUN'),
(545, 'FOSCA', 'CUN'),
(546, 'FUNZA', 'CUN'),
(547, 'FÚQUENE', 'CUN'),
(548, 'FUSAGASUGA', 'CUN'),
(549, 'GACHALÁ', 'CUN'),
(550, 'GACHANCIPÁ', 'CUN'),
(551, 'GACHETA', 'CUN'),
(552, 'GAMA', 'CUN'),
(553, 'GIRARDOT', 'CUN'),
(554, 'GRANADA2', 'CUN'),
(555, 'GUACHETÁ', 'CUN'),
(556, 'GUADUAS', 'CUN'),
(557, 'GUASCA', 'CUN'),
(558, 'GUATAQUÍ', 'CUN'),
(559, 'GUATAVITA', 'CUN'),
(560, 'GUAYABAL DE SIQUIMA', 'CUN'),
(561, 'GUAYABETAL', 'CUN'),
(562, 'GUTIÉRREZ', 'CUN'),
(563, 'JERUSALÉN', 'CUN'),
(564, 'JUNÍN', 'CUN'),
(565, 'LA CALERA', 'CUN'),
(566, 'LA MESA', 'CUN'),
(567, 'LA PALMA', 'CUN'),
(568, 'LA PEÑA', 'CUN'),
(569, 'LA VEGA', 'CUN'),
(570, 'LENGUAZAQUE', 'CUN'),
(571, 'MACHETÁ', 'CUN'),
(572, 'MADRID', 'CUN'),
(573, 'MANTA', 'CUN'),
(574, 'MEDINA', 'CUN'),
(575, 'MOSQUERA', 'CUN'),
(576, 'NARIÑO', 'CUN'),
(577, 'NEMOCÓN', 'CUN'),
(578, 'NILO', 'CUN'),
(579, 'NIMAIMA', 'CUN'),
(580, 'NOCAIMA', 'CUN'),
(581, 'OSPINA PÉREZ', 'CUN'),
(582, 'PACHO', 'CUN'),
(583, 'PAIME', 'CUN'),
(584, 'PANDI', 'CUN'),
(585, 'PARATEBUENO', 'CUN'),
(586, 'PASCA', 'CUN'),
(587, 'PUERTO SALGAR', 'CUN'),
(588, 'PULÍ', 'CUN'),
(589, 'QUEBRADANEGRA', 'CUN'),
(590, 'QUETAME', 'CUN'),
(591, 'QUIPILE', 'CUN'),
(592, 'RAFAEL REYES', 'CUN'),
(593, 'RICAURTE', 'CUN'),
(594, 'SAN  ANTONIO DEL  TEQUENDAMA', 'CUN'),
(595, 'SAN BERNARDO', 'CUN'),
(596, 'SAN CAYETANO', 'CUN'),
(597, 'SAN FRANCISCO', 'CUN'),
(598, 'SAN JUAN DE RIOSECO', 'CUN'),
(599, 'SASAIMA', 'CUN'),
(600, 'SESQUILÉ', 'CUN'),
(601, 'SIBATÉ', 'CUN'),
(602, 'SILVANIA', 'CUN'),
(603, 'SIMIJACA', 'CUN'),
(604, 'SOACHA', 'CUN'),
(605, 'SOPO', 'CUN'),
(606, 'SUBACHOQUE', 'CUN'),
(607, 'SUESCA', 'CUN'),
(608, 'SUPATÁ', 'CUN'),
(609, 'SUSA', 'CUN'),
(610, 'SUTATAUSA', 'CUN'),
(611, 'TABIO', 'CUN'),
(612, 'TAUSA', 'CUN'),
(613, 'TENA', 'CUN'),
(614, 'TENJO', 'CUN'),
(615, 'TIBACUY', 'CUN'),
(616, 'TIBIRITA', 'CUN'),
(617, 'TOCAIMA', 'CUN'),
(618, 'TOCANCIPÁ', 'CUN'),
(619, 'TOPAIPÍ', 'CUN'),
(620, 'UBALÁ', 'CUN'),
(621, 'UBAQUE', 'CUN'),
(622, 'UBATÉ', 'CUN'),
(623, 'UNE', 'CUN'),
(624, 'UTICA', 'CUN'),
(625, 'VERGARA', 'CUN'),
(626, 'VIANI', 'CUN'),
(627, 'VILLA GOMEZ', 'CUN'),
(628, 'VILLA PINZÓN', 'CUN'),
(629, 'VILLETA', 'CUN'),
(630, 'VIOTA', 'CUN'),
(631, 'YACOPÍ', 'CUN'),
(632, 'ZIPACÓN', 'CUN'),
(633, 'ZIPAQUIRÁ', 'CUN'),
(634, 'BARRANCO MINAS', 'GUA'),
(635, 'CACAHUAL', 'GUA'),
(636, 'INÍRIDA', 'GUA'),
(637, 'LA GUADALUPE', 'GUA'),
(638, 'MAPIRIPANA', 'GUA'),
(639, 'MORICHAL', 'GUA'),
(640, 'PANA PANA', 'GUA'),
(641, 'PUERTO COLOMBIA', 'GUA'),
(642, 'SAN FELIPE', 'GUA'),
(643, 'CALAMAR', 'GUV'),
(644, 'EL RETORNO', 'GUV'),
(645, 'MIRAFLOREZ', 'GUV'),
(646, 'SAN JOSÉ DEL GUAVIARE', 'GUV'),
(647, 'ACEVEDO', 'HUI'),
(648, 'AGRADO', 'HUI'),
(649, 'AIPE', 'HUI'),
(650, 'ALGECIRAS', 'HUI'),
(651, 'ALTAMIRA', 'HUI'),
(652, 'BARAYA', 'HUI'),
(653, 'CAMPO ALEGRE', 'HUI'),
(654, 'COLOMBIA', 'HUI'),
(655, 'ELIAS', 'HUI'),
(656, 'GARZÓN', 'HUI'),
(657, 'GIGANTE', 'HUI'),
(658, 'GUADALUPE', 'HUI'),
(659, 'HOBO', 'HUI'),
(660, 'IQUIRA', 'HUI'),
(661, 'ISNOS', 'HUI'),
(662, 'LA ARGENTINA', 'HUI'),
(663, 'LA PLATA', 'HUI'),
(664, 'NATAGA', 'HUI'),
(665, 'NEIVA', 'HUI'),
(666, 'OPORAPA', 'HUI'),
(667, 'PAICOL', 'HUI'),
(668, 'PALERMO', 'HUI'),
(669, 'PALESTINA', 'HUI'),
(670, 'PITAL', 'HUI'),
(671, 'PITALITO', 'HUI'),
(672, 'RIVERA', 'HUI'),
(673, 'SALADO BLANCO', 'HUI'),
(674, 'SAN AGUSTÍN', 'HUI'),
(675, 'SANTA MARIA', 'HUI'),
(676, 'SUAZA', 'HUI'),
(677, 'TARQUI', 'HUI'),
(678, 'TELLO', 'HUI'),
(679, 'TERUEL', 'HUI'),
(680, 'TESALIA', 'HUI'),
(681, 'TIMANA', 'HUI'),
(682, 'VILLAVIEJA', 'HUI'),
(683, 'YAGUARA', 'HUI'),
(684, 'ALBANIA', 'LAG'),
(685, 'BARRANCAS', 'LAG'),
(686, 'DIBULLA', 'LAG'),
(687, 'DISTRACCIÓN', 'LAG'),
(688, 'EL MOLINO', 'LAG'),
(689, 'FONSECA', 'LAG'),
(690, 'HATO NUEVO', 'LAG'),
(691, 'LA JAGUA DEL PILAR', 'LAG'),
(692, 'MAICAO', 'LAG'),
(693, 'MANAURE', 'LAG'),
(694, 'RIOHACHA', 'LAG'),
(695, 'SAN JUAN DEL CESAR', 'LAG'),
(696, 'URIBIA', 'LAG'),
(697, 'URUMITA', 'LAG'),
(698, 'VILLANUEVA', 'LAG'),
(699, 'ALGARROBO', 'MAG'),
(700, 'ARACATACA', 'MAG'),
(701, 'ARIGUANI', 'MAG'),
(702, 'CERRO SAN ANTONIO', 'MAG'),
(703, 'CHIVOLO', 'MAG'),
(704, 'CIENAGA', 'MAG'),
(705, 'CONCORDIA', 'MAG'),
(706, 'EL BANCO', 'MAG'),
(707, 'EL PIÑON', 'MAG'),
(708, 'EL RETEN', 'MAG'),
(709, 'FUNDACION', 'MAG'),
(710, 'GUAMAL', 'MAG'),
(711, 'NUEVA GRANADA', 'MAG'),
(712, 'PEDRAZA', 'MAG'),
(713, 'PIJIÑO DEL CARMEN', 'MAG'),
(714, 'PIVIJAY', 'MAG'),
(715, 'PLATO', 'MAG'),
(716, 'PUEBLO VIEJO', 'MAG'),
(717, 'REMOLINO', 'MAG'),
(718, 'SABANAS DE SAN ANGEL', 'MAG'),
(719, 'SALAMINA', 'MAG'),
(720, 'SAN SEBASTIAN DE BUENAVISTA', 'MAG'),
(721, 'SAN ZENON', 'MAG'),
(722, 'SANTA ANA', 'MAG'),
(723, 'SANTA BARBARA DE PINTO', 'MAG'),
(724, 'SANTA MARTA', 'MAG'),
(725, 'SITIONUEVO', 'MAG'),
(726, 'TENERIFE', 'MAG'),
(727, 'ZAPAYAN', 'MAG'),
(728, 'ZONA BANANERA', 'MAG'),
(729, 'ACACIAS', 'MET'),
(730, 'BARRANCA DE UPIA', 'MET'),
(731, 'CABUYARO', 'MET'),
(732, 'CASTILLA LA NUEVA', 'MET'),
(733, 'CUBARRAL', 'MET'),
(734, 'CUMARAL', 'MET'),
(735, 'EL CALVARIO', 'MET'),
(736, 'EL CASTILLO', 'MET'),
(737, 'EL DORADO', 'MET'),
(738, 'FUENTE DE ORO', 'MET'),
(739, 'GRANADA', 'MET'),
(740, 'GUAMAL', 'MET'),
(741, 'LA MACARENA', 'MET'),
(742, 'LA URIBE', 'MET'),
(743, 'LEJANÍAS', 'MET'),
(744, 'MAPIRIPÁN', 'MET'),
(745, 'MESETAS', 'MET'),
(746, 'PUERTO CONCORDIA', 'MET'),
(747, 'PUERTO GAITÁN', 'MET'),
(748, 'PUERTO LLERAS', 'MET'),
(749, 'PUERTO LÓPEZ', 'MET'),
(750, 'PUERTO RICO', 'MET'),
(751, 'RESTREPO', 'MET'),
(752, 'SAN  JUAN DE ARAMA', 'MET'),
(753, 'SAN CARLOS GUAROA', 'MET'),
(754, 'SAN JUANITO', 'MET'),
(755, 'SAN MARTÍN', 'MET'),
(756, 'VILLAVICENCIO', 'MET'),
(757, 'VISTA HERMOSA', 'MET'),
(758, 'ALBAN', 'NAR'),
(759, 'ALDAÑA', 'NAR'),
(760, 'ANCUYA', 'NAR'),
(761, 'ARBOLEDA', 'NAR'),
(762, 'BARBACOAS', 'NAR'),
(763, 'BELEN', 'NAR'),
(764, 'BUESACO', 'NAR'),
(765, 'CHACHAGUI', 'NAR'),
(766, 'COLON (GENOVA)', 'NAR'),
(767, 'CONSACA', 'NAR'),
(768, 'CONTADERO', 'NAR'),
(769, 'CORDOBA', 'NAR'),
(770, 'CUASPUD', 'NAR'),
(771, 'CUMBAL', 'NAR'),
(772, 'CUMBITARA', 'NAR'),
(773, 'EL CHARCO', 'NAR'),
(774, 'EL PEÑOL', 'NAR'),
(775, 'EL ROSARIO', 'NAR'),
(776, 'EL TABLÓN', 'NAR'),
(777, 'EL TAMBO', 'NAR'),
(778, 'FUNES', 'NAR'),
(779, 'GUACHUCAL', 'NAR'),
(780, 'GUAITARILLA', 'NAR'),
(781, 'GUALMATAN', 'NAR'),
(782, 'ILES', 'NAR'),
(783, 'IMUES', 'NAR'),
(784, 'IPIALES', 'NAR'),
(785, 'LA CRUZ', 'NAR'),
(786, 'LA FLORIDA', 'NAR'),
(787, 'LA LLANADA', 'NAR'),
(788, 'LA TOLA', 'NAR'),
(789, 'LA UNION', 'NAR'),
(790, 'LEIVA', 'NAR'),
(791, 'LINARES', 'NAR'),
(792, 'LOS ANDES', 'NAR'),
(793, 'MAGUI', 'NAR'),
(794, 'MALLAMA', 'NAR'),
(795, 'MOSQUEZA', 'NAR'),
(796, 'NARIÑO', 'NAR'),
(797, 'OLAYA HERRERA', 'NAR'),
(798, 'OSPINA', 'NAR'),
(799, 'PASTO', 'NAR'),
(800, 'PIZARRO', 'NAR'),
(801, 'POLICARPA', 'NAR'),
(802, 'POTOSI', 'NAR'),
(803, 'PROVIDENCIA', 'NAR'),
(804, 'PUERRES', 'NAR'),
(805, 'PUPIALES', 'NAR'),
(806, 'RICAURTE', 'NAR'),
(807, 'ROBERTO PAYAN', 'NAR'),
(808, 'SAMANIEGO', 'NAR'),
(809, 'SAN BERNARDO', 'NAR'),
(810, 'SAN LORENZO', 'NAR'),
(811, 'SAN PABLO', 'NAR'),
(812, 'SAN PEDRO DE CARTAGO', 'NAR'),
(813, 'SANDONA', 'NAR'),
(814, 'SANTA BARBARA', 'NAR'),
(815, 'SANTACRUZ', 'NAR'),
(816, 'SAPUYES', 'NAR'),
(817, 'TAMINANGO', 'NAR'),
(818, 'TANGUA', 'NAR'),
(819, 'TUMACO', 'NAR'),
(820, 'TUQUERRES', 'NAR'),
(821, 'YACUANQUER', 'NAR'),
(822, 'ABREGO', 'NSA'),
(823, 'ARBOLEDAS', 'NSA'),
(824, 'BOCHALEMA', 'NSA'),
(825, 'BUCARASICA', 'NSA'),
(826, 'CÁCHIRA', 'NSA'),
(827, 'CÁCOTA', 'NSA'),
(828, 'CHINÁCOTA', 'NSA'),
(829, 'CHITAGÁ', 'NSA'),
(830, 'CONVENCIÓN', 'NSA'),
(831, 'CÚCUTA', 'NSA'),
(832, 'CUCUTILLA', 'NSA'),
(833, 'DURANIA', 'NSA'),
(834, 'EL CARMEN', 'NSA'),
(835, 'EL TARRA', 'NSA'),
(836, 'EL ZULIA', 'NSA'),
(837, 'GRAMALOTE', 'NSA'),
(838, 'HACARI', 'NSA'),
(839, 'HERRÁN', 'NSA'),
(840, 'LA ESPERANZA', 'NSA'),
(841, 'LA PLAYA', 'NSA'),
(842, 'LABATECA', 'NSA'),
(843, 'LOS PATIOS', 'NSA'),
(844, 'LOURDES', 'NSA'),
(845, 'MUTISCUA', 'NSA'),
(846, 'OCAÑA', 'NSA'),
(847, 'PAMPLONA', 'NSA'),
(848, 'PAMPLONITA', 'NSA'),
(849, 'PUERTO SANTANDER', 'NSA'),
(850, 'RAGONVALIA', 'NSA'),
(851, 'SALAZAR', 'NSA'),
(852, 'SAN CALIXTO', 'NSA'),
(853, 'SAN CAYETANO', 'NSA'),
(854, 'SANTIAGO', 'NSA'),
(855, 'SARDINATA', 'NSA'),
(856, 'SILOS', 'NSA'),
(857, 'TEORAMA', 'NSA'),
(858, 'TIBÚ', 'NSA'),
(859, 'TOLEDO', 'NSA'),
(860, 'VILLA CARO', 'NSA'),
(861, 'VILLA DEL ROSARIO', 'NSA'),
(862, 'COLÓN', 'PUT'),
(863, 'MOCOA', 'PUT'),
(864, 'ORITO', 'PUT'),
(865, 'PUERTO ASÍS', 'PUT'),
(866, 'PUERTO CAYCEDO', 'PUT'),
(867, 'PUERTO GUZMÁN', 'PUT'),
(868, 'PUERTO LEGUÍZAMO', 'PUT'),
(869, 'SAN FRANCISCO', 'PUT'),
(870, 'SAN MIGUEL', 'PUT'),
(871, 'SANTIAGO', 'PUT'),
(872, 'SIBUNDOY', 'PUT'),
(873, 'VALLE DEL GUAMUEZ', 'PUT'),
(874, 'VILLAGARZÓN', 'PUT'),
(875, 'ARMENIA', 'QUI'),
(876, 'BUENAVISTA', 'QUI'),
(877, 'CALARCÁ', 'QUI'),
(878, 'CIRCASIA', 'QUI'),
(879, 'CÓRDOBA', 'QUI'),
(880, 'FILANDIA', 'QUI'),
(881, 'GÉNOVA', 'QUI'),
(882, 'LA TEBAIDA', 'QUI'),
(883, 'MONTENEGRO', 'QUI'),
(884, 'PIJAO', 'QUI'),
(885, 'QUIMBAYA', 'QUI'),
(886, 'SALENTO', 'QUI'),
(887, 'APIA', 'RIS'),
(888, 'BALBOA', 'RIS'),
(889, 'BELÉN DE UMBRÍA', 'RIS'),
(890, 'DOS QUEBRADAS', 'RIS'),
(891, 'GUATICA', 'RIS'),
(892, 'LA CELIA', 'RIS'),
(893, 'LA VIRGINIA', 'RIS'),
(894, 'MARSELLA', 'RIS'),
(895, 'MISTRATO', 'RIS'),
(896, 'PEREIRA', 'RIS'),
(897, 'PUEBLO RICO', 'RIS'),
(898, 'QUINCHÍA', 'RIS'),
(899, 'SANTA ROSA DE CABAL', 'RIS'),
(900, 'SANTUARIO', 'RIS'),
(901, 'PROVIDENCIA', 'SAP'),
(902, 'SAN ANDRES', 'SAP'),
(903, 'SANTA CATALINA', 'SAP'),
(904, 'AGUADA', 'SAN'),
(905, 'ALBANIA', 'SAN'),
(906, 'ARATOCA', 'SAN'),
(907, 'BARBOSA', 'SAN'),
(908, 'BARICHARA', 'SAN'),
(909, 'BARRANCABERMEJA', 'SAN'),
(910, 'BETULIA', 'SAN'),
(911, 'BOLÍVAR', 'SAN'),
(912, 'BUCARAMANGA', 'SAN'),
(913, 'CABRERA', 'SAN'),
(914, 'CALIFORNIA', 'SAN'),
(915, 'CAPITANEJO', 'SAN'),
(916, 'CARCASI', 'SAN'),
(917, 'CEPITA', 'SAN'),
(918, 'CERRITO', 'SAN'),
(919, 'CHARALÁ', 'SAN'),
(920, 'CHARTA', 'SAN'),
(921, 'CHIMA', 'SAN'),
(922, 'CHIPATÁ', 'SAN'),
(923, 'CIMITARRA', 'SAN'),
(924, 'CONCEPCIÓN', 'SAN'),
(925, 'CONFINES', 'SAN'),
(926, 'CONTRATACIÓN', 'SAN'),
(927, 'COROMORO', 'SAN'),
(928, 'CURITÍ', 'SAN'),
(929, 'EL CARMEN', 'SAN'),
(930, 'EL GUACAMAYO', 'SAN'),
(931, 'EL PEÑÓN', 'SAN'),
(932, 'EL PLAYÓN', 'SAN'),
(933, 'ENCINO', 'SAN'),
(934, 'ENCISO', 'SAN'),
(935, 'FLORIÁN', 'SAN'),
(936, 'FLORIDABLANCA', 'SAN'),
(937, 'GALÁN', 'SAN'),
(938, 'GAMBITA', 'SAN'),
(939, 'GIRÓN', 'SAN'),
(940, 'GUACA', 'SAN'),
(941, 'GUADALUPE', 'SAN'),
(942, 'GUAPOTA', 'SAN'),
(943, 'GUAVATÁ', 'SAN'),
(944, 'GUEPSA', 'SAN'),
(945, 'HATO', 'SAN'),
(946, 'JESÚS MARIA', 'SAN'),
(947, 'JORDÁN', 'SAN'),
(948, 'LA BELLEZA', 'SAN'),
(949, 'LA PAZ', 'SAN'),
(950, 'LANDAZURI', 'SAN'),
(951, 'LEBRIJA', 'SAN'),
(952, 'LOS SANTOS', 'SAN'),
(953, 'MACARAVITA', 'SAN'),
(954, 'MÁLAGA', 'SAN'),
(955, 'MATANZA', 'SAN'),
(956, 'MOGOTES', 'SAN'),
(957, 'MOLAGAVITA', 'SAN'),
(958, 'OCAMONTE', 'SAN'),
(959, 'OIBA', 'SAN'),
(960, 'ONZAGA', 'SAN'),
(961, 'PALMAR', 'SAN'),
(962, 'PALMAS DEL SOCORRO', 'SAN'),
(963, 'PÁRAMO', 'SAN'),
(964, 'PIEDECUESTA', 'SAN'),
(965, 'PINCHOTE', 'SAN'),
(966, 'PUENTE NACIONAL', 'SAN'),
(967, 'PUERTO PARRA', 'SAN'),
(968, 'PUERTO WILCHES', 'SAN'),
(969, 'RIONEGRO', 'SAN'),
(970, 'SABANA DE TORRES', 'SAN'),
(971, 'SAN ANDRÉS', 'SAN'),
(972, 'SAN BENITO', 'SAN'),
(973, 'SAN GIL', 'SAN'),
(974, 'SAN JOAQUÍN', 'SAN'),
(975, 'SAN JOSÉ DE MIRANDA', 'SAN'),
(976, 'SAN MIGUEL', 'SAN'),
(977, 'SAN VICENTE DE CHUCURÍ', 'SAN'),
(978, 'SANTA BÁRBARA', 'SAN'),
(979, 'SANTA HELENA', 'SAN'),
(980, 'SIMACOTA', 'SAN'),
(981, 'SOCORRO', 'SAN'),
(982, 'SUAITA', 'SAN'),
(983, 'SUCRE', 'SAN'),
(984, 'SURATA', 'SAN'),
(985, 'TONA', 'SAN'),
(986, 'VALLE SAN JOSÉ', 'SAN'),
(987, 'VÉLEZ', 'SAN'),
(988, 'VETAS', 'SAN'),
(989, 'VILLANUEVA', 'SAN'),
(990, 'ZAPATOCA', 'SAN'),
(991, 'BUENAVISTA', 'SUC'),
(992, 'CAIMITO', 'SUC'),
(993, 'CHALÁN', 'SUC'),
(994, 'COLOSO', 'SUC'),
(995, 'COROZAL', 'SUC'),
(996, 'EL ROBLE', 'SUC'),
(997, 'GALERAS', 'SUC'),
(998, 'GUARANDA', 'SUC'),
(999, 'LA UNIÓN', 'SUC'),
(1000, 'LOS PALMITOS', 'SUC'),
(1001, 'MAJAGUAL', 'SUC'),
(1002, 'MORROA', 'SUC'),
(1003, 'OVEJAS', 'SUC'),
(1004, 'PALMITO', 'SUC'),
(1005, 'SAMPUES', 'SUC'),
(1006, 'SAN BENITO ABAD', 'SUC'),
(1007, 'SAN JUAN DE BETULIA', 'SUC'),
(1008, 'SAN MARCOS', 'SUC'),
(1009, 'SAN ONOFRE', 'SUC'),
(1010, 'SAN PEDRO', 'SUC'),
(1011, 'SINCÉ', 'SUC'),
(1012, 'SINCELEJO', 'SUC'),
(1013, 'SUCRE', 'SUC'),
(1014, 'TOLÚ', 'SUC'),
(1015, 'TOLUVIEJO', 'SUC'),
(1016, 'ALPUJARRA', 'TOL'),
(1017, 'ALVARADO', 'TOL'),
(1018, 'AMBALEMA', 'TOL'),
(1019, 'ANZOATEGUI', 'TOL'),
(1020, 'ARMERO (GUAYABAL)', 'TOL'),
(1021, 'ATACO', 'TOL'),
(1022, 'CAJAMARCA', 'TOL'),
(1023, 'CARMEN DE APICALÁ', 'TOL'),
(1024, 'CASABIANCA', 'TOL'),
(1025, 'CHAPARRAL', 'TOL'),
(1026, 'COELLO', 'TOL'),
(1027, 'COYAIMA', 'TOL'),
(1028, 'CUNDAY', 'TOL'),
(1029, 'DOLORES', 'TOL'),
(1030, 'ESPINAL', 'TOL'),
(1031, 'FALÁN', 'TOL'),
(1032, 'FLANDES', 'TOL'),
(1033, 'FRESNO', 'TOL'),
(1034, 'GUAMO', 'TOL'),
(1035, 'HERVEO', 'TOL'),
(1036, 'HONDA', 'TOL'),
(1037, 'IBAGUÉ', 'TOL'),
(1038, 'ICONONZO', 'TOL'),
(1039, 'LÉRIDA', 'TOL'),
(1040, 'LÍBANO', 'TOL'),
(1041, 'MARIQUITA', 'TOL'),
(1042, 'MELGAR', 'TOL'),
(1043, 'MURILLO', 'TOL'),
(1044, 'NATAGAIMA', 'TOL'),
(1045, 'ORTEGA', 'TOL'),
(1046, 'PALOCABILDO', 'TOL'),
(1047, 'PIEDRAS PLANADAS', 'TOL'),
(1048, 'PRADO', 'TOL'),
(1049, 'PURIFICACIÓN', 'TOL'),
(1050, 'RIOBLANCO', 'TOL'),
(1051, 'RONCESVALLES', 'TOL'),
(1052, 'ROVIRA', 'TOL'),
(1053, 'SALDAÑA', 'TOL'),
(1054, 'SAN ANTONIO', 'TOL'),
(1055, 'SAN LUIS', 'TOL'),
(1056, 'SANTA ISABEL', 'TOL'),
(1057, 'SUÁREZ', 'TOL'),
(1058, 'VALLE DE SAN JUAN', 'TOL'),
(1059, 'VENADILLO', 'TOL'),
(1060, 'VILLAHERMOSA', 'TOL'),
(1061, 'VILLARRICA', 'TOL'),
(1062, 'ALCALÁ', 'VAC'),
(1063, 'ANDALUCÍA', 'VAC'),
(1064, 'ANSERMA NUEVO', 'VAC'),
(1065, 'ARGELIA', 'VAC'),
(1066, 'BOLÍVAR', 'VAC'),
(1067, 'BUENAVENTURA', 'VAC'),
(1068, 'BUGA', 'VAC'),
(1069, 'BUGALAGRANDE', 'VAC'),
(1070, 'CAICEDONIA', 'VAC'),
(1071, 'CALI', 'VAC'),
(1072, 'CALIMA (DARIEN)', 'VAC'),
(1073, 'CANDELARIA', 'VAC'),
(1074, 'CARTAGO', 'VAC'),
(1075, 'DAGUA', 'VAC'),
(1076, 'EL AGUILA', 'VAC'),
(1077, 'EL CAIRO', 'VAC'),
(1078, 'EL CERRITO', 'VAC'),
(1079, 'EL DOVIO', 'VAC'),
(1080, 'FLORIDA', 'VAC'),
(1081, 'GINEBRA GUACARI', 'VAC'),
(1082, 'JAMUNDÍ', 'VAC'),
(1083, 'LA CUMBRE', 'VAC'),
(1084, 'LA UNIÓN', 'VAC'),
(1085, 'LA VICTORIA', 'VAC'),
(1086, 'OBANDO', 'VAC'),
(1087, 'PALMIRA', 'VAC'),
(1088, 'PRADERA', 'VAC'),
(1089, 'RESTREPO', 'VAC'),
(1090, 'RIO FRÍO', 'VAC'),
(1091, 'ROLDANILLO', 'VAC'),
(1092, 'SAN PEDRO', 'VAC'),
(1093, 'SEVILLA', 'VAC'),
(1094, 'TORO', 'VAC'),
(1095, 'TRUJILLO', 'VAC'),
(1096, 'TULÚA', 'VAC'),
(1097, 'ULLOA', 'VAC'),
(1098, 'VERSALLES', 'VAC'),
(1099, 'VIJES', 'VAC'),
(1100, 'YOTOCO', 'VAC'),
(1101, 'YUMBO', 'VAC'),
(1102, 'ZARZAL', 'VAC'),
(1103, 'CARURÚ', 'VAU'),
(1104, 'MITÚ', 'VAU'),
(1105, 'PACOA', 'VAU'),
(1106, 'PAPUNAUA', 'VAU'),
(1107, 'TARAIRA', 'VAU'),
(1108, 'YAVARATÉ', 'VAU'),
(1109, 'CUMARIBO', 'VID'),
(1110, 'LA PRIMAVERA', 'VID'),
(1111, 'PUERTO CARREÑO', 'VID'),
(1112, 'SANTA ROSALIA', 'VID'),
(1113, 'prueba', 'ATL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `det` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `det`, `pais`) VALUES
('AMA', 'AMAZONAS', 'co'),
('ANT', 'ANTIOQUIA', 'co'),
('ARA', 'ARAUCA', 'co'),
('ATL', 'ATLÁNTICO', 'co'),
('BOL', 'BOLÍVAR', 'co'),
('BOY', 'BOYACÁ', 'co'),
('CAL', 'CALDAS', 'co'),
('CAQ', 'CAQUETÁ', 'co'),
('CAS', 'CASANARE', 'co'),
('CAU', 'CAUCA', 'co'),
('CES', 'CESAR', 'co'),
('CHO', 'CHOCÓ', 'co'),
('COR', 'CÓRDOBA', 'co'),
('CUN', 'CUNDINAMARCA', 'co'),
('GUA', 'GUAINÍA', 'co'),
('GUV', 'GUAVIARE', 'co'),
('HUI', 'HUILA', 'co'),
('LAG', 'LA GUAJIRA', 'co'),
('MAG', 'MAGDALENA', 'co'),
('MET', 'META', 'co'),
('NAR', 'NARIÑO', 'co'),
('NSA', 'NORTE DE SANTANDER', 'co'),
('PUT', 'PUTUMAYO', 'co'),
('QUI', 'QUINDÍO', 'co'),
('RIS', 'RISARALDA', 'co'),
('SAN', 'SANTANDER', 'co'),
('SAP', 'SAN ANDRÉS Y ROVIDENCIA', 'co'),
('SUC', 'SUCRE', 'co'),
('TOL', 'TOLIMA', 'co'),
('VAC', 'VALLE DEL CAUCA', 'co'),
('VAU', 'VAUPÉS', 'co'),
('VID', 'VICHADA', 'co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id` bigint(20) NOT NULL,
  `carros_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tip_docu` bigint(20) NOT NULL,
  `documento` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'se almacena la url del documento almacenado en el proyecto ',
  `fvence` date NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '1 vigente, 2 vencido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id`, `carros_id`, `tip_docu`, `documento`, `fvence`, `estado`) VALUES
(1, 'HGO217', 2, './Documentacion/1.JPG', '2016-11-26', 2),
(2, 'HGO217', 1, './Documentacion/2.JPG', '2023-11-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` bigint(20) NOT NULL,
  `tipos_egreso` bigint(20) NOT NULL,
  `carro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `valor` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `tipos_egreso`, `carro`, `detalle`, `valor`, `fecha`) VALUES
(1, 1, 'abc123', 'LAVADERO PUERTO RICO', 50000, '2016-11-23'),
(2, 2, 'abc123', 'almacen doña chepita', 50000, '2016-11-16'),
(3, 3, 'QHX790', 'periodicos', 40000, '2016-11-22'),
(4, 1, 'abc123', 'cambio de motor y pintada', 9000000, '2017-02-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) NOT NULL,
  `carro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` bigint(20) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `carro`, `tipo`, `foto`) VALUES
(1, 'HTR182', 1, './Carros/1.JPG'),
(2, 'HTR182', 2, './Carros/2.JPG'),
(3, 'HTR182', 6, './Carros/3.JPG'),
(4, 'UUZ416', 1, './Carros/4.jpg'),
(5, 'HTR182', 7, './Carros/5.JPG'),
(6, 'UUZ416', 5, './Carros/6.JPG'),
(7, 'UUZ416', 6, './Carros/7.JPG'),
(8, 'UUZ416', 2, './Carros/8.JPG'),
(9, 'CXD283', 1, './Carros/9.JPG'),
(10, 'CXD283', 6, './Carros/10.JPG'),
(11, 'CXD283', 2, './Carros/11.JPG'),
(12, 'CXD283', 4, './Carros/12.JPG'),
(14, 'QHX790', 2, './Carros/14.JPG'),
(15, 'QHX790', 5, './Carros/15.JPG'),
(16, 'QHX790', 6, './Carros/16.JPG'),
(17, 'QHX790', 4, './Carros/17.JPG'),
(18, 'HGO217', 1, './Carros/18.jpg'),
(19, 'HGO217', 2, './Carros/19.jpg'),
(20, 'HGO217', 5, './Carros/20.jpg'),
(21, 'HGO217', 6, './Carros/21.jpg'),
(22, 'abc123', 1, './Carros/22.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` bigint(20) NOT NULL,
  `det` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `det`) VALUES
(1, 'Alfa Romeo'),
(2, 'Aston Martin'),
(4, 'Bentley'),
(5, 'BMW'),
(6, 'Cadillac'),
(7, 'Caterham'),
(8, 'Chevrolet'),
(9, 'Chrysler'),
(13, 'DAF'),
(14, 'Daihatsu'),
(15, 'Dodge'),
(16, 'Ferrari'),
(17, 'Fiat'),
(18, 'Ford'),
(20, 'Honda'),
(21, 'Hummer'),
(22, 'Hyundai'),
(23, 'Isuzu'),
(24, 'Iveco'),
(25, 'Jaguar'),
(26, 'Jeep'),
(27, 'Kia'),
(28, 'Lamborghini'),
(29, 'Lancia'),
(30, 'Land Rover'),
(31, 'Lexus'),
(32, 'Lotus'),
(33, 'Maserati'),
(34, 'Maybach'),
(36, 'Mercedes'),
(37, 'MG'),
(38, 'Mini'),
(39, 'Mitsubishi'),
(40, 'Morgan'),
(41, 'Nissan'),
(42, 'Opel'),
(43, 'Peugeot'),
(44, 'Piaggio'),
(45, 'Porsche'),
(46, 'Renault'),
(47, 'Rolls-Royce'),
(48, 'Rover'),
(49, 'Saab'),
(50, 'Santana'),
(51, 'Seat'),
(52, 'Skoda'),
(53, 'Smart'),
(54, 'SSangYong'),
(55, 'Subaru'),
(56, 'Suzuki'),
(57, 'Tata'),
(58, 'TOYOTA'),
(59, 'Vaz'),
(60, 'Volkswagen'),
(61, 'Volvo'),
(62, 'Acura'),
(63, 'Aro'),
(64, 'Asia'),
(65, 'BYD'),
(66, 'Baic'),
(67, 'Beijing'),
(68, 'Brilliance'),
(69, 'Buick'),
(70, 'Chana'),
(71, 'Changan'),
(72, 'Changhe'),
(73, 'Chery'),
(74, 'Daewoo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` bigint(20) NOT NULL,
  `det` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `marca` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `det`, `marca`) VALUES
(1, 'FIESTA', 18),
(2, 'RIO', 27),
(3, '320I', 5),
(4, 'FORTUNER', 58),
(5, 'PICANTO', 27),
(6, 'captur', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `det` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `det`) VALUES
('AD', 'Andorra'),
('AE', 'Emiratos Árabes Unidos'),
('AF', 'Afganistán'),
('AG', 'Antigua y Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Antillas Holandesas'),
('AO', 'Angola'),
('AQ', 'Antártida'),
('AR', 'Argentina'),
('AS', 'Samoa Americana'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Islas Gland'),
('AZ', 'Azerbaiyán'),
('BA', 'Bosnia y Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Bélgica'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahréin'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermudas'),
('BN', 'Brunéi'),
('BO', 'Bolivia'),
('BR', 'Brasil'),
('BS', 'Bahamas'),
('BT', 'Bhután'),
('BV', 'Isla Bouvet'),
('BW', 'Botsuana'),
('BY', 'Bielorrusia'),
('BZ', 'Belice'),
('CA', 'Canadá'),
('CC', 'Islas Cocos'),
('CD', 'República Democrática del Congo'),
('CF', 'República Centroafricana'),
('CG', 'Congo'),
('CH', 'Suiza'),
('CI', 'Costa de Marfil'),
('CK', 'Islas Cook'),
('CL', 'Chile'),
('CM', 'Camerún'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CS', 'Serbia y Montenegro'),
('CU', 'Cuba'),
('CV', 'Cabo Verde'),
('CX', 'Isla de Navidad'),
('CY', 'Chipre'),
('CZ', 'República Checa'),
('DE', 'Alemania'),
('DJ', 'Yibuti'),
('DK', 'Dinamarca'),
('DM', 'Dominica'),
('DO', 'República Dominicana'),
('DZ', 'Argelia'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egipto'),
('EH', 'Sahara Occidental'),
('ER', 'Eritrea'),
('ES', 'España'),
('ET', 'Etiopía'),
('FI', 'Finlandia'),
('FJ', 'Fiyi'),
('FK', 'Islas Malvinas'),
('FM', 'Micronesia'),
('FO', 'Islas Feroe'),
('FR', 'Francia'),
('GA', 'Gabón'),
('GB', 'Reino Unido'),
('GD', 'Granada'),
('GE', 'Georgia'),
('GF', 'Guayana Francesa'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Groenlandia'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadalupe'),
('GQ', 'Guinea Ecuatorial'),
('GR', 'Grecia'),
('GS', 'Islas Georgias del Sur y Sandwich del Sur'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Islas Heard y McDonald'),
('HN', 'Honduras'),
('HR', 'Croacia'),
('HT', 'Haití'),
('HU', 'Hungría'),
('ID', 'Indonesia'),
('IE', 'Irlanda'),
('IL', 'Israel'),
('IN', 'India'),
('IO', 'Territorio Británico del Océano Índico'),
('IQ', 'Iraq'),
('IR', 'Irán'),
('IS', 'Islandia'),
('IT', 'Italia'),
('JM', 'Jamaica'),
('JO', 'Jordania'),
('JP', 'Japón'),
('KE', 'Kenia'),
('KG', 'Kirguistán'),
('KH', 'Camboya'),
('KI', 'Kiribati'),
('KM', 'Comoras'),
('KN', 'San Cristóbal y Nevis'),
('KP', 'Corea del Norte'),
('KR', 'Corea del Sur'),
('KW', 'Kuwait'),
('KY', 'Islas Caimán'),
('KZ', 'Kazajstán'),
('LA', 'Laos'),
('LB', 'Líbano'),
('LC', 'Santa Lucía'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lituania'),
('LU', 'Luxemburgo'),
('LV', 'Letonia'),
('LY', 'Libia'),
('MA', 'Marruecos'),
('MC', 'Mónaco'),
('MD', 'Moldavia'),
('MG', 'Madagascar'),
('MH', 'Islas Marshall'),
('MK', 'ARY Macedonia'),
('ML', 'Malí'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Islas Marianas del Norte'),
('MQ', 'Martinica'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauricio'),
('MV', 'Maldivas'),
('MW', 'Malawi'),
('MX', 'México'),
('MY', 'Malasia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'Nueva Caledonia'),
('NE', 'Níger'),
('NF', 'Isla Norfolk'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Países Bajos'),
('NO', 'Noruega'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'Nueva Zelanda'),
('OM', 'Omán'),
('PA', 'Panamá'),
('PE', 'Perú'),
('PF', 'Polinesia Francesa'),
('PG', 'Papúa Nueva Guinea'),
('PH', 'Filipinas'),
('PK', 'Pakistán'),
('PL', 'Polonia'),
('PM', 'San Pedro y Miquelón'),
('PN', 'Islas Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestina'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunión'),
('RO', 'Rumania'),
('RU', 'Rusia'),
('RW', 'Ruanda'),
('SA', 'Arabia Saudí'),
('SB', 'Islas Salomón'),
('SC', 'Seychelles'),
('SD', 'Sudán'),
('SE', 'Suecia'),
('SG', 'Singapur'),
('SH', 'Santa Helena'),
('SI', 'Eslovenia'),
('SJ', 'Svalbard y Jan Mayen'),
('SK', 'Eslovaquia'),
('SL', 'Sierra Leona'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Surinam'),
('ST', 'Santo Tomé y Príncipe'),
('SV', 'El Salvador'),
('SY', 'Siria'),
('SZ', 'Suazilandia'),
('TC', 'Islas Turcas y Caicos'),
('TD', 'Chad'),
('TF', 'Territorios Australes Franceses'),
('TG', 'Togo'),
('TH', 'Tailandia'),
('TJ', 'Tayikistán'),
('TK', 'Tokelau'),
('TL', 'Timor Oriental'),
('TM', 'Turkmenistán'),
('TN', 'Túnez'),
('TO', 'Tonga'),
('TR', 'Turquía'),
('TT', 'Trinidad y Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwán'),
('TZ', 'Tanzania'),
('UA', 'Ucrania'),
('UG', 'Uganda'),
('UM', 'Islas ultramarinas de Estados Unidos'),
('US', 'Estados Unidos'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistán'),
('VA', 'Ciudad del Vaticano'),
('VC', 'San Vicente y las Granadinas'),
('VE', 'Venezuela'),
('VG', 'Islas Vírgenes Británicas'),
('VI', 'Islas Vírgenes de los Estados Unidos'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis y Futuna'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'Sudáfrica'),
('ZM', 'Zambia'),
('ZW', 'Zimbabue'),
('ZZ', 'DEMOSTRACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidos`, `sexo`, `email`, `direccion`, `barrio`, `ciudad`) VALUES
('1042098123', 'ANDRES CAMILO', 'MONTERO GARCIA', 1, 'CAMILOMONTERO@GMAIL.COM', 'CALLE 98#44-09', 'MIRAMAR', 145),
('1042440132', 'EDGARDO JAVIER', 'MONROY BARRIOS', 1, 'MONROYBARRIOSEDGARDO@GMAIL.COM', 'CRA 39C #84-31', 'CAMPO ALEGRE', 145),
('1045675289', 'JANNER STIVEN', 'OJEDA COBA', 1, 'jannersty@gmail.com', 'calle 43 #30-04', 'CHIQUINQIRA', 145),
('1045705248', 'LUIS DOMINGO', 'RUEDA WILCHES', 1, 'LUISRUEDAW@GMAIL.COM', 'AVENIDA 9', 'ABAJO', 145),
('112222', 'demo', 'demo', 1, 'demo@demo.com', 'demo', 'demo', 641),
('1123098098', 'KELLY', 'PATERNINA CHAR', 2, 'KELLYCHAR@GMAIL.COM', 'CALLE 105#51-32', 'VILLA CAMPESTRE', 145),
('12321', 'maria', 'perez', 2, 'mariaperez@gmail.com', 'otra', 'prados', 463),
('1234567890', 'pepito', 'perez', 1, 'pperez@gmail.com', 'cualquiera', 'prado', 822),
('140222000', 'XIMENA', 'MONROY BARRIOS', 2, 'XIMENAMONROY@GMAIL.COM', 'CRA 51B # 81-90 APT 101', 'ALTO PRADO', 145),
('72000000', 'enrique', 'martelo', 1, 'emartelo@gmail.com', 'unisimon', 'unisimon', 145),
('72271384', 'OSCAR EMILIO', 'GUILLEN URREA', 1, 'oscarguillen1230@gmail.com', 'CRA 41 F # 46 -18', 'EL PARQUE', 163);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `det` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `det`) VALUES
(1, 'SUPERUSUARIO'),
(2, 'ADMINISTRADOR'),
(3, 'SECRETARIA'),
(4, 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofoto`
--

CREATE TABLE `tipofoto` (
  `id` bigint(20) NOT NULL,
  `det` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipofoto`
--

INSERT INTO `tipofoto` (`id`, `det`) VALUES
(1, 'FRONTAL'),
(2, 'INTERIOR'),
(3, 'MOTOR'),
(4, 'POSTERIOR'),
(5, 'LATERAL DERECHO'),
(6, 'LATERAL IZQUIERDO'),
(7, 'BAUL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_egreso`
--

CREATE TABLE `tipos_egreso` (
  `id` bigint(20) NOT NULL,
  `det` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_egreso`
--

INSERT INTO `tipos_egreso` (`id`, `det`) VALUES
(1, 'LAVADO GENERAL'),
(2, 'OVER HALL'),
(3, 'PUBLICIDAD PAGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carro`
--

CREATE TABLE `tipo_carro` (
  `id` bigint(20) NOT NULL,
  `det` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_carro`
--

INSERT INTO `tipo_carro` (`id`, `det`) VALUES
(1, 'AUTOMOVIL'),
(2, 'CAMIONETA'),
(3, 'PICK UP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_docu`
--

CREATE TABLE `tip_docu` (
  `id` bigint(20) NOT NULL,
  `det` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tip_docu`
--

INSERT INTO `tip_docu` (`id`, `det`) VALUES
(1, 'TARJETA DE PROPIEDAD'),
(2, 'SOAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` bigint(20) NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '1 activo, 0 desactivado',
  `persona` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `rol`, `clave`, `estado`, `persona`) VALUES
('emartelo', 2, '$2y$10$Fv3.Llm8KETZ5XUA3ptMT.DiWYryOt8G1JhlMyIKVLqMolvvBL5Ce', 2, '72000000'),
('jannersty', 4, '$2y$10$f5xcuIMwYuCgoifqhJLW2uYvDpm/LuV5bWoEv8fQMW65IlRIgJ0CW', 2, '1045675289'),
('lrueda9', 1, '$2y$10$JxcaalB4pF6O3u2HD9b6ce/QiRJLg0n0XW4soQffMAUhPMj/xbHC6', 1, '1045705248'),
('mperez', 3, '$2y$10$OsI8x/1T2y5dSfyUijO0T.OZRiLt1sFlQzy3LgWRDh8vMVu.Lgw0G', 2, '12321'),
('oscarguillen', 3, '$2y$10$K9NnBcfcYuJfzy8MPinEYOzw9IYDXpSbEH8ZB4REdK3IbC0F0uMgi', 2, '72271384'),
('pperez', 4, '$2y$10$kEKzWtqPJdx3Zugn/nDgF.BybjpKD7YiGRqH6QGf5B7tSH47op5Zu', 1, '1234567890'),
('secretaria', 3, '$2y$10$Yq3aquwxToUPcxQokjeX6O5hlGZwD3yHPOVgM.5zawlqk0yg3NtbO', 2, '1045705248');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) NOT NULL,
  `vendedor` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '2' COMMENT '1 -> finalizada, 2 -> en proceso',
  `total` double NOT NULL DEFAULT '0',
  `carros_id` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `vendedor`, `cliente`, `fecha`, `estado`, `total`, `carros_id`) VALUES
(2, '1045675289', '1042098123', '2016-11-25 01:22:56', 1, 70000000, 'CXD283'),
(3, '1045675289', '1042098123', '2016-11-25 01:26:39', 1, 24000000, 'HGO217');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_arancel`
--

CREATE TABLE `ventas_arancel` (
  `id` bigint(20) NOT NULL,
  `aranceles_id` bigint(20) NOT NULL,
  `ventas_id` bigint(20) NOT NULL,
  `persona_id` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas_arancel`
--

INSERT INTO `ventas_arancel` (`id`, `aranceles_id`, `ventas_id`, `persona_id`) VALUES
(2, 1, 2, '1042098123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aranceles`
--
ALTER TABLE `aranceles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carros_tipos1_idx` (`tipo`),
  ADD KEY `fk_carros_modelo1_idx` (`modelo_id`),
  ADD KEY `fk_carros_ciudad1_idx` (`ciudad`),
  ADD KEY `fk_carros_persona1_idx` (`propietario`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ciudad_departamento1_idx` (`depto`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ciudad_pais1_idx` (`pais`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_documentacion_carros1_idx` (`carros_id`),
  ADD KEY `fk_documentacion_tip_docu1_idx` (`tip_docu`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_egresos_tipos_ing_egr1_idx` (`tipos_egreso`),
  ADD KEY `fk_egresos_carros1_idx` (`carro`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Fotos_tipofoto1_idx` (`tipo`),
  ADD KEY `fk_Fotos_carros1_idx` (`carro`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modelo_marca1_idx` (`marca`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_ciudad1_idx` (`ciudad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipofoto`
--
ALTER TABLE `tipofoto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_egreso`
--
ALTER TABLE `tipos_egreso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_carro`
--
ALTER TABLE `tipo_carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tip_docu`
--
ALTER TABLE `tip_docu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `fk_usuarios_roles1_idx` (`rol`),
  ADD KEY `fk_usuarios_persona1_idx` (`persona`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas_persona1_idx` (`cliente`),
  ADD KEY `fk_ventas_persona2_idx` (`vendedor`),
  ADD KEY `fk_ventas_carros1_idx` (`carros_id`);

--
-- Indices de la tabla `ventas_arancel`
--
ALTER TABLE `ventas_arancel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas_arancel_aranceles1_idx` (`aranceles_id`),
  ADD KEY `fk_ventas_arancel_ventas1_idx` (`ventas_id`),
  ADD KEY `fk_ventas_arancel_persona1_idx` (`persona_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `fk_carros_ciudad1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carros_modelo1` FOREIGN KEY (`modelo_id`) REFERENCES `modelo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carros_persona1` FOREIGN KEY (`propietario`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carros_tipos1` FOREIGN KEY (`tipo`) REFERENCES `tipo_carro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_departamento1` FOREIGN KEY (`depto`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_ciudad_pais1` FOREIGN KEY (`pais`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD CONSTRAINT `fk_documentacion_carros1` FOREIGN KEY (`carros_id`) REFERENCES `carros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documentacion_tip_docu1` FOREIGN KEY (`tip_docu`) REFERENCES `tip_docu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `fk_egresos_carros1` FOREIGN KEY (`carro`) REFERENCES `carros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_egresos_tipos_ing_egr1` FOREIGN KEY (`tipos_egreso`) REFERENCES `tipos_egreso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_Fotos_carros1` FOREIGN KEY (`carro`) REFERENCES `carros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Fotos_tipofoto1` FOREIGN KEY (`tipo`) REFERENCES `tipofoto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_modelo_marca1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_ciudad1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_persona1` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_carros1` FOREIGN KEY (`carros_id`) REFERENCES `carros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_persona1` FOREIGN KEY (`cliente`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_persona2` FOREIGN KEY (`vendedor`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas_arancel`
--
ALTER TABLE `ventas_arancel`
  ADD CONSTRAINT `fk_ventas_arancel_aranceles1` FOREIGN KEY (`aranceles_id`) REFERENCES `aranceles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_arancel_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_arancel_ventas1` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
