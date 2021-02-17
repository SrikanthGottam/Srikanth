-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2021 at 05:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8552788_dolphin`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_data` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_person` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment_data`, `comment_person`) VALUES
(11, 3, 39, 'Test comment', 'Sreenivasulu Reddy Male');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_data` text COLLATE utf8_unicode_ci NOT NULL,
  `post_image` text COLLATE utf8_unicode_ci NOT NULL,
  `post_person` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_data`, `post_image`, `post_person`) VALUES
(36, 5, 'hii', '', 'sai'),
(37, 5, 'hii', 'uploads/602ca768784f29.59891258.png', 'sai'),
(38, 5, 'hello', 'uploads/602ca7a994ab66.29201816.png', 'sai'),
(39, 3, 'This is to test post without image', '', 'Sreenivasulu Reddy Male'),
(40, 3, 'This is to test post with image', 'uploads/602ca8778795d0.87967151.jpg', 'Sreenivasulu Reddy Male');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `code` bigint(20) NOT NULL,
  `status` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Prash', 'paradoxk30@gmail.com', '$2y$10$4vyA50F73A0zlqv8SsHwrOKHwqqjwguVgifS1djMKoqh44q32/uPm', 0, 'notverified'),
(2, 'sri', 'srikanthg1997@gmail.com', '$2y$10$fClaya8MGebrZnGxZQr32ed3Qc6LvGvJcu3fxDwGVEnWXLON7pmDi', 909020, 'notverified'),
(3, 'Sreenivasulu Reddy Male', 'sreenumalae@gmail.com', '$2y$10$nfdABNphbWxThrNBvwoYe.AS0J7bQM1utgIaplnlkEx1MXdsxIm8a', 575369, 'notverified'),
(4, 'Srikanth Gottam', 'srikanthgottam1998@gmail.com', '$2y$10$4AbF1XD51PQ6ShYLGWb.deNQ0fegi2WAfbJn0uPyfTPykz6Hi0xou', 749685, 'notverified'),
(5, 'sai', 'srikanthg1998@gmail.com', '$2y$10$TMsnPc94pWhdXNm3t9RRc.NuUCfRHVWe7opbQsLmlu27G9HnuFsqK', 515275, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
