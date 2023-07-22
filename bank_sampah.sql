-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 19 Jul 2023 pada 04.02
-- Versi server: 5.7.36
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(50) DEFAULT NULL,
  `umur` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat` text,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT 'anggota',
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `umur`, `jenis_kelamin`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'Yono', '24', 'laki-laki', 'Kupang Jawa timur', 'yono', 'yono', 'anggota'),
(2, 'obi', '21', 'L', 'Jalan jalan', 'obiaha', 'qweasdzxc', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sampah`
--

DROP TABLE IF EXISTS `jenis_sampah`;
CREATE TABLE IF NOT EXISTS `jenis_sampah` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_sampah` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sampah`
--

INSERT INTO `jenis_sampah` (`id_jenis`, `jenis_sampah`) VALUES
(1, 'Sampah Organik'),
(2, 'Sampah Anorganik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_sampah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `ket` text,
  `tabungan` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_sampah`, `tanggal`, `id_anggota`, `berat`, `total`, `ket`, `tabungan`) VALUES
(1, 1, '2019-07-25', 1, 20, 40000, '-', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_sampah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `petugas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

DROP TABLE IF EXISTS `sampah`;
CREATE TABLE IF NOT EXISTS `sampah` (
  `id_sampah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sampah` varchar(50) DEFAULT NULL,
  `id_jenis` int(3) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sampah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `nama_sampah`, `id_jenis`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'Sampah Botol Plastik', 1, 2000, 2500, 50),
(2, 'Sampah Kantong Plastik', 2, 1000, 1200, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

DROP TABLE IF EXISTS `tabungan`;
CREATE TABLE IF NOT EXISTS `tabungan` (
  `id_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `tabungan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tabungan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `id_user`, `tabungan`) VALUES
(1, 1, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto_user` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `email`, `foto_user`, `level`) VALUES
(4, 'Administrator', 'admin', 'admin', 'admin@gmail.com', 'user_1563899386.png', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
