-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2024 at 11:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minaminksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `serviceid` int(11) DEFAULT NULL,
  `bookingdate` datetime DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `bookingtime` time DEFAULT NULL,
  `bookingstatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `userid`, `serviceid`, `bookingdate`, `createdat`, `message`, `bookingtime`, `bookingstatus`) VALUES
(34, 19, 1, '2024-08-17 00:00:00', '2024-08-01 20:42:53', 'fhvgjbknlm;', '20:45:00', 3),
(35, 19, 3, '2024-08-21 00:00:00', '2024-08-01 20:43:54', 'mhmmmmm', '20:48:00', 1),
(36, 22, 3, '2024-08-09 00:00:00', '2024-08-01 20:53:06', 'dfdgfhngj', '20:54:00', 3),
(37, 23, 1, '2024-08-23 00:00:00', '2024-08-01 20:57:45', 'v bnm,.', '23:58:00', 3),
(38, 19, 2, '2024-08-02 00:00:00', '2024-08-01 21:09:41', 'bnb m,', '21:11:00', 3),
(39, 19, 1, '2024-09-01 00:00:00', '2024-08-01 21:27:30', 'bhjk', '21:27:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bstatus`
--

CREATE TABLE `bstatus` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bstatus`
--

INSERT INTO `bstatus` (`status_id`, `status_name`) VALUES
(1, 'confirmed'),
(2, 'rejected'),
(3, 'unconfirmed');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceid` int(11) NOT NULL,
  `bookingid` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `paymentstatus` varchar(50) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'admin'),
