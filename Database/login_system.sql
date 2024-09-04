-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 06:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'india'),
(2, 'landan'),
(3, 'uk\r\n'),
(4, 'china\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `gender`, `date-of-birth`, `hobby`, `address`, `city`, `state_id`, `country_id`, `image`, `created-at`, `updated-at`) VALUES
(9, ',hignesh', 'hignesh@gmail.com', '', 'male ', '2008-05-08', 'music,singing', 'surat ,gujrat -  395010', '', '', '', '', '2023-03-09 04:41:00', '2023-03-09 07:02:58'),
(10, ',hignesh', 'hignesh@gmail.com', '155112', 'male', '2008-05-08', 'music,singing', 'gujrat -  395010', '', '', '', '', '2023-03-09 04:42:12', '2023-03-09 04:42:12'),
(11, ',hignesh', 'hignesh@gmail.com', '155112', 'male', '2008-05-08', 'music,singing', 'gujrat -  395010', '', '', '', '', '2023-03-09 04:48:55', '2023-03-09 04:48:55'),
(12, ',hignesh', 'hignesh@gmail.com', '155112', 'male', '2008-05-08', 'music,singing', 'gujrat -  395010', '', '', '', '', '2023-03-09 04:48:57', '2023-03-09 04:48:57'),
(13, 'nasit', 'nasit123@gmail.com', '1234', 'male', '2023-03-01', 'music', 'vapi', 'other', '', '', '', '2023-03-09 04:49:25', '2023-03-09 04:49:25'),
(14, 'admin', 'admin@gmail.com', '1235', 'male', '2023-03-21', 'music,singing', 'ankitapark', 'surat', '', '', '', '2023-03-09 05:13:50', '2023-03-09 05:13:50'),
(15, 'nikhil', 'admin@gmail.com', '1235', 'male ', '2023-03-01', 'music,playing', 'jakatnaka ,surat', 'surat', '', '', '', '2023-03-09 05:15:04', '2023-03-20 04:46:35'),
(16, 'vipul', 'vipul@gmail.com', '123', 'male', '2023-02-28', 'music,singing', 'surat', 'surat', '', '', '', '2023-03-09 05:42:01', '2023-03-09 05:42:01'),
(17, 'sujalcccc', 'nasit123@gmail.com', '1234', 'male', '2023-03-09', 'music,singing', 'surat', 'surat', '', '', '', '2023-03-09 05:50:12', '2023-03-09 05:50:12'),
(18, 'sujalcccc', 'nasit123@gmail.com', '1234', 'male', '2023-03-09', 'music,singing', 'surat', 'surat', '', '', '', '2023-03-09 05:54:07', '2023-03-09 05:54:07'),
(19, 'kenil', 'admin@gmail.com', '1235', 'male ', '2023-03-02', 'music,singing,playing', 'surat', 'surat', '', '', '', '2023-03-09 05:56:07', '2023-03-11 03:59:25'),
(20, 'kenil', 'admin@gmail.com', '1235', 'male', '2023-03-02', 'music,singing', 'surat', 'surat', '', '', '', '2023-03-09 05:56:48', '2023-03-09 05:56:48'),
(21, 'kenil', 'admin@gmail.com', '1235', '', '2023-03-02', 'music,singing,playing', 'surat', 'surat', '', '', '', '2023-03-09 05:57:18', '2023-03-09 07:02:37'),
(23, 'vipul', 'admin@gmail.com', '1235', 'male ', '2023-03-01', 'music,singing', 'amipark', 'vadodra', '', '', '', '2023-03-09 07:06:15', '2023-03-09 07:06:24'),
(24, 'vipul', 'admin@gmail.com', '1235', 'male', '2023-03-01', 'music,singing', 'amipark', 'vadodra', '', '', '1.jpg', '2023-03-09 07:06:36', '2023-03-09 07:06:36'),
(25, 'nasitvipul', 'vipul@gmail.com', '123', '', '2023-02-28', 'singing', 'sagar soc.', 'surat', '', '', '1.jpg', '2023-03-11 04:01:49', '2023-03-13 04:29:10'),
(26, 'nasitvipul', 'vipul@gmail.com', '123', '', '2023-02-28', 'singing', 'sagar soc.', 'surat', '', '', '2.jpg', '2023-03-11 04:02:01', '2023-03-13 04:29:34'),
(27, 'hignesh', 'hignesh@gmail.com', '1234', 'male', '2020-11-01', 'music', 'surat', 'surat', '', '', '2.jpg', '2023-03-15 04:42:16', '2023-03-15 04:42:16'),
(28, 'shyam', 'isamaliyasujal033@gmail.com', 'Sujal#$007', 'male', '2003-02-07', 'music', 'Rudar SOS ', 'surat', '', '', '1.jpg', '2023-03-16 06:55:22', '2023-03-16 06:55:22'),
(29, 'hignesh', 'hignesh@gmail.com', 'hignesh456123', 'male', '2003-08-02', '', '', '', '', '', '', '2023-03-24 04:50:27', '2023-03-24 04:50:27'),
(30, 'hignesh', 'hignesh@gmail.com', 'hignesh456123', 'male ', '2003-08-02', 'music,playing', 'ankita park soc, surat', 'surat', '', '', '', '2023-03-24 04:50:59', '2023-03-24 04:51:15'),
(31, 'Nasit Hignesh', 'nasithignsh77@gmail.comm', '12345', 'male', '2003-05-08', 'music,singing,playing', 'ankitapark soc., surat', 'surat', 'gujrat', 'india', 'product-1.png', '2023-04-12 04:40:55', '2023-04-12 04:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'gujrat'),
(2, 1, 'hariyana'),
(3, 2, 'landan-city'),
(4, 3, 'uk-city'),
(5, 4, 'china-city');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
