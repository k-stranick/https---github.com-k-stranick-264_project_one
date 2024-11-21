-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 21, 2024 at 09:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_nine`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Nov 19, 2024 at 07:43 PM
-- Last update: Nov 21, 2024 at 08:50 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `user_name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_name`, `password`) VALUES
(1, 'Kyle', 'Stranick', 'kylestranickbusiness@gmai', 'kyleadmin', '$2y$10$1MyY0ruAyBCkePTIEPKKXe63XqFLRTmx0OCNtI6uwQC'),
(2, 'test', 'test', 'kstranic@dtcc.edu', 'theB1gTest', '$2y$10$bE2mZVsuN7xksMA0B7A05efXH9MLO9pWaZzuTMyTeAP'),
(3, 'Kyle', 'Stranick', 'newuser@gmail.com', 'testuser', '$2y$10$T0pWlHzONc/IticNH2SvCu.QYmOkPvPbdcKA6/Z3sc1'),
(4, 'kyle', 'TESTq', 'dsadsa@gmail.com', 'somethigneknfkldzs', '$2y$10$KnTY7UftU4HUq/fiAecZ3OUSx5dgj4drzvCoEz4ywIQiC9/sTg.8C'),
(5, 'fullSessionTest', 'TEST', 'kyle@kyle.kely', 'testingFull', '$2y$10$tT.yQtbBH0mtJV9RG5zKWOiaBDpG/9q4x7aTj6wCyWXD.wESEVK1S'),
(6, 'kyle', 'kyle', 'test@gmail.com', 'testKyle', '$2y$10$ZXoPdQPnS56I4MwSmClegeJFs/vBprgjSc4S4LeupbMlJev.fzQbu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
