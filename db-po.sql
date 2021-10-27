-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1:3308
-- Čas generovania: St 20.Okt 2021, 07:25
-- Verzia serveru: 8.0.18
-- Verzia PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `portalove`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_name_UNIQUE` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(2, 'Events'),
(1, 'Travel');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `posts_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`posts_id`,`users_id`),
  KEY `fk_comments_posts1_idx` (`posts_id`),
  KEY `fk_comments_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `comments`
--

INSERT INTO `comments` (`id`, `content`, `created_at`, `posts_id`, `users_id`) VALUES
(1, 'Test comment', '0000-00-00 00:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_name` (`item_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `menu`
--

INSERT INTO `menu` (`id`, `path`, `icon`, `item_name`) VALUES
(1, 'index.php', 'fa-home', 'Blog Home'),
(2, 'post.php', 'fa-pen', 'Single Post'),
(3, 'about.php', 'fa-users', 'About Xtra'),
(4, 'contact.php', 'fa-comments', 'Contact Uss');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `perex` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`users_id`,`categories_id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  KEY `fk_posts_users_idx` (`users_id`),
  KEY `fk_posts_categories1_idx` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `posts`
--

INSERT INTO `posts` (`id`, `title`, `perex`, `content`, `created_at`, `image`, `users_id`, `categories_id`) VALUES
(1, 'Single Post of Xtra Blog HTML Template', 'This is a description of the video post. You can also have an image instead of the video. You can free download Xtra Blog Template from TemplateMo website. Phasellus maximus quis est sit amet maximus. Vestibulum vel rutrum lorem, ac sodales augue.', 'This is a description of the video post. You can also have an image instead of the video. You can free download Xtra Blog Template from TemplateMo website. Phasellus maximus quis est sit amet maximus. Vestibulum vel rutrum lorem, ac sodales augue. Aliquam erat volutpat. Duis lectus orci, blandit in arcu est, elementum tincidunt lectus. Praesent vel justo tempor, varius lacus a, pharetra lacus.\r\n\r\nDuis pretium efficitur nunc. Mauris vehicula nibh nisi. Curabitur gravida neque dignissim, aliquet nulla sed, condimentum nulla. Pellentesque id venenatis quam, id cursus velit. Fusce semper tortor ac metus iaculis varius. Praesent aliquam ex vel lectus ornare tristique. Nunc et eros quis enim feugiat tincidunt et vitae dui.', '2021-10-12 00:00:00', 'img/img-01.jpg', 2, 2),
(2, 'Multi-purpose blog template', 'Xtra Blog is a multi-purpose HTML CSS template from TemplateMo website. Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.', 'Xtra Blog is a multi-purpose HTML CSS template from TemplateMo website. Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.Xtra Blog is a multi-purpose HTML CSS template from TemplateMo website. Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.Xtra Blog is a multi-purpose HTML CSS template from TemplateMo website. Blog list, single post, about, contact pages are included. Left sidebar fixed width and content area is a fluid full-width.', '2021-10-07 00:00:00', 'img/img-02.jpg', 1, 1),
(3, 'How can you apply Xtra Blog', 'You are allowed to convert this template as any kind of CMS theme or template for your custom website builder. You can also use this for your clients. Thank you for choosing us.', 'You are allowed to convert this template as any kind of CMS theme or template for your custom website builder. You can also use this for your clients. Thank you for choosing us.You are allowed to convert this template as any kind of CMS theme or template for your custom website builder. You can also use this for your clients. Thank you for choosing us.You are allowed to convert this template as any kind of CMS theme or template for your custom website builder. You can also use this for your clients. Thank you for choosing us.', '2021-10-10 00:00:00', 'img/img-03.jpg', 2, 2),
(4, 'A little restriction to apply', 'You are not allowed to re-distribute this template as a downloadable ZIP file on any template collection website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.', 'You are not allowed to re-distribute this template as a downloadable ZIP file on any template collection website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.You are not allowed to re-distribute this template as a downloadable ZIP file on any template collection website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.You are not allowed to re-distribute this template as a downloadable ZIP file on any template collection website. This is strongly prohibited as we worked hard for this template. Please contact TemplateMo for more information.', '2021-10-13 00:00:00', 'img/img-04.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `image`) VALUES
(1, 'Mark Sonny', 'mark@sonny.com', 'img/comment-1.jpg'),
(2, 'Jewel Soft', 'jewel@soft.com', 'img/comment-2.jpg');

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Obmedzenie pre tabuľku `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
