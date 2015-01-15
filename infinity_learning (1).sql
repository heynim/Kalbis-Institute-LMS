-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 05:31 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `mshari`
--

CREATE TABLE IF NOT EXISTS `mshari` (
  `ID_Hari` int(7) NOT NULL,
  `NamaHari` varchar(20) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_Hari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msheadermatakuliah`
--

CREATE TABLE IF NOT EXISTS `msheadermatakuliah` (
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `NamaMataKuliah` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_HeaderMataKuliah`)
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
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trdetailmatakuliah`
--

CREATE TABLE IF NOT EXISTS `trdetailmatakuliah` (
  `ID_DetailMataKuliah` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `ID_Pertemuan` int(10) NOT NULL,
  `Detail` int(255) NOT NULL,
  `Tugas` int(255) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_DetailMataKuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trjadwal`
--

CREATE TABLE IF NOT EXISTS `trjadwal` (
  `ID_Jadwal` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `ID_User` int(10) NOT NULL,
  `ID_Hari` int(7) NOT NULL,
  `ID_Ruangan` int(5) NOT NULL,
  `WaktuAwal` varchar(5) NOT NULL,
  `WaktuAkhir` varchar(5) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_Jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trkuliah`
--

CREATE TABLE IF NOT EXISTS `trkuliah` (
  `ID_Kuliah` int(10) NOT NULL,
  `ID_User` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID_Kuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
