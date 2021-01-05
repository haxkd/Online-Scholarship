-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 11:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin@admin.com', '0e7517141fb53f21ee439b355b5a1d0a');

-- --------------------------------------------------------

--
-- Table structure for table `scholar_doc`
--

CREATE TABLE `scholar_doc` (
  `id` int(11) NOT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `doc_verify` varchar(250) NOT NULL,
  `doc_marksheet` varchar(250) NOT NULL,
  `doc_income` varchar(250) NOT NULL,
  `doc_photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar_feedback`
--

CREATE TABLE `scholar_feedback` (
  `s_id` int(11) NOT NULL,
  `s_email` varchar(30) NOT NULL,
  `s_feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar_feedback`
--

INSERT INTO `scholar_feedback` (`s_id`, `s_email`, `s_feedback`) VALUES
(3, 'aman@gmail.com', 'Helo admin\r\nthanx');

-- --------------------------------------------------------

--
-- Table structure for table `scholar_form`
--

CREATE TABLE `scholar_form` (
  `scholar_category` varchar(50) NOT NULL,
  `scholar_scholarship` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_ac_no` varchar(50) NOT NULL,
  `bank_ifsc` varchar(50) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `s_reg` varchar(40) DEFAULT NULL,
  `s_age` int(10) DEFAULT NULL,
  `s_gender` varchar(10) DEFAULT NULL,
  `address_house` varchar(50) DEFAULT NULL,
  `address_city` varchar(30) DEFAULT NULL,
  `address_state` varchar(50) DEFAULT NULL,
  `address_pin` varchar(10) DEFAULT NULL,
  `s_cemail` varchar(50) DEFAULT NULL,
  `s_cgpa` varchar(10) DEFAULT NULL,
  `s_mob` varchar(15) DEFAULT NULL,
  `s_parent` varchar(50) DEFAULT NULL,
  `s_income` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar_user`
--

CREATE TABLE `scholar_user` (
  `s_id` int(11) NOT NULL,
  `s_reg` varchar(15) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_pass` varchar(50) DEFAULT NULL,
  `s_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'NOT APPLIED',
  `amount` varchar(20) DEFAULT NULL,
  `progress` int(10) NOT NULL DEFAULT 25
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar_user`
--

INSERT INTO `scholar_user` (`s_id`, `s_reg`, `s_name`, `s_email`, `s_pass`, `s_date`, `status`, `amount`, `progress`) VALUES
(2, '', 'Rohit Kumar', 'rohit@gmail.com', 'f939548bbe6955db579d922a80fbbea1', '2020-12-22 05:22:32', 'Not Applied', NULL, 0),
(4, '', 'demo5', 'demo5@gmail.com', 'e14c05f0dc27e6be1fc127abaf474a59', '2020-12-27 08:06:16', 'NOT APPLIED', NULL, 0),
(5, '', 'aman', 'aman@gmail.com', 'ccda1683d8c97f8f2dff2ea7d649b42c', '2020-12-29 00:30:26', 'NOT APPLIED', NULL, 0),
(6, 'E17108355500012', 'Abul Hasan', 'abulhax@gmail.com', 'c15dfbd5d79d6171143a25f4f7ded8b4', '2020-12-29 03:38:42', 'NOT APPLIED', NULL, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar_doc`
--
ALTER TABLE `scholar_doc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- Indexes for table `scholar_feedback`
--
ALTER TABLE `scholar_feedback`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `scholar_form`
--
ALTER TABLE `scholar_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- Indexes for table `scholar_user`
--
ALTER TABLE `scholar_user`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholar_doc`
--
ALTER TABLE `scholar_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholar_feedback`
--
ALTER TABLE `scholar_feedback`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholar_form`
--
ALTER TABLE `scholar_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholar_user`
--
ALTER TABLE `scholar_user`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
