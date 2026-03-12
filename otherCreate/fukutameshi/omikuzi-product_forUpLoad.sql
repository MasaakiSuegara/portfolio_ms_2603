SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- ローカル環境
-- drop database if exists omikuzi;
-- create database omikuzi default character set utf8 collate utf8_general_ci;
-- drop user if exists 'kannushi'@'localhost';
-- create user 'kannushi'@'localhost' identified by 'matikane';
-- grant all on omikuzi.* to 'kannushi'@'localhost';
-- use omikuzi;

-- XREA環境
use pfcreatebg_portfoliodatabasemscreate;

CREATE TABLE `fortune` (
  `id` int(11) NOT NULL,
  `luck` varchar(200) NOT NULL,
  `kuzi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

TRUNCATE TABLE `fortune`;

INSERT INTO `fortune` (`id`, `luck`, `kuzi`) VALUES
(1, '超吉', '超すごい'),
(2, '大吉', 'すごい良い'),
(3, '中吉', 'なかなか良い'),
(4, '吉', 'ちょうど良い'),
(5, '小吉', 'まだ良い'),
(6, '末吉', 'すこしだけ良い'),
(7, '凶', 'あまり良くない'),
(8, '大凶', '厄落とし');

ALTER TABLE `fortune`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `fortune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;