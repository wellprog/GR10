-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 11 2020 г., 10:25
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sytedb`
--
CREATE DATABASE IF NOT EXISTS `sytedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sytedb`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `Record` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Coment` varchar(255) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`Id`, `Module`, `Record`, `UserName`, `UserId`, `Coment`, `CreateDate`) VALUES
(2, 'news', 2, 'test', 1, 'Мой первый комментарий', '2020-04-11 07:45:16'),
(3, 'news', 2, 'test', 1, 'Это плохая новость', '2020-04-11 07:45:31'),
(4, 'news', 1, 'test', 1, 'Это комментарий', '2020-04-11 08:13:56');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `Id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` text NOT NULL,
  `ShortText` text NOT NULL DEFAULT '',
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CategoryId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `MainPhoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`Id`, `Title`, `Text`, `ShortText`, `CreateDate`, `CategoryId`, `UserId`, `MainPhoto`) VALUES
(1, 'test', '<p>Текст новости</p>\r\n', '<p>фывафыва фыва фыва&nbsp;</p>\r\n', '2020-04-05 12:01:01', 7, 1, '5e89c87d8b4ad.jpg'),
(2, 'abc', '<p>adjl fhasj dfh</p>\r\n\r\n<p>asdasdfjkbasdl khb</p>\r\n\r\n<p>ads ;kjabsdfk;j&nbsp;</p>\r\n\r\n<p>asdf;kj bas;dkjf&nbsp;</p>\r\n', '<p>abc dsajhbasdhf&nbsp;</p>\r\n', '2020-04-11 06:31:01', 7, 1, '5e91642592100.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `newscategoryes`
--

CREATE TABLE `newscategoryes` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newscategoryes`
--

INSERT INTO `newscategoryes` (`Id`, `name`, `description`) VALUES
(5, 'Главные', 'Главные новости'),
(6, 'Хайтек', 'Новости хайтека'),
(7, 'Test', 'Test'),
(8, 'Читы', 'Читы для игров');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Name`, `LastName`, `Login`, `Password`, `IsAdmin`) VALUES
(1, 'test', 'test', 'test', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `newscategoryes`
--
ALTER TABLE `newscategoryes`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `newscategoryes`
--
ALTER TABLE `newscategoryes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
