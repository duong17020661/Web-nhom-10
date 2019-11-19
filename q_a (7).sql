-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 19, 2019 lúc 06:56 AM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `q_a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
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
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`id_answer`, `answer`, `time`, `user`, `id_question`, `id_topic`) VALUES
(1, 'Thứ 2', '2019-11-19', 'duongcoibs', 1, 1),
(2, 'À không phải, là thứ 3', '2019-11-19', 'duongcoibs', 1, 1),
(3, 'aaaaaaaa', '2019-11-19', 'duongcoibs', 2, 2),
(4, 'bbbbbbbbbbbbbb', '2019-11-19', 'duongcoibs', 2, 2),
(5, 'cccccccccccccccc', '2019-11-19', 'duongcoibs', 2, 2),
(6, 'a', '2019-11-19', 'duongcoibs', 1, 1),
(7, 'a', '2019-11-19', 'tranhaiduong', 5, 3),
(8, 'f', '2019-11-19', 'tranhaiduong', 5, 3),
(9, 'b', '2019-11-19', 'tranhaiduong', 5, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cb_answer`
--

CREATE TABLE `cb_answer` (
  `id_ans_cb` int(11) NOT NULL,
  `answer_cb` varchar(255) NOT NULL,
  `id_cb` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `cb_answer`
--

INSERT INTO `cb_answer` (`id_ans_cb`, `answer_cb`, `id_cb`, `id_survey`) VALUES
(1, '2', 1, 2),
(1, 'B/C', 2, 2),
(1, '2/3', 3, 4),
(1, 'H', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cb_question`
--

CREATE TABLE `cb_question` (
  `id_cb` int(11) NOT NULL,
  `cb_question` varchar(255) NOT NULL,
  `all_answer_cb` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `cb_question`
--

INSERT INTO `cb_question` (`id_cb`, `cb_question`, `all_answer_cb`, `id_survey`) VALUES
(1, 'Lớp ??', '1/2/3', 2),
(2, 'Trường ??', 'A/B/C', 2),
(3, 'Số mấy ?', '1/2/3/4', 4),
(4, 'Trường ??', 'G/H', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `n_answer`
--

CREATE TABLE `n_answer` (
  `id_ans_n` int(11) NOT NULL,
  `answer_n` varchar(255) NOT NULL,
  `id_n` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `n_answer`
--

INSERT INTO `n_answer` (`id_ans_n`, `answer_n`, `id_n`, `id_survey`) VALUES
(1, 'A', 1, 1),
(1, 'B', 2, 1),
(1, 'Very good!!!!!!!!!!!!!!!!!!!', 3, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `n_question`
--

CREATE TABLE `n_question` (
  `id_n` int(11) NOT NULL,
  `n_question` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `n_question`
--

INSERT INTO `n_question` (`id_n`, `n_question`, `id_survey`) VALUES
(1, 'Nêu ý kiến của bạn ??', 1),
(2, 'Hôm nay ăn gì', 1),
(3, 'Nêu ý kiến của bạn ??', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
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
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id_question`, `question`, `detail`, `time`, `user`, `id_topic`, `id_check`) VALUES
(1, 'Câu hỏi 1', 'Hôm này là thứ mấy', '2019-11-19', 'duongcoibs', 1, 2),
(2, 'Câu hỏi 2', '2', '2019-11-19', 'duongcoibs', 2, 4),
(3, 'Câu hỏi 2', '2', '2019-11-19', 'duongcoibs', 2, NULL),
(4, 'L', 'V', '2019-11-19', 'duongcoibs', 2, NULL),
(5, 'Chủ đề x', 'Chi tiết y', '2019-11-19', 'tranhaiduong', 3, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rb_answer`
--

CREATE TABLE `rb_answer` (
  `id_ans_rb` int(11) NOT NULL,
  `answer_rb` varchar(255) NOT NULL,
  `id_rb` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `rb_answer`
--

INSERT INTO `rb_answer` (`id_ans_rb`, `answer_rb`, `id_rb`, `id_survey`) VALUES
(1, 'x', 1, 3),
(1, '2', 2, 3),
(1, '2', 3, 4),
(1, '2019-2020', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rb_question`
--

CREATE TABLE `rb_question` (
  `id_rb` int(11) NOT NULL,
  `rb_question` varchar(255) NOT NULL,
  `all_answer_rb` varchar(255) NOT NULL,
  `id_survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `rb_question`
--

INSERT INTO `rb_question` (`id_rb`, `rb_question`, `all_answer_rb`, `id_survey`) VALUES
(1, 'Sai hay đúng ?', 'Đúng/x/Sai', 3),
(2, '1 hay 2 ?', '1/2', 3),
(3, 'Câu hỏi', '1/2/3', 4),
(4, 'Năm học', '1999-2000/2019-2020', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `survey` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `survey`
--

INSERT INTO `survey` (`id_survey`, `survey`, `user`, `time`) VALUES
(1, 'Câu hỏi thường', 'duongcoibs', '2019-11-19'),
(2, 'Câu hỏi nhiều đáp án', 'duongcoibs', '2019-11-19'),
(3, 'Câu hỏi 1 đáp án', 'duongcoibs', '2019-11-19'),
(4, 'Khảo sát đầy đủ', 'tranhaiduong', '2019-11-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
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
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id_topic`, `topic`, `detail`, `time`, `user`, `status`) VALUES
(1, 'Thảo luận 1', 'Kiểm thử 1', '2019-11-19', 'duongcoibs', ''),
(2, 'Topic 2', 'Test 2', '2019-11-19', 'duongcoibs', ''),
(3, 'Thảo luận của tôi', 'Chi tiết 2', '2019-11-19', 'tranhaiduong', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `birthday`, `email`, `role`, `gender`) VALUES
(1, 'duongcoibs', '96e79218965eb72c92a549dd5a330112', 'Dương', 'Trần', '2-3-1999', 'duong.coi.bs.1104@gmail.com', '', 'Nam'),
(2, 'admin', '96e79218965eb72c92a549dd5a330112', 'Admin', 'Admin', '1-1-1999', 'a@a', '', 'Khác'),
(3, 'tranhaiduong', '96e79218965eb72c92a549dd5a330112', 'Dương', 'Traanf Hair', '2-2-Năm', '1111111111111@sad', '', 'Nữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Chỉ mục cho bảng `cb_question`
--
ALTER TABLE `cb_question`
  ADD PRIMARY KEY (`id_cb`);

--
-- Chỉ mục cho bảng `n_question`
--
ALTER TABLE `n_question`
  ADD PRIMARY KEY (`id_n`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Chỉ mục cho bảng `rb_question`
--
ALTER TABLE `rb_question`
  ADD PRIMARY KEY (`id_rb`);

--
-- Chỉ mục cho bảng `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cb_question`
--
ALTER TABLE `cb_question`
  MODIFY `id_cb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `n_question`
--
ALTER TABLE `n_question`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rb_question`
--
ALTER TABLE `rb_question`
  MODIFY `id_rb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
