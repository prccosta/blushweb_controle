-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 27/02/2013 às 12:38:55
-- Versão do Servidor: 5.1.68-cll
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `blushweb_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletos`
--

CREATE TABLE IF NOT EXISTS `boletos` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `numdoc` varchar(8) NOT NULL,
  `valor` varchar(15) NOT NULL,
  `venc` varchar(10) NOT NULL,
  `idcli` int(9) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `linha_dig` varchar(50) NOT NULL,
  `nossonumero` varchar(16) NOT NULL,
  `DataCadastro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `boletos`
--

INSERT INTO `boletos` (`id`, `numdoc`, `valor`, `venc`, `idcli`, `nome`, `linha_dig`, `nossonumero`, `DataCadastro`) VALUES
(1, '10000001', '0,00', '01/01/01', 0, 'Fixo NÃO DELETAR!', '', '', '2012-09-18'),
(2, '10000002', '4,55', '22/09/2012', 2, 'Jorge Burlamaqui Lopes da Costa', '23792.92200 60001.000003 02000.762803 8 5464000000', '06/0001000', '2012-09-20'),
(3, '10000003', '168,55', '12/11/2012', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 03000.762801 5 5515000001', '06/00010000003-4', '2012-11-06'),
(4, '10000004', '165,00', '10/12/2012', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 04000.762809 1 5543000001', '06/0001000', '2012-11-06'),
(5, '10000005', '165,00', '10/01/2013', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 05000.762806 9 5574000001', '06/0001000', '2012-11-06'),
(6, '10000006', '165,00', '10/02/2013', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 06000.762804 4 5605000001', '06/0001000', '2012-11-06'),
(7, '10000007', '165,00', '10/03/2013', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 07000.762802 5 5633000001', '06/0001000', '2012-11-06'),
(8, '10000008', '165,00', '10/04/2013', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 08000.762800 2 5664000001', '06/0001000', '2012-11-06'),
(9, '10000009', '165,00', '10/05/2013', 3, 'Rodrigo Luiz de Menezes Sandes', '23792.92200 60001.000003 09000.762808 4 5694000001', '06/0001000', '2012-11-06'),
(10, '10000010', '16,95', '10/11/2012', 1, 'Lidiane Silva Santos', '23792.92200 60001.000003 10000.762806 5 5513000000', '06/0001000', '2012-11-07'),
(11, '10000011', '16,95', '10/11/2012', 2, 'Jorge Burlamaqui Lopes da Costa', '23792.92200 60001.000003 11000.762804 3 5513000000', '06/0001000', '2012-11-07'),
(12, '10000012', '16,95', '10/11/2012', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 12000.762802 1 5513000000', '06/0001000', '2012-11-07'),
(13, '10000013', '27,10', '30/11/2012', 5, 'Josiane Areia Gomes', '23792.92200 60001.000003 13000.762800 1 5533000000', '06/0001000', '2012-11-26'),
(14, '10000014', '16,95', '10/12/2012', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 14000.762808 1 5543000000', '06/00010000014-P', '2012-12-05'),
(15, '10000015', '16,95', '10/12/2012', 2, 'Jorge Burlamaqui Lopes da Costa', '23792.92200 60001.000003 15000.762805 1 5543000000', '06/00010000015-8', '2012-12-05'),
(16, '10000016', '16,95', '10/12/2012', 1, 'Lidiane Silva Santos', '23792.92200 60001.000003 16000.762803 8 5543000000', '06/00010000016-6', '2012-12-05'),
(17, '10000017', '16,95', '13/12/2012', 6, 'Simone Porto Klein', '23792.92200 60001.000003 17000.762801 2 5546000000', '06/00010000017-4', '2012-12-10'),
(20, '10000018', '75,00', '10/01/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 18000.762809 1 5574000000', '06/00010000018-2', '2012-12-10'),
(21, '10000019', '75,00', '10/02/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 19000.762807 7 5605000000', '06/00010000019-0', '2012-12-10'),
(22, '10000020', '75,00', '10/03/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 20000.762805 3 5633000000', '06/00010000020-4', '2012-12-10'),
(23, '10000021', '75,00', '10/04/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 21000.762803 1 5664000000', '06/00010000021-2', '2012-12-10'),
(24, '10000022', '75,00', '10/05/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 22000.762801 2 5694000000', '06/00010000022-0', '2012-12-10'),
(26, '10000024', '75,00', '10/07/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 24000.762807 1 5755000000', '06/00010000024-7', '2012-12-10'),
(27, '10000025', '75,00', '10/08/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 25000.762804 7 5786000000', '06/00010000025-5', '2012-12-10'),
(28, '10000026', '75,00', '10/09/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 26000.762802 2 5817000000', '06/00010000026-3', '2012-12-10'),
(29, '10000027', '75,00', '10/10/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 27000.762800 4 5847000000', '06/00010000027-1', '2012-12-10'),
(30, '10000028', '75,00', '10/06/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 28000.762808 9 5725000000', '06/00010000028-P', '2012-12-10'),
(31, '10000029', '98,00', '15/12/2012', 4, 'Alessandro Talvanes', '23792.92200 60007.000007 02000.762803 1 5548000000', '06/0007000', '2012-11-14'),
(32, '10000030', '98,00', '15/01/2013', 4, 'Alessandro Talvanes', '23792.92200 60007.000007 03000.762801 7 5579000000', '06/0007000', '2012-11-14'),
(33, '10000031', '98,00', '15/02/2013', 4, 'Alessandro Talvanes', '23792.92200 60007.000007 04000.762809 2 5610000000', '06/0007000', '2012-11-14'),
(34, '10000032', '98,00', '15/03/2013', 4, 'Alessandro Talvanes', '23792.92200 60007.000007 05000.762806 3 5638000000', '06/0007000', '2012-11-14'),
(35, '10000033', '98,00', '15/04/2013', 4, 'Alessandro Talvanes', '23792.92200 60007.000007 06000.762804 1 5669000000', '06/0007000', '2012-11-14'),
(39, '10000034', '16,95', '10/01/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 34000.762806 5 5574000000', '06/00010000034-4', '2013-01-09'),
(40, '10000035', '16,95', '10/01/2013', 2, 'Jorge Burlamaqui Lopes da Costa', '23792.92200 60001.000003 35000.762803 3 5574000000', '06/00010000035-2', '2013-01-09'),
(41, '10000036', '16,95', '10/01/2013', 1, 'Lidiane Silva Santos', '23792.92200 60001.000003 36000.762801 1 5574000000', '06/00010000036-0', '2013-01-09'),
(42, '10000037', '16,95', '10/01/2013', 6, 'Simone Porto Klein', '23792.92200 60001.000003 37000.762809 1 5574000000', '06/00010000037-9', '2013-01-09'),
(43, '10000038', '16,95', '15/02/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 38000.762807 2 5610000000', '06/00010000038-7', '2013-02-10'),
(44, '10000039', '16,95', '15/02/2013', 1, 'Lidiane Silva Santos', '23792.92200 60001.000003 39000.762805 1 5610000000', '06/00010000039-5', '2013-02-10'),
(45, '10000040', '16,95', '15/02/2013', 2, 'Jorge Burlamaqui Lopes da Costa', '23792.92200 60001.000003 40000.762803 4 5610000000', '06/00010000040-9', '2013-02-10'),
(46, '10000041', '114,04', '18/03/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 41000.762801 1 5641000001', '06/00010000041-7', '2013-02-25'),
(47, '10000042', '114,04', '18/04/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 42000.762809 7 5672000001', '06/00010000042-5', '2013-02-25'),
(48, '10000043', '114,04', '18/05/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 43000.762807 7 5702000001', '06/00010000043-3', '2013-02-25'),
(49, '10000044', '114,04', '18/06/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 44000.762805 4 5733000001', '06/00010000044-1', '2013-02-25'),
(50, '10000045', '114,04', '18/07/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 45000.762802 6 5763000001', '06/00010000045-P', '2013-02-25'),
(51, '10000046', '114,04', '18/08/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 46000.762800 3 5794000001', '06/00010000046-8', '2013-02-25'),
(52, '10000047', '114,04', '18/09/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 47000.762808 9 5825000001', '06/00010000047-6', '2013-02-25'),
(53, '10000048', '114,04', '18/10/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 48000.762806 1 5855000001', '06/00010000048-4', '2013-02-25'),
(54, '10000049', '114,04', '18/11/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 49000.762804 8 5886000001', '06/00010000049-2', '2013-02-25'),
(55, '10000050', '114,04', '18/12/2013', 4, 'Alessandro Talvanes', '23792.92200 60001.000003 50000.762802 3 5916000001', '06/00010000050-6', '2013-02-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `empresa` varchar(70) NOT NULL,
  `responsavel` varchar(70) NOT NULL,
  `pessoa` varchar(8) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(70) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `datanasc` varchar(8) NOT NULL,
  `dominio` varchar(60) NOT NULL,
  `tplano` varchar(50) NOT NULL,
  `userfinanc` varchar(20) NOT NULL,
  `senhafinanc` varchar(20) NOT NULL,
  `userhospeda` varchar(20) NOT NULL,
  `senhahospeda` varchar(20) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cpanel` varchar(50) NOT NULL,
  `ftp` varchar(50) NOT NULL,
  `webmail` varchar(50) NOT NULL,
  `pop3` varchar(50) NOT NULL,
  `smtp` varchar(50) NOT NULL,
  `obs` text NOT NULL,
  `DataCadastro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `sobrenome`, `empresa`, `responsavel`, `pessoa`, `cnpj`, `cpf`, `email`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `rg`, `telefone`, `celular`, `datanasc`, `dominio`, `tplano`, `userfinanc`, `senhafinanc`, `userhospeda`, `senhahospeda`, `senha`, `cpanel`, `ftp`, `webmail`, `pop3`, `smtp`, `obs`, `DataCadastro`) VALUES
(7, 'Monica', 'de Oliveira Lima', 'Canut e Oliveira Lima Advogados Associados', 'Monica de Oliveira Lima', 'Jurídica', '05.378.454/0001-14', '', 'monicalima@canuteoliveiralima.com.br', 'Av. Erasmo Braga 227, Grupo1203', 'Centro', 'Rio de Janeiro', 'RJ', '20020-000', '', '(21)2292-4874', '(21)2524-4055', '', 'canuteoliveiralima.com.br', 'Sistema de Controle de Cobrança', '', '', '', '', '', '', '', '', '', '', '', '2012-09-19'),
(8, 'Gildete', 'Amorim', 'EPILRJ', 'Gildete Amorim', 'Jurídica', '08.995.880/0001-95', '', 'apilrj@yahoo.com.br', 'Rua Buenos Aires, 283', '', '', '', '20061-003', '', '(21)3619-6481', '(21)7728-1304', '', 'www.epilrj.com.br', '', '', '', '', '', '', '', '', '', '', '', '', '2013-01-07'),
(1, 'Lidiane', 'Silva Santos', 'Frutos do Corpo', '', '', '', '053.573.837-40', 'frutosdocorpo@gmail.com', 'Avenida Wadislau Bulgalsky 3826', 'Jardim Buenos Aires', 'Almirante Tamandaré Grande Curitiba', 'PR', '83511-000', '', '(41)9887-8846', '', '26/06/19', '', 'Básico II', '', '', '', '', '12345', '', '', '', '', '', '', '2012-09-18'),
(2, 'Jorge', 'Burlamaqui Lopes da Costa', 'JBCONTÁBIL', '', '', '', '393.455.647-72', 'jburlamaqui@ibest.com.br', 'Rua Judite, 44', 'Éden', 'São João de Meriti', 'RJ', '25535-490', '', '(21)2756-3698', '', '14/04/19', '', 'Básico II', '', '', '', '', '12345', '', '', '', '', '', '', '2012-09-18'),
(3, 'Rodrigo', 'Luiz de Menezes Sandes', 'Academia Technofit', '', '', '', '103.961.207-50', 'rodrigosnds@gmail.com', 'RUA FELICIANO PENA, 268', 'VILA DA PENHA', 'Rio de Janeiro', 'RJ', '21221-450', '', '(21)8232-7795', '', '24/10/19', '', 'Básico II', '', '', '', '', '12345', '', '', '', '', '', '', '2012-11-06'),
(4, 'Alessandro', 'Talvanes', 'Alessandro Talvanes', '', '', '', '012.084.837-65', 'alessandrocurso@globo.com', 'Rua CapitÃ£o Resende, 408 - casa 3', 'Cachambi', 'Rio de Janeiro', 'RJ', '20780-190', '', '(21)7904-0745', '', '08/07/74', '', 'Básico II', '', '', '', '', '12345', '', '', '', '', '', '', '2012-11-07'),
(5, 'Josiane', 'Areia Gomes', 'Diário Solto', '', '', '', '', 'josigomes16@gmail.com', 'Rua Morrinhos 137', 'Éden', 'São João de Meriti', 'RJ', '25545-540', '', '(21)2755-0274', '', '16/06/19', '', 'Básico II', '', '', '', '', '', '', '', '', '', '', '', '2012-11-26'),
(6, 'Simone', 'Porto Klein', 'A Rapidinha', 'Simone Klein e Esther Gama', 'Física', '', '028.740.627-07', 'simonepklein@gmail.com', 'Rua Paulo Antunes Ribeiro, 115, Ap 301', 'Recreio dos Bandeirantes', 'Rio de Janeiro', 'RJ', '22790-450', '', '(21)8350-2380', '', '23/04/19', '', 'Básico II', '', '', '', '', '', '', '', '', '', '', '', '2012-12-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadhospe`
--

