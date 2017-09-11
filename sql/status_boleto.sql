-- --------------------------------------------------------

--
-- Estrutura da tabela `status_boleto`
--

CREATE TABLE IF NOT EXISTS `status_boleto` (
  `id_status` int(9) NOT NULL AUTO_INCREMENT,
  `nome_st_boleto` varchar(10) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_boleto`
--

INSERT INTO `status_boleto` (`id_status`, `nome_st_boleto`) VALUES
(1, 'Em aberto'),
(2, 'Em atraso'),
(3, 'Quitada'),
(4, 'Cancelada');