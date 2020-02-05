-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para shortnerio
CREATE DATABASE IF NOT EXISTS `shortnerio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shortnerio`;

-- Copiando estrutura para tabela shortnerio.tb_log
CREATE TABLE IF NOT EXISTS `tb_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_URL` int(11) DEFAULT NULL,
  `DATA` datetime DEFAULT NULL,
  KEY `Index 1` (`ID`),
  KEY `FK__tb_url` (`ID_URL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela shortnerio.tb_url
CREATE TABLE IF NOT EXISTS `tb_url` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(100) NOT NULL DEFAULT '',
  `ALIAS` varchar(100) NOT NULL DEFAULT '',
  KEY `Index 1` (`ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
