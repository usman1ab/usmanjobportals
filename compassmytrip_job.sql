-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2025 at 09:10 PM
-- Server version: 8.0.34
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compassmytrip_job`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Healthcare', 'healthcare', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(2, 'Medical Services', 'medical-services', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(3, 'Technology', 'technology', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(4, 'Software Development', 'software-development', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(7, 'Creative and Design', 'creative-and-design', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(8, 'Research and Development', 'research-and-development', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(11, 'Finance and Accounting', 'finance-and-accounting', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(12, 'Sales and Marketing', 'sales-and-marketing', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(13, 'Legal Services', 'legal-services', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(14, 'Media and Communication', 'media-and-communication', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(16, 'Transportation and Logistics', 'transportation-and-logistics', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(18, 'Social Services', 'social-services', '1', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(21, 'neuro surgen', 'neuro-surgen', '1', '2025-01-10 19:23:08', '2025-01-28 10:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `cname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `cname`, `slug`, `address`, `phone`, `website`, `logo`, `banner`, `slogan`, `description`, `created_at`, `updated_at`) VALUES
(105, 69, 'Indus Hospital', 'indus-hospital', 'Valencia Town Lahore Pakistan', '03114931858', 'company.com', '1736784336.jpg', '', 'company', 'An I.T company which provide quality work to clients.', '2025-01-13 15:55:33', '2025-01-13 16:06:20'),
(106, 70, 'sofware campany', 'sofware-campany', '', '', '', '', '', '', '', '2025-01-15 09:00:45', '2025-01-15 09:00:45'),
(107, 73, 'mtecsoft', 'mtecsoft', '', '', '', '', '', '', '', '2025-01-17 06:29:17', '2025-01-17 06:29:17'),
(108, 75, 'mtech soft', 'mtech-soft', '', '', '', '', '', '', '', '2025-01-21 11:09:44', '2025-01-21 11:09:44'),
(109, 78, 'hospital', 'hospital', '', '', '', '', '', '', '', '2025-01-21 13:07:55', '2025-01-21 13:07:55'),
(110, 97, 'الاطفال', 'alatfal', '', '', '', '', '', '', '', '2025-01-28 05:09:43', '2025-01-28 05:09:43'),
(111, 108, 'Dala', 'dala', '', '', '', '', '', '', '', '2025-01-29 10:20:55', '2025-01-29 10:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(4, 79, 204, '2025-01-23 14:03:05', '2025-01-23 14:03:05'),
(5, 79, 205, '2025-01-23 14:03:45', '2025-01-23 14:03:45'),
(6, 79, 206, '2025-01-23 14:04:08', '2025-01-23 14:04:08'),
(9, 106, 222, '2025-01-28 09:06:49', '2025-01-28 09:06:49'),
(10, 111, 204, '2025-01-29 13:03:40', '2025-01-29 13:03:40'),
(11, 112, 211, '2025-01-31 09:40:09', '2025-01-31 09:40:09'),
(12, 52, 204, '2025-02-06 07:30:43', '2025-02-06 07:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint UNSIGNED NOT NULL,
  `interview_id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `q3` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q5` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q6` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q7` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q8` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q9` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommend` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feed_backs`
--

INSERT INTO `feed_backs` (`id`, `interview_id`, `user_id`, `job_id`, `employee_id`, `employee_type`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `recommend`, `created_at`, `updated_at`) VALUES
(7, 24, '54', '204', '61', 'Hiring Manager', '6', '7', '4', '7', '8', '7', '5', '5', '6', '0', '2025-01-27 05:40:18', '2025-01-27 05:40:18'),
(8, 24, '54', '204', '62', 'Interviewer', '8', '8', '8', '8', '8', '8', '8', '8', '8', '1', '2025-01-27 06:17:47', '2025-01-27 06:17:47'),
(9, 31, '96', '221', '61', 'Hiring Manager', '5', '6', '6', '7', '7', '8', '8', '7', '8', '1', '2025-01-27 14:15:00', '2025-01-27 14:15:00'),
(10, 31, '96', '221', '62', 'Interviewer', '7', '8', '4', '6', '8', '6', '8', '8', '9', '1', '2025-01-27 14:17:00', '2025-01-27 14:17:00'),
(11, 43, '112', '204', '61', 'Hiring Manager', '10', '10', '10', '10', '10', '10', '10', '10', '10', '1', '2025-02-04 10:54:01', '2025-02-04 10:54:01'),
(12, 30, '86', '205', '61', 'Hiring Manager', '0', '-1', '1', '-1', '1', '-1', '1', '-1', '1', '1', '2025-02-04 11:16:47', '2025-02-04 11:16:47'),
(13, 47, '112', '211', '78', 'employer', '10', '10', '10', '10', '10', '10', '10', '10', '10', '1', '2025-02-05 10:33:36', '2025-02-05 10:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `scheduled_at` timestamp NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `job_id`, `user_id`, `scheduled_at`, `location`, `link`, `notes`, `created_at`, `updated_at`, `status`) VALUES
(24, 204, 54, '2025-01-16 21:20:00', '', 'https://www.tiktok.com/@shahrozjutt209/video/7293522974013967622', 'thhis is for your interview', '2025-01-10 19:16:59', '2025-01-17 11:23:14', 'open'),
(25, 216, 79, '2025-01-30 09:00:00', 'valencia Town Lahore', '', 'Reached on site 30min before interview.', '2025-01-23 03:56:41', '2025-01-23 03:56:41', 'open'),
(26, 205, 79, '2025-01-30 19:06:00', 'valencia town lahore', '', 'tgghjf ghgj jhgjhbjkb', '2025-01-23 14:06:46', '2025-01-23 14:06:46', 'open'),
(27, 218, 52, '2025-01-16 21:20:00', NULL, 'https://meet.google.com/qpx-fypb-hdr', 'Reached 30 Mins Before Interview', '2025-01-10 19:16:59', '2025-01-17 11:23:14', 'open'),
(30, 205, 86, '2025-01-31 14:36:00', 'Sargodha, Punjab, Pkistan', '', NULL, '2025-01-27 09:35:26', '2025-01-27 09:35:26', 'open'),
(31, 221, 96, '2025-01-29 19:14:00', 'valencia Town Lahore', '', NULL, '2025-01-27 14:13:43', '2025-01-27 14:13:43', 'open'),
(32, 212, 86, '2025-01-28 13:16:00', '', '', NULL, '2025-01-28 04:37:27', '2025-01-28 04:37:27', 'open'),
(33, 212, 86, '2025-01-28 13:16:00', '', '', NULL, '2025-01-28 04:37:29', '2025-01-28 05:07:55', 'open'),
(34, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:01:44', '2025-02-01 04:01:44', 'open'),
(35, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:03:49', '2025-02-01 04:03:49', 'open'),
(36, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:04:25', '2025-02-01 04:04:25', 'open'),
(37, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:07:10', '2025-02-01 04:07:10', 'open'),
(38, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:07:50', '2025-02-01 04:07:50', 'open'),
(39, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:10:21', '2025-02-01 04:10:21', 'open'),
(40, 220, 52, '2025-02-08 09:02:00', '', 'https://youtube.com/shorts/uIqm5W2BiTI?si', 'this is best interview', '2025-02-01 04:11:09', '2025-02-01 04:11:09', 'open'),
(41, 204, 113, '2025-02-02 18:59:00', '', 'Aaa.com', 'Aaa', '2025-02-02 15:59:15', '2025-02-02 15:59:15', 'open'),
(42, 204, 113, '2025-02-02 18:59:00', '', 'Aaa.com', 'Aaa', '2025-02-02 15:59:19', '2025-02-02 15:59:19', 'open'),
(43, 204, 112, '2025-02-21 06:34:00', 'Sargodha, Punjab, Pkistan', '', NULL, '2025-02-03 01:28:11', '2025-02-03 01:28:11', 'open'),
(44, 204, 112, '2025-02-21 06:34:00', 'Sargodha, Punjab, Pkistan', '', NULL, '2025-02-03 01:34:10', '2025-02-03 01:34:10', 'open'),
(45, 204, 112, '2025-02-21 06:34:00', 'Sargodha, Punjab, Pkistan', '', NULL, '2025-02-03 01:35:01', '2025-02-03 01:35:01', 'open'),
(46, 206, 52, '2025-02-04 16:57:00', '', '', 'Hi', '2025-02-03 13:57:45', '2025-02-03 13:57:45', 'open'),
(47, 211, 112, '2025-02-05 13:31:00', 'Is', '', 'Ok', '2025-02-05 10:31:31', '2025-02-05 10:31:31', 'open'),
(48, 211, 112, '2025-02-05 13:31:00', 'Is', '', 'Ok', '2025-02-05 10:31:40', '2025-02-05 10:31:40', 'open'),
(49, 211, 112, '2025-02-05 13:31:00', 'Is', '', 'Ok', '2025-02-05 10:31:46', '2025-02-05 10:31:46', 'open'),
(50, 216, 82, '2025-02-28 14:03:00', '', 'https://youtube.com/shorts/FNALlSJf', 'this is interview for you', '2025-02-06 08:56:12', '2025-02-06 08:57:00', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `last_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_of_vacancy` int NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diploma` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certification` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `company_id`, `title`, `slug`, `description`, `roles`, `category_id`, `position`, `specialization`, `department`, `address`, `country`, `city`, `featured`, `type`, `status`, `last_date`, `deleted_at`, `created_at`, `updated_at`, `number_of_vacancy`, `experience`, `gender`, `salary`, `education`, `diploma`, `certification`) VALUES
(203, '60', '105', 'QA Testing', 'qa-testing', 'Testing App Website Workflow Nero surgeon Specialist need for our hospital requ..', 'Testing App/Website Workflow', 4, 'QA', '', '', 'Valencia Town', '', '', 0, 'fulltime', 0, '2025-02-28', '2025-01-23 03:43:02', '2024-12-25 22:52:05', '2025-01-23 03:43:02', 3, '4', 'any', 'negotiable', '', '', ''),
(204, '60', '105', 'Nero surgeon Specialist', 'nero-surgeon-specialist', 'Nero surgeon Specialist need for our hospital required 5 year of experience in Nero surgeon', 'Nero surgeon Specialist', 1, '2', '', '', 'Jeddah Saudi Arabia', '', 'Riyadh', 0, 'fulltime', 0, '2025-02-20', NULL, '2025-01-10 06:33:33', '2025-02-06 12:14:19', 2, '5', 'any', '30000-500000', '', '', ''),
(205, '51', '105', 'surgen', 'surgen', '<p>hellosdbjshsbcjbjkcbjds</p>', 'this is very cruial roe', 14, 'professor surgen', '', '', 'Sargodha Pakistan', 'Saudi Arabia', 'Riyadh', 1, 'fulltime', 1, '2025-01-16', NULL, '2025-01-10 19:30:48', '2025-01-15 20:44:19', 2, '1', 'any', '2000-5000', '', '', ''),
(206, '73', '107', 'Orthopedic Doctor', 'orthopedic-doctor', 'Need Orthopedic Surgeon which performs Surgeries and give medical services related to Orthopedic.', 'Orthopedic Surgeon', 2, 'Surgeon', '', '', 'Valencia Town Lahore Pakistan', 'Saudi Arabia', 'Riyadh', 0, 'fulltime', 1, '2025-01-25', NULL, '2025-01-17 06:33:46', '2025-01-17 06:33:46', 2, '5', 'any', 'negotiable', '', '', ''),
(207, '73', '107', 'ortho', 'ortho', 'medical services', 'medical services', 1, 'Surgeon', '', '', 'Valencia Town', '', '', 0, 'fulltime', 0, '2025-01-25', NULL, '2025-01-17 06:38:31', '2025-01-17 06:38:31', 2, '4', 'any', 'negotiable', '', '', ''),
(208, '75', '108', 'software developer', 'software-developer', 'this is the best role that are assign the specific person  this is the best role that are assign the specific person this is the best role that are assign the specific person', 'this is the best role that are assign the specific person', 12, 'mid level developer', '', '', 'lahore', '', '', 0, 'partime', 0, '2025-01-29', NULL, '2025-01-21 11:16:33', '2025-01-21 11:16:33', 2, '1', 'any', 'negotiable', '', '', ''),
(209, '78', '109', 'Pediatric consultant', 'pediatric-consultant', 'Obtained a board certificate in pediatrics, consultant degree', 'Work in all children\'s departments as needed', 1, 'Pediatric consultant', '', '', 'KSA', '', '', 0, 'fulltime', 1, '2026-01-21', NULL, '2025-01-21 13:15:56', '2025-01-27 06:58:39', 3, '3', 'any', 'negotiable', '', '', ''),
(210, '78', '109', 'Pediatrician deputy doctor', 'pediatrician-deputy-doctor', 'Working in children\'s departments with shifts', 'Working in children\'s departments', 1, 'Pediatrician deputy doctor', '', '', 'KSA', '', '', 0, 'fulltime', 1, '2025-05-31', NULL, '2025-01-21 13:19:09', '2025-01-27 06:58:44', 2, '5', 'any', 'negotiable', '', '', ''),
(211, '78', '109', 'Neonatology Consultant', 'neonatology-consultant', 'Working in the neonatal intensive care unit and following up on patients in clinics', 'Working in the neonatal intensive care unit', 1, 'Neonatology Consultant', '', '', 'KSA', '', '', 0, 'fulltime', 1, '2027-01-21', NULL, '2025-01-21 13:21:30', '2025-01-27 06:58:47', 1, '2', 'any', 'negotiable', '', '', ''),
(212, '69', '105', 'Assistant Manager Pathology Laboratory', 'assistant-manager-pathology-laboratory', 'Fatima Memorial Hospital is seeking a dynamic and experienced individual for the role of Assistant Manager Pathology Laboratory.\r\n\r\nQualifications: BSc Medical Lab Technology, Masters in Hospital Administration or Masters in Business Administration.\r\nExperience: At Least three years in a management position in a reputed Lab.\r\nExpertise: Should have practical knowledge of inventory management systems, lab operations and management systems, quality assurance regulatory body standards, ISO lab standards. Having worked in a CAP or JCI environment would be a plus.\r\nSkills: Crisis management, people handling, communications, investigations and error analysis, improvement of lab services for QCI training.\r\n\"The selected candidate will be assisting in managing an Anatomical, and Clinical laboratory, in conjunction with senior lab management staff and consultants.\"', 'Managing an Anatomical, and Clinical laboratory, in conjunction with senior lab management staff and consultants.', 1, 'Assistant Manager Pathology Laboratory', '', '', 'Fatima Memorial Hospital Lahore', 'Saudi Arabia', 'Riyadh', 0, 'fulltime', 1, '2025-01-30', NULL, '2025-01-22 01:15:25', '2025-01-22 03:26:21', 2, '3', 'any', 'negotiable', '', '', ''),
(213, '69', '105', 'CT Scan Technician - Radiology', 'ct-scan-technician-radiology', 'Operate CT scanners and create a computer generated cross-sectional images of the patients according to departmental protocol.\r\nPosition the patient, select appropriate pre-define radiation exposure parameters and image the patient.\r\nProvide pre and post procedure instruction to Patients.\r\nPerform CT Procedures including Plain, HRCT, Contrast Enhanced Studies, Tri-phasic Studies, CT Angiography and assist in CT guided biopsies.\r\nMaintain safe and clean working environment by complying with procedures, rules, and regulations.\r\nEnsure safe patient handling.\r\nEnsure proper storage and adequate quantity of material surgical supplies for day to day procedures.\r\nRecognize and resolve equipment problems and discrepancies, anticipate patient needs and concerns, and determine the appropriate care needed.\r\nMaintain accurate patient record as per documentation Guidelines for records and record keeping.\r\nStore, administer and order Contrasts/ other drugs according to Hospital Policy for the Administration of Medicines.\r\nNotify/report incidents related to patients, staff, visitors and any untoward occurrences in a timely manner.\r\nFollow and comply with Infection control protocol and guidelines for better patient outcomes.\r\nEnsure proper handling of systems and equipment’s and take the responsibility of department fixed assets and inventory.\r\nMaintain confidentiality of information regarding patients and families at all the times.\r\nFollow infection control and safety guidelines\r\nProvide training to other staff regarding post procedure care.\r\nAdhere at all times to Hospital Code of Conduct.', 'Operate CT scanners and create a computer generated cross-sectional images of the patients according to departmental protocol.', 1, 'CT Scan Technician', '', '', 'Jinnah Hospital Karachi', 'United Arab Emirates', 'Dubai', 0, 'fulltime', 1, '2025-02-05', NULL, '2025-01-22 01:31:58', '2025-02-06 05:35:22', 2, '2', 'any', 'negotiable', '', '', ''),
(214, '69', '105', 'Staff Nurse - Nursing Services', 'staff-nurse-nursing-services', 'Responsible to handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc.\r\nResponsible to provide direct patient care throughout the shift and in a calm, courteous and tactful manner.\r\nResponsible to assure quality of care by adhering to therapeutic standards; measuring health outcomes against patient care goals and standards; making or recommending necessary adjustments.\r\nResponsible to resolve patient problems and needs by utilizing multi-disciplinary team strategies.\r\nResponsible to prepare medication requisitions and administrate medication.\r\nResponsible to maintain safe and clean working environment by complying with procedures, rules, and regulations.\r\nResponsible to protect patients and employees by adhering to infection-control policies & protocols, medication administration and storage procedures, and controlled substance regulations.\r\nResponsible to facilitate doctors / consultants on their rounds in the unit / ward and records instructions.\r\nResponsible to assist doctors with any procedure they may need to perform. Prepares patient physically and emotionally for these procedures and ensures the availability of all necessary equipment.\r\nResponsible to maintain accurate and complete documentation of nursing care and to use correct charting techniques as per Standards Operating Procedures (SOPs).\r\nResponsible to carry out the doctors’ orders as prescribed, questions any concern with prescribed treatment.\r\nResponsible to ensure the unit/ward medical supply requirements are well stocked, properly stored and are readily available.\r\nResponsible to check and record blood sugar.\r\nResponsible to draw blood and perform other lab procedures on patients.\r\nResponsible to check and record vital signs, particularly of pre-operative and post-operative patients.\r\nResponsible to notify/report incidents related to patients, staff, visitors and any untoward occurrences in a timely manner.\r\nResponsible to supervise Nurse Aids, Student Nurses, etc.\r\nResponsible to perform delegated patient & non-patient related tasks as directed by the Ward incharge, Nursing Coordinator.\r\nResponsible to perform any other duties as assigned by the Supervisor/Head of the Department.', 'Responsible to handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc.', 1, 'Staff Nurse', '', '', 'Jinnah Hospital Lahore', 'United Arab Emirates', 'Dubai', 0, 'fulltime', 1, '2025-02-20', NULL, '2025-01-22 01:41:49', '2025-01-22 03:26:33', 5, '1', 'any', 'negotiable', '', '', ''),
(215, '69', '105', 'Pharmacist - Pharmacy', 'pharmacist-pharmacy', 'Supervise and assist in patient Pharmacy Services inventory management; collect information required for interventions.\r\nReview, monitor and control drug profile and Computerized Physician’s Order Entry (CPOE) of all patient receiving medications at all primary care sites. Contact physicians in case of in-accuracy of order / non availability of medicine or alternative.\r\nParticipate in Antibiotic stewardship round to explore the role of Pharmacist towards patient care.\r\nMonitor high alert medication dispensation and provide all related precautions and information for proper administration. \r\nDocument all interventions on the system, and present all relevant issues to Manager, Pharmacy Services daily.\r\nCompile and prepare presentations on Effective Interventions monthly.  \r\nDevelop strong communication between the Pharmacies and physicians at primary care sites.\r\nIdentify and correct HMIS related problems (in coordination with HI), and provide summary reports to Manager Pharmacy.\r\nReview and monitor stock of all crash trolley medicines and present monthly reports to Manager, Pharmacy Services.  \r\nProvide current and accurate drug information to health care professionals. Drug information would include a thorough understanding of new medications, and suitable formulary agents for use in specific therapies.\r\nRecord drug information data and prepare graphical reports of monthly drug information, provided by the Pharmacy department. \r\nProvide technical and administrative support to Pharmacists, Pharmacy Technicians and training to the interns.\r\nProvide counseling to the Doctors, staff, patients and their families for the safe use of drugs.\r\nArrange Continuing Medical Education (CME) programs for Pharmacists, Interns, Technicians, Nurses and other paramedical staff regarding rational use of drugs.\r\nMonitor and record all non formulary drugs arranged for inpatients.', 'Supervise and assist in patient Pharmacy Services inventory management; collect information required for interventions.', 2, 'Pharmacist', '', '', 'DHQ Hospital Karachi', 'United Arab Emirates', 'Dubai', 0, 'fulltime', 1, '2025-02-10', NULL, '2025-01-22 02:39:56', '2025-01-22 03:26:38', 2, '2', 'any', 'negotiable', '', '', ''),
(216, '60', '105', 'Ultrasound/ X-Ray Technologist - Baluchistan Based - Reko Diq - Nok Kundi (Balochistan)', 'ultrasound-x-ray-technologist-baluchistan-based-reko-diq-nok-kundi-balochistan', 'Responsible to perform all requested Ultrasound examinations as ordered by the attending physician\r\nResponsible to prepares preliminary reports and contacts referring physicians when required, according to established procedures.\r\nResponsible to coordinates with other staff to assure appropriate patient care is provided.\r\nResponsible to address problems of patient care as they arise and makes decisions to appropriately resolve the problems.\r\nResponsible to Organizes daily work schedule and performs related clerical duties as required.\r\nResponsible to Assumes responsibility for the safety and well-being of all patients in the Radiology area.\r\nResponsible to Reports equipment failures to the appropriate supervisor or staff member.\r\nResponsible to Uses independent judgment during the patient exam to accurately differentiate between normal and pathologic findings.\r\nResponsible to Coordinates work schedule with Departmental Director and/or scheduling desk to assure workload coverage.\r\nResponsible to Assumes responsibility for the safety, mental and physical comfort of patients.\r\nResponsible to perform any other task as assigned by the Supervisor/Head of the Department.', 'Responsible to perform all requested Ultrasound/X-Ray examinations as ordered by the attending physician', 2, 'Ultrasound/ X-Ray Technologist', '', '', 'Reko Diq - Nok Kundi', 'United Arab Emirates', 'Dubai', 0, 'fulltime', 1, '2025-02-25', NULL, '2025-01-22 02:44:12', '2025-01-22 03:26:42', 2, '02', 'any', 'negotiable', '', '', ''),
(217, '69', '105', 'Aesthetic Physician', 'Aesthetic Physician', 'Cutera Aesthetics is an innovative startup in the expanding world of Medical aesthetics. Simply put, our aim is to give people greater self-confidence through better skin. Whether we’re getting rid of unwanted facial hair, contouring Face or Body, reducing pigmentation, treating acne or reducing the signs of ageing, we change lives every day and it’s something we’re extremely passionate about. We perform both Non-invasive & Minimally-invasive aesthetic procedures.\r\n\r\nCutera Aesthetics offer Market competitive Salary + Bonus + Incentives + Staff discounts.\r\n\r\nWe are now recruiting Full or Part time Profiles to join our team in Lahore. You will be responsible for counselling clients, advising them on suitable treatments and products and carrying out a range of advanced treatments.\r\n\r\nExperience, Qualifications and Personal Qualities.\r\n• Interest should be in Aesthetics.\r\n• Should have an expereience in aesthetics or dermatology.\r\n• Team player, with a positive, can-do attitude.\r\n• Passionate about giving great customer service, every time, no matter what.\r\n• Experience in working to sales targets and be happy to get involved with promotional activity.', 'Counselling clients, advising them on suitable treatments and products and carrying out a range of advanced treatments.', 1, 'Aesthetic Physician', '', '', 'Lahore', 'United Arab Emirates', 'Dubai', 0, 'fulltime', 1, '2025-01-30', NULL, '2025-01-22 01:15:25', '2025-01-22 03:26:46', 2, '3', 'any', 'negotiable', '', '', ''),
(218, '69', '105', 'Medical Doctor', 'Medical Doctor', 'We are seeking experienced, innovative, and proactive Medical Doctors with excellent written and verbal English communication skills to lead our integrated care services, including Chronic Care Management (CCM), Remote Patient Monitoring (RPM), and Remote Therapeutic Monitoring (RTM). Additionally, collaborate with medical centers in USA on joint initiatives (co-locating services/sharing facilities) and explore and apply for grants, contracts, and funding opportunities (federal, state, and private) for healthcare programs. As a key member of our team, you will play a pivotal role in enhancing patient outcomes, promoting preventive care, and ensuring seamless coordination between patients and healthcare providers.\r\n\r\n\r\nRemote Patient Monitoring (RPM):\r\n• Implement and oversee RPM programs for eligible patients.\r\n• Utilize telehealth platforms and wearable devices to remotely monitor vital signs (e.g., blood pressure, glucose levels, heart rate).\r\n• Interpret data and proactively intervene when necessary.\r\n• Communicate findings to patients and adjust care plans as needed.\r\n\r\nRemote Therapeutic Monitoring (RTM):\r\n• Provide RTM services to patients with established treatment plans.\r\n• Monitor therapeutic interventions remotely, ensuring adherence and effectiveness.\r\n• Collaborate with the care team to optimize patient outcomes.\r\n\r\nOverall Patient Relationship and Care Management:\r\n• Build strong patient-provider relationships.\r\n• Empower patients to actively participate in their health management.\r\n• Conduct regular virtual visits to assess patient well-being.\r\n• Maintain accurate records in electronic health records (EHR) systems.\r\n• Collaborate with nurses, care coordinators, and other healthcare professionals.\r\n• Communicate with patients via direct messaging, and online portal to discuss patient’s overall health and wellness.\r\n• Recognize situations that require the immediate attention of a provider and initiate escalation procedures when necessary.\r\n\r\nCollaboration with Medical Centers:\r\n• Evaluate the healthcare needs of the community and identify gaps in existing services and areas where additional medical care is required.\r\n• Establish partnerships with local hospitals, clinics, and specialty centers.\r\n• Collaborate on joint initiatives, share resources, and create referral networks.\r\n• Explore opportunities for co-locating services or sharing facilities.\r\n\r\nBenefits:\r\n• Competitive salary and benefits package (Base and Variable Pay).\r\n• Incentive bonuses based on milestones achievements.\r\n• Opportunities for professional growth and leadership.\r\n• Impactful work that improves patient well-being.\r\n• Collaborative and supportive team environment.\r\n\r\nJob Type: Full-time\r\n\r\nApplication Question(s):\r\n• Have you completed the following level of education: Doctor of Medicine?\r\n• Are you able to work onsite in Lahore, Pakistan for any of the following evening/night shift options: 3 PM - 12 AM or 5 PM - 2 AM or 7 PM - 4 AM?\r\n• On a scale of 1 (Least) to 10 (Most), how proficient are you with electronic health records (EHR) systems?\r\n• Do you have experience with telehealth care, Chronic Care Management (CCM), Remote Patient Monitoring (RPM), or Remote Therapeutic Monitoring (RTM)?\r\n• What are your salary requirements?', 'Patient Acquisition and Outreach:\r\n• Collaborate with other clinics and healthcare facilities to explore outsourcing opportunities for CCM, RPM, and RTM services.\r\n• Build strong relationships with primary care physicians, specialists, and clinic administrators.\r\n• Educate potential partner clinics about the benefits of our integrated care services for their patients.\r\n\r\nChronic Care Management (CCM):\r\n• Call patients to discuss their overall health and wellness and document those interactions for provider awareness.\r\n• Provide comprehensive care coordination for patients with multiple chronic conditions.\r\n• Collaborate with primary care physicians and specialists to optimize treatment plans.\r\n• Educate patients about their conditions, medications, and lifestyle modifications.\r\n• Monitor patient progress and address any barriers to adherence.', 1, 'Medical Doctor', '', '', 'DHA Phase 8, Lahore', '', 'Dubai', 0, 'fulltime', 1, '2025-02-14', NULL, '2025-01-22 01:31:58', '2025-02-03 14:01:16', 2, '2', 'any', 'negotiable', '', '', ''),
(219, '69', '105', 'Female MBBS Doctor with valid Licensed - Share Basis Opportunity', 'female-mbbs-doctor', 'We are seeking a licensed MBBS doctor to join our practice on a share basis. This opportunity is ideal for a dedicated and compassionate medical professional looking to provide quality healthcare while benefiting from a revenue-sharing model.\r\n\r\nRequirements:\r\n• MBBS degree from a recognized institution.\r\n• Valid medical license to practice.\r\n• Excellent clinical and diagnostic skills.\r\n• Strong communication and interpersonal skills.\r\n• Commitment to maintaining patient confidentiality and providing quality care.\r\n\r\nBenefits:\r\n• Flexible working hours.\r\n• Revenue-sharing model based on patient consultations and treatments.\r\n• Opportunity to grow your practice within an established setup.\r\n• Access to clinic infrastructure and administrative support.\r\n', 'Key Responsibilities:\r\n• Provide general medical consultations and treatment to patients.\r\n• Diagnose and manage acute and chronic illnesses.\r\n• Maintain accurate patient records and medical histories.\r\n• Ensure compliance with healthcare regulations and ethical standards.\r\n• Collaborate with a team to enhance patient care and clinic operations.', 1, 'MBBS Doctor', '', '', 'Mednic Clinic & Pharmacy Lahore', '', '', 0, 'fulltime', 1, '2025-02-20', '2025-02-06 05:34:21', '2025-01-22 01:41:49', '2025-02-06 05:34:21', 5, '5', 'female', 'negotiable', '', '', ''),
(220, '69', '105', 'General Physician ( Female)', 'general-physician', 'A Poly Clinic required Qualified General Physician Female for evening time in Sheikhupura city 5 PM to 8 PM.\r\n\r\nFresh MO are encouraged to apply.', 'Qualified General Physician Female for evening time', 2, 'General Physician', '', '', 'Lahore', '', '', 0, 'partime', 1, '2025-02-10', NULL, '2025-01-22 02:39:56', '2025-01-22 03:27:13', 2, '2', 'female', 'negotiable', '', '', ''),
(221, '60', '105', 'MBBS Doctor ( Faisalabad )', 'mbbs-doctor', 'Healthwire is on a mission to use technology to improve healthcare outcomes and impact the lives of millions of Pakistanis. We are the fastest growing healthcare app, digitizing the back-end offices of doctors to bring patient data online and fulfill all healthcare needs of patients throughout their healthcare journey. We are seeking an experienced and result-oriented Medical Officer to join us in our hyper-growth trajectory.\r\n\r\nResponsibilities\r\n\r\nProvide expert advice to customers on the selection and proper use of medications, supplements, and healthcare products.\r\nAccurately dispense prescription medications, verifying dosages, instructions, and drug interactions while adhering to legal and ethical standards.\r\nOffer health and wellness counseling, including information on lifestyle modifications, diet, and exercise, to promote overall health.\r\nEducate customers about the importance of medication adherence and provide strategies to help them manage their medications effectively.\r\nMaintain confidential and accurate records of customer medications and interactions, ensuring compliance with legal and regulatory requirements.\r\nPrescribe appropriate medications, therapies, and treatments and monitor patient response, adjusting treatment plans as necessary.\r\n\r\nQualifications\r\n\r\nDoctor of Medicine or equivalent medical degree from an accredited institution.\r\nValid medical license in the relevant jurisdiction.\r\nStrong clinical skills, including diagnosis, treatment, and patient care.\r\nExcellent communication and interpersonal skills.', 'Provide expert advice to customers on the selection and proper use of medications, supplements, and healthcare products.', 2, 'MBBS Doctor', '', '', 'Kotwali road, Faisalabad.', '', '', 0, 'partime', 1, '2025-02-25', NULL, '2025-01-22 02:44:12', '2025-01-22 03:27:19', 2, '02', 'any', 'negotiable', '', '', ''),
(222, '97', '110', 'Surgery doctor', 'surgery-doctor', 'Pediatric Surgery, Inpatient, Operations and Clinics Department', 'Pediatric surgery', 1, 'Surgery doctor', '', '', 'KSA HF', '', '', 0, 'fulltime', 1, '2026-02-14', NULL, '2025-01-28 07:17:58', '2025-01-28 10:23:16', 4, '4', 'any', '30000-500000', '', '', ''),
(223, '108', '111', 'Orthopedic consultant', 'orthopedic-consultant', 'Working in orthopedic departments العمليات', 'Working in orthopedic departments', 1, 'Orthopedic consultant', '', '', 'DALA', '', '', 0, 'fulltime', 0, '2027-02-03', NULL, '2025-01-29 10:51:51', '2025-01-29 10:51:51', 7, '6', 'any', 'negotiable', '', '', ''),
(224, '108', '111', 'Pediatric orthopedic consultant', 'pediatric-orthopedic-consultant', 'Follow-up cases of children’s orthopedic operations and hospitalization', 'Follow up on children\'s orthopedic cases', 1, 'Pediatric orthopedic consultant', '', '', 'DALA', '', '', 0, 'fulltime', 0, '2025-11-19', NULL, '2025-01-29 11:01:12', '2025-01-29 11:01:12', 1, '4', 'any', 'negotiable', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_user`
--

CREATE TABLE `job_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `referred_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_user`
--

INSERT INTO `job_user` (`id`, `user_id`, `job_id`, `referred_by`, `created_at`, `updated_at`) VALUES
(6, 54, 203, 64, NULL, NULL),
(7, 52, 206, NULL, '2025-01-17 12:30:39', '2025-01-17 12:30:39'),
(8, 82, 216, 60, NULL, NULL),
(9, 52, 208, NULL, '2025-01-23 17:34:38', NULL),
(10, 54, 204, 60, NULL, NULL),
(11, 79, 205, 60, NULL, NULL),
(12, 86, 212, 60, NULL, NULL),
(13, 85, 213, 60, NULL, NULL),
(14, 79, 206, NULL, '2025-01-23 14:04:14', '2025-01-23 14:04:14'),
(15, 52, 218, NULL, '2025-01-25 04:18:51', '2025-01-25 04:18:51'),
(16, 86, 205, 61, NULL, NULL),
(17, 96, 221, NULL, '2025-01-27 13:59:24', '2025-01-27 13:59:24'),
(18, 106, 204, NULL, '2025-01-28 08:57:54', '2025-01-28 08:57:54'),
(19, 106, 222, 98, NULL, NULL),
(20, 68, 222, 98, NULL, NULL),
(21, 54, 222, 102, NULL, NULL),
(22, 111, 204, NULL, '2025-01-29 13:03:43', '2025-01-29 13:03:43'),
(23, 112, 211, NULL, '2025-01-31 09:40:02', '2025-01-31 09:40:02'),
(24, 112, 205, NULL, '2025-01-31 12:19:33', '2025-01-31 12:19:33'),
(25, 112, 204, 69, NULL, NULL),
(26, 52, 220, NULL, '2025-02-01 03:59:27', '2025-02-01 03:59:27'),
(27, 113, 206, NULL, '2025-02-02 15:50:06', '2025-02-02 15:50:06'),
(28, 113, 204, NULL, '2025-02-02 15:54:58', '2025-02-02 15:54:58'),
(29, 112, 213, NULL, '2025-02-03 13:44:58', '2025-02-03 13:44:58'),
(30, 95, 204, 62, NULL, NULL),
(31, 79, 204, 69, NULL, NULL),
(32, 84, 204, 60, NULL, NULL),
(33, 82, 204, 64, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_17_185333_create_profiles_table', 1),
(7, '2023_08_17_185404_create_companies_table', 1),
(8, '2023_08_17_185453_create_categories_table', 1),
(9, '2023_08_17_185703_create_jobs_table', 1),
(10, '2023_08_17_185852_create_job_user_table', 1),
(11, '2023_08_17_185951_create_favorites_table', 1),
(12, '2023_08_24_110136_add_column_to_jobs', 1),
(13, '2023_08_26_091819_create_roles_table', 1),
(14, '2023_08_26_091900_create_role_user_table', 1),
(15, '2023_08_28_133322_create_posts_table', 1),
(16, '2023_08_30_134159_create_testimonials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `notification_from` bigint UNSIGNED DEFAULT NULL,
  `notification_to` bigint UNSIGNED DEFAULT NULL,
  `notification` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `notification_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `seen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '''0''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `post_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `post_thumbnail`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ut consequatur minus molestias magni unde.', 'ut-consequatur-minus-molestias-magni-unde', 1, 'uploads/posts.jpg', 'Quia sed doloribus aliquid omnis. Sunt alias eaque qui ut maxime dolore sint. Non quis quia accusantium sapiente quas autem. Error blanditiis est aut facere asperiores sequi voluptatem animi. Blanditiis quo est sed consectetur nihil qui. Hic et et ratione sapiente et aut facilis. Iure quisquam sequi qui voluptatem.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:58:04'),
(2, 'Expedita error laborum tempore ab aut.', 'expedita-error-laborum-tempore-ab-aut', 1, 'uploads/posts.jpg', 'Qui molestias quis aut itaque aut nobis est. Distinctio dolorem est maxime deserunt illum quaerat libero. Ducimus minima blanditiis id dicta repellendus.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(3, 'Vero itaque omnis dolores repellat.', 'vero-itaque-omnis-dolores-repellat', 2, 'uploads/posts.jpg', 'Aspernatur neque iure et quis perferendis. Rerum et qui minima sit minima. Libero est perferendis amet voluptatem. Commodi expedita dolorem ut eaque consequatur. Est neque non ut odit. Rem est sint et. Voluptatem laboriosam asperiores ut esse et est. Qui dolores dolorem ex aut doloribus dignissimos. Dolorem illo nobis mollitia aut et. Repellat nemo corporis qui facere. Molestiae est omnis est ea est laborum rem.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(4, 'Molestiae nam id sit ea possimus et laboriosam.', 'molestiae-nam-id-sit-ea-possimus-et-laboriosam', 1, 'uploads/posts.jpg', 'Pariatur odio facilis odit vel deserunt amet tenetur. Et asperiores voluptate qui odio quas. Et in officia maiores at et ducimus quisquam eveniet. Aperiam quisquam voluptatum perferendis magnam velit blanditiis praesentium esse. Quasi rerum quas laudantium. Voluptas velit quae sapiente est. Eaque voluptate quo quo ut. Aut id aut quia ut quis voluptates totam. Nisi aut sed maxime delectus. Quae praesentium eveniet cumque dolore vel sit animi. Ratione enim corrupti incidunt voluptatem sit. Veritatis dolorum et dolorem quas. Cupiditate enim magni voluptatibus. Placeat velit quis eum.', '1', NULL, '2024-12-19 04:30:51', '2025-01-05 12:10:20'),
(5, 'Et ab fugit iste aut quidem fugit.', 'et-ab-fugit-iste-aut-quidem-fugit', 5, 'uploads/posts.jpg', 'Quia dolores nisi facilis. Nemo qui autem rerum accusamus tenetur. Sint iste blanditiis nesciunt odio. Corporis ut consequatur totam vel voluptas voluptas asperiores. Aut laudantium enim eligendi corrupti consequuntur eius. Cumque vitae rerum aut vel earum.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(6, 'Aut temporibus commodi ea similique.', 'aut-temporibus-commodi-ea-similique', 4, 'uploads/posts.jpg', 'Reprehenderit est voluptas veniam non aspernatur omnis sunt. Est culpa ea architecto incidunt.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(7, 'Et culpa adipisci ut sed molestias.', 'et-culpa-adipisci-ut-sed-molestias', 3, 'uploads/posts.jpg', 'Nam nihil qui debitis rerum. Non cum qui dicta animi. Nam perspiciatis necessitatibus quod totam ex in architecto molestiae. Dignissimos aut vel non non alias vel voluptatem. Recusandae et sed voluptatem impedit qui quidem. Rerum cupiditate illum a ipsum sed. Itaque modi aliquid quod quia. Possimus reiciendis quidem occaecati mollitia. Quidem sunt quaerat eius est velit voluptatem a. Voluptatem qui incidunt quae libero aut explicabo quibusdam. Modi perferendis eius velit id dolorem at architecto. Quidem minus beatae ut. Voluptas dignissimos minus debitis iure aliquam aut nesciunt fuga.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(8, 'Exercitationem ipsum debitis non debitis.', 'exercitationem-ipsum-debitis-non-debitis', 4, 'uploads/posts.jpg', 'Ea deleniti labore incidunt quo libero non recusandae. Sit error sint voluptas non quia sint voluptas nobis. Consequuntur reiciendis quos quam et. Vel et corporis eius molestiae quasi accusamus. Et possimus a possimus quisquam et. Porro quia in alias omnis inventore quod nulla.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(9, 'Consectetur autem aut tenetur voluptatem id.', 'consectetur-autem-aut-tenetur-voluptatem-id', 5, 'uploads/posts.jpg', 'Inventore in maiores est et in. Aspernatur quisquam quae deleniti similique quia nam. Culpa aliquid rerum aliquid omnis. Optio occaecati aut ratione. Consequatur neque fugit eos est. Ullam natus autem neque aliquid. Nulla itaque laudantium nulla nesciunt ex qui.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(10, 'Molestiae eligendi velit non unde.', 'molestiae-eligendi-velit-non-unde', 1, 'uploads/posts.jpg', 'Eveniet reprehenderit quod rerum nulla. Deserunt mollitia ut perspiciatis doloremque commodi impedit sint. Laborum cupiditate rem voluptates vero magnam omnis. Totam neque nulla ut eos ea sit. Praesentium minima molestias corrupti architecto ea tenetur minima. Distinctio amet occaecati debitis omnis totam. Molestiae id quas dolorum porro illo. Quis assumenda quia animi omnis. Aperiam enim vel hic id. Consequatur similique quia aut mollitia accusamus reiciendis. Libero voluptatem perspiciatis pariatur unde voluptas. Et et et velit. Harum molestiae libero quaerat sint.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(11, 'Sunt voluptate facilis alias qui et velit.', 'sunt-voluptate-facilis-alias-qui-et-velit', 3, 'uploads/posts.jpg', 'Saepe quas voluptatibus velit ratione dolor consequatur natus cupiditate. Cupiditate officia eos enim eius fuga laborum tempora tempore. Iure adipisci accusamus expedita ut.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(12, 'Nihil alias consequuntur nostrum ullam aut.', 'nihil-alias-consequuntur-nostrum-ullam-aut', 4, 'uploads/posts.jpg', 'Odit ut voluptates ipsum. Consequuntur vel cupiditate sunt eum. Ad dolorem placeat reprehenderit modi ipsum fuga. Nobis omnis consequuntur nulla quas et voluptas et. Id corrupti dolores facere aut. Nihil repellendus qui velit. Iure molestiae nihil ab earum necessitatibus. Reprehenderit ex ipsam omnis soluta labore laboriosam. Qui pariatur dolore tempore natus. Dolor distinctio et dolor quibusdam. Voluptatem facilis ipsam in possimus soluta velit modi alias.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(13, 'Quae error earum qui dolorem qui omnis in.', 'quae-error-earum-qui-dolorem-qui-omnis-in', 3, 'uploads/posts.jpg', 'Ab qui impedit necessitatibus enim natus quia. Autem rerum eveniet qui et qui veniam numquam. Atque quae illum fugit in. Molestias velit molestiae officia dolorum deserunt eius minus in. Aut aut et culpa sed excepturi aliquid recusandae.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(14, 'Aut dolores quae culpa.', 'aut-dolores-quae-culpa', 3, 'uploads/posts.jpg', 'Recusandae quod aut expedita. Aut quod est explicabo qui blanditiis rem. Omnis reprehenderit doloremque temporibus doloribus fuga. Qui quas illum iste.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(15, 'Laboriosam numquam a fugiat aut iste ut.', 'laboriosam-numquam-a-fugiat-aut-iste-ut', 2, 'uploads/posts.jpg', 'Sunt itaque maiores suscipit aut velit rerum. Ab voluptas aut laboriosam. Repellendus praesentium repellat velit beatae amet. Rerum nulla et soluta modi id numquam. Sit cupiditate odio non odit. Accusamus voluptatem eum in est vero cumque nihil modi.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(16, 'Amet provident modi vel neque.', 'amet-provident-modi-vel-neque', 5, 'uploads/posts.jpg', 'Quia odit magnam nesciunt enim libero quidem. Cumque culpa et doloremque. Fuga dignissimos excepturi dolore inventore. Enim omnis ut mollitia quia. Ea quidem iste rerum sunt et temporibus.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(17, 'Qui placeat velit ut ex soluta rerum.', 'qui-placeat-velit-ut-ex-soluta-rerum', 1, 'uploads/posts.jpg', 'Quod ipsa et numquam et ex aut. Odit magni et qui animi totam aut ducimus. Eum qui ipsa at laudantium quia mollitia dignissimos. Et sit ipsam quas minus. Sequi iste quod omnis autem. Exercitationem ducimus consequatur error dolore quia totam quia. Est quas suscipit quia occaecati nulla eum sunt. Tenetur eos rem consequatur est qui occaecati. Nemo sit architecto quam corporis hic voluptatem.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(18, 'Ex dolorem nam eum non quisquam cum ullam.', 'ex-dolorem-nam-eum-non-quisquam-cum-ullam', 2, 'uploads/posts.jpg', 'Magni voluptates quia architecto rerum. Dolorem voluptas odit facilis tempore. Facilis sint blanditiis assumenda odit eaque. Temporibus ut odio officiis eius numquam deserunt inventore aut. Tempora atque id soluta sed. Esse iusto dolorum rerum facere eum natus fuga. At id libero necessitatibus et praesentium iure ea. Nesciunt non saepe in aspernatur ea. Dicta in eius harum. Ipsa aperiam libero culpa quibusdam omnis veniam. Dolores perferendis numquam eaque voluptas culpa temporibus. Corrupti asperiores tenetur natus amet consequatur totam vel.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(19, 'Sed minus explicabo sed vero.', 'sed-minus-explicabo-sed-vero', 1, 'uploads/posts.jpg', 'Adipisci odit eveniet eius quia hic. Consequatur culpa consequatur quia enim temporibus. Totam similique nemo sunt suscipit dolor non quos. Sunt ut sed reiciendis in sit tenetur minus. Ea qui voluptas est qui reiciendis iusto maiores.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(20, 'Sequi autem reprehenderit est animi.', 'sequi-autem-reprehenderit-est-animi', 4, 'uploads/posts.jpg', 'Laborum autem expedita commodi alias. Deleniti unde excepturi provident velit labore. Aut perferendis consequatur error deleniti laboriosam laborum rerum. Odio magni corporis sunt qui earum. Amet inventore maxime amet earum ut aut. Velit eaque ut fugit animi modi impedit dignissimos et. Rem sed non et.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(21, 'In distinctio eligendi eius rerum incidunt.', 'in-distinctio-eligendi-eius-rerum-incidunt', 2, 'uploads/posts.jpg', 'Qui doloribus voluptatibus minus est occaecati corporis ea. Quia perferendis cumque quo quis laborum ut. Modi rerum possimus eos et adipisci. Corrupti et repudiandae ipsam autem atque. Pariatur laudantium in ut adipisci. Voluptatem quia excepturi sint magnam exercitationem.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(22, 'Alias dolores maxime nesciunt.', 'alias-dolores-maxime-nesciunt', 1, 'uploads/posts.jpg', 'Quam voluptatum ab eos dolores. Praesentium id officia ea dolorum animi. Illum saepe est sint. Enim quod quas ut qui ut quidem vel atque. Quaerat omnis magnam ipsa velit. Consequatur mollitia numquam vero est sed.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(23, 'Dolorem rerum sapiente laboriosam esse id et.', 'dolorem-rerum-sapiente-laboriosam-esse-id-et', 1, 'uploads/posts.jpg', 'Nobis possimus debitis est perferendis fugit. Iure veniam et ut voluptatem ea quod at. Iure velit aut ex molestias molestias. Doloribus et saepe dolor repellendus sint. Architecto aut dolorum ipsam laboriosam ea dolores. Ex impedit nobis eos ut quos. Nihil dolorem reprehenderit non est corporis voluptatem qui.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(24, 'Nihil iste accusantium nulla aperiam vero.', 'nihil-iste-accusantium-nulla-aperiam-vero', 2, 'uploads/posts.jpg', 'Pariatur quidem eum odit velit qui architecto voluptas. Illum cumque quisquam sit voluptatum voluptas ipsa hic. Vero qui ducimus molestias odit repellat omnis. Libero deleniti itaque mollitia iste ad. Dolor est eius soluta est adipisci. Et molestiae qui consequuntur delectus dolorem eveniet qui quae. Sunt voluptates consequatur nihil reprehenderit voluptate. Perferendis fugit voluptatem sit qui accusamus sunt molestiae.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(25, 'Ut illo fugiat amet.', 'ut-illo-fugiat-amet', 1, 'uploads/posts.jpg', 'Ea beatae incidunt debitis voluptate et iste. Enim et enim repudiandae et quia et. Nesciunt natus sed minus omnis corrupti distinctio praesentium id.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(26, 'Quis placeat ullam assumenda et.', 'quis-placeat-ullam-assumenda-et', 3, 'uploads/posts.jpg', 'Dolorem laudantium illum recusandae voluptate voluptates. Minima et qui autem quos rerum voluptas. Vel quo ratione harum ut quis atque voluptatem. Veritatis molestiae illo sit rem nesciunt aspernatur repudiandae.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(27, 'Ullam accusamus id nisi delectus.', 'ullam-accusamus-id-nisi-delectus', 5, 'uploads/posts.jpg', 'Dolores sapiente assumenda et error. Similique reiciendis consectetur sed illum. Consequatur corporis consequatur hic consequuntur. Esse hic et omnis quaerat distinctio sapiente quia facere. Laborum totam non dolores est quia tempora quaerat.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(28, 'Sunt magnam doloribus laboriosam velit.', 'sunt-magnam-doloribus-laboriosam-velit', 4, 'uploads/posts.jpg', 'Delectus qui eum quasi et ut aperiam. Iusto officia numquam saepe ab molestiae vel. In qui veniam nemo eos. Unde temporibus veritatis et sint quis. Sit ea autem unde consectetur sit voluptates eaque. Sit occaecati quo et dolores necessitatibus laboriosam ratione repudiandae. Voluptatibus ab sunt aut a suscipit odit necessitatibus. Provident ab consectetur suscipit enim iure. Alias exercitationem quae quae impedit in nisi neque. Consequatur et voluptas odit. Dolores ducimus rerum recusandae rerum nihil officia non.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(29, 'Id et beatae at id rem rerum.', 'id-et-beatae-at-id-rem-rerum', 5, 'uploads/posts.jpg', 'Nam aut sapiente accusantium minus. Consequatur ut voluptatem sed eveniet et totam libero dolores. Dolorum expedita odit numquam aliquid ut aut sit. Commodi alias mollitia molestiae placeat.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(30, 'Qui ex vel in incidunt nihil.', 'qui-ex-vel-in-incidunt-nihil', 2, 'uploads/posts.jpg', 'Corrupti consequatur voluptatem placeat. Doloremque deserunt rerum dolore ut iusto exercitationem sapiente magni.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(31, 'Maxime minima iusto dolore sit.', 'maxime-minima-iusto-dolore-sit', 2, 'uploads/posts.jpg', 'Cumque occaecati eligendi nam dignissimos ullam explicabo. Dolorum nostrum quas cum sit rerum quia omnis. Laudantium amet eveniet quia. Saepe est mollitia officiis aliquam expedita inventore et. Porro quae rerum voluptate et placeat illum. Sit delectus magnam nihil perspiciatis rerum aperiam. Repellat tempore incidunt praesentium sed repellendus saepe hic.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(32, 'Sed rerum expedita reiciendis consequatur ea.', 'sed-rerum-expedita-reiciendis-consequatur-ea', 2, 'uploads/posts.jpg', 'Sit mollitia vel sed fuga. Quibusdam porro ea accusantium expedita ipsa sunt. Totam error dolorem dolore exercitationem repudiandae delectus. Exercitationem qui ex et repellat. Alias rem molestiae quisquam sed quisquam quis facere.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(33, 'Inventore et facere sunt.', 'inventore-et-facere-sunt', 5, 'uploads/posts.jpg', 'Aperiam accusamus omnis molestias aliquid. Aut molestiae molestiae nisi voluptas. Neque perferendis labore quia voluptatem doloremque. Rem neque nemo totam laboriosam qui assumenda velit nemo. Nesciunt voluptatibus ea rerum eos deleniti. Sapiente suscipit voluptatum voluptatem eligendi beatae unde ut inventore. Qui est omnis velit consequatur velit incidunt porro. Non qui consequatur et et eum harum. Perspiciatis molestiae provident quae dolorum sit itaque consectetur maiores.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(34, 'Iusto pariatur laboriosam est incidunt.', 'iusto-pariatur-laboriosam-est-incidunt', 4, 'uploads/posts.jpg', 'Adipisci sapiente quis rerum iste nostrum. Porro deserunt suscipit sed et dolorem quae aut. Et nostrum eveniet eum molestias molestiae.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(35, 'Omnis dolorem minus et eum atque earum omnis.', 'omnis-dolorem-minus-et-eum-atque-earum-omnis', 5, 'uploads/posts.jpg', 'Corporis et error quos ab quisquam ipsa aspernatur. Sequi quo voluptas ut consequatur et animi ipsam voluptas. Vitae eum fugit qui omnis voluptas accusamus corporis. Voluptatem omnis esse nihil laudantium.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(36, 'In in est sint corporis officiis totam.', 'in-in-est-sint-corporis-officiis-totam', 1, 'uploads/posts.jpg', 'Nobis sint animi dolores quia. Itaque non est est quis. Neque blanditiis minus voluptatem ipsam et. Sed placeat tempora nobis aut eos fugit tempora. Excepturi quas esse accusantium et corporis. Sit minus eligendi sunt ipsa cum sint hic. Veritatis aut sit mollitia sapiente. Consequatur quia ut veniam blanditiis non rerum sed temporibus. Minus earum sed qui unde magni. Qui est et aspernatur alias aperiam.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(37, 'Voluptatem ad occaecati sint sequi.', 'voluptatem-ad-occaecati-sint-sequi', 1, 'uploads/posts.jpg', 'Nam blanditiis eaque quia cumque sunt eligendi nam. In blanditiis nam sunt consectetur. Libero maiores dicta ab aut consequatur. Vel voluptatum nulla culpa saepe numquam. Sed quod rem placeat sit possimus.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(38, 'Dolorem eius consequatur cumque.', 'dolorem-eius-consequatur-cumque', 4, 'uploads/posts.jpg', 'Eligendi quasi amet nihil rem eligendi et quia nulla. Esse sit dolore vero facilis qui. Facilis quas ut libero sit ut. Corrupti non ipsam sed cum saepe dolore perferendis.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(39, 'Occaecati explicabo vel qui dolor quas amet ut.', 'occaecati-explicabo-vel-qui-dolor-quas-amet-ut', 3, 'uploads/posts.jpg', 'Soluta eos porro rerum magnam molestiae. Aspernatur placeat provident sit quod numquam maiores aliquam possimus. Incidunt vel est vel. Aut rerum consectetur eveniet quaerat. Libero dolores eos animi molestiae unde corporis qui libero. Veniam totam ut aut praesentium enim velit odio. Veritatis possimus est et nostrum illum nihil eum iure. Dolorem itaque optio ipsa nihil consequatur quis blanditiis. Cum nisi rem et eaque aliquid. Rerum ut error vel facere quis ipsa autem.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(40, 'Molestias modi porro maxime cumque accusamus.', 'molestias-modi-porro-maxime-cumque-accusamus', 5, 'uploads/posts.jpg', 'Optio labore consequatur sed eveniet illo odio eligendi. At inventore tempore consequatur voluptate. Assumenda voluptatem tempore et ut id earum. Dolores reiciendis non et ratione eos occaecati nulla. Error qui natus necessitatibus mollitia porro. Fugiat id harum aut esse est qui dolore. Voluptas autem dolorem et omnis eaque ipsum velit. Consequatur ullam et dolorum dignissimos. Quo nobis molestias esse et natus. Aut nisi itaque ad.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(41, 'Harum nulla quia harum error consequatur quam.', 'harum-nulla-quia-harum-error-consequatur-quam', 5, 'uploads/posts.jpg', 'Eius velit quasi voluptatem amet repudiandae. Rerum est temporibus animi deleniti quaerat ipsam rerum. Eaque asperiores porro magni. Nulla aut est numquam sit velit.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(42, 'Dolorum harum dolores sunt.', 'dolorum-harum-dolores-sunt', 1, 'uploads/posts.jpg', 'Explicabo dicta mollitia rerum illo sed eveniet doloribus. Non esse fugiat qui doloribus alias. A sit laudantium esse ipsam maiores est nobis.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(43, 'Officiis ut corrupti enim odit molestias quia.', 'officiis-ut-corrupti-enim-odit-molestias-quia', 2, 'uploads/posts.jpg', 'Voluptas nostrum recusandae qui amet. Aspernatur et error qui quia cum nihil est consequuntur. Consequuntur quo iusto rerum esse numquam est. Dignissimos quia voluptatem accusamus. Modi veritatis illum impedit aut consequuntur animi. Ipsa dolor quisquam cupiditate. Cumque ipsum minima dolorem. Id suscipit autem perspiciatis quia aliquid in. Rerum est distinctio aliquam voluptatem consequatur dolor recusandae.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(44, 'Earum commodi est similique.', 'earum-commodi-est-similique', 4, 'uploads/posts.jpg', 'Quo et veniam nemo magnam provident earum. Odit molestiae autem quasi temporibus ipsam. Quia et ratione velit. Nulla sit sunt fugit tempora sequi sit amet. Quis esse velit est vel error rerum. Maiores et consectetur omnis vel quasi iure quibusdam nobis. Inventore totam ut in et ut. Ut magnam dicta sed distinctio.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(45, 'Fugiat aut ut vero assumenda.', 'fugiat-aut-ut-vero-assumenda', 5, 'uploads/posts.jpg', 'Voluptatem voluptatem atque iste eos quisquam voluptas dolor. Incidunt amet quis et suscipit corrupti sed. In autem nobis ratione voluptates sunt. Quisquam tempora architecto vero omnis id illum omnis. Voluptates distinctio minus et provident at et officiis.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(46, 'Consequuntur minima architecto minus eum.', 'consequuntur-minima-architecto-minus-eum', 2, 'uploads/posts.jpg', 'Aut voluptates iste facilis quia voluptatem reiciendis. Et accusantium porro officiis consectetur neque. Quod doloremque labore non laboriosam voluptatem et. Beatae corrupti pariatur itaque aut nesciunt minus porro. Dolor maxime eos id quas sed aut exercitationem. Non laborum quibusdam dolor repellat sunt animi ut eius. Culpa rerum officiis et. Et est ipsum cum quia. Nemo provident enim nesciunt nihil est provident. Quo ut possimus architecto sit nulla. Accusamus delectus blanditiis nesciunt qui sapiente ut. Quo quis in quis iste quo sit eos velit. Inventore voluptates ratione dolorem alias repellat ab.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(47, 'Iste quae ut culpa.', 'iste-quae-ut-culpa', 4, 'uploads/posts.jpg', 'Eos soluta culpa est suscipit sed aut exercitationem. Expedita reprehenderit modi ipsam atque. Quam omnis expedita facilis est incidunt rerum aut. Cumque laboriosam deserunt ea mollitia incidunt et porro. Modi delectus reiciendis accusamus est architecto dolorum.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(48, 'Velit ea placeat facere iste sed.', 'velit-ea-placeat-facere-iste-sed', 4, 'uploads/posts.jpg', 'Omnis voluptatem ab velit omnis et ipsa ratione. Assumenda rerum tempora quia libero ad libero itaque et. At voluptatum vel dignissimos. Rerum fugiat dignissimos est eum. Veniam iusto sit soluta et quia nulla. Ex harum voluptatem sint veniam eligendi et ex deserunt. Iure aut repudiandae corrupti ipsa iusto cum. Rerum perferendis est sunt et vel magnam.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(49, 'Et aut quis non illo.', 'et-aut-quis-non-illo', 3, 'uploads/posts.jpg', 'Esse inventore illo eum voluptatibus dignissimos quaerat. Minus culpa labore vitae omnis id adipisci. Ea ut eum consequatur omnis.', '0', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(50, 'Rerum a qui ipsum voluptatem saepe animi earum.', 'rerum-a-qui-ipsum-voluptatem-saepe-animi-earum', 3, 'uploads/posts.jpg', 'Laudantium earum maiores recusandae voluptas. Totam aut et repudiandae consequuntur qui enim. Impedit ut quam ipsam vel. Vel tempora possimus est praesentium libero voluptas.', '1', NULL, '2024-12-19 04:30:51', '2024-12-19 04:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diploma` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certification` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `address`, `country`, `city`, `gender`, `dob`, `skills`, `specialization`, `experience`, `phone`, `bio`, `cover_letter`, `resume`, `avatar`, `education`, `diploma`, `certification`, `created_at`, `updated_at`) VALUES
(1, 52, 'Valencia Town Lahore Pakistan', 'Nauru', '', 'Male', '2000-12-20', 'HTML, CSS, JavaScript, Bootstrap, PHP, Laravel, Rest APIs, MySQL Database', 'PHP Laravel', '', '03074541890', 'I am a web developer with years of experience in creating and managing websites. My skills include coding in HTML, CSS, JavaScript, Bootstrap, PHP, Laravel and MySQL Database as well as working with Rest APIs.', 'uploads/files/1735170323.pdf', 'uploads/files/1738845851.pdf', '1734603056.jpeg', 'BSIT', 'computer course', 'CCNA', '2024-12-19 05:01:43', '2025-02-06 07:44:11'),
(2, 54, '', '', '', 'male', '1997-01-22', NULL, NULL, '', '', '', '', '', '', '', '', '', '2024-12-22 06:05:17', '2024-12-22 06:05:17'),
(3, 56, '', '', '', 'male', '1997-02-22', NULL, NULL, '', '', '', '', '', '', '', '', '', '2024-12-22 06:27:59', '2024-12-22 06:27:59'),
(4, 60, '', '', '', 'Male', '1998-01-20', NULL, NULL, '', '03004541890', '', '', '', '', '', '', '', '2024-12-26 03:34:00', '2025-01-22 08:13:14'),
(5, 61, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2024-12-27 20:20:15', '2024-12-27 20:20:15'),
(6, 62, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '1736504024.JPG', '', '', '', '2024-12-27 20:22:03', '2025-01-10 10:13:44'),
(7, 63, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2024-12-27 20:23:54', '2024-12-27 20:23:54'),
(8, 64, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2024-12-27 20:25:08', '2024-12-27 20:25:08'),
(10, 66, 'الشرقية', '', '', '', '', NULL, NULL, '', '0501612024', '', '', '', '', '', '', '', '2025-01-10 11:35:48', '2025-01-10 12:25:36'),
(11, 67, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-10 12:39:24', '2025-01-10 12:39:24'),
(12, 68, '', '', '', 'Male', '2025-01-12', NULL, NULL, '', '12341234', '', '', '', '', '', '', '', '2025-01-12 15:33:30', '2025-01-12 15:33:50'),
(15, 74, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-17 12:25:59', '2025-01-17 12:25:59'),
(16, 77, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-21 11:24:09', '2025-01-21 11:24:09'),
(17, 79, 'Lahore Pakistan', '', '', 'male', '1992-12-20', 'MBBS,General Doctor,', 'General Doctor', '05', '03114567896', 'I am a MBBS Doctor with 05 years of experience in Jinnah Hospital Lahore. My skills include Provide expert advice to customers on the selection and proper use of medications, supplements, and healthcare products. Accurately dispense prescription medications, verifying dosages, instructions, and drug interactions while adhering to legal and ethical standards.', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(18, 82, 'Lahore Pakistan', '', '', 'female', '1994-12-20', 'General Physician,', 'General Physician', '03', '03024561789', 'I am a Qualified General Physician with 03 years of experience in Fatima Hospital Lahore.', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(19, 83, 'Lahore Pakistan', '', '', 'male', '1986-12-20', 'Crisis management, people handling, communications, investigations and error analysis, improvement of lab services for QCI training. ', 'Assistant Manager Pathology Laboratory', '05', '03031456985', 'I am a Assistant Manager Pathology Laboratory with 05 years of experience in DHQ Hospital Karachi. My skills include Crisis management, people handling, communications, investigations and error analysis, improvement of lab services for QCI training.', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(20, 84, 'Lahore Pakistan', '', '', 'female', '1990-12-20', 'handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc.', 'Nurse', '03', '03054578965', 'I am a Qualified General Physician with 03 years of experience in Fatima Hospital Lahore. My skills include handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc. ', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(21, 85, 'Karachi Pakistan', '', '', 'female', '1990-12-20', 'handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc.', 'Nurse', '05', '03258965327', 'I am a Qualified General Physician with 05 years of experience in Fatima Hospital Lahore. My skills include handover & takeover incoming / outgoing shift unit / ward information related to patients, including introductions, patient files, medication charts, investigation reports, intake and output chart etc. ', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(22, 86, 'Lahore Pakistan', '', '', 'male', '1966-12-20', 'Chronic Care Management (CCM), Remote Patient Monitoring (RPM), and Remote Therapeutic Monitoring (RTM). Additionally, collaborate with medical centers in USA on joint initiatives (co-locating services/sharing facilities) and explore and apply for grants,', 'Medical Doctor', '05', '03031456985', 'I am a Medical Doctor with 05 years of experience in Mayo Hospital Lahore. My skills include Chronic Care Management (CCM), Remote Patient Monitoring (RPM), and Remote Therapeutic Monitoring (RTM). Additionally, collaborate with medical centers in USA on joint initiatives (co-locating services/sharing facilities) and explore and apply for grants, contracts, and funding opportunities (federal, state, and private) for healthcare programs.', 'uploads/files/1735170323.pdf', 'uploads/files/1735169830.pdf', '1734603056.jpeg', '', '', '', '2024-12-19 05:01:43', '2024-12-28 18:58:18'),
(23, 87, 'Valencia Town', '', '', '', '', NULL, NULL, '', '03114931858', '', '', '', '', '', '', '', '2025-01-22 07:24:13', '2025-01-28 07:11:05'),
(24, 88, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-24 02:49:24', '2025-01-24 02:49:24'),
(25, 89, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-24 02:53:58', '2025-01-24 02:53:58'),
(26, 95, 'ksa', '', '', 'Male', '2025-01-22', NULL, 'Neonatology Consultant', '', '', '', '', '', '', '', '', '', '2025-01-27 07:03:44', '2025-01-27 07:04:23'),
(27, 96, '', '', '', 'male', '2001-07-27', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-27 13:58:16', '2025-01-27 13:58:16'),
(28, 101, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-28 07:09:11', '2025-01-28 07:09:11'),
(29, 102, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-28 07:09:58', '2025-01-28 07:09:58'),
(30, 103, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-28 07:10:40', '2025-01-28 07:10:40'),
(31, 104, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-28 07:11:47', '2025-01-28 07:11:47'),
(33, 106, '', '', '', 'Male', '2025-01-28', 'Pediatric surgery', 'Pediatric surgery consultant', '', '11223344', 'Pediatric surgery consultant', '', '', '', '', '', '', '2025-01-28 08:55:02', '2025-01-28 08:56:40'),
(34, 107, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-28 10:11:01', '2025-01-28 10:11:01'),
(35, 109, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '2025-01-29 10:44:28', '2025-01-29 10:44:28'),
(36, 111, 'EGUPT', '', '', 'Male', '2025-01-23', 'Pediatric surgery', 'Pediatric surgery consultant', '', '1212121212', 'GOOD JOP', '', '', '', '', '', '', '2025-01-29 13:02:32', '2025-01-29 13:06:04'),
(37, 112, 'ksa', 'Saudi Arabia', '', 'Male', '2025-01-30', 'Neurologist', 'Neurologist', '', '', 'Brain neurologist', '', 'uploads/files/1738334292.pdf', '', 'boord', '', 'tab', '2025-01-31 09:33:44', '2025-02-03 13:35:06'),
(38, 113, 'Ksa', 'Est', 'Hf', 'Male', '2025-02-01', 'Sm', 'Ee', '', '0546459995', 'Eem eea', '', '', '', '', '', '', '2025-02-02 15:46:57', '2025-02-02 15:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(2, 'Recruiter', '2024-12-26 02:02:10', '2024-12-26 02:02:10'),
(3, 'Hiring Manager', '2024-12-26 02:03:43', '2024-12-26 02:03:43'),
(4, 'Interviewer', '2024-12-26 02:03:43', '2024-12-26 02:03:43'),
(5, 'Talent Acquisition/HR Manager', '2024-12-26 02:03:43', '2024-12-26 02:03:43'),
(6, 'Employee', '2024-12-26 02:03:43', '2024-12-26 02:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 51, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` bigint UNSIGNED NOT NULL,
  `interview_id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `offer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housing` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selections`
--

INSERT INTO `selections` (`id`, `interview_id`, `user_id`, `job_id`, `offer`, `status`, `visa`, `flight`, `housing`, `created_at`, `updated_at`) VALUES
(5, 26, '79', 205, '1738842570.docx', 'selected', '1738842651.docx', '1738933041.jpeg', '1738933990.jpeg', '2025-01-10 10:21:19', '2025-02-07 08:13:10'),
(8, 24, '54', 204, '1738058444.JPG', 'selected', '', '', '', '2025-01-25 07:06:02', '2025-02-07 08:05:07'),
(9, 25, '79', 216, '', 'rejected', '', '0', '', '2025-01-25 07:06:48', '2025-01-25 07:06:48'),
(15, 31, '96', 221, '', 'pending', '', '0', '', '2025-01-27 14:17:00', '2025-01-27 14:17:00'),
(16, 43, '112', 204, '1738770309.jpg', 'selected', '', '', '', '2025-02-04 10:54:01', '2025-02-07 08:12:53'),
(17, 43, '112', 204, '', 'pending', '', '', '', '2025-02-04 10:54:47', '2025-02-04 10:54:47'),
(18, 30, '86', 205, '', 'rejected', '', '', '', '2025-02-04 11:16:47', '2025-02-05 11:07:08'),
(19, 47, '112', 211, '', 'pending', '', '', '', '2025-02-05 10:33:36', '2025-02-05 10:33:36'),
(20, 24, '54', 204, '', 'pending', '', '', '', '2025-02-06 09:01:56', '2025-02-06 09:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profession`, `content`, `video_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eryn Hammes', 'Gaming Manager', 'Similique optio ut officia quam quam totam. Architecto sit neque officia tenetur. Id iste omnis quas qui totam. Sit velit autem ipsa rerum. Ea veritatis qui fugit repellat pariatur facilis. Autem quia aut aspernatur non voluptatem et. Modi nihil ea ut in ', 28959265, 1, '2024-12-19 04:30:51', '2024-12-19 04:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `email_verified_at`, `password`, `status`, `company_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(51, 'admin', 'admin', 'admin@admin.com', '2024-12-19 04:30:51', '$2y$10$a9NKcKeJgEO2uE8hG8YVI.Vp0uFkrnQdQbCMQuZNoGSk0K7.U0a02', '1', '', 'o5948sIr7QjEDM9hNINbiPIJ92Hbkf35qsiGsTd7zDjZw6r7CrZz10I2wPfk', '2024-12-19 04:30:51', '2024-12-19 04:30:51'),
(52, 'Mehar Ahmad', 'seeker', 'user@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(54, 'Test User', 'seeker', 'test@gmail.com', NULL, '$2y$10$A9/559FRgw7hrQisIJ4IBelARruNOpLCTec3XykwRQQMFpcWXPMVO', '1', '', NULL, '2024-12-22 06:05:17', '2024-12-22 06:05:17'),
(56, 'Test1', 'seeker', 'test1@gmail.com', NULL, '$2y$10$j6lOmbcA1CbT.sJPPQTUOuv0XFAjmWmm2ZBT7yLu4irZGuWWmPMmO', '0', '', NULL, '2024-12-22 06:27:59', '2025-01-01 17:16:31'),
(60, 'Mohsin Bin Zyad', 'Recruiter', 'recruiter@gmail.com', NULL, '$2y$10$e2rlkdYpyjXlDNEb1OX/E.Imq8GsM.0hma9RHTE3YVvJJhcxFL60.', '1', '105', NULL, '2024-12-25 21:41:52', '2025-01-22 08:13:14'),
(61, 'Abdullah', 'Hiring Manager', 'hiringmanager@gmail.com', NULL, '$2y$10$AzElM98wmzsLVpln/FqHXez2b1O77VgWz1OUsepj8IJvdJ5hLPvH.', '1', '105', NULL, '2024-12-27 20:20:15', '2024-12-27 21:16:49'),
(62, 'Abdul Rehman', 'Interviewer', 'interviewer@gmail.com', NULL, '$2y$10$Lz1Gf33ZlNpXyGE09x8YhuvpX1PSdTtt8f5YOZGDrkmanEBHNQwfC', '1', '105', NULL, '2024-12-27 20:22:03', '2024-12-27 21:16:44'),
(63, 'M.Wajid', 'Talent Acquisition/HR Manager', 'hrmanager@gmail.com', NULL, '$2y$10$Dl8KGf8xyyxn7pXj8Z770e7FKFFJVSg/bqbK8CEwJti0gAB.F5ELy', '1', '105', NULL, '2024-12-27 20:23:54', '2024-12-27 21:16:38'),
(64, 'Hassan  ', 'Employee', 'employee@gmail.com', NULL, '$2y$10$xUZtUGwjrO7jO2ai8kPPsuu4rJblhFdmmOm9LNdMWpEQuPS8wUr8G', '1', '105', NULL, '2024-12-27 20:25:08', '2024-12-27 21:16:33'),
(66, 'TROKY', 'Hiring Manager', 'MALANAZIMOH@GMAIL.COM', NULL, '$2y$10$cA7pW.uheK0PhmqliH8YxefwUgdjbFMbtKc0DX.SFtGd36qnBYYHG', '1', '', NULL, '2025-01-10 11:35:48', '2025-01-10 11:38:44'),
(67, 'Muhammad Usman', 'Employee', 'usmankhalidandali@gmail.com', NULL, '$2y$10$ShBYO/TFVde2Z3ZbFATxSuG...y/cldBlgh/RyOphMsW7VsE9FDVO', '0', '', NULL, '2025-01-10 12:39:24', '2025-01-10 12:39:24'),
(68, 'Moh', 'seeker', 'troky71717@gmail.com', NULL, '$2y$10$DLNktz7QLmrAai8LB7e3hO9hBmpTzv4eQ4gIXOdW5Ovhgm.Gt/87u', '1', '', NULL, '2025-01-12 15:33:30', '2025-01-12 15:33:30'),
(69, '', 'employer', 'company@gmail.com', NULL, '$2y$10$5NFtf47Rm1LgCvF.XQ4qBe24Az9a/q0234rjjkpWl/k05c5V87yrO', '1', '105', '6Vw1mnBOra3GrM1mbonyoyvQtZkES33NbcLO50omiLpDeJh7eETe3hlWEpah', '2025-01-13 15:55:33', '2025-01-13 15:55:33'),
(70, '', 'employer', 'software@email.com', NULL, '$2y$10$HajpHR3AotB/8NwZuNIkz.gwhkBnNCyK3JnM2v4We.LLOCpioUPmi', '1', '', NULL, '2025-01-15 09:00:45', '2025-01-28 05:42:25'),
(73, '', 'employer', 'mtecsoft@gmail.com', NULL, '$2y$10$yIyyfaSDGgWYohAY26j.A.QNBg4Csrsw4GhVEs0wa9CC2ZM2nuNUW', '1', '', NULL, '2025-01-17 06:29:17', '2025-01-17 06:29:17'),
(74, 'Mtecsoft recruiter', 'Recruiter', 'mtecrecruiter@gmail.com', NULL, '$2y$10$Ocve4ihzFlGByHu8Jeag0.mBUZoba2FTef8LL1kptGVvNbAjcVldG', '', '107', NULL, '2025-01-17 12:25:59', '2025-01-17 12:25:59'),
(75, '', 'employer', 'mtecsoft@email.com', NULL, '$2y$10$0FZ/RmzftOZ1iHa/81zCteOQMLZ6fa8CSY9oz/rMJsVC/L0cSUPq.', '1', '', NULL, '2025-01-21 11:09:44', '2025-01-21 11:09:44'),
(77, 'Muhammad Usman', 'Recruiter', 'abc@email.com', NULL, '$2y$10$fKKbkobtGQMW4FXQf4SBK.TcgvBc0y8/1Qqiu21/D6wKtvUUBK/R6', '', '108', NULL, '2025-01-21 11:24:09', '2025-01-21 11:24:09'),
(78, '', 'employer', 'troky81@hotmail.com', NULL, '$2y$10$7bysYyKYd8nJFc/X2rXoc.5GQwUgImLN1AplFBZ0Fp3WrbbwMu4x6', '1', '', NULL, '2025-01-21 13:07:55', '2025-01-21 13:07:55'),
(79, 'Zafar Iqbal', 'seeker', 'user1@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(82, 'Khalid Bin Abdullah', 'seeker', 'user2@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(83, 'Shabir Yazdani', 'seeker', 'user3@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(84, 'Samina Shahzad', 'seeker', 'user4@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(85, 'Wajeeha Tahir', 'seeker', 'user5@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(86, 'Bilal Ijaz', 'seeker', 'user6@gmail.com', '2024-12-19 10:05:39', '$2y$10$RIPJWi6ZfIAfyDGUIFB41e0OqfaxoJicS9T96UmIntL1k/uSeWH4W', '1', '', NULL, '2024-12-19 05:01:43', '2024-12-19 05:01:43'),
(87, 'Ahmad', 'Recruiter', 'ahmad03114931858@gmail.com', NULL, '$2y$10$FNXn14z2G20Ip7nbcHo9nOMNxEQZonEU1lRfUlv82zhVyZbdlm37S', '1', '105', NULL, '2025-01-22 07:24:13', '2025-02-06 07:25:00'),
(88, 'xyz', 'Recruiter', 'xyz@gmail.com', NULL, '$2y$10$xhfzj4VqzljvyBxO2wubTeUtWhOMoRw6.2CTFCNrBJqqd6UC2kl4i', '1', '108', NULL, '2025-01-24 02:49:24', '2025-01-24 03:02:54'),
(89, 'abc', 'Hiring Manager', 'abcd@email.com', NULL, '$2y$10$mM.FdWomGS/Ait.SyfHNWuInDyHmllxiUPSh7qb/E8rRxycWdLmOa', '1', '108', NULL, '2025-01-24 02:53:58', '2025-01-24 03:03:18'),
(90, 'abc', 'Interviewer', 'abce@email.com', NULL, '$2y$10$tr/zdU2tliRa7hL1nqB29.WAaU6Q44Mt6AVyoWs9ljthWQGCDbbHC', '', '108', NULL, '2025-01-24 03:07:57', '2025-01-24 03:07:57'),
(92, 'Moh', 'Recruiter', 'moh@moh.com', NULL, '$2y$10$v1lr4VdG6PEgkfahAydLnOJnxKtniavTMkxpRiq/Ou0KW3L5yYv6W', '', '109', NULL, '2025-01-26 12:37:48', '2025-01-26 12:37:48'),
(94, 'Hamad', 'Talent Acquisition/HR Manager', 'hamad@hamad.sa', NULL, '$2y$10$aR7hDje1aEO31qsCCij2d.6aVD2fn0alLA2PBAwjlpLTyfzPhbY7a', '', '109', NULL, '2025-01-27 06:20:51', '2025-01-27 06:20:51'),
(95, 'علي', 'seeker', 'ali@ali', NULL, '$2y$10$E6zDXrOYLeLjyZOleMm3PujF0QxzCOLJGQmTy6IBB7i2jp1br4MLK', '1', '', NULL, '2025-01-27 07:03:44', '2025-01-27 07:03:44'),
(96, 'usman', 'seeker', 'usman@gmail.com', NULL, '$2y$10$KL1X7xwygOy0.USlQHbbmudgNOEo00gMvrhH0LMD7ienJrGZgx8Qi', '1', '', 'wTZLrT3MO7TipjOoPDZ2FzWitAsGwdhqs0jpFd2nhcM3EkBmdTzrYHw4crJn', '2025-01-27 13:58:16', '2025-01-27 13:58:16'),
(97, '', 'employer', 'H@moh', NULL, '$2y$10$LL4bUw5U1JvVy1291w6Mk.3WOFVwLdCLyor7E9VG0QvI.h08sIW66', '1', '', NULL, '2025-01-28 05:09:43', '2025-01-29 07:34:12'),
(98, 'A', 'Recruiter', 'A@MOH', NULL, '$2y$10$RoHehC/3Y9A05FiG/y2G7OSSaAedIKwl5uVWudhRy38tXkD2G6FEe', '', '110', NULL, '2025-01-28 05:11:54', '2025-01-28 05:11:54'),
(101, 'A', 'Hiring Manager', 'B@moh', NULL, '$2y$10$4XzKECUY3qjYsON5Hd.CaueVR7cevS6iRwvSUWki8GFBymFOhlEwO', '', '110', NULL, '2025-01-28 07:09:11', '2025-01-28 07:09:11'),
(102, 'C', 'Interviewer', 'C@moh', NULL, '$2y$10$ro2cyoXrU0.SX0H0tlJegeKv77xPmRivyhEPeKdtE3.1g4PQX8BT6', '', '110', NULL, '2025-01-28 07:09:58', '2025-01-28 07:09:58'),
(103, 'D', 'Talent Acquisition/HR Manager', 'D@moh', NULL, '$2y$10$0OWuB5Oxfc1CoVpPmMdBbOamSs0pocRGSqK2PB70DFk3cXjO5vGr2', '1', '110', NULL, '2025-01-28 07:10:40', '2025-02-01 11:43:46'),
(104, 'E', 'Employee', 'E@moh', NULL, '$2y$10$vgyOmoijhVe760VG7HkTnuJh./G.5KzgO2Ij8scO6NasiWATXLbxe', '', '110', NULL, '2025-01-28 07:11:47', '2025-01-28 07:11:47'),
(106, 'AA', 'seeker', 'AA@MOH', NULL, '$2y$10$gsTwY2czFIeWeUf8HyNcSOri8uVX8/ZBwncqzsPRmjbIthaY3Q9fK', '1', '', NULL, '2025-01-28 08:55:02', '2025-01-28 08:55:02'),
(107, 'F', 'Hiring Manager', 'F@moh', NULL, '$2y$10$5SzyMfGBbmDZy8vgU3UYYe6YamLz9FtFQTFYfz2KkWyVwMOF1p3Vi', '', '110', NULL, '2025-01-28 10:11:01', '2025-01-28 10:11:01'),
(108, '', 'employer', 'h@gov', NULL, '$2y$10$WnTi0FU9N6RFliitmOJeOepbm.lWCrmTLM/JUSbrydAy3nqenWPQi', '1', '', 'HWhvDyjMmPymHvhM0dihJHGW0lvPFPL5kOXNwdQzrCv9PYyAG90VmNAIg7RZ', '2025-01-29 10:20:55', '2025-02-03 14:47:43'),
(109, 'A', 'Recruiter', 'A@GOV', NULL, '$2y$10$Oz9zhWTju/.K3eV0obmVduGN0chpejKPAEUSqC1ceKIn6y7gjmfBm', '', '111', NULL, '2025-01-29 10:44:28', '2025-01-29 10:44:28'),
(110, 'FM', 'seeker', 'FM@FM', NULL, '$2y$10$0XwZYvRy5jA28FMh3ydfiuJgCeu/HwwsK.x4G6Iw.kFockd3JSrZi', '1', '', NULL, '2025-01-29 13:01:39', '2025-01-29 13:01:39'),
(111, 'FM', 'seeker', 'FMF@FM', NULL, '$2y$10$qilq/ZSChTxvVFs40vNvG.AdXotegEVDjRoFrCInNsAD1OICvr4u6', '1', '', NULL, '2025-01-29 13:02:32', '2025-01-29 13:02:32'),
(112, 'خالد', 'seeker', 'k@k', NULL, '$2y$10$zQ8L9pUmp1ag8I4oFqMm7uz8J73M1sRFE18TdYmfC4VMdgtAS29Yu', '1', '', NULL, '2025-01-31 09:33:44', '2025-01-31 09:33:44'),
(113, 'Ahmad', 'seeker', 'ahmad@moh', NULL, '$2y$10$9QmXfl9WQQ0vZMJaXZ2BWOLfWkKZxJovH08GKoeObSpQozw7gOCgu', '1', '', NULL, '2025-02-02 15:46:57', '2025-02-02 15:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feed_backs_interview_id_foreign` (`interview_id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviews_job_id_foreign` (`job_id`),
  ADD KEY `interviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user`
--
ALTER TABLE `job_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notification_from_foreign` (`notification_from`),
  ADD KEY `notifications_notification_to_foreign` (`notification_to`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selections_interview_id_foreign` (`interview_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `job_user`
--
ALTER TABLE `job_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD CONSTRAINT `feed_backs_interview_id_foreign` FOREIGN KEY (`interview_id`) REFERENCES `interviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_user`
--
ALTER TABLE `job_user`
  ADD CONSTRAINT `job_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
