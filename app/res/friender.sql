-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2018 at 04:37 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friender`
--
CREATE DATABASE IF NOT EXISTS `friender` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `friender`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `ans`) VALUES
(1, 1, 'hond'),
(2, 1, 'kat'),
(3, 2, 'ik werk voor het geld'),
(4, 2, 'ik werk omdat ik het leuk vind'),
(5, 3, 'zomer'),
(6, 3, 'winter'),
(7, 4, 'ochtendmens'),
(8, 4, 'avondmens'),
(9, 5, 'bier'),
(10, 5, 'fris'),
(11, 6, 'appel'),
(12, 6, 'peer'),
(13, 7, 'salade'),
(14, 7, 'snack'),
(15, 8, 'pizza'),
(16, 8, 'pasta'),
(17, 9, 'koken'),
(18, 9, 'uiteten'),
(19, 10, 'koffie'),
(20, 10, 'thee'),
(21, 11, 'Jinek / Pauw'),
(22, 11, 'RTL Late Night'),
(23, 12, 'Expeditie Robinson'),
(24, 12, 'Wie is de mol?'),
(25, 13, 'Iphone'),
(26, 13, 'Android'),
(27, 14, 'Instagram'),
(28, 14, 'Facebook'),
(29, 15, 'op de 34e verdieping wonen zonder lift'),
(30, 15, 'Al je digitale communicatie moet via handgeschreven brieven'),
(31, 16, 'Niemand lacht ooit om wat jij zegt'),
(32, 16, 'je moet lachen als iemand anders huilt'),
(33, 17, 'Trump'),
(34, 17, 'Hillary'),
(35, 18, 'Jesse Klaver for president'),
(36, 18, 'Thierry Baudet for president '),
(37, 19, 'Een dag op de bank'),
(38, 19, 'Een wandeling door het bos'),
(39, 20, 'Kroeg'),
(40, 20, 'club '),
(41, 21, 'naar de bioscoop'),
(42, 21, 'bowlen'),
(43, 22, 'een weekend weg'),
(44, 22, 'een nieuwe outfit scoren'),
(45, 23, 'een reis naar de zon'),
(46, 23, 'skivakantie');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_id` int(11) DEFAULT NULL,
  `answers` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`, `picture_id`, `answers`) VALUES
(1, 'Jochem', 'Soons', '2018-01-09', 'jochem@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, ''),
(2, 'Roos', 'Riemersma', '2018-01-09', 'roos@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, ''),
(3, 'Jochem', 'Soons', '2018-01-09', 'sarah@uva.nl', '$2y$10$jSpojkLN.n3f41bDjYlHhOzdpJrT0m0L7fJp8fKbGJYFD9.tS.Ma2', NULL, ''),
(4, 'Stefan', 'Schenk', '2018-01-09', 'stefan@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`activity_id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `picture_id` (`picture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `event_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_user_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
