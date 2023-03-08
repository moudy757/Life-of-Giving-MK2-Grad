-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2021 at 09:50 PM
-- Server version: 10.5.10-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifeofgiving`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminsID` int(11) NOT NULL,
  `adminsUserName` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminsPwd` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `adID` int(11) NOT NULL,
  `adName` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adStartDate` timestamp NULL DEFAULT NULL,
  `adEndDate` timestamp NULL DEFAULT NULL,
  `adPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charities`
--

CREATE TABLE `charities` (
  `chID` int(11) NOT NULL,
  `chName` varchar(128) DEFAULT NULL,
  `chUserName` varchar(128) NOT NULL,
  `chEmail` varchar(128) DEFAULT NULL,
  `chPwd` varchar(128) NOT NULL,
  `chPhone1` varchar(11) DEFAULT NULL,
  `chPhone2` varchar(11) DEFAULT NULL,
  `chCountry` varchar(128) DEFAULT NULL,
  `chCity` varchar(128) DEFAULT NULL,
  `chDistrict` varchar(128) DEFAULT NULL,
  `chStreet` varchar(128) DEFAULT NULL,
  `chBankName` varchar(128) DEFAULT NULL,
  `IBAN` varchar(29) DEFAULT NULL,
  `chSignupDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userLevel` int(1) NOT NULL DEFAULT 0,
  `adminsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chDonation`
--

CREATE TABLE `chDonation` (
  `chDonationID` int(11) NOT NULL,
  `chName` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dType` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dQuantity` int(11) NOT NULL,
  `dValue` int(11) NOT NULL,
  `dDescription` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `donorsID` int(11) DEFAULT NULL,
  `chID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donorsID` int(11) NOT NULL,
  `donorsFName` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsLName` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsEmail` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsUserName` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsPwd` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donorsAge` date DEFAULT NULL,
  `donorsGender` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsCountry` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsCity` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsDistrict` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donorsStreet` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dSignupDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userLevel` int(1) NOT NULL DEFAULT 0,
  `adminsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbID` int(11) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `fbDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `donorsID` int(11) DEFAULT NULL,
  `chID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `helpseekers`
--

CREATE TABLE `helpseekers` (
  `hsID` int(11) NOT NULL,
  `hsFName` varchar(128) DEFAULT NULL,
  `hsLName` varchar(128) DEFAULT NULL,
  `hsUserName` varchar(128) NOT NULL,
  `hsEmail` varchar(128) DEFAULT NULL,
  `hsPwd` varchar(128) DEFAULT NULL,
  `hsCountry` varchar(128) DEFAULT NULL,
  `hsCity` varchar(128) DEFAULT NULL,
  `hsDistrict` varchar(128) DEFAULT NULL,
  `hsStreet` varchar(128) DEFAULT NULL,
  `hsAge` date DEFAULT NULL,
  `hsNationalID` int(14) DEFAULT NULL,
  `hsPhone` varchar(11) DEFAULT NULL,
  `hsJob` varchar(128) DEFAULT NULL,
  `hsIncome` varchar(128) DEFAULT NULL,
  `hsGender` enum('M','F') DEFAULT NULL,
  `hsChildren` int(2) DEFAULT NULL,
  `hsWives` int(11) DEFAULT NULL,
  `hsCaseDescription` text DEFAULT NULL,
  `hsHealthStatus` varchar(128) DEFAULT NULL,
  `hsHealthUpload` longblob DEFAULT NULL,
  `hsSignupDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userLevel` int(1) NOT NULL DEFAULT 0,
  `adminsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminsID`);

--
-- Indexes for table `charities`
--
ALTER TABLE `charities`
  ADD PRIMARY KEY (`chID`),
  ADD KEY `adminsIDFK1` (`adminsID`);

--
-- Indexes for table `chDonation`
--
ALTER TABLE `chDonation`
  ADD PRIMARY KEY (`chDonationID`),
  ADD KEY `donorsID-FK-1` (`donorsID`),
  ADD KEY `chID-FK-1` (`chID`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donorsID`),
  ADD KEY `adminsIDFK2` (`adminsID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbID`),
  ADD KEY `donorsID-FK-2` (`donorsID`),
  ADD KEY `chID-FK-2` (`chID`);

--
-- Indexes for table `helpseekers`
--
ALTER TABLE `helpseekers`
  ADD PRIMARY KEY (`hsID`),
  ADD KEY `adminsIDFK3` (`adminsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charities`
--
ALTER TABLE `charities`
  MODIFY `chID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chDonation`
--
ALTER TABLE `chDonation`
  MODIFY `chDonationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donorsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `helpseekers`
--
ALTER TABLE `helpseekers`
  MODIFY `hsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charities`
--
ALTER TABLE `charities`
  ADD CONSTRAINT `adminsIDFK1` FOREIGN KEY (`adminsID`) REFERENCES `admins` (`adminsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
  ADD CONSTRAINT `adminsIDFK2` FOREIGN KEY (`adminsID`) REFERENCES `admins` (`adminsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `chID-Fb-FK` FOREIGN KEY (`chID`) REFERENCES `charities` (`chID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donorID-Fb-FK` FOREIGN KEY (`donorsID`) REFERENCES `donors` (`donorsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `helpseekers`
--
ALTER TABLE `helpseekers`
  ADD CONSTRAINT `adminsIDFK3` FOREIGN KEY (`adminsID`) REFERENCES `admins` (`adminsID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
