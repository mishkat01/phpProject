-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 08:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codestar`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_contact` varchar(35) NOT NULL,
  `national_id` int(20) NOT NULL,
  `total_amount` varchar(60) NOT NULL,
  `status` varchar(80) NOT NULL,
  `customer_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_contact`, `national_id`, `total_amount`, `status`, `customer_img`) VALUES
(3, '', '', '', 0, '', 'Open this select menu', ''),
(4, 'gfhj', 'sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', '1', ''),
(5, 'gfhj', 'sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', '1', 'user_1686671149_1766432.jpg'),
(6, 'gfhj', 'sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', '1', 'user_1686671203_3967567.jpg'),
(7, 'gfhj', 'Sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', '1', 'user_1686671232_4482952.jpg'),
(8, 'let sheuly', 'letsheuly@gama.com', '568416', 0, '0000000000000000', 'Open this select menu', 'user_1686671311_7671956.jpg'),
(9, 'let sheuly', 'letsheuly@gama.com', '568416', 0, '0000000000000000', 'Open this select menu', 'user_1686671382_8975462.jpg'),
(10, 'sheuly', 'rakib@gmail.com', '0125666666', 2147483647, '150000000', 'Open this select menu', 'user_1686671422_4612348.jpg'),
(11, 'gfhj', 'dfsf@fdgd.com', '0125666666', 2147483647, '7897', 'Open this select menu', 'user_1686671593_8375472.jpg'),
(12, 'let sheuly', 'sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', 'Open this select menu', 'user_1686671626_7017821.jpg'),
(13, 'sheuly', 'Sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', 'Open this select menu', 'user_1686671893_7390426.jpg'),
(14, 'sheuly', 'Sheulyakter2234@gmail.com', '0125666666', 2147483647, '150000000', 'Open this select menu', 'user_1686671900_8149127.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
