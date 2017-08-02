-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2017 at 11:41 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smallblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`) VALUES
(1, 'Tips');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `catid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `catid`, `userid`) VALUES
(1, 'When Should a Child Be Taken from His Parents?', 'What should you do if child-protective services comes to your house?\r\nYou will hear a knock on the door, often late at night. You don’t have to open it, but if you don’t the caseworker outside may come back with the police. The caseworker will tell you you’re being investigated for abusing or neglecting your children. \r\nShe will tell you to wake them up and tell them to take clothes off so she can check their bodies for bruises and marks. She will interview you and your kids separately, so you can’t hear what she’s asking them or what they’re saying. She opens your fridge and your cabinets, checking to see if you have food, and what kind of food. \r\nShe looks around for unsafe conditions, for dirt, for mess, for bugs or rats. She takes notes. You must be as calm and deferential as possible. However disrespectful and invasive she is, whatever awful things she accuses you of, you must remember that child protection has the power to remove your kids at any time if it believes them to be in danger. \r\nYou can tell her the charges are not true, but she’s required to investigate them anyway. If you get angry, your anger may be taken as a sign of mental instability, especially if the caseworker herself feels threatened. She has to consider the possibility that you may be hurting your kids, that you may even kill one of them. You may never find out who reported you. ', 1, 1),
(2, 'Love And Fire', 'ACCOMACK COUNTY, Va. — The corn was harvested, and the field was a dirty sort of brown. Deborah Clark would think about that later, how at a different time of year she wouldn’t have seen anything until it was too late.\r\n\r\nA friend had come over to her house in Parksley, Va., once the kids from Clark’s living-room day care went home. He left about 10:30 that Monday evening, but a few minutes later knocked on her door again. “Hey,” he told her. “That house across the field is on fire.”\r\n\r\nShe knew which one he was talking about. It had been a nice house once: two stories, white paint. But now it was empty and it had a peeled, beaten look to it. It had been a long time since anyone lived there, so she couldn’t think of how it could have caught fire — except that it was so dry that maybe the weather had something to do with it.\r\n\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'demo', 'demo@demo.com', '6c5ac7b4d3bd3311f033f971196cfa75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
