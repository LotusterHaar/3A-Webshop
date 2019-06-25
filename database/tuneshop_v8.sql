-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Generation Time: Jun 25, 2019 at 07:30 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `user`
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
  `EMail` varchar(50) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Avatar` varchar(15) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Token` varchar(32) DEFAULT NULL,
  `RecoveryDate` varchar(123) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `UserName`, `FirstName`, `Prefix`, `Surname`, `Address`, `HouseNumber`, `ZipCode`, `City`, `PhoneNumber`, `EMail`, `Gender`, `Avatar`, `Password`, `Token`, `RecoveryDate`, `Deleted`) VALUES
(1, 'janwil', 'Jan Willem', '', 'Lenting', 'Spaaksingel', 30, '6716KG', 'EDE', '06-123456', 'tuneshop@janwil.nl', 'M', 'janwil.png', '$2y$10$nkXLfvvEwsX5y/YoYOJcVeM7Tc3y/KD9ExrIqGYgGpmXrpIyOroZe', NULL, NULL, 0),
(2, 'lotus', 'Lotus', 'ter', 'Haar', 'Straatnaam', 123, '1234AA', 'PLAATS', '06-1234567', 'lotus.ter.haar@gmail.com', 'F', '', '$2y$10$Ygs4c9mUXO.yWB5h1h2cNev7G1KHKMfNQDHwHL2qMWTUofZmtu00K', NULL, NULL, 0),
(3, 'lotuss', 'sdffsdsfdsdfjkkjlfsdsfd', NULL, 'sfsfddsf', 'aafafshjkhklh', 0, 'jklhjk', 'jklhjklhljkh', 'lkhjklh', 'sdfsfdsdffsd@aaadsds.asdads', 'M', 'lotuss', '$2y$10$8U6NttZSFcxofGKkbYykn.QMe36L/zxG72Xu8br93tH9oQ/Jts23e', NULL, NULL, 0),
(4, 'lotusss', 'Lotus', 'ter', 'Haar', 'Lotusstraat', 1234, '1234AA', 'Lotusbloem', '123-456789', 'lotus@terhaar.com', 'F', 'lotusss', '$2y$10$iPZPQ./BPyTM7ybIOB3u2eNwluFv1wrEd7hTpTF9GQcFlFcUer.iC', NULL, NULL, 0),
(5, 'lotussss', 'JW', NULL, 'Lenting', 'Spaaksingel 30', 0, '6716KG', 'Ede', '0640857459', 'pmc-emmen@janwil.nl', 'M', 'lotussss.png', '$2y$10$Vh.97n.A1.nyjCtBgcqeOuY/kgLnwB1L91TbyMGKUAC8mhLzIS7B6', NULL, NULL, 0),
(6, 'testjw', 'Jan', 'ter', 'Lenting', 'Spaaksingel 30', 0, '6716KG', 'Ede', '640857459', 'tuneshop2@janwil.nl', 'M', 'testjw.png', '$2y$10$n5GlqouSyF0XrzfXl7D9Fubj1Dk0YdK0pzn66ZhVKpjD2lPcpFNOm', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `EMail` (`EMail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
