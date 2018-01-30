-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 11:42 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `activity`
--

TRUNCATE TABLE `activity`;
--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `picture_id`, `name`, `description`) VALUES
(1, 1, 'Koffie bij sjeel', 'Sjeel is het fenomeen van Sciencepark 904, sjeel kent elke combinatie van student en type koffie uit dr hoofd. Sjeel voorkomt ook elke awkward situatie, dus mocht je een beetje gespannen zijn voor jullie eerste meeting; sjeel zorgt er voor dat die spanning als sneeuw voor de zon verdwijnen. Daarnaast is er wetenschappelijk aangetoond dat koffiedrinkers langer leven, dus nog meer tijd in je leven om je nieuwe bestfriends te leren kennen!\r\nEen aanrader van ons team: neem een dubbele espresso, zo raak je zeker niet je focus kwijt tijdens misschien wel de eerste meeting van je NIEUWE BESTE VRIENDEN CLUB.'),
(2, 2, 'Lunchen bij polder', 'De liefde van de man (dus vast ook wel van de vrouw #genderequality) gaat door de maag, dus laat cafe-restaurant Polder dan de perfecte plaats zijn voor jullie eerste meeting, waardoor de vriendschappelijke liefde kan bloeien. Polder serveert eerlijk eten in monumentale Annahoeve, gewoon tegenover Sciencepark 904; wat <strong>eerlijk</strong> eten is, is misschien een goede eerste vraag als gespreksstof. In de zomer kan je lekker buiten zitten en lopen de kippen letterlijk rond je tafel, heb je meteen nog iets leuks om over te praten.'),
(3, 3, 'Lunchen bij oerknal', 'BIEM! (een oerknal). \r\nDe liefde van de man (dus vast ook wel van de vrouw #genderequality) gaat door de maag, dus laat cafe-restaurant Oerknal dan de perfecte plaats zijn voor jullie eerste meeting, waardoor de vriendschappelijke liefde kan bloeien. Bij oerknal kan je ook heerlijke biertjes drinken, dus mocht jullie lunch afspraak uitlopen, kan er achteraf een lekker biertje worden gedronken. Doorgaans zijn er heel erg veel studenten van Sciencepark in Oerknal, dus kan je meteen nog meer mensen meeten. Have fun!'),
(4, 4, 'Koffie in startupvillage', 'Jij dacht dat de Pijp hip was? Meet de Startupvillage.\r\nDe Startupvillage is een nieuwe co-working space achter Sciencepark, opgebouwd uit enkel containers. Hier zitten allemaal kleine innovatieve high-tech en science startups gevestigd. Best of all: je hebt hier amazing coffee bij The Coffee Virus, tevens ook heerlijke kokosballetjes. Er is wetenschappelijk aangetoond dat koffiedrinkers langer leven, dus nog meer tijd in je leven om je nieuwe beste vrienden te leren kennen onder het genot van een kokosballetje. '),
(5, 5, 'Wandelen door annas tuin en ruigte', "Anna's Tuin & Ruigte is een uniek stukje poldernatuur naast het Sciencepark.\r\nIn de tuin worden experimenten gedaan alternatieve vormen van landbouw. Daartegenover staat de ruigte waar de natuur zijn eigen gang gaat en slechts minimaal wordt ingegrepen. Bij Anna's Tuin & Ruigte is er ruimte voor educatie maar zeker ook als ontmoetingsplek. Met deze nieuwe vriendengroep kunnen jullie lekker rondwandelen en de prachtige natuur ontdekken. Daarnaast heb je meteen je dagelijske hoeveelheid sport binnen, want zoals Gezondheidsnet zegt: ‘Liever lang lopen dan kort sporten'. Samen genieten en samen napraten om zo jullie vriendschap op te bouwen."),
(6, 6, 'Tafelvoetbal bij brainwave', 'Een dosis gezonde competitie kan nooit slecht zijn voor het opbouwen van jullie vriendschap, daarom is jullie eerste meeting een potje tafelvoetbal bij brainwave! Jullie kunnen in twee teams spelen of een heus toernooi opzetten en allemaal een keer tegen elkaar. Een van de belangrijkste dingen is snelheid en onverwacht toeslaan, maar het spelplezier gaat natuurlijk boven alles. Probeer niet te fanatiek te worden en behoud de sfeer, zodat jullie het potje kunnen afsluiten met een -bij brainwave te halen- koud biertje.'),
(7, 7, 'Pingpongen', 'Een dosis gezonde competitie kan nooit slecht zijn voor het opbouwen van jullie vriendschap, daarom is jullie eerste meeting een potje tafelvoetbal bij brainwave! Jullie kunnen in twee teams spelen of een heus toernooi opzetten en allemaal een keer tegen elkaar. Wist je dat pingpong al 150 jaar lang wordt gespeeld! En wist je dat Pingpong de nummer 1 sport is die de meeste activiteit van je hersenen vraagt.\r\nProbeer niet te fanatiek te worden en behoud de sfeer, zodat jullie het potje kunnen afsluiten met een -bij brainwave te halen- koud biertje.'),
(8, 8, 'Bier bij via', 'Chinese onderzoekers hebben ontdekt dat hop, het hoofdingrediënt van bier, de hersenen mogelijk beschermt tegen aandoeningen als Parkinson en Alzheimer. Nou nu je dit weet heb je vast nog meer zin in je biertje bij Via, de studievereniging van Kunstmatige Intelligentie. Bij Via is het bier praktisch gratis en bevind je je in een gezellig maar nog steeds educatieve omgeving. Je kan hier je nieuwe vriendengroep goed leren kennen en tevens in contact komen met andere Via leden.'),
(9, 9, 'Kijk een wedstrijd robot voetbal', 'Op de derde verdieping van het C gebouw bevindt zich het Robolab, hier zijn studenten bezig robots steeds meer te verbeteren om een zo realistisch mogelijk voetbal spel neer te zetten. Iedere maand houdt het Dutch Nao Team een oefenwedstrijd. Tijdens deze wedstrijd worden de nieuwe codes getest en verbeterd. Wist je dat er een organisatie is genaamd Robocup die als doel hebben in 2050 de wereldkampioen te verslaan? #leukgespreksonderwerp'),
(10, 10, 'Selfie met dino', "het is al een heuse speurtocht op zoek naar deze Dino genaamd Bob. Tip: als je bij de statafels bij Sjeel staat en dan naar boven kijkt zie je hem. Eenmaal bij Bob aangekomen gaan jullie de tijd van je leven hebben, selfies maken tot je erbij neervalt, Bob vindt het fantastisch. oh en 'PLEASE DO NOT FEED' vindt ie iets minder lache."),
(11, 11, 'Onderzoek wat het geluid is in de B0 gangen', "Is het een vogel? Is het een vliegtuig? Nee! Nee! Nee! \r\nHet is het super onduidelijke piepende geluid in de gangen van B0, maar wat veroorzaakt het? Het is niet de deuren van het magazijn, hebben we al gecheckt, het is niet die man met die scootmobiel, maar wat dan wel? \r\nDat mogen jullie uit gaan zoeken bij jullie eerste meeting!\r\nLaat je creativiteit de vrije loop gaan, speculeer er op los en komen samen tot een fantastisch eind idee, een beetje avontuur bij een eerste meeting kan niks kwaad. Na deze bonding kan het niet ander dan dat jullie beste vrienden worden.");

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
-- Truncate table before insert `answer`
--

