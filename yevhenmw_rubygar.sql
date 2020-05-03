-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2020 at 10:02 PM
-- Server version: 5.7.21-20-beget-5.7.21-20-1-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yevhenmw_rubygar`
--

-- --------------------------------------------------------

--
-- Table structure for table `name_users`
--
-- Creation: Apr 22, 2020 at 03:45 PM
-- Last update: Apr 27, 2020 at 06:59 PM
--

DROP TABLE IF EXISTS `name_users`;
CREATE TABLE `name_users` (
  `name_users` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `name_users`
--

INSERT INTO `name_users` (`name_users`) VALUES
('888');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--
-- Creation: Apr 21, 2020 at 02:44 PM
-- Last update: Apr 27, 2020 at 07:00 PM
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `username` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL,
  `project` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`username`, `id_project`, `project`) VALUES
('zhekki.pytgfh', 96, 'hghfghfgh'),
('zhekki.pytgfh', 97, 'ооон'),
('Задача добавлена', 114, 'rerty'),
('', 123, '1 project'),
('', 124, '2 project'),
('', 126, '4 projectлрьти'),
('', 128, ',n,mn,n,m'),
('Test', 188, '1 projectу'),
('Test', 189, '2 project'),
('Test', 190, '3 project'),
('Test', 191, '3 project'),
('Test', 192, '4 project'),
('Nico', 199, 'new proj'),
('Nico', 200, 'new proj 2'),
('Nico', 201, 'sdfg'),
('Nico', 202, 'sdfg5'),
('Nico', 204, 'аноглр'),
('Task added', 242, '666'),
('Task added', 243, '88989'),
('Task added', 246, '90980'),
('Task added', 249, 'oipiop'),
('Task added', 250, 'oipiopopop'),
('Task added', 255, 'uiiui'),
('Task added', 256, '768768'),
('Task added', 257, '768768'),
('Task added', 258, 'kjlkjl'),
('Task added', 259, 'jkhj'),
('Task added', 263, 'sooo2'),
('Task added', 264, 'erewr'),
('Task added', 266, 'fr'),
('888', 305, 'yturrr66'),
('888', 306, 'ytuytu'),
('888', 319, 'tyuyty'),
('888', 320, 'tytry');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--
-- Creation: Apr 21, 2020 at 02:44 PM
-- Last update: Apr 27, 2020 at 07:00 PM
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `Status` varchar(5000) NOT NULL,
  `id_project` varchar(111) NOT NULL,
  `priority` int(111) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `Status`, `id_project`, `priority`, `date`) VALUES
(251, '0', '0', '', 1, '0000-00-00'),
(292, '6чсмчсм', 'on', '188', 2, '2020-04-30'),
(294, 'dfsd', 'on', '188', 2, '2020-04-21'),
(295, 'ewrwe', 'on', '188', 2, '2020-04-29'),
(296, '133', 'on', '188', 2, '2020-04-30'),
(302, 'укцк', 'on', '189', 1, '0000-00-00'),
(303, 'іваівмммаа', 'on', '189', 2, '0000-00-00'),
(304, 'віаіва', 'on', '189', 1, '0000-00-00'),
(305, 'мкп4345', 'on', '189', 1, '0000-00-00'),
(313, 'new', 'on', '200', 2, '2020-04-22'),
(314, 'new2 task', 'on', '199', 1, '0000-00-00'),
(315, '', 'on', '199', 3, '0000-00-00'),
(316, 'new12', 'on', '199', 1, '2020-04-16'),
(317, 'вапр', 'on', '202', 3, '2020-04-29'),
(319, 'vfdsagh', 'on', '202', 8, '0000-00-00'),
(320, 'ghjkhg', 'on', '202', 1, '2020-04-30'),
(380, '768768', 'false', '242', 1, '0000-00-00'),
(381, '8989', 'false', '243', 1, '0000-00-00'),
(389, 'uiui', 'false', '255', 1, '0000-00-00'),
(390, 'iuouio', 'false', '258', 1, '0000-00-00'),
(391, 'jklkjl', 'false', '259', 1, '0000-00-00'),
(394, 'rrr', 'false', '263', 1, '0000-00-00'),
(395, 'erewr', 'false', '264', 1, '0000-00-00'),
(435, 'tytrytry', 'done', '306', 3, '2020-04-30'),
(444, 'fgdfg', 'no', '126', 1, '0000-00-00'),
(452, 'yyyyy', 'done', '305', 3, '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 21, 2020 at 02:44 PM
-- Last update: Apr 23, 2020 at 08:01 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_users` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `password`) VALUES
(39, 'DN280594PEV@cc.pbank.com.ua', '666'),
(40, 'woodidea', '123'),
(42, 'FreeWay', '4444'),
(44, 'zhekki.p@gmail.com', '12345'),
(46, 'woodidea7777', '777'),
(47, 'Test', 'Qwerty123'),
(48, 'Qwerty', 'Qwerty123'),
(49, 'trret', '434534'),
(50, 'Admin777', '567'),
(51, '777', '777'),
(53, '888', '888'),
(55, '999', '999'),
(56, '555', '555'),
(57, '333', '333'),
(58, 'Nico', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
