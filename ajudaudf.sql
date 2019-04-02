-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 29-Out-2018 às 20:58
-- Versão do servidor: 5.5.62-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.26

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('M','F','NI') NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `curso` varchar(30) NOT NULL,
  `semestre` int(2) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `usuario`, `nascimento`, `sexo`, `telefone`, `email`, `senha`, `curso`, `semestre`, `turno`, `descricao`) VALUES
(1, 'Antony Lucas Rodrigues Almeida', 'lucas.rodrigues', '1994-09-25', 'M', '61983213209', 'antonylucasti@gmail.com', 'b3062a86ce384f3f8afee4aa16221bfad1d680d1', 'ADS - ANÁLISE DE SISTEMAS', 2, 'M', ''),
(2, 'Willian Taiguara', 'williantaiguara', '1987-10-28', 'M', '61983133640', 'willianwt@gmail.com', '1ffd38d785a5cef62c7d39d4d8fc0211ad854389', 'ADS - ANÁLISE DE SISTEMAS', 2, 'Noturno', ''),
(4, 'Thiago Rosa Machado', 'ThiagoRM', '1992-01-04', 'M', '61984811579', 'thrsmachado@gmail.com', '413c2b3a265cc52dee8d7d0dc517865fd0ad757b', 'ADS - ANÁLISE DE SISTEMAS', 1, 'Noturno', '');

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
(67, 'SECRETARIADO EXECUTIVO'),
(68, 'SISTEMAS DE INFORMAÇÃO'),
(69, 'TÉCNICO EM ENFERMAGEM'),
(70, 'TÉCNICO EM INFORMÁTICA'),
(71, 'TÉCNICO EM LOGÍSTICA'),
(72, 'TÉCNICO EM MEIO AMBIENTE'),
(73, 'TÉCNICO DE JOGOS DIGITAIS'),
(74, 'TÉCNICO EM REDES DE PC');

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
  `disponibilidade` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de pedidos e ofertas de ajuda' AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `tipo`, `usuario`, `contato`, `curso`, `materia`, `assunto`, `disponibilidade`) VALUES
