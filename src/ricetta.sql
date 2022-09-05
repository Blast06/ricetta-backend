-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2021 at 12:28 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ricetta`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stater', 1, '2021-09-07 00:45:30', '2021-09-07 00:52:48'),
(2, 'Snack', 1, '2021-09-07 00:47:50', '2021-09-07 00:47:50'),
(3, 'Breakfast', 1, '2021-09-07 00:49:03', '2021-09-07 00:49:03'),
(4, 'Main', 1, '2021-09-07 00:52:58', '2021-09-07 00:52:58'),
(5, 'Dessert', 1, '2021-09-07 00:53:11', '2021-09-07 00:53:11'),
(6, 'Drink', 1, '2021-09-07 00:53:32', '2021-09-07 00:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_07_27_112905_create_recipes_table', 1),
(6, '2021_07_27_113003_create_recipe_ingredients_table', 1),
(7, '2021_07_27_113127_create_recipe_steps_table', 1),
(8, '2021_07_27_113207_create_step_utensils_table', 1),
(9, '2021_07_27_113230_create_user_likes_table', 1),
(10, '2021_07_27_113238_create_user_ratings_table', 1),
(11, '2021_07_27_113300_create_user_bookmarks_table', 1),
(12, '2021_07_27_113347_create_categories_table', 1),
(13, '2021_07_27_113358_create_static_data_table', 1),
(14, '2021_07_27_120703_create_media_table', 1),
(15, '2021_09_13_072921_create_sliders_table',1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portion_unit` int DEFAULT NULL,
  `portion_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'piece , servings',
  `difficulty` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preparation_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baking_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resting_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dish_type` text COLLATE utf8mb4_unicode_ci,
  `cuisine` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_use` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_characteristics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_steps`
--

CREATE TABLE `recipe_steps` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `ingredient_used_id` text COLLATE utf8mb4_unicode_ci,
  `media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'category',
  `type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'category_id',
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `static_data`
--

