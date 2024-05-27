-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2024 às 15:19
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ux_academia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dica`
--

CREATE TABLE `dica` (
  `coddica` int(11) UNSIGNED NOT NULL,
  `codusu` int(11) UNSIGNED NOT NULL,
  `dica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dica`
--

INSERT INTO `dica` (`coddica`, `codusu`, `dica`) VALUES
(3, 1, 'mais foco no tríceps');

-- --------------------------------------------------------

--
-- Estrutura para tabela `realizacao_treino`
--

CREATE TABLE `realizacao_treino` (
  `codrealizatreino` int(11) UNSIGNED NOT NULL,
  `codusu` int(11) UNSIGNED NOT NULL,
  `codtreino` int(11) UNSIGNED NOT NULL,
  `data_realizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `realizacao_treino`
--

INSERT INTO `realizacao_treino` (`codrealizatreino`, `codusu`, `codtreino`, `data_realizacao`) VALUES
(1, 3, 4, '2024-05-19'),
(2, 3, 4, '2024-05-20'),
(3, 3, 4, '2024-05-21'),
(4, 3, 4, '2024-05-22'),
(5, 3, 4, '2024-05-23'),
(6, 3, 4, '2024-05-24'),
(7, 3, 4, '2024-05-25'),
(8, 3, 4, '2024-05-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbexercicio`
--

CREATE TABLE `tbexercicio` (
  `codexercicio` int(11) UNSIGNED NOT NULL,
  `codtreino` int(11) UNSIGNED NOT NULL,
  `repeticoes` int(3) NOT NULL,
  `series` int(3) NOT NULL,
  `foto_exercicio` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `nome_exercicio` varchar(50) NOT NULL,
  `intervalo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbexercicio`
--

INSERT INTO `tbexercicio` (`codexercicio`, `codtreino`, `repeticoes`, `series`, `foto_exercicio`, `descricao`, `nome_exercicio`, `intervalo`) VALUES
(3, 3, 8, 3, 'R.jpg', 'Um bom abdominal começa com você deitado, um joelho dobrado e as mãos posicionadas abaixo da parte inferior das costas para apoio. \"Não faça pressão no abdômen ou pressione as costas contra o chão\"', 'Abdominal ', 60),
(4, 4, 10, 3, 'download (1).jpg', 'Mantenha a cabeça alinhada com o tronco e quadril formando uma linha reta; Flexione os cotovelos e retorne praticamente para a posição inicial do movimento, sem encostar o corpo no solo; Dê uma pequena pausa e, em seguida, repita o movimento; Durante o exercício, apenas as mãos e os pés devem tocar o chão.', 'Flexão ', 30),
(5, 6, 8, 3, '76ce36b95fc3d5451893fd9212a225e2.jpg', 'A elevação lateral com halteres é um exercício ideal para o fortalecimento dos músculos dos ombros além de melhorar a postura do atleta. Ou seja, não é útil somente para deixar os músculos mais torneados, que servem para os exercícios que utilizam os ombros.', 'Elevação lateral ', 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpersonal`
--

CREATE TABLE `tbpersonal` (
  `codpersonal` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha_personal` varchar(100) NOT NULL,
  `nome_personal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbpersonal`
--

INSERT INTO `tbpersonal` (`codpersonal`, `email`, `senha_personal`, `nome_personal`) VALUES
(1, 'Adm@gmail.com', '123', 'Leandro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtelefone`
--

CREATE TABLE `tbtelefone` (
  `codtel` int(11) UNSIGNED NOT NULL,
  `codusu` int(11) UNSIGNED NOT NULL,
  `ddd` varchar(5) NOT NULL,
  `numero` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtelefone`
--

INSERT INTO `tbtelefone` (`codtel`, `codusu`, `ddd`, `numero`) VALUES
(41, 3, '(88)', ' 9997-7051');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtreino`
--

CREATE TABLE `tbtreino` (
  `codtreino` int(11) UNSIGNED NOT NULL,
  `codpersonal` int(11) UNSIGNED NOT NULL,
  `tipo_treino` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtreino`
--

INSERT INTO `tbtreino` (`codtreino`, `codpersonal`, `tipo_treino`) VALUES
(3, 1, 'INICIANTE'),
(4, 1, 'MODERADO'),
(6, 1, 'INTENSO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codusu` int(11) UNSIGNED NOT NULL,
  `codtreino` int(11) UNSIGNED NOT NULL,
  `nome_usuario` varchar(120) NOT NULL,
  `utilizador` varchar(50) NOT NULL,
  `dominio` varchar(50) NOT NULL,
  `senha_usuario` varchar(20) NOT NULL,
  `foto_usuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codusu`, `codtreino`, `nome_usuario`, `utilizador`, `dominio`, `senha_usuario`, `foto_usuario`) VALUES
(3, 4, 'Henrique', 'Henrique', '@gmail.com', '123', 'pessoa_feliz2.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `dica`
--
ALTER TABLE `dica`
  ADD PRIMARY KEY (`coddica`);

--
-- Índices de tabela `realizacao_treino`
--
ALTER TABLE `realizacao_treino`
  ADD PRIMARY KEY (`codrealizatreino`),
  ADD KEY `fk_realiza_usu` (`codusu`),
  ADD KEY `fk_realiza_treino` (`codtreino`);

--
-- Índices de tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  ADD PRIMARY KEY (`codexercicio`),
  ADD KEY `fk_exercicio_treino` (`codtreino`);

--
-- Índices de tabela `tbpersonal`
--
ALTER TABLE `tbpersonal`
  ADD PRIMARY KEY (`codpersonal`);

--
-- Índices de tabela `tbtelefone`
--
ALTER TABLE `tbtelefone`
  ADD PRIMARY KEY (`codtel`),
  ADD KEY `fk_telefone_usuario` (`codusu`);

--
-- Índices de tabela `tbtreino`
--
ALTER TABLE `tbtreino`
  ADD PRIMARY KEY (`codtreino`),
  ADD KEY `fk_treino_personal` (`codpersonal`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codusu`),
  ADD KEY `fk_usuario_treino` (`codtreino`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dica`
--
ALTER TABLE `dica`
  MODIFY `coddica` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `realizacao_treino`
--
ALTER TABLE `realizacao_treino`
  MODIFY `codrealizatreino` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  MODIFY `codexercicio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbpersonal`
--
ALTER TABLE `tbpersonal`
  MODIFY `codpersonal` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbtelefone`
--
ALTER TABLE `tbtelefone`
  MODIFY `codtel` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `tbtreino`
--
ALTER TABLE `tbtreino`
  MODIFY `codtreino` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codusu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `realizacao_treino`
--
ALTER TABLE `realizacao_treino`
  ADD CONSTRAINT `fk_realiza_treino` FOREIGN KEY (`codtreino`) REFERENCES `tbtreino` (`codtreino`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_realiza_usu` FOREIGN KEY (`codusu`) REFERENCES `tbusuario` (`codusu`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbexercicio`
--
ALTER TABLE `tbexercicio`
  ADD CONSTRAINT `fk_exercicio_treino` FOREIGN KEY (`codtreino`) REFERENCES `tbtreino` (`codtreino`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbtelefone`
--
ALTER TABLE `tbtelefone`
  ADD CONSTRAINT `fk_telefone_usuario` FOREIGN KEY (`codusu`) REFERENCES `tbusuario` (`codusu`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbtreino`
--
ALTER TABLE `tbtreino`
  ADD CONSTRAINT `fk_treino_personal` FOREIGN KEY (`codpersonal`) REFERENCES `tbpersonal` (`codpersonal`);

--
-- Restrições para tabelas `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `fk_usuario_treino` FOREIGN KEY (`codtreino`) REFERENCES `tbtreino` (`codtreino`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
