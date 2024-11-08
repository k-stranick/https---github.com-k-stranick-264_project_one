-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 07:31 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `price` double NOT NULL,
  `city` text NOT NULL,
  `state` char(2) NOT NULL,
  `condition` text NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `price`, `city`, `state`, `condition`, `description`, `image_path`) VALUES
(1, 'PS4', 1234, 'Selbyville', 'DE', 'used', 'Lightly used, in great shape.  test', '../media/ps4.jpg'),
(2, 'Kitchen Triple Sink', 3433243, 'Gumboro', 'DE', 'used', 'CHANGE PLEASE', '../media/triple_sink.jpg'),
(3, '97 Jeep Wrangler\r\n', 5000, 'Millsboro', 'de', 'used', 'Used but garage kept. Price is FIRM!', '../media/jeep.jpg,../media/jeep_2.jpg,../media/jeep_3.jpg'),
(6, 'test', 3, 'test', 'te', 'test', 'test', '../media/keiko-and-I-lake.jpg'),
(7, 'test2', 7, 'trte', 'tr', 'test', 'teest2', '../media/keiko-maine-trip.jpg'),
(8, 'test2', 7, 'trte', 'tr', 'test', 'teest2', '../media/keiko-maine-trip.jpg'),
(9, 'TEST', 3, 'trewtrew', 'tr', 'trewtrew', 'trewtre', '../media/keiko-and-i.jpg,../media/keiko-and-I-lake.jpg,../media/keiko-maine-trip.jpg'),
(10, 'TEST', 432, 'tre', 'TR', 'trewdfsg', 'rew', '../media/Screenshot 2024-04-08 201917.png'),
(11, 'testing again', 1234, 'testtown', 'te', 'old', 'this is a test ', '../media/FB_IMG_1710849899679.jpg,../media/keiko-and-I-lake.jpg,../media/Screenshot 2024-04-08 201917.png'),
(12, 'adding a test', 23, 'test', 'DE', 'test', 'yupp its a test , update', '../media/20180527_192639.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
