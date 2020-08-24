-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2020 at 03:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elgamer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_cat` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_cat`, `created_at`, `updated_at`) VALUES
(1, 'Composants', NULL, '2019-12-11 18:36:05', '2019-12-11 18:36:05'),
(2, 'Pc', NULL, '2019-12-11 18:36:41', '2019-12-11 18:36:41'),
(3, 'Périphériques', NULL, '2019-12-11 18:37:26', '2019-12-11 18:37:26'),
(4, 'Carte Graphique', 1, '2019-12-11 18:38:43', '2019-12-11 18:38:43'),
(5, 'RAM', 1, '2019-12-11 18:40:19', '2019-12-11 18:40:19'),
(6, 'Processeur', 1, '2019-12-11 18:41:20', '2019-12-11 18:41:20'),
(7, 'Carte Mère', 1, '2019-12-11 18:42:20', '2019-12-11 18:42:20'),
(8, 'Casque', 3, '2019-12-11 18:42:53', '2019-12-11 18:42:53'),
(9, 'Sourie', 3, '2019-12-11 18:43:33', '2019-12-11 18:43:33'),
(10, 'laptop', 2, '2019-12-11 18:46:21', '2019-12-11 18:46:21'),
(11, 'Bureau', 2, '2019-12-11 18:47:07', '2019-12-11 18:47:07'),
(12, 'Moniteur', 3, '2019-12-11 18:54:18', '2019-12-11 18:54:18'),
(13, 'Boitier', 3, '2019-12-11 18:55:23', '2019-12-11 18:55:23'),
(14, 'Clavier', 3, '2019-12-11 18:56:12', '2019-12-11 18:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rib` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullName`, `email`, `password`, `phone`, `address`, `rib`, `created_at`, `updated_at`) VALUES
(4, 'driss oulhbib', 'Hola@gmail.com', '$2y$10$a9GqAWGOaGfhAqG6WQt8p.sxtponxEn2UcktmEwGev6.yNi/Ojt9m', '0612345678', 'Marrakech Gilize 153NM', '12345 12345 12345678910 00', '2020-01-07 22:34:44', '2020-01-09 10:33:25'),
(5, 'Mohamed el-Karim', 'contact@superblog.com', '$2y$10$2yhpqkwtRKdNYA/D2aCUEuAi7t6ryUhTa2wgjIWzgerhNRHEK0FIy', '0612345678', 'Marrakech Gilize 153NM', '12345 12345 12345678910 00', '2020-01-07 22:40:31', '2020-01-07 22:40:31'),
(6, 'driss oulhbib', 'mlg@contact.com', '$2y$10$IhRPtI1wF28lKwJlQrauFeY13MKqwzH7S.vFT82fSoNAZbO3nPA52', '0612345678', '123', '12345 12345 12345678910 00', '2020-01-08 10:25:51', '2020-01-08 10:25:51'),
(7, 'driss oulhbib', 'admin@elgamer.com', '$2y$10$XbfQ7yaKnbCIL30MSyeRcOYHVOgCqVSsBldjysjgGJSYfQaB8lH0q', '0612345678', 'Rabat Dyour Jamaa rue 15 No89', '12345 12345 12345678910 00', '2020-01-08 19:05:44', '2020-01-08 19:05:44'),
(8, 'driss oulhbib', 'khalid@gamail.com', '$2y$10$eVZBjVAD3qvYCUn22M4byeImhXJ89Pw/HK1XSXlHbHmOUQujIKUm2', '0612345678', 'Marrakech Gilize 153NM', '12345 12345 12345678910 00', '2020-01-09 06:48:35', '2020-01-09 06:48:35'),
(9, 'gjhg hjg', 'jj@gg.com', '$2y$10$gHZRHWze/VLFqaCjicE5ver9mLfgeyO2UWmOzCE0usE65bp7F5uQ.', '0612345678', 'dfgd hgfhgf', '12345 12345 12345678910 00', '2020-01-18 19:07:33', '2020-01-18 19:07:33'),
(10, 'driss oulhbib', 'kakk@kalkk.com', '$2y$10$LZN//qMaDo3tXlyoGg.ouOZT4eXs7l934Mg5XUFdtQ3hAkJ7cYCEq', '0612345678', 'Marrakech Gilize 153NM', '12345 12345 12345678910 00', '2020-01-19 19:39:34', '2020-01-19 19:39:34'),
(11, 'fff ffff', 'ghkkjlh@jhkjhk.com', '$2y$10$/5ezHiivw128QTXrAMDrIuSupA1MCk3YmqwOPE7nz1KmuUfw8TIIq', '0612345678', 'Marrakech Gilize 153NM', '12345 12345 12345678910 00', '2020-01-23 15:40:41', '2020-01-23 15:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `rating`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@elgamer.com', 'Commentaire', 5, 13, '2020-01-03 20:03:47', '2020-01-03 20:03:47'),
(2, 'Nicolas', 'nicolas@gmail.com', 'un produits chauf tous le temps', 2, 13, '2020-01-03 20:13:45', '2020-01-03 20:13:45'),
(3, 'admin', 'admin@elgamer.com', 'un tres bon produits pour les gamers', 5, 5, '2020-01-04 09:07:37', '2020-01-04 09:07:37'),
(9, 'yassir122', 'yassir@gmail.com', 'j\'aime pas ce produits', 1, 5, '2020-01-04 09:24:08', '2020-01-04 09:24:08'),
(10, 'hello', 'hello@gmail.com', 'good product with good shipping', 5, 5, '2020-01-04 09:31:21', '2020-01-04 09:31:21'),
(11, 'FSTG', 'fstg@fstg.com', 'commentaire de test', 4, 5, '2020-01-04 10:40:17', '2020-01-04 10:40:17'),
(12, 'ayoub', 'ayoub@fstg.com', 'commentaire de test', 3, 5, '2020-01-04 11:51:40', '2020-01-04 11:51:40'),
(13, 'doyen', 'doyen@fstg.com', 'commentaire de test', 2, 5, '2020-01-04 11:52:33', '2020-01-04 11:52:33'),
(14, 'anonyme', 'anonyme@gmail.com', 'commentaire de test', 5, 5, '2020-01-04 12:12:20', '2020-01-04 12:12:20'),
(15, 'anonyme', 'anonyme@gmail.com', 'commentaire de test 2156489 djfiealkj ckeiaz 16546', 5, 5, '2020-01-04 12:13:14', '2020-01-04 12:13:14'),
(16, 'anonyme', 'anonyme@gmail.com', 'hello world', 5, 5, '2020-01-04 12:15:23', '2020-01-04 12:15:23'),
(17, 'helloworld', 'hello@gmail.com', 'Commentaire', 5, 10, '2020-01-07 21:08:04', '2020-01-07 21:08:04'),
(18, 'helloworld', 'hello@gmail.com', 'Commentaire', 4, 5, '2020-01-08 11:05:37', '2020-01-08 11:05:37'),
(19, 'hello mlg', 'email@emeil.com', 'Commentaire', 2, 5, '2020-01-08 11:48:34', '2020-01-08 11:48:34'),
(20, 'hello mlg', 'email@emeil.com', 'Commentaire', 2, 5, '2020-01-08 11:49:07', '2020-01-08 11:49:07'),
(21, 'hello mlg', 'email@emeil.com', 'Commentaire', 2, 5, '2020-01-08 11:50:51', '2020-01-08 11:50:51'),
(22, 'jlqkjsdfl klqjsdlmkj', 'email@emeil.com', 'Commentaire', 1, 5, '2020-01-08 11:51:14', '2020-01-08 11:51:14'),
(23, 'gg abo gg', 'Hola@gmail.com', 'Commentaire', 2, 10, '2020-01-08 11:56:29', '2020-01-08 11:56:29'),
(24, 'driss oulhbib', 'drissoulhbibcontact@gmail.com', 'Commentaire', 5, 3, '2020-01-08 12:49:47', '2020-01-08 12:49:47'),
(25, 'driss oulhbib', 'mlg@contact.com', 'Commentaire', 5, 5, '2020-01-08 15:52:18', '2020-01-08 15:52:18'),
(26, 'driss oulhbib', 'mlg@contact.com', 'Commentaire', 5, 5, '2020-01-08 15:56:07', '2020-01-08 15:56:07'),
(27, 'Jhon Doe', 'jhone@doe.doe', 'i will give this product 5 stars for design and look, it made computer case look beautiful', 5, 5, '2020-01-08 16:08:05', '2020-01-08 16:08:05'),
(28, 'Jhon Doe two', 'jhone@doe.doe', 'just i wanna give it 2 stars', 2, 5, '2020-01-08 16:12:52', '2020-01-08 16:12:52'),
(29, 'Mr coco', 'coco@gmail.com', 'high quality proudct', 5, 3, '2020-01-08 19:01:26', '2020-01-08 19:01:26'),
(30, 'driss oulhbib', 'mlg@contact.com', 'Commentaire', 5, 10, '2020-01-09 08:12:43', '2020-01-09 08:12:43'),
(31, 'driss oulhbib', 'email@emeil.com', 'hello world', 4, 11, '2020-01-09 10:31:01', '2020-01-09 10:31:01'),
(32, 'ffd fff', 'gg@gg.gg', 'Commentaire', 5, 9, '2020-01-18 19:06:21', '2020-01-18 19:06:21'),
(33, 'ffsqdf qsdfqsdf', 'qsdfqsdf@qdfqfd.qlksf', 'Commentaire', 5, 9, '2020-02-27 08:46:05', '2020-02-27 08:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `subject`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'fqsdfqsf', 'sdfqsdf', 'drissoulhbibcontact@gmail.com', 'Messagesqdfqsdfqsdfs fqsd fsdqfd fqs', '2019-12-19 07:43:11', '2019-12-19 07:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, 5000.00, '2019-12-20 20:44:03', '2019-12-20 20:44:03'),
(2, 1700.00, '2019-12-24 22:32:12', '2019-12-24 22:32:12'),
(3, 9300.00, '2019-12-24 22:33:17', '2019-12-24 22:33:17'),
(4, 2800.00, '2019-12-24 22:34:28', '2019-12-24 22:34:28');

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
(8, '2019_12_03_184153_create_products_table', 1),
(27, '2014_10_12_000000_create_users_table', 2),
(28, '2014_10_12_100000_create_password_resets_table', 2),
(29, '2019_08_19_000000_create_failed_jobs_table', 2),
(30, '2019_12_05_165302_create_products_table', 2),
(33, '2019_12_05_205746_create_contacts_table', 3),
(37, '2019_12_08_113743_create_categories_table', 4),
(38, '2019_12_11_185917_add_category_to_products_table', 5),
(46, '2019_12_16_210223_create_clients_table', 6),
(47, '2019_12_16_211335_create_orders_table', 6),
(48, '2019_12_16_214640_add_order_code_to_orders_table', 6),
(52, '2019_12_20_202157_create_discounts_table', 7),
(53, '2019_12_20_202254_add_discount_id_column', 7),
(63, '2019_12_25_191732_create_comments_table', 8),
(64, '2020_01_03_191848_add_rating_column_to_comments', 8),
(65, '2020_01_04_154126_add_password_to_clients_table', 9),
(68, '2020_01_10_214807_create_user_details_table', 10),
(69, '2020_01_10_215305_add_user_detail_foriegn_key', 10),
(70, '2020_01_10_220505_add_image_column_users', 11),
(72, '2020_01_18_114842_create_admins_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `order_code`, `products`, `total_price`, `created_at`, `updated_at`) VALUES
(32, 4, '2yyz7Lm1qNiwFp4GZKrEBkJ9C0AH6r', '{\"10\":1}', 2800.00, '2020-01-07 22:34:44', '2020-01-07 22:34:44'),
(33, 4, 'UhbWLKqysnyOZhi0CCh8hGB8JPWYq9', '{\"12\":1}', 16900.00, '2020-01-07 22:37:18', '2020-01-07 22:37:18'),
(34, 5, 'CsoVQjDC4ZEJiKTOngQVFJDXslFvDt', '{\"8\":1,\"13\":1}', 9930.00, '2020-01-07 22:40:32', '2020-01-07 22:40:32'),
(35, 4, 'CgYD5Zp9B0jaM0SvmxxQPzrV8uLrnQ', '{\"11\":1}', 5280.00, '2020-01-07 22:44:18', '2020-01-07 22:44:18'),
(36, 4, 'PDjG9yiVmpGfK23eHWi7lUOAXsH2ee', '{\"11\":1}', 5280.00, '2020-01-07 22:47:37', '2020-01-07 22:47:37'),
(37, 4, 'lOD7QQJQ8HSLXjBmrnNZasjf6P7uip', '{\"12\":1}', 16900.00, '2020-01-07 22:48:59', '2020-01-07 22:48:59'),
(38, 6, 'bMj0XWpbbWhz5jWQdqwtYK9m6j8tFG', '{\"13\":1}', 9300.00, '2020-01-08 10:25:51', '2020-01-08 10:25:51'),
(39, 7, 'mMBRjZK2fiCvY4uWiT0aO1GkzjbutI', '{\"3\":2}', 1880.00, '2020-01-08 19:05:44', '2020-01-08 19:05:44'),
(40, 8, 'KDRvZjvcwWdnQM5XtIqZBxvr9RvBea', '{\"6\":1}', 3290.00, '2020-01-09 06:48:35', '2020-01-09 06:48:35'),
(41, 4, 'oRcdh7Mz3guQzsOT5zdh43Ef23jUzP', '{\"5\":4}', 5960.00, '2020-01-09 10:33:25', '2020-01-09 10:33:25'),
(42, 9, 'aQzRE2gsEQycCAuS0HZlkT8rNVBTMn', '{\"9\":1}', 990.00, '2020-01-18 19:07:33', '2020-01-18 19:07:33'),
(43, 10, 'R8opCK03DyNpwYXphernaHv5x2AlEm', '{\"8\":1}', 630.00, '2020-01-19 19:39:34', '2020-01-19 19:39:34'),
(44, 11, 'VrdtZKfgpeByeyqzAraRXUa4sY7vkH', '{\"11\":26}', 137280.00, '2020-01-23 15:40:41', '2020-01-23 15:40:41');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `attributes`, `category_id`, `discount_id`, `created_at`, `updated_at`) VALUES
(1, 'Nvidia GTX 1080', 'Une carte graphique de haut niveau avec une bon configuration, cette carte graphique possede une vram tres grand et tres rapide', 'products/nvidia_gpu.jpg', 5900.00, NULL, 4, 1, '2019-12-05 18:13:54', '2019-12-05 18:13:54'),
(2, 'Boitier NZXT H700', 'Boitier pour un pc gamer support la plus part des carte mère', 'products/nzxt_case.jpg', 2150.00, NULL, 13, NULL, '2019-12-05 18:50:46', '2019-12-05 18:50:46'),
(3, 'carte mere msi H310M PRO-M2 PLUS', 'Basée sur le chipset Intel H310 Express, la carte mère MSI H310M PRO-VH est votre ticket d\'entrée pour exploiter les processeurs Intel Core de 8ème génération (Intel Coffee Lake). Au format Micro-ATX, elle permettra l\'assemblage d\'une configuration polyvalente ou d\'une station de travail performante et compacte à moindre coût. Elle bénéficie de la qualité de fabrication MSI ainsi que des dernières innovations technologiques de la marque en matière de logiciels et d’utilitaires.\nMSI\n', 'products/41gZmItwIeL.jpg', 940.00, NULL, 7, NULL, '2019-12-05 19:05:02', '2019-12-05 19:05:02'),
(4, 'MSI GeForce GTX 1050 AERO', 'La carte graphique MSI GeForce GTX 1050 AERO ITX 2G OCV1 est le parfait compromis entre petit prix et expérience gaming de qualité. Pensée pour permettre aux joueurs occasionnels de profiter d\'un affichage fluide et rapide en Haute Définition, elle vous permettra de profiter des derniers jeux PC avec un rendu graphique superbe sans vous ruiner. Concevez un PC Gaming peu onéreux et bénéficiant d\'un rapport performances / prix imbattable.', 'products/LD0004249494_2_0004771728.jpg', 1790.00, NULL, 4, 2, '2019-12-05 19:12:18', '2019-12-05 19:33:08'),
(5, 'Corsair Vengeance RGB PRO Series Noir 16Go (2x 8Go) DDR4 3200 MHz CL16', 'Les mémoires PC haut de gamme Vengeance RGB PRO Series de Corsair proposent les meilleures performances et stabilité pour les plateformes nouvelle génération avec un fort potentiel d\'overclocking. Elles vous offrent également un éclairage RGB multizone dynamique hypnotisant.', 'products/corsaire_ram.jpg', 1490.00, NULL, 5, NULL, '2019-12-05 19:35:05', '2019-12-05 19:35:05'),
(6, 'MSI Optix MAG241CV 23.6\" 144Hz Freesync Curved', 'Plongez au coeur de l\'action avec le moniteur incurvé MSI Optix MAG241CV ! Taillé pour le divertissement numérique, cet écran incurvé Full HD de 24 pouces, avec dalle VA, offre une image de haute qualité et un confort visuel optimisé.', 'products/msi-optix-mag241cv-24-144hz-freesync-curved.jpg', 3290.00, NULL, 11, NULL, '2019-12-10 11:47:47', '2019-12-10 11:47:47'),
(7, 'SteelSeries Rival 110', 'La souris SteelSeries Rival 110 va à l\'essentiel ! Performante et précise, elle intègre un capteur optique pouvant aller jusqu\'à 7200 dpi pour une précision chirurgicale. Profitez également d\'un design ambidextre, de 6 boutons programmables et d\'un rétro-éclairage RGB pour devenir le meilleur joueur.', 'products/steelseries-rival-110.jpg', 590.00, NULL, 9, NULL, '2019-12-10 11:50:27', '2019-12-10 11:50:27'),
(8, 'Coolermaster Masterkeys Lite L RGB', 'Conçu notamment pour le jeu, le Coolermaster Masterkeys Lite L RGB Gaming Keyboard offre un toucher unique et des performances incomparables grâce à ses touches jusqu\'à 4 fois plus rapide que les claviers standard. Totalement anti-ghosting, il vous garantit un contrôle incomparable.', 'products/coolermaster-masterkeys-lite-l-rgb.jpg', 630.00, NULL, 14, NULL, '2019-12-10 18:21:34', '2019-12-10 18:21:34'),
(9, 'Raser Electra v2 USB', 'Le casque-micro Razer Electra v2 USB est destiné à ceux qui jouent tout le temps et partout : connectez-le simplement au port USB de votre PC, de votre ordinateur portable, de votre tablette ou de votre smartphone et c\'est parti !', 'products/razer-electra-v2-usb.jpg', 990.00, NULL, 8, NULL, '2019-12-10 20:01:32', '2019-12-10 20:01:32'),
(10, 'G.Skill Trident Z Royal Gold 32Go (2x 16Go) DDR4 3200 MHz CL16', 'Voici la dernière née de la gamme Trident Z de G.Skill, la Trident Z Royal. Conçues pour être les joyaux de la couronne, ces barrettes disposent d\'un design parfaitement pensé pour réfracter la lumière idéalement. Avec sa bande de LED RGB à effet cristallin, vous pourrez afficher un style affirmé', 'products/gskill-trident-z-royal-gold-32go-2x-16go-ddr4-3200-mhz-cl16.jpg', 2990.00, NULL, 5, 4, '2019-12-10 20:04:15', '2019-12-10 20:04:15'),
(11, 'HP Pavilion x360 14-cd1800nd 14 FHD Touchscreen', 'Gagnez en performance et en confort de travail avec le HP Pavilion x360 14-cd1800nd et son écran tactile rotatif sur 360° ! Grâce à sa conception flexible et son écran à bords minces, il s\'adaptera à vos besoins et maximisera voter confort', 'products/hp-pavilion-x360-14-cd1800nd-14-fhd-touchscreen-intel-core-i3-8145u-4gb-ddr4-128-ssd-windows-10.jpg', 5280.00, '{\"Processeur\":\"intel Core i3 8145U 2.1GHz\",\"Ram\":\"4 Go DDR4\",\"SSD\":\"128 Go\",\"Clavier\":\"QWERTY LED Black\"}', 10, NULL, '2019-12-12 11:19:56', '2019-12-12 11:19:56'),
(12, 'HP OMEN 17-AN113NS', 'Profitez d\'excellentes performances mobiles avec le PC portable HP OMEN 17 ! Doté d\'un écran IPS Full HD, d\'une carte graphique Nvidia GTX 1070 et d\'un système sonore Bang & Olufsen, il offre d\'excellentes performances de jeu et un excellent niveau de confort.', 'products/hp-omen-17-an113ns-intel-core-i7-8750h16gb1tb256gb-ssdgtx-1070173.png', 16900.00, '{\"\\u00c9cran\":\"15,6\\\" 144Hz\",\"Processeur\":\"Intel Core i7-8750H (Hexa-Core 2.2 GHz \\/ 4.1 GHz Turbo - Cache 9 Mo)\",\"HDD\":\"1 To\",\"SSD\":\"250 Go\",\"Carte Graphique\":\"NVIDIA GeForce GTX 1070 8GO GDDR5\"}', 10, NULL, '2019-12-18 20:27:52', '2019-12-18 20:27:52'),
(13, 'Gigabyte GeForce RTX 2080 TURBO OC 8GB GDDR6\n', '\r\nLa carte graphique NVIDIA GeForce RTX 2080 est basée sur la nouvelle architecture GPU ultra-innovante NVIDIA Turing. Destinée aux joueurs les plus exigeants, cette carte graphique gaming haut de gamme embarque le nouveau processeur graphique NVIDIA TU104, 8 Go de VRAM GDDR6, une interface mémoire 256 bits et 2944 processeurs de flux (Cores CUDA) pour des performances de jeu et un rendu graphique à couper le souffle. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) promet d\'être radieux !\n', 'products/gigabyte-geforce-rtx-2080-turbo-oc-8gb-gddr6.jpg', 9890.00, '{\"Marque du chipset\":\"NVIDIA\",\"Puce graphique\":\"NVIDIA GeForce RTX 2080 Ti\",\"Quantit\\u00e9 m\\u00e9moire\":\"8 Go GDDR6\"}', 4, 3, '2019-12-19 16:36:56', '2019-12-19 16:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_detail_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, NULL, 'driss oulhbib', 'contact@elgamer.com', NULL, '$2y$10$AJDpGkgJLdw.xU/iEGvUQuZsg5nUI3fDwzoPkCzgQW3JPDm9c0d1W', NULL, '2020-01-09 18:29:29', '2020-01-09 18:29:29', NULL),
(2, NULL, 'driss oulhbib', 'email@email.com', NULL, '$2y$10$Ko9.3TasIszPodV87w/bh.VEq.y7adkvF4Wc.hMBhIj.4ud50zVJm', NULL, '2020-01-09 18:30:06', '2020-01-09 18:30:06', NULL),
(3, NULL, 'lhya ms5ot', 'test@test.com', NULL, '$2y$10$G4GmetRZRZM2bkxRplWMGepJwToihXW8Q1BGgpay8x8pnX5M9WzOG', NULL, '2020-01-09 18:31:31', '2020-01-10 21:53:24', '3-qBL2Y0vStM.png'),
(4, NULL, 'Mr coco', 'kali@kali.com', NULL, '$2y$10$/axmHw4EoI68Gwr9.ysSzO7EUvHp2bP2D1/aIjfp3p9wWQ9bmnZP.', NULL, '2020-01-10 21:56:41', '2020-01-18 10:47:40', '4-u0DUBC5uts.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_cat_foreign` (`parent_cat`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_cat_foreign` FOREIGN KEY (`parent_cat`) REFERENCES `categories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
