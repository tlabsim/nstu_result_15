-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 09:50 PM
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
  `unit` enum('A','B','C','D','_','All') COLLATE utf8_unicode_ci NOT NULL,
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
  `unit` enum('A','B','C','D') COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `score` float(8,2) DEFAULT NULL,
  `total_score` float(8,2) DEFAULT NULL,
  `merit_position` int(11) NOT NULL,
  `cumulative_merit_position` int(11) DEFAULT NULL,
  `list` enum('Merit','FF','FFQ','TQ','No','Fail','Invalid') COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` enum('Science','Humanities','Arts','Commerce','Business','Business Studies') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_groupwise` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `results_exam_roll_foreign` (`exam_roll`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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
  `general_science` float(8,2) DEFAULT NULL,
  `general_math` float(8,2) DEFAULT NULL,
  `business_accounting` float(8,2) DEFAULT NULL,
  `extra1` float(8,2) DEFAULT NULL,
  `extra2` float(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `results_details_exam_roll_foreign` (`exam_roll`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `search_stats`
--

CREATE TABLE IF NOT EXISTS `search_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_keyword` varchar(30) NOT NULL,
  `searched_from` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `search_stats`
--

INSERT INTO `search_stats` (`id`, `search_keyword`, `searched_from`) VALUES
(1, '10001', 'search_by_roll'),
(2, '10001', 'search_by_roll'),
(3, '10001', 'search_by_roll'),
(4, '10001', 'search_by_roll'),
(5, '10001', 'search_by_roll'),
(6, '10001', 'search_by_roll'),
(7, '80001', 'search_by_roll'),
(8, '80001', 'search_by_roll'),
(9, '80001', 'search_by_roll'),
(10, '80001', 'search_by_roll'),
(11, '80001', 'search_by_roll'),
(12, '80001', 'search_by_roll'),
(13, '80001', 'search_by_roll');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `parameter`, `value`, `created_at`, `updated_at`) VALUES
(1, 'show_result_publication_summary', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'is_result_search_enabled', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'show_failers_details', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'show_result_details', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'has_notice', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit` enum('A','B','C','D') COLLATE utf8_unicode_ci NOT NULL,
  `total_seats` int(11) NOT NULL,
  `is_groupwise` tinyint(1) NOT NULL DEFAULT '0',
  `science_seats` int(11) NOT NULL DEFAULT '0',
  `humanities_seats` int(11) NOT NULL DEFAULT '0',
  `commerce_seats` int(11) NOT NULL DEFAULT '0',
  `ff_seats` int(11) NOT NULL,
  `ff_science_seats` int(11) DEFAULT NULL,
  `ff_commerce_seats` int(11) DEFAULT NULL,
  `ff_humanities_seats` int(11) DEFAULT NULL,
  `tribal_seats` int(11) NOT NULL,
  `tribal_science_seats` int(11) DEFAULT NULL,
  `tribal_commerce_seats` int(11) DEFAULT NULL,
  `tribal_humanities_seats` int(11) DEFAULT NULL,
  `is_result_published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `total_seats`, `is_groupwise`, `science_seats`, `humanities_seats`, `commerce_seats`, `ff_seats`, `ff_science_seats`, `ff_commerce_seats`, `ff_humanities_seats`, `tribal_seats`, `tribal_science_seats`, `tribal_commerce_seats`, `tribal_humanities_seats`, `is_result_published`, `created_at`, `updated_at`) VALUES
(1, 'A', 240, 0, 0, 0, 0, 10, NULL, NULL, NULL, 5, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'B', 420, 0, 0, 0, 0, 10, NULL, NULL, NULL, 5, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'C', 60, 0, 0, 0, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'D', 130, 1, 60, 40, 30, 8, 2, 3, 2, 3, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
