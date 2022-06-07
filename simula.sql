CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
);