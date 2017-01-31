-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jan-2017 às 22:19
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eewbscom_escola_novo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atuacao`
--

CREATE TABLE `tb_atuacao` (
  `id_atuacao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE `tb_disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcao`
--

CREATE TABLE `tb_funcao` (
  `id_funcao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_graducao`
--

CREATE TABLE `tb_graducao` (
  `id_graduacao` int(11) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE tb_professor (
  professor_id int(11) NOT NULL,
  professor_nome varchar(255) NOT NULL,
  professor_email varchar(255) DEFAULT NULL,
  professor_mestrado varchar(255) DEFAULT NULL,
  professor_doutorado varchar(255) DEFAULT NULL,
  professor_status tinyint(1) NOT NULL,
  fk_funcao int(11) NOT NULL,
  fk_turno int(11) NOT NULL,
  fk_atuacao int(11) NOT NULL,
  fk_graduacao int(11) DEFAULT NULL
);

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO tb_professor (professor_id, professor_nome, professor_email, professor_mestrado, professor_doutorado, professor_status, fk_funcao, fk_turno, fk_atuacao, fk_graduacao) VALUES
(1, 'marcelo 2', 'terenciani@outlook.com', NULL, NULL, 0, 0, 0, 0, NULL),
(2, 'marcelo', 'teste@teste.com', NULL, NULL, 0, 0, 0, 0, NULL),
(3, 'dsa', 'safa@gmail.com', NULL, NULL, 0, 0, 0, 0, NULL),
(4, 'Teste', 'Teste@gmail.comsdf', NULL, NULL, 0, 0, 0, 0, NULL),
(6, 'teste', 'terenciani@outlook.com', NULL, NULL, 0, 0, 0, 0, NULL),
(7, 'tereste', 'dsfas@gdadsf.com', NULL, NULL, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor_disciplina`
--

CREATE TABLE `tb_professor_disciplina` (
  `id_professor_disciplina` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL,
  `fk_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turno`
--

CREATE TABLE `tb_turno` (
  `id_turno` int(11) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_atuacao`
--
ALTER TABLE `tb_atuacao`
  ADD PRIMARY KEY (`id_atuacao`);

--
-- Indexes for table `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Indexes for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  ADD PRIMARY KEY (`id_funcao`);

--
-- Indexes for table `tb_graducao`
--
ALTER TABLE `tb_graducao`
  ADD PRIMARY KEY (`id_graduacao`);

--
-- Indexes for table `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`professor_id`),
  ADD KEY `fk_funcao` (`fk_funcao`),
  ADD KEY `fk_turno` (`fk_turno`),
  ADD KEY `fk_atuacao` (`fk_atuacao`),
  ADD KEY `fk_graduacao` (`fk_graduacao`);

--
-- Indexes for table `tb_professor_disciplina`
--
ALTER TABLE `tb_professor_disciplina`
  ADD PRIMARY KEY (`id_professor_disciplina`),
  ADD KEY `fk_professor` (`fk_professor`),
  ADD KEY `fk_disciplina` (`fk_disciplina`);

--
-- Indexes for table `tb_turno`
--
ALTER TABLE `tb_turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_atuacao`
--
ALTER TABLE `tb_atuacao`
  MODIFY `id_atuacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_graducao`
--
ALTER TABLE `tb_graducao`
  MODIFY `id_graduacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_professor_disciplina`
--
ALTER TABLE `tb_professor_disciplina`
  MODIFY `id_professor_disciplina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_turno`
--
ALTER TABLE `tb_turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
