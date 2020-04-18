-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 05:11 PM
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
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

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
