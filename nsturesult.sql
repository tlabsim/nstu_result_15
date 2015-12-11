-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2014 at 03:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nsturesult`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `seats` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `download_links`
--

CREATE TABLE IF NOT EXISTS `download_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_dead` tinyint(1) NOT NULL DEFAULT '0',
  `download_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `examinees`
--

CREATE TABLE IF NOT EXISTS `examinees` (
  `exam_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('MALE','FEMALE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `quota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_board` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_group` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_roll` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_reg_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsc_year` int(11) DEFAULT NULL,
  `hsc_gpa` float(8,2) DEFAULT NULL,
  `hsc_gpa_ex_fourth` float(8,2) DEFAULT NULL,
  `ssc_board` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc_group` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc_roll` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc_reg_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssc_year` int(11) DEFAULT NULL,
  `ssc_gpa` float(8,2) DEFAULT NULL,
  `ssc_gpa_ex_fourth` float(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`exam_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_23_174839_create_db', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` float(8,2) NOT NULL,
  `total_score` float(8,2) NOT NULL,
  `merit_position` int(11) NOT NULL,
  `list` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `results_exam_roll_foreign` (`exam_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `results_details`
--

CREATE TABLE IF NOT EXISTS `results_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_roll` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physics` float(8,2) DEFAULT NULL,
  `chemistry` float(8,2) DEFAULT NULL,
  `biology` float(8,2) DEFAULT NULL,
  `math` float(8,2) DEFAULT NULL,
  `ban_eng` float(8,2) DEFAULT NULL,
  `bangla` float(8,2) DEFAULT NULL,
  `english` float(8,2) DEFAULT NULL,
  `analytical_ability` float(8,2) DEFAULT NULL,
  `general_knowledge` float(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `results_details_exam_roll_foreign` (`exam_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `parameter`, `value`, `created_at`, `updated_at`) VALUES
(1, 'show_result_publication_summary', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'is_result_search_enabled', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'show_failers_details', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'show_result_details', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `merit_seats` int(11) NOT NULL,
  `ff_seats` int(11) NOT NULL,
  `tribal_seats` int(11) NOT NULL,
  `is_result_published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_exam_roll_foreign` FOREIGN KEY (`exam_roll`) REFERENCES `examinees` (`exam_roll`) ON DELETE CASCADE;

--
-- Constraints for table `results_details`
--
ALTER TABLE `results_details`
  ADD CONSTRAINT `results_details_exam_roll_foreign` FOREIGN KEY (`exam_roll`) REFERENCES `examinees` (`exam_roll`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
