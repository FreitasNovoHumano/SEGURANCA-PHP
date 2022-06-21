-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela fullstackphp.address: ~50 rows (aproximadamente)
INSERT IGNORE INTO `address` (`user_id`, `id`, `street`, `number`, `complement`) VALUES
	(1, 51, 'rua manoel pedro vieira, 810', '810', 'casa 1'),
	(2, 52, 'paraguai', '2041', 'casa 1'),
	(3, 53, 'emilio daroz ', '107', 'casa 1'),
	(4, 54, 'rua lavinia moreira da silva', '145', 'casa 1'),
	(5, 55, 'padre anchieta', '121', 'casa 1'),
	(6, 56, 'rua amoroso costa', '254', 'casa 1'),
	(7, 57, 'alaor martins', '312', 'casa 1'),
	(8, 58, 'rua das violetas', '330', 'casa 1'),
	(9, 59, 'francisco carlos ', '105', 'casa 1'),
	(10, 60, 'torino', '95', 'casa 1'),
	(11, 61, 'rua erotidas', '64', 'casa 1'),
	(12, 62, 'r. orquideas', '169', 'casa 1'),
	(13, 63, 'rua joffre motta', '44', 'casa 1'),
	(14, 64, 'rua piauí', '17', 'casa 1'),
	(15, 65, 'fernandes marques', '1229', 'casa 1'),
	(16, 66, 'av. beta', '07', 'casa 1'),
	(17, 67, 'abagiba', '674', 'casa 1'),
	(18, 68, 'gumercindo araujo', '302', 'casa 1'),
	(19, 69, 'rua 01, quadra 35', '35b', 'casa 1'),
	(20, 70, 'rua piauí', '23d', 'casa 1'),
	(21, 71, 'rua leopoldina araãºjo', '380', 'casa 1'),
	(22, 72, 'rua conceiã§ã£o', '101', 'casa 1'),
	(23, 73, 'rua benedetto bonfilgi', '755', 'casa 1'),
	(24, 74, 'rua sã£o francisco', '17', 'casa 1'),
	(25, 75, 'rua dona zulmira', '479', 'casa 1'),
	(26, 76, 'rua mampituba', '740', 'casa 1'),
	(27, 77, 'dezeseis', '151', 'casa 1'),
	(28, 78, 'rua dos goitacazes', '375', 'casa 1'),
	(29, 79, 'av lucio jose de meneses', '930', 'casa 1'),
	(30, 80, 'caetano', '3457', 'casa 1'),
	(31, 81, 'um nova ', '335', 'casa 1'),
	(32, 82, 'sres area especial', '19', 'casa 1'),
	(33, 83, 'islandia', '99', 'casa 1'),
	(34, 84, 'independência', '700', 'casa 1'),
	(35, 85, 'sebastiã£o thomaz de oliveira', '25', 'casa 1'),
	(36, 86, 'nogueira', '185', 'casa 1'),
	(37, 87, 'tv londrina', '12', 'casa 1'),
	(38, 88, 'teofilo otoni', '222', 'casa 1'),
	(39, 89, 'joã£o rasmussen', '244', 'casa 1'),
	(40, 90, 'travessa elizeu araãºjo', '46', 'casa 1'),
	(41, 91, 'av. dr. joão pessoa', '185', 'casa 1'),
	(42, 92, 'travessa brandão', '4', 'casa 1'),
	(43, 93, 'coqueiros', 'SN', 'casa 1'),
	(44, 94, 'estrada m boi mirim', '820', 'casa 1'),
	(45, 95, 'travessa dos comerciarios ', '5', 'casa 1'),
	(46, 96, 'dos jacarandas', '30', 'casa 1'),
	(47, 97, 'dona ermelinda pereira', '413', 'casa 1'),
	(48, 98, 'rua projetada 02', '742', 'casa 1'),
	(49, 99, 'samambaia', '96', 'casa 1'),
	(50, 100, 'rua dos gerã¢nios', '110', 'casa 1');

-- Copiando dados para a tabela fullstackphp.users: ~50 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `document`, `created_at`, `update_at`) VALUES
	(1, 'Robson', 'Santos', 'robson1@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(2, 'Alexandre', 'Santos', 'alexandre27@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(3, 'Willian', 'Santos', 'willian28@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(4, 'Eleno', 'Santos', 'eleno29@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(5, 'Lucas', 'Santos', 'lucas30@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(6, 'Mateus', 'Santos', 'mateus31@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(7, 'João', 'Santos', 'joão32@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(8, 'Felipe', 'Santos', 'felipe33@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(9, 'Anderson', 'Santos', 'anderson34@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(10, 'Elton', 'Santos', 'elton35@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(11, 'Leonardo', 'Santos', 'leonardo36@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(12, 'Regilton', 'Santos', 'regilton37@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(13, 'Sidney', 'Santos', 'sidney38@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(14, 'Lourival', 'Santos', 'lourival39@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(15, 'Henrique', 'Santos', 'henrique40@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(16, 'Daniel', 'Santos', 'daniel41@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(17, 'Pedro', 'Santos', 'pedro42@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(18, 'Andre Roberto', 'Santos', 'andre roberto43@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(19, 'Ozeias', 'Santos', 'ozeias44@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(20, 'Arnobio', 'Santos', 'arnobio45@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(21, 'Roniel', 'Santos', 'roniel46@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(22, 'Caíque', 'Santos', 'caíque47@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(23, 'Lucas', 'Santos', 'lucas48@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(24, 'Francisco', 'Santos', 'francisco49@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(25, 'Cristian', 'Santos', 'cristian50@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(26, 'Eduardo', 'Santos', 'eduardo51@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(27, 'Rodrigo', 'Santos', 'rodrigo52@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(28, 'Raphael', 'Santos', 'raphael53@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(29, 'Jose', 'Santos', 'jose54@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(30, 'Rodrigo', 'Santos', 'rodrigo55@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(31, 'Diego', 'Santos', 'diego56@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(32, 'Alexandre', 'Santos', 'alexandre57@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(33, 'Edimar', 'Santos', 'edimar58@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(34, 'Jackell', 'Santos', 'jackell59@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(35, 'Luis', 'Santos', 'luis60@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(36, 'Lucas', 'Santos', 'lucas61@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(37, 'Wander', 'Santos', 'wander62@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(38, 'Tairo', 'Santos', 'tairo63@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(39, 'Rubens', 'Santos', 'rubens64@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(40, 'Hugo', 'Santos', 'hugo65@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(41, 'Gustavo', 'Santos', 'gustavo66@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(42, 'Paulo', 'Santos', 'paulo67@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(43, 'Rodrigo', 'Santos', 'rodrigo68@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(44, 'Denio', 'Santos', 'denio69@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(45, 'Idalmir', 'Santos', 'idalmir70@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(46, 'Ataide', 'Santos', 'ataide71@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(47, 'Luiz', 'Santos', 'luiz72@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(48, 'Luciano', 'Santos', 'luciano73@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(49, 'Adir', 'Santos', 'adir74@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL),
	(50, 'Tainan', 'Santos', 'tainan75@email.com.br', '', NULL, '2022-06-21 15:39:18', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
