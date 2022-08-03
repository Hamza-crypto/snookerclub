-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2022 at 11:00 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u951408056_snookerclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlighted` int(11) NOT NULL DEFAULT 0,
  `dob` date NOT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plays_with` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_since` int(11) DEFAULT NULL,
  `highest_break` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `won_lost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titles` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earnings` int(11) DEFAULT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `highlighted`, `dob`, `birth_place`, `residence`, `plays_with`, `professional_since`, `highest_break`, `won_lost`, `titles`, `earnings`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(24, 'Uriah Velez', 1, '2022-07-19', 'Sit ab doloremque c', 'Nesciunt quos place', 'Right-handed', 2022, '120', 'Ea in nobis et nihil', 'Esse est ut ex repre', 51, '1658232001.png', NULL, '2022-07-19 13:00:01', '2022-07-19 13:00:01'),
(25, 'Freya Mosley', 1, '2022-07-19', 'Vero omnis quis enim', 'Labore tempor adipis', 'Right-handed', 2022, '120', 'Inventore officiis v', 'Consequatur ut est', 28, '1658232009.png', NULL, '2022-07-19 13:00:09', '2022-07-19 13:00:09'),
(26, 'Abderrahmane Ech-Chorfy\r\n', 0, '1992-02-19', 'Settat, Maroc\r\n', 'Settat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(28, 'Jaouad Tabit', 0, '1984-09-02', 'Casablanca, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(29, 'Bouchaib Farhat\r\n', 0, '1990-05-09', 'Casablanca, Maroc\r\n', 'Casablanca, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(30, 'Abderrahim Bendouro\r\n', 0, '1993-08-01', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(31, 'Reda Amira\r\n', 0, '1990-11-18', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(32, 'Soulaimane Ouzzaouit\r\n', 0, '1998-05-08', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(33, 'Said Idaissa\r\n', 0, '1987-07-16', 'Casablanca, Maroc\r\n', 'Casablanca, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(34, 'Amine Amiri', 0, '1994-03-30', 'Casablanca, Maroc\r\n', 'Casablanca, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(35, 'Nabil El kendsi', 0, '1991-07-11', 'Casablanca, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(36, 'Amine Azelmat', 0, '2001-05-03', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Left-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(37, 'Abdelilah Assousse', 0, '1984-02-20', 'Casablanca, Maroc\r\n', 'Casablanca, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(38, 'Abdelilah Tastafout', 0, '1979-01-01', 'Marrakech, Maroc\r\n', 'Casablanca, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(39, 'Youssef Bouchara', 0, '1992-01-01', 'Salé, Maroc\r\n', 'Salé, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(40, 'mhamed esselaoui', 0, '1980-06-12', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(41, 'Badr Edddine Bouhaddou', 0, '1997-07-07', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(42, 'Tareq El Missaoui', 0, '1991-08-01', 'Rabat, Maroc\r\n', 'Salé, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(43, 'Yazid Lghettas', 0, '2001-01-03', 'Kenitra, Maroc\r\n', 'Kenitra, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(44, 'Ahmed Boutahar', 0, '1998-07-08', 'Rabat, Maroc\r\n', 'Meknès, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(45, 'Reda Benhammou', 0, '1999-11-07', 'Rabat, Maroc\r\n', 'Salé, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(46, 'Yassine Eladdad', 0, '1991-02-27', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09'),
(47, 'Karim Ouhabi', 0, '1999-10-14', 'Rabat, Maroc\r\n', 'Rabat, Maroc\r\n', 'Right-handed', 2022, NULL, '0/0', '0', 0, NULL, NULL, '2022-07-23 13:00:09', '2022-07-23 13:00:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
