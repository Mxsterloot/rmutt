-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 12 พ.ย. 2020 เมื่อ 03:07 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

--
-- Database: `dps_db`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'วิศวกรรมศาสตร์'),
(2, 'บริหารธุรกิจ'),
(3, 'เทคโนโลยีคหกรรมศาสตร์'),
(4, 'ศิลปกรรมศาสตร์'),
(5, 'เทคโนโลยีการเกษตร'),
(6, 'ครุศาสตร์อุตสาหกรรม'),
(7, 'วิทยาศาสตร์และเทคโนโลยี'),
(8, 'เทคโนโลยีสื่อสารมวลชน'),
(9, 'ศิลปศาสตร์'),
(10, 'วิทยาลัยการแพทย์แผนไทย'),
(11, 'พยาบาลศาสตร์');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `faculty` varchar(150) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '2',
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `name`, `faculty`, `role`, `birthday`) VALUES
(1, '1160102030427', '195689', 'K.Jaruwan', '', 2, '0000-00-00'),
(2, 'admin', 'admin', 'K.Varunee', '', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `meetdr`
--

CREATE TABLE `meetdr` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ownerid` varchar(13) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางนัดพบแพทย์';

--
-- dump ตาราง `meetdr`
--

INSERT INTO `meetdr` (`id`, `date`, `time`, `ownerid`, `status`, `timestamp`) VALUES
(1, '2020-09-25', '00:00:00', '2', 1, '2020-09-25 10:34:52'),
(2, '2020-09-25', '20:03:00', '2', 0, '2020-09-25 11:04:27'),
(3, '2020-06-12', '09:30:00', '2', 0, '2020-09-25 11:08:24'),
(4, '2020-09-13', '10:30:00', '2', 2, '2020-09-25 11:14:52'),
(5, '2020-09-27', '09:00:00', '1', 3, '2020-09-25 11:36:00'),
(6, '2020-09-12', '20:45:00', '1', 2, '2020-09-25 11:45:23');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `q1` int(3) DEFAULT NULL,
  `q2` int(3) DEFAULT NULL,
  `q3` int(3) DEFAULT NULL,
  `q4` int(3) DEFAULT NULL,
  `q5` int(3) DEFAULT NULL,
  `q6` int(3) DEFAULT NULL,
  `q7` int(3) DEFAULT NULL,
  `q8` int(3) DEFAULT NULL,
  `q9` int(3) DEFAULT NULL,
  `q_sum` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `question`
--

INSERT INTO `question` (`question_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q_sum`) VALUES
(1, 1, 2, 3, 1, 2, 3, 1, 2, 3, 18),
(2, 1, 3, 1, 2, 1, 2, 1, 1, 2, 14),
(3, 1, 3, 1, 2, 1, 2, 1, 1, 2, 14),
(4, 2, 2, 1, 2, 3, 2, 2, 2, 1, 17),
(5, 2, 1, 3, 2, 2, 0, 0, 0, 0, 10),
(6, 2, 1, 3, 2, 2, 3, 3, 2, 3, 21),
(7, 2, 1, 1, 2, 2, 1, 0, 0, 0, 9),
(8, 2, 2, 2, 1, 3, 1, 2, 0, 0, 13),
(9, 0, 2, 0, 1, 1, 2, 1, 3, 3, 13),
(10, 3, 3, 3, 3, 3, 3, 3, 3, 3, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `meetdr`
--
ALTER TABLE `meetdr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meetdr`
--
ALTER TABLE `meetdr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
