-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 19, 2024 at 02:39 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemeente`
--

-- --------------------------------------------------------

--
-- Table structure for table `klacht`
--

CREATE TABLE `klacht` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `onderwerp` varchar(255) DEFAULT NULL,
  `klacht` text,
  `gps` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klacht`
--

INSERT INTO `klacht` (`id`, `naam`, `email`, `onderwerp`, `klacht`, `gps`, `foto`) VALUES
(1, 'Melissa de Graaf', 'MelissaGraaf@VVD.com', 'Fietspaden', 'Amsterdam kampt met een ernstig tekort aan fietspaden, wat resulteert in een toename van verkeersongelukken. De huidige situatie brengt zowel fietsers als automobilisten in gevaar, aangezien er onvoldoende infrastructuur is om een veilige co-existentie mogelijk te maken.', '52.3681330, 4.8749656', 'uploads/65a944951e4e0_fietspad.jpg'),
(2, 'Teun Koopmeiner', 'T.Koopmeiner@icloud.com', 'Toeristen', 'De klacht betreft het verontrustende gedrag van een aanzienlijk aantal toeristen die plastic afval op straat achterlaten in Amsterdam. Dit roept zorgen op over de vervuiling van openbare ruimtes en waterwegen, wat een negatieve invloed heeft op het milieu en de esthetiek van de stad.', '52.3743345, 4.8965912', 'uploads/65a944dd9984b_amsterdam.jpg'),
(3, 'Jan de Boer', 'JandeBoer@OnlyForMagic.com', 'Zwerver', 'Er is bezorgdheid over het gedrag van daklozen in Amsterdam die regelmatig op het stoeppad plassen. Dit leidt tot ongemak en hygiënische zorgen bij omwonenden en voorbijgangers. Het frequente voorkomen van dit gedrag roept vragen op over de beschikbaarheid van openbare sanitaire voorzieningen en de toegankelijkheid ervan voor daklozen.', '52.3777093, 4.8976265', 'uploads/65a94517487e7_zwerver.jpg'),
(4, 'Ricky van der Sloot', 'Rickyvdsloot@shabushabu.com', 'Jongeren met vuurwerk', 'Ik wil graag een klacht indienen over de toenemende schade veroorzaakt door jongeren die prullenbakken en andere eigendommen vernielen met vuurwerk. Deze destructieve activiteiten hebben niet alleen gevolgen voor de openbare ruimte, maar leiden ook tot angst bij huisdieren. De onveilige situatie die hierdoor ontstaat, is zorgwekkend en vraagt om passende maatregelen om deze overlast en schade te verminderen.', '52.3469281, 4.9411011', 'uploads/65a9624bbfdf1_kapot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `geboortedatum` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `naam`, `gebruikersnaam`, `wachtwoord`, `geboortedatum`, `email`, `telefoonnummer`) VALUES
(1, 'Tom', 'Tom', '$2y$10$4qcrkj6MoSldM.Naz1GK0e32ZaUaivBgYGrgajOSBwFQtVpJ5qByS', '2000-06-26', 'Tom@icloud.com', '0686215215'),
(2, 'TomChen', 'TomChen', '$2y$10$c95JBvOJx4iIST5mlaYQse4sjICJXWF6DSTU9V9w0kEtn0zKKe3Wa', '2000-06-26', 'tomchen@icloud.com', '0686215215'),
(3, 'Jezi', 'Jezi', '$2y$10$jhxdulV7TYZMgHVXdg8Tju07twswDO4tDqEKr25KM.DV9KWCMh8Jm', '2000-06-26', 'Jezi@icloud.com', '0686215215'),
(4, 'TomChen', 'TomChen2', '$2y$10$U9TXDmX/aNQZDbCaGqc1eezvo0z5og.aWuGjcLsyVYyVnvstacS5W', '2000-06-26', 'phenovaa@icloud.com', '123456789'),
(5, 'Pikachu', 'Pikachu', '$2y$10$5d2f54.iZaWaZvj/uOXPaeIKdc/Yt.L/zEFIYsNzjqAngAFuiEzqG', '2000-06-26', 'Pikachu@icloud.com', '0686215215'),
(6, 'Dora', 'Dora', '$2y$10$2..m38X89VsDumaIXNU65Ot69y9s3sqlNau75e.1u1Wpqmy2PQS3.', '2000-06-26', 'Dora@icloud.com', '0686215215'),
(7, 'Jay', 'Jay', '$2y$10$8k1DohD4Ni01dbw1k9ImCOFOW4.tzMS7BDotZWvo9/GFYerY.oyZ6', '2000-06-26', 'Jay@icloud.com', '0686215215'),
(8, 'Jan', 'Jan', '$2y$10$/xpAhgTUsxnTYhO61FjznOmdFp4jtmUzV/VdqutCHVJrDRaeYS/E2', '1998-06-26', 'Jan@icloud.com', '0686215215'),
(9, 'Leonardo', 'Leonardo', '$2y$10$nTge436lOIpzF7isODPp7O0Efc464MR.Wr9c0Y8fa32//Ta52mjVO', '1994-06-26', 'Leonardo@hotmail.com', '0102357234'),
(10, 'Marco', 'Marco', '$2y$10$M95tOsHewoH6tFQPaJ7CoeguIIQFG4VKqkSlHau2uRt6gbulgbohO', '2000-06-26', 'Marcooo@gmail.com', '0683410345'),
(11, 'Marco', '123456', '$2y$10$l8YbqlyR8DRkexKfDE3w/eNebd.6ivk01AINKstL0vyZbjhBXhISK', '2000-06-26', 'marco@icloud.com', '0686215215'),
(12, 'Majer', 'Majer', '$2y$10$xbt5rszwSsCPTMrP5yjyjOJkjoTbmD1ab4ukGCsQHMwaepjIa/y1W', '2000-06-26', 'Majer@icloud.com', '0686215215'),
(13, 'Vue', 'Vue', '$2y$10$7lSIUkQqAeY7364oWxDg1O2dU5ci4D4FinbQzOftxOxjewh8peAw2', '2000-06-26', 'Vue@icloud.com', '0686215215'),
(14, 'JamieVardy', 'JamieVardy', '$2y$10$G/jvElLiN3rtzXL9F.U1b..C4amc.inGdkCTFHrS/TZAFl47Fa2gq', '1998-09-19', 'JamieVardy@icloud.com', '0686215932'),
(15, 'Cecilia', 'Cecilia', '$2y$10$/BmUNUaqPPjDEPUGIXC1oOZDGsOdrs/O.RZX424LEh8K3uDi9bxxa', '1999-04-09', 'Cecilia@erasmus.nl', '0686215215'),
(16, 'Vivi', 'Vivi', '$2y$10$.D/.vKgygwDOmqUfwYvuhexctezAo4UABq6h9JUgm3lsK1dmvcCIu', '2003-04-29', 'Vivi@vivi.com', '0687345624'),
(17, 'Maria', 'Maria', '$2y$10$fljnCvkIum3jCsG9uxtGG.3hfsp5RvyFZhsyFhw8JbnvsnCjZ8/6m', '2005-09-19', 'Maria@gmail.com', '0686323456'),
(18, 'Jamal', 'Jamal', '$2y$10$NLVNuFQzT0XdqASplW5HZ.3YNSLTh5eqqwSFOqtAqkOIufTFKD9pa', '2000-06-26', 'Jamal@google.com', '0686731563'),
(19, 'Mia', 'Mia', '$2y$10$gDXAyP8hYFlo8M6012BVauQ.cZL835efLGoV9DunOVjFyWE9Xb0hq', '1994-12-26', 'Weirdo@icloud.com', '0683456723');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klacht`
--
ALTER TABLE `klacht`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klacht`
--
ALTER TABLE `klacht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