TRUNCATE TABLE `answer`;
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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `conversation`
--

TRUNCATE TABLE `conversation`;
--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `expiry_date` timestamp DEFAULT NULL
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
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `picture`
--

TRUNCATE TABLE `picture`;
--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `user_id`, `filename`) VALUES
(1, NULL, 'koffie.jpg'),
(2, NULL, 'polder.jpg'),
(3, NULL, 'oerknal.jpg'),
(4, NULL, 'startup-village.jpg'),
(5, NULL, 'annas-tuin.png'),
(6, NULL, 'tafelvoetbal.jpg'),
(7, NULL, 'pingpong.jpg'),
(8, NULL, 'bier.jpg'),
(9, NULL, 'robot-voetbal.jpg'),
(10, NULL, 'olifant.jpg'),
(11, NULL, 'gangen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `expired_at` date NOT NULL
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
  `bio` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `notifications` tinyint(1) NOT NULL DEFAULT '1',
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `date_of_birth`, `email`, `password`, `picture_id`, `answers`, `bio`, `is_active`, `is_admin`, `is_banned`, `notifications`, `conversation_id`) VALUES
(1, 'Jochem', 'Soons', '2018-01-09', 'jochem@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL, 'Hallo, ik ben Jochem. Hallo, ik ben Jochem. Hallo, ik ben Jochem. Hallo, ik ben Jochem. Hallo, ik ben Jochem.', 1, 1, 0, 1, 1),
(2, 'Roos', 'Riemersma', '2018-01-09', 'roos@uva.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, NULL, 'Hallo, ik ben Roos. Super leuk dat je gebruik maakt van onze site!! Zonder jou zouden wij niet kunnen bestaan. Ik ben zo ontzettend trots op dit meesterwerk dat wij hebben afgeleverd.', 1, 1, 0, 1, 2),
(3, 'Sarah', 'Bosscha', '2018-01-09', 'sarah@uva.nl', '$2y$10$jSpojkLN.n3f41bDjYlHhOzdpJrT0m0L7fJp8fKbGJYFD9.tS.Ma2', NULL, NULL, 'Hallo, ik ben Sarah. Mooie site he? heb ik bedacht samen met mijn vrienden die ik gemaakt heb met Friender. Echt, ik heb zoveel vrienden, NU JIJ NOG! Veel plezier op deze site en friendze!', 1, 1, 0, 1, 3),
(4, 'Stefan', 'Schenk', '2018-01-09', 'stefan@uva.nl', '$2y$10$LIzPd5NDIR4o/p0GcCSu0ucBkRBMWVuj8eDkRTBwJXe76w.3P8Cse', NULL, NULL, 'Hallo, ik ben Stefan, mede verantwoordelijk voor het realiseren van deze website. Voor vragen of donaties: <a href="https://github.com/Menziess">Github</a> <a href="https://bitref.com/qr.php?data=17UEMLXWZs9bw1srytxC9znLL9FDB2dxRk">Bitcoin</a>', 1, 1, 0, 1, 4),
(5, 'Tanya', 'Parks', '2018-01-09', 'Tanya@Parks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110011011010110100100', NULL, 1, 0, 0, 1, 5),
(6, 'Doris', 'Greer', '2018-01-09', 'Doris@Greer.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111111010011110011', NULL, 1, 0, 0, 1, 6),
(7, 'Marty', 'Robertson', '2018-01-09', 'Marty@Robertson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110000001111111101110', NULL, 1, 0, 0, 1, 7),
(8, 'Stacey', 'Lawrence', '2018-01-09', 'Stacey@Lawrence.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100110000010010001111', NULL, 1, 0, 0, 1, 8),
(9, 'Dustin', 'Estrada', '2018-01-09', 'Dustin@Estrada.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10010110001101010000100', NULL, 1, 0, 0, 1, 9),
(10, 'Dolores', 'Baldwin', '2018-01-09', 'Dolores@Baldwin.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11011000001110000010101', NULL, 1, 0, 0, 1, 10),
(11, 'Angelina', 'Waters', '2018-01-09', 'Angelina@Waters.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11001000111110100010001', NULL, 1, 0, 0, 1, 11),
(12, 'Marshall', 'Guerrero', '2018-01-09', 'Marshall@Guerrero.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010010001101110100111', NULL, 1, 0, 0, 1, 12),
(13, 'Ron', 'Welch', '2018-01-09', 'Ron@Welch.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001000111010000001001', NULL, 1, 0, 0, 1, 13),
(14, 'Gloria', 'Abbott', '2018-01-09', 'Gloria@Abbott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11011000000001101010010', NULL, 1, 0, 0, 1, 14),
(15, 'Kristen', 'Hernandez', '2018-01-09', 'Kristen@Hernandez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110010000011010110011', NULL, 1, 0, 0, 1, 15),
(16, 'Rolando', 'Stanley', '2018-01-09', 'Rolando@Stanley.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000000000011010101100', NULL, 1, 0, 0, 1, 16),
(17, 'Elaine', 'Osborne', '2018-01-09', 'Elaine@Osborne.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10100010110101010000111', NULL, 1, 0, 0, 1, 17),
(18, 'Damon', 'Bailey', '2018-01-09', 'Damon@Bailey.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111000101111101001000', NULL, 1, 0, 0, 1, 18),
(19, 'Yolanda', 'Guzman', '2018-01-09', 'Yolanda@Guzman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111110100100100100101', NULL, 1, 0, 0, 1, 19),
(20, 'Kerry', 'Grant', '2018-01-09', 'Kerry@Grant.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110001010100110100100', NULL, 1, 0, 0, 1, 20),
(21, 'Sherri', 'Johnson', '2018-01-09', 'Sherri@Johnson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111000111101000111110', NULL, 1, 0, 0, 1, 21),
(22, 'Ernestine', 'Frank', '2018-01-09', 'Ernestine@Frank.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000001001000001100101', NULL, 1, 0, 0, 1, 22),
(23, 'Dianna', 'Manning', '2018-01-09', 'Dianna@Manning.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111010011000001100000', NULL, 1, 0, 0, 1, 23),
(24, 'Sarah', 'Garrett', '2018-01-09', 'Sarah@Garrett.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010000001000011101000', NULL, 1, 0, 0, 1, 24),
(25, 'Francisco', 'Thornton', '2018-01-09', 'Francisco@Thornton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000011010010111101111', NULL, 1, 0, 0, 1, 25),
(26, 'Blanche', 'Davis', '2018-01-09', 'Blanche@Davis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101000010101100101101', NULL, 1, 0, 0, 1, 26),
(27, 'Carla', 'Marshall', '2018-01-09', 'Carla@Marshall.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001110110000010010001', NULL, 1, 0, 0, 1, 27),
(28, 'Guy', 'Barber', '2018-01-09', 'Guy@Barber.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010011101001111011010', NULL, 1, 0, 0, 1, 28),
(29, 'Erica', 'Malone', '2018-01-09', 'Erica@Malone.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101011011010110000000', NULL, 1, 0, 0, 1, 29),
(30, 'Colleen', 'Kelly', '2018-01-09', 'Colleen@Kelly.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11000001100110110000100', NULL, 1, 0, 0, 1, 30),
(31, 'Willard', 'Ortiz', '2018-01-09', 'Willard@Ortiz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110001010110110010011', NULL, 1, 0, 0, 1, 31),
(32, 'Edmund', 'Daniel', '2018-01-09', 'Edmund@Daniel.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110001000101010', NULL, 1, 0, 0, 1, 32),
(33, 'Billy', 'Jensen', '2018-01-09', 'Billy@Jensen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10001100000010000111101', NULL, 1, 0, 0, 1, 33),
(34, 'Lucy', 'Mckenzie', '2018-01-09', 'Lucy@Mckenzie.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110100100010101111011', NULL, 1, 0, 0, 1, 34),
(35, 'Shari', 'Cruz', '2018-01-09', 'Shari@Cruz.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110001010001111000101', NULL, 1, 0, 0, 1, 35),
(36, 'Tommie', 'White', '2018-01-09', 'Tommie@White.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '101001000001010010111', NULL, 1, 0, 0, 1, 36),
(37, 'Fred', 'Frazier', '2018-01-09', 'Fred@Frazier.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1100111110000111010101', NULL, 1, 0, 0, 1, 37),
(38, 'Kristy', 'Walton', '2018-01-09', 'Kristy@Walton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101001001100101011001', NULL, 1, 0, 0, 1, 38),
(39, 'Jamie', 'Williamson', '2018-01-09', 'Jamie@Williamson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11010101000011111001000', NULL, 1, 0, 0, 1, 39),
(40, 'Evelyn', 'Washington', '2018-01-09', 'Evelyn@Washington.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111011100101110000001', NULL, 1, 0, 0, 1, 40),
(41, 'Sheila', 'Cummings', '2018-01-09', 'Sheila@Cummings.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110010110010100011010', NULL, 1, 0, 0, 1, 41),
(42, 'Bernard', 'Tyler', '2018-01-09', 'Bernard@Tyler.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11001000000110101001', NULL, 1, 0, 0, 1, 42),
(43, 'Katherine', 'Wong', '2018-01-09', 'Katherine@Wong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110100101001000100', NULL, 1, 0, 0, 1, 43),
(44, 'Shaun', 'George', '2018-01-09', 'Shaun@George.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101111110010000010110', NULL, 1, 0, 0, 1, 44),
(45, 'Arthur', 'Carroll', '2018-01-09', 'Arthur@Carroll.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000000011101010010', NULL, 1, 0, 0, 1, 45),
(46, 'Lillian', 'Bowen', '2018-01-09', 'Lillian@Bowen.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1110000100000001100010', NULL, 1, 0, 0, 1, 46),
(47, 'Krista', 'Reynolds', '2018-01-09', 'Krista@Reynolds.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1100010110010110010', NULL, 1, 0, 0, 1, 47),
(48, 'Renee', 'Pena', '2018-01-09', 'Renee@Pena.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11000001000101110000001', NULL, 1, 0, 0, 1, 48),
(49, 'Elisa', 'Mullins', '2018-01-09', 'Elisa@Mullins.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110110001000100111110', NULL, 1, 0, 0, 1, 49),
(50, 'Shirley', 'Myers', '2018-01-09', 'Shirley@Myers.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000100110000000101001', NULL, 1, 0, 0, 1, 50),
(51, 'Lucas', 'Cox', '2018-01-09', 'Lucas@Cox.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011100011111101111100', NULL, 1, 0, 0, 1, 51),
(52, 'Hannah', 'Mcdonald', '2018-01-09', 'Hannah@Mcdonald.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101000101110101111001', NULL, 1, 0, 0, 1, 52),
(53, 'Miranda', 'Norman', '2018-01-09', 'Miranda@Norman.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011011011101001100111', NULL, 1, 0, 0, 1, 53),
(54, 'Misty', 'Burton', '2018-01-09', 'Misty@Burton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011011101010011011000', NULL, 1, 0, 0, 1, 54),
(55, 'Ana', 'Tran', '2018-01-09', 'Ana@Tran.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101111000111110110101', NULL, 1, 0, 0, 1, 55),
(56, 'Hilda', 'Dean', '2018-01-09', 'Hilda@Dean.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110110101010110110111', NULL, 1, 0, 0, 1, 56),
(57, 'Vicky', 'Martinez', '2018-01-09', 'Vicky@Martinez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110001101101011010', NULL, 1, 0, 0, 1, 57),
(58, 'Randolph', 'Willis', '2018-01-09', 'Randolph@Willis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100110100011100000011', NULL, 1, 0, 0, 1, 58),
(59, 'Rochelle', 'Fisher', '2018-01-09', 'Rochelle@Fisher.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010111001110000110110', NULL, 1, 0, 0, 1, 59),
(60, 'Maxine', 'Sparks', '2018-01-09', 'Maxine@Sparks.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011110010001100001010', NULL, 1, 0, 0, 1, 60),
(61, 'Leroy', 'Owens', '2018-01-09', 'Leroy@Owens.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11010111100100101010000', NULL, 1, 0, 0, 1, 61),
(62, 'Lyle', 'Page', '2018-01-09', 'Lyle@Page.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111111111111110111001', NULL, 1, 0, 0, 1, 62),
(63, 'Paul', 'Miller', '2018-01-09', 'Paul@Miller.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111001011111011101010', NULL, 1, 0, 0, 1, 63),
(64, 'Ramon', 'Armstrong', '2018-01-09', 'Ramon@Armstrong.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1111000111110011111', NULL, 1, 0, 0, 1, 64),
(65, 'Jessica', 'Dixon', '2018-01-09', 'Jessica@Dixon.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101101001111111001001', NULL, 1, 0, 0, 1, 65),
(66, 'Percy', 'Andrews', '2018-01-09', 'Percy@Andrews.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10011001011000101101101', NULL, 1, 0, 0, 1, 66),
(67, 'Cynthia', 'Graves', '2018-01-09', 'Cynthia@Graves.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1000001101101101010100', NULL, 1, 0, 0, 1, 67),
(68, 'Trevor', 'Pratt', '2018-01-09', 'Trevor@Pratt.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '111011101101111010', NULL, 1, 0, 0, 1, 68),
(69, 'Carol', 'Curtis', '2018-01-09', 'Carol@Curtis.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100001110000001011000', NULL, 1, 0, 0, 1, 69),
(70, 'Isaac', 'Pearson', '2018-01-09', 'Isaac@Pearson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110010101110010100101', NULL, 1, 0, 0, 1, 70),
(71, 'Gerardo', 'Bridges', '2018-01-09', 'Gerardo@Bridges.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000001010111100010', NULL, 1, 0, 0, 1, 71),
(72, 'Katrina', 'James', '2018-01-09', 'Katrina@James.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '101000101011000010111', NULL, 1, 0, 0, 1, 72),
(73, 'Lisa', 'Clayton', '2018-01-09', 'Lisa@Clayton.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111011001100001110111', NULL, 1, 0, 0, 1, 73),
(74, 'Jennifer', 'Gibson', '2018-01-09', 'Jennifer@Gibson.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101101001000001000010', NULL, 1, 0, 0, 1, 74),
(75, 'Ralph', 'Clark', '2018-01-09', 'Ralph@Clark.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101011010011010000111', NULL, 1, 0, 0, 1, 75),
(76, 'Pamela', 'Elliott', '2018-01-09', 'Pamela@Elliott.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111111110101001001011', NULL, 1, 0, 0, 1, 76),
(77, 'Blake', 'Quinn', '2018-01-09', 'Blake@Quinn.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10010110011110010111101', NULL, 1, 0, 0, 1, 77),
(78, 'Laurence', 'Aguilar', '2018-01-09', 'Laurence@Aguilar.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101100110100000111', NULL, 1, 0, 0, 1, 78),
(79, 'Kristopher', 'Gibbs', '2018-01-09', 'Kristopher@Gibbs.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111100100100110010000', NULL, 1, 0, 0, 1, 79),
(80, 'Juanita', 'Gomez', '2018-01-09', 'Juanita@Gomez.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11110101011101010111011', NULL, 1, 0, 0, 1, 80),
(81, 'Carmen', 'Berry', '2018-01-09', 'Carmen@Berry.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11111011110100101101', NULL, 1, 0, 0, 1, 81),
(82, 'Doreen', 'Little', '2018-01-09', 'Doreen@Little.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011000001110111111000', NULL, 1, 0, 0, 1, 82),
(83, 'Darlene', 'Wolfe', '2018-01-09', 'Darlene@Wolfe.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1010101110100010100111', NULL, 1, 0, 0, 1, 83),
(84, 'Rex', 'Adams', '2018-01-09', 'Rex@Adams.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10110000010011000110001', NULL, 1, 0, 0, 1, 84),
(85, 'Kate', 'Clarke', '2018-01-09', 'Kate@Clarke.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11100000101111110010101', NULL, 1, 0, 0, 1, 85),
(86, 'Gregg', 'Ball', '2018-01-09', 'Gregg@Ball.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10101111100101000101011', NULL, 1, 0, 0, 1, 86),
(87, 'Clark', 'Sims', '2018-01-09', 'Clark@Sims.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '110101010111100000001', NULL, 1, 0, 0, 1, 87),
(88, 'Rafael', 'Oliver', '2018-01-09', 'Rafael@Oliver.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '11101110000110100101100', NULL, 1, 0, 0, 1, 88),
(89, 'Catherine', 'Luna', '2018-01-09', 'Catherine@Luna.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1011101111011110100000', NULL, 1, 0, 0, 1, 89),
(90, 'Jana', 'Rose', '2018-01-09', 'Jana@Rose.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10111111010100111100101', NULL, 1, 0, 0, 1, 90),
(91, 'Kenny', 'Lucas', '2018-01-09', 'Kenny@Lucas.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '10000001011110001011000', NULL, 1, 0, 0, 1, 91),
(92, 'Harvey', 'Bass', '2018-01-09', 'Harvey@Bass.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '1101011111111101001001', NULL, 1, 0, 0, 1, 92),
(93, 'Ida', 'Nichols', '2018-01-09', 'Ida@Nichols.nl', '$2y$10$R2CNHX.i5RcAm7jPALADiuhnF2/6Df2iNb/TDGbtQvvTOZ0naXN1S', NULL, '100111111001100101001', NULL, 1, 0, 0, 1, 93);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conversation_id` (`conversation_id`),
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
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `conversation_id` (`conversation_id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
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
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
