-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 07:16 AM
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
  `id` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`id`, `password`, `name`, `contact`, `email`, `status`, `photo`) VALUES
(2012100000, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Admin', 'Admin', 'admin@kalbis.ac.id', 'Admin', ''),
(2012100087, '1', 'Izhhar', '088808593977', 'izardos@gmail.com', 'Mahasiswa', ''),
(2012100266, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Rio Pernandes', '0889898989', 'rip_richart@amien.com', 'Mahasiswa', '');

-- --------------------------------------------------------

--
-- Table structure for table `trdetailmatakuliah`
--

CREATE TABLE IF NOT EXISTS `trdetailmatakuliah` (
  `ID_DetailMataKuliah` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `ID_Pertemuan` int(10) NOT NULL,
  `Detail` int(255) NOT NULL,
  `Tugas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trkuliah`
--

CREATE TABLE IF NOT EXISTS `trkuliah` (
  `ID_Kuliah` int(10) NOT NULL,
  `ID_User` int(10) NOT NULL,
  `ID_HeaderMataKuliah` int(10) NOT NULL
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
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trdetailmatakuliah`
--
ALTER TABLE `trdetailmatakuliah`
 ADD PRIMARY KEY (`ID_DetailMataKuliah`);

--
-- Indexes for table `trkuliah`
--
ALTER TABLE `trkuliah`
 ADD PRIMARY KEY (`ID_Kuliah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
