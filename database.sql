-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 01:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_orderfood`
--
CREATE DATABASE IF NOT EXISTS `db_orderfood` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_orderfood`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`, `email`, `date`) VALUES
(3, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'ad123@gmail.com', '2023-01-20 04:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `menu_id` int(11) NOT NULL,
  `resto_id` int(11) NOT NULL,
  `nama_menu` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`menu_id`, `resto_id`, `nama_menu`, `deskripsi`, `harga`, `img`) VALUES
(25, 12, 'Nasi ayam bakar', 'Nasi ayam bakar Nasi ayam bakar', 18000, 'nasi_ayam_bakar.png'),
(26, 13, 'Chiken katsu', 'Chiken katsu Chiken katsu', 20000, 'waroengsteak-15.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `resto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reskategori`
--

CREATE TABLE `tb_reskategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_reskategori`
--

INSERT INTO `tb_reskategori` (`kategori_id`, `kategori_nama`) VALUES
(8, 'see food'),
(9, 'Masakan Padang'),
(10, 'Steak'),
(11, 'Japanese foods');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restoran`
--

CREATE TABLE `tb_restoran` (
  `resto_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_resto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `open_hr` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `close_hr` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `open_days` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_restoran`
--

INSERT INTO `tb_restoran` (`resto_id`, `kategori_id`, `nama_resto`, `email`, `phone`, `url`, `open_hr`, `close_hr`, `open_days`, `alamat`, `img`) VALUES
(12, 9, 'Rumah Makan Begadang', 'Begadang@gmail.com', '07218779000', 'begadang.com', '8am', '10pm', 'setiap hari', 'Tj. Karang Barat, Kota Bandar Lampung', 'begadang2.jpg'),
(13, 10, 'Waroeng Steak', 'waroengstk@gmail.com', '072188700000', 'waroengsteak.com', '10am', '5pm', 'senin-sabtu', 'Jl. ZA. Pagar Alam No.59', 'warung_steak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `no_hp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `username`, `nama_user`, `email`, `no_hp`, `password`, `alamat`) VALUES
(35, 'alziputra', 'Alzi Rahmana', 'alziputra@gmail.com', '6282182568879', '$2y$10$W9SJYWKiKKLSPLxXOM.NGeQQSWuF5uGXwqLzZ5Q2e8oW1w8IE2aMC', 'swadaya xb no2A'),
(37, 'AryaPandu', 'Arya Pandu', 'aryapandu@gmail.com', '628218256886', '$2y$10$gJ48ujgiPC/UlE/S1guweeOREtgTGUgilw7.Ohyz9/RmDIpTuamjW', 'Kedaton, Bandar Lampung'),
(38, 'gugunwahyudi', 'Gugun Wahyudi', 'gugunwahyudi@gmail.com', '628222667788', '$2y$10$Z9OataJy5SbL99CabcMuGOkEO5OHpsELhH5ZZlO6ICwAc4RI8u0eW', 'Radar Lampung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_reskategori`
--
ALTER TABLE `tb_reskategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  ADD PRIMARY KEY (`resto_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_reskategori`
--
ALTER TABLE `tb_reskategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  MODIFY `resto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
