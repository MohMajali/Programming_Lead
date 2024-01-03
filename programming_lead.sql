-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 09:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programming_lead`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `commenter_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `commenter_id`, `comment`, `created_at`) VALUES
(1, 1, 2, 'Comment test', '2023-11-22 22:59:23'),
(2, 1, 2, 'Comment test 2', '2023-11-22 23:00:24'),
(3, 1, 2, 'Comment test 3', '2023-11-22 23:02:07'),
(4, 1, 2, 'Comment test 4', '2023-11-22 23:04:17'),
(5, 2, 3, 'Nice post', '2023-11-28 17:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `started_date` varchar(255) NOT NULL,
  `total_rate` double DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `description`, `image`, `started_date`, `total_rate`, `active`, `created_at`) VALUES
(1, 'Java', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Languages-images/java.png', '1997-07-03', 3, 1, '2023-11-13 20:57:41'),
(2, 'Python', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Languages-images/python.png', '2023-11-15', 0, 1, '2023-11-21 01:02:39'),
(3, 'C++', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Languages-images/c++.png', '2023-11-23', 0, 1, '2023-11-21 01:32:48'),
(4, 'CSharp', 'nioefneinfi eufb iufbe ', 'Languages-images/csharp.png', '2015-05-28', 2, 1, '2023-11-28 17:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `languages_articles`
--

CREATE TABLE `languages_articles` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages_articles`
--

INSERT INTO `languages_articles` (`id`, `language_id`, `title`, `description`, `image`, `link`, `created_at`, `active`) VALUES
(1, 1, 'Java article', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Artciles-images/java.png', 'https://developer.ibm.com/articles/awb-effective-cloud-native-development-open-liberty-vs-code/', '2023-11-13 23:13:59', 1),
(2, 4, 'C# Article', 'dwdiwbdiowbnd udbwudbuiwd whdbvwibdwuydbv ', 'Artciles-images/csharp.png', 'https://www.google.com/search?q=c%23&sca_esv=585931027&tbm=isch&sxsrf=AM9HkKl77TKzCCJ_lib9wDHDcP3flP7aUw:1701180526916&source=lnms&sa=X&ved=2ahUKEwj2mYWo7-aCAxUicfEDHQ3dB1QQ_AUoAXoECAMQAw&biw=1920&bih=973&dpr=1#imgrc=9o3fU4mBXs3_kM', '2023-11-28 17:17:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages_courses`
--

CREATE TABLE `languages_courses` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages_courses`
--

INSERT INTO `languages_courses` (`id`, `language_id`, `name`, `description`, `image`, `author`, `link`, `rate`, `active`, `created_at`) VALUES
(1, 1, 'Java course', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Courses-images/java.png', 'mathew', 'https://www.google.com/search?q=courses+icon&sca_esv=581983041&hl=en&tbm=isch&sxsrf=AM9HkKm8owuYGpUpALxqVJV0WJath7qgPg:1699899360783&source=lnms&sa=X&ved=2ahUKEwiJlbbMysGCAxUZh_0HHbveCnwQ_AUoAXoECAEQAw&biw=1920&bih=973&dpr=1', '4.5', 1, '2023-11-13 21:42:02'),
(2, 4, 'C# course', 'dfihiou un u uybf yub sybv s', 'Courses-images/csharp.png', 'Ibrahim', 'https://www.google.com/search?q=c%23&sca_esv=585931027&tbm=isch&sxsrf=AM9HkKl77TKzCCJ_lib9wDHDcP3flP7aUw:1701180526916&source=lnms&sa=X&ved=2ahUKEwj2mYWo7-aCAxUicfEDHQ3dB1QQ_AUoAXoECAMQAw&biw=1920&bih=973&dpr=1#imgrc=9o3fU4mBXs3_kM', '4', 1, '2023-11-28 17:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `languages_rates`
--

CREATE TABLE `languages_rates` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages_rates`
--

INSERT INTO `languages_rates` (`id`, `language_id`, `user_id`, `rate`, `created_at`) VALUES
(10, 1, 2, 3, '2023-11-22 20:49:21'),
(11, 4, 2, 1, '2023-11-28 17:24:48'),
(12, 4, 3, 3, '2023-11-28 17:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `languages_youtube_courses`
--

CREATE TABLE `languages_youtube_courses` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `channel_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `reader_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `reader_id`, `title`, `description`, `image`, `active`, `created_at`) VALUES
(1, 2, 'Java Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Posts-Images/java.png', 1, '2023-11-22 22:55:06'),
(2, 3, 'CSharp', 'Cshar is good', 'Posts-Images/csharp.png', 1, '2023-11-28 17:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'Reader-Images/userDefault.png',
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `email`, `password`, `phone`, `image`, `active`, `created_at`) VALUES
(1, 1, 'Admin', 'admin@lead.com', 'Ab@12345', '0123456789', 'Readers-Images/userDefault.png', 1, '2023-11-13 20:29:33'),
(2, 2, 'Mohammad', 'moh@yahoo.com', 'Ab@12345', '0123456789', 'Readers-Images/userDefault.png', 1, '2023-11-21 01:50:57'),
(3, 2, 'Ibrahim', 'ibrahim@yahoo.com', 'Ab@1234', '9876543210', 'Reader-Images/userDefault.png', 1, '2023-11-28 17:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`) VALUES
(1, 'ADMIN', '2023-11-13 20:29:09'),
(2, 'READER', '2023-11-13 20:29:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `commenter_id` (`commenter_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_articles`
--
ALTER TABLE `languages_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `languages_courses`
--
ALTER TABLE `languages_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `languages_rates`
--
ALTER TABLE `languages_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `languages_youtube_courses`
--
ALTER TABLE `languages_youtube_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reader_id` (`reader_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages_articles`
--
ALTER TABLE `languages_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages_courses`
--
ALTER TABLE `languages_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages_rates`
--
ALTER TABLE `languages_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `languages_youtube_courses`
--
ALTER TABLE `languages_youtube_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `languages_articles`
--
ALTER TABLE `languages_articles`
  ADD CONSTRAINT `languages_articles_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `languages_courses`
--
ALTER TABLE `languages_courses`
  ADD CONSTRAINT `languages_courses_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `languages_rates`
--
ALTER TABLE `languages_rates`
  ADD CONSTRAINT `languages_rates_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `languages_rates_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `languages_youtube_courses`
--
ALTER TABLE `languages_youtube_courses`
  ADD CONSTRAINT `languages_youtube_courses_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`reader_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
