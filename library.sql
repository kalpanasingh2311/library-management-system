-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 09:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name_student` varchar(50) NOT NULL,
  `enrollment` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `current_sem` int(5) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name_student`, `enrollment`, `course`, `department`, `current_sem`, `active`) VALUES
(1, 'kalpana', '1237', 'b.tech', 'cse', 8, 'yes'),
(2, 'tanu shree', '5427', 'b.tech', 'cse', 8, 'yes'),
(3, 'ranju kumari', '8536', 'b.tech', 'cse', 8, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `author` text NOT NULL,
  `edition` varchar(255) NOT NULL,
  `publisher` text DEFAULT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `isissue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `barcode`, `subject`, `author`, `edition`, `publisher`, `reg_date`, `isissue`) VALUES
(2, '7845', 'eme', 'eme book', '5th', 's k sharma', '2025-05-30 10:37:36', 0),
(3, '18', 'em', 'arjun sinha', '5th', 'arjun', '2025-06-13 08:02:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `book_barcode` varchar(50) NOT NULL,
  `entry_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `totalfine` varchar(10) DEFAULT NULL,
  `paynow` varchar(10) DEFAULT NULL,
  `duesfine` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `enrollment`, `book_barcode`, `entry_date`, `return_date`, `totalfine`, `paynow`, `duesfine`) VALUES
(1, '1237', '7845', '2025-05-17', '2025-05-31', '40', '0', '40'),
(2, '1237', '7845', '2025-05-18', '2025-05-31', '30', '40', '10'),
(8, '5427', '7845', '2025-06-12', '2025-06-13', '0', '0', '0'),
(9, '5427', '897654', '2025-06-01', '2025-06-13', '20', '0', '20'),
(10, '5427', '18', '2025-06-14', '2025-06-14', '0', '0', '0'),
(11, '1237', '18', '2025-06-02', '', NULL, NULL, NULL),
(12, '1237', '7845', '2025-06-14', '2025-06-14', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `finaclear`
--

CREATE TABLE `finaclear` (
  `id` int(10) NOT NULL,
  `enrollment` varchar(10) DEFAULT NULL,
  `paynow` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finaclear`
--

INSERT INTO `finaclear` (`id`, `enrollment`, `paynow`, `date`) VALUES
(8, '1237', '10', '2025-06-02 12:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `username`, `password`, `name`) VALUES
(3, 'lib', '123', 'lib');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finaclear`
--
ALTER TABLE `finaclear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `finaclear`
--
ALTER TABLE `finaclear`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
