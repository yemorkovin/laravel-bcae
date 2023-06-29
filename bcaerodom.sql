-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 12 2023 г., 10:18
-- Версия сервера: 8.0.29
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bcaerodom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int NOT NULL,
  `id_premises` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_premises`, `image`) VALUES
(22, 3, '804e9d2865bb10d29eff34da561efebf.png'),
(23, 3, '749fdb0f4e5316c33ea10fbb5a8b60b6.png'),
(25, 4, '650250220e58ce459ea6efecb0a6b9b3.png');

-- --------------------------------------------------------

--
-- Структура таблицы `premises`
--

CREATE TABLE `premises` (
  `id` int NOT NULL,
  `areaMin` float DEFAULT NULL,
  `areaMax` float DEFAULT NULL,
  `isActive` varchar(100) DEFAULT NULL,
  `crmId` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `floor` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `pricecur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_typedeal` int DEFAULT NULL,
  `id_tax` int DEFAULT NULL,
  `isready` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `readydate` date DEFAULT NULL,
  `explcur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `explprice` float DEFAULT NULL,
  `layout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastsynctime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `premises`
--

INSERT INTO `premises` (`id`, `areaMin`, `areaMax`, `isActive`, `crmId`, `type_id`, `floor`, `price`, `pricecur`, `id_typedeal`, `id_tax`, `isready`, `readydate`, `explcur`, `explprice`, `layout`, `lastsynctime`) VALUES
(3, 123414, 2323, 'on', NULL, 1, 10, 300000, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3233, 3233, 'off', 3424, 1, 34, 235235000, 'RUB', 2, 2, 'готов', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sings`
--

CREATE TABLE `sings` (
  `id` int NOT NULL,
  `flag_header` int NOT NULL,
  `flag_footer` int NOT NULL,
  `flag_sign` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sings`
--

INSERT INTO `sings` (`id`, `flag_header`, `flag_footer`, `flag_sign`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tax`
--

CREATE TABLE `tax` (
  `id_tax` int NOT NULL,
  `name_tax` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tax`
--

INSERT INTO `tax` (`id_tax`, `name_tax`) VALUES
(1, 'УСН'),
(2, 'НДС'),
(3, 'Не включая ндс');

-- --------------------------------------------------------

--
-- Структура таблицы `typedeal`
--

CREATE TABLE `typedeal` (
  `id_typedeal` int NOT NULL,
  `name_typedeal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `typedeal`
--

INSERT INTO `typedeal` (`id_typedeal`, `name_typedeal`) VALUES
(1, 'аренда'),
(2, 'продажа');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id_type` int NOT NULL,
  `name_types` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id_type`, `name_types`) VALUES
(1, 'офис'),
(2, 'псн'),
(3, 'торговое');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'Admin1', 'admin@admin.ru', '$2y$10$JUDHSJDitLLctP8iTTjZP.HpXJ9VHKfqVtNWXKSc7KFFVAHpe8rLK', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Индексы таблицы `premises`
--
ALTER TABLE `premises`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sings`
--
ALTER TABLE `sings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id_tax`);

--
-- Индексы таблицы `typedeal`
--
ALTER TABLE `typedeal`
  ADD PRIMARY KEY (`id_typedeal`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `premises`
--
ALTER TABLE `premises`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sings`
--
ALTER TABLE `sings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tax`
--
ALTER TABLE `tax`
  MODIFY `id_tax` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `typedeal`
--
ALTER TABLE `typedeal`
  MODIFY `id_typedeal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
