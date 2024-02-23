-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2024 at 04:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemsimpanlagu`
--

-- --------------------------------------------------------

--
-- Table structure for table `choose_users`
--

CREATE TABLE `choose_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilih_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choose_users`
--

INSERT INTO `choose_users` (`id`, `pilih_pengguna`, `created_at`, `updated_at`) VALUES
(1, 'Syarikat Rakaman', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(2, 'Stesen Radio', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(3, 'Penilai', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(4, 'Admin', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(5, 'Super Admin', '2023-11-22 17:39:02', '2023-11-22 17:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'af', NULL, NULL),
(2, 'Albania', 'al', NULL, NULL),
(3, 'Algeria', 'dz', NULL, NULL),
(4, 'American Samoa', 'as', NULL, NULL),
(5, 'Andorra', 'ad', NULL, NULL),
(6, 'Angola', 'ao', NULL, NULL),
(7, 'Anguilla', 'ai', NULL, NULL),
(8, 'Antarctica', 'aq', NULL, NULL),
(9, 'Antigua and Barbuda', 'ag', NULL, NULL),
(10, 'Argentina', 'ar', NULL, NULL),
(11, 'Armenia', 'am', NULL, NULL),
(12, 'Aruba', 'aw', NULL, NULL),
(13, 'Australia', 'au', NULL, NULL),
(14, 'Austria', 'at', NULL, NULL),
(15, 'Azerbaijan', 'az', NULL, NULL),
(16, 'Bahamas', 'bs', NULL, NULL),
(17, 'Bahrain', 'bh', NULL, NULL),
(18, 'Bangladesh', 'bd', NULL, NULL),
(19, 'Barbados', 'bb', NULL, NULL),
(20, 'Belarus', 'by', NULL, NULL),
(21, 'Belgium', 'be', NULL, NULL),
(22, 'Belize', 'bz', NULL, NULL),
(23, 'Benin', 'bj', NULL, NULL),
(24, 'Bermuda', 'bm', NULL, NULL),
(25, 'Bhutan', 'bt', NULL, NULL),
(26, 'Bolivia', 'bo', NULL, NULL),
(27, 'Bosnia and Herzegovina', 'ba', NULL, NULL),
(28, 'Botswana', 'bw', NULL, NULL),
(29, 'Brazil', 'br', NULL, NULL),
(30, 'British Indian Ocean Territory', 'io', NULL, NULL),
(31, 'British Virgin Islands', 'vg', NULL, NULL),
(32, 'Brunei', 'bn', NULL, NULL),
(33, 'Bulgaria', 'bg', NULL, NULL),
(34, 'Burkina Faso', 'bf', NULL, NULL),
(35, 'Burundi', 'bi', NULL, NULL),
(36, 'Cambodia', 'kh', NULL, NULL),
(37, 'Cameroon', 'cm', NULL, NULL),
(38, 'Canada', 'ca', NULL, NULL),
(39, 'Cape Verde', 'cv', NULL, NULL),
(40, 'Cayman Islands', 'ky', NULL, NULL),
(41, 'Central African Republic', 'cf', NULL, NULL),
(42, 'Chad', 'td', NULL, NULL),
(43, 'Chile', 'cl', NULL, NULL),
(44, 'China', 'cn', NULL, NULL),
(45, 'Christmas Island', 'cx', NULL, NULL),
(46, 'Cocos Islands', 'cc', NULL, NULL),
(47, 'Colombia', 'co', NULL, NULL),
(48, 'Comoros', 'km', NULL, NULL),
(49, 'Cook Islands', 'ck', NULL, NULL),
(50, 'Costa Rica', 'cr', NULL, NULL),
(51, 'Croatia', 'hr', NULL, NULL),
(52, 'Cuba', 'cu', NULL, NULL),
(53, 'Curacao', 'cw', NULL, NULL),
(54, 'Cyprus', 'cy', NULL, NULL),
(55, 'Czech Republic', 'cz', NULL, NULL),
(56, 'Democratic Republic of the Congo', 'cd', NULL, NULL),
(57, 'Denmark', 'dk', NULL, NULL),
(58, 'Djibouti', 'dj', NULL, NULL),
(59, 'Dominica', 'dm', NULL, NULL),
(60, 'Dominican Republic', 'do', NULL, NULL),
(61, 'East Timor', 'tl', NULL, NULL),
(62, 'Ecuador', 'ec', NULL, NULL),
(63, 'Egypt', 'eg', NULL, NULL),
(64, 'El Salvador', 'sv', NULL, NULL),
(65, 'Equatorial Guinea', 'gq', NULL, NULL),
(66, 'Eritrea', 'er', NULL, NULL),
(67, 'Estonia', 'ee', NULL, NULL),
(68, 'Ethiopia', 'et', NULL, NULL),
(69, 'Falkland Islands', 'fk', NULL, NULL),
(70, 'Faroe Islands', 'fo', NULL, NULL),
(71, 'Fiji', 'fj', NULL, NULL),
(72, 'Finland', 'fi', NULL, NULL),
(73, 'France', 'fr', NULL, NULL),
(74, 'French Polynesia', 'pf', NULL, NULL),
(75, 'Gabon', 'ga', NULL, NULL),
(76, 'Gambia', 'gm', NULL, NULL),
(77, 'Georgia', 'ge', NULL, NULL),
(78, 'Germany', 'de', NULL, NULL),
(79, 'Ghana', 'gh', NULL, NULL),
(80, 'Gibraltar', 'gi', NULL, NULL),
(81, 'Greece', 'gr', NULL, NULL),
(82, 'Greenland', 'gl', NULL, NULL),
(83, 'Grenada', 'gd', NULL, NULL),
(84, 'Guam', 'gu', NULL, NULL),
(85, 'Guatemala', 'gt', NULL, NULL),
(86, 'Guernsey', 'gg', NULL, NULL),
(87, 'Guinea', 'gn', NULL, NULL),
(88, 'Guinea-Bissau', 'gw', NULL, NULL),
(89, 'Guyana', 'gy', NULL, NULL),
(90, 'Haiti', 'ht', NULL, NULL),
(91, 'Honduras', 'hn', NULL, NULL),
(92, 'Hong Kong', 'hk', NULL, NULL),
(93, 'Hungary', 'hu', NULL, NULL),
(94, 'Iceland', 'is', NULL, NULL),
(95, 'India', 'in', NULL, NULL),
(96, 'Indonesia', 'id', NULL, NULL),
(97, 'Iran', 'ir', NULL, NULL),
(98, 'Iraq', 'iq', NULL, NULL),
(99, 'Ireland', 'ie', NULL, NULL),
(100, 'Isle of Man', 'im', NULL, NULL),
(101, 'Israel', 'il', NULL, NULL),
(102, 'Italy', 'it', NULL, NULL),
(103, 'Ivory Coast', 'ci', NULL, NULL),
(104, 'Jamaica', 'jm', NULL, NULL),
(105, 'Japan', 'jp', NULL, NULL),
(106, 'Jersey', 'je', NULL, NULL),
(107, 'Jordan', 'jo', NULL, NULL),
(108, 'Kazakhstan', 'kz', NULL, NULL),
(109, 'Kenya', 'ke', NULL, NULL),
(110, 'Kiribati', 'ki', NULL, NULL),
(111, 'Kosovo', 'xk', NULL, NULL),
(112, 'Kuwait', 'kw', NULL, NULL),
(113, 'Kyrgyzstan', 'kg', NULL, NULL),
(114, 'Laos', 'la', NULL, NULL),
(115, 'Latvia', 'lv', NULL, NULL),
(116, 'Lebanon', 'lb', NULL, NULL),
(117, 'Lesotho', 'ls', NULL, NULL),
(118, 'Liberia', 'lr', NULL, NULL),
(119, 'Libya', 'ly', NULL, NULL),
(120, 'Liechtenstein', 'li', NULL, NULL),
(121, 'Lithuania', 'lt', NULL, NULL),
(122, 'Luxembourg', 'lu', NULL, NULL),
(123, 'Macau', 'mo', NULL, NULL),
(124, 'North Macedonia', 'mk', NULL, NULL),
(125, 'Madagascar', 'mg', NULL, NULL),
(126, 'Malawi', 'mw', NULL, NULL),
(127, 'Malaysia', 'my', NULL, NULL),
(128, 'Maldives', 'mv', NULL, NULL),
(129, 'Mali', 'ml', NULL, NULL),
(130, 'Malta', 'mt', NULL, NULL),
(131, 'Marshall Islands', 'mh', NULL, NULL),
(132, 'Mauritania', 'mr', NULL, NULL),
(133, 'Mauritius', 'mu', NULL, NULL),
(134, 'Mayotte', 'yt', NULL, NULL),
(135, 'Mexico', 'mx', NULL, NULL),
(136, 'Micronesia', 'fm', NULL, NULL),
(137, 'Moldova', 'md', NULL, NULL),
(138, 'Monaco', 'mc', NULL, NULL),
(139, 'Mongolia', 'mn', NULL, NULL),
(140, 'Montenegro', 'me', NULL, NULL),
(141, 'Montserrat', 'ms', NULL, NULL),
(142, 'Morocco', 'ma', NULL, NULL),
(143, 'Mozambique', 'mz', NULL, NULL),
(144, 'Myanmar', 'mm', NULL, NULL),
(145, 'Namibia', 'na', NULL, NULL),
(146, 'Nauru', 'nr', NULL, NULL),
(147, 'Nepal', 'np', NULL, NULL),
(148, 'Netherlands', 'nl', NULL, NULL),
(149, 'Netherlands Antilles', 'an', NULL, NULL),
(150, 'New Caledonia', 'nc', NULL, NULL),
(151, 'New Zealand', 'nz', NULL, NULL),
(152, 'Nicaragua', 'ni', NULL, NULL),
(153, 'Niger', 'ne', NULL, NULL),
(154, 'Nigeria', 'ng', NULL, NULL),
(155, 'Niue', 'nu', NULL, NULL),
(156, 'North Korea', 'kp', NULL, NULL),
(157, 'Northern Mariana Islands', 'mp', NULL, NULL),
(158, 'Norway', 'no', NULL, NULL),
(159, 'Oman', 'om', NULL, NULL),
(160, 'Pakistan', 'pk', NULL, NULL),
(161, 'Palau', 'pw', NULL, NULL),
(162, 'Palestine', 'ps', NULL, NULL),
(163, 'Panama', 'pa', NULL, NULL),
(164, 'Papua New Guinea', 'pg', NULL, NULL),
(165, 'Paraguay', 'py', NULL, NULL),
(166, 'Peru', 'pe', NULL, NULL),
(167, 'Philippines', 'ph', NULL, NULL),
(168, 'Pitcairn', 'pn', NULL, NULL),
(169, 'Poland', 'pl', NULL, NULL),
(170, 'Portugal', 'pt', NULL, NULL),
(171, 'Puerto Rico', 'pr', NULL, NULL),
(172, 'Qatar', 'qa', NULL, NULL),
(173, 'Republic of the Congo', 'cg', NULL, NULL),
(174, 'Reunion', 're', NULL, NULL),
(175, 'Romania', 'ro', NULL, NULL),
(176, 'Russia', 'ru', NULL, NULL),
(177, 'Rwanda', 'rw', NULL, NULL),
(178, 'Saint Barthelemy', 'bl', NULL, NULL),
(179, 'Saint Helena', 'sh', NULL, NULL),
(180, 'Saint Kitts and Nevis', 'kn', NULL, NULL),
(181, 'Saint Lucia', 'lc', NULL, NULL),
(182, 'Saint Martin', 'mf', NULL, NULL),
(183, 'Saint Pierre and Miquelon', 'pm', NULL, NULL),
(184, 'Saint Vincent and the Grenadines', 'vc', NULL, NULL),
(185, 'Samoa', 'ws', NULL, NULL),
(186, 'San Marino', 'sm', NULL, NULL),
(187, 'Sao Tome and Principe', 'st', NULL, NULL),
(188, 'Saudi Arabia', 'sa', NULL, NULL),
(189, 'Senegal', 'sn', NULL, NULL),
(190, 'Serbia', 'rs', NULL, NULL),
(191, 'Seychelles', 'sc', NULL, NULL),
(192, 'Sierra Leone', 'sl', NULL, NULL),
(193, 'Singapore', 'sg', NULL, NULL),
(194, 'Sint Maarten', 'sx', NULL, NULL),
(195, 'Slovakia', 'sk', NULL, NULL),
(196, 'Slovenia', 'si', NULL, NULL),
(197, 'Solomon Islands', 'sb', NULL, NULL),
(198, 'Somalia', 'so', NULL, NULL),
(199, 'South Africa', 'za', NULL, NULL),
(200, 'South Korea', 'kr', NULL, NULL),
(201, 'South Sudan', 'ss', NULL, NULL),
(202, 'Spain', 'es', NULL, NULL),
(203, 'Sri Lanka', 'lk', NULL, NULL),
(204, 'Sudan', 'sd', NULL, NULL),
(205, 'Suriname', 'sr', NULL, NULL),
(206, 'Svalbard and Jan Mayen', 'sj', NULL, NULL),
(207, 'Swaziland', 'sz', NULL, NULL),
(208, 'Sweden', 'se', NULL, NULL),
(209, 'Switzerland', 'ch', NULL, NULL),
(210, 'Syria', 'sy', NULL, NULL),
(211, 'Taiwan', 'tw', NULL, NULL),
(212, 'Tajikistan', 'tj', NULL, NULL),
(213, 'Tanzania', 'tz', NULL, NULL),
(214, 'Thailand', 'th', NULL, NULL),
(215, 'Togo', 'tg', NULL, NULL),
(216, 'Tokelau', 'tk', NULL, NULL),
(217, 'Tonga', 'to', NULL, NULL),
(218, 'Trinidad and Tobago', 'tt', NULL, NULL),
(219, 'Tunisia', 'tn', NULL, NULL),
(220, 'Turkey', 'tr', NULL, NULL),
(221, 'Turkmenistan', 'tm', NULL, NULL),
(222, 'Turks and Caicos Islands', 'tc', NULL, NULL),
(223, 'Tuvalu', 'tv', NULL, NULL),
(224, 'U.S. Virgin Islands', 'vi', NULL, NULL),
(225, 'Uganda', 'ug', NULL, NULL),
(226, 'Ukraine', 'ua', NULL, NULL),
(227, 'United Arab Emirates', 'ae', NULL, NULL),
(228, 'United Kingdom', 'gb', NULL, NULL),
(229, 'United States', 'us', NULL, NULL),
(230, 'Uruguay', 'uy', NULL, NULL),
(231, 'Uzbekistan', 'uz', NULL, NULL),
(232, 'Vanuatu', 'vu', NULL, NULL),
(233, 'Vatican', 'va', NULL, NULL),
(234, 'Venezuela', 've', NULL, NULL),
(235, 'Vietnam', 'vn', NULL, NULL),
(236, 'Wallis and Futuna', 'wf', NULL, NULL),
(237, 'Western Sahara', 'eh', NULL, NULL),
(238, 'Yemen', 'ye', NULL, NULL),
(239, 'Zambia', 'zm', NULL, NULL),
(240, 'Zimbabwe', 'zw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `database`
--

CREATE TABLE `database` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `song_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keputusans`
--

CREATE TABLE `keputusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilih_keputusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keputusans`
--

INSERT INTO `keputusans` (`id`, `pilih_keputusan`, `created_at`, `updated_at`) VALUES
(1, 'Lulus', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(2, 'Tidak Lulus', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(3, 'Belum membuat keputusan', '2023-11-22 17:39:02', '2023-11-22 17:39:02');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_13_010931_create_songs_table', 1),
(6, '2022_10_14_032905_create_penilais_table', 1),
(7, '2022_10_14_153242_create_statuses_table', 1),
(8, '2022_10_15_173909_create_countries_table', 1),
(9, '2022_10_18_020211_create_choose_users_table', 1),
(10, '2022_10_19_021437_create_keputusans_table', 1),
(11, '2022_12_15_041445_create_song_categories_table', 1),
(12, '2023_03_01_024644_create_downloads_table', 1),
(13, '2023_04_14_041913_create_database', 1),
(14, '2023_05_16_064329_create_sessions_table', 1),
(15, '2023_11_26_044826_change_lagu_data_type_in_songs_table', 2),
(16, '2023_11_28_214654_change_fail_lagu_to_text_in_songs_table', 3);

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
-- Table structure for table `penilais`
--

CREATE TABLE `penilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pilih_penilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1ppZsDCNNvv7ofrKI14EQIG4Zrn57pBONNGxqIRl', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicnNVSTBMRTZDcGlIWFVPQ0xPUlRYb3IwVENKdE1RUU9oNmUwU1lWTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9ydG1zc2wudGVzdC9sYWd1L2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1702876831),
('dghauSzyVI5SyfRbTXo9Tli8R9jfdhqqp1qu5pcn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1V0bXJtQU9VamZmY1ZwVUhLaDNHcjRmZkx2TkNZSWhPV3FRUWRSRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9ydG1zc2wudGVzdC9sYWd1LzE4L2VkaXQ/cGFnZT0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1701207640);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penilai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keputusan_id` bigint(20) UNSIGNED NOT NULL DEFAULT '3',
  `song_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `artis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tajuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pencipta_lagu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis_lirik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarikat_rakaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lagu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fail_lagu` text COLLATE utf8mb4_unicode_ci,
  `tarikh_diterima` date DEFAULT NULL,
  `tarikh_dinilai` date DEFAULT NULL,
  `tarikh_diluluskan` date DEFAULT NULL,
  `lirik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nyanyian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muzik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbitan_teknikal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terbit` tinyint(1) NOT NULL DEFAULT '0',
  `downloadCount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `user_id`, `penilai_id`, `status_id`, `country_id`, `keputusan_id`, `song_category_id`, `artis`, `tajuk`, `album`, `ref_number`, `pencipta_lagu`, `penulis_lirik`, `syarikat_rakaman`, `catatan`, `lagu`, `fail_lagu`, `tarikh_diterima`, `tarikh_dinilai`, `tarikh_diluluskan`, `lirik`, `sebutan`, `nyanyian`, `muzik`, `penerbitan_teknikal`, `terbit`, `downloadCount`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 127, 3, 1, 'Halim', 'Halim kau dimana', 'Halim n Gang', '1001', 'Halim', 'Halim', 'HALIM inc', 'ok', 'https://d38gy8luw6hjwu.cloudfront.net/public/songs/file_example_MP3_700KB_1700948787.mp3', 'https://d38gy8luw6hjwu.cloudfront.net/public/files/CIDB_Account_1700948790.pdf', '2023-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 13:46:30', '2023-11-25 14:36:21'),
