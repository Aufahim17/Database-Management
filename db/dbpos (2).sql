-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 08:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--
CREATE DATABASE IF NOT EXISTS `dbpos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbpos`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_address` text NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_customer`
--

CREATE TABLE `g_customer` (
  `g_id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  `nid` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `available_balance` int(10) NOT NULL,
  `total_due` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_customer`
--

INSERT INTO `g_customer` (`g_id`, `name`, `present_address`, `permanent_address`, `phone`, `nid`, `email`, `available_balance`, `total_due`) VALUES
(101, 'Anni', 'Rajendropur', 'Rajendropur', 1622222333, 756666448, 'anni@gmail.com', 10000, 0),
(102, 'Sayed', 'uttara', 'Rajendropur', 1622225553, 756666444, 'sayed@gmail.com', 9500, 500),
(107, 'mamun', 'savar', 'savar', 1887745666, 2147483647, 'mamun@gmail.com', 5000, 0),
(108, 'erfan', 'cantorment', 'dhhaka', 152121212, 43432423, 'erfan@gmail.com', 4320, 680),
(110, 'laboni', 'savar', 'dhaka', 152121214, 837345734, 'laboni@yahoo.com', 7000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `id` int(11) NOT NULL,
  `maincategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `maincategory_name`) VALUES
(5, 'Food'),
(9, 'Cosmatics'),
(10, 'Drinks'),
(11, 'Dairy'),
(12, 'Others'),
(13, 'Grocery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `buy_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subcategory_id`, `buy_price`, `sale_price`, `discount`, `quantity`) VALUES
(43, '7UP 1 Litter', 24, 29, 32, 0, 12),
(44, 'Pran 1 Litter', 25, 40, 60, 7, 18),
(52, 'Water 1 Litter', 24, 15, 20, 0, 5),
(53, 'Potato', 24, 16, 18, 0, 48),
(54, 'Milk Vita 1liter', 25, 48, 55, 0, 1),
(55, 'Lux Soap', 33, 23, 28, 0, 30),
(56, 'Sunlight Pencil Battery', 36, 9, 12, 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `sale_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sale_id`, `product_id`, `product_price`, `product_quantity`, `sessionid`, `sellerid`, `sale_date`) VALUES
(110, 45, 600, 12, 'ie65onon7mn1b14tiuj5okjp73', 12, '05-04-2018'),
(111, 47, 13000, 2, 'ie65onon7mn1b14tiuj5okjp73', 12, '05-04-2018'),
(112, 44, 60, 1, 'dr7h4b21uk07vljrp6aq8cobc3', 1, '05-04-2018'),
(113, 44, 60, 1, 'th5kve7vmeplpqgas8doca1go5', 1, '05-04-2018'),
(114, 45, 600, 1, 'dn227gmgkkuteipa9n4io09cd1', 1, '05-04-2018'),
(115, 47, 13000, 1, 'oecq2fo5unh0dss74etbha24u3', 1, '05-04-2018'),
(116, 44, 60, 2, 'amcbhj6iaj4g0s99cnoif44kg6', 1, '05-04-2018'),
(117, 46, 280, 1, 'facgathsipotascrj8rhfsrvs0', 1, '05-04-2018'),
(118, 43, 32, 1, 'of1ifurtj7d6m53bue0d54aib4', 1, '05-04-2018'),
(120, 50, 50000, 1, '4ok1usne7lus71ip49pp9grag1', 1, '05-04-2018'),
(121, 50, 50000, 1, 'civjqepcl2jf9juou9nse8lv62', 1, '05-04-2018'),
(122, 46, 280, 1, 'ma7jajs7nu3kt5d3dmq2mgfbl2', 1, '05-04-2018'),
(124, 47, 13000, 1, 'j2mo24joqlu0td51aahd2814s5', 1, '05-04-2018'),
(125, 47, 13000, 1, 'alr7h4hlvm5t63f6iagrplrm51', 1, '06-04-2018'),
(126, 44, 60, 1, 'e5h8v3kt2hlqqn9ol8g88np854', 1, '06-04-2018'),
(130, 54, 55, 2, 'sda9fplha2lb41842qut4u5gl5', 1, '06-04-2018'),
(131, 54, 55, 2, 'ci96kk8na243dqcdokcv3slhl3', 1, '06-04-2018'),
(132, 52, 20, 2, 'a504plsn011nf8ciqhmlnpg9v2', 1, '06-04-2018'),
(133, 46, 280, 2, 'n4i4bvbro72i7v2acttvt4ni66', 1, '06-04-2018'),
(134, 46, 280, 1, '105i5jtpj9dpg5s5nn7mte1k64', 1, '06-04-2018'),
(135, 44, 60, 1, '3kf346nfmflufus5qm0c3u2d11', 1, '06-04-2018'),
(136, 45, 600, 1, 'rdeuohti9saq7mf4mrrvkuv511', 1, '06-04-2018'),
(138, 44, 60, 1, 'frugv240tb9q0v2qil112cjpt7', 1, '06-04-2018'),
(139, 52, 20, 2, 'at46952belq0hmh4gqbp46dtq6', 1, '06-04-2018'),
(140, 54, 55, 3, '08fg25a02pv2a4d5opb1u7tiv0', 1, '06-04-2018'),
(141, 44, 60, 1, 'c4f4e9t1bfd7o3qibq2sd874s3', 1, '06-04-2018'),
(142, 50, 50000, 1, '6c33k9ed73vdrppdggpdl25j80', 1, '06-04-2018'),
(143, 47, 13000, 1, 'ip86je8lchbjnoasf3je8a58t7', 1, '06-04-2018'),
(144, 44, 60, 5, 'nkvdv3bkj9oa5hpok929ap5o37', 1, '06-04-2018'),
(145, 43, 32, 1, '67ruuv2kdoo6r7q9rnn8qah370', 1, '06-04-2018'),
(146, 43, 32, 1, '05enti0f1niocput2j3mleges0', 1, '06-04-2018'),
(147, 53, 18, 2, 'gqjrs1ns2vd5gj6k87tabij9j1', 1, '06-04-2018'),
(148, 48, 8500, 1, 'eo195g1vauef4loars9adtvgi7', 1, '06-04-2018'),
(149, 51, 1000, 1, 'eo195g1vauef4loars9adtvgi7', 1, '06-04-2018'),
(150, 43, 32, 1, '43e06tgud0kqpnelnltc2aaio6', 1, '07-04-2018'),
(151, 46, 280, 2, 'm381p0qnsap2b06ljfrigqcud6', 1, '07-04-2018'),
(153, 44, 60, 2, 'm381p0qnsap2b06ljfrigqcud6', 1, '07-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE `sale_product` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `voucher_number` varchar(255) NOT NULL,
  `sale_date` varchar(20) NOT NULL,
  `total_amount` float NOT NULL,
  `sellerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`id`, `customer_id`, `voucher_number`, `sale_date`, `total_amount`, `sellerid`) VALUES
(207, 18, 'dr7h4b21uk07vljrp6aq8cobc3', '05-04-2018', 60, 1),
(208, 18, 'th5kve7vmeplpqgas8doca1go5', '05-04-2018', 60, 1),
(209, 15, 'dn227gmgkkuteipa9n4io09cd1', '05-04-2018', 600, 1),
(210, 15, 'vrst0rntmc6km47rl3bmiralt1', '05-04-2018', 0, 1),
(211, 15, 'qfp7cofhgqrc52qocsmjeg0vi2', '05-04-2018', 0, 1),
(212, 15, 'mb7knljifl9d5guuhbjcobc9l3', '05-04-2018', 0, 1),
(213, 16, 'oecq2fo5unh0dss74etbha24u3', '05-04-2018', 13000, 1),
(214, 16, 'amcbhj6iaj4g0s99cnoif44kg6', '05-04-2018', 120, 1),
(215, 18, 'facgathsipotascrj8rhfsrvs0', '05-04-2018', 280, 1),
(216, 14, 'of1ifurtj7d6m53bue0d54aib4', '05-04-2018', 32, 1),
(217, 15, '4ok1usne7lus71ip49pp9grag1', '05-04-2018', 50000, 1),
(218, 12, 'civjqepcl2jf9juou9nse8lv62', '05-04-2018', 50000, 1),
(219, 18, 'ma7jajs7nu3kt5d3dmq2mgfbl2', '05-04-2018', 280, 1),
(220, 17, 'j2mo24joqlu0td51aahd2814s5', '05-04-2018', 13000, 1),
(221, 17, 'alr7h4hlvm5t63f6iagrplrm51', '06-04-2018', 13000, 1),
(222, 0, '4216t36ivkn423i9ie84b2ca47', '06-04-2018', 0, 1),
(223, 13, 'e5h8v3kt2hlqqn9ol8g88np854', '06-04-2018', 60, 1),
(224, 12, '105i5jtpj9dpg5s5nn7mte1k64', '06-04-2018', 280, 1),
(225, 18, '3kf346nfmflufus5qm0c3u2d11', '06-04-2018', 60, 1),
(226, 0, 'rdeuohti9saq7mf4mrrvkuv511', '06-04-2018', 600, 1),
(227, 0, 'frugv240tb9q0v2qil112cjpt7', '06-04-2018', 60, 1),
(228, 0, 'at46952belq0hmh4gqbp46dtq6', '06-04-2018', 40, 1),
(229, 0, '08fg25a02pv2a4d5opb1u7tiv0', '06-04-2018', 165, 1),
(230, 0, 'c4f4e9t1bfd7o3qibq2sd874s3', '06-04-2018', 60, 1),
(231, 0, '6c33k9ed73vdrppdggpdl25j80', '06-04-2018', 50000, 1),
(232, 0, 'ip86je8lchbjnoasf3je8a58t7', '06-04-2018', 13000, 1),
(233, 0, 'nkvdv3bkj9oa5hpok929ap5o37', '06-04-2018', 300, 1),
(234, 0, '67ruuv2kdoo6r7q9rnn8qah370', '06-04-2018', 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `company_name`) VALUES
(24, '5', 'Nabisco'),
(25, '5', 'Danish'),
(33, '9', 'Uniliver'),
(34, '5', 'Ifad'),
(35, '10', 'Pepsico'),
(36, '10', 'Akij Foods');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `dob` varchar(20) NOT NULL,
  `nid` int(11) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `sex`, `phone`, `email`, `password`, `dob`, `nid`, `address`, `type`) VALUES
(1, 'Fahim', 'Male', 1521211053, 'fahim@admin.com', '123', '17/07/1996', 78979298, 'Uttara', 1),
(2, 'sagor', 'male', 1521210694, 'sagor@admin.com', '123', '14/11/1996', 564654213, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `g_customer`
--
ALTER TABLE `g_customer`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `nid_2` (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `g_customer`
--
ALTER TABLE `g_customer`
  MODIFY `g_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
