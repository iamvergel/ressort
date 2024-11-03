-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `accepted_inquiries`
--

CREATE TABLE `accepted_inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session` varchar(255) DEFAULT NULL,
  `amenities_quantity` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_inquiries`
--

INSERT INTO `accepted_inquiries` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `amenities`, `preferred_date`, `created_at`, `session`, `amenities_quantity`, `status`) VALUES
(4, 'jenalyn surio kadusale', 'vergel@gmail.com', '45345', 'Amacan', 34543, '4353434', '2024-10-15', '2024-09-30 05:56:32', 'PM', 3, 'accepted'),
(10, 'jenalyn dfgd kadusale', 'vergelmacayan7@gmail.com', '456436', 'Amacan', 6546, '654645', '2024-09-30', '2024-09-30 06:50:40', 'Whole day', 5645, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `amacan`
--

CREATE TABLE `amacan` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `slots` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `session` varchar(20) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amacan`
--

INSERT INTO `amacan` (`id`, `date`, `slots`, `created_at`, `updated_at`, `session`, `time`) VALUES
(47, '2024-10-15', 0, '2024-09-30 03:23:04', '2024-09-30 04:28:13', 'AM', '08:00:00'),
(48, '2024-10-15', 0, '2024-09-30 03:23:04', '2024-09-30 04:54:08', 'PM', '18:00:00'),
(49, '2024-10-15', 0, '2024-09-30 03:23:04', '2024-09-30 04:28:13', 'Whole Day', '22:00:00'),
(53, '2024-09-30', 0, '2024-09-30 04:30:41', '2024-09-30 04:30:58', 'AM', '08:00:00'),
(54, '2024-09-30', 0, '2024-09-30 04:30:41', '2024-09-30 04:34:52', 'PM', '18:00:00'),
(55, '2024-09-30', 0, '2024-09-30 04:30:41', '2024-09-30 04:30:58', 'Whole Day', '22:00:00'),
(56, '2024-10-01', 1, '2024-09-30 05:59:42', '2024-09-30 05:59:42', 'AM', '08:00:00'),
(57, '2024-10-01', 1, '2024-09-30 05:59:42', '2024-09-30 05:59:42', 'PM', '18:00:00'),
(58, '2024-10-01', 1, '2024-09-30 05:59:42', '2024-09-30 05:59:42', 'Whole Day', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `availableslots`
--

CREATE TABLE `availableslots` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `slots` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `days` varchar(50) NOT NULL,
  `client in` time NOT NULL,
  `client out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availableslots`
--

INSERT INTO `availableslots` (`id`, `date`, `time`, `slots`, `created_at`, `updated_at`, `Name`, `price`, `days`, `client in`, `client out`) VALUES
(86, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:30:38', 'VR HOUSE', 7000, 'weekdays', '08:00:00', '06:00:00'),
(87, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:30:59', 'VR HOUSE', 8000, 'weekends', '06:00:00', '08:00:00'),
(88, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:08', 'VR HOUSE', 8000, 'weekdays', '08:00:00', '06:00:00'),
(89, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:12', 'VR HOUSE', 9000, 'weekends', '06:00:00', '08:00:00'),
(90, '2024-09-30', '22:00:00', 0, '2024-09-29 06:09:13', '2024-09-29 06:35:06', 'VR HOUSE', 18000, 'weekdays', '08:00:00', '06:00:00'),
(91, '2024-09-30', '22:00:00', 0, '2024-09-29 06:09:13', '2024-09-29 06:35:37', 'VR HOUSE', 20000, 'weekends', '08:00:00', '06:00:00'),
(92, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:23', 'AMACAN', 8000, 'weekdays', '08:00:00', '06:00:00'),
(93, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:25', 'AMACAN', 9000, 'weekends', '06:00:00', '08:00:00'),
(94, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:27', 'AMACAN', 9000, 'weekdays', '08:00:00', '06:00:00'),
(95, '2024-09-30', '12:00:00', 1, '2024-09-29 06:09:13', '2024-09-29 06:31:30', 'AMACAN', 10000, 'weekends', '06:00:00', '08:00:00'),
(96, '2024-09-30', '22:00:00', 0, '2024-09-29 06:09:13', '2024-09-29 06:35:18', 'AMACAN', 20000, 'weekdays', '08:00:00', '06:00:00'),
(97, '2024-09-30', '22:00:00', 0, '2024-09-29 06:09:13', '2024-09-29 06:35:34', 'AMACAN', 22000, 'weekends', '08:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries_amacan`
--

CREATE TABLE `inquiries_amacan` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `room` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `amenities` varchar(255) DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session` varchar(10) NOT NULL,
  `amenities_quantity` int(11) NOT NULL,
  `status` enum('accepted') DEFAULT 'accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries_amacan`
--

INSERT INTO `inquiries_amacan` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `amenities`, `preferred_date`, `created_at`, `session`, `amenities_quantity`, `status`) VALUES
(16, 'jenalyn surio kadusale', 'kadusalejenalyn65@gmail.com', '56', 'Amacan', 56, '56', '2024-10-15', '2024-09-29 21:23:29', 'AM', 56, 'accepted'),
(17, 'jenalyn surio kadusale', 'vergel@gmail.com', '45345', 'Amacan', 34543, '4353434', '2024-10-15', '2024-09-29 21:32:46', 'PM', 3, 'accepted'),
(18, 'jenalyn dfgd kadusale', 'vergelmacayan7@gmail.com', '456436', 'Amacan', 6546, '654645', '2024-09-30', '2024-09-29 21:36:30', 'Whole day', 5645, 'accepted'),
(19, 'jenalyn surio kadusale', 'kadusalejenalyn65@gmail.com', '454', 'Amacan', 5454, '545', '2024-09-30', '2024-09-29 21:40:06', 'Whole day', 45, 'accepted'),
(20, 'veer', 'kadusalejenalyn65@gmail.com', '454564', 'Amacan', 565, 'yhfgh', '2024-09-30', '2024-09-29 21:42:37', 'PM', 565, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries_vrhouse`
--

CREATE TABLE `inquiries_vrhouse` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session` varchar(100) DEFAULT NULL,
  `amenities_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries_vrhouse`
--

INSERT INTO `inquiries_vrhouse` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `amenities`, `preferred_date`, `created_at`, `session`, `amenities_quantity`) VALUES
(1, '436', 'kadusalejenalyn65@gmail.com', '534543', 'VR house', 534534, '5345', '2024-10-24', '2024-09-29 23:13:12', 'PM', 4353);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', 'admin'),
(3, 'admin123', '$2y$10$39rwqUoStgR0vNUE6PRl1O2EuD19dSqkRyfRh1JRPAxjdTQ08BU0.');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `country_of_residence` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `mailing_address` varchar(255) DEFAULT NULL,
  `preferred_language` varchar(50) DEFAULT NULL,
  `special_requests` text DEFAULT NULL,
  `number_of_guests` int(11) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `accommodation_type` varchar(100) DEFAULT NULL,
  `preferred_room_features` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vrhouse`
--

CREATE TABLE `vrhouse` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `slots` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vrhouse`
--

INSERT INTO `vrhouse` (`id`, `date`, `time`, `slots`, `created_at`, `updated_at`, `session`) VALUES
(1, '2024-10-24', '08:00:00', 1, '2024-09-30 05:07:56', '2024-09-30 05:07:56', 'AM'),
(2, '2024-10-24', '18:00:00', 0, '2024-09-30 05:07:56', '2024-09-30 05:13:12', 'PM'),
(3, '2024-10-24', '22:00:00', 0, '2024-09-30 05:07:56', '2024-09-30 05:13:12', 'Whole Day');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_inquiries`
--
ALTER TABLE `accepted_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `amacan`
--
ALTER TABLE `amacan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availableslots`
--
ALTER TABLE `availableslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries_amacan`
--
ALTER TABLE `inquiries_amacan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries_vrhouse`
--
ALTER TABLE `inquiries_vrhouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vrhouse`
--
ALTER TABLE `vrhouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_inquiries`
--
ALTER TABLE `accepted_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `amacan`
--
ALTER TABLE `amacan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `availableslots`
--
ALTER TABLE `availableslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `inquiries_amacan`
--
ALTER TABLE `inquiries_amacan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inquiries_vrhouse`
--
ALTER TABLE `inquiries_vrhouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vrhouse`
--
ALTER TABLE `vrhouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
