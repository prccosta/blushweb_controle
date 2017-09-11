--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nome`) VALUES
(1, 'Cliente'),
(2, 'Estagiários'),
(3, 'Consultores'),
(4, 'Administradores');