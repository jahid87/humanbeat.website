-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 09:13 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `Name` varchar(100) DEFAULT NULL,
  `ID` varchar(100) DEFAULT NULL,
  `Dept` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`Name`, `ID`, `Dept`, `Subject`, `Img`) VALUES
('', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Doctors` int(11) NOT NULL,
  `Patients` int(11) NOT NULL,
  `HelpDesk` int(11) NOT NULL,
  `Labroom` int(11) NOT NULL,
  `ICU` int(11) NOT NULL,
  `Authority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Name` varchar(100) NOT NULL,
  `ID` varchar(100) NOT NULL,
  `Speciality` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Visiting hour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `helpcenter`
--

CREATE TABLE `helpcenter` (
  `Location` varchar(100) NOT NULL,
  `phoneNumber` int(100) NOT NULL,
  `Emergency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `img1` varchar(500) NOT NULL,
  `img2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Name` varchar(100) DEFAULT NULL,
  `ID` int(100) NOT NULL,
  `Disease` varchar(100) NOT NULL,
  `RoomNo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `DoctorName` int(11) NOT NULL,
  `PatientName` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `SerialNo` int(11) NOT NULL,
  `Visiting hour` int(11) NOT NULL,
  `payment system` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
