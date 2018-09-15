-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Set-2018 às 00:23
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pop-culture`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'TV'),
(2, 'Games'),
(3, 'Cinema'),
(4, 'Música'),
(5, 'Quadrinhos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpost` int(11) DEFAULT NULL,
  `idnews` int(11) DEFAULT NULL,
  `idvideo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `comment`, `iduser`, `idpost`, `idnews`, `idvideo`) VALUES
(1, 'Mas Que Droga', 3, 4, NULL, NULL),
(3, 'aaaaaaaaaaaaaa', 3, NULL, 131, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios_respostas`
--

CREATE TABLE `comentarios_respostas` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcomment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios_respostas`
--

INSERT INTO `comentarios_respostas` (`id`, `comment`, `iduser`, `idcomment`) VALUES
(1, 'IDAI', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `src`) VALUES
(1, 'test.jpg'),
(4, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(5, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(6, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(7, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(8, '8ad1cd5c-3e42-4500-b9a2-0475ee002027.jpg'),
(9, '8ad1cd5c-3e42-4500-b9a2-0475ee002027.jpg'),
(10, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(11, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(12, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(13, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(14, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(15, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(16, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(17, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(18, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(19, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(20, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(21, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(22, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(23, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(24, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(25, '8ad1cd5c-3e42-4500-b9a2-0475ee002027.jpg'),
(26, '8ad1cd5c-3e42-4500-b9a2-0475ee002027.jpg'),
(27, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(28, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(29, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(30, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(31, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(32, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(33, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(34, '79eaf7f8-a2a6-4722-8d1d-ebdf530055e1.jpg'),
(35, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(36, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(37, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(38, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(39, '8bb31ed1-6e48-4404-b825-32e4adba9a72.jpg'),
(40, '699372.jpg'),
(41, 'matrix.jpg'),
(42, 'matrix.jpg'),
(43, 'batman wallpaper.jpg'),
(44, '21752081_934332393381146_2600825487257801288_n.jpg'),
(45, '21752081_934332393381146_2600825487257801288_n.jpg'),
(46, '21752081_934332393381146_2600825487257801288_n.jpg'),
(47, '21752081_934332393381146_2600825487257801288_n.jpg'),
(48, '21752081_934332393381146_2600825487257801288_n.jpg'),
(49, '21752081_934332393381146_2600825487257801288_n.jpg'),
(50, '21752081_934332393381146_2600825487257801288_n.jpg'),
(51, '21752081_934332393381146_2600825487257801288_n.jpg'),
(52, '21752081_934332393381146_2600825487257801288_n.jpg'),
(53, '21752081_934332393381146_2600825487257801288_n.jpg'),
(54, '21752081_934332393381146_2600825487257801288_n.jpg'),
(55, '21752081_934332393381146_2600825487257801288_n.jpg'),
(56, '21752081_934332393381146_2600825487257801288_n.jpg'),
(57, '21752081_934332393381146_2600825487257801288_n.jpg'),
(58, '21752081_934332393381146_2600825487257801288_n.jpg'),
(59, '4c3e8584-e434-4b65-aa66-b6293b2d28de.jpg'),
(60, 'Avengers-Infinity-War-poster.jpg'),
(61, 'Avengers-Infinity-War-poster.jpg'),
(62, 'Avengers-Infinity-War-poster.jpg'),
(63, 'Avengers-Infinity-War-poster.jpg'),
(64, 'Avengers-Infinity-War-poster.jpg'),
(65, 'Avengers-Infinity-War-poster.jpg'),
(66, 'Avengers-Infinity-War-poster.jpg'),
(67, 'Avengers-Infinity-War-poster.jpg'),
(68, 'Avengers-Infinity-War-poster.jpg'),
(69, 'Avengers-Infinity-War-poster.jpg'),
(70, 'Avengers-Infinity-War-poster.jpg'),
(71, 'Avengers-Infinity-War-poster.jpg'),
(72, 'Avengers-Infinity-War-poster.jpg'),
(73, 'Avengers-Infinity-War-poster.jpg'),
(74, 'Avengers-Infinity-War-poster.jpg'),
(75, 'Avengers-Infinity-War-poster.jpg'),
(76, 'Avengers-Infinity-War-poster.jpg'),
(77, 'Avengers-Infinity-War-poster.jpg'),
(78, 'Avengers-Infinity-War-poster.jpg'),
(79, 'Avengers-Infinity-War-poster.jpg'),
(80, 'Avengers-Infinity-War-poster.jpg'),
(81, 'Avengers-Infinity-War-poster.jpg'),
(82, 'Avengers-Infinity-War-poster.jpg'),
(83, 'Avengers-Infinity-War-poster.jpg'),
(84, 'Avengers-Infinity-War-poster.jpg'),
(85, 'Avengers-Infinity-War-poster.jpg'),
(86, 'Avengers-Infinity-War-poster.jpg'),
(87, 'Avengers-Infinity-War-poster.jpg'),
(88, 'Avengers-Infinity-War-poster.jpg'),
(89, 'Avengers-Infinity-War-poster.jpg'),
(90, 'Avengers-Infinity-War-poster.jpg'),
(91, 'Avengers-Infinity-War-poster.jpg'),
(92, 'Avengers-Infinity-War-poster.jpg'),
(93, 'Avengers-Infinity-War-poster.jpg'),
(94, 'Avengers-Infinity-War-poster.jpg'),
(95, 'Avengers-Infinity-War-poster.jpg'),
(96, 'Avengers-Infinity-War-poster.jpg'),
(97, 'Avengers-Infinity-War-poster.jpg'),
(98, 'Avengers-Infinity-War-poster.jpg'),
(99, 'Avengers-Infinity-War-poster.jpg'),
(100, 'Avengers-Infinity-War-poster.jpg'),
(101, 'Avengers-Infinity-War-poster.jpg'),
(102, 'Avengers-Infinity-War-poster.jpg'),
(103, 'Avengers-Infinity-War-poster.jpg'),
(104, 'Avengers-Infinity-War-poster.jpg'),
(105, 'Avengers-Infinity-War-poster.jpg'),
(106, 'Avengers-Infinity-War-poster.jpg'),
(107, 'Avengers-Infinity-War-poster.jpg'),
(108, 'Avengers-Infinity-War-poster.jpg'),
(109, 'Avengers-Infinity-War-poster.jpg'),
(110, 'Avengers-Infinity-War-poster.jpg'),
(111, 'Avengers-Infinity-War-poster.jpg'),
(112, 'Avengers-Infinity-War-poster.jpg'),
(113, 'Avengers-Infinity-War-poster.jpg'),
(114, 'Avengers-Infinity-War-poster.jpg'),
(115, '699372.jpg'),
(116, 'Avengers-Infinity-War-poster.jpg'),
(117, 'Avengers-Infinity-War-poster.jpg'),
(118, 'Avengers-Infinity-War-poster.jpg'),
(119, 'avengers_infinity_warsquare800.jpg'),
(120, 'avengers_infinity_warsquare800.jpg'),
(121, 'avengers_infinity_warsquare800.jpg'),
(122, 'avengers_infinity_warsquare800.jpg'),
(123, 'avengers_infinity_warsquare800.jpg'),
(124, 'avengers_infinity_warsquare800.jpg'),
(125, 'avengers_infinity_warsquare800.jpg'),
(126, 'avengers_infinity_warsquare800.jpg'),
(127, 'avengers_infinity_warsquare800.jpg'),
(128, 'avengers_infinity_warsquare800.jpg'),
(129, 'avengers_infinity_warsquare800.jpg'),
(130, 'avengers_infinity_warsquare800.jpg'),
(131, 'avengers_infinity_warsquare800.jpg'),
(132, 'avengers_infinity_warsquare800.jpg'),
(133, 'avengers_infinity_warsquare800.jpg'),
(134, 'avengers_infinity_warsquare800.jpg'),
(135, 'avengers_infinity_warsquare800.jpg'),
(136, 'avengers_infinity_warsquare800.jpg'),
(137, 'avengers_infinity_warsquare800.jpg'),
(138, 'avengers_infinity_warsquare800.jpg'),
(139, 'avengers_infinity_warsquare800.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name_ms` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `dt_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `message`, `email`, `name_ms`, `deleted`, `dt_update`) VALUES
(16, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(17, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(18, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(19, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(20, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(21, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(22, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 1, '0000-00-00'),
(23, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickaelbraz17@gmail.com', 'mickaelbraz17@gmail.com', 0, '0000-00-00'),
(24, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickael.souza.if@gmail.com', 'mickael.souza.if@gmail.com', 0, '0000-00-00'),
(25, '                        \r\n        aaaaaaaaaaaaaaa              ', 'mickael.souza.if@gmail.com', 'mickael.souza.if@gmail.com', 0, '0000-00-00'),
(26, '                        \r\n                     ALAL', 'mickael.souza.if@gmail.com', 'mickael.souza.if@gmail.com', 1, '0000-00-00'),
(27, '                        \r\n                     ALAL', 'mickael.souza.if@gmail.com', 'Mickael', 0, '0000-00-00'),
(28, ' Parabéns pelo site e pelo comprometimento de sempre trazer um conteúdo qualidade! ;)                       \r\n                      ', 'mickael.souza.if@gmail.com', 'Mickael Souza', 1, '0000-00-00'),
(29, '                        \r\n            AAAAAAAAAAAAAAA          ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(30, '                        \r\n            AAAAAAAAAAAAAAA          ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(31, '                        \r\n            AAAAAAAAAAAAAAA          ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(32, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(33, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(34, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(35, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(36, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(37, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(38, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(39, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(40, '                        \r\n                     aaaaaaaaaa ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(41, '                        \r\n                 AAAAAAAAAAAAAAAAAAA     ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(42, '                        \r\n                 AAAAAAAAAAAAAAAAAAA     ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(43, '                        \r\n                 AAAAAAAAAAAAAAAAAAA     ', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00'),
(44, '                        \r\n                      BAAAAA', 'mickael.souza.if@gmail.com', 'Teste', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `article` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `dtupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `article`, `title`, `date_time`, `deleted`, `dtupdate`) VALUES
(92, '<p>Era apenas uma quest&atilde;o de tempo at&eacute; que Vingadores: Guerra Infinita, o monumental blockbuster dirigido pelos irm&atilde;os Joe e Anthony Russo, derrotasse seu &quot;irm&atilde;o mais velho&quot;, Os Vingadores, para se tornar a maior bilheteria de todo o Universo Cinematogr&aacute;fico Marvel. E o longa, mais r&aacute;pido em toda a hist&oacute;ria a ultrapassar a marca de US$ 1 bilh&atilde;o arrecadado no mundo, concretizou o objetivo assim que chegou &agrave;s salas de cinema da China, neste &uacute;ltimo final de semana. De acordo com informa&ccedil;&otilde;es do Box Office Mojo, Guerra Infinita obteve aproximadamente US$ 200 milh&otilde;es dos espectadores do Reino M&eacute;dio em apenas tr&ecirc;s dias de exibi&ccedil;&atilde;o. A impressionante cifra, por sua vez, foi mais do que o suficiente para elevar os lucros internacionais da aventura, que agora ocupa o posto de quinta maior bilheteria internacional - ou seja, excetuando sua arrecada&ccedil;&atilde;o dom&eacute;stica - em todos os tempos com pouco mais de US$ 1 bilh&atilde;o. Contando com o montante obtido em solo p&aacute;trio, Guerra Infinita acumula aproximadamente US$ 1,606 bilh&atilde;o contra o US$ 1,518 bilh&atilde;o de Os Vingadores, agora vice do ranking do UCM. Para al&eacute;m do retumbante sucesso dentro da hist&oacute;ria da Marvel e dos super-her&oacute;is nas telonas, Guerra Infinita tamb&eacute;m tornou-se a quinta maior bilheteria da hist&oacute;ria do cinema. No momento, o &eacute;pico est&aacute; a apenas US$ 65 milh&otilde;es da bilheteria de Jurassic World - O Mundo dos Dinossauros (US$ 1,671 bilh&atilde;o) e a menos de US$ 400 milh&otilde;es da arrecada&ccedil;&atilde;o de Star Wars - O Despertar da For&ccedil;a (US$ 2,07 bilh&otilde;es). Com v&aacute;rias semanas de exibi&ccedil;&atilde;o pela frente, Guerra Infinita deve vencer Jurassic World e ainda tem a chance de encostar ou at&eacute; mesmo tomar a posi&ccedil;&atilde;o do s&eacute;timo cap&iacute;tulo da saga Guerra nas Estrelas. E a&iacute;, o que voc&ecirc; acha? Guerra Infinita chegar&aacute; ao seleto Clube dos Dois Bilh&otilde;es, composto ainda por Avatar e Titanic? Ou faltar&aacute; f&ocirc;lego? Resta aguardar. O &eacute;pico segue em cartaz no Brasil.</p>\r\n', 'AAAAAAAAAAAAA', '2018-05-14', 0, '2018-06-15'),
(131, '<p>Era apenas uma quest&atilde;o de tempo at&eacute; que Vingadores: Guerra Infinita, o monumental blockbuster dirigido pelos irm&atilde;os Joe e Anthony Russo, derrotasse seu &quot;irm&atilde;o mais velho&quot;, Os Vingadores, para se tornar a maior bilheteria de todo o Universo Cinematogr&aacute;fico Marvel. E o longa, mais r&aacute;pido em toda a hist&oacute;ria a ultrapassar a marca de US$ 1 bilh&atilde;o arrecadado no mundo, concretizou o objetivo assim que chegou &agrave;s salas de cinema da China, neste &uacute;ltimo final de semana.</p>\r\n\r\n<p>De acordo com informa&ccedil;&otilde;es do Box Office Mojo, Guerra Infinita obteve aproximadamente US$ 200 milh&otilde;es dos espectadores do Reino M&eacute;dio em apenas tr&ecirc;s dias de exibi&ccedil;&atilde;o. A impressionante cifra, por sua vez, foi mais do que o suficiente para elevar os lucros internacionais da aventura, que agora ocupa o posto de quinta maior bilheteria internacional - ou seja, excetuando sua arrecada&ccedil;&atilde;o dom&eacute;stica - em todos os tempos com pouco mais de US$ 1 bilh&atilde;o. Contando com o montante obtido em solo p&aacute;trio, Guerra Infinita acumula aproximadamente US$ 1,606 bilh&atilde;o contra o US$ 1,518 bilh&atilde;o de Os Vingadores, agora vice do ranking do UCM.</p>\r\n\r\n<p><img alt=\"\" src=\"https://wallpapersite.com/images/wallpapers/iron-man-3840x2160-avengers-infinity-war-4k-12794.jpg\" style=\"height:338px; width:600px\" /></p>\r\n\r\n<p>Para al&eacute;m do retumbante sucesso dentro da hist&oacute;ria da Marvel e dos super-her&oacute;is nas telonas, Guerra Infinita tamb&eacute;m tornou-se a quinta maior bilheteria da hist&oacute;ria do cinema. No momento, o &eacute;pico est&aacute; a apenas US$ 65 milh&otilde;es da bilheteria de Jurassic World - O Mundo dos Dinossauros (US$ 1,671 bilh&atilde;o) e a menos de US$ 400 milh&otilde;es da arrecada&ccedil;&atilde;o de Star Wars - O Despertar da For&ccedil;a (US$ 2,07 bilh&otilde;es). Com v&aacute;rias semanas de exibi&ccedil;&atilde;o pela frente, Guerra Infinita deve vencer Jurassic World e ainda tem a chance de encostar ou at&eacute; mesmo tomar a posi&ccedil;&atilde;o do s&eacute;timo cap&iacute;tulo da saga Guerra nas Estrelas.</p>\r\n\r\n<p>E a&iacute;, o que voc&ecirc; acha? Guerra Infinita chegar&aacute; ao seleto Clube dos Dois Bilh&otilde;es, composto ainda por Avatar e Titanic? Ou faltar&aacute; f&ocirc;lego? Resta aguardar. O &eacute;pico segue em cartaz no Brasil.</p>\r\n\r\n<p>YEEEEEEEEEEuAAAAAAAAAAAAAAA</p>\r\n', 'Vingadores: Guerra Infinita quebra grandes recordes !', '2018-05-30', 0, '2018-06-15'),
(135, '<p>Testeee</p>\r\n', 'Teste', '2018-06-20', 1, NULL),
(136, '<p>AAAAAAAAAAAAAAAA</p>\r\n', 'Teste', '2018-06-12', 0, NULL),
(137, '<p>AAAAAAAAAAAAA</p>\r\n', 'AAAAAAAA', '2018-06-05', 0, NULL),
(138, '<p>Oloco Bicho, esse Vingadores ta loko ein</p>\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-06-13', 0, NULL),
(139, 'AAAAAAAAAAAAAAAAAAAAAAAAAAA\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-07-19', 0, NULL),
(140, '<p>33333333333</p>\r\n', 'Vingadores: Guerra Infinita, filmaço! AAAAAA', '2018-07-04', 0, '2018-07-11'),
(141, '<p>2222222222222222222222</p>\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-07-18', 0, '2018-07-11'),
(142, '<ul>\r\n	<li><span class=\"marker\"><s><em><strong>AAAAAAAAAAAAAAAAAAAAA</strong></em></s></span>\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr />\r\n	<hr /></li>\r\n</ul>\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-07-31', 1, NULL),
(143, '<p>AAAAAAAAAAAAAAAAAAAAAAAAA</p>\r\n', 'sfasfsafasfas', '2018-07-11', 1, '2018-07-11'),
(144, '<p>AAAAAAAAAAAAA</p>\r\n', 'AAAAAAAAA', '2018-07-03', 1, NULL),
(145, '<p>AAAAAAAAAAAAAAAAAAAAAAAAA</p>\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-07-11', 1, NULL),
(146, '<p>aaaaaaaaaaaa</p>\r\n', 'Vingadores: Guerra Infinita, filmaço!', '2018-07-13', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news_has_imagem`
--

CREATE TABLE `news_has_imagem` (
  `idnews` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `news_has_imagem`
--

INSERT INTO `news_has_imagem` (`idnews`, `idimagem`) VALUES
(92, 62),
(131, 101),
(135, 113),
(136, 114),
(137, 117),
(138, 119),
(139, 129),
(140, 130),
(141, 131),
(142, 132),
(143, 133),
(144, 136),
(145, 137),
(146, 138);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news_has_video`
--

CREATE TABLE `news_has_video` (
  `idnews` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `article` varchar(45) NOT NULL,
  `date_time` date NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `dtupdate` date DEFAULT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `title`, `article`, `date_time`, `deleted`, `dtupdate`, `idcategoria`) VALUES
(1, 'Test', 'Test', '2018-03-14', 0, NULL, 1),
(2, 'TESTEA', '<p>Testerson</p>\r\n', '2018-03-14', 0, '2018-06-30', 2),
(3, 'Test', '<p>Testersonssssss</p>\r\n', '2018-03-14', 0, '2018-06-30', 4),
(4, 'Aaaaaaaaaaaa', '<p>aaaaaaaaaaaa</p>\r\n', '2018-06-13', 0, '2018-06-30', 5),
(5, 'Vingadores: Guerra Infinita se torna a maior ', '<p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>\r\n', '2018-05-16', 1, '2018-07-01', 3),
(6, 'Teste', '<p>33333333333333</p>\r\n', '2018-06-20', 1, '2018-06-30', 3),
(7, 'Vingadores: Guerra Infinita, filmaço!', '<p><strong>ASDFSFASFAS</strong></p>\r\n', '2018-07-18', 0, '2018-07-04', 3),
(8, 'Teste', '<p>AAAAA</p>\r\n', '2018-07-19', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_has_imagem`
--

CREATE TABLE `post_has_imagem` (
  `idpost` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post_has_imagem`
--

INSERT INTO `post_has_imagem` (`idpost`, `idimagem`) VALUES
(2, 116),
(4, 115),
(5, 116),
(6, 118),
(7, 134),
(8, 139);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_has_video`
--

CREATE TABLE `post_has_video` (
  `idpost` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post_has_video`
--

INSERT INTO `post_has_video` (`idpost`, `idvideo`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `dtupdate` date DEFAULT NULL,
  `tempPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `deleted`, `dtupdate`, `tempPassword`) VALUES
(3, 'admin', 'ef73781effc5774100f87fe2f437a435', 'mickael.souza.if@gmail.com', 0, '2018-08-27', '29lBe7IA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `code`) VALUES
(1, 'asadsda'),
(2, 'asadsda'),
(3, 'dasdsada'),
(4, 'QwievZ1Tx-8'),
(5, 'QwievZ1Tx-8'),
(6, 'QwievZ1Tx-8'),
(7, 'QwievZ1Tx-8'),
(8, 'QwievZ1Tx-8'),
(9, 'QwievZ1Tx-8'),
(10, 'QwievZ1Tx-8'),
(11, 'QwievZ1Tx-8'),
(12, 'Fmdb-KmlzD8'),
(13, 'QwievZ1Tx-8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage`
--

CREATE TABLE `videopage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `dtupdate` date DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage`
--

INSERT INTO `videopage` (`id`, `title`, `article`, `date_time`, `dtupdate`, `deleted`) VALUES
(1, 'Test', 'Test', '2018-03-16', '2018-03-17', 0),
(2, 'Test', 'Tester', '2018-03-16', '2018-03-19', 0),
(3, 'Vingadores: Guerra Infinita, filmaço!', '<p>AAAAAAAAA</p>\r\n', '2018-06-13', NULL, 0),
(4, 'Vingadores: Guerra Infinita, filmaço!', '<p>AAAAAAAAAAA</p>\r\n', '2018-06-13', NULL, 0),
(5, 'Vingadores: Guerra Infinita, filmaço!', '<p>EEEEEEEEEEEEEEEEEEE</p>\r\n', '2018-06-13', '2018-07-01', 0),
(6, 'Vingadores: Guerra Infinita, filmaçoooooooooooo!', '<p>YUUUUUUUUUUUUUUUUUU</p>\r\n', '2018-06-13', '2018-07-01', 0),
(7, 'Teste', '<p>AAAAAAAAAA</p>\r\n', '2018-07-12', NULL, 1),
(8, 'AFASFASfas', '<p><strong>AAAAAAAAAAAAAA</strong></p>\r\n', '2018-07-03', '2018-07-04', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage_has_imagem`
--

CREATE TABLE `videopage_has_imagem` (
  `idvideopage` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage_has_imagem`
--

INSERT INTO `videopage_has_imagem` (`idvideopage`, `idimagem`) VALUES
(1, 1),
(4, 125),
(5, 126),
(6, 127),
(7, 128),
(8, 135);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage_has_video`
--

CREATE TABLE `videopage_has_video` (
  `idvideopage` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage_has_video`
--

INSERT INTO `videopage_has_video` (`idvideopage`, `idvideo`) VALUES
(1, 1),
(5, 10),
(6, 11),
(7, 12),
(8, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`iduser`),
  ADD KEY `fk_post` (`idpost`),
  ADD KEY `fk_news` (`idnews`),
  ADD KEY `fk_video` (`idvideo`);

--
-- Indexes for table `comentarios_respostas`
--
ALTER TABLE `comentarios_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment` (`idcomment`),
  ADD KEY `fk_user2` (`iduser`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_has_imagem`
--
ALTER TABLE `news_has_imagem`
  ADD PRIMARY KEY (`idnews`,`idimagem`),
  ADD KEY `fk_news_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_news_has_imagem_news1_idx` (`idnews`);

--
-- Indexes for table `news_has_video`
--
ALTER TABLE `news_has_video`
  ADD PRIMARY KEY (`idnews`,`idvideo`),
  ADD KEY `fk_news_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_news_has_video_news1_idx` (`idnews`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`idcategoria`),
  ADD KEY `fk_post_categoria_idx` (`idcategoria`);

--
-- Indexes for table `post_has_imagem`
--
ALTER TABLE `post_has_imagem`
  ADD PRIMARY KEY (`idpost`,`idimagem`),
  ADD KEY `fk_post_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_post_has_imagem_post1_idx` (`idpost`);

--
-- Indexes for table `post_has_video`
--
ALTER TABLE `post_has_video`
  ADD PRIMARY KEY (`idpost`,`idvideo`),
  ADD KEY `fk_post_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_post_has_video_post1_idx` (`idpost`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videopage`
--
ALTER TABLE `videopage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videopage_has_imagem`
--
ALTER TABLE `videopage_has_imagem`
  ADD PRIMARY KEY (`idvideopage`,`idimagem`),
  ADD KEY `fk_videopage_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_videopage_has_imagem_videopage1_idx` (`idvideopage`);

--
-- Indexes for table `videopage_has_video`
--
ALTER TABLE `videopage_has_video`
  ADD PRIMARY KEY (`idvideopage`,`idvideo`),
  ADD KEY `fk_videopage_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_videopage_has_video_videopage1_idx` (`idvideopage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comentarios_respostas`
--
ALTER TABLE `comentarios_respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `videopage`
--
ALTER TABLE `videopage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_news` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`idpost`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_video` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`);

--
-- Limitadores para a tabela `comentarios_respostas`
--
ALTER TABLE `comentarios_respostas`
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`idcomment`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `news_has_imagem`
--
ALTER TABLE `news_has_imagem`
  ADD CONSTRAINT `fk_news_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_news_has_imagem_news1` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `news_has_video`
--
ALTER TABLE `news_has_video`
  ADD CONSTRAINT `fk_news_has_video_news1` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post_has_imagem`
--
ALTER TABLE `post_has_imagem`
  ADD CONSTRAINT `fk_post_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_imagem_post1` FOREIGN KEY (`idpost`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post_has_video`
--
ALTER TABLE `post_has_video`
  ADD CONSTRAINT `fk_post_has_video_post1` FOREIGN KEY (`idpost`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videopage_has_imagem`
--
ALTER TABLE `videopage_has_imagem`
  ADD CONSTRAINT `fk_videopage_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videopage_has_imagem_videopage1` FOREIGN KEY (`idvideopage`) REFERENCES `videopage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videopage_has_video`
--
ALTER TABLE `videopage_has_video`
  ADD CONSTRAINT `fk_videopage_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videopage_has_video_videopage1` FOREIGN KEY (`idvideopage`) REFERENCES `videopage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
