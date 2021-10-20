-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 03:08 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `slug`, `description`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Grameenphone', 'grameenphone', 'Grameenphone, widely abbreviated as GP, is the leading telecommunications service provider in Bangladesh, with more than 79 million subscribers and 46.3% subscriber market share.', 'eT31ETyKeDuX-060721.png', NULL, 'active', '2021-07-05 22:54:38', '2021-07-05 22:54:38'),
(3, 'GP', 'gp', 'Grameenphone, widely abbreviated as GP, is the leading telecommunications service provider in Bangladesh, with more than 79 million subscribers and 46.3% subscriber market share.', 'cnYNzPTyTlFM-060721.png', NULL, 'inactive', '2021-07-05 22:54:58', '2021-07-06 18:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'mobile', NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2021-07-06 19:24:48', '2021-07-06 19:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_170946_create_permission_tables', 1),
(5, '2021_07_03_230711_create_pages_table', 1),
(6, '2021_07_04_163935_create_user_profiles_table', 1),
(8, '2021_07_05_171057_create_settings_table', 2),
(9, '2021_07_06_025640_create_clients_table', 3),
(10, '2021_07_06_045836_create_testimonials_table', 4),
(12, '2021_07_06_054258_create_team_departments_table', 5),
(13, '2021_07_06_202426_create_teams_table', 6),
(14, '2021_07_07_005253_create_item_categories_table', 7),
(15, '2021_07_07_025206_create_project_categories_table', 8),
(16, '2021_07_07_044046_create_projects_table', 9),
(17, '2021_07_09_164328_create_blog_categories_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(5, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'global', 'active', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(2, 'role', 'active', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(3, 'user', 'active', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(4, 'blog category', 'active', '2021-07-09 05:42:16', '2021-07-09 05:42:16'),
(5, 'blog', 'active', '2021-07-09 05:42:29', '2021-07-09 05:42:29'),
(6, 'item category', 'active', '2021-07-09 05:42:40', '2021-07-09 05:42:40'),
(7, 'item', 'active', '2021-07-09 05:42:48', '2021-07-09 05:42:48'),
(8, 'project category', 'active', '2021-07-09 05:43:07', '2021-07-09 05:43:07'),
(9, 'project', 'active', '2021-07-09 05:43:19', '2021-07-09 05:43:19'),
(10, 'team department', 'active', '2021-07-09 05:43:30', '2021-07-09 05:43:30'),
(11, 'team', 'active', '2021-07-09 05:43:39', '2021-07-09 05:43:39'),
(12, 'client', 'active', '2021-07-09 05:43:50', '2021-07-09 05:43:50'),
(13, 'testimonial', 'active', '2021-07-09 05:43:58', '2021-07-09 05:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'master', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(2, 'global', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(3, 'role_view', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(4, 'role_create', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(5, 'role_edit', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(6, 'role_delete', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(7, 'user_view', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(8, 'user_create', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(9, 'user_edit', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(10, 'user_delete', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(11, 'blog category view', 'web', '2021-07-09 05:42:16', '2021-07-09 05:42:16'),
(12, 'blog category create', 'web', '2021-07-09 05:42:16', '2021-07-09 05:42:16'),
(13, 'blog category edit', 'web', '2021-07-09 05:42:16', '2021-07-09 05:42:16'),
(14, 'blog category delete', 'web', '2021-07-09 05:42:17', '2021-07-09 05:42:17'),
(15, 'blog view', 'web', '2021-07-09 05:42:29', '2021-07-09 05:42:29'),
(16, 'blog create', 'web', '2021-07-09 05:42:29', '2021-07-09 05:42:29'),
(17, 'blog edit', 'web', '2021-07-09 05:42:29', '2021-07-09 05:42:29'),
(18, 'blog delete', 'web', '2021-07-09 05:42:29', '2021-07-09 05:42:29'),
(19, 'item category view', 'web', '2021-07-09 05:42:40', '2021-07-09 05:42:40'),
(20, 'item category create', 'web', '2021-07-09 05:42:40', '2021-07-09 05:42:40'),
(21, 'item category edit', 'web', '2021-07-09 05:42:40', '2021-07-09 05:42:40'),
(22, 'item category delete', 'web', '2021-07-09 05:42:40', '2021-07-09 05:42:40'),
(23, 'item view', 'web', '2021-07-09 05:42:48', '2021-07-09 05:42:48'),
(24, 'item create', 'web', '2021-07-09 05:42:48', '2021-07-09 05:42:48'),
(25, 'item edit', 'web', '2021-07-09 05:42:48', '2021-07-09 05:42:48'),
(26, 'item delete', 'web', '2021-07-09 05:42:48', '2021-07-09 05:42:48'),
(27, 'project category view', 'web', '2021-07-09 05:43:07', '2021-07-09 05:43:07'),
(28, 'project category create', 'web', '2021-07-09 05:43:07', '2021-07-09 05:43:07'),
(29, 'project category edit', 'web', '2021-07-09 05:43:07', '2021-07-09 05:43:07'),
(30, 'project category delete', 'web', '2021-07-09 05:43:07', '2021-07-09 05:43:07'),
(31, 'project view', 'web', '2021-07-09 05:43:19', '2021-07-09 05:43:19'),
(32, 'project create', 'web', '2021-07-09 05:43:19', '2021-07-09 05:43:19'),
(33, 'project edit', 'web', '2021-07-09 05:43:19', '2021-07-09 05:43:19'),
(34, 'project delete', 'web', '2021-07-09 05:43:19', '2021-07-09 05:43:19'),
(35, 'team department view', 'web', '2021-07-09 05:43:30', '2021-07-09 05:43:30'),
(36, 'team department create', 'web', '2021-07-09 05:43:30', '2021-07-09 05:43:30'),
(37, 'team department edit', 'web', '2021-07-09 05:43:30', '2021-07-09 05:43:30'),
(38, 'team department delete', 'web', '2021-07-09 05:43:30', '2021-07-09 05:43:30'),
(39, 'team view', 'web', '2021-07-09 05:43:39', '2021-07-09 05:43:39'),
(40, 'team create', 'web', '2021-07-09 05:43:39', '2021-07-09 05:43:39'),
(41, 'team edit', 'web', '2021-07-09 05:43:39', '2021-07-09 05:43:39'),
(42, 'team delete', 'web', '2021-07-09 05:43:39', '2021-07-09 05:43:39'),
(43, 'client view', 'web', '2021-07-09 05:43:50', '2021-07-09 05:43:50'),
(44, 'client create', 'web', '2021-07-09 05:43:50', '2021-07-09 05:43:50'),
(45, 'client edit', 'web', '2021-07-09 05:43:50', '2021-07-09 05:43:50'),
(46, 'client delete', 'web', '2021-07-09 05:43:50', '2021-07-09 05:43:50'),
(47, 'testimonial view', 'web', '2021-07-09 05:43:58', '2021-07-09 05:43:58'),
(48, 'testimonial create', 'web', '2021-07-09 05:43:58', '2021-07-09 05:43:58'),
(49, 'testimonial edit', 'web', '2021-07-09 05:43:58', '2021-07-09 05:43:58'),
(50, 'testimonial delete', 'web', '2021-07-09 05:43:58', '2021-07-09 05:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `project_category_id`, `description`, `image`, `url`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TOMORROW', 'tomorrow', 1, NULL, 'v34DbRQ6EWd9-090721.png', 'https://www.youtube.com/embed/tMw-vA12d0Y', NULL, NULL, NULL, 'active', '2021-07-08 23:05:32', '2021-07-09 06:46:53'),
(2, 'song', 'song', 1, NULL, 'VqnJgmSYxuRf-090721.jpg', 'https://player.vimeo.com/video/459168381', NULL, NULL, NULL, 'active', '2021-07-08 23:07:13', '2021-07-09 02:16:21'),
(3, 'Grameenphone', 'grameenphone', 1, NULL, 'JctwFp3Gbniw-090721.jpg', 'https://www.youtube.com/embed/-uIUtSwJIos', NULL, NULL, NULL, 'inactive', '2021-07-09 00:29:06', '2021-07-09 00:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Animation', 'animation', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2021-07-06 22:30:21', '2021-07-06 22:30:21'),
(2, 'Short Flim', 'short-flim', 1, NULL, NULL, NULL, NULL, NULL, 'inactive', '2021-07-06 22:35:40', '2021-07-06 22:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'web', '2021-07-05 14:12:03', '2021-07-05 14:12:03'),
(2, 'super admin', 'web', '2021-07-05 14:12:04', '2021-07-05 14:12:04'),
(3, 'uncategorized', 'web', '2021-07-05 14:12:04', '2021-07-05 14:12:04'),
(5, 'admin', 'web', '2021-07-11 07:44:54', '2021-07-11 07:44:54'),
(6, 'director', 'web', '2021-07-11 07:58:03', '2021-07-11 07:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 5),
(11, 6),
(12, 6),
(15, 6),
(16, 6),
(27, 6),
(28, 6),
(31, 6),
(32, 6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Digholi', '2021-05-30 14:46:46', '2021-06-02 06:08:55'),
(2, 'site_tagline', 'diversity is beauty', '2021-05-30 14:47:16', '2021-06-02 04:57:25'),
(3, 'site_url', 'http://digholi.sk', '2021-05-30 14:52:54', '2021-07-06 14:53:50'),
(4, 'site_description', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2021-05-30 14:54:14', '2021-06-02 04:57:25'),
(5, 'site_logo', 'zicwwKL7V5b3-110721.png', '2021-05-30 14:56:44', '2021-07-11 07:31:24'),
(6, 'site_admin_logo', 'VkjQUnNf53t7-110721.png', '2021-05-30 15:00:43', '2021-07-11 07:32:26'),
(7, 'site_time_zone', 'Asia/Dhaka', '2021-05-30 14:59:41', '2021-06-02 05:00:21'),
(8, 'site_date_format', 'F j, Y g:i a', '2021-05-30 15:01:02', '2021-06-02 05:00:29'),
(9, 'site_meta_title', 'Digholi Collectives', '2021-05-30 15:02:17', '2021-06-05 11:54:01'),
(10, 'site_meta_description', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2021-05-30 15:03:34', '2021-06-05 11:54:01'),
(11, 'site_meta_keyword', 'digholi, collective, media, bangladesh natok', '2021-05-30 15:04:13', '2021-06-05 11:54:01'),
(12, 'site_meta_image', 'Y23YzvAn3diJ-110721.png', '2021-05-30 15:05:52', '2021-07-11 07:33:42'),
(13, 'site_meta_author', 'Digholi Collectives', '2021-05-30 15:08:20', '2021-06-05 11:54:01'),
(14, 'site_meta_url', 'http://digholi.sk', '2021-05-30 15:09:27', '2021-07-06 14:55:10'),
(15, 'site_meta_type', 'website', '2021-05-30 15:10:08', '2021-06-05 11:54:01'),
(16, 'site_meta_robot', 'INDEX, FOLLOW', '2021-05-30 15:11:00', '2021-06-05 11:54:01'),
(17, 'site_facebook_app_id', NULL, '2021-05-30 15:12:15', '2021-05-30 15:12:15'),
(18, 'site_twitter_author', '@digholi', '2021-05-30 15:13:02', '2021-07-06 14:55:10'),
(19, 'site_twitter_card', 'summary', '2021-05-30 15:13:35', '2021-06-05 11:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_department_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `slug`, `team_department_id`, `description`, `address`, `phone`, `email`, `image`, `url`, `facebook`, `instagram`, `twitter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Esty Kaysar', 'esty-kaysar', 1, NULL, NULL, NULL, NULL, '3jcMtiLtOFTb-060721.jpg', NULL, NULL, NULL, NULL, 'inactive', '2021-07-06 17:33:50', '2021-07-11 06:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `team_departments`
--

CREATE TABLE `team_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_departments`
--

INSERT INTO `team_departments` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Director', 'director', NULL, 'gemndgk.,bdgnkj,bdakerjbn', 'hcbVpZLP9yQu-060721.png', NULL, NULL, NULL, 'active', '2021-07-06 00:25:48', '2021-07-06 12:25:52'),
(2, 'Writer', 'writer', NULL, 'f,,jbrjad,fjgbkda.j,fbvdlskujgvbdkuvjgdf', 'iHuv6mrViNSI-060721.jpg', NULL, NULL, NULL, 'active', '2021-07-06 00:26:28', '2021-07-06 00:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `description`, `designation`, `company`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Writer', 'In promotion and advertising, a testimonial or show consists of a person\'s written or spoken statement extolling the virtue of a product. The term \"testimonial\" most commonly applies to the sales-pitches attributed to ordinary citizens,', 'CEO', 'hfgh', 'x7BLvnD8LA3k-060721.png', 'inactive', '2021-07-06 17:39:07', '2021-07-11 06:56:26'),
(3, 'Esty Kaysar', 'In promotion and advertising, a testimonial or show consists of a person\'s written or spoken statement extolling the virtue of a product. The term \"testimonial\" most commonly applies to the sales-pitches attributed to ordinary citizens.', 'CEO', 'Digholi', 'RThLUIjpfx5g-110721.jpg', 'active', '2021-07-11 06:55:57', '2021-07-11 06:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','block') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Master Developer', 'dev@digholi.com', NULL, '$2y$10$xvxygxRdqyXDsQbTVPfmpOSI3gF9v6GIT2JXi6eAPv0JmFK8LV7JG', 'Fm56JcbTjJjD-090721.jpg', 'active', NULL, '2021-07-05 14:12:04', '2021-07-09 00:08:43'),
(2, 'Master Super Admin', 'admin@digholi.com', NULL, '$2y$10$w1A41mb0LYDwgyQJLJSMC.GwsBaGzGrNZzcfHJaAnxJamsqkbuZkC', 'RFfa9tx3TiyJ-110721.jpg', 'active', NULL, '2021-07-05 14:12:04', '2021-07-11 06:03:46'),
(3, 'Sultanul Kiasar', 'kaisar@digholi.com', NULL, '$2y$10$.adKb8SLHjSj18bcZDhZY.qTdwkf0RnEmx3kdd5PiUTrB8rY2y5Uu', 'gIHQliWsWg9H-110721.png', 'active', NULL, '2021-07-11 07:48:29', '2021-07-11 07:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clints_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_categories_slug_unique` (`slug`),
  ADD KEY `item_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_project_category_id_foreign` (`project_category_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_categories_slug_unique` (`slug`),
  ADD KEY `project_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_slug_unique` (`slug`),
  ADD KEY `teams_team_department_id_foreign` (`team_department_id`);

--
-- Indexes for table `team_departments`
--
ALTER TABLE `team_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_departments_slug_unique` (`slug`),
  ADD KEY `team_departments_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_departments`
--
ALTER TABLE `team_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD CONSTRAINT `item_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD CONSTRAINT `project_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_team_department_id_foreign` FOREIGN KEY (`team_department_id`) REFERENCES `team_departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_departments`
--
ALTER TABLE `team_departments`
  ADD CONSTRAINT `team_departments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `team_departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
