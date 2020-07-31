-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 04:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branding`
--

CREATE TABLE `branding` (
  `b_id` int(11) NOT NULL,
  `comp_reg` varchar(50) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `county` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branding`
--

INSERT INTO `branding` (`b_id`, `comp_reg`, `plate_no`, `date`, `county`) VALUES
(1, 'ken/netectron/020', 'Kbq 157z', '2020-04-20', 'Mombasa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `comp_reg` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `comp_name`, `comp_reg`, `email`, `pass`, `cpass`) VALUES
(2, 'Broadways', 'comp/d/kl/016', 'broadway@gmail.com', 'qazxswedc', 'qazxswedc'),
(3, 'Netectrons', 'ken/netectron/020', 'netectron@gmail.com', 'qwertyui', 'qwertyui'),
(5, 'Mackel', 'mack/computer/2016', 'mack@computer.com', '123456789', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_reg`
--

CREATE TABLE `vehicle_reg` (
  `v_id` int(11) NOT NULL,
  `comp_reg` varchar(11) NOT NULL,
  `plate_no` varchar(10) NOT NULL,
  `county` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_reg`
--

INSERT INTO `vehicle_reg` (`v_id`, `comp_reg`, `plate_no`, `county`, `status`, `date`) VALUES
(8, 'ken/netectr', 'KBB 231D', 'Kakamega', '', '2020-04-12'),
(9, 'comp/d/kl/0', 'KBF 056R', 'Kisumu', '', '2020-04-15'),
(11, 'comp/d/kl/0', 'kcd192z', 'Mombasa', '', '2020-04-09'),
(18, 'comp/d/kl/0', 'kad 479d', 'Kakamega', '', '2020-04-14'),
(20, 'comp/d/kl/0', 'KAZ 123E', 'Nakuru', '', '2020-04-14'),
(24, 'supp/ram/1/', 'KAZ 739K', 'Kisii', '', '2020-04-20'),
(26, 'ken/netectr', 'KBB 539D', 'Mombasa', '', '2020-04-21'),
(27, 'ken/netectr', 'KBX 510T', 'Nairobi', '', '2020-04-21'),
(28, 'ken/netectr', 'KAB 111S', 'Nakuru', '', '2020-04-21'),
(29, 'ken/netectr', 'KAZ 123E', 'Kisumu', '', '2020-04-22'),
(30, 'comp/d/kl/0', 'kad 479d', 'Nakuru', '', '2020-04-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `branding`
--
ALTER TABLE `branding`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vehicle_reg`
--
ALTER TABLE `vehicle_reg`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `userID` (`comp_reg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branding`
--
ALTER TABLE `branding`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_reg`
--
ALTER TABLE `vehicle_reg`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
