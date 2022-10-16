-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2022 pada 11.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tipsntrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipsntrik`
--

CREATE TABLE `tipsntrik` (
  `id` int(11) NOT NULL,
  `tanggal_upload` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipsntrik`
--

INSERT INTO `tipsntrik` (`id`, `tanggal_upload`, `judul`, `deskripsi`) VALUES
(1, '2022-09-28', 'Tips & Trik Mencari Beasiswa yang Sesuai', 'Layaknya mencari pasangan yang sesuai, mencari beasiswa juga tidak boleh sembarangan. Semua mahasiswa mempunyai kesempatan untuk mendapatkan beasiswa, tetapi tidak semuanya berhak mendapatkan beasiswa. Kenapa? karena mungkin saja beasiswanya tidak sesuai dengan kualifikasi diri. Mencocokkan kualifikasi diri dengan beasiswa yang tersedia bisa memperbesar peluang untuk mendapatkan beasiswa lho. Kalian bisa menemukan beasiswa yang sesuai dengan kebutuhan dan kulifikasi dengan cara mencari infromasi beasiswa yang sesuai di Vokaship.id ini. Berikut tips & trik untuk mencari beasiswa yang sesuai dengan kualifikasi diri masing-masing:\r\n\r\n1. Kenali kualifikasi diri dan identifikasi kebutuhan dalam mencari beasiswa\r\nApa motivasimu dalam mencari beasiswa? Apa kuliafikasi yang kamu punya untuk bisa mendapatkan beasiswa? Apa yang ingin kamu lakukan jika kamu nanti berhasil mendapatkan beasiswa itu? Jika semua telah diidentifikasi dan dikualifikasikan mengenai kebutuhan kamu untuk mendapatkan beasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tipsntrik`
--
ALTER TABLE `tipsntrik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tipsntrik`
--
ALTER TABLE `tipsntrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
