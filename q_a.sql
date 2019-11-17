-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2019 at 02:44 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(12, 'a', '2019-11-03', 'duongcoibs', 32, 2),
(13, '', '2019-11-12', 'hoan', 0, 0),
(14, 'hoi cham', '2019-11-13', 'hoan', 0, 0),
(15, 'tuổi mẹ j', '2019-11-17', '', 49, 21),
(16, 'tuổi mẹ j', '2019-11-17', '', 49, 21),
(17, 'tuổi mẹ j', '2019-11-17', '', 49, 21),
(18, 'đi ngủ sớm oK!!!', '2019-11-17', 'hoan', 51, 32),
(19, 'quần què', '2019-11-17', 'hoan', 51, 32),
(20, 'quần què', '2019-11-17', '', 51, 32),
(21, 'quần què', '2019-11-17', '', 51, 32),
(22, 'quần què', '2019-11-17', '', 51, 32),
(23, 'dsffd', '2019-11-17', '', 47, 21),
(35, 'hey', '2019-11-17', 'hoan', 47, 21),
(36, 'tuoi', '2019-11-17', 'hoan', 47, 21),
(37, 'duong', '2019-11-17', 'duongcoibs', 47, 21),
(38, 'ok\r\n', '2019-11-17', 'duongcoibs', 51, 32),
(39, 'aaaaaa', '2019-11-17', 'duongcoibs', 47, 21),
(40, '', '2019-11-17', '', 47, 21),
(41, '', '2019-11-17', '', 47, 21);

-- --------------------------------------------------------

--
-- Table structure for table `cb_answer`
--

