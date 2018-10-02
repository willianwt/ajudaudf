-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Set-2018 às 23:40
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `ajudaudf`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `nome` varchar(50) NOT NULL,
  `rgm` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('M','F','NI') NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`rgm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`nome`, `rgm`, `nascimento`, `sexo`, `telefone`, `email`, `senha`) VALUES
('admin', '20101234', '1900-01-01', 'M', '999999999', 'administrador@altecnologia.com.br', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `curso`) VALUES
(1, 'ADMINISTRAÇÃO'),
(2, 'ADS - ANÁLISE DE SISTEMAS'),
(3, 'ARQUITETURA E URBANISMO'),
(4, 'BIOMEDICINA'),
(5, 'CIÊNCIA DA COMPUTAÇÃO'),
(6, 'CIÊNCIA POLÍTICA'),
(7, 'CIÊNCIAS BIOLÓGICAS '),
(8, 'CIÊNCIAS CONTÁBEIS'),
(9, 'CIÊNCIAS ECONÔMICAS'),
(10, 'DESIGN DE INTERIORES '),
(11, 'DESIGN GRÁFICO '),
(12, 'DIREITO'),
(13, 'EDUCAÇÃO FÍSICA '),
(14, 'ENFERMAGEM'),
(15, 'ENG. AMBIENTAL '),
(16, 'ENG.CIVIL'),
(17, 'ENG. DE PRODUÇÃO'),
(18, 'ENG. ELÉTRICA'),
(19, 'ENG.MECÂNICA'),
(20, 'ENG.MECATRÔNICA'),
(21, 'ESTÉTICA E COSMÉTICA'),
(22, 'EVENTOS '),
(23, 'FARMÁCIA'),
(24, 'FISIOTERAPIA '),
(25, 'GASTRONOMIA'),
(26, 'GESTÃO DE T.I'),
(27, 'GESTÃO EM RH'),
(28, 'GESTÃO FINANCEIRA '),
(29, 'GESTÃO HOSPITALAR'),
(30, 'GESTÃO PÚBLICA '),
(31, 'IDIOMAS - ALEMÃO'),
(32, 'IDIOMAS - ÁRABE'),
(33, 'IDIOMAS - CHINÊS (MANDARIM)'),
(34, 'IDIOMAS - COREANO'),
(35, 'IDIOMAS - ESPANHOL'),
(36, 'IDIOMAS - ESPANHOL (ESPANHA)'),
(37, 'IDIOMAS - FILIPINO (TAGALO)'),
(38, 'IDIOMAS - FRANCÊS'),
(39, 'IDIOMAS - GREGO'),
(40, 'IDIOMAS - HEBRAICO'),
(41, 'IDIOMAS - HINDI'),
(42, 'IDIOMAS - HOLANDÊS'),
(43, 'IDIOMAS - INGLÊS (EUA)'),
(44, 'IDIOMAS - INGLÊS (INGLATERRA)'),
(45, 'IDIOMAS - IRLANDÊS (GAÉLICO)'),
(46, 'IDIOMAS - ITALIANO'),
(47, 'IDIOMAS - JAPONÊS'),
(48, 'IDIOMAS - PERSA (FARSI)'),
(49, 'IDIOMAS - POLONÊS'),
(50, 'IDIOMAS - PORTUGUÊS (BRASIL)'),
(51, 'IDIOMAS - RUSSO'),
(52, 'IDIOMAS - SUECO'),
(53, 'IDIOMAS - TURCO'),
(54, 'IDIOMAS - VIETNAMITA'),
(55, 'JOGOS DIGITAIS '),
(56, 'JORNALISMO'),
(57, 'LETRAS - PORTUGUÊS E INGLÊS '),
(58, 'MODA '),
(59, 'NUTRIÇÃO'),
(60, 'ODONTOLOGIA'),
(61, 'PEDAGOGIA '),
(62, 'PSICOLOGIA'),
(63, 'PUBLICIDADE E PROPAGANDA'),
(64, 'RADIOLOGIA'),
(65, 'RELAÇÕES INTERNACIONAIS'),
(66, 'RELAÇÕES PÚBLICAS'),
(67, 'SECRETARIADO EXECUTIVO TRILÍNGUE'),
(68, 'SISTEMAS DE INFORMAÇÃO'),
(69, 'TÉCNICO EM ENFERMAGEM'),
(70, 'TÉCNICO EM INFORMÁTICA'),
(71, 'TÉCNICO EM LOGÍSTICA'),
(72, 'TÉCNICO EM MEIO AMBIENTE'),
(73, 'TÉCNICO EM PROGRAMAÇÃO DE JOGOS DIGITAIS'),
(74, 'TÉCNICO EM REDES DE COMPUTADORES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL COMMENT 'Pedido / Oferta',
  `usuario` varchar(40) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `curso` varchar(30) NOT NULL,
  `materia` varchar(30) NOT NULL,
  `assunto` varchar(400) NOT NULL,
  `contrapartida` varchar(500) NOT NULL,
  `disponibilidade` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de pedidos e ofertas de ajuda' AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `tipo`, `usuario`, `contato`, `curso`, `materia`, `assunto`, `contrapartida`, `disponibilidade`) VALUES
(1, 'Oferta', 'Will', '61 meu telefone e email', 'ADS', 'HTML', 'Me ajuda a fazer um site?', 'Eu te ajudo com BD', ''),
(2, 'Pedido', 'Julia', 'email@dajulia.com', 'ADS', 'Algoritimos', 'Preciso entender a logica do if else', 'sou boa em html', ''),
(5, 'Pedido', 'Will', 'zapzap', 'ADM', 'Sei la', 'preciso de ajuda pra vida', 'nao tenho nada a oferecer...', ''),
(6, 'Oferta', 'Zequinha', 'telefone da mamae', 'Pedagogia', 'Infantil', 'Preciso de doces', 'e balas', ''),
(7, 'Pedido', 'Will', 'zapzap', 'ADM', 'Sei la', 'preciso de ajuda pra vida', 'nao tenho nada a oferecer...', ''),
(8, 'Oferta', 'Zequinha', 'telefone da mamae', 'Pedagogia', 'Infantil', 'Preciso de doces', 'e balas', ''),
(16, 'Oferta', '', 'power', 'adm', 'max', 'amor', 'amor', 'sempre que quiser'),
(17, 'Oferta', 'd', 'd', 'ads', 'd', 'd', 'd', 'd'),
(19, 'Pedido', 'z', 'z', 'ads', 'z', 'z', 'azz', 'z'),
(20, 'Pedido', 'Jao', '61616162', 'adm', 'MatemÃ¡tica', 'Ajuda', 'Trabalho ', 'Todo dia '),
(21, 'Oferta', 'ajosdj', 'asjdko', 'adv', 'ansdja', 'asdnmalsjk', '', '121 246'),
(22, 'Pedido', 'sadajlk', 'as', 'adm', 'asndjka', 'asjdlk', 'jk', 'azsd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
