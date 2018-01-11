-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 jan 2018 om 13:15
-- Serverversie: 5.6.37
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enquete`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(8) NOT NULL,
  `ans` varchar(64) NOT NULL,
  `vraag-id` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `answer`
--

INSERT INTO `answer` (`id`, `ans`, `vraag-id`) VALUES
(1, 'hond', 1),
(2, 'kat', 1),
(3, 'ik werk voor het geld', 2),
(4, 'ik werk omdat ik het leuk vind', 2),
(5, 'zomer', 3),
(6, 'winter', 3),
(7, 'ochtendmens', 4),
(8, 'avondmens', 4),
(9, 'bier', 5),
(10, 'fris', 5),
(11, 'appel', 6),
(12, 'peer', 6),
(13, 'salade', 7),
(14, 'snack', 7),
(15, 'pizza', 8),
(16, 'pasta', 8),
(17, 'koken', 9),
(18, 'uiteten', 9),
(19, 'koffie', 10),
(20, 'thee', 10),
(21, 'Jinek / Pauw', 11),
(22, 'RTL Late Night', 11),
(23, 'Expeditie Robinson', 12),
(24, 'Wie is de mol?', 12),
(25, 'Iphone', 13),
(26, 'Android', 13),
(27, 'Instagram', 14),
(28, 'Facebook', 14),
(29, 'op de 34e verdieping wonen zonder lift', 15),
(30, 'Al je digitale communicatie moet via handgeschreven brieven', 15),
(31, 'Niemand lacht ooit om wat jij zegt', 16),
(32, 'je moet lachen als iemand anders huilt', 16),
(33, 'Trump', 17),
(34, 'Hillary', 17),
(35, 'Jesse Klaver for president', 18),
(36, 'Thierry Baudet for president ', 18),
(37, 'Een dag op de bank', 18),
(38, 'Een wandeling door het bos', 19),
(39, 'Kroeg', 20),
(40, 'club ', 20),
(41, 'naar de bioscoop', 21),
(42, 'bowlen', 21),
(43, 'een weekend weg', 22),
(44, 'een nieuwe outfit scoren', 22),
(45, 'een reis naar de zon', 23),
(46, 'skivakantie', 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL,
  `First name` varchar(64) NOT NULL,
  `Last name` varchar(64) NOT NULL,
  `date of birth` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `password check` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
