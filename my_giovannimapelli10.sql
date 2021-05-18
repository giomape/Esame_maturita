-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 18, 2021 alle 12:57
-- Versione del server: 8.0.21
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_giovannimapelli10`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `calciatori`
--

CREATE TABLE IF NOT EXISTS `calciatori` (
  `id_calciatore` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `verificato` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,6) NOT NULL,
  `longitudine` decimal(10,6) NOT NULL,
  `piede` varchar(40) NOT NULL,
  `biografia` varchar(500) NOT NULL,
  `max_serie` varchar(50) NOT NULL,
  `current_serie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_calciatore`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dump dei dati per la tabella `calciatori`
--

INSERT INTO `calciatori` (`id_calciatore`, `nome`, `cognome`, `data_nascita`, `email`, `verificato`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `piede`, `biografia`, `max_serie`, `current_serie`) VALUES
(1, 'Giovanni', 'Mapelli', '2002-03-16', 'ciao@gmail.com', 0, 'gio_mape', '$2y$10$/LW8Qrg8zleIerfGeVJixe2ubqwRtDZ/LMQN4d6pPFnmG4HSFb73W', 'bergamo, longuelo', '45.696595', '9.632866', 'sinistro', 'Ciao ', 'Serie C', 'Serie D'),
(2, 'Marco', 'Piccioli', '2002-11-19', 'm.calabrone@gmail.com', 0, 'gio_marco', '$2y$10$ANZ2Kb7G6nFeGZgJLDIHEeIUx8aSIXTtWEfgZVneHmfBVxH3Qu9S6', 'stezzano, donatori di sangue', '45.653548', '9.658163', 'destro', 'impetuoso nei duelli 1v1 in fase difensiva, vince tutti duelli aerei e nei tackle mamma mia', 'Terza categoria', 'Terza categoria'),
(3, 'fwefwef', 'ewfwefewf', '1111-11-11', 'giovanninomapi@gmail.com', 0, 'giovanni', '$2y$10$VwIViKEQz6OWrPRZ2dhtouf8H8Ik3uXaGhSr2RTp/boXrY0GVLTWC', 'telgate, pascoli', '45.628614', '9.845844', 'sinistro', 'ciao', 'Serie A', 'Serie A'),
(4, 'Marco', 'Piccioli', '2002-04-12', 'm.piccio7@gmail.com', 1, 'piccio7', '$2y$10$J4CatqmAweaHQwWjRViIU.Leco6sIByiAvvuEXv90JiTq0cX355UW', 'stezzano, pascoli', '45.654516', '9.656238', 'sinistro', 'Il più forte di tutti', 'Serie A', 'Serie A'),
(5, 'geragea', 'gerageag', '4444-04-04', 'giovanninomapi@gmail.com', 1, 'aergeagearg', '$2y$10$cVfWspyu7idr465Y3Y9dauYBZRgPf1EATDnrX36coAlbc19O5pBlq', 'telgate, pascoli', '45.628614', '9.845844', 'sinistro', 'frrr', 'Serie A', 'Serie A'),
(6, 'Andrea', 'Sala', '2002-09-18', 'andreaassala@gmail.com', 1, 'Andrew1964', '$2y$10$lHJPybYnzd4rTLureZXL2eL7WgyUx4sM0XxN6t2N9zStMZ0Kdx3iG', 'Telgate, Donizetti', '45.627924', '9.848589', 'destro', 'Ho debuttato in serie A', 'Serie A', 'Eccellenza'),
(7, 'Pippo', 'Inzaghi', '6666-06-06', 'giovanninomapi@gmail.com', 1, 'ao', '$2y$10$5EKmt35o5D1MIAo3OSnUq.KH5qVlASo/4KbnYyDuDG5agyvJ2gw8G', 'telgate, pascoli', '45.628614', '9.845844', 'sinistro', 'Ciao', 'Serie A', 'Serie A'),
(9, 'Mario', 'Casa', '1987-05-12', 'giovanninomapi@gmail.com', 1, 'cicocico', '$2y$10$L.HB2HkWGiW4SSNODdLD.OaKJgxlJ1OFa5Cimpp14G9IZNJKv3v0a', 'urbino, bruno buozzi', '43.726972', '12.633006', 'destro', 'Ciao sono fortissimo', 'Eccellenza', 'Prima categoria'),
(10, 'ciao', 'ciao', '5555-05-05', 'giovanninomapi@gmail.com', 1, 'ciaociao', '$2y$10$8GPKGQyLJmC6tuk32gXv1.meZs9U8h.ZJ00JhA1TYNWyPOxhPSD.y', 'telgate, pascoli', '45.628614', '9.845844', 'sinistro', 'ciao sono un calciatore', 'Serie A', 'Serie A'),
(12, 'Andrea', 'Sala ', '2002-09-18', 'andreaassala@gmail.com', 1, 'olsala', '$2y$10$qRYdt8wQ3Mrgd59VeVkiQ.N4V2R1CXjDIGErOy1iQtLIme83jbeLe', 'Telgate, Donizetti ', '45.627924', '9.848589', 'destro', 'Ragazzo di 18 anni, cresciuto nelle giovanili della Sirmet e dell''Oratorio di Telgate ', 'Terza categoria', 'Terza categoria'),
(13, 'gepi', 'giupi', '1967-05-17', 'giusyfelotti63@gmail.com', 1, 'calorifero', '$2y$10$MRQwVG0moMhE4MmT0Hpk4.LtJbJbDooHPCuWGHKeocu7.eHsZ1em6', 'bolgare, roma', '45.634695', '9.815341', 'destro', 'Ciao sono forte', 'Terza categoria', 'Terza categoria');

-- --------------------------------------------------------

--
-- Struttura della tabella `calciatori_ruoli`
--

CREATE TABLE IF NOT EXISTS `calciatori_ruoli` (
  `id_calciatore` int NOT NULL,
  `id_ruolo` int NOT NULL,
  KEY `calciatore` (`id_calciatore`),
  KEY `ruolo` (`id_ruolo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `calciatori_ruoli`
