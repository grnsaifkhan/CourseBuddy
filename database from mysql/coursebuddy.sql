-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 06:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursebuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminid` int(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminid`, `email`, `password`) VALUES
(1, 'admin@northsouth.edu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(20) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `credit` float NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `course_name`, `credit`, `department`) VALUES
(1, 'cse115', 3, 'cse'),
(2, 'cse115L', 1, 'cse'),
(3, 'cse215', 3, 'cse'),
(4, 'cse215L', 3, 'cse'),
(5, 'cse225', 3, 'cse'),
(6, 'cse225L', 1, 'cse'),
(7, 'cse173', 3, 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `current_course_list`
--

CREATE TABLE `current_course_list` (
  `id` int(20) NOT NULL,
  `coursename` varchar(20) NOT NULL,
  `faculty_email` varchar(64) NOT NULL,
  `faculty_initial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_course_list`
--

INSERT INTO `current_course_list` (`id`, `coursename`, `faculty_email`, `faculty_initial`) VALUES
(1, 'cse115', 'saif789@gmail.com', 'sfk'),
(2, 'cse115L', 'saif789@gmail.com', 'sfk');

-- --------------------------------------------------------

--
-- Table structure for table `facreg`
--

CREATE TABLE `facreg` (
  `facid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `institute` varchar(64) NOT NULL,
  `department` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facreg`
--

INSERT INTO `facreg` (`facid`, `fname`, `lname`, `username`, `institute`, `department`, `email`, `password`, `gender`, `dob`) VALUES
(33, 'saif', 'khan', 'sfk', 'North South University', 'cse', 'saif789@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1992-07-18'),
(34, 'sazid', 'khan', 'szd', 'japan institute', 'architecture', 'sazid1234@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1995-08-18'),
(35, 'sifat', 'khan', 'sft', 'North South University', 'eee', 'sifat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1992-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `stdgrd`
--

CREATE TABLE `stdgrd` (
  `id` int(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `grade` float NOT NULL,
  `credit` float NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdgrd`
--

INSERT INTO `stdgrd` (`id`, `course`, `grade`, `credit`, `email`) VALUES
(12, 'cse135', 3.3, 3, 'sazid@gmail.com'),
(13, 'cse115', 3.3, 3, 'sazid@gmail.com'),
(14, 'cse115L', 3.7, 1, 'sazid@gmail.com'),
(15, 'cse173', 4, 3, 'sazid@gmail.com'),
(33, 'cse115', 2.3, 3, 'sifatkhan@gmail.com'),
(34, 'cse115L', 1.7, 1, 'sifatkhan@gmail.com'),
(36, 'eng103', 2.7, 3, 'sifatkhan@gmail.com'),
(38, 'mat116', 3, 3, 'sifatkhan@gmail.com'),
(39, 'mat116', 3, 3, 'sifatkhan@gmail.com'),
(41, 'cse231', 4, 3, 'saif789@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stdreg`
--

CREATE TABLE `stdreg` (
  `stdid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `institute` varchar(64) NOT NULL,
  `department` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdreg`
--

INSERT INTO `stdreg` (`stdid`, `fname`, `lname`, `username`, `institute`, `department`, `email`, `password`, `gender`, `dob`) VALUES
(2, 'sifat', 'khan', 'sifatkhan', 'North South University', 'CSE', 'sifatkhan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1994-08-13'),
(14, 'sazid', 'khan', 'sazidkhan', 'North South University', 'Auto-mobile eng.', 'sazid@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'male', '1991-02-10'),
(15, 'saif', 'khan', 'saif1234', 'North South University', 'CSE', 'saif1890@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '1988-06-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_course_list`
--
ALTER TABLE `current_course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facreg`
--
ALTER TABLE `facreg`
  ADD PRIMARY KEY (`facid`);

--
-- Indexes for table `stdgrd`
--
ALTER TABLE `stdgrd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdreg`
--
ALTER TABLE `stdreg`
  ADD PRIMARY KEY (`stdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `adminid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `current_course_list`
--
ALTER TABLE `current_course_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facreg`
--
ALTER TABLE `facreg`
  MODIFY `facid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `stdgrd`
--
ALTER TABLE `stdgrd`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `stdreg`
--
ALTER TABLE `stdreg`
  MODIFY `stdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
