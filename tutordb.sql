-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 09:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_name`, `admin_pass`) VALUES
('nattaponpongkaop@gmail.com', 'Nattapon', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `tid` varchar(14) NOT NULL,
  `tfirstname` varchar(255) NOT NULL,
  `tlastname` varchar(255) NOT NULL,
  `tnickname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tlineid` varchar(100) NOT NULL,
  `tphone` varchar(20) NOT NULL,
  `tbirthday` date NOT NULL,
  `tsex` varchar(100) NOT NULL,
  `tpicid` varchar(255) NOT NULL,
  `tpicprofile` varchar(255) NOT NULL,
  `tsubject` varchar(255) NOT NULL,
  `tpassword` varchar(255) NOT NULL,
  `taddress` varchar(255) NOT NULL,
  `teducation` varchar(255) NOT NULL,
  `tlevel` varchar(255) NOT NULL,
  `tverify` int(2) NOT NULL,
  `urloe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`tid`, `tfirstname`, `tlastname`, `tnickname`, `email`, `tlineid`, `tphone`, `tbirthday`, `tsex`, `tpicid`, `tpicprofile`, `tsubject`, `tpassword`, `taddress`, `teducation`, `tlevel`, `tverify`, `urloe`) VALUES
('0000000000000', 'Nattapon', 'Pongkao', 'แอดมินพีท', 'nattaponpongkaop@gmail.com', 'dsfdsafs', '-', '2022-11-15', 'ชาย', 'Nattapon.png', '1111111111111(verify).jpg', '', '$2y$10$8OzBJDKfox7v7TUgsKhts.aZ1zQY/ylG6J9/ArrpkL0vA05BjcuAy', 'tphone', 'tphone', 'tphone', 2, 'admin'),
('1023632587411', 'บุษบา ', 'จึ๋งปั๋งมากนะ', 'ติวเตอร์ดาว', 'thanachotech@gmail.com', 'ิีbussaba', '09658412563', '2022-11-18', 'หญิง', '1023632587411(verify).png', 'บุษบา .jpg', 'th', '$2y$10$xbNQDta7Si4puP813xTuY.ONTWZDfEhSFPbzAcO0qE3lqE6jMAw3a', '256 ถ. พระรามที่ ๑ แขวง ปทุมวัน เขตปทุมวัน กรุงเทพมหานคร 10330', '- รับราชการเป็นคุณครูอยู่โรงเรียนไตรมิตรวิทยาลัย', '- รับสอนวิชาภาษาไทยระดับมัธยมศึกษา 5-6 ราคา 3000/เทอม', 1, 'user'),
('1111111111111', 'fdfd', 'dfd', 'dfdf', 'pete@gmail.com', 'tchoteff', '03841717856', '2022-12-01', 'ชาย', '1111111111111(verify).png', 'fdfd.jpg', 'social', '$2y$10$wRc3e4XLPE5Td8r9aiUY7eo7WFW77F3pd3OzkWzo2gF7.e6TwsKt2', 'ddd', 'ddd', 'ddd', 1, 'user'),
('1234567898745', 'ณัฐพล', 'พงษ์เก่า', 'ติวเตอร์พีท', 'nattapon.pongkao@mail.kmutt.ac.th', 'petenattapon', '0929695414', '2022-12-02', 'ชาย', '1234567898745(verify).png', '1726805058.jpg', 'eng', '$2y$10$XxKJX72hvTvU48U2Eb6Dnu4xJT7r2Qrxqorm/X5Miz4B2Ttwvlsv2', '1 11 ตรอก เสถียร แขวง บรมมหาราชวัง เขตพระนคร กรุงเทพมหานคร 10200', '- กำลังศึกษาอยู่คณะวิทยาศาสตร์ สาขาวิทยการคอมพิวเตอร์ประยุกต์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ชั้นปีที่ 2', '- รับสอนวิชาอังกฤษระดับมัธยมศึกษา ราคา 500 บาท/คอร์ส', 1, 'user'),
('1365247852102', 'จิรภัทร', 'จิรญาณมิตร', 'ติวเตอร์เดม', 'bit997184@gmail.com', 'dem.009', '0647585796', '2022-10-03', 'ชาย', '1365247852102(verify).png', '1632462937.jpg', 'enng', '$2y$10$p8wTE40wK7vt8DAIEYhkEOx2rK2cDORDmG6t5s4F6X6u292fcE/nK', '126 ถ. ประชาอุทิศ แขวง บางมด เขตทุ่งครุ กรุงเทพมหานคร 10140', '- กำลังศึกษาอยู่คณะวิทยาศาสตร์ สาขาวิทยการคอมพิวเตอร์ประยุกต์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ชั้นปีที่ 2', '- รับสอนทุกวิชาในเอกวิศวกรรมศาสตร์ ป.ตรี ราคา 800 บาททุกวิชา', 1, 'user'),
('2364587546132', 'ธนโชติ', ' วัฒนขันติเจริญ', 'ติวเตอร์โชติ', 'peachmvp5678@gmail.com', 'tchote', '0645874596', '2022-12-03', 'ชาย', '2364587546132(verify).png', 'ธนโชติ.jpg', 'comp', '$2y$10$o6dv364MegHajLOd/8Loa.9AvItyFsQI5YYD5S81ETkT0SAAVr4oa', '661 ถ. เจริญกรุง แขวง ตลาดน้อย เขตสัมพันธวงศ์ กรุงเทพมหานคร 10100', '- กำลังศึกษาอยู่คณะวิทยาศาสตร์ สาขาวิทยการคอมพิวเตอร์ประยุกต์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ชั้นปีที่ 2', '- รับสอนเขียนเว็บไซต์โดยภาษา HTML CSS JS ราคา 2000บาท/คอร์ส', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(5) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_ID`, `subject_name`, `tid`) VALUES
(28, 'enng', '1365247852102'),
(30, 'comp', '2364587546132'),
(31, 'eng', '1234567898745'),
(32, 'th', '1023632587411'),
(33, 'social', '1111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_mail`
--

CREATE TABLE `tutor_mail` (
  `tutor_id` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `tutor_email` varchar(255) NOT NULL,
  `tutor_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_mail`
--

INSERT INTO `tutor_mail` (`tutor_id`, `tid`, `tutor_email`, `tutor_pass`) VALUES
(30, '1365247852102', 'bit997184@gmail.com', '$2y$10$p8wTE40wK7vt8DAIEYhkEOx2rK2cDORDmG6t5s4F6X6u292fcE/nK'),
(32, '2364587546132', 'peachmvp5678@gmail.com', '$2y$10$o6dv364MegHajLOd/8Loa.9AvItyFsQI5YYD5S81ETkT0SAAVr4oa'),
(33, '1234567898745', 'nattapon.pongkao@mail.kmutt.ac.th', '$2y$10$XxKJX72hvTvU48U2Eb6Dnu4xJT7r2Qrxqorm/X5Miz4B2Ttwvlsv2'),
(34, '1023632587411', 'thanachotech@gmail.com', '$2y$10$xbNQDta7Si4puP813xTuY.ONTWZDfEhSFPbzAcO0qE3lqE6jMAw3a'),
(35, '1111111111111', 'pete@gmail.com', '$2y$10$wRc3e4XLPE5Td8r9aiUY7eo7WFW77F3pd3OzkWzo2gF7.e6TwsKt2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`),
  ADD KEY `test` (`tid`);

--
-- Indexes for table `tutor_mail`
--
ALTER TABLE `tutor_mail`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `email` (`tutor_email`),
  ADD KEY `tid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tutor_mail`
--
ALTER TABLE `tutor_mail`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
