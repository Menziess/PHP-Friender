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


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `date_of_birth`, `email`, `password`, `picture_id`, `answers`) VALUES
('Jochem', 'Soons', '2018-01-09', 'jochem@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL),
('Roos', 'Riemersma', '2018-01-09', 'roos@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL),
('Sarah', 'Bosscha', '2018-01-09', 'sarah@uva.nl', '$2y$10$jSpojkLN.n3f41bDjYlHhOzdpJrT0m0L7fJp8fKbGJYFD9.tS.Ma2', NULL, NULL),
('Stefan', 'Schenk', '2018-01-09', 'stefan@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL),

('Jeannie', 'Carr', '2018-01-09', 'Jeannie@Carr.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10010001001000010111000),
('Darrel', 'Maxwell', '2018-01-09', 'Darrel@Maxwell.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11111110011111100101101),
('Alice', 'Riley', '2018-01-09', 'Alice@Riley.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11111111100101000000000),
('Frances', 'Peters', '2018-01-09', 'Frances@Peters.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01011010011011111011001),
('Archie', 'Cobb', '2018-01-09', 'Archie@Cobb.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10001110101010011110111),
('Dwight', 'Simmons', '2018-01-09', 'Dwight@Simmons.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11110011001011000110010),
('Margarita', 'Robbins', '2018-01-09', 'Margarita@Robbins.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01100100010000000001010),
('Luz', 'Morton', '2018-01-09', 'Luz@Morton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00100000011000011101010),
('Gustavo', 'Jimenez', '2018-01-09', 'Gustavo@Jimenez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11000100001101011011001),
('Ruben', 'Nelson', '2018-01-09', 'Ruben@Nelson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01111110000100100100010),
('Tanya', 'Parks', '2018-01-09', 'Tanya@Parks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01110011011010110100100),
('Doris', 'Greer', '2018-01-09', 'Doris@Greer.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00001111111010011110011),
('Candice', 'Ferguson', '2018-01-09', 'Candice@Ferguson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11010011000010000000001),
('Marty', 'Robertson', '2018-01-09', 'Marty@Robertson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10110000001111111101110),
('Stacey', 'Lawrence', '2018-01-09', 'Stacey@Lawrence.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00100110000010010001111),
('Dustin', 'Estrada', '2018-01-09', 'Dustin@Estrada.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10010110001101010000100),
('Dolores', 'Baldwin', '2018-01-09', 'Dolores@Baldwin.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11011000001110000010101),
('Angelina', 'Waters', '2018-01-09', 'Angelina@Waters.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11001000111110100010001),
('Marshall', 'Guerrero', '2018-01-09', 'Marshall@Guerrero.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01010010001101110100111),
('Ron', 'Welch', '2018-01-09', 'Ron@Welch.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10001000111010000001001),
('Gloria', 'Abbott', '2018-01-09', 'Gloria@Abbott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11011000000001101010010),
('Kristen', 'Hernandez', '2018-01-09', 'Kristen@Hernandez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01110010000011010110011),
('Rolando', 'Stanley', '2018-01-09', 'Rolando@Stanley.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10000000000011010101100),
('Elaine', 'Osborne', '2018-01-09', 'Elaine@Osborne.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10100010110101010000111),
('Damon', 'Bailey', '2018-01-09', 'Damon@Bailey.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10111000101111101001000),
('Yolanda', 'Guzman', '2018-01-09', 'Yolanda@Guzman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01111110100100100100101),
('Kerry', 'Grant', '2018-01-09', 'Kerry@Grant.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01110001010100110100100),
('Sherri', 'Johnson', '2018-01-09', 'Sherri@Johnson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01111000111101000111110),
('Ernestine', 'Frank', '2018-01-09', 'Ernestine@Frank.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01000001001000001100101),
('Dianna', 'Manning', '2018-01-09', 'Dianna@Manning.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00111010011000001100000),
('Sarah', 'Garrett', '2018-01-09', 'Sarah@Garrett.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01010000001000011101000),
('Francisco', 'Thornton', '2018-01-09', 'Francisco@Thornton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10000011010010111101111),
('Blanche', 'Davis', '2018-01-09', 'Blanche@Davis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11101000010101100101101),
('Carla', 'Marshall', '2018-01-09', 'Carla@Marshall.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10001110110000010010001),
('Guy', 'Barber', '2018-01-09', 'Guy@Barber.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01010011101001111011010),
('Erica', 'Malone', '2018-01-09', 'Erica@Malone.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01101011011010110000000),
('Colleen', 'Kelly', '2018-01-09', 'Colleen@Kelly.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11000001100110110000100),
('Willard', 'Ortiz', '2018-01-09', 'Willard@Ortiz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10110001010110110010011),
('Edmund', 'Daniel', '2018-01-09', 'Edmund@Daniel.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00000000110001000101010),
('Billy', 'Jensen', '2018-01-09', 'Billy@Jensen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10001100000010000111101),
('Lucy', 'Mckenzie', '2018-01-09', 'Lucy@Mckenzie.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11110100100010101111011),
('Shari', 'Cruz', '2018-01-09', 'Shari@Cruz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00110001010001111000101),
('Tommie', 'White', '2018-01-09', 'Tommie@White.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00101001000001010010111),
('Fred', 'Frazier', '2018-01-09', 'Fred@Frazier.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01100111110000111010101),
('Kristy', 'Walton', '2018-01-09', 'Kristy@Walton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10101001001100101011001),
('Jamie', 'Williamson', '2018-01-09', 'Jamie@Williamson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11010101000011111001000),
('Evelyn', 'Washington', '2018-01-09', 'Evelyn@Washington.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01111011100101110000001),
('Sheila', 'Cummings', '2018-01-09', 'Sheila@Cummings.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00110010110010100011010),
('Bernard', 'Tyler', '2018-01-09', 'Bernard@Tyler.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00011001000000110101001),
('Katherine', 'Wong', '2018-01-09', 'Katherine@Wong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00001110100101001000100),
('Shaun', 'George', '2018-01-09', 'Shaun@George.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11101111110010000010110),
('Arthur', 'Carroll', '2018-01-09', 'Arthur@Carroll.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01011000000011101010010),
('Lillian', 'Bowen', '2018-01-09', 'Lillian@Bowen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01110000100000001100010),
('Krista', 'Reynolds', '2018-01-09', 'Krista@Reynolds.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00001100010110010110010),
('Renee', 'Pena', '2018-01-09', 'Renee@Pena.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11000001000101110000001),
('Elisa', 'Mullins', '2018-01-09', 'Elisa@Mullins.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10110110001000100111110),
('Shirley', 'Myers', '2018-01-09', 'Shirley@Myers.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01000100110000000101001),
('Lucas', 'Cox', '2018-01-09', 'Lucas@Cox.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10011100011111101111100),
('Hannah', 'Mcdonald', '2018-01-09', 'Hannah@Mcdonald.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11101000101110101111001),
('Miranda', 'Norman', '2018-01-09', 'Miranda@Norman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10011011011101001100111),
('Misty', 'Burton', '2018-01-09', 'Misty@Burton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10011011101010011011000),
('Ana', 'Tran', '2018-01-09', 'Ana@Tran.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10101111000111110110101),
('Hilda', 'Dean', '2018-01-09', 'Hilda@Dean.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00110110101010110110111),
('Vicky', 'Martinez', '2018-01-09', 'Vicky@Martinez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00011110001101101011010),
('Randolph', 'Willis', '2018-01-09', 'Randolph@Willis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00100110100011100000011),
('Rochelle', 'Fisher', '2018-01-09', 'Rochelle@Fisher.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01010111001110000110110),
('Maxine', 'Sparks', '2018-01-09', 'Maxine@Sparks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10011110010001100001010),
('Leroy', 'Owens', '2018-01-09', 'Leroy@Owens.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11010111100100101010000),
('Lyle', 'Page', '2018-01-09', 'Lyle@Page.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11111111111111110111001),
('Paul', 'Miller', '2018-01-09', 'Paul@Miller.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00111001011111011101010),
('Ramon', 'Armstrong', '2018-01-09', 'Ramon@Armstrong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00001111000111110011111),
('Jessica', 'Dixon', '2018-01-09', 'Jessica@Dixon.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01101101001111111001001),
('Percy', 'Andrews', '2018-01-09', 'Percy@Andrews.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10011001011000101101101),
('Cynthia', 'Graves', '2018-01-09', 'Cynthia@Graves.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01000001101101101010100),
('Trevor', 'Pratt', '2018-01-09', 'Trevor@Pratt.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00000111011101101111010),
('Carol', 'Curtis', '2018-01-09', 'Carol@Curtis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00100001110000001011000),
('Isaac', 'Pearson', '2018-01-09', 'Isaac@Pearson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11110010101110010100101),
('Gerardo', 'Bridges', '2018-01-09', 'Gerardo@Bridges.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01011000001010111100010),
('Katrina', 'James', '2018-01-09', 'Katrina@James.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00101000101011000010111),
('Lisa', 'Clayton', '2018-01-09', 'Lisa@Clayton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11111011001100001110111),
('Jennifer', 'Gibson', '2018-01-09', 'Jennifer@Gibson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10101101001000001000010),
('Ralph', 'Clark', '2018-01-09', 'Ralph@Clark.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10101011010011010000111),
('Pamela', 'Elliott', '2018-01-09', 'Pamela@Elliott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11111111110101001001011),
('Blake', 'Quinn', '2018-01-09', 'Blake@Quinn.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10010110011110010111101),
('Laurence', 'Aguilar', '2018-01-09', 'Laurence@Aguilar.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00011101100110100000111),
('Kristopher', 'Gibbs', '2018-01-09', 'Kristopher@Gibbs.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10111100100100110010000),
('Juanita', 'Gomez', '2018-01-09', 'Juanita@Gomez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11110101011101010111011),
('Carmen', 'Berry', '2018-01-09', 'Carmen@Berry.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00011111011110100101101),
('Doreen', 'Little', '2018-01-09', 'Doreen@Little.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01011000001110111111000),
('Darlene', 'Wolfe', '2018-01-09', 'Darlene@Wolfe.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01010101110100010100111),
('Rex', 'Adams', '2018-01-09', 'Rex@Adams.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10110000010011000110001),
('Kate', 'Clarke', '2018-01-09', 'Kate@Clarke.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11100000101111110010101),
('Gregg', 'Ball', '2018-01-09', 'Gregg@Ball.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10101111100101000101011),
('Clark', 'Sims', '2018-01-09', 'Clark@Sims.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00110101010111100000001),
('Rafael', 'Oliver', '2018-01-09', 'Rafael@Oliver.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,11101110000110100101100),
('Catherine', 'Luna', '2018-01-09', 'Catherine@Luna.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01011101111011110100000),
('Jana', 'Rose', '2018-01-09', 'Jana@Rose.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10111111010100111100101),
('Kenny', 'Lucas', '2018-01-09', 'Kenny@Lucas.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,10000001011110001011000),
('Harvey', 'Bass', '2018-01-09', 'Harvey@Bass.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,01101011111111101001001),
('Ida', 'Nichols', '2018-01-09', 'Ida@Nichols.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL,00100111111001100101001);