-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 07:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL,
  `empId` varchar(20) NOT NULL,
  `tmplval` text NOT NULL,
  `serialNumber` varchar(50) NOT NULL,
  `imageHeight` varchar(10) NOT NULL,
  `imageWidth` varchar(10) NOT NULL,
  `imageDPI` varchar(500) NOT NULL,
  `nFIQ` varbinary(10) NOT NULL,
  `templateBase64` text NOT NULL,
  `isoImgBase64` text NOT NULL,
  `sessionKey` varchar(250) NOT NULL,
  `encryptedPidXml` text NOT NULL,
  `encryptedHmac` varchar(250) NOT NULL,
  `clientIP` varchar(50) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `fdc` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `login_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `role`, `name`, `email_id`, `password`) VALUES
(1, 'Admin', 'Admin', 'swamy.vitasoft@gmail.com', '$2y$10$XKvXVoKSSxRnmD1VNMsbgOC8eeCtfBoHLsFj0cj5i21IzcpESylk6');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `empId` varchar(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `aadhar_radio` varchar(5) NOT NULL,
  `aadhar` text NOT NULL,
  `relieving_radio` varchar(5) NOT NULL,
  `relieving` text NOT NULL,
  `payslip_radio` varchar(5) NOT NULL,
  `payslip` text NOT NULL,
  `identitycard_radio` varchar(5) NOT NULL,
  `identitycard` text NOT NULL,
  `pensionorder_radio` varchar(5) NOT NULL,
  `pensionorder` text NOT NULL,
  `esipf_radio` varchar(5) NOT NULL,
  `esipf` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `login_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
