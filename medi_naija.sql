-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 04:37 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medi_naija`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` time NOT NULL,
  `Accept_appointment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `title`, `description`, `date`, `user_id`, `doctor_id`, `completed`, `created_at`, `updated_at`, `time`, `Accept_appointment`) VALUES
(2, 'PHP', 'you look for you', '2019-09-22', 12, 3, 0, '2019-09-21 18:58:42', '2019-09-21 18:58:42', '12:00:00', 0),
(3, 'yes yes', 'helllo world', '2019-09-24', 10, 7, 0, '2019-09-23 15:45:20', '2019-09-23 15:45:20', '12:00:00', 0),
(4, 'Ooo', 'nndndbndnd', '2019-09-25', 10, 7, 0, '2019-09-24 09:14:05', '2019-09-24 09:14:05', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fellowship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `internship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `specialities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `full_name`, `user`, `email`, `dob`, `gender`, `address`, `city`, `state`, `website`, `phonenumber`, `affiliation`, `certification`, `residency`, `fellowship`, `experience`, `internship`, `medical_school`, `image`, `specialities`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tosin Falodun', 'doctor', 'faloduntosin0@gmail.com', '1991-12-12', 'male', 'No 19, Yesufu Sanusi', 'lagos', 'Abia', 'www.new.com', '08107280750', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, 'alcom', 'yes, abuda', '1565615289.jpg', 'General Medicine', 'This is what i mean', '2019-08-12 12:08:09', '2019-08-12 12:08:09'),
(2, 3, 'Sola owonikoko', 'doctor', 'sola@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Kwara', 'www.tosin.com', '081928383828', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, 'alcom', 'yes, abuda', '1565679176.jpg', 'General Hospital', 'I think it is well', '2019-08-13 05:52:56', '2019-08-13 05:52:56'),
(3, 7, 'Dami Oyo', 'doctor', 'dami@gmail.com', '1222-12-12', 'male', 'No 19, Yesufu Sanusi', 'lagos', 'Adamawa', 'www.pricelessbaba.com', '08992929292', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, 'alcom', 'yes, abuda', '1566328318.PNG', 'General Hospital', 'The responsibilities and duties section is the most important part of the job description. Here you should outline the functions this position will perform on a regular basis, how the job fun', '2019-08-20 18:11:58', '2019-08-20 18:11:58'),
(4, 17, 'mercy', 'doctor', 'mercy@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.mercy.com', '0883838383', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, '5', 'yes, abuda', '1566676281.jpeg', 'General Hospital', 'I love to treat all', '2019-08-24 18:51:21', '2019-08-24 18:51:21'),
(5, 15, 'ado', 'doctor', 'pricelessbaba@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.ado.com', '83838383838', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, 'alcom', 'yes, abuda', '1566762323.jpg', 'General Hospital', 'i am so happy with this job', '2019-08-25 18:45:23', '2019-08-25 18:45:23'),
(6, 10, 'Falodun', 'doctor', 'mrfaloduntosin@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.tosin.com', '08299399393', NULL, 'DOCTORATE', 'LAGOS', 'FNGN', 3, 'alcom', 'yes, abuda', '1568571665.jpg', 'General Hospital', 'very good', '2019-09-15 17:21:05', '2019-09-15 17:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `non_profit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cac_certified` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accreditation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_cost` int(11) NOT NULL,
  `bed_size` int(11) DEFAULT NULL,
  `length_of_stay` int(11) NOT NULL,
  `specialities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `user_id`, `full_name`, `user`, `email`, `dob`, `gender`, `address`, `city`, `state`, `website`, `phonenumber`, `non_profit`, `cac_certified`, `accreditation`, `ownership_type`, `average_cost`, `bed_size`, `length_of_stay`, `specialities`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hezekial Owonikoko', 'hospital', 'hezekial@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.new.com', '0030448130', 'nonprofit', 'No', 'yes', 'Public', 2000, 5, 20, 'General Medicine', '1565718181.jpg', '2019-08-13 16:43:01', '2019-08-13 16:43:01'),
(2, 4, 'nike owo', 'hospital', 'nike@gmail.com', '9199-12-12', 'female', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.tosin.com', '09929299292', 'nonprofit', 'No', 'yes', 'private', 2000, 5, 20, 'Pharmacy', '1565718300.jpg', '2019-08-13 16:45:00', '2019-08-13 16:45:00'),
(3, 5, 'bori owo', 'hospital', 'bori@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.pricelessbaba.com', '93939939', 'profit', 'CAC', 'yes', 'private', 2000, 5, 20, 'General Hospital', '1566080412.jpg', '2019-08-17 21:20:12', '2019-08-17 21:20:12'),
(4, 6, 'Sunday Abo', 'hospital', 'abo@gmail.com', '1991-12-12', 'male', 'No 19, Yesufu Sanusi', 'lagos', 'Abia', 'www.new.com', '0800000000', 'profit', 'CAC', 'yes', 'private', 2000, 5, 20, 'General Medicine', '1566328039.png', '2019-08-20 18:07:19', '2019-08-20 18:07:19'),
(5, 8, 'florence sen', 'hospital', 'florence@gmail.com', '0011-12-12', 'male', 'no 28 isaac osoba', 'hdhhdh', 'Abia', 'www.tosin.com', '93939393939', 'profit', 'CAC', 'yes', 'private', 2000, 5, 20, 'General Hospital', '1566328709.jpg', '2019-08-20 18:18:29', '2019-08-20 18:18:29'),
(6, 9, 'Ola owonikoko', 'hospital', 'olaowo@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'laogos', 'Ekiti', 'www.ola.com', '939399393', 'profit', 'CAC', 'yes', 'private', 2000, 5, 20, 'General Hospital', '1566570422.jpg', '2019-08-23 13:27:02', '2019-08-23 13:27:02'),
(7, 16, 'adebayo', 'hospital', 'adebayo@gmail.com', '1991-12-12', 'male', 'no 28 isaac osoba', 'lagos', 'Abia', 'www.pricelessbaba.com', '93939393939', 'profit', 'CAC', 'yes', 'private', 5000, 5, 20, 'General Hospital', '1566686120.jpg', '2019-08-24 21:35:20', '2019-08-24 21:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `read`, `text`, `created_at`, `updated_at`) VALUES
(222, 10, 1, 0, 'hi', '2019-09-23 15:07:11', '2019-09-23 15:07:11'),
(223, 10, 2, 0, 'hello', '2019-09-23 15:09:27', '2019-09-23 15:09:27'),
(224, 12, 3, 0, 'hi', '2019-09-23 17:54:19', '2019-09-23 17:54:19'),
(225, 12, 3, 0, 'how are you?', '2019-09-23 17:54:57', '2019-09-23 17:54:57'),
(226, 10, 7, 0, 'hi', '2019-09-24 09:15:03', '2019-09-24 09:15:03'),
(227, 10, 7, 0, 'how are you?', '2019-09-24 09:15:15', '2019-09-24 09:15:15'),
(228, 12, 3, 0, 'okay', '2019-09-24 10:48:11', '2019-09-24 10:48:11'),
(229, 3, 12, 0, 'how are you', '2019-09-24 10:48:25', '2019-09-24 10:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(65, '2014_10_12_000000_create_users_table', 1),
(66, '2014_10_12_100000_create_password_resets_table', 1),
(67, '2019_07_27_110417_create_profile_table', 1),
(68, '2019_08_10_160424_create_doctors_table', 1),
(69, '2019_08_13_163359_create_hospital_table', 2),
(70, '2019_08_13_165008_create_hospital_table', 3),
(71, '2019_08_27_204446_create_messages_table', 4),
(72, '2019_09_14_204330_add_read_to_messages', 5),
(73, '2019_09_17_042412_create_appointments_table', 6),
(74, '2019_08_21_021108_create_appointments_table', 7),
(75, '2019_08_23_174832_add_time_to_appointment', 7),
(76, '2019_08_24_230221_add_is_acceted_appointments', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pricelessbaba@yahoo.com', '$2y$10$tWStMgX9Hl2J1NngYQf3peN2HDt4H4K4ZEdoKSNa/got4HXTNGKkO', '2019-08-24 07:05:02'),
('mrfaloduntosin@gmail.com', '$2y$10$fcFDJsobooXE1giAVOTKyeQ7TpMmbhlwvx1Ay7548Hr8Wah/uBeFO', '2019-08-24 10:36:03'),
('faloduntosin0@gmail.com', '$2y$10$NQUQ4YBRqKPomzlnnf7p.uOTTkausEwyfKfjvNjHulcRReIuyoHxa', '2019-08-24 10:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user`, `phonenumber`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tosin Falodun', 'doctor', '08107280750', 'faloduntosin0@gmail.com', NULL, '$2y$10$jF7Vy9szDjfzELYHnS4dxe5UbJyxmTvJSh9VeGiDTIwsToprgEVEK', NULL, '2019-08-12 12:06:56', '2019-08-12 12:06:56'),
(2, 'Hezekial Owonikoko', 'hospital', '0030448130', 'hezekial@gmail.com', NULL, '$2y$10$HMuQ.r5Lgs9K2zEzkMAq5efyDqSjVLLG9lulNAKaAC5fHfLponPQy', NULL, '2019-08-12 21:42:18', '2019-08-12 21:42:18'),
(3, 'Sola owonikoko', 'doctor', '081928383828', 'sola@gmail.com', NULL, '$2y$10$RKEOv//wTz.QLMw.Zj3l6uLaZh/h.l.qJTVYFtNMMNVlRpg72r3r.', NULL, '2019-08-12 21:43:13', '2019-08-12 21:43:13'),
(4, 'nike owo', 'hospital', '09929299292', 'nike@gmail.com', NULL, '$2y$10$DGsYr9qTsJPUbWA3rqJXNe5n1djYEmGO476fb9Br7x9GAk7Per0zu', NULL, '2019-08-12 21:44:50', '2019-08-12 21:44:50'),
(5, 'bori owo', 'hospital', '93939939', 'bori@gmail.com', NULL, '$2y$10$7sFHhv78Z8XxFM0SnGpaCeCsX0J7uliHgiqu547x7IULrybJMofT2', NULL, '2019-08-17 21:18:40', '2019-08-17 21:18:40'),
(6, 'Sunday Abo', 'hospital', '0800000000', 'abo@gmail.com', NULL, '$2y$10$HG0soSj/NVVBxJZ9VxxmIeRdxiZG970s/IUxdIVPGhLB0HznpBS1W', NULL, '2019-08-20 17:45:55', '2019-08-20 17:45:55'),
(7, 'Dami Oyo', 'doctor', '08992929292', 'dami@gmail.com', NULL, '$2y$10$aOcS4G9w.I/l6zv3lOHJouOyzwuEP0gBGG/TKpLSF3pqsuIsnbst6', NULL, '2019-08-20 17:53:56', '2019-08-20 17:53:56'),
(8, 'florence sen', 'hospital', '93939393939', 'florence@gmail.com', NULL, '$2y$10$PwdBLF7ht0mlIbhnKGk6nuas7g09WXlGVSbqhNGwRaZn8LV400Txi', NULL, '2019-08-20 18:16:46', '2019-08-20 18:16:46'),
(9, 'Ola owonikoko', 'hospital', '939399393', 'olaowo@gmail.com', NULL, '$2y$10$yljG/0JjoY35VyUGe1ocGuuyYdMMa04PdA9QVlTqBZ5SjtIstkBhO', NULL, '2019-08-23 13:24:24', '2019-08-23 13:24:24'),
(10, 'Falodun', 'doctor', '08299399393', 'mrfaloduntosin@gmail.com', '2019-09-14 15:18:13', '$2y$10$anuNLF4.o7iOja9NV6Yxie3u20dVEP4y5VHyXRc8aZtXv20c2JYHS', NULL, '2019-08-23 17:01:23', '2019-09-14 15:18:13'),
(11, 'Tosin Falodun', 'hospital', '999399399', 'pricelessbaba@yahoo.com', NULL, '$2y$10$viy5mbmzeZW1J7gTp7CPauB.EGgdIq7tpmc2Xy7xg8sx6ILt5Yyay', NULL, '2019-08-23 17:14:31', '2019-08-23 17:14:31'),
(12, 'Tosin', 'user', '082828282828', 'medinaijaproject@gmail.com', '2019-08-23 17:53:01', '$2y$10$zAopFqfIVQHtKCNbMRCUwufgy4grX8r71rbI/fYya.hQRlaXqOa7e', NULL, '2019-08-23 17:49:33', '2019-08-23 17:53:01'),
(13, 'Tosin', 'doctor', '081181881181', 'tosin@staforteedge.com', NULL, '$2y$10$A7/tX57t/E3/8RMDlon60eooDujn54rn313iu45KSw5qBawnvlG2i', NULL, '2019-08-23 17:55:20', '2019-08-23 17:55:20'),
(14, 'Tosin Falodun', 'doctor', '8993393939', 'tosin@stanforteedge.com', '2019-08-23 17:59:53', '$2y$10$wLRI104E1q.cZFKJwpccKegV8HkeQZaBbEWALZGTEqATd.i4KgQGK', '8XsaYiXb7F5wo2oDrUCavTZ5vu5RTOQ8di4hsr1vSuwYAFaELTc56tvJGDvL', '2019-08-23 17:58:37', '2019-08-23 18:06:05'),
(15, 'ado', 'doctor', '83838383838', 'pricelessbaba@gmail.com', NULL, '$2y$10$d3NbCtvn4hRanbe.4Dh8MOXy/.8dRZwbelS3f9V5/3gK/hGAuAtdq', NULL, '2019-08-24 07:23:47', '2019-08-24 07:23:47'),
(16, 'adebayo', 'hospital', '93939393939', 'adebayo@gmail.com', NULL, '$2y$10$3hDeynffuhHMlgC3FHz19eUXfSopnCN2WoJZRPjjbereLZ1d.R682', NULL, '2019-08-24 17:38:22', '2019-08-24 17:38:22'),
(17, 'mercy', 'doctor', '0883838383', 'mercy@gmail.com', NULL, '$2y$10$5FXWgw9Ot5C7SDxQK6V53eMFVsZJotIs.Uo8T0G3IDSGRfr2xSK.2', NULL, '2019-08-24 18:06:55', '2019-08-24 18:06:55'),
(18, 'Bola Ajijala', 'user', '080883883838', 'bola@gmail.com', NULL, '$2y$10$1ZfVLqM9SbecaC970bdrY.aHVr/i0KkFMXbHY06BBLFJbF4mnnrn2', NULL, '2019-09-22 16:18:44', '2019-09-22 16:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genotype` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `full_name`, `user`, `email`, `dob`, `gender`, `address`, `city`, `state`, `phonenumber`, `blood_group`, `genotype`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 12, 'Tosin', 'user', 'medinaijaproject@gmail.com', '1991-12-12', 'male', 'No 19, Yesufu Sanusi', 'lagos', 'Gombe', '082828282828', '0 positive', 'ss', '1568576600.jpg', 'i will take this', '2019-09-15 18:43:20', '2019-09-15 18:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hospitals_email_unique` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_profiles_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
