-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 21 2015 г., 09:14
-- Версия сервера: 5.5.43-0ubuntu0.14.04.1
-- Версия PHP: 5.6.8-1+deb.sury.org~trusty+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `login` varchar(25) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `session` varchar(35) NOT NULL,
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `pass`, `session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'My_HAsh_key555d73b7e2d7e'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'My_HAsh_key555d70b51049f'),
('login', 'd56b699830e77ba53855679cb1d252da', 'My_HAsh_key555d762fe5748'),
('vasya', 'a127c4fdad3080541ec6acc0d8acd704', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
