-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2019 at 10:23 PM
-- Server version: 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.1.26-1+0~20190113101810.12+stretch~1.gbp7077bb

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
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `CategoryName` varchar(35) NOT NULL,
  `MainCategoryID` int(3) NOT NULL,
  `CategoryOrder` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`CategoryName`, `MainCategoryID`, `CategoryOrder`) VALUES
('Accesoires voor Blaasinstrumenten', 3, 9),
('Accesoires voor Drums en Percussie', 4, 4),
('Accesoires voor Gitaar en Bas', 2, 7),
('Accesoires voor Piano\'s', 1, 9),
('Accesoires voor Strijkinstrumenten', 5, 4),
('Accordeons', 1, 8),
('Akoustische Drums', 4, 1),
('Akoustische Gitaren', 2, 2),
('Basgitaren', 2, 4),
('Blokfluiten', 3, 2),
('Cello\'s', 5, 2),
('Contrabassen', 5, 3),
('Digitale Drums', 4, 3),
('Digitale Piano\'s', 1, 3),
('Dwarsfluiten', 3, 3),
('Elektrische Gitaren', 2, 1),
('Elektronische Orgels', 1, 7),
('Keyboards', 1, 4),
('Klarinetten', 3, 6),
('Klassieke Gitaren', 2, 3),
('Mondharmonica\'s', 3, 1),
('Percussie', 4, 2),
('Piano\'s', 1, 1),
('Piccolo\'s', 3, 5),
('Saxofoon\'s', 3, 7),
('Stage Piano\'s', 1, 2),
('Synthesizers', 1, 6),
('Traditionele Snaainstrumenten', 2, 5),
('Trombone', 3, 8),
('Trompetten', 3, 4),
('Versterkers', 2, 6),
('Violen', 5, 1),
('Vleugels', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `MainCategory`
--

CREATE TABLE `MainCategory` (
  `MainCategoryID` int(3) NOT NULL,
  `CategoryName` varchar(35) NOT NULL,
  `CategoryOrder` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MainCategory`
--

INSERT INTO `MainCategory` (`MainCategoryID`, `CategoryName`, `CategoryOrder`) VALUES
(1, 'Toetsinstrumenten', 1),
(2, 'Tokkelinstrumenten', 2),
(3, 'Blaasinstrumenten', 3),
(4, 'Slaginstrumenten', 4),
(5, 'Strijkinstrumenten', 5),
(6, 'Drums and Percussion', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ProductNumber` int(11) DEFAULT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Description` longtext,
  `Category` varchar(15) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Picture_Big` varchar(1024) DEFAULT NULL,
  `Pictue_Small` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Product_Related_Product`
--

CREATE TABLE `Product_Related_Product` (
  `ProductNumber` int(11) DEFAULT NULL,
  `ProductNumber_Related_Product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(15) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Adres` varchar(125) DEFAULT NULL,
  `HouseNumber` int(11) DEFAULT NULL,
  `ZipCode` varchar(6) DEFAULT NULL,
  `City` varchar(125) DEFAULT NULL,
  `E-Mail` varchar(50) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Avatar` varchar(15) NOT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `UserName`, `FullName`, `Adres`, `HouseNumber`, `ZipCode`, `City`, `E-Mail`, `Gender`, `Avatar`, `Password`, `Deleted`) VALUES
(1, 'janwil', 'Jan Willem Lenting', 'Spaaksingel', 30, '6716KG', 'EDE', 'tuneshop@janwil.nl', 'M', 'janwil.png', '$2y$10$rM0yWRSGfxVXT6cOHO2OS.ScnB8zpMcy/g0PS8gYNE2VKYyNScxmy', 0),
(2, 'lotus', 'Lotus ter Haar', 'Straatnaam', 123, '1234AA', 'PLAATS', NULL, 'F', '', '$2y$10$v3GK9i6TDBLHzWIzNlkrROYSLgRYr4Oy9mAmCuKqP/mDKnnTnju4u', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`CategoryName`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `MainCategory`
--
ALTER TABLE `MainCategory`
  ADD UNIQUE KEY `MainCategoryID` (`MainCategoryID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
