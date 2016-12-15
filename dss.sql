-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 04:09 PM
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
  `code` varchar(45) NOT NULL,
  `process` varchar(45) NOT NULL,
  `uifieldname` varchar(45) NOT NULL,
  `uri` varchar(45) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`code`, `process`, `uifieldname`, `uri`, `icon`, `company_id`) VALUES
('company', 'maintenance', 'Company/Branches', '/company', 'fa-hospital-o', 1),
('documentitem', 'maintenance', 'Document Items', '/documentitem/list', 'fa-file-text-o', 1),
('enterreservationcontract', 'enter', 'Reservation Contract', '/reservationcontract/list', 'fa-file-text-o', 1),
('invoice', 'enter', 'Invoice', '/invoice/list', 'fa-file-text-o', 1),
('leasecontract', 'reports', 'Lease Contract', '/leasecontract.pdf', 'fa-file-pdf-o', 1),
('payment', 'enter', 'Payments', '/payment/list', 'fa-file-text-o', 1),
('percentpricing', 'maintenance', 'Percent Pricing settings', '/percentpricing', 'fa-file-text-o', 1),
('properties', 'enter', 'List of Properties', '/property/list', 'fa-building-o', 1),
('reservationcontract', 'reports', 'Reservation Contract', '/reservationcontract.pdf', 'fa-file-pdf-o', 1),
('tenant', 'enter', 'Tenants', '/tenant/list', 'fa-file-text-o', 1),
('units', 'enter', 'List of Units', '/units/list', 'fa-file-text-o', 1),
('unittype', 'maintenance', 'Unit Type', '/unittype/list', 'fa-file-text-o', 1),
('users', 'maintenance', 'Users', '/users', 'fa-user-plus', 1),
('usertypes', 'maintenance', 'User Types', '/usertypes', 'fa-sitemap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
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
-- Table structure for table `documentitem`
--

CREATE TABLE `documentitem` (
  `code` varchar(45) NOT NULL COMMENT 'LeaseBill\nWaterBil\nPenalty\nWTax\nVATax\nAdjustment\n',
  `desc` varchar(255) DEFAULT NULL,
  `defaultAmount` decimal(11,2) DEFAULT NULL,
  `vataxable` tinyint(1) DEFAULT NULL,
  `wtaxable` tinyint(1) DEFAULT NULL,
  `penalizable` varchar(45) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `systemVariable` tinyint(1) DEFAULT NULL COMMENT 'indicates if record is built-in in the system which means hard coded in other functionalities and therefore cannot be altered (updated) / deleted.\nor User defined, which it can be updated/ deleted.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentitem`
--

INSERT INTO `documentitem` (`code`, `desc`, `defaultAmount`, `vataxable`, `wtaxable`, `penalizable`, `company_id`, `created_at`, `updated_at`, `systemVariable`) VALUES
('Adjustment', 'Adjustment. Used for correction, credit or debit memo functionality. can be negative or positive', '0.00', 0, 0, '0', 1, NULL, NULL, 0),
('Adjustment2', 'Adjustment that can be penalized', '0.00', 0, 0, '1', 1, NULL, NULL, 0),
('CUSA', 'Common Use Service Area fee', '0.00', 0, 0, '0', 1, NULL, NULL, 0),
('Monthly Rental', 'Monthly Rental', '0.00', 1, 1, '1', 1, NULL, NULL, 1),
('Penalty', 'Penalty', '0.00', 0, 0, '1', 1, NULL, NULL, 1),
('Reservation fee', 'Reservation fee', '0.00', 0, 0, '1', 1, NULL, NULL, 0),
('VAT', 'Value Added Tax', '0.00', 0, 0, '0', 1, NULL, NULL, 1),
('W/H Tax', 'Withholding Tax', '0.00', 0, 0, '0', 1, NULL, NULL, 1),
('Water Bill', 'Water Bill', '0.00', 0, 0, '0', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `billingPeriodStart` date DEFAULT NULL,
  `billingPeriodEnd` date DEFAULT NULL,
  `status` varchar(45) NOT NULL COMMENT 'On Hold\nOpen\nClosed',
  `company_id` int(11) NOT NULL,
  `reservationcontract_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `issuedBy` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `payer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `id` int(11) NOT NULL,
  `documentItem_code` varchar(45) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoicepayments`
--

CREATE TABLE `invoicepayments` (
  `id` int(11) NOT NULL,
  `referencenumber` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `payments_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `paymentAmountForInvoice` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL COMMENT 'On Hold\nClosed\nOpen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `percentpricingvalues`
--

CREATE TABLE `percentpricingvalues` (
  `code` varchar(45) NOT NULL COMMENT 'vat\nwtax\npenalty',
  `desc` varchar(255) DEFAULT NULL,
  `percent` decimal(11,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `percentpricingvalues`
--

INSERT INTO `percentpricingvalues` (`code`, `desc`, `percent`, `created_at`, `updated_at`, `company_id`) VALUES
('Penalty', 'Penalty', '0.03', NULL, NULL, 1),
('VAT', 'Value Added Tax', '0.12', NULL, NULL, 1),
('W/H Tax', 'Withholding Tax', '0.05', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `desc`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'Promax Place', 'Makati City', 1, NULL, NULL),
(2, 'Marconi Place', 'Makati City', 1, NULL, NULL),
(3, 'Bautista', 'Makati City', 1, NULL, NULL),
(4, 'Grageda Bldg.', 'Paranaque', 1, NULL, NULL),
(5, 'Valuenzuela Bldg.', 'Las Pinas', 1, NULL, NULL),
(6, 'ACR APT./ACR COMM./ACR RES./ RESIDENTIALS', 'LAS PINAS/MAKATI/ALABANG', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservationcontract`
--

CREATE TABLE `reservationcontract` (
  `id` int(11) NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `noOfDeposits` int(11) DEFAULT NULL,
  `noOfAdvance` int(11) DEFAULT NULL,
  `totalDepositAmt` decimal(11,2) DEFAULT NULL,
  `unitBasicRent` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `whtax` decimal(11,2) DEFAULT NULL,
  `lgwhtax` decimal(11,2) DEFAULT NULL,
  `unittotalrent` decimal(11,2) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `employersname` varchar(255) DEFAULT NULL,
  `businessname` varchar(255) DEFAULT NULL,
  `natureofbusiness` varchar(255) DEFAULT NULL,
  `reservationfee` decimal(11,2) DEFAULT NULL,
  `bankcheckno` varchar(45) DEFAULT NULL,
  `termoflease` varchar(45) DEFAULT NULL,
  `civilstatus` varchar(45) DEFAULT NULL,
  `unitnumber` varchar(45) NOT NULL,
  `tenants_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Active' COMMENT 'Draft\nActive\nEnd of Contract\nCancelled client\nTermination',
  `latestBillingDueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservationcontract`
--

INSERT INTO `reservationcontract` (`id`, `startdate`, `enddate`, `noOfDeposits`, `noOfAdvance`, `totalDepositAmt`, `unitBasicRent`, `vat`, `whtax`, `lgwhtax`, `unittotalrent`, `company_id`, `property_id`, `created_at`, `updated_at`, `employersname`, `businessname`, `natureofbusiness`, `reservationfee`, `bankcheckno`, `termoflease`, `civilstatus`, `unitnumber`, `tenants_id`, `status`, `latestBillingDueDate`) VALUES
(1, '2015-01-01', '2017-01-01', 3, 1, '510000.00', '26259.23', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'John Michael', 'LowPing Computershop', 'computer rental', '26259.23', 'abcd1234', 'monthly', NULL, '1717A', 1, 'Draft', NULL),
(2, '2015-01-01', '2016-11-01', 3, 1, '510000.00', '26259.23', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'Silvester Stallon', 'SilverHiring Manpower Agency', 'Service', '26259.23', 'abcd1234', 'monthly', NULL, '1716b', 1, 'End of Contract', NULL),
(3, '2016-01-01', '2019-01-01', 3, 1, '510000.00', '26259.23', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 'dexter salon', 'Dual Dexterity Salon', 'Service', '26259.23', 'abcd1234', 'monthly', NULL, '1716b', 2, 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `tenantname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telno` varchar(45) DEFAULT NULL,
  `mobileno` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `civilstatus` varchar(45) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `tenantname`, `address`, `telno`, `mobileno`, `occupation`, `civilstatus`, `company_id`, `created_at`, `updated_at`, `lastname`, `firstname`, `dateofbirth`, `middlename`) VALUES
(1, 'AR Talag', 'Quezon City', '123-4567', '09150001000', 'Lawyer', 'single', 1, NULL, NULL, 'Talag', 'Aurelio', NULL, 'R'),
(2, 'Jonny Jacobs', 'Quezon City', '123-4567', '09150001000', 'Mechanical Engineer', 'single', 1, NULL, NULL, 'Jacobs', 'Jonny', NULL, 'Qui');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `transactiontype` varchar(50) DEFAULT NULL COMMENT 'invoice\npayment',
  `transactionscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitCode` varchar(45) NOT NULL,
  `company_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unittype_unittype` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitCode`, `company_id`, `property_id`, `unittype_unittype`, `created_at`, `updated_at`) VALUES
('1716b', 1, 1, 'commercial', NULL, NULL),
('1717A', 1, 1, 'studio', NULL, NULL),
('201b', 1, 2, 'commercial', NULL, NULL),
('202', 1, 1, 'studio', NULL, NULL),
('202b', 1, 2, 'studio', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unittype`
--

CREATE TABLE `unittype` (
  `unittype` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unittype`
--

INSERT INTO `unittype` (`unittype`, `created_at`, `updated_at`, `company_id`) VALUES
('commercial', NULL, NULL, 1),
('studio', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'active' COMMENT 'active\npending change password\nlocked/blocked',
  `ipaddress` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `usertype_code` varchar(45) NOT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `company_id`, `username`, `password`, `token`, `status`, `ipaddress`, `email`, `usertype_code`, `remember_token`, `name`) VALUES
(1, '2016-12-06', NULL, 1, 'admin', '$2y$10$WCqQ0vNbpUIXF.LZod95ReRVsWQkNQevXGSPEwUoPMErKFe1F3c5.', NULL, 'active', NULL, 'talagrolandoaurelio@gmail.com', 'admin', NULL, 'AR Talag');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `code` varchar(45) NOT NULL,
  `notes` varchar(255) DEFAULT NULL COMMENT 'describe the responsibility',
  `company_id` int(11) NOT NULL,
  `desc` varchar(45) DEFAULT NULL,
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
  `UserType_code` varchar(45) NOT NULL,
  `Company_id` int(11) NOT NULL,
  `enabled` tinyint(1) DEFAULT '0',
  `AccessLevel_code` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `canadd` tinyint(1) DEFAULT NULL,
  `cansave` tinyint(1) DEFAULT NULL,
  `candelete` tinyint(1) DEFAULT NULL,
  `usertypeaccesslevelcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypeaccesslevel`
--

INSERT INTO `usertypeaccesslevel` (`id`, `UserType_code`, `Company_id`, `enabled`, `AccessLevel_code`, `created_at`, `updated_at`, `canadd`, `cansave`, `candelete`, `usertypeaccesslevelcol`) VALUES
(348, 'admin', 1, 1, 'company', NULL, NULL, 1, 1, 1, NULL),
(349, 'admin', 1, 1, 'usertypes', NULL, NULL, 1, 1, 1, NULL),
(350, 'admin', 1, 1, 'users', NULL, NULL, 1, 1, 1, NULL),
(351, 'admin', 1, 1, 'leasecontract', NULL, NULL, 1, 1, 1, NULL),
(352, 'admin', 1, 1, 'reservationcontract', NULL, NULL, 1, 1, 1, NULL),
(353, 'admin', 1, 1, 'properties', NULL, NULL, 1, 1, 1, NULL),
(354, 'admin', 1, 1, 'enterreservationcontract', NULL, NULL, 1, 1, 1, NULL),
(355, 'admin', 1, 1, 'unittype', NULL, NULL, 1, 1, 1, NULL),
(356, 'admin', 1, 1, 'units', NULL, NULL, 1, 1, 1, NULL),
(357, 'admin', 1, 1, 'tenant', NULL, NULL, 1, 1, 1, NULL),
(358, 'admin', 1, 1, 'invoice', NULL, NULL, 1, 1, 1, NULL),
(359, 'admin', 1, 1, 'payment', NULL, NULL, 1, 1, 1, NULL),
(360, 'admin', 1, 1, 'documentitem', NULL, NULL, 1, 1, 1, NULL),
(361, 'admin', 1, 1, 'percentpricing', NULL, NULL, 1, 1, 1, NULL);

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
-- Indexes for table `documentitem`
--
ALTER TABLE `documentitem`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_documentItem_company1_idx` (`company_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_company1_idx` (`company_id`),
  ADD KEY `fk_invoice_reservationcontract1_idx` (`reservationcontract_id`),
  ADD KEY `fk_invoice_tenants1_idx` (`payer_id`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoicedetails_company1_idx` (`company_id`),
  ADD KEY `fk_invoicedetails_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_invoicedetails_documentItem1_idx` (`documentItem_code`);

--
-- Indexes for table `invoicepayments`
--
ALTER TABLE `invoicepayments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_BatchPayments_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_BatchPayments_payments1_idx` (`payments_id`),
  ADD KEY `fk_invoicepayments_company1_idx` (`company_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_company1_idx` (`company_id`);

--
-- Indexes for table `percentpricingvalues`
--
ALTER TABLE `percentpricingvalues`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_percentPricingValues_company1_idx` (`company_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_branch_company1_idx` (`company_id`);

--
-- Indexes for table `reservationcontract`
--
ALTER TABLE `reservationcontract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tenants_company1_idx` (`company_id`),
  ADD KEY `fk_tenants_branch1_idx` (`property_id`),
  ADD KEY `fk_reservationcontract_unit1_idx` (`unitnumber`),
  ADD KEY `fk_reservationcontract_tenants1_idx` (`tenants_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`,`company_id`),
  ADD KEY `fk_tenants_company2_idx` (`company_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitCode`),
  ADD KEY `fk_units_company1_idx` (`company_id`),
  ADD KEY `fk_units_branch1_idx` (`property_id`),
  ADD KEY `fk_unit_unittype1_idx` (`unittype_unittype`);

--
-- Indexes for table `unittype`
--
ALTER TABLE `unittype`
  ADD PRIMARY KEY (`unittype`),
  ADD KEY `fk_unittype_company1_idx` (`company_id`);

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
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `invoicepayments`
--
ALTER TABLE `invoicepayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reservationcontract`
--
ALTER TABLE `reservationcontract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usertypeaccesslevel`
--
ALTER TABLE `usertypeaccesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD CONSTRAINT `fk_AccessLevel_Company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documentitem`
--
ALTER TABLE `documentitem`
  ADD CONSTRAINT `fk_documentItem_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_reservationcontract1` FOREIGN KEY (`reservationcontract_id`) REFERENCES `reservationcontract` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_tenants1` FOREIGN KEY (`payer_id`) REFERENCES `tenants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD CONSTRAINT `fk_invoicedetails_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoicedetails_documentItem1` FOREIGN KEY (`documentItem_code`) REFERENCES `documentitem` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoicedetails_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoicepayments`
--
ALTER TABLE `invoicepayments`
  ADD CONSTRAINT `fk_BatchPayments_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_BatchPayments_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoicepayments_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `percentpricingvalues`
--
ALTER TABLE `percentpricingvalues`
  ADD CONSTRAINT `fk_percentPricingValues_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `fk_branch_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservationcontract`
--
ALTER TABLE `reservationcontract`
  ADD CONSTRAINT `fk_reservationcontract_tenants1` FOREIGN KEY (`tenants_id`) REFERENCES `tenants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservationcontract_unit1` FOREIGN KEY (`unitnumber`) REFERENCES `unit` (`unitCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tenants_branch1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tenants_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `fk_tenants_company2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `fk_unit_unittype1` FOREIGN KEY (`unittype_unittype`) REFERENCES `unittype` (`unittype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_units_branch1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_units_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unittype`
--
ALTER TABLE `unittype`
  ADD CONSTRAINT `fk_unittype_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_UserType1` FOREIGN KEY (`usertype_code`) REFERENCES `usertype` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_UserTypeAccessLevel_UserType1` FOREIGN KEY (`UserType_code`) REFERENCES `usertype` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
