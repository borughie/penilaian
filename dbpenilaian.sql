-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2023 pada 15.55
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
-- Struktur dari tabel `tbguru`
--

CREATE TABLE `tbguru` (
  `idguru` int(11) NOT NULL,
  `nip` varchar(24) NOT NULL,
  `namaguru` varchar(50) NOT NULL,
  `walijurusan` varchar(50) NOT NULL,
  `walikelas` varchar(12) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nohpguru` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `idjurusan` int(11) NOT NULL,
  `namajurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbjurusan`
--

INSERT INTO `tbjurusan` (`idjurusan`, `namajurusan`) VALUES
(1, 'Akuntansi dan Keuangan Lembaga'),
(2, 'Manajemen Perkantoran dan Layanan Bisnis'),
(3, 'Pemasaran'),
(4, 'Usaha Layanan Pariwisata'),
(5, 'Perhotelan'),
(6, 'Kuliner'),
(7, 'Seni dan Ekonomi Kreatif Busana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkelas`
--

CREATE TABLE `tbkelas` (
  `idkelas` int(11) NOT NULL,
  `namakelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbkelas`
--

INSERT INTO `tbkelas` (`idkelas`, `namakelas`) VALUES
(1, 'X'),
(2, 'X-A'),
(3, 'X-B'),
(4, 'XI'),
(5, 'XI-A'),
(6, 'XI-B'),
(7, 'XII'),
(8, 'XII-A'),
(9, 'XII-B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblaporan`
--

CREATE TABLE `tblaporan` (
  `idlaporan` int(11) NOT NULL,
  `pembuatlaporan` varchar(50) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `namapelanggaran` varchar(50) NOT NULL,
  `penguranganpoint` int(3) NOT NULL,
  `tglkejadian` date NOT NULL,
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
  `point` varchar(3) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpelanggaran`
--

INSERT INTO `tbpelanggaran` (`idpelanggaran`, `namapelanggaran`, `point`, `deskripsi`) VALUES
(11, 'Rok Pendek', '10', ''),
(13, 'Celana Pensil', '15', ''),
(14, 'Rambut Panjang', '6', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `idsiswa` int(11) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `point` int(3) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `jksiswa` varchar(11) NOT NULL,
  `fotosiswa` varchar(120) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(12) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nohpsiswa` varchar(15) NOT NULL,
  `nohporangtua` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `ni` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tipe` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `ni`, `nama`, `password`, `tipe`) VALUES
(1, '9952998835', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bimbingan Konseling');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbguru`
--
ALTER TABLE `tbguru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indeks untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indeks untuk tabel `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`idkelas`);

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
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbguru`
--
ALTER TABLE `tbguru`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbkelas`
--
ALTER TABLE `tbkelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tblaporan`
--
ALTER TABLE `tblaporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbpelanggaran`
--
ALTER TABLE `tbpelanggaran`
  MODIFY `idpelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
