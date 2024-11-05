-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 04:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmentslots`
--

CREATE TABLE `appointmentslots` (
  `SlotID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `IsBooked` tinyint(1) DEFAULT 0,
  `PatientID` int(11) DEFAULT NULL,
  `ConsultType` varchar(128) DEFAULT NULL,
  `Comments` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `user_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `clinic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`user_id`, `doctor_name`, `clinic`) VALUES
(44, 'Zhang Wei', '1'),
(45, 'Wei Yuan', '1'),
(46, 'Yi Song', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` enum('doctor','patient','admin') NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_type`, `user_name`, `email`) VALUES
(17, 'admin', '$2y$10$RWoJXUV2/C8DcQcbv1W3NOyX5m5RkAkmJvkSuCjk78jhdmRsTUYte', 'admin', 'admin', 'admin@admin.admin'),
(42, 'patient', '$2y$10$bE/2Qm5zHDFMpG3i9JL2M.XmFauNIthk/vJ98NNHYmBg0815DLt3S', 'patient', 'Sarah Lee', 'f31ee@localhost'),
(43, 'patient2', '$2y$10$MshrACW6W6FltjBn7nEA.uuf0IJHEka2b5rqk.YjTikANfmEwRqsu', 'patient', 'John Tan', 'John@gmail.com'),
(44, 'doctor', '$2y$10$pX5HjAFPp/k12LaxsSBIwe1I3sUuRV08.RogvoNrQjVSQmoHEmO6y', 'doctor', 'Zhang Wei', 'zw@rsd.com'),
(45, 'doctor2', '$2y$10$RM21P8MAehJhiNITHqEise2KXSCPG0kjiYDo8XXu9gBuHb2qccbaK', 'doctor', 'Wei Yuan', 'wy@rsd.com'),
(46, 'doctor3', '$2y$10$PuZEQtSDFvmO2LhcFOPoNue0VeeGLEva.FVqK7Ib3lg1kqyyVNy/a', 'doctor', 'Yi Song', 'ys@rsd.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmentslots`
--
ALTER TABLE `appointmentslots`
  ADD PRIMARY KEY (`SlotID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmentslots`
--
ALTER TABLE `appointmentslots`
  MODIFY `SlotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14855;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
