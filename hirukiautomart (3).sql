-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 08:08 AM
-- Server version: 8.0.16
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hirukiautomart`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `price` int(14) NOT NULL,
  `PreOderPrice` int(10) NOT NULL,
  `isAvailable` int(5) NOT NULL DEFAULT '1',
  `carYear` int(7) NOT NULL,
  `fuelType` varchar(20) NOT NULL,
  `milege` varchar(20) NOT NULL,
  `period` int(10) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `img2` varchar(250) NOT NULL,
  `img3` varchar(250) NOT NULL,
  `img4` varchar(250) NOT NULL,
  `disc` varchar(250) NOT NULL,
  `transmition` varchar(20) NOT NULL,
  `con` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `name`, `colour`, `brand`, `price`, `PreOderPrice`, `isAvailable`, `carYear`, `fuelType`, `milege`, `period`, `img1`, `img2`, `img3`, `img4`, `disc`, `transmition`, `con`) VALUES
(8, 'bmw 2019', 'white', 'bmw', 100000, 100, 1, 2019, 'petrol', '100', 14, 'wefwef', 'ewf', 'ewf', 'wef', 'wef', 'auto', 'used'),
(11, 'Audi A4', 'black', 'Audi', 1200000, 25000, 1, 2016, 'Petrol', '2000', 10, 'au1.jpg', 'a3.jpg', 'au2.jpg', 'au4.jpg', 'Audi A4', 'Auto', 'Used'),
(12, 'Audi A4', 'black', 'Audi', 1200000, 25000, 1, 2016, 'Petrol', '2000', 10, 'au2.jpg', 'a3.jpg', 'au2.jpg', 'au4.jpg', 'Audi A4', 'Auto', 'Used'),
(13, 'Toyota Allion', 'black', 'Toyota', 750000, 40000, 1, 2016, 'Petrol', '4000', 20, 'al1.jpg', 'al2.jpg', 'al3.jpg', 'al4.jpg', 'Toyota Allion', 'Manual', 'Used'),
(14, 'Toyota Prius', 'white', 'Toyota', 5000000, 30000, 1, 2018, 'Deisel', '2400', 20, 'pr1.jpg', 'pr2.jpg', 'pr3.jpg', 'pr4.jpg', 'Toyota Prius', 'Auto', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `carfullpayed`
--

CREATE TABLE `carfullpayed` (
  `fullID` int(20) NOT NULL,
  `custID` int(200) NOT NULL,
  `adminID` int(20) NOT NULL,
  `cName` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `timeStamp` varchar(100) NOT NULL,
  `aType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` int(10) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vkey` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debug`
--

CREATE TABLE `debug` (
  `t1` int(11) NOT NULL,
  `t2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expiredpreorders`
--

CREATE TABLE `expiredpreorders` (
  `expreID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `carID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `oderID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `partID` int(11) NOT NULL,
  `paymentID` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `isPaid` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `OwnID` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`OwnID`, `fname`, `lname`, `email`, `pass`, `address`, `phone`) VALUES
(1, 'sachith', 'sf', 'sachith@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TjYueWp6RlhRRTlST1JlcQ$/FEAJUzfYrjNu77FSWnrAx/QLCE1sFntkOcQL5JxNho', 'wrf weffew', 34545);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `partID` int(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `year` int(7) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `price` int(15) NOT NULL,
  `qty` int(10) NOT NULL,
  `disc` varchar(250) NOT NULL,
  `img1` varchar(300) NOT NULL,
  `img2` varchar(300) DEFAULT NULL,
  `img3` varchar(300) DEFAULT NULL,
  `img4` varchar(300) DEFAULT NULL,
  `con` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `payMethod` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `status_message` varchar(250) NOT NULL,
  `status_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preoder`
--

CREATE TABLE `preoder` (
  `preoderID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `paymentID` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `isPaid` int(5) NOT NULL DEFAULT '0',
  `fullPayDuration` int(5) NOT NULL DEFAULT '0',
  `daycounter` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `smanID` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `status` float NOT NULL DEFAULT '-1',
  `address` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  `NIC` varchar(25) NOT NULL,
  `vkey` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testdrive`
--

CREATE TABLE `testdrive` (
  `tdriveID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `tsID` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `timeSlot` varchar(100) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `licence` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testdrivedates`
--

CREATE TABLE `testdrivedates` (
  `dateID` int(11) NOT NULL,
  `date` date NOT NULL,
  `sl1` tinyint(1) NOT NULL DEFAULT '0',
  `sl2` tinyint(1) NOT NULL DEFAULT '0',
  `sl3` tinyint(1) NOT NULL DEFAULT '0',
  `sl4` tinyint(1) NOT NULL DEFAULT '0',
  `sl5` tinyint(1) NOT NULL DEFAULT '0',
  `sl6` tinyint(1) NOT NULL DEFAULT '0',
  `sl7` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);
ALTER TABLE `car` ADD FULLTEXT KEY `brand` (`brand`,`name`,`colour`);
ALTER TABLE `car` ADD FULLTEXT KEY `brand_2` (`brand`,`name`,`colour`,`fuelType`);
ALTER TABLE `car` ADD FULLTEXT KEY `brand_3` (`brand`,`name`,`disc`);

--
-- Indexes for table `carfullpayed`
--
ALTER TABLE `carfullpayed`
  ADD PRIMARY KEY (`fullID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `expiredpreorders`
--
ALTER TABLE `expiredpreorders`
  ADD PRIMARY KEY (`expreID`);

--
-- Indexes for table `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`oderID`),
  ADD KEY `partID` (`partID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`OwnID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`partID`);
ALTER TABLE `part` ADD FULLTEXT KEY `brand` (`brand`,`name`,`disc`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `preoder`
--
ALTER TABLE `preoder`
  ADD PRIMARY KEY (`preoderID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`smanID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `testdrive`
--
ALTER TABLE `testdrive`
  ADD PRIMARY KEY (`tdriveID`),
  ADD KEY `custID` (`custID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `testdrivedates`
--
ALTER TABLE `testdrivedates`
  ADD PRIMARY KEY (`dateID`),
  ADD UNIQUE KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `carfullpayed`
--
ALTER TABLE `carfullpayed`
  MODIFY `fullID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expiredpreorders`
--
ALTER TABLE `expiredpreorders`
  MODIFY `expreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oder`
--
ALTER TABLE `oder`
  MODIFY `oderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `OwnID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `partID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preoder`
--
ALTER TABLE `preoder`
  MODIFY `preoderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `smanID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testdrive`
--
ALTER TABLE `testdrive`
  MODIFY `tdriveID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testdrivedates`
--
ALTER TABLE `testdrivedates`
  MODIFY `dateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`partID`) REFERENCES `part` (`partID`);

--
-- Constraints for table `preoder`
--
ALTER TABLE `preoder`
  ADD CONSTRAINT `preoder_ibfk_1` FOREIGN KEY (`carID`) REFERENCES `car` (`carID`);

--
-- Constraints for table `testdrive`
--
ALTER TABLE `testdrive`
  ADD CONSTRAINT `testdrive_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `testdrive_ibfk_2` FOREIGN KEY (`carID`) REFERENCES `car` (`carID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
