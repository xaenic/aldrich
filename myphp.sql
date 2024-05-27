-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 09:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `content` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `content`, `title`, `date_created`, `name`) VALUES
(1, 'asdada', 'asdasd', '2024-05-16 04:46:47', 'admin'),
(2, 'dadada', 'asdas', '2024-05-16 04:47:19', 'admin'),
(3, 'ewewew', 'wewew', '2024-05-16 04:47:22', 'admin'),
(4, 'asdad', 'sadsad', '2024-05-16 04:47:30', 'admin'),
(5, 'test', 'Test', '2024-05-27 12:30:43', 'admin'),
(6, 'adkradbnlsa;dasdasda', 'adkruch', '2024-05-28 02:46:23', 'admin'),
(7, 'hahaha', 'haha', '2024-05-28 02:46:27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `purpose` varchar(254) NOT NULL,
  `laboratory` varchar(254) NOT NULL,
  `reservation_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(254) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `student_id`, `purpose`, `laboratory`, `reservation_date`, `date_created`, `status`) VALUES
(15, 4, 'Java', 'Lab 524', '2024-05-28', '2024-05-28 03:00:37', 'Cancelled'),
(16, 4, 'Java', 'Lab 524', '2024-05-08', '2024-05-28 03:02:58', 'Approved'),
(17, 4, 'Java', 'Lab 524', '2024-05-28', '2024-05-28 03:12:17', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `content` varchar(254) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `content`, `date_created`) VALUES
(1, 4, 'asdasdada', '0000-00-00 00:00:00'),
(2, 4, 'hahaha', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `time_in` datetime DEFAULT current_timestamp(),
  `laboratory` varchar(254) NOT NULL,
  `purpose` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `student_id`, `time_out`, `time_in`, `laboratory`, `purpose`) VALUES
(7, 4, '2024-04-30 00:21:00', '2024-04-30 00:20:55', 'Lab 524', 'Java'),
(8, 4, '2024-04-30 00:21:22', '2024-04-30 00:21:20', 'Lab 524', 'Java'),
(9, 4, '2024-05-28 03:22:10', '2024-05-28 03:21:32', 'Lab 524', 'Java'),
(10, 4, '2024-05-28 03:22:11', '2024-05-28 03:21:48', 'Lab 524', 'Java'),
(11, 4, '2024-05-28 03:30:22', '2024-05-28 03:30:20', 'Lab 524', 'Java'),
(12, 4, '2024-05-28 03:40:00', '2024-05-28 03:39:58', 'Lab 542', 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `idno` int(20) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `mname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `contact` int(20) NOT NULL,
  `address` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `cpassword` varchar(80) NOT NULL,
  `sessions` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `idno`, `fname`, `mname`, `lname`, `age`, `gender`, `contact`, `address`, `password`, `cpassword`, `sessions`) VALUES
(1, 'aldrichbatislaon@gmail.com', 21427307, 'aldrich', 'a', 'batisla-on', 21, 'male', 12345677, 'badian', '202cb962ac59075b964b07152d234b70', '', 29),
(3, 'sad@gmail.com', 1232132, 'weq', 'weq', 'weqwe', 12, 'qweq', 12345, 'dsadad', '202cb962ac59075b964b07152d234b70', '', 30),
(4, 'allanvillegas35@gmail.com', 21419023, 'Allan', 'Jr. C.', 'Villegas', 0, 'Male', 213123123, 'asdasdas', '123456', '', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwords` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `passwords`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1'),
(3, 'admin3', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stundet_bookings` (`student_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_id_back` (`student_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `student_id_fk` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_stundet_bookings` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_student_id_back` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `student_id_fk` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
