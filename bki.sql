-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 02 2018 г., 10:53
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cartid` varchar(32) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `goods` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `price`) VALUES
(2, 'Смартфон Samsung Galaxy S1', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '1990.00'),
(3, 'Смартфон Samsung Galaxy S2', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '2990.00'),
(4, 'Смартфон Samsung Galaxy S3', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '3990.00'),
(5, 'Смартфон Samsung Galaxy S4', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '4990.00'),
(6, 'Смартфон Samsung Galaxy S5', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '5990.00'),
(7, 'Смартфон Samsung Galaxy S6', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '6990.00'),
(8, 'Смартфон Samsung Galaxy S7', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '7990.00'),
(9, 'Смартфон Samsung Galaxy S8', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '8990.00'),
(10, 'Смартфон Samsung Galaxy S9', 'ID: 4029698\r\nДиагональ (дюйм): 5.8\r\nРазрешение (пикс): 2960x1440\r\nВстроенная память (Гб): 64\r\nФотокамера (Мп): 12\r\nПроцессор: Samsung Exynos 9810 Octa', '9990.00');

-- --------------------------------------------------------

--
-- Структура таблицы `goods_images`
--

CREATE TABLE `goods_images` (
  `id` int(11) NOT NULL,
  `good_id` int(11) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_images`
--

INSERT INTO `goods_images` (`id`, `good_id`, `file`) VALUES
(1, 2, 'hq.jpg'),
(2, 3, 'hq2.jpg'),
(3, 4, 'hq3.jpg'),
(4, 5, 'hq.jpg'),
(5, 6, 'hq2.jpg'),
(6, 7, 'hq3.jpg'),
(7, 8, 'hq.jpg'),
(8, 9, 'hq2.jpg'),
(9, 10, 'hq3.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartid` (`cartid`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_images`
--
ALTER TABLE `goods_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `good_id` (`good_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `goods_images`
--
ALTER TABLE `goods_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods_images`
--
ALTER TABLE `goods_images`
  ADD CONSTRAINT `goods_images_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
