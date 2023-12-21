-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2023 at 02:55 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakib_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int NOT NULL,
  `area_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(1, 'Gulshan'),
(2, 'Banani'),
(3, 'Dhanmondi'),
(4, 'Uttara'),
(5, 'Mirpur'),
(6, 'Mohammadpur');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bking_id` int NOT NULL,
  `bkng_area` varchar(255) DEFAULT NULL,
  `bkng_cost` varchar(255) DEFAULT NULL,
  `bkng_name` varchar(255) DEFAULT NULL,
  `bt_id` int DEFAULT NULL,
  `Payment` int DEFAULT NULL,
  `property_id` int DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_area` int NOT NULL,
  `Customar_con` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bking_id`, `bkng_area`, `bkng_cost`, `bkng_name`, `bt_id`, `Payment`, `property_id`, `date`, `booking_area`, `Customar_con`) VALUES
(1, 'dhaka', '80000', 'Rico Suarez', 2, 2, 1, '2023-06-22 00:20:18', 0, ''),
(3, 'qq', '8587', 'shuly', 1, 1, 3, '2023-06-22 00:20:18', 0, ''),
(4, 'ryr', 'ryr', 'rtr', 1, 1, 3, '2023-06-22 21:17:04', 0, ''),
(5, 'barisal', '87400', 'hasan', 1, 1, 1, '2023-06-27 17:30:45', 0, ''),
(6, 'mokamia', '80000', 'kaium', 1, 1, 5, '2023-06-28 11:26:38', 0, ''),
(7, 'betagi', '7844', 'sohan', 2, 2, 4, '2023-06-28 11:27:07', 0, ''),
(8, 'mirpur', '80000', 'rtr', 1, 1, 3, '2023-06-28 12:56:34', 0, ''),
(9, 'mirpur', '80000', 'rtr', 2, 1, 3, '2023-06-28 12:57:04', 3, ''),
(14, '124/43 dream zone', '50000', 'Kium', 2, 2, 3, '2023-06-28 16:32:05', 4, '0177556778'),
(16, '125/5 vip road', '5000', 'Moshaidul Islam', 2, 2, 4, '2023-07-05 23:26:39', 1, '01778899556'),
(17, '120/1 gorib road', '2000', 'bisty', 2, 2, 9, '2023-07-03 23:31:22', 1, '017755668787'),
(18, 'jurain', '2000', 'shuly', 1, 2, 5, '2023-07-03 23:44:52', 1, '01778899556'),
(19, 'Plot-08, Road-15, Sector-04', '878585', 'Habib', 1, 1, 3, '2023-07-04 02:09:46', 4, '017765647'),
(20, 'Plot-08, Road-15, Sector-04', '50', 'Habib', 2, 2, 10, '2023-07-04 03:45:12', 1, '017898567'),
(21, '121/2 saidur tower ', '500', 'Rakib', 1, 2, 3, '2023-07-04 11:33:26', 1, '0178899445'),
(22, '121/2 saidur tower ', '54564563', 'Rakib', 1, 2, 4, '2023-07-04 11:52:25', 1, '0178899445'),
(24, 'shadhona', '5000', 'khalida', 1, 1, 1, '2023-07-05 03:40:34', 1, '97834548754'),
(25, 'dhaka', '80000', 'Jorge', 1, 2, 12, '2023-07-05 12:44:16', 1, '0177556778'),
(28, 'monipur schoole', '9000', 'Bristy', 1, 2, 19, '2023-07-05 13:31:25', 5, '75746474534'),
(29, 'dhaka', '80000', 'Jorge', 1, 2, 11, '2023-07-05 13:33:54', 5, '0177556778'),
(30, 'amtola', '4000', 'Zahid', 1, 1, 20, '2023-07-05 13:37:05', 5, '674375444334');

-- --------------------------------------------------------

--
-- Table structure for table `booking_type`
--

