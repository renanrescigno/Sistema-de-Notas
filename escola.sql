SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Estrutura da tabela `tbalunos`

CREATE TABLE `tbalunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `rua` varchar(70) NOT NULL,
  `bairro` varchar(70) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(70) NOT NULL,
  `numero` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(70) NOT NULL,
  `disciplina` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Extraindo dados da tabela `tbalunos`

INSERT INTO `tbalunos` (`id`, `nome`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `numero`, `email`, `telefone`, `disciplina`) VALUES

-- Estrutura da tabela `tbmateria`

CREATE TABLE `tbmateria` (
  `id` int(11) NOT NULL,
  `disciplina` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Extraindo dados da tabela `tbmateria`

INSERT INTO `tbmateria` (`id`, `disciplina`) VALUES

-- Estrutura da tabela `tbnotas`

CREATE TABLE `tbnotas` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `disciplina` varchar(70) NOT NULL,
  `av1` varchar(3) NOT NULL,
  `av2` varchar(3) NOT NULL,
  `av3` varchar(3) NOT NULL,
  `media` varchar(3) NOT NULL,
  `conceito` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Extraindo dados da tabela `tbnotas`

INSERT INTO `tbnotas` (`id`, `nome`, `disciplina`, `av1`, `av2`, `av3`, `media`, `conceito`) VALUES

-- INDICES PARA MODIFICAÇÃO 

ALTER TABLE `tbalunos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbmateria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbnotas`
  ADD PRIMARY KEY (`id`);

-- INDICES PARA INCREMENTO

ALTER TABLE `tbalunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222222;

ALTER TABLE `tbmateria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;

ALTER TABLE `tbnotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111;
  
COMMIT;