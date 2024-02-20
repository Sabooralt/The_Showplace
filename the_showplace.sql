-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2023 at 10:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_showplace`
--
CREATE DATABASE IF NOT EXISTS `the_showplace` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `the_showplace`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_01_07_200239_create_movies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Movie_Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Genre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Runtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Cover` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Director` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Actors` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_Year` double NOT NULL,
  `Movie_Trailer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `Movie_Title`, `Movie_Description`, `Movie_Genre`, `Movie_Runtime`, `Movie_Cover`, `Movie_Banner`, `Movie_Rating`, `Movie_Director`, `Movie_Actors`, `Movie_Year`, `Movie_Trailer`, `created_at`, `updated_at`) VALUES
(12, 'asdasdsad', 'asdsad', 'sadadad', 'asdsadsad', 'cover1673383843.jpg', 'banner1673383843.jpg', 'asdasd', 'asdsad', 'asdsada', 2017, 'movietrailer1673383843.mp4', '2023-01-10 15:50:43', '2023-01-10 15:50:43'),
(5, 'The Pale Blue Eye', 'Veteran detective Augustus Landor investigates a series of grisly murders with the help of a young cadet who will eventually go on to become the world-famous author Edgar Allan Poe.', 'Mystery/Crime', '2h 8m', 'cover1673373179.jpg', 'banner1673373179.jpg', '6.7/10', 'Scott Cooper', 'Christian Bale', 2022, 'https://www.youtube.com/watch?v=ddbL9jvg77w&ab_channel=Netflix', '2023-01-10 12:52:59', '2023-01-10 12:52:59'),
(2, 'Blade Runner 2049', 'K, an officer with the Los Angeles Police Department, unearths a secret that could create chaos. He goes in search of a former blade runner who has been missing for over three decades.', 'Sci-fi/Action', '2h 43m', 'cover1673373545.jpg', 'banner1673373545.jpg', '8/10', 'Denis Villeneuve', 'Ryan Gosling', 2017, 'https://www.youtube.com/watch?v=gCcx85zbxz4', '2023-01-10 12:59:05', '2023-01-10 12:59:05'),
(3, 'The Revenant', 'Hugh Glass, a legendary frontiersman, is severely injured in a bear attack and is abandoned by his hunting crew. He uses his skills to survive and take revenge on his companion who betrayed him.', 'Western/Adventure', '2h 36m', 'cover1673361859.jpg', 'banner1673361859.jpg', '8/10', 'Alejandro González Iñárritu', 'Leonardo DiCaprio', 2015, 'https://www.youtube.com/watch?v=LoebZZ8K5N0&ab_channel=20thCenturyStudios', '2023-01-10 09:44:19', '2023-01-10 09:44:19'),
(1, 'Top Gun: Maverick', 'Thirty years of service leads Maverick to train a group of elite TOPGUN graduates to prepare for a high-profile mission while Maverick battles his past demons.', 'Action/Drama', '2h 11m', 'cover1673372919.jpg', 'banner1673372919.jpg', '8.3/10', 'Joseph Kosinski', 'Tom Cruise', 2022, 'movietrailer1673383779.mp4', '2023-01-10 12:48:40', '2023-01-10 12:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
