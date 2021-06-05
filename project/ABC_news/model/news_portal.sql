-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 12:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `post_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `post_count`) VALUES
(1, 'Sports', 6);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `post-img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post-img`) VALUES
(1, 'Messi scores but Chile hold Argentina', 'Lionel Messi scored a penalty but Argentina missed out on the chance to take over top spot of South American World Cup qualifying from rivals Brazil after a 1-1 draw with Chile on Thursday.\r\n\r\nMessi also clipped the woodwork and forced three impressive saves out of Chile goalkeeper Claudio Bravo but Alexis Sanchez earned the dogged visitors a point in Santiago del Estero.\r\n\r\nThe draw leaves Argentina a point behind Brazil, the only remaining side with a perfect qualifying record, who host Ecuador on Friday.\r\n\r\nChile are down in sixth, still two points off the qualification places having won only one of their five matches so far.', 'sports', '4 june, 2021', 1, ''),
(2, 'Messi scores but Chile hold Argentina', 'Lionel Messi scored a penalty but Argentina missed out on the chance to take over top spot of South American World Cup qualifying from rivals Brazil after a 1-1 draw with Chile on Thursday.\r\n\r\nMessi also clipped the woodwork and forced three impressive saves out of Chile goalkeeper Claudio Bravo but Alexis Sanchez earned the dogged visitors a point in Santiago del Estero.\r\n\r\nThe draw leaves Argentina a point behind Brazil, the only remaining side with a perfect qualifying record, who host Ecuador on Friday.\r\n\r\nChile are down in sixth, still two points off the qualification places having won only one of their five matches so far.', 'sports', '4 june, 2021', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(200) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `email`, `password`, `cpassword`) VALUES
(1, 'hossain', 'awarehossain@gmail.com', '1234', '1234'),
(2, 'shohan', 'awareshohan@gmail.com', '4321', '4321'),
(3, 'hasib321', 'hasib@gmail.com', '12345', '12345'),
(4, 'h_kabir', 'hklm@gmail.com', '9876', '9876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
