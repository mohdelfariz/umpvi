-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 01:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umpvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'AZAM', 'azam123');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `ID` int(11) NOT NULL,
  `FILENAME` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UPLOADEDON` datetime NOT NULL,
  `STATUS` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `PENALTY_ID` int(11) NOT NULL,
  `STICKER_ID` varchar(20) NOT NULL,
  `USER_MATRIC` varchar(20) NOT NULL,
  `VEHICLE_PLATE` varchar(100) NOT NULL,
  `PENALTY_TIME` time NOT NULL,
  `PENALTY_DATE` date NOT NULL,
  `PENALTY_DETAILS` varchar(200) NOT NULL,
  `POINT_ID` int(11) NOT NULL,
  `PENALTY_STATUS` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`PENALTY_ID`, `STICKER_ID`, `USER_MATRIC`, `VEHICLE_PLATE`, `PENALTY_TIME`, `PENALTY_DATE`, `PENALTY_DETAILS`, `POINT_ID`, `PENALTY_STATUS`) VALUES
(3, 'CA17005-ST3226U', '', 'ST3226U', '23:47:00', '2020-07-28', 'Parking violation', 400, '1'),
(4, 'CA17009-WVX3782', '', 'WVX3782', '23:59:00', '2020-07-28', 'Cause accident', 500, '1'),
(5, 'CA17005-ST3226U', 'CA17005', 'ST3226U', '00:26:00', '2020-07-29', 'Parking violation', 400, '1'),
(6, 'CA17009-WVX3782', 'CA17009', 'WVX3782', '00:46:00', '2020-07-29', 'Parking violation', 400, '1'),
(7, 'CA17008-VEB9144', 'CA17008', 'VEB9144', '00:49:00', '2020-07-29', 'Cause accident', 500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `POINT_ID` int(11) NOT NULL,
  `POINT_TOTAL` int(11) NOT NULL,
  `POINT_DETAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`POINT_ID`, `POINT_TOTAL`, `POINT_DETAIL`) VALUES
(1, 500, 'Cause Accident'),
(2, 400, 'Parking violation'),
(3, 300, 'No sticker displayed'),
(4, 200, 'Not wearing seat belt or helmet');

-- --------------------------------------------------------

--
-- Table structure for table `sticker`
--

CREATE TABLE `sticker` (
  `STICKER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_MATRIC` varchar(10) NOT NULL,
  `VEHICLE_PLATE` varchar(20) NOT NULL,
  `VEHICLE_TYPE` varchar(20) NOT NULL,
  `STATUS` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_MATRIC` varchar(10) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(20) NOT NULL,
  `USER_PHONE` varchar(20) NOT NULL,
  `USER_DEPT` varchar(10) NOT NULL,
  `USER_POINT` int(11) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_MATRIC`, `USER_EMAIL`, `USER_PASSWORD`, `USER_PHONE`, `USER_DEPT`, `USER_POINT`) VALUES
(2, 'MUHAMMAD HILMI BIN ALI', 'CA17009', 'javier.hilmi@gmail.com', 'hilmikurus', '0198876622', 'FKOM', 600),
(3, 'MUHAMMAD KHAIRI AFIFI BIN ABD RAZAK', 'CA17118', 'afifi_khairi@gmail.com', 'fifi456', '0123324455', 'FIST', 1000),
(4, 'MOHD RAFI RIFFLI BIN RAFIZAL', 'CA17023', 'rafi@gmail.com', 'rafi789', '0134456644', 'FKKSA', 1000),
(6, 'AHMAD ZAKI BIN HAMADI', 'KA16732', 'superzaki@facebook.com', 'zaki123', '0123323322', 'FTEK', 1000),
(7, 'MUHAMMAD TALHAH BIN MOHAMED NASIR', 'CA17008', 'stole14@gmail.com', 'stole14', '0187652322', 'FIM', 500),
(9, 'MUHAMMAD SYAFIQ BIN ABAS', 'CA17121', 'syafiq.abas@gmail.com', 'syafiq789', '0197886655', 'UMPH', 1000),
(10, 'MOHD ELFARIZ BIN MOHD IRFAN', 'CA17005', 'elfariz@yahoo.com.my', 'elfariz123', '0109351963', 'FKOM', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VEHICLE_ID` int(11) NOT NULL,
  `VEHICLE_PLATE` varchar(100) NOT NULL,
  `VEHICLE_TYPE` varchar(20) NOT NULL,
  `VEHICLE_BRAND` varchar(100) NOT NULL,
  `VEHICLE_COLOR` varchar(100) NOT NULL,
  `VEHICLE_STATUS` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VEHICLE_ID`, `VEHICLE_PLATE`, `VEHICLE_TYPE`, `VEHICLE_BRAND`, `VEHICLE_COLOR`, `VEHICLE_STATUS`) VALUES
(2, 'ST3226U', 'CAR', 'PERODUA', 'WHITE', '1'),
(3, 'VEB9144', 'CAR', 'PROTON SAGA', 'SILVER', '1'),
(4, 'TBF6196', 'MOTORCYCLE', 'HONDA EX5', 'RED', '1'),
(5, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE', '1'),
(6, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE', '1'),
(7, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE', '1'),
(8, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE', '1'),
(9, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE', '1'),
(10, 'ST3522K', 'MOTORCYCLE', 'HONDA WAVE', 'BLACK', '1'),
(11, 'ST3522L', 'MOTORCYCLE', 'HONDA EX5', 'BLACK', '0'),
(12, 'ST5667F', 'MOTORCYCLE', 'HONDA EX5', 'BLACK', '0'),
(13, 'ST5667T', 'MOTORCYCLE', 'YAMAHA Y15', 'BLACK', '0'),
(14, 'ST5667U', 'MOTORCYCLE', 'YAMAHA Y15', 'BLACK', '0'),
(15, 'TAG6627', 'CAR', 'PERODUA KELISA', 'ORANGE', '0'),
(16, 'ST5154L', 'MOTORCYCLE', 'HONDA EX5', 'BLUE', '0'),
(17, 'JND7835', 'CAR', 'PERODUA MYVI', 'YELLOW', '0'),
(18, 'ST7456R', 'CAR', 'TOYOTA AVANZA', 'WHITE', '0'),
(19, 'ST5667A', 'MOTORCYCLE', 'HONDA EX5', 'PURPLE', '0'),
(20, 'VEB5674', 'CAR', 'PROTON SAGA', 'SILVER', '1'),
(21, 'BEA6677', 'MOTORCYCLE', 'YAMAHA Y15', 'YELLOW', '0'),
(22, 'WQH7000', 'CAR', 'PERODUA VIVA', 'SILVER', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`PENALTY_ID`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`POINT_ID`);

--
-- Indexes for table `sticker`
--
ALTER TABLE `sticker`
  ADD PRIMARY KEY (`STICKER_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VEHICLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `PENALTY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `POINT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sticker`
--
ALTER TABLE `sticker`
  MODIFY `STICKER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VEHICLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
