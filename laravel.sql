-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 09:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_07_143852_create_movie_table', 1),
('2016_04_07_143933_movie_rating_table', 1),
('2016_04_07_174326_add_column_movietable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movierating`
--

CREATE TABLE IF NOT EXISTS `movierating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `movie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `movierating`
--

INSERT INTO `movierating` (`id`, `user`, `movie`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'test', 'inception', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE IF NOT EXISTS `movietable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yearofrelease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`id`, `name`, `created_at`, `updated_at`, `description`, `yearofrelease`) VALUES
(1, 'inception', NULL, NULL, 'Inception movie description', '2012'),
(2, 'Interstellar', NULL, NULL, 'Interstellar movie description', '2012'),
(3, 'batmanvsuperman', NULL, NULL, 'Batman Vs Superman description', '2016'),
(4, 'deadpool', NULL, NULL, 'Dead Pool description', '2016'),
(5, 'xmen', NULL, NULL, 'X men description', '2014'),
(6, 'anbesivam', NULL, NULL, 'Anbe sivam description', '2005'),
(7, 'maari', NULL, NULL, 'Maari movie description', '2015'),
(8, 'miruthan', NULL, NULL, 'Miruthan Movie description', '2016'),
(9, 'thuppakki', NULL, NULL, 'Thuppakki Movvie description', '2014'),
(10, 'aarambam', NULL, NULL, 'Aarambam Movie description', '2013'),
(11, 'rajinimurugan', NULL, NULL, 'Rajini murugan movie description', '2016'),
(12, 'manofsteel', NULL, NULL, 'Man of steel movie description', '2013'),
(13, 'mankataha', NULL, NULL, 'mankatha movie description', '2010');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dinesh', 'dinesh@gmail.com', '$2y$10$NrGR4ShfyCQxVEK6IAxZU.ZbIf6l1fIkkRz1j/tuSbNqGiO5dJMaC', 'Fq7KBARU5QMAzocyW04QTkkDIYJ138lR1f0ad2C2qBQnhLOHbpf78HrpvSt8', '2016-04-07 12:33:19', '2016-04-07 12:59:15'),
(2, 'test', 'test@gmail.com', '$2y$10$zeDeijiQxECOwjN.cBDo4.gVQaxtc7TRe5lp/QECR3hcMJaxKn8pG', 'N3ii2ZgWm4NSyoooP8pdm35SmjoxNbszOVNipM2zC9y7CN05xwl5M1OpDX4H', '2016-04-07 12:33:40', '2016-04-07 12:39:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
