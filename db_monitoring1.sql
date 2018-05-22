-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2017 at 09:10 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring1`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` smallint(5) NOT NULL,
  `device_id` smallint(5) NOT NULL,
  `user_id` smallint(5) NOT NULL,
  `date_log` varchar(15) NOT NULL,
  `hour_log` varchar(15) NOT NULL,
  `status_log` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `device_id`, `user_id`, `date_log`, `hour_log`, `status_log`) VALUES
(2, 1, 0, '09 Jun 2017', '06', 0),
(3, 3, 0, '09 Jun 2017', '06', 0),
(5, 1, 0, '18 Jul 2017', '22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `device_id` int(5) NOT NULL,
  `user_id` smallint(5) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_os` varchar(30) NOT NULL,
  `device_ip` varchar(15) NOT NULL,
  `device_subnet` varchar(15) NOT NULL,
  `device_mac` varchar(25) NOT NULL,
  `device_location` varchar(100) NOT NULL,
  `device_status` enum('Connected','Disconnected','Destination host unreachable','Destination net unreachable','Request timed out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`device_id`, `user_id`, `device_name`, `device_os`, `device_ip`, `device_subnet`, `device_mac`, `device_location`, `device_status`) VALUES
(1, 0, 'Xiaomi', 'Android', '192.168.2.2', '255.255.255.255', '00:11:00:22:11', 'Lab Komputer 2', 'Connected'),
(2, 0, 'localhost', 'Linux', '127.0.0.1', '255.255.255.255', '00:17:ab:ba:25', 'Kantor Kelurahan', 'Connected'),
(3, 0, 'Google DNS', 'Android', '8.8.8.8', '255.255.255.255', '32:fg:43:FD', 'dimana saja', 'Connected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` enum('admin','subadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_email`, `username`, `password`, `user_level`) VALUES
(0, 'handri', 'handrihermawan404@gmail.com', 'handri', 'd9b1d7db4cd6e70935368a1efb10e377', 'admin'),
(1, 'siapa hayoo', 'mail@mail.com', 'siapa', 'e1428459860f917413341826c87cc186', 'admin'),
(4, 'kamu', 'kamu@mail.com', 'kamu', '0def2ce58a357f04a796a887ac24319b', 'subadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
