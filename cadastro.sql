-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jul-2023 às 22:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulariocadastro`
--

CREATE TABLE `formulariocadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(110) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cidade` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(110) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formulariocadastro`
--

INSERT INTO `formulariocadastro` (`id`, `nome`, `usuario`, `senha`, `email`, `telefone`, `sexo`, `data_nascimento`, `cidade`, `estado`, `endereco`) VALUES
(1, 'Rodrigo Oliveira', 'digodw', '123', 'oliveira@gmail.com', '1195985566', 'masculino', '1987-12-08', 'SÃO PAULO', 'SP', 'Rua Carlos 2252562 '),
(2, 'teste oliveira', 'oliveira', '123', '123@gmail.com', '119656565', 'masculino', '2023-03-08', 'S?O PAULO', 'S?o Paulo', 'Rua Carlos Calixto'),
(3, 'teste oliveira', 'oliveira', '123', 'alterar@gmail.com', '119656565', 'masculino', '2023-04-04', 'SÃO PAULO', 'SP', 'Rua Carlos Calixto'),
(4, 'Novo cadastro', 'Vania', '141516', 'vania@gmail.com', '1195958877', 'feminino', '2008-05-05', 'Rio de Janeiro', 'RJ', 'Rua teste'),
(5, 'Novo cadastro', 'Vania', '141516', 'vania@gmail.com', '11999999999', 'feminino', '2008-05-05', 'Rio de Janeiro', 'RJ', 'Rua teste'),
(7, 'Kauany', 'kau', '1414', 'kau@gmail.com', '1198566626', 'feminino', '2023-01-11', 'são paulp', 'sp', 'rua ciquenta 14'),
(8, 'tt', 't', 't', 't', 't', 'feminino', '2023-06-01', 'u', 'u', 'p'),
(9, 'Lucas Nartins de Oliveira', 'Lucas', '1293', 'lucas@gmail.com', '1195665599', 'masculino', '2013-06-19', 'SÃO PAULO', 'São Paulo', 'Rua Carlos Calixto 335');

-- --------------------------------------------------------

--
-- Estrutura da tabela `novos`
--

