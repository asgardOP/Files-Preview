-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2025 at 04:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--
-- Error reading structure for table bot.items: #1932 - Table &#039;bot.items&#039; doesn&#039;t exist in engine
-- Error reading data for table bot.items: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `bot`.`items`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `free` int(100) NOT NULL,
  `des` text NOT NULL,
  `preview_imgs` varchar(1000) NOT NULL,
  `posts_imgs` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `first_img` varchar(1000) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `free`, `des`, `preview_imgs`, `posts_imgs`, `type`, `first_img`, `date`) VALUES
(14, 'asgard', 1, 'aaa', 'hans-jurgen-mager-qQWV91TTBrE-unsplash.jpg, ricky-kharawala-adK3Vu70DEQ-unsplash.jpg', 'wexor-tmg-L-2p8fapOA8-unsplash.jpg, hans-jurgen-mager-qQWV91TTBrE-unsplash.jpg, ray-hennessy-xUUZcpQlqpM-unsplash.jpg, ricky-kharawala-adK3Vu70DEQ-unsplash.jpg, kar-ming-moo-Q_3WmguWgYg-unsplash.jpg, alejandro-contreras-wTPp323zAEw-unsplash.jpg, gary-bendig-6GMq7AGxNbE-unsplash.jpg', 'none', 'download.jpg', '2025-10-01 13:56:31.780500'),
(15, 'Asgard', 1, 'ssss', 'hans-jurgen-mager-qQWV91TTBrE-unsplash.jpg, ricky-kharawala-adK3Vu70DEQ-unsplash.jpg', 'wexor-tmg-L-2p8fapOA8-unsplash.jpg, hans-jurgen-mager-qQWV91TTBrE-unsplash.jpg, ray-hennessy-xUUZcpQlqpM-unsplash.jpg, ricky-kharawala-adK3Vu70DEQ-unsplash.jpg, kar-ming-moo-Q_3WmguWgYg-unsplash.jpg, boris-smokrovic-DPXytK8Z59Y-unsplash.jpg, alejandro-contreras-wTPp323zAEw-unsplash.jpg, gary-bendig-6GMq7AGxNbE-unsplash.jpg', 'pack', 'hans-jurgen-mager-qQWV91TTBrE-unsplash.jpg', '2025-10-01 13:57:03.322326');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
