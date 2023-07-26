-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 18 Jul 2023 pada 13.45
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
-- Database: `db_bank_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_user`
--

DROP TABLE IF EXISTS `tbl_detail_user`;
CREATE TABLE IF NOT EXISTS `tbl_detail_user` (
  `id_detail` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `no_hp` int(13) NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_sampah`
--

DROP TABLE IF EXISTS `tbl_jenis_sampah`;
CREATE TABLE IF NOT EXISTS `tbl_jenis_sampah` (
  `id_sampah` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL,
  PRIMARY KEY (`id_sampah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mutasi`
--

DROP TABLE IF EXISTS `tbl_mutasi`;
CREATE TABLE IF NOT EXISTS `tbl_mutasi` (
  `id_mutasi` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `jenis_sampah` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `qty` double NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` int(2) NOT NULL,
  `status` enum('Y','P','N') NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
