-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 08:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sytedb`
--
CREATE DATABASE IF NOT EXISTS `sytedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sytedb`;

-- --------------------------------------------------------

--
-- Table structure for table `allchat`
--

CREATE TABLE `allchat` (
  `Id` int(11) NOT NULL,
  `ChatName` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allchat`
--

INSERT INTO `allchat` (`Id`, `ChatName`, `UserName`, `Text`) VALUES
(1, 'test', 'test', 'Пользователь test Начал чат'),
(2, 'test', 'test', 'Тестовое сообщение'),
(3, 'test', 'test', 'Тестовое сообщение'),
(4, 'test', 'test', '1234'),
(5, 'test', 'test', 'hhslkdfjbglksjdbgf'),
(6, 'test', 'test', 'jjjjjj'),
(7, 'test', 'test', 'asdfasdf asdf as'),
(8, 'test', 'test', 'fg sfd g'),
(9, 'test', 'test', 'afsd asdf'),
(10, 'test', 'test', 'tttt'),
(11, 'test', 'test', ' dsa sadf'),
(12, 'test', 'test', 'asdf asdf '),
(13, 'test', 'test', 'test ????'),
(14, 'test', 'test', 'test ????????'),
(15, 'test', 'test', '????');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
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
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `Module`, `Record`, `UserName`, `UserId`, `Coment`, `CreateDate`) VALUES
(2, 'news', 2, 'test', 1, 'Мой первый комментарий', '2020-04-11 07:45:16'),
(3, 'news', 2, 'test', 1, 'Это плохая новость', '2020-04-11 07:45:31'),
(4, 'news', 1, 'test', 1, 'Это комментарий', '2020-04-11 08:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `ModuleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Id`, `UserID`, `Module`, `ModuleId`) VALUES
(1, 1, 'news', 1),
(2, 1, 'news', 2),
(3, 1, 'comment', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
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
-- Dumping data for table `news`
--

INSERT INTO `news` (`Id`, `Title`, `Text`, `ShortText`, `CreateDate`, `CategoryId`, `UserId`, `MainPhoto`) VALUES
(1, 'test', '<p>Текст новости</p>\r\n', '<p>фывафыва фыва фыва&nbsp;</p>\r\n', '2020-04-05 12:01:01', 7, 1, '5e89c87d8b4ad.jpg'),
(2, 'abc', '<p>adjl fhasj dfh</p>\r\n\r\n<p>asdasdfjkbasdl khb</p>\r\n\r\n<p>ads ;kjabsdfk;j&nbsp;</p>\r\n\r\n<p>asdf;kj bas;dkjf&nbsp;</p>\r\n', '<p>abc dsajhbasdhf&nbsp;</p>\r\n', '2020-04-11 06:31:01', 7, 1, '5e91642592100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newscategoryes`
--

CREATE TABLE `newscategoryes` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newscategoryes`
--

INSERT INTO `newscategoryes` (`Id`, `name`, `description`) VALUES
(5, 'Главные', 'Главные новости'),
(6, 'Хайтек', 'Новости хайтека'),
(7, 'Test', 'Test'),
(8, 'Читы', 'Читы для игров');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EMail` varchar(100) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tovar`
--

CREATE TABLE `tovar` (
  `Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `IsPresent` tinyint(1) NOT NULL,
  `Pictures` text NOT NULL,
  `BuyDiscount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `LastName`, `Login`, `Password`, `IsAdmin`) VALUES
(1, 'test', 'test', 'test', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ShortText` text NOT NULL,
  `Text` text NOT NULL,
  `StartDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `EndDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsAnonym` tinyint(1) NOT NULL,
  `Type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`Id`, `Title`, `ShortText`, `Text`, `StartDate`, `EndDate`, `IsAnonym`, `Type`) VALUES
(1, 'Тест 1', '', '<p>Тестовое голосование</p>\r\n', '2020-04-18 08:25:00', '2020-04-19 08:25:00', 1, 0),
(2, '123', '<p>123</p>\r\n', '<p>123</p>\r\n', '2020-04-18 13:26:00', '2020-04-18 13:26:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voteanswers`
--

CREATE TABLE `voteanswers` (
  `Id` int(11) NOT NULL,
  `VoteId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Description` text NOT NULL,
  `UserName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `votequestions`
--

CREATE TABLE `votequestions` (
  `Id` int(11) NOT NULL,
  `VoteId` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votequestions`
--

INSERT INTO `votequestions` (`Id`, `VoteId`, `Title`, `Text`) VALUES
(1, 1, 'test asdf', '<p>test asdfadsf</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allchat`
--
ALTER TABLE `allchat`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ChatName` (`ChatName`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Module` (`Module`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `newscategoryes`
--
ALTER TABLE `newscategoryes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `voteanswers`
--
ALTER TABLE `voteanswers`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `VoteId` (`VoteId`),
  ADD KEY `QuestionId` (`QuestionId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `votequestions`
--
ALTER TABLE `votequestions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `VoteId` (`VoteId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allchat`
--
ALTER TABLE `allchat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newscategoryes`
--
ALTER TABLE `newscategoryes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tovar`
--
ALTER TABLE `tovar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voteanswers`
--
ALTER TABLE `voteanswers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votequestions`
--
ALTER TABLE `votequestions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD CONSTRAINT `subscribes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `subscribes_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `newscategoryes` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
