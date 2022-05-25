-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 01:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shahcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowance_list`
--

CREATE TABLE `allowance_list` (
  `AllowanceListID` int(8) NOT NULL,
  `AllowanceTitle` varchar(75) DEFAULT NULL,
  `AllowanceCategory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance_list`
--

INSERT INTO `allowance_list` (`AllowanceListID`, `AllowanceTitle`, `AllowanceCategory`) VALUES
(3, 'Bonus/Comission1', 'Dr'),
(6, 'Medical', 'Dr'),
(7, 'Basic', 'Dr'),
(8, 'FCB', 'Cr'),
(9, 'Travel', 'Dr');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `EmployeeName` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Department` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CheckIN` datetime NOT NULL DEFAULT current_timestamp(),
  `CheckOUT` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `EmployeeID`, `EmployeeName`, `Department`, `Status`, `CheckIN`, `CheckOUT`, `created_at`, `updated_at`) VALUES
(711, 80, 'Mirza Adil', 'Finance', 'Present', '2022-04-30 14:32:47', NULL, NULL, NULL),
(712, 80, 'Mirza Adil', 'Finance', 'Present', '2022-05-02 12:59:03', NULL, NULL, NULL),
(713, 80, 'Mirza Adil', 'Finance', 'Present', '2022-05-06 09:35:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(10) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `uDate` datetime NOT NULL DEFAULT current_timestamp(),
  `eDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `PName`, `IsActive`, `uDate`, `eDate`) VALUES
