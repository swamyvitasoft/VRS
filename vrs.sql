-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 01:56 PM
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
(1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$ibeMb5tteKXJDLjaC.wq1uP7UTqLgleNcLVwH94wEgoaQ8VESXNfu');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
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
  `thumb` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `login_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `fullname`, `fname`, `address`, `email`, `phone`, `aadhar_radio`, `aadhar`, `relieving_radio`, `relieving`, `payslip_radio`, `payslip`, `identitycard_radio`, `identitycard`, `pensionorder_radio`, `pensionorder`, `esipf_radio`, `esipf`, `thumb`, `status`, `login_id`, `created`, `updated`) VALUES
(4, 'Swamy', 'Srinu A', 'Karimnagar, 505001', 'swamy@gmail.com', '9490043228', 'Yes', 'uploads/9490043228/1681299431_ff5287a41b3927ac9a31.jpg', 'Yes', 'uploads/9490043228/1681299431_f282f17925af51e6a13c.png', 'Yes', 'uploads/9490043228/1681299431_6ef27be001f14e9bcb46.png', 'Yes', 'uploads/9490043228/1681299431_c204b8e9ca43fa855267.png', 'Yes', 'uploads/9490043228/1681299431_438aaafebe6c1cc6eac8.png', 'Yes', 'uploads/9490043228/1681299431_9e10738f8c331ee88670.jpg', 'thumb', 1, 1, '2023-04-12 17:07:11', '2023-04-12 11:37:11');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
