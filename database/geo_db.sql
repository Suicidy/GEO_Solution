-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2018 at 10:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
  `max_seat` int(3) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `teacher_id`, `subject`, `topic`, `start_time`, `end_time`, `room`, `max_seat`, `comment`) VALUES
(1, '58070501020', 'CHM103', 'เปิดโลกมหัศจรรย์กับยอร์ช', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 30, ''),
(2, '58070501020', 'MTH112', 'ยอร์ชกับขนมปังที่หายไป', '2018-01-22 15:00:00', '2018-01-22 17:00:00', '', 40, ''),
(3, '58070501020', 'PHY104', 'เรียกเขาว่ายอร์ช', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 35, ''),
(4, '58070501099', 'MTH102', 'KMUTT', '2018-01-23 13:00:00', '2018-01-23 15:00:00', '', 50, ''),
(5, '58070501099', 'MTH102', 'ยอร์ช/', '2018-01-23 15:00:00', '2018-01-23 17:00:00', '', 30, ''),
(6, '58070501021', 'MTH102', 'Zzzz', '2018-01-23 15:00:00', '2018-01-23 17:00:00', '', 30, ''),
(7, '58070501099', 'MTH102', 'wtffffff', '2018-01-23 08:00:00', '2018-01-23 10:00:00', '', 40, ''),
(8, '58070501020', 'CHM103', 'จงมา', '2018-01-24 17:00:00', '2018-01-24 19:00:00', '', 40, ''),
(9, '58070501021', 'MTH112', 'อิอิ กับ cal', '2018-01-25 17:00:00', '2018-01-25 19:00:00', '', 30, ''),
(10, '58070501021', 'PHY103', 'Physic Atom', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 30, ''),
(11, '58070501100', 'CHM103', 'ยอร์ชตะลุยตราด', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 50, ''),
(12, '58070501100', 'PHY102', 'ยอร์ชตะลุยตราด', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 50, ''),
(13, '58070501020', 'MTH102', 'ยอร์ชกับwtffffff', '2018-01-20 14:00:00', '2018-01-20 16:00:00', '', 40, ''),
(14, '58070501100', 'CHM103', 'เคมี D+', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 40, ''),
(15, '58070501100', 'MTH102', 'Zzzz ง่วง', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 30, ''),
(16, '58070501099', 'CHM103', 'ยอร์ชตะลุยตราด V2', '2018-01-22 17:00:00', '2018-01-22 19:00:00', '', 50, ''),
(17, '58070501020', 'CHM103', 'ยอร์ชตะลุยตราด V3', '2018-01-22 17:00:00', '2018-01-15 18:00:00', '', 50, ''),
(18, '58070501021', 'CHM103', 'เคมี Easy', '2018-01-22 17:00:00', '2018-01-15 18:00:00', '', 40, '');

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
('58070501045', 'นาย', 'พิชญุตม์', 'ศิริพิศ', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', '0860644292', 'Phichayut Siripis', 'pangyasff', 'e10adc3949ba59abbe56e057f20f883e', 'pangyassf@gmail.com', 2, 'student'),
('58070501090', 'นาย', 'ธนาธิป', 'สุเนตร', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', '0909796893', 'Yorsh Thanathip', 'yorsh44', 'e10adc3949ba59abbe56e057f20f883e', 'thanathip.sunate@gmail.com', 3, 'student'),
('admin', '-', 'GEO', 'ADMIN', '-', '-', '-', '-', '-', 'e10adc3949ba59abbe56e057f20f883e', 'goofily.student@gmail.com', 0, 'admin'),
('ta', '-', 'TA', 'GEO', '-', '-', '-', '-', '-', 'e10adc3949ba59abbe56e057f20f883e', 'pangyafff@gmail.com', 5, 'teacher');

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
  `image` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown-user.png',
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` float NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `title`, `firstname`, `lastname`, `nickname`, `faculty`, `department`, `image`, `tel`, `facebook`, `line`, `star`) VALUES
('58070501003', 'นาย', 'วิถี', 'ภูษิตาศัย', 'ลูกคิด', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0958134545', 'witiraiwa', 'wittilookkid', 5),
('58070501005', 'นางสาว', 'สิริวิมล', 'สุขสุคนธ์', 'ปู', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-2.jpg', '0850655256', 'poonakub', 'Poonajaaa', 5),
('58070501007', 'นาย', 'อัยยรัชต์', 'อินทสุก', 'จูเนียร์', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-3.jpg', '0845671234', 'juniorrrrrr', '', 5),
('58070501012', 'นาย', 'กิตติพัฒน์', 'อริยประยูร', 'ไกด์', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-4.jpg', '0961235555', 'guidemama', '', 5),
('58070501017', 'นาย', 'ปฏิภาณ', 'กวีศรีเดชา', 'เนอส', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0951871428', 'nerd patipan', '', 5),
('58070501019', 'นาย', 'สหชาติ', 'วงษ์กะวัน', 'เอิร์ท', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0851326959', 'earth sahachat', '', 5),
('58070501020', 'นาย', 'ธนกฤต', 'คล้ายแก้ว', 'เอ้', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0827096238', 'Ae thanakrit', 'AeEIEI', 4),
('58070501021', 'นาย', 'ธนกฤต', 'ผังวิวัฒน์', 'พันช์', 'วิทยาศาสตร์', 'เคมี', 'team-member-2.jpg', '0894539349', '', 'Punchnajaa', 4),
('58070501022', 'นาย', 'พีรกิตติ์', 'บุญกิตติพร', 'พี', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0982567878', 'Peerakit maeng', '', 5),
('58070501026', 'นาย', 'สุรวุฒิ', 'กิจชัยสกุลฤทธิ์', 'เอ็ม', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0987771212', 'M\'theschool', '', 5),
('58070501035', 'นาย', 'ปุณยวัจน์', 'ภูววัฒนาเศรษฐ์', 'กล้า', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-1.jpg', '0811818185', 'KraJenny', '', 5),
('58070501042', 'นาย', 'ปุณณภพ', 'เบญจเลิศ', 'ตี๋', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-2.jpg', '0825542323', 'Teehit', '', 5),
('58070501052', 'นาย', 'ภาสชนม์', 'ปริกัมศีล', 'พีท', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-2.jpg', '0648239497', '', '', 5),
('58070501055', 'นาย', 'ปวีณ', 'สุริมิตรตระกูล', 'จ๊าบ', 'วิศวกรรมศาสตร์', 'วิศวกรรมคอมพิวเตอร์', 'team-member-4.jpg', '0956231847', '', '', 5),
('58070501059', 'นาย', 'วรเชษฐ์', 'เทียมทัศน์', 'บาส', 'วิทยาศาสตร์', 'เคมี', 'team-member-3.jpg', '0818179654', '', '', 5),
('58070501060', 'นาย', 'อาชาไนย', 'พึ่งรื่นรมณ์', 'ไมค์', 'วิทยาศาสตร์', 'เคมี', 'team-member-1.jpg', '0834571389', '', '', 5),
('58070501066', 'นาย', 'ณัฏฐพล', 'ถาวรคีรีรัตน์', 'ณัฏฐ', 'วิทยาศาสตร์', 'เคมี', 'team-member-1.jpg', '0811151213', '', '', 5),
('58070501067', 'นาย', 'มนต์ริสสา', 'บุญให้', 'ติว', 'วิทยาศาสตร์', 'เคมี', 'team-member-1.jpg', '0975875162', '', '', 5),
('58070501068', 'นาย', 'เจตนิพัทธ์', 'อธิเวชสกุล', 'ปิง', 'วิทยาศาสตร์', 'เคมี', 'team-member-1.jpg', '0951549655', '', '', 5),
('58070501070', 'นาย', 'วีรวัฒน์', 'อ่อนสำลี', 'นิว', 'วิทยาศาสตร์', 'เคมี', 'team-member-1.jpg', '0825159465', '', '', 5),
('58070501075', 'นาย', 'พรสิทธิ์', 'บุรีนอก', 'ฟอร์ด', 'วิทยาศาสตร์', 'ฟิสิกส์', 'team-member-1.jpg', '0855556267', '', '', 5),
('58070501077', 'นาย', 'อภิรักษ์', 'สังข์อารียกุล', 'เล็ก', 'วิทยาศาสตร์', 'ฟิสิกส์', 'team-member-1.jpg', '0831566642', 'Lekpeam', 'lekapirak', 5),
('58070501084', 'นาย', 'กฤษฎิ์โภคิน', 'งามสมศักดิ์สกุล', 'แมกกี้', 'วิทยาศาสตร์', 'ฟิสิกส์', 'team-member-1.jpg', '0836161646', 'Mackies', 'mackies', 5),
('58070501099', 'นางสาว', 'กานต์ตะวัน', 'อุดมลักษณ์โสภิณ', 'บีบี', 'วิทยาศาสตร์', 'ฟิสิกส์', 'team-member-1.jpg', '0815645654', '', 'bbkantawan', 1),
('58070501100', 'นาย', 'ภัทร', 'แดง', 'เต้', 'วิศวกรรมศาสตร์', 'CPE', 'team-member-3.jpg', '0988881123', '', 'pat', 5),
('58070501105', 'นางสาว', 'จิตภินันท์', 'พิริยธราเวทย์', 'แม็ก', 'วิทยาศาสตร์', 'ฟิสิกส์', 'team-member-1.jpg', '0845166464', '', 'mackung', 5),
('58070501113', 'นาย', 'ธนภัทร์', 'สุขประเสริฐ', 'แบงค์', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0813213478', '', 'bangwongcash', 5),
('58070501119', 'นาย', 'ธนสิทธิ์', 'ตวงเจริญทิพย์', 'ทรี', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0965668493', '', 'treemaitai', 5),
('58070503411', 'นางสาว', 'ธันยพร', 'สืบสาคร', 'หญิง', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0645164989', '', 'yingbonus', 5),
('58070503415', 'นาย', 'นพชัย', 'ศรีบัณฑิต', 'โบ๊ท', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0851645946', '', 'boatbanana', 5),
('58070503425', 'นางสาว', 'นีร', 'พงศ์สกุล', 'นีร', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0962161935', '', 'neeeeennnn', 5),
('58070503429', 'นาย', 'บุณยกร', 'ศรีศิริพันธุ์', 'เบส', 'วิศวกรรมศาสตร์', 'เครื่องมือและควบคุม', 'team-member-1.jpg', '0832594194', '', 'bbesspeena', 5),
('58070503439', 'นางสาว', 'บุษญมาส', 'ศรีโยธิน', 'เบลล์', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0875198793', '', 'bellbabara', 5),
('58070503455', 'นาย', 'พงศกร', 'แก้วแกมกาญจน์', 'แม๊ก', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0859465661', '', 'MACKUNZZ', 5),
('58070503457', 'นางสาว', 'พรรณิภา', 'ช่างเสนา', 'ฟลุค', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0861619541', '', 'flukekiesss', 5),
('58070503460', 'นาย', 'พิชญุตม์', 'ศิริพิศ', 'นาย', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0659491984', '', 'sucidee', 5),
('58070503466', 'นาย', 'ภูริต', 'สุวรรณปัฏนะ', 'เกม', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0888419156', '', 'gamepat', 5),
('58070503471', 'นางสาว', 'วชิราพร', 'ลีวรวัฒน์', 'มิวสิค', 'วิศวกรรมศาสตร์', 'เคมี', 'team-member-1.jpg', '0919199123', 'Music nakkaa', 'musiccc', 5),
('58070503475', 'นาย', 'วรโชติ', 'จิตต์ประสงค์', 'เก้า', 'วิศวกรรมศาสตร์', 'เครื่องกล', 'team-member-1.jpg', '0635646489', 'Kaothebug', 'kaoorachet', 5),
('58070503480', 'นางสาว', 'สิตานันท์', 'บุญเรือง', 'น้ำฝน', 'วิศวกรรมศาสตร์', 'เครื่องกล', 'team-member-1.jpg', '0861654954', 'Mackies', 'namfonnn', 5),
('58070503489', 'นาย', 'ธนาธิป', 'สุเนตร', 'ยอร์ช', 'วิศวกรรมศาสตร์', 'เครื่องกล', 'team-member-1.jpg', '0881651959', 'Yorshtawentard', 'thanathipyorsh', 5),
('58070503496', 'นางสาว', 'ธัญชนก', 'หุ่นภักดีวิจิตร', 'เมย์', 'วิศวกรรมศาสตร์', 'เครื่องกล', 'team-member-1.jpg', '0875611912', 'May Thancganok', 'mayphichaya', 5),
('58070503517', 'นาย', 'ธานินทร์', 'ศรีไทย', 'นิน', 'วิศวกรรมศาสตร์', 'เครื่องกล', 'team-member-1.jpg', '0891619984', 'NinWTF', 'ninthegroove', 5);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
