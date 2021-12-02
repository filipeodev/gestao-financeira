-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2021 às 03:18
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fili_ed_fin`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_categoria` (IN `vid_categoria` INT, IN `pnome_cat` VARCHAR(255))  NO SQL
BEGIN

UPDATE categoria SET nome_cat = pnome_cat WHERE id_categoria = vid_categoria;

SELECT * FROM categoria WHERE id_categoria = vid_categoria;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_conta_despesa` (IN `vid_categoria` INT, IN `vid_conta` INT, IN `pdespesa` DECIMAL(10,2), IN `psaldo` DECIMAL(10,2))  NO SQL
BEGIN

UPDATE conta SET despesa = pdespesa, saldo = psaldo WHERE id_categoria = vid_categoria AND id_conta = vid_conta;

SELECT * FROM conta WHERE id_categoria = vid_categoria AND id_conta = vid_conta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_conta_receita` (IN `vid_conta` INT, IN `vid_categoria` INT, IN `preceita` DECIMAL(10,2))  NO SQL
BEGIN

UPDATE conta SET receita = preceita WHERE id_conta = vid_conta AND id_categoria = vid_categoria;

SELECT * FROM receita WHERE id_conta = vid_conta AND id_categoria = vid_categoria;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_despesa` (IN `pdespesa` VARCHAR(255), IN `pvalor` DECIMAL(10,2), IN `pdata_compra` DATE, IN `vid_conta` INT, IN `vid_despesa` INT)  NO SQL
BEGIN

UPDATE despesa SET despesa = pdespesa, valor = pvalor, data_compra = pdata_compra WHERE id_conta = vid_conta AND id_despesa = vid_despesa;

SELECT * FROM despesa WHERE id_conta = vid_conta AND id_despesa = vid_despesa;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_receita` (IN `pprimeira_parc` DECIMAL(10,2), IN `psegunda_parc` DECIMAL(10,2), IN `palimentacao` DECIMAL(10,2), IN `pbonus` DECIMAL(10,2), IN `ptotal` DECIMAL(10,2), IN `Vid_conta` INT, IN `vid_receita` INT)  NO SQL
BEGIN

UPDATE receita SET primeira_parc = pprimeira_parc, segunda_parc = psegunda_parc, alimentacao = palimentacao, bonus = pbonus, total = ptotal WHERE id_conta = Vid_conta AND id_receita = vid_receita;

SELECT * FROM receita WHERE id_conta = Vid_conta AND id_receita = vid_receita;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_alterar_usuario` (IN `vid_usuario` INT, IN `pemail` VARCHAR(255), IN `psenha` VARCHAR(255), IN `pimagem` VARCHAR(255))  NO SQL
BEGIN

UPDATE usuario SET email = pemail, senha = psenha, imagem = pimagem WHERE id_usuario = vid_usuario;

SELECT * FROM usuario WHERE id_usuario = vid_usuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_categoria_receita_despesa` (IN `vid_conta` INT, IN `vid_categoria` INT)  NO SQL
BEGIN

DELETE FROM receita WHERE id_conta = vid_conta;
DELETE FROM despesa WHERE id_conta = vid_conta;
DELETE FROM conta WHERE id_categoria = vid_categoria AND id_conta = vid_conta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_despesa` (IN `vid_conta` INT, IN `vid_despesa` INT)  NO SQL
BEGIN

DELETE FROM despesa WHERE id_conta = vid_conta and id_despesa = vid_despesa;

SELECT * FROM despesa WHERE id_conta = vid_conta and id_despesa = vid_despesa;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_financa_categoria_receita_despesa` (IN `vid_conta` INT, IN `vid_categoria` INT)  NO SQL
BEGIN

DELETE FROM receita WHERE id_conta = vid_conta;
DELETE FROM despesa WHERE id_conta = vid_conta;
DELETE FROM conta WHERE id_categoria = vid_categoria AND id_conta = vid_conta;
DELETE FROM categoria WHERE id_categoria = vid_categoria;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_categoria` (IN `pnome_cat` VARCHAR(255), IN `vid_usuario` INT)  NO SQL
BEGIN

INSERT INTO categoria (nome_cat, id_usuario) VALUES (pnome_cat, vid_usuario);

SELECT * FROM categoria WHERE id_categoria = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_despesa` (IN `pdespesa` VARCHAR(255), IN `pvalor` DECIMAL(10,2), IN `pdata_compra` DATE, IN `vid_conta` INT)  NO SQL
BEGIN

INSERT INTO despesa (despesa, valor, data_compra, id_conta) VALUES (pdespesa, pvalor, pdata_compra, vid_conta);

SELECT * FROM despesa WHERE id_despesa = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_novomes` (IN `pmes_orc` CHAR(2), IN `pano_orc` CHAR(4), IN `vid_categoria` INT)  NO SQL
BEGIN

INSERT INTO conta (mes_orc, ano_orc, id_categoria) VALUES (pmes_orc, pano_orc, vid_categoria);

SELECT * FROM conta WHERE id_conta = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_receita` (IN `pprimeira_parc` DECIMAL(10,2), IN `psegunda_parc` DECIMAL(10,2), IN `palimentacao` DECIMAL(10,2), IN `pbonus` DECIMAL(10,2), IN `ptotal` DECIMAL(10,2), IN `vid_conta` INT)  NO SQL
BEGIN

INSERT INTO receita (primeira_parc, segunda_parc, alimentacao, bonus, total, id_conta) VALUES (pprimeira_parc, psegunda_parc, palimentacao, pbonus, ptotal, vid_conta);

SELECT * FROM receita WHERE id_receita = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_salvar_usuario` (IN `pemail` VARCHAR(255), IN `pusuario` VARCHAR(255), IN `psenha` VARCHAR(255), IN `psts` CHAR(1), IN `padmin` CHAR(1))  NO SQL
BEGIN

INSERT INTO usuario (email, usuario, senha, sts, admin) VALUES (pemail, pusuario, psenha, psts, padmin);
    
    SELECT * FROM usuario WHERE id_usuario = LAST_INSERT_ID();

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_cat` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id_conta` int(11) NOT NULL,
  `ano_orc` char(4) NOT NULL,
  `mes_orc` char(2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receita` decimal(10,2) DEFAULT NULL,
  `despesa` decimal(10,2) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `despesa` varchar(255) NOT NULL,
  `data_compra` date NOT NULL,
  `id_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `id_receita` int(11) NOT NULL,
  `alimentacao` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `primeira_parc` decimal(10,2) NOT NULL,
  `segunda_parc` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `admin` char(1) NOT NULL,
  `sts` char(1) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id_conta`),
  ADD KEY `fk_id_categoria` (`id_categoria`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `fk_id_conta1` (`id_conta`);

--
-- Indexes for table `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `fk_id_conta2` (`id_conta`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `receita`
--
ALTER TABLE `receita`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Limitadores para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `fk_id_conta1` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id_conta`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `fk_id_conta2` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id_conta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
