-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 31 2024 г., 01:36
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pharmacy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `клієнт`
--

CREATE TABLE IF NOT EXISTS `клієнт` (
  `ID_клієнта` int(110) NOT NULL AUTO_INCREMENT,
  `Ім_я` varchar(50) DEFAULT NULL,
  `Прізвище` varchar(50) DEFAULT NULL,
  `Адреса` varchar(255) DEFAULT NULL,
  `Електронна_пошта` varchar(100) DEFAULT NULL,
  `Телефон` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_клієнта`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `клієнт`
--

INSERT INTO `клієнт` (`ID_клієнта`, `Ім_я`, `Прізвище`, `Адреса`, `Електронна_пошта`, `Телефон`) VALUES
(1, 'KinDuDu', '.', '34 восточная 43 дом', 'dudnik.boris2016@gmail.com', '0987543385'),
(2, 'KinDuDu', '.', '34 восточная 43 дом', 'dudnik.boris2016@gmail.com', '0987543385');

-- --------------------------------------------------------

--
-- Структура таблицы `постачальник`
--

CREATE TABLE IF NOT EXISTS `постачальник` (
  `ID_постач` int(11) NOT NULL AUTO_INCREMENT,
  `Назва` varchar(255) DEFAULT NULL,
  `Адреса` varchar(255) DEFAULT NULL,
  `Телефон` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_постач`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `постачальник`
--

INSERT INTO `постачальник` (`ID_постач`, `Назва`, `Адреса`, `Телефон`) VALUES
(2, 'KinDuDu .', '34 восточная 43 дом', '0987543385'),
(4, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `продукт`
--

CREATE TABLE IF NOT EXISTS `продукт` (
  `ID_продукту` int(11) NOT NULL AUTO_INCREMENT,
  `Назва` varchar(255) DEFAULT NULL,
  `Виробник` varchar(255) DEFAULT NULL,
  `Ціна` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_продукту`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `аптека`
--

CREATE TABLE IF NOT EXISTS `аптека` (
  `ID_аптеки` int(110) NOT NULL AUTO_INCREMENT,
  `Назва` varchar(255) DEFAULT NULL,
  `Адреса` varchar(255) DEFAULT NULL,
  `Телефон` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_аптеки`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `аптека`
--

INSERT INTO `аптека` (`ID_аптеки`, `Назва`, `Адреса`, `Телефон`) VALUES
(1, 'KinDuDu', '34 восточная 43 дом', '0987543385'),
(11, '23535', '235325235', '2353525235');

-- --------------------------------------------------------

--
-- Структура таблицы `замовлення`
--

CREATE TABLE IF NOT EXISTS `замовлення` (
  `ID_замовлення` int(11) NOT NULL,
  `ID_аптеки` int(11) DEFAULT NULL,
  `ID_клієнта` int(11) DEFAULT NULL,
  `Дата` date DEFAULT NULL,
  `Статус` varchar(50) DEFAULT NULL,
  `ID_постач` int(11) DEFAULT NULL,
  `ID_оплата` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_замовлення`),
  KEY `ID_аптеки` (`ID_аптеки`),
  KEY `ID_клієнта` (`ID_клієнта`),
  KEY `ID_постач` (`ID_постач`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `оплата`
--

CREATE TABLE IF NOT EXISTS `оплата` (
  `ID_оплата` int(11) NOT NULL AUTO_INCREMENT,
  `ID_замовлення` int(11) DEFAULT NULL,
  `Сума` varchar(100) DEFAULT NULL,
  `Дата_оплати` date DEFAULT NULL,
  PRIMARY KEY (`ID_оплата`),
  KEY `ID_замовлення` (`ID_замовлення`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `оплата`
--

INSERT INTO `оплата` (`ID_оплата`, `ID_замовлення`, `Сума`, `Дата_оплати`) VALUES
(5, NULL, NULL, '2024-05-31'),
(6, NULL, NULL, '2024-05-31'),
(7, NULL, NULL, '2024-05-31'),
(8, NULL, NULL, '2024-05-31'),
(9, NULL, '0', '2024-05-31'),
(10, NULL, '213213', '2024-05-31'),
(11, NULL, '2312454135123', '2024-05-31'),
(12, NULL, '0', '2024-05-31');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `замовлення`
--
ALTER TABLE `замовлення`
  ADD CONSTRAINT `@n0@g0@s0@u0@i0@r0@l0@t0@t0@r1_ibfk_1` FOREIGN KEY (`ID_аптеки`) REFERENCES `аптека` (`ID_аптеки`),
  ADD CONSTRAINT `@n0@g0@s0@u0@i0@r0@l0@t0@t0@r1_ibfk_2` FOREIGN KEY (`ID_клієнта`) REFERENCES `клієнт` (`ID_клієнта`),
  ADD CONSTRAINT `@n0@g0@s0@u0@i0@r0@l0@t0@t0@r1_ibfk_3` FOREIGN KEY (`ID_постач`) REFERENCES `постачальник` (`ID_постач`);

--
-- Ограничения внешнего ключа таблицы `оплата`
--
ALTER TABLE `оплата`
  ADD CONSTRAINT `@u0@v0@r0@g0@y0@g0_ibfk_1` FOREIGN KEY (`ID_замовлення`) REFERENCES `замовлення` (`ID_замовлення`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