CREATE TABLE `static_data` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_data`
--

INSERT INTO `static_data` (`id`, `type`, `value`, `label`, `created_at`, `updated_at`) VALUES
(1, 'cuisine', 'chinese', 'Chinese', '2021-09-07 00:57:44', '2021-09-07 00:57:44'),
(2, 'cuisine', 'italian', 'Italian', '2021-09-07 00:58:16', '2021-09-07 00:58:16'),
(3, 'cuisine', 'european', 'European', '2021-09-07 00:58:47', '2021-09-07 00:58:47'),
(4, 'cuisine', 'asian', 'Asian', '2021-09-07 00:59:01', '2021-09-07 00:59:01'),
(5, 'cuisine', 'american', 'American', '2021-09-07 00:59:31', '2021-09-07 00:59:31'),
(6, 'cuisine', 'indian', 'Indian', '2021-09-07 00:59:48', '2021-09-07 00:59:48'),
(7, 'ingredients', 'flour', 'flour', '2021-09-07 10:49:04', '2021-09-07 10:49:04'),
(8, 'ingredients', 'bread_flour', 'bread flour', '2021-09-08 07:06:47', '2021-09-08 07:06:47'),
(9, 'ingredients', 'pecorino_cheese', 'Pecorino cheese', '2021-09-08 07:08:54', '2021-09-08 07:08:54'),
(10, 'ingredients', 'pepper', 'pepper', '2021-09-08 07:09:15', '2021-09-08 07:09:15'),
(11, 'ingredients', 'shredded_mozzarella_cheese', 'shredded mozzarella cheese', '2021-09-08 07:09:31', '2021-09-08 07:09:31'),
(12, 'ingredients', 'active_dry_yeast', 'active dry yeast', '2021-09-08 07:09:52', '2021-09-08 07:09:52'),
(13, 'ingredients', 'water_(lukewarm)', 'water (lukewarm)', '2021-09-08 07:10:13', '2021-09-08 07:10:13'),
(14, 'ingredients', 'sugar', 'sugar', '2021-09-08 07:10:31', '2021-09-08 07:10:31'),
(15, 'ingredients', 'water_(hot)', 'water (hot)', '2021-09-08 07:12:11', '2021-09-08 07:12:11'),
(16, 'ingredients', 'white_sesame_seeds', 'white sesame seeds', '2021-09-08 07:12:36', '2021-09-08 07:12:36'),
(17, 'ingredients', 'vegetable_oil', 'vegetable oil', '2021-09-08 07:13:16', '2021-09-08 07:13:16'),
(18, 'ingredients', 'chinese_five-spice_powder', 'Chinese five-spice powder', '2021-09-08 07:15:08', '2021-09-08 07:15:08'),
(19, 'ingredients', 'sweet_soy_sauce', 'sweet soy sauce', '2021-09-08 07:15:21', '2021-09-08 07:15:21'),
(20, 'ingredients', 'egg_noodles', 'egg noodles', '2021-09-08 07:16:50', '2021-09-08 07:16:50'),
(21, 'ingredients', 'carrot', 'carrot', '2021-09-08 07:17:06', '2021-09-08 07:17:06'),
(22, 'ingredients', 'green_beans', 'green beans', '2021-09-08 07:17:22', '2021-09-08 07:17:22'),
(23, 'ingredients', 'snow_peas', 'snow peas', '2021-09-08 07:17:35', '2021-09-08 07:17:35'),
(24, 'ingredients', 'red_bell_pepper', 'red bell pepper', '2021-09-08 07:19:49', '2021-09-08 07:19:49'),
(25, 'ingredients', 'scallions', 'scallions', '2021-09-08 07:21:01', '2021-09-08 07:21:01'),
(26, 'ingredients', 'rice_wine', 'rice wine', '2021-09-08 07:21:23', '2021-09-08 07:21:23'),
(27, 'ingredients', 'black_sesame_seeds', 'black sesame seeds', '2021-09-08 07:22:13', '2021-09-08 07:22:13'),
(28, 'ingredients', 'chicken_breasts', 'chicken breasts', '2021-09-08 07:22:59', '2021-09-08 07:22:59'),
(29, 'ingredients', 'tomato_paste', 'tomato paste', '2021-09-08 07:23:10', '2021-09-08 07:23:10'),
(30, 'ingredients', 'carrots', 'carrots', '2021-09-08 07:23:26', '2021-09-08 07:23:26'),
(31, 'ingredients', 'red_curry_paste', 'red curry paste', '2021-09-08 07:23:45', '2021-09-08 07:23:45'),
(32, 'ingredients', 'coconut_milk', 'coconut milk', '2021-09-08 07:23:58', '2021-09-08 07:23:58'),
(33, 'ingredients', 'yogurt', 'yogurt', '2021-09-08 07:24:15', '2021-09-08 07:24:15'),
(34, 'ingredients', 'egg', 'egg', '2021-09-08 07:24:49', '2021-09-08 07:24:49'),
(35, 'ingredients', 'maple_syrup', 'maple syrup', '2021-09-08 07:25:06', '2021-09-08 07:25:06'),
(36, 'ingredients', 'buttermilk', 'buttermilk', '2021-09-08 07:25:26', '2021-09-08 07:25:26'),
(37, 'ingredients', 'unsalted_butter_(for_frying)', 'unsalted butter (for frying)', '2021-09-08 07:25:40', '2021-09-08 07:25:40'),
(38, 'ingredients', 'penne', 'penne', '2021-09-08 07:26:47', '2021-09-08 07:26:47'),
(39, 'ingredients', 'cream', 'cream', '2021-09-08 07:27:00', '2021-09-08 07:27:00'),
(40, 'ingredients', 'dried_basil', 'dried basil', '2021-09-08 07:27:12', '2021-09-08 07:27:12'),
(41, 'ingredients', 'parmesan_cheese', 'Parmesan cheese', '2021-09-08 07:27:21', '2021-09-08 07:27:21'),
(42, 'ingredients', 'mozzarella_cheese', 'mozzarella cheese', '2021-09-08 07:27:29', '2021-09-08 07:27:29'),
(43, 'ingredients', 'parsley', 'parsley', '2021-09-08 07:27:37', '2021-09-08 07:27:37'),
(44, 'ingredients', 'olive_oil', 'olive oil', '2021-09-08 07:27:52', '2021-09-08 07:27:52'),
(45, 'ingredients', 'firm_tofu', 'firm tofu', '2021-09-08 07:28:35', '2021-09-08 07:28:35'),
(46, 'ingredients', 'bell_peppers', 'bell peppers', '2021-09-08 07:28:47', '2021-09-08 07:28:47'),
(47, 'ingredients', 'light_soy_sauce', 'light soy sauce', '2021-09-08 07:29:02', '2021-09-08 07:29:02'),
(48, 'ingredients', 'vegetable_broth', 'vegetable broth', '2021-09-08 07:29:21', '2021-09-08 07:29:21'),
(49, 'ingredients', 'potatoes', 'potatoes', '2021-09-08 07:30:02', '2021-09-08 07:30:02'),
(50, 'ingredients', 'eggplant', 'eggplant', '2021-09-08 07:30:19', '2021-09-08 07:30:19'),
(51, 'ingredients', 'soy_cream', 'soy cream', '2021-09-08 07:30:52', '2021-09-08 07:30:52'),
(52, 'ingredients', 'bell_pepper_paste', 'bell pepper paste', '2021-09-08 07:31:09', '2021-09-08 07:31:09'),
(53, 'ingredients', 'smoked_salmon', 'smoked salmon', '2021-09-08 07:34:35', '2021-09-08 07:34:35'),
(54, 'ingredients', 'mini_cucumbers', 'mini cucumbers', '2021-09-08 07:34:49', '2021-09-08 07:34:49'),
(55, 'ingredients', 'red_wine_vinegar', 'red wine vinegar', '2021-09-08 07:35:09', '2021-09-08 07:35:09'),
(56, 'ingredients', 'grainy_mustard', 'grainy mustard', '2021-09-08 07:35:25', '2021-09-08 07:35:25'),
(57, 'ingredients', 'lemon', 'lemon', '2021-09-08 07:35:41', '2021-09-08 07:35:41'),
(58, 'ingredients', 'baguette', 'baguette', '2021-09-08 07:36:02', '2021-09-08 07:36:02'),
(59, 'ingredients', 'canned_tuna', 'canned tuna', '2021-09-08 07:36:19', '2021-09-08 07:36:19'),
(60, 'ingredients', 'jarred_pitted_kalamata_olives', 'jarred pitted Kalamata olives', '2021-09-08 07:36:29', '2021-09-08 07:36:29'),
(61, 'ingredients', 'sherry_vinegar', 'sherry vinegar', '2021-09-08 07:36:48', '2021-09-08 07:36:48'),
(62, 'ingredients', 'capers', 'capers', '2021-09-08 07:36:56', '2021-09-08 07:36:56'),
(63, 'ingredients', 'full-fat_greek_yogurt', 'full-fat Greek yogurt', '2021-09-08 07:46:20', '2021-09-08 07:46:20'),
(64, 'ingredients', 'creamy_peanut_butter', 'creamy peanut butter', '2021-09-08 07:46:37', '2021-09-08 07:46:37'),
(65, 'ingredients', 'sesame_seeds', 'sesame seeds', '2021-09-08 07:46:50', '2021-09-08 07:46:50'),
(66, 'ingredients', 'blueberries_(frozen)', 'blueberries (frozen)', '2021-09-08 07:47:06', '2021-09-08 07:47:06'),
(67, 'ingredients', 'granola', 'granola', '2021-09-08 07:47:17', '2021-09-08 07:47:17'),
(68, 'ingredients', 'honey', 'honey', '2021-09-08 07:47:31', '2021-09-08 07:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `step_utensils`
--

CREATE TABLE `step_utensils` (
  `id` bigint UNSIGNED NOT NULL,
  `step_id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_use` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'for serving, optional',
  `special_characteristics` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'with lid,heavy-bottomed',
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'large ,small',
  `sequence` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `email_verified_at`, `user_type`, `login_type`, `bio`, `gender`, `dob`, `player_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '$2y$10$2spOqTyUZlEauQNDTbS1BO2YznCPRpUa.i/GTlcSEScPfM.clUoJm', NULL, 'admin', NULL, NULL, 'Male', '2021-09-10', NULL, 1, NULL, '2021-07-27 04:20:00', '2021-09-10 12:42:28'),
