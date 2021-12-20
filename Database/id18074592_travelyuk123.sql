-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2021 at 08:09 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18074592_travelyuk123`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id_flight` int(11) NOT NULL,
  `from_flight` varchar(30) NOT NULL,
  `to_flight` varchar(30) NOT NULL,
  `fromtime_flight` varchar(30) NOT NULL,
  `totime_flight` varchar(30) NOT NULL,
  `class_flight` varchar(30) NOT NULL,
  `price_flight` varchar(30) NOT NULL,
  `name_flight` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id_flight`, `from_flight`, `to_flight`, `fromtime_flight`, `totime_flight`, `class_flight`, `price_flight`, `name_flight`, `status`) VALUES
(7, 'Yogyakarta', 'Makassar', '2021-12-10', '2021-12-10', 'Bisnis', '2000000', 'batikair', 1),
(8, 'Jakarta', 'Surabaya', '2021-12-10', '2021-12-10', 'Ekonomi', '2500000', 'Garuda', 1),
(9, 'Denpasar', 'Medan', '2021/12/10', '2021/12/10', 'Economic', '1200000', 'Garuda', 1),
(10, 'Palembang', 'Pontianak', '2021-12-10', '2021-12-10', 'Ekonomi', '900000', 'Batikair', 1),
(11, 'Tokyo', 'Jakarta', '2021-12-22', '2021-12-23', 'Ekonomi', '100000', 'Batikair', 2),
(12, 'Maluku', 'Manado', '2022-12-22', '2022-12-23', 'Ekonomi', '10946494', 'Garuda', 2),
(13, 'Manado', 'Jayapura', '2021-12-10', '2021-12-10', 'Ekonomi', '1000000', 'Batikair', 1),
(14, 'Medan', 'Yogya', '2021-12-10', '2021-12-11', 'Ekonomi', '1000000', 'Batikair', 2),
(15, 'Yogyakarta', 'Makassar', '2021-12-12', '2021-12-13', 'Ekonomi', '10000000', 'Batikair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `firstname_order` varchar(30) NOT NULL,
  `lastname_order` varchar(30) NOT NULL,
  `address_order` varchar(50) NOT NULL,
  `email_order` varchar(30) NOT NULL,
  `phonenumber_order` varchar(30) NOT NULL,
  `fromflight_order` varchar(30) NOT NULL,
  `toflight_order` varchar(30) NOT NULL,
  `fromflighttime_order` varchar(30) NOT NULL,
  `toflighttime_order` varchar(30) NOT NULL,
  `nameflight_order` varchar(30) NOT NULL,
  `iduser_order` varchar(30) NOT NULL,
  `price_order` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `firstname_order`, `lastname_order`, `address_order`, `email_order`, `phonenumber_order`, `fromflight_order`, `toflight_order`, `fromflighttime_order`, `toflighttime_order`, `nameflight_order`, `iduser_order`, `price_order`) VALUES
(41, 'Medan', 'Jakarta', 'Medan', 'medan@gmail.com', '08513181018104', 'Yogyakarta', 'Bandung', '2021-11-22', '2021-11-23', 'Batikair', '45', '750000'),
(55, 'boy', 'ferton', '', 'boyferton07@gmail.com', '088776561889712', 'Manado', 'Jayapura', '2021-12-10', '2021-12-10', 'Batikair', '46', '1000000'),
(56, 'boy', 'ferton', '', 'boyferton@gmail.com', '0877167821', 'Malang', 'Jakarta', '2021-12-10', '2021-12-10', 'KAI', '46', '450000'),
(57, 'alfred', 'massora', '', 'alfredmassora41@gmail.com', '085156177972', 'Yogyakarta', 'Makassar', '2021-12-10', '2021-12-10', 'batikair', '50', '2000000'),
(58, 'alfred', 'massora', '', 'alfredmassora41@gmail.com', '085156177972', 'Yogyakarta', 'Makassar', '2021-12-10', '2021-12-10', 'batikair', '50', '2000000'),
(59, 'alfred', 'massora', '', 'alfredmassora41@gmail.com', '085156177972', 'Yogyakarta', 'Makassar', '2021-12-10', '2021-12-10', 'batikair', '50', '2000000'),
(60, 'Alfred', 'massora', '', 'alfredmassora41@gmail.com', '085156177972', 'Surakarta', 'Yogyakarta', '2021-12-10', '2021-12-10', 'KAI', '50', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id_train` int(11) NOT NULL,
  `from_train` varchar(30) NOT NULL,
  `to_train` varchar(30) NOT NULL,
  `fromtime_train` varchar(30) NOT NULL,
  `totime_train` varchar(30) NOT NULL,
  `class_train` varchar(30) NOT NULL,
  `price_train` varchar(30) NOT NULL,
  `name_train` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id_train`, `from_train`, `to_train`, `fromtime_train`, `totime_train`, `class_train`, `price_train`, `name_train`, `status`) VALUES
(1, 'Yogyakarta', 'Surabaya', '2021-12-10', '2021-12-10', 'Bisnis', '400000', 'KAI', 1),
(2, 'Surakarta', 'Yogyakarta', '2021-12-10', '2021-12-10', 'Bisnis', '120000', 'KAI', 1),
(3, 'Depok', 'Semarang', '2021-12-10', '2021-12-10', 'Ekonomi', '200000', 'KAI', 1),
(4, 'Yogyakarta', 'Surabaya', '2021-12-11', '2021-12-11', 'Ekonomi', '30000', 'SoloExpress', 2),
(5, 'Tugu', 'Yogyakarta', '2022-12-12', '2022-12-13', 'Bisnis', '1000000', 'JogjaExpress', 2),
(6, 'Malang', 'Jakarta', '2021-12-10', '2021-12-10', 'Bisnis', '450000', 'KAI', 1),
(7, 'Bekasi', 'Bandung', '2021-12-10', '2021-12-10', 'Ekonomi', '150000', 'KAI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `password_user` varchar(40) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `role_user` int(11) NOT NULL,
  `phonenumber_user` varchar(30) NOT NULL,
  `birthdate_user` varchar(30) NOT NULL,
  `image_user` longtext NOT NULL,
  `aktivasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `password_user`, `email_user`, `role_user`, `phonenumber_user`, `birthdate_user`, `image_user`, `aktivasi`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', 'x', 1, '085156177972', '12-10-2021', 'Foto-Profil-Facebook-300x187.png', 1),
(46, 'Boy', '202cb962ac59075b964b07152d234b70', 'boyferton07@gmail.com', 2, '08987898912', '11-11-2001', 'IMG_20211119_001406.jpg', 1),
(50, 'alfred', '202cb962ac59075b964b07152d234b70', 'fredjm00@gmail.com', 2, '085156177972', '10-07-2001', '2021_0126_08380400-01.jpeg', 1),
(51, 'yusuf', '5ec4210f9187fcb4a1ebdaa2062f2ab1', 'eriksusantobarakaroma@gmail.co', 2, '08114112046', '26091994', 'profile.jpeg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id_flight`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id_train`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id_flight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
