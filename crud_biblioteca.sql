-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 19:28
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
-- Banco de dados: `crud_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `emprestimo_id` int(11) NOT NULL,
  `livro_emprestimo` varchar(255) NOT NULL,
  `nome_livro` varchar(255) NOT NULL,
  `aluno_emprestimo` varchar(255) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`emprestimo_id`, `livro_emprestimo`, `nome_livro`, `aluno_emprestimo`, `data_emprestimo`, `data_devolucao`) VALUES
(67, '24', 'A culpa é das Estrelas', 'gu', '2023-11-27', '0000-00-00'),
(68, '28', 'Sexo com gordão', 'gu', '2023-11-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_emprestimos`
--

CREATE TABLE `historico_emprestimos` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) DEFAULT NULL,
  `aluno_nome` varchar(255) DEFAULT NULL,
  `acao` varchar(20) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `historico_emprestimos`
--

INSERT INTO `historico_emprestimos` (`id`, `livro_id`, `aluno_nome`, `acao`, `data`) VALUES
(25, 24, 'gu', 'devolucao', '2023-11-27 13:14:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(155) NOT NULL,
  `quantidade` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `nome`, `preco`, `imagem`, `quantidade`) VALUES
(24, 'A culpa é das Estrelas', '55', '..\\index\\public\\assets\\img\\uploads\\livro2.jpg', 2),
(25, 'A arte da Guerra', '150', '..\\index\\public\\assets\\img\\uploads\\livro3.jpg', 4),
(26, 'Sobrevivendo ao Inferno', '75', '..\\index\\public\\assets\\img\\uploads\\livro4.jpg', 5),
(27, 'zsdzsdzs', '12', '..\\index\\public\\assets\\img\\uploads\\livro3.jpg', 6),
(28, 'Sexo com gordão', '150', '..\\index\\public\\assets\\img\\uploads\\Karch Kiraly.jpg', 4),
(29, 'Alhos Negro', '15', '..\\index\\public\\assets\\img\\uploads\\Giba.jpg', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_u` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `niveis` varchar(215) NOT NULL,
  `quantidade` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_u`, `email`, `senha`, `niveis`, `quantidade`) VALUES
(3, 'gudo', 'g.bra@outlook.com.br', '123', '', 5),
(4, 'asd', 'asd@a', 'asd', '', 3),
(5, 'gu', 'guh@gmail.com', '123', 'admin', 4),
(9, 'a', 'a@a', 'a', '', 2),
(10, 'louzada', 'louzis@gmail.com', '123', '', 1),
(11, 'dave', 'dave@gmail.com', '123', '', 0),
(12, 'adm', 'adm@gmail.com', '123', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`emprestimo_id`);

--
-- Índices para tabela `historico_emprestimos`
--
ALTER TABLE `historico_emprestimos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `emprestimo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `historico_emprestimos`
--
ALTER TABLE `historico_emprestimos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