(2, 'Demo admin', 'demo@admin.com', 'demoadmin', '$2y$10$LHnCvMFXkZQ1wHEQMwdZduht0yweiM55B1Ab4dVIb.ooe//9.gKqy', NULL, 'demo_admin', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-08-11 23:04:24', '2021-05-29 00:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_bookmarks`
--

CREATE TABLE `user_bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` double DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_user_id_foreign` (`user_id`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_ingredients_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `recipe_steps`
--
ALTER TABLE `recipe_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_steps_recipe_id_foreign` (`recipe_id`);
--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `static_data`
--
ALTER TABLE `static_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step_utensils`
--
ALTER TABLE `step_utensils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `step_utensils_step_id_foreign` (`step_id`),
  ADD KEY `step_utensils_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_bookmarks_recipe_id_foreign` (`recipe_id`),
  ADD KEY `user_bookmarks_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_likes_recipe_id_foreign` (`recipe_id`),
  ADD KEY `user_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ratings_recipe_id_foreign` (`recipe_id`),
  ADD KEY `user_ratings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_steps`
--
ALTER TABLE `recipe_steps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `static_data`
--
ALTER TABLE `static_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `step_utensils`
--
ALTER TABLE `step_utensils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `recipe_ingredients_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipe_steps`
--
ALTER TABLE `recipe_steps`
  ADD CONSTRAINT `recipe_steps_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `step_utensils`
--
ALTER TABLE `step_utensils`
  ADD CONSTRAINT `step_utensils_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `step_utensils_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `recipe_steps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  ADD CONSTRAINT `user_bookmarks_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD CONSTRAINT `user_likes_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD CONSTRAINT `user_ratings_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
