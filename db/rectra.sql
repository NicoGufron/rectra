-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 19.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `Id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Pelamar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`Id`, `username`, `password`, `nama`, `nik`, `email`, `hak_akses`) VALUES
(2, 'admin1', 'admin', 'Leonardus', '202010001', 'leonardus@', 'Admin'),
(3, 'ahmad', 'pelamar', 'Ahmad Subajri', '202050001', 'ahmad@', 'Pelamar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data-interview`
--

CREATE TABLE `data-interview` (
  `Id` int(11) NOT NULL,
  `nama_interview` varchar(50) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl_interview` date NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data-interview`
--

INSERT INTO `data-interview` (`Id`, `nama_interview`, `nama_pelamar`, `posisi`, `tgl_interview`, `catatan`, `status`) VALUES
(1, 'Nita', 'Ahmad Subajri', 'Data Analist', '2024-05-09', 'Ngomongnya bagus! punya banya pengalaman.', 'Not Yet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data-master`
--

CREATE TABLE `data-master` (
  `Id` int(25) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `usia` int(25) NOT NULL,
  `nomor_telepon` int(25) NOT NULL,
  `email_pelamar` varchar(50) NOT NULL,
  `berkas` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data-master`
--

INSERT INTO `data-master` (`Id`, `nama_pelamar`, `posisi`, `perusahaan`, `alamat`, `tgl_lahir`, `pendidikan`, `usia`, `nomor_telepon`, `email_pelamar`, `berkas`, `status`) VALUES
(1, 'Ahmad Subajri', 'Data Analist', 'PT.Nusa Mandiri', 'Jakarta Barat', '1997-05-15', 'S1', 26, 831238123, 'ahmad@', 'CV.Ahmad Subajri.pdf', 'Not Yet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `Id` int(25) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `usia` int(15) NOT NULL,
  `nomor_telepon` int(25) NOT NULL,
  `nama_interview` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `hasil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`Id`, `perusahaan`, `nama_pelamar`, `posisi`, `alamat`, `pendidikan`, `usia`, `nomor_telepon`, `nama_interview`, `catatan`, `hasil`) VALUES
(1, 'PT.Nusa Mandiri', 'Ahmad Subajri', 'Data Analist', 'Jakarta Barat', 'S1', 26, 831238123, 'Nita', 'Ngomongnya bagus! Banyak pengalaman', 'Qualified'),
(4, 'PT.Nusa Mandiri', 'Herman Santoso', 'Web Developer', 'Jakarta Barat', 'S1', 27, 852645376, 'Nita', 'Banyak pengalaman dibanyak perusahaan seperti di Tokopedia', 'Qualified');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `data-interview`
--
ALTER TABLE `data-interview`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `data-master`
--
ALTER TABLE `data-master`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data-interview`
--
ALTER TABLE `data-interview`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data-master`
--
ALTER TABLE `data-master`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
