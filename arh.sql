-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2020 pada 16.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arh`
--

CREATE TABLE `arh` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(6) DEFAULT NULL,
  `npk` int(6) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `pt` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tgl_lahir` varchar(25) DEFAULT NULL,
  `kode_arh` int(6) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arh`
--

INSERT INTO `arh` (`id`, `id_karyawan`, `npk`, `nama`, `regional`, `posisi`, `pt`, `address`, `tgl_lahir`, `kode_arh`, `photo`) VALUES
(1, 102990, 102990, 'ABDUL CHARIS AMAR F', 'Banjarmasin', 'East Regional Operation 1 ARH', 'SGP', 'KOMP. ASABRI - BANJARMASIN', '1965-10-17', 102990, 'ARH102990.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arh`
--
ALTER TABLE `arh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arh`
--
ALTER TABLE `arh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
