-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2022 pada 08.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga_p2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`nik`, `password`) VALUES
('1111111111111111', 'inipassword12345'),
('1234567890123456', 'inipassword12345'),
('2222222222222222', 'inipassword12345'),
('3333333333333333', 'inipassword12345'),
('3454444444444444', 'inipassword12345'),
('4444444444444444', 'inipassword12345'),
('5555555555555555', 'inipassword12345'),
('6666666666666666', 'inipassword12345'),
('7777777777777777', 'inipassword12345'),
('8888888888888888', 'inipassword12345'),
('9999999999999999', 'inipassword12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nik` varchar(16) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nik`, `platform`, `time`, `ip`) VALUES
('1111111111111111', '', 1661141926, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661142292, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661142854, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661148474, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661300164, '0.0.0.0'),
('2222222222222222', 'Android', 1661300499, '0.0.0.0'),
('2222222222222222', 'Windows 7', 1661312147, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661314229, '0.0.0.0'),
('3454444444444444', 'Windows 7', 1661314568, '0.0.0.0'),
('2222222222222222', 'Windows 7', 1661315321, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661315787, '0.0.0.0'),
('2222222222222222', 'Windows 7', 1661316651, '0.0.0.0'),
('3454444444444444', 'Windows 7', 1661316722, '0.0.0.0'),
('4444444444444444', 'Windows 7', 1661316772, '0.0.0.0'),
('1111111111111111', 'Windows 7', 1661317779, '0.0.0.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `nik` varchar(16) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `riwayat_pelatihan` text,
  `sertifikat_dimiliki` text,
  `riwayat_project` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`nik`, `bidang_keahlian`, `riwayat_pelatihan`, `sertifikat_dimiliki`, `riwayat_project`) VALUES
('1111111111111111', 'Teknik Kendaraan Ringan', 'DTS Kominfo 2022', '1661311260_b7cb07ecd1d5b43467d9.pdf', 'https://google.com'),
('2222222222222222', 'Teknik Sepeda Motor', '', '1661312260_464660703de823f7941e.pdf', ''),
('3454444444444444', 'Teknik Elektronika', 'Manusia Purba, Manusia Abadi,Mansia Kebal', '', ''),
('4444444444444444', 'Multimedia', 'Pelatihan 1, Pelatihan 2, Pelatihan 4867', '1661316843_0bea9bb2e849f0e567b1.pdf', ''),
('9999999999999999', 'mul', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `nik` varchar(16) NOT NULL,
  `posisi` enum('Admin','Ketua','Sekretariat','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `name` varchar(40) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `province` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `posisi` enum('Pendaftar','Anggota','Ketua','Sekretariat','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `nik`, `name`, `birth`, `address`, `province`, `email`, `posisi`) VALUES
('6302d18d9f039', '3333333333333333', 'Dony Tri Utomo', '1990-03-12', 'Jl. Jendral Soedirman No.323', 'Jawa Barat', 'randy.pamgalila@gmail.com', 'Anggota'),
('6302ea43ce94e', '4444444444444444', 'Bima Setiawan', '2005-04-28', 'Klumpit Kec. Karanggede Kab. Boyolali 57381', 'Jawa Barat', 'bima.setawan@gmail.com', 'Anggota'),
('63031d19a9504', '5555555555555555', 'Riskhi Aji Setiawan', '2003-06-01', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'riskhi.aji@gmail.com', 'Ketua'),
('63031decc1806', '6666666666666666', 'Niko Aji Saputra', '2005-11-12', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'niko.saputra@gmail.com', 'Anggota'),
('630570430c463', '8888888888888888', 'Tri Utomo', '2004-10-15', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'tri.utama@gmail.com', 'Anggota'),
('6305b2419f147', '9999999999999999', 'Mantap Jiwa', '2005-12-12', 'Jalan masnusai', 'Jawa Tengah', 'mantap.jiwa@gmail.com', 'Pendaftar'),
('admin', '1111111111111111', 'Muhammad Irfan', '2003-10-25', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'admin@gmail.com', 'Admin'),
('etrnkgldf', '1234567890123456', 'Dendi Ardyansa', '2003-10-25', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'dev.mirfans@gmail.com', 'Anggota'),
('sekretariat1', '2222222222222222', 'Rahmat Abdillah', '2003-02-12', 'Jl. Jendral Soedirman No.323', 'Jawa Barat', 'sekretariat1@gmail.com', 'Sekretariat'),
('ttertklnl43', '3454444444444444', 'Agung Fadillah', '2003-10-25', 'Klumpit Kec. Karanggede Kab. Boyolali', 'Jawa Tengah', 'dev.mirfan@gmail.com', 'Ketua');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`nik`);

--
-- Ketidakleluasaan untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`nik`);

--
-- Ketidakleluasaan untuk tabel `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`nik`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
