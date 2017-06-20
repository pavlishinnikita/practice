-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2017 г., 14:32
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Weather`
--

-- --------------------------------------------------------

--
-- Структура таблицы `weather`
--

CREATE TABLE IF NOT EXISTS `weather` (
  `id_weather` int(11) NOT NULL,
  `main` varchar(50) DEFAULT '',
  `description` varchar(50) DEFAULT 'Description',
  `icon` varchar(10) DEFAULT '',
  `country` varchar(20) DEFAULT 'Country',
  `city` varchar(20) DEFAULT 'City',
  `rain` float DEFAULT '0',
  `clouds` int(11) DEFAULT '0',
  `deg` float DEFAULT '0',
  `speed` float DEFAULT '0',
  `dt` date DEFAULT '2010-11-12',
  `pressure` float DEFAULT '0',
  `humidity` float DEFAULT '0',
  `min_temp` float DEFAULT '0',
  `max_temp` float DEFAULT '0',
  `lon` float DEFAULT NULL,
  `lat` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id_weather`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `weather`
--
ALTER TABLE `weather`
  MODIFY `id_weather` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
