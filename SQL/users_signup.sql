-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2018 at 09:33 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_signup`
--

CREATE TABLE `users_signup` (
  `Sl.no` int(11) NOT NULL,
  `Username` varchar(35) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` text NOT NULL,
  `Mobile` bigint(15) NOT NULL,
  `Logintime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_signup`
--
ALTER TABLE `users_signup`
  ADD PRIMARY KEY (`Sl.no`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_signup`
--
ALTER TABLE `users_signup`
  MODIFY `Sl.no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
