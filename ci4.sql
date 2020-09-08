-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 06:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` int(11) NOT NULL,
  `content_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email_contact`, `user_contact`, `addr1`, `addr2`, `number_phone`, `content_contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gfusgfcsvf@gmail.com', 'ừdcwafcsfc', '', '', 0, 'ùcwsafcsfc', 0, '0000-00-00 00:00:00', '2020-09-08 23:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacksp`
--

CREATE TABLE `feedbacksp` (
  `id` int(11) NOT NULL,
  `email_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacksp`
--

INSERT INTO `feedbacksp` (`id`, `email_feedback`, `user_feedback`, `content_feedback`, `status`, `created_at`, `updated_at`) VALUES
(1, 'quangbao@gmail.com', 'nguyen quang bao', 'abc ưidhiashsfc', 0, '2020-09-08 23:31:07', '2020-09-08 23:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `user_post` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `status` int(11) NOT NULL,
  `user_update` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `addr1` varchar(255) NOT NULL,
  `addr2` varchar(255) NOT NULL,
  `cmnd` int(11) NOT NULL,
  `number_phone` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(3) NOT NULL,
  `old` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `gender`, `addr1`, `addr2`, `cmnd`, `number_phone`, `created_at`, `updated_at`, `delete_at`, `role`, `old`) VALUES
(8, 'nguywn quang', 'jinnkeyxx@gmail.com', '$2y$10$Xp7nENnEsT55Ud5dMpRU6eIISzpUDd1w0j61JSVu/4AebYIqkhSR6', '', '', '', 0, 0, '2020-09-04 17:08:42', '2020-09-05 05:08:42', '2020-09-05 05:08:42', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacksp`
--
ALTER TABLE `feedbacksp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacksp`
--
ALTER TABLE `feedbacksp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
