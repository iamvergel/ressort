-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 01:13 AM
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
-- Database: `villareyes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$PNF/FNFD0D2qCiDZOen.Te/Z1.U/1sayS3fJsItTuX7aIvpZjCTBq');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `session` enum('AM','PM') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date`, `session`, `created_at`, `updated_at`) VALUES
(1, '2024-09-04', 'PM', '2024-09-15 04:14:51', '2024-09-15 04:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `availableslots`
--

CREATE TABLE `availableslots` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `slots` int(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availableslots`
--

INSERT INTO `availableslots` (`id`, `date`, `time`, `slots`, `session`, `created_at`, `updated_at`) VALUES
(63, '2024-09-14', '00:00:00', 1, 'AM', '2024-09-15 13:49:16', '2024-09-15 13:49:16'),
(64, '2024-09-14', '00:00:00', 1, 'PM', '2024-09-15 13:49:16', '2024-09-15 13:49:16'),
(65, '2024-09-14', '00:00:00', 1, '24hrs', '2024-09-15 13:49:16', '2024-09-15 13:49:16'),
(66, '2024-09-15', '00:00:00', 1, 'AM', '2024-09-15 13:50:04', '2024-09-15 13:50:04'),
(67, '2024-09-15', '00:00:00', 1, 'PM', '2024-09-15 13:50:04', '2024-09-15 13:50:04'),
(68, '2024-09-15', '00:00:00', 1, '24hrs', '2024-09-15 13:50:04', '2024-09-15 13:50:04'),
(69, '2024-09-16', '00:00:00', 1, 'AM', '2024-09-15 13:50:07', '2024-09-15 13:50:07'),
(70, '2024-09-16', '00:00:00', 1, 'PM', '2024-09-15 13:50:07', '2024-09-15 13:50:07'),
(71, '2024-09-16', '00:00:00', 1, '24hrs', '2024-09-15 13:50:07', '2024-09-15 13:50:07'),
(72, '2024-09-27', '00:00:00', 1, 'AM', '2024-09-15 13:51:03', '2024-09-15 13:51:03'),
(73, '2024-09-27', '00:00:00', 1, 'PM', '2024-09-15 13:51:03', '2024-09-15 13:51:03'),
(74, '2024-09-27', '00:00:00', 1, '24hrs', '2024-09-15 13:51:03', '2024-09-15 13:51:03'),
(75, '2024-09-26', '00:00:00', 1, 'AM', '2024-09-15 13:52:02', '2024-09-15 13:52:02'),
(76, '2024-09-26', '00:00:00', 1, 'PM', '2024-09-15 13:52:02', '2024-09-15 13:52:02'),
(77, '2024-09-26', '00:00:00', 1, '24hrs', '2024-09-15 13:52:02', '2024-09-15 13:52:02'),
(78, '2024-09-28', '00:00:00', 1, 'AM', '2024-09-15 13:52:10', '2024-09-15 13:52:10'),
(79, '2024-09-28', '00:00:00', 1, 'PM', '2024-09-15 13:52:10', '2024-09-15 13:52:10'),
(80, '2024-09-28', '00:00:00', 1, '24hrs', '2024-09-15 13:52:10', '2024-09-15 13:52:10'),
(81, '2024-09-19', '00:00:00', 1, 'AM', '2024-09-15 17:54:02', '2024-09-15 17:54:02'),
(82, '2024-09-19', '00:00:00', 1, 'PM', '2024-09-15 17:54:02', '2024-09-15 17:54:02'),
(83, '2024-09-19', '00:00:00', 1, '24hrs', '2024-09-15 17:54:02', '2024-09-15 17:54:02'),
(84, '2024-09-22', '00:00:00', 1, 'AM', '2024-09-15 17:54:30', '2024-09-15 17:54:30'),
(85, '2024-09-22', '00:00:00', 1, 'PM', '2024-09-15 17:54:30', '2024-09-15 17:54:30'),
(86, '2024-09-22', '00:00:00', 1, '24hrs', '2024-09-15 17:54:30', '2024-09-15 17:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `command` varchar(120) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `command`, `response`, `created_at`) VALUES
(1, 'Command1', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface w', '2024-09-09 14:39:55'),
(2, 'Command2', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', '2024-09-09 15:48:58'),
(3, 'Command3', 'In dasdsadasd', '2024-09-09 15:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `message_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availableslots`
--
ALTER TABLE `availableslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availableslots`
--
ALTER TABLE `availableslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