(2, 'standard user');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceid` int(11) NOT NULL,
  `servicename` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `servicename`, `description`, `price`, `duration`) VALUES
(1, 'lash extension', 'full set of lash extensions', 50.00, 90),
(2, 'lash refill', 'refill of existing lash extensions', 30.00, 60),
(3, 'lash removal', 'safe removal of lash extensions', 20.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `password_confirmation` varchar(255) NOT NULL,
  `profilepicture` varchar(255) DEFAULT NULL,
  `roleid` int(11) DEFAULT 2,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `password`, `phonenumber`, `password_confirmation`, `profilepicture`, `roleid`, `createdat`) VALUES
(1, 'Paa Kwesi', 'Atobrah', 'pkatobrah1@gmail.com', '$2y$10$UYlOcDgWagDYxPWg6kcje.Oi.ZiwiVTZkuo2X17Gh2RESFFgMzlDi', '0555703705', 'Pa$$w0rd!', NULL, 1, '2024-07-30 15:23:02'),
(2, 'September', 'Livingston', 'juty@mailinator.com', '$2y$10$2rIQR2AoAD11qu.FzCF.WOCec2.kGQYi3lCtMKfnBFE2EIEf7JhrC', '0555703705', 'Pa$$w0rd!', NULL, 2, '2024-07-30 15:40:03'),
(3, 'Charles', 'Aman', 'wunywog@mailinator.com', '$2y$10$GNYj7B.znsVwL5PIrT/6ReVP/kxqRc6QMdZ57ZAyN5gzh0s.5cjZO', '0245562884', 'Pa$$w0rd!', NULL, 2, '2024-07-31 11:20:42'),
(4, 'Zephania', 'Chan', 'vyfovu@mailinator.com', '$2y$10$02nqO5a1UU2/TDlXmio1U.VdVmTe2CeGAFEUlmZlHIS5mrxt9Frgy', '0245612283', 'Chafapa', NULL, 2, '2024-07-31 11:22:21'),
(5, 'Ashton', 'Pena', 'negyhyzib@mailinator.com', '$2y$10$inO5qQgfqHYdg7EntFte4erAgO1cSyeUaNH0nSlnpGMe32hrhrv0q', '0244567643', 'Pa$$w0rd!', NULL, 2, '2024-07-31 12:13:37'),
(6, 'Boris', 'Barlow', 'pyzapodas@mailinator.com', '$2y$10$aDwCiHRtE.Dh/7GC2f7ZzeFpcSt.NMWGObEm5U51JPP6H2bKvGeZa', '0244567933', 'Pa$$w0rd!', NULL, 2, '2024-07-31 12:14:19'),
(7, 'Roanna', 'Navarro', 'default@example.com', '$2y$10$M/hxI3t1r0Yitg7s4GqQDOul288qyiUusvl5ATaGbw1fshy9dliQS', '0234567786', '$2y$10$M/hxI3t1r0Yitg7s4GqQDOul288qyiUusvl5ATaGbw1fshy9dliQS', NULL, 2, '2024-07-31 13:22:15'),
(9, 'Jamal', 'Emerson', 'user_17224322224137@example.com', '$2y$10$RwfmIVm9dWddzii5H0j2vO/Hip.0GtrNT8Gty4UnN3xXJWmnvC2z.', '02333333333', '$2y$10$RwfmIVm9dWddzii5H0j2vO/Hip.0GtrNT8Gty4UnN3xXJWmnvC2z.', NULL, 2, '2024-07-31 13:23:42'),
(10, 'Jamal', 'Emerson', 'user_17224324621937@example.com', '$2y$10$vjwamr7D2pCoIpythFZad.exkKC9iDXMCEeqGelkp2TJ4y/pfBMUS', '02333333333', '$2y$10$vjwamr7D2pCoIpythFZad.exkKC9iDXMCEeqGelkp2TJ4y/pfBMUS', NULL, 2, '2024-07-31 13:27:43'),
(11, 'Ferdinand', 'Tanner', 'user_17224324919024@example.com', '$2y$10$V7TnR3XLheEqmb4D7d9GrOB1JFrko9QCEWjJZhBbqcgRr8k4wqQHm', '0345556677', '$2y$10$V7TnR3XLheEqmb4D7d9GrOB1JFrko9QCEWjJZhBbqcgRr8k4wqQHm', NULL, 2, '2024-07-31 13:28:11'),
(12, 'Ferdinand', 'Tanner', 'user_17224325594613@example.com', '$2y$10$CRvNmpSCQ4uDNDAblfx/MeujYRXz8S9e/zLWv7mkQdazuMNGayjVm', '0345556677', '$2y$10$CRvNmpSCQ4uDNDAblfx/MeujYRXz8S9e/zLWv7mkQdazuMNGayjVm', NULL, 2, '2024-07-31 13:29:19'),
(13, 'Cyrus', 'Winters', 'user_17224325701705@example.com', '$2y$10$7F7yhgbf09rGodrdFWEZYueU.qknCdehTnOFuBbE6So.kRX8t/e32', '04567895', '$2y$10$7F7yhgbf09rGodrdFWEZYueU.qknCdehTnOFuBbE6So.kRX8t/e32', NULL, 2, '2024-07-31 13:29:30'),
(14, 'Jordan', 'Malone', 'user_17224446678057@example.com', '$2y$10$M8ITJ2lRmen7ruRvYXb8j..RaNpSVMHg6DZN.Oh9hWJK0OSCGg0Va', '0245675543', '$2y$10$M8ITJ2lRmen7ruRvYXb8j..RaNpSVMHg6DZN.Oh9hWJK0OSCGg0Va', NULL, 2, '2024-07-31 16:51:07'),
(15, 'Desirae', 'Stanton', 'user_17224449975605@example.com', '$2y$10$INNEWmCXiwnP88Vde0PQiuKemtVvfCXTwpwmPBKQ3ff3P4L5lwoJa', '0245675543', '$2y$10$INNEWmCXiwnP88Vde0PQiuKemtVvfCXTwpwmPBKQ3ff3P4L5lwoJa', NULL, 2, '2024-07-31 16:56:37'),
(16, 'Bianca', 'Lynn', 'user_17224452663229@example.com', '$2y$10$aLTKxrSEJqKRW7XMz.eITeru89fJsirUD2vlaaN3ku81vh7XPxZJO', '0245675543', '$2y$10$aLTKxrSEJqKRW7XMz.eITeru89fJsirUD2vlaaN3ku81vh7XPxZJO', NULL, 2, '2024-07-31 17:01:06'),
(17, 'Tyrone', 'Mckinney', 'user_17224453799525@example.com', '$2y$10$WK2OY8QyPolnKTmUoH9beepP1pCAVgNai5r9T6u0xnc7oVOAern82', '12345678', '$2y$10$WK2OY8QyPolnKTmUoH9beepP1pCAVgNai5r9T6u0xnc7oVOAern82', NULL, 2, '2024-07-31 17:02:59'),
(18, 'Xenos', 'Ingram', 'user_17224457004859@example.com', '$2y$10$yyet6kFyRnfh0bC4uM325.M5PAJKGwDtCDfQTTVxFlVWJHLGA7A0q', '12345678', '$2y$10$yyet6kFyRnfh0bC4uM325.M5PAJKGwDtCDfQTTVxFlVWJHLGA7A0q', NULL, 2, '2024-07-31 17:08:20'),
(19, 'Beryl', 'Bampoe', 'bberylminaadi@gmail.com', '$2y$10$ANJZ3vQwR1ajPOi1W55n0euaelPvQ6AgTr6YUFdy3tTLrNUVALdk.', '0505298278', 'Ad!oct14', NULL, 2, '2024-08-01 10:48:13'),
(20, 'Mikayla', 'Hayes', 'user_17225273088707@example.com', '$2y$10$RRwZNcUU/fvOgidDiV5Eqe.Jfk0gsuzdHgsRTIb3pARGUvL9Cmo52', '2345678956', '$2y$10$RRwZNcUU/fvOgidDiV5Eqe.Jfk0gsuzdHgsRTIb3pARGUvL9Cmo52', NULL, 2, '2024-08-01 15:48:28'),
(21, 'Britanni', 'Dawson', 'user_17225378765610@example.com', '$2y$10$zmbalj3ADT/4gLCdNAT7RuhOPO.qldcNYqua5h/fhv.XgtgGiL6rW', '0245675543', '$2y$10$zmbalj3ADT/4gLCdNAT7RuhOPO.qldcNYqua5h/fhv.XgtgGiL6rW', NULL, 2, '2024-08-01 18:44:36'),
(22, '1234', 'Price', 'user_17225455867082@example.com', '$2y$10$qFCvYVVDBt.i4gqYxtjW1.xOLbNEhzXdEnpNUVs8w5uzWVnLiTDoi', '0245675543', '$2y$10$qFCvYVVDBt.i4gqYxtjW1.xOLbNEhzXdEnpNUVs8w5uzWVnLiTDoi', NULL, 2, '2024-08-01 20:53:06'),
(23, 'Jordan', 'Navarro', 'user_17225458659564@example.com', '$2y$10$bCUIZgJeNui5CdNCiM/zXu4JrBzVKORnT5EbWXTmzTNsAEEk1n6kS', '0234567786', '$2y$10$bCUIZgJeNui5CdNCiM/zXu4JrBzVKORnT5EbWXTmzTNsAEEk1n6kS', NULL, 2, '2024-08-01 20:57:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `bookings_ibfk_3` (`bookingstatus`);

--
-- Indexes for table `bstatus`
--
ALTER TABLE `bstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceid`),
  ADD KEY `bookingid` (`bookingid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`),
  ADD UNIQUE KEY `rolename` (`rolename`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bstatus`
--
ALTER TABLE `bstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `services` (`serviceid`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`bookingstatus`) REFERENCES `bstatus` (`status_id`) ON DELETE SET NULL;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`bookingid`) REFERENCES `bookings` (`bookingid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `roles` (`roleid`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
