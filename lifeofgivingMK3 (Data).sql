-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2021 at 09:56 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminsID`, `adminsUserName`, `adminsPwd`, `dateAdded`) VALUES
(32, '2ndAdmin', '$2y$10$Oj3Ls1KfGGqo16/loBhc7uXMT0T9ce7.SM7vLc4OkdI8Tnr38wXVi', '2021-07-08 15:38:26'),
(33, '3rdAdmin', '$2y$10$I2ZgjPO2OliwLidr/qfO8uQUrhKnbFJ3ajzHG10EO44r0dm36UZSG', '2021-07-08 15:38:32'),
(38, 'Admin: *xyzabc*', '$2y$10$hy2uwi1HuUJANFhGULQWLuOHYqiJ0rP/3U.XVOIdSLfZjI36jOUsi', '2021-07-08 20:29:51'),
(40, 'Admin 1stAdmin', '$2y$10$NuYI8PMjSCqRsgt96WyGkOXy3o7vfVL1f4Lznva/D8zOltBZqSd1i', '2021-07-08 19:13:59'),
(41, 'Admin * xyzabc *', '$2y$10$ezyFSF6IiHYFk5s1Ucot6uhXckoA.EENctbh7lJUVz1WMueokgepS', '2021-07-08 20:28:57');

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

--
-- Dumping data for table `charities`
--

INSERT INTO `charities` (`chID`, `chName`, `chUserName`, `chEmail`, `chPwd`, `chPhone1`, `chPhone2`, `chCountry`, `chCity`, `chDistrict`, `chStreet`, `chBankName`, `IBAN`, `chSignupDate`, `userLevel`, `adminsID`) VALUES
(14, 'Orman', 'ormano', 'ormano@gmail.com', '$2y$10$VtJl1oS.2BKP2jc65vzPZ.UKb1nufGMJ8Z.p5CBSPrWyPn/pP8pYe', '656165', '165465', 'Egypt', 'kjhsdf', 'kjsdfgkjh', 'dsgfskdj', 'GTH Bank', '65484855', '2021-05-31 16:23:21', 0, NULL),
(15, 'charity1', 'ormano1', 'ormano1@gmail.com', '$2y$10$8FRKs0VdonFt0F2fXVjXQu9DJNxQsDH1K2u8C40hMRDZwX/yi4Wkm', '65461684', '6546165', 'Egypt', 'Cairo', 'sdfsdf', 'Street no. 1', 'GTH Bank', '6456546', '2021-06-23 08:06:58', 0, NULL),
(16, 'dsfgsdf', 'sgdf444r', 'okrmadno@gmail.com', '$2y$10$TIvzONUU7qPwaV3/PB7jiOKujyM9pcFiN4kOiqAMcznoGfMsILhQa', '64654654216', '63546546216', 'Egypt', ' Dakahlia ', 'dsgdfg', 'qdsgdfg', 'qaegdfgs', '65465416218974685798426103032', '2021-06-15 20:53:19', 0, NULL),
(17, 'adfasdfuu', 'fffff33333', '', '$2y$10$ppykvW0iHrDL.LJPjdQzp.StL8vk4RUHtO75wrn76NMjCT/LJTb4S', '65465465', '654654654', 'Egypt', 'Cairo ', 'sdfgdfg', 'sdgdfgsd', 'sdfgsdfg', '65465465465465465465465465465', '2021-06-22 22:19:38', 0, NULL),
(19, 'rsala', 'rsala123', 'zoro75799@gmail.com', '$2y$10$gadojiTimQcVslFyxBlabegNTHSHeDu5zNVGEIrDkWXxyvbWjup9u', '654654', '654564654', 'Egypt', ' Matruh ', 'asdas', 'asads', 'sadfasd', '65465465465465454445454545454', '2021-06-23 08:15:49', 0, NULL),
(35, NULL, '2ndAdmin', NULL, '$2y$10$Oj3Ls1KfGGqo16/loBhc7uXMT0T9ce7.SM7vLc4OkdI8Tnr38wXVi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:26', 1, 32),
(36, NULL, '3rdAdmin', NULL, '$2y$10$I2ZgjPO2OliwLidr/qfO8uQUrhKnbFJ3ajzHG10EO44r0dm36UZSG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:32', 1, 33),
(41, NULL, 'Admin: *xyzabc*', NULL, '$2y$10$hy2uwi1HuUJANFhGULQWLuOHYqiJ0rP/3U.XVOIdSLfZjI36jOUsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:30:44', 1, 38),
(43, NULL, 'Admin 1stAdmin', NULL, '$2y$10$NuYI8PMjSCqRsgt96WyGkOXy3o7vfVL1f4Lznva/D8zOltBZqSd1i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 19:13:59', 1, 40),
(44, NULL, 'Admin * xyzabc *', NULL, '$2y$10$ezyFSF6IiHYFk5s1Ucot6uhXckoA.EENctbh7lJUVz1WMueokgepS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:28:57', 1, 41);

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

--
-- Dumping data for table `chDonation`
--

INSERT INTO `chDonation` (`chDonationID`, `chName`, `dType`, `dQuantity`, `dValue`, `dDescription`, `dDate`, `donorsID`, `chID`) VALUES
(61, 'Orman', 'Both: Money & Asset', 10, 55555, 'lkjhsadkfjhadf', '2021-06-01 21:24:48', 40, 14),
(62, 'Orman', 'Money Donation', 0, 50000000, 'asdfadfsdf', '2021-06-01 21:26:57', 40, 14),
(63, 'Orman', 'Assest Donation', 10, 0, ';kljahsdfdf', '2021-06-01 21:27:48', 40, 14),
(64, 'charity1', 'Both: Money & Asset', 10, 10000, 'gfdhgfdhgfdhgfdgfdhgfdhgfdhgfdhgfdhgfdhgfdhhfdhg', '2021-06-01 23:01:25', 40, 15),
(65, 'charity1', 'Assest Donation', 10, 0, 'xyz', '2021-06-01 23:02:52', 43, 15),
(66, 'charity1', 'Assest Donation', 10, 0, 'xyz', '2021-06-01 23:03:54', 40, 15),
(67, 'charity1', 'Money Donation', 0, 50000, 'you can have all this money ', '2021-06-01 23:21:30', 41, 15),
(68, 'charity1', 'Money Donation', 0, 75000, 'take this money', '2021-06-01 23:25:34', 40, 15),
(69, 'charity1', 'Both: Money & Asset', 5, 5000, '1- item 1\r\n2- item 2\r\n3- item 3\r\n4- item 4\r\n5- item 5', '2021-06-02 08:14:35', 40, 15),
(70, 'Orman', 'Both: Item & Asset', 5, 55000, '5 Items', '2021-06-22 13:50:32', 40, 14),
(71, 'Orman', 'Both: Item & Asset', 5, 550000, '5 Items.', '2021-06-22 13:55:47', 40, 14),
(72, 'Orman', 'Both: Item & Asset', 7, 77000, '7 Items', '2021-06-22 13:58:10', 40, 14),
(73, 'Orman', 'Both: Item & Asset', 7, 770000, '7 Items.', '2021-06-22 14:02:23', 40, 14),
(74, 'Orman', 'Both: Item & Asset', 7, 770000, '7 Items.', '2021-06-22 14:03:17', 40, 14),
(75, 'Orman', 'Both: Item & Asset', 7, 770000, '7 Items.', '2021-06-22 14:03:19', 40, 14),
(76, 'Orman', 'Both: Item & Asset', 7, 770000, '7 Items.', '2021-06-22 14:08:58', 40, 14),
(77, 'Orman', 'Both: Item & Asset', 7, 777000, '7 Items!', '2021-06-22 14:09:17', 40, 14),
(78, 'Orman', 'Both: Item & Asset', 7, 777000, '7 Items!', '2021-06-22 14:10:04', 40, 14),
(79, 'charity1', 'Item Donation', 5, 0, '5 Items!', '2021-06-22 14:12:44', 40, 15),
(80, 'adfasdfuu', 'Money Donation', 0, 1000000000, 'A lot of money. Enjoyyyy!', '2021-06-22 14:13:38', 40, 17),
(81, 'Orman', 'Both: Item & Asset', 6, 654, 'asdfas', '2021-06-22 19:33:49', 40, 14),
(82, 'Orman', 'Item Donation', 5, 0, 'df', '2021-06-22 19:34:16', 40, 14),
(83, 'adfasdfuu', 'Both: Item & Asset', 4, 54, 'asdfasdfasd', '2021-06-22 19:37:15', 40, 17),
(84, 'Orman', 'Both: Item & Asset', 5, 12355, 'gth', '2021-06-22 19:41:02', 40, 14),
(85, 'Orman', 'Both: Item & Asset', 7, 7000, '7 Items!', '2021-06-23 08:08:00', 40, 14),
(86, 'rsala', 'Both: Item & Asset', 7, 75000, '7 Items!', '2021-06-23 09:23:37', 40, 19);

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

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donorsID`, `donorsFName`, `donorsLName`, `donorsEmail`, `donorsPhone`, `donorsUserName`, `donorsPwd`, `donorsAge`, `donorsGender`, `donorsCountry`, `donorsCity`, `donorsDistrict`, `donorsStreet`, `dSignupDate`, `userLevel`, `adminsID`) VALUES
(40, 'Mahmoud', 'Ashraf', 'zoro75799@gmail.com', '01141344724', 'mahmoud555', '$2y$10$LhjJn.L3oaVB0VUc1pLYo.wfx3E5c5ToNPx6vI.JrcS0L.vuesf62', '1999-07-09', 'M', 'Canada', 'cairo', 'xyz', '123', '2021-07-07 20:52:52', 1, NULL),
(41, 'donor1', 'donor', 'donor1@gmail.com', '16546', 'donor1', '$2y$10$M5nmnWeW8uoGIadeR3izH.m85Hi5kAcz3sCFkoh4X8gt3c.XyAD7a', '2021-05-10', 'M', 'Barbados', 'wer', 'wer', 'werwer', '2021-05-27 22:22:05', 0, NULL),
(42, 'sdfgsdf', 'sdfgsdfg', 'dasda@asd.com', '654651654', 'ggffffffff', '$2y$10$N7Q/UZmOwz6uN4.2qqR.neeH.iGarsVQEik.T4qGfvVJZCuqIn8B.', '2021-05-11', 'M', 'Denmark', 'sdfgdf', 'dgdfgs', 'dfgsdfg', '2021-05-31 16:17:17', 0, NULL),
(43, 'nada', 'sameh', 'nada1@gmail.com', '564654654654654', 'nada1', '$2y$10$zaYe.GmBGOO/QBJIW5VyDOAxpiNnOc0LU1u39xbfHmB3dmxV9HW1q', '2021-05-11', 'F', 'St Barthelemy', 'sdfsfsd', 'sdfsdfds', 'sdfdfdfd', '2021-05-31 16:50:13', 0, NULL),
(44, 'asdfasd', 'sdfasdf', 'as55hhfdfsa@agds.com', '65465465', 'asdfds2', '$2y$10$WsH6IwRAdCWK7ao1K8MbsuGaeHPuZO29GYisg7/3Qkp9WX5PyWPDu', '2021-06-16', 'M', 'Bahrain', 'asdfd', 'asdfsdf', 'asdfasdf', '2021-06-15 17:14:54', 0, NULL),
(46, 'Laila', 'Ahmed', 'zoro75799@gmail.com', '654654', 'laila123', '$2y$10$VCW5rwNO.KBlLCi6mHLSAeGInrvV44BvNQ58M4DQNkJprnW/RppFe', '1999-05-05', 'F', 'St Barthelemy', 'sdafsdf', 'asdfda', 'asdfsdf', '2021-06-22 19:32:16', 0, NULL),
(68, NULL, NULL, NULL, NULL, '2ndAdmin', '$2y$10$Oj3Ls1KfGGqo16/loBhc7uXMT0T9ce7.SM7vLc4OkdI8Tnr38wXVi', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:26', 1, 32),
(69, NULL, NULL, NULL, NULL, '3rdAdmin', '$2y$10$I2ZgjPO2OliwLidr/qfO8uQUrhKnbFJ3ajzHG10EO44r0dm36UZSG', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:32', 1, 33),
(74, NULL, NULL, NULL, NULL, 'Admin: *xyzabc*', '$2y$10$hy2uwi1HuUJANFhGULQWLuOHYqiJ0rP/3U.XVOIdSLfZjI36jOUsi', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:30:35', 1, 38),
(76, NULL, NULL, NULL, NULL, 'Admin 1stAdmin', '$2y$10$NuYI8PMjSCqRsgt96WyGkOXy3o7vfVL1f4Lznva/D8zOltBZqSd1i', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 19:13:59', 1, 40),
(77, NULL, NULL, NULL, NULL, 'Admin * xyzabc *', '$2y$10$ezyFSF6IiHYFk5s1Ucot6uhXckoA.EENctbh7lJUVz1WMueokgepS', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:28:57', 1, 41);

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fbID`, `comment`, `fbDate`, `donorsID`, `chID`) VALUES
(16, 'Nada is great', '2021-06-01 20:42:05', NULL, 14),
(17, 'Who is this?', '2021-06-01 20:43:19', 40, NULL),
(18, 'This is the truth, I am the greatest.', '2021-06-01 20:44:52', NULL, 14),
(19, 'Laila', '2021-06-01 20:49:04', 40, NULL),
(21, 'hjklhluioioioooo', '2021-06-01 20:57:57', NULL, 14),
(22, 'this site is great', '2021-06-02 08:16:29', NULL, 15),
(23, 'hi there', '2021-06-02 08:17:08', 40, NULL),
(25, 'اهلن', '2021-07-08 19:38:32', NULL, 15),
(26, 'go to hell\r\n', '2021-07-08 18:46:45', 40, NULL),
(46, 'who is this', '2021-07-08 19:12:33', NULL, 15);

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
-- Dumping data for table `helpseekers`
--

INSERT INTO `helpseekers` (`hsID`, `hsFName`, `hsLName`, `hsUserName`, `hsEmail`, `hsPwd`, `hsCountry`, `hsCity`, `hsDistrict`, `hsStreet`, `hsAge`, `hsNationalID`, `hsPhone`, `hsJob`, `hsIncome`, `hsGender`, `hsChildren`, `hsWives`, `hsCaseDescription`, `hsHealthStatus`, `hsHealthUpload`, `hsSignupDate`, `userLevel`, `adminsID`) VALUES
(1, 'Ahmed', 'Ayman', 'ahmed1', 'asda@mail.com', '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', 'Alexandria', '7l;sdkl;', 'asdfasdfdfd', '1999-07-09', 654651, '654654654', 'asdfasdf', '4500-5000', 'M', 10, 0, 'All you can do is eat. All you can do is eat. All you can do is eat. ', 'asdfsdf', '', '2021-06-21 18:54:11', 0, NULL),
(19, 'asdfsdf', 'asdfasdf', 'asdfsdf33', 'xyz@gmail.com', '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', '', 'sdfadadgdsf', 'sfgsdfsdf', '1995-04-04', 56465, '65465465', 'sdfasdf', '0-500', 'M', 0, 0, 'asdgsdlkj;lkjsedfhg fuck uuuuuuu', '', '', '2021-06-21 18:54:09', 0, NULL),
(20, 'sdfsdfee', 'asdfsdafsdf', 'asdfsdfds333aa', NULL, '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', ' Minya ', 'sdfdsfsdf', 'sdfsdfsdf', '1995-04-04', 564654654, '654654654', 'sdfsdfsd', '500-1000', 'M', 5, 4, 'sdfsdfsdfsfsdfsdfsd', 'sdfsdfsdf', 0x666171446f776e2e68746d6c, '2021-06-22 15:50:58', 0, NULL),
(21, 'sdfdsfs', 'sdfdfsd', 'sdfdf34', NULL, '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', 'Faiyum ', 'sgdgdfg', 'sdgdfgfd', '1999-04-05', 654654654, '6546546546', 'sasfadfs', '0-500', 'M', 5, 2, 'sfadfgdgsdfg', 'dsdfgsdfg', 0x6267362e706e67, '2021-06-22 15:50:54', 0, NULL),
(22, 'asdfasdf', 'asdfasdf', 'asdfsdfasd564565', NULL, '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', 'Faiyum ', 'asfasdf', 'assdfs', '1999-05-04', 6546541, '6546546', 'sdafdfas', '0-500', 'M', 4, 4, 'asfsdfasdfasdf', 'sfdsdfsdf', 0x6267362e706e67, '2021-06-22 15:50:50', 0, NULL),
(23, 'xyz', 'abc', 'xyzabc123', 'ay7aga123@mail.com', '$2y$10$g9p4gsDsHXZHa0tzEo3egOzo2DWl8TZyT1iswJcb0KIF8ZvuPEf5e', 'Egypt', 'Red Sea', 'asfasdfasdf', 'street no. 1', '1999-05-05', 654654, '01141344724', 'dfsfsdf', '4000-4500', 'M', 4, 1, 'All you do is play and play.', 'sdfdfsd', '', '2021-06-23 08:06:23', 0, NULL),
(24, 'asdasd', 'asdsd', 'sdsds33', 'fhf@gg.com', '$2y$10$Uzyy3nWeNidmJVNkYmXu1.W81ivmfxrLTZshxDYKllze/xouqru0y', 'Egypt', 'Red Sea', 'sadfsdf', 'sdfsdf', '1900-04-04', 654654, '6546', 'sdfsdf', '0-500', 'F', 4, 1, 'sdfdf', 'sdfsdfs', '', '2021-06-21 18:53:19', 0, NULL),
(25, 'asdfa', 'asdfa', 'gth123', 'asdasd$dd.com', '$2y$10$5SZth9FEqqx2ykpGYyHudu9ld6BUIzB3fryaREDmxq9bGaz4yOvVG', 'Egypt', 'Faiyum ', 'adfasdf', 'asdfs', '1999-11-11', 965465, '654654654', 'asdfasdf', '0-500', 'M', 1, 1, 'asdfasda', 'asdfsd', 0x646f6e6174652e6a7067, '2021-06-22 13:23:09', 0, NULL),
(26, 'asdfa', 'asdfasd', 'gthxyz', 'zoro75799@gmail.org', '$2y$10$E16nq/mNTdRzZtYkN1RHD.0Xbdsy6.Iy5pqNAeeCW5RPPTyeV2J22', 'Egypt', 'Cairo ', 'afsdfas', 'sadfsdf', '1999-05-05', 654654, '65465465', 'asdfasdf', '1000-1500', 'M', 1, 1, 'asdfasdf', 'safasdfsdf', 0x4c6f676f2e706e67, '2021-06-22 13:25:12', 0, NULL),
(27, 'asdfasdf', 'asdfasdf', 'gthabc', 'zoro75799@gmail.com', '$2y$10$P606bnfj2pMkc/3rXYjbeuLsL7vVBx2Y51I043UL/C./QHe0RbRx.', 'Egypt', 'Cairo ', 'afasdf', 'asdfsd', '1999-05-05', 654654, '654654654', 'asdfasdf', '4500-5000', 'M', 1, 1, 'asdfasdffdf', 'sadfsdf', 0x746f2d666565642e706e67, '2021-06-22 13:26:05', 0, NULL),
(40, NULL, NULL, '2ndAdmin', NULL, '$2y$10$Oj3Ls1KfGGqo16/loBhc7uXMT0T9ce7.SM7vLc4OkdI8Tnr38wXVi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:26', 1, 32),
(41, NULL, NULL, '3rdAdmin', NULL, '$2y$10$I2ZgjPO2OliwLidr/qfO8uQUrhKnbFJ3ajzHG10EO44r0dm36UZSG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 15:38:32', 1, 33),
(46, NULL, NULL, 'Admin: *xyzabc*', NULL, '$2y$10$hy2uwi1HuUJANFhGULQWLuOHYqiJ0rP/3U.XVOIdSLfZjI36jOUsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:30:52', 1, 38),
(48, NULL, NULL, 'Admin 1stAdmin', NULL, '$2y$10$NuYI8PMjSCqRsgt96WyGkOXy3o7vfVL1f4Lznva/D8zOltBZqSd1i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 19:13:59', 1, 40),
(49, NULL, NULL, 'Admin * xyzabc *', NULL, '$2y$10$ezyFSF6IiHYFk5s1Ucot6uhXckoA.EENctbh7lJUVz1WMueokgepS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-08 20:28:57', 1, 41);

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
  MODIFY `adminsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `charities`
--
ALTER TABLE `charities`
  MODIFY `chID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chDonation`
--
ALTER TABLE `chDonation`
  MODIFY `chDonationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donorsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `helpseekers`
--
ALTER TABLE `helpseekers`
  MODIFY `hsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
