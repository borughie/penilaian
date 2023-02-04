-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2023 pada 19.31
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblaporan`
--

CREATE TABLE `tblaporan` (
  `idlaporan` int(11) NOT NULL,
  `pembuatlaporan` varchar(50) NOT NULL,
  `nis` bigint(12) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `idpelanggaran` int(11) NOT NULL,
  `namapelanggaran` varchar(50) NOT NULL,
  `point` int(3) NOT NULL,
  `tgllaporan` date NOT NULL,
  `fotolaporan` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpelanggaran`
--

CREATE TABLE `tbpelanggaran` (
  `idpelanggaran` int(11) NOT NULL,
  `namapelanggaran` varchar(50) NOT NULL,
  `point` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpelanggaran`
--

INSERT INTO `tbpelanggaran` (`idpelanggaran`, `namapelanggaran`, `point`) VALUES
(11, 'Rok Pendek', '10'),
(13, 'Celana Pensil', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `nis` bigint(12) NOT NULL,
  `point` int(3) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `fotosiswa` varchar(120) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(12) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nohpsiswa` varchar(24) NOT NULL,
  `nohporangtua` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbsiswa`
--

INSERT INTO `tbsiswa` (`nis`, `point`, `namasiswa`, `fotosiswa`, `jurusan`, `kelas`, `alamat`, `nohpsiswa`, `nohporangtua`) VALUES
(9952998835, 100, 'Adi Gunawan', 'IMG_20200520_195427_782.jpg', 'Perhotelan', 'XI', 'Jl. Gajah Mada RT.04 No.29', '081254648357', '086547346421');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblaporan`
--
ALTER TABLE `tblaporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indeks untuk tabel `tbpelanggaran`
--
ALTER TABLE `tbpelanggaran`
  ADD PRIMARY KEY (`idpelanggaran`);

--
-- Indeks untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblaporan`
--
ALTER TABLE `tblaporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbpelanggaran`
--
ALTER TABLE `tbpelanggaran`
  MODIFY `idpelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
