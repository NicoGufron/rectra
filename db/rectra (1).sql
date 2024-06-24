-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 12:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rectra`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `Id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Pelamar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`Id`, `username`, `password`, `hak_akses`) VALUES
(2, 'admin1', 'admin', 'Admin'),
(3, 'ahmad', 'pelamar', 'Pelamar'),
(4, 'nicogufron', '12345', 'Pelamar'),
(5, 'kevin', '123', 'Pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id_interview` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `nama_interviewer` varchar(50) NOT NULL,
  `email_interviewer` varchar(100) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `tgl_interview` date NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id_interview`, `id_pelamar`, `nama_interviewer`, `email_interviewer`, `nama_pelamar`, `posisi`, `perusahaan`, `tgl_interview`, `catatan`, `status`) VALUES
(1, 1, 'Nita', 'nita@email.com', 'kevin', 'Mobile Developer', 'PT. Nusa Mandiri', '2024-06-25', 'kokokokoko', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `perusahaan`, `posisi`, `deskripsi`) VALUES
(1, 'PT. Nusa Mandiri', 'Mobile Developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec mauris eu lectus volutpat luctus. \r\n\r\nAenean vitae laoreet purus. Donec volutpat eu purus vel blandit. Nullam accumsan maximus est, eget laoreet massa varius sed. Sed consequat, diam et pellentesque condimentum, arcu orci pellentesque nunc, mollis egestas lorem ipsum ut felis. Curabitur mollis ipsum at nulla maximus tincidunt. \r\n\r\nMauris eleifend vehicula consequat. Donec iaculis sapien ac vestibulum consectetur.'),
(2, 'PT. Nusa Mandiri', 'Web Developer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec mauris eu lectus volutpat luctus. Aenean vitae laoreet purus. \r\n\r\nDonec volutpat eu purus vel blandit. Nullam accumsan maximus est, eget laoreet massa varius sed. Sed consequat, diam et pellentesque condimentum, arcu orci pellentesque nunc, mollis egestas lorem ipsum ut felis. \r\n\r\nCurabitur mollis ipsum at nulla maximus tincidunt. Mauris eleifend vehicula consequat. Donec iaculis sapien ac vestibulum consectetur.');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_pelamar` varchar(100) NOT NULL,
  `email_pelamar` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `usia` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `username`, `id_akun`, `nama_pelamar`, `email_pelamar`, `tgl_lahir`, `alamat`, `pendidikan`, `nomor_telepon`, `usia`, `id_job`, `posisi`, `perusahaan`, `berkas`) VALUES
(1, 'kevin', 5, 'kevin', 'mail', '2024-06-24', 'alamat', 'S1', '0890328910', 23, 2, 'Web Developer', 'PT. Nusa Mandiri', 'kevin-Web Developer.pdf'),
(2, 'kevin', 5, 'kevin', 'mail', '2024-06-24', 'alamat', 'S1', '0890328910', 23, 2, 'Web Developer', 'PT. Nusa Mandiri', 'kevin-Web Developer.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id_interview`),
  ADD KEY `id pelamar` (`id_pelamar`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id akun` (`id_akun`),
  ADD KEY `id job` (`id_job`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id_interview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `id pelamar` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `id akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`Id`),
  ADD CONSTRAINT `id job` FOREIGN KEY (`id_job`) REFERENCES `job` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
