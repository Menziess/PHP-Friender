-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 03:57 PM
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
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `other_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `message` text NOT NULL,
  `conversation_id` int(11) NOT NULL
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
  `answers` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`, `picture_id`, `answers`, `bio`) VALUES
(19, 'Jochem', 'Soons', '2018-01-09', 'jochem@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL, NULL),
(20, 'Roos', 'Riemersma', '2018-01-09', 'roos@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL, NULL),
(21, 'Sarah', 'Bosscha', '2018-01-09', 'sarah@uva.nl', '$2y$10$jSpojkLN.n3f41bDjYlHhOzdpJrT0m0L7fJp8fKbGJYFD9.tS.Ma2', NULL, NULL, NULL),
(22, 'Stefan', 'Schenk', '2018-01-09', 'stefan@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL, NULL),
(23, 'Jeannie', 'Carr', '2018-01-09', 'Jeannie@Carr.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10010001001000010111000', NULL),
(24, 'Darrel', 'Maxwell', '2018-01-09', 'Darrel@Maxwell.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111110011111100101101', NULL),
(25, 'Alice', 'Riley', '2018-01-09', 'Alice@Riley.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111111100101000000000', NULL),
(26, 'Frances', 'Peters', '2018-01-09', 'Frances@Peters.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011010011011111011001', NULL),
(27, 'Archie', 'Cobb', '2018-01-09', 'Archie@Cobb.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001110101010011110111', NULL),
(28, 'Dwight', 'Simmons', '2018-01-09', 'Dwight@Simmons.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110011001011000110010', NULL),
(29, 'Margarita', 'Robbins', '2018-01-09', 'Margarita@Robbins.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1100100010000000001010', NULL),
(30, 'Luz', 'Morton', '2018-01-09', 'Luz@Morton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100000011000011101010', NULL),
(31, 'Gustavo', 'Jimenez', '2018-01-09', 'Gustavo@Jimenez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11000100001101011011001', NULL),
(32, 'Ruben', 'Nelson', '2018-01-09', 'Ruben@Nelson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111110000100100100010', NULL),
(33, 'Tanya', 'Parks', '2018-01-09', 'Tanya@Parks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110011011010110100100', NULL),
(34, 'Doris', 'Greer', '2018-01-09', 'Doris@Greer.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111111010011110011', NULL),
(35, 'Candice', 'Ferguson', '2018-01-09', 'Candice@Ferguson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11010011000010000000001', NULL),
(36, 'Marty', 'Robertson', '2018-01-09', 'Marty@Robertson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110000001111111101110', NULL),
(37, 'Stacey', 'Lawrence', '2018-01-09', 'Stacey@Lawrence.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100110000010010001111', NULL),
(38, 'Dustin', 'Estrada', '2018-01-09', 'Dustin@Estrada.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10010110001101010000100', NULL),
(39, 'Dolores', 'Baldwin', '2018-01-09', 'Dolores@Baldwin.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11011000001110000010101', NULL),
(40, 'Angelina', 'Waters', '2018-01-09', 'Angelina@Waters.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11001000111110100010001', NULL),
(41, 'Marshall', 'Guerrero', '2018-01-09', 'Marshall@Guerrero.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010010001101110100111', NULL),
(42, 'Ron', 'Welch', '2018-01-09', 'Ron@Welch.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001000111010000001001', NULL),
(43, 'Gloria', 'Abbott', '2018-01-09', 'Gloria@Abbott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11011000000001101010010', NULL),
(44, 'Kristen', 'Hernandez', '2018-01-09', 'Kristen@Hernandez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110010000011010110011', NULL),
(45, 'Rolando', 'Stanley', '2018-01-09', 'Rolando@Stanley.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000000000011010101100', NULL),
(46, 'Elaine', 'Osborne', '2018-01-09', 'Elaine@Osborne.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10100010110101010000111', NULL),
(47, 'Damon', 'Bailey', '2018-01-09', 'Damon@Bailey.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111000101111101001000', NULL),
(48, 'Yolanda', 'Guzman', '2018-01-09', 'Yolanda@Guzman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111110100100100100101', NULL),
(49, 'Kerry', 'Grant', '2018-01-09', 'Kerry@Grant.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110001010100110100100', NULL),
(50, 'Sherri', 'Johnson', '2018-01-09', 'Sherri@Johnson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111000111101000111110', NULL),
(51, 'Ernestine', 'Frank', '2018-01-09', 'Ernestine@Frank.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000001001000001100101', NULL),
(52, 'Dianna', 'Manning', '2018-01-09', 'Dianna@Manning.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111010011000001100000', NULL),
(53, 'Sarah', 'Garrett', '2018-01-09', 'Sarah@Garrett.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010000001000011101000', NULL),
(54, 'Francisco', 'Thornton', '2018-01-09', 'Francisco@Thornton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000011010010111101111', NULL),
(55, 'Blanche', 'Davis', '2018-01-09', 'Blanche@Davis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101000010101100101101', NULL),
(56, 'Carla', 'Marshall', '2018-01-09', 'Carla@Marshall.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001110110000010010001', NULL),
(57, 'Guy', 'Barber', '2018-01-09', 'Guy@Barber.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010011101001111011010', NULL),
(58, 'Erica', 'Malone', '2018-01-09', 'Erica@Malone.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101011011010110000000', NULL),
(59, 'Colleen', 'Kelly', '2018-01-09', 'Colleen@Kelly.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11000001100110110000100', NULL),
(60, 'Willard', 'Ortiz', '2018-01-09', 'Willard@Ortiz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110001010110110010011', NULL),
(61, 'Edmund', 'Daniel', '2018-01-09', 'Edmund@Daniel.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110001000101010', NULL),
(62, 'Billy', 'Jensen', '2018-01-09', 'Billy@Jensen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001100000010000111101', NULL),
(63, 'Lucy', 'Mckenzie', '2018-01-09', 'Lucy@Mckenzie.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110100100010101111011', NULL),
(64, 'Shari', 'Cruz', '2018-01-09', 'Shari@Cruz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110001010001111000101', NULL),
(65, 'Tommie', 'White', '2018-01-09', 'Tommie@White.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '101001000001010010111', NULL),
(66, 'Fred', 'Frazier', '2018-01-09', 'Fred@Frazier.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1100111110000111010101', NULL),
(67, 'Kristy', 'Walton', '2018-01-09', 'Kristy@Walton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101001001100101011001', NULL),
(68, 'Jamie', 'Williamson', '2018-01-09', 'Jamie@Williamson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11010101000011111001000', NULL),
(69, 'Evelyn', 'Washington', '2018-01-09', 'Evelyn@Washington.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111011100101110000001', NULL),
(70, 'Sheila', 'Cummings', '2018-01-09', 'Sheila@Cummings.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110010110010100011010', NULL),
(71, 'Bernard', 'Tyler', '2018-01-09', 'Bernard@Tyler.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11001000000110101001', NULL),
(72, 'Katherine', 'Wong', '2018-01-09', 'Katherine@Wong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110100101001000100', NULL),
(73, 'Shaun', 'George', '2018-01-09', 'Shaun@George.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101111110010000010110', NULL),
(74, 'Arthur', 'Carroll', '2018-01-09', 'Arthur@Carroll.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000000011101010010', NULL),
(75, 'Lillian', 'Bowen', '2018-01-09', 'Lillian@Bowen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110000100000001100010', NULL),
(76, 'Krista', 'Reynolds', '2018-01-09', 'Krista@Reynolds.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1100010110010110010', NULL),
(77, 'Renee', 'Pena', '2018-01-09', 'Renee@Pena.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11000001000101110000001', NULL),
(78, 'Elisa', 'Mullins', '2018-01-09', 'Elisa@Mullins.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110110001000100111110', NULL),
(79, 'Shirley', 'Myers', '2018-01-09', 'Shirley@Myers.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000100110000000101001', NULL),
(80, 'Lucas', 'Cox', '2018-01-09', 'Lucas@Cox.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011100011111101111100', NULL),
(81, 'Hannah', 'Mcdonald', '2018-01-09', 'Hannah@Mcdonald.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101000101110101111001', NULL),
(82, 'Miranda', 'Norman', '2018-01-09', 'Miranda@Norman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011011011101001100111', NULL),
(83, 'Misty', 'Burton', '2018-01-09', 'Misty@Burton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011011101010011011000', NULL),
(84, 'Ana', 'Tran', '2018-01-09', 'Ana@Tran.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101111000111110110101', NULL),
(85, 'Hilda', 'Dean', '2018-01-09', 'Hilda@Dean.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110110101010110110111', NULL),
(86, 'Vicky', 'Martinez', '2018-01-09', 'Vicky@Martinez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110001101101011010', NULL),
(87, 'Randolph', 'Willis', '2018-01-09', 'Randolph@Willis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100110100011100000011', NULL),
(88, 'Rochelle', 'Fisher', '2018-01-09', 'Rochelle@Fisher.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010111001110000110110', NULL),
(89, 'Maxine', 'Sparks', '2018-01-09', 'Maxine@Sparks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011110010001100001010', NULL),
(90, 'Leroy', 'Owens', '2018-01-09', 'Leroy@Owens.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11010111100100101010000', NULL),
(91, 'Lyle', 'Page', '2018-01-09', 'Lyle@Page.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111111111111110111001', NULL),
(92, 'Paul', 'Miller', '2018-01-09', 'Paul@Miller.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111001011111011101010', NULL),
(93, 'Ramon', 'Armstrong', '2018-01-09', 'Ramon@Armstrong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111000111110011111', NULL),
(94, 'Jessica', 'Dixon', '2018-01-09', 'Jessica@Dixon.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101101001111111001001', NULL),
(95, 'Percy', 'Andrews', '2018-01-09', 'Percy@Andrews.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011001011000101101101', NULL),
(96, 'Cynthia', 'Graves', '2018-01-09', 'Cynthia@Graves.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000001101101101010100', NULL),
(97, 'Trevor', 'Pratt', '2018-01-09', 'Trevor@Pratt.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111011101101111010', NULL),
(98, 'Carol', 'Curtis', '2018-01-09', 'Carol@Curtis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100001110000001011000', NULL),
(99, 'Isaac', 'Pearson', '2018-01-09', 'Isaac@Pearson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110010101110010100101', NULL),
(100, 'Gerardo', 'Bridges', '2018-01-09', 'Gerardo@Bridges.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000001010111100010', NULL),
(101, 'Katrina', 'James', '2018-01-09', 'Katrina@James.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '101000101011000010111', NULL),
(102, 'Lisa', 'Clayton', '2018-01-09', 'Lisa@Clayton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111011001100001110111', NULL),
(103, 'Jennifer', 'Gibson', '2018-01-09', 'Jennifer@Gibson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101101001000001000010', NULL),
(104, 'Ralph', 'Clark', '2018-01-09', 'Ralph@Clark.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101011010011010000111', NULL),
(105, 'Pamela', 'Elliott', '2018-01-09', 'Pamela@Elliott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111111110101001001011', NULL),
(106, 'Blake', 'Quinn', '2018-01-09', 'Blake@Quinn.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10010110011110010111101', NULL),
(107, 'Laurence', 'Aguilar', '2018-01-09', 'Laurence@Aguilar.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101100110100000111', NULL),
(108, 'Kristopher', 'Gibbs', '2018-01-09', 'Kristopher@Gibbs.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111100100100110010000', NULL),
(109, 'Juanita', 'Gomez', '2018-01-09', 'Juanita@Gomez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110101011101010111011', NULL),
(110, 'Carmen', 'Berry', '2018-01-09', 'Carmen@Berry.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111011110100101101', NULL),
(111, 'Doreen', 'Little', '2018-01-09', 'Doreen@Little.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000001110111111000', NULL),
(112, 'Darlene', 'Wolfe', '2018-01-09', 'Darlene@Wolfe.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010101110100010100111', NULL),
(113, 'Rex', 'Adams', '2018-01-09', 'Rex@Adams.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110000010011000110001', NULL),
(114, 'Kate', 'Clarke', '2018-01-09', 'Kate@Clarke.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11100000101111110010101', NULL),
(115, 'Gregg', 'Ball', '2018-01-09', 'Gregg@Ball.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101111100101000101011', NULL),
(116, 'Clark', 'Sims', '2018-01-09', 'Clark@Sims.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110101010111100000001', NULL),
(117, 'Rafael', 'Oliver', '2018-01-09', 'Rafael@Oliver.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101110000110100101100', NULL),
(118, 'Catherine', 'Luna', '2018-01-09', 'Catherine@Luna.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011101111011110100000', NULL),
(119, 'Jana', 'Rose', '2018-01-09', 'Jana@Rose.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111111010100111100101', NULL),
(120, 'Kenny', 'Lucas', '2018-01-09', 'Kenny@Lucas.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000001011110001011000', NULL),
(121, 'Harvey', 'Bass', '2018-01-09', 'Harvey@Bass.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101011111111101001001', NULL),
(122, 'Ida', 'Nichols', '2018-01-09', 'Ida@Nichols.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100111111001100101001', NULL);

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
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `other_id` (`other_id`),
  ADD KEY `event_id` (`event_id`);

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
  ADD KEY `conversation_id` (`conversation_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
