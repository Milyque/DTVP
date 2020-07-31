-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2019 at 12:34 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lians`
--

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `id` int(11) NOT NULL,
  `TransactionType` varchar(40) NOT NULL,
  `TransID` varchar(40) NOT NULL,
  `TransTime` datetime(6) NOT NULL,
  `TransAmount` double NOT NULL,
  `BusinessShortCode` varchar(15) NOT NULL,
  `BillRefNumber` varchar(40) NOT NULL,
  `InvoiceNumber` varchar(40) NOT NULL,
  `MSISDN` varchar(20) NOT NULL,
  `FirstName` varchar(60) NOT NULL,
  `MiddleName` varchar(60) NOT NULL,
  `LastName` varchar(60) NOT NULL,
  `OrgAccountBalance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa_payments`
--

INSERT INTO `mpesa_payments` (`id`, `TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`, `OrgAccountBalance`) VALUES
(1, 'Pay Bill', 'LAW5673KKY', '2019-07-04 11:54:06.000000', 0.09, '999999', 'SAMPLE ACCOUNT 101', '', '254000000000', 'JOHN', 'M.', 'DOE', 0.09),
(2, 'Pay Bill', 'LAW5673KKY', '2019-07-04 11:54:06.000000', 0.09, '999999', 'SAMPLE ACCOUNT 101', '', '254000000000', 'JOHN', 'M.', 'DOE', 0.09);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
