-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Fev-2023 às 21:49
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `piforum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico`
--

CREATE TABLE `topico` (
  `id_topico` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `topico` varchar(500) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `topico`
--

INSERT INTO `topico` (`id_topico`, `id_user`, `titulo`, `topico`, `data`) VALUES
(2, 1, 'Testeeeeee', 'aasdasdasdasdsad', '2023-02-26'),
(7, 3, 'afwefwefwefwefwef', 'rgergergergregerg', '2023-02-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nivel` int(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_cri` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `nivel`, `nome`, `email`, `senha`, `data_cri`) VALUES
(1, 1, 'Rand0m', 'email@email.com', '1234', '2023-02-17 14:43:33'),
(2, 0, 'Usuario', 'usuario@email.com', '1234', '2023-02-17 14:48:10'),
(3, 2, 'SuperAdm', 'super@email.com', '1234', '2023-02-23 14:08:10'),
(24, 0, 'travis', 'travis@email.com', '1234', '2023-02-26 17:16:33'),
(25, 0, 'novo', 'novo@email.com', '1234', '2023-02-26 17:17:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`id_topico`),
  ADD KEY `fk_topico_usuario` (`id_user`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `topico`
--
ALTER TABLE `topico`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `topico`
--
ALTER TABLE `topico`
  ADD CONSTRAINT `fk_topico_usuario` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