(1, 'Totex', 1, '2022-04-14 10:43:56', '2022-04-05 10:43:56'),
(2, 'Dove', 1, '2022-04-12 10:44:50', '2022-04-20 10:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', NULL, 9, 1, '2018-05-12 03:27:25', '2019-03-01 15:07:21'),
(2, 'electronics', NULL, NULL, 1, '2018-05-12 03:35:57', '2019-03-01 15:07:21'),
(3, 'computer', '20200701093146.jpg', 2, 1, '2018-05-12 03:36:08', '2020-07-01 15:31:46'),
(4, 'toy', NULL, NULL, 1, '2018-05-23 22:57:48', '2019-03-01 15:09:27'),
(7, 'jacket', NULL, NULL, 0, '2018-05-27 22:39:51', '2018-05-27 22:40:48'),
(9, 'food', NULL, NULL, 1, '2018-06-25 01:21:40', '2018-09-03 03:41:28'),
(10, 'anda', NULL, NULL, 0, '2018-08-28 23:36:31', '2018-08-28 23:37:34'),
(11, 'anda', NULL, NULL, 0, '2018-08-28 23:48:06', '2018-08-28 23:53:22'),
(12, 'accessories', NULL, NULL, 1, '2018-12-04 23:28:53', '2019-04-10 04:17:03'),
(14, 'nn', NULL, NULL, 0, '2019-04-10 04:22:30', '2019-04-10 05:38:47'),
(15, 'nm', NULL, NULL, 0, '2019-04-10 04:22:36', '2019-04-10 05:41:43'),
(16, 'desktop', NULL, 3, 1, '2020-03-11 10:42:33', '2020-03-11 10:42:33'),
(17, 'tostos', '20200701080042.png', NULL, 0, '2020-07-01 14:00:42', '2020-07-01 15:35:34'),
(19, 'Paracetamol', NULL, NULL, 1, '2021-03-07 07:16:01', '2021-03-07 07:16:01'),
(20, 'Hair Care', NULL, NULL, 1, '2021-11-17 07:43:44', '2021-11-17 07:43:44'),
(21, '1231222', NULL, NULL, 1, '2022-01-07 05:50:45', '2022-01-07 05:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccount`
--

CREATE TABLE `chartofaccount` (
  `ChartOfAccountID` int(12) NOT NULL,
  `CODE` varchar(15) DEFAULT NULL,
  `ChartOfAccountName` varchar(75) DEFAULT NULL,
  `OpenDebit` int(12) DEFAULT NULL,
  `OpenCredit` int(12) DEFAULT NULL,
  `L1` int(10) DEFAULT NULL,
  `L2` int(10) DEFAULT NULL,
  `L3` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chartofaccount`
--

INSERT INTO `chartofaccount` (`ChartOfAccountID`, `CODE`, `ChartOfAccountName`, `OpenDebit`, `OpenCredit`, `L1`, `L2`, `L3`) VALUES
(100000, 'A', 'ASSETS', NULL, NULL, 100000, 100000, 100000),
(110000, 'A', 'CURRENT ASSETS', NULL, NULL, 100000, 110000, 110000),
(110100, 'A', 'CASH ACCOUNT', NULL, NULL, 100000, 110000, 110100),
(110101, 'A', 'CASH IN HAND', NULL, NULL, 100000, 110000, 110100),
(110200, 'A', 'BANK DEPOSITS', NULL, NULL, 100000, 110000, 110200),
(110201, 'A', 'ENBD BANK', NULL, NULL, 100000, 110000, 110200),
(110250, 'A', 'Credit Card ACCOUNT.', NULL, NULL, 100000, 110000, 110200),
(110300, 'A', 'JAYLIN PAY.', NULL, NULL, 100000, 110000, 110200),
(110305, 'A', '110300', NULL, NULL, 100000, 110305, 110300),
(110310, 'A', '110300', NULL, NULL, 100000, 110310, 110300),
(110400, 'A', 'A/C RECEIVABLE.', NULL, NULL, 100000, 110000, 110400),
(110401, 'A', 'PARTY A/C.', NULL, NULL, 100000, 110000, 110400),
(110402, 'A', 'OTHER RECEIVABLES', NULL, NULL, 100000, 110000, 110400),
(110420, 'A', 'STAFF ADVANCES.', NULL, NULL, 100000, 110000, 110400),
(110430, 'A', 'OTHER ADVANCES', NULL, NULL, 100000, 110000, 110400),
(110490, 'A', 'BAD DEBTS', NULL, NULL, 100000, 110000, 110400),
(110495, 'A', '000', NULL, NULL, 110400, 110495, 110495),
(110500, 'A', 'INVENTORY', NULL, NULL, 100000, 110000, 110500),
(110501, 'A', 'STOCK IN HAND', NULL, NULL, 100000, 110000, 110500),
(110600, 'A', 'MISC. ADJUSTMENTS', NULL, NULL, 100000, 110000, 110600),
(120000, 'A', 'FIXED ASSETS', NULL, NULL, 100000, 120000, 120000),
(120100, 'A', 'FIXED ASSETS', NULL, NULL, 100000, 120000, 120100),
(120125, 'A', 'VEHICLES', NULL, NULL, 100000, 120000, 120100),
(120127, 'A', 'PREMISES(SHOP)', NULL, NULL, 100000, 120000, 120100),
(120132, 'A', '120105', NULL, NULL, 100000, 120000, 120132),
(120137, 'A', '120100', NULL, NULL, 100000, 120000, 120100),
(120142, 'A', 'test', NULL, NULL, 100000, 120000, 120100),
(130000, 'A', 'OTHER ASSETS', NULL, NULL, 100000, 130000, 130000),
(130100, 'A', 'PREPAID EXPENSES', NULL, NULL, 100000, 130000, 130100),
(130200, 'A', 'LONG TERM INVESTMENTS', NULL, NULL, 100000, 130000, 130200),
(140000, 'A', 'DEFERRED ASSETS', NULL, NULL, 100000, 140000, 140000),
(140100, 'A', 'DEFERRED ASSETS', NULL, NULL, 100000, 140000, 140100),
(140200, 'A', 'DEPOSITS', NULL, NULL, 100000, 140000, 140200),
(140300, 'A', 'LEASEHOLD IMPROV.NET', NULL, NULL, 100000, 140000, 140300),
(150000, 'A', 'Asset Test 100000', NULL, NULL, 100000, 150000, 150000),
(170000, 'A', 'Asset 1', NULL, NULL, 100000, 170000, 170000),
(180000, 'A', 'Asset 1', NULL, NULL, 100000, 180000, 180000),
(190000, 'A', 'Asset 1', NULL, NULL, 100000, 190000, 190000),
(200000, 'L', 'LIABILITIES', NULL, NULL, 200000, 200000, 200000),
(210000, 'L', 'ACCOUNTS PAYABLE', NULL, NULL, 200000, 210000, 210000),
(210100, 'L', 'A/C PAYABLE', NULL, NULL, 200000, 210000, 210100),
(210101, 'L', 'ADVANCE PAYMENT', NULL, NULL, 200000, 210000, 210100),
(210102, 'L', 'OTHER PAYABLES', NULL, NULL, 200000, 210000, 210100),
(210103, 'L', 'BALANCE ADJUSTMENT', NULL, NULL, 200000, 210000, 210100),
(210300, 'L', 'TAX PAYABLES', NULL, NULL, 200000, 210000, 210300),
(210301, 'L', 'W/H TAX Deductions', NULL, NULL, 200000, 210000, 210300),
(210302, 'L', 'MARKETING COMMISSION PAYABLE.', NULL, NULL, 200000, 210000, 210300),
(210303, 'L', 'TAKAFAL PAYABLE.', NULL, NULL, 200000, 210000, 210300),
(210308, 'L', '200000, 210000, 210300', NULL, NULL, 200000, 210000, 210308),
(220000, 'L', 'SECURITIES', NULL, NULL, 200000, 220000, 220000),
(220100, 'L', 'SECURITIES', NULL, NULL, 200000, 220000, 220100),
(230000, 'L', '2 is testing', NULL, NULL, 200000, 230000, 230000),
(240000, 'L', '2 is testing', NULL, NULL, 200000, 240000, 240000),
(250000, 'L', '2 is testing', NULL, NULL, 200000, 250000, 250000),
(260000, 'L', '2 is testing', NULL, NULL, 200000, 260000, 260000),
(270000, 'L', '3 is', NULL, NULL, 200000, 270000, 270000),
(280000, 'L', 'asda', NULL, NULL, 200000, 280000, 280000),
(300000, 'C', 'STOCKHOLDERS EQUITY', NULL, NULL, 300000, 300000, 300000),
(310000, 'C', 'STOCKHOLDERS EQUITY', NULL, NULL, 300000, 310000, 310000),
(310100, 'C', 'CAPITAL STOCK.', NULL, NULL, 300000, 310000, 310100),
(310101, 'C', 'CAPITAL A/C.', NULL, NULL, 300000, 310000, 310100),
(310102, 'C', 'PROFIT AND LOSS A/C.', NULL, NULL, 300000, 310000, 310100),
(310103, 'C', 'CURRENT PERIOD PROF/LOSS.', NULL, NULL, 300000, 310000, 310100),
(310104, 'C', 'MUHAMMAD ASIM JAN', NULL, NULL, 300000, 310000, 310100),
(310105, 'C', 'MUHAMMAD FAISAL', NULL, NULL, 300000, 310000, 310100),
(320000, 'C', 'CAPITAL WITHDRAWALS', NULL, NULL, 300000, 320000, 320000),
(320100, 'C', 'CAPITAL WITHDRAWALS', NULL, NULL, 300000, 320000, 320100),
(330000, 'C', 'a', NULL, NULL, 300000, 330000, 330000),
(340000, 'C', 'a', NULL, NULL, 300000, 340000, 340000),
(350000, 'C', 'a', NULL, NULL, 300000, 350000, 350000),
(360000, 'C', 'a', NULL, NULL, 300000, 360000, 360000),
(370000, 'C', 'a', NULL, NULL, 300000, 370000, 370000),
(380000, 'C', 'desc', NULL, NULL, 300000, 380000, 380000),
(400000, 'R', 'REVENUES', NULL, NULL, 400000, 400000, 400000),
(410000, 'R', 'SALES:-', NULL, NULL, 400000, 410000, 410000),
(410100, 'R', 'SALES:-', NULL, NULL, 400000, 410000, 410100),
(410101, 'R', 'COMMISSION.', NULL, NULL, 400000, 410000, 410100),
(410150, 'R', 'SALE OF TICKET', NULL, NULL, 400000, 410000, 410100),
(410151, 'R', 'INCOME FROM REPAIR', NULL, NULL, 400000, 410000, 410100),
(410152, 'R', 'DISCOUNT RECEIVED', NULL, NULL, 400000, 410000, 410100),
(410155, 'R', 'SALES DISCOUNTS', NULL, NULL, 400000, 410000, 410100),
(410172, 'R', 'FREIGHT CHARGES', NULL, NULL, 400000, 410000, 410100),
(410173, 'R', 'INCOME SALE COMMISSION.', NULL, NULL, 400000, 410000, 410100),
(410175, 'R', 'SALE RETURNS.', NULL, NULL, 400000, 410000, 410100),
(410180, 'R', 'SALE RETURN DISCOUNT.', NULL, NULL, 400000, 410000, 410100),
(410185, 'R', 'SALE RETURN FREIGHT', NULL, NULL, 400000, 410000, 410100),
(410190, 'R', 'sales 410100', NULL, NULL, 400000, 410000, 410190),
(410200, 'R', 'OTHER INCOME', NULL, NULL, 400000, 410000, 410200),
(410201, 'R', 'MISC. INCOME', NULL, NULL, 400000, 410000, 410200),
(410205, 'R', 'OTHER SALES.', NULL, NULL, 400000, 410000, 410200),
(420000, 'R', 'OTHER REVENUES', NULL, NULL, 400000, 420000, 420000),
(420100, 'R', 'OTHER INCOME', NULL, NULL, 400000, 420000, 420100),
(420101, 'R', 'OTHER INCOME 2', NULL, NULL, 400000, 420000, 420100),
(420104, 'R', 'PENDING/TARGET INCOME', NULL, NULL, 400000, 420000, 420100),
(420105, 'R', 'SERVICE CHARGES', NULL, NULL, 400000, 420000, 420100),
(420200, 'R', 'OTHER INCOME', NULL, NULL, 400000, 420000, 420200),
(420205, 'R', 'oooooo', NULL, NULL, 400000, 420000, 420200),
(420210, 'R', '222222', NULL, NULL, 400000, 420000, 420200),
(430000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 430000, 430000),
(440000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 440000, 440000),
(450000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 450000, 450000),
(460000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 460000, 460000),
(470000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 470000, 470000),
(480000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 480000, 480000),
(490000, 'R', 'Kashif Bhai', NULL, NULL, 400000, 490000, 490000),
(500000, 'E', 'TOTAL EXPENSES', NULL, NULL, 500000, 500000, 500000),
(510000, 'E', 'COST OF GOODS SOLD.', NULL, NULL, 500000, 510000, 510000),
(510100, 'E', 'MATERIAL INVENTORY', NULL, NULL, 500000, 510000, 510100),
(510101, 'E', 'OPENING STOCK.', NULL, NULL, 500000, 510000, 510100),
(510102, 'E', 'PURCHASES', NULL, NULL, 500000, 510000, 510100),
(510103, 'E', 'PURCHASE OF TICKET', NULL, NULL, 500000, 510000, 510100),
(510104, 'E', 'DISCOUNT ALLOWED', NULL, NULL, 500000, 510000, 510100),
(510105, 'E', 'PURCHASE DISCOUNTS', NULL, NULL, 500000, 510000, 510100),
(510107, 'E', 'PURCHASE LOADING', NULL, NULL, 500000, 510000, 510100),
(510109, 'E', 'PURCHASE UNLOADING', NULL, NULL, 500000, 510000, 510100),
(510110, 'E', 'PURCHASE RETURN.', NULL, NULL, 500000, 510000, 510100),
(510117, 'E', 'ZAKAT ACCOUNT.', NULL, NULL, 500000, 510000, 510100),
(510120, 'E', 'PURCHASES MISC. ADJ.', NULL, NULL, 500000, 510000, 510100),
(510122, 'E', 'PURCHASE BENDING', NULL, NULL, 500000, 510000, 510100),
(510140, 'E', 'ADNAN PAY.', NULL, NULL, 500000, 510000, 510100),
(510145, 'E', 'STOCK EXPENSES', NULL, NULL, 500000, 510000, 510100),
(510200, 'E', 'PACKING MATERIAL EXPENS.', NULL, NULL, 500000, 510000, 510200),
(510300, 'E', 'POWER:-', NULL, NULL, 500000, 510000, 510300),
(510400, 'E', 'MARKETING EXPENSES', NULL, NULL, 500000, 510000, 510400),
(510441, 'E', 'MARKETING SALARIES', NULL, NULL, 500000, 510000, 510400),
(510451, 'E', 'MARKETING PHONE/MOB EXP.', NULL, NULL, 500000, 510000, 510400),
(510461, 'E', 'ENTERTAINMENT', NULL, NULL, 500000, 510000, 510400),
(520000, 'E', 'GEN & ADMIN EXPENSES', NULL, NULL, 500000, 520000, 520000),
(520100, 'E', ' PAYROLL EXPENSES', NULL, NULL, 500000, 520000, 520100),
(520105, 'E', '520100 Kashif', NULL, NULL, 500000, 520105, 520100),
(520200, 'E', 'MAINTENANCE', NULL, NULL, 500000, 520000, 520200),
(530000, 'E', 'ORGANISATION EXPENSE.', NULL, NULL, 500000, 530000, 530000),
(530100, 'E', 'PAYROLL EXPENSES', NULL, NULL, 500000, 530000, 530100),
(530106, 'E', 'JAYLINE SALARY', NULL, NULL, 500000, 530000, 530100),
(530107, 'E', 'GM PAY:-', NULL, NULL, 500000, 530000, 530100),
(530108, 'E', 'YASEEN SALARY', NULL, NULL, 500000, 530000, 530100),
(530109, 'E', 'BABAR SALARY', NULL, NULL, 500000, 530000, 530100),
(530200, 'E', 'ASSETS INSURANCE', NULL, NULL, 500000, 530000, 530200),
(540000, 'E', 'REPAIR & MAINTENANCE', NULL, NULL, 500000, 540000, 540000),
(540100, 'E', 'REPAIR & MAINTENANCE', NULL, NULL, 500000, 540000, 540100),
(540110, 'E', 'R/M VEHICLE.', NULL, NULL, 500000, 540000, 540100),
(540111, 'E', 'R/M FURNITURE & FIXTURE', NULL, NULL, 500000, 540000, 540100),
(540112, 'E', 'R/M EQUIPMENT / COMPUTER', NULL, NULL, 500000, 540000, 540100),
(540130, 'E', 'GIFT ACCOUNT.', NULL, NULL, 500000, 540000, 540100),
(550000, 'E', 'OFFICE EXPENSES', NULL, NULL, 500000, 550000, 550000),
(550100, 'E', 'OFFICE EXPENSES', NULL, NULL, 500000, 550000, 550100),
(550110, 'E', 'PRINTING & STATIONARY', NULL, NULL, 500000, 550000, 550100),
(550114, 'E', 'VEHICLE EXP.', NULL, NULL, 500000, 550000, 550100),
(550115, 'E', 'LICENCE EXPENSE.', NULL, NULL, 500000, 550000, 550100),
(550116, 'E', 'TELEPHONE BILLS', NULL, NULL, 500000, 550000, 550100),
(550120, 'E', 'WATER BILLS', NULL, NULL, 500000, 550000, 550100),
(550121, 'E', 'ELECTRIC BILL.', NULL, NULL, 500000, 550000, 550100),
(550123, 'E', 'HOME EXPENSES', NULL, NULL, 500000, 550000, 550100),
(550124, 'E', 'ROOM RENT.', NULL, NULL, 500000, 550000, 550100),
(550125, 'E', 'TRAVELLING EXP.', NULL, NULL, 500000, 550000, 550100),
(550126, 'E', 'TEA & FOOD EXPENSES', NULL, NULL, 500000, 550000, 550100),
(550130, 'E', 'POL VEHICLE.', NULL, NULL, 500000, 550000, 550100),
(550132, 'E', 'LEGAL & PROFESSIONAL', NULL, NULL, 500000, 550000, 550100),
(550134, 'E', 'MISC. EXPENSES', NULL, NULL, 500000, 550000, 550100),
(550136, 'E', 'CHARITY & DONATIONS', NULL, NULL, 500000, 550000, 550100),
(550138, 'E', 'NEWS PAPERS', NULL, NULL, 500000, 550000, 550100),
(550140, 'E', 'MEMBERSHIP FEE', NULL, NULL, 500000, 550000, 550100),
(560000, 'E', 'FINANCIAL EXPENSES', NULL, NULL, 500000, 560000, 560000),
(560100, 'E', 'FINANCIAL EXPENSES', NULL, NULL, 500000, 560000, 560100),
(560110, 'E', 'BANK CHARGES', NULL, NULL, 500000, 560000, 560100),
(560111, 'E', 'FEE CHARGED', NULL, NULL, 500000, 560000, 560100),
(570000, 'E', 'DEPRICIATION', NULL, NULL, 500000, 570000, 570000),
(570100, 'E', 'DEPRICIATION', NULL, NULL, 500000, 570000, 570100),
(580000, 'E', 'TAXES:-', NULL, NULL, 500000, 580000, 580000),
(580100, 'E', 'TAXES:-', NULL, NULL, 500000, 580000, 580100),
(580120, 'E', 'TAX PAYABLE', NULL, NULL, 500000, 580000, 580120),
(580130, 'E', 'SALES TAX.', NULL, NULL, 500000, 580000, 580100),
(580135, 'E', 'INCOME TAX.', NULL, NULL, 500000, 580000, 580100),
(580140, 'E', 'PROFESSIONAL TAX (EXCISE)', NULL, NULL, 500000, 580000, 580100),
(580145, 'E', 'TOLL TAX.', NULL, NULL, 500000, 580000, 580100),
(590000, 'E', 'OTHER EXPENSES', NULL, NULL, 500000, 590000, 590000),
(590100, 'E', 'OTHER EXPENSES', NULL, NULL, 500000, 590000, 590100),
(590101, 'E', 'OTHER EXPENSES', NULL, NULL, 500000, 590000, 590100),
(590104, 'E', 'OFFICE EXPENCE.', NULL, NULL, 500000, 590000, 590100),
(590105, 'E', 'OFFICE RENT.', NULL, NULL, 500000, 590000, 590100),
(590106, 'E', 'COMPUTER EXPENSES', NULL, NULL, 500000, 590000, 590100),
(590107, 'E', 'BAD DEBTS ', NULL, NULL, 500000, 590000, 590100),
(590108, 'E', 'CASH SHORT /EXCESS', NULL, NULL, 500000, 590000, 590100),
(590109, 'E', 'PREVIOUS PERIOD P&L.', NULL, NULL, 500000, 590000, 590100),
(600000, 'S', 'SUSPENSE', NULL, NULL, 600000, 600000, 600000),
(610000, 'S', 'SUSPENSE', NULL, NULL, 600000, 610000, 610000),
(610100, 'S', 'SUSPENSE', NULL, NULL, 600000, 610000, 610100),
(610101, 'S', 'SUSPENSE', NULL, NULL, 600000, 610000, 610100),
(610102, 'S', 'CLEARING ACCOUNT.', NULL, NULL, 600000, 610000, 610100),
(610103, 'S', 'CHEQUE ACCOUNT.', NULL, NULL, 600000, 610000, 610100),
(610104, 'S', 'EXCESS & SHORT ACCOUNT.', NULL, NULL, 600000, 610000, 610100),
(620000, 'S', 'close', NULL, NULL, 600000, 620000, 620000);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(8) NOT NULL,
  `DepartmentName` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Finance'),
(16, 'Marketing'),
(18, 'Graphics');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `DocumentID` int(10) NOT NULL,
  `EmployeeID` int(10) DEFAULT NULL,
  `FileName` varchar(55) DEFAULT NULL,
  `File` varchar(55) DEFAULT NULL,
  `FileSize` varchar(12) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`DocumentID`, `EmployeeID`, `FileName`, `File`, `FileSize`, `eDate`) VALUES
(26, 80, 'dddd', '1652513519.pdf', NULL, '2022-05-14 07:31:59'),
(27, 80, 'ID CARD', '1652515488.jpg', NULL, '2022-05-14 08:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `educationlevel`
--

CREATE TABLE `educationlevel` (
  `EducationLevelID` int(8) NOT NULL,
  `EducationLevelName` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationlevel`
--

INSERT INTO `educationlevel` (`EducationLevelID`, `EducationLevelName`) VALUES
(1, 'FA/FSC '),
(2, 'Bachelor'),
(3, 'Master'),
(4, 'MS/MPIL/PHD');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(8) NOT NULL,
  `Title` varchar(75) DEFAULT NULL,
  `IsSupervisor` varchar(3) DEFAULT NULL,
  `FirstName` varchar(88) DEFAULT NULL,
  `MiddleName` varchar(88) DEFAULT NULL,
  `LastName` varchar(88) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `VisaIssueDate` date DEFAULT NULL,
  `VisaExpiryDate` date DEFAULT NULL,
  `PassportNo` varchar(88) DEFAULT NULL,
  `PassportExpiry` date DEFAULT NULL,
  `FullAddress` varchar(255) DEFAULT NULL,
  `MobileNo` varchar(35) DEFAULT NULL,
  `HomePhone` varchar(35) DEFAULT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `Nationality` varchar(35) DEFAULT NULL,
  `Gender` varchar(35) DEFAULT NULL,
  `MaritalStatus` varchar(35) DEFAULT NULL,
  `SpouseName` varchar(50) DEFAULT NULL,
  `SpouseEmployer` varchar(52) DEFAULT NULL,
  `SpouseWorkPhone` varchar(33) DEFAULT NULL,
  `JobTitleID` varchar(33) DEFAULT NULL,
  `DepartmentID` int(8) DEFAULT NULL,
  `SupervisorID` int(8) DEFAULT NULL,
  `WorkLocation` varchar(55) DEFAULT NULL,
  `EmailOffical` varchar(55) DEFAULT NULL,
  `WorkPhone` varchar(55) DEFAULT NULL,
  `NextofKinName` varchar(75) DEFAULT NULL,
  `NextofKinAddress` varchar(255) DEFAULT NULL,
  `NextofKinPhone` varchar(55) DEFAULT NULL,
  `NextofKinRelationship` varchar(55) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `BankBranch` varchar(255) DEFAULT NULL,
  `AccountNo` varchar(255) DEFAULT NULL,
  `EducationLevel` varchar(55) DEFAULT NULL,
  `LastDegree` varchar(75) DEFAULT NULL,
  `Picture` varchar(75) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp(),
  `JobLeavingDate` date DEFAULT NULL,
  `JobLeavingReson` text DEFAULT NULL,
  `uDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `StaffType` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT '123456',
  `Active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Title`, `IsSupervisor`, `FirstName`, `MiddleName`, `LastName`, `DateOfBirth`, `VisaIssueDate`, `VisaExpiryDate`, `PassportNo`, `PassportExpiry`, `FullAddress`, `MobileNo`, `HomePhone`, `Email`, `Nationality`, `Gender`, `MaritalStatus`, `SpouseName`, `SpouseEmployer`, `SpouseWorkPhone`, `JobTitleID`, `DepartmentID`, `SupervisorID`, `WorkLocation`, `EmailOffical`, `WorkPhone`, `NextofKinName`, `NextofKinAddress`, `NextofKinPhone`, `NextofKinRelationship`, `BankName`, `BankBranch`, `AccountNo`, `EducationLevel`, `LastDegree`, `Picture`, `eDate`, `JobLeavingDate`, `JobLeavingReson`, `uDate`, `StaffType`, `Password`, `Active`) VALUES
(79, 'Mr.', 'No', 'Umair', NULL, 'Ali', '2022-01-14', '2001-01-01', '2022-01-16', NULL, '2022-01-16', NULL, NULL, NULL, 'hr@demo.com', NULL, 'Male', 'Single', NULL, NULL, NULL, '1', 1, 109, NULL, 'kashif.mushtaq20@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FA/FSC', NULL, '001.jpg', '2021-12-09 13:38:02', NULL, NULL, '2022-05-18 18:31:19', 'HR', '123456789', 'Y'),
(80, 'Mr.', 'Yes', 'Mirza', NULL, 'Adil', '2022-01-14', '2001-01-01', '2022-01-14', NULL, '2022-01-16', NULL, NULL, NULL, 'adil@gmail.com', NULL, 'Male', 'Single', NULL, NULL, NULL, '1', 1, 109, NULL, 'kashif.mushtaq205@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FA/FSC', NULL, '001.jpg', '2021-12-09 13:38:25', NULL, NULL, '2022-05-18 18:31:25', 'EMPLOYEE', '123456780', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `employ_report`
-- (See below for the actual view)
--
CREATE TABLE `employ_report` (
`EmployeeID` int(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `EmployeeSalaryID` int(8) NOT NULL,
  `EmployeeID` int(8) DEFAULT NULL,
  `Basic` int(8) DEFAULT NULL,
  `Allowncetitle` varchar(255) DEFAULT NULL,
  `AllowanceCategory` varchar(255) DEFAULT NULL,
  `eDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Active` varchar(3) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`EmployeeSalaryID`, `EmployeeID`, `Basic`, `Allowncetitle`, `AllowanceCategory`, `eDate`, `Active`) VALUES
(11, 79, 500, 'Basic', 'Dr', '2022-05-07 14:26:11', 'Y'),
(12, 79, 2501, 'Medical', 'Dr', '2022-05-07 14:26:59', 'Y'),
(19, 80, 20000, 'Basic', 'Dr', '2022-05-10 13:12:55', 'Y'),
(20, 80, 10000, 'Medical', 'Dr', '2022-05-10 13:13:07', 'Y'),
(24, 80, 20000, 'FCB', 'Cr', '2022-05-10 14:25:47', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `InvoiceDetailID` int(11) NOT NULL,
  `InvoiceMasterID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `PrdouctID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TaxPer` int(11) NOT NULL,
  `TaxAmount` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_letter`
--

CREATE TABLE `issue_letter` (
  `IssueLetterID` int(8) NOT NULL,
  `LetterID` int(8) DEFAULT NULL,
  `EmployeeID` int(8) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `UserID` int(8) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_letter`
--

INSERT INTO `issue_letter` (`IssueLetterID`, `LetterID`, `EmployeeID`, `Title`, `Content`, `UserID`, `eDate`) VALUES
(49, 1, 79, 'Offer Letter', '<p><strong>Umair Ali</strong><br />\r\nFilipino Passport:</p>\r\n\r\n<p>Dear Umair;</p>\r\n\r\n<p><strong>EMPLOYMENT OFFER</strong></p>\r\n\r\n<p>We are glad to offer you employment in our company on the following terms and conditions:</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:1056px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1.</td>\r\n			<td style=\"vertical-align:top\">Position&nbsp;</td>\r\n			<td style=\"vertical-align:top\">: Sale Manager</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.</td>\r\n			<td style=\"vertical-align:top\">Location</td>\r\n			<td style=\"vertical-align:top\">: ^Location^</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3.</td>\r\n			<td style=\"vertical-align:top\">Total Monthly Salary</td>\r\n			<td style=\"vertical-align:top\">: AED: ^Salary^</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4.</td>\r\n			<td style=\"vertical-align:top\">Bonus/Commission</td>\r\n			<td style=\"vertical-align:top\">: Upon company discretion</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5.</td>\r\n			<td style=\"vertical-align:top\">Accommodation</td>\r\n			<td style=\"vertical-align:top\">: to be arranged by Employee</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6.</td>\r\n			<td style=\"vertical-align:top\">Transportation</td>\r\n			<td style=\"vertical-align:top\">: to be arranged by Employee</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7.</td>\r\n			<td style=\"vertical-align:top\">Contract period</td>\r\n			<td style=\"vertical-align:top\">: Two years, UNLIMITED</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8.</td>\r\n			<td style=\"vertical-align:top\">Probation period</td>\r\n			<td style=\"vertical-align:top\">: (6) months</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9.</td>\r\n			<td style=\"vertical-align:top\">Working hours</td>\r\n			<td style=\"vertical-align:top\">: 8 hours/day, 6 days/week</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10.</td>\r\n			<td style=\"vertical-align:top\">Vacation</td>\r\n			<td style=\"vertical-align:top\">: 30 days per year</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11.</td>\r\n			<td style=\"vertical-align:top\">Increment after probation</td>\r\n			<td style=\"vertical-align:top\">: AED 1,000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12.</td>\r\n			<td style=\"vertical-align:top\">Air Ticket</td>\r\n			<td style=\"vertical-align:top\">: Upon renewal the contract you can take returned ticket from DXB to your home country.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td style=\"vertical-align:top\">&nbsp;</td>\r\n			<td style=\"vertical-align:top\">: If you will not renew you can only avail returned ticket to your home country</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13.</td>\r\n			<td style=\"vertical-align:top\">Medical, Insurance</td>\r\n			<td style=\"vertical-align:top\">: As per U.A.E. Labor Law</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14.</td>\r\n			<td style=\"vertical-align:top\">End of Service Benefits</td>\r\n			<td style=\"vertical-align:top\">: As per U.A.E. Labor Law</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">15</td>\r\n			<td style=\"vertical-align:top\">Others</td>\r\n			<td style=\"vertical-align:top\">: The U.A.E. Federal Labor Law No (8) of 1980 will apply to any matter which is not mentioned in this Letter of Employment Offer</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Should you accept our offer based on the above conditions, please sign and return copy of this letter as a token of your acceptance. The joining date will be on July 17th and if failed to come this offer will be null and void.</p>\r\n\r\n<p>This Offer is subject to your visa approval, medical fitness and you&rsquo;re reporting to duty on agreed date.</p>\r\n\r\n<p>This Offer is valid for 7 days from date of issuing.</p>\r\n\r\n<p>We welcome you to <strong>Friends Commodity Brokerage LLC</strong> and wish you good luck.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For <strong>Friends Commodity Brokerage LLC</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Muhammad Asim Jan</strong></td>\r\n			<td><em>Accepted: _____________________</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Managing Director</em></td>\r\n			<td><em>Date:</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, '2022-05-09 06:38:47'),
(51, 7, 80, 'End of Services', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Ref: FCB/L/2021-82&nbsp;</td>\r\n			<td>\r\n			<p>Date: May 23, 2021</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>END OF SERVICE SETTLEMENT</strong></p>\r\n\r\n<p><strong>Mirza Adil</strong><br />\r\n<strong>Nationality: </strong></p>\r\n\r\n<p>Passport:2500</p>\r\n\r\n<p>Dear Mirza,<br />\r\nYour resignation from your position has been accepted, effective on July 25, 2021 as requested.<br />\r\nIt has been a pleasure to work with you, and on behalf of our entire team, I would like to wish you the best in your future endeavours.<br />\r\nThis letter acknowledges an amount of <strong><em>AED 2,180.00</em></strong>/- towards payment of amount in full and final settlement against your employment with this company.<br />\r\n&nbsp;With this, your account is settled with our company and nothing is due from the company to you.<br />\r\nYou are required to return any of the company&rsquo;s material, documents or equipment to which you had access during the period your contract.<br />\r\nWe would like to thank you for your contribution&nbsp;and we wish you all the best for the future.</p>\r\n\r\n<p>Thank you<br />\r\nBest Regards</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Jeny Jane Aquino</strong></td>\r\n			<td>\r\n			<p><strong>Malvern Tendai Kurehwa</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>HR Administrator&nbsp;</strong></td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, '2022-05-09 10:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` int(8) NOT NULL,
  `ItemType` varchar(55) DEFAULT NULL,
  `ItemCode` varchar(5) DEFAULT NULL,
  `ItemName` varchar(55) DEFAULT NULL,
  `Unit` varchar(10) DEFAULT NULL,
  `Taxable` varchar(10) DEFAULT NULL,
  `Percentage` double(8,2) DEFAULT NULL,
  `CostPrice` double(8,2) DEFAULT NULL,
  `CostChartofAccountID` int(9) DEFAULT NULL,
  `CostDescription` varchar(255) DEFAULT NULL,
  `SellingPrice` double(8,2) DEFAULT NULL,
  `SellingChartofAccountID` int(8) DEFAULT NULL,
  `SellingDescription` varchar(255) DEFAULT NULL,
  `ItemImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `ItemType`, `ItemCode`, `ItemName`, `Unit`, `Taxable`, `Percentage`, `CostPrice`, `CostChartofAccountID`, `CostDescription`, `SellingPrice`, `SellingChartofAccountID`, `SellingDescription`, `ItemImage`) VALUES
(7, 'Service', 'AP', 'Approval', NULL, 'No', NULL, NULL, NULL, NULL, 7.00, NULL, NULL, ''),
(8, 'Service', 'CO', 'Covid Test', NULL, 'No', NULL, NULL, NULL, NULL, 5.00, NULL, NULL, ''),
(9, 'Service', 'V1', 'Dubai Visa 1 Month', NULL, 'No', 4.76, NULL, NULL, NULL, 2.00, NULL, NULL, ''),
(10, 'Service', 'V2', 'Dubai Visa 3 Months', NULL, 'No', 4.76, NULL, NULL, NULL, 6.00, NULL, NULL, ''),
(11, 'Service', 'V3', 'Dubai Visa 30 Days Inside', NULL, 'No', 4.76, NULL, NULL, NULL, 6.00, NULL, NULL, ''),
(12, 'Service', 'V4', 'Dubai Visa 90 Days Inside', NULL, 'Yes', 4.76, NULL, NULL, NULL, 0.00, NULL, NULL, ''),
(13, 'Service', 'FR', 'Freelance', NULL, 'No', NULL, NULL, NULL, NULL, 5.00, NULL, NULL, ''),
(14, 'Service', 'H', 'Hotel Booking', NULL, 'Yes', 52.50, NULL, NULL, NULL, 6.00, NULL, NULL, ''),
(15, 'Service', 'KS', 'KSA', NULL, 'No', NULL, NULL, NULL, NULL, 3.00, NULL, NULL, ''),
(16, 'Service', 'S', 'Safari', NULL, 'No', NULL, NULL, NULL, NULL, 9.00, NULL, NULL, ''),
(17, 'Service', 'T', 'Ticket Charges', NULL, 'No', NULL, NULL, NULL, NULL, 8.00, NULL, NULL, ''),
(18, 'Service', 'V', 'Visa 30 Days', NULL, 'No', NULL, NULL, NULL, NULL, 0.00, NULL, NULL, ''),
(19, NULL, 'DD', 'DD', NULL, 'No', NULL, NULL, NULL, NULL, 9.00, NULL, NULL, ''),
(20, NULL, 'DD', 'DDDD', NULL, 'No', NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `jobtitle`
--

CREATE TABLE `jobtitle` (
  `JobTitleID` int(8) NOT NULL,
  `JobTitleName` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtitle`
--

INSERT INTO `jobtitle` (`JobTitleID`, `JobTitleName`) VALUES
(1, 'Sale Manager'),
(2, 'Software Engineering'),
(3, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `LeaveID` int(8) NOT NULL,
  `BranchID` int(8) DEFAULT NULL,
  `EmployeeID` int(8) DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `Reason` longtext DEFAULT NULL,
  `DaysApproved` int(3) DEFAULT NULL,
  `DaysRemaining` int(3) DEFAULT NULL,
  `OMStatus` varchar(20) DEFAULT 'Pending',
  `OMStatusDate` timestamp NULL DEFAULT NULL,
  `OMRemarks` longtext DEFAULT NULL,
  `HRStatus` varchar(20) DEFAULT 'Pending',
  `HRStatusDate` timestamp NULL DEFAULT NULL,
  `HRRemarks` longtext DEFAULT NULL,
  `GMStatus` varchar(20) DEFAULT 'Pending',
  `GMRemarks` longtext DEFAULT NULL,
  `GMStatusDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`LeaveID`, `BranchID`, `EmployeeID`, `FromDate`, `ToDate`, `Reason`, `DaysApproved`, `DaysRemaining`, `OMStatus`, `OMStatusDate`, `OMRemarks`, `HRStatus`, `HRStatusDate`, `HRRemarks`, `GMStatus`, `GMRemarks`, `GMStatusDate`) VALUES
(20, 1, 98, '2002-12-12', '2003-12-12', '333', NULL, NULL, 'Yes', '2021-12-25 18:13:03', 'plz allow', 'Yes', '2021-12-25 18:13:03', 'ok done', 'Yes', 'OK', '2021-12-25 18:13:03'),
(25, NULL, 80, '2022-05-03', '2022-05-19', 'i am bimar', NULL, NULL, 'Pending', NULL, NULL, 'Approved', '2022-05-09 05:45:50', 'ok you are good to go', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `LeaveTypeID` int(255) NOT NULL,
  `LeaveTypeTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`LeaveTypeID`, `LeaveTypeTitle`) VALUES
(2, 'adil'),
(3, 'ghg'),
(4, 'adil'),
(5, 'mirza'),
(6, 'sir'),
(7, 'miss'),
(8, 'teacher'),
(9, 'dddddddeee');

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `LeaveStatusID` int(8) NOT NULL,
  `LeaveStatus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`LeaveStatusID`, `LeaveStatus`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `LetterID` int(8) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `UserID` int(8) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`LetterID`, `Title`, `Content`, `UserID`, `eDate`) VALUES
(2, 'NOC', 'Ref: FCB/L/2021-82 \r\n\r\nDate: May 23, 2021\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nNO OBJECTION CERTIFICATE\r\n\r\nWe, FRIENDS COMMODITY BROKERAGE LLC, sponsor of ^FullName^, a ^Nationality^ nationality with Passport no. ^Passport^ have no objection to deposit the salary into his bank account.\r\nAccounts details given below:\r\nAccount Name: ^FullName^\r\nAccount Number: xxxxxxxxxxxxxxx\r\nBank: ADCB\r\nThis letter has been given upon request to be presented to your organization.\r\nWe highly appreciate your cooperation in this regard.\r\n\r\nThank you;\r\n\r\nSincerely yours;\r\n\r\n\r\n\r\n\r\n\r\nSyeda Rubab Ali Kazmi\r\nHR Manager \r\n\r\n', NULL, '2021-10-19 14:18:40'),
(3, 'Increment Letter', '\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\">Ref:  FCB/L/2021-82&nbsp;</td>\r\n    <td width=\"50%\"><div align=\"right\">Date:  May 23, 2021</div></td>\r\n  </tr>\r\n</table>\r\n<p align=\"center\">&nbsp;</p>\r\n<p>^FullName^,<br />\r\nPassport No: ^Passport^<br />\r\nNationality: ^Nationality^<br />\r\n^Designation^<br />\r\nFriends Commodities Brokerage LLC</p>\r\n<p>&nbsp;</p>\r\n<p>Subject: <strong><u>Employee  Appreciation and performance bonus</u></strong></p>\r\n<p>Dear ^FirstName^,</p>\r\n<p>After reviewing your performance in the last three months  carefully, the management of Friends Commodities Brokerage is glad to offer you  an increment for achieving the sales targets as expected. The effective date of  this increase is August 1, 2021 and the increase will appear as follow;</p>\r\n<p>Basic Salary: AED 2500<br />\r\n  Performance Increment: AED 1000<br />\r\n  Gross Salary: AED 3500</p>\r\n<p>We hope this will encourage you to perform even better,  and please note that the company will have the complete right to halt the bonus  at any time in case your performances fall. </p>\r\n<p>Thank you for your commitment and dedication. Keep up the  good work.</p>\r\n<p>&nbsp;</p>\r\n<p>Sincerely,</p>\r\n<p>Approved By:</p>\r\n<p>Andrei Bogdan &ndash; Operation  Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ___________________</p>\r\n<p>Jeny Jane Aquino &ndash; HR  Administrator&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  ___________________</p>\r\n<p>Muhammad Asim Jan &ndash; Managing  Director: ___________________</p>\r\n<p>&nbsp;</p>\r\n<p>I have read, fully understand and accept the terms and  conditions mentioned herein<br />\r\n  Full Name: _____________________________<br />\r\n  Signature: _____________________________Date:  ______________________</p>\r\n', NULL, '2021-10-19 14:21:12'),
(4, 'Approval for Visit Visa', 'Ref: FCB/L/2021-82 \r\n\r\nDate: May 23, 2021\r\n\r\n\r\n\r\n\r\n\r\nAPPROVAL FOR VISIT VISA\r\n\r\nWe are writing this letter in response with your request for paying fee of AED 1400/-for 3 months visit visa. We accept your request and Falak Travel and Tourism LLC will pay a fee of AED 1400/-on your behalf.\r\nThe Criteria for returning the AED 1400/- back to Falak Travel and Tourism LLC should be that, we will deduct AED 1400/- in month of June salary.\r\n\r\nSincerely Yours,\r\n\r\n\r\n\r\n\r\n\r\nSyeda Rubab Ali Kazmi \r\n\r\nAcknowledged By: ______________________\r\n\r\n\r\n\r\nHR Manager \r\n\r\nAntony Mugadza\r\n\r\n\r\n\r\n\r\n\r\n', NULL, '2021-10-19 13:43:48'),
(5, 'Salary Letter', '\r\n<p align=\"center\" class=\"style1\">Salary  Certificate</p>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\">Ref:  FCB/L/2021-82&nbsp;</td>\r\n    <td width=\"50%\"><div align=\"right\">Date:  May 23, 2021</div></td>\r\n  </tr>\r\n</table>\r\n<p align=\"center\">&nbsp;</p>\r\n<p>To  whom it may concern;<br />\r\n  This  is to certify that <strong>^FullName^ </strong>holding Passport number <strong>^Passport^</strong> is working with our reputed company <strong>Friends  Commodity Brokerage LLC</strong> as a Marketing Specialist. He has been working with  us since 1st August 2019 and proved to be a very dedicated resource  that has been very loyal to the company.<br />\r\n  We  are issuing this letter on the request of <strong>^FullName^ </strong>and do not hold any liability on behalf of this  letter or part of this letter on our company.<br />\r\n  This  certificate can be used for the purpose of opening bank accounts only.<br />\r\n  His  salary particulars are given below:</p>\r\n<p>Basic  Salary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AED 5000.00<br />\r\n  House  Rent Allowance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AED 3000.00<br />\r\n  <u>Transport  Allowance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AED 2000.00</u><br />\r\n  <strong>Net Salary&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AED 10,000.00</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Sincerely  yours,</p>\r\n<p><strong><u>Jeny Jane Aquino</u></strong><br />\r\n    <em><u>HR  Administrator</u></em><br />\r\n    <em><u>04-  580 7617</u></em></p>\r\n', NULL, '2021-10-19 14:23:37'),
(6, 'Warning Letter', '\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\">Name of  Employee: <strong>&nbsp;^FullName^</strong></td>\r\n    <td width=\"50%\"><div align=\"right\">Date:  May 23, 2021</div></td>\r\n  </tr>\r\n  <tr>\r\n    <td>Passport No: <strong>^Passport^</strong></td>\r\n    <td><div align=\"right\">Ref:  FCB/L/2021-82&nbsp;</div></td>\r\n  </tr>\r\n  <tr>\r\n    <td>Nationality: ^Nationality^</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p><strong>Subject :</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><u>Third Written Warning</u></strong><strong><u> </u></strong></p>\r\n<p>&nbsp;</p>\r\n<p>Dear <strong>^FirstName^</strong>,<br />\r\n  The management has been observing your  performance for a couple of months, and unfortunately we noticed that you were  not able to meet the minimum target which has been set for you. &nbsp;We are very clear and you were informed  beforehand that accomplishment of daily targets by each employee has a huge  importance to the company&rsquo;s growth. <br />\r\n  You are advised to achieve a desired  sales target of at least <strong>2 FTD from  today until the 22nd day of the month of September.</strong><br />\r\n  Please be reminded that your  performance would be strictly evaluated at the end of this month and <strong><em>failure  to comply with the said target may lead into corrective action up to  termination</em></strong>. So kindly do all your best and hoping that you will  achieve the sales target required by the management.</p>\r\n<p>This is for your kind information.</p>\r\n<p>Sincerely yours;</p>\r\n<p>&nbsp;</p>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\"><strong>Jeny Jane Aquino</strong></td>\r\n    <td width=\"50%\"><strong>Acknowledge By: ______________</strong><strong>___</strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\"50%\"><strong>HR Administrator</strong>&nbsp;&nbsp;</td>\r\n    <td width=\"50%\"><strong>^FirstName^</strong></td>\r\n  </tr>\r\n</table>\r\n \r\n', NULL, '2021-10-19 14:25:52'),
(7, 'End of Services', '\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\">Ref:  FCB/L/2021-82&nbsp;</td>\r\n    <td width=\"50%\"><div align=\"right\">Date:  May 23, 2021</div></td>\r\n  </tr>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p align=\"center\"><strong><u>END OF SERVICE  SETTLEMENT</u></strong></p>\r\n<p><strong>^FullName^</strong><br />\r\n    <strong>Nationality: ^Nationality^</strong></p>\r\n<p>Passport: <strong>^Passport^</strong></p>\r\n<p>Dear ^FirstName^,<br />\r\n  Your resignation from your position  has been accepted, effective on July 25, 2021 as requested.<br />\r\n  It has been a pleasure to work  with you, and on behalf of our entire team, I would like to wish you the best  in your future endeavours. <br />\r\n  This letter acknowledges an amount  of <strong><em>AED  2,180.00</em></strong>/- towards payment of amount in full and final settlement  against your employment with this company.<br />\r\n  &nbsp;With this, your account is  settled with our company and nothing is due from the company to you. <br />\r\n  You are required to return any of the company&rsquo;s  material, documents or equipment to which you had access during the period your  contract.<br />\r\n  We would like to thank you for your  contribution&nbsp;and we wish you all the best for the future.<br />\r\n</p>\r\n<p>Thank you<br />\r\n  Best Regards</p>\r\n<p>&nbsp;</p>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr>\r\n    <td width=\"50%\"><strong>Jeny Jane Aquino</strong></td>\r\n    <td width=\"50%\"><div align=\"left\"><strong>Malvern Tendai Kurehwa</strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>HR Administrator&nbsp;</strong></td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n</table>\r\n \r\n', NULL, '2021-10-19 14:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(8) NOT NULL,
  `EmployeeID` int(8) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `Amount` int(8) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DateAccepted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `EmployeeID`, `RequestDate`, `Amount`, `Remarks`, `DateAccepted`) VALUES
(2, 110, '2022-04-01', 150000, 'con', NULL),
(4, 79, '2022-05-12', 25000, 'loan', NULL),
(6, 79, '2022-05-10', 25000, 'hello', NULL),
(17, 80, '2022-05-11', 25000, 'thank you', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_deduction`
--

CREATE TABLE `loan_deduction` (
  `LoanDeductionID` int(8) NOT NULL,
  `LoanID` int(8) DEFAULT NULL,
  `EmployeeID` int(10) DEFAULT NULL,
  `LoanDeductionDate` date DEFAULT NULL,
  `Amount` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_deduction`
--

INSERT INTO `loan_deduction` (`LoanDeductionID`, `LoanID`, `EmployeeID`, `LoanDeductionDate`, `Amount`) VALUES
(240, 17, 80, '2022-05-25', 2500),
(241, 17, 80, '2022-06-25', 2500),
(242, 17, 80, '2022-07-25', 2500),
(243, 17, 80, '2022-08-25', 2500),
(244, 17, 80, '2022-09-25', 2500),
(245, 17, 80, '2022-10-25', 2500),
(246, 17, 80, '2022-11-25', 2500),
(247, 17, 80, '2022-12-25', 2500),
(248, 17, 80, '2023-01-25', 2500),
(249, 17, 80, '2023-02-25', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2022_04_16_035330_create_employees_table', 1),
(14, '2014_10_12_000000_create_users_table', 2),
(15, '2014_10_12_100000_create_password_resets_table', 2),
(16, '2019_08_19_000000_create_failed_jobs_table', 2),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(18, '2021_10_21_071927_create_products_table', 2),
(19, '2022_04_16_064025_create_employees_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `NoticeID` int(8) NOT NULL,
  `Title` varchar(75) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `FromEmployeeID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`NoticeID`, `Title`, `Description`, `eDate`, `FromEmployeeID`) VALUES
(1, 'this is from Adil\'s  id', '<p>check</p>', '2022-05-20 12:54:31', '80'),
(2, 'this is from mirza ali', '<p>check</p>', '2022-05-20 12:55:01', '79'),
(3, 'Title test', '<h1><strong><em><s>descr</s></em></strong></h1>', '2022-05-20 17:40:38', '80'),
(4, 'bbbbb', '<p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>', '2022-05-25 04:56:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice_status`
--

CREATE TABLE `notice_status` (
  `NoticeStatusID` int(8) NOT NULL,
  `NoticeID` int(8) NOT NULL,
  `EmployeeID` int(9) DEFAULT NULL,
  `Status` int(1) DEFAULT 0,
  `eDate` timestamp NULL DEFAULT current_timestamp(),
  `uDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Desktop` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `notice_status`
--

INSERT INTO `notice_status` (`NoticeStatusID`, `NoticeID`, `EmployeeID`, `Status`, `eDate`, `uDate`, `Desktop`) VALUES
(1, 1, 79, 0, '2022-05-20 12:54:31', '2022-05-20 18:11:44', 1),
(2, 1, 80, 0, '2022-05-20 12:54:31', '2022-05-20 12:54:31', 0),
(3, 2, 79, 1, '2022-05-20 12:55:01', '2022-05-20 13:14:27', 1),
(4, 2, 80, 0, '2022-05-20 12:55:01', '2022-05-20 12:55:01', 0),
(5, 3, 79, 0, '2022-05-20 17:40:38', '2022-05-20 18:14:17', 1),
(6, 3, 80, 0, '2022-05-20 17:40:38', '2022-05-20 17:40:38', 0),
(7, 4, 79, 1, '2022-05-25 04:56:45', '2022-05-24 23:57:29', 1),
(8, 4, 80, 0, '2022-05-25 04:56:45', '2022-05-25 04:56:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `PartyID` int(8) NOT NULL,
  `PartyName` varchar(35) DEFAULT NULL,
  `Address` varchar(75) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Active` varchar(3) DEFAULT NULL,
  `InvoiceDueDays` int(10) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`PartyID`, `PartyName`, `Address`, `Phone`, `Email`, `Active`, `InvoiceDueDays`, `eDate`) VALUES
(1002, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', 'No', 903, '2022-01-16 17:59:43'),
(1023, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:58:58'),
(1044, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:59:20'),
(1053, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:59:46'),
(1576, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:58:23'),
(1680, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:58:55'),
(1700, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-01-16 17:59:34'),
(2213, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-03-06 04:14:26'),
(2214, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-05-12 15:07:45'),
(2216, 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '+923349047993', 'kashif@inu.edu.pk', NULL, 903, '2022-05-12 15:09:59'),
(2217, 'nafees', 'Jjelum', '1365465asdasdasdasdas', 'asd@gmail.com', 'Yes', 5, '2022-05-14 16:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `BarcodeSymbology` varchar(255) DEFAULT NULL,
  `BrandId` int(11) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `UnitId` int(11) DEFAULT NULL,
  `PurchaseUnitId` int(11) DEFAULT NULL,
  `SaleUnitId` int(11) DEFAULT NULL,
  `Cost` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Qty` varchar(255) DEFAULT NULL,
  `AlertQuantity` varchar(255) DEFAULT NULL,
  `Promotion` varchar(255) DEFAULT NULL,
  `PromotionPrice` varchar(255) DEFAULT NULL,
  `StartingDate` varchar(255) DEFAULT NULL,
  `LastDate` date DEFAULT NULL,
  `TaxId` int(11) DEFAULT NULL,
  `TaxMethod` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `File` varchar(255) DEFAULT NULL,
  `IsVariant` tinyint(1) DEFAULT NULL,
  `IsBatch` tinyint(1) DEFAULT NULL,
  `IsDiffPrice` tinyint(1) DEFAULT NULL,
  `Featured` varchar(255) DEFAULT NULL,
  `ProductList` varchar(255) DEFAULT NULL,
  `QtyList` varchar(255) DEFAULT NULL,
  `PriceList` varchar(255) DEFAULT NULL,
  `ProductDetails` varchar(255) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT NULL,
  `uDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Code`, `Type`, `BarcodeSymbology`, `BrandId`, `CategoryId`, `UnitId`, `PurchaseUnitId`, `SaleUnitId`, `Cost`, `Price`, `Qty`, `AlertQuantity`, `Promotion`, `PromotionPrice`, `StartingDate`, `LastDate`, `TaxId`, `TaxMethod`, `Image`, `File`, `IsVariant`, `IsBatch`, `IsDiffPrice`, `Featured`, `ProductList`, `QtyList`, `PriceList`, `ProductDetails`, `IsActive`, `eDate`, `uDate`) VALUES
(18, 'ffffffffff', '3213123', NULL, NULL, 2, 16, 3, NULL, NULL, '12111', '1520', '5', '2', NULL, '900', '2022-04-28', '2022-04-11', NULL, NULL, '5881bca755a9f63abfcfff9404f9c6f8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'artificial', 'fcsdfew', NULL, NULL, 1, 14, 2, NULL, NULL, '500', '1250', '5', '3', NULL, '900', '2022-04-17', '2022-04-28', NULL, NULL, '23606.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportID` int(255) NOT NULL,
  `EmployeeID` int(255) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `TextArea` varchar(255) DEFAULT NULL,
  `ReportFile` varchar(255) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportID`, `EmployeeID`, `Title`, `TextArea`, `ReportFile`, `eDate`) VALUES
(11, 80, 'CHECK AGAIN', '<p>FEFUBUEBFBUFEBUEFUBEF</p>', 'cmo.jpg', '2022-04-28 06:14:29'),
(12, 79, '58444iuhuh', 'uhuheufhfe', 'cmo.jpg', '2022-04-28 06:16:24'),
(13, 80, 'Firday Report', '<p>jhellele</p>', 'cmo.jpg', '2022-06-29 06:51:12'),
(16, 79, 'gcuycfuyfvuy', '<p>nkhbyufuy uyfvuy</p>', 'cmo.jpg', '2022-05-06 05:15:50'),
(18, 80, 'hvuyvuyv', '<p>yvuff87f87</p>', 'IMG_20220426_0001.jpg', '2022-05-09 09:53:55'),
(20, 80, 'uuuu', '<p>tfutuuut</p>', '5 (Copy).JPG', '2022-05-13 10:18:27'),
(21, 80, 'ssssssssssss', '<p>dsvdsvsdvdsd</p>', NULL, '2022-05-16 11:52:28'),
(22, 80, 'fefewfwe', '<p>dsvsdvdv</p>', 'URDU 5 SUB.pdf', '2022-05-17 06:02:48');

-- --------------------------------------------------------

--
-- Stand-in structure for view `second_employ`
-- (See below for the actual view)
--
CREATE TABLE `second_employ` (
`EmployeeID` int(8)
,`Title` varchar(75)
,`FirstName` varchar(88)
,`MiddleName` varchar(88)
,`LastName` varchar(88)
,`JobTitleName` varchar(99)
,`DepartmentName` varchar(75)
);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `StaffTypeID` int(8) NOT NULL,
  `StaffType` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`StaffTypeID`, `StaffType`) VALUES
(5, 'HR'),
(6, 'GM'),
(7, 'OM'),
(8, 'Inactive'),
(9, 'Noel'),
(10, 'EMPLOYEE');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(8) NOT NULL,
  `SupplierCatID` int(8) DEFAULT NULL,
  `Category` varchar(35) DEFAULT NULL,
  `SupplierName` varchar(35) DEFAULT NULL,
  `Address` varchar(75) DEFAULT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Active` varchar(3) DEFAULT NULL,
  `InvoiceDueDays` int(10) DEFAULT NULL,
  `eDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierCatID`, `Category`, `SupplierName`, `Address`, `Phone`, `Email`, `Active`, `InvoiceDueDays`, `eDate`) VALUES
(1012, 2, 'AIR-CUSTOMER', 'SAJID SB PAK', 'Kashif House, Khyber colony No 1, Tehkal Payan', '000', 'kashif@inu.edu.pk', 'No', 90, '2022-01-16 17:59:49'),
(1023, 2, 'AIR-CUSTOMER', 'LIGHT SPEED', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:58'),
(1029, 6, 'AIR LINE', 'AL DIYAFA', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:02'),
(1030, 6, 'AIR LINE', 'AKBAR TRAVEL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:57:57'),
(1032, 6, 'AIR LINE', 'PIA', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:59:36'),
(1033, 6, 'AIR LINE', 'AIR BLUE', 'test add', '124224', 'asd', 'No', 4, '2022-01-16 17:57:49'),
(1044, 2, 'AIR-CUSTOMER', 'MALIK MAQSOOD AGENT', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:59:20'),
(1053, 2, 'AIR-CUSTOMER', 'SADAF TRAVELS', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:59:46'),
(1076, 6, 'AIR LINE', 'FCB LOAN AC', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:29'),
(1094, 6, 'SUPPLIER', 'HADAF TRAVEL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:45'),
(1172, 6, 'AIR LINE', 'AMR  TRAVEL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:08'),
(1309, 6, 'AIR LINE', 'FREELANCE VISAS', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:33'),
(1410, 6, 'AIR LINE', 'HOTEL BOOKINGS', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:49'),
(1576, 2, 'AIR-CUSTOMER', 'COZMO  TRAVEL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:23'),
(1665, 6, 'AIR LINE', 'DGRFA APPROVAL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:40'),
(1666, 6, 'AIR LINE', 'MARSHAL TRAVEL', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:59:26'),
(1680, 2, 'AIR-CUSTOMER', 'KSA', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:55'),
(1700, 2, 'AIR-CUSTOMER', 'MESSZAN TRV', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:59:34'),
(1735, 6, 'AIR LINE', 'COVID REST', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:12'),
(1790, 6, 'AIR LINE', 'ISB TRV', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:53'),
(2072, 6, 'AIR LINE', 'AL HIND TRV', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:05'),
(2211, 6, 'AIR LINE', 'DUMMY TICS', NULL, NULL, NULL, NULL, NULL, '2022-01-16 17:58:26'),
(2212, 1, NULL, 'test2', NULL, NULL, NULL, 'Yes', NULL, '2022-03-28 12:46:42'),
(2213, 1, NULL, 'DD', NULL, NULL, NULL, 'Yes', NULL, '2022-04-11 06:55:00'),
(2214, NULL, NULL, 'www', 'wew', '5454', 'rd@gmail.com', 'Yes', 44, '2022-05-12 11:26:54'),
(2215, NULL, NULL, 'ss', 'ss', '444', '55@fff', 'Yes', 44, '2022-05-12 11:39:37'),
(2216, NULL, NULL, 'supplier', 'Jhelum', '1231', 'a@gmasdas', 'Yes', 87, '2022-05-14 16:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_category`
--

CREATE TABLE `supplier_category` (
  `SupplierCatID` int(8) NOT NULL,
  `SupplierCode` varchar(10) DEFAULT NULL,
  `SupplierCategory` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_category`
--

INSERT INTO `supplier_category` (`SupplierCatID`, `SupplierCode`, `SupplierCategory`) VALUES
(1, 'C', 'Customer'),
(2, 'VC', 'Airline Customer'),
(3, 'EC', 'Employee'),
(4, 'X', 'Discontinued'),
(5, 'XC', 'Bad Debds'),
(6, 'VS', 'Supplier'),
(7, 'BC', 'Old Bad Debts');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `TitleID` int(8) NOT NULL,
  `Title` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`TitleID`, `Title`) VALUES
(1, 'Mr.'),
(2, 'Mrs.'),
(3, 'Miss.'),
(4, 'Ms.');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_unit` int(11) DEFAULT NULL,
  `operator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_code`, `unit_name`, `base_unit`, `operator`, `operation_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'pc', 'Piece', NULL, '*', 1, 1, '2018-05-12 02:27:46', '2018-08-17 21:41:53'),
(2, 'dozen', 'dozen box', 1, '*', 12, 0, '2018-05-12 09:57:05', '2021-11-17 07:38:03'),
(3, 'cartoon', 'cartoon box', 1, '*', 24, 1, '2018-05-12 09:57:45', '2020-03-11 10:36:59'),
(4, 'm', 'meter', NULL, '*', 1, 1, '2018-05-12 09:58:07', '2018-05-27 23:20:57'),
(6, 'test', 'test', NULL, '*', 1, 0, '2018-05-27 23:20:20', '2018-05-27 23:20:25'),
(7, 'kg', 'kilogram', NULL, '*', 1, 1, '2018-06-25 00:49:26', '2018-06-25 00:49:26'),
(8, '20', 'ni33', 8, '*', 1, 0, '2018-07-31 22:35:51', '2018-07-31 22:40:54'),
(9, 'gm', 'gram', 7, '/', 1000, 1, '2018-09-01 00:06:28', '2018-09-01 00:06:28'),
(10, 'gz', 'goz', NULL, '*', 1, 0, '2018-11-29 03:40:29', '2019-03-02 11:53:29'),
(11, 'CT', 'container', 1, '*', 50, 0, '2022-01-05 08:23:02', '2022-01-05 08:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'usama', 'usama@gmail.com', '2', NULL, '$2y$10$bFPc50YSAjS/lgzIraIU4.exLWIs4.aeQkiOwVWCrZ3P505zMKCmO', NULL, '2022-04-18 05:14:20', '2022-04-18 05:14:20'),
(2, 'admin', 'admin@gmail.com', '1', NULL, '$2y$10$d.Qod3cTMaueyV0jJ1J3UeANpRtpZHpHRHqp4lBcfNUaN1TnZy0w6', NULL, '2022-04-18 05:16:36', '2022-04-18 05:16:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_employee`
-- (See below for the actual view)
--
CREATE TABLE `v_employee` (
`EmployeeID` int(8)
,`Title` varchar(75)
,`JobTitleName` varchar(99)
,`DepartmentName` varchar(75)
,`FirstName` varchar(88)
,`MiddleName` varchar(88)
,`LastName` varchar(88)
,`FullName` varchar(264)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_employeenotice`
-- (See below for the actual view)
--
CREATE TABLE `v_employeenotice` (
`EmployeeID` int(8)
,`FirstName` varchar(88)
,`LastName` varchar(88)
,`NoticeStatusID` int(8)
,`Status` int(1)
,`eDate` varchar(10)
,`uDate` varchar(10)
,`Title` varchar(75)
,`Description` longtext
,`NoticeID` int(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_employees_report`
-- (See below for the actual view)
--
CREATE TABLE `v_employees_report` (
`DepartmentName` varchar(75)
,`EmployeeID` int(8)
,`IsSupervisor` varchar(3)
,`FirstName` varchar(88)
,`MiddleName` varchar(88)
,`LastName` varchar(88)
,`DateOfBirth` date
,`VisaIssueDate` date
,`VisaExpiryDate` date
,`PassportNo` varchar(88)
,`PassportExpiry` date
,`FullAddress` varchar(255)
,`MobileNo` varchar(35)
,`HomePhone` varchar(35)
,`Email` varchar(35)
,`Nationality` varchar(35)
,`Gender` varchar(35)
,`MaritalStatus` varchar(35)
,`SpouseName` varchar(50)
,`SpouseEmployer` varchar(52)
,`SpouseWorkPhone` varchar(33)
,`JobTitleID` varchar(33)
,`DepartmentID` int(8)
,`SupervisorID` int(8)
,`WorkLocation` varchar(55)
,`EmailOffical` varchar(55)
,`WorkPhone` varchar(55)
,`NextofKinName` varchar(75)
,`NextofKinAddress` varchar(255)
,`NextofKinPhone` varchar(55)
,`NextofKinRelationship` varchar(55)
,`EducationLevel` varchar(55)
,`LastDegree` varchar(75)
,`Picture` varchar(75)
,`uDate` timestamp
,`StaffType` varchar(25)
,`Password` varchar(25)
,`Active` varchar(255)
,`ReportID` int(255)
,`TextArea` varchar(255)
,`ReportFile` varchar(255)
,`Title` varchar(255)
,`eDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_notice`
-- (See below for the actual view)
--
CREATE TABLE `v_notice` (
`NoticeID` int(8)
,`Title` varchar(75)
,`eDate` timestamp
,`FromEmployeeID` varchar(255)
,`EmployeeID` int(9)
,`Status` int(1)
,`Description` longtext
,`Desktop` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `YearID` int(8) NOT NULL,
  `YearName` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`YearID`, `YearName`) VALUES
(1, 2021),
(2, 2022),
(3, 2023),
(4, 2024),
(5, 2025),
(6, 2026),
(7, 2027),
(8, 2028),
(9, 2029),
(10, 2030);

-- --------------------------------------------------------

--
-- Structure for view `employ_report`
--
DROP TABLE IF EXISTS `employ_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employ_report`  AS SELECT `employee`.`EmployeeID` AS `EmployeeID` FROM (`employee` left join `report` on(`employee`.`EmployeeID` = `report`.`EmployeeID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `second_employ`
--
DROP TABLE IF EXISTS `second_employ`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `second_employ`  AS SELECT `employee`.`EmployeeID` AS `EmployeeID`, `employee`.`Title` AS `Title`, `employee`.`FirstName` AS `FirstName`, `employee`.`MiddleName` AS `MiddleName`, `employee`.`LastName` AS `LastName`, `jobtitle`.`JobTitleName` AS `JobTitleName`, `department`.`DepartmentName` AS `DepartmentName` FROM ((`employee` join `jobtitle` on(`employee`.`JobTitleID` = `jobtitle`.`JobTitleID`)) join `department` on(`employee`.`DepartmentID` = `department`.`DepartmentID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_employee`
--
DROP TABLE IF EXISTS `v_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee`  AS SELECT `employee`.`EmployeeID` AS `EmployeeID`, `employee`.`Title` AS `Title`, `jobtitle`.`JobTitleName` AS `JobTitleName`, `department`.`DepartmentName` AS `DepartmentName`, `employee`.`FirstName` AS `FirstName`, `employee`.`MiddleName` AS `MiddleName`, `employee`.`LastName` AS `LastName`, concat(`employee`.`FirstName`,`employee`.`MiddleName`,`employee`.`LastName`) AS `FullName` FROM ((`employee` join `department` on(`employee`.`DepartmentID` = `department`.`DepartmentID`)) join `jobtitle` on(`employee`.`JobTitleID` = `jobtitle`.`JobTitleID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_employeenotice`
--
DROP TABLE IF EXISTS `v_employeenotice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employeenotice`  AS SELECT `employee`.`EmployeeID` AS `EmployeeID`, `employee`.`FirstName` AS `FirstName`, `employee`.`LastName` AS `LastName`, `notice_status`.`NoticeStatusID` AS `NoticeStatusID`, `notice_status`.`Status` AS `Status`, date_format(`notice_status`.`eDate`,'%d-%m-%Y') AS `eDate`, date_format(`notice_status`.`uDate`,'%d-%m-%Y') AS `uDate`, `notice`.`Title` AS `Title`, `notice`.`Description` AS `Description`, `notice_status`.`NoticeID` AS `NoticeID` FROM ((`notice_status` join `employee` on(`employee`.`EmployeeID` = `notice_status`.`EmployeeID`)) join `notice` on(`notice`.`NoticeID` = `notice_status`.`NoticeID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_employees_report`
--
DROP TABLE IF EXISTS `v_employees_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employees_report`  AS SELECT `department`.`DepartmentName` AS `DepartmentName`, `employee`.`EmployeeID` AS `EmployeeID`, `employee`.`IsSupervisor` AS `IsSupervisor`, `employee`.`FirstName` AS `FirstName`, `employee`.`MiddleName` AS `MiddleName`, `employee`.`LastName` AS `LastName`, `employee`.`DateOfBirth` AS `DateOfBirth`, `employee`.`VisaIssueDate` AS `VisaIssueDate`, `employee`.`VisaExpiryDate` AS `VisaExpiryDate`, `employee`.`PassportNo` AS `PassportNo`, `employee`.`PassportExpiry` AS `PassportExpiry`, `employee`.`FullAddress` AS `FullAddress`, `employee`.`MobileNo` AS `MobileNo`, `employee`.`HomePhone` AS `HomePhone`, `employee`.`Email` AS `Email`, `employee`.`Nationality` AS `Nationality`, `employee`.`Gender` AS `Gender`, `employee`.`MaritalStatus` AS `MaritalStatus`, `employee`.`SpouseName` AS `SpouseName`, `employee`.`SpouseEmployer` AS `SpouseEmployer`, `employee`.`SpouseWorkPhone` AS `SpouseWorkPhone`, `employee`.`JobTitleID` AS `JobTitleID`, `employee`.`DepartmentID` AS `DepartmentID`, `employee`.`SupervisorID` AS `SupervisorID`, `employee`.`WorkLocation` AS `WorkLocation`, `employee`.`EmailOffical` AS `EmailOffical`, `employee`.`WorkPhone` AS `WorkPhone`, `employee`.`NextofKinName` AS `NextofKinName`, `employee`.`NextofKinAddress` AS `NextofKinAddress`, `employee`.`NextofKinPhone` AS `NextofKinPhone`, `employee`.`NextofKinRelationship` AS `NextofKinRelationship`, `employee`.`EducationLevel` AS `EducationLevel`, `employee`.`LastDegree` AS `LastDegree`, `employee`.`Picture` AS `Picture`, `employee`.`uDate` AS `uDate`, `employee`.`StaffType` AS `StaffType`, `employee`.`Password` AS `Password`, `employee`.`Active` AS `Active`, `report`.`ReportID` AS `ReportID`, `report`.`TextArea` AS `TextArea`, `report`.`ReportFile` AS `ReportFile`, `report`.`Title` AS `Title`, `report`.`eDate` AS `eDate` FROM ((`department` join `employee` on(`employee`.`DepartmentID` = `department`.`DepartmentID`)) join `report` on(`employee`.`EmployeeID` = `report`.`EmployeeID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_notice`
--
DROP TABLE IF EXISTS `v_notice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_notice`  AS SELECT `notice`.`NoticeID` AS `NoticeID`, `notice`.`Title` AS `Title`, `notice`.`eDate` AS `eDate`, `notice`.`FromEmployeeID` AS `FromEmployeeID`, `notice_status`.`EmployeeID` AS `EmployeeID`, `notice_status`.`Status` AS `Status`, `notice`.`Description` AS `Description`, `notice_status`.`Desktop` AS `Desktop` FROM (`notice_status` join `notice` on(`notice`.`NoticeID` = `notice_status`.`NoticeID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowance_list`
--
ALTER TABLE `allowance_list`
  ADD PRIMARY KEY (`AllowanceListID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chartofaccount`
--
ALTER TABLE `chartofaccount`
  ADD PRIMARY KEY (`ChartOfAccountID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`DocumentID`);

--
-- Indexes for table `educationlevel`
--
ALTER TABLE `educationlevel`
  ADD PRIMARY KEY (`EducationLevelID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`EmployeeSalaryID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`InvoiceDetailID`);

--
-- Indexes for table `issue_letter`
--
ALTER TABLE `issue_letter`
  ADD PRIMARY KEY (`IssueLetterID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `jobtitle`
--
ALTER TABLE `jobtitle`
  ADD PRIMARY KEY (`JobTitleID`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`LeaveTypeID`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`LeaveStatusID`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`LetterID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`);

--
-- Indexes for table `loan_deduction`
--
ALTER TABLE `loan_deduction`
  ADD PRIMARY KEY (`LoanDeductionID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NoticeID`);

--
-- Indexes for table `notice_status`
--
ALTER TABLE `notice_status`
  ADD PRIMARY KEY (`NoticeStatusID`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`PartyID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`StaffTypeID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `supplier_category`
--
ALTER TABLE `supplier_category`
  ADD PRIMARY KEY (`SupplierCatID`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`TitleID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`YearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowance_list`
--
ALTER TABLE `allowance_list`
  MODIFY `AllowanceListID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `DocumentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `educationlevel`
--
ALTER TABLE `educationlevel`
  MODIFY `EducationLevelID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `EmployeeSalaryID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_letter`
--
ALTER TABLE `issue_letter`
  MODIFY `IssueLetterID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `jobtitle`
--
ALTER TABLE `jobtitle`
  MODIFY `JobTitleID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `LeaveID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `LeaveTypeID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `LeaveStatusID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `LetterID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loan_deduction`
--
ALTER TABLE `loan_deduction`
  MODIFY `LoanDeductionID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `NoticeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_status`
--
ALTER TABLE `notice_status`
  MODIFY `NoticeStatusID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `PartyID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2218;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `StaffTypeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2217;

--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
  MODIFY `SupplierCatID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `TitleID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `YearID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
