-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 23, 2018 alle 16:19
-- Versione del server: 10.1.34-MariaDB
-- Versione PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `padova`
--

CREATE TABLE `padova` (
  `sezione` varchar(45) NOT NULL,
  `testo` varchar(700) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `alt` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `padova`
--

INSERT INTO `padova` (`sezione`, `testo`, `titolo`, `img`, `data`, `alt`, `id`) VALUES
('eventi', 'La sagra della polenta è molto bella, si trova in zona fiera!', 'SAGRA DELLA POLENTA', '../IMG/sagrapolenta.jpg', '2018-09-10', 'Persona che mescola la polenta', 1),
('eventi', 'Verrà demolita la preziosissima mensa Piovego il prossimo lunedì, teneti alla larga e festeggiate con i vostri più cari parenti!', 'Demolizione mensa piovego', '../IMG/mensa.jpg', '2018-08-31', 'Interno mensa piovego', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `psw` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `email`, `psw`, `Nome`, `Cognome`) VALUES
(5, 'alberto.cherobin@gmail.com', 'qqqqqqqq', 'aaaa', 'sss'),
(6, 'hello@gmail.com', 'alberobrutto', 'Nadia', 'Biasia'),
(7, 'albechero@gmail.com', 'antonioemarco', 'Albe', 'Chero'),
(8, 'gg@gmail.com', 'alberobello', 'Antonio', 'Be'),
(9, 'proviamo@hh.com', 'harrypotter', 'Al', 'zzz'),
(11, 'aaaaa@jj.com', 'alberobello', 'Albe', 'Maronne'),
(12, 'hello@gmail.com2', 'alberobello', 'Antonio', 'Be'),
(13, 'hello@gmail.com3', 'alberobello', 'Antonio', 'sss'),
(14, 'gg2@gmail.com', 'alberobello', 'Antonio', 'E MARCO'),
(15, 'ciao12@gmil.com', 'alberobello', 'm arco', 'e luca'),
(16, 'hello222@gmail.com', 'alberobello', 'maremma', 'maiala'),
(17, 'gg333@gmail.com', 'alberobello', 'aa', 'sss'),
(18, 'hel22lo@gmail.com', 'alberobello', 'aa', 'sss'),
(19, 'alberto.cherobin2@gmail.com', 'alberobello', 'Antonio', 'Be'),
(20, 'alberto.c33herobin@gmail.com', 'alberobello', 'Antonio', 'sss'),
(21, 'alber33to.cherobin@gmail.com', 'alberobello', 'Nadia', 'Biasia'),
(22, 'hellwwwwo@gmail.com', 'alberobello', 'Al', 'sss'),
(23, 'ciao@gmil.comdddd', 'alberobello', 'aa', 'sss'),
(24, 'pinguino2000@ggg.com', 'alberobello', 'Antonio', 'Marco'),
(25, 'ciacccco@gmil.com', 'alberobello', 'Antonio', 'Be'),
(26, 'ciao@gmil.comsss', 'alberobello', 'Antonio', 'Be'),
(27, 'hasasdasello@gmail.com', 'alberobello', 'asdasd', 'asdasd'),
(28, 'ggsss@gmail.com', 'alberobello', 'Al', 'Be'),
(29, 'hellassaso@gmail.com', 'alberobello', 'asdasd', 'asas'),
(30, 'ciaasasao@gmil.com', 'alberobello', 'sasasa', 'assaasa'),
(31, 'helloasas@gmail.com', 'alberobello', 'asassa', 'assasa');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `padova`
--
ALTER TABLE `padova`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `padova`
--
ALTER TABLE `padova`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