(1, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'TOPICOS ESPECIAIS DA INTERNET ', 'Não obstante, a complexidade dos estudos efetuados exige a precisão e a definição do retorno esperado a longo prazo.\n', 'Noturno'),
(2, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'POO', 'Gostaria de enfatizar que o comprometimento entre as equipes desafia a capacidade de equalização do levantamento das variáveis envolvidas.\n', 'Noturno'),
(3, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'ARQUITETURA E URBANISMO', 'Portugues', 'Por conseguinte, a expansão dos mercados mundiais pode nos levar a considerar a reestruturação dos relacionamentos verticais entre as hierarquias.\n', '10 as 12'),
(5, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'TOPICOS ESPECIAIS DA INTERNET ', 'Todavia, o acompanhamento das preferências de consumo causa impacto indireto na reavaliação dos níveis de motivação departamental.\n', 'Noturno'),
(6, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'TOPICOS ESPECIAIS DA INTERNET ', 'A certificação de metodologias que nos auxiliam a lidar com o julgamento imparcial das eventualidades aponta para a melhoria das diversas correntes de pensamento.\n', 'Noturno'),
(9, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'CIÊNCIA POLÍTICA', 'Política', 'A certificação de metodologias que nos auxiliam a lidar com o julgamento imparcial das eventualidades aponta para a melhoria das diversas correntes de pensamento.\n', 'manhã'),
(15, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'TOPICOS ESPECIAIS DA INTERNET ', 'A nível organizacional, a valorização de fatores subjetivos representa uma abertura para a melhoria dos paradigmas corporativos.\n', 'Noturno'),
(16, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'CIÊNCIAS BIOLÓGICAS ', 'TOPICOS ESPECIAIS DA INTERNET ', 'O que temos que ter sempre em mente é que a competitividade nas transações comerciais estende o alcance e a importância das formas de ação.\n', 'Noturno'),
(19, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'CIÊNCIA DA COMPUTAÇÃO', 'TOPICOS ESPECIAIS DA INTERNET ', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.\n', 'Noturno'),
(21, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'ADMINISTRAÇÃO', 'TOPICOS ESPECIAIS DA INTERNET ', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.\n', 'Noturno'),
(23, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'CIÊNCIA POLÍTICA', 'TOPICOS ESPECIAIS DA INTERNET ', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.\n', 'Noturno'),
(29, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'DESIGN DE INTERIORES ', 'Artes', 'Ofereço ajuda com historia da arte.', '12 as 14'),
(32, 'Pedido', 'lucas.rodrigues', '61983213209', 'ADS - ANÁLISE DE SISTEMAS', 'Programação Orientada a Objeto', 'Preciso fazer alguns exercícios que estou com dificuldades.', 'Qualquer horário'),
(33, 'Oferta', 'lucas.rodrigues', '61983213209', 'BIOMEDICINA', 'Microbiologia', 'Ofereço ajuda na cadeira de "Microbiologia".', 'Vespertino'),
(34, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'POO', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.', 'manha'),
(35, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'ADS - ANÁLISE DE SISTEMAS', 'POO', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.', 'manha'),
(36, 'Pedido', 'williantaiguara', 'willianwt@gmail.com', 'CIÊNCIA POLÍTICA', 'TOPICOS ESPECIAIS DA INTERNET ', 'Assim mesmo, o início da atividade geral de formação de atitudes nos obriga à análise da gestão inovadora da qual fazemos parte.\r\n', 'Noturno'),
(37, 'Pedido', 'lucas.rodrigues', '61983213209', 'ADS - ANÁLISE DE SISTEMAS', 'Programação Orientada a Objeto', 'Preciso fazer alguns exercícios que estou com dificuldades.', 'Qualquer horário'),
(38, 'Oferta', 'williantaiguara', 'willianwt@gmail.com', 'DESIGN DE INTERIORES ', 'Artes', 'Ofereço ajuda com historia da arte.', '12 as 14'),
(39, 'Pedido', 'lucas.rodrigues', '61983213209', 'ADS - ANÁLISE DE SISTEMAS', 'Programação Orientada a Objeto', 'Preciso fazer alguns exercícios que estou com dificuldades.', 'Qualquer horário'),
(40, 'Oferta', 'ThiagoRM', '61984811579', 'ADMINISTRAÇÃO', 'Matemática Financeira ', 'Matemática financeira', 'matutino e vespertin'),
(41, 'Pedido', 'ThiagoRM', '61984811579', 'DIREITO', 'Direito administrativo ', 'Licitações ', 'Qualquer horario '),
(42, 'Oferta', 'lucas.rodrigues', '61983213209', 'TÉCNICO EM MEIO AMBIENTE', 'Microbiologia', 'Por conseguinte, a necessidade de renovação processual não pode mais se dissociar das diretrizes de desenvolvimento para o futuro.', 'Qualquer horário'),
(43, 'Pedido', 'lucas.rodrigues', '61983213209', 'CIÊNCIAS ECONÔMICAS', 'Linguagem R', 'Gostaria de enfatizar que a percepção das dificuldades causa impacto indireto na reavaliação do fluxo de informações.', 'Noturno'),
(44, 'Oferta', 'lucas.rodrigues', '6133213030', 'ENG.CIVIL', 'Geotecnia', 'Gostaria de enfatizar que o novo modelo estrutural aqui preconizado prepara-nos para enfrentar situações atípicas decorrentes do orçamento setorial.', 'Qualquer horário'),
(45, 'Pedido', 'lucas.rodrigues', '6133213030', 'GESTÃO HOSPITALAR', 'Anatomia', 'A certificação de metodologias que nos auxiliam a lidar com a expansão dos mercados mundiais estimula a padronização dos procedimentos normalmente adotados.', 'matutino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recovery_keys`
--

CREATE TABLE IF NOT EXISTS `recovery_keys` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `recovery_keys`
--

INSERT INTO `recovery_keys` (`rid`, `usuario`, `token`, `valid`) VALUES
(8, 'williantaiguara', 'cd229ef79b43b6a11abff398c32af100', 1),
(9, 'lucas.rodrigues', '68c118aed8a921d6fcb8f525e555c60d', 1),
(10, 'williantaiguara', 'cb4c122fcee2865e401bb7b15dd09e23', 1),
(11, 'lucas.rodrigues', 'f5c63f53c4f1bfc05aab0e44a5970737', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
