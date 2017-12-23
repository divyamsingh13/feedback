-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2017 at 05:05 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '9948b2587fe40b2ffd6faec84b1d7abe');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_id`, `name`, `department`) VALUES
(1, 'f01', 'ayush', 'cse'),
(2, 'f02', 'shivam', 'me'),
(3, 'f03', 'shubham', 'ece');

-- --------------------------------------------------------

--
-- Table structure for table `lab_assistant`
--

CREATE TABLE IF NOT EXISTS `lab_assistant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assistant_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lab_assistant`
--

INSERT INTO `lab_assistant` (`id`, `assistant_id`, `name`, `department`) VALUES
(1, 'l01', 'ritik', 'cse'),
(2, 'l02', 'jagmohan', 'me');

-- --------------------------------------------------------

--
-- Table structure for table `practical_faculty_response`
--

CREATE TABLE IF NOT EXISTS `practical_faculty_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `practical_faculty_response`
--

INSERT INTO `practical_faculty_response` (`id`, `student_id`, `faculty_id`, `subject`, `year`, `section`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES
(3, 4, 3, 'NCS-752', 4, 'CS-2', 2, 4, 2, 3, 5),
(4, 4, 2, 'NCS-752', 4, 'CS-2', 3, 3, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `practical_lab_assistant_response`
--

CREATE TABLE IF NOT EXISTS `practical_lab_assistant_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `la_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `faculty_id` (`la_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `practical_lab_assistant_response`
--

INSERT INTO `practical_lab_assistant_response` (`id`, `student_id`, `la_id`, `subject`, `year`, `section`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES
(2, 4, 2, 'NCS-752', 4, 'CS-2', 1, 5, 4, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `practical_questions`
--

CREATE TABLE IF NOT EXISTS `practical_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part` varchar(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `practical_questions`
--

INSERT INTO `practical_questions` (`id`, `part`, `question`) VALUES
(1, 'a', 'Coverage of experiments specified in the list of experiments'),
(2, 'a', 'Preparation and conduction of experiments'),
(3, 'a', 'Solving queries of experiments'),
(4, 'a', 'Quality of experiments'),
(5, 'a', 'Uniformity to cover the experiments during the semester'),
(6, 'b', 'Availability of lab staff for technical problems in experiments'),
(7, 'b', 'Assistance in conduct of experiments'),
(8, 'b', 'Involvement in up keeping of experiments'),
(9, 'b', 'Assistance in solving query of experiments'),
(10, 'b', 'Rate the lab in terms of facilities');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `f1` varchar(15) DEFAULT NULL,
  `t1` varchar(15) DEFAULT NULL,
  `n1` varchar(100) DEFAULT NULL,
  `f2` varchar(15) DEFAULT NULL,
  `t2` varchar(15) DEFAULT NULL,
  `n2` varchar(100) DEFAULT NULL,
  `f3` varchar(15) DEFAULT NULL,
  `t3` varchar(15) DEFAULT NULL,
  `n3` varchar(100) DEFAULT NULL,
  `f4` varchar(15) DEFAULT NULL,
  `t4` varchar(15) DEFAULT NULL,
  `n4` varchar(100) DEFAULT NULL,
  `f5` varchar(15) DEFAULT NULL,
  `t5` varchar(15) DEFAULT NULL,
  `n5` varchar(100) DEFAULT NULL,
  `f6` varchar(15) DEFAULT NULL,
  `t6` varchar(15) DEFAULT NULL,
  `n6` varchar(100) DEFAULT NULL,
  `f7` varchar(15) DEFAULT NULL,
  `t7` varchar(15) DEFAULT NULL,
  `n7` varchar(100) NOT NULL,
  `f11` varchar(15) DEFAULT NULL,
  `f12` varchar(15) DEFAULT NULL,
  `la1` varchar(15) DEFAULT NULL,
  `l1` varchar(15) DEFAULT NULL,
  `p1` varchar(100) DEFAULT NULL,
  `f21` varchar(15) DEFAULT NULL,
  `f22` varchar(15) DEFAULT NULL,
  `la2` varchar(15) DEFAULT NULL,
  `l2` varchar(15) DEFAULT NULL,
  `p2` varchar(100) DEFAULT NULL,
  `f31` varchar(15) DEFAULT NULL,
  `f32` varchar(15) DEFAULT NULL,
  `la3` varchar(15) DEFAULT NULL,
  `l3` varchar(15) DEFAULT NULL,
  `p3` varchar(100) NOT NULL,
  `f41` varchar(15) DEFAULT NULL,
  `f42` varchar(15) DEFAULT NULL,
  `la4` varchar(15) DEFAULT NULL,
  `l4` varchar(15) DEFAULT NULL,
  `p4` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rollno`, `name`, `year`, `section`, `semester`, `f1`, `t1`, `n1`, `f2`, `t2`, `n2`, `f3`, `t3`, `n3`, `f4`, `t4`, `n4`, `f5`, `t5`, `n5`, `f6`, `t6`, `n6`, `f7`, `t7`, `n7`, `f11`, `f12`, `la1`, `l1`, `p1`, `f21`, `f22`, `la2`, `l2`, `p2`, `f31`, `f32`, `la3`, `l3`, `p3`, `f41`, `f42`, `la4`, `l4`, `p4`) VALUES
(4, '1402710070', 'Anubhav', 4, 'CS-2', 7, 'f01', 'NCS-701', '', 'f02', 'NCS-702', '', 'f03', 'NCS-071', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', 'f01', 'f02', 'l01', 'NCS-751', NULL, 'f03', 'f02', 'l02', 'NCS-752', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theory_questions`
--

CREATE TABLE IF NOT EXISTS `theory_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part` varchar(5) NOT NULL,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `theory_questions`
--

INSERT INTO `theory_questions` (`id`, `part`, `question`) VALUES
(1, 'a', 'Coverage of the subject material specified in the syllabus.'),
(2, 'a', 'Preparation and organization of lectire.'),
(3, 'a', 'Presentation and Communication Skills.'),
(4, 'a', 'Quality of tutorial assignments'),
(5, 'a', 'Uniformity of pace in teaching during the semester.'),
(6, 'b', 'Were two class tests conducted.'),
(7, 'b', 'Were the illustrations and writings legible'),
(8, 'b', 'Was the voice clear and audible.'),
(9, 'b', 'Was the faculty accessible for clarification of doubts.'),
(10, 'b', 'Were the corrected answer sheets of class tests/sessional tests shown and discussed.');

-- --------------------------------------------------------

--
-- Table structure for table `theory_response`
--

CREATE TABLE IF NOT EXISTS `theory_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theory_response`
--

INSERT INTO `theory_response` (`id`, `student_id`, `faculty_id`, `subject`, `year`, `section`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
(2, 4, 1, 'NCS-701', 4, 'CS-2', 1, 2, 3, 4, 5, 1, 0, 1, 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `practical_faculty_response`
--
ALTER TABLE `practical_faculty_response`
  ADD CONSTRAINT `fk_faculty_lab_response` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_faculty_lab_response` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `practical_lab_assistant_response`
--
ALTER TABLE `practical_lab_assistant_response`
  ADD CONSTRAINT `fk_la_la` FOREIGN KEY (`la_id`) REFERENCES `lab_assistant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_la_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theory_response`
--
ALTER TABLE `theory_response`
  ADD CONSTRAINT `fk_faculty_response` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_response` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
