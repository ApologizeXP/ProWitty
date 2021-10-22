-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 08:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `idcar` int(11) NOT NULL,
  `imagecar` varchar(255) NOT NULL,
  `carname` varchar(255) NOT NULL,
  `detials` varchar(255) NOT NULL,
  `numcar` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `idusers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`idcar`, `imagecar`, `carname`, `detials`, `numcar`, `status`, `idusers`) VALUES
(1, 'Orange_Lamborghini_Aventador_on_HRE_Wheels_(12167671043).jpg', 'ลัมบอร์กีนี อาเวนทาดอร์', 'ขนาด: ยาว 4,943 มม. x กว้าง 2,098 มม. x สูง 1,136 มม. น้ำหนักรถเปล่า: 1,575 kg กำลังสูงสุด: 770 แรงม้า ความจุถังน้ำมันเชื้อเพลิง: 85 ล. เครื่องยนต์: 6.5 ล. V12', 'กด 123', 'S', 1),
(2, '350ed160-lhe-3.jpg', 'ลัมบอร์กีนี ฮูราคาน', 'อัตราเร่งจาก 0-100 กม./ชม. ในเวลาเพียง 2.9 วินาที อัตราเร่งจาก 0-200 กม./ชม. ภายใน 9 วินาที  ทำความเร็วสูงสุดได้มากกว่า 325 กม./ชม. ', 'กห 145', 'P', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hiscar`
--

CREATE TABLE `hiscar` (
  `idhiscar` int(11) NOT NULL,
  `dateday` varchar(255) NOT NULL,
  `pickdate` varchar(255) NOT NULL,
  `manyday` varchar(255) NOT NULL,
  `statuspay` varchar(1) NOT NULL,
  `idcar` int(11) NOT NULL,
  `idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiscar`
--

INSERT INTO `hiscar` (`idhiscar`, `dateday`, `pickdate`, `manyday`, `statuspay`, `idcar`, `idusers`) VALUES
(1, '2021-10-22', '2021-10-25', '2', 'N', 2, 1),
(2, '2021-10-22', '2021-10-27', '3', 'Y', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `idcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `usergroup` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `fullname`, `address`, `idcode`, `email`, `username`, `passwd`, `usergroup`) VALUES
(1, 'dfdfsdafa', 'fdasdafas', '1111111111111', 'sss@gmail.com', 'pond', '202cb962ac59075b964b07152d234b70', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `hiscar`
--
ALTER TABLE `hiscar`
  ADD PRIMARY KEY (`idhiscar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hiscar`
--
ALTER TABLE `hiscar`
  MODIFY `idhiscar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
