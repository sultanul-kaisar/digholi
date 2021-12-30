-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 02:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digholi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_photos`
--

CREATE TABLE `about_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `name`, `blog_category_id`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Paharpur', 'paharpur', 'AAA', 1, '<p><b>Somapura Mahavihara</b> (<a href=\"https://en.wikipedia.org/wiki/Bengali_language\" title=\"Bengali language\">Bengali</a>: <span lang=\"bn\">সোমপুর মহাবিহার</span>, <small><a href=\"https://en.wikipedia.org/wiki/Romanization_of_Bengali\" class=\"mw-redirect\" title=\"Romanization of Bengali\">romanized</a>:&nbsp;</small><i title=\"Bengali-language romanization\" lang=\"bn-Latn\">Shompur Môhabihar</i>) in Paharpur, <a href=\"https://en.wikipedia.org/wiki/Badalgachhi_Upazila\" title=\"Badalgachhi Upazila\">Badalgachhi</a>, <a href=\"https://en.wikipedia.org/wiki/Naogaon_District\" title=\"Naogaon District\">Naogaon</a>, <a href=\"https://en.wikipedia.org/wiki/Bangladesh\" title=\"Bangladesh\">Bangladesh</a> is among the best known <a href=\"https://en.wikipedia.org/wiki/Vihara\" class=\"mw-redirect\" title=\"Vihara\">viharas</a>, monasteries, in the <a href=\"https://en.wikipedia.org/wiki/Indian_Subcontinent\" class=\"mw-redirect\" title=\"Indian Subcontinent\">Indian Subcontinent</a> and is one of the most important archaeological sites in the country. It is also one of the earliest sites of <a href=\"https://en.wikipedia.org/wiki/Bengal\" title=\"Bengal\">Bengal</a>, where significant numbers of <a href=\"https://en.wikipedia.org/wiki/Hindu\" class=\"mw-redirect\" title=\"Hindu\">Hindu</a> statues were found. It was designated as a UNESCO <a href=\"https://en.wikipedia.org/wiki/World_Heritage_Site\" title=\"World Heritage Site\">World Heritage Site</a> in 1985. It is one of the most famous examples of architecture in pre-Islamic <a href=\"https://en.wikipedia.org/wiki/India\" title=\"India\">India</a>. It dates from a period to the nearby <a href=\"https://en.wikipedia.org/wiki/Halud_Vihara\" title=\"Halud Vihara\">Halud Vihara</a> and to the <a href=\"https://en.wikipedia.org/wiki/Sitakot_Vihara\" title=\"Sitakot Vihara\">Sitakot Vihara</a> in <a href=\"https://en.wikipedia.org/wiki/Nawabganj_Upazila,_Dinajpur\" title=\"Nawabganj Upazila, Dinajpur\">Nawabganj Upazila</a> of Dinajpur District.</p>', 'dWnDQQlLBLdH-261121.jpg', NULL, NULL, NULL, 'active', '2021-11-26 12:48:32', '2021-11-26 12:48:32'),
(2, 'Sent-Martin', 'sent-martin', 'Wikipedia', 2, '<p><b>সেন্টমার্টিন</b> বাংলাদেশের একমাত্র প্রবাল দ্বীপ যা মূলভূখন্ডের সর্ব দক্ষিণে এবং <a href=\"https://bn.wikivoyage.org/wiki/%E0%A6%95%E0%A6%95%E0%A7%8D%E0%A6%B8%E0%A6%AC%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0_%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE\" title=\"কক্সবাজার জেলা\">কক্সবাজার জেলা</a>\r\n শহর থেকে ১২০ কিলোমিটার দূরে ১৭ বর্গ কিলোমিটারের একটি ক্ষুদ্র দ্বীপ। \r\nস্থানীয় ভাষায় সেন্টমার্টিনকে নারিকেল জিঞ্জিরা বলেও ডাকা হয়। অপূর্ব \r\nপ্রাকৃতিক সৌন্দর্য্যমন্ডিত এ দ্বীপটি বাংলাদেশের অন্যতম পর্যটন স্থান \r\nহিসাবে জায়গা করে নিয়েছে। নীল আকাশের সাথে সমুদ্রের নীল জলের মিতালী, \r\nসারি সারি নারিকেল গাছ এ দ্বীপকে করেছে অনন্য।\r\n</p>\r\n\r\n<div class=\"mw-h2section\"><h2><span id=\".E0.A6.AF.E0.A6.BE.E0.A6.A4.E0.A6.BE.E0.A6.AF.E0.A6.BC.E0.A6.BE.E0.A6.A4\"></span><span class=\"mw-headline\" id=\"যাতায়াত\">যাতায়াত</span></h2></div><p>সেন্টমার্টিন\r\n যেতে হলে প্রথমে কক্সবাজার জেলার টেকনাফে আসতে হবে। ঢাকা থেকে বাসে করে \r\nসরাসরি টেকনাফে যাওয়া যায়। ঢাকার ফকিরাপুল ও সায়েদাবাদ থেকে শ্যামলী, \r\nসেন্টমার্টিন পরিবহন, ঈগল, এস আলম, মডার্ন লাইন, গ্রীন লাইন ইত্যাদি বাস \r\nসরাসরি টেকনাফ যায়। ১০-১২ ঘণ্টার এই ভ্রমণ ভাড়া বাস ও ক্লাস অনুযায়ী \r\nসাধারণত ৯০০ থেকে ২০০০ টাকার মধ্যে হয়ে থাকে।\r\nঅথবা ঢাকা থেকে প্রথমে কক্সবাজার এসে তারপর কক্সবাজার থেকে টেকনাফ যাওয়া \r\nযাবে। ঢাকা থেকে প্রতিদিনই গ্রীন লাইন, সোহাগ, টিআর ট্রাভেলস, শ্যামলী, \r\nহানিফ, সৌদিয়া, ঈগল, এস আলম, সিল্ক লাইন, সেন্টমার্টিন ইত্যাদি অনেক বাস \r\nকক্সবাজারের উদ্দেশ্যে ছেড়ে আসে, বাস ভেদে ভাড়া সাধারণত ৯০০ টাকা থেকে \r\n২৫০০ টাকার মধ্যে। এছাড়াও ঢাকা থেকে বিমানে সরাসরি কক্সবাজার যাওয়া যায়।\r\n</p><p>আর যদি ট্রেনে করে ঢাকা থেকে চট্টগ্রাম যেতে হলে তবে ঢাকা থেকে \r\nসোনার বাংলা, তূর্ণা-নিশীথা, সুবর্ন এক্সপ্রেস, মহানগর প্রভাতী/গোধূলী, \r\nচট্রগ্রাম মেইলে ট্রেন থেকে নিজের সুবিধামত যাত্রা করতে হবে। তারপর \r\nচট্টগ্রামের বহদ্দার হাট কিংবা নতুন ব্রিজ এলাকা থেকে প্রতি ঘণ্টায় \r\nকক্সবাজারের গাড়ি পাওয়া যায়। এদের মধ্যে ভালো সার্ভিস পেতে এস আলম, \r\nসৌদিয়া, ইউনিক ইত্যাদি বাসে যাওয়া যাবে।\r\n</p><p>কক্সবাজার থেকে লোকাল বাস বা মাইক্রো/জিপ ভাড়া করে টেকনাফ যাওয়া \r\nযাবে। কক্সবাজার থেকে টেকনাফ যেতে সময় লাগে অবস্থা ভেদে প্রায় এক থেকে \r\nদুই ঘণ্টা। টেকনাফ থেকে সেন্টমার্টিনে প্রতিদিন সকাল থেকে আসা-যাওয়া করে \r\nকুতুবদিয়া, কেয়ারী সিন্দাবাদ, ঈগল, সুন্দরবন ইত্যাদি জাহাজ। এছাড়াও এই \r\nসমুদ্র রুটে বেশ কিছু ট্রলার ও স্পিডবোট চলাচল করে। জাহাজে করে টেকনাফ থেকে\r\n সেন্টমার্টিন যেতে সময় লাগে দুই ঘণ্টা থেকে আড়াই ঘণ্টা। জাহাজের \r\nশ্রেনীভেদে আপ-ডাউন ভাড়া ৫৫০-৮০০ টাকার মত। জেটি ঘাট থেকে প্রতিদিন \r\nজাহাজগুলো সকাল ৯.০০-৯.৩০ মিনিটে সেন্টমার্টিনের উদ্দেশ্যে ছেড়ে যায় এবং \r\nসেন্টমার্টিন থেকে ফেরত আসে বিকাল ৩.০০-৩.৩০ মিনিটে। তাই সময়ের আগে জেটি \r\nঘাটে উপস্থিত না হতে পারলে জাহাজ মিস হবার সম্ভাবনা আছে। আর এমন ক্ষেত্রে \r\nট্রলারে করে ফেরা ছাড়া উপায় নেই যা বিপদজনক। যারা সেন্টমার্টিনে রাত্রি \r\nযাপন করেন তাঁরা পরের দিন একট জাহাজে ফেরার সুযোগ পান যা পূর্বেই টিকিটে \r\nউল্লেখ থাকে।\r\n</p><p>সধারণত নভেম্বর থেকে মার্চ এই পাঁচ মাস জাহাজ চলে। এই সময় ছাড়া \r\nঅন্য সময়ে গেলে ট্রলার কিংবা স্পিডবোট দিয়ে যেতে হবে। শীত মৌসূম ছাড়া \r\nবাকি সময় সাগর উত্তাল থাকে, তাই এই সময়ে ভ্রমণ নিরাপদ নয়।\r\n</p>', 'tz4O4gmNCVot-261121.jpg', NULL, NULL, NULL, 'active', '2021-11-26 12:53:00', '2021-11-26 12:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `parent_id`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Travel', 'travel', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2021-11-26 12:45:04', '2021-11-26 12:45:04'),
(2, 'Tour-Places', 'tour-places', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2021-11-26 12:51:09', '2021-11-26 12:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `blog_photos`
--

CREATE TABLE `blog_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `read_status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `g-recaptcha-response` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_photos`
--

CREATE TABLE `contact_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover_photos`
--

CREATE TABLE `cover_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `index_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_view_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_view_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_view_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `index_photos`
--

CREATE TABLE `index_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `index_photos`
--

INSERT INTO `index_photos` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'q2v62G1wm33z-161221.gif', 'active', '2021-12-16 09:57:13', '2021-12-16 09:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(17, '2021_07_09_164328_create_blog_categories_table', 10),
(18, '2021_07_18_032559_create_contacts_table', 11),
(19, '2021_07_18_032560_create_blogs_table', 11),
(20, '2021_07_19_155616_create_gallery_categories_table', 11),
(21, '2021_07_22_131755_create_galleries_table', 11),
(22, '2021_07_26_143956_create_comments_table', 11),
(23, '2021_07_29_141740_create_sliders_table', 11),
(24, '2021_10_22_160713_create_cover_photos_table', 11),
(25, '2021_12_16_120440_create_about_photos_table', 12),
(26, '2021_12_16_120902_create_blog_photos_table', 12),
(27, '2021_12_16_120917_create_contact_photos_table', 12),
(28, '2021_12_16_120936_create_gallery_photos_table', 12),
(29, '2021_12_16_121004_create_team_photos_table', 12),
(30, '2021_12_16_121024_create_service_photos_table', 12),
(31, '2021_12_16_121040_create_index_photos_table', 12),
(32, '2021_12_16_122410_create_portfolio_photos_table', 12);

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
(13, 'testimonial', 'active', '2021-07-09 05:43:58', '2021-07-09 05:43:58'),
(14, 'cover photo', 'active', '2021-12-16 10:08:45', '2021-12-16 10:08:45');

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
(50, 'testimonial delete', 'web', '2021-07-09 05:43:58', '2021-07-09 05:43:58'),
(51, 'cover photo view', 'web', '2021-12-16 10:08:45', '2021-12-16 10:08:45'),
(52, 'cover photo create', 'web', '2021-12-16 10:08:45', '2021-12-16 10:08:45'),
(53, 'cover photo edit', 'web', '2021-12-16 10:08:45', '2021-12-16 10:08:45'),
(54, 'cover photo delete', 'web', '2021-12-16 10:08:45', '2021-12-16 10:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_photos`
--

CREATE TABLE `portfolio_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `service_photos`
--

CREATE TABLE `service_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `align` enum('left','right') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `align`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'zkJmezofc2aG-031221.jpg', 'left', 'active', '2021-12-03 10:41:48', '2021-12-03 10:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_department_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `team_photos`
--

CREATE TABLE `team_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Master Developer', 'dev@digholi.com', NULL, '$2y$10$xvxygxRdqyXDsQbTVPfmpOSI3gF9v6GIT2JXi6eAPv0JmFK8LV7JG', 'O0m9SdDvTZAa-261121.png', 'active', NULL, '2021-07-05 14:12:04', '2021-11-26 07:56:57'),
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
-- Indexes for table `about_photos`
--
ALTER TABLE `about_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `blog_photos`
--
ALTER TABLE `blog_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clints_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_photos`
--
ALTER TABLE `contact_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_photos`
--
ALTER TABLE `cover_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`),
  ADD KEY `galleries_gallery_category_id_foreign` (`gallery_category_id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_categories_slug_unique` (`slug`),
  ADD KEY `gallery_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_photos`
--
ALTER TABLE `index_photos`
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
-- Indexes for table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `service_photos`
--
ALTER TABLE `service_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `team_photos`
--
ALTER TABLE `team_photos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_photos`
--
ALTER TABLE `about_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_photos`
--
ALTER TABLE `blog_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_photos`
--
ALTER TABLE `contact_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cover_photos`
--
ALTER TABLE `cover_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `index_photos`
--
ALTER TABLE `index_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `portfolio_photos`
--
ALTER TABLE `portfolio_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `service_photos`
--
ALTER TABLE `service_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `team_photos`
--
ALTER TABLE `team_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_gallery_category_id_foreign` FOREIGN KEY (`gallery_category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD CONSTRAINT `gallery_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE;

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
