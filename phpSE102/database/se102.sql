-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 07:38 AM
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
-- Database: `se102`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_list`
--

CREATE TABLE `students_list` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_list`
--

INSERT INTO `students_list` (`id`, `name`, `email`, `address`, `course`) VALUES
(1, 'dasdasd', 'adsa@gmail.com', 'dasdqwe', 'dasdsadas'),
(2, 'dsad', 'ddd', 'ddd', 'dddd'),
(3, 'fdsfsdf', 'dsfdsf', 'fsdfsd', 'fsdfdsfs'),
(4, 'Joy Garcia', 'joygarcia@gmail.com', 'tambacan', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_list`
--

CREATE TABLE `teachers_list` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers_list`
--

INSERT INTO `teachers_list` (`id`, `name`, `email`, `address`, `status`) VALUES
(1, 'dsad', 'shesshhh@gmail.co', 'shesssd', 'dsadasda'),
(2, 'Jeoff Y klaro', 'jeoff@gmail.com', 'walakokabalo', 'single'),
(3, 'yan', 'yan@gmail.com', 'tambacan', 'part time'),
(4, 'reryll', 'reryllmontebon@gmail.com', 'tambacan', 'program head');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`) VALUES
(1, 'yan123', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_list`
--
ALTER TABLE `students_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_list`
--
ALTER TABLE `teachers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_list`
--
ALTER TABLE `students_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers_list`
--
ALTER TABLE `teachers_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