CREATE TABLE `novos` (
  `id` int(11) NOT NULL,
  `barra` varchar(15) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `marca` text NOT NULL,
  `caracteristicas` varchar(50) NOT NULL,
  `valordevenda` decimal(10,2) NOT NULL,
  `qtdcomprada` int(6) NOT NULL,
  `valordecompra` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `novos`
--

INSERT INTO `novos` (`id`, `barra`, `produto`, `marca`, `caracteristicas`, `valordevenda`, `qtdcomprada`, `valordecompra`) VALUES
(4, '5566', 'caneta', 'bic', 'verde', '1.00', 40, '0.00'),
(17, '5', '5', '5', '5', '5.00', 5, '4.00'),
(18, '123654789', 'brilho', 'avon', 'amarelo', '7.00', 30, '3.00'),
(20, '856', '655', '456', '321', '156.00', 321, '4564.00'),
(21, '88', '88', '88', '88', '88.00', 88, '88.00'),
(23, '45', '45', '45', '45', '45.00', 45, '45.00'),
(25, '56', '56', '56', '56', '56.00', 56, '56.00'),
(27, '99', '99', '99', '99', '99.00', 99, '99.00'),
(28, '1111113', '1231564te', '123t', '21t', '2121.00', 91, '18.00'),
(30, '57', '565', '654', '654', '654.00', 654, '654.00'),
(33, '5656565656', 'carro', 'vw', 'azul', '200.00', 5, '100.00'),
(35, '87975487984', 'Shampoo', 'Avon', 'para cabelo cvacheado', '25.00', 30, '15.00'),
(36, '122222', 'testeeet', 'testeeet', 'testeeet', '6.00', 1, '2.00'),
(37, '12121213', 'novo teste', 'novo teste', 'novo teste', '20.00', 22, '12.00'),
(48, '25262526', 'Make', 'Bruna Tavares', 'Marrom', '35.00', 20, '0.00'),
(50, '12131415', 'Brilho', 'Avon', '', '0.00', 0, '0.00'),
(51, '2626555', 'hhh', 'hh', 'hhh', '12.00', 15, '5.00'),
(53, '8', '8', '8', '8', '8.00', 8, '8.00'),
(54, '4', 'teste', 'teste', 'amarelo', '1.00', 2, '3.00'),
(57, '1', '12', '12', '12', '12.00', 3, '1.00'),
(60, '2', '12', '12', '12', '12.00', 2, '2.00'),
(62, '3232', '5', '5', '5', '5.00', 1, '2.00'),
(63, '9', '9', '9', '9', '9.00', 9, '9.00'),
(67, '51525654', '', '19', '19', '12.00', 3, '550.00'),
(68, '5154578888', '15', '15', '15', '15.00', 5, '1.00'),
(69, '5565656565', '20', '20', '55', '1.00', 10, '1.00'),
(70, '5566236565', '45', '45', '45', '10.00', 12, '9.00'),
(71, '2653262', 'Maquiagem', 'Bruna Tavares', 'Hidratação de pele', '12.22', 17, '8.25'),
(72, '963852741', 'teste de VALOR', 'Teste', 'novo teste', '8.00', 20, '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `barra` varchar(15) NOT NULL,
  `produto` varchar(50) NOT NULL,
  `marca` text NOT NULL,
  `caracteristicas` varchar(50) NOT NULL,
  `valordevenda` decimal(10,2) NOT NULL,
  `Item` int(3) NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `barra`, `produto`, `marca`, `caracteristicas`, `valordevenda`, `Item`, `data_hora`) VALUES
(1, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 06:14:46'),
(2, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 06:14:54'),
(3, '123654789', 'brilho', 'avon', 'amarelo', '7.00', 0, '2023-07-15 06:15:33'),
(4, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 06:16:19'),
(5, '2', '12', '12', '12', '12.00', 0, '2023-07-15 06:16:19'),
(6, '1', '12', '12', '12', '12.00', 0, '2023-07-15 06:16:19'),
(7, '123654789', 'brilho', 'avon', 'amarelo', '7.00', 0, '2023-07-15 06:16:19'),
(8, '54611663822', 'batom', 'vivai', 'marrom', '5.00', 0, '2023-07-15 06:27:14'),
(9, '123456789', 'teste', 'novo teste', 'azul', '6.00', 0, '2023-07-15 06:27:14'),
(10, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 06:36:05'),
(11, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 06:41:41'),
(12, '123654789', 'brilho', 'avon', 'amarelo', '7.00', 0, '2023-07-15 06:41:41'),
(13, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-15 07:11:25'),
(14, '123654789', 'brilho', 'avon', 'amarelo', '7.00', 0, '2023-07-15 07:11:25'),
(15, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-16 20:22:33'),
(16, '7', '7', '7', '7', '7.00', 0, '2023-07-16 20:22:33'),
(17, '7', '7', '7', '7', '7.00', 0, '2023-07-16 20:22:33'),
(18, '1', '12', '12', '12', '12.00', 0, '2023-07-16 20:22:57'),
(19, '1', '12', '12', '12', '12.00', 0, '2023-07-16 20:23:37'),
(20, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-16 20:41:10'),
(21, '5566', 'caneta', 'bic', 'verde', '1.00', 0, '2023-07-16 20:41:41'),
(22, '1', '12', '12', '12', '12.00', 0, '2023-07-16 20:41:41'),
(23, '57', '565', '654', '654', '654.00', 0, '2023-07-16 20:42:59'),
(24, '1', '12', '12', '12', '12.00', 0, '2023-07-16 20:42:59');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `formulariocadastro`
--
ALTER TABLE `formulariocadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `novos`
--
ALTER TABLE `novos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barra` (`barra`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `formulariocadastro`
--
ALTER TABLE `formulariocadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `novos`
--
ALTER TABLE `novos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
