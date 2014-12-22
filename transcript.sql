-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2014 at 01:36 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transcript`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `role` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`role`, `username`, `password`) VALUES
('Bio', 'oluchime', 'friday'),
('Result', 'mezie', 'mezie');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `course_code` int(11) NOT NULL,
  `course_title` varchar(225) NOT NULL,
  `credit_unit` int(1) NOT NULL,
  PRIMARY KEY (`course_title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric` int(9) NOT NULL,
  `level` varchar(3) NOT NULL,
  `section` varchar(10) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `course` varchar(255) NOT NULL,
  `code` varchar(7) NOT NULL,
  `unit` int(1) NOT NULL,
  `score` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `matric`, `level`, `section`, `semester`, `course`, `code`, `unit`, `score`) VALUES
(1, 118171046, 'ND1', '2011/2012', 'First', 'Introduction to Computing', 'COM 101', 3, 50),
(2, 118171046, 'ND1', '2011/2012', 'First', 'Introduction to Digital Electronics', 'COM 112', 3, 40),
(3, 118171046, 'ND1', '2011/2012', 'First', 'Library User Education', 'LIB 100', 1, 60),
(4, 118171046, 'ND1', '2011/2012', 'First', 'Citizenship Education I', 'GNS 111', 2, 56),
(5, 118171046, 'ND1', '2011/2012', 'First', 'Technical English I', 'OTM 112', 2, 65),
(6, 118171046, 'ND1', '2011/2012', 'First', 'Introduction to Computer Programming', 'COM 113', 3, 45),
(7, 118171046, 'ND1', '2011/2012', 'Second', 'Computer Packages I', 'COM 123', 3, 65),
(8, 118171046, '---', '2011/2012', 'Second', 'Elementary Probabilty Theory', 'STAT 11', 3, 55),
(9, 118171046, 'ND1', '2011/2012', 'Second', 'Introduction to The Internet', 'COM 122', 3, 70),
(10, 118171046, 'ND1', '2011/2012', 'Second', 'OO Java', 'COM 121', 4, 56),
(11, 118171046, 'ND1', '2011/2012', 'Second', 'Citizenship Education II', 'GNS 121', 2, 65),
(12, 118171046, 'ND2', '2012/2013', 'First', 'System Analysis And Design', 'COM 125', 3, 89),
(13, 118171046, 'ND2', '2012/2013', 'First', 'Computer Packages II', 'COM 215', 4, 56),
(14, 118171046, 'ND2', '2012/2013', 'First', 'Data Structure And Algorithm', 'COM 124', 4, 66),
(15, 118171046, 'ND2', '2012/2013', 'First', 'PC Upgrade And Maintenance', 'COM 126', 4, 80),
(16, 118171046, 'ND2', '2012/2013', 'Second', 'OO Basic', 'COM 211', 4, 75),
(17, 118171046, 'ND2', '2012/2013', 'Second', 'OO Cobol', 'COM 213', 4, 77),
(18, 118171046, 'ND2', '2012/2013', 'Second', 'File Organization And Management', 'COM 214', 3, 78),
(19, 118171046, 'ND2', '2012/2013', 'Second', 'Introduction to System programming', 'COM 212', 3, 78),
(20, 118171046, 'ND2', '2012/2013', 'Second', 'Introduction to Enterpreneurship', 'EED126', 2, 85),
(21, 118171046, 'ND3', '2013/2014', 'First', 'Computer System troubleshooting I', 'COM216', 4, 68),
(22, 118171046, 'ND3', '2013/2014', 'First', 'Basic Hardware Maintenance', 'COM 223', 4, 78),
(23, 118171046, 'ND3', '2013/2014', 'First', 'OO Fortran', 'COM 221', 4, 78),
(24, 118171046, 'ND3', '2013/2014', 'Second', 'Web Technology', 'COM 225', 4, 80),
(25, 118171046, 'ND3', '2013/2014', 'Second', 'Management Information System', 'COM 124', 3, 70),
(26, 118171046, 'ND3', '2013/2014', 'Second', 'Project', 'COM 126', 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `matric` int(9) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`matric`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`matric`, `email`, `password`) VALUES
(118171046, 'meziemichael@gmail.com', 'oluchime'),
(118171050, 'famakinjohnson@yahoo.com', 'yemimylover'),
(118171047, 'blessing@gmail.com', 'blessing'),
(118171049, 'falooro@mail.com', 'falooro'),
(118171055, 'mhjdjk@hk.gj', 'friday'),
(118171089, 'meh@hj.vi', 'oluchime');

-- --------------------------------------------------------

--
-- Table structure for table `students_bio`
--

CREATE TABLE IF NOT EXISTS `students_bio` (
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `matric` int(9) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(60) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`matric`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_bio`
--

INSERT INTO `students_bio` (`fname`, `mname`, `lname`, `matric`, `dept`, `phone`, `pic`, `dob`, `state`, `lga`, `address`, `gender`) VALUES
('Chimezie', 'Michael', 'Enyinnaya', 118171046, 'Computer Science', 2147483647, 'mezie.jpg', '1991-06-21', 'Abia', 'Ikwuano', '39, Ogunfowodu street, Ayomide Estate Ogijo', 'Male'),
('Akinbode', 'Johnson', 'Famakin', 118171050, 'Computer Science', 2147483647, 'akin.jpg', '1995-10-05', 'Akwa Ibom', 'nomo', 'igbogbo', 'Male'),
('Agatha', 'Blessing', 'Esimokha', 118171047, 'Computer Science', 2147483647, 'blessing.jpg', '1991-06-21', 'Delta', 'asaba', 'Odongunyan', 'Female'),
('Gboyega', 'Babatunde', 'Faloooro', 118171049, 'Computer Science', 7032047179, 'falooro.jpg', '2014-09-02', 'Akwa Ibom', 'nomo', 'kolou', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
