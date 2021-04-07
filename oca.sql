-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 05:03 PM
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
  `PASS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `PASS`) VALUES
('admin', 'admin'),
('co-admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `COURSE_CODE` varchar(255) NOT NULL,
  `SECTION_ID` varchar(255) NOT NULL,
  `INS_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`COURSE_CODE`, `SECTION_ID`, `INS_ID`) VALUES
('MGT 203(V3)', 'C4A', 'avishekchy54'),
('OCA 101', 'C1A', 'avishekchy54'),
('CSE 237', 'C4A', 'mehedihasan'),
('CSE 237(V3)', 'C4A', 'mehedihasan'),
('CSE 238(V3)', 'C4A', 'mehedihasan'),
('CSE 238(V3)', 'C4D', 'mehedihasan'),
('CSE 305(V3)', 'C5A', 'mehedihasan'),
('CSE 225(V3)', 'C4A', 'minhazpuccse'),
('CSE 226(V3)', 'C4A', 'minhazpuccse'),
('CSE 226(V3)', 'C4D', 'minhazpuccse');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `MSG_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `CHAT_ID` varchar(255) NOT NULL,
  `SENDER` varchar(255) NOT NULL,
  `RECEIVER` varchar(255) NOT NULL,
  `MESSAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`MSG_TIME`, `CHAT_ID`, `SENDER`, `RECEIVER`, `MESSAGE`) VALUES