CREATE TABLE `booking_type` (
  `bt_id` int NOT NULL,
  `btype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_type`
--

INSERT INTO `booking_type` (`bt_id`, `btype`) VALUES
(1, 'Buy'),
(2, 'For Rent');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_contact` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_img` varchar(255) DEFAULT NULL,
  `national_id` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instalment`
--

CREATE TABLE `instalment` (
  `instal_id` int NOT NULL,
  `appname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `downp` int NOT NULL,
  `ins_per` int NOT NULL,
  `agent` int NOT NULL,
  `from_pic` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `apply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instalment`
--

INSERT INTO `instalment` (`instal_id`, `appname`, `downp`, `ins_per`, `agent`, `from_pic`, `apply_date`) VALUES
(1, 'rakib', 100, 3, 1, '', '2023-06-28 15:20:53'),
(3, 'tanvir', 400, 3, 21, '', '2023-07-03 23:32:07'),
(4, 'Michael', 67678789, 2, 28, 'user_1688450624_2170440.jpg', '2023-07-04 02:03:15'),
(5, 'sheuly', 500, 3, 21, '', '2023-07-04 11:59:44'),
(6, 'tanvir', 400, 3, 28, '', '2023-07-05 01:29:10'),
(7, 'tanvir', 400, 3, 21, '', '2023-07-05 01:58:19'),
(8, 'Mosharof', 700, 2, 28, '', '2023-07-05 13:45:53'),
(9, 'Jahangir', 500, 3, 28, '', '2023-07-05 13:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `ins_type`
--

CREATE TABLE `ins_type` (
  `ins_id` int NOT NULL,
  `ins_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ins_rate` double NOT NULL,
  `ins_month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ins_type`
--

INSERT INTO `ins_type` (`ins_id`, `ins_name`, `ins_rate`, `ins_month`) VALUES
(1, '15% For Monthly(12)', 0.15, 12),
(2, '10% For Monthly(6)', 0.1, 6),
(3, '8% For Monthly(3)', 0.08, 3);

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `land_id` int NOT NULL,
  `land_name` varchar(255) DEFAULT NULL,
  `land_area` varchar(255) DEFAULT NULL,
  `land_cost` decimal(10,0) DEFAULT NULL,
  `land_agent_id` int DEFAULT NULL,
  `land_img` varchar(255) DEFAULT NULL,
  `ls_id` int DEFAULT NULL,
  `lme` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`land_id`, `land_name`, `land_area`, `land_cost`, `land_agent_id`, `land_img`, `ls_id`, `lme`) VALUES
(9, 'Uttara Model Town', 'Uttara', 152048, 25, 'user_1688450018_5667288.png', 1, '5 acors'),
(10, 'Multiplan Houseing', 'Mirpur', 56214, 21, 'user_1688450087_2431157.png', 1, '5 acors'),
(11, 'Rafin Plaza', 'Jhigatola', 56800, 25, 'user_1688526611_592876.jpg', 1, '2000 sqr'),
(12, '11 road ', 'dhanmondi', 7000, 20, '', 1, '67564sqft'),
(13, 'mukti Multiplan', 'Mirpur', 100, 21, '', 1, '5 acors'),
(14, 'bnful', 'dhanmnd', 500, 28, '', 1, '5accor');

-- --------------------------------------------------------

--
-- Table structure for table `land_agent`
--

CREATE TABLE `land_agent` (
  `land_agent_id` int NOT NULL,
  `land_agent_name` varchar(255) DEFAULT NULL,
  `land_agent_contact` varchar(55) DEFAULT NULL,
  `land_agent_location` int DEFAULT NULL,
  `agent_img` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `password` varchar(11) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land_agent`
--

INSERT INTO `land_agent` (`land_agent_id`, `land_agent_name`, `land_agent_contact`, `land_agent_location`, `agent_img`, `user_id`, `password`, `user_name`) VALUES
(20, 'Super Admin', '', NULL, '', 1, '1', 'admin'),
(21, 'Bill Gates', '1745634221', 1, 'user_1688456052_3094156.jpg', 2, '1', 'bil'),
(25, 'Marlin', '1926248990', 2, 'user_1688451014_1327280.jpg', 2, '1', 'marlin'),
(28, 'elon musk', '1757901640', 5, 'user_1688455906_4439093.jpg', 2, '1', 'elon'),
(29, 'Donald Trump', '+1 202-918-2132', 3, 'user_1688450382_3199477.jpg', 2, '1', 'donal'),
(31, 'Mark Zuckerberg', '01757901667', 6, 'user_1688533520_8331324.jpg', 2, '1', 'mark'),
(32, 'Sundar Pichai', '01793800674', 2, 'user_1688533652_6412593.jpg', 2, '1', 'sundar');

-- --------------------------------------------------------

--
-- Table structure for table `land_status`
--

CREATE TABLE `land_status` (
  `ls_id` int NOT NULL,
  `is_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land_status`
--

INSERT INTO `land_status` (`ls_id`, `is_name`) VALUES
(1, 'Avaiable'),
(2, 'Not Avaiable'),
(3, 'Sold Out');

-- --------------------------------------------------------

--
-- Table structure for table `metarial`
--

CREATE TABLE `metarial` (
  `metarial_id` int NOT NULL,
  `metarial_name` varchar(255) DEFAULT NULL,
  `metarial_price` varchar(255) DEFAULT NULL,
  `mquantity` int DEFAULT NULL,
  `purse_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `sup_id` int DEFAULT NULL,
  `u_id` int DEFAULT NULL,
  `tpaids` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metarial`
--

INSERT INTO `metarial` (`metarial_id`, `metarial_name`, `metarial_price`, `mquantity`, `purse_date`, `sup_id`, `u_id`, `tpaids`) VALUES
(27, 'Eit', '500', 10000, '2023-07-04 02:53:08', 9, 4, 200),
(28, 'paint', '4580', 10, '2023-07-04 03:20:17', 9, 2, 789),
(29, 'computer', '464655', 10, '2023-07-04 03:40:42', 7, 3, 10),
(30, 'concrete ', '700', 50, '2023-07-04 11:42:35', 7, 3, 200),
(31, 'ware', '600', 10, '2023-07-04 13:41:35', 9, 3, 955),
(32, 'Cement', '50000', 50, '2023-07-04 13:50:13', 10, 3, 9555),
(33, 'Rod', '50000', 50, '2023-07-04 13:54:33', 11, 5, 45000),
(34, 'Concrete', '4500', 5, '2023-07-04 23:18:34', 11, 5, 4000),
(35, 'Balu', '500', 45, '2023-07-05 01:22:10', 11, 3, 200),
(36, 'Rod', '600', 10, '2023-07-05 11:37:01', 15, 5, 200),
(37, 'Glass', '500', 20, '2023-07-05 11:51:49', 17, 4, 100),
(38, 'thial glass', '500', 20, '2023-07-05 11:55:34', 18, 4, 0),
(39, 'chiment', '1000', 55, '2023-07-05 14:05:45', 19, 3, 500),
(40, 'Rod', '600', 10, '2023-07-05 14:19:00', 16, 5, 700),
(41, 'Rod', '800000', 10, '2023-07-05 14:19:56', 16, 2, 9555),
(42, 'Rod', '600', 10, '2023-07-05 14:28:55', 20, 5, 500),
(43, 'Paints', '50000', 10, '2023-07-05 14:29:24', 20, 2, 700),
(44, 'Rod', '50000', 10, '2023-07-05 14:33:42', 12, 5, 955);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int NOT NULL,
  `payname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `payname`) VALUES
(1, 'Full Payment'),
(2, 'Installment ');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_location` varchar(255) DEFAULT NULL,
  `project_price` varchar(255) DEFAULT NULL,
  `spened` int DEFAULT NULL,
  `pc_id` varchar(50) DEFAULT NULL,
  `ps_id` int DEFAULT NULL,
  `date_column` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_location`, `project_price`, `spened`, `pc_id`, `ps_id`, `date_column`) VALUES
(8, '        Mult', '4', '700000', 95000, '1', 3, '2023-06-27 00:00:00'),
(11, '   lrd', '2', '74512', 9654, '2', 3, '2023-06-01 01:22:49'),
(13, '     Eldorado ', '1', '500000', 10000, '2', 3, '2023-07-02 04:30:57'),
(14, ' Full', '1', '5000', 500, '2', 3, '2023-07-03 23:36:38'),
(15, ' bonoful', '5', '100', 10, '3', 3, '2023-07-04 03:43:00'),
(16, '  Rafin Project', '3', '500000', 300000, '2', 3, '2023-07-04 23:35:49'),
(17, '  Ejobs', '3', '1000', 500, '4', 3, '2023-07-05 00:56:18'),
(18, ' Janoni Tower', '2', '150000', 10000, 'Open this select menu', 1, '2023-07-05 05:21:14'),
(19, ' sonar bangla', '4', '74512', 9654, 'Open this select menu', 1, '2023-07-05 05:44:20'),
(20, ' kaminis', '3', '48000', 9654, 'Open this select menu', 1, '2023-07-05 06:23:02'),
(21, 'bisty project', '1', '500', 100, '', 1, '2023-07-05 11:59:55'),
(22, ' Moynamoti', '2', '1000', 700, 'Open this select menu', 3, '2023-07-05 14:15:01'),
(23, 'Santi villa', '2', '300', 200, '', 1, '2023-07-05 14:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `ps_id` int NOT NULL,
  `p_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`ps_id`, `p_status`) VALUES
(1, 'ongoing'),
(2, 'on hold'),
(3, 'complete ');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int NOT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `property_location` varchar(255) DEFAULT NULL,
  `property_cost` varchar(255) DEFAULT NULL,
  `land_img` varchar(255) DEFAULT NULL,
  `ls_id` int DEFAULT NULL,
  `selling_p` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `property_location`, `property_cost`, `land_img`, `ls_id`, `selling_p`) VALUES
(11, 'jacab tower', '3', '10000', '', 3, 15000),
(12, 'Ayesha Villa', '3', '10000', 'user_1688528357_2820402.webp', 3, 12000),
(14, 'Saidur Tower ', '4', '800', '', 3, 1200),
(17, 'kam', '1', '10000', '', 3, 6600),
(18, 'ff', '1', '3000', '', 3, 6600),
(19, 'home', ' 5', '7000', '', 1, 8000),
(20, 'monnafer Tower', '5', '3000', '', 3, 4000),
(21, 'sweet home', ' 2', '700', '', 1, 900);

-- --------------------------------------------------------

--
-- Table structure for table `p_contactor`
--

CREATE TABLE `p_contactor` (
  `land_agent_id` int NOT NULL,
  `land_agent_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `land_agent_contact` int DEFAULT NULL,
  `land_agent_location` int NOT NULL,
  `agent_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_contactor`
--

INSERT INTO `p_contactor` (`land_agent_id`, `land_agent_name`, `land_agent_contact`, `land_agent_location`, `agent_img`) VALUES
(1, 'karim', 1745634221, 1, ''),
(2, 'sohan', 1775566772, 2, ''),
(3, 'Khaleda', 1793800821, 5, ''),
(4, 'mosharrof', 1256555, 4, 'user_1688527424_9847550.jpg'),
(5, 'Ontik Mahmud', 1745634221, 3, ''),
(6, 'Tanvir', 1545555555, 4, ''),
(7, 'asif', 746735475, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `sup_id` int NOT NULL,
  `sup_name` varchar(255) DEFAULT NULL,
  `sup_contact_no` varchar(255) DEFAULT NULL,
  `sup_email` varchar(255) DEFAULT NULL,
  `land_img` varchar(255) DEFAULT NULL,
  `tamount` varchar(255) DEFAULT NULL,
  `tdue` decimal(10,0) DEFAULT NULL,
  `tpaid` varchar(255) DEFAULT NULL,
  `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`sup_id`, `sup_name`, `sup_contact_no`, `sup_email`, `land_img`, `tamount`, `tdue`, `tpaid`, `submission_date`) VALUES
(12, 'Ayesha', '0165889999', 'ayesha@gmail.com', NULL, 'Tanvir shop', NULL, '6000', '2023-07-04 23:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `unit_om`
--

CREATE TABLE `unit_om` (
  `u_id` int NOT NULL,
  `u_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_om`
--

INSERT INTO `unit_om` (`u_id`, `u_name`) VALUES
(1, 'Kilograms (kg)'),
(2, 'Liters (L)'),
(3, 'Bags '),
(4, 'Feet (ft)'),
(5, 'Tons');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` int NOT NULL,
  `role` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'Management', 1, '1'),
(2, 'Agent', 2, '2'),
(3, 'user', 1, '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bking_id`),
  ADD KEY `bt_id` (`bt_id`),
  ADD KEY `Payment` (`Payment`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `booking_type`
--
ALTER TABLE `booking_type`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `instalment`
--
ALTER TABLE `instalment`
  ADD PRIMARY KEY (`instal_id`);

--
-- Indexes for table `ins_type`
--
ALTER TABLE `ins_type`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`),
  ADD KEY `land_agent_id` (`land_agent_id`),
  ADD KEY `ls_id` (`ls_id`);

--
-- Indexes for table `land_agent`
--
ALTER TABLE `land_agent`
  ADD PRIMARY KEY (`land_agent_id`),
  ADD KEY `land_agent_location` (`land_agent_location`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `land_status`
--
ALTER TABLE `land_status`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `metarial`
--
ALTER TABLE `metarial`
  ADD PRIMARY KEY (`metarial_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `ps_id` (`ps_id`),
  ADD KEY `pc_id` (`pc_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `p_contactor`
--
ALTER TABLE `p_contactor`
  ADD PRIMARY KEY (`land_agent_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `unit_om`
--
ALTER TABLE `unit_om`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `instalment`
--
ALTER TABLE `instalment`
  MODIFY `instal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `land_agent`
--
ALTER TABLE `land_agent`
  MODIFY `land_agent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `metarial`
--
ALTER TABLE `metarial`
  MODIFY `metarial_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `p_contactor`
--
ALTER TABLE `p_contactor`
  MODIFY `land_agent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `sup_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_om`
--
ALTER TABLE `unit_om`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