--

INSERT INTO `calciatori_ruoli` (`id_calciatore`, `id_ruolo`) VALUES
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 5),
(3, 1),
(4, 5),
(4, 6),
(5, 1),
(6, 2),
(6, 4),
(7, 1),
(9, 5),
(9, 6),
(10, 2),
(10, 3),
(12, 2),
(12, 4),
(12, 13),
(13, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `follow_calciatori`
--

CREATE TABLE IF NOT EXISTS `follow_calciatori` (
  `id_calciatore` int NOT NULL,
  `id_societa` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `follow_calciatori`
--

INSERT INTO `follow_calciatori` (`id_calciatore`, `id_societa`, `data`) VALUES
(4, 29, '2021-05-13 11:57:38'),
(4, 15, '2021-05-14 13:00:07'),
(12, 16, '2021-05-14 14:54:22'),
(13, 16, '2021-05-14 15:51:48'),
(4, 32, '2021-05-15 07:29:00'),
(4, 24, '2021-05-15 13:48:22'),
(10, 16, '2021-05-16 11:24:39');

-- --------------------------------------------------------

--
-- Struttura della tabella `follow_societa`
--

CREATE TABLE IF NOT EXISTS `follow_societa` (
  `id_societa` int NOT NULL,
  `id_calciatore` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `follow_societa`
--

INSERT INTO `follow_societa` (`id_societa`, `id_calciatore`, `data`) VALUES
(16, 5, '2021-05-13 11:46:30'),
(16, 3, '2021-05-13 17:01:49'),
(16, 2, '2021-05-14 09:07:23'),
(26, 4, '2021-05-14 14:30:41'),
(30, 4, '2021-05-14 15:34:39'),
(16, 13, '2021-05-14 15:54:08'),
(31, 4, '2021-05-14 16:01:18'),
(16, 12, '2021-05-15 15:45:30'),
(16, 10, '2021-05-15 20:01:39'),
(16, 4, '2021-05-18 10:50:25');

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggi`
--

CREATE TABLE IF NOT EXISTS `messaggi` (
  `mittente` varchar(50) NOT NULL,
  `destinatario` varchar(50) NOT NULL,
  `messaggio` varchar(500) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `messaggi`
--

INSERT INTO `messaggi` (`mittente`, `destinatario`, `messaggio`, `data`) VALUES
('bruh', 'piccio7', 'Buon dì', '2021-05-17 19:25:15'),
('bruh', 'piccio7', 'Tutto bene?', '2021-05-17 19:25:27'),
('Bruh', 'Olsala', 'We', '2021-05-18 08:01:56'),
('bruh', 'piccio7', 'Ciao', '2021-05-18 10:02:00'),
('bruh', 'piccio7', 'Ciao piccio, visto che preferisci così, lo lascio in questo modo', '2021-05-18 10:02:51'),
('bruh', 'piccio7', 'Ti sto aspettando online', '2021-05-18 10:04:26'),
('bruh', 'piccio7', 'Quindi lo accetti quel contratto?', '2021-05-18 10:04:37'),
('bruh', 'piccio7', '%let me know', '2021-05-18 10:04:53'),
('bruh', 'piccio7', '#ciao', '2021-05-18 10:05:00'),
('bruh', 'piccio7', 'qui funzionano #letmeknowwhy', '2021-05-18 10:05:22'),
('bruh', 'olsala', 'Alura?', '2021-05-18 10:07:31'),
('piccio7', 'bruh', 'We Giovannino preso il 5g?', '2021-05-18 10:11:00'),
('piccio7', 'bruh', 'Gay', '2021-05-18 10:11:13'),
('bruh', 'piccio7', 'Non ancora', '2021-05-18 10:11:14'),
('bruh', 'piccio7', 'NO perchè ', '2021-05-18 10:11:23'),
('piccio7', 'bruh', 'Ciao ', '2021-05-18 10:11:28'),
('piccio7', 'bruh', 'Ciao', '2021-05-18 10:11:31'),
('piccio7', 'bruh', 'Ciao', '2021-05-18 10:11:34'),
('bruh', 'piccio7', 'Ciao', '2021-05-18 10:11:37'),
('bruh', 'piccio7', '#siiii', '2021-05-18 10:11:42'),
('piccio7', 'bruh', '#puttane e cozze #€_%''@(=/78*"', '2021-05-18 10:11:57'),
('piccio7', 'bruh', 'Bentornatao', '2021-05-18 10:12:38'),
('bruh', 'piccio7', 'Ma ciao caro', '2021-05-18 10:13:26'),
('bruh', 'piccio7', 'Tutto bene?', '2021-05-18 10:13:33'),
('piccio7', 'bruh', 'Michele è disonesto ', '2021-05-18 10:13:38'),
('bruh', 'piccio7', 'Lo sappiamo #thetruthisstiff', '2021-05-18 10:14:16'),
('piccio7', 'bruh', 'Wuuaaa che social', '2021-05-18 10:14:30'),
('bruh', 'piccio7', 'best ammo', '2021-05-18 10:15:14'),
('bruh', 'Piccio7', 'Wow', '2021-05-18 10:23:34'),
('bruh', 'Piccio7', 'Ciao amo', '2021-05-18 10:33:54'),
('bruh', 'piccio7', 'ciao', '2021-05-18 10:50:32');

-- --------------------------------------------------------

--
-- Struttura della tabella `post_calciatori`
--

CREATE TABLE IF NOT EXISTS `post_calciatori` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_calciatore` int NOT NULL,
  `titolo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descrizione` varchar(300) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=24 ;

--
-- Dump dei dati per la tabella `post_calciatori`
--

INSERT INTO `post_calciatori` (`id_post`, `id_calciatore`, `titolo`, `descrizione`, `data`) VALUES
(13, 4, 'Cercasi cozze', 'sono alla ricerca di cozze di prima qualità', '2021-05-14 13:09:32'),
(22, 13, 'Invito', 'Oggi voglio giocare a calcio', '2021-05-14 15:53:34'),
(23, 12, 'serata bruh', 'Cerco società per giocare  il torneo di bruh', '2021-05-15 09:12:27'),
(24, 4, 'Michele disonestà', 'Zampoleri Michele, Cologno al serio, è un ragazzo disonesto non fidatevi di lui è un malandrino', '2021-05-18 10:15:45');

-- --------------------------------------------------------

--
-- Struttura della tabella `post_societa`
--

CREATE TABLE IF NOT EXISTS `post_societa` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_societa` int NOT NULL,
  `titolo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descrizione` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `post_societa`
--

INSERT INTO `post_societa` (`id_post`, `id_societa`, `titolo`, `descrizione`, `data`) VALUES
(1, 16, 'Primo post', 'Funzionerà?', '2021-05-14 11:44:10'),
(5, 16, 'Stasera', 'Organizzo partita di calcetto alle ore 21.Contattatemi per partecipare', '2021-05-14 16:55:45'),
(6, 30, 'Provino 16/5/2021', 'Offro al primo concorrente un contratto da semiprofessionista. Ritrovo alle ore 10', '2021-05-15 07:27:58'),
(7, 24, 'Ciao', 'Piccio', '2021-05-15 13:47:57'),
(10, 16, 'Contento', 'Tutto procede al meglio!', '2021-05-17 19:22:10'),
(11, 16, 'Logo caricato', 'Vi piace il nuovo logo? ', '2021-05-18 09:49:34');

-- --------------------------------------------------------

--
-- Struttura della tabella `ruoli`
--

CREATE TABLE IF NOT EXISTS `ruoli` (
  `id_ruolo` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `gruppo` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ruolo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=14 ;

--
-- Dump dei dati per la tabella `ruoli`
--

INSERT INTO `ruoli` (`id_ruolo`, `nome`, `gruppo`) VALUES
(1, 'Portiere', 'Portiere'),
(2, 'Difensore Centrale', 'Difensore'),
(3, 'Terzino sinistro', 'Difensore'),
(4, 'Terzino destro', 'Difensore'),
(5, 'Centrocampista centrale', 'Centrocampista'),
(6, 'Mezzala', 'Centrocampista'),
(7, 'Esterno sinistro', 'Centrocampista'),
(8, 'Esterno destro', 'Centrocampista'),
(9, 'Trequartista', 'Centrocampista'),
(10, 'Punta centrale', 'Attaccante'),
(11, 'Seconda punta', 'Attaccante'),
(12, 'Attaccante esterno sinistro', 'Attaccante'),
(13, 'Attaccante esterno destro', 'Attaccante');

-- --------------------------------------------------------

--
-- Struttura della tabella `societa`
--

CREATE TABLE IF NOT EXISTS `societa` (
  `id_societa` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verificato` tinyint(1) DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,6) NOT NULL,
  `longitudine` decimal(10,6) NOT NULL,
  `current_serie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_societa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dump dei dati per la tabella `societa`
--

INSERT INTO `societa` (`id_societa`, `nome`, `email`, `verificato`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `current_serie`) VALUES
(14, 'Ciao', 'biavagabriel02@gmail.com', 1, 'Biavi', '$2y$10$SgEe8yWP9c58MRvo4gcavuK5fZ7X9pImpTe03P357EBKOgLTmnHJa', 'Carvico, Roma', '41.998821', '12.476113', 'Serie A'),
(15, 'cioa', 'giovanninomapi@gmail.com', 0, 'ciao', '$2y$10$9seRgIYmUlWOmgJDJ9EfK.9E5z51GMnbCgIT9gZ10SQGOsYos0yLi', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(16, 'cioa', 'giovanninomapi@gmail.com', 1, 'bruh', '$2y$10$f13xOQ1er4.CFfnWSue6Ee3otm3MeFZ5heFEu/yzS1hr8xJ1AkCMm', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(18, 'Prova', 'Giovanninomapi@gmail.com', 1, 'mscas', '$2y$10$EHWXqABak/gmrnhm.1GIF.moN2wDkw3LImKyQvtRLemi0cw7zaYsG', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(19, 'Prova', 'Giovanninomapi@gmail.com', 1, 'no', '$2y$10$jLGmSDVo5BPUbHpkuZBskOWdgiYDpMzht5zgsz4KeUzj3vBd0.LYa', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(20, 'Prova', 'giovanninomapi@gmail.com', 1, 'biobio', '$2y$10$YfkNaCSgS6ZHHROjq3YKquW7hmhSgLvy7TidwYw1fB0WAfMKlaPrS', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(21, 'Prova', 'giovanninomapi@gmail.com', 1, 'ciccio', '$2y$10$XWQkHutOOxVNFKhF6miv9uDZnA2RjR4SazWzwlq7j6ofKijtOlCmy', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(22, 'geargh', 'giovanninomapi@gmail.com', 1, 'bruhh', '$2y$10$ZLiB2rk2soYAKX8cOsZ5Xel1El8dOW0rw1sDtIPDyX4W3g5zJFJP.', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(23, 'Prova', 'giovanninomapi@gmail.com', 1, 'provaa', '$2y$10$jyLE3lI26ds5ylRtuT7yQOhUS6orJnwMkVMPVj3RFktRhQz7KyVNW', 'telgate, pascoli', '45.628614', '9.845844', 'Serie D'),
(24, 'Prova', 'giovanninomapi@gmail.com', 1, 'gio', '$2y$10$qHPA/jdYXEb5LN9HmQFaNOmKs7/jwynb.iXVQxpcKcalU3XES5nWa', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A'),
(25, 'montello', 'giovanninomapi@gmail.com', 1, 'aoza', '$2y$10$Vy/fzh5luFF/p5jEwKywUeGzPo6i5H1E9W/c492T.yw/mnFzFlvfK', 'londra, trafalgar square', '51.508037', '-0.128049', 'Serie A'),
(26, 'Bho', 'giovanninomapi@gmail.com', 1, 'bah', '$2y$10$MrlzB7T1mBU87t33ertkje2UcyXUXltlF/gZ6Zl20X4bn0fMK4aTa', 'Telgate, Pascoli', '45.628614', '9.845844', 'Serie A'),
(28, 'Fossombrone', 'mapelli.lgi@gmail.com', 1, 'fossombrone', '$2y$10$ZsyO8bPGc44YUiUICLKBOeFH3l7GtMyVardS8sBX1jdV4RRIHKOQq', 'Fossombrone, roma', '43.678553', '12.768133', 'Promozione'),
(29, 'Atletico Presezzo', 'mapelli.lgi@gmail.com', 1, 'presezzo', '$2y$10$FoQX7VXrZiebVEDms7vvpOf2AnX0czMwFCLGjIGlB5V3vV3D.4zp.', 'Presezzo, roma', '45.693822', '9.567219', 'Promozione'),
(30, 'Sarnico', 'giovanninomapi@gmail.com', 1, 'sarnicofc', '$2y$10$SqnhbTODoWIWe02SDcHBbupwKELnTsRPPMG4rHfNbFLQh2ElCfyL2', 'sarnico, suardo', '45.671054', '9.951965', 'Eccellenza'),
(31, 'Brusaporto ', 'giovanninomapi@gmail.com', 1, 'brusaportofc', '$2y$10$BkrojgNm19IdsWztb3tO2ees.Sjo2PW5hqToU3ytC7t1Z/SuiEpCW', 'Brusaporto , Verdi', '45.671267', '9.764395', 'Serie D'),
(32, 'Seriate', 'giovanninomapi@gmail.com', 1, 'seriatefc', '$2y$10$.KEYblBZxA2gYNgBI3VTuedbCdIOZ5OiRJEqmw7.qTyfPhyBrYLcy', 'seriate, verdi', '45.682753', '9.735212', 'Promozione'),
(34, 'Calcinate', 'giovanninomapi@gmail.com', 1, 'calcinate', '$2y$10$tPYKXpk0NuG.UL2cjuMNF.FDORRHztkL.50dJU8LJxdtWZaLM04NK', 'calcinate, verdi', '45.619860', '9.805468', 'Seconda categoria');

-- --------------------------------------------------------

--
-- Struttura della tabella `societa_ruoli`
--

CREATE TABLE IF NOT EXISTS `societa_ruoli` (
  `id_societa` int NOT NULL,
  `id_ruolo` int NOT NULL,
  KEY `societa` (`id_societa`),
  KEY `ruoloo` (`id_ruolo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `societa_ruoli`
--

INSERT INTO `societa_ruoli` (`id_societa`, `id_ruolo`) VALUES
(14, 2),
(15, 1),
(16, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 2),
(23, 6),
(23, 7),
(24, 1),
(25, 1),
(26, 1),
(28, 3),
(29, 1),
(29, 5),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(30, 2),
(30, 3),
(31, 1),
(32, 2),
(32, 3),
(34, 2),
(34, 3);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `calciatori_ruoli`
--
ALTER TABLE `calciatori_ruoli`
  ADD CONSTRAINT `calciatore` FOREIGN KEY (`id_calciatore`) REFERENCES `calciatori` (`id_calciatore`),
  ADD CONSTRAINT `ruolo` FOREIGN KEY (`id_ruolo`) REFERENCES `ruoli` (`id_ruolo`);

--
-- Limiti per la tabella `societa_ruoli`
--
ALTER TABLE `societa_ruoli`
  ADD CONSTRAINT `ruoloo` FOREIGN KEY (`id_ruolo`) REFERENCES `ruoli` (`id_ruolo`),
  ADD CONSTRAINT `societa` FOREIGN KEY (`id_societa`) REFERENCES `societa` (`id_societa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
