-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 05:20 AM
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
-- Database: `personal_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_education`
--

CREATE TABLE `academic_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `edu_level` varchar(255) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `major_group` varchar(255) NOT NULL,
  `exam_board` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) NOT NULL,
  `is_foreign_inst` tinyint(1) NOT NULL DEFAULT 0,
  `foreign_country` varchar(255) DEFAULT NULL,
  `result` varchar(255) NOT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `CGPA` varchar(255) DEFAULT NULL,
  `scale` varchar(255) DEFAULT NULL,
  `passing_year` varchar(255) NOT NULL,
  `edu_duration` varchar(255) DEFAULT NULL,
  `achievement` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_education`
--

INSERT INTO `academic_education` (`id`, `user_id`, `edu_level`, `exam_title`, `major_group`, `exam_board`, `institute_name`, `is_foreign_inst`, `foreign_country`, `result`, `marks`, `CGPA`, `scale`, `passing_year`, `edu_duration`, `achievement`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Secondary', 'SSC', 'ismalic studise', 'Barishal', 'SFASDFC', 0, NULL, 'Grade', NULL, '4.44', '5.00', '2013', NULL, NULL, 'academic-education-17377215563jQZA6W5ba', 1, '2025-01-24 06:25:56', '2025-01-24 06:25:56', NULL),
(2, 1, 'Higher Secondary', 'Alim (Madrasah)', 'Arts', 'Madrasah', 'pobitrojhar Madrasah', 0, NULL, 'Grade', NULL, '4.75', '5.00', '2014', '2', NULL, 'academic-education-1737748913EHdRmQtmqz', 1, '2025-01-24 14:01:53', '2025-01-24 14:01:53', NULL),
(4, 1, 'Honors', 'Bachelor of Arts (BA)', 'ismalic studise', NULL, 'Carmichael college', 0, NULL, 'First Division', '80', NULL, NULL, '2018', '4', NULL, 'academic-education-1737904076iW5aXXKIE9', 1, '2025-01-26 09:07:56', '2025-01-26 09:07:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activities` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE `address_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `present_location` varchar(255) DEFAULT NULL,
  `present_district` varchar(255) DEFAULT NULL,
  `present_thana` varchar(255) DEFAULT NULL,
  `present_office` varchar(255) DEFAULT NULL,
  `present_village` varchar(255) DEFAULT NULL,
  `permanent_location` varchar(255) DEFAULT NULL,
  `permanent_district` varchar(255) DEFAULT NULL,
  `permanent_thana` varchar(255) DEFAULT NULL,
  `permanent_office` varchar(255) DEFAULT NULL,
  `permanent_village` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_reset_tokens`
--

CREATE TABLE `admin_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE `admin_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_applications`
--

CREATE TABLE `career_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `objective` text DEFAULT NULL,
  `present_salary` decimal(8,2) NOT NULL DEFAULT 0.00,
  `expected_salary` decimal(8,2) NOT NULL DEFAULT 0.00,
  `opt_level` varchar(255) NOT NULL,
  `opt_avail` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disability_information`
--

CREATE TABLE `disability_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `is_continue` tinyint(1) NOT NULL DEFAULT 0,
  `exp_area` varchar(255) DEFAULT NULL,
  `exp_area_year` int(11) NOT NULL DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  `responsibilities` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `title`, `company`, `business`, `position`, `department`, `from_date`, `to_date`, `is_continue`, `exp_area`, `exp_area_year`, `location`, `responsibilities`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'sfsdf', 'dgfgfs', 'sdgdfgd', 'dfgfhdfd', 'sfsddsf', '2024-01-28', '2025-01-29', 1, 'cfsdfgdvddfdf', 14, 'Dhaka', 'asrefasdsfsd', 'sfsdf-1738076824wNqYaNs1rw', 1, '2025-01-28 09:07:04', '2025-01-28 09:36:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geocodes`
--

CREATE TABLE `geocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) NOT NULL,
  `thana` varchar(255) NOT NULL,
  `postoffice` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geocodes`
--

INSERT INTO `geocodes` (`id`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Demra', 'Demra', '1360', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(2, 'Dhaka', 'Demra', 'Matuail', '1362', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(3, 'Dhaka', 'Demra', 'Sarulia', '1361', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(4, 'Dhaka', 'Dhaka Cantt.', 'Dhaka CantonmentTSO', '1206', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(5, 'Dhaka', 'Dhamrai', 'Dhamrai', '1350', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(6, 'Dhaka', 'Dhamrai', 'Kamalpur', '1351', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(7, 'Dhaka', 'Dhanmondi', 'Jigatala TSO', '1209', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(8, 'Dhaka', 'Gulshan', 'Banani TSO', '1213', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(9, 'Dhaka', 'Gulshan', 'Gulshan Model Town', '1212', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(10, 'Dhaka', 'Jatrabari', 'Dhania TSO', '1232', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(11, 'Dhaka', 'Joypara', 'Joypara', '1330', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(12, 'Dhaka', 'Joypara', 'Narisha', '1332', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(13, 'Dhaka', 'Joypara', 'Palamganj', '1331', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(14, 'Dhaka', 'Keraniganj', 'Ati', '1312', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(15, 'Dhaka', 'Keraniganj', 'Dhaka Jute Mills', '1311', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(16, 'Dhaka', 'Keraniganj', 'Kalatia', '1313', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(17, 'Dhaka', 'Keraniganj', 'Keraniganj', '1310', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(18, 'Dhaka', 'Khilgaon', 'KhilgaonTSO', '1219', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(19, 'Dhaka', 'Khilkhet', 'KhilkhetTSO', '1229', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(20, 'Dhaka', 'Lalbag', 'Posta TSO', '1211', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(21, 'Dhaka', 'Mirpur', 'Mirpur TSO', '1216', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(22, 'Dhaka', 'Mohammadpur', 'Mohammadpur Housing', '1207', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(23, 'Dhaka', 'Mohammadpur', 'Sangsad BhabanTSO', '1225', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(24, 'Dhaka', 'Motijheel', 'BangabhabanTSO', '1222', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(25, 'Dhaka', 'Motijheel', 'DilkushaTSO', '1223', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(26, 'Dhaka', 'Nawabganj', 'Agla', '1323', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(27, 'Dhaka', 'Nawabganj', 'Churain', '1325', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(28, 'Dhaka', 'Nawabganj', 'Daudpur', '1322', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(29, 'Dhaka', 'Nawabganj', 'Hasnabad', '1321', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(30, 'Dhaka', 'Nawabganj', 'Khalpar', '1324', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(31, 'Dhaka', 'Nawabganj', 'Nawabganj', '1320', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(32, 'Dhaka', 'New market', 'New Market TSO', '1205', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(33, 'Dhaka', 'Palton', 'Dhaka GPO', '1000', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(34, 'Dhaka', 'Ramna', 'Shantinagr TSO', '1217', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(35, 'Dhaka', 'Sabujbag', 'Basabo TSO', '1214', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(36, 'Dhaka', 'Savar', 'Amin Bazar', '1348', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(37, 'Dhaka', 'Savar', 'Dairy Farm', '1341', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(38, 'Dhaka', 'Savar', 'EPZ', '1349', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(39, 'Dhaka', 'Savar', 'Jahangirnagar Univer', '1342', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(40, 'Dhaka', 'Savar', 'Kashem Cotton Mills', '1346', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(41, 'Dhaka', 'Savar', 'Rajphulbaria', '1347', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(42, 'Dhaka', 'Savar', 'Savar', '1340', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(43, 'Dhaka', 'Savar', 'Savar Canttonment', '1344', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(44, 'Dhaka', 'Savar', 'Saver P.A.T.C', '1343', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(45, 'Dhaka', 'Savar', 'Shimulia', '1345', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(46, 'Dhaka', 'Sutrapur', 'Dhaka Sadar HO', '1100', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(47, 'Dhaka', 'Sutrapur', 'Gendaria TSO', '1204', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(48, 'Dhaka', 'Sutrapur', 'Wari TSO', '1203', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(49, 'Dhaka', 'Tejgaon', 'Tejgaon TSO', '1215', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(50, 'Dhaka', 'Tejgaon Industrial Area', 'Dhaka Politechnic', '1208', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(51, 'Dhaka', 'Uttara', 'Uttara Model TwonTSO', '1230', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(52, 'Faridpur', 'Alfadanga', 'Alfadanga', '7870', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(53, 'Faridpur', 'Bhanga', 'Bhanga', '7830', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(54, 'Faridpur', 'Boalmari', 'Boalmari', '7860', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(55, 'Faridpur', 'Boalmari', 'Rupatpat', '7861', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(56, 'Faridpur', 'Charbhadrasan', 'Charbadrashan', '7810', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(57, 'Faridpur', 'Faridpur Sadar', 'Ambikapur', '7802', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(58, 'Faridpur', 'Faridpur Sadar', 'Baitulaman Politecni', '7803', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(59, 'Faridpur', 'Faridpur Sadar', 'Faridpursadar', '7800', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(60, 'Faridpur', 'Faridpur Sadar', 'Kanaipur', '7801', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(61, 'Faridpur', 'Madukhali', 'Kamarkali', '7851', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(62, 'Faridpur', 'Madukhali', 'Madukhali', '7850', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(63, 'Faridpur', 'Nagarkanda', 'Nagarkanda', '7840', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(64, 'Faridpur', 'Nagarkanda', 'Talma', '7841', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(65, 'Faridpur', 'Sadarpur', 'Bishwa jaker Manjil', '7822', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(66, 'Faridpur', 'Sadarpur', 'Hat Krishapur', '7821', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(67, 'Faridpur', 'Sadarpur', 'Sadarpur', '7820', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(68, 'Faridpur', 'Shriangan', 'Shriangan', '7804', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(69, 'Gazipur', 'Gazipur Sadar', 'B.O.F', '1703', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(70, 'Gazipur', 'Gazipur Sadar', 'B.R.R', '1701', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(71, 'Gazipur', 'Gazipur Sadar', 'Chandna', '1702', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(72, 'Gazipur', 'Gazipur Sadar', 'Gazipur Sadar', '1700', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(73, 'Gazipur', 'Gazipur Sadar', 'National University', '1704', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(74, 'Gazipur', 'Kaliakaar', 'Kaliakaar', '1750', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(75, 'Gazipur', 'Kaliakaar', 'Safipur', '1751', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(76, 'Gazipur', 'Kaliganj', 'Kaliganj', '1720', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(77, 'Gazipur', 'Kaliganj', 'Pubail', '1721', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(78, 'Gazipur', 'Kaliganj', 'Santanpara', '1722', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(79, 'Gazipur', 'Kaliganj', 'Vaoal Jamalpur', '1723', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(80, 'Gazipur', 'Kapashia', 'kapashia', '1730', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(81, 'Gazipur', 'Monnunagar', 'Ershad Nagar', '1712', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(82, 'Gazipur', 'Monnunagar', 'Monnunagar', '1710', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(83, 'Gazipur', 'Monnunagar', 'Nishat Nagar', '1711', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(84, 'Gazipur', 'Sreepur', 'Barmi', '1743', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(85, 'Gazipur', 'Sreepur', 'Bashamur', '1747', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(86, 'Gazipur', 'Sreepur', 'Boubi', '1748', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(87, 'Gazipur', 'Sreepur', 'Kawraid', '1745', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(88, 'Gazipur', 'Sreepur', 'Satkhamair', '1744', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(89, 'Gazipur', 'Sreepur', 'Sreepur', '1740', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(90, 'Gazipur', 'Sripur', 'Rajendrapur', '1741', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(91, 'Gazipur', 'Sripur', 'Rajendrapur Canttome', '1742', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(92, 'Gopalganj', 'Gopalganj Sadar', 'Barfa', '8102', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(93, 'Gopalganj', 'Gopalganj Sadar', 'Chandradighalia', '8013', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(94, 'Gopalganj', 'Gopalganj Sadar', 'Gopalganj Sadar', '8100', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(95, 'Gopalganj', 'Gopalganj Sadar', 'Ulpur', '8101', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(96, 'Gopalganj', 'Kashiani', 'Jonapur', '8133', '2025-01-24 05:04:11', '2025-01-24 05:04:11'),
(97, 'Gopalganj', 'Kashiani', 'Kashiani', '8130', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(98, 'Gopalganj', 'Kashiani', 'Ramdia College', '8131', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(99, 'Gopalganj', 'Kashiani', 'Ratoil', '8132', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(100, 'Gopalganj', 'Kotalipara', 'Kotalipara', '8110', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(101, 'Gopalganj', 'Maksudpur', 'Batkiamari', '8141', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(102, 'Gopalganj', 'Maksudpur', 'Khandarpara', '8142', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(103, 'Gopalganj', 'Maksudpur', 'Maksudpur', '8140', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(104, 'Gopalganj', 'Tungipara', 'Patgati', '8121', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(105, 'Gopalganj', 'Tungipara', 'Tungipara', '8120', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(106, 'Jamalpur', 'Dewangonj', 'Dewangonj', '2030', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(107, 'Jamalpur', 'Dewangonj', 'Dewangonj S. Mills', '2031', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(108, 'Jamalpur', 'Islampur', 'Durmoot', '2021', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(109, 'Jamalpur', 'Islampur', 'Gilabari', '2022', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(110, 'Jamalpur', 'Islampur', 'Islampur', '2020', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(111, 'Jamalpur', 'Jamalpur', 'Jamalpur', '2000', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(112, 'Jamalpur', 'Jamalpur', 'Nandina', '2001', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(113, 'Jamalpur', 'Jamalpur', 'Narundi', '2002', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(114, 'Jamalpur', 'Malandah', 'Jamalpur', '2011', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(115, 'Jamalpur', 'Malandah', 'Mahmoodpur', '2013', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(116, 'Jamalpur', 'Malandah', 'Malancha', '2012', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(117, 'Jamalpur', 'Malandah', 'Malandah', '2010', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(118, 'Jamalpur', 'Mathargonj', 'Balijhuri', '2041', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(119, 'Jamalpur', 'Mathargonj', 'Mathargonj', '2040', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(120, 'Jamalpur', 'Shorishabari', 'Bausee', '2052', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(121, 'Jamalpur', 'Shorishabari', 'Gunerbari', '2051', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(122, 'Jamalpur', 'Shorishabari', 'Jagannath Ghat', '2053', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(123, 'Jamalpur', 'Shorishabari', 'Jamuna Sar Karkhana', '2055', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(124, 'Jamalpur', 'Shorishabari', 'Pingna', '2054', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(125, 'Jamalpur', 'Shorishabari', 'Shorishabari', '2050', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(126, 'Kishoreganj', 'Bajitpur', 'Bajitpur', '2336', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(127, 'Kishoreganj', 'Bajitpur', 'Laksmipur', '2338', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(128, 'Kishoreganj', 'Bajitpur', 'Sararchar', '2337', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(129, 'Kishoreganj', 'Bhairob', 'Bhairab', '2350', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(130, 'Kishoreganj', 'Hossenpur', 'Hossenpur', '2320', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(131, 'Kishoreganj', 'Itna', 'Itna', '2390', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(132, 'Kishoreganj', 'Karimganj', 'Karimganj', '2310', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(133, 'Kishoreganj', 'Katiadi', 'Gochhihata', '2331', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(134, 'Kishoreganj', 'Katiadi', 'Katiadi', '2330', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(135, 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj S.Mills', '2301', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(136, 'Kishoreganj', 'Kishoreganj Sadar', 'Kishoreganj Sadar', '2300', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(137, 'Kishoreganj', 'Kishoreganj Sadar', 'Maizhati', '2302', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(138, 'Kishoreganj', 'Kishoreganj Sadar', 'Nilganj', '2303', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(139, 'Kishoreganj', 'Kuliarchar', 'Chhoysuti', '2341', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(140, 'Kishoreganj', 'Kuliarchar', 'Kuliarchar', '2340', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(141, 'Kishoreganj', 'Mithamoin', 'Abdullahpur', '2371', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(142, 'Kishoreganj', 'Mithamoin', 'MIthamoin', '2370', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(143, 'Kishoreganj', 'Nikli', 'Nikli', '2360', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(144, 'Kishoreganj', 'Ostagram', 'Ostagram', '2380', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(145, 'Kishoreganj', 'Pakundia', 'Pakundia', '2326', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(146, 'Kishoreganj', 'Tarial', 'Tarial', '2316', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(147, 'Madaripur', 'Barhamganj', 'Bahadurpur', '7932', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(148, 'Madaripur', 'Barhamganj', 'Barhamganj', '7930', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(149, 'Madaripur', 'Barhamganj', 'Nilaksmibandar', '7931', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(150, 'Madaripur', 'Barhamganj', 'Umedpur', '7933', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(151, 'Madaripur', 'kalkini', 'Kalkini', '7920', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(152, 'Madaripur', 'kalkini', 'Sahabrampur', '7921', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(153, 'Madaripur', 'Madaripur Sadar', 'Charmugria', '7901', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(154, 'Madaripur', 'Madaripur Sadar', 'Habiganj', '7903', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(155, 'Madaripur', 'Madaripur Sadar', 'Kulpaddi', '7902', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(156, 'Madaripur', 'Madaripur Sadar', 'Madaripur Sadar', '7900', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(157, 'Madaripur', 'Madaripur Sadar', 'Mustafapur', '7904', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(158, 'Madaripur', 'Rajoir', 'Khalia', '7911', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(159, 'Madaripur', 'Rajoir', 'Rajoir', '7910', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(160, 'Manikganj', 'Doulatpur', 'Doulatpur', '1860', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(161, 'Manikganj', 'Gheor', 'Gheor', '1840', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(162, 'Manikganj', 'Lechhraganj', 'Jhitka', '1831', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(163, 'Manikganj', 'Lechhraganj', 'Lechhraganj', '1830', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(164, 'Manikganj', 'Manikganj Sadar', 'Barangail', '1804', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(165, 'Manikganj', 'Manikganj Sadar', 'Gorpara', '1802', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(166, 'Manikganj', 'Manikganj Sadar', 'Mahadebpur', '1803', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(167, 'Manikganj', 'Manikganj Sadar', 'Manikganj Bazar', '1801', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(168, 'Manikganj', 'Manikganj Sadar', 'Manikganj Sadar', '1800', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(169, 'Manikganj', 'Saturia', 'Baliati', '1811', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(170, 'Manikganj', 'Saturia', 'Saturia', '1810', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(171, 'Manikganj', 'Shibloya', 'Aricha', '1851', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(172, 'Manikganj', 'Shibloya', 'Shibaloy', '1850', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(173, 'Manikganj', 'Shibloya', 'Tewta', '1852', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(174, 'Manikganj', 'Shibloya', 'Uthli', '1853', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(175, 'Manikganj', 'Singari', 'Baira', '1821', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(176, 'Manikganj', 'Singari', 'joymantop', '1822', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(177, 'Manikganj', 'Singari', 'Singair', '1820', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(178, 'Munshiganj', 'Gajaria', 'Gajaria', '1510', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(179, 'Munshiganj', 'Gajaria', 'Hossendi', '1511', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(180, 'Munshiganj', 'Gajaria', 'Rasulpur', '1512', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(181, 'Munshiganj', 'Lohajong', 'Gouragonj', '1334', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(182, 'Munshiganj', 'Lohajong', 'Gouragonj', '1534', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(183, 'Munshiganj', 'Lohajong', 'Haldia SO', '1532', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(184, 'Munshiganj', 'Lohajong', 'Haridia', '1333', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(185, 'Munshiganj', 'Lohajong', 'Haridia DESO', '1533', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(186, 'Munshiganj', 'Lohajong', 'Korhati', '1531', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(187, 'Munshiganj', 'Lohajong', 'Lohajang', '1530', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(188, 'Munshiganj', 'Lohajong', 'Madini Mandal', '1335', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(189, 'Munshiganj', 'Lohajong', 'Medini Mandal EDSO', '1535', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(190, 'Munshiganj', 'Munshiganj Sadar', 'Kathakhali', '1503', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(191, 'Munshiganj', 'Munshiganj Sadar', 'Mirkadim', '1502', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(192, 'Munshiganj', 'Munshiganj Sadar', 'Munshiganj Sadar', '1500', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(193, 'Munshiganj', 'Munshiganj Sadar', 'Rikabibazar', '1501', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(194, 'Munshiganj', 'Sirajdikhan', 'Ichapur', '1542', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(195, 'Munshiganj', 'Sirajdikhan', 'Kola', '1541', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(196, 'Munshiganj', 'Sirajdikhan', 'Malkha Nagar', '1543', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(197, 'Munshiganj', 'Sirajdikhan', 'Shekher Nagar', '1544', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(198, 'Munshiganj', 'Sirajdikhan', 'Sirajdikhan', '1540', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(199, 'Munshiganj', 'Srinagar', 'Baghra', '1557', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(200, 'Munshiganj', 'Srinagar', 'Barikhal', '1551', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(201, 'Munshiganj', 'Srinagar', 'Bhaggyakul', '1558', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(202, 'Munshiganj', 'Srinagar', 'Hashara', '1553', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(203, 'Munshiganj', 'Srinagar', 'Kolapara', '1554', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(204, 'Munshiganj', 'Srinagar', 'Kumarbhog', '1555', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(205, 'Munshiganj', 'Srinagar', 'Mazpara', '1552', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(206, 'Munshiganj', 'Srinagar', 'Srinagar', '1550', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(207, 'Munshiganj', 'Srinagar', 'Vaggyakul SO', '1556', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(208, 'Munshiganj', 'Tangibari', 'Bajrajugini', '1523', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(209, 'Munshiganj', 'Tangibari', 'Baligao', '1522', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(210, 'Munshiganj', 'Tangibari', 'Betkahat', '1521', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(211, 'Munshiganj', 'Tangibari', 'Dighirpar', '1525', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(212, 'Munshiganj', 'Tangibari', 'Hasail', '1524', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(213, 'Munshiganj', 'Tangibari', 'Pura', '1527', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(214, 'Munshiganj', 'Tangibari', 'Pura EDSO', '1526', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(215, 'Munshiganj', 'Tangibari', 'Tangibari', '1520', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(216, 'Mymensingh', 'Bhaluka', 'Bhaluka', '2240', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(217, 'Mymensingh', 'Fulbaria', 'Fulbaria', '2216', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(218, 'Mymensingh', 'Gaforgaon', 'Duttarbazar', '2234', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(219, 'Mymensingh', 'Gaforgaon', 'Gaforgaon', '2230', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(220, 'Mymensingh', 'Gaforgaon', 'Kandipara', '2233', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(221, 'Mymensingh', 'Gaforgaon', 'Shibganj', '2231', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(222, 'Mymensingh', 'Gaforgaon', 'Usti', '2232', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(223, 'Mymensingh', 'Gouripur', 'Gouripur', '2270', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(224, 'Mymensingh', 'Gouripur', 'Ramgopalpur', '2271', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(225, 'Mymensingh', 'Haluaghat', 'Dhara', '2261', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(226, 'Mymensingh', 'Haluaghat', 'Haluaghat', '2260', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(227, 'Mymensingh', 'Haluaghat', 'Munshirhat', '2262', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(228, 'Mymensingh', 'Isshwargonj', 'Atharabari', '2282', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(229, 'Mymensingh', 'Isshwargonj', 'Isshwargonj', '2280', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(230, 'Mymensingh', 'Isshwargonj', 'Sohagi', '2281', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(231, 'Mymensingh', 'Muktagachha', 'Muktagachha', '2210', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(232, 'Mymensingh', 'Mymensingh Sadar', 'Agriculture Universi', '2202', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(233, 'Mymensingh', 'Mymensingh Sadar', 'Biddyaganj', '2204', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(234, 'Mymensingh', 'Mymensingh Sadar', 'Kawatkhali', '2201', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(235, 'Mymensingh', 'Mymensingh Sadar', 'Mymensingh Sadar', '2200', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(236, 'Mymensingh', 'Mymensingh Sadar', 'Pearpur', '2205', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(237, 'Mymensingh', 'Mymensingh Sadar', 'Shombhuganj', '2203', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(238, 'Mymensingh', 'Nandail', 'Gangail', '2291', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(239, 'Mymensingh', 'Nandail', 'Nandail', '2290', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(240, 'Mymensingh', 'Phulpur', 'Beltia', '2251', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(241, 'Mymensingh', 'Phulpur', 'Phulpur', '2250', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(242, 'Mymensingh', 'Phulpur', 'Tarakanda', '2252', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(243, 'Mymensingh', 'Trishal', 'Ahmadbad', '2221', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(244, 'Mymensingh', 'Trishal', 'Dhala', '2223', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(245, 'Mymensingh', 'Trishal', 'Ram Amritaganj', '2222', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(246, 'Mymensingh', 'Trishal', 'Trishal', '2220', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(247, 'Narayanganj', 'Araihazar', 'Araihazar', '1450', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(248, 'Narayanganj', 'Araihazar', 'Gopaldi', '1451', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(249, 'Narayanganj', 'Baidder Bazar', 'Baidder Bazar', '1440', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(250, 'Narayanganj', 'Baidder Bazar', 'Bara Nagar', '1441', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(251, 'Narayanganj', 'Baidder Bazar', 'Barodi', '1442', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(252, 'Narayanganj', 'Bandar', 'Bandar', '1410', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(253, 'Narayanganj', 'Bandar', 'BIDS', '1413', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(254, 'Narayanganj', 'Bandar', 'D.C Mills', '1411', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(255, 'Narayanganj', 'Bandar', 'Madanganj', '1414', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(256, 'Narayanganj', 'Bandar', 'Nabiganj', '1412', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(257, 'Narayanganj', 'Fatullah', 'Fatulla Bazar', '1421', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(258, 'Narayanganj', 'Fatullah', 'Fatullah', '1420', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(259, 'Narayanganj', 'Narayanganj Sadar', 'Narayanganj Sadar', '1400', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(260, 'Narayanganj', 'Rupganj', 'Bhulta', '1462', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(261, 'Narayanganj', 'Rupganj', 'Kanchan', '1461', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(262, 'Narayanganj', 'Rupganj', 'Murapara', '1464', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(263, 'Narayanganj', 'Rupganj', 'Nagri', '1463', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(264, 'Narayanganj', 'Rupganj', 'Rupganj', '1460', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(265, 'Narayanganj', 'Siddirganj', 'Adamjeenagar', '1431', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(266, 'Narayanganj', 'Siddirganj', 'LN Mills', '1432', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(267, 'Narayanganj', 'Siddirganj', 'Siddirganj', '1430', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(268, 'Narshingdi', 'Belabo', 'Belabo', '1640', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(269, 'Narshingdi', 'Monohordi', 'Hatirdia', '1651', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(270, 'Narshingdi', 'Monohordi', 'Katabaria', '1652', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(271, 'Narshingdi', 'Monohordi', 'Monohordi', '1650', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(272, 'Narshingdi', 'Narshingdi Sadar', 'Karimpur', '1605', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(273, 'Narshingdi', 'Narshingdi Sadar', 'Madhabdi', '1604', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(274, 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi College', '1602', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(275, 'Narshingdi', 'Narshingdi Sadar', 'Narshingdi Sadar', '1600', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(276, 'Narshingdi', 'Narshingdi Sadar', 'Panchdona', '1603', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(277, 'Narshingdi', 'Narshingdi Sadar', 'UMC Jute Mills', '1601', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(278, 'Narshingdi', 'Palash', 'Char Sindhur', '1612', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(279, 'Narshingdi', 'Palash', 'Ghorashal', '1613', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(280, 'Narshingdi', 'Palash', 'Ghorashal Urea Facto', '1611', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(281, 'Narshingdi', 'Palash', 'Palash', '1610', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(282, 'Narshingdi', 'Raypura', 'Bazar Hasnabad', '1631', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(283, 'Narshingdi', 'Raypura', 'Radhaganj bazar', '1632', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(284, 'Narshingdi', 'Raypura', 'Raypura', '1630', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(285, 'Narshingdi', 'Shibpur', 'Shibpur', '1620', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(286, 'Netrakona', 'Susung Durgapur', 'Susnng Durgapur', '2420', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(287, 'Netrakona', 'Atpara', 'Atpara', '2470', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(288, 'Netrakona', 'Barhatta', 'Barhatta', '2440', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(289, 'Netrakona', 'Dharmapasha', 'Dharampasha', '2450', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(290, 'Netrakona', 'Dhobaura', 'Dhobaura', '2416', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(291, 'Netrakona', 'Dhobaura', 'Sakoai', '2417', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(292, 'Netrakona', 'Kalmakanda', 'Kalmakanda', '2430', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(293, 'Netrakona', 'Kendua', 'Kendua', '2480', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(294, 'Netrakona', 'Khaliajuri', 'Khaliajhri', '2460', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(295, 'Netrakona', 'Khaliajuri', 'Shaldigha', '2462', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(296, 'Netrakona', 'Madan', 'Madan', '2490', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(297, 'Netrakona', 'Moddhynagar', 'Moddoynagar', '2456', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(298, 'Netrakona', 'Mohanganj', 'Mohanganj', '2446', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(299, 'Netrakona', 'Netrakona Sadar', 'Baikherhati', '2401', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(300, 'Netrakona', 'Netrakona Sadar', 'Netrakona Sadar', '2400', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(301, 'Netrakona', 'Purbadhola', 'Jaria Jhanjhail', '2412', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(302, 'Netrakona', 'Purbadhola', 'Purbadhola', '2410', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(303, 'Netrakona', 'Purbadhola', 'Shamgonj', '2411', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(304, 'Rajbari', 'Baliakandi', 'Baliakandi', '7730', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(305, 'Rajbari', 'Baliakandi', 'Nalia', '7731', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(306, 'Rajbari', 'Pangsha', 'Mrigibazar', '7723', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(307, 'Rajbari', 'Pangsha', 'Pangsha', '7720', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(308, 'Rajbari', 'Pangsha', 'Ramkol', '7721', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(309, 'Rajbari', 'Pangsha', 'Ratandia', '7722', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(310, 'Rajbari', 'Rajbari Sadar', 'Goalanda', '7710', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(311, 'Rajbari', 'Rajbari Sadar', 'Khankhanapur', '7711', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(312, 'Rajbari', 'Rajbari Sadar', 'Rajbari Sadar', '7700', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(313, 'Shariatpur', 'Bhedorganj', 'Bhedorganj', '8030', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(314, 'Shariatpur', 'Damudhya', 'Damudhya', '8040', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(315, 'Shariatpur', 'Gosairhat', 'Gosairhat', '8050', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(316, 'Shariatpur', 'Jajira', 'Jajira', '8010', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(317, 'Shariatpur', 'Naria', 'Bhozeshwar', '8021', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(318, 'Shariatpur', 'Naria', 'Gharisar', '8022', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(319, 'Shariatpur', 'Naria', 'Kartikpur', '8024', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(320, 'Shariatpur', 'Naria', 'Naria', '8020', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(321, 'Shariatpur', 'Naria', 'Upshi', '8023', '2025-01-24 05:04:12', '2025-01-24 05:04:12'),
(322, 'Shariatpur', 'Shariatpur Sadar', 'Angaria', '8001', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(323, 'Shariatpur', 'Shariatpur Sadar', 'Chikandi', '8002', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(324, 'Shariatpur', 'Shariatpur Sadar', 'Shariatpur Sadar', '8000', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(325, 'Sherpur', 'Bakshigonj', 'Bakshigonj', '2140', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(326, 'Sherpur', 'Jhinaigati', 'Jhinaigati', '2120', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(327, 'Sherpur', 'Nakla', 'Gonopaddi', '2151', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(328, 'Sherpur', 'Nakla', 'Nakla', '2150', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(329, 'Sherpur', 'Nalitabari', 'Hatibandha', '2111', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(330, 'Sherpur', 'Nalitabari', 'Nalitabari', '2110', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(331, 'Sherpur', 'Sherpur Shadar', 'Sherpur Shadar', '2100', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(332, 'Sherpur', 'Shribardi', 'Shribardi', '2130', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(333, 'Tangail', 'Basail', 'Basail', '1920', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(334, 'Tangail', 'Bhuapur', 'Bhuapur', '1960', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(335, 'Tangail', 'Delduar', 'Delduar', '1910', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(336, 'Tangail', 'Delduar', 'Elasin', '1913', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(337, 'Tangail', 'Delduar', 'Hinga Nagar', '1914', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(338, 'Tangail', 'Delduar', 'Jangalia', '1911', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(339, 'Tangail', 'Delduar', 'Lowhati', '1915', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(340, 'Tangail', 'Delduar', 'Patharail', '1912', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(341, 'Tangail', 'Ghatail', 'D. Pakutia', '1982', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(342, 'Tangail', 'Ghatail', 'Dhalapara', '1983', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(343, 'Tangail', 'Ghatail', 'Ghatial', '1980', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(344, 'Tangail', 'Ghatail', 'Lohani', '1984', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(345, 'Tangail', 'Ghatail', 'Zahidganj', '1981', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(346, 'Tangail', 'Gopalpur', 'Gopalpur', '1990', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(347, 'Tangail', 'Gopalpur', 'Hemnagar', '1992', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(348, 'Tangail', 'Gopalpur', 'Jhowail', '1991', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(349, 'Tangail', 'Kalihati', 'Ballabazar', '1973', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(350, 'Tangail', 'Kalihati', 'Elinga', '1974', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(351, 'Tangail', 'Kalihati', 'Kalihati', '1970', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(352, 'Tangail', 'Kalihati', 'Nagarbari', '1977', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(353, 'Tangail', 'Kalihati', 'Nagarbari SO', '1976', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(354, 'Tangail', 'Kalihati', 'Nagbari', '1972', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(355, 'Tangail', 'Kalihati', 'Palisha', '1975', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(356, 'Tangail', 'Kalihati', 'Rajafair', '1971', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(357, 'Tangail', 'Kashkaolia', 'Kashkawlia', '1930', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(358, 'Tangail', 'Madhupur', 'Dhobari', '1997', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(359, 'Tangail', 'Madhupur', 'Madhupur', '1996', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(360, 'Tangail', 'Mirzapur', 'Gorai', '1941', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(361, 'Tangail', 'Mirzapur', 'Jarmuki', '1944', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(362, 'Tangail', 'Mirzapur', 'M.C. College', '1942', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(363, 'Tangail', 'Mirzapur', 'Mirzapur', '1940', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(364, 'Tangail', 'Mirzapur', 'Mohera', '1945', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(365, 'Tangail', 'Mirzapur', 'Warri paikpara', '1943', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(366, 'Tangail', 'Nagarpur', 'Dhuburia', '1937', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(367, 'Tangail', 'Nagarpur', 'Nagarpur', '1936', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(368, 'Tangail', 'Nagarpur', 'Salimabad', '1938', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(369, 'Tangail', 'Sakhipur', 'Kochua', '1951', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(370, 'Tangail', 'Sakhipur', 'Sakhipur', '1950', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(371, 'Tangail', 'Tangail Sadar', 'Kagmari', '1901', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(372, 'Tangail', 'Tangail Sadar', 'Korotia', '1903', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(373, 'Tangail', 'Tangail Sadar', 'Purabari', '1904', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(374, 'Tangail', 'Tangail Sadar', 'Santosh', '1902', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(375, 'Tangail', 'Tangail Sadar', 'Tangail Sadar', '1900', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(376, 'Bandarban', 'Alikadam', 'Alikadam', '4650', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(377, 'Bandarban', 'Bandarban Sadar', 'Bandarban Sadar', '4600', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(378, 'Bandarban', 'Naikhong', 'Naikhong', '4660', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(379, 'Bandarban', 'Roanchhari', 'Roanchhari', '4610', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(380, 'Bandarban', 'Ruma', 'Ruma', '4620', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(381, 'Bandarban', 'Thanchi', 'Lama', '4641', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(382, 'Bandarban', 'Thanchi', 'Thanchi', '4630', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(383, 'Brahmanbaria', 'Akhaura', 'Akhaura', '3450', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(384, 'Brahmanbaria', 'Akhaura', 'Azampur', '3451', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(385, 'Brahmanbaria', 'Akhaura', 'Gangasagar', '3452', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(386, 'Brahmanbaria', 'Banchharampur', 'Banchharampur', '3420', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(387, 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj', '3402', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(388, 'Brahmanbaria', 'Brahamanbaria Sadar', 'Ashuganj Share', '3403', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(389, 'Brahmanbaria', 'Brahamanbaria Sadar', 'Brahamanbaria Sadar', '3400', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(390, 'Brahmanbaria', 'Brahamanbaria Sadar', 'Poun', '3404', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(391, 'Brahmanbaria', 'Brahamanbaria Sadar', 'Talshahar', '3401', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(392, 'Brahmanbaria', 'Kasba', 'Chandidar', '3462', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(393, 'Brahmanbaria', 'Kasba', 'Chargachh', '3463', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(394, 'Brahmanbaria', 'Kasba', 'Gopinathpur', '3464', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(395, 'Brahmanbaria', 'Kasba', 'Kasba', '3460', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(396, 'Brahmanbaria', 'Kasba', 'Kuti', '3461', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(397, 'Brahmanbaria', 'Nabinagar', 'Jibanganj', '3419', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(398, 'Brahmanbaria', 'Nabinagar', 'Kaitala', '3417', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(399, 'Brahmanbaria', 'Nabinagar', 'Laubfatehpur', '3411', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(400, 'Brahmanbaria', 'Nabinagar', 'Nabinagar', '3410', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(401, 'Brahmanbaria', 'Nabinagar', 'Rasullabad', '3412', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(402, 'Brahmanbaria', 'Nabinagar', 'Ratanpur', '3414', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(403, 'Brahmanbaria', 'Nabinagar', 'Salimganj', '3418', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(404, 'Brahmanbaria', 'Nabinagar', 'Shahapur', '3415', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(405, 'Brahmanbaria', 'Nabinagar', 'Shamgram', '3413', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(406, 'Brahmanbaria', 'Nasirnagar', 'Fandauk', '3441', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(407, 'Brahmanbaria', 'Nasirnagar', 'Nasirnagar', '3440', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(408, 'Brahmanbaria', 'Sarail', 'Chandura', '3432', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(409, 'Brahmanbaria', 'Sarail', 'Sarial', '3430', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(410, 'Brahmanbaria', 'Sarail', 'Shahbajpur', '3431', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(411, 'Chandpur', 'Chandpur Sadar', 'Baburhat', '3602', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(412, 'Chandpur', 'Chandpur Sadar', 'Chandpur Sadar', '3600', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(413, 'Chandpur', 'Chandpur Sadar', 'Puranbazar', '3601', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(414, 'Chandpur', 'Chandpur Sadar', 'Sahatali', '3603', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(415, 'Chandpur', 'Faridganj', 'Chandra', '3651', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(416, 'Chandpur', 'Faridganj', 'Faridganj', '3650', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(417, 'Chandpur', 'Faridganj', 'Gridkaliandia', '3653', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(418, 'Chandpur', 'Faridganj', 'Islampur Shah Isain', '3655', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(419, 'Chandpur', 'Faridganj', 'Rampurbazar', '3654', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(420, 'Chandpur', 'Faridganj', 'Rupsha', '3652', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(421, 'Chandpur', 'Hajiganj', 'Bolakhal', '3611', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(422, 'Chandpur', 'Hajiganj', 'Hajiganj', '3610', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(423, 'Chandpur', 'Hayemchar', 'Gandamara', '3661', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(424, 'Chandpur', 'Hayemchar', 'Hayemchar', '3660', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(425, 'Chandpur', 'Kachua', 'Kachua', '3630', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(426, 'Chandpur', 'Kachua', 'Pak Shrirampur', '3631', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(427, 'Chandpur', 'Kachua', 'Rahima Nagar', '3632', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(428, 'Chandpur', 'Kachua', 'Shachar', '3633', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(429, 'Chandpur', 'Matlobganj', 'Kalipur', '3642', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(430, 'Chandpur', 'Matlobganj', 'Matlobganj', '3640', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(431, 'Chandpur', 'Matlobganj', 'Mohanpur', '3641', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(432, 'Chandpur', 'Shahrasti', 'Chotoshi', '3623', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(433, 'Chandpur', 'Shahrasti', 'Islamia Madrasha', '3624', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(434, 'Chandpur', 'Shahrasti', 'Khilabazar', '3621', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(435, 'Chandpur', 'Shahrasti', 'Pashchim Kherihar Al', '3622', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(436, 'Chandpur', 'Shahrasti', 'Shahrasti', '3620', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(437, 'Chittagong', 'Anawara', 'Anowara', '4376', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(438, 'Chittagong', 'Anawara', 'Battali', '4378', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(439, 'Chittagong', 'Anawara', 'Paroikora', '4377', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(440, 'Chittagong', 'Boalkhali', 'Boalkhali', '4366', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(441, 'Chittagong', 'Boalkhali', 'Charandwip', '4369', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(442, 'Chittagong', 'Boalkhali', 'Iqbal Park', '4365', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(443, 'Chittagong', 'Boalkhali', 'Kadurkhal', '4368', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(444, 'Chittagong', 'Boalkhali', 'Kanungopara', '4363', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(445, 'Chittagong', 'Boalkhali', 'Sakpura', '4367', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(446, 'Chittagong', 'Boalkhali', 'Saroatoli', '4364', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(447, 'Chittagong', 'Chittagong Sadar', 'Al- Amin Baria Madra', '4221', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(448, 'Chittagong', 'Chittagong Sadar', 'Amin Jute Mills', '4211', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(449, 'Chittagong', 'Chittagong Sadar', 'Anandabazar', '4215', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(450, 'Chittagong', 'Chittagong Sadar', 'Bayezid Bostami', '4210', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(451, 'Chittagong', 'Chittagong Sadar', 'Chandgaon', '4212', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(452, 'Chittagong', 'Chittagong Sadar', 'Chawkbazar', '4203', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(453, 'Chittagong', 'Chittagong Sadar', 'Chitt. Cantonment', '4220', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(454, 'Chittagong', 'Chittagong Sadar', 'Chitt. Customs Acca', '4219', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(455, 'Chittagong', 'Chittagong Sadar', 'Chitt. Politechnic In', '4209', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(456, 'Chittagong', 'Chittagong Sadar', 'Chitt. Sailers Colon', '4218', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(457, 'Chittagong', 'Chittagong Sadar', 'Chittagong Airport', '4205', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(458, 'Chittagong', 'Chittagong Sadar', 'Chittagong Bandar', '4100', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(459, 'Chittagong', 'Chittagong Sadar', 'Chittagong GPO', '4000', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(460, 'Chittagong', 'Chittagong Sadar', 'Export Processing', '4223', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(461, 'Chittagong', 'Chittagong Sadar', 'Firozshah', '4207', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(462, 'Chittagong', 'Chittagong Sadar', 'Halishahar', '4216', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(463, 'Chittagong', 'Chittagong Sadar', 'Halishshar', '4225', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(464, 'Chittagong', 'Chittagong Sadar', 'Jalalabad', '4214', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(465, 'Chittagong', 'Chittagong Sadar', 'Jaldia Merine Accade', '4206', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(466, 'Chittagong', 'Chittagong Sadar', 'Middle Patenga', '4222', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(467, 'Chittagong', 'Chittagong Sadar', 'Mohard', '4208', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(468, 'Chittagong', 'Chittagong Sadar', 'North Halishahar', '4226', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(469, 'Chittagong', 'Chittagong Sadar', 'North Katuli', '4217', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(470, 'Chittagong', 'Chittagong Sadar', 'Pahartoli', '4202', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(471, 'Chittagong', 'Chittagong Sadar', 'Patenga', '4204', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(472, 'Chittagong', 'Chittagong Sadar', 'Rampura TSO', '4224', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(473, 'Chittagong', 'Chittagong Sadar', 'Wazedia', '4213', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(474, 'Chittagong', 'East Joara', 'Barma', '4383', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(475, 'Chittagong', 'East Joara', 'Dohazari', '4382', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(476, 'Chittagong', 'East Joara', 'East Joara', '4380', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(477, 'Chittagong', 'East Joara', 'Gachbaria', '4381', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(478, 'Chittagong', 'Fatikchhari', 'Bhandar Sharif', '4352', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(479, 'Chittagong', 'Fatikchhari', 'Fatikchhari', '4350', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(480, 'Chittagong', 'Fatikchhari', 'Harualchhari', '4354', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(481, 'Chittagong', 'Fatikchhari', 'Najirhat', '4353', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(482, 'Chittagong', 'Fatikchhari', 'Nanupur', '4351', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(483, 'Chittagong', 'Fatikchhari', 'Narayanhat', '4355', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(484, 'Chittagong', 'Hathazari', 'Chitt.University', '4331', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(485, 'Chittagong', 'Hathazari', 'Fatahabad', '4335', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(486, 'Chittagong', 'Hathazari', 'Gorduara', '4332', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(487, 'Chittagong', 'Hathazari', 'Hathazari', '4330', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(488, 'Chittagong', 'Hathazari', 'Katirhat', '4333', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(489, 'Chittagong', 'Hathazari', 'Madrasa', '4339', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(490, 'Chittagong', 'Hathazari', 'Mirzapur', '4334', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(491, 'Chittagong', 'Hathazari', 'Nuralibari', '4337', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(492, 'Chittagong', 'Hathazari', 'Yunus Nagar', '4338', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(493, 'Chittagong', 'Jaldi', 'Banigram', '4393', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(494, 'Chittagong', 'Jaldi', 'Gunagari', '4392', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(495, 'Chittagong', 'Jaldi', 'Jaldi', '4390', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(496, 'Chittagong', 'Jaldi', 'Khan Bahadur', '4391', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(497, 'Chittagong', 'Lohagara', 'Chunti', '4398', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(498, 'Chittagong', 'Lohagara', 'Lohagara', '4396', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(499, 'Chittagong', 'Lohagara', 'Padua', '4397', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(500, 'Chittagong', 'Mirsharai', 'Abutorab', '4321', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(501, 'Chittagong', 'Mirsharai', 'Azampur', '4325', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(502, 'Chittagong', 'Mirsharai', 'Bharawazhat', '4323', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(503, 'Chittagong', 'Mirsharai', 'Darrogahat', '4322', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(504, 'Chittagong', 'Mirsharai', 'Joarganj', '4324', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(505, 'Chittagong', 'Mirsharai', 'Korerhat', '4327', '2025-01-24 05:04:13', '2025-01-24 05:04:13');
INSERT INTO `geocodes` (`id`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(506, 'Chittagong', 'Mirsharai', 'Mirsharai', '4320', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(507, 'Chittagong', 'Mirsharai', 'Mohazanhat', '4328', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(508, 'Chittagong', 'Patia Head Office', 'Budhpara', '4371', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(509, 'Chittagong', 'Patia Head Office', 'Patia Head Office', '4370', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(510, 'Chittagong', 'Rangunia', 'Dhamair', '4361', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(511, 'Chittagong', 'Rangunia', 'Rangunia', '4360', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(512, 'Chittagong', 'Rouzan', 'B.I.T Post Office', '4349', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(513, 'Chittagong', 'Rouzan', 'Beenajuri', '4341', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(514, 'Chittagong', 'Rouzan', 'Dewanpur', '4347', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(515, 'Chittagong', 'Rouzan', 'Fatepur', '4345', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(516, 'Chittagong', 'Rouzan', 'Gahira', '4343', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(517, 'Chittagong', 'Rouzan', 'Guzra Noapara', '4346', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(518, 'Chittagong', 'Rouzan', 'jagannath Hat', '4344', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(519, 'Chittagong', 'Rouzan', 'Kundeshwari', '4342', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(520, 'Chittagong', 'Rouzan', 'Mohamuni', '4348', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(521, 'Chittagong', 'Rouzan', 'Rouzan', '4340', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(522, 'Chittagong', 'Sandwip', 'Sandwip', '4300', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(523, 'Chittagong', 'Sandwip', 'Shiberhat', '4301', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(524, 'Chittagong', 'Sandwip', 'Urirchar', '4302', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(525, 'Chittagong', 'Satkania', 'Baitul Ijjat', '4387', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(526, 'Chittagong', 'Satkania', 'Bazalia', '4388', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(527, 'Chittagong', 'Satkania', 'Satkania', '4386', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(528, 'Chittagong', 'Sitakunda', 'Barabkunda', '4312', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(529, 'Chittagong', 'Sitakunda', 'Baroidhala', '4311', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(530, 'Chittagong', 'Sitakunda', 'Bawashbaria', '4313', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(531, 'Chittagong', 'Sitakunda', 'Bhatiari', '4315', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(532, 'Chittagong', 'Sitakunda', 'Fouzdarhat', '4316', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(533, 'Chittagong', 'Sitakunda', 'Jafrabad', '4317', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(534, 'Chittagong', 'Sitakunda', 'Kumira', '4314', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(535, 'Chittagong', 'Sitakunda', 'Sitakunda', '4310', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(536, 'Comilla', 'Barura', 'Barura', '3560', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(537, 'Comilla', 'Barura', 'Murdafarganj', '3562', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(538, 'Comilla', 'Barura', 'Poyalgachha', '3561', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(539, 'Comilla', 'Brahmanpara', 'Brahmanpara', '3526', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(540, 'Comilla', 'Burichang', 'Burichang', '3520', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(541, 'Comilla', 'Burichang', 'Maynamoti bazar', '3521', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(542, 'Comilla', 'Chandina', 'Chandia', '3510', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(543, 'Comilla', 'Chandina', 'Madhaiabazar', '3511', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(544, 'Comilla', 'Chouddagram', 'Batisa', '3551', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(545, 'Comilla', 'Chouddagram', 'Chiora', '3552', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(546, 'Comilla', 'Chouddagram', 'Chouddagram', '3550', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(547, 'Comilla', 'Comilla Sadar', 'Comilla Contoment', '3501', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(548, 'Comilla', 'Comilla Sadar', 'Comilla Sadar', '3500', '2025-01-24 05:04:13', '2025-01-24 05:04:13'),
(549, 'Comilla', 'Comilla Sadar', 'Courtbari', '3503', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(550, 'Comilla', 'Comilla Sadar', 'Halimanagar', '3502', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(551, 'Comilla', 'Comilla Sadar', 'Suaganj', '3504', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(552, 'Comilla', 'Daudkandi', 'Dashpara', '3518', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(553, 'Comilla', 'Daudkandi', 'Daudkandi', '3516', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(554, 'Comilla', 'Daudkandi', 'Eliotganj', '3519', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(555, 'Comilla', 'Daudkandi', 'Gouripur', '3517', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(556, 'Comilla', 'Davidhar', 'Barashalghar', '3532', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(557, 'Comilla', 'Davidhar', 'Davidhar', '3530', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(558, 'Comilla', 'Davidhar', 'Dhamtee', '3533', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(559, 'Comilla', 'Davidhar', 'Gangamandal', '3531', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(560, 'Comilla', 'Homna', 'Homna', '3546', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(561, 'Comilla', 'Laksam', 'Bipulasar', '3572', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(562, 'Comilla', 'Laksam', 'Laksam', '3570', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(563, 'Comilla', 'Laksam', 'Lakshamanpur', '3571', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(564, 'Comilla', 'Langalkot', 'Chhariabazar', '3582', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(565, 'Comilla', 'Langalkot', 'Dhalua', '3581', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(566, 'Comilla', 'Langalkot', 'Gunabati', '3583', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(567, 'Comilla', 'Langalkot', 'Langalkot', '3580', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(568, 'Comilla', 'Muradnagar', 'Bangra', '3543', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(569, 'Comilla', 'Muradnagar', 'Companyganj', '3542', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(570, 'Comilla', 'Muradnagar', 'Muradnagar', '3540', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(571, 'Comilla', 'Muradnagar', 'Pantibazar', '3545', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(572, 'Comilla', 'Muradnagar', 'Ramchandarpur', '3541', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(573, 'Comilla', 'Muradnagar', 'Sonakanda', '3544', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(574, 'Cox’s Bazar', 'Chiringga', 'Badarkali', '4742', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(575, 'Cox’s Bazar', 'Chiringga', 'Chiringga', '4740', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(576, 'Cox’s Bazar', 'Chiringga', 'Chiringga S.O', '4741', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(577, 'Cox’s Bazar', 'Chiringga', 'Malumghat', '4743', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(578, 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Coxs Bazar Sadar', '4700', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(579, 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Eidga', '4702', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(580, 'Cox’s Bazar', 'Coxs Bazar Sadar', 'Zhilanja', '4701', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(581, 'Cox’s Bazar', 'Gorakghat', 'Gorakghat', '4710', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(582, 'Cox’s Bazar', 'Kutubdia', 'Kutubdia', '4720', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(583, 'Cox’s Bazar', 'Ramu', 'Ramu', '4730', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(584, 'Cox’s Bazar', 'Teknaf', 'Hnila', '4761', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(585, 'Cox’s Bazar', 'Teknaf', 'St.Martin', '4762', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(586, 'Cox’s Bazar', 'Teknaf', 'Teknaf', '4760', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(587, 'Cox’s Bazar', 'Ukhia', 'Ukhia', '4750', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(588, 'Feni', 'Chhagalnaia', 'Chhagalnaia', '3910', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(589, 'Feni', 'Chhagalnaia', 'Daraga Hat', '3912', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(590, 'Feni', 'Chhagalnaia', 'Maharajganj', '3911', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(591, 'Feni', 'Chhagalnaia', 'Puabashimulia', '3913', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(592, 'Feni', 'Dagonbhuia', 'Chhilonia', '3922', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(593, 'Feni', 'Dagonbhuia', 'Dagondhuia', '3920', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(594, 'Feni', 'Dagonbhuia', 'Dudmukha', '3921', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(595, 'Feni', 'Dagonbhuia', 'Rajapur', '3923', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(596, 'Feni', 'Feni Sadar', 'Fazilpur', '3901', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(597, 'Feni', 'Feni Sadar', 'Feni Sadar', '3900', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(598, 'Feni', 'Feni Sadar', 'Laskarhat', '3903', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(599, 'Feni', 'Feni Sadar', 'Sharshadie', '3902', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(600, 'Feni', 'Pashurampur', 'Fulgazi', '3942', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(601, 'Feni', 'Pashurampur', 'Munshirhat', '3943', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(602, 'Feni', 'Pashurampur', 'Pashurampur', '3940', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(603, 'Feni', 'Pashurampur', 'Shuarbazar', '3941', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(604, 'Feni', 'Sonagazi', 'Ahmadpur', '3932', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(605, 'Feni', 'Sonagazi', 'Kazirhat', '3933', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(606, 'Feni', 'Sonagazi', 'Motiganj', '3931', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(607, 'Feni', 'Sonagazi', 'Sonagazi', '3930', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(608, 'Khagrachari', 'Diginala', 'Diginala', '4420', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(609, 'Khagrachari', 'Khagrachari Sadar', 'Khagrachari Sadar', '4400', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(610, 'Khagrachari', 'Laxmichhari', 'Laxmichhari', '4470', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(611, 'Khagrachari', 'Mahalchhari', 'Mahalchhari', '4430', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(612, 'Khagrachari', 'Manikchhari', 'Manikchhari', '4460', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(613, 'Khagrachari', 'Matiranga', 'Matiranga', '4450', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(614, 'Khagrachari', 'Panchhari', 'Panchhari', '4410', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(615, 'Khagrachari', 'Ramghar Head Office', 'Ramghar Head Office', '4440', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(616, 'Lakshmipur', 'Char Alexgander', 'Char Alexgander', '3730', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(617, 'Lakshmipur', 'Char Alexgander', 'Hajirghat', '3731', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(618, 'Lakshmipur', 'Char Alexgander', 'Ramgatirhat', '3732', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(619, 'Lakshmipur', 'Lakshimpur Sadar', 'Amani Lakshimpur', '3709', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(620, 'Lakshmipur', 'Lakshimpur Sadar', 'Bhabaniganj', '3702', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(621, 'Lakshmipur', 'Lakshimpur Sadar', 'Chandraganj', '3708', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(622, 'Lakshmipur', 'Lakshimpur Sadar', 'Choupalli', '3707', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(623, 'Lakshmipur', 'Lakshimpur Sadar', 'Dalal Bazar', '3701', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(624, 'Lakshmipur', 'Lakshimpur Sadar', 'Duttapara', '3706', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(625, 'Lakshmipur', 'Lakshimpur Sadar', 'Keramatganj', '3704', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(626, 'Lakshmipur', 'Lakshimpur Sadar', 'Lakshimpur Sadar', '3700', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(627, 'Lakshmipur', 'Lakshimpur Sadar', 'Mandari', '3703', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(628, 'Lakshmipur', 'Lakshimpur Sadar', 'Rupchara', '3705', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(629, 'Lakshmipur', 'Ramganj', 'Alipur', '3721', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(630, 'Lakshmipur', 'Ramganj', 'Dolta', '3725', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(631, 'Lakshmipur', 'Ramganj', 'Kanchanpur', '3723', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(632, 'Lakshmipur', 'Ramganj', 'Naagmud', '3724', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(633, 'Lakshmipur', 'Ramganj', 'Panpara', '3722', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(634, 'Lakshmipur', 'Ramganj', 'Ramganj', '3720', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(635, 'Lakshmipur', 'Raypur', 'Bhuabari', '3714', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(636, 'Lakshmipur', 'Raypur', 'Haydarganj', '3713', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(637, 'Lakshmipur', 'Raypur', 'Nagerdighirpar', '3712', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(638, 'Lakshmipur', 'Raypur', 'Rakhallia', '3711', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(639, 'Lakshmipur', 'Raypur', 'Raypur', '3710', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(640, 'Noakhali', 'Basurhat', 'Basur Hat', '3850', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(641, 'Noakhali', 'Basurhat', 'Charhajari', '3851', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(642, 'Noakhali', 'Begumganj', 'Alaiarpur', '3831', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(643, 'Noakhali', 'Begumganj', 'Amisha Para', '3847', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(644, 'Noakhali', 'Begumganj', 'Banglabazar', '3822', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(645, 'Noakhali', 'Begumganj', 'Bazra', '3824', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(646, 'Noakhali', 'Begumganj', 'Begumganj', '3820', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(647, 'Noakhali', 'Begumganj', 'Bhabani Jibanpur', '3837', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(648, 'Noakhali', 'Begumganj', 'Choumohani', '3821', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(649, 'Noakhali', 'Begumganj', 'Dauti', '3843', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(650, 'Noakhali', 'Begumganj', 'Durgapur', '3848', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(651, 'Noakhali', 'Begumganj', 'Gopalpur', '3828', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(652, 'Noakhali', 'Begumganj', 'Jamidar Hat', '3825', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(653, 'Noakhali', 'Begumganj', 'Joyag', '3844', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(654, 'Noakhali', 'Begumganj', 'Joynarayanpur', '3829', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(655, 'Noakhali', 'Begumganj', 'Khalafat Bazar', '3833', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(656, 'Noakhali', 'Begumganj', 'Khalishpur', '3842', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(657, 'Noakhali', 'Begumganj', 'Maheshganj', '3838', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(658, 'Noakhali', 'Begumganj', 'Mir Owarishpur', '3823', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(659, 'Noakhali', 'Begumganj', 'Nadona', '3839', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(660, 'Noakhali', 'Begumganj', 'Nandiapara', '3841', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(661, 'Noakhali', 'Begumganj', 'Oachhekpur', '3835', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(662, 'Noakhali', 'Begumganj', 'Rajganj', '3834', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(663, 'Noakhali', 'Begumganj', 'Sonaimuri', '3827', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(664, 'Noakhali', 'Begumganj', 'Tangirpar', '3832', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(665, 'Noakhali', 'Begumganj', 'Thanar Hat', '3845', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(666, 'Noakhali', 'Chatkhil', 'Bansa Bazar', '3879', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(667, 'Noakhali', 'Chatkhil', 'Bodalcourt', '3873', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(668, 'Noakhali', 'Chatkhil', 'Chatkhil', '3870', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(669, 'Noakhali', 'Chatkhil', 'Dosh Gharia', '3878', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(670, 'Noakhali', 'Chatkhil', 'Karihati', '3877', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(671, 'Noakhali', 'Chatkhil', 'Khilpara', '3872', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(672, 'Noakhali', 'Chatkhil', 'Palla', '3871', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(673, 'Noakhali', 'Chatkhil', 'Rezzakpur', '3874', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(674, 'Noakhali', 'Chatkhil', 'Sahapur', '3881', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(675, 'Noakhali', 'Chatkhil', 'Sampara', '3882', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(676, 'Noakhali', 'Chatkhil', 'Shingbahura', '3883', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(677, 'Noakhali', 'Chatkhil', 'Solla', '3875', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(678, 'Noakhali', 'Hatiya', 'Afazia', '3891', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(679, 'Noakhali', 'Hatiya', 'Hatiya', '3890', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(680, 'Noakhali', 'Hatiya', 'Tamoraddi', '3892', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(681, 'Noakhali', 'Noakhali Sadar', 'Chaprashir Hat', '3811', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(682, 'Noakhali', 'Noakhali Sadar', 'Char Jabbar', '3812', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(683, 'Noakhali', 'Noakhali Sadar', 'Charam Tua', '3809', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(684, 'Noakhali', 'Noakhali Sadar', 'Din Monir Hat', '3803', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(685, 'Noakhali', 'Noakhali Sadar', 'Kabirhat', '3807', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(686, 'Noakhali', 'Noakhali Sadar', 'Khalifar Hat', '3808', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(687, 'Noakhali', 'Noakhali Sadar', 'Mriddarhat', '3806', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(688, 'Noakhali', 'Noakhali Sadar', 'Noakhali College', '3801', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(689, 'Noakhali', 'Noakhali Sadar', 'Noakhali Sadar', '3800', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(690, 'Noakhali', 'Noakhali Sadar', 'Pak Kishoreganj', '3804', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(691, 'Noakhali', 'Noakhali Sadar', 'Sonapur', '3802', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(692, 'Noakhali', 'Senbag', 'Beezbag', '3862', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(693, 'Noakhali', 'Senbag', 'Chatarpaia', '3864', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(694, 'Noakhali', 'Senbag', 'Kallyandi', '3861', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(695, 'Noakhali', 'Senbag', 'Kankirhat', '3863', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(696, 'Noakhali', 'Senbag', 'Senbag', '3860', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(697, 'Noakhali', 'Senbag', 'T.P. Lamua', '3865', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(698, 'Rangamati', 'Barakal', 'Barakal', '4570', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(699, 'Rangamati', 'Bilaichhari', 'Bilaichhari', '4550', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(700, 'Rangamati', 'Jarachhari', 'Jarachhari', '4560', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(701, 'Rangamati', 'Kalampati', 'Betbunia', '4511', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(702, 'Rangamati', 'Kalampati', 'Kalampati', '4510', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(703, 'Rangamati', 'kaptai', 'Chandraghona', '4531', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(704, 'Rangamati', 'kaptai', 'Kaptai', '4530', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(705, 'Rangamati', 'kaptai', 'Kaptai Nuton Bazar', '4533', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(706, 'Rangamati', 'kaptai', 'Kaptai Project', '4532', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(707, 'Rangamati', 'Longachh', 'Longachh', '4580', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(708, 'Rangamati', 'Marishya', 'Marishya', '4590', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(709, 'Rangamati', 'Naniachhar', 'Nanichhar', '4520', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(710, 'Rangamati', 'Rajsthali', 'Rajsthali', '4540', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(711, 'Rangamati', 'Rangamati Sadar', 'Rangamati Sadar', '4500', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(712, 'Bagherhat', 'Bagerhat Sadar', 'Bagerhat Sadar', '9300', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(713, 'Bagherhat', 'Bagerhat Sadar', 'P.C College', '9301', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(714, 'Bagherhat', 'Bagerhat Sadar', 'Rangdia', '9302', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(715, 'Bagherhat', 'Chalna Ankorage', 'Chalna Ankorage', '9350', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(716, 'Bagherhat', 'Chalna Ankorage', 'Mongla Port', '9351', '2025-01-24 05:04:14', '2025-01-24 05:04:14'),
(717, 'Bagherhat', 'Chitalmari', 'Barabaria', '9361', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(718, 'Bagherhat', 'Chitalmari', 'Chitalmari', '9360', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(719, 'Bagherhat', 'Fakirhat', 'Bhanganpar Bazar', '9372', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(720, 'Bagherhat', 'Fakirhat', 'Fakirhat', '9370', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(721, 'Bagherhat', 'Fakirhat', 'Mansa', '9371', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(722, 'Bagherhat', 'Kachua UPO', 'Kachua', '9310', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(723, 'Bagherhat', 'Kachua UPO', 'Sonarkola', '9311', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(724, 'Bagherhat', 'Mollahat', 'Charkulia', '9383', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(725, 'Bagherhat', 'Mollahat', 'Dariala', '9382', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(726, 'Bagherhat', 'Mollahat', 'Kahalpur', '9381', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(727, 'Bagherhat', 'Mollahat', 'Mollahat', '9380', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(728, 'Bagherhat', 'Mollahat', 'Nagarkandi', '9384', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(729, 'Bagherhat', 'Mollahat', 'Pak Gangni', '9385', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(730, 'Bagherhat', 'Morelganj', 'Morelganj', '9320', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(731, 'Bagherhat', 'Morelganj', 'Sannasi Bazar', '9321', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(732, 'Bagherhat', 'Morelganj', 'Telisatee', '9322', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(733, 'Bagherhat', 'Rampal', 'Foylahat', '9341', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(734, 'Bagherhat', 'Rampal', 'Gourambha', '9343', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(735, 'Bagherhat', 'Rampal', 'Rampal', '9340', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(736, 'Bagherhat', 'Rampal', 'Sonatunia', '9342', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(737, 'Bagherhat', 'Rayenda', 'Rayenda', '9330', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(738, 'Chuadanga', 'Alamdanga', 'Alamdanga', '7210', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(739, 'Chuadanga', 'Alamdanga', 'Hardi', '7211', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(740, 'Chuadanga', 'Chuadanga Sadar', 'Chuadanga Sadar', '7200', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(741, 'Chuadanga', 'Chuadanga Sadar', 'Munshiganj', '7201', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(742, 'Chuadanga', 'Damurhuda', 'Andulbaria', '7222', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(743, 'Chuadanga', 'Damurhuda', 'Damurhuda', '7220', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(744, 'Chuadanga', 'Damurhuda', 'Darshana', '7221', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(745, 'Chuadanga', 'Doulatganj', 'Doulatganj', '7230', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(746, 'Jessore', 'Bagharpara', 'Bagharpara', '7470', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(747, 'Jessore', 'Bagharpara', 'Gouranagar', '7471', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(748, 'Jessore', 'Chaugachha', 'Chougachha', '7410', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(749, 'Jessore', 'Jessore Sadar', 'Basundia', '7406', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(750, 'Jessore', 'Jessore Sadar', 'Chanchra', '7402', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(751, 'Jessore', 'Jessore Sadar', 'Churamankathi', '7407', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(752, 'Jessore', 'Jessore Sadar', 'Jessore Airbach', '7404', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(753, 'Jessore', 'Jessore Sadar', 'Jessore canttonment', '7403', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(754, 'Jessore', 'Jessore Sadar', 'Jessore Sadar', '7400', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(755, 'Jessore', 'Jessore Sadar', 'Jessore Upa-Shahar', '7401', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(756, 'Jessore', 'Jessore Sadar', 'Rupdia', '7405', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(757, 'Jessore', 'Jhikargachha', 'Jhikargachha', '7420', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(758, 'Jessore', 'Keshabpur', 'Keshobpur', '7450', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(759, 'Jessore', 'Monirampur', 'Monirampur', '7440', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(760, 'Jessore', 'Noapara', 'Bhugilhat', '7462', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(761, 'Jessore', 'Noapara', 'Noapara', '7460', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(762, 'Jessore', 'Noapara', 'Rajghat', '7461', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(763, 'Jessore', 'Sarsa', 'Bag Achra', '7433', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(764, 'Jessore', 'Sarsa', 'Benapole', '7431', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(765, 'Jessore', 'Sarsa', 'Jadabpur', '7432', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(766, 'Jessore', 'Sarsa', 'Sarsa', '7430', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(767, 'Jinaidaha', 'Harinakundu', 'Harinakundu', '7310', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(768, 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Cadet College', '7301', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(769, 'Jinaidaha', 'Jinaidaha Sadar', 'Jinaidaha Sadar', '7300', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(770, 'Jinaidaha', 'Kotchandpur', 'Kotchandpur', '7330', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(771, 'Jinaidaha', 'Maheshpur', 'Maheshpur', '7340', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(772, 'Jinaidaha', 'Naldanga', 'Hatbar Bazar', '7351', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(773, 'Jinaidaha', 'Naldanga', 'Naldanga', '7350', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(774, 'Jinaidaha', 'Shailakupa', 'Kumiradaha', '7321', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(775, 'Jinaidaha', 'Shailakupa', 'Shailakupa', '7320', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(776, 'Khulna', 'Alaipur', 'Alaipur', '9240', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(777, 'Khulna', 'Alaipur', 'Belphulia', '9242', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(778, 'Khulna', 'Alaipur', 'Rupsha', '9241', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(779, 'Khulna', 'Batiaghat', 'Batiaghat', '9260', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(780, 'Khulna', 'Batiaghat', 'Surkalee', '9261', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(781, 'Khulna', 'Chalna Bazar', 'Bajua', '9272', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(782, 'Khulna', 'Chalna Bazar', 'Chalna Bazar', '9270', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(783, 'Khulna', 'Chalna Bazar', 'Dakup', '9271', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(784, 'Khulna', 'Chalna Bazar', 'Nalian', '9273', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(785, 'Khulna', 'Digalia', 'Chandni Mahal', '9221', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(786, 'Khulna', 'Digalia', 'Digalia', '9220', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(787, 'Khulna', 'Digalia', 'Gazirhat', '9224', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(788, 'Khulna', 'Digalia', 'Ghoshghati', '9223', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(789, 'Khulna', 'Digalia', 'Senhati', '9222', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(790, 'Khulna', 'Khulna Sadar', 'Atra Shilpa Area', '9207', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(791, 'Khulna', 'Khulna Sadar', 'BIT Khulna', '9203', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(792, 'Khulna', 'Khulna Sadar', 'Doulatpur', '9202', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(793, 'Khulna', 'Khulna Sadar', 'Jahanabad Canttonmen', '9205', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(794, 'Khulna', 'Khulna Sadar', 'Khula Sadar', '9100', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(795, 'Khulna', 'Khulna Sadar', 'Khulna G.P.O', '9000', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(796, 'Khulna', 'Khulna Sadar', 'Khulna Shipyard', '9201', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(797, 'Khulna', 'Khulna Sadar', 'Khulna University', '9208', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(798, 'Khulna', 'Khulna Sadar', 'Siramani', '9204', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(799, 'Khulna', 'Khulna Sadar', 'Sonali Jute Mills', '9206', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(800, 'Khulna', 'Madinabad', 'Amadee', '9291', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(801, 'Khulna', 'Madinabad', 'Madinabad', '9290', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(802, 'Khulna', 'Paikgachha', 'Chandkhali', '9284', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(803, 'Khulna', 'Paikgachha', 'Garaikhali', '9285', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(804, 'Khulna', 'Paikgachha', 'Godaipur', '9281', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(805, 'Khulna', 'Paikgachha', 'Kapilmoni', '9282', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(806, 'Khulna', 'Paikgachha', 'Katipara', '9283', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(807, 'Khulna', 'Paikgachha', 'Paikgachha', '9280', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(808, 'Khulna', 'Phultala', 'Phultala', '9210', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(809, 'Khulna', 'Sajiara', 'Chuknagar', '9252', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(810, 'Khulna', 'Sajiara', 'Ghonabanda', '9251', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(811, 'Khulna', 'Sajiara', 'Sajiara', '9250', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(812, 'Khulna', 'Sajiara', 'Shahapur', '9253', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(813, 'Khulna', 'Terakhada', 'Pak Barasat', '9231', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(814, 'Khulna', 'Terakhada', 'Terakhada', '9230', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(815, 'Kustia', 'Bheramara', 'Allardarga', '7042', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(816, 'Kustia', 'Bheramara', 'Bheramara', '7040', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(817, 'Kustia', 'Bheramara', 'Ganges Bheramara', '7041', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(818, 'Kustia', 'Janipur', 'Janipur', '7020', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(819, 'Kustia', 'Janipur', 'Khoksa', '7021', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(820, 'Kustia', 'Kumarkhali', 'Kumarkhali', '7010', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(821, 'Kustia', 'Kumarkhali', 'Panti', '7011', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(822, 'Kustia', 'Kustia Sadar', 'Islami University', '7003', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(823, 'Kustia', 'Kustia Sadar', 'Jagati', '7002', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(824, 'Kustia', 'Kustia Sadar', 'Kushtia Mohini', '7001', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(825, 'Kustia', 'Kustia Sadar', 'Kustia Sadar', '7000', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(826, 'Kustia', 'Mirpur', 'Amla Sadarpur', '7032', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(827, 'Kustia', 'Mirpur', 'Mirpur', '7030', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(828, 'Kustia', 'Mirpur', 'Poradaha', '7031', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(829, 'Kustia', 'Rafayetpur', 'Khasmathurapur', '7052', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(830, 'Kustia', 'Rafayetpur', 'Rafayetpur', '7050', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(831, 'Kustia', 'Rafayetpur', 'Taragunia', '7051', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(832, 'Magura', 'Arpara', 'Arpara', '7620', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(833, 'Magura', 'Magura Sadar', 'Magura Sadar', '7600', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(834, 'Magura', 'Mohammadpur', 'Binodpur', '7631', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(835, 'Magura', 'Mohammadpur', 'Mohammadpur', '7630', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(836, 'Magura', 'Mohammadpur', 'Nahata', '7632', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(837, 'Magura', 'Shripur', 'Langalbadh', '7611', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(838, 'Magura', 'Shripur', 'Nachol', '7612', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(839, 'Magura', 'Shripur', 'Shripur', '7610', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(840, 'Meherpur', 'Gangni', 'Gangni', '7110', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(841, 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(842, 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(843, 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(844, 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(845, 'Narail', 'Kalia', 'Kalia', '7520', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(846, 'Narail', 'Laxmipasha', 'Baradia', '7514', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(847, 'Narail', 'Laxmipasha', 'Itna', '7512', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(848, 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(849, 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(850, 'Narail', 'Laxmipasha', 'Naldi', '7513', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(851, 'Narail', 'Mohajan', 'Mohajan', '7521', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(852, 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(853, 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(854, 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(855, 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(856, 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(857, 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(858, 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(859, 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(860, 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(861, 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(862, 'Satkhira', 'kalaroa', 'Khordo', '9414', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(863, 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(864, 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(865, 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(866, 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(867, 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(868, 'Satkhira', 'Nakipur', 'Gabura', '9454', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(869, 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(870, 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(871, 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(872, 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(873, 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(874, 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(875, 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(876, 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(877, 'Satkhira', 'Taala', 'Patkelghata', '9421', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(878, 'Satkhira', 'Taala', 'Taala', '9420', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(879, 'Hobiganj', 'Azmireeganj', 'Azmireeganj', '3360', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(880, 'Hobiganj', 'Bahubal', 'Bahubal', '3310', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(881, 'Hobiganj', 'Baniachang', 'Baniachang', '3350', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(882, 'Hobiganj', 'Baniachang', 'Jatrapasha', '3351', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(883, 'Hobiganj', 'Baniachang', 'Kadirganj', '3352', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(884, 'Hobiganj', 'Chunarughat', 'Chandpurbagan', '3321', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(885, 'Hobiganj', 'Chunarughat', 'Chunarughat', '3320', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(886, 'Hobiganj', 'Chunarughat', 'Narapati', '3322', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(887, 'Hobiganj', 'Hobiganj Sadar', 'Gopaya', '3302', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(888, 'Hobiganj', 'Hobiganj Sadar', 'Hobiganj Sadar', '3300', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(889, 'Hobiganj', 'Hobiganj Sadar', 'Shaestaganj', '3301', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(890, 'Hobiganj', 'Kalauk', 'Kalauk', '3340', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(891, 'Hobiganj', 'Kalauk', 'Lakhai', '3341', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(892, 'Hobiganj', 'Madhabpur', 'Itakhola', '3331', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(893, 'Hobiganj', 'Madhabpur', 'Madhabpur', '3330', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(894, 'Hobiganj', 'Madhabpur', 'Saihamnagar', '3333', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(895, 'Hobiganj', 'Madhabpur', 'Shahajibazar', '3332', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(896, 'Hobiganj', 'Nabiganj', 'Digalbak', '3373', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(897, 'Hobiganj', 'Nabiganj', 'Golduba', '3372', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(898, 'Hobiganj', 'Nabiganj', 'Goplarbazar', '3371', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(899, 'Hobiganj', 'Nabiganj', 'Inathganj', '3374', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(900, 'Hobiganj', 'Nabiganj', 'Nabiganj', '3370', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(901, 'Moulvibazar', 'Baralekha', 'Baralekha', '3250', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(902, 'Moulvibazar', 'Baralekha', 'Dhakkhinbag', '3252', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(903, 'Moulvibazar', 'Baralekha', 'Juri', '3251', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(904, 'Moulvibazar', 'Baralekha', 'Purbashahabajpur', '3253', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(905, 'Moulvibazar', 'Kamalganj', 'Kamalganj', '3220', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(906, 'Moulvibazar', 'Kamalganj', 'Keramatnaga', '3221', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(907, 'Moulvibazar', 'Kamalganj', 'Munshibazar', '3224', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(908, 'Moulvibazar', 'Kamalganj', 'Patrakhola', '3222', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(909, 'Moulvibazar', 'Kamalganj', 'Shamsher Nagar', '3223', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(910, 'Moulvibazar', 'Kulaura', 'Baramchal', '3237', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(911, 'Moulvibazar', 'Kulaura', 'Kajaldhara', '3234', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(912, 'Moulvibazar', 'Kulaura', 'Karimpur', '3235', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(913, 'Moulvibazar', 'Kulaura', 'Kulaura', '3230', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(914, 'Moulvibazar', 'Kulaura', 'Langla', '3232', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(915, 'Moulvibazar', 'Kulaura', 'Prithimpasha', '3233', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(916, 'Moulvibazar', 'Kulaura', 'Tillagaon', '3231', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(917, 'Moulvibazar', 'Moulvibazar Sadar', 'Afrozganj', '3203', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(918, 'Moulvibazar', 'Moulvibazar Sadar', 'Barakapan', '3201', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(919, 'Moulvibazar', 'Moulvibazar Sadar', 'Monumukh', '3202', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(920, 'Moulvibazar', 'Moulvibazar Sadar', 'Moulvibazar Sadar', '3200', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(921, 'Moulvibazar', 'Rajnagar', 'Rajnagar', '3240', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(922, 'Moulvibazar', 'Srimangal', 'Kalighat', '3212', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(923, 'Moulvibazar', 'Srimangal', 'Khejurichhara', '3213', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(924, 'Moulvibazar', 'Srimangal', 'Narain Chora', '3211', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(925, 'Moulvibazar', 'Srimangal', 'Satgaon', '3214', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(926, 'Moulvibazar', 'Srimangal', 'Srimangal', '3210', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(927, 'Sunamganj', 'Bishamsarpur', 'Bishamsapur', '3010', '2025-01-24 05:04:15', '2025-01-24 05:04:15'),
(928, 'Sunamganj', 'Chhatak', 'Chhatak', '3080', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(929, 'Sunamganj', 'Chhatak', 'Chhatak Cement Facto', '3081', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(930, 'Sunamganj', 'Chhatak', 'Chhatak Paper Mills', '3082', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(931, 'Sunamganj', 'Chhatak', 'Chourangi Bazar', '3893', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(932, 'Sunamganj', 'Chhatak', 'Gabindaganj', '3083', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(933, 'Sunamganj', 'Chhatak', 'Gabindaganj Natun Ba', '3084', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(934, 'Sunamganj', 'Chhatak', 'Islamabad', '3088', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(935, 'Sunamganj', 'Chhatak', 'jahidpur', '3087', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(936, 'Sunamganj', 'Chhatak', 'Khurma', '3085', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(937, 'Sunamganj', 'Chhatak', 'Moinpur', '3086', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(938, 'Sunamganj', 'Dhirai Chandpur', 'Dhirai Chandpur', '3040', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(939, 'Sunamganj', 'Dhirai Chandpur', 'Jagdal', '3041', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(940, 'Sunamganj', 'Duara bazar', 'Duara bazar', '3070', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(941, 'Sunamganj', 'Ghungiar', 'Ghungiar', '3050', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(942, 'Sunamganj', 'Jagnnathpur', 'Atuajan', '3062', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(943, 'Sunamganj', 'Jagnnathpur', 'Hasan Fatemapur', '3063', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(944, 'Sunamganj', 'Jagnnathpur', 'Jagnnathpur', '3060', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(945, 'Sunamganj', 'Jagnnathpur', 'Rasulganj', '3064', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(946, 'Sunamganj', 'Jagnnathpur', 'Shiramsi', '3065', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(947, 'Sunamganj', 'Jagnnathpur', 'Syedpur', '3061', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(948, 'Sunamganj', 'Sachna', 'Sachna', '3020', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(949, 'Sunamganj', 'Sunamganj Sadar', 'Pagla', '3001', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(950, 'Sunamganj', 'Sunamganj Sadar', 'Patharia', '3002', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(951, 'Sunamganj', 'Sunamganj Sadar', 'Sunamganj Sadar', '3000', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(952, 'Sunamganj', 'Tahirpur', 'Tahirpur', '3030', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(953, 'Sylhet', 'Balaganj', 'Balaganj', '3120', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(954, 'Sylhet', 'Balaganj', 'Begumpur', '3125', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(955, 'Sylhet', 'Balaganj', 'Brahman Shashon', '3122', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(956, 'Sylhet', 'Balaganj', 'Gaharpur', '3128', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(957, 'Sylhet', 'Balaganj', 'Goala Bazar', '3124', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(958, 'Sylhet', 'Balaganj', 'Karua', '3121', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(959, 'Sylhet', 'Balaganj', 'Kathal Khair', '3127', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(960, 'Sylhet', 'Balaganj', 'Natun Bazar', '3129', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(961, 'Sylhet', 'Balaganj', 'Omarpur', '3126', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(962, 'Sylhet', 'Balaganj', 'Tajpur', '3123', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(963, 'Sylhet', 'Bianibazar', 'Bianibazar', '3170', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(964, 'Sylhet', 'Bianibazar', 'Churkai', '3175', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(965, 'Sylhet', 'Bianibazar', 'jaldup', '3171', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(966, 'Sylhet', 'Bianibazar', 'Kurar bazar', '3173', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(967, 'Sylhet', 'Bianibazar', 'Mathiura', '3172', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(968, 'Sylhet', 'Bianibazar', 'Salia bazar', '3174', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(969, 'Sylhet', 'Bishwanath', 'Bishwanath', '3130', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(970, 'Sylhet', 'Bishwanath', 'Dashghar', '3131', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(971, 'Sylhet', 'Bishwanath', 'Deokalas', '3133', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(972, 'Sylhet', 'Bishwanath', 'Doulathpur', '3132', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(973, 'Sylhet', 'Bishwanath', 'Singer kanch', '3134', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(974, 'Sylhet', 'Fenchuganj', 'Fenchuganj', '3116', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(975, 'Sylhet', 'Fenchuganj', 'Fenchuganj SareKarkh', '3117', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(976, 'Sylhet', 'Goainhat', 'Chiknagul', '3152', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(977, 'Sylhet', 'Goainhat', 'Goainhat', '3150', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(978, 'Sylhet', 'Goainhat', 'Jaflong', '3151', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(979, 'Sylhet', 'Gopalganj', 'banigram', '3164', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(980, 'Sylhet', 'Gopalganj', 'Chandanpur', '3165', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(981, 'Sylhet', 'Gopalganj', 'Dakkhin Bhadashore', '3162', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(982, 'Sylhet', 'Gopalganj', 'Dhaka Dakkhin', '3161', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(983, 'Sylhet', 'Gopalganj', 'Gopalgannj', '3160', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(984, 'Sylhet', 'Gopalganj', 'Ranaping', '3163', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(985, 'Sylhet', 'Jaintapur', 'Jainthapur', '3156', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(986, 'Sylhet', 'Jakiganj', 'Ichhamati', '3191', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(987, 'Sylhet', 'Jakiganj', 'Jakiganj', '3190', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(988, 'Sylhet', 'Kanaighat', 'Chatulbazar', '3181', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(989, 'Sylhet', 'Kanaighat', 'Gachbari', '3183', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(990, 'Sylhet', 'Kanaighat', 'Kanaighat', '3180', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(991, 'Sylhet', 'Kanaighat', 'Manikganj', '3182', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(992, 'Sylhet', 'Kompanyganj', 'Kompanyganj', '3140', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(993, 'Sylhet', 'Sylhet Sadar', 'Birahimpur', '3106', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(994, 'Sylhet', 'Sylhet Sadar', 'Jalalabad', '3107', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(995, 'Sylhet', 'Sylhet Sadar', 'Jalalabad Cantoment', '3104', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(996, 'Sylhet', 'Sylhet Sadar', 'Kadamtali', '3111', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(997, 'Sylhet', 'Sylhet Sadar', 'Kamalbazer', '3112', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(998, 'Sylhet', 'Sylhet Sadar', 'Khadimnagar', '3103', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(999, 'Sylhet', 'Sylhet Sadar', 'Lalbazar', '3113', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1000, 'Sylhet', 'Sylhet Sadar', 'Mogla', '3108', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1001, 'Sylhet', 'Sylhet Sadar', 'Ranga Hajiganj', '3109', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1002, 'Sylhet', 'Sylhet Sadar', 'Shahajalal Science &', '3114', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1003, 'Sylhet', 'Sylhet Sadar', 'Silam', '3105', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1004, 'Sylhet', 'Sylhet Sadar', 'Sylhe Sadar', '3100', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1005, 'Sylhet', 'Sylhet Sadar', 'Sylhet Biman Bondar', '3102', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1006, 'Sylhet', 'Sylhet Sadar', 'Sylhet Cadet Col', '3101', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1007, 'Meherpur', 'Gangni', 'Gangni', '7110', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1008, 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7101', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1009, 'Meherpur', 'Meherpur Sadar', 'Amjhupi', '7152', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1010, 'Meherpur', 'Meherpur Sadar', 'Meherpur Sadar', '7100', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1011, 'Meherpur', 'Meherpur Sadar', 'Mujib Nagar Complex', '7102', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1012, 'Narail', 'Kalia', 'Kalia', '7520', '2025-01-24 05:04:16', '2025-01-24 05:04:16');
INSERT INTO `geocodes` (`id`, `district`, `thana`, `postoffice`, `postcode`, `created_at`, `updated_at`) VALUES
(1013, 'Narail', 'Laxmipasha', 'Baradia', '7514', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1014, 'Narail', 'Laxmipasha', 'Itna', '7512', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1015, 'Narail', 'Laxmipasha', 'Laxmipasha', '7510', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1016, 'Narail', 'Laxmipasha', 'Lohagora', '7511', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1017, 'Narail', 'Laxmipasha', 'Naldi', '7513', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1018, 'Narail', 'Mohajan', 'Mohajan', '7521', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1019, 'Narail', 'Narail Sadar', 'Narail Sadar', '7500', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1020, 'Narail', 'Narail Sadar', 'Ratanganj', '7501', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1021, 'Satkhira', 'Ashashuni', 'Ashashuni', '9460', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1022, 'Satkhira', 'Ashashuni', 'Baradal', '9461', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1023, 'Satkhira', 'Debbhata', 'Debbhata', '9430', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1024, 'Satkhira', 'Debbhata', 'Gurugram', '9431', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1025, 'Satkhira', 'kalaroa', 'Chandanpur', '9415', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1026, 'Satkhira', 'kalaroa', 'Hamidpur', '9413', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1027, 'Satkhira', 'kalaroa', 'Jhaudanga', '9412', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1028, 'Satkhira', 'kalaroa', 'kalaroa', '9410', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1029, 'Satkhira', 'kalaroa', 'Khordo', '9414', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1030, 'Satkhira', 'kalaroa', 'Murarikati', '9411', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1031, 'Satkhira', 'Kaliganj UPO', 'Kaliganj UPO', '9440', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1032, 'Satkhira', 'Kaliganj UPO', 'Nalta Mubaroknagar', '9441', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1033, 'Satkhira', 'Kaliganj UPO', 'Ratanpur', '9442', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1034, 'Satkhira', 'Nakipur', 'Buri Goalini', '9453', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1035, 'Satkhira', 'Nakipur', 'Gabura', '9454', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1036, 'Satkhira', 'Nakipur', 'Habinagar', '9455', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1037, 'Satkhira', 'Nakipur', 'Nakipur', '9450', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1038, 'Satkhira', 'Nakipur', 'Naobeki', '9452', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1039, 'Satkhira', 'Nakipur', 'Noornagar', '9451', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1040, 'Satkhira', 'Satkhira Sadar', 'Budhhat', '9403', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1041, 'Satkhira', 'Satkhira Sadar', 'Gunakar kati', '9402', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1042, 'Satkhira', 'Satkhira Sadar', 'Satkhira Islamia Acc', '9401', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1043, 'Satkhira', 'Satkhira Sadar', 'Satkhira Sadar', '9400', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1044, 'Satkhira', 'Taala', 'Patkelghata', '9421', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1045, 'Satkhira', 'Taala', 'Taala', '9420', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1046, 'Barguna', 'Amtali', 'Amtali', '8710', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1047, 'Barguna', 'Bamna', 'Bamna', '8730', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1048, 'Barguna', 'Barguna Sadar', 'Barguna Sadar', '8700', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1049, 'Barguna', 'Barguna Sadar', 'Nali Bandar', '8701', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1050, 'Barguna', 'Betagi', 'Betagi', '8740', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1051, 'Barguna', 'Betagi', 'Darul Ulam', '8741', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1052, 'Barguna', 'Patharghata', 'Kakchira', '8721', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1053, 'Barguna', 'Patharghata', 'Patharghata', '8720', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1054, 'Barishal', 'Agailzhara', 'Agailzhara', '8240', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1055, 'Barishal', 'Agailzhara', 'Gaila', '8241', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1056, 'Barishal', 'Agailzhara', 'Paisarhat', '8242', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1057, 'Barishal', 'Babuganj', 'Babuganj', '8210', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1058, 'Barishal', 'Babuganj', 'Barishal Cadet', '8216', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1059, 'Barishal', 'Babuganj', 'Chandpasha', '8212', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1060, 'Barishal', 'Babuganj', 'Madhabpasha', '8213', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1061, 'Barishal', 'Babuganj', 'Nizamuddin College', '8215', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1062, 'Barishal', 'Babuganj', 'Rahamatpur', '8211', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1063, 'Barishal', 'Babuganj', 'Thakur Mallik', '8214', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1064, 'Barishal', 'Barajalia', 'Barajalia', '8260', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1065, 'Barishal', 'Barajalia', 'Osman Manjil', '8261', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1066, 'Barishal', 'Barishal Sadar', 'Barishal Sadar', '8200', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1067, 'Barishal', 'Barishal Sadar', 'Bukhainagar', '8201', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1068, 'Barishal', 'Barishal Sadar', 'Jaguarhat', '8206', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1069, 'Barishal', 'Barishal Sadar', 'Kashipur', '8205', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1070, 'Barishal', 'Barishal Sadar', 'Patang', '8204', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1071, 'Barishal', 'Barishal Sadar', 'Saheberhat', '8202', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1072, 'Barishal', 'Barishal Sadar', 'Sugandia', '8203', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1073, 'Barishal', 'Gouranadi', 'Batajor', '8233', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1074, 'Barishal', 'Gouranadi', 'Gouranadi', '8230', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1075, 'Barishal', 'Gouranadi', 'Kashemabad', '8232', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1076, 'Barishal', 'Gouranadi', 'Tarki Bandar', '8231', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1077, 'Barishal', 'Mahendiganj', 'Langutia', '8274', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1078, 'Barishal', 'Mahendiganj', 'Laskarpur', '8271', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1079, 'Barishal', 'Mahendiganj', 'Mahendiganj', '8270', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1080, 'Barishal', 'Mahendiganj', 'Nalgora', '8273', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1081, 'Barishal', 'Mahendiganj', 'Ulania', '8272', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1082, 'Barishal', 'Muladi', 'Charkalekhan', '8252', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1083, 'Barishal', 'Muladi', 'Kazirchar', '8251', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1084, 'Barishal', 'Muladi', 'Muladi', '8250', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1085, 'Barishal', 'Sahebganj', 'Charamandi', '8281', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1086, 'Barishal', 'Sahebganj', 'kalaskati', '8284', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1087, 'Barishal', 'Sahebganj', 'Padri Shibpur', '8282', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1088, 'Barishal', 'Sahebganj', 'Sahebganj', '8280', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1089, 'Barishal', 'Sahebganj', 'Shialguni', '8283', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1090, 'Barishal', 'Uzirpur', 'Dakuarhat', '8223', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1091, 'Barishal', 'Uzirpur', 'Dhamura', '8221', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1092, 'Barishal', 'Uzirpur', 'Jugirkanda', '8222', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1093, 'Barishal', 'Uzirpur', 'Shikarpur', '8224', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1094, 'Barishal', 'Uzirpur', 'Uzirpur', '8220', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1095, 'Bhola', 'Bhola Sadar', 'Bhola Sadar', '8300', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1096, 'Bhola', 'Bhola Sadar', 'Joynagar', '8301', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1097, 'Bhola', 'Borhanuddin UPO', 'Borhanuddin UPO', '8320', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1098, 'Bhola', 'Borhanuddin UPO', 'Mirzakalu', '8321', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1099, 'Bhola', 'Charfashion', 'Charfashion', '8340', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1100, 'Bhola', 'Charfashion', 'Dularhat', '8341', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1101, 'Bhola', 'Charfashion', 'Keramatganj', '8342', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1102, 'Bhola', 'Doulatkhan', 'Doulatkhan', '8310', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1103, 'Bhola', 'Doulatkhan', 'Hajipur', '8311', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1104, 'Bhola', 'Hajirhat', 'Hajirhat', '8360', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1105, 'Bhola', 'Hatshoshiganj', 'Hatshoshiganj', '8350', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1106, 'Bhola', 'Lalmohan UPO', 'Daurihat', '8331', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1107, 'Bhola', 'Lalmohan UPO', 'Gazaria', '8332', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1108, 'Bhola', 'Lalmohan UPO', 'Lalmohan UPO', '8330', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1109, 'Jhalokathi', 'Jhalokathi Sadar', 'Baukathi', '8402', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1110, 'Jhalokathi', 'Jhalokathi Sadar', 'Gabha', '8403', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1111, 'Jhalokathi', 'Jhalokathi Sadar', 'Jhalokathi Sadar', '8400', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1112, 'Jhalokathi', 'Jhalokathi Sadar', 'Nabagram', '8401', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1113, 'Jhalokathi', 'Jhalokathi Sadar', 'Shekherhat', '8404', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1114, 'Jhalokathi', 'Kathalia', 'Amua', '8431', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1115, 'Jhalokathi', 'Kathalia', 'Kathalia', '8430', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1116, 'Jhalokathi', 'Kathalia', 'Niamatee', '8432', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1117, 'Jhalokathi', 'Kathalia', 'Shoulajalia', '8433', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1118, 'Jhalokathi', 'Nalchhiti', 'Beerkathi', '8421', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1119, 'Jhalokathi', 'Nalchhiti', 'Nalchhiti', '8420', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1120, 'Jhalokathi', 'Rajapur', 'Rajapur', '8410', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1121, 'Patuakhali', 'Bauphal', 'Bagabandar', '8621', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1122, 'Patuakhali', 'Bauphal', 'Bauphal', '8620', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1123, 'Patuakhali', 'Bauphal', 'Birpasha', '8622', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1124, 'Patuakhali', 'Bauphal', 'Kalaia', '8624', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1125, 'Patuakhali', 'Bauphal', 'Kalishari', '8623', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1126, 'Patuakhali', 'Dashmina', 'Dashmina', '8630', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1127, 'Patuakhali', 'Galachipa', 'Galachipa', '8640', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1128, 'Patuakhali', 'Galachipa', 'Gazipur Bandar', '8641', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1129, 'Patuakhali', 'Khepupara', 'Khepupara', '8650', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1130, 'Patuakhali', 'Khepupara', 'Mahipur', '8651', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1131, 'Patuakhali', 'Patuakhali Sadar', 'Dumkee', '8602', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1132, 'Patuakhali', 'Patuakhali Sadar', 'Moukaran', '8601', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1133, 'Patuakhali', 'Patuakhali Sadar', 'Patuakhali Sadar', '8600', '2025-01-24 05:04:16', '2025-01-24 05:04:16'),
(1134, 'Patuakhali', 'Patuakhali Sadar', 'Rahimabad', '8603', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1135, 'Patuakhali', 'Subidkhali', 'Subidkhali', '8610', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1136, 'Pirojpur', 'Banaripara', 'Banaripara', '8530', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1137, 'Pirojpur', 'Banaripara', 'Chakhar', '8531', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1138, 'Pirojpur', 'Bhandaria', 'Bhandaria', '8550', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1139, 'Pirojpur', 'Bhandaria', 'Dhaoa', '8552', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1140, 'Pirojpur', 'Bhandaria', 'Kanudashkathi', '8551', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1141, 'Pirojpur', 'kaukhali', 'Jolagati', '8513', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1142, 'Pirojpur', 'kaukhali', 'Joykul', '8512', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1143, 'Pirojpur', 'kaukhali', 'Kaukhali', '8510', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1144, 'Pirojpur', 'kaukhali', 'Keundia', '8511', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1145, 'Pirojpur', 'Mathbaria', 'Betmor Natun Hat', '8565', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1146, 'Pirojpur', 'Mathbaria', 'Gulishakhali', '8563', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1147, 'Pirojpur', 'Mathbaria', 'Halta', '8562', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1148, 'Pirojpur', 'Mathbaria', 'Mathbaria', '8560', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1149, 'Pirojpur', 'Mathbaria', 'Shilarganj', '8566', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1150, 'Pirojpur', 'Mathbaria', 'Tiarkhali', '8564', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1151, 'Pirojpur', 'Mathbaria', 'Tushkhali', '8561', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1152, 'Pirojpur', 'Nazirpur', 'Nazirpur', '8540', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1153, 'Pirojpur', 'Nazirpur', 'Sriramkathi', '8541', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1154, 'Pirojpur', 'Pirojpur Sadar', 'Hularhat', '8501', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1155, 'Pirojpur', 'Pirojpur Sadar', 'Parerhat', '8502', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1156, 'Pirojpur', 'Pirojpur Sadar', 'Pirojpur Sadar', '8500', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1157, 'Pirojpur', 'Swarupkathi', 'Darus Sunnat', '8521', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1158, 'Pirojpur', 'Swarupkathi', 'Jalabari', '8523', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1159, 'Pirojpur', 'Swarupkathi', 'Kaurikhara', '8522', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1160, 'Pirojpur', 'Swarupkathi', 'Swarupkathi', '8520', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1161, 'Bogra', 'Alamdighi', 'Adamdighi', '5890', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1162, 'Bogra', 'Alamdighi', 'Nasharatpur', '5892', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1163, 'Bogra', 'Alamdighi', 'Santahar', '5891', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1164, 'Bogra', 'Bogra Sadar', 'Bogra Canttonment', '5801', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1165, 'Bogra', 'Bogra Sadar', 'Bogra Sadar', '5800', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1166, 'Bogra', 'Dhunat', 'Dhunat', '5850', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1167, 'Bogra', 'Dhunat', 'Gosaibari', '5851', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1168, 'Bogra', 'Dupchachia', 'Dupchachia', '5880', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1169, 'Bogra', 'Dupchachia', 'Talora', '5881', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1170, 'Bogra', 'Gabtoli', 'Gabtoli', '5820', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1171, 'Bogra', 'Gabtoli', 'Sukhanpukur', '5821', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1172, 'Bogra', 'Kahalu', 'Kahalu', '5870', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1173, 'Bogra', 'Nandigram', 'Nandigram', '5860', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1174, 'Bogra', 'Sariakandi', 'Chandan Baisha', '5831', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1175, 'Bogra', 'Sariakandi', 'Sariakandi', '5830', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1176, 'Bogra', 'Sherpur', 'Chandaikona', '5841', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1177, 'Bogra', 'Sherpur', 'Palli Unnyan Accadem', '5842', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1178, 'Bogra', 'Sherpur', 'Sherpur', '5840', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1179, 'Bogra', 'Shibganj', 'Shibganj', '5810', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1180, 'Bogra', 'Sonatola', 'Sonatola', '5826', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1181, 'Chapinawabganj', 'Bholahat', 'Bholahat', '6330', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1182, 'Chapinawabganj', 'Chapinawabganj Sadar', 'Amnura', '6303', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1183, 'Chapinawabganj', 'Chapinawabganj Sadar', 'Chapinawbganj Sadar', '6300', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1184, 'Chapinawabganj', 'Chapinawabganj Sadar', 'Rajarampur', '6301', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1185, 'Chapinawabganj', 'Chapinawabganj Sadar', 'Ramchandrapur', '6302', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1186, 'Chapinawabganj', 'Nachol', 'Mandumala', '6311', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1187, 'Chapinawabganj', 'Nachol', 'Nachol', '6310', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1188, 'Chapinawabganj', 'Rohanpur', 'Gomashtapur', '6321', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1189, 'Chapinawabganj', 'Rohanpur', 'Rohanpur', '6320', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1190, 'Chapinawabganj', 'Shibganj U.P.O', 'Kansart', '6341', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1191, 'Chapinawabganj', 'Shibganj U.P.O', 'Manaksha', '6342', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1192, 'Chapinawabganj', 'Shibganj U.P.O', 'Shibganj U.P.O', '6340', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1193, 'Joypurhat', 'Akkelpur', 'Akklepur', '5940', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1194, 'Joypurhat', 'Akkelpur', 'jamalganj', '5941', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1195, 'Joypurhat', 'Akkelpur', 'Tilakpur', '5942', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1196, 'Joypurhat', 'Joypurhat Sadar', 'Joypurhat Sadar', '5900', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1197, 'Joypurhat', 'kalai', 'kalai', '5930', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1198, 'Joypurhat', 'Khetlal', 'Khetlal', '5920', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1199, 'Joypurhat', 'panchbibi', 'Panchbibi', '5910', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1200, 'Naogaon', 'Ahsanganj', 'Ahsanganj', '6596', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1201, 'Naogaon', 'Ahsanganj', 'Bandai', '6597', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1202, 'Naogaon', 'Badalgachhi', 'Badalgachhi', '6570', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1203, 'Naogaon', 'Dhamuirhat', 'Dhamuirhat', '6580', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1204, 'Naogaon', 'Mahadebpur', 'Mahadebpur', '6530', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1205, 'Naogaon', 'Naogaon Sadar', 'Naogaon Sadar', '6500', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1206, 'Naogaon', 'Niamatpur', 'Niamatpur', '6520', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1207, 'Naogaon', 'Nitpur', 'Nitpur', '6550', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1208, 'Naogaon', 'Nitpur', 'Panguria', '6552', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1209, 'Naogaon', 'Nitpur', 'Porsa', '6551', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1210, 'Naogaon', 'Patnitala', 'Patnitala', '6540', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1211, 'Naogaon', 'Prasadpur', 'Balihar', '6512', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1212, 'Naogaon', 'Prasadpur', 'Manda', '6511', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1213, 'Naogaon', 'Prasadpur', 'Prasadpur', '6510', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1214, 'Naogaon', 'Raninagar', 'Kashimpur', '6591', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1215, 'Naogaon', 'Raninagar', 'Raninagar', '6590', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1216, 'Naogaon', 'Sapahar', 'Moduhil', '6561', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1217, 'Naogaon', 'Sapahar', 'Sapahar', '6560', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1218, 'Natore', 'Gopalpur UPO', 'Abdulpur', '6422', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1219, 'Natore', 'Gopalpur UPO', 'Gopalpur U.P.O', '6420', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1220, 'Natore', 'Gopalpur UPO', 'Lalpur S.O', '6421', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1221, 'Natore', 'Harua', 'Baraigram', '6432', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1222, 'Natore', 'Harua', 'Dayarampur', '6431', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1223, 'Natore', 'Harua', 'Harua', '6430', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1224, 'Natore', 'Hatgurudaspur', 'Hatgurudaspur', '6440', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1225, 'Natore', 'Laxman', 'Laxman', '6410', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1226, 'Natore', 'Natore Sadar', 'Baiddyabal Gharia', '6402', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1227, 'Natore', 'Natore Sadar', 'Digapatia', '6401', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1228, 'Natore', 'Natore Sadar', 'Madhnagar', '6403', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1229, 'Natore', 'Natore Sadar', 'Natore Sadar', '6400', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1230, 'Natore', 'Singra', 'Singra', '6450', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1231, 'Pabna', 'Banwarinagar', 'Banwarinagar', '6650', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1232, 'Pabna', 'Bera', 'Bera', '6680', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1233, 'Pabna', 'Bera', 'Kashinathpur', '6682', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1234, 'Pabna', 'Bera', 'Nakalia', '6681', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1235, 'Pabna', 'Bera', 'Puran Bharenga', '6683', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1236, 'Pabna', 'Bhangura', 'Bhangura', '6640', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1237, 'Pabna', 'Chatmohar', 'Chatmohar', '6630', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1238, 'Pabna', 'Debottar', 'Debottar', '6610', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1239, 'Pabna', 'Ishwardi', 'Dhapari', '6621', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1240, 'Pabna', 'Ishwardi', 'Ishwardi', '6620', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1241, 'Pabna', 'Ishwardi', 'Pakshi', '6622', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1242, 'Pabna', 'Ishwardi', 'Rajapur', '6623', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1243, 'Pabna', 'Pabna Sadar', 'Hamayetpur', '6602', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1244, 'Pabna', 'Pabna Sadar', 'Kaliko Cotton Mills', '6601', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1245, 'Pabna', 'Pabna Sadar', 'Pabna Sadar', '6600', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1246, 'Pabna', 'Sathia', 'Sathia', '6670', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1247, 'Pabna', 'Sujanagar', 'Sagarkandi', '6661', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1248, 'Pabna', 'Sujanagar', 'Sujanagar', '6660', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1249, 'Rajshahi', 'Bagha', 'Arani', '6281', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1250, 'Rajshahi', 'Bagha', 'Bagha', '6280', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1251, 'Rajshahi', 'Bhabaniganj', 'Bhabaniganj', '6250', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1252, 'Rajshahi', 'Bhabaniganj', 'Taharpur', '6251', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1253, 'Rajshahi', 'Charghat', 'Charghat', '6270', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1254, 'Rajshahi', 'Charghat', 'Sarda', '6271', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1255, 'Rajshahi', 'Durgapur', 'Durgapur', '6240', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1256, 'Rajshahi', 'Godagari', 'Godagari', '6290', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1257, 'Rajshahi', 'Godagari', 'Premtoli', '6291', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1258, 'Rajshahi', 'Khod Mohanpur', 'Khodmohanpur', '6220', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1259, 'Rajshahi', 'Lalitganj', 'Lalitganj', '6210', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1260, 'Rajshahi', 'Lalitganj', 'Rajshahi Sugar Mills', '6211', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1261, 'Rajshahi', 'Lalitganj', 'Shyampur', '6212', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1262, 'Rajshahi', 'Putia', 'Putia', '6260', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1263, 'Rajshahi', 'Rajshahi Sadar', 'Binodpur Bazar', '6206', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1264, 'Rajshahi', 'Rajshahi Sadar', 'Ghuramara', '6100', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1265, 'Rajshahi', 'Rajshahi Sadar', 'Kazla', '6204', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1266, 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Canttonment', '6202', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1267, 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Court', '6201', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1268, 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi Sadar', '6000', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1269, 'Rajshahi', 'Rajshahi Sadar', 'Rajshahi University', '6205', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1270, 'Rajshahi', 'Rajshahi Sadar', 'Sapura', '6203', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1271, 'Rajshahi', 'Tanor', 'Tanor', '6230', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1272, 'Sirajganj', 'Baiddya Jam Toil', 'Baiddya Jam Toil', '6730', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1273, 'Sirajganj', 'Belkuchi', 'Belkuchi', '6740', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1274, 'Sirajganj', 'Belkuchi', 'Enayetpur', '6751', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1275, 'Sirajganj', 'Belkuchi', 'Rajapur', '6742', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1276, 'Dinajpur', 'Bangla Hili', 'Bangla Hili', '5270', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1277, 'Dinajpur', 'Biral', 'Biral', '5210', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1278, 'Dinajpur', 'Birampur', 'Birampur', '5266', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1279, 'Dinajpur', 'Birganj', 'Birganj', '5220', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1280, 'Dinajpur', 'Chrirbandar', 'Chrirbandar', '5240', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1281, 'Dinajpur', 'Chrirbandar', 'Ranirbandar', '5241', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1282, 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Rajbari', '5201', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1283, 'Dinajpur', 'Dinajpur Sadar', 'Dinajpur Sadar', '5200', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1284, 'Dinajpur', 'Khansama', 'Khansama', '5230', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1285, 'Dinajpur', 'Khansama', 'Pakarhat', '5231', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1286, 'Dinajpur', 'Maharajganj', 'Maharajganj', '5226', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1287, 'Dinajpur', 'Nababganj', 'Daudpur', '5281', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1288, 'Dinajpur', 'Nababganj', 'Gopalpur', '5282', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1289, 'Dinajpur', 'Nababganj', 'Nababganj', '5280', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1290, 'Dinajpur', 'Osmanpur', 'Ghoraghat', '5291', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1291, 'Dinajpur', 'Osmanpur', 'Osmanpur', '5290', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1292, 'Dinajpur', 'Parbatipur', 'Parbatipur', '5250', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1293, 'Dinajpur', 'Phulbari', 'Phulbari', '5260', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1294, 'Dinajpur', 'Setabganj', 'Setabganj', '5216', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1295, 'Gaibandha', 'Bonarpara', 'Bonarpara', '5750', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1296, 'Gaibandha', 'Bonarpara', 'saghata', '5751', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1297, 'Gaibandha', 'Gaibandha Sadar', 'Gaibandha Sadar', '5700', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1298, 'Gaibandha', 'Gobindaganj', 'Gobindhaganj', '5740', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1299, 'Gaibandha', 'Gobindaganj', 'Mahimaganj', '5741', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1300, 'Gaibandha', 'Palashbari', 'Palashbari', '5730', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1301, 'Gaibandha', 'Phulchhari', 'Bharatkhali', '5761', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1302, 'Gaibandha', 'Phulchhari', 'Phulchhari', '5760', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1303, 'Gaibandha', 'Saadullapur', 'Naldanga', '5711', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1304, 'Gaibandha', 'Saadullapur', 'Saadullapur', '5710', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1305, 'Gaibandha', 'Sundarganj', 'Bamandanga', '5721', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1306, 'Gaibandha', 'Sundarganj', 'Sundarganj', '5720', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1307, 'Kurigram', 'Bhurungamari', 'Bhurungamari', '5670', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1308, 'Kurigram', 'Chilmari', 'Chilmari', '5630', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1309, 'Kurigram', 'Chilmari', 'Jorgachh', '5631', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1310, 'Kurigram', 'Kurigram Sadar', 'Kurigram Sadar', '5600', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1311, 'Kurigram', 'Kurigram Sadar', 'Pandul', '5601', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1312, 'Kurigram', 'Kurigram Sadar', 'Phulbari', '5680', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1313, 'Kurigram', 'Nageshwar', 'Nageshwar', '5660', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1314, 'Kurigram', 'Rajarhat', 'Nazimkhan', '5611', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1315, 'Kurigram', 'Rajarhat', 'Rajarhat', '5610', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1316, 'Kurigram', 'Rajibpur', 'Rajibpur', '5650', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1317, 'Kurigram', 'Roumari', 'Roumari', '5640', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1318, 'Kurigram', 'Ulipur', 'Bazarhat', '5621', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1319, 'Kurigram', 'Ulipur', 'Ulipur', '5620', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1320, 'Lalmonirhat', 'Aditmari', 'Aditmari', '5510', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1321, 'Lalmonirhat', 'Hatibandha', 'Hatibandha', '5530', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1322, 'Lalmonirhat', 'Lalmonirhat Sadar', 'Kulaghat SO', '5502', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1323, 'Lalmonirhat', 'Lalmonirhat Sadar', 'Lalmonirhat Sadar', '5500', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1324, 'Lalmonirhat', 'Lalmonirhat Sadar', 'Moghalhat', '5501', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1325, 'Lalmonirhat', 'Patgram', 'Baura', '5541', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1326, 'Lalmonirhat', 'Patgram', 'Burimari', '5542', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1327, 'Lalmonirhat', 'Patgram', 'Patgram', '5540', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1328, 'Lalmonirhat', 'Tushbhandar', 'Tushbhandar', '5520', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1329, 'Nilphamari', 'Dimla', 'Dimla', '5350', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1330, 'Nilphamari', 'Dimla', 'Ghaga Kharibari', '5351', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1331, 'Nilphamari', 'Domar', 'Chilahati', '5341', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1332, 'Nilphamari', 'Domar', 'Domar', '5340', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1333, 'Nilphamari', 'Jaldhaka', 'Jaldhaka', '5330', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1334, 'Nilphamari', 'Kishoriganj', 'Kishoriganj', '5320', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1335, 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sadar', '5300', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1336, 'Nilphamari', 'Nilphamari Sadar', 'Nilphamari Sugar Mil', '5301', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1337, 'Nilphamari', 'Syedpur', 'Syedpur', '5310', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1338, 'Nilphamari', 'Syedpur', 'Syedpur Upashahar', '5311', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1339, 'Panchagarh', 'Boda', 'Boda', '5010', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1340, 'Panchagarh', 'Chotto Dab', 'Chotto Dab', '5040', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1341, 'Panchagarh', 'Chotto Dab', 'Mirjapur', '5041', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1342, 'Panchagarh', 'Dabiganj', 'Dabiganj', '5020', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1343, 'Panchagarh', 'Panchagra Sadar', 'Panchagar Sadar', '5000', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1344, 'Panchagarh', 'Tetulia', 'Tetulia', '5030', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1345, 'Rangpur', 'Badarganj', 'Badarganj', '5430', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1346, 'Rangpur', 'Badarganj', 'Shyampur', '5431', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1347, 'Rangpur', 'Gangachara', 'Gangachara', '5410', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1348, 'Rangpur', 'Kaunia', 'Haragachh', '5441', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1349, 'Rangpur', 'Kaunia', 'Kaunia', '5440', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1350, 'Rangpur', 'Mithapukur', 'Mithapukur', '5460', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1351, 'Rangpur', 'Pirgachha', 'Pirgachha', '5450', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1352, 'Rangpur', 'Rangpur Sadar', 'Alamnagar', '5402', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1353, 'Rangpur', 'Rangpur Sadar', 'Mahiganj', '5403', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1354, 'Rangpur', 'Rangpur Sadar', 'Rangpur Cadet Colleg', '5404', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1355, 'Rangpur', 'Rangpur Sadar', 'Rangpur Carmiecal Col', '5405', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1356, 'Rangpur', 'Rangpur Sadar', 'Rangpur Sadar', '5400', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1357, 'Rangpur', 'Rangpur Sadar', 'Rangpur Upa-Shahar', '5401', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1358, 'Rangpur', 'Taraganj', 'Taraganj', '5420', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1359, 'Thakurgaon', 'Baliadangi', 'Baliadangi', '5140', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1360, 'Thakurgaon', 'Baliadangi', 'Lahiri', '5141', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1361, 'Thakurgaon', 'Jibanpur', 'Jibanpur', '5130', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1362, 'Thakurgaon', 'Pirganj', 'Pirganj', '5110', '2025-01-24 05:04:17', '2025-01-24 05:04:17'),
(1363, 'Thakurgaon', 'Pirganj', 'Pirganj', '5470', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1364, 'Thakurgaon', 'Rani Sankail', 'Nekmarad', '5121', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1365, 'Thakurgaon', 'Rani Sankail', 'Rani Sankail', '5120', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1366, 'Thakurgaon', 'Thakurgaon Sadar', 'Ruhia', '5103', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1367, 'Thakurgaon', 'Thakurgaon Sadar', 'Shibganj', '5102', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1368, 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Road', '5101', '2025-01-24 05:04:18', '2025-01-24 05:04:18'),
(1369, 'Thakurgaon', 'Thakurgaon Sadar', 'Thakurgaon Sadar', '5100', '2025-01-24 05:04:18', '2025-01-24 05:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_23_184556_create_admins_table', 1),
(5, '2025_01_01_080540_create_clients_table', 1),
(6, '2025_01_04_191836_create_personal_details_table', 1),
(7, '2025_01_04_193117_create_career_applications_table', 1),
(8, '2025_01_04_193408_create_achievements_table', 1),
(9, '2025_01_04_193745_create_address_details_table', 1),
(10, '2025_01_04_194150_create_other_relevant_information_table', 1),
(11, '2025_01_04_194444_create_disability_information_table', 1),
(14, '2025_01_05_104204_create_academic_education_table', 1),
(18, '2025_01_05_105635_create_boards_table', 1),
(19, '2025_01_05_105722_create_countries_table', 1),
(20, '2025_01_05_105749_create_results_table', 1),
(21, '2025_01_05_105818_create_years_table', 1),
(22, '2025_01_05_105843_create_languages_table', 1),
(23, '2025_01_05_110216_create_references_table', 1),
(24, '2025_01_05_143802_create_categories_table', 1),
(25, '2025_01_15_215453_create_geocodes_table', 1),
(26, '2025_01_05_104829_create_trainings_table', 2),
(27, '2025_01_05_105207_create_professional_certifications_table', 3),
(28, '2025_01_04_194704_create_experiences_table', 4),
(29, '2025_01_04_195302_create_skill_descriptions_table', 5),
(30, '2025_01_05_105424_create_skills_table', 5),
(31, '2025_01_29_034249_create_activities_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `other_relevant_information`
--

CREATE TABLE `other_relevant_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `married_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `national_id` varchar(20) DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `mobile_home` varchar(15) DEFAULT 'N/A',
  `mobile_office` varchar(15) DEFAULT 'N/A',
  `email` varchar(255) NOT NULL,
  `extra_email` varchar(255) DEFAULT 'N/A',
  `blood_group` varchar(255) DEFAULT 'N/A',
  `height` varchar(255) DEFAULT 'N/A',
  `weight` varchar(255) DEFAULT 'N/A',
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_certifications`
--

CREATE TABLE `professional_certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `certification` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_certifications`
--

INSERT INTO `professional_certifications` (`id`, `user_id`, `certification`, `institute`, `location`, `country`, `start_date`, `end_date`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'IDB test', 'IDB', 'Dhaka', 'Bangladesh', '2025-01-27', '2025-01-28', '-1737963599jRj0avm60V', 1, '2025-01-27 01:39:59', '2025-01-27 01:43:51', '2025-01-27 01:43:51'),
(2, 1, 'IDB test', 'IDB', 'Dhaka', 'Bangladesh', '2025-01-27', '2025-01-27', '-17379995024Zcjc36c5T', 1, '2025-01-27 11:38:22', '2025-01-27 11:38:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4R6EqsqcZh9kSjQWa3TGaepkTQeVk28syN8Vokha', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQVZKZXY1Q3FJblZWNXJ1ZTJqU0pQVUxWcFIyZk5IRFNsdDdXZHVvOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2VkdWNhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUxOiJsb2dpbl91c2VyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1738124415),
('ToVrNAZ1e3Hw54W2j9k7PIsosQb8lRMDsNhqGNU6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV2YyRURMZ1F1ak5VNE44aXlOUncxbE1kalpLTFRkdk9LVjBqdGJ3UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2VtcGxveW1lbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MToibG9naW5fdXNlcl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1738078576);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill` varchar(255) NOT NULL,
  `self` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `training` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skill_descriptions`
--

CREATE TABLE `skill_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `user_id`, `title`, `country`, `topic`, `year`, `institute`, `duration`, `location`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'WDPF', 'Bangladesh', 'WEB DEVELOPEMENT', 2022, 'IDB', 14, 'Dhaka', 'wdpf-1737960064Amsqu5fQt4', 1, '2025-01-27 00:41:04', '2025-01-27 00:41:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `email_verified_at`, `password`, `slug`, `is_active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test User', 'testuser', '01774656830', 'test@example.com', NULL, '$2y$12$VWLkVw3Q6./vMQS0a7694ONixBdY42c8Ldsh789.FGNm7pzmjepT.', 'testuser', 1, NULL, '2025-01-24 05:04:18', '2025-01-24 05:04:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_education`
--
ALTER TABLE `academic_education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_education_slug_unique` (`slug`),
  ADD KEY `academic_education_user_id_foreign` (`user_id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `activities_slug_unique` (`slug`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_reset_tokens`
--
ALTER TABLE `admin_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_sessions_user_id_index` (`user_id`),
  ADD KEY `admin_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disability_information`
--
ALTER TABLE `disability_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `geocodes`
--
ALTER TABLE `geocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_relevant_information`
--
ALTER TABLE `other_relevant_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_details_email_unique` (`email`),
  ADD UNIQUE KEY `personal_details_slug_unique` (`slug`),
  ADD UNIQUE KEY `personal_details_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `personal_details_passport_no_unique` (`passport_no`),
  ADD UNIQUE KEY `personal_details_mobile_unique` (`mobile`),
  ADD KEY `personal_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `professional_certifications`
--
ALTER TABLE `professional_certifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professional_certifications_slug_unique` (`slug`),
  ADD KEY `professional_certifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_skill_unique` (`skill`),
  ADD UNIQUE KEY `skills_slug_unique` (`slug`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `skill_descriptions`
--
ALTER TABLE `skill_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skill_descriptions_slug_unique` (`slug`),
  ADD KEY `skill_descriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_education`
--
ALTER TABLE `academic_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_details`
--
ALTER TABLE `address_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_applications`
--
ALTER TABLE `career_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disability_information`
--
ALTER TABLE `disability_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geocodes`
--
ALTER TABLE `geocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1370;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `other_relevant_information`
--
ALTER TABLE `other_relevant_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_certifications`
--
ALTER TABLE `professional_certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill_descriptions`
--
ALTER TABLE `skill_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_education`
--
ALTER TABLE `academic_education`
  ADD CONSTRAINT `academic_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `address_details`
--
ALTER TABLE `address_details`
  ADD CONSTRAINT `address_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD CONSTRAINT `career_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `personal_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professional_certifications`
--
ALTER TABLE `professional_certifications`
  ADD CONSTRAINT `professional_certifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill_descriptions`
--
ALTER TABLE `skill_descriptions`
  ADD CONSTRAINT `skill_descriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
