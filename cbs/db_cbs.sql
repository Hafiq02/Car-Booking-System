-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `b_id` int(11) NOT NULL,
  `b_customer` varchar(15) NOT NULL,
  `b_vehicle` varchar(10) NOT NULL,
  `b_pdate` date NOT NULL,
  `b_rdate` date NOT NULL,
  `b_total` float NOT NULL,
  `b_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`b_id`, `b_customer`, `b_vehicle`, `b_pdate`, `b_rdate`, `b_total`, `b_status`) VALUES
(14, '1', 'WVR2222', '2022-11-29', '2022-12-02', 1200, 1),
(15, '1', 'KTR3333', '2023-02-27', '2023-02-28', 100, 2),
(16, '13', 'JVr1111', '2022-12-13', '2022-12-15', 400, 2),
(17, '14', 'WVR2222', '2022-12-16', '2022-12-19', 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(5) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'Received'),
(2, 'Approved'),
(3, 'Rejected'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_id` varchar(15) NOT NULL,
  `u_pwd` varchar(50) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_address` varchar(200) DEFAULT NULL,
  `u_phone` varchar(20) NOT NULL,
  `u_lno` varchar(20) NOT NULL,
  `u_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_id`, `u_pwd`, `u_name`, `u_address`, `u_phone`, `u_lno`, `u_type`) VALUES
('	 02050915003', 'sdadsdasd', '', '', '', '', '2'),
('001', '1234', 'f', 'f', '0167819901', '02033410011', '2'),
('002', '1234', 'fa', 'fa', '0167819902', '03033410012', '2'),
('020509150035', 'hafiq09052002', 'merjack', 'eswrdtfyguhijokp,l', '01133623392', '214365780', '2'),
('1', '1', 'hasan', '1', '1', '1', '2'),
('12', '12', '12', '12', '12', '12', '1'),
('13', '13', 'mikhail', '13', '13', '13', '2'),
('14', '14', 'adam', '14', '14', '14', '2'),
('hello', 'daw', 'dwa', 'da', 'dwa', 'daw', '2'),
('w21e1', '31312', 'kassim', 'awdadwad', 'adwd', 'addwda', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertype`
--

CREATE TABLE `tb_usertype` (
  `ut_id` varchar(5) NOT NULL,
  `ut_desc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usertype`
--

INSERT INTO `tb_usertype` (`ut_id`, `ut_desc`) VALUES
('1', 'Admin'),
('2', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `v_reg` varchar(10) NOT NULL,
  `v_type` varchar(10) NOT NULL,
  `v_model` varchar(15) NOT NULL,
  `v_year` int(4) NOT NULL,
  `v_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`v_reg`, `v_type`, `v_model`, `v_year`, `v_price`) VALUES
('JVr1111', 'SUV', 'Proton X70', 2020, 200),
('KTR3333', 'SEDAN', 'Perodua Bezza', 2022, 100),
('WVR2222', 'SEDAN', 'Honda Civic', 2020, 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `book_cust` (`b_customer`,`b_vehicle`),
  ADD KEY `book_veh` (`b_vehicle`),
  ADD KEY `book_cust_2` (`b_customer`),
  ADD KEY `b_status` (`b_status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_type` (`u_type`);

--
-- Indexes for table `tb_usertype`
--
ALTER TABLE `tb_usertype`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`v_reg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`b_customer`) REFERENCES `tb_user` (`u_id`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`b_vehicle`) REFERENCES `tb_vehicle` (`v_reg`),
  ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`b_status`) REFERENCES `tb_status` (`s_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`u_type`) REFERENCES `tb_usertype` (`ut_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
