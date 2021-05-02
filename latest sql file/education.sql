-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 09:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(255) NOT NULL,
  `banner_text` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_text`, `banner_image`) VALUES
(4, 'banner_1', 'slider_1.jpg'),
(5, 'banner_2', 'slider_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(9, 'COMPUTER SCIENCE'),
(10, 'INFORMATION AND TECHNOLOGY'),
(11, 'BIO CHEMISTRY'),
(12, 'ZOO LOGY'),
(13, 'BIOLOGY'),
(14, 'DATA SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_trainer` varchar(255) NOT NULL,
  `course_price` varchar(255) NOT NULL,
  `course_completion_time` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_image`, `course_author`, `course_trainer`, `course_price`, `course_completion_time`, `course_description`, `cat_id`) VALUES
(11, 'BSC IT', 'Chrysanthemum.jpg', 'unkown', 'unkown', '23434', '324', 'BSC IT', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `u_id` int(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `student_mobile` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_alternate_email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `student_photo` varchar(255) NOT NULL,
  `student_signature` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `course_selected` varchar(255) NOT NULL,
  `login_status` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_relationship` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `school_name_10` varchar(255) NOT NULL,
  `school_pass_year_10` varchar(255) NOT NULL,
  `school_percentage_10` varchar(255) NOT NULL,
  `college_name_12` varchar(255) NOT NULL,
  `college_pass_year_12` varchar(255) NOT NULL,
  `college_percentage_12` varchar(255) NOT NULL,
  `college_degree` varchar(255) NOT NULL,
  `college_degree_pass_year` varchar(255) NOT NULL,
  `college_degree_percentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`u_id`, `student_password`, `student_name`, `user_id`, `student_mobile`, `student_email`, `student_alternate_email`, `gender`, `marital_status`, `blood_group`, `student_photo`, `student_signature`, `student_address`, `course_selected`, `login_status`, `country`, `state`, `pincode`, `guardian_name`, `guardian_relationship`, `date_of_birth`, `school_name_10`, `school_pass_year_10`, `school_percentage_10`, `college_name_12`, `college_pass_year_12`, `college_percentage_12`, `college_degree`, `college_degree_pass_year`, `college_degree_percentage`) VALUES
(13, '70234b2457dfb087847b618d2ccbf10b', 'mansi thorat', 'mansi@1999', '+918898426077', 'thoratmanasi7@gmail.com', '', '', 'UnMarried', 'A positive', '', '', 'nalsopra', 'MBA', '1', 'INDIA', 'MAHARASHTRA', '401209', 'suryakant', 'Father', '2021-03-01', 'mother', '2016', '70', 'rr college', '2017', '70', 'vartak', '', '7.0'),
(14, '5011ff5a63f4037fef8db0030ac76634', 'santy', 'santy@1998', '+918369885654', 'santku666@gmail.com', 'santku667@gmail.com', 'Male', 'Married', 'O negative', 'aaddhar.jpg', 'aaddhar.jpg', 'b-wing/room no 103dfnsdfngfkgjtoignrokgkngwkofnwdf', 'MCA', '1', 'INDIA', 'MAHARASHTRA', '453456', 'lalman rajbhar', 'Father', '2021-04-30', 'ST PERTER\'S HIGH SCHOOL', '2012', '80', 'VIVA COLLEGE', '2016', '50', 'VIVA COLLEGE', '2019', '6.12'),
(15, '2a018f6c104e7f107b8f1a8d6ef1ebc9', 'Ranjeet Prajapati', 'rajjo@1998', '+919969529490', 'adityahaibro@gmail.com', '', '', '', '', '', '', '', 'BSC IT', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_email`, `user_password`) VALUES
(1, 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_unused_entries` ON SCHEDULE EVERY 1 MINUTE STARTS '2021-03-31 12:50:59' ENDS '2021-11-01 12:48:59' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'deleted' DO DELETE FROM student WHERE login_status=0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
