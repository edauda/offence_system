-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 04:55 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offence_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `offence_id` int(11) NOT NULL,
  `offence_type_id` varchar(45) DEFAULT NULL,
  `offence_code` varchar(45) DEFAULT NULL,
  `offence_fee` decimal(10,0) DEFAULT NULL,
  `offence_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offence_category`
--

CREATE TABLE `offence_category` (
  `offence_category_id` int(11) NOT NULL,
  `offence_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence_category`
--

INSERT INTO `offence_category` (`offence_category_id`, `offence_category`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `offence_type`
--

CREATE TABLE `offence_type` (
  `offence_type_id` int(11) NOT NULL,
  `offence_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence_type`
--

INSERT INTO `offence_type` (`offence_type_id`, `offence_type`) VALUES
(1, 'Assaulting Marshal on Duty'),
(2, 'Attempting to Corrupt Marshal on Duty'),
(3, 'Caution sign violation'),
(4, 'Construction area speed limit violation'),
(5, 'Dangerous driving'),
(6, 'Do not move violation'),
(7, 'Driver licence violation'),
(8, 'Driving under alcohol/drug influence'),
(9, 'Driving with worn-out tyres'),
(10, 'Driving with expired/without spare tyre'),
(11, 'Excessive smoke emission'),
(12, 'Failure to cover unstable materials'),
(13, 'Failure to fix red flag on projected load'),
(14, 'Failure to move over'),
(15, 'Failure to report road crash'),
(16, 'Fire extinguisher violation'),
(17, 'Inadequate construction warning sign'),
(18, 'Light/sign violation'),
(19, 'Medical personnel/hospital rejection of road crash victim'),
(20, 'Operating mechanically deficient vehicle'),
(21, 'Obstructing marshal on duty'),
(22, 'Operating a vehicle with forged documents'),
(23, 'Overloading'),
(24, 'Passengers manifest violation'),
(25, 'Riding motorcycle');

-- --------------------------------------------------------

--
-- Table structure for table `offender`
--

CREATE TABLE `offender` (
  `offender_id` int(11) NOT NULL,
  `offender_fname` varchar(45) DEFAULT NULL,
  `offender_lname` varchar(45) DEFAULT NULL,
  `offender_phone_no` varchar(45) DEFAULT NULL,
  `offender_address` varchar(100) DEFAULT NULL,
  `offender_plate_no` varchar(45) DEFAULT NULL,
  `offender_title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offender`
--

INSERT INTO `offender` (`offender_id`, `offender_fname`, `offender_lname`, `offender_phone_no`, `offender_address`, `offender_plate_no`, `offender_title`) VALUES
(1, 'Jake', 'brown', '2025550176', 'ict center federal Polytechnic Bauchi', 'AA227BH', 'Mr'),
(4, 'Balla', 'Hamisu', '08123669685', 'Gwarinpa, Abuja', 'ABJ233BC', 'Dr.'),
(5, 'Gloria', 'Jeremiah', '07025550176', 'New Jerusalem Damaturu', 'DTR556EE', 'Mrs'),
(6, 'Aishatu', 'Muazu', '09069324579', 'Gwagallada', 'ABJ558GW', 'Mrs'),
(7, 'Balla', 'Bello', '0909090220', 'College of Business Administration, Potiskum', 'PTK124CC', 'Mrs'),
(8, 'Balla', 'brown', '2025550176', 'ict center federal Polytechnic Bauchi', 'ENG556EE', 'Dr.'),
(9, 'JJ', 'JB', '0703021548', 'bauchi, bauchi, nigeria', 'NYC678DC', 'Prof.'),
(10, 'Maryam', 'Abdullahi', '09030214587', 'bauchi, bauchi, nigeria', 'KDN555', 'Prof.'),
(11, 'Samuel', 'John', '0801236457', 'GRA Gombe', 'GMB123BB', 'Mr');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_date` datetime DEFAULT NULL,
  `report_comment` text,
  `report_staff_id` varchar(45) DEFAULT NULL,
  `report_offender_id` int(11) DEFAULT NULL,
  `report_offence_category_id` int(11) DEFAULT NULL,
  `report_offence_type` varchar(100) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_date`, `report_comment`, `report_staff_id`, `report_offender_id`, `report_offence_category_id`, `report_offence_type`, `qty`) VALUES
(1, '0000-00-00 00:00:00', 'Assaulting Marshal on Duty', 'SS20566', 4, 1, 'Assaulting Officer on Duty', 25),
(2, '2019-10-22 12:13:25', 'Assaulting Marshal on Duty', 'SS28866', 1, 2, 'Assaulting Officer on Duty', 32),
(3, '0000-00-00 00:00:00', 'Failure to report road crash', 'SS27866', 1, 2, 'Assaulting Officer on Duty', 40),
(4, '2019-10-22 00:00:00', 'Failure to report road crash', 'SS27866', 1, 2, 'Assaulting Officer on Duty', 105),
(5, '0000-00-00 00:00:00', 'Failure to report road crash', 'SS27866', 1, 2, 'Assaulting Officer on Duty', 47),
(6, '2019-10-22 12:36:57', 'Failure to report road crash', 'SS27866', 1, 2, 'Assaulting Officer on Duty', 68),
(7, '2019-10-22 12:49:32', 'Failure to report road crash', 'SS27866', 1, 2, 'Assaulting Officer on Duty', 95),
(8, '2019-10-22 13:24:52', 'Driving with expired tyres', 'DF28963', 10, 3, 'Driving with expired/without spare tyre', 250),
(9, '2019-10-26 15:42:12', 'The offender was driving drunk as a result, he caused an accident. He also assaulted the Officer on duty.', 'RF12345', 11, 1, 'Driving under alcohol/drug influence', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_fname` varchar(45) DEFAULT NULL,
  `staff_lname` varchar(45) DEFAULT NULL,
  `staff_rank` varchar(45) DEFAULT NULL,
  `staff_phone_no` varchar(45) DEFAULT NULL,
  `staff_id_no` varchar(45) DEFAULT NULL,
  `staff_email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_rank`, `staff_phone_no`, `staff_id_no`, `staff_email`) VALUES
(1, 'Balla', 'Musa', 'Inspector', '08123652102', 'ss24150', 'ballamusa@yahoo.com'),
(2, 'Abigail', 'Babangida', 'Senior Inspector', '08030239687', 'SI00215330', 'jeremiahabigail2019@gmail.com'),
(3, 'Andrex', 'Ingla', 'Road Marshal', '07033421351', 'RF12345', 'andrex_fred@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `user_profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_status`, `user_level`, `user_profile_id`) VALUES
(1, 'ballamusa', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 2, 1),
(2, 'abigail2019', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, 2, 2),
(3, 'andrex', 'dc6989e7d5fb6226cbaf26fd7c95dcc94b69d1ed', 1, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`offence_id`);

--
-- Indexes for table `offence_category`
--
ALTER TABLE `offence_category`
  ADD PRIMARY KEY (`offence_category_id`);

--
-- Indexes for table `offence_type`
--
ALTER TABLE `offence_type`
  ADD PRIMARY KEY (`offence_type_id`);

--
-- Indexes for table `offender`
--
ALTER TABLE `offender`
  ADD PRIMARY KEY (`offender_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `offence_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offence_category`
--
ALTER TABLE `offence_category`
  MODIFY `offence_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offence_type`
--
ALTER TABLE `offence_type`
  MODIFY `offence_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `offender`
--
ALTER TABLE `offender`
  MODIFY `offender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
