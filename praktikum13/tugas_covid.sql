-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mei 2020 pada 18.51
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `covid`
--

CREATE TABLE `covid` (
  `id` int(5) NOT NULL,
  `country` varchar(50) NOT NULL,
  `total case` int(10) NOT NULL,
  `new case` int(10) NOT NULL,
  `total death` int(10) NOT NULL,
  `new death` int(10) NOT NULL,
  `total recovered` int(10) NOT NULL,
  `active case` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `covid`
--

INSERT INTO `covid` (`id`, `country`, `total case`, `new case`, `total death`, `new death`, `total recovered`, `active case`) VALUES
(1, 'USA', 1029878, 19522, 58640, 1843, 140138, 831100),
(2, 'Spain', 232128, 2706, 23822, 301, 123903, 84403),
(3, 'Italy', 201505, 2091, 27359, 382, 68941, 105205),
(4, 'France', 165911, 2638, 23660, 367, 46886, 95365),
(5, 'UK', 161145, 3996, 21678, 586, 0, 139123),
(6, 'Germany', 159431, 673, 6215, 89, 117400, 35816),
(7, 'Turkey', 114653, 2392, 2992, 92, 38809, 72852),
(8, 'Russia', 93558, 6411, 867, 73, 8456, 84235),
(9, 'Iran', 92584, 1112, 5877, 71, 72439, 14268),
(10, 'China', 82836, 6, 4633, 0, 77555, 648);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
