-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2018 г., 14:35
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `airspace`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ываываычс', 1, 11, 1, '2018-06-20 10:33:16', '2018-07-09 06:49:04'),
(5, 'цвпывпывывп', 1, 11, 1, '2018-06-20 10:33:57', '2018-07-09 06:49:03'),
(6, 'sdfsdfvsgsdsd', 1, 12, 1, '2018-06-20 11:08:05', '2018-07-09 06:49:09'),
(9, 'Да это мой комментарий!!!', 1, 12, 1, '2018-06-26 03:05:41', '2018-07-09 07:25:04'),
(10, 'Коментарий после дебага', 1, 12, 0, '2018-11-09 09:32:14', '2018-11-09 09:32:14'),
(11, 'ыафав А ФЫА ЦАФЫА', 1, 12, 0, '2018-11-09 09:32:23', '2018-11-09 09:32:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_05_104950_create_posts_table', 1),
(4, '2018_11_05_105915_create_tags_table', 1),
(5, '2018_11_05_111224_create_comments_table', 1),
(6, '2018_11_05_130552_post_tags', 1),
(10, '2014_10_12_000000_create_users_table', 2),
(11, '2018_11_08_100715_add_colum_avatar_to_users', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `user_id`, `created_at`, `updated_at`, `date`, `image`, `description`) VALUES
(11, 'Et similique cumque optio autem.', 'et-similique-cumque-optio-autem', '<p>Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.v</p>', 1, '2018-06-05 08:28:13', '2018-07-18 06:13:54', '2018-07-17', NULL, '<p>Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.</p>'),
(12, 'Voluptas quisquam ducimus et et reprehenderit.', 'voluptas-quisquam-ducimus-et-et-reprehenderit', '<p>Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 03:57:14', '2018-06-21', NULL, '<p>Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.</p>\r\n<p>Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.</p>'),
(13, 'TEST', 'sit-eos-necessitatibus-quia-dolorum-quod', '<p>Omnis et doloremque incidunt molestiae vel rem.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 03:48:47', '2018-06-19', NULL, NULL),
(14, 'Est repellat enim aut et.', 'est-repellat-enim-aut-et', 'Enim impedit tenetur dolor nam commodi dignissimos quam.', 1, '2018-06-05 08:28:20', '2018-06-05 08:28:20', '2017-09-18', NULL, NULL),
(15, 'Animi quis iure vel provident.', 'animi-quis-iure-vel-provident', '<p>Nostrum dolorum quis non quis autem saepe.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 03:57:25', '2018-06-18', NULL, NULL),
(16, 'Sunt voluptatem hic saepe quia.', 'sunt-voluptatem-hic-saepe-quia', '<p>Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 05:59:03', '2018-06-19', NULL, NULL),
(17, 'Sunt voluptatem hic saepe quia.', 'sunt-voluptatem-hic-saepe-quia', '<p>Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 05:59:03', '2018-06-19', NULL, NULL),
(18, 'Et similique cumque optio autem.', 'et-similique-cumque-optio-autem', '<p>Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.v</p>', 1, '2018-06-05 08:28:13', '2018-07-18 06:13:54', '2018-07-17', NULL, '<p>Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.Voluptatem amet corporis qui fugit.</p>'),
(19, 'Voluptas quisquam ducimus et et reprehenderit.', 'voluptas-quisquam-ducimus-et-et-reprehenderit', '<p>Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 03:57:14', '2018-06-21', NULL, '<p>Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.Ab non tenetur rerum ut.</p>'),
(20, 'Animi quis iure vel provident.', 'animi-quis-iure-vel-provident', '<p>Nostrum dolorum quis non quis autem saepe.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 03:57:25', '2018-06-18', NULL, NULL),
(21, 'Sunt voluptatem hic saepe quia.', 'sunt-voluptatem-hic-saepe-quia', '<p>Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 05:59:03', '2018-06-19', NULL, NULL),
(22, 'Sunt voluptatem hic saepe quia.', 'sunt-voluptatem-hic-saepe-quia', '<p>Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.Similique enim et illum nihil illum.</p>', 1, '2018-06-05 08:28:20', '2018-06-13 05:59:03', '2018-06-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, NULL),
(2, 4, 5, NULL, NULL),
(3, 5, 5, NULL, NULL),
(4, 5, 6, NULL, NULL),
(5, 6, 5, NULL, NULL),
(6, 6, 6, NULL, NULL),
(7, 7, 4, NULL, NULL),
(8, 7, 5, NULL, NULL),
(9, 7, 6, NULL, NULL),
(11, 10, 5, NULL, NULL),
(12, 9, 4, NULL, NULL),
(15, 11, 7, NULL, NULL),
(16, 11, 10, NULL, NULL),
(17, 12, 7, NULL, NULL),
(18, 12, 9, NULL, NULL),
(19, 12, 10, NULL, NULL),
(20, 12, 11, NULL, NULL),
(21, 13, 7, NULL, NULL),
(22, 13, 10, NULL, NULL),
(23, 15, 9, NULL, NULL),
(24, 15, 11, NULL, NULL),
(25, 11, 9, NULL, NULL),
(26, 11, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(4, '123', '123', '2018-06-02 04:12:14', '2018-06-02 04:12:14'),
(7, 'adipisci', 'adipisci', '2018-06-05 08:23:55', '2018-06-05 08:23:55'),
(9, 'nulla', 'nulla', '2018-06-05 08:23:55', '2018-06-05 08:23:55'),
(10, 'quisquam', 'quisquam', '2018-06-05 08:23:55', '2018-06-05 08:23:55');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'YANTAR', 'Admin', 'yantarphenix@gmail.com', '$2y$10$1l0THcn3gUZjy/RBqznM9O.MIKcemwlE31n530dfPHqh.Dzv0YA2W', 't7Vc2MPXMW4QxHNBszf1vekRrHmuYzjrV0L6O8HdvPepeJWH8GIN8u86P6PX', '2018-11-07 21:17:31', '2018-11-07 21:17:31', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
