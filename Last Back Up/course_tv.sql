-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 03:17 AM
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
-- Table structure for table `course_tv`
--

CREATE TABLE `course_tv` (
  `id` int(32) NOT NULL,
  `name` varchar(300) NOT NULL,
  `abvr` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tv`
--

INSERT INTO `course_tv` (`id`, `name`, `abvr`, `created_at`, `updated_at`) VALUES
(1, ' Agricultural Crops Production NC III', ' AgriCropProd NC III', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(2, ' Animal Production NC II', ' AnProd NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(3, ' Automotive Servicing', ' AutoServ', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(4, ' Automotive Servicing NC I', ' AutoServ NC I', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(5, ' Automotive Servicing NC II', ' AutoServ NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(6, ' Automotive Technology ', ' AutoTech', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(7, ' Bachelor of Automotive Technology', ' BAutoTech', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(8, ' Bachelor of Industrial Technology Major in Ceramics', ' BIT Cer', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(9, ' Bachelor of Industrial Technology Major in Civil Technology', ' BIT CivTech', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(10, ' Bachelor of Industrial Technology Major in Computer Technology', ' BIT ComTech', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(11, ' Bachelor of Industrial Technology Major in Drafting', ' BIT Draft', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(12, ' Bachelor of Industrial Technology Major in Garments', ' BIT Gar', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(13, ' Bartending NC II', ' Bar NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(14, ' Beauty Care', ' Bcare', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(15, ' Beauty Care NC II', ' Bcare NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(16, ' Bread and Pastry Production NC I', ' BaPProd NC I', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(17, ' Bread and Pastry Production NC II', ' BaPProd NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(18, ' Carpentry NC II', ' Carp NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(19, ' Commercial Cooking NC II', ' ComCook NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(20, ' Computer Hardware Servicing NC II', ' CompHadServ NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(21, ' Consumer Electronics', ' ConElec', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(22, ' Consumer Electronics Servicing NC II', ' ConElec NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(23, ' Cookery NC II', ' Cook NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(24, ' Drafting', ' Draft', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(25, ' Dressmaking', ' Dresss', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(26, ' Electrical Installation and Maintenance', ' ElecInst and Mainte', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(27, ' Electrical Maintenance NC II', ' ElectMaint NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(28, ' Electronic Products Assembly', ' ElectProdAss', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(29, ' Electronics and Comm. Technology', ' Elect&Comm Tech', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(30, ' English Language Course', ' EngLangCourse', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(31, ' Finishing Course for Call Center Agents ', ' CallCenter Agent', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(32, ' Food and Beverage Services NC II', ' FoodBevServ NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(33, ' Food Processing NC II', ' FoodPros NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(34, ' Front Office Services NC II', ' FrontOffServ NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(35, ' Hair Dressing', ' HairDres', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(36, ' Hairdressing NC II', ' HairDres NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(37, ' Horticulture NC II', ' Horti NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(38, ' Hotel and Restaurant Services', ' HR Serv', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(39, ' Housekeeping NC II', ' HK NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(40, ' Masonry NC I', ' Mason NC I', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(41, ' Masonry NC II', ' Mason NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(42, ' Motorcycle Small Engine Servicing NC II', ' MotorSmalEngServ NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(43, ' Plumbing NC II', ' Plumb NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(44, ' Refrigeration and Air Conditioning NC II', ' RefAC NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(45, ' Refrigeration and Aircon Servicing', ' RefAC Serv', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(46, ' Shielded Metal Arc Welding NC I', ' SMAWeld NC I', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(47, ' Shielded Metal Arc Welding NC II', ' SMAWeld NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(48, ' Tile Setting NC II', ' TileSet NC II', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(49, ' Trainers Methodology?Level I', ' TrainMethod Lvl 1', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(50, ' Welding', ' Weld', '2018-08-22 17:04:24', '0000-00-00 00:00:00'),
(51, 'Diploma in Aqua Culture', 'Dip Aqua', '2018-08-22 17:34:32', '2018-08-22 20:02:03'),
(52, 'Computer Secretarial', 'CompSec', '2018-08-29 23:18:09', '2018-08-29 23:18:09'),
(53, 'Computer Servicing', 'CSS', NULL, NULL),
(54, 'Computer Technology', 'CompTech', NULL, NULL),
(55, 'Care Giving', 'CareGiving', NULL, NULL),
(56, 'Diploma in Hotel and Restaurant Technology', 'DipHRT', '2019-10-09 16:25:09', '2019-10-09 16:25:09'),
(57, 'HEALTH CARE SERVICES NCII', 'HealthCareServ', '2019-10-13 18:42:28', '2019-10-13 18:42:28'),
(58, 'Nursing aide', 'NursAide', '2020-09-01 21:34:08', '2020-09-01 21:34:08'),
(59, 'BOOK KEEPING I', 'Book Keeping', '2021-12-01 19:35:50', '2021-12-01 19:35:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_tv`
--
ALTER TABLE `course_tv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_tv`
--
ALTER TABLE `course_tv`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
