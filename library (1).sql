-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 03:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2024-08-01 11:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `StudentId` varchar(255) DEFAULT NULL,
  `Message` char(255) DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `MessageId` int(11) NOT NULL,
  `Recipient` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`StudentId`, `Message`, `Time`, `MessageId`, `Recipient`) VALUES
('SID015', 'Good Day', '2024-08-01 20:37:27', 536, 'admin@gmail.com'),
('SID015', 'Good Day', '2024-08-02 03:00:20', 539, 'admin@gmail.com'),
('SID021', 'Good Morning .....This library is functioning properly', '2024-08-02 03:18:31', 540, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `StudentId` varchar(12) DEFAULT NULL,
  `ISBNNumber` varchar(12) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `RequestDate` date DEFAULT curdate(),
  `BookId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`StudentId`, `ISBNNumber`, `Status`, `RequestDate`, `BookId`) VALUES
('SID021', 'GBSJ36344563', 0, '2024-07-02', 11),
('SID015', '9350237695', 0, '2024-07-03', 5),
('SID021', '9350237695', 0, '2024-07-03', 5),
('SID021', '222333', 0, '2024-07-03', 1),
('SID021', '1111', 0, '2024-07-03', 3),
('SID021', '1111', 0, '2024-07-03', 3),
('SID021', '007053246X', 0, '2024-07-03', 10),
('SID021', '1848126476', 0, '2024-07-03', 9),
('SID021', '222333', 0, '2024-07-07', 1),
('SID021', '222333', 0, '2024-07-07', 1),
('SID021', '007053246X', 0, '2024-07-11', 10),
('SID021', 'B07C7M8SX9', 0, '2024-08-01', 8),
('SID015', 'B019MO3WCM', 0, '2024-08-01', 6),
('SID015', 'GBSJ36344563', 0, '2024-08-01', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Anuj kuma', '2024-01-25 07:23:03', '2024-08-01 16:46:47'),
(2, 'Chetan Bhagatt', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(3, 'Anita Desai', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(4, 'HC Verma', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(5, 'R.D. Sharma ', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(9, 'fwdfrwer', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(10, 'Dr. Andy Williams', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(11, 'Kyle Hill', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(12, 'Robert T. Kiyosak', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(13, 'Kelly Barnhill', '2024-01-25 07:23:03', '2024-02-04 06:34:26'),
(14, 'Herbert Schildt', '2024-01-25 07:23:03', '2024-02-04 06:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(25) DEFAULT NULL,
  `Total_no_of_copies_Available` int(11) DEFAULT NULL,
  `bookImage` varchar(250) NOT NULL,
  `isIssued` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `Total_no_of_copies_Available`, `bookImage`, `isIssued`, `RegDate`, `UpdationDate`) VALUES
(1, 'PHP And MySql programming', 5, 1, '222333', 0, '1efecc0ca822e40b7b673c0d79ae943f.jpg', 1, '2024-01-30 07:23:03', '2024-07-07 01:54:30'),
(3, 'physics', 6, 4, '1111', 13, 'dd8267b57e0e4feee5911cb1e1a03a79.jpg', 0, '2024-01-30 07:23:03', '2024-07-07 01:31:39'),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', 1, '5939d64655b4d2ae443830d73abc35b6.jpg', 1, '2024-01-30 07:23:03', '2024-07-03 07:57:04'),
(6, 'WordPress for Beginners 2022', 5, 10, 'B019MO3WCM', 99, '144ab706ba1cb9f6c23fd6ae9c0502b3.jpg', 1, '2024-01-30 07:23:03', '2024-08-01 16:40:10'),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', 53, '90083a56014186e88ffca10286172e64.jpg', 1, '2024-01-30 07:23:03', '2024-07-02 15:14:27'),
(8, 'Rich Dad Poor Dad', 8, 12, 'B07C7M8SX9', 119, '52411b2bd2a6b2e0df3eb10943a5b640.jpg', 1, '2024-01-30 07:23:03', '2024-08-01 15:45:21'),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', 199, 'f05cd198ac9335245e1fdffa793207a7.jpg', 0, '2024-01-30 07:23:03', '2024-07-07 01:53:32'),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', 140, '36af5de9012bf8c804e499dc3c3b33a5.jpg', 0, '2024-01-30 07:23:03', '2024-07-11 10:55:28'),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', 418, 'b1b6788016bbfab12cfd2722604badc9.jpg', 1, '2024-01-30 07:23:03', '2024-08-01 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Romantic', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:43'),
(5, 'Technology', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:51'),
(6, 'Science', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:51'),
(7, 'Management', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:51'),
(8, 'General', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:51'),
(9, 'Programming', 1, '2024-01-31 07:23:03', '2024-02-04 06:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(0, NULL, 'SID021', '2024-07-03 07:36:44', '2024-07-03 10:03:50', 1, 0),
(0, 3, 'SID021', '2024-07-03 10:03:24', '2024-07-03 10:03:50', 1, 0),
(0, 3, 'SID021', '2024-07-03 10:48:21', '2024-07-07 01:31:39', 1, 0),
(0, NULL, 'SID021', '2024-07-07 01:03:06', '2024-07-07 01:31:39', 1, 0),
(0, 9, 'SID021', '2024-07-07 01:53:24', '2024-07-07 01:53:32', 1, 0),
(0, 1, 'SID021', '2024-07-07 01:54:37', NULL, NULL, NULL),
(0, 8, 'SID021', '2024-08-01 11:16:18', NULL, NULL, NULL),
(0, 11, 'SID015', '2024-08-01 16:45:51', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(0, 'SID014', 'Vishnu P S', 'psvishnu888@gmail.com', '9611256942', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2024-06-28 04:28:20', '2024-06-28 04:42:16'),
(0, 'SID015', 'VIJAY D', '123@gmail.com', '9900990090', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2024-06-28 04:32:17', '2024-06-28 04:42:16'),
(0, 'SID016', 'Smaran', 'smg@gmail.com', '9191919991', '83f2550373f2f19492aa30fbd5b57512', 1, '2024-06-30 06:46:38', NULL),
(0, 'SID021', 'Vishruth', 'vmv@gmail.com', '9109109101', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2024-06-30 07:47:34', '2024-08-01 10:57:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
