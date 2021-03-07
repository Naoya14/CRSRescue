-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 10:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crsrescue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_staffs`
--

CREATE TABLE `tb_staffs` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` int(11) NOT NULL,
  `position` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dateJoin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_staffs`
--

INSERT INTO `tb_staffs` (`username`, `password`, `name`, `phone`, `position`, `dateJoin`) VALUES
('Putibiran', 'puti123', 'Puti Lenggo', 1128334743, 'Manager', '2021-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_volunteers`
--

CREATE TABLE `tb_volunteers` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` int(11) NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_staffs`
--
ALTER TABLE `tb_staffs`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_volunteers`
--
ALTER TABLE `tb_volunteers`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
