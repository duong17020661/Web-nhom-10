-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2019 at 10:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `time` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `answer`, `time`, `user`, `id_question`, `id_topic`) VALUES
(1, 'ngu', '0000-00-00', 'tranhaiduong', 32, 0),
(2, 'a', '0000-00-00', 'tranhaiduong', 0, 0),
(3, 'a', '0000-00-00', 'tranhaiduong', 0, 0),
(4, 'a', '0000-00-00', 'tranhaiduong', 0, 0),
(5, 'a', '0000-00-00', 'tranhaiduong', 0, 0),
(6, 'a', '0000-00-00', 'tranhaiduong', 45, 0),
(7, 'ngu', '0000-00-00', 'tranhaiduong', 45, 0),
(8, 'ngu cc\r\n', '2019-11-02', 'duongcoibs', 45, 0),
(9, 'ngu cc\r\n', '2019-11-02', 'duongcoibs', 45, 0),
(10, 'a', '2019-11-02', 'duongcoibs', 45, 0),
(11, 'chửi nữađi dc m', '2019-11-02', 'duongcoibs', 45, 13),
(12, 'a', '2019-11-03', 'duongcoibs', 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `user` varchar(35) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `detail`, `time`, `user`, `id_topic`) VALUES
(32, 'sad', 'ádf', '0000-00-00', 'duongcoibs', 2),
(33, 'a', 'a', '0000-00-00', 'duongcoibs', 2),
(34, 'aa', 'âa', '0000-00-00', 'duongcoibs', 2),
(35, 'aaaaaaa', 'aaaaaaa', '0000-00-00', 'duongcoibs', 2),
(36, 'ádf', 'ád', '0000-00-00', 'duongcoibs', 2),
(37, 'a', 'a', '0000-00-00', 'duongcoibs', 2),
(38, 'a', 'a', '0000-00-00', 'duongcoibs', 2),
(39, 'a', 'a', '0000-00-00', 'duongcoibs', 2),
(40, 'a', 'a', '0000-00-00', 'duongcoibs', 2),
(41, 'DƯơng', 'Duònwa', '0000-00-00', 'tranhaiduong', 2),
(42, 'a', 'a', '0000-00-00', 'tranhaiduong', 2),
(46, 'aaaaaaa', 'aaaaaaaâ', '2019-11-02', 'duongcoibs', 13);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `user` varchar(35) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic`, `detail`, `time`, `user`, `status`) VALUES
(13, 'Câu hpoi 1', '1\r\n', '0000-00-00', 'duongcoibs', 'close'),
(17, '7', '7', '0000-00-00', 'duongcoibs', 'open'),
(18, '8', '8', '0000-00-00', 'duongcoibs', 'open'),
(19, '9', '9', '0000-00-00', 'duongcoibs', 'close'),
(20, '10', '10', '0000-00-00', 'duongcoibs', 'open'),
(21, '11a', '11a', '0000-00-00', 'duongcoibs', 'close'),
(23, 'Dương', 'Dương', '0000-00-00', 'tranhaiduong', 'open'),
(24, 'a', 'a', '0000-00-00', 'duongcoibs', 'close'),
(25, 'aaaaaaaaâ', 'aaaaaaaaaa', '0000-00-00', 'duongcoibs', 'close'),
(26, 'asssssssdf', 'áddddđf', '0000-00-00', 'duongcoibs', ''),
(27, 'a', 'a', '2019-11-02', 'duongcoibs', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `birthday`, `email`, `role`, `gender`) VALUES
(1, 'duongcoibs', '96e79218965eb72c92a549dd5a330112', 'Hải Dương', 'Trần', '1-2-1999', 'duong123@abc', '', 'Nam'),
(2, 'tranhaiduong', '96e79218965eb72c92a549dd5a330112', 'Dương', 'Trần', '1-2-1999', 'duong.coi.bs.1104@gmail.com', '', 'Nam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
