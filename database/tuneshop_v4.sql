-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Gegenereerd op: 22 jun 2019 om 10:16
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuneshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(35) NOT NULL,
  `MainCategoryID` int(3) NOT NULL,
  `CategoryOrder` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `MainCategoryID`, `CategoryOrder`) VALUES
(1, 'Accesoires voor Drums en Percussie', 4, 4),
(2, 'Accesoires voor Gitaar en Bas', 2, 7),
(3, 'Accesoires voor Piano\'s', 1, 9),
(4, 'Accesoires voor Strijkinstrumenten', 5, 4),
(5, 'Accordeons', 1, 8),
(6, 'Akoustische Drums', 4, 1),
(7, 'Akoustische Gitaren', 2, 2),
(8, 'Basgitaren', 2, 4),
(9, 'Blokfluiten', 3, 2),
(10, 'Cello\'s', 5, 2),
(11, 'Contrabassen', 5, 3),
(12, 'Digitale Drums', 4, 3),
(13, 'Digitale Piano\'s', 1, 3),
(14, 'Dwarsfluiten', 3, 3),
(15, 'Elektrische Gitaren', 2, 1),
(16, 'Elektronische Orgels', 1, 7),
(17, 'Keyboards', 1, 4),
(18, 'Klarinetten', 3, 6),
(19, 'Klassieke Gitaren', 2, 3),
(20, 'Mondharmonica\'s', 3, 1),
(21, 'Percussie', 4, 2),
(22, 'Piano\'s', 1, 1),
(23, 'Piccolo\'s', 3, 5),
(24, 'Saxofoon\'s', 3, 7),
(25, 'Stage Piano\'s', 1, 2),
(26, 'Synthesizers', 1, 6),
(27, 'Traditionele Snaainstrumenten', 2, 5),
(28, 'Trombone', 3, 8),
(29, 'Trompetten', 3, 4),
(30, 'Versterkers', 2, 6),
(31, 'Violen', 5, 1),
(32, 'Vleugels', 1, 5),
(33, 'Accesoires voor Blaasinstrumenten', 3, 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `maincategory`
--

CREATE TABLE `maincategory` (
  `MainCategoryID` int(3) NOT NULL,
  `CategoryName` varchar(35) NOT NULL,
  `CategoryOrder` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `maincategory`
--

INSERT INTO `maincategory` (`MainCategoryID`, `CategoryName`, `CategoryOrder`) VALUES
(1, 'Toetsinstrumenten', 1),
(2, 'Tokkelinstrumenten', 2),
(3, 'Blaasinstrumenten', 3),
(4, 'Slaginstrumenten', 4),
(5, 'Strijkinstrumenten', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `ProductNumber` int(11) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Description` longtext,
  `Category` varchar(15) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Picture_Big` varchar(1024) DEFAULT NULL,
  `Picture_Small` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_related_product`
--

CREATE TABLE `product_related_product` (
  `ProductNumber` int(11) DEFAULT NULL,
  `ProductNumber_Related_Product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(15) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `Prefix` varchar(15) DEFAULT NULL,
  `Surname` varchar(100) NOT NULL,
  `Address` varchar(125) NOT NULL,
  `HouseNumber` int(11) NOT NULL,
  `ZipCode` varchar(6) NOT NULL,
  `City` varchar(125) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `E-Mail` varchar(50) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Avatar` varchar(15) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `UserName`, `FirstName`, `Prefix`, `Surname`, `Address`, `HouseNumber`, `ZipCode`, `City`, `PhoneNumber`, `E-Mail`, `Gender`, `Avatar`, `Password`, `Deleted`) VALUES
(1, 'janwil', 'Jan Willem', '', 'Lenting', 'Spaaksingel', 30, '6716KG', 'EDE', '06-123456', 'tuneshop@janwil.nl', 'M', 'janwil.png', '$2y$10$nkXLfvvEwsX5y/YoYOJcVeM7Tc3y/KD9ExrIqGYgGpmXrpIyOroZe', 0),
(2, 'lotus', 'Lotus', 'ter', 'Haar', 'Straatnaam', 123, '1234AA', 'PLAATS', '06-1234567', 'lotus.ter.haar@gmail.com', 'F', '', '$2y$10$Ygs4c9mUXO.yWB5h1h2cNev7G1KHKMfNQDHwHL2qMWTUofZmtu00K', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`),
  ADD UNIQUE KEY `CategorieID` (`CategoryID`),
  ADD KEY `CategorieID_2` (`CategoryID`);

--
-- Indexen voor tabel `maincategory`
--
ALTER TABLE `maincategory`
  ADD UNIQUE KEY `MainCategoryID` (`MainCategoryID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
