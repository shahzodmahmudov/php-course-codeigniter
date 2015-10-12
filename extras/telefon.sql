-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2015 at 01:10 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telefon`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('62ba2f988e701b16d87585fc7bd37e6e0d4d35d2', '127.0.0.1', 1444370381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337303333383b),
('f6c935d6a94a497cf1c6f2de95ffcd647c1b64a2', '127.0.0.1', 1444371159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337303838393b),
('d014e77cc3962599d9f5874606477478e5269349', '127.0.0.1', 1444371249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337313139373b),
('803382228c6903026e48e1c9b994d06e2219e368', '127.0.0.1', 1444371568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337313532303b),
('2acc20531748da5075674c9efbf22389b378d132', '127.0.0.1', 1444372231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337323033303b),
('1e9be98eaa233b15abab1424da94d7d08b0a5e13', '127.0.0.1', 1444372631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337323430393b),
('e2767d85078cb499906ddbb31df1a150c7e83241', '127.0.0.1', 1444372961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337323731313b),
('3dcc14c77c59baffb35dccc1a47162f0414631d7', '127.0.0.1', 1444373261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434343337333130393b);

-- --------------------------------------------------------

--
-- Table structure for table `phonenumbers`
--

CREATE TABLE IF NOT EXISTS `phonenumbers` (
  `user_id` int(11) NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phonenumbers`
--

INSERT INTO `phonenumbers` (`user_id`, `phonenumber`) VALUES
(4, '92777777'),
(7, '232323');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `address`) VALUES
(1, 'Imya asdfasf', 'Familya', 'asdres'),
(2, 'asdfasfdas', 'asdfasfsf', '2rasfasf'),
(3, 'asdfsafsdf', 'asdfasfasf', 'sfdsdf'),
(4, 'Иван', 'Иванов', 'Адреси иван'),
(6, 'Anton', 'Antonov', '213232'),
(7, 'asdfasfsafa', 'asdfasfasfas', 'asdfasdfsafs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `phonenumbers`
--
ALTER TABLE `phonenumbers`
  ADD CONSTRAINT `phonenumbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
