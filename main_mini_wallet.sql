-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 03:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main_mini_wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `phone`, `password`, `ip`, `user_agent`, `created_at`, `updated_at`) VALUES
(2, 'Manager', 'manager@gmail.com', '098838383', '$2y$10$QOUAcQFbN40WwO.aPCl3ju5fI796ZnCltVDOvM/fdMF1meFe6gCxi', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.59', '2021-09-15 03:43:24', '2021-09-27 22:59:07');

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
(4, '2021_08_29_045411_create_admin_users_table', 1),
(5, '2021_09_16_052624_create_wallets_table', 2),
(6, '2021_09_28_043035_create_transactions_table', 3),
(7, '2021_10_10_203623_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1 => income , 2 => expense',
  `amount` decimal(20,2) NOT NULL,
  `source_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `ref_no`, `trx_id`, `user_id`, `type`, `amount`, `source_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '5227497179761798', '3724862638713907', 1, 2, '1000.00', 11, 'something i wanto to you', '2021-09-27 23:11:53', '2021-09-27 23:11:53'),
(2, '5227497179761798', '6937569752638367', 11, 1, '1000.00', 1, 'something i wanto to you', '2021-09-27 23:11:53', '2021-09-27 23:11:53'),
(3, '8062474355470264', '8793537300757807', 1, 2, '1000.00', 5, 'mama ko chit tal moke phoe pay tar lee pale', '2021-09-27 23:12:46', '2021-09-27 23:12:46'),
(4, '8062474355470264', '3859510946476098', 5, 1, '1000.00', 1, 'mama ko chit tal moke phoe pay tar lee pale', '2021-09-27 23:12:46', '2021-09-27 23:12:46'),
(5, '4460457778221888', '9651183028087245', 1, 2, '3000.00', 14, 'ညအခါ လသာသာ ကစား မလား နားမလား', '2021-09-28 08:36:24', '2021-09-28 08:36:24'),
(6, '4460457778221888', '1039726433114320', 14, 1, '3000.00', 1, 'ညအခါ လသာသာ ကစား မလား နားမလား', '2021-09-28 08:36:24', '2021-09-28 08:36:24'),
(7, '5888057396830864', '7517104120491212', 1, 2, '1000.00', 16, 'မေလေး လေ နေ‌ေကာင်းလားဟ', '2021-09-28 08:38:05', '2021-09-28 08:38:05'),
(8, '5888057396830864', '4166244299454809', 16, 1, '1000.00', 1, 'မေလေး လေ နေ‌ေကာင်းလားဟ', '2021-09-28 08:38:05', '2021-09-28 08:38:05'),
(9, '5424600819921050', '7340441960278341', 1, 2, '1000.00', 11, 'ဆမ် ငါး‌ေကာင် နေ‌ေကာင်း လား', '2021-09-28 08:39:35', '2021-09-28 08:39:35'),
(10, '5424600819921050', '7515647352905930', 11, 1, '1000.00', 1, 'ဆမ် ငါး‌ေကာင် နေ‌ေကာင်း လား', '2021-09-28 08:39:35', '2021-09-28 08:39:35'),
(11, '9756421936190379', '2176963279015566', 1, 2, '1000.00', 13, 'ဝမ်းဝမ်း ရေ အေးဆေးလား', '2021-09-28 08:41:27', '2021-09-28 08:41:27'),
(12, '9756421936190379', '7640856231968220', 13, 1, '1000.00', 1, 'ဝမ်းဝမ်း ရေ အေးဆေးလား', '2021-09-28 08:41:27', '2021-09-28 08:41:27'),
(13, '1633257031024613', '7799026705324773', 1, 2, '4999.00', 3, 'ngwe lwe lite tal ngar kaung', '2021-09-28 08:56:41', '2021-09-28 08:56:41'),
(14, '1633257031024613', '3668223245026386', 3, 1, '4999.00', 1, 'ngwe lwe lite tal ngar kaung', '2021-09-28 08:56:41', '2021-09-28 08:56:41'),
(15, '4771495239872183', '9918263765104488', 1, 2, '2000.00', 11, 'two thousand kyats for dept', '2021-09-29 08:15:14', '2021-09-29 08:15:14'),
(16, '4771495239872183', '5269003127306109', 11, 1, '2000.00', 1, 'two thousand kyats for dept', '2021-09-29 08:15:14', '2021-09-29 08:15:14'),
(17, '7738360709919891', '3563355981118022', 1, 2, '2000.00', 11, 'two thousand kyats for dept', '2021-09-29 08:17:02', '2021-09-29 08:17:02'),
(18, '7738360709919891', '6498922705794299', 11, 1, '2000.00', 1, 'two thousand kyats for dept', '2021-09-29 08:17:02', '2021-09-29 08:17:02'),
(19, '6179273881952443', '4512069194415546', 1, 2, '2000.00', 11, 'two thousand kyats for dept', '2021-09-29 08:18:19', '2021-09-29 08:18:19'),
(20, '6179273881952443', '8554303775330846', 11, 1, '2000.00', 1, 'two thousand kyats for dept', '2021-09-29 08:18:19', '2021-09-29 08:18:19'),
(21, '4785928346079574', '4579061608008060', 11, 2, '1000.00', 1, 'a yaw naw nga pyaw kyaw', '2021-09-29 08:28:28', '2021-09-29 08:28:28'),
(22, '4785928346079574', '6214152218067993', 1, 1, '1000.00', 11, 'a yaw naw nga pyaw kyaw', '2021-09-29 08:28:28', '2021-09-29 08:28:28'),
(23, '7936479742346613', '1102811372621562', 11, 2, '3999.00', 5, 'what are u doing now?', '2021-09-29 15:06:21', '2021-09-29 15:06:21'),
(24, '7936479742346613', '9397841637582264', 5, 1, '3999.00', 11, 'what are u doing now?', '2021-09-29 15:06:21', '2021-09-29 15:06:21'),
(25, '7707835223806993', '1804802982207700', 1, 2, '2000.00', 5, 'အရီး လာသည် အသီး ပါသလား အဆီ အစား အသီး စား၏', '2021-10-01 14:35:15', '2021-10-01 14:35:15'),
(26, '7707835223806993', '3161748564895816', 5, 1, '2000.00', 1, 'အရီး လာသည် အသီး ပါသလား အဆီ အစား အသီး စား၏', '2021-10-01 14:35:15', '2021-10-01 14:35:15'),
(27, '5290769187842092', '9651275101235511', 1, 2, '1000.00', 11, 'က ကလေး ခ ခလေး င ငါးကလေး ညီမလေး အကို', '2021-10-01 14:42:13', '2021-10-01 14:42:13'),
(28, '5290769187842092', '6362936023191511', 11, 1, '1000.00', 1, 'က ကလေး ခ ခလေး င ငါးကလေး ညီမလေး အကို', '2021-10-01 14:42:13', '2021-10-01 14:42:13'),
(29, '6890149713226898', '9241230588666662', 1, 2, '1000.00', 14, 'မီးလေး ရေ မုန်.ဖိုး ပေးလိုက်တာ', '2021-10-08 07:59:17', '2021-10-08 07:59:17'),
(30, '6890149713226898', '1617116990591711', 14, 1, '1000.00', 1, 'မီးလေး ရေ မုန်.ဖိုး ပေးလိုက်တာ', '2021-10-08 07:59:17', '2021-10-08 07:59:17'),
(31, '8729554363626160', '2845278691311931', 1, 2, '1000.00', 14, 'မီးလေး ရေ မုန်.ဖိုး ပေးလိုက်တာ', '2021-10-08 07:59:45', '2021-10-08 07:59:45'),
(32, '8729554363626160', '6825389111438214', 14, 1, '1000.00', 1, 'မီးလေး ရေ မုန်.ဖိုး ပေးလိုက်တာ', '2021-10-08 07:59:45', '2021-10-08 07:59:45'),
(33, '2347823764744544', '4500243744447139', 1, 2, '1000.00', 5, 'loerm ispunm ijskb jdsj', '2021-10-08 08:02:03', '2021-10-08 08:02:03'),
(34, '2347823764744544', '7218888576088089', 5, 1, '1000.00', 1, 'loerm ispunm ijskb jdsj', '2021-10-08 08:02:03', '2021-10-08 08:02:03'),
(35, '7104502586006468', '8529840433004709', 1, 2, '1000.00', 16, NULL, '2021-10-08 10:00:05', '2021-10-08 10:00:05'),
(36, '7104502586006468', '8536446944531202', 16, 1, '1000.00', 1, NULL, '2021-10-08 10:00:05', '2021-10-08 10:00:05'),
(37, '9023935826294672', '8969463513959314', 2, 2, '1000.00', 1, 'keeping my dept mgmg', '2021-10-09 04:04:14', '2021-10-09 04:04:14'),
(38, '9023935826294672', '5898301351486994', 1, 1, '1000.00', 2, 'keeping my dept mgmg', '2021-10-09 04:04:14', '2021-10-09 04:04:14'),
(39, '6362971032310753', '6759089077980975', 2, 2, '3000.00', 1, 'this is gift for thatinguypt mgmg yaay', '2021-10-09 04:05:01', '2021-10-09 04:05:01'),
(40, '6362971032310753', '4257871367345550', 1, 1, '3000.00', 2, 'this is gift for thatinguypt mgmg yaay', '2021-10-09 04:05:01', '2021-10-09 04:05:01'),
(41, '5110484587145645', '9159949175351502', 1, 2, '10000.00', 6, 'testing to the radio', '2021-10-09 06:39:55', '2021-10-09 06:39:55'),
(42, '5110484587145645', '8277589830428837', 6, 1, '10000.00', 1, 'testing to the radio', '2021-10-09 06:39:55', '2021-10-09 06:39:55'),
(43, '2616132406565522', '5231494593510516', 1, 2, '3999.00', 14, 'testing to mu mu what wrong', '2021-10-09 06:40:30', '2021-10-09 06:40:30'),
(44, '2616132406565522', '5448328442692881', 14, 1, '3999.00', 1, 'testing to mu mu what wrong', '2021-10-09 06:40:30', '2021-10-09 06:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `ip`, `user_agent`, `login_at`, `created_at`, `updated_at`) VALUES
(1, 'mg mg', 'mgmg@gmail.com', '09123456', '$2y$10$ZceW2tehfdhyErEQTjKqr.z0YQJVGDLv2TSmhrn/O1Vht.33lfNU6', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-11-11 14:58:11', '2021-09-15 03:42:19', '2021-11-11 14:58:11'),
(2, 'susu', 'susu@gmail.com', '09222222', '$2y$10$xQOHOauVaRc.ABJ9KXKUguSZTDnsHpiqv1SVujgAtzWBDN4odcMtK', NULL, '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36', '2021-10-09 14:26:33', '2021-09-15 03:42:51', '2021-10-09 14:26:33'),
(3, 'aung', 'aung@gmail.com', '09444444', '$2y$10$nx0uEiHwDXyi9NkQcqhKYuZVfliyH6DfZINt/Cxf.F6kfxO6S0aua', NULL, NULL, NULL, NULL, '2021-09-15 08:37:43', '2021-09-15 22:06:49'),
(5, 'mama', 'ma@gmail.com', '09333333', '$2y$10$eOWILVJXAL2CsmI2fBOjxO75MO9YanHwi2wxOreX03T7Cm0BDsTHK', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-09-26 22:54:23', '2021-09-15 22:46:22', '2021-09-26 22:54:23'),
(6, 'nurse', 'nurse@gmail.com', '09111111', '$2y$10$ZceW2tehfdhyErEQTjKqr.z0YQJVGDLv2TSmhrn/O1Vht.33lfNU6', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.59', NULL, '2021-09-15 22:50:11', '2021-09-15 22:50:11'),
(11, 'sam', 'sam@gmail.com', '09555555', '$2y$10$PiILkSmOmqlL.OrGXYh9/OLGFlU9cDOO/rAPvhstZS2/fsLAtY2J6', NULL, '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36', '2021-09-29 08:25:32', '2021-09-15 23:37:43', '2021-09-29 08:25:32'),
(13, 'one', 'one@gmail.com', '09666666', '$2y$10$Me9.JFWQFtNKSTFRQJc/AeXA2ddKtSzlrobefwsS7ZKN2GtBce.oC', NULL, NULL, NULL, NULL, '2021-09-16 00:09:14', '2021-09-16 00:23:32'),
(14, 'naing', 'naing@gmail.com', '09777777', '$2y$10$t5ZSQxAC4oysyMQ6gcBa7uDAcJq9jAycXHq8msWLDVgYYchx0ZtOu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.59', NULL, '2021-09-16 00:12:19', '2021-09-16 00:12:19'),
(16, 'may', 'may@gmail.com', '09888888', '$2y$10$wFXnw37jvaYT0FAYDz3tLeHrHxqvHjn6QCRMmn.2.96dHZYjkmpGO', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-10-09 04:01:38', '2021-09-17 23:15:43', '2021-10-09 04:01:38'),
(17, 'yaya', 'yaya@gmail.com', '09999999', '$2y$10$3elw4lUS911lVS9RR1mgWOtdkG4y07H8zQWihzw20FiD1XSgoanCq', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', NULL, '2021-09-17 23:23:02', '2021-09-17 23:23:02'),
(18, 'roselynn', 'roselynn@gmail.com', '091111111', '$2y$10$z.kaZjHPzz3gd3XMuiEuMOcQLoX/IkcParY766HjvDnLUPjK7D3QS', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', NULL, '2021-09-27 23:01:46', '2021-09-27 23:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `account_number`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '1234123412341234', '999965002.00', '2021-09-15 23:37:43', '2021-10-09 06:40:30'),
(2, 2, '7477002817481852', '19996000.00', '2021-09-16 00:09:14', '2021-10-09 04:05:01'),
(3, 5, '9886001459838662', '7999.00', '2021-09-16 00:18:42', '2021-10-08 08:02:03'),
(4, 3, '5622927905059927', '4999.00', '2021-09-16 00:25:27', '2021-09-28 08:56:41'),
(6, 17, '3737442842010277', '0.00', '2021-09-27 22:59:43', '2021-09-27 22:59:43'),
(7, 16, '1563378271635428', '2000.00', '2021-09-27 22:59:49', '2021-10-08 10:00:05'),
(8, 13, '3853795358874884', '1000.00', '2021-09-27 22:59:55', '2021-09-28 08:41:27'),
(9, 14, '5932060637876727', '8999.00', '2021-09-27 23:00:01', '2021-10-09 06:40:30'),
(10, 11, '4621683571377895', '4001.00', '2021-09-27 23:00:08', '2021-10-01 14:42:13'),
(11, 6, '5682991611729148', '10000.00', '2021-09-27 23:00:14', '2021-10-09 06:39:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`),
  ADD UNIQUE KEY `admin_users_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_account_number_unique` (`account_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