CREATE TABLE `cb_answer` (
  `id_ans_cb` int(11) NOT NULL,
  `answer_cb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_cb` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cb_answer`
--

INSERT INTO `cb_answer` (`id_ans_cb`, `answer_cb`, `id_cb`, `id_survey`) VALUES
(1, '1/', 0, 1),
(1, '/', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cb_question`
--

CREATE TABLE `cb_question` (
  `id_cb` int(11) NOT NULL,
  `cb_question` varchar(255) NOT NULL,
  `all_answer_cb` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cb_question`
--

INSERT INTO `cb_question` (`id_cb`, `cb_question`, `all_answer_cb`, `id_survey`) VALUES
(1, 'Lớp ??', '1/2', 1),
(2, 'bbbbbbbbbbbbb', 'bbbbbbbbbb/bbbbbbbbbbbbbb', 4);

-- --------------------------------------------------------

--
-- Table structure for table `n_answer`
--

CREATE TABLE `n_answer` (
  `id_ans_n` int(11) NOT NULL,
  `answer_n` varchar(255) NOT NULL,
  `id_n` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `n_answer`
--

INSERT INTO `n_answer` (`id_ans_n`, `answer_n`, `id_n`, `id_survey`) VALUES
(1, 'Không ăn', 0, 1),
(1, '', 2, 3),
(1, '', 3, 3),
(1, '', 4, 4),
(2, 'aaaaaaâ', 2, 3),
(2, 'aaaaaaaaâ', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `n_question`
--

CREATE TABLE `n_question` (
  `id_n` int(11) NOT NULL,
  `n_question` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `n_question`
--

INSERT INTO `n_question` (`id_n`, `n_question`, `id_survey`) VALUES
(1, 'Hôm nay ăn gì', 1),
(2, 'a', 3),
(3, 'a', 3),
(4, 'bbbbbbb', 4);

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
  `id_topic` int(11) NOT NULL,
  `id_check` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `detail`, `time`, `user`, `id_topic`, `id_check`) VALUES
(32, 'sad', 'ádf', '0000-00-00', 'duongcoibs', 2, NULL),
(33, 'a', 'a', '0000-00-00', 'duongcoibs', 2, NULL),
(34, 'aa', 'âa', '0000-00-00', 'duongcoibs', 2, NULL),
(35, 'aaaaaaa', 'aaaaaaa', '0000-00-00', 'duongcoibs', 2, NULL),
(36, 'ádf', 'ád', '0000-00-00', 'duongcoibs', 2, NULL),
(37, 'a', 'a', '0000-00-00', 'duongcoibs', 2, NULL),
(38, 'a', 'a', '0000-00-00', 'duongcoibs', 2, NULL),
(39, 'a', 'a', '0000-00-00', 'duongcoibs', 2, NULL),
(40, 'a', 'a', '0000-00-00', 'duongcoibs', 2, NULL),
(41, 'DƯơng', 'Duònwa', '0000-00-00', 'tranhaiduong', 2, NULL),
(42, 'a', 'a', '0000-00-00', 'tranhaiduong', 2, NULL),
(46, 'aaaaaaa', 'aaaaaaaâ', '2019-11-02', 'duongcoibs', 13, NULL),
(47, '5', 'fg', '2019-11-13', 'hoan', 21, 37),
(48, 'tạo câu hỏi 1', 'câu 1', '2019-11-17', '', 21, NULL),
(49, 'tạo câu hỏi 1', 'câu 1', '2019-11-17', '', 21, NULL),
(50, 'tạo câu hỏi 1', 'câu 1', '2019-11-17', '', 21, NULL),
(51, 'dậy muộn', 'nên làm các nào để dậy sớm\r\n', '2019-11-17', 'hoan', 32, 38),
(52, 'duong còi', 'ád', '2019-11-17', 'duongcoibs', 21, NULL),
(53, 'aaaaaaaâ', 'aaaaaaaâ', '2019-11-17', 'duongcoibs', 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rb_answer`
--

CREATE TABLE `rb_answer` (
  `id_ans_rb` int(11) NOT NULL,
  `answer_rb` varchar(255) NOT NULL,
  `id_rb` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rb_answer`
--

INSERT INTO `rb_answer` (`id_ans_rb`, `answer_rb`, `id_rb`, `id_survey`) VALUES
(1, 'Đúng', 0, 1),
(1, '', 2, 3),
(2, 'a', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rb_question`
--

CREATE TABLE `rb_question` (
  `id_rb` int(11) NOT NULL,
  `rb_question` varchar(255) NOT NULL,
  `all_answer_rb` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rb_question`
--

INSERT INTO `rb_question` (`id_rb`, `rb_question`, `all_answer_rb`, `id_survey`) VALUES
(1, 'Sai hay đúng ?', 'Đúng/Đúng', 1),
(2, 'a', 'a/a', 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `survey` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `survey`, `user`, `time`) VALUES
(1, 'Test', '', '2019-11-17'),
(2, 'a', 'duongcoibs', '2019-11-17'),
(3, 'á', 'duongcoibs', '2019-11-17'),
(4, 'bbbbbbbbbbb', 'duongcoibs', '2019-11-17');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic`, `detail`, `time`, `user`, `status`) VALUES
(21, '11a', '11a', '0000-00-00', 'duongcoibs', 'close'),
(23, 'Dương', 'Dương', '0000-00-00', 'tranhaiduong', 'open'),
(24, 'a', 'a', '0000-00-00', 'duongcoibs', 'close'),
(25, 'aaaaaaaaâ', 'aaaaaaaaaa', '0000-00-00', 'duongcoibs', 'close'),
(26, 'asssssssdf', 'áddddđf', '0000-00-00', 'duongcoibs', ''),
(28, '1', '1', '2019-11-12', 'hoan', ''),
(29, '12', '12', '2019-11-12', 'hoan', ''),
(30, 'gf', 'gf', '2019-11-12', 'hoan', ''),
(32, 'sức khỏe', 'sức khỏe sinh viên UET\r\n', '2019-11-17', 'hoan', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `birthday`, `email`, `role`, `gender`) VALUES
(1, 'duongcoibs', '96e79218965eb72c92a549dd5a330112', 'Trần', 'Duong', '1-2-1999', 'duong123@abc', '', 'Nam'),
(2, 'tranhaiduong', '96e79218965eb72c92a549dd5a330112', 'Dương', 'Trần', '1-2-1999', 'duong.coi.bs.1104@gmail.com', '', 'Nam'),
(3, 'hoan', 'c4ca4238a0b923820dcc509a6f75849b', '3418903128', '231498', '2-1-1999', 'ha@mail.com', '', 'Nam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indexes for table `cb_question`
--
ALTER TABLE `cb_question`
  ADD PRIMARY KEY (`id_cb`);

--
-- Indexes for table `n_question`
--
ALTER TABLE `n_question`
  ADD PRIMARY KEY (`id_n`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `rb_question`
--
ALTER TABLE `rb_question`
  ADD PRIMARY KEY (`id_rb`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

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
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cb_question`
--
ALTER TABLE `cb_question`
  MODIFY `id_cb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `n_question`
--
ALTER TABLE `n_question`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rb_question`
--
ALTER TABLE `rb_question`
  MODIFY `id_rb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
