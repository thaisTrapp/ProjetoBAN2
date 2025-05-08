-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/05/2025 às 04:31
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`id_autor`, `nome`, `is_deleted`) VALUES
(1, 'autor01', 1),
(2, 'J.K. Rowling', 0),
(3, 'George R.R. Martin', 0),
(4, 'J.R.R. Tolkien', 0),
(5, 'Agatha Christie', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `nome`, `is_deleted`) VALUES
(1, 'editora01', 0),
(2, 'Editora Record', 1),
(3, 'HarperCollins', 0),
(4, 'Companhia das Letras', 0),
(5, 'Harper Perennial', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id_estoque` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `ano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id_estoque`, `titulo`, `id_autor`, `id_editora`, `quantidade`, `ano`) VALUES
(5, 'Harry Potter e a Câmara Secreta', 1, 1, 120, 1998),
(7, 'O Senhor dos Anéis', 3, 3, 60, 1954),
(8, 'Morte no Nilo', 4, 4, 90, 1937);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_autor`
--

CREATE TABLE `livro_autor` (
  `id_livro` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_editora` (`id_editora`);

--
-- Índices de tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD PRIMARY KEY (`id_livro`,`id_autor`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`);

--
-- Restrições para tabelas `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `livro_autor_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_estoque`) ON DELETE CASCADE,
  ADD CONSTRAINT `livro_autor_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
