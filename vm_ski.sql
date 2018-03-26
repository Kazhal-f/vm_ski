-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18. Mar, 2018 19:09 PM
-- Server-versjon: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vm_ski`
--
DROP DATABASE IF EXISTS vm_ski;

CREATE DATABASE vm_ski;
-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ovelse`
--

CREATE TABLE `ovelse` (
  `ovelseId` int(8) NOT NULL,
  `ovelse` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dato` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sted` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `ovelse`
--

INSERT INTO `ovelse` (`ovelseId`, `ovelse`, `dato`, `tid`, `sted`) VALUES
(1, 'Slalom', '01.08.12', 'kl12', 'Hamar'),
(3, '10Mila', '01.02.19', 'kl14.45', 'Kollen'),
(5, '2Mila', '09.08.19', 'kl13', 'Holmen');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `person`
--

CREATE TABLE `person` (
  `id` int(8) NOT NULL,
  `Fornavn` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Etternavn` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresse` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostNr` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Poststed` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TelefonNr` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `person`
--

INSERT INTO `person` (`id`, `Fornavn`, `Etternavn`, `Adresse`, `PostNr`, `Poststed`, `TelefonNr`) VALUES
(1, 'Brandon', 'Trump', 'White House 1', '1111', 'DC', '11111111'),
(3, 'Melania', 'Trump', 'White House 2', '1111', 'DC', '11111112'),
(4, 'DonaldJr', 'Trump', 'White House 2', '1111', 'DC', '11111112'),
(5, 'Barack', 'Obama', 'Maryland', '1111', 'MA', '11111115'),
(6, 'DonaldDonald', 'Trump', 'White House 4', '2222', 'DC', '11111115'),
(7, 'DonaldJr', 'Trump', 'White House 3', '1111', 'DC', '11111114'),
(8, 'Bjarne', 'Hansen', 'Hansen1', '1212', 'Oslo', '989898'),
(9, 'John', 'Johnson', 'Oslo1', '1111', 'Oslo', '98786756'),
(10, 'Brandon', 'Smith', 'Hansen1', '1212', 'Oslo', '11111115');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `publikum`
--

CREATE TABLE `publikum` (
  `publikumId` int(8) NOT NULL,
  `personId` int(8) DEFAULT NULL,
  `BilettType` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ovelseId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `publikum`
--

INSERT INTO `publikum` (`publikumId`, `personId`, `BilettType`, `ovelseId`) VALUES
(1, 5, 'Normal Billett', 1),
(2, 8, 'VIP Billett', 3),
(3, 9, 'Normal Billett', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `utover`
--

CREATE TABLE `utover` (
  `utoverId` int(8) NOT NULL,
  `personId` int(8) DEFAULT NULL,
  `nasjonalitet` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ovelseId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dataark for tabell `utover`
--

INSERT INTO `utover` (`utoverId`, `personId`, `nasjonalitet`, `ovelseId`) VALUES
(1, 6, 'USA', 3),
(2, 7, 'USA', 1),
(3, 10, 'Norge', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ovelse`
--
ALTER TABLE `ovelse`
  ADD PRIMARY KEY (`ovelseId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikum`
--
ALTER TABLE `publikum`
  ADD PRIMARY KEY (`publikumId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `ovelseId` (`ovelseId`);

--
-- Indexes for table `utover`
--
ALTER TABLE `utover`
  ADD PRIMARY KEY (`utoverId`),
  ADD KEY `personId` (`personId`),
  ADD KEY `utover_ibfk_2` (`ovelseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ovelse`
--
ALTER TABLE `ovelse`
  MODIFY `ovelseId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publikum`
--
ALTER TABLE `publikum`
  MODIFY `publikumId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utover`
--
ALTER TABLE `utover`
  MODIFY `utoverId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `publikum`
--
ALTER TABLE `publikum`
  ADD CONSTRAINT `publikum_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `publikum_ibfk_2` FOREIGN KEY (`ovelseId`) REFERENCES `ovelse` (`ovelseId`);

--
-- Begrensninger for tabell `utover`
--
ALTER TABLE `utover`
  ADD CONSTRAINT `utover_ibfk_1` FOREIGN KEY (`personId`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `utover_ibfk_2` FOREIGN KEY (`ovelseId`) REFERENCES `ovelse` (`ovelseId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
