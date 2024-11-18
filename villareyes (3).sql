-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 02:28 AM
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
  `status` varchar(50) DEFAULT NULL,
  `payment_screenshot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accepted_inquiries`
--

INSERT INTO `accepted_inquiries` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `preferred_date`, `created_at`, `session`, `code`, `price`, `status`, `payment_screenshot`) VALUES
(1, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:16:07', 'AM', 'VRFPR67037ca72a150', NULL, 'paid', NULL),
(2, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:16:11', 'AM', 'VRFPR67037cabd9bf0', NULL, 'accepted', NULL),
(3, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:21:01', 'AM', 'VRFPR67037dcd06c0c', 0.00, '8000.00', NULL),
(4, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-07 06:21:33', 'AM', 'VRFPR67037ded4f442', 8000.00, 'paid', NULL),
(5, 'Vergel Macayan', 'vergelmacayan7@gmail.com', '09363007580', 'Amacan', 10, '2024-10-17', '2024-10-07 06:33:37', 'AM', 'VRFPR670380c1ba873', 8000.00, 'paid', NULL),
(6, 'Vergel Macayan', 'vergelmacayan7@gmail.com', '09363007580', 'Amacan', 10, '2024-10-17', '2024-11-10 02:04:36', 'AM', 'VRFPR673014b4adb55', 8000.00, 'paid', NULL),
(7, 'jenalyn surio kadusale', 'kadusalejenalyn65@gmail.com', '09626852365', 'Amacan & VR House', 20, '2024-10-15', '2024-11-11 02:04:04', '22 Hours', 'VRFPR6731661422f75', 20000.00, 'paid', NULL),
(8, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan & VR House', 20, '2024-11-17', '2024-11-11 02:17:08', '22 Hours', 'VRFPR673169240321b', 20000.00, 'paid', NULL),
(9, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan', 10, '2024-11-12', '2024-11-11 03:47:43', 'AM', 'VRFPR67317e5fcbdd7', 8000.00, 'paid', NULL),
(10, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan', 10, '2024-11-11', '2024-11-11 03:50:24', 'PM', 'VRFPR67317f00b1886', 9000.00, 'paid', NULL),
(11, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan', 10, '2024-11-11', '2024-11-11 03:52:08', 'AM', 'VRFPR67317f6867c9d', 8000.00, 'paid', NULL),
(12, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan', 10, '2024-11-21', '2024-11-17 16:10:55', 'PM', 'VRFPR673a158f7c4cb', 9000.00, 'accepted', NULL),
(13, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan & VR House', 20, '2024-11-22', '2024-11-17 16:19:51', '22 Hours', 'VRFPR673a17a702261', 20000.00, 'accepted', NULL),
(14, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan', 10, '2024-10-16', '2024-11-17 16:20:09', 'PM', 'VRFPR673a17b965940', 9000.00, 'accepted', NULL),
(15, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan', 10, '2024-11-20', '2024-11-17 16:46:15', 'PM', 'VRFPR673a1dd7da19f', 9000.00, 'accepted', 'payment_1731853851.png'),
(16, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan', 10, '2024-11-18', '2024-11-17 16:48:56', 'AM', 'VRFPR673a1e788a0c0', 8000.00, 'accepted', NULL),
(17, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan', 10, '2024-11-18', '2024-11-17 16:49:59', 'PM', 'VRFPR673a1eb77a54f', 9000.00, 'accepted', NULL),
(18, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan', 10, '2024-11-19', '2024-11-17 16:50:54', 'AM', 'VRFPR673a1eeef2ec1', 8000.00, 'accepted', NULL),
(19, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'VR House', 10, '2024-11-21', '2024-11-17 16:52:18', 'AM', 'VRFPR673a1f425d5a7', 8000.00, 'accepted', 'payment_jenalyn_kadusale_macayan_20241121.png'),
(20, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'Amacan & VR House', 10, '2024-11-23', '2024-11-17 16:53:24', '22 Hours', 'VRFPR673a1f849f6ca', 10000.00, 'accepted', 'payment_jenalyn_kadusale_macayan_20241123.png'),
(21, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'VR House', 10, '2024-11-16', '2024-11-18 01:13:51', 'PM', 'VRFPR673a94cf6de91', 10000.00, 'accepted', 'payment_jenalyn_kadusale_macayan_20241116.jpg');

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
(270, '2024-10-16', '18:00:00', 0, '2024-10-07 03:10:37', '2024-11-11 00:36:39', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(271, '2024-10-16', '08:00:00', 0, '2024-10-07 03:10:37', '2024-10-07 03:24:23', 'VR House', '08:00:00', '18:00:00', 'AM'),
(272, '2024-10-16', '18:00:00', 1, '2024-10-07 03:10:37', '2024-10-07 03:10:37', 'VR House', '18:00:00', '06:00:00', 'PM'),
(273, '2024-10-16', '08:00:00', 0, '2024-10-07 03:10:37', '2024-10-07 03:11:20', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(274, '2024-10-17', '08:00:00', 0, '2024-10-07 06:32:12', '2024-10-07 06:33:27', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(275, '2024-10-17', '18:00:00', 0, '2024-10-07 06:32:12', '2024-11-11 01:06:15', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(276, '2024-10-17', '08:00:00', 0, '2024-10-07 06:32:12', '2024-11-11 01:04:32', 'VR House', '08:00:00', '18:00:00', 'AM'),
(277, '2024-10-17', '18:00:00', 1, '2024-10-07 06:32:12', '2024-10-07 06:32:12', 'VR House', '18:00:00', '06:00:00', 'PM'),
(278, '2024-10-17', '08:00:00', 0, '2024-10-07 06:32:12', '2024-10-07 06:33:27', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(279, '2024-12-12', '08:00:00', 0, '2024-11-11 01:06:45', '2024-11-11 01:07:12', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(280, '2024-12-12', '18:00:00', 0, '2024-11-11 01:06:45', '2024-11-11 01:07:12', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(281, '2024-12-12', '08:00:00', 0, '2024-11-11 01:06:45', '2024-11-11 01:07:12', 'VR House', '08:00:00', '18:00:00', 'AM'),
(282, '2024-12-12', '18:00:00', 0, '2024-11-11 01:06:45', '2024-11-11 01:07:12', 'VR House', '18:00:00', '06:00:00', 'PM'),
(283, '2024-12-12', '08:00:00', 0, '2024-11-11 01:06:45', '2024-11-11 01:07:12', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(284, '2024-11-14', '08:00:00', 0, '2024-11-11 01:08:06', '2024-11-11 01:08:16', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(285, '2024-11-14', '18:00:00', 0, '2024-11-11 01:08:06', '2024-11-11 01:08:16', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(286, '2024-11-14', '08:00:00', 0, '2024-11-11 01:08:06', '2024-11-11 01:08:16', 'VR House', '08:00:00', '18:00:00', 'AM'),
(287, '2024-11-14', '18:00:00', 0, '2024-11-11 01:08:06', '2024-11-11 01:08:16', 'VR House', '18:00:00', '06:00:00', 'PM'),
(288, '2024-11-14', '08:00:00', 0, '2024-11-11 01:08:06', '2024-11-11 01:08:16', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(289, '2024-11-15', '08:00:00', 0, '2024-11-11 01:09:30', '2024-11-11 01:09:47', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(290, '2024-11-15', '18:00:00', 0, '2024-11-11 01:09:30', '2024-11-11 01:09:47', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(291, '2024-11-15', '08:00:00', 0, '2024-11-11 01:09:30', '2024-11-11 01:09:47', 'VR House', '08:00:00', '18:00:00', 'AM'),
(292, '2024-11-15', '18:00:00', 0, '2024-11-11 01:09:30', '2024-11-11 01:09:47', 'VR House', '18:00:00', '06:00:00', 'PM'),
(293, '2024-11-15', '08:00:00', 0, '2024-11-11 01:09:30', '2024-11-11 01:09:47', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(294, '2024-11-13', '08:00:00', 0, '2024-11-11 01:13:06', '2024-11-11 01:13:22', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(295, '2024-11-13', '18:00:00', 0, '2024-11-11 01:13:06', '2024-11-11 01:13:22', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(296, '2024-11-13', '08:00:00', 0, '2024-11-11 01:13:06', '2024-11-11 01:13:22', 'VR House', '08:00:00', '18:00:00', 'AM'),
(297, '2024-11-13', '18:00:00', 0, '2024-11-11 01:13:06', '2024-11-11 01:13:22', 'VR House', '18:00:00', '06:00:00', 'PM'),
(298, '2024-11-13', '08:00:00', 0, '2024-11-11 01:13:06', '2024-11-11 01:13:22', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(299, '2024-11-12', '08:00:00', 0, '2024-11-11 01:13:42', '2024-11-11 01:13:56', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(300, '2024-11-12', '18:00:00', 0, '2024-11-11 01:13:42', '2024-11-11 01:18:36', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(301, '2024-11-12', '08:00:00', 0, '2024-11-11 01:13:42', '2024-11-11 01:14:55', 'VR House', '08:00:00', '18:00:00', 'AM'),
(302, '2024-11-12', '18:00:00', 0, '2024-11-11 01:13:42', '2024-11-11 01:37:20', 'VR House', '18:00:00', '06:00:00', 'PM'),
(303, '2024-11-12', '08:00:00', 0, '2024-11-11 01:13:42', '2024-11-11 01:13:56', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(304, '2024-11-16', '08:00:00', 0, '2024-11-11 01:24:28', '2024-11-11 01:24:45', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(305, '2024-11-16', '18:00:00', 0, '2024-11-11 01:24:28', '2024-11-11 01:27:37', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(306, '2024-11-16', '08:00:00', 0, '2024-11-11 01:24:28', '2024-11-12 01:19:53', 'VR House', '08:00:00', '18:00:00', 'AM'),
(307, '2024-11-16', '18:00:00', 0, '2024-11-11 01:24:28', '2024-11-17 14:50:32', 'VR House', '18:00:00', '06:00:00', 'PM'),
(308, '2024-11-16', '08:00:00', 0, '2024-11-11 01:24:28', '2024-11-11 01:24:45', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(309, '2024-11-11', '08:00:00', 0, '2024-11-11 01:29:09', '2024-11-11 01:29:21', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(310, '2024-11-11', '18:00:00', 0, '2024-11-11 01:29:09', '2024-11-11 01:29:49', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(311, '2024-11-11', '08:00:00', 0, '2024-11-11 01:29:09', '2024-11-11 01:30:39', 'VR House', '08:00:00', '18:00:00', 'AM'),
(312, '2024-11-11', '18:00:00', 1, '2024-11-11 01:29:09', '2024-11-11 01:29:09', 'VR House', '18:00:00', '06:00:00', 'PM'),
(313, '2024-11-11', '08:00:00', 0, '2024-11-11 01:29:09', '2024-11-11 01:29:21', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(314, '2024-11-17', '08:00:00', 0, '2024-11-11 01:37:42', '2024-11-11 01:37:53', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(315, '2024-11-17', '18:00:00', 0, '2024-11-11 01:37:42', '2024-11-11 01:37:53', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(316, '2024-11-17', '08:00:00', 0, '2024-11-11 01:37:42', '2024-11-11 01:37:53', 'VR House', '08:00:00', '18:00:00', 'AM'),
(317, '2024-11-17', '18:00:00', 0, '2024-11-11 01:37:42', '2024-11-11 01:37:53', 'VR House', '18:00:00', '06:00:00', 'PM'),
(318, '2024-11-17', '08:00:00', 0, '2024-11-11 01:37:42', '2024-11-11 01:37:53', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(319, '2024-11-18', '08:00:00', 0, '2024-11-12 01:22:46', '2024-11-17 14:02:07', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(320, '2024-11-18', '18:00:00', 0, '2024-11-12 01:22:46', '2024-11-17 14:05:07', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(321, '2024-11-18', '08:00:00', 1, '2024-11-12 01:22:46', '2024-11-12 01:22:46', 'VR House', '08:00:00', '18:00:00', 'AM'),
(322, '2024-11-18', '18:00:00', 1, '2024-11-12 01:22:46', '2024-11-12 01:22:46', 'VR House', '18:00:00', '06:00:00', 'PM'),
(323, '2024-11-18', '08:00:00', 0, '2024-11-12 01:22:46', '2024-11-17 14:02:07', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(324, '2024-11-19', '08:00:00', 0, '2024-11-17 14:08:12', '2024-11-17 14:08:30', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(325, '2024-11-19', '18:00:00', 0, '2024-11-17 14:08:12', '2024-11-17 14:12:36', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(326, '2024-11-19', '08:00:00', 1, '2024-11-17 14:08:12', '2024-11-17 14:08:12', 'VR House', '08:00:00', '18:00:00', 'AM'),
(327, '2024-11-19', '18:00:00', 1, '2024-11-17 14:08:12', '2024-11-17 14:08:12', 'VR House', '18:00:00', '06:00:00', 'PM'),
(328, '2024-11-19', '08:00:00', 0, '2024-11-17 14:08:12', '2024-11-17 14:08:30', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(329, '2024-11-20', '08:00:00', 0, '2024-11-17 14:16:57', '2024-11-17 14:31:57', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(330, '2024-11-20', '18:00:00', 0, '2024-11-17 14:16:57', '2024-11-17 14:33:31', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(331, '2024-11-20', '08:00:00', 0, '2024-11-17 14:16:57', '2024-11-18 01:12:52', 'VR House', '08:00:00', '18:00:00', 'AM'),
(332, '2024-11-20', '18:00:00', 1, '2024-11-17 14:16:57', '2024-11-17 14:16:57', 'VR House', '18:00:00', '06:00:00', 'PM'),
(333, '2024-11-20', '08:00:00', 0, '2024-11-17 14:16:57', '2024-11-17 14:31:57', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(334, '2024-11-21', '08:00:00', 0, '2024-11-17 14:38:15', '2024-11-17 14:38:43', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(335, '2024-11-21', '18:00:00', 0, '2024-11-17 14:38:15', '2024-11-17 14:46:03', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(336, '2024-11-21', '08:00:00', 0, '2024-11-17 14:38:15', '2024-11-17 14:54:55', 'VR House', '08:00:00', '18:00:00', 'AM'),
(337, '2024-11-21', '18:00:00', 1, '2024-11-17 14:38:15', '2024-11-17 14:38:15', 'VR House', '18:00:00', '06:00:00', 'PM'),
(338, '2024-11-21', '08:00:00', 0, '2024-11-17 14:38:15', '2024-11-17 14:38:43', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(339, '2024-11-22', '08:00:00', 0, '2024-11-17 14:55:35', '2024-11-17 14:55:53', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(340, '2024-11-22', '18:00:00', 0, '2024-11-17 14:55:35', '2024-11-17 14:55:53', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(341, '2024-11-22', '08:00:00', 0, '2024-11-17 14:55:35', '2024-11-17 14:55:53', 'VR House', '08:00:00', '18:00:00', 'AM'),
(342, '2024-11-22', '18:00:00', 0, '2024-11-17 14:55:35', '2024-11-17 14:55:53', 'VR House', '18:00:00', '06:00:00', 'PM'),
(343, '2024-11-22', '08:00:00', 0, '2024-11-17 14:55:35', '2024-11-17 14:55:53', '22 Hours', '08:00:00', '04:00:00', '22 Hours'),
(344, '2024-11-23', '08:00:00', 0, '2024-11-17 16:32:37', '2024-11-17 16:53:16', 'Amacan', '08:00:00', '18:00:00', 'AM'),
(345, '2024-11-23', '18:00:00', 0, '2024-11-17 16:32:37', '2024-11-17 16:53:16', 'Amacan', '18:00:00', '06:00:00', 'PM'),
(346, '2024-11-23', '08:00:00', 0, '2024-11-17 16:32:37', '2024-11-17 16:53:16', 'VR House', '08:00:00', '18:00:00', 'AM'),
(347, '2024-11-23', '18:00:00', 0, '2024-11-17 16:32:37', '2024-11-17 16:53:16', 'VR House', '18:00:00', '06:00:00', 'PM'),
(348, '2024-11-23', '08:00:00', 0, '2024-11-17 16:32:37', '2024-11-17 16:53:16', '22 Hours', '08:00:00', '04:00:00', '22 Hours');

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
  `payment_screenshot` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `email`, `contact_number`, `room`, `quantity`, `preferred_date`, `created_at`, `session`, `code`, `price`, `payment_screenshot`, `status`) VALUES
(9, 'jenalyn surio kadusale', 'kadusaflejenalyn65@gmail.com', '09626852365', 'Amacan', 10, '2024-10-16', '2024-10-06 21:11:20', 'AM', '67035158dd3f8', 8000.00, NULL, 'accepted'),
(10, 'jenalyn surio kadusale', 'kadusasdlejenalyn65@gmail.com', '09626852365', 'VR House', 10, '2024-10-16', '2024-10-06 21:24:23', 'AM', '67035467a81c5', 8000.00, NULL, 'pending'),
(22, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'Amacan & VR House', 10, '2024-11-12', '2024-11-10 18:37:20', '22 Hours', '67315fd08dfe4', 9000.00, NULL, 'declined'),
(24, 'jenalyn surio kadusale', 'vergelmacayan7@gmail.com', '09363007584', 'VR House', 10, '2024-11-16', '2024-11-11 18:19:53', 'AM', '6732ad39a2ae5', 9000.00, NULL, 'pending'),
(36, 'Jenalyn Kadusale Macayan', 'vergelmacayan7@gmail.com', '09054621457', 'VR House', 10, '2024-11-20', '2024-11-17 18:12:52', 'AM', '673a949434bf2', 8000.00, 'payment_jenalyn_kadusale_macayan_20241120.png', 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verification_code` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `email`, `name`, `phone`, `street_address`, `verified`, `verification_code`, `created_at`, `updated_at`) VALUES
(3, 'admin123', '$2y$10$39rwqUoStgR0vNUE6PRl1O2EuD19dSqkRyfRh1JRPAxjdTQ08BU0.', '', '', NULL, NULL, 1, '', '2024-11-11 00:03:14', '2024-11-11 00:03:30'),
(6, 'villareyes@gmail.com', '$2y$10$f0YUmTlt.VUsk9TfPBQDNeK6WO2OtC.og5ndwP9rOyj9cNfjdPrkK', '', '', NULL, NULL, 1, '', '2024-11-10 17:10:07', '2024-11-11 00:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verification_code` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`id`, `email`, `name`, `username`, `password_hash`, `phone`, `street_address`, `verified`, `verification_code`, `created_at`, `updated_at`) VALUES
(8, 'vergelmacayan@gmail.com', 'jenalyn surio kadusale', 'dada', '$2y$10$5o3jPV6ar1WqW63U20XC/eNXjXQXK2g0wOa8QF3rjJgK96M.miggC', '09363007584', 'ph8a pkg11c blk126 ex. lot bagong silang caloocan city', 1, '979275', '2024-11-10 04:58:03', '2024-11-11 04:27:25'),
(9, 'vergelmacaya@gmail.com', 'jenalyn surio kadusale', 'pogi', '$2y$10$zrJsF8hX4VFPSZKYSC7SFutHoW9//eMo93psfBu9mrK2pG0uGklp6', '09363007584', 'ph8a pkg11c blk126 ex. lot bagong silang caloocan city', 0, '148783', '2024-11-10 05:13:41', '2024-11-17 12:47:20'),
(10, 'vergelmacayan7@gmail.com', 'Jenalyn Kadusale Macayan', 'pogopogi', '$2y$10$iiS90XLAM33mB1.Xayox5uiP393FXglI0FX8na1diIuBHgSjs4WwO', '09054621457', '17364 Rosal St. Bo. Sanlazaro', 1, '512728', '2024-11-17 12:47:58', '2024-11-17 12:48:55'),
(11, 'vmacayan7@gmail.com', 'Jenalyn Kadusale Macayan', '2021-0448', '$2y$10$jyAysa.8oeifrbXHk.nU/u/VgopPb0ayxPIuNlesXj4UpHsy0qufC', '09054621457', '17364 Rosal St. Bo. Sanlazaro', 0, '960362', '2024-11-18 01:15:28', '2024-11-18 01:15:28');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_inquiries`
--
ALTER TABLE `accepted_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `availableslots`
--
ALTER TABLE `availableslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
