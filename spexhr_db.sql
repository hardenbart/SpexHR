-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 01:40 PM
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
(32, '7441496e-ee8f-4612-aeb9-be24f62cfee4', 'MarvinGabaynoApolinar', 'Juan Dela Cruz', '2021-08-01'),
(33, '7441496e-ee8f-4612-aeb9-be24f62cfee4', 'MarvinGabaynoApolinar', 'Sample 1', '2021-08-18'),
(34, '7441496e-ee8f-4612-aeb9-be24f62cfee4', 'MarvinGabaynoApolinar', 'asd', '2021-08-19');

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
(4, '7441496e-ee8f-4612-aeb9-be24f62cfee4', 'MarvinGabaynoApolinar', 'Sacred Heart Academy', 'Santa Maria, Bulacan', 'Secondary', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `employee_minfo`
--

CREATE TABLE `employee_minfo` (
  `id` int(11) NOT NULL,
  `uuid` varchar(150) NOT NULL,
  `m1` varchar(500) NOT NULL,
  `m2` varchar(500) NOT NULL,
  `s1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(48, 'Apolinar', 'Marvin', 'Gabayno', 'Software Developer', '2021-08-01', 'Santa Cruz, San', 'Filipino', 'MALE', '09212164686', 'SINGLE', 'Santa Cruz, Santa Maria, Bulacan', '1231-21312-23', '1231-21312-23', '1231-21312-23', '1231-21312-23', '', '', '', '', 'MarvinGabaynoApolinar_7441496e-ee8f-4612-aeb9-be24f62cfee4_profile.png', '7441496e-ee8f-4612-aeb9-be24f62cfee4');

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
-- Indexes for table `employee_pinfo`
--
ALTER TABLE `employee_pinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeee_dependant`
--
ALTER TABLE `employeee_dependant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee_einfo`
--
ALTER TABLE `employee_einfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_pinfo`
--
ALTER TABLE `employee_pinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