CREATE TABLE IF NOT EXISTS `cadhospe` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `empresa` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `datanasc` varchar(8) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `tplano` varchar(10) NOT NULL,
  `DataCadastro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cadhospe`
--

INSERT INTO `cadhospe` (`id`, `nome`, `sobrenome`, `empresa`, `email`, `cpf`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `datanasc`, `senha`, `tplano`, `DataCadastro`) VALUES
(1, 'Lidiane', 'Silva Santos', 'Frutos do Corpo', 'frutosdocorpo@gmail.com', '053.573.837-40', 'Avenida Wadislau Bulgalsky 3826', 'Jardim Buenos Aires', 'Almirante Tamandaré Grande Curitiba', 'PR', '83511-000', '(41)9887-8846', '26/06/19', '12345', 'Básico II', '2012-09-18'),
(2, 'Jorge', 'Burlamaqui Lopes da Costa', 'JBCONTÁBIL', 'jburlamaqui@ibest.com.br', '393.455.647-72', 'Rua Judite, 44', 'Éden', 'São João de Meriti', 'RJ', '25535-490', '(21)2756-3698', '14/04/19', '12345', 'Básico II', '2012-09-18'),
(3, 'Rodrigo', 'Luiz de Menezes Sandes', 'Academia Technofit', 'rodrigosnds@gmail.com', '103.961.207-50', 'RUA FELICIANO PENA, 268', 'VILA DA PENHA', 'Rio de Janeiro', 'RJ', '21221-450', '(21)8232-7795', '24/10/19', '12345', 'Básico II', '2012-11-06'),
(4, 'Alessandro', 'Talvanes', 'Alessandro Talvanes', 'alessandrocurso@globo.com', '012.084.837-65', 'Rua Capitão Resende, 408 - casa 3', 'Cachambi', 'Rio de Janeiro', 'RJ', '20780-190', '(21)7904-0745', '08/07/74', '12345', 'Básico II', '2012-11-07'),
(5, 'Josiane', 'Areia Gomes', 'Diário Solto', 'josigomes16@gmail.com', '', 'Rua Morrinhos 137', 'Éden', 'São João de Meriti', 'RJ', '25545-540', '(21)2755-0274', '16/06/19', '', 'Básico II', '2012-11-26'),
(6, 'Simone', 'Porto Klein', 'Simone Klein e Esther Gama', 'simonepklein@gmail.com', '028.740.627-07', 'Rua Paulo Antunes Ribeiro, 115, Ap 301', 'Recreio dos Bandeirantes', 'Rio de Janeiro', 'RJ', '22790-450', '(21)8350-2380', '23/04/19', '', 'Básico II', '2012-12-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE IF NOT EXISTS `orcamento` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `ano` varchar(2) NOT NULL,
  `data` varchar(25) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tiposite` varchar(42) NOT NULL,
  `tecnologia` varchar(25) NOT NULL,
  `tiposite2` varchar(42) NOT NULL,
  `empresa` varchar(30) NOT NULL,
  `obs` text NOT NULL,
  `etapa1` varchar(2) NOT NULL,
  `etapa2` varchar(2) NOT NULL,
  `etapa3` varchar(2) NOT NULL,
  `valor` varchar(15) NOT NULL,
  `extenso` varchar(50) NOT NULL,
  `formapag` varchar(20) NOT NULL,
  `DataCadastro` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `ano`, `data`, `cliente`, `email`, `tiposite`, `tecnologia`, `tiposite2`, `empresa`, `obs`, `etapa1`, `etapa2`, `etapa3`, `valor`, `extenso`, `formapag`, `DataCadastro`) VALUES
(149, '12', '14 de Setembro de 2012', 'Monica Lima', 'monicalima@canuteoliveiralima.com.br', 'desenvolvimento do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do sistema', 'Canut e Oliveira Lima Advogado', '1. Cadastro\r\n2. Consulta\r\n3. Alteração\r\n4. Exclusão\r\n5. Relatórios\r\n\r\nOs campos, métodos de busca e relatórios serão feitos de acordo com o cliente ou utilizados os já existentes.', '3', '5', '7', '2.000,00', 'Dois mil reais', '10x sem juros', '2012-09-14'),
(150, '12', '14 de Setembro de 2012', 'Monica Lima', 'monicalima@canuteoliveiralima.com.br', 'desenvolvimento do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do sistema', 'Canut e Oliveira Lima Advogado', '1. Débito\r\n2. Parcela\r\n3. Devedor\r\n4. Cliente\r\n5. Usuário\r\n6. Relatórios\r\n7. News\r\n\r\nO Sistema de Controle de Cobrança - SCC versão 1.0 terá os mesmos itens do antigo sistema, sendo que utilizaremos uma tecnologia tanto no sistema quanto na base de dados mais atual, mais rápida e mais segura.\r\n\r\nVisando a facilidade, rapidez e ganho de tempo será acrescentada uma rotina de importação de arquivos de remessa de modo que o cadastro de cobrança seja automatizado e também será acrescentado uma área do cliente, com login e senha para cada cliente visualizar sua prestação de contas a hora que desejar.', '10', '15', '15', '4.000,00', 'Quatro mil reais', '10x sem juros', '2012-09-14'),
(151, '12', '22 de Novembro de 2012', 'Simone Klein', 'klein.simone@gmail.com', 'desenvolvimento do SSG', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do SSG', 'SIMONE KLEIN E ESTHER GAMA', 'Sistema totalmente gerenciável para Imobiliárias e corretores com painel de controle de fácil acesso. Após a configuração o cliente gerencia com facilidade o controle das produtos cadastrados.', '5', '7', '10', '650,00', 'Seicentos e cinquenta reais', '10x sem juros', '2012-11-22'),
(152, '12', '22 de Novembro de 2012', 'Simone Klein', 'klein.simone@gmail.com', 'desenvolvimento do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do sistema', 'SIMONE KLEIN', 'Sistema de controle de clientes e profissionais com cadastro, consulta, alteração, exclusão e relatórios com login e senha.', '15', '15', '15', '850,00', 'Oitocentos e cinquenta reais', '10x sem juros', '2012-11-22'),
(153, '12', '10 de Dezembro de 2012', 'Simone Klein', 'klein.simone@gmail.com', 'desenvolvimento do site', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do site', 'Simone Klein e Esther Gama', 'Desenvolvimento de uma loja virtual completa com diversas formas de pagamento, cadastro ilimitado de produtos, módulo avise-me.', '10', '10', '15', '700,00', 'Setecentos reais', '10x sem juros', '2012-12-10'),
(154, '12', '27 de Dezembro de 2012', 'Patricia da Mata', 'apilrj@yahoo.com.br', 'desenvolvimento do site', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do site', 'EPILRJ', 'um site de inscrições em 3 línguas: <br><br>\r\nPortuguês, Inglês e Espanhol, com link para pagamento através do PagSeguro com recebimento através de e-mail.\r\n<br><br>\r\nSite solicitado em caráter de urgência com isso pode ser entregue antes do prazo estipulado no orçamento.', '3', '5', '7', '530,00', 'Quinhentos e trinta reais', '5x sem juros', '2012-12-27'),
(155, '12', '27 de Dezembro de 2012', 'Patricia da Mata', 'apilrj@yahoo.com.br', 'desenvolvimento do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do sistema', 'EPILRJ', 'um sistema de inscrições em 3 línguas: <br><br>\r\nPortuguês, Inglês e Espanhol, com link para pagamento através do PagSeguro com cadastro em banco de dados e com consulta das inscrições.\r\n<br><br>\r\nSistema solicitado em caráter de urgência com isso pode ser entregue antes do prazo estipulado no orçamento.', '5', '5', '10', '1.700,00', 'Hum mil e setecentos reais', '10x sem juros', '2012-12-27'),
(156, '13', '25 de Fevereiro de 2013', 'Juliana Sant\\''anna', ' juliasant28@gmail.com', 'desenvolvimento do site e do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do Site e do Sistema', 'Juliana Sant\\''anna', 'Desenvolvimento do site institucional contendo os seguintes itens:\r\n\r\n- Quem somos (História da Empresa)\r\n- Missão, visão e valores\r\n- Representantes exclusivos\r\n- Representados\r\n- Áreas atendidas\r\n- Catálogo de produtos\r\n- Agenda técnica\r\n- Receituário\r\n- Treinamentos\r\n- Notícias\r\n- Orçamento\r\n- Trabalhe conosco\r\n- Contato\r\n\r\nDesenvolvimento do sistema(Área Restrita) com banco de dados e com os seguintes itens:\r\n\r\n- Promoções\r\n- Alterar senha\r\n- Tabela de Preços(Diferenciada por cliente)\r\n- Pedido\r\n- Link Nota Fiscal\r\n- Consulta de Produtos\r\n- Mapa do site', '10', '20', '30', '4.000,00', 'Quatro mil reais', '10x sem juros', '2013-02-25'),
(157, '13', '27 de Fevereiro de 2013', 'Carlos Thompson', 'cafthompson@gmail.com', 'manutenção do Site e/ou Sistema', 'PHP, MySQL, HTML E CSS', 'Manutenção do Site e/ou Sistema', 'Carlos Thompson', 'No plano de manutenção o cliente terá direito à 100 atualizações duas vezes no mês. Data essa a ser combinada na assinatura do contrato.\r\n\r\nPara pagamentos à vista, o cliente tem 10% de desconto.\r\n\r\nAtualizações – Qualquer alteração solicitada ou a ser concluída.', '0', '0', '0', '1.200.00', 'Hum mil e duzentos', '12x sem juros', '2013-02-27'),
(158, '13', '27 de Fevereiro de 2013', 'Carlos Thompson', 'cafthompson@gmail.com', 'desenvolvimento do site e do sistema', 'PHP, MySQL, HTML E CSS', 'Desenvolvimento do Site e do Sistema', 'Carlos Thompson', 'O itens abaixo se referem ao site:\r\n\r\n- Home\r\n- Quem sou\r\n- Cursos\r\n- Vídeos Gratuitos\r\n- Notícias\r\n- Contato\r\n\r\nOs itens abaixo se referem ao sistema:\r\n\r\nÁREA ADMINISTRATIVA:\r\n- Cadastro de Usuários\r\n- Consultas / Alterações / Exclusões\r\n- Relatórios (Total de alunos por curso, Por ordem alfabética)\r\n\r\nÁREA DO ALUNO\r\n- Cursos disponíveis\r\n- Alterar senha\r\n\r\nPARA PAGAMENTOS À VISTA O CLIENTE TEM 10% DE DESCONTO.', '10', '20', '30', '2.000.00', 'Dois mil reais', '10x sem juros', '2013-02-27'),
(159, '13', '27 de Fevereiro de 2013', 'Carlos Thompson', 'cafthompson@gmail.com', 'publicidade(criação e divulgação)', 'HTML e CSS', 'Publicidade(criação e divulgação)', 'Carlos Thompson', 'Criação de páginas do Facebook e Twitter e divulgação nas mesmas pelo período de 6 (seis) meses a contar pela data de assinatura do contrato.\r\n\r\nPARA PAGAMENTOS À VISTA O CLIENTE TEM 10% DE DESCONTO.', '0', '0', '0', '500.00', 'Quinhentos reais', '10x sem juros', '2013-02-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`) VALUES
(1, 'admin', 'e822a1d049333bce5fb71ce43ffd9f55', 'Administrador'),
(4, 'xuxu', 'b96b03c3d38dac7ad0a0a0df2ddd8c7d', 'Priscila'),
(5, 'rose', 'fcdc7b4207660a1372d0cd5491ad856e', 'Teste criptografado');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
