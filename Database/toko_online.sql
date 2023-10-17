-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 08:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin123', 'admin123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 2, 1),
(4, 2, 1, 1),
(22, 15, 2, 1),
(23, 16, 1, 1),
(24, 17, 1, 2),
(25, 17, 0, 6),
(26, 18, 14, 1),
(27, 19, 2, 1),
(28, 20, 2, 1),
(29, 20, 17, 1),
(30, 21, 18, 1),
(31, 22, 1, 1),
(32, 22, 15, 1),
(33, 22, 16, 1),
(34, 23, 1, 1),
(35, 24, 1, 1),
(36, 25, 1, 1),
(37, 26, 2, 1),
(38, 27, 14, 1),
(39, 28, 14, 1),
(40, 29, 14, 1),
(41, 31, 14, 1),
(42, 32, 2, 1),
(43, 33, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis_pembayaran`, `nama_pembayaran`) VALUES
(1, 'BCA'),
(2, 'BNI'),
(3, 'Ditempat');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Antiseptik dan Disinfektan'),
(2, 'Peralatan Bedah Umum dan Bedah \r\nPlastik'),
(3, 'Peralatan RS Umum dan Perorangan'),
(12, 'Peralatan Anestesi'),
(14, 'Peralatan Imunologi dan Mikrobiologi ');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `id_produk`, `nama_produk`, `jumlah`, `total_harga`) VALUES
(2, 5, 16, 'Ventilator', 2, 200000),
(3, 5, 14, 'Thermometer', 1, 35000),
(4, 5, 2, 'Hand Sanitizer', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_ongkir` varchar(255) NOT NULL,
  `tarif_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_ongkir`, `tarif_ongkir`) VALUES
(1, 'JNE', 7000),
(2, 'J&T', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `email`, `nomor_hp`, `alamat`) VALUES
(1, 'Cecil', 'yanuar', 'yanuar123', 'yanuar123@gmail.com', '08124335678', 'Puri Prima Sari A3/01 Tanggulangin, Sidoarjo'),
(2, 'Suisei', 'suisad456', 'suisad456', 'suisad456@gmail.com', '0859333256129', 'Jl. Pahlawan no.1, Surabaaya'),
(5, 'tes', 'tes', '$2y$10$zDzvXOUy5UaEO7rSrzGKXud.aiSaRg2KQ8dIK0sjxHK1CzPg1i1de', 'tes12233@gmail.com', '089566667777', 'tes'),
(6, 'asd', 'asd', '$2y$10$Z1Z62pW.R8kWL/8LKHIv0OlKGOh7aPOH6TsalwDxXSz.Eq1SKoNqS', 'asd@gmail.com', '083822334455', 'asd'),
(7, 'Fitroni', 'fitroni', '$2y$10$jgIyE0GyW746etozfWu7Juv79FWM1ddLER4dH3KDreFcznH3mHpFO', 'fitroni@gmail.com', '081243442480', 'Puri Prima Sari A3/01 Sidoarjo'),
(8, 'Yitroni', 'yitroni', '$2y$10$B1KdRZAen1oEtJWwm6GP9OwaYhQy2SubPIPXwVmim7di1J/Di1jkq', 'm.yanuar.f@gmail.com', '081243442480', 'Puri Prima Sari A3/01, Ketegan, Tanggulangin');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `id_jenis_pembayaran`, `id_ongkir`) VALUES
(1, 2, '2023-10-01', 35000, 1, 1),
(2, 1, '2023-10-03', 25000, 1, 1),
(16, 6, '2023-10-11', 22000, 1, 1),
(17, 6, '2023-10-11', 37000, 2, 1),
(18, 6, '2023-10-11', 42000, 1, 1),
(19, 6, '2023-10-11', 17000, 1, 1),
(20, 6, '2023-10-11', 88000, 2, 2),
(21, 7, '2023-10-17', 78000, 2, 2),
(22, 8, '2023-10-17', 172000, 1, 1),
(23, 8, '2023-10-17', 22000, 2, 1),
(24, 8, '2023-10-17', 23000, 2, 2),
(25, 8, '2023-10-17', 22000, 1, 1),
(26, 8, '2023-10-17', 18000, 2, 2),
(27, 8, '2023-10-17', 42000, 2, 1),
(28, 8, '2023-10-17', 42000, 2, 1),
(29, 8, '2023-10-17', 43000, 3, 2),
(30, 8, '2023-10-17', 43000, 3, 2),
(31, 8, '2023-10-17', 42000, 2, 1),
(32, 8, '2023-10-17', 18000, 2, 2),
(33, 8, '2023-10-17', 147000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`) VALUES
(1, 2, 'Masker N95', 15000, 'ini adalah masker untuk melindungi diri dari penyakit yang berasal dari udara', '65249ae1f3c98.jpg'),
(2, 1, 'Hand Sanitizer', 10000, 'Produk ini sangat berguna untuk membersihkan tangan dari kuman', '65249ad9d9337.jpg'),
(14, 3, 'Thermometer', 35000, 'Untuk mengukur suhu badan', '6524a0af8cd77.jpg'),
(15, 2, 'Sarung Tangan Steril', 50000, 'Agar tangan tetap steril saat melakukan operasi', '6524a11855633.jpg'),
(16, 12, 'Ventilator', 100000, 'Alat bantu pernapasan', '6524a1872204a.jpeg'),
(17, 2, 'APD medis', 70000, ' Alat Pelindung Diri untuk Mencegah Penyakit Infeksius pada Tenaga Medis', '6524a2200afe6.jpg'),
(18, 14, 'Alat tes COVID-19', 70000, 'Alat yang bisa mengetahui pasien tersebut kena covid atau tidak', '6524a282acd41.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
