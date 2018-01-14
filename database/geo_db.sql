-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2018 at 01:32 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geo_db`
--
CREATE DATABASE IF NOT EXISTS `geo_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `geo_db`;

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `course_id` int(11) NOT NULL,
  `student_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` int(11) NOT NULL,
  `attending_status` tinyint(1) NOT NULL DEFAULT '0',
  `star` tinyint(1) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`course_id`, `student_id`, `comment_id`, `attending_status`, `star`, `time_stamp`) VALUES
(1, '58070501023', 0, 1, 4, '2018-01-12 07:54:34'),
(1, '58070501090', 5, 1, 3, '0000-00-00 00:00:00'),
(2, '58070501045', 1, 0, NULL, '0000-00-00 00:00:00'),
(3, '58070501023', 2, 1, 3, '0000-00-00 00:00:00'),
(4, '58070501023', 6, 0, 0, '0000-00-00 00:00:00'),
(4, '58070501090', 4, 1, 5, '0000-00-00 00:00:00'),
(5, '58070501023', 33, 0, NULL, '2018-01-14 11:54:02'),
(5, '58070501090', 8, 0, 0, '2018-01-14 09:31:33'),
(6, '58070501023', 18, 0, NULL, '2018-01-14 09:36:37'),
(6, '58070501090', 13, 0, NULL, '2018-01-14 09:31:33'),
(7, '58070501023', 29, 0, NULL, '2018-01-14 11:25:34'),
(7, '58070501090', 14, 0, NULL, '2018-01-14 09:31:33'),
(8, '58070501023', 28, 0, NULL, '2018-01-14 11:25:25'),
(8, '58070501090', 26, 0, NULL, '2018-01-14 10:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `teacher_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `room` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_seat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `teacher_id`, `subject`, `topic`, `start_time`, `end_time`, `room`, `max_seat`) VALUES
(1, '58070501020', 'CHM103', 'เปิดโลกมหัศจรรย์กับยอร์ช', '2018-01-17 16:00:00', '2018-08-01 18:00:00', '1115', 30),
(2, '58070501020', 'MTH112', 'ยอร์ชกับขนมปังที่หายไป', '2018-01-20 09:00:00', '2018-01-15 18:00:00', '1114', 40),
(3, '58070501020', 'PHY104', 'เรียกเขาว่ายอร์ช', '2018-01-22 14:00:00', '2018-01-15 18:00:00', '1118', 35),
(4, '58070501099', 'PHY102', 'KMUTT', '2018-01-19 06:00:00', '2018-01-15 18:00:00', '1212', 50),
(5, '58070501099', 'MTH102', 'ยอร์ช/', '2018-01-18 15:00:00', '2018-01-15 20:00:00', '1115', 30),
(6, '58070501021', 'MTH102', 'Zzzz', '2018-01-17 15:00:00', '2018-01-16 20:00:00', '1115', 30),
(7, '58070501099', 'MTH102', 'wtffffff', '2018-01-16 09:00:00', '2018-01-15 18:00:00', '1114', 40),
(8, '58070501020', 'CHM103', 'จงมา', '2018-01-16 09:00:00', '2018-01-15 18:00:00', '1114', 40),
(9, '58070501021', 'MTH112', 'อิอิ กับ cal', '2018-01-19 15:00:00', '2018-01-16 20:00:00', '1115', 30),
(10, '58070501021', 'PHY103', 'Physic Atom', '2018-01-22 15:00:00', '2018-01-16 20:00:00', '1115', 30),
(11, '58070501100', 'CHM103', 'ยอร์ชตะลุยตราด', '2018-01-18 06:00:00', '2018-01-15 18:00:00', '1212', 50),
(12, '58070501100', 'PHY102', 'ยอร์ชตะลุยตราด', '2018-01-20 06:00:00', '2018-01-15 18:00:00', '1212', 50),
(13, '58070501020', 'MTH102', 'ยอร์ชกับwtffffff', '2018-01-16 09:00:00', '2018-01-15 18:00:00', '1114', 40),
(14, '58070501100', 'CHM103', 'เคมี D+', '2018-01-16 09:00:00', '2018-01-15 18:00:00', '1114', 40),
(15, '58070501100', 'MTH102', 'Zzzz ง่วง', '2018-01-17 15:00:00', '2018-01-16 20:00:00', '1115', 30),
(16, '58070501099', 'CHM103', 'ยอร์ชตะลุยตราด V2', '2018-01-18 06:00:00', '2018-01-15 18:00:00', '1212', 50),
(17, '58070501020', 'CHM103', 'ยอร์ชตะลุยตราด V3', '2018-01-18 06:00:00', '2018-01-15 18:00:00', '1212', 50),
(18, '58070501021', 'CHM103', 'เคมี Easy', '2018-01-16 09:00:00', '2018-01-15 18:00:00', '1114', 40);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `comment_id` int(11) NOT NULL,
  `type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_txt` text COLLATE utf8mb4_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`comment_id`, `type`, `review_txt`, `show_status`) VALUES
