-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2021 pada 05.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'aris', '$2y$10$SOgYvDQg71VnFrNcOyWMyuAryNgfGEWvpIabkP3aaNAdhmsi0k86.'),
(5, 'admin', '$2y$10$YlpSk7QqX1rpQ1LYKbt3rOuCNJjzUzRWlJsGj7.54caddCdzJFvxO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `operasional` varchar(20) NOT NULL,
  `htm` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `alamat`, `operasional`, `htm`, `deskripsi`, `gambar`) VALUES
(1, 'Kampung Warna Wani Jodipan Malang', 'Jodipan Blimbing Kota Malang', '07.00 - 18.00 WIB', '10.000', 'Kampung Warna Wani Jodipan Malang adalah', 'kampungwarnawarni.jpg'),
(2, 'Malang Night Paradise', ' Jl. Graha Kencana Raya', '17.45 - 23.00 WIB', '35.000', 'Malang Night Paradise adalah', 'malangnightparadise.jpg'),
(3, 'Coban rais', 'Jl Lingkar Barat 8', '07.00 - 15.00 WIB', '35.000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s', 'cobanrais.jpg'),
(4, 'Jawa Timur Park 3', 'Jl. Batu', '12.00 - 21.00 WIB', '75.000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'jtp3.jpg'),
(5, 'Hawai Waterpark', 'Jl. Arah Singosari', '09.00 - 16.30 WIB', '35.000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'hawai.jpg'),
(6, 'Taman Wisata Wendit', 'Desa Mangliawan Kec Pakis Kabupaten Malang', '07.00 - 17.00 WIB', '35.000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever sinc&quot;e the 1500s', 'wendit.jpg'),
(7, 'Alun-alun Malang', 'Jl Merdeka', '24 Jam', 'Gratis', 'asd', 'alunalunmalang.jpg'),
(8, 'Coban Putri', 'Batu', '09.00 - 17.00 WIB', '35.000', 'asd', 'cobanputri.jpg'),
(9, 'Museum Brawijaya', 'Jl Ijen', '08.00 - 15.00 WIB', '5.000', 'asd', 'museumbrawijaya.jpg'),
(10, 'Kampung heritage Kajoetangaan', 'Kayutangaan', '07.00 - 17.00 WIBB', '10.000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'kampungheritage.jpg'),
(21, 'asd', 'asd', 'asd', 'asd', 'asd', '1.jpg'),
(23, 'asd', 'asd', 'asd', 'asd', 'asd', '5f6fdafc859f1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
