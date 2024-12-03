-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 03:16 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbscholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_acad`
--

CREATE TABLE `course_acad` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abvr` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_acad`
--

INSERT INTO `course_acad` (`id`, `name`, `abvr`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science in Accountacy', 'BS Acct', '2018-08-28 03:30:31', '2018-08-27 19:30:31'),
(2, 'Bachelor of Science in Accounting Technology', 'BS Acct Tech', '2018-08-28 03:31:06', '2018-08-27 19:31:06'),
(3, 'Bachelor of Science in Business Administration major in Human Resource Development Management', 'BSBA HRM', '2021-03-01 01:01:00', '2021-02-28 17:01:00'),
(4, 'Bachelor of Science in Business Administration Major in Marketing Management', 'BSBA MM', '2019-09-16 06:56:27', '0000-00-00 00:00:00'),
(5, 'Bachelor of Science in Hospitality Management', 'BS HM', '2019-01-11 02:52:28', '2019-01-10 18:52:28'),
(6, 'Bachelor of Science in Entrepreneurship', 'BS Entrep', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(7, 'Bachelor of Science in Tourism Management', 'BS TM', '2018-08-28 05:46:15', '2018-08-27 21:46:15'),
(8, 'Bachelor of Science in Agricultural Engineering', 'BS Agri Eng', '2018-08-28 03:28:57', '2018-08-27 19:28:57'),
(9, 'Bachelor of Science in Civil Engineering', 'BS CE', '2018-08-28 03:30:01', '2018-08-27 19:30:01'),
(10, 'Bachelor of Science in Computer Engineering', 'BS Comp Eng', '2018-08-28 03:28:09', '2018-08-27 19:28:09'),
(11, 'Bachelor of Science in Electrical Engineering', 'BS EE', '2018-08-28 03:32:03', '2018-08-27 19:32:03'),
(12, 'Bachelor of Science in Mechanical Engineering', 'BS ME', '2018-08-28 03:32:38', '2018-08-27 19:32:38'),
(13, 'Bachelor of Arts in Communication', 'AB Comm', '2021-03-01 00:58:00', '2021-02-28 16:58:00'),
(14, 'Bachelor of Science in Computer Science', 'BS Comp Sci', '2018-08-28 03:34:52', '2018-08-27 19:34:52'),
(15, 'Bachelor of Arts in English Language', 'AB Engl Lang', '2021-03-01 00:58:18', '2021-02-28 16:58:18'),
(16, 'Bachelor of Science in Agricultural Technology', 'BS Agri Tech', '2018-08-28 03:40:03', '2018-08-27 19:40:03'),
(17, 'Bachelor of Science in Agriculture', 'BS Agri', '2018-08-28 03:42:39', '2018-08-27 19:42:39'),
(18, 'Bachelor in Secondary Education major in English', 'BSE English', '2018-08-28 03:44:10', '2018-08-27 19:44:10'),
(19, 'Bachelor in Secondary Education major in Mathematics', 'BSE Mathematics', '2018-08-28 03:44:56', '2018-08-27 19:44:56'),
(20, 'Bachelor in Secondary Education major in Science', 'BSE Science', '2018-08-28 03:45:21', '2018-08-27 19:45:21'),
(21, 'Bachelor of Technology and Livelihood Education major in Agriculture and Fishery Arts', 'BTLE Agri and Fishery Arts', '2018-08-28 04:38:50', '2018-08-27 20:38:50'),
(22, 'Bachelor of Science in Industrial Technology major in Computer Technology', 'BSIT COET', '2018-08-28 04:43:37', '2018-08-27 20:43:37'),
(23, 'Bachelor of Science in Industrial Technology major in Electronics and Communication Techonology', 'BSIT ECT', '2018-08-28 04:44:30', '2018-08-27 20:44:30'),
(24, 'Bachelor of Science in Industrial Technology major in Food Technology', 'BSIT FT', '2018-08-28 04:45:12', '2018-08-27 20:45:12'),
(25, 'Bachelor of Technical Teacher Education Major in Computer Technology', 'BTTE CT', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(26, 'Bachelor of Technical Teacher Education Major in Electrical Techlogy', 'BTTE Electrical Tech', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(27, 'Bachelor of Technical Teacher Education Major in Electronics Technology', 'BTTE Electronics Tech', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(28, 'Bachelor of Technical Teacher Education Major in Food Service Management', 'BTTE FSM', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(29, 'Bachelor of Science in Criminology', 'BS Crim', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(30, 'Bachelor of Science in Psychology ', 'BS Psych', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(31, 'Bachelor of Science in  Marine Transportation', 'BS Marine Trans', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(32, 'Bachelor of Science in Marine Engineering', 'BS Marine Eng', '2018-08-23 01:04:06', '0000-00-00 00:00:00'),
(33, 'Bachelor of Science in Social Works', 'BS Social Works', '2018-08-28 04:52:54', '2018-08-27 20:52:54'),
(34, 'Bachelor of Automotive Technology', 'B Auto Tech', '2018-08-28 05:17:17', '2018-08-27 21:17:17'),
(35, 'Bachelor of Science in Industrial Technology major in Garments Technology', 'BSIT Garments Tech', '2018-08-28 04:54:03', '2018-08-27 20:54:03'),
(36, 'Bachelor of Science in Industrial Technology major in Food Processing and Services Management', 'BSIT FPSM', '2018-08-28 04:55:13', '2018-08-27 20:55:13'),
(37, 'Bachelor of Science in Agricultural and Biosystems Engineering', 'BS Agri Bio System', '2018-08-27 20:32:31', '2018-08-27 20:32:31'),
(38, 'Bachelor of Science in Information Technology', 'BS IT', '2018-08-27 20:34:21', '2018-08-27 20:34:21'),
(39, 'Bachelor of Science in Meteorology', 'BS Meteorology', '2018-08-27 20:36:18', '2018-08-27 20:36:18'),
(40, 'Bachelor of Culture and Arts Education', 'B Culture and Arts Educ', '2018-08-27 20:37:26', '2018-08-27 20:37:26'),
(41, 'Bachelor of Technology and Livelihood Education major in Information and Communication Technology', 'BTLE Info and Comm Tech', '2018-08-27 20:39:40', '2018-08-27 20:39:40'),
(42, 'Bachelor of Science in Industrial Technology major in Electrical Technology', 'BSIT ELT', '2018-08-28 06:19:44', '2018-08-27 22:19:44'),
(43, 'Bachelor of Science in Industrial Technology major in Electronics Technology', 'BSIT ELXT', '2018-08-27 20:56:52', '2018-08-27 20:56:52'),
(44, 'Bachelor of Science in Industrial Technology major in Civil and Drafting Technology', 'BSIT Civil & Drafting Tech', '2018-08-27 20:58:41', '2018-08-27 20:58:41'),
(45, 'Bachelor of Science in Statistics', 'BS Stat', '2018-08-27 20:59:14', '2018-08-27 20:59:14'),
(46, 'Bachelor of Science in Climatology', 'BS Climatology', '2018-08-27 20:59:48', '2018-08-27 20:59:48'),
(47, 'Bachelor of Science in Fine Arts', 'BS Fine Arts', '2018-08-27 21:00:19', '2018-08-27 21:00:19'),
(48, 'Bachelor of Science in Agribusiness', 'BS Agri Bus', '2018-08-27 22:06:44', '2018-08-27 22:06:44'),
(49, 'Bachelor of Science in Development Communication', 'BS Dev Comm', '2018-08-27 22:07:39', '2018-08-27 22:07:39'),
(50, 'Bachelor of Science in Food Technology', 'BS FT', '2018-08-27 22:23:52', '2018-08-27 22:23:52'),
(51, 'Bachelor in Secondary Education major in Technology and Livelihood Education', 'BSE TLE', '2018-08-29 00:17:44', '2018-08-29 00:17:44'),
(52, 'Bachelor of Science in Environmental Science', 'BS Envi Sci', '2018-08-29 17:02:08', '2018-08-29 17:02:08'),
(53, 'Bachelor of Science in Economics', 'BS-Econ.', '2019-01-21 22:49:52', '2019-01-21 22:49:52'),
(54, 'Bachelor of Technology and Livelihood Education', 'BTLE', '2019-01-27 23:39:12', '2019-01-27 23:39:12'),
(55, 'Bachelor of Science in Fisheries', 'BS Fisheries', '2019-04-21 20:48:03', '2019-04-21 20:48:03'),
(56, 'Bachelor in Secondary Education major in MAPEH', 'BSE-MAPEH', '2019-05-07 22:04:49', '2019-05-07 22:04:49'),
(58, 'Bachelor of Early Childhood Education', 'B-ECE', '2019-06-20 20:02:13', '2019-06-20 20:02:13'),
(59, 'Bachelor of Science in Cooperative Management', 'BS Coop. Mngt.', '2019-09-17 00:35:23', '2019-09-16 16:35:23'),
(60, 'Bachelor of Special Needs Education', 'B Special Needs Education', '2019-10-22 23:48:22', '2019-10-22 23:48:22'),
(61, 'Bachelor of Technical Vocational Teacher Education', 'BTVTE', '2020-01-31 13:10:34', '2020-01-31 13:10:34'),
(62, 'Bachelor of Science in Chemical Engineering', 'BS-Chem. Engr.', '2020-01-31 15:50:40', '2020-01-31 15:50:40'),
(63, 'Bachelor of Science in Forestry', 'BS Forestry', '2020-02-06 16:46:16', '2020-02-06 16:46:16'),
(64, 'Bachelor of Science in Architecture', 'BS Architect', '2020-07-20 22:15:07', '2020-07-20 22:15:07'),
(65, 'Bachelor of Science in Marine Biology', 'BSMB', '2021-05-26 22:03:02', '2021-05-26 22:03:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_acad`
--
ALTER TABLE `course_acad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abvr` (`abvr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_acad`
--
ALTER TABLE `course_acad`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