('2020-10-26 15:22:49', 'adminall28', 'admin', 'all', 'Welcome everyone...'),
('2020-10-29 06:19:19', 'adminall53', 'admin', 'all', 'Hello...');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `COURSE_CODE` varchar(255) NOT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  `CREDIT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_CODE`, `TITLE`, `CREDIT`) VALUES
('CSE 225(V3)', 'Algorithm Design And Analysis', 3),
('CSE 226(V3)', 'Algorithm Design And Analysis Laboratory', 1),
('CSE 237', 'DATABASE MANAGEMENT', 3),
('CSE 237(V3)', 'Database Management System', 3),
('CSE 238(V3)', 'Database Management System Laboratory', 1.5),
('CSE 305(V3)', 'Software Engineering & Information System Design', 4),
('EEE 201(V3)', 'Signals & Systems', 3),
('EEE 202(V3)', 'Signals & Systems Laboratory', 1),
('MGT 203(V3)', 'Industrial & Business Management', 3),
('OCA 101', 'DEMO CLASS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `NAME` varchar(255) NOT NULL,
  `ID` varchar(255) NOT NULL,
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
('2020-10-14 16:03:07', 'Avishek Chowdhury', 'avishekchy54', 'avishekchy54@gmail.com', '01816486550', '0000-00-00', 'Male', 'Bangla, English', '', '123456', 'I-avishekchy54.jpg'),
('2020-09-05 15:23:02', 'Avishek Chowdhury', 'I-1020', 'avishekchy54@gmail.com', '', '0000-00-00', 'Male', '', 'I am the first instructor of OCA.\r\nI am the first instructor of OCA.\r\nI am the first instructor of OCA.', 'aA1234', 'I-1020.jpg'),
('2020-10-16 09:51:18', 'MOHAMMED HASAN', 'mehedihasan', '', NULL, NULL, 'Male', NULL, NULL, 'Aa1234', 'I-mehedihasan.jpg'),
('2020-10-16 09:51:18', 'SYED MD. MINHAZ HOSSAIN', 'minhazpuccse', '', NULL, NULL, 'Male', NULL, NULL, 'Aa1234', 'I-minhazpuccse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `POSTED_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `POST_ID` varchar(255) NOT NULL,
  `COURSE_CODE` varchar(255) NOT NULL,
  `SECTION_ID` varchar(255) NOT NULL,
  `MATERIAL` varchar(255) NOT NULL,
  `POSTED_BY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`POSTED_TIME`, `POST_ID`, `COURSE_CODE`, `SECTION_ID`, `MATERIAL`, `POSTED_BY`) VALUES
('2020-10-25 17:49:19', 'OCA 101C1A33', 'OCA 101', 'C1A', 'THANKS...', 'avishekchy45'),
('2020-10-25 17:47:38', 'OCA 101C1A59', 'OCA 101', 'C1A', 'Hello Students...', 'avishekchy54');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `NAME` varchar(255) NOT NULL,
  `ID` varchar(255) NOT NULL,
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
('2020-10-14 11:35:34', 'Avishek Chowdhury', 'avishekchy45', 'avishekchy45@gmail.com', '', '0000-00-00', 'Male', '', '', '123456', 'S-avishekchy45.webp'),
('2020-10-14 16:18:29', 'Bill Gates', 'bill', 'bill@outlook.com', '', '0000-00-00', 'Male', 'English', '', 'Aa1234', 'S-bill.jpg'),
('2020-10-25 10:57:48', 'Meghla Singha', 'meghla45', 'meghlasingha45@gmail.com', '01827720378', '0000-00-00', 'Female', '', '', 'Aa1234', 'S-meghla45.jpg'),
('2020-09-05 15:31:39', 'Avishek Chowdhury', 'S-1803410201578', 'avishekchy45@gmail.com', '01816486550', '1999-11-29', 'Male', 'Bangla, English', 'I am the first LEARNER of OCA...\r\nI am the first LEARNER of OCA...\r\nI am the first LEARNER of OCA...', 'aA1234', 'S-1803410201578.webp'),
('2020-10-25 10:51:40', 'Saionty Singha', 'saionty45', 'saiontysingha45@gmail.com', '01827720378', '0000-00-00', 'Female', 'Bangla', '', 'Aa1234', 'S-saionty45.webp'),
('2020-10-14 16:20:24', 'Steve Jobs', 'stevejobs', 'jobs@yahoo.com', '', '0000-00-00', 'Male', 'English', '', 'Aa1234', 'S-stevejobs.jpeg'),
('2020-10-14 16:15:28', 'Mark Zuckerberg ', 'zuck', 'zuck@fbmail.com', '', '0000-00-00', 'Male', 'English', '', 'Aa1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `COURSE_CODE` varchar(255) NOT NULL,
  `SECTION_ID` varchar(255) DEFAULT NULL,
  `STD_ID` varchar(255) NOT NULL,
  `CSTATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`COURSE_CODE`, `SECTION_ID`, `STD_ID`, `CSTATUS`) VALUES
('CSE 225(V3)', 'C4A', 'stevejobs', 'ACCEPTED'),
('CSE 226(V3)', 'C4A', 'bill', 'pending'),
('CSE 237', 'C4A', 'avishekchy45', 'ACCEPTED'),
('CSE 237(V3)', 'C4A', 'bill', 'pending'),
('CSE 237(V3)', 'C4A', 'stevejobs', 'pending'),
('CSE 238(V3)', 'C4D', 'bill', 'pending'),
('CSE 238(V3)', 'C4A', 'stevejobs', 'ACCEPTED'),
('CSE 238(V3)', 'C4A', 'zuck', 'pending'),
('CSE 305(V3)', 'C5A', 'zuck', 'pending'),
('MGT 203(V3)', 'C4A', 'stevejobs', 'SUSPENDED'),
('OCA 101', 'C1A', 'avishekchy45', 'ACCEPTED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`COURSE_CODE`,`SECTION_ID`),
  ADD KEY `assign_ins` (`INS_ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`CHAT_ID`),
  ADD KEY `admin_msg` (`SENDER`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_CODE`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `post_course` (`COURSE_CODE`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`COURSE_CODE`,`STD_ID`),
  ADD KEY `taken_std` (`STD_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_course` FOREIGN KEY (`COURSE_CODE`) REFERENCES `course` (`COURSE_CODE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_ins` FOREIGN KEY (`INS_ID`) REFERENCES `instructor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `admin_msg` FOREIGN KEY (`SENDER`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_course` FOREIGN KEY (`COURSE_CODE`) REFERENCES `assign` (`COURSE_CODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `taken_course` FOREIGN KEY (`COURSE_CODE`) REFERENCES `assign` (`COURSE_CODE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taken_std` FOREIGN KEY (`STD_ID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
