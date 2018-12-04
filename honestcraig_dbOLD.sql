-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 05:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honestcraig_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRating` (IN `inUser` VARCHAR(50))  BEGIN
    
    SELECT @newRating := SUM(rating)/COUNT(rating)
    FROM users_ratings
    where username = inUser;
    
    UPDATE users
    SET rating = @newRating
    WHERE users.username = inUser;
    
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `product_category` text NOT NULL,
  `product` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` double NOT NULL,
  `username` text NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `product_category`, `product`, `product_desc`, `product_price`, `username`, `img`) VALUES
(21, 'Aquatics', 'TestBoat1', 'Test', 1000, 'admin2', ''),
(22, 'Auto', 'Test Car', 'Fast car', 100, 'admin2', ''),
(24, 'Home', 'sdaasd', '', 111, 'admin3', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rating`) VALUES
(1, 'admin', '$2y$10$mn9D8nCZ.Sf1fW3ptgsF8OgQ1ZO8RAngIL9UTXqXFUv5PYbhlSZbG', '0'),
(2, 'admin2', '$2y$10$06qu3a.EU8nvXorTO/wxKuFN7Xsd1m3KvibymoozOvwMwYKIDji2i', '3'),
(3, 'testuser1', '$2y$10$jpe81cs33/uScQ7a1W6QgeKrihET4DfDGu0DTp6idCIV0Bs5T/VGe', '0'),
(4, 'JoeFrantz', '$2y$10$eOZ6KwodBAVUI24GKvMHTeEJzCdDjpqzgwM9g0LFMDCA/2XOOzWPm', '0'),
(5, 'testuser99', '$2y$10$jjb/XG6Dir6zuXv1XWkHJOyQA3APflV5Z5Yz8nHb7uGDCK4rWbdAi', '0'),
(6, 'admin3', '$2y$10$cqm/E8JIdEmDBmMKD8I7leTGFe.6qHm/GtnF726gxjtZeYqJg2f1y', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users_purchases`
--

CREATE TABLE `users_purchases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_ratings`
--

CREATE TABLE `users_ratings` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` double NOT NULL,
  `comment` text NOT NULL,
  `rater` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_ratings`
--

INSERT INTO `users_ratings` (`id`, `username`, `rating`, `comment`, `rater`) VALUES
(12, 'admin2', 1, 'test comment\r\n', 'admin2'),
(13, 'admin2', 5, 'Great seller', 'admin2'),
(14, 'admin', 5, '', ''),
(15, 'admin', 3, '', ''),
(16, 'admin2', 5, '', ''),
(17, 'admin2', 5, '', ''),
(19, 'admin2', 5, 'Great', 'admin3'),
(20, 'admin2', 1, '', ''),
(21, 'admin2', 1, '', ''),
(22, 'admin2', 5, 'Test', 'admin3'),
(23, 'admin2', 3, 'Test', 'admin2'),
(24, 'admin3', 5, 'Good sale', 'admin3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_purchases`
--
ALTER TABLE `users_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_ratings`
--
ALTER TABLE `users_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_purchases`
--
ALTER TABLE `users_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_ratings`
--
ALTER TABLE `users_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
