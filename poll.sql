-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 10:17 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`) VALUES
(1, 'What brand of smartphone do you use?'),
(2, 'Whats your favorite sport ?'),
(3, 'Whats programming language do you use?'),
(4, 'Test Poll');

-- --------------------------------------------------------

--
-- Table structure for table `polls_answers`
--

CREATE TABLE `polls_answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls_answers`
--

INSERT INTO `polls_answers` (`id`, `user`, `poll`, `choice`) VALUES
(6, 'aniruth', 1, 4),
(7, 'aniruth', 2, 7),
(8, 'aniruth', 3, 12),
(9, 'aniruth', 4, 21),
(10, 'tim', 1, 1),
(11, 'tim', 4, 21),
(12, 'tim', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `polls_choices`
--

CREATE TABLE `polls_choices` (
  `id` int(11) UNSIGNED NOT NULL,
  `poll` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls_choices`
--

INSERT INTO `polls_choices` (`id`, `poll`, `name`) VALUES
(1, 1, 'Apple'),
(2, 1, 'Nokia'),
(3, 1, 'Samsung'),
(4, 1, 'Xiaomi'),
(5, 1, 'Asus'),
(6, 2, 'Cricket'),
(7, 2, 'Football'),
(8, 2, 'Tennis'),
(9, 2, 'Basketball'),
(10, 2, 'Hockey'),
(11, 2, 'Others'),
(12, 3, 'Python'),
(13, 3, 'Java'),
(14, 3, 'C++'),
(15, 3, 'Javascript'),
(16, 3, 'C'),
(17, 3, 'C#'),
(18, 3, 'Ruby'),
(19, 3, 'Others'),
(20, 4, 'Choice1'),
(21, 4, 'Choice 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Aniruth', 'abcd'),
('john', '1234'),
('tim', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_answers`
--
ALTER TABLE `polls_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_choices`
--
ALTER TABLE `polls_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `polls_answers`
--
ALTER TABLE `polls_answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `polls_choices`
--
ALTER TABLE `polls_choices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
