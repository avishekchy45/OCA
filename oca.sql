-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 09:30 PM
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
  `PASS` varchar(255) NOT NULL DEFAULT '''123456'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `PASS`) VALUES
('admin', '$2y$10$yBMcfjDjNOQn1lkp9eVBDuVcMrpMSSkAVTcPuR7INgmYE2JqoTW2i');

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
('2020-10-29 06:19:19', 'adminall53', 'admin', 'all', 'We are now hosted at https://online-class-assitance.000webhostapp.com/');

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
  `PASS` varchar(255) NOT NULL DEFAULT '''123456''',
  `PHOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`REGISTRATION`, `NAME`, `ID`, `EMAIL`, `PHONENUMBER`, `BIRTHDATE`, `GENDER`, `LANGUAGES`, `ABOUT`, `PASS`, `PHOTO`) VALUES
('2020-10-16 09:51:18', 'MOHAMMED HASAN', 'mehedihasan', 'mehedihasan249@gmail.com', NULL, NULL, 'Male', NULL, 'Expert in Database Management System', '$2y$10$B81SewSfDkiyOiccFZM2g.AmT34L5KEER0esJWmNw4vXGnYZkZbVi', 'I-mehedihasan.jpg'),
('2020-10-16 09:51:18', 'SYED MD. MINHAZ HOSSAIN', 'minhazpuccse', '', NULL, NULL, 'Male', NULL, NULL, '$2y$10$B81SewSfDkiyOiccFZM2g.AmT34L5KEER0esJWmNw4vXGnYZkZbVi', 'I-minhazpuccse.jpg');

--
-- Triggers `instructor`
--
DELIMITER $$
CREATE TRIGGER `INSPASSUPDATE` AFTER UPDATE ON `instructor` FOR EACH ROW INSERT INTO passchange
SET
    id = old.ID,
    CHANGEDdate = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `passchange`
--

CREATE TABLE `passchange` (
  `ID` varchar(255) NOT NULL,
  `CHANGEDDATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passchange`
--

INSERT INTO `passchange` (`ID`, `CHANGEDDATE`) VALUES
('avishekchy45', '2020-11-21 21:07:52'),
('avishekchy45', '2020-11-21 21:08:07'),
('avishekchy54', '2020-11-21 21:12:08'),
('avishekchy54', '2020-11-21 21:12:41'),
('mehedihasan', '2020-11-22 06:16:09'),
('mehedihasan', '2020-11-22 07:13:04'),
('mehedihasan', '2020-11-24 18:55:33'),
('mehedihasan', '2020-11-24 18:56:37'),
('avishekchy45', '2020-11-24 19:19:45'),
('avishekchy45', '2020-11-24 19:20:37'),
('new', '2020-11-24 19:29:01'),
('new', '2020-11-24 19:30:01'),
('new', '2020-11-24 19:30:33'),
('new', '2020-11-24 19:31:34'),
('new', '2020-11-24 19:32:15'),
('new', '2020-11-24 19:32:31'),
('new', '2020-11-24 19:32:49'),
('new', '2020-11-24 19:33:06'),
('new', '2020-11-24 19:34:35'),
('avishekchy45', '2021-02-25 20:10:02'),
('saionty45', '2021-02-25 20:11:12'),
('meghla45', '2021-02-25 20:11:45'),
('mehedihasan', '2021-02-25 20:12:30'),
('minhazpuccse', '2021-02-25 20:12:37');

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
  `PASS` varchar(255) NOT NULL DEFAULT '''123456''',
  `PHOTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`REGISTRATION`, `NAME`, `ID`, `EMAIL`, `PHONENUMBER`, `BIRTHDATE`, `GENDER`, `LANGUAGES`, `ABOUT`, `PASS`, `PHOTO`) VALUES
('2020-10-14 11:35:34', 'Avishek Chowdhury', 'avishekchy45', 'avishekchy45@gmail.com', '', NULL, 'Male', 'Bangla, English', 'Aa1234', '$2y$10$B81SewSfDkiyOiccFZM2g.AmT34L5KEER0esJWmNw4vXGnYZkZbVi', 'S-avishekchy45.webp'),
('2020-10-25 10:57:48', 'Meghla Singha', 'meghla45', 'meghlasingha45@gmail.com', '01827720378', '0000-00-00', 'Female', '', 'Aa1234', '$2y$10$B81SewSfDkiyOiccFZM2g.AmT34L5KEER0esJWmNw4vXGnYZkZbVi', 'S-meghla45.jpg'),
('2020-10-25 10:51:40', 'Saionty Singha', 'saionty45', 'saiontysingha45@gmail.com', '01827720378', '0000-00-00', 'Female', 'Bangla', 'Aa1234', '$2y$10$B81SewSfDkiyOiccFZM2g.AmT34L5KEER0esJWmNw4vXGnYZkZbVi', 'S-saionty45.webp');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `STUPASSUPDATE` AFTER UPDATE ON `student` FOR EACH ROW INSERT INTO passchange
SET
    id = old.ID,
    CHANGEDdate = NOW()
$$
DELIMITER ;

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