(0, 'etc', 'อิอิ', 1),
(0, 'teacher', 'eiei', 1),
(1, 'content', 'เนื้อหามีมากเกินไปทำให้อาจารย์ต้องรีบสอน', 1),
(1, 'etc', 'มีคนในห้องที่คุยกัน ทำให้อาจารย์เสียเวลาตักเตือนและมีเวลาการสอนน้อยลง', 1),
(1, 'teacher', 'อาจารย์สอนเร็วไปนะครับ', 0),
(4, 'teacher', 'สอนดีมากเลยครับ อยากเรียนอีกๆ', 1),
(5, 'teacher', 'ห่วยครับ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_count` int(4) NOT NULL DEFAULT '0',
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `title`, `firstname`, `lastname`, `faculty`, `department`, `tel`, `facebook`, `line`, `password`, `email`, `login_count`, `type`) VALUES
('58070501023', 'นางสาว', 'ไม่', 'นะ', 'ครุศาสตร์และเทคโนโลยี', 'เทคโนโลยีอุตสาหกรรม', '0973249234', '', 'B', '', 'yorsh44@gmail.com', 0, 'student'),
('58070501045', 'นาย', 'พิชญุตม์', 'ศิริพิศ', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', '0860644292', 'Phichayut Siripis', 'pangyasff', '', 'pangyassf@gmail.com', 0, 'student'),
('58070501090', 'นาย', 'ธนาธิป', 'สุเนตร', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', '0909796893', 'Yorsh Thanathip', 'yorsh44', '', 'thanathip.sunate@gmail.com', 0, 'student'),
('admin', '-', 'GEO', 'ADMIN', '-', '-', '-', '-', '-', '', 'goofily.student@gmail.com', 0, 'admin'),
('ta', '-', 'TA', 'GEO', '-', '-', '-', '-', '-', '', 'pangyafff@gmail.com', 0, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `title`, `firstname`, `lastname`, `nickname`, `faculty`, `department`, `image`, `tel`, `facebook`, `line`, `star`) VALUES
('58070501020', 'นาย', 'ธนกฤต', 'คล้ายแก้ว', 'เอ้', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1', '0827096238', 'Ae thanakrit', 'AeEIEI', 0),
('58070501021', 'นาย', 'ธนกฤต', 'ผังวิวัฒน์', 'พันช์', 'วิทยาศาสตร์', 'เคมี', 'team-member-2', '0894539349', '', 'Punchnajaa', 0),
('58070501099', 'นาย', 'ธนา', 'สุเนตร', 'ยอช', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-3', '0909796893', '', 'yorsh44', 0),
('58070501100', 'นาย', 'ภัทร', 'แดง', 'เต้', 'วิศวกรรมศาสตร์', 'CPE', 'team-member-3', '0988881123', '', 'pat', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`course_id`,`student_id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`),
  ADD KEY `assign_course_fk1` (`student_id`),
  ADD KEY `assign_course_fk2` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_fk1` (`teacher_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`comment_id`,`type`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD CONSTRAINT `assign_course_fk1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_course_fk2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_fk1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_fk1` FOREIGN KEY (`comment_id`) REFERENCES `assign_course` (`comment_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