(2, 1, NULL, NULL, 127, 3, 1, 'Halimahsd', 'Kau juga', 'Kau kau', '1002', 'Halimah', 'Halimah', 'Halimah', 's', 'https://d38gy8luw6hjwu.cloudfront.net/public/songs/file_example_MP3_700KB_1700948890.mp3', 'https://d38gy8luw6hjwu.cloudfront.net/public/files/CIDB_Account_1700948890.pdf', '2023-11-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 13:48:10', '2023-11-25 14:22:56'),
(3, 1, NULL, NULL, 127, 3, 1, 'Harunsss', 'Harun harun', 'Harun n the gang', '1003', 'Harun', 'Hartun', 'Harun', 'sad', 'https://d38gy8luw6hjwu.cloudfront.net/public/songs/file_example_MP3_700KB_1700948953.mp3', 'https://d38gy8luw6hjwu.cloudfront.net/public/files/CIDB_Account_1700948954.pdf', '2023-11-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 13:49:14', '2023-11-25 14:36:55'),
(4, 1, NULL, NULL, 127, 3, 1, 'Jojo', 'Jojo', 'jojo', '1004', 'Jojo', 'Jojo', 'jojo', NULL, 'https://d38gy8luw6hjwu.cloudfront.net/public/songs/file_example_MP3_700KB_1700948999.mp3', 'https://d38gy8luw6hjwu.cloudfront.net/public/files/CIDB_Account_1700949000.pdf', '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 13:50:00', '2023-11-25 14:34:49'),
(5, 1, NULL, NULL, 127, 3, 1, 'Jaja', 'Jaja', 'jaja', '1005', 'jaja', 'jaja', 'jaja', NULL, '[\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_1700974423.mp3\"]', 'https://d38gy8luw6hjwu.cloudfront.net/public/files/CIDB_Account_1700949046.pdf', '2023-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 13:50:46', '2023-11-25 20:53:43'),
(9, 1, NULL, NULL, 2, 3, 1, 'Hamdan', 'Hamdan', 'Hamdan', '1005', 'Hamdan', 'Hamdan', 'Hamdan', NULL, '[\"file_example_MP3_700KB_1700971230.mp3\",\"file_example_MP3_700KB_2_1700971230.mp3\",\"file_example_MP3_700KB_3_1700971230.mp3\"]', NULL, '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 20:00:30', '2023-11-25 20:00:30'),
(11, 1, NULL, NULL, 2, 3, 1, 'Hamdan dd', 'Hamdan', 'Hamdan', '1005', 'Hamdan', 'Hamdan', 'Hamdan', NULL, '[\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_1700972753.mp3\"]', NULL, '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 20:25:54', '2023-11-25 20:25:54'),
(14, 1, NULL, NULL, 2, 3, 1, 'Hamdan dd', 'Hamdan', 'Hamdan', '1005', 'Hamdan', 'Hamdan', 'Hamdan', NULL, '[\"public\\/songs\\/file_example_MP3_700KB_1700972879.mp3\",\"public\\/songs\\/file_example_MP3_700KB_2_1700972879.mp3\",\"public\\/songs\\/file_example_MP3_700KB_3_1700972879.mp3\"]', NULL, '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 20:27:59', '2023-11-25 20:27:59'),
(15, 1, NULL, NULL, 2, 3, 1, 'Hamdan dd', 'Hamdan', 'Hamdan', '1005', 'Hamdan', 'Hamdan', 'Hamdan', NULL, '[\"public\\/songs\\/file_example_MP3_700KB_1700973248.mp3\",\"public\\/songs\\/file_example_MP3_700KB_2_1700973249.mp3\",\"public\\/songs\\/file_example_MP3_700KB_3_1700973249.mp3\"]', NULL, '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 20:34:09', '2023-11-25 20:34:09'),
(17, 1, NULL, NULL, 2, 3, 1, 'Hamdan dd', 'Hamdan', 'Hamdan', '10015', 'Hamdan', 'Hamdan', 'Hamdan', NULL, '[\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_1700974390.mp3\",\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_2_1700974390.mp3\",\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_3_1700974391.mp3\"]', NULL, '2023-11-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 20:53:11', '2023-11-25 20:53:11'),
(18, 1, NULL, NULL, 1, 3, 1, 'Halimah', 'Harun harun', 'Harun n the gang', '10050', 'Halimah', 'Hartun', 'HALIM inc', NULL, '[\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/songs\\/file_example_MP3_700KB_1701207001.mp3\"]', '[\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/files\\/dummy_1701207002.pdf\",\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/files\\/dummy_2_1701207002.pdf\",\"https:\\/\\/d38gy8luw6hjwu.cloudfront.net\\/public\\/files\\/dummy_3_1701207002.pdf\"]', '2023-11-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-28 13:30:02', '2023-11-28 13:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `song_categories`
--

CREATE TABLE `song_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `song_categories`
--

INSERT INTO `song_categories` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Melayu', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(2, 'Inggeris', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(3, 'Mandarin', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(4, 'Tamil', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(5, 'Lain-lain', '2023-11-22 17:39:02', '2023-11-22 17:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_lagu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_lagu`, `created_at`, `updated_at`) VALUES
(1, 'Lagu Lengkap ', '2023-11-22 17:39:02', '2023-11-22 17:39:02'),
(2, 'Lagu Tidak Lengkap ', '2023-11-22 17:39:02', '2023-11-22 17:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choose_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `choose_user_id`, `name`, `username`, `email`, `phone_number`, `email_verified_at`, `password`, `isApproved`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'Admin SSL', 'adminSSL', 'sslAdmin@rtm.com', '', NULL, '$2y$10$7MycYbik8i.YE3mgQQsQ5.pxu999WjvDe28abp97b2DAjJOejAXoG', 1, '2023-12-17 19:20:08', NULL, '2023-11-22 17:39:02', '2023-12-17 19:20:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choose_users`
--
ALTER TABLE `choose_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database`
--
ALTER TABLE `database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keputusans`
--
ALTER TABLE `keputusans`
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
-- Indexes for table `penilais`
--
ALTER TABLE `penilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song_categories`
--
ALTER TABLE `song_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choose_users`
--
ALTER TABLE `choose_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `database`
--
ALTER TABLE `database`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keputusans`
--
ALTER TABLE `keputusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penilais`
--
ALTER TABLE `penilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `song_categories`
--
ALTER TABLE `song_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
