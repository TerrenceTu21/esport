-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 05:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esportdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `Games` varchar(40) NOT NULL,
  `StartDate` varchar(20) NOT NULL,
  `DateOfRegistration` varchar(20) NOT NULL,
  `Fee` int(10) NOT NULL,
  `TeamMember` int(5) NOT NULL,
  `EventDetails` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `Games`, `StartDate`, `DateOfRegistration`, `Fee`, `TeamMember`, `EventDetails`, `Status`) VALUES
(17, 'Counter Strike Global Offensive', '2023-09-29', '2023-09-25', 300, 5, 'Prize pool: rm 100000', 'Up coming'),
(18, 'Players Unknown Battle Ground', '2023-05-08', '2023-04-18', 300, 4, 'Prize pool: rm 100000', 'On going'),
(22, 'Dota 2', '2023-01-05', '2022-12-08', 200, 5, 'Prize pool: rm 20000', 'Past tournaments'),
(24, 'League Of Legends', '2023-10-28', '2023-10-19', 200, 5, 'price pool: rm 20000', 'Up coming'),
(25, 'Players Unknown Battle Ground', '2023-10-17', '2023-10-14', 100, 4, 'price pool: rm 20000', 'Up coming'),
(26, 'League Of Legends', '2023-06-10', '2023-05-15', 100, 5, 'LOL', 'Up coming'),
(27, 'Dota 2', '2023-07-14', '2023-06-14', 150, 5, 'DOTA 2 Inter Uni', 'Up coming'),
(29, 'Counter Strike Global Offensive', '2023-04-05', '2023-03-02', 203, 5, 'LOL', 'Past tournaments');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `Title` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Inquiry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`Title`, `UserName`, `Email`, `Date`, `Inquiry`) VALUES
('Web', '111', 'terren@gmail.com', '2023-05-11 07:32:22', 'qqqq'),
('Tournaments', 'Herald Cheng', 'hcheng2002@gmail.com', '2022-09-19 06:12:57', 'Please organise more games tournaments,tq!'),
('valorant tournament', 'Lei Lou Sai', 'lousai@gmail.com', '2022-09-19 06:00:22', 'When will you organise the valorant tournament..'),
('Apex Legend', 'Terrence', 'terrence@gmail.com', '2023-03-29 15:22:26', 'apex!');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `teamId` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `event_id` int(11) NOT NULL,
  `teamName` varchar(25) NOT NULL,
  `Member1` varchar(30) NOT NULL,
  `Member2` varchar(30) NOT NULL,
  `Member3` varchar(30) NOT NULL,
  `Member4` varchar(30) NOT NULL,
  `Member5` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `NRIC` varchar(14) NOT NULL,
  `Phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`teamId`, `userId`, `event_id`, `teamName`, `Member1`, `Member2`, `Member3`, `Member4`, `Member5`, `Email`, `NRIC`, `Phone`) VALUES
(10, 3, 17, 'SOTTING', 'ian', 'TWIST', 'RAIN', 'KARRIN', 'FADES', 'iankang@gmail.com', '030234-12-0123', '014-9876342'),
(11, 1, 17, 'GGS', 'weswes', 'Yap', 'MINS', 'JAJA', 'WESMO', 'wesley@gmail.com', '030813-12-0251', '014-6733452'),
(13, 1, 17, 'AST', 'wesley', 'Simple', 'amad', 'ala', 'aban', 'wesleyyii@gmail.com', '030813-12-0251', '014-6733464'),
(14, 1, 24, 'DFT', 'wesley', 'lalala', 'ohohoh', 'ahahah', 'heheheh', 'wesleyyii@gmail.com', '030813-12-0251', '014-6733464'),
(15, 1, 25, 'Tim', 'wesley', 'Yap', 'Mengmeng', 'Shuaige', '-', 'wesleyyii@gmail.com', '030813-12-0251', '014-6733464'),
(16, 1, 24, 'dft', 'wesley', 'terrence', 'randy', 'raynard', 'jaqueline', 'wesleyyii@gmail.com', '000101-12-1010', '0123456789'),
(17, 1, 25, 'dft', 'wesley', 'terrence', 'randy', 'raynard', '-', 'wesleyyii@gmail.com', '000101-12-1010', '012-3456789'),
(18, 1, 25, 'dft', 'wesley', 'terrence', 'randy', 'raynard', '-', 'wesleyyii@gmail.com', '000101-12-1010', '012-3456789'),
(23, 10, 29, 'dft', 'Terrence', 'Wesley', 'randy', 'raynard', 'jaqueline', 'terrence@gmail.com', '010101-12-1010', '012-3456789'),
(24, 10, 17, 'WEBBBBB', 'Terrence', 'Wesley', 'Randy', 'raynard', 'Jaqueline', 'terrence@gmail.com', '010101-12-1010', '012-3456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `userIc` varchar(15) NOT NULL,
  `phoneNo` varchar(15) NOT NULL,
  `userPassword` varchar(15) NOT NULL,
  `usersType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `userEmail`, `userIc`, `phoneNo`, `userPassword`, `usersType`) VALUES
(1, 'wesley', 'wesleyyii@gmail.com', '030813-12-0251', '014-6733464', '1234', 'user'),
(2, 'Ivan', 'username@gmail.com', '020320-12-0123', '012-3456789', '1111', 'user'),
(3, 'ian', 'ianchim@gmail.com', '030234-12-0123', '014-9876342', 'ian123', 'user'),
(7, 'Timothy', 'timothy@gmail.com', '030234-12-0123', '014-9876342', '12345', 'user'),
(8, 'poppy', 'poppy@gmail.com', '030813-12-0251', '0146733464', '1234', 'admin'),
(9, 'teemo', 'teemo@gmail.com', '020342-12-2313', '012-8762123', 'teemo', 'user'),
(10, 'Terrence', 'terrence@gmail.com', '010101-12-1010', '012-3456789', '1234', 'user'),
(11, 'vktt', 'vktt@gmail.com', '000208-12-5555', '012-3456789', '1234', 'user'),
(12, 'raynard', 'raynad@gmail.com', '200803-12-5566', '012-6985347', '1234', 'user'),
(13, 'cyw', 'cyw@gmail.com', '010101-12-1010', '012-6668888', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`teamId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
