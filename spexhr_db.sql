-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 12:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spexhr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(200) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251');

-- --------------------------------------------------------

--
-- Table structure for table `employeee_dependant`
--

CREATE TABLE `employeee_dependant` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  `employeeName` varchar(150) NOT NULL,
  `dependantName` varchar(100) NOT NULL,
  `dependantBirthday` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeee_dependant`
--

INSERT INTO `employeee_dependant` (`id`, `uuid`, `employeeName`, `dependantName`, `dependantBirthday`) VALUES
(52, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', 'MarvinGabaynoApolinar', 'Juan Dela Cruz', '2021-09-01'),
(53, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', 'MarvinGabaynoApolinar', 'Jose Dela Cruz', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_arinfo`
--

CREATE TABLE `employee_arinfo` (
  `id` int(11) NOT NULL,
  `agency` varchar(40) NOT NULL,
  `allowances` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_einfo`
--

CREATE TABLE `employee_einfo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `schoolname` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `yeargraduated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_einfo`
--

INSERT INTO `employee_einfo` (`id`, `uuid`, `fullname`, `schoolname`, `address`, `degree`, `yeargraduated`) VALUES
(13, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', 'MarvinGabaynoApolinar', 'Santa Maria National Highschool', 'Santa Maria, Bulacan', 'Secondary', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `employee_ginfo`
--

CREATE TABLE `employee_ginfo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  `g1` int(11) DEFAULT NULL,
  `g2` varchar(50) DEFAULT NULL,
  `g3` varchar(50) DEFAULT NULL,
  `g4` varchar(50) DEFAULT NULL,
  `g5` varchar(50) DEFAULT NULL,
  `g6` varchar(50) DEFAULT NULL,
  `g7` varchar(50) DEFAULT NULL,
  `g8` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_ginfo`
--

INSERT INTO `employee_ginfo` (`id`, `uuid`, `g1`, `g2`, `g3`, `g4`, `g5`, `g6`, `g7`, `g8`) VALUES
(1, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', 15000, '', '', '', 'G5', 'NO', 'd2', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_minfo`
--

CREATE TABLE `employee_minfo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  `m1` varchar(500) DEFAULT NULL,
  `m2` varchar(500) DEFAULT NULL,
  `s1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_minfo`
--

INSERT INTO `employee_minfo` (`id`, `uuid`, `m1`, `m2`, `s1`) VALUES
(12, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', '', '', 's1,s2,');

-- --------------------------------------------------------

--
-- Table structure for table `employee_pinfo`
--

CREATE TABLE `employee_pinfo` (
  `id` int(11) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `position` varchar(50) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `birthplace` varchar(15) NOT NULL,
  `citizenship` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `civilstatus` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `sssno` varchar(20) NOT NULL,
  `pagibigno` varchar(20) NOT NULL,
  `tinno` varchar(20) NOT NULL,
  `philhealthno` varchar(20) NOT NULL,
  `nameofhusband` varchar(150) NOT NULL,
  `occupationofhusband` varchar(150) NOT NULL,
  `nameofwife` varchar(150) NOT NULL,
  `occupationofwife` varchar(150) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `uuid` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_pinfo`
--

INSERT INTO `employee_pinfo` (`id`, `lname`, `fname`, `mname`, `position`, `birthday`, `birthplace`, `citizenship`, `sex`, `contactno`, `civilstatus`, `address`, `sssno`, `pagibigno`, `tinno`, `philhealthno`, `nameofhusband`, `occupationofhusband`, `nameofwife`, `occupationofwife`, `filename`, `uuid`) VALUES
(61, 'Apolinar', 'Marvin', 'Gabayno', 'Software Developer', '1998-07-24', 'Santa Cruz, San', 'Filipino', 'MALE', '09123456789', 'SINGLE', 'Santa Cruz, Santa Maria, Bulacan', '1231-21312-23', '1231-21312-23', '1231-21312-23', '1231-21312-23', '', '', '', '', 'MarvinGabaynoApolinar_46fa42a3-fc41-4ab1-9f8c-f33590d37552_profile.png', '46fa42a3-fc41-4ab1-9f8c-f33590d37552');

-- --------------------------------------------------------

--
-- Table structure for table `employee_winfo`
--

CREATE TABLE `employee_winfo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `workname` varchar(250) NOT NULL,
  `datefrom` varchar(50) NOT NULL,
  `dateto` varchar(50) NOT NULL,
  `natureofwork` varchar(50) NOT NULL,
  `salary1` varchar(20) NOT NULL,
  `salary2` varchar(20) NOT NULL,
  `txtReason1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_winfo`
--

INSERT INTO `employee_winfo` (`id`, `uuid`, `workname`, `datefrom`, `dateto`, `natureofwork`, `salary1`, `salary2`, `txtReason1`) VALUES
(7, '46fa42a3-fc41-4ab1-9f8c-f33590d37552', 'Sample 1', '2021-09-01', '2021-09-30', 'TEST', '15000', '25000', 'TEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeee_dependant`
--
ALTER TABLE `employeee_dependant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_einfo`
--
ALTER TABLE `employee_einfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_ginfo`
--
ALTER TABLE `employee_ginfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_minfo`
--
ALTER TABLE `employee_minfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_pinfo`
--
ALTER TABLE `employee_pinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_winfo`
--
ALTER TABLE `employee_winfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeee_dependant`
--
ALTER TABLE `employeee_dependant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `employee_einfo`
--
ALTER TABLE `employee_einfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_ginfo`
--
ALTER TABLE `employee_ginfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_minfo`
--
ALTER TABLE `employee_minfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_pinfo`
--
ALTER TABLE `employee_pinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `employee_winfo`
--
ALTER TABLE `employee_winfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
