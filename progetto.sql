-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 22, 2021 alle 13:27
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,0) NOT NULL,
  `longitudine` decimal(10,0) NOT NULL,
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
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nome_residenza` varchar(255) NOT NULL,
  `latitudine` decimal(10,0) NOT NULL,
  `longitudine` decimal(10,0) NOT NULL,
  `current_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `societa_ruoli`
--

CREATE TABLE `societa_ruoli` (
  `id_societa` int(11) NOT NULL,
  `id_ruolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id_calciatore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ruoli`
--
ALTER TABLE `ruoli`
  MODIFY `id_ruolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `societa`
--
ALTER TABLE `societa`
  MODIFY `id_societa` int(11) NOT NULL AUTO_INCREMENT;

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
