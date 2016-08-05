-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 06:22 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE `accesslevel` (
  `code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `process` varchar(45) CHARACTER SET latin1 NOT NULL,
  `uifieldname` varchar(45) CHARACTER SET latin1 NOT NULL,
  `uri` varchar(45) CHARACTER SET latin1 NOT NULL,
  `icon` varchar(45) CHARACTER SET latin1 NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`code`, `process`, `uifieldname`, `uri`, `icon`, `company_id`) VALUES
('company', 'maintenance', 'Company/Branches', '/company', 'fa-hospital-o', 1),
('leasecontract', 'reports', 'Lease Contract', '/leasecontract.pdf', 'fa-file-pdf-o', 1),
('reservationcontract', 'reports', 'Reservation Contract', '/reservationcontract.pdf', 'fa-file-pdf-o', 1),
('users', 'maintenance', 'Users', '/users', 'fa-user-plus', 1),
('usertypes', 'maintenance', 'UserTypes', '/usertypes', 'fa-sitemap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `parent`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Main Company', NULL, 'Main Company', NULL, NULL),
(2, 'Branch Company', 1, 'Branch Company', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `token` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(45) CHARACTER SET latin1 DEFAULT 'active' COMMENT 'active\npending change password\nlocked/blocked',
  `ipaddress` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `usertype_code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `remember_token` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `company_id`, `username`, `password`, `token`, `status`, `ipaddress`, `email`, `usertype_code`, `remember_token`, `name`) VALUES
(1, '2016-07-01', NULL, 1, 'admin', '$2y$10$u.o/liIenLFutGey62RoPOTpBEVCeuvIzppOzuq9/P1Ubwjy7DYf6', NULL, 'active', NULL, 'abrenicamarkjoshua@gmail.com', 'admin', NULL, 'AR Talag');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'describe the responsibility',
  `company_id` int(11) NOT NULL,
  `desc` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`code`, `notes`, `company_id`, `desc`, `created_at`, `updated_at`) VALUES
('admin', NULL, 1, 'admin', '2016-01-01 06:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertypeaccesslevel`
--

CREATE TABLE `usertypeaccesslevel` (
  `id` int(11) NOT NULL,
  `UserType_code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Company_id` int(11) NOT NULL,
  `enabled` tinyint(1) DEFAULT '0',
  `AccessLevel_code` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypeaccesslevel`
--

INSERT INTO `usertypeaccesslevel` (`id`, `UserType_code`, `Company_id`, `enabled`, `AccessLevel_code`) VALUES
(54, 'admin', 1, 1, 'company'),
(55, 'admin', 1, 1, 'usertypes'),
(56, 'admin', 1, 1, 'users'),
(57, 'admin', 1, 1, 'leasecontract'),
(58, 'admin', 1, 1, 'reservationcontract');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`code`,`company_id`),
  ADD KEY `fk_AccessLevel_Company1_idx` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`company_id`),
  ADD KEY `fk_Users_company1_idx` (`company_id`),
  ADD KEY `fk_Users_UserType1_idx` (`usertype_code`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`code`,`company_id`),
  ADD KEY `fk_UserType_company1_idx` (`company_id`);

--
-- Indexes for table `usertypeaccesslevel`
--
ALTER TABLE `usertypeaccesslevel`
  ADD PRIMARY KEY (`id`,`Company_id`),
  ADD KEY `fk_UserTypeAccessLevel_UserType1_idx` (`UserType_code`),
  ADD KEY `fk_UserTypeAccessLevel_Company1_idx` (`Company_id`),
  ADD KEY `fk_UserTypeAccessLevel_AccessLevel1_idx` (`AccessLevel_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertypeaccesslevel`
--
ALTER TABLE `usertypeaccesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD CONSTRAINT `fk_AccessLevel_Company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_UserType1` FOREIGN KEY (`usertype_code`) REFERENCES `usertype` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Users_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `fk_UserType_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usertypeaccesslevel`
--
ALTER TABLE `usertypeaccesslevel`
  ADD CONSTRAINT `fk_UserTypeAccessLevel_AccessLevel1` FOREIGN KEY (`AccessLevel_code`) REFERENCES `accesslevel` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UserTypeAccessLevel_Company1` FOREIGN KEY (`Company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UserTypeAccessLevel_UserType1` FOREIGN KEY (`UserType_code`) REFERENCES `usertype` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
