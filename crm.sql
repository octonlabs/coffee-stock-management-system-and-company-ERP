-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 05:02 AM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(200) NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `password`) VALUES
(1, 'logan', '$2y$10$oMjhvVKqud3LFUII0Mz8ie9qTL1z.4rQ4Joh4nya3mJNpbtmIwblq');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_grades`
--

CREATE TABLE `coffee_grades` (
  `id` bigint(200) NOT NULL,
  `coffeegrade` longtext NOT NULL,
  `alertlevel` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee_grades`
--

INSERT INTO `coffee_grades` (`id`, `coffeegrade`, `alertlevel`, `created_at`, `updated_at`) VALUES
(1, 'AA', '100', '2023-11-01 13:44:45', '2023-11-01 13:44:45'),
(3, 'B', '100', '2023-11-01 13:45:07', '2023-11-01 13:45:07'),
(4, 'PB', '100', '2023-11-01 13:45:16', '2023-11-01 13:45:16'),
(6, 'A', '200', '2023-11-04 01:56:27', '2023-11-04 01:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(200) NOT NULL,
  `customername` longtext NOT NULL,
  `customerphone` longtext NOT NULL,
  `customerlocation` longtext NOT NULL,
  `customertype` longtext NOT NULL,
  `briefinfo` longtext NOT NULL,
  `customer_status` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customername`, `customerphone`, `customerlocation`, `customertype`, `briefinfo`, `customer_status`, `created_at`, `updated_at`) VALUES
(1, 'Jane Doe', '0123456789', 'Plot 7, Kumi Road, Mbale', 'Supermarket', 'retail shop for roasted coffee beans and coffee diner', 'suspended', '2023-11-01 19:46:47', '2023-11-14 16:34:35'),
(2, 'Larry Harisson', '0123456789', 'Main street, Soroti', 'Coffee Shop', 'other info about customer', 'active', '2023-11-03 19:09:44', '2023-11-03 19:09:44'),
(3, 'Jimmy\'s', '0123456789', 'Republic Street , Mbale City', 'Restaurant', 'Customer Details e.g email if any', 'active', '2023-11-03 19:10:43', '2023-11-03 19:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(200) NOT NULL,
  `receiptnumber` longtext NOT NULL,
  `customer` longtext NOT NULL,
  `productname` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `unitprice` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `status` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `amount` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `receiptnumber`, `customer`, `productname`, `quantity`, `unitprice`, `otherinfo`, `status`, `handler`, `amount`, `created_at`, `updated_at`) VALUES
(1, '9276', '1', '5', '20', '10000', 'Bubyangu Cooperative Society', 'paid', '2', '200000', '2020-11-18 15:53:37', '2023-11-16 12:06:43'),
(2, '98971', '2', '4', '15', '8500', 'Parchment Batch No. 53467892', 'paid', '3', '127500', '2021-08-09 15:54:43', '2023-11-16 12:07:02'),
(3, '2051', '2', '3', '5', '9600', 'Parchment Batch. 098976522', 'cancelled', '2', '48000', '2022-11-17 15:55:45', '2023-11-16 12:07:11'),
(4, '0987', '2', '2', '10', '5000', 'we bought on credit pending final payment on 12th December 2023', 'partial', '2', '40000', '2023-11-06 09:38:47', '2023-11-06 09:38:47'),
(5, '9871', '2', '4', '15', '8500', 'Parchment Batch No. 53467892', 'paid', '3', '127500', '2023-11-04 15:54:43', '2023-11-06 09:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `green_beans`
--

CREATE TABLE `green_beans` (
  `id` bigint(200) NOT NULL,
  `coffeegrade` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `batchnumber` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `processing_status` longtext NOT NULL,
  `remaining` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `green_beans`
--

INSERT INTO `green_beans` (`id`, `coffeegrade`, `quantity`, `batchnumber`, `handler`, `otherinfo`, `processing_status`, `remaining`, `created_at`, `updated_at`) VALUES
(1, '3', '10000', '17765517', '2', '24 bags, store 37', 'complete', '9325', '2023-11-03 21:17:22', '2023-11-04 09:11:08'),
(2, '1', '2000', '24441988', '2', '10 bags,\r\nstore 1\r\nExport Grade,\r\nHwasong - Global Pre-Order', 'cancelled', '2000', '2023-03-15 21:23:29', '2023-11-14 16:15:56'),
(3, '4', '787', '37579291', '2', '25 Bags,\r\nStore 7', 'complete', '661', '2023-06-28 21:32:47', '2023-11-14 16:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `liquoring`
--

CREATE TABLE `liquoring` (
  `id` bigint(200) NOT NULL,
  `customer` longtext NOT NULL,
  `request_id` longtext NOT NULL,
  `green_bean_id` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `status` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `liquoring`
--

INSERT INTO `liquoring` (`id`, `customer`, `request_id`, `green_bean_id`, `handler`, `quantity`, `otherinfo`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '37579291', '3', '2', '100', 'Lorem Ipsum Dolor Et Is A Placeholder Text famousely Used In The Printing Industry', 'cancelled', '2023-11-04 08:06:59', '2023-11-04 09:12:54'),
(2, '1', '17765517', '1', '2', '26', 'Lorem Ipsum Dolor Et Is A Placeholder Text famousely Used In The Printing Industry', 'cancelled', '2023-11-04 08:12:48', '2023-11-04 09:12:54'),
(3, '3', '433576', '3', '2', '126', 'Lorem Ipsum Dolor Et Is A Placeholder Text famousely Used In The Printing Industry', 'approved', '2023-11-04 08:36:05', '2023-11-14 16:06:51'),
(4, '1', '842820', '1', '2', '75', 'Lorem Ipsum Dolor Et Is A Placeholder Text famousely Used In The Printing Industry', 'approved', '2023-11-04 09:08:58', '2023-11-04 09:12:54'),
(5, '3', '858964', '1', '2', '600', 'Lorem Ipsum Dolor Et Is A Placeholder Text famousely Used In The Printing Industry', 'approved', '2023-11-04 09:11:08', '2023-11-04 09:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `opening_balances`
--

CREATE TABLE `opening_balances` (
  `id` bigint(200) NOT NULL,
  `coffeegrade` longtext NOT NULL,
  `alertlevel` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opening_balances`
--

INSERT INTO `opening_balances` (`id`, `coffeegrade`, `alertlevel`, `created_at`, `updated_at`) VALUES
(7, '2019-01-01', '3000000', '2023-11-16 09:31:56', '2023-11-16 12:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `parchment`
--

CREATE TABLE `parchment` (
  `id` bigint(200) NOT NULL,
  `supplier` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `unitprice` longtext NOT NULL,
  `batchnumber` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `remaining` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purchase_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parchment`
--

INSERT INTO `parchment` (`id`, `supplier`, `quantity`, `unitprice`, `batchnumber`, `handler`, `otherinfo`, `remaining`, `created_at`, `updated_at`, `purchase_status`) VALUES
(1, '1', '29.92', '11000', '81194661', '2', '7.9 - moisture content\r\n', '9.92', '2023-11-02 08:33:15', '2023-11-03 17:36:24', 'active'),
(2, '2', '267.987', '10000', '22796893', '2', '10% moisture\r\n2.4% defects', '196.987', '2023-11-03 10:51:18', '2023-11-14 16:27:44', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `processing`
--

CREATE TABLE `processing` (
  `id` bigint(200) NOT NULL,
  `batchnumber` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `parch_id` longtext NOT NULL,
  `status` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `processing`
--

INSERT INTO `processing` (`id`, `batchnumber`, `quantity`, `parch_id`, `status`, `handler`, `otherinfo`, `created_at`, `updated_at`) VALUES
(1, '81194661', '20', '1', 'cancelled', '1', '', '2023-11-03 16:35:46', '2023-11-03 17:30:45'),
(2, '22796893', '16', '2', 'approved', '2', '', '2023-11-03 16:35:59', '2023-11-14 16:27:44'),
(3, '22796893', '55', '2', 'approved', '2', '', '2023-11-03 16:36:11', '2023-11-03 17:39:22'),
(5, '81194661', '20', '1', 'approved', '2', '7.9 - moisture content\r\n', '2023-11-03 17:36:24', '2023-11-03 17:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(200) NOT NULL,
  `itemsupply` longtext NOT NULL,
  `status` longtext NOT NULL,
  `unitmeasurement` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemsupply`, `status`, `unitmeasurement`, `created_at`, `updated_at`) VALUES
(6, 'Green Beans', 'suspended', 'Kgs', '2023-11-01 21:20:02', '2023-11-14 16:38:16'),
(7, 'Roasted Beans', 'active', 'Kgs', '2023-11-01 21:20:11', '2023-11-06 11:37:54'),
(8, 'Coffee Roasting', 'active', 'Kgs', '2023-11-01 21:20:21', '2023-11-06 11:37:59'),
(9, 'Coffee Grading', 'suspended', 'Kgs', '2023-11-01 21:20:31', '2023-11-14 16:38:21'),
(10, 'Coffee Grinding', 'active', 'Kgs', '2023-11-01 21:20:42', '2023-11-14 16:38:10'),
(12, 'Coffee Husks', 'active', 'Kgs', '2023-11-06 19:53:28', '2023-11-06 19:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(200) NOT NULL,
  `receiptnumber` longtext NOT NULL,
  `customer` longtext NOT NULL,
  `productname` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `unitprice` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `status` longtext NOT NULL,
  `handler` longtext NOT NULL,
  `amount` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `receiptnumber`, `customer`, `productname`, `quantity`, `unitprice`, `otherinfo`, `status`, `handler`, `amount`, `created_at`, `updated_at`) VALUES
(1, '11338452', '3', '6', '10', '15000', 'AA - Grade', 'paid', '3', '15000', '2023-11-04 13:58:28', '2023-11-04 14:22:21'),
(2, '34523904', '2', '7', '25', '22000', 'PB - Roasted Beans 25Kg', 'partial', '3', '18000', '2020-11-11 13:59:30', '2023-11-16 16:55:22'),
(3, '69790159', '2', '8', '300', '2500', 'Roasted 300KG of green beans on order from Larry Harison.', 'unpaid', '2', '0', '2023-11-04 14:00:32', '2023-11-04 14:23:04'),
(4, '95955076', '3', '9', '10', '3000', 'Coffee Grading of 10Kgs of green beans', 'paid', '3', '30000', '2022-11-15 14:20:30', '2023-11-16 17:56:09'),
(5, '6265264', '2', '6', '100', '15000', 'took AA Grade on Credit at permision of Manager', 'unpaid', '2', '0', '2023-11-04 14:46:39', '2023-11-04 14:46:39'),
(6, '17824678', '3', '8', '10', '2500', 'roasted 10 kg of green beans at request of director', 'partial', '3', '10000', '2023-11-04 14:47:52', '2023-11-04 15:01:27'),
(7, '83183442', '3', '8', '10', '4000', 'hi test', 'partial', '2', '30000', '2023-11-14 08:09:04', '2023-11-14 08:09:04'),
(8, '92460484', '3', '6', '10', '10000', 'test two', 'paid', '3', '100000', '2023-11-14 08:09:37', '2023-11-14 08:09:37'),
(9, '25070639', '3', '12', '20', '600', 'unpaid test', 'cancelled', '3', '0', '2023-11-14 08:10:09', '2023-11-14 15:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `staffinformation`
--

CREATE TABLE `staffinformation` (
  `id` bigint(200) NOT NULL,
  `staffname` longtext NOT NULL,
  `staffposition` longtext NOT NULL,
  `staffallowances` longtext NOT NULL,
  `staffsalary` longtext NOT NULL,
  `staffimage` longtext NOT NULL,
  `staffcv` longtext NOT NULL,
  `otherinfo` longtext NOT NULL,
  `staff_status` longtext NOT NULL,
  `staff_code` longtext NOT NULL,
  `managesupplies` int(11) NOT NULL,
  `managesuppliers` int(11) NOT NULL,
  `manageproducts` int(11) NOT NULL,
  `managecustomers` int(11) NOT NULL,
  `manageparchment` int(11) NOT NULL,
  `processparchment` int(11) NOT NULL,
  `managegreenbeans` int(11) NOT NULL,
  `processgreenbeans` int(11) NOT NULL,
  `managesales` int(11) NOT NULL,
  `manageexpenses` int(11) NOT NULL,
  `managestaff` int(11) NOT NULL,
  `accessreports` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffinformation`
--

INSERT INTO `staffinformation` (`id`, `staffname`, `staffposition`, `staffallowances`, `staffsalary`, `staffimage`, `staffcv`, `otherinfo`, `staff_status`, `staff_code`, `managesupplies`, `managesuppliers`, `manageproducts`, `managecustomers`, `manageparchment`, `processparchment`, `managegreenbeans`, `processgreenbeans`, `managesales`, `manageexpenses`, `managestaff`, `accessreports`, `created_at`, `updated_at`) VALUES
(1, 'James Doe', 'Manager', '300000', '300000', 'James Doe-155fa09596c7e18e50b58eb7e0c6ccb4-chefs-1.jpg', 'James Doe-97ffcbd95363387c7e371563057eb02f-CV.docx', 'On Contract for 5years starting 15th Jan 2023', 'fired', '27634', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-11-02 07:43:02', '2023-11-14 10:07:27'),
(2, 'Tom Doe', 'Assistant Manager', '260000', '260000', 'Tom Doe-0c836be97564457619349887cf51b3ba-chefs-3.jpg', 'Tom Doe-367692068f069c135b7d5a3a59e470d3-CV.docx', 'on contract for 3years starting 2022', 'active', '12912', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2023-11-02 07:44:32', '2023-11-14 10:07:01'),
(3, 'Larry Doe', 'Quality Clerk', '200000', '300000', 'Larry Doe-b97f138920c54acf5eb77d23bc318b12-chefs-2.jpg', 'Larry Doe-d9a5cf487c8317dba2cc8fafcf8a18a8-CV.docx', 'Other Information Here...', 'active', '32712', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2023-11-04 13:54:59', '2023-11-14 19:43:55'),
(4, 'Atim Doe', 'Public Relation & Marketing', '200000', '300000', 'Atim Doe-d7b431b1a0cc5f032399870ff4710743-about-2.jpg', 'Atim Doe-7634ea65a4e6d9041cfd3f7de18e334a-CV.docx', 'atim@gmail.com\r\nhome address', 'active', '16706', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-14 20:01:11', '2023-11-14 20:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(200) NOT NULL,
  `suppliername` longtext NOT NULL,
  `supplierphone` longtext NOT NULL,
  `supplierlocation` longtext NOT NULL,
  `suppliertype` longtext NOT NULL,
  `briefinfo` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `supplier_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `suppliername`, `supplierphone`, `supplierlocation`, `suppliertype`, `briefinfo`, `created_at`, `updated_at`, `supplier_status`) VALUES
(1, 'John Doe', '0123456789', 'Buginyanya', '2', 'farmer that supplies parchment coffee in buginyanya, Sironko District', '2023-11-01 18:18:54', '2023-11-02 17:30:28', 'active'),
(2, 'Diva Larry', '0123456789', 'Namabasa', '2', 'Namabasa Coffee SACCO', '2023-11-02 17:32:05', '2023-11-02 17:32:05', 'active'),
(3, 'Harry Morgan', '0123456789', 'Busano', '5', 'Busano Cooperative Society', '2023-11-02 17:32:46', '2023-11-02 23:10:30', 'suspended');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` bigint(200) NOT NULL,
  `status` longtext NOT NULL,
  `itemsupply` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `unitmeasurement` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `status`, `itemsupply`, `created_at`, `updated_at`, `unitmeasurement`) VALUES
(2, 'active', 'Parchment Coffee', '2023-07-11 18:09:52', '2023-11-06 10:41:04', 'Kg'),
(3, 'suspended', 'Green Beans', '2023-09-14 18:10:02', '2023-11-06 10:41:11', 'Kg'),
(4, 'suspended', 'Coffee Roaster', '2023-10-18 18:10:12', '2023-11-06 10:41:23', 'Pcs'),
(5, 'suspended', 'Stationery', '2023-11-01 18:10:39', '2023-11-06 10:41:30', 'Pcs'),
(6, 'active', 'Electricity', '2023-11-06 19:49:40', '2023-11-06 19:49:40', 'Watts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_grades`
--
ALTER TABLE `coffee_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `green_beans`
--
ALTER TABLE `green_beans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liquoring`
--
ALTER TABLE `liquoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_balances`
--
ALTER TABLE `opening_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parchment`
--
ALTER TABLE `parchment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processing`
--
ALTER TABLE `processing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffinformation`
--
ALTER TABLE `staffinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coffee_grades`
--
ALTER TABLE `coffee_grades`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `green_beans`
--
ALTER TABLE `green_beans`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liquoring`
--
ALTER TABLE `liquoring`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opening_balances`
--
ALTER TABLE `opening_balances`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parchment`
--
ALTER TABLE `parchment`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processing`
--
ALTER TABLE `processing`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staffinformation`
--
ALTER TABLE `staffinformation`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
