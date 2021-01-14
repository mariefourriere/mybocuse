-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2021 at 05:50 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybocuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `departure`
--

CREATE TABLE `departure` (
  `id` tinyint NOT NULL,
  `arrivals` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `departures` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `date_arrival` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `departure`
--

INSERT INTO `departure` (`id`, `arrivals`, `departures`, `date_arrival`, `user_id`) VALUES
(37, '17:32:17', '17:32:20', '1610578800', 4);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipeid` tinyint NOT NULL,
  `recipe_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `fk_userid` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` tinyint NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `passwd` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `account_type` enum('chef','student') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `firstname`, `lastname`, `passwd`, `account_type`) VALUES
(1, 'audrey-g@beaucuz.be', 'Audrey', 'Gilmant', '$2y$10$v/b.YYJy5UWgwATYWW9GXepCxghoA/ym1QwaDCnEPMQJbcmdbQUZi', 'chef'),
(2, 'marie-f@beaucuz.be', 'Marie', 'Fourriere', '$2y$10$Twwnbnj1N5QxkAZ4KBIdr.6HBhjEsdpCLwugtaqOgMAfk55Mta/PC', 'chef'),
(3, 'dena-b@beaucuz.be', 'Dena', 'Babaie', '$2y$10$OGRW8yCWQvCiCtIKHn9mEuVyqvM8SPyrsYMTQ7IFFJRqR.T0kE1pa', 'chef'),
(4, 'richard-i@beaucuz.be', 'Richard', 'Ibambasi', 'richardibambasi', 'chef'),
(5, 'dwayne-j@beaucuz.be', 'Dwayne', 'Johnson', '123456789', 'student'),
(6, 'jason-s@beaucuz.be', 'Jason', 'Statham', '$2y$10$mJGQ9OyMgmKjI3gvm2xPXeg5S.cEVWGhnAd7cy2ZhfZQDP19qEPpy', 'student'),
(7, 'vin-d@beaucuz.be', 'Vin', 'Diesel', '$2y$10$4bgAGQmzp2kn5Alu5Uh9IOfG.psxNVyuMekEUxVe9Tm9hK7.YMhUy', 'student'),
(8, 'paul-w@beaucuz.be', 'Paul', 'Walker', '$2y$10$CizEbyfEpIqMP.wOes/K0umlYBiNoi0X1Qrk3KkIeYmByIPw8dcsa', 'student'),
(9, 'michelle-r@beaucuz.be', 'Michelle', 'Rodriguez', '$2y$10$Ojz6Fd2a.xc1mJWUM20ozOiNxLkvfDjQ8ikDf0ExKmHTfuBDRDChy', 'student'),
(10, 'jordana-b@beaucuz.be', 'Jordana', 'Brewster', '$2y$10$Wby46vbQN2egkiqfnuAGbuFSPPlYnW1Oft.uLn/nreNLY4krZeOxi', 'student'),
(11, 'luke-e@beaucuz.be', 'Luke', 'Evans', '$2y$10$7xgCo2PwYvJ3bddKOXXUMu4GxbR28jOoVZaZRzV8nySHWcO/ds8Pi', 'student'),
(12, 'charlize-t@beaucuz.be', 'Charlize', 'Theron', '$2y$10$wX5ecwmEocrW4TTBY4.O9ObJ92f0rmv8xUm6sigP8LRrGe1z/xoBa', 'student'),
(13, 'vanessa-k@beaucuz.be', 'Vanessa', 'Kirby', '$2y$10$7u3vwPfHUnZRkkwKQ8JdvOd83iuzA4rrLUVKQ2kgZ2Ks3jP2j/uTe', 'student'),
(14, 'john-c@beaucuz.be', 'John', 'Cena', '$2y$10$2ODiw8dL.G7MsesGc.6o/uY5ciePbYYmLQC8axjJOgVAa1pqSE9tS', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departure`
--
ALTER TABLE `departure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departure_ibfk_1` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipeid`),
  ADD KEY `fk_userid` (`fk_userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departure`
--
ALTER TABLE `departure`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipeid` tinyint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departure`
--
ALTER TABLE `departure`
  ADD CONSTRAINT `departure_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `USER AND DEPATURE` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
