-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2024 at 05:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_feedback`
--

CREATE TABLE `cust_feedback` (
  `Cust_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `rating_assistance` int(11) NOT NULL,
  `rating_environment` int(11) NOT NULL,
  `rating_pricing` int(11) NOT NULL,
  `rating_recommend` int(11) NOT NULL,
  `rating_purchase` int(11) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_feedback`
--

INSERT INTO `cust_feedback` (`Cust_id`, `customer_name`, `customer_email`, `customer_mobile`, `rating_assistance`, `rating_environment`, `rating_pricing`, `rating_recommend`, `rating_purchase`, `submission_date`) VALUES
(1, 'Sameer', 'amirsm8472@gmail.com', '7246552555', 2, 5, 3, 2, 3, '2024-05-01 12:07:42'),
(2, 'Sameer', 'amirsm8472@gmail.com', '7246552555', 2, 4, 2, 2, 1, '2024-05-01 12:24:15'),
(3, 'Sameer', 'amirsm8472@gmail.com', '7246552555', 1, 2, 3, 4, 5, '2024-05-01 12:29:29'),
(4, 'Amir Shaikh', 'amirsm8472@gmail.com', '7246552555', 2, 2, 3, 4, 5, '2024-05-01 12:30:43'),
(5, 'Zahid shaikh', 'zahid@gmail.com', '7246552555', 1, 2, 3, 4, 5, '2024-05-01 15:19:54'),
(6, 'Zahid shaikh', 'zahid@gmail.com', '7246552555', 1, 2, 3, 4, 5, '2024-05-01 15:20:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust_feedback`
--
ALTER TABLE `cust_feedback`
  ADD PRIMARY KEY (`Cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_feedback`
--
ALTER TABLE `cust_feedback`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
