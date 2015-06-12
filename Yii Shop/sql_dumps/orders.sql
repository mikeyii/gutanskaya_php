-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 12 2015 г., 14:03
-- Версия сервера: 5.5.43-0ubuntu0.14.04.1
-- Версия PHP: 5.6.9-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tel` varchar(30) NOT NULL,
  `gds_data` varchar(200) NOT NULL,
  `sum` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `tel`, `gds_data`, `sum`, `date`) VALUES
(1, '8-923-234-23-22', 'a:18:{i:0;a:0:{}i:1;a:0:{}i:2;a:2:{s:2:"id";s:1:"1";s:5:"count";s:1:"2";}i:3;a:2:{s:2:"id";s:1:"2";s:5:"count";s:1:"3";}i:4;a:0:{}i:5;a:0:{}i:6;a:0:{}i:7;a:0:{}i:8;a:0:{}i:9;a:0:{}i:10;a:0:{}i:11;a:0:', 560, '2015-06-12 13:59:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
