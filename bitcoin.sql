-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2019 at 10:07 PM
-- Server version: 5.6.42
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `ecurrency_details` varchar(100) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(10) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `address`, `ecurrency_details`, `account_name`, `account_number`, `bank_name`, `phone_no`) VALUES
(1, 'BITCOINEX', 'kayzeebiz@gamil.com', '8f142fcf2a183ca85c905e22668b89a2', NULL, 'asdfghj', 'saliu moshood', '999022210', 'Diamond Bank', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `E_currency` varchar(20) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  `e_currency_details` text,
  `invoice_email_addy` varchar(40) DEFAULT NULL,
  `invoice_sent_status` varchar(1) DEFAULT NULL,
  `upoad_file` blob,
  `username` varchar(20) DEFAULT NULL,
  `completed` char(1) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `upload_file_status` varchar(1) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total_amount_naira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `E_currency`, `Amount`, `e_currency_details`, `invoice_email_addy`, `invoice_sent_status`, `upoad_file`, `username`, `completed`, `creation_date`, `completion_date`, `order_id`, `upload_file_status`, `rate`, `total_amount_naira`) VALUES
(2, 'bitcoin', 2233, 'fghjkl;', 'kayzeebiz@gmail.com', NULL, NULL, 'botnet', 'Y', '2019-01-12', '2019-01-15', 'df1c1f9c76102cc1f4562170ec67aa2a', 'N', 356, 794948),
(3, 'bitcoin', 345, 'dfghjkl', 'kayzeebiz@gmail.com', NULL, NULL, 'botnet', 'Y', '2019-01-13', '2019-01-15', '196ad531ca17ff7c659f95c0d4c5de6d', 'N', 356, 122820),
(4, 'bitcoin', 56, 'jasffggv5gvbhhnnjjkklkkn8bnbghPIpolk', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, 'ef646802892b225e2b5d042cc15168a4', 'N', 356, 19936),
(5, 'bitcoin', 67, 'dfghjklkjhgfdcvbnmvdf', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, 'bcd4a4432237c609b675e6e1e18f962c', 'N', 356, 23852),
(6, 'bitcoin', 80, 'dfghjklkjhgfdsdfghjkljhgfghj', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, '1ff7c745f8a3863b2eb049e0005d230c', 'N', 356, 28480),
(7, 'bitcoin', 23, 'sdfghjkljhgfdsasdfghj', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, '047a2ed9eec1b79083fc60b5216543d7', 'N', 356, 8188),
(8, 'bitcoin', 8, 'hjjhhssjsjjsjsjsjsjs', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, 'f8fcbcf4b1a6af9a3ffee3d02f80f759', 'N', 356, 2848),
(9, 'bitcoin', 9, 'njnnnn', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'Y', '2019-01-13', '2019-01-15', 'b207868b23c799fbbd92041bfa63db6d', 'N', 356, 3204);

-- --------------------------------------------------------

--
-- Table structure for table `e_currency`
--

CREATE TABLE `e_currency` (
  `id` int(11) NOT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `buy_exchange_amount` int(11) DEFAULT NULL,
  `sell_exchange_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_currency`
--

INSERT INTO `e_currency` (`id`, `currency`, `buy_exchange_amount`, `sell_exchange_amount`) VALUES
(1, 'bitcoin', 23, 236);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `E_currency` varchar(20) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  `account_details` text,
  `invoice_email_addy` varchar(40) DEFAULT NULL,
  `invoice_sent_status` varchar(1) DEFAULT NULL,
  `upoad_file` blob,
  `username` varchar(20) DEFAULT NULL,
  `completed` char(1) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `upload_file_status` varchar(1) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total_amount_naira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `E_currency`, `Amount`, `account_details`, `invoice_email_addy`, `invoice_sent_status`, `upoad_file`, `username`, `completed`, `creation_date`, `completion_date`, `invoice_id`, `upload_file_status`, `rate`, `total_amount_naira`) VALUES
