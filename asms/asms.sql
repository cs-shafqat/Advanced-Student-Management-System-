-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 05:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `authority_id` int(11) NOT NULL,
  `authority_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`authority_id`, `authority_name`) VALUES
(1, 'Add Student'),
(2, 'Remove Student'),
(3, 'View Student'),
(4, 'Add Employee'),
(5, 'Remove Employee'),
(6, 'View Employee'),
(7, 'Add Class'),
(8, 'Remove Class'),
(9, 'View Class'),
(10, 'View Student Attendance'),
(11, 'View Result'),
(12, 'View Student Request'),
(13, 'Assigning Employee Class'),
(14, 'View Employee Attendance'),
(15, 'View Employee Request'),
(16, 'Finance & Account'),
(17, 'Add Notification'),
(18, 'Assigning Authorties');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(4) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `title`) VALUES
(1, 'Play Group'),
(2, 'Nursery'),
(3, 'Prep'),
(4, 'One'),
(5, 'Two'),
(6, 'Three'),
(7, 'Four'),
(8, 'Five'),
(9, 'Six'),
(10, 'Seven'),
(11, 'Eight'),
(12, 'Nine'),
(13, 'Ten');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `degree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(11) NOT NULL,
  `degree_name` text NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `department_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `name` varchar(11) NOT NULL,
  `domain` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` varchar(20) NOT NULL,
  `join_date` date NOT NULL,
  `qualification` varchar(70) NOT NULL,
  `office_no` varchar(8) NOT NULL,
  `majors` varchar(70) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `join_date`, `qualification`, `office_no`, `majors`, `designation`, `salary`) VALUES
('EMP00011', '2016-07-28', 'fa', '3', 'asc', 'lol', 213),
('EMP00012', '2016-07-28', 'abc', '3', 'asd', 'mvb', 2),
('EMP00015', '2016-07-28', 'Ds', '3', 'sad', 'da', 214);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `create_date` date NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `edetails_id` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `assignment` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `presentation` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `f_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `u_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` varchar(20) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `cnic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `occupation`, `cnic`) VALUES
('PAR00005', 'Teacher', '35401-3267907-5');

-- --------------------------------------------------------

--
-- Table structure for table `parent_student_record`
--

CREATE TABLE `parent_student_record` (
  `student_id` varchar(10) NOT NULL,
  `parent_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_student_record`
--

INSERT INTO `parent_student_record` (`student_id`, `parent_id`) VALUES
('SDT00002 ', 'PAR00005'),
('SDT00008', 'PAR00005'),
('SDT00018', 'PAR00005');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  `type` varchar(30) NOT NULL,
  `u_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_name` text NOT NULL,
  `registration_number` int(11) NOT NULL,
  `contract_start_date` datetime NOT NULL,
  `contract_end_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `registration_number`, `contract_start_date`, `contract_end_date`, `status`) VALUES
('Chattha Public High School, Narang ', 1, '2016-07-26 00:00:00', '2016-07-31 00:00:00', 0),
('UOL, Lahore', 2, '2016-07-26 00:00:00', '2016-07-30 00:00:00', 0),
('Awais Public School', 3, '2016-07-30 00:00:00', '2016-08-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE `school_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(35) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `login_status` int(1) NOT NULL DEFAULT '0',
  `school_reg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_name`, `status`, `login_status`, `school_reg`) VALUES
