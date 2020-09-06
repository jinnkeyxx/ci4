-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 06, 2020 lúc 12:06 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ci4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
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

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `user_post`, `images`, `status`, `user_update`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(19, 'php là gì ?', 'Nguyen Quang Bao', 'http://localhost:8088/public/images/1599355921_32ab7f8b744b98f47b9b.png', 0, 'Nguyen Quang Bao', 'http://localhost:8088/public/php-la-gi-', '<p><img src=\"https://www.google.com/logos/google.jpg\" alt=\"My alt text\" width=\"354\" height=\"116\" /></p>', '2020-09-05 17:02:26', '2020-09-06 08:32:01'),
(21, '1235', 'Nguyen Quang Bao', 'http://localhost:8088/public/images/1599346605_b000b78936fd6f33ac40.jpg', 0, 'Nguyen Quang Bao', 'http://localhost:8088/public1235', '<p><img src=\"https://www.google.com/logos/google.jpg\" alt=\"My alt text\" width=\"354\" height=\"116\" /></p>', '2020-09-05 17:13:09', '2020-09-05 17:57:29'),
(22, 'php là một ngôn ngữ lập trình', 'Nguyen Quang Bao', 'http://localhost:8088/public/images/1599355906_18d4fd99606e87ba9d74.png', 0, 'Nguyen Quang Bao', 'http://localhost:8088/public/php-la-mot-ngon-ngu-lap-trinh', '<p><img src=\"https://www.google.com/logos/google.jpg\" alt=\"My alt text\" width=\"354\" height=\"116\" /></p>', '2020-09-05 18:11:53', '2020-09-06 08:31:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`, `delete_at`, `role`) VALUES
(4, 'Nguyen', 'Quang Bao', 'abca@gmail.com', '$2y$10$riYHIka5NdCyIoA73M93JunXblgJRynkPhad84dvam.RHvUr/JDKW', '2020-09-03 09:41:13', '2020-09-06 07:35:00', '2020-09-04 06:55:05', 1),
(8, 'Nguyen', 'Quang Bao', 'jinnkeyxx@gmail.com', '$2y$10$Xp7nENnEsT55Ud5dMpRU6eIISzpUDd1w0j61JSVu/4AebYIqkhSR6', '2020-09-04 17:08:42', '2020-09-05 05:08:42', '2020-09-05 05:08:42', 0),
(9, 'Nguyen', 'Quang Bao', 'iasfhcshf@gmail.com', '$2y$10$VKGpcgxdYaMNrid8APzsFOkKtS0Ss8iIc8REzg2OWHbNwZizliQUK', '2020-09-04 17:14:14', '2020-09-05 19:31:51', '2020-09-05 05:14:14', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
