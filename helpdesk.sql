-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- 생성 시간: 21-04-30 12:52
-- 서버 버전: 5.7.31
-- PHP 버전: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `helpdesk`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
    `id_reponse` int(10) NOT NULL AUTO_INCREMENT,
    `content` text NOT NULL,
    `id_user` int(10) NOT NULL,
    `id` int(10) NOT NULL,
    `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_reponse`),
    KEY `fk_id_tiket` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `content`, `id_user`, `id`, `creation_date`) VALUES
(1, 'oui alors ', 3, 2, '2021-04-28 22:03:18'),
(2, 'sdfasdfsa sdfsadf', 3, 8, '2021-04-29 00:11:43'),
(3, 'sdfsadfsdf sd sdfsadf sadf sdf sadfsda s', 7, 1, '2021-04-29 01:22:22'),
(4, 'sdfsadf asdf', 7, 2, '2021-04-29 01:22:53'),
(5, '11111 11111', 7, 2, '2021-04-29 01:23:40'),
(6, 'aaaaaaaaa aaaaa', 7, 5, '2021-04-29 02:44:38'),
(7, '222222 222', 7, 5, '2021-04-29 02:44:54'),
(8, '111 11111', 7, 9, '2021-04-30 06:54:34'),
(9, '111 11111', 7, 9, '2021-04-30 06:55:46'),
(10, '111 11111', 7, 9, '2021-04-30 06:56:19'),
(11, 'dd dddd', 7, 11, '2021-04-30 21:51:24');

-- --------------------------------------------------------

--
-- 테이블 구조 `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) DEFAULT NULL,
    `content` text NOT NULL,
    `id_user` int(10) NOT NULL,
    `category` varchar(255) DEFAULT 'Pédagogique',
    `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `statusT` varchar(255) DEFAULT 'en cours',
    PRIMARY KEY (`id`),
    KEY `fk_id_user` (`id_user`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `id_user` int(10) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `promotion` varchar(255) DEFAULT NULL,
    `type_user` varchar(255) NOT NULL,
    PRIMARY KEY (`id_user`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `creation_date`, `promotion`, `type_user`) VALUES
(1, 'a@a.com', 'a', 'aaa', '2021-04-24 12:12:10', 'miage', 'etudiant'),
(2, 'b@b.com', 'bbb', 'bbb', '2021-04-26 14:11:39', 'miage', 'etudiant'),
(3, 'c@c.com', 'nameC', 'ccc', '2021-04-26 17:15:15', 'miage', 'professeur'),
(4, 'd@d.com', 'd', 'ddd', '2021-04-28 11:43:31', NULL, 'etudiant'),
(5, 'aaa@a.com', 'a', 'aaa', '2021-04-28 11:44:32', NULL, 'etudiant'),
(6, 'w@w.com', 'w', 'www', '2021-04-28 11:49:08', NULL, 'etudiant'),
(7, 'e@e.com', 'eee', 'eee', '2021-04-28 16:17:04', NULL, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
