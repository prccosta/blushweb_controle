--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `id_cliente` int(9) NOT NULL,
  `datacadastro` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `id_cliente`, `datacadastro`) VALUES
(2, 'Administrador Blushweb', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'priscila@blushweb.com.br', 4, 1, 0, '2012-10-03'),
(13, 'SBBLC - Colégio Stº Antônio Maria Zaccaria', 'sbblc', '7434ce3955963555bd25a82ef24f5ad4', 'zaccaria@zaccaria.g12.br', 1, 1, 1, '2013-02-01'),
(12, 'Monica Lima', 'monica.lima', 'f32e15e7af11d77eac7ca295b3e9a068', 'monicalima@canuteoliveiralima.com.br', 4, 1, 0, '2013-01-28'),
(14, 'Colégio São Sebastião', 'saosebastiao', 'b6741d95c279dcfa3466461a1d4e0c29', 'teste@email.com.br', 1, 1, 2, '2013-02-01');