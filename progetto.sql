-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 02, 2021 alle 13:45
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `calciatori`
--

CREATE TABLE `calciatori` (
  `id_calciatore` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `verificato` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,6) NOT NULL,
  `longitudine` decimal(10,6) NOT NULL,
  `piede` varchar(40) NOT NULL,
  `biografia` varchar(500) NOT NULL,
  `max_serie` varchar(50) NOT NULL,
  `current_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `calciatori_ruoli`
--

CREATE TABLE `calciatori_ruoli` (
  `id_calciatore` int(11) NOT NULL,
  `id_ruolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `ruoli`
--

CREATE TABLE `ruoli` (
  `id_ruolo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `gruppo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `societa` (
  `id_societa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verificato` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,6) NOT NULL,
  `longitudine` decimal(10,6) NOT NULL,
  `current_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `societa`
--

INSERT INTO `societa` (`id_societa`, `nome`, `email`, `verificato`, `username`, `password`, `nome_residenza`, `latitudine`, `longitudine`, `current_serie`) VALUES
(3, 'gggg', 'ggggg', 0, 'gggggg', '$2y$10$nFTKCuVr9lvA04tj100lPO0udFEt4Ov64NI0T0ES5m7l/1Ox4cfY6', 'telgate, pascoli', '45.628614', '9.845844', 'Eccellenza'),
(4, 'Prova', 'mapelli.giovanni.studente@itispaleocapa.it', 0, 'trhr', '$2y$10$bk9E8mYDZ63RR/iAUn/mXeYcg4TNiuoOb51jsvRdT4he17p73.k4u', 'telgate, pascoli', '45.628614', '9.845844', 'Serie A');

-- --------------------------------------------------------

--
-- Struttura della tabella `societa_ruoli`
--

CREATE TABLE `societa_ruoli` (
  `id_societa` int(11) NOT NULL,
  `id_ruolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `societa_ruoli`
--

INSERT INTO `societa_ruoli` (`id_societa`, `id_ruolo`) VALUES
(3, 5),
(3, 12),
(4, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `calciatori`
--
ALTER TABLE `calciatori`
  ADD PRIMARY KEY (`id_calciatore`);

--
-- Indici per le tabelle `calciatori_ruoli`
--
ALTER TABLE `calciatori_ruoli`
  ADD KEY `calciatore` (`id_calciatore`),
  ADD KEY `ruolo` (`id_ruolo`);

--
-- Indici per le tabelle `ruoli`
--
ALTER TABLE `ruoli`
  ADD PRIMARY KEY (`id_ruolo`);

--
-- Indici per le tabelle `societa`
--
ALTER TABLE `societa`
  ADD PRIMARY KEY (`id_societa`);

--
-- Indici per le tabelle `societa_ruoli`
--
ALTER TABLE `societa_ruoli`
  ADD KEY `societa` (`id_societa`),
  ADD KEY `ruoloo` (`id_ruolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `calciatori`
--
ALTER TABLE `calciatori`
  MODIFY `id_calciatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `ruoli`
--
ALTER TABLE `ruoli`
  MODIFY `id_ruolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `societa`
--
ALTER TABLE `societa`
  MODIFY `id_societa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
