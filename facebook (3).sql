-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allpostsinfo`
-- (See below for the actual view)
--
CREATE TABLE `allpostsinfo` (
`user_ID` int(11)
,`firstName` varchar(22)
,`lastName` varchar(225)
,`post_ID` int(11)
,`image` varchar(200)
,`description` varchar(1000)
,`postDate` datetime
,`numberOfLikes` bigint(21)
,`numberOfComments` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `post_ID` int(11) DEFAULT NULL,
  `commentDate` datetime DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `user_ID`, `post_ID`, `commentDate`, `content`) VALUES
(31, 56, 159, '2022-03-21 07:29:37', 'Wow Loy bro loyyyy'),
(32, 18, 160, '2022-03-21 12:51:10', 'Wow Loy bro loyyyy'),
(33, 18, 161, '2022-03-21 12:51:19', 'Wow Loy bro loy'),
(34, 56, 161, '2022-03-21 12:52:29', 'Wow Loy bro loyyyy'),
(35, 56, 160, '2022-03-21 12:52:37', 'Wow Loy bro loy'),
(37, 18, 164, '2022-03-21 17:30:15', 'Wow Loy bro loyyyy'),
(38, 69, 164, '2022-03-21 17:59:56', 'Wow'),
(39, 18, 164, '2022-03-22 07:45:34', '1234'),
(41, 18, 166, '2022-03-22 13:23:21', 'Hello....!!'),
(42, 56, 166, '2022-03-22 13:21:37', 'Swadi Kha'),
(43, 66, 166, '2022-03-22 13:22:18', 'Hi JJ'),
(44, 69, 164, '2022-03-22 14:21:53', 'ហូបហើយៗ'),
(45, 69, 161, '2022-03-22 14:22:24', 'Hik Hik'),
(46, 69, 162, '2022-03-22 14:22:44', 'Hello ..!'),
(47, 69, 160, '2022-03-22 14:23:00', 'Back?????'),
(48, 69, 159, '2022-03-22 14:23:16', 'Heyyyyy!!!!'),
(49, 18, 159, '2022-03-22 14:24:32', 'Yeah'),
(50, 18, 167, '2022-03-23 10:25:11', 'Wow Loy bro loy'),
(51, 18, 168, '2022-03-23 19:31:01', 'Wow'),
(53, 69, 166, '2022-03-23 19:54:06', 'ok'),
(54, 18, 170, '2022-03-23 19:56:37', 'So cute');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendship_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `friend_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friendship_ID`, `user_ID`, `friend_ID`) VALUES
(124, 18, 69),
(125, 69, 18),
(126, 18, 57),
(127, 57, 18),
(128, 18, 56),
(129, 56, 18);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `numberOflike` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_ID`, `user_ID`, `post_ID`, `numberOflike`) VALUES
(196, 18, 159, NULL),
(197, 18, 159, NULL),
(198, 18, 159, NULL),
(201, 18, 159, NULL),
(202, 18, 159, NULL),
(203, 56, 160, NULL),
(205, 18, 161, NULL),
(206, 57, 162, NULL),
(208, 18, 164, NULL),
(209, 18, 164, NULL),
(211, 18, 164, NULL),
(212, 18, 164, NULL),
(213, 18, 164, NULL),
(214, 18, 164, NULL),
(215, 18, 164, NULL),
(216, 18, 164, NULL),
(217, 18, 164, NULL),
(218, 18, 164, NULL),
(225, 18, 164, NULL),
(226, 18, 162, NULL),
(227, 69, 166, NULL),
(228, 18, 161, NULL),
(229, 69, 164, NULL),
(230, 18, 164, NULL),
(231, 18, 166, NULL),
(232, 18, 166, NULL),
(233, 18, 164, NULL),
(234, 18, 164, NULL),
(235, 18, 166, NULL),
(236, 18, 166, NULL),
(237, 18, 166, NULL),
(238, 18, 167, NULL),
(239, 18, 167, NULL),
(240, 18, 167, NULL),
(241, 18, 166, NULL),
(242, 18, 166, NULL),
(243, 18, 166, NULL),
(244, 18, 166, NULL),
(245, 18, 166, NULL),
(246, 18, 166, NULL),
(247, 18, 166, NULL),
(248, 18, 166, NULL),
(249, 18, 166, NULL),
(250, 18, 166, NULL),
(251, 18, 166, NULL),
(252, 18, 166, NULL),
(253, 18, 166, NULL),
(254, 18, 166, NULL),
(255, 18, 168, NULL),
(256, 18, 168, NULL),
(257, 18, 168, NULL),
(258, 18, 168, NULL),
(259, 18, 168, NULL),
(260, 18, 170, NULL),
(261, 18, 170, NULL),
(262, 18, 170, NULL),
(263, 18, 170, NULL),
(264, 18, 170, NULL),
(265, 18, 170, NULL),
(266, 18, 170, NULL),
(267, 18, 170, NULL),
(268, 18, 170, NULL),
(269, 18, 170, NULL),
(273, 18, 168, NULL),
(274, 18, 168, NULL),
(275, 18, 168, NULL),
(276, 18, 168, NULL),
(277, 18, 168, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `postcomments`
-- (See below for the actual view)
--
CREATE TABLE `postcomments` (
`post_ID` int(11)
,`numberOfComments` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `postdetails`
-- (See below for the actual view)
--
CREATE TABLE `postdetails` (
`post_ID` int(11)
,`description` varchar(1000)
,`user_ID` int(11)
,`postDate` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `postlikes`
-- (See below for the actual view)
--
CREATE TABLE `postlikes` (
`post_ID` int(11)
,`numberOfLikes` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_ID` int(11) NOT NULL,
  `postDate` datetime DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `postDate`, `description`, `image`, `user_ID`) VALUES
(159, '2022-03-22 07:23:37', 'Hey', 'IMG-62391709be7209.85221971.jpg', 18),
(160, '2022-03-22 07:25:25', 'Back', 'IMG-623917759bf0f2.71200760.webp', 56),
(161, '2022-03-22 08:11:50', 'Haha', 'IMG-62392256a26063.20420828.jpg', 56),
(162, '2022-03-22 07:27:15', 'Hello bart', 'IMG-623917e32f1a55.49025544.jpg', 57),
(164, '2022-03-22 14:14:46', 'ហូបបាយនៅ​ ហូបបាយនៅ????', 'IMG-623916f7da28d3.80133364.jpg', 18),
(166, '2022-03-22 13:20:11', 'Hi', 'IMG-62396a9b3a0373.76861080.jpg', 69),
(167, '2022-03-23 09:47:52', 'The best animation movie ever ', 'IMG-623a8a430970b8.02762276.jpg', 18),
(168, '2022-03-23 19:30:41', 'Electro-man', 'IMG-623b12f1d58649.21439331.jpg', 18),
(170, '2022-03-23 19:56:16', '', 'IMG-623b18f0980631.80257616.jpg', 69);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userdetails`
-- (See below for the actual view)
--
CREATE TABLE `userdetails` (
`user_ID` int(11)
,`firstName` varchar(22)
,`lastName` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `firstName` varchar(22) DEFAULT NULL,
  `lastName` varchar(225) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `userPassword` varchar(22) DEFAULT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `cover_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `firstName`, `lastName`, `gender`, `dateOfBirth`, `phone`, `email`, `userPassword`, `profile_image`, `cover_image`) VALUES
(18, 'Sey', 'Ha', 'M', '2002-08-06', '0979420904', 'seyha@gmail.com', '1234', 'IMG-6239cab854c6f3.27625957.jpg', 'IMG-6239bcfa70a2c9.00249566.png'),
(56, 'seyha', 'so', 'M', '2022-03-30', '098', 'seyha@gmail.com', '0000', 'IMG-6239175b1c5db3.64608801.jpg', 'IMG-62380d2b500d64.05111613.jpg'),
(57, 'Key', 'Phat', 'M', '0000-00-00', '', 'key@gmail.com', '1111', 'IMG-623917d267d934.26885285.jpg', 'IMG-62381896898501.76844666.jpg'),
(58, 'Jek', 'Kjey', 'F', '0000-00-00', '', 'dfsdfds', '123', 'IMG-62394971f04574.48753482.png', NULL),
(59, 'Ronan', 'The best', 'M', '0000-00-00', '', 'ronan@gmail.com', '1212', 'IMG-6239499c6a7ac7.30034827.jpg', NULL),
(60, 'Sok', 'Sok', 'M', '0000-00-00', '', 'sok@gmail.com', 'sok143', 'IMG-623949c33598f7.02944364.png', NULL),
(61, 'Pu', 'Tim', 'M', '0000-00-00', '', 'tim@gmail.com', '5555', 'IMG-62394a423f8c56.97631207.jpg', NULL),
(62, 'Nga', 'KK', 'M', '0000-00-00', '', 'nga@gmail.com', '6666', 'IMG-62394a726a54b8.95406190.jpg', NULL),
(63, 'PHIM', 'Kon Khmer', 'M', '0000-00-00', '', 'phim@gmail.com', '7777', 'IMG-62394a94581224.72312875.png', NULL),
(64, 'Hak', 'Kim', 'M', '0000-00-00', '', 'hak@gmail.com', '8888', 'IMG-62394abe51aec5.34072776.jpg', NULL),
(65, 'Sopha', 'LOLO', 'M', '0000-00-00', '', 'sopha@gmail.com', '9999', 'IMG-62394ae78a3925.24827958.jpg', NULL),
(66, 'Savoeurt', 'KmengToch', 'M', '0000-00-00', '', 'savoeurt@gmail.com', '9090', 'IMG-62394b043e4227.58803471.jpg', NULL),
(67, 'JJ', 'Phandy', 'F', '0000-00-00', '', 'phandy@gmail.com', '6767', 'IMG-62394b33f21fc5.02241444.jpg', NULL),
(68, 'Phiem', 'Loem', 'F', '0000-00-00', '', 'phiem@gmail.com', '8989', 'IMG-62394b558d5454.55636298.jpg', NULL),
(69, 'The', 'Leak', 'F', '2030-08-31', '', 'leak@gmail.com', 'leakleak', 'IMG-62391656e41d84.24170039.jpg', 'IMG-623934ba888729.78364168.jpg'),
(70, 'SreyNe', 'Ven', 'F', '0000-00-00', '', 'sreyne@gmail.com', 'venne', 'IMG-62394b7942d2b1.19860132.jpg', 'IMG-62394b8d708c78.48382189.jpg'),
(71, 'Ulvy', 'Ulvy', 'M', '0000-00-00', '', 'ulvy@gmail.com', '2323', 'IMG-62394bb885f248.98543635.jpg', 'IMG-62394bb8864aa4.63213436.jpg'),
(72, 'seyha', 'soeurn', 'M', '0000-00-00', '', 'seyha.soeurn@', '12345678', 'IMG-62394c40aec158.25704955.jpg', 'IMG-62394c40af24a3.52711606.jpg'),
(74, 'veang', 'ly', 'M', '0000-00-00', '', 'veang@gmail.com', '99999999', NULL, 'IMG-62394c134cba47.30468607.jpg'),
(75, 'Rebika', 'Keo', 'F', NULL, NULL, 'rebika@gmail.com', 'rebikakeo', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `allpostsinfo`
--
DROP TABLE IF EXISTS `allpostsinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allpostsinfo`  AS SELECT `users`.`user_ID` AS `user_ID`, `users`.`firstName` AS `firstName`, `users`.`lastName` AS `lastName`, `posts`.`post_ID` AS `post_ID`, `posts`.`image` AS `image`, `posts`.`description` AS `description`, `posts`.`postDate` AS `postDate`, `postlikes`.`numberOfLikes` AS `numberOfLikes`, `postcomments`.`numberOfComments` AS `numberOfComments` FROM (((`users` join `posts` on(`users`.`user_ID` = `posts`.`user_ID`)) join `postlikes` on(`posts`.`post_ID` = `postlikes`.`post_ID`)) join `postcomments` on(`posts`.`post_ID` = `postcomments`.`post_ID`)) ORDER BY `posts`.`postDate` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `postcomments`
--
DROP TABLE IF EXISTS `postcomments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postcomments`  AS SELECT `posts`.`post_ID` AS `post_ID`, count(`comments`.`user_ID`) AS `numberOfComments` FROM (`posts` left join `comments` on(`posts`.`post_ID` = `comments`.`post_ID`)) GROUP BY `posts`.`post_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `postdetails`
--
DROP TABLE IF EXISTS `postdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postdetails`  AS SELECT `posts`.`post_ID` AS `post_ID`, `posts`.`description` AS `description`, `posts`.`user_ID` AS `user_ID`, `posts`.`postDate` AS `postDate` FROM `posts` ;

-- --------------------------------------------------------

--
-- Structure for view `postlikes`
--
DROP TABLE IF EXISTS `postlikes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postlikes`  AS SELECT `posts`.`post_ID` AS `post_ID`, count(`likes`.`user_ID`) AS `numberOfLikes` FROM (`posts` left join `likes` on(`posts`.`post_ID` = `likes`.`post_ID`)) GROUP BY `posts`.`post_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `userdetails`
--
DROP TABLE IF EXISTS `userdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userdetails`  AS SELECT `users`.`user_ID` AS `user_ID`, `users`.`firstName` AS `firstName`, `users`.`lastName` AS `lastName` FROM `users` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `post_ID` (`post_ID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendship_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `friend_ID` (`friend_ID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `post_ID` (`post_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendship_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_ID`) REFERENCES `posts` (`post_ID`) ON DELETE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_ID`) REFERENCES `posts` (`post_ID`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
