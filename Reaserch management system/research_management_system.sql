-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 01:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accout`
--

CREATE TABLE `accout` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accout`
--

INSERT INTO `accout` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(3, 'Account', 'nimesha', 'education', 'swqefefeg', 'EFEFGEW eewfg', 'uploads/679b45ad6999f5.69357877.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Lahiru', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(2, 'buss', 'aDW', 'Bussince', 'EFREGRG', 'FRWQEGWQGE', 'uploads/679b63ec322850.68143411.pdf'),
(3, 'DCFFG', 'sfweg', 'Bussince', 'efgewgw', 'wefweg', 'uploads/679b6412d2af61.81763676.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date`) VALUES
(1, 'reserch', '2025-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `human`
--

CREATE TABLE `human` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `human`
--

INSERT INTO `human` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(3, 'wqdfwef', 'efwweg', 'hr', 'efwrgg', 'wefeg', 'uploads/679b64a77eb573.25249412.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(9, 'mL', 'weer', 'information', 'ljdcjnsaucgjnc', 'ai ml', 'uploads/679b1dda754067.11464554.pdf'),
(10, 'fgsg', 'agag', 'information', 'agagag', 'agag', 'uploads/679b1e21c28c46.29876630.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(3, 'asfgsdgs', 'sdhsh', 'marketing', 'sdgsdhH', 'sdhsh', 'uploads/679b656fe001f4.74327522.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `massage` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `massage`) VALUES
(1, 'nimesha', 'nimesha@200gmail.com', 'hii'),
(2, 'nimesha', 'nimesha@200gmail.com', 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `tourism`
--

CREATE TABLE `tourism` (
  `id` int(11) NOT NULL,
  `ResearchTitle` varchar(255) NOT NULL,
  `AuthorName` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Abstract` varchar(1000) NOT NULL,
  `KeyWord` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism`
--

INSERT INTO `tourism` (`id`, `ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) VALUES
(10, 'efwg', 'wegwqeg', 'tourism', 'wegwe4gg', 'wegweg', 'uploads/679b6677055162.30697851.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Lahiru shehan', 'lahirushehan2002@gmail.com', '$2y$10$d5bvKEGfBW1Qfw86L.nz7.eZOV2qksoYKm1lJ6lTOnxsCnp9lte0m'),
(3, 'Lahiru Shehan', 'test@gmail.com', '$2y$10$8ATUvqyuLAOrHIf981Brn.hfll8Rfj1v9tKwf/d3/TLtlngY/Lrki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accout`
--
ALTER TABLE `accout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism`
--
ALTER TABLE `tourism`
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
-- AUTO_INCREMENT for table `accout`
--
ALTER TABLE `accout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `human`
--
ALTER TABLE `human`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourism`
--
ALTER TABLE `tourism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
