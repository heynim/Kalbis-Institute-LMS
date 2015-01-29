-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jan 2015 pada 14.23
-- Versi Server: 5.6.21
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
-- Struktur dari tabel `msheadermatakuliah`
--

CREATE TABLE IF NOT EXISTS `msheadermatakuliah` (
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `NamaMataKuliah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msheadermatakuliah`
--

INSERT INTO `msheadermatakuliah` (`ID_HeaderMataKuliah`, `NamaMataKuliah`) VALUES
(1, 'pemrograman'),
(2, 'Cao');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mspertemuan`
--

CREATE TABLE IF NOT EXISTS `mspertemuan` (
  `ID_HeaderMataKuliah` int(11) NOT NULL,
  `ID_Pertemuan` int(11) NOT NULL,
  `Detail_Pertemuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mspertemuan`
--

INSERT INTO `mspertemuan` (`ID_HeaderMataKuliah`, `ID_Pertemuan`, `Detail_Pertemuan`) VALUES
(1, 1, 'Pert 1'),
(2, 2, 'Pertemuan 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msuser`
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
-- Dumping data untuk tabel `msuser`
--

INSERT INTO `msuser` (`id`, `password`, `name`, `contact`, `email`, `status`, `photo`) VALUES
(2012100000, '$2a$10$HaloHaloHaloHaloHalo2upbPyXhXN8JG/cw0EotQyApc3AJeTLFu', 'Admin', 'Admin', 'admin@kalbis.ac.id', 'Admin', ''),
(2012100087, '1', 'Izhhar', '088808593977', 'izardos@gmail.com', 'Mahasiswa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trdetailmatakuliah`
--

CREATE TABLE IF NOT EXISTS `trdetailmatakuliah` (
  `ID_HeaderMataKuliah` int(10) NOT NULL,
  `ID_Pertemuan` int(10) NOT NULL,
  `Detail` text NOT NULL,
  `Tugas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trdetailmatakuliah`
--

INSERT INTO `trdetailmatakuliah` (`ID_HeaderMataKuliah`, `ID_Pertemuan`, `Detail`, `Tugas`) VALUES
(1, 1, 'AAA', 0),
(1, 2, 'BBB', 2),
(2, 1, 'Pert 1', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trkuliah`
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
-- Indexes for table `mspertemuan`
--
ALTER TABLE `mspertemuan`
 ADD PRIMARY KEY (`ID_Pertemuan`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trkuliah`
--
ALTER TABLE `trkuliah`
 ADD PRIMARY KEY (`ID_Kuliah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
