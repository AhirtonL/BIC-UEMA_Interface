CREATE TABLE `tbl_grupo` (
  `int_grupoid` int(11) NOT NULL auto_increment,
  `str_descricao` varchar(30) default NULL,
  `int_turmaId` int(11) default NULL,
  PRIMARY KEY  (`int_grupoid`),
  UNIQUE KEY `int_GrupoId` (`int_grupoid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




CREATE TABLE `tbl_turma` (
  `int_turmaid` int(11) NOT NULL auto_increment,
  `str_descricao` varchar(30) NOT NULL,
  PRIMARY KEY  (`int_turmaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `tbl_turma`
-- 

INSERT INTO `tbl_turma` VALUES (1, 'Turma 2010.1');
INSERT INTO `tbl_turma` VALUES (2, 'Outros');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `tbl_usuario`
-- 

CREATE TABLE `tbl_usuario` (
  `str_nome` varchar(100) NOT NULL,
  `int_usuarioid` int(11) NOT NULL auto_increment,
  `int_turmaid` int(11) NOT NULL,
  `str_cpf` varchar(20) NOT NULL,
  `str_email` varchar(70) NOT NULL,
  `str_fone` varchar(20) NOT NULL,
  PRIMARY KEY  (`int_usuarioid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

