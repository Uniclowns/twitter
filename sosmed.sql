-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 11:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcomments`
--

CREATE TABLE `tbcomments` (
  `idComments` int(25) NOT NULL,
  `textComments` varchar(250) NOT NULL,
  `id` int(25) NOT NULL,
  `hastag` int(25) NOT NULL,
  `event_id` int(25) NOT NULL,
  `image` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcomments`
--

INSERT INTO `tbcomments` (`idComments`, `textComments`, `id`, `hastag`, `event_id`, `image`, `file`) VALUES
(37, 'bbbb #saya', 7, 119, 85, 'img/', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbtags`
--

CREATE TABLE `tbtags` (
  `idTags` int(25) NOT NULL,
  `textTags` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtags`
--

INSERT INTO `tbtags` (`idTags`, `textTags`) VALUES
(119, 'saya'),
(120, 'oioa'),
(121, 'asdw'),
(122, 'ytht'),
(123, 'nykgy');

-- --------------------------------------------------------

--
-- Table structure for table `tbtag_comment`
--

CREATE TABLE `tbtag_comment` (
  `id` int(25) NOT NULL,
  `comment_id` int(25) NOT NULL,
  `tag_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtag_comment`
--

INSERT INTO `tbtag_comment` (`id`, `comment_id`, `tag_id`) VALUES
(8, 37, 119);

-- --------------------------------------------------------

--
-- Table structure for table `tbtag_tweet`
--

CREATE TABLE `tbtag_tweet` (
  `id` int(25) NOT NULL,
  `tag_id` int(25) NOT NULL,
  `tweet_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtag_tweet`
--

INSERT INTO `tbtag_tweet` (`id`, `tag_id`, `tweet_id`) VALUES
(1, 84, 0),
(2, 85, 0),
(3, 86, 85),
(4, 88, 86),
(5, 120, 87);

-- --------------------------------------------------------

--
-- Table structure for table `tbtweets`
--

CREATE TABLE `tbtweets` (
  `idTweets` int(25) NOT NULL,
  `textTweets` varchar(250) NOT NULL,
  `id` int(25) NOT NULL,
  `hashtag` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtweets`
--

INSERT INTO `tbtweets` (`idTweets`, `textTweets`, `id`, `hashtag`, `image`, `file`) VALUES
(87, 'geege #oioa', 7, '120', 'img/', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `email`, `password`, `bio`, `image`) VALUES
(5, 'admin', 'admin@gmail.com', '21232f297a57a5a7', '123 123', 'img/1.jpg'),
(6, 'siswa', 'siswa@gmail.com', 'bcd724d15cde8c47', '', 'img/2.jpg'),
(7, 'user', 'user@gmail.com', 'ee11cbb19052e40b', '31 Maret 2022', 'img/2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcomments`
--
ALTER TABLE `tbcomments`
  ADD PRIMARY KEY (`idComments`);

--
-- Indexes for table `tbtags`
--
ALTER TABLE `tbtags`
  ADD PRIMARY KEY (`idTags`);

--
-- Indexes for table `tbtag_comment`
--
ALTER TABLE `tbtag_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbtag_tweet`
--
ALTER TABLE `tbtag_tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbtweets`
--
ALTER TABLE `tbtweets`
  ADD PRIMARY KEY (`idTweets`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcomments`
--
ALTER TABLE `tbcomments`
  MODIFY `idComments` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbtags`
--
ALTER TABLE `tbtags`
  MODIFY `idTags` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbtag_comment`
--
ALTER TABLE `tbtag_comment`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbtag_tweet`
--
ALTER TABLE `tbtag_tweet`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbtweets`
--
ALTER TABLE `tbtweets`
  MODIFY `idTweets` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
