-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2015 at 11:00 AM
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
  `NamaMataKuliah` varchar(100) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msheadermatakuliah`
--

INSERT INTO `msheadermatakuliah` (`ID_HeaderMataKuliah`, `NamaMataKuliah`, `nama_dosen`) VALUES
(1, 'Web Programming', 'Alexander Waworuntu'),
(2, 'Bahasa Indonesia', 'Ajeng Tina Mulyana'),
(3, 'Nasionalisme', 'Pater');

-- --------------------------------------------------------

--
-- Table structure for table `mspertemuan`
--

CREATE TABLE IF NOT EXISTS `mspertemuan` (
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `NamaMataKuliah` varchar(100) NOT NULL,
  `ID_Pertemuan` int(11) NOT NULL,
  `Topic` text NOT NULL,
  `Detail` text NOT NULL,
  `Tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mspertemuan`
--

INSERT INTO `mspertemuan` (`ID_HeaderMataKuliah`, `NamaMataKuliah`, `ID_Pertemuan`, `Topic`, `Detail`, `Tugas`) VALUES
(1, 'Web Programming', 1, 'HTML', 'oh', 'vjfu'),
(2, 'Bahasa Indonesia', 1, 'kg', 'oh', 'vjfu');

-- --------------------------------------------------------

--
-- Table structure for table `mspictureprofile`
--

CREATE TABLE IF NOT EXISTS `mspictureprofile` (
`id` int(11) NOT NULL,
  `judul_gambar` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`id`, `password`, `name`, `contact`, `email`, `status`) VALUES
(2012100000, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Admin', 'Admin', 'admin@kalbis.ac.id', 'Admin'),
(2012100001, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Alexander Waworuntu', 'Admin', 'admin@kalbis.ac.id', 'Lecture'),
(2012100002, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Tedi Lesmana', 'Admin', 'admin@kalbis.ac.id', 'Lecture'),
(2012100087, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Izhhar', 'Admin', 'admin@kalbis.ac.id', 'Student'),
(2012100109, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Faris', 'Admin', 'admin@kalbis.ac.id', 'Student'),
(2012100165, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Hanim', 'Admin', 'admin@kalbis.ac.id', 'Student'),
(2012100199, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Juwita', 'Admin', 'admin@kalbis.ac.id', 'Student'),
(2012100202, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Dyah', 'Admin', 'admin@kalbis.ac.id', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msheadermatakuliah`
--
ALTER TABLE `msheadermatakuliah`
 ADD PRIMARY KEY (`ID_HeaderMataKuliah`);

--
-- Indexes for table `mspertemuan`
--
ALTER TABLE `mspertemuan`
 ADD PRIMARY KEY (`ID_HeaderMataKuliah`);

--
-- Indexes for table `mspictureprofile`
--
ALTER TABLE `mspictureprofile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mspictureprofile`
--
ALTER TABLE `mspictureprofile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
