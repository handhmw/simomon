-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2017 at 07:47 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(10) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `date_log` varchar(25) NOT NULL,
  `hour_log` varchar(25) NOT NULL,
  `status_log` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `device_id`, `date_log`, `hour_log`, `status_log`) VALUES
(1, '0', '09 Jun 2017', '06', 0),
(2, '1', '09 Jun 2017', '06', 0),
(3, '3', '09 Jun 2017', '06', 0),
(4, '0', '13 Jul 2017', '15', 0),
(5, '0', '14 Jul 2017', '23', 0),
(6, '1', '14 Jul 2017', '13', 0),
(7, '3', '14 Jul 2017', '13', 0),
(8, '0', '15 Jul 2017', '06', 0),
(9, '1', '15 Jul 2017', '07', 0),
(10, '3', '15 Jul 2017', '00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `device_id` int(5) NOT NULL,
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

INSERT INTO `tb_device` (`device_id`, `device_name`, `device_os`, `device_ip`, `device_subnet`, `device_mac`, `device_location`, `device_status`) VALUES
(0, 'iphone', 'iOS', '192.168.43.23', '255.255.255.255', '00:00:44:77', 'Kamar 12', 'Request timed out'),
(1, 'Xiaomi', 'Android', '192.168.2.2', '255.255.255.255', '00:11:00:22:11', 'Lab Komputer 2', 'Connected'),
(2, 'localhost', 'Linux', '127.0.0.1', '255.255.255.255', '00:22:11:22', 'Kamar 23', 'Connected'),
(3, 'Google DNS', 'other', '8.8.8.8', '255.255.255.255', '12:23:44:56:65', 'Jakarta', 'Connected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` smallint(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` char(32) NOT NULL,
  `user_level` enum('admin','subadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_email`, `username`, `password`, `user_level`) VALUES
(1, 'handri', 'handrihermawan404@gmail.com', 'handri', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'hermawan', 'handrihermawan505@gmail.com', 'hermawan', '123', 'subadmin'),
(5, 'r', 'r', '', '', 'admin'),
(6, 't', 'g', '', '', 'admin');

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
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
