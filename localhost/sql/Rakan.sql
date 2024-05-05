-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 05 2024 р., 20:57
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `Rakan`
--

-- --------------------------------------------------------

--
-- Структура таблиці `accaunt`
--

CREATE TABLE `accaunt` (
  `Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `purse` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `accaunt`
--

INSERT INTO `accaunt` (`Name`, `Email`, `Password`, `purse`) VALUES
('SquireUA', 'testemail1@gmail.com', 'test123', 1000),
('IAmRakan', 'testemail2@gmail.com', 'test123', 500);

-- --------------------------------------------------------

--
-- Структура таблиці `GuestBook`
--

CREATE TABLE `GuestBook` (
  `ID` int NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `idofproject` int NOT NULL,
  `Massege` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datatime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Answer` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `GuestBook`
--

INSERT INTO `GuestBook` (`ID`, `Name`, `Email`, `idofproject`, `Massege`, `datatime`, `Answer`) VALUES
(496, 'SquireUA', 'testemail1@gmail.com', 1, 'hello', '2024-05-05 11:29:00', NULL),
(498, 'IAmRakan', 'testemail2@gmail.com', 2, 'hello', '2024-05-05 11:31:29', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `projects`
--

CREATE TABLE `projects` (
  `ID` int NOT NULL,
  `nameofproject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bywho` varchar(20) NOT NULL,
  `priceneed` int NOT NULL,
  `pricecollected` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `projects`
--

INSERT INTO `projects` (`ID`, `nameofproject`, `bywho`, `priceneed`, `pricecollected`, `description`) VALUES
(1, 'Bosorka: Reborn', 'SquireUA', 1000, 100, 'some text some textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome textsome text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text '),
(2, 'Stop Vanguard', 'IAmRakan', 500, 50, 'some text');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `accaunt`
--
ALTER TABLE `accaunt`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `Name` (`Name`);

--
-- Індекси таблиці `GuestBook`
--
ALTER TABLE `GuestBook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`Name`),
  ADD KEY `Email` (`Email`),
  ADD KEY `idofproject` (`idofproject`);

--
-- Індекси таблиці `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bywho` (`bywho`),
  ADD KEY `nameofproject` (`nameofproject`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `GuestBook`
--
ALTER TABLE `GuestBook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT для таблиці `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `GuestBook`
--
ALTER TABLE `GuestBook`
  ADD CONSTRAINT `guestbook_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `accaunt` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `guestbook_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `accaunt` (`Name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `guestbook_ibfk_3` FOREIGN KEY (`idofproject`) REFERENCES `projects` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`bywho`) REFERENCES `accaunt` (`Name`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
