-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2024 at 09:04 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsd12_group4`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `reminder_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `task_id`, `message`, `reminder_date`) VALUES
(3, 2, 'The report should be 50% ready by now.', '2024-07-26'),
(4, 3, 'If I still didn\'t find a gift by now, just offer them a pass to spend a day in a spa.', '2024-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `priority` enum('High','Medium','Low','') NOT NULL,
  `status` enum('Completed','Ongoing','Pending','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `category`, `title`, `description`, `due_date`, `priority`, `status`) VALUES
(1, 1, 'School', 'Prepare for exam', 'I need to review the last chapters, and work on some exercices.', '2024-07-27', 'Medium', 'Ongoing'),
(2, 4, 'Work', 'Prepare the report', 'Prepare the financial report of quarter 2 including all the specific points mentioned by the manager.', '2024-07-31', 'Low', 'Pending'),
(3, 3, 'Family', 'Jim\'s wedding', 'Look for a good present to offer Jim for his wedding.', '2024-07-28', 'High', 'Ongoing'),
(4, 2, 'School', 'The database project', 'Finalize the database project (code, report, and PPT).', '2024-07-30', 'High', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'john', 'john@mail.com', 'johnpass'),
(2, 'serena', 'serena@mail.com', 'serenapass'),
(3, 'michael', 'michael@mail.com', 'michaelpass'),
(4, 'julie', 'julie@mail.com', 'juliepass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
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
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