(6, 'test', 'user', '(+11) 111-1111111', 'test@gmail.com', '96e79218965eb72c92a549dd5a330112', 'test1', 1, 1, '0'),
(8, 'test', 'user', '(+33) 333-3333333', 'test@gmail.com', '96e79218965eb72c92a549dd5a330112', 'test3', 1, 0, '0'),
(11, 'test', 'user', '(+11) 111-1111111', 'test@gmail.com', '96e79218965eb72c92a549dd5a330112', 'test2', 1, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `school_admin_record`
--

CREATE TABLE `school_admin_record` (
  `id` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `school_reg` varchar(100) NOT NULL,
  `admin_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_admin_record`
--

INSERT INTO `school_admin_record` (`id`, `school_name`, `school_reg`, `admin_id`) VALUES
(2, '', '1', 'test1'),
(6, '', '2', 'test2'),
(7, '', '3', 'test3');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `class` text NOT NULL,
  `section` varchar(11) NOT NULL,
  `strength` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(20) NOT NULL,
  `admission_date` date NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `admission_date`, `hobbies`, `class`, `fee`) VALUES
('SDT00001', '2016-07-30', 'cricket ', '10', 0),
('SDT00002', '2016-07-30', 'cricket ', '10', 0),
('SDT00007', '2016-07-30', 'cricket ', '', 0),
('SDT00008', '2016-07-30', 'cricket ', '', 0),
('SDT00013', '2016-07-28', 'mkl', '', 0),
('SDT00014', '2016-07-30', 'sdf', '', 0),
('SDT00016', '2016-07-30', 'sdfdd', '', 0),
('SDT00017', '2016-07-30', 'sdfdd', '', 0),
('SDT00018', '2016-07-30', 'sdfdd', '', 0),
('SDT00019', '2016-07-28', 'vdv', '', 0),
('SDT00020', '2016-07-28', 'vdv', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `first_name`, `last_name`, `password`, `user_name`, `email`, `login_count`, `phone`) VALUES
(1, 'Shafqat ', 'Dogar', '96e79218965eb72c92a549dd5a330112', 'dogar123', 'dogar674@gmail.com', 1, ''),
(6, 'Nauman', 'Chattha', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Nomi007', 'chatthanauman@gmail.com', 1, ''),
(10, 'ABC', 'DEF', '9f9aa022edb9b1dc3facddb165b395b4', '1234ABC', 'hfhfhhfh@khhfhkh', 0, '(+28) 750-058779_'),
(11, '12', 'ffj', 'a72b14d1178199878c77f52ae35e3498', '16516516516', 'ijhi@we', 0, '(+75) 165-1651651');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `first_name` char(30) NOT NULL,
  `last_name` char(25) NOT NULL,
  `email` varchar(70) NOT NULL,
  `cell_no` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nationality` text NOT NULL,
  `cnic` varchar(17) NOT NULL,
  `gender` char(1) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `current_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `school_reg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `cell_no`, `password`, `nationality`, `cnic`, `gender`, `user_type`, `dob`, `current_address`, `permanent_address`, `school_reg`) VALUES
(1, 'SDT00002', 'Muhammad', 'Nauman', '', '', '96e79218965eb72c92a549dd5a330112', 'pakistani', '35401-4896420-9', 'M', 'Student', '2016-07-29', 'Lahore', 'Lahore', ''),
(5, 'PAR00005', 'Muhammad', 'Shafqat', 'chatthanauman@gmail.com', '(+92) 301-4380289', '96e79218965eb72c92a549dd5a330112', 'pakistani', '35401-3267907-5', 'M', 'Parent', '2016-07-29', 'Lahore', 'Lahore', ''),
(7, 'SDT00007', 'Muhammad', 'Arslan', '', '', '96e79218965eb72c92a549dd5a330112', 'pakistani', '', 'M', 'Student', '2016-07-27', 'Lahore', 'Lahore', ''),
(11, 'EMP00011', 'test', 'user', 'aaaa@aa', '(+00) 000-0000000', 'b0baee9d279d34fa1dfd71aadb908c3f', 'pakistani', '99999-9999999-9', 'M', 'Employee', '2016-07-28', 'Lahore', 'Lahore', ''),
(12, 'EMP00012', 'test', 'user', 'adssa@faa', '(+22) 222-2222222', 'b0baee9d279d34fa1dfd71aadb908c3f', 'pakistani', '88888-8888888-8', 'M', 'Employee', '2016-07-28', 'Lahore', 'Lahore', ''),
(15, 'EMP00015', 'test', 'user', 'test@gmail.com', '(+44) 444-4444444', '96e79218965eb72c92a549dd5a330112', 'pakistani', '66666-6666666-6', 'M', 'Employee', '2016-07-28', 'Lahore', 'Lahore', ''),
(16, 'SDT00016', 'baysd', 'kjnskjdnk', 'kjndfkjs@kjnskfj', '(+58) 485-4513245', '96e79218965eb72c92a549dd5a330112', 'pakistani', '38465-4652165-4', 'M', 'Student', '2016-07-30', 'lahore', 'lahore', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_authority`
--

CREATE TABLE `user_authority` (
  `user_id` varchar(20) NOT NULL,
  `a_1` int(1) NOT NULL DEFAULT '0',
  `a_2` int(1) NOT NULL DEFAULT '0',
  `a_3` int(1) NOT NULL DEFAULT '0',
  `a_4` int(1) NOT NULL DEFAULT '0',
  `a_5` int(1) NOT NULL DEFAULT '0',
  `a_6` int(1) NOT NULL DEFAULT '0',
  `a_7` int(1) NOT NULL DEFAULT '0',
  `a_8` int(1) NOT NULL DEFAULT '0',
  `a_9` int(1) DEFAULT '0',
  `a_10` int(1) NOT NULL DEFAULT '0',
  `a_11` int(1) NOT NULL DEFAULT '0',
  `a_12` int(1) NOT NULL DEFAULT '0',
  `a_13` int(1) NOT NULL DEFAULT '0',
  `a_14` int(1) NOT NULL DEFAULT '0',
  `a_15` int(1) NOT NULL DEFAULT '0',
  `a_16` int(1) NOT NULL DEFAULT '0',
  `a_17` int(1) NOT NULL DEFAULT '0',
  `a_18` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authority`
--

INSERT INTO `user_authority` (`user_id`, `a_1`, `a_2`, `a_3`, `a_4`, `a_5`, `a_6`, `a_7`, `a_8`, `a_9`, `a_10`, `a_11`, `a_12`, `a_13`, `a_14`, `a_15`, `a_16`, `a_17`, `a_18`) VALUES
('EMP00012', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
('EMP00015', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authority_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_id` (`e_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`edetails_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `parent_student_record`
--
ALTER TABLE `parent_student_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`registration_number`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `school_admin`
--
ALTER TABLE `school_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `school_admin_record`
--
ALTER TABLE `school_admin_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_name` (`school_reg`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_authority`
--
ALTER TABLE `user_authority`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `authority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `school_admin_record`
--
ALTER TABLE `school_admin_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
