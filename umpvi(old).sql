-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 01:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'umpvi'
--

-- ------------------------

-- 
-- Table structure for table 'user'
--

CREATE TABLE IF NOT EXISTS 'user' ('USER_ID' int(11) NOT NULL AUTO_INCREMENT,
    'USER_NAME' varchar(50) NOT NULL,
    'USER_MATRIC' varchar(10) NOT NULL,
    'USER_EMAIL' varchar(100) NOT NULL,
    'USER_PASSWORD' varchar(20) NOT NULL,
    'USER_PHONE' varchar(20) NOT NULL,
    'USER_DEPT' varchar(10) NOT NULL,
    PRIMARY KEY ('USER_ID')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'user'
--

INSERT INTO 'user' ('USER_ID', 'USER_NAME', 'USER_MATRIC', 'USER_EMAIL', 'USER_PASSWORD', 'USER_PHONE', 'USER_DEPT') VALUES 
(2, 'MOHD ELFARIZ BIN MOHD IRFAN', 'CA17005', 'elfariz@yahoo.com.my', 'elfariz123', '0109351963', 'FKOM'),
(3, 'MUHAMMAD HILMI BIN ALI', 'CA17009', 'javier.hilmi@gmail.com', 'hilmikurus', '0194324455', 'FKOM'),
(4, 'MUHAMMAD KHAIRI AFIFI BIN ABD RAZAK', 'CA17118', 'afifi_khairi@gmail.com', 'afifi456', '0125674443', 'FKKSA'),
(5, 'MOHD RAFI RIFFLI BIN RAFIZAL', 'CA17023', 'rafi@gmail.com', 'rafi789', '0198732233', 'FIST'),
(6, 'MUHAMMAD TALHAH BIN MOHAMED NASIR', 'CA17008', 'stole14@gmail.com', 'stole14', '0183332256', 'FKOM');

-- 
-- Table structure for table 'vehicle'
--

CREATE TABLE 'vehicle' ( 
    'VEHICLE_ID' int(11) NOT NULL,
    'VEHICLE_PLATE' varchar(100) NOT NULL,
    'VEHICLE_TYPE' varchar(20) NOT NULL,
    'VEHICLE_BRAND' varchar(100) NOT NULL,
    'VEHICLE_COLOR' varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table 'vehicle'
--

INSERT INTO 'vehicle' ('VEHICLE_ID', 'VEHICLE_PLATE', 'VEHICLE_TYPE', 'VEHICLE_BRAND', 'VEHICLE_COLOR') VALUES 
(2, 'WVX3782', 'CAR', 'PERODUA MYVI', 'PURPLE'),
(3, 'ST3226U', 'CAR', 'PERODUA ALZA', 'WHITE'),
(4, 'VEB9144', 'CAR', 'PROTON SAGA', 'SILVER'),
(5, 'TBF6196', 'MOTORCYCLE', 'HONDA EX5', 'RED');

--
-- Table structure for table `fileupload` 
--

CREATE TABLE 'fileupload' (
    'ID' int(11) NOT NULL,
    'FILENAME' varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    'UPLOADEDON' datetime NOT NULL,
    'STATUS' enum('1', '0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

--
-- Table structure for table 'admin'
--

CREATE TABLE 'admin' (
    'ADMIN_ID' int(11) NOT NULL,
    'USERNAME' varchar(100) NOT NULL,
    'PASSWORD' varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table 'admin'
--

INSERT INTO 'admin' ('ADMIN_ID', 'USERNAME', 'PASSWORD') VALUES 
(1, 'azam', 'azam123');

--
-- Table structure for table 'sticker'
--

CREATE TABLE 'sticker' (
    'STICKER_ID' int(11) NOT NULL,
    'USER_ID' varchar(255) NOT NULL,
    'USER_MATRIC' varchar(10) NOT NULL,
    'VEHICLE_ID' varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table 'sticker'
--

INSERT INTO 'sticker' ('STICKER_ID', 'USER_ID', 'USER_MATRIC', 'VEHICLE_ID') VALUES 
(2, '2', 'CA17005', '2'),
(3, '3', 'CA17009', '3');

--
-- Table structure for table 'points'
--

CREATE TABLE 'points' (
    'POINT_ID' int(11) NOT NULL,
    'POINT_TOTAL' int(10) NOT NULL,
    'POINT_DETAIL' varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table 'points'
--

INSERT INTO 'points' ('POINT_ID', 'POINT_TOTAL', 'POINT_DETAIL') VALUES 
(1, 500, 'Cause accident'),
(2, 400, 'Parking violation'),
(3, 300, 'No sticker displayed'),
(4, 200, 'Not wearing seat belt or helmet');

--
-- Table structure for table 'penalty'
--

CREATE TABLE 'penalty' (
    'PENALTY_ID' int(11) NOT NULL AUTO_INCREMENT,
    'STICKER_ID' int(10) NOT NULL,
    'VEHICLE_PLATE' varchar(100) NOT NULL,
    'PENALTY_TIME' datetime NOT NULL,
    'PENALTY_DETAILS' varchar(200) NOT NULL,
    'POINT_ID' int(11) NOT NULL,
    PRIMARY KEY ('PENALTY_ID')
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Indexes for table 'admin'
--

ALTER TABLE 'admin'
    ADD PRIMARY KEY ('ADMIN_ID');

--
-- Indexes for table 'vehicle'
--

ALTER TABLE 'vehicle'
    ADD PRIMARY KEY ('VEHICLE_ID');

--
-- Indexes for table 'points'
--

ALTER TABLE 'points'
    ADD PRIMARY KEY ('POINT_ID');

--
-- Indexes for table 'sticker'
--
ALTER TABLE 'sticker'
    ADD PRIMARY KEY ('STICKER_ID');

-- 
-- Indexes for table 'fileupload'
--
ALTER TABLE 'fileupload'
    ADD PRIMARY KEY ('ID');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table 'user'
-- 
ALTER TABLE 'user'
    MODIFY 'USER_ID' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table 'vehicle'
--
ALTER TABLE 'vehicle'
    MODIFY 'VEHICLE_ID' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table 'fileupload'
--
ALTER TABLE 'fileupload'
    MODIFY 'ID' int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table 'admin'
--
ALTER TABLE 'admin'
    MODIFY 'ADMIN_ID' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table 'sticker'
--
ALTER TABLE 'sticker'
    MODIFY 'STICKER_ID' int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;