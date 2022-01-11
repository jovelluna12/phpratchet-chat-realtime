-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 04:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentapartment`
--
CREATE DATABASE IF NOT EXISTS `rentapartment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rentapartment`;

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ApartmentID` int(255) NOT NULL,
  `ApartmentName` varchar(50) DEFAULT NULL,
  `OwnersUserID` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `apartmentinformation`
--

CREATE TABLE `apartmentinformation` (
  `ApartmentID` int(11) DEFAULT NULL,
  `NumberOfRooms` int(11) DEFAULT NULL,
  `PricingPerMonth` double DEFAULT NULL,
  `BedCapacity` int(11) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `NearbySpaces` varchar(255) DEFAULT NULL,
  `ServicesOffered` varchar(255) DEFAULT NULL,
  `Photos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatID` int(11) NOT NULL,
  `Sender` varchar(50) DEFAULT NULL,
  `Receiver` varchar(50) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `DATEE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discountandpromos`
--

CREATE TABLE `discountandpromos` (
  `PromoCodes` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Discount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `SenderID` int(11) NOT NULL,
  `AddressedTo` int(11) DEFAULT NULL,
  `Stars` int(10) DEFAULT NULL,
  `FeedbackBody` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rulesandregulations`
--

CREATE TABLE `rulesandregulations` (
  `ApartmentID` int(255) DEFAULT NULL,
  `DOS` varchar(255) DEFAULT NULL,
  `DONTS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `TenantID` int(11) DEFAULT NULL,
  `OwnerID` int(11) DEFAULT NULL,
  `TotalAmounttendered` double DEFAULT NULL,
  `TransactionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(255) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Acct_Type` varchar(10) DEFAULT NULL,
  `Acct_Status` varchar(10) DEFAULT NULL,
  `Gender` varchar(5) DEFAULT NULL,
  `PhoneNumber` bigint(20) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ApartmentID`),
  ADD KEY `OwnersUserID` (`OwnersUserID`);

--
-- Indexes for table `apartmentinformation`
--
ALTER TABLE `apartmentinformation`
  ADD KEY `ApartmentID` (`ApartmentID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`);

--
-- Indexes for table `discountandpromos`
--
ALTER TABLE `discountandpromos`
  ADD PRIMARY KEY (`PromoCodes`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`SenderID`),
  ADD KEY `AddressedTo` (`AddressedTo`);

--
-- Indexes for table `rulesandregulations`
--
ALTER TABLE `rulesandregulations`
  ADD KEY `ApartmentID` (`ApartmentID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `TenantID` (`TenantID`),
  ADD KEY `OwnerID` (`OwnerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`OwnersUserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `apartmentinformation`
--
ALTER TABLE `apartmentinformation`
  ADD CONSTRAINT `apartmentinformation_ibfk_1` FOREIGN KEY (`ApartmentID`) REFERENCES `apartment` (`ApartmentID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`AddressedTo`) REFERENCES `apartment` (`ApartmentID`);

--
-- Constraints for table `rulesandregulations`
--
ALTER TABLE `rulesandregulations`
  ADD CONSTRAINT `rulesandregulations_ibfk_1` FOREIGN KEY (`ApartmentID`) REFERENCES `apartment` (`ApartmentID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`OwnerID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
