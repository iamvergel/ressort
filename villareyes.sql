-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 11:15 AM
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
  `contact_number` varchar(20) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_inquiries`
--

INSERT INTO `accepted_inquiries` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `preferred_date`, `created_at`, `session`, `code`, `price`, `status`) VALUES
(1, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:16:07', 'AM', 'VRFPR67037ca72a150', NULL, 'accepted'),
(2, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:16:11', 'AM', 'VRFPR67037cabd9bf0', NULL, 'accepted'),
(3, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:21:01', 'AM', 'VRFPR67037dcd06c0c', 0.00, '8000.00'),
(4, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:21:33', 'AM', 'VRFPR67037ded4f442', 8000.00, 'accepted'),
(5, 'Vergel Macayan', 'vergelmacayan7@gmail.com', '09363007580', 'Amacan', 10, '2024-10-17', '2024-10-07 06:33:37', 'AM', 'VRFPR670380c1ba873', 8000.00, 'accepted');

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
  `name` varchar(50) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availableslots`
--

INSERT INTO `availableslots` (`id`, `date`, `time`, `slots`, `created_at`, `updated_at`, `name`, `time_in`, `time_out`, `session`) VALUES
(264, '2024-10-15', '08:00:00', 0, '2024-10-07 03:09:49', '2024-10-07 03:10:17', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(265, '2024-10-15', '18:00:00', 0, '2024-10-07 03:09:49', '2024-10-07 03:10:17', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(266, '2024-10-15', '08:00:00', 0, '2024-10-07 03:09:49', '2024-10-07 03:10:17', 'VR House', '08:00:00', '18:00:00', 'AM'),
(267, '2024-10-15', '18:00:00', 0, '2024-10-07 03:09:49', '2024-10-07 03:10:17', 'VR House', '18:00:00', '06:00:00', 'PM'),
(268, '2024-10-15', '08:00:00', 0, '2024-10-07 03:09:49', '2024-10-07 03:10:17', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(269, '2024-10-16', '08:00:00', 0, '2024-10-07 03:10:37', '2024-10-07 03:11:20', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(270, '2024-10-16', '18:00:00', 1, '2024-10-07 03:10:37', '2024-10-07 03:10:37', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(271, '2024-10-16', '08:00:00', 0, '2024-10-07 03:10:37', '2024-10-07 03:24:23', 'VR House', '08:00:00', '18:00:00', 'AM'),
(272, '2024-10-16', '18:00:00', 1, '2024-10-07 03:10:37', '2024-10-07 03:10:37', 'VR House', '18:00:00', '06:00:00', 'PM'),
(273, '2024-10-16', '08:00:00', 0, '2024-10-07 03:10:37', '2024-10-07 03:11:20', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(274, '2024-10-17', '08:00:00', 0, '2024-10-07 06:32:12', '2024-10-07 06:33:27', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(275, '2024-10-17', '18:00:00', 1, '2024-10-07 06:32:12', '2024-10-07 06:32:12', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(276, '2024-10-17', '08:00:00', 1, '2024-10-07 06:32:12', '2024-10-07 06:32:12', 'VR House', '08:00:00', '18:00:00', 'AM'),
(277, '2024-10-17', '18:00:00', 1, '2024-10-07 06:32:12', '2024-10-07 06:32:12', 'VR House', '18:00:00', '06:00:00', 'PM'),
(278, '2024-10-17', '08:00:00', 0, '2024-10-07 06:32:12', '2024-10-07 06:33:27', '22 Hours', '08:00:00', '04:00:00', '22 Hours');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `preferred_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `session` varchar(100) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `preferred_date`, `created_at`, `session`, `code`, `price`, `status`) VALUES
(8, 'jenalyn surio kadusale', 'kadusalejenalyn65@gmail.com', '09626852365', 'Amacan & VR House', 20, '2024-10-15', '2024-10-06 21:10:17', '22 Hours', '670351199ebd2', 20000.00, 'pending'),
(9, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-06 21:11:20', 'AM', '67035158dd3f8', 8000.00, 'accepted'),
(10, 'jenalyn surio kadusale', 'kadusasdlejenalyn65@gmail.com', '09626852365', 'VR House', 10, '2024-10-16', '2024-10-06 21:24:23', 'AM', '67035467a81c5', 8000.00, 'pending'),
(11, 'Vergel Macayan', 'vergelmacayan7@gmail.com', '09363007580', 'Amacan', 10, '2024-10-17', '2024-10-07 00:33:27', 'AM', '670380b7853ab', 8000.00, 'accepted');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_inquiries`
--
ALTER TABLE `accepted_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availableslots`
--
ALTER TABLE `availableslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_inquiries`
--
ALTER TABLE `accepted_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `availableslots`
--
ALTER TABLE `availableslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
