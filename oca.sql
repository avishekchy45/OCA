-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 11:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` varchar(15) NOT NULL,
  `PASS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `PASS`) VALUES
('admin', '123456'),
('admin2', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `NAME` varchar(255) NOT NULL,
  `ID` varchar(15) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONENUMBER` varchar(15) DEFAULT NULL,
  `BIRTHDATE` date DEFAULT NULL,
  `GENDER` char(7) NOT NULL,
  `LANGUAGES` varchar(255) DEFAULT NULL,
  `ABOUT` tinytext DEFAULT NULL,
  `PASS` varchar(255) NOT NULL DEFAULT '123456',
  `PHOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`REGISTRATION`, `NAME`, `ID`, `EMAIL`, `PHONENUMBER`, `BIRTHDATE`, `GENDER`, `LANGUAGES`, `ABOUT`, `PASS`, `PHOTO`) VALUES
('2020-09-10 21:36:49', 'Avishek Chowdhury', '1578', 'avishekchy45@gmail.com', '01816486550', '1999-11-29', 'Male', 'Bangla, English', '', 'Aa1234', ''),
('2020-09-05 15:23:02', 'AVISHEK CHOWDHURY', 'MAC45', 'avishekchy54@gmail.com', '', '0000-00-00', 'Male', '', 'I am the first instructor of OCA.\r\nI am the first instructor of OCA.\r\nI am the first instructor of OCA.', 'Aa1234', 'MAC45.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `NAME` varchar(255) NOT NULL,
  `ID` varchar(15) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONENUMBER` varchar(15) DEFAULT NULL,
  `BIRTHDATE` date DEFAULT NULL,
  `GENDER` char(7) NOT NULL,
  `LANGUAGES` varchar(255) DEFAULT NULL,
  `ABOUT` tinytext DEFAULT NULL,
  `PASS` varchar(255) NOT NULL DEFAULT '123456',
  `PHOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`REGISTRATION`, `NAME`, `ID`, `EMAIL`, `PHONENUMBER`, `BIRTHDATE`, `GENDER`, `LANGUAGES`, `ABOUT`, `PASS`, `PHOTO`) VALUES
('2020-09-10 21:38:40', 'Avishek Chowdhury', '1578', 'avishekchy45@gmail.com', '', '0000-00-00', 'Male', '', '', 'Aa1234', ''),
('2020-09-05 15:31:39', 'Avishek Chowdhury', '1803410201578', 'avishekchy45@gmail.com', '01816486550', '1999-11-29', 'Male', 'Bangla, English', 'I am the first LEARNER of OCA...\r\nI am the first LEARNER of OCA...\r\nI am the first LEARNER of OCA...', 'aA1234', '1803410201578.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