(1, 'bitcoin', 34, 'saliu moshood kolawole\r\n3046507407\r\nfirstbank', 'kayzeebiz@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-12', NULL, '5ea83dcdc13f5e4384d4a618ccdfa9c0', 'N', 356, 12104),
(2, 'bitcoin', 12, 'Saliu Moshood Kolawole\r\n3040507407', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'N', '2019-01-13', NULL, '8336e0419bdc4e2080455ee537628f6d', 'N', 356, 4272),
(3, 'bitcoin', 12, 'sdfghgfffddf', 'moshoodk.saliu@gmail.com', NULL, NULL, 'botnet', 'Y', '2019-01-13', '2019-01-15', '263c572ab1b5ea18e2928fdcba8bf989', 'N', 356, 4272);

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `testimony` text,
  `rating` int(1) DEFAULT NULL,
  `entered_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `username`, `email`, `location`, `testimony`, `rating`, `entered_date`) VALUES
(1, 'botnet', 'kayzeebiz@gmail.com', 'akure', 'im very grateful', 3, '2019-01-12'),
(2, 'botnet', 'kayzeebiz@gmail.com', 'akure', 'im very grateful', 3, '2019-01-12'),
(3, 'botnet', 'kayzeebiz@gmail.com', 'akure', 'im very grateful', 3, '2019-01-12'),
(4, 'botnet', 'kayzeebiz@gmail.com', 'sdfghjkl', 'zxcvbnm,l.', 4, '2019-01-12'),
(5, 'botnet', 'kayzeebiz@gmail.com', 'nm,.', 'cvbnm,./', 4, '2019-01-12'),
(6, 'botnet', 'kayzeebiz@gmail.com', 'cvbnm,.', 'ghjkl', 4, '2019-01-12'),
(7, 'botnet', 'kayzeebiz@gmail.com', 'ghjkl;', 'bndmdmdm,d', 1, '2019-01-12'),
(8, 'botnet', 'kayzeebiz@gmail.com', 'ghjkl;', 'xc', 3, '2019-01-12'),
(9, 'botnet', 'kayzeebiz@gmail.com', 'fghjkl;', 'lkjhgc', 3, '2019-01-12'),
(10, 'botnet', 'kayzeebiz@gmail.com', 'vb', 'zg', 4, '2019-01-12'),
(11, 'botnet', 'kayzeebiz@gmail.com', 'sdfb', 'sdf', 4, '2019-01-12'),
(12, 'botnet', 'kayzeebiz@gmail.com', 'ssdfg', 'sdfghn', 4, '2019-01-12'),
(13, 'botnet', 'kayzeebiz@gmail.com', 'SGH', 'SFG', 3, '2019-01-12'),
(14, 'botnet', 'kayzeebiz@gmail.com', 'zxcvb', 'sdfv', 1, '2019-01-12'),
(15, 'botnet', 'kayzeebiz@gmail.com', 'dfghjk', 'fghjkl', 4, '2019-01-12'),
(16, 'botnet', 'kayzeebiz@gmail.com', 'fghjk', 'ghjkl', 2, '2019-01-12'),
(17, 'botnet', 'kayzeebiz@gmail.com', 'gjkl', 'm,', 3, '2019-01-12'),
(18, 'botnet', 'kayzeebiz@gmail.com', 'ghjkl;', 'hjkl', 2, '2019-01-12'),
(19, 'botnet', 'kayzeebiz@gmail.com', 'bnm,', 'vbnm,', 3, '2019-01-12'),
(20, 'botnet', 'kayzeebiz@gmail.com', 'jkl;', 'dfghjkl', 2, '2019-01-12'),
(21, 'botnet', 'kayzeebiz@gmail.com', 'dfghjkl;', 'fghjkl;', 2, '2019-01-12'),
(22, 'botnet', 'kayzeebiz@gmail.com', 'fghjkl', 'ghjkl', 2, '2019-01-12'),
(23, 'botnet', 'kayzeebiz@gmail.com', 'fghjk', 'dfghjkl;', 1, '2019-01-12'),
(24, 'botnet', 'kayzeebiz@gmail.com', 'xcvbnm,.', 'fghjkl', 2, '2019-01-12'),
(25, 'botnet', 'kayzeebiz@gmail.com', 'fvbnm,', 'dfghjkl', 2, '2019-01-12'),
(26, 'botnet', 'kayzeebiz@gmail.com', 'fghjkl', 'fghjkl', 2, '2019-01-12'),
(27, 'botnet', 'kayzeebiz@gmail.com', 'dkl', 'fghjk', 2, '2019-01-12'),
(28, 'botnet', 'kayzeebiz@gmail.com', 'zsdfg', 'sdfgh', 1, '2019-01-13'),
(29, 'botnet', 'kayzeebiz@gmail.com', 'sdfgh', 'fgh', 1, '2019-01-13'),
(30, 'botnet', 'kayzeebiz@gmail.com', 'sdfghjkl', 'dfghjkl', 2, '2019-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL,
  `addy` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `last_seen` date DEFAULT NULL,
  `activation_id` varchar(100) DEFAULT NULL,
  `reset` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phoneNo`, `addy`, `status`, `reg_date`, `last_seen`, `activation_id`, `reset`) VALUES
(62, 'moshood', 'saliu', 'botnet', '7be3953e2d3257711d2379e1d6048d63', 'moshood.saliu@gmail.com', '08137877844', 'ketu', 'V', '2019-01-15', NULL, 'cb37f959a7ddabb1654c5b2b120e6367', '0b239418cd3b9d39b0d900bf6c69e040'),
(65, 'owo', 'toba', 'CD-botnet', '21232f297a57a5a743894a0e4a801fc3', 'moshoodk.saliu@gmail.com', '08137877844', 'akuy', 'N', '2019-01-27', NULL, 'b18e7e839c4d662cde434bfde297d56c', 'a4a918385ad3ad37179aad05caa32d5f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_currency`
--
ALTER TABLE `e_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `e_currency`
--
ALTER TABLE `e_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
