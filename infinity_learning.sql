-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 04:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infinity_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `msheadermatakuliah`
--

CREATE TABLE IF NOT EXISTS `msheadermatakuliah` (
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `NamaMataKuliah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `ID_User` int(10) NOT NULL,
  `Password` int(20) NOT NULL,
  `NamaUser` varchar(30) NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelepon` int(13) NOT NULL,
  `Email` text NOT NULL,
  `Level` int(6) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trdetailmatakuliah`
--

CREATE TABLE IF NOT EXISTS `trdetailmatakuliah` (
  `ID_DetailMataKuliah` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `Detail` text NOT NULL,
  `Tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msheadermatakuliah`
--
ALTER TABLE `msheadermatakuliah`
 ADD PRIMARY KEY (`ID_HeaderMataKuliah`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
 ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `trdetailmatakuliah`
--
ALTER TABLE `trdetailmatakuliah`
 ADD PRIMARY KEY (`ID_DetailMataKuliah`), ADD KEY `ID_HeaderMataKuliah` (`ID_HeaderMataKuliah`), ADD KEY `ID_HeaderMataKuliah_2` (`ID_HeaderMataKuliah`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trdetailmatakuliah`
--
ALTER TABLE `trdetailmatakuliah`
ADD CONSTRAINT `trdetailmatakuliah_ibfk_3` FOREIGN KEY (`ID_HeaderMataKuliah`) REFERENCES `msheadermatakuliah` (`ID_HeaderMataKuliah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
