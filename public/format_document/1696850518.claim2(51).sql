-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 10:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claim2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mdls`
--

CREATE TABLE `admin_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authourised` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ar_creditor_class_mdls`
--

CREATE TABLE `ar_creditor_class_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_id` bigint(20) UNSIGNED NOT NULL,
  `creditor_classess` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `update_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ar_creditor_class_mdls`
--

INSERT INTO `ar_creditor_class_mdls` (`id`, `ar_id`, `creditor_classess`, `ar1`, `ar2`, `ar3`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`, `status`, `rem_addr`) VALUES
(5, 25, 'bh', '13', '13', '13', '2023-06-28 15:22:12', 15, '', '', '2', '', '', '1', '122.161.48.202'),
(6, 29, 'A1', '13', '15', '13', '2023-09-05 10:56:34', 7, '', '', '2', '', '', '1', '122.161.53.108'),
(7, 29, 'B1', '13', '15', '15', '2023-09-05 10:56:34', 7, '', '', '1', '2023-09-05 10:56:54', '7', '2', '122.161.53.108'),
(8, 30, 'sdf', '15', '18', '18', '2023-09-06 11:53:22', 28, '', '', '2', '', '', '1', '122.161.53.108'),
(9, 30, 'dsfg', '15', '18', '18', '2023-09-06 11:53:22', 28, '', '', '2', '', '', '1', '122.161.53.108'),
(10, 33, 'NA', '', '', '', '2023-09-15 21:39:17', 7, '', '', '2', '', '', '1', '182.69.180.169');

-- --------------------------------------------------------

--
-- Table structure for table `ar_mdls`
--

CREATE TABLE `ar_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ar_mdls`
--

INSERT INTO `ar_mdls` (`id`, `user_id`, `name`, `status`, `rem_addr`, `date`, `created_at`, `updated_at`) VALUES
(1, '7', 'AR-003', '1', '122.161.50.221', '2022-08-19', '2022-08-18 21:01:47', '2023-08-08 12:38:29'),
(2, '7', 'AR-002', '1', '122.161.50.221', '2022-08-19', '2022-08-18 21:02:03', '2023-08-08 12:38:23'),
(3, '7', 'AR-001', '1', '122.161.50.221', '2022-08-19', '2022-08-18 21:02:15', '2023-08-08 12:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `assign_company_mdls`
--

CREATE TABLE `assign_company_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `ip_id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termination_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `update_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_company_mdls`
--

INSERT INTO `assign_company_mdls` (`id`, `main_id`, `update_id`, `company_id`, `ip_id`, `designation`, `appointment_date`, `termination_date`, `status`, `rem_addr`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`) VALUES
(21, '', '', 3, 15, 'IRP', '2023-04-03', '2023-05-09 11:50', '2', '127.0.0.1', '2023-04-21 16:34:55', 7, '2023-05-09 11:50:26', '7', '2', '', ''),
(22, '', '', 11, 13, 'IRP', '2023-04-02', '', '1', '127.0.0.1', '2023-04-21 17:14:59', 13, '2023-04-21 17:14:59', '', '2', '', ''),
(23, '', '', 12, 26, 'IRP', '2023-04-23', '', '1', '103.195.201.10', '2023-04-23 17:21:55', 7, '2023-04-23 17:21:55', '', '2', '', ''),
(24, '', '', 13, 26, 'IRP', '2023-04-23', '', '1', '103.195.201.10', '2023-04-23 17:29:27', 7, '2023-04-23 17:29:27', '', '2', '', ''),
(25, '', '', 14, 27, 'IRP', '2023-04-27', '2023-04-27 16:14', '2', '122.161.53.234', '2023-04-27 16:08:53', 7, '2023-04-27 16:14:52', '7', '1', '2023-04-27 16:11:33', '7'),
(26, '', '', 14, 26, 'IRP', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 16:14:52', 7, '2023-04-27 16:21:11', '7', '1', '2023-04-27 16:40:55', '7'),
(27, '', '', 14, 27, 'IRP', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 16:15:27', 7, '2023-04-27 16:40:28', '7', '2', '', ''),
(28, '', '', 10, 27, 'IRP', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 17:06:34', 7, '2023-04-27 17:06:34', '', '2', '', ''),
(29, '', '', 15, 27, 'IRP', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 17:08:33', 27, '2023-04-27 17:08:33', '', '2', '', ''),
(30, '', '', 16, 27, 'AR', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 18:03:46', 27, '2023-04-27 18:03:46', '', '2', '', ''),
(31, '', '', 16, 27, 'AR', '2023-04-27', '2023-04-27 18:19', '2', '122.161.50.221', '2023-04-27 18:08:27', 27, '2023-04-27 18:19:09', '7', '1', '2023-08-08 18:02:55', '7'),
(32, '', '', 16, 27, 'IRP', '2023-04-27', '', '1', '122.161.53.234', '2023-04-27 18:19:09', 7, '2023-04-27 18:19:09', '', '2', '', ''),
(33, '', '', 13, 28, 'IRP', '2023-04-21', '2023-04-28 14:39', '2', '122.161.53.234', '2023-04-27 18:40:47', 7, '2023-04-28 14:39:52', '7', '2', '', ''),
(34, '', '', 17, 28, 'IRP', '2023-04-27', '', '1', '103.212.158.112', '2023-04-27 19:04:33', 28, '2023-04-27 19:04:33', '', '2', '', ''),
(35, '', '', 13, 27, 'IRP', '2023-04-21', '', '1', '122.161.53.234', '2023-04-28 14:39:52', 7, '2023-04-28 14:39:52', '', '2', '', ''),
(38, '', '', 2, 15, 'AR', '2022-12-02', '', '1', '127.0.0.1', '2023-05-02 18:24:56', 7, '2023-05-02 18:24:56', '', '2', '', ''),
(39, '', '', 2, 15, 'AR', '2022-12-02', '', '1', '127.0.0.1', '2023-05-03 12:18:20', 7, '2023-05-03 12:18:20', '', '2', '', ''),
(40, '', '', 3, 15, 'RP', '2023-04-03', '', '1', '127.0.0.1', '2023-05-09 11:50:26', 7, '2023-05-09 11:50:26', '', '2', '', ''),
(41, '', '', 19, 15, 'AR', '2023-08-07', '', '1', '122.161.50.221', '2023-08-08 11:52:33', 7, '2023-08-08 11:52:33', '', '2', '', ''),
(42, '', '', 19, 28, 'AR', '2023-08-07', '', '1', '122.161.50.89', '2023-08-10 11:49:32', 7, '2023-08-10 11:49:32', '', '2', '', ''),
(43, '', '', 20, 28, 'AR', '2023-08-10', '', '1', '122.161.50.89', '2023-08-10 14:34:55', 7, '2023-08-10 14:34:55', '', '2', '', ''),
(44, '', '', 17, 28, 'IRP', '2023-04-27', '', '1', '122.161.50.89', '2023-08-10 14:35:23', 7, '2023-08-10 14:35:23', '', '2', '', ''),
(45, '', '', 21, 28, 'IRP', '2023-09-04', '', '1', '122.161.53.123', '2023-09-04 18:24:06', 7, '2023-09-04 18:24:06', '', '2', '', ''),
(46, '', '', 23, 30, 'RP', '2023-09-15', '2023-09-15 10:52', '2', '122.161.53.243', '2023-09-15 10:47:27', 7, '2023-09-15 10:52:49', '7', '1', '2023-09-15 10:53:02', '7'),
(47, '', '', 24, 30, 'RP', '2023-09-15', '', '1', '122.161.53.243', '2023-09-15 10:52:40', 7, '2023-09-15 10:52:40', '', '1', '2023-09-15 10:53:06', '7'),
(48, '', '', 24, 30, 'RP', '2023-09-15', '', '1', '122.161.50.102', '2023-09-15 10:52:49', 7, '2023-09-15 16:46:28', '7', '2', '', ''),
(49, '', '', 23, 31, 'IRP', '2023-09-15', '2023-09-19 12:57', '2', '122.161.53.189', '2023-09-15 10:56:15', 7, '2023-09-19 12:57:48', '7', '2', '', ''),
(50, '', '', 25, 32, 'IRP', '2023-09-14', '', '1', '182.69.180.169', '2023-09-15 21:20:32', 7, '2023-09-15 21:20:32', '', '2', '', ''),
(51, '', '', 2, 31, 'IRP', '2023-09-15', '', '1', '122.161.53.189', '2023-09-19 12:57:48', 7, '2023-09-19 12:57:48', '', '2', '', ''),
(52, '', '', 23, 31, 'IRP', '2023-09-15', '', '1', '122.161.53.189', '2023-09-19 14:10:00', 7, '2023-09-19 14:10:00', '', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authentication_mdls`
--

CREATE TABLE `authentication_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentication_mdls`
--

INSERT INTO `authentication_mdls` (`id`, `user_id`, `type`, `status`, `rem_addr`, `date`, `created_at`, `updated_at`) VALUES
(1, '7', 'sms', 'yes', '::1', '2023-05-31', '2022-08-18 23:08:26', '2023-05-31 07:00:12'),
(2, '7', 'email', 'yes', '127.0.0.1', '2023-05-31', '2023-05-31 07:20:47', '2023-05-31 07:20:47'),
(3, '7', 'both', 'yes', '127.0.0.1', '2023-05-31', '2023-05-31 07:21:09', '2023-05-31 07:21:09'),
(4, '7', 'email', 'yes', '127.0.0.1', '2023-05-31', '2023-05-31 07:21:47', '2023-05-31 07:21:47'),
(5, '13', 'email', 'yes', '::1', '2023-05-31', '2023-05-31 07:23:08', '2023-05-31 07:23:08'),
(6, '13', 'sms', 'yes', '::1', '2023-05-31', '2023-05-31 07:23:21', '2023-05-31 07:23:21'),
(8, '15', 'none', 'yes', '122.161.48.202', '2023-06-28', '2023-06-28 07:53:46', '2023-06-28 07:53:46'),
(9, '15', 'sms', 'yes', '122.161.48.202', '2023-06-28', '2023-06-28 10:41:15', '2023-06-28 10:41:15'),
(10, '15', 'none', 'yes', '122.161.48.202', '2023-06-28', '2023-06-28 10:46:13', '2023-06-28 10:46:13'),
(11, '7', 'none', 'yes', '122.161.50.221', '2023-08-08', '2023-08-08 05:59:45', '2023-08-08 05:59:45'),
(12, '7', 'none', 'yes', '122.161.50.71', '2023-09-02', '2023-09-02 06:33:14', '2023-09-02 06:33:14'),
(13, '7', 'none', 'yes', '122.161.50.71', '2023-09-02', '2023-09-02 06:34:26', '2023-09-02 06:34:26'),
(14, '7', 'both', 'yes', '122.161.53.189', '2023-09-20', '2023-09-20 05:22:47', '2023-09-20 05:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `claimant_mdls`
--

CREATE TABLE `claimant_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_dtls`
--

CREATE TABLE `company_dtls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'created_by',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nclt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_filing_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1 for Yes, 2 for No',
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_dtls`
--

INSERT INTO `company_dtls` (`id`, `user_id`, `name`, `address`, `insolvency_commencement_date`, `nclt`, `claim_filing_date`, `start_date`, `end_date`, `status`, `case_type`, `rem_addr`, `created_at`, `updated_at`, `updated_by`, `deleted`, `deleted_by`, `deleted_time`) VALUES
(2, '7', 'jindal ltd.', 'pitam pura', '2022-12-02', 'sdfdf', '2022-12-29', '2022-12-17', '2022-12-07', '1', '', '127.0.0.1', '', '2023-03-01 10:41:55', '', '2', '', '2023-02-14 12:25:39'),
(3, '7', 'Indus Bank', 'karol bagh', '2023-01-01', 'nclt', '2023-01-25', '2022-12-01', '2023-02-10', '1', '', '122.161.53.234', '', '2023-04-28 11:58:00', '7', '2', '', ''),
(6, '7', 'rajveer', 'jshf', '2023-02-14', 'dfd', '2023-02-26', '2023-02-03', '2023-02-15', '1', '', '127.0.0.1', '2023-02-14 12:27:28', '2023-02-14 12:28:21', '', '1', '7', '2023-02-14 12:28:21'),
(7, '7', 'Bhawani Enterprises', 'civil line', '2023-02-02', '', '2023-02-25', '2023-02-16', '', '1', '', '127.0.0.1', '2023-02-16 10:41:45', '', '', '2', '', ''),
(9, '7', 'sdf', 'dfs', '', '', '', '', '', '1', '', '127.0.0.1', '2023-03-30 15:44:41', '2023-03-30 15:44:46', '', '1', '7', '2023-03-30 15:44:46'),
(10, '7', 'Holy Heights Infrastructures Private Limited', '198/1 Rajpur Road Dhakpatti, Dehradun Uttrakhand 248001', '2023-02-22', 'RoC-Uttarakhand', '2023-04-14', '2015-11-19', '2023-08-21', '1', '', '127.0.0.1', '2023-04-03 11:30:13', '', '', '2', '', ''),
(11, '13', 'Ramesh & Suresh Associates', 'rohini', '2023-04-15', '4321', '2023-04-29', '2023-04-15', '2023-10-12', '1', '', '122.161.50.89', '2023-04-15 12:07:03', '2023-08-10 11:43:00', '7', '2', '', ''),
(12, '7', 'ABC Housing Project', 'Panchkula, Haryana', '2023-04-20', 'NCLT, Chandigarh', '2023-05-04', '2023-04-23', '2023-10-17', '1', '', '103.195.201.10', '2023-04-23 17:16:34', '', '', '2', '', ''),
(13, '7', 'XYZ Pvt Ltd', 'Pitampura, Delhi', '2023-04-21', 'NCLT, Chandigarh', '2023-05-05', '2022-01-07', '2023-10-18', '1', '', '103.195.201.10', '2023-04-23 17:28:42', '', '', '2', '', ''),
(14, '7', 'Saksham Enterprises', 'Hapur, Uttar Pradesh', '2023-04-27', 'NCLT', '2023-05-11', '2018-01-01', '2023-10-24', '1', '', '122.161.53.234', '2023-04-27 16:01:45', '2023-04-28 11:56:03', '7', '2', '', ''),
(15, '27', 'Test2 Pvt Ltd', 'Pitampura', '2023-04-27', 'NCLT', '2023-05-11', '2018-01-01', '2023-10-24', '1', '', '122.161.53.234', '2023-04-27 16:46:11', '', '', '2', '', ''),
(16, '27', 'Larsen & Turbo LTD', 'D34', '2023-04-27', 'error', '2023-05-11', '2023-04-27', '2023-10-26', '1', '', '122.161.53.234', '2023-04-27 18:00:04', '2023-04-27 18:27:33', '7', '2', '', ''),
(17, '28', 'UNITE PVT LTD.', 'NEW DELHI', '2023-04-27', 'IBBI', '2023-05-11', '2023-04-27', '2023-10-24', '1', '', '103.212.158.112', '2023-04-27 19:03:20', '', '', '2', '', ''),
(18, '15', 'nnn1', 'nnn', '2023-06-28', '', '2023-07-12', '2023-06-28', '2023-12-25', '1', '', '122.161.48.202', '2023-06-28 15:20:12', '2023-06-28 15:20:50', '15', '1', '15', '2023-06-28 15:20:50'),
(19, '7', 'Delloitte', '23-A, yorti next, new york', '2023-08-07', 'resist', '2023-08-21', '2023-08-17', '2024-02-03', '1', '', '122.161.50.221', '2023-08-07 12:05:31', '', '', '2', '', ''),
(20, '28', 'solt infotech pvt ltd', '123 , sector3', '', '', '', '', '', '1', '', '122.161.50.89', '2023-08-10 14:28:24', '', '', '2', '', ''),
(21, '7', 'Genpact pvt ltd', 'Gurgaon', '2023-09-04', 'Genpact', '2023-09-18', '2023-09-04', '2024-03-02', '1', '', '122.161.53.123', '2023-09-04 18:05:49', '2023-09-04 18:06:21', '7', '2', '', ''),
(22, '28', 'SABEREDGE DSDF', 'RANI BAGH', '2023-09-06', 'CORPORATE DEBTOR123', '2023-09-20', '2023-09-06', '2024-03-04', '1', '', '122.161.53.189', '2023-09-06 11:50:40', '2023-09-21 16:30:18', '7', '2', '', ''),
(23, '7', 'Maxima Pvt. Ltd.', '1860, Tungareshwar House, Tungareshwar Industrial Estate, Opp. Saraswati Building, Sativali Vasai-East Thane, Maharashtra-401208', '2023-09-15', '', '2023-09-29', '', '2024-03-13', '1', '', '122.161.53.189', '2023-09-15 10:30:57', '2023-09-21 16:29:52', '7', '2', '', ''),
(24, '7', 'Shubhkamna Pvt. Ltd.', '1864, Tungareshwar House, Tungareshwar Industrial Estate, Opp. Saraswati Building, Sativali Vasai-East Thane, Maharashtra-401208', '2023-09-15', 'SHUBH94049KAMNA', '2023-09-29', '2023-09-21', '2024-03-13', '1', '', '122.161.53.189', '2023-09-15 10:52:17', '2023-09-21 16:29:37', '7', '2', '', ''),
(25, '7', 'Kevin Ventures LLP', '1864, Tungareshwar House, Tungareshwar Industrial Estate, Opp. Saraswati Building, Sativali Vasai-East Thane, Maharashtra-401208', '2023-09-14', 'ROC Mumbai', '2023-09-28', '2015-10-07', '2024-03-12', '1', '', '182.69.180.169', '2023-09-15 21:19:28', '', '', '2', '', ''),
(26, '31', 'sdfsdf', 'asdf', '2023-09-13', '', '2023-09-27', '', '2024-03-11', '1', '', '127.0.0.1', '2023-09-22 18:29:42', '2023-09-22 18:31:10', '', '1', '31', '2023-09-22 18:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `main_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `design` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'old,latest,deleted',
  `unique_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `main_id`, `name`, `email`, `contact`, `design`, `picture`, `emp_type`, `emp_id`, `empl_id`, `rem_addr`, `status`, `status_type`, `unique_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(10, '', 'arvind jigsaw', 'kvishal737', '8766788822', 'wesrt', '', 'sb', '1', 'sb1001', '122.161.50.221', '1', 'latest', '64d09994087871691392404', '7', '2023-08-07 12:43:24', '7', '2023-08-08 17:56:09', '', ''),
(11, '', 'viKAS', 'vikas@gmail.com', '7701931016', 'SOFTWARE ENGEENIRE', '64f5b07d537271693823101.jpg', 'sb', '2', 'sb1002', '122.161.53.123', '1', 'deleted', '64f5b07d52ff41693823101', '7', '2023-09-04 15:55:01', '7', '2023-09-04 16:03:38', '7', '2023-09-04 16:05:16'),
(12, '', 'vikasxcvbnm', 'vikasj@gmail.com', '7701931016', 'software engeenir', '64f5b0d46a6611693823188.png', 'sb', '3', 'sb1003', '122.161.53.123', '1', 'latest', '64f5b0d46a2901693823188', '7', '2023-09-04 15:56:28', '7', '2023-09-04 16:03:50', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_creditor_form_ca_mdls`
--

CREATE TABLE `financial_creditor_form_ca_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-ca',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_identification_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_amt` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_principle` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_interest` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debt_incurred_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_mutual_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_held` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_ifsc_code` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_professional_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_signature` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_position` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification) ',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_creditor_form_ca_mdls`
--

INSERT INTO `financial_creditor_form_ca_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_ca_selected_id`, `fc_name`, `fc_identification_number`, `fc_address`, `fc_email`, `claim_amt`, `claim_principle`, `claim_interest`, `document_details`, `debt_incurred_details`, `other_mutual_details`, `security_held`, `bank_account_number`, `bank_name`, `bank_ifsc_code`, `insolvency_professional_name`, `fc_signature`, `signing_person_name`, `creditor_position`, `signing_address`, `place`, `insolvency_commencement_date`, `select_option`, `unique_id`, `user_unique_id`, `year`, `dat`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(49, '3', '15', '15', 56, 'financial-creditor-in-a-class', 'form-ca', '3', '49', 'ramesh', '', 'karol bagh', 'dinesh.sharma11013@gmail.com', '120', '100', '20', '', '', '', '', '', '', '', '', 'sign_647ec4ec4651e1686029548.jpg', 'DINESH', 'ca', 'mohan garden', 'delhi', '2023-01-01', '2', '647ec49ecc9891686029470', '6724509318', '', '', '', '', '1', '1', '2023-06-06 11:02:58', '2023-06-06', '2', '2', '1', 'latest', '127.0.0.1', '2023-06-06 05:32:28', '2023-06-06 05:32:58'),
(50, '15', '27', '21', 116, 'financial-creditor-in-a-class', 'form-ca', '3', '50', 'only_shriya', '', 'only_shriya', 'webdeveloper@jigsaw.edu.in', '', '', '', '', '', '', '', '', '', '', '', 'sign_64d0a2d001e441691394768.png', 'MM', 'operational creditor', '23-DRG', '', '2023-04-27', '1', '64d0a2ca68bd21691394762', '5073826419', '', '', '', '', '2', '2', '2023-08-07 13:22:42', '2023-08-07', '2', '2', '2', 'latest', '122.161.50.221', '2023-08-07 07:52:48', '2023-08-07 07:52:48'),
(51, '14', '27', '19', 118, 'financial-creditor-in-a-class', 'form-ca', '3', '51', 'Vishaluddin', '7894651320456', 'A-558 Pitampura UU block near AP market Delhi 110034', 'developer@gmail.com', '857850', '852400', '5450', 'Adhar card , pan card', 'Debt incurred', 'mutual credit, mutual debts', 'Securitiy held', '9655545555555555', 'SBI BANK', 'SB745554215452I', 'asdfg', 'sign_64f59080d9aa11693814912.jpg', 'VIKAS SINGH', 'asdfg', 'asdfg', '', '2023-04-27', '1', '64f590467e7d61693814854', '5412830679', '', '', '', '', '1', '1', '2023-09-04 13:38:44', '2023-09-04', '2', '2', '1', 'latest', '122.161.53.123', '2023-09-04 08:08:32', '2023-09-04 08:08:44'),
(52, '23', '31', '31', 120, 'financial-creditor-in-a-class', 'form-ca', '3', '52', 'Rashi Gupta', '1234560987', 'Delhi', 'mohan@gmail.com', '836012', '835759', '253', 'NA', 'NA', 'NA', 'NA', '89745326668', 'HDFC BANK', 'HDFC863379', 'NA', 'sign_650435c087d401694774720.png', 'MOHAN LAL KUMAR', 'AR', 'DELHI', 'DELHI', '2023-09-15', '1', '650435a61d0ad1694774694', '9573410286', '', '', '', '', '1', '1', '2023-09-15 16:15:41', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 10:45:20', '2023-09-15 10:45:41'),
(53, '24', '30', '32', 121, 'financial-creditor-in-a-class', 'form-ca', '2', '53', 'VIKRAM KUMAR', '47768UTDRU587', 'NEW DELHI', 'vikram@gmail.com', '470852', '465520', '5332', 'NA', 'NA', 'NA', 'NA', '45357877457', 'IDFC BANK', 'IDFC14276', 'NA', 'sign_65044428330221694778408.png', 'VIKRAM KUMAR', 'AUTHORIZED REPRESENTATIVE', 'DELHI', 'DELHI', '2023-09-15', '1', '650443f7e18b01694778359', '7509632481', '', '', '', '', '1', '1', '2023-09-15 17:17:34', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 11:46:48', '2023-09-15 11:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `finanicial_creditor_form_c_mdls`
--

CREATE TABLE `finanicial_creditor_form_c_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-c',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_identification_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_claim_amount` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_security_interest_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantee_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantor_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantor_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_claim_amount` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_security_interest_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_gaurantee_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_principal_borrower` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_address_borrower` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_claim_amt` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_beneficiary_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_beneficiary_address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debt_incurred_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_mutual_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_signature` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_position` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification) ',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finanicial_creditor_form_c_mdls`
--

INSERT INTO `finanicial_creditor_form_c_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_c_selected_id`, `fc_name`, `fc_identification_number`, `fc_address`, `fc_email`, `borrower_claim_amount`, `borrower_security_interest_amount`, `borrower_guarantee_amt`, `borrower_guarantor_name`, `borrower_guarantor_address`, `guarantor_claim_amount`, `guarantor_security_interest_amount`, `guarantor_gaurantee_amt`, `guarantor_principal_borrower`, `guarantor_address_borrower`, `financial_claim_amt`, `financial_beneficiary_name`, `financial_beneficiary_address`, `debt_incurred_details`, `other_mutual_details`, `bank_account_details`, `operational_creditor_signature`, `signing_person_name`, `creditor_position`, `signing_address`, `place`, `insolvency_commencement_date`, `select_option`, `unique_id`, `user_unique_id`, `year`, `dat`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(157, '3', '15', '15', 56, 'financial-creditor', 'form-c', '', '157', 'ravi kumar', '', '', 'dinesh.sharma11013@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_647d8928288b81685948712.jpg', 'DINESH', '', '', 'delhi 2', '2023-01-01', '2', '647d8897a36ad1685948567', '5814376209', '', '', '', '', '1', '1', '2023-06-05 12:35:27', '2023-06-05', '2', '2', '1', 'first', '127.0.0.1', '2023-06-05 12:32:47', '2023-06-05 12:35:27'),
(158, '3', '15', '15', 56, 'financial-creditor', 'form-c', '', '157', 'ravi kumar', '', '', 'dinesh.sharma11013@gmail.com', '100', '', '', '', '', '200', '', '', '', '', '3000', '', '', '', '', '', 'sign_647d8928288b81685948712.jpg', 'DINESH', '', '', 'delhi 21', '2023-01-01', '1', '647d8897a36ad1685948567', '5814376209', '', '', '', '', '1', '1', '2023-06-05 13:11:53', '2023-06-05', '2', '2', '2', 'latest', '127.0.0.1', '2023-06-05 12:32:47', '2023-06-05 13:11:53'),
(164, '14', '27', '19', 118, 'financial-creditor', 'form-c', '', '164', 'Vishal kumar', '874658965341', 'uu block C-24 pitampura delhi 110034', 'developer@gmail.com', '10000', '5400', '4100', 'GOlu', 'Dwarka c 23 Delhi 110058', '5000', '50', '540', 'AKash', 'Rohini sector 16 near aggarwal plaza', '5400', 'AKash', 'delhi', 'Details of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurredDetails of how and when debt incurred', 'mutual credit', 'Bank account :- 916010048857454\r\nbank name :- Axis bank\r\nifsc : - UTIB00000852', 'sign_64f2e946b74681693641030.jpg', 'VIKAS SINGH', 'fRIEND', 'dELHI', 'DELHI', '2023-04-27', '1', '64f2e61236b7c1693640210', '8376590214', '', '', '', '', '1', '1', '2023-09-04 13:58:58', '2023-09-04', '2', '2', '1', 'latest', '122.161.53.123', '2023-09-02 13:06:50', '2023-09-04 13:58:58'),
(165, '23', '31', '31', 120, 'financial-creditor', 'form-c', '', '165', 'MOHAN LAL KUMAR', '12345678964', 'New Delhi', 'mohan@gmail.com', '49942919', 'NA', 'NA', 'NA', 'NA', '1234567', 'NA', 'NA', 'NA', 'NA', '0', 'NA', 'NA', 'NA', 'NA', 'NA', 'sign_6504349d1c2bc1694774429.jpeg', 'MOHAN LAL KUMAR', 'Creditor', 'Delhi', 'New Delhi', '2023-09-15', '1', '65043450312b21694774352', '4891653207', '', '', '', '', '1', '1', '2023-09-15 16:10:38', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 16:09:12', '2023-09-15 16:10:38'),
(166, '24', '30', '32', 121, 'financial-creditor', 'form-c', '', '166', 'VIKRAM KUMAR', 'U67100MH2010PLC210201', 'DELHI', 'vikram@gmail.com', '1258214', '43384990.81', 'NA', 'NA', 'NA', '0', 'NA', 'NA', 'NA', 'NA', '546476', 'NA', 'NA', 'NA', 'NA', 'NA', 'sign_650442ce29a191694778062.png', 'VIKRAM KUMAR', 'COMPANY SECRETARY', 'DELHI', 'DELHI', '2023-09-15', '1', '6504427d0cf341694777981', '0637842915', '', '', '', '', '1', '1', '2023-09-15 17:11:11', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 17:09:41', '2023-09-15 17:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `form2_in_matter_corporate_debtors`
--

CREATE TABLE `form2_in_matter_corporate_debtors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `in_matter_corporate_debtor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_in_matter_corporate_debtors`
--

INSERT INTO `form2_in_matter_corporate_debtors` (`id`, `ip_id`, `form2_id`, `in_matter_corporate_debtor_name`, `created_at`, `updated_at`) VALUES
(12, 7, 62, 'Vishal Singh', '2023-08-07 12:47:16', '2023-08-08 11:31:35'),
(13, 7, 63, 'akash', '2023-09-04 18:30:10', '2023-09-18 12:13:55'),
(14, 7, 63, 'Vishal', '2023-09-04 18:30:10', '2023-09-18 12:13:55'),
(15, 7, 64, 'Jitender', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdls`
--

CREATE TABLE `form2_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_ipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_authorised_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conclusion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_of_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_cruptancy_trustee_individual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `individual_processes_rp_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_irp_assignment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_any_other_assignment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vs_name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_proposed_resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_insolvency_professional_agency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rehgisteration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_creditor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insovency_resolution_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inter_registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_rp_assgnmt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numbr_of_lqdtr_voluntry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_2_mdl_no_of_ar_assign_corporate_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `update_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdls`
--

INSERT INTO `form2_mdls` (`id`, `ip_ipe`, `sction`, `name_authorised_signature`, `first_date`, `conclusion`, `signature_of_ip`, `other_doc`, `bank_cruptancy_trustee_individual`, `individual_processes_rp_number`, `no_of_irp_assignment`, `number_of_any_other_assignment`, `address`, `email`, `office_address`, `contact_number`, `bank_name`, `vs_name_of_corporate_debtor`, `name_of_proposed_resolution`, `name_of_insolvency_professional_agency`, `rehgisteration_number`, `name_of_creditor`, `insovency_resolution_corporate_debtor`, `inter_registration_number`, `signing_person_name`, `optional_certificate`, `date`, `name`, `number_of_rp_assgnmt`, `numbr_of_lqdtr_voluntry`, `form_2_mdl_no_of_ar_assign_corporate_process`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`, `rem_addr`, `unique_id`, `status`) VALUES
(60, '', '', '', '', '<p>dfgsdfg</p>', '', '1685612971593886885647869ab7ec31.png', '', '2', '2', '', '', '', '', '', '', 'rajhjh', '', '', '', '', '', '', '', '', '2023-06-01', '', '', '', '2', '2023-06-01 14:08:30', 7, '2023-06-01 15:19:31', '7', '2', '', '', '127.0.0.1', '6478590682db61685608710', '1'),
(61, '', '', '', '', '', '', '', '', '', '', '', 'dfsdf', 'asdf@gmail.com', 'df', '2342342343', '', '', '', '', '', '', '', '', '', '', '2023-06-14', 'sdf', '', '', '', '2023-06-14 12:35:34', 7, '2023-06-14 12:35:54', '7', '2', '', '', '127.0.0.1', '648966be6bc4a1686726334', '1'),
(62, '', '', '', '', '', '', '', '', '', '', '', 'RZB-152, karol bagh,new delhi-110041', 'kvishal737@gmail.com', 'RZB-152, karol bagh,new delhi-110041', '9230172390', '', '', '', '', '', '', '', '', '', '', '2023-08-07', 'Vinay Singh', '', '', '', '2023-08-07 12:47:16', 7, '2023-08-08 11:31:35', '7', '2', '', '', '122.161.50.221', '64d09a7c2da6d1691392636', '1'),
(63, 'IP', 'sec-7', 'ASDF908HJSDFGHJKSDFG', '', '<p>JSDAHDJHSADKHDKAHDSASD</p>', 'sign_64f5d4dab99451693832410.png', '169383275594443259364f5d633869f3.jpg', '1', '1', '1', '1', 'Delhi', 'admin@gmail.com', 'Rani bagh mahindra park', '7701931016', 'GOOGLE', 'GOOGLE', 'Sahani', 'OSRIK GROUP', '9808493030380', 'Yash sharma', 'Dinesh', '88767377829299', 'AAKASH', 'optC_64f5d517f06141693832471.png', '2023-09-04', 'VIKAS', '3', '1', '1', '2023-09-04 18:30:10', 7, '2023-09-18 12:13:55', '7', '2', '', '', '122.161.53.189', '64f5d4daad7f61693832410', '1'),
(64, 'IP', 'sec-8', '', '2023-09-19', '<p>asdfg</p>', 'sign_650996c64ba511695127238.jpg', '16951272381289915297650996c6505f4.jpg', '1', '1', '1', '1', 'Delhi', 'admin@gmail.com', 'Pitampura delhi', '7701931016', 'GOOGLE', 'Raja', 'Sahani', 'name of insolvency', '8990809890', 'Yash sharma', 'Dinesh', '88767377829299', 'aakash', 'optC_650996c64e5ce1695127238.jpg', '2023-09-19', 'VIKAS', '1', '1', '1', '2023-09-19 18:10:38', 7, '', '', '2', '', '', '122.161.53.189', '650996c6458d01695127238', '1');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_any_other_individiual_processes`
--

CREATE TABLE `form2_mdl_any_other_individiual_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_any_other_individiual_processes`
--

INSERT INTO `form2_mdl_any_other_individiual_processes` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(24, 63, 'Saurabh', '2023-09-04', '2023-09-04', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(25, 64, 'Vikrma vetal', '2023-09-27', '2023-09-27', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_ar_details`
--

CREATE TABLE `form2_mdl_ar_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_ar_details`
--

INSERT INTO `form2_mdl_ar_details` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(22, 60, '343', '2023-06-06', '2023-06-07', '2023-06-01 15:18:47', '2023-06-01 15:19:31'),
(23, 60, 'sdf', '2023-06-14', '2023-06-05', '2023-06-01 15:18:47', '2023-06-01 15:19:31'),
(24, 63, 'viJAY', '2023-09-04', '2023-09-12', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(25, 64, 'Vikasj', '2023-09-27', '2023-09-13', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_disclosures`
--

CREATE TABLE `form2_mdl_disclosures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `discosures` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_disclosures`
--

INSERT INTO `form2_mdl_disclosures` (`id`, `form2_id`, `discosures`, `created_at`, `updated_at`) VALUES
(26, 63, 'ASDFGV', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(28, 64, 'werfgwerfgwerfg', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_documents`
--

CREATE TABLE `form2_mdl_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_individiual_bank_cruptancies`
--

CREATE TABLE `form2_mdl_individiual_bank_cruptancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_individiual_bank_cruptancies`
--

INSERT INTO `form2_mdl_individiual_bank_cruptancies` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(23, 63, 'Sunil sdfgsdfg', '2023-09-04', '2023-09-13', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(24, 64, 'Sunil', '2023-09-19', '2023-09-19', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_individiual_rps`
--

CREATE TABLE `form2_mdl_individiual_rps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_individiual_rps`
--

INSERT INTO `form2_mdl_individiual_rps` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(20, 60, 'gfg', '2023-06-14', '2023-06-20', '2023-06-01 15:18:47', '2023-06-01 15:19:31'),
(21, 60, '43', '2023-06-20', '2023-06-19', '2023-06-01 15:18:47', '2023-06-01 15:19:31'),
(22, 63, 'DINESH', '2023-09-04', '2023-09-06', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(23, 64, 'PIYUSH', '2023-09-20', '2023-09-21', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_irps`
--

CREATE TABLE `form2_mdl_irps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_irps`
--

INSERT INTO `form2_mdl_irps` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(28, 60, '23df', '2023-06-14', '2023-06-07', '2023-06-01 14:08:30', '2023-06-01 15:19:31'),
(36, 60, '32dsf', '', '', '2023-06-01 15:16:57', '2023-06-01 15:19:31'),
(37, 60, '445', '', '', '2023-06-01 15:17:18', '2023-06-01 15:19:31'),
(38, 63, 'Akash', '2023-09-04', '2023-09-05', '2023-09-04 18:30:10', '2023-09-18 12:13:55'),
(39, 64, 'Akash', '2023-09-19', '2023-09-19', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_liquidator_volutaries`
--

CREATE TABLE `form2_mdl_liquidator_volutaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_liquidator_volutaries`
--

INSERT INTO `form2_mdl_liquidator_volutaries` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(18, 63, 'Om prakash', '2023-09-05', '2023-09-07', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(19, 64, 'Om prakash', '2023-09-19', '2023-09-22', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_mdl_rps`
--

CREATE TABLE `form2_mdl_rps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form2_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date_closure_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2_mdl_rps`
--

INSERT INTO `form2_mdl_rps` (`id`, `form2_id`, `name_of_corporate_debtor`, `commencement_date`, `expected_date_closure_process`, `created_at`, `updated_at`) VALUES
(16, 63, 'Vikrant', '2023-09-04', '2023-09-05', '2023-09-04 18:30:10', '2023-09-18 12:13:55'),
(18, 63, 'jIG', '2023-09-05', '2023-09-13', '2023-09-04 18:30:11', '2023-09-18 12:13:55'),
(19, 64, 'Chetan sharma', '2023-09-19', '2023-09-21', '2023-09-19 18:10:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `form_2_mdl_liquidator_voluntary`
--

CREATE TABLE `form_2_mdl_liquidator_voluntary` (
  `id` int(11) NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commencement_date` date DEFAULT NULL,
  `expected_date_closure_process` date DEFAULT NULL,
  `form_2_mdl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_aa_mdls`
--

CREATE TABLE `form_aa_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registeration_number_insolvency_professional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_of_insolvency_professional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_professional_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commeetee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_of_name_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_interim_resolution_professional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_of_corporate_debtor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_of_individuals` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liquidator_of_liquidation_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voluntary_liquiadation_process` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_cruptancy_trustee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorise_represantatvie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_of_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registeration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_assignment_valid_till` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regd_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `update_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_aa_mdls`
--

INSERT INTO `form_aa_mdls` (`id`, `first_date`, `from_name`, `registeration_number_insolvency_professional`, `address_of_insolvency_professional`, `address`, `email_id`, `name_of_corporate_debtor`, `insolvency_professional_name`, `insolvency_agency_name`, `commeetee_name`, `section`, `process_of_name_of_corporate_debtor`, `no_of_interim_resolution_professional`, `rp_of_corporate_debtor`, `rp_of_individuals`, `liquidator_of_liquidation_process`, `voluntary_liquiadation_process`, `bank_cruptancy_trustee`, `authorise_represantatvie`, `date`, `place`, `signature_of_ip`, `registeration_number`, `authorisation_assignment_valid_till`, `regd_address`, `down_date`, `down_place`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`, `rem_addr`, `unique_id`, `status`) VALUES
(3, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_64745953012b51685346643.jpg', '', '', '', '', '', '2023-05-29 13:20:42', 7, '', '', '2', '', '', '127.0.0.1', '64745952f04841685346642', '1'),
(4, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_64745a0728f361685346823.jpg', '', '', '', '', '', '2023-05-29 13:23:43', 7, '', '', '2', '', '', '127.0.0.1', '64745a07240591685346823', '1'),
(5, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-05-29 13:42:46', 7, '', '', '2', '', '', '127.0.0.1', '64745e7e698381685347966', '1'),
(6, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_64745e7e79b711685347966.jpg', '', '', '', '', '', '2023-05-29 13:42:46', 7, '', '', '2', '', '', '127.0.0.1', '64745e7e6959e1685347966', '1'),
(7, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_64745ecd117071685348045.jpg', '', '', '', '', '', '2023-05-29 13:44:05', 7, '', '', '2', '', '', '127.0.0.1', '64745ecd0a4871685348045', '1'),
(8, '', 'sdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_64745f5deb98e1685348189.jpg', '', '', '', '', '', '2023-05-29 13:46:29', 7, '2023-05-29 15:08:37', '7', '2', '', '', '127.0.0.1', '64745f5ddff7a1685348189', '1'),
(9, '2023-06-14', 'Aakash', 'sd', 'df', 'dsf', 'asdf@gmail.com', 'fad', 'amit', 'rahh', 'jhfjhh', '22(3)(a)', 'sdfsdfdsf 234234', 'df', 'sdf', 'sdf', 'sdf', 'g', 'dfsdf', 'asdf', '2023-06-14', 'dear', 'sign_64786f73ba99f1685614451.jpg', '34234', '2023-06-22', 'asdf', '2023-06-16', 'asdfsdf', '2023-05-29 14:48:08', 7, '2023-06-14 12:46:01', '7', '2', '', '', '127.0.0.1', '64746dd0b19aa1685351888', '1'),
(10, '2023-06-09', 'Aakash singh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10', '', '2023-08-18', '', '2023-06-14 12:45:46', 7, '2023-08-10 11:33:45', '7', '2', '', '', '122.161.50.89', '6489692280c151686726946', '1'),
(11, '2023-09-05', 'Aakash', '98657sad498654', 'Delhi', 'delhi', 'developer@jigsaw.edu.in', 'Vishal', 'Akash', 'IBBI', 'DMRC', '22(3)(a)', 'sedrfghnjm', '1', 'corporate debtor', 'individual', 'liquidation process', 'liquidation process', 'bankcruptcy trustee', 'Vijay kumar', '2023-09-05', 'Delhi', 'sign_64f6bed0a4f6e1693892304.jpg', 'asdfgf68543210', '2023-09-05', 'sadsfdgkljm,ds', '2023-09-05', 'Delhi', '2023-09-05 11:08:24', 7, '2023-09-05 11:13:48', '7', '2', '', '', '122.161.53.108', '64f6bed0a0a211693892304', '1');

-- --------------------------------------------------------

--
-- Table structure for table `form_aa_mdl_any_others`
--

CREATE TABLE `form_aa_mdl_any_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_aa_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_process_date_consent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_aa_mdl_any_others`
--

INSERT INTO `form_aa_mdl_any_others` (`id`, `form_aa_id`, `no_of_process_date_consent`, `created_at`, `updated_at`) VALUES
(1, 8, '32', '2023-05-29 13:46:29', '2023-05-29 15:08:37'),
(8, 8, 'df', '2023-05-29 15:08:37', ''),
(9, 8, 'sd', '2023-05-29 15:08:37', ''),
(11, 9, '23', '2023-06-01 15:44:11', '2023-06-14 12:46:02'),
(12, 9, 'df', '2023-06-01 15:44:11', '2023-06-14 12:46:02'),
(13, 11, 'delhi', '2023-09-05 11:08:24', '2023-09-05 11:13:48'),
(15, 11, 'sadfghjkl', '2023-09-05 11:09:19', '2023-09-05 11:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `form_a_mdls`
--

CREATE TABLE `form_a_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'for ip',
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ip name',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ip desgination',
  `assign_company_mdls_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorporation_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_debtor_authority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_debtor_identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_debtor_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_debtor_insolvency_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_closing_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_professional_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_professional_registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution_professional_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution_professional_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_resolution_professional_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_resolution_professional_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_last_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized_forms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_classess` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interim_resolution_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interim_resolution_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conclusion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_receving_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_a_mdls`
--

INSERT INTO `form_a_mdls` (`id`, `user_id`, `company_id`, `name`, `designation`, `assign_company_mdls_id`, `incorporation_date`, `corporate_debtor_authority`, `corporate_debtor_identity_number`, `corporate_debtor_address`, `corporate_debtor_insolvency_date`, `insolvency_closing_date`, `insolvency_professional_name`, `insolvency_professional_registration_number`, `resolution_professional_address`, `resolution_professional_email`, `correspondence_resolution_professional_address`, `correspondence_resolution_professional_email`, `claim_last_date`, `authorized_forms`, `authorized_details`, `creditor_classess`, `insolvency_name`, `interim_resolution_name`, `interim_resolution_signature`, `conclusion`, `order_receving_date`, `date`, `place`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`, `unique_id`, `rem_addr`, `status`) VALUES
(13, '15', '3', 'kamal', 'RP', '40', '2022-12-01', 'nclt', 'sdf', 'karol bagh', '2023-02-03', '2023-04-30', 'kamal', '', 'kailash colony', 'kamal@gmail.com', 'jfdhj', 'sjdh@gmail.com', '2023-06-23', 'asdf', 'sdfsdf', '[null]', '', 'kamal', '63e393fc541981675858940.png', '', '', '2023-02-27', 'sdfsdf', '2023-02-08 17:52:20', '7', '2023-05-09 14:57:35', '7', '2', '', '', '64117f975d8331678868375', '127.0.0.1', '1'),
(14, '13', '11', 'raj', 'IRP', '22', '2023-04-15', '', 'sdf', 'rohini', '2023-04-15', '2023-10-12', 'sdf', 'af', 'sdf', 'asdf@gmail.com', 'df', 'asdf@gmail.com', '2023-04-29', 'sdf', 'hsdjh', '[null]', '', 'raj', '63e394df2a8151675859167.gif', '', '', '2023-02-18', 'sdfsdfdf', '2023-02-08 17:56:07', '7', '2023-04-29 11:33:08', '7', '2', '', '', '64439c827d8681682152578', '127.0.0.1', '1'),
(15, '15', '3', 'kamal', 'RP', '40', '2022-12-01', 'nclt', 'sdf', 'karol bagh', '2023-01-01', '2023-08-26', 'kamal', '', 'kailash colony', 'kamal@gmail.com', 'asdf', 'asdf@gmail.com', '2023-01-25', 'sdf', 'sdf', '[null]', '', 'kamal', '', '', '', '2023-03-28', 'sdf', '2023-03-30 13:31:31', '7', '2023-05-09 15:00:06', '7', '2', '', '', '642541db7321a1680163291', '127.0.0.1', '1'),
(17, '26', '13', 'Vanshika', 'IRP', '23', '2023-04-23', 'NCLT, Chandigarh', '', 'Panchkula, Haryana', '2023-04-20', '2023-10-17', 'Vanshika', 'ibbi/123/456/789', '3208, 2nd Floor, Mahindra Park, Near Pitampura, Delhi-110034', 'vanshika@ipsupport.in', '', '', '2023-05-04', '', '', '[null]', '', 'Vanshika', '', '', '', '2023-04-23', 'Delhi', '2023-04-23 17:39:34', '7', '2023-04-29 11:32:26', '7', '2', '', '', '64451ffe2f03e1682251774', '127.0.0.1', '1'),
(19, '27', '14', 'Praveen Kumar Aggarwal', 'IRP', '27', '2018-01-01', 'NCLT', '', 'Hapur, Uttar Pradesh', '2023-04-27', '2023-10-24', 'Praveen Kumar Aggarwal', 'IBBI/IPA-002/IP-N00700/2018-2019/12348', '23 ,Block B ,Kaushik Enclave ,North,National Capital Territory of Delhi ,110084', 'pravag3001@gmail.com', '', '', '2023-05-11', '', '', '[null]', '', 'Praveen Kumar Aggarwal', '', '', '', '2023-04-27', 'Chandigarh', '2023-04-27 16:25:32', '7', '2023-04-29 11:32:02', '7', '2', '', '', '644a54a40c4df1682592932', '127.0.0.1', '1'),
(20, '27', '15', 'Praveen Kumar Aggarwal', 'IRP', '29', '2018-01-01', 'NCLT', '', 'Pitampura', '2023-04-27', '2023-10-24', 'Praveen Kumar Aggarwal', 'IBBI/IPA-002/IP-N00700/2018-2019/12348', 'Pitampura', 'pravag3001@gmail.com', '', '', '2023-05-11', '', '', '[null]', '', 'Praveen Kumar Aggarwal', '', '', '', '2023-04-27', 'Delhi', '2023-04-27 17:11:04', '27', '2023-04-29 11:31:29', '7', '2', '', '', '644a5f509c6361682595664', '127.0.0.1', '1'),
(21, '27', '15', 'Praveen Kumar Aggarwal', 'IRP', '29', '2018-01-01', 'NCLT', 'CRP123', 'Pitampura', '2023-04-27', '2023-10-24', 'Praveen Kumar Aggarwal', 'IBBI/IPA-002/IP-N00700/2018-2019/12348', 'Pitampura', 'pravag3001@gmail.com', 'd23', 'sjdkd@gmail.com', '2023-05-11', '', '', '[\"cgdf\",\"23\"]', '', 'Praveen Kumar Aggarwal', '', '', '', '2023-04-27', 'Delhi', '2023-04-27 18:03:16', '27', '2023-05-16 15:24:59', '7', '2', '', '', '644a6b8cd63971682598796', '127.0.0.1', '1'),
(22, '15', '3', 'kamal', 'RP', '32', '2023-04-27', 'error', '', 'D34', '2023-04-27', '2023-03-31', 'Praveen Kumar Aggarwal', 'IBBI/IPA-002/IP-N00700/2018-2019/12348', 'D34', 'pravag3001@gmail.com', '', '', '2023-05-11', '', '', '[null]', '', 'kamal', '', '', '', '2023-04-27', 'jjandewala', '2023-04-27 18:19:59', '7', '2023-05-09 14:58:49', '7', '2', '', '', '644a6f77be2691682599799', '127.0.0.1', '1'),
(25, '15', '', '', 'RP', '40', '2022-12-01', 'nclt', 'uu', 'u', '2023-01-01', '2023-02-10', 'kamal', '888', 'kailash colony', 'kamal@gmail.com', 'address', 'g@gmail.com', '2023-01-25', 'form', 'details', '', '', '', '649c02cc0e6fe1687945932.jpg', '', '', '2023-06-28', 'new delhi', '2023-06-28 15:22:12', '15', '', '', '2', '', '', '649c02cc0cd9c1687945932', '122.161.48.202', '1'),
(27, '28', '', '', 'IRP', '34', '2023-04-27', 'IBBI', '', 'NEW DELHI', '2023-04-27', '2023-10-24', 'Vishal', 'IBBI/IPA-001/IP-P-00929/81984', 'asdfghjk', 'vishal@gmail.com', '', '', '2023-05-11', '', '', '', '', '', '', '', '', '2023-08-10', 'nyc', '2023-08-10 14:33:50', '7', '', '', '2', '', '', '64d4a7f60d0dd1691658230', '122.161.50.89', '1'),
(28, '28', '', '', 'IRP', '44', '2023-04-27', 'IBBI', '', 'NEW DELHI', '2023-04-27', '2023-10-24', 'Vishal', 'IBBI/IPA-001/IP-P-00929/81984', 'asdfghjk', 'vishal@gmail.com', '', '', '2023-05-11', '', '', '', '', '', '', '', '', '2023-08-10', 'germeny', '2023-08-10 14:36:02', '7', '', '', '2', '', '', '64d4a87a812a51691658362', '122.161.50.89', '1'),
(29, '28', '21', 'Vishal', 'IRP', '45', '2023-09-04', 'Genpact', '84651230894651230', 'Gurgaon', '2023-09-04', '2024-03-02', 'Vishal', 'IBBI/IPA-001/IP-P-00929/81984', 'asdfghjk', 'vishal@gmail.com', 'Delhi', 'developer@gmail.com', '2023-09-18', 'Form2', 'form2 details', '[\"A1\",\"bsjdf\"]', '', 'Vishal', '64f6bc0a2c4811693891594.jpg', '', '', '2023-09-05', 'Delhi', '2023-09-05 10:56:34', '7', '2023-09-05 10:58:43', '7', '2', '', '', '64f6bc0a2c0321693891594', '122.161.53.108', '1'),
(30, '28', '21', 'Vishal singh', 'IRP', '45', '2023-09-04', 'Genpact', 'sdfv', 'Gurgaon', '2023-09-04', '2024-03-02', 'Vishal singh', 'IBBI/IPA-001/IP-P-00929/81984', 'sdf', 'vishal@gmail.com', 'defgdf', 'sdfgh', '2023-09-18', 'sdfg', 'sdf', '[\"sdf\",\"dsfg\",\"asdfgb\"]', '', 'Vishal singh', '', '', '', '2023-09-06', 'Delhis', '2023-09-06 11:53:22', '28', '2023-09-06 11:53:48', '28', '2', '', '', '64f81ada764b31693981402', '122.161.53.108', '1'),
(31, '31', '23', 'Rashi Gupta', 'IRP', '49', '2023-09-15', '', '', 'Delhi', '2023-09-15', '2024-03-13', 'Rashi Gupta', '', 'New Delhi', 'rashi_agarwal85@yahoo.co.in', '', '', '2023-09-29', '', '', '[null]', '', 'Rashi Gupta', '', '', '', '2023-09-15', 'Delhi', '2023-09-15 11:04:09', '7', '2023-09-15 11:04:25', '7', '2', '', '', '6503ecd11efc11694756049', '122.161.53.243', '1'),
(32, '30', '24', 'Rakhi & S. Singh', 'RP', '48', '2023-09-15', '', '', 'New Delhi', '2023-09-15', '2024-03-13', 'Rakhi & S. Singh', '', '', 'rakhi@gmail.com', '', '', '2023-09-29', '', '', '', '', 'Rakhi & S. Singh', '', '', '', '2023-09-15', 'Delhi', '2023-09-15 16:47:18', '7', '', '', '2', '', '', '65043d3e251b51694776638', '122.161.50.102', '1'),
(33, '32', '25', 'Rakesh Kumar Relan', 'IRP', '50', '2015-10-07', 'ROC Mumbai', 'AAE-8716', '1864, Tungareshwar House, Tungareshwar Industrial Estate, Opp. Saraswati Building, Sativali Vasai-East Thane, Maharashtra-401208', '2023-09-14', '2024-03-12', 'Rakesh Kumar Relan', 'IBBI/IPA-001/IP-P02009/2020-2021/13119', 'B1/701, Ganga Satellite, Wanowarie, Near Kedari Petrol Pump, Pune, Maharashtra- 411040', 'rakeshkrelan@gmail.com', 'Osrik Resolution Private Limited, 908, 9th Floor, D Mall, Netaji Subhash Place, Pitampura, New Delhi-110034', 'cirp.kevinventures@gmail.com', '2023-09-28', 'https://ibbi.gov.in/en/home/downloads', 'NA', '', '', 'Rakesh Kumar Relan', '', '', '', '2023-09-16', 'Mumbai', '2023-09-15 21:39:17', '7', '', '', '2', '', '', '650481ad4e59e1694794157', '182.69.180.169', '1');

-- --------------------------------------------------------

--
-- Table structure for table `form_a_s`
--

CREATE TABLE `form_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corporate_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorporation_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corporate_person_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ld_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ld_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ld_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ld_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_b_approval_mdls`
--

CREATE TABLE `form_b_approval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `principal_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `govt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_b_approval_mdls`
--

INSERT INTO `form_b_approval_mdls` (`id`, `company`, `irp`, `user_id`, `form_b_id`, `admin_id`, `principal_amt`, `interest`, `total`, `dept`, `govt`, `approved_principle_amt`, `approved_interest_amt`, `approved_total_amount`, `rejected_principle_amt`, `rejected_interest_amt`, `rejected_total_amount`, `pending_principle_amt`, `pending_interest_amt`, `pending_total_amount`, `claim_nature`, `claim_nature2`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(31, '11', '13', '56', 180, 7, '112', '2', '114', 'sdf', 'qer', '34', '2134', '2168', '34234', '233', '34467', '45', '4534', 'sdf', 'govern', 'sdf', '234', '342', '1', '3', '43', '234', 'asf', '1', 'latest', '2023-06-03 08:20:16', '2023-06-03 08:20:16'),
(37, '3', '15', '113', 191, 7, '6789', '890', '7679', 'olio', '', '3200', '320', '3520', '7800', '780', '8580', '7890', '789', '', 'govern', '', '', '', '', '', '', '', '', '1', 'latest', '2023-08-10 05:55:37', '2023-08-10 05:55:37'),
(39, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', 'updated', '2023-09-19 07:40:22', '2023-09-19 07:40:22'),
(40, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:41:57', '2023-09-19 07:41:57'),
(41, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:42:06', '2023-09-19 07:42:06'),
(42, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:42:18', '2023-09-19 07:42:18'),
(43, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '2445', '', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:42:31', '2023-09-19 07:42:31'),
(44, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:42:46', '2023-09-19 07:42:46'),
(45, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '2445', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 07:46:21', '2023-09-19 07:46:21'),
(46, '14', '27', '118', 192, 27, '7500', '540', '8040', '', '', '1232', '', '1232', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 08:19:09', '2023-09-19 08:19:09'),
(47, '14', '27', '118', 192, 27, '7500', '540', '8040', '', '', '1232', '', '1232', '', '', '', '', '', '', 'govern', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 08:34:39', '2023-09-19 08:34:39'),
(48, '23', '31', '123', 197, 31, '1234', '1211', '2445', '', '', '', '', '2445', '', '', '', '', '', '', 'govern', '', '', '', '', '', '', '', '', '1', 'latest', '2023-09-19 08:35:41', '2023-09-19 08:35:41'),
(49, '23', '31', '123', 198, 31, '123', '123', '246', '', '', '123', '0', '123', '', '', '', '', '', '', 'other', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-19 08:54:37', '2023-09-19 08:54:37'),
(50, '14', '27', '118', 192, 27, '7500', '540', '8040', '', '', '1232', '', '1232', '', '', '', '', '', '', 'govern', '', '', '', '', '', '', '', '', '1', 'latest', '2023-09-19 10:29:01', '2023-09-19 10:29:01'),
(51, '23', '31', '123', 198, 7, '123', '123', '246', '', '', '123', '0', '123', '', '', '', '', '', '', 'govern', '', '', '', '', '', '', '', '', '1', 'latest', '2023-10-03 10:20:29', '2023-10-03 10:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `form_b_declaration_table_mdls`
--

CREATE TABLE `form_b_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_b_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_b_declaration_table_mdls`
--

INSERT INTO `form_b_declaration_table_mdls` (`id`, `user_id`, `form_b_selected_id`, `form_b_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(44, 56, '180', 180, '2023-06-06', 'dsf', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 08:16:32', '2023-06-03 08:16:32'),
(47, 56, '180', 182, '2023-06-15', 'test3', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 09:36:07', '2023-06-03 10:03:32'),
(48, 56, '180', 182, '2023-06-23', 'test33', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 09:41:03', '2023-06-03 10:03:32'),
(49, 56, '183', 183, '2023-08-11', 'sdf', '1', '647d71b41e80e1685942708', '122.161.50.89', '2023-08-09 05:23:51', '2023-08-09 07:39:45'),
(50, 118, '192', 192, '2023-09-13', '5400', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:13:49', '2023-09-04 07:44:50'),
(51, 118, '192', 192, '2023-09-14', '6500', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:13:49', '2023-09-04 07:44:50'),
(52, 118, '192', 193, '2023-09-13', '5400', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:17'),
(53, 118, '192', 193, '2023-09-14', '6500', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_b_files_mdls`
--

CREATE TABLE `form_b_files_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_b_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_id` bigint(20) UNSIGNED NOT NULL,
  `work_purchase_order` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_b_files_mdls`
--

INSERT INTO `form_b_files_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_b_selected_id`, `form_b_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(196, '11', '13', '14', 56, '180', 180, 'on', '', '', '', '', '', '', '', 'work_647af6a5693381685780133.png', '', '', '', '', '', '', '', '', '', '', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 08:15:33', '2023-06-03 08:15:33'),
(198, '11', '13', '14', 56, '180', 182, 'on', '', '', '', '', '', '', '', 'work_647af6a5693381685780133.png', '', '', '', '', '', '', '', '', '', '', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 10:03:30', '2023-06-03 10:03:30'),
(199, '3', '15', '15', 56, '183', 183, '', '', '', 'on', '', '', '', '', '', '', '', 'corres_64d322dc1d4dd1691558620.pdf', '', '', '', '', '', '', '', '1', '647d71b41e80e1685942708', '122.161.50.89', '2023-08-09 05:23:40', '2023-08-09 05:23:40'),
(206, '15', '27', '21', 116, '190', 190, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '64d0a1035bf351691394307', '122.161.50.221', '2023-08-07 07:45:36', '2023-08-07 07:45:36'),
(207, '3', '15', '15', 113, '191', 191, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '64d1ddcd9421e1691475405', '122.161.50.221', '2023-08-08 06:16:48', '2023-08-08 06:16:48'),
(208, '3', '15', '15', 56, '183', 183, '', '', '', 'on', '', '', '', '', '', '', '', 'corres_64d322dc1d4dd1691558620.pdf', '', '', '', '', '', '', '', '1', '647d71b41e80e1685942708', '122.161.50.89', '2023-08-09 07:39:39', '2023-08-09 07:39:39'),
(209, '3', '15', '15', 113, '191', 191, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '64d1ddcd9421e1691475405', '122.161.50.89', '2023-08-10 05:52:09', '2023-08-10 05:52:09'),
(210, '14', '27', '19', 118, '192', 192, 'on', '', '', '', '', 'on', '', '', 'work_64f2e0814db6b1693638785.docx', '', '', '', '', 'stt_64f2e0815087e1693638785.jpg', '', '', 'pan_64f2e08152e7a1693638785.jpeg', 'passport_64f2e081540371693638785.jpg', 'aadhar_64f2e08154e0c1693638785.jpg', '1', '64f2df0f708d01693638415', '122.161.50.71', '2023-09-02 07:13:05', '2023-09-02 07:13:05'),
(211, '14', '27', '19', 118, '192', 192, 'on', '', '', '', '', 'on', '', '', 'work_64f2e0814db6b1693638785.docx', '', '', '', '', 'stt_64f2e0815087e1693638785.jpg', '', '', 'pan_64f2e08152e7a1693638785.jpeg', 'passport_64f2e081540371693638785.jpg', 'aadhar_64f2e08154e0c1693638785.jpg', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:44:47', '2023-09-04 07:44:47'),
(212, '14', '27', '19', 118, '192', 193, 'on', '', 'on', '', '', 'on', '', '', 'work_64f2e0814db6b1693638785.docx', '', 'balance_64f58c33a8dc81693813811.png', '', '', 'stt_64f2e0815087e1693638785.jpg', '', '', 'pan_64f2e08152e7a1693638785.jpeg', 'passport_64f2e081540371693638785.jpg', 'aadhar_64f2e08154e0c1693638785.jpg', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:50:11', '2023-09-04 07:50:11'),
(213, '23', '31', '31', 120, '194', 194, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650424a34c9841694770339.png', '', '', '1', '6504245949dc91694770265', '122.161.50.102', '2023-09-15 09:32:19', '2023-09-15 09:32:19'),
(214, '23', '31', '31', 120, '194', 194, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650424a34c9841694770339.png', '', '', '1', '6504245949dc91694770265', '122.161.50.102', '2023-09-15 09:35:00', '2023-09-15 09:35:00'),
(215, '23', '31', '31', 120, '194', 194, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650424a34c9841694770339.png', '', '', '1', '6504245949dc91694770265', '122.161.50.102', '2023-09-15 09:35:49', '2023-09-15 09:35:49'),
(216, '23', '31', '31', 120, '194', 194, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650424a34c9841694770339.png', '', '', '1', '6504245949dc91694770265', '122.161.50.102', '2023-09-15 09:55:09', '2023-09-15 09:55:09'),
(217, '24', '30', '32', 121, '195', 195, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_6504409eeae671694777502.png', 'passport_6504409eeb9191694777502.png', 'aadhar_6504409eec24b1694777502.png', '1', '65044072e29a81694777458', '122.161.50.102', '2023-09-15 11:31:42', '2023-09-15 11:31:42'),
(218, '24', '30', '32', 121, '196', 196, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '650819c2ea69b1695029698', '122.161.53.189', '2023-09-18 09:35:04', '2023-09-18 09:35:04'),
(219, '23', '31', '31', 123, '197', 197, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '65094fccb05391695109068', '122.161.53.189', '2023-09-19 07:37:56', '2023-09-19 07:37:56'),
(220, '23', '31', '31', 123, '198', 198, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '6509606b88a831695113323', '122.161.53.189', '2023-09-19 08:50:12', '2023-09-19 08:50:12'),
(221, '23', '31', '31', 123, '198', 199, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '6509606b88a831695113323', '122.161.53.189', '2023-09-19 09:01:49', '2023-09-19 09:01:49'),
(222, '11', '13', '14', 56, '200', 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '6513d83a628cd1695799354', '127.0.0.1', '2023-09-27 07:59:13', '2023-09-27 07:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `form_b_other_documents_mdls`
--

CREATE TABLE `form_b_other_documents_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_b_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_b_other_documents_mdls`
--

INSERT INTO `form_b_other_documents_mdls` (`id`, `user_id`, `form_b_selected_id`, `form_b_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(108, 56, '180', 180, '1', '647af6a5785f71685780133.png', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 08:15:33', '2023-06-03 08:15:33'),
(111, 56, '180', 182, '1', '647af6a5785f71685780133.png', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 09:36:07', '2023-06-03 10:03:30'),
(112, 118, '192', 192, 'aadhar card', '64f2e078581181693638776.jpeg', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:12:56', '2023-09-04 07:44:47'),
(113, 118, '192', 192, 'pancard', '64f2e078583431693638776.pdf', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:12:56', '2023-09-04 07:44:47'),
(114, 118, '192', 193, 'aadhar card', '64f2e078581181693638776.jpeg', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:11'),
(115, 118, '192', 193, 'pancard', '64f2e078583431693638776.pdf', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:11'),
(116, 123, '198', 198, 'signature', '650960c42015f1695113412.jpeg', '1', '6509606b88a831695113323', '122.161.53.189', '2023-09-19 08:50:12', '2023-09-19 08:50:12'),
(117, 123, '198', 199, 'signature', '650960c42015f1695113412.jpeg', '1', '6509606b88a831695113323', '122.161.53.189', '2023-09-19 09:01:44', '2023-09-19 09:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `form_b_senction_mdls`
--

CREATE TABLE `form_b_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_b_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_b_senction_mdls`
--

INSERT INTO `form_b_senction_mdls` (`id`, `user_id`, `form_b_selected_id`, `form_b_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(54, 56, '180', 180, '2023-06-07', 'asdf', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 08:16:32', '2023-06-03 08:16:32'),
(55, 56, '180', 180, '2023-06-08', 'df', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 08:16:32', '2023-06-03 08:16:32'),
(59, 56, '180', 182, '2023-06-07', 'asdf 1', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 09:36:07', '2023-06-03 10:03:32'),
(61, 56, '180', 182, '2023-06-22', 'test 12', '1', '647aedf8a6a201685777912', '127.0.0.1', '2023-06-03 09:40:20', '2023-06-03 10:03:32'),
(63, 56, '183', 183, '2023-08-23', 'asdf', '1', '647d71b41e80e1685942708', '122.161.50.89', '2023-08-09 05:23:51', '2023-08-09 07:39:45'),
(64, 118, '192', 192, '2023-09-02', '50000', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:13:49', '2023-09-04 07:44:50'),
(65, 118, '192', 192, '2023-09-08', '5000', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-02 07:13:49', '2023-09-04 07:44:50'),
(66, 118, '192', 193, '2023-09-02', '50000', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:17'),
(67, 118, '192', 193, '2023-09-08', '5000', '1', '64f2df0f708d01693638415', '122.161.53.123', '2023-09-04 07:49:53', '2023-09-04 07:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_ca_files_mdls`
--

CREATE TABLE `form_ca_files_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_ca_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_id` bigint(20) UNSIGNED NOT NULL,
  `work_purchase_order` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_ca_files_mdls`
--

INSERT INTO `form_ca_files_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_ca_selected_id`, `form_ca_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(50, '3', '15', '15', 56, '49', 49, 'on', '', '', '', '', '', '', '', 'work_purchase_order_647ec4cc88f251686029516.png', '', '', '', '', '', '', '', '', '', '', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:31:56', '2023-06-06 05:31:56'),
(51, '15', '27', '21', 116, '50', 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '64d0a2ca68bd21691394762', '122.161.50.221', '2023-08-07 07:52:44', '2023-08-07 07:52:44'),
(52, '14', '27', '19', 118, '51', 51, '', 'on', '', '', '', '', '', '', '', 'invoice_64f5906d3d35f1693814893.png', '', '', '', '', '', '', 'pan_64f5906d426691693814893.jpg', '', '', '1', '64f590467e7d61693814854', '122.161.53.123', '2023-09-04 08:08:13', '2023-09-04 08:08:13'),
(53, '23', '31', '31', 120, '52', 52, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aadhar_650435b764b951694774711.png', '1', '650435a61d0ad1694774694', '122.161.50.102', '2023-09-15 10:45:11', '2023-09-15 10:45:11'),
(54, '24', '30', '32', 121, '53', 53, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_6504441c587941694778396.png', 'passport_6504441c591b71694778396.png', 'aadhar_6504441c5a9a21694778396.png', '1', '650443f7e18b01694778359', '122.161.50.102', '2023-09-15 11:46:36', '2023-09-15 11:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `form_ca_other_document_mdls`
--

CREATE TABLE `form_ca_other_document_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_ca_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_ca_other_document_mdls`
--

INSERT INTO `form_ca_other_document_mdls` (`id`, `user_id`, `form_ca_selected_id`, `form_ca_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(53, 56, '49', 49, '1', '647ec4cc9c22c1686029516.png', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:31:56', '2023-06-06 05:31:56'),
(54, 120, '52', 52, 'NA', '', '1', '650435a61d0ad1694774694', '122.161.50.102', '2023-09-15 10:45:11', '2023-09-15 10:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_aproval_mdls`
--

CREATE TABLE `form_c_aproval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `borrower_claim_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_security_interest_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrower_guarantor_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_claim_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_security_interest_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_gaurantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_principal_borrower` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_address_borrower` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_claim_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_beneficiary_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_beneficiary_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_aproval_mdls`
--

INSERT INTO `form_c_aproval_mdls` (`id`, `company`, `irp`, `user_id`, `form_c_id`, `admin_id`, `borrower_claim_amount`, `borrower_security_interest_amount`, `borrower_guarantee_amt`, `borrower_guarantor_name`, `borrower_guarantor_address`, `guarantor_claim_amount`, `guarantor_security_interest_amount`, `guarantor_gaurantee_amt`, `guarantor_principal_borrower`, `guarantor_address_borrower`, `financial_claim_amt`, `financial_beneficiary_name`, `financial_beneficiary_address`, `total_amount`, `approved_total_amount`, `rejected_total_amount`, `pending_total_amount`, `claim_nature`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(13, '3', '15', '56', 157, 7, '100', '', '', '', '', '200', '', '', '', '', '3000', '', '', '3300', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-06-05 07:43:10', '2023-06-05 07:43:10'),
(14, '3', '15', '56', 157, 7, '100', '', '', '', '', '200', '', '', '', '', '3000', '', '', '3300', '2000', '1000', '300', '', '', '', '', '', '', '', '', '1', 'updated', '2023-06-05 07:53:46', '2023-06-05 07:53:46'),
(15, '14', '27', '118', 164, 7, '10000', '5400', '4100', 'GOlu', 'Dwarka c 23 Delhi 110058', '5000', '50', '540', 'AKash', 'Rohini sector 16 near aggarwal plaza', '5400', 'AKash', 'delhi', '20400', '100', '200', '210', '1', '540', '4', '1', '', '', '', '', '1', 'updated', '2023-09-04 09:33:02', '2023-09-04 09:33:02'),
(16, '14', '27', '118', 164, 7, '10000', '5400', '4100', 'GOlu', 'Dwarka c 23 Delhi 110058', '5000', '50', '540', 'AKash', 'Rohini sector 16 near aggarwal plaza', '5400', 'AKash', 'delhi', '20400', '100', '200', '210', '2', '540', '4', '1', '', '', '', '', '1', 'latest', '2023-09-06 05:36:32', '2023-09-06 05:36:32'),
(17, '3', '15', '56', 157, 7, '100', '', '', '', '', '200', '', '', '', '', '3000', '', '', '3300', '2000', '1000', '300', '1', '', '', '', '', '', '', '', '1', 'updated', '2023-10-03 10:07:49', '2023-10-03 10:07:49'),
(18, '3', '15', '56', 157, 7, '100', '', '', '', '', '200', '', '', '', '', '3000', '', '', '3300', '2000', '1000', '300', '2', '', '', '', '', '', '', '', '1', 'latest', '2023-10-03 10:08:34', '2023-10-03 10:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_a_aproval_mdls`
--

CREATE TABLE `form_c_a_aproval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `principal_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_a_aproval_mdls`
--

INSERT INTO `form_c_a_aproval_mdls` (`id`, `company`, `irp`, `user_id`, `form_ca_id`, `admin_id`, `principal_amt`, `interest`, `total`, `approved_principle_amt`, `approved_interest_amt`, `approved_total_amount`, `rejected_principle_amt`, `rejected_interest_amt`, `rejected_total_amount`, `pending_principle_amt`, `pending_interest_amt`, `pending_total_amount`, `claim_nature`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(15, '3', '15', '56', 49, 7, '100', '20', '120', '5000', '1000', '6000', '2000', '500', '2500', '7000', '700', '7700', '1', '', '', '', '', '', '', '', '1', 'updated', '2023-06-06 06:06:28', '2023-06-06 06:06:28'),
(16, '14', '27', '118', 51, 7, '852400', '5450', '857850', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-06 05:23:58', '2023-09-06 05:23:58'),
(17, '14', '27', '118', 51, 7, '852400', '5450', '857850', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'updated', '2023-09-06 05:27:42', '2023-09-06 05:27:42'),
(18, '14', '27', '118', 51, 7, '852400', '5450', '857850', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '1', 'latest', '2023-09-06 05:56:10', '2023-09-06 05:56:10'),
(19, '3', '15', '56', 49, 7, '100', '20', '120', '5000', '1000', '6000', '2000', '500', '2500', '7000', '700', '7700', '2', '', '', '', '', '', '', '', '1', 'latest', '2023-10-03 10:06:55', '2023-10-03 10:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_a_declaration_table_mdls`
--

CREATE TABLE `form_c_a_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_ca_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_a_declaration_table_mdls`
--

INSERT INTO `form_c_a_declaration_table_mdls` (`id`, `user_id`, `form_ca_selected_id`, `form_ca_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(11, 56, '49', 49, '2023-06-09', '21', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:32:28', '2023-06-06 05:32:28'),
(12, 56, '49', 49, '2023-06-17', '22', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:32:28', '2023-06-06 05:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_a_senction_mdls`
--

CREATE TABLE `form_c_a_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_ca_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_ca_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_a_senction_mdls`
--

INSERT INTO `form_c_a_senction_mdls` (`id`, `user_id`, `form_ca_selected_id`, `form_ca_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(11, 56, '49', 49, '2023-06-15', '11', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:32:28', '2023-06-06 05:32:28'),
(12, 56, '49', 49, '2023-06-14', '111', '1', '647ec49ecc9891686029470', '127.0.0.1', '2023-06-06 05:32:28', '2023-06-06 05:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_declaration_table_mdls`
--

CREATE TABLE `form_c_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_c_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_declaration_table_mdls`
--

INSERT INTO `form_c_declaration_table_mdls` (`id`, `user_id`, `form_c_selected_id`, `form_c_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(14, 56, '157', 157, '2023-06-15', 'test23', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:03:43', '2023-06-05 07:05:12'),
(15, 56, '157', 157, '2023-06-23', 'dd', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:05:12', '2023-06-05 07:05:12'),
(16, 56, '157', 158, '2023-06-15', 'test232', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:11:57', '2023-06-05 07:41:47'),
(17, 56, '157', 158, '2023-06-23', 'dd3', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:11:57', '2023-06-05 07:41:47'),
(18, 118, '164', 164, '2023-09-29', '6500', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-02 07:50:21', '2023-09-04 08:26:28'),
(19, 118, '164', 164, '2023-09-29', '6500', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-02 07:50:30', '2023-09-04 08:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_files_mdls`
--

CREATE TABLE `form_c_files_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_c_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_id` bigint(20) UNSIGNED NOT NULL,
  `work_purchase_order` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_files_mdls`
--

INSERT INTO `form_c_files_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_c_selected_id`, `form_c_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(176, '3', '15', '15', 56, '157', 157, 'on', '', '', '', '', '', '', '', 'work_purchase_order_647d88bcdff2e1685948604.png', '', '', '', '', '', '', '', '', '', '', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:04:54', '2023-06-05 07:04:54'),
(177, '3', '15', '15', 56, '157', 158, '', 'on', '', '', '', '', '', '', '', 'invoice_647d8ad5a905d1685949141.jpg', '', '', '', '', '', '', '', '', '', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:41:43', '2023-06-05 07:41:43'),
(183, '14', '27', '19', 118, '164', 164, 'on', 'on', '', '', '', '', '', '', 'work_purchase_order_64f2e867731a91693640807.pdf', 'invoice_64f2e8677c4631693640807.pdf', '', '', '', '', '', '', 'pan_64f2e867851d01693640807.pdf', 'passport_64f2e8678a31d1693640807.docx', 'aadhar_64f2e8678b1931693640807.sql', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-04 08:15:36', '2023-09-04 08:15:36'),
(184, '23', '31', '31', 120, '165', 165, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'passport_6504348c7a6fd1694774412.png', '', '2', '65043450312b21694774352', '122.161.50.102', '2023-09-15 10:40:12', '2023-09-15 10:40:12'),
(185, '24', '30', '32', 121, '166', 166, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650442bcc6cbb1694778044.png', 'passport_650442bcc783d1694778044.png', 'aadhar_650442bcc82021694778044.png', '2', '6504427d0cf341694777981', '122.161.50.102', '2023-09-15 11:40:44', '2023-09-15 11:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_other_document_mdls`
--

CREATE TABLE `form_c_other_document_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_c_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_other_document_mdls`
--

INSERT INTO `form_c_other_document_mdls` (`id`, `user_id`, `form_c_selected_id`, `form_c_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(189, 56, '157', 157, '1', '647d88bcf327f1685948604.png', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:03:24', '2023-06-05 07:04:54'),
(190, 56, '157', 157, '2', '647d8916b1f831685948694.jpg', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:04:54', '2023-06-05 07:04:54'),
(191, 56, '157', 158, '11', '647d8ad3f20f61685949139.png', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:11:57', '2023-06-05 07:41:43'),
(193, 56, '157', 158, '3', '647d8ad5c20f81685949141.png', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:12:21', '2023-06-05 07:41:43'),
(195, 118, '164', 164, 'QWERTYUIOP', '64f2e8678c0c01693640807.docx', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-02 07:46:47', '2023-09-04 08:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `form_c_senction_mdls`
--

CREATE TABLE `form_c_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_c_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_c_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_c_senction_mdls`
--

INSERT INTO `form_c_senction_mdls` (`id`, `user_id`, `form_c_selected_id`, `form_c_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(17, 56, '157', 157, '2023-06-06', 'test12', '2', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:03:43', '2023-06-05 07:05:12'),
(18, 56, '157', 158, '2023-06-06', 'test122', '1', '647d8897a36ad1685948567', '127.0.0.1', '2023-06-05 07:11:57', '2023-06-05 07:41:47'),
(19, 118, '164', 164, '2023-09-02', '400', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-02 07:50:21', '2023-09-04 08:26:28'),
(20, 118, '164', 164, '2023-09-02', '400', '1', '64f2e61236b7c1693640210', '122.161.53.123', '2023-09-02 07:50:30', '2023-09-04 08:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_aproval_mdls`
--

CREATE TABLE `form_d_aproval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `principal_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_principle_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_interest_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_aproval_mdls`
--

INSERT INTO `form_d_aproval_mdls` (`id`, `company`, `irp`, `user_id`, `form_d_id`, `admin_id`, `principal_amt`, `interest`, `total`, `approved_principle_amt`, `approved_interest_amt`, `approved_total_amount`, `rejected_principle_amt`, `rejected_interest_amt`, `rejected_total_amount`, `pending_principle_amt`, `pending_interest_amt`, `pending_total_amount`, `claim_nature`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(9, '', '', '56', 41, 7, '20000', '10000', '200000', '300000', '2000', '302000', '4000', '2000', '6000', '454545', '5044', '459589', 'workmen', '', '', '2', '', '', '', '', '1', 'latest', '2023-06-07 07:04:31', '2023-06-07 07:04:31'),
(11, '24', '30', '121', 46, 7, '32162321', '21313', '32183634', '', '', '', '', '', '', '', '', '', 'workmen', '', '', '', '', '', '', '', '1', 'updated', '2023-10-03 10:11:17', '2023-10-03 10:11:17'),
(12, '24', '30', '121', 46, 7, '32162321', '21313', '32183634', '', '', '', '', '', '', '', '', '', 'workmen', '', '', '', '', '', '', '', '1', 'updated', '2023-10-03 10:12:27', '2023-10-03 10:12:27'),
(13, '24', '30', '121', 46, 7, '32162321', '21313', '32183634', '', '', '', '', '', '', '', '', '', 'employee', '', '', '', '', '', '', '', '1', 'latest', '2023-10-03 10:13:53', '2023-10-03 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_declaration_table_mdls`
--

CREATE TABLE `form_d_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_d_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_declaration_table_mdls`
--

INSERT INTO `form_d_declaration_table_mdls` (`id`, `user_id`, `form_d_selected_id`, `form_d_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(7, 56, '41', 41, '2023-05-10', 'sdf', '1', '646334307f21c1684223024', '127.0.0.1', '2023-05-16 07:47:51', '2023-05-16 07:47:51'),
(8, 118, '44', 44, '2023-09-07', 'delkdslkdjlksdjlksjlkjlkdjlkjdxdsd', '1', '64f2f4403ece41693643840', '122.161.53.123', '2023-09-02 09:35:37', '2023-09-04 09:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_files_mdls`
--

CREATE TABLE `form_d_files_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_d_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_id` bigint(20) UNSIGNED NOT NULL,
  `work_purchase_order` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_files_mdls`
--

INSERT INTO `form_d_files_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_d_selected_id`, `form_d_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(47, '12', '26', '17', 56, '39', 39, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '6448c51eba9451682490654', '122.161.53.234', '2023-04-26 06:31:00', '2023-04-26 06:31:00'),
(49, '', '', '15', 56, '41', 41, 'on', '', '', '', '', '', '', '', 'work_purchase_order_64633517610e31684223255.jpg', '', '', '', '', '', '', '', '', '', '', '1', '646334307f21c1684223024', '127.0.0.1', '2023-05-16 07:47:35', '2023-05-16 07:47:35'),
(51, '', '', '14', 56, '43', 43, 'on', '', '', '', '', '', '', '', 'work_purchase_order_6482d4f8b4b341686295800.png', '', '', '', '', '', '', '', '', '', '', '2', '6482d4e32736e1686295779', '127.0.0.1', '2023-06-09 07:30:00', '2023-06-09 07:30:00'),
(52, '14', '27', '19', 118, '44', 44, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_64f301c1b3ac01693647297.png', 'passport_64f301c1b63c81693647297.docx', 'aadhar_64f301c1b78361693647297.docx', '1', '64f2f4403ece41693643840', '122.161.50.71', '2023-09-02 09:34:57', '2023-09-02 09:34:57'),
(58, '23', '31', '31', 120, '45', 45, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '65043775b219a1694775157', '122.161.50.102', '2023-09-15 10:52:46', '2023-09-15 10:52:46'),
(59, '24', '30', '32', 121, '46', 46, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_65044591e4a6e1694778769.png', 'passport_65044591e597d1694778769.png', 'aadhar_65044591e678e1694778769.png', '1', '6504455ccef611694778716', '122.161.50.102', '2023-09-15 11:52:49', '2023-09-15 11:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_mdls`
--

CREATE TABLE `form_d_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-d',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voter_id_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intrest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_of_documents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispute_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_arose_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_credit_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_signature` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_in_block_letter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_to_creditor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_person_signing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification) ',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT ' first,updated,latest ',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_mdls`
--

INSERT INTO `form_d_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_d_selected_id`, `name`, `pancard_no`, `passport_no`, `voter_id_no`, `aadhar_no`, `address`, `email`, `total_amount`, `principle`, `intrest`, `details_of_documents`, `dispute_details`, `claim_arose_details`, `mutual_credit_details`, `account_no`, `bank_name`, `ifsc_code`, `operational_creditor_signature`, `name_in_block_letter`, `relation_to_creditor`, `address_person_signing`, `place`, `insolvency_commencement_date`, `select_option`, `unique_id`, `user_unique_id`, `year`, `dat`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(39, '12', '26', '17', 56, 'workmen-and-employee', 'form-d', '', '39', 'raja', '', '', '', '', 'rohini', 'dinesh.sharma11013@gmail.com', '110000', '100000', '10000', '', '', '', '', '', '', '', 'sign_6448c5232945a1682490659.png', 'DINESH', 'manager', 'pitam pura', '', '', '1', '6448c51eba9451682490654', '', '', '', '', '', '1', '1', '2023-04-26 12:01:06', '2023-04-26', '2', '2', '1', 'latest', '122.161.53.234', '2023-04-26 12:00:54', '2023-04-26 12:01:06'),
(41, '', '', '15', 56, 'workmen-and-employee', 'form-d', '', '41', 'sdf', '', '', '', '', '', 'dinesh.sharma11013@gmail.com', '200000', '20000', '10000', '', '', '', '', '', '', '', 'sign_646334308272a1684223024.jpg', 'DINESH', 'sf', 'sd', 'sdf', '2023-01-01', '1', '646334307f21c1684223024', '', '', '', '', '', '1', '1', '2023-05-16 13:18:15', '2023-05-16', '2', '2', '1', 'latest', '127.0.0.1', '2023-05-16 13:13:44', '2023-05-16 13:18:15'),
(43, '11', '13', '14', 56, 'workmen-and-employee', 'form-d', '', '43', 'ramesh', '', '', '', '', '', 'dinesh.sharma11013@gmail.com', '12', '12', '', '', '', '', '', '', '', '', 'sign_6482d5a0674611686295968.jpg', 'DINESH', 'vca', 'jkjlkj', '', '2023-04-15', '1', '6482d4e32736e1686295779', '5963724801', '', '', '', '', '2', '2', '2023-06-09 12:59:39', '2023-06-09', '2', '2', '2', 'latest', '127.0.0.1', '2023-06-09 12:59:39', '2023-09-27 14:41:40'),
(44, '14', '27', '19', 118, 'workmen-and-employee', 'form-d', '', '44', 'AAKASH', 'PANC56465465', '45457474541654654165544PASSPORT54', 'NEJ8986541320', '8858454222154565', 'DELHI', 'developer@gmail.com', '10541', '10000', '541', 'DETAILS OF DOCUMENT BY REFFERENCE TO WHICH THE CLAIM CAN BE SUBTAINED', 'Details of any dispute as well as the record of pendency or order of suit or arbitration proceedings', 'CLAIM AROSE HOW AND WHEN', 'MUTUAL DEBTS', '954102255555555', 'Swiss bank', 'utib6541652310210', 'sign_64f2f440422271693643840.jpeg', 'VIKAS SINGH', 'Friend', 'A-229 begum vihar ext. begumpur delhi 110086', 'Delhi', '2023-04-27', '1', '64f2f4403ece41693643840', '4725683109', '', '', '', '', '2', '2', '2023-09-02 14:07:20', '2023-09-02', '2', '2', '2', 'latest', '122.161.53.123', '2023-09-02 14:07:20', '2023-09-04 15:10:29'),
(45, '23', '31', '31', 120, 'workmen-and-employee', 'form-d', '', '45', 'AKASH', '274862817', '3456789293', '273082SAH', '632817728198', 'NA', 'mohan@gmail.com', '6272175', '6271863', '312', 'NA', 'NA', 'NA', 'NA', '72421984218', 'KOTAK MAHINDRA BANK', 'KOTAK5623872`', 'sign_650437818caa61694775169.png', 'MOHAN LAL KUMAR', 'CREDITOR', 'DELHI', '', '2023-09-15', '1', '65043775b219a1694775157', '4612703589', '', '', '', '', '1', '1', '2023-09-15 16:22:58', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 16:22:37', '2023-09-15 16:22:58'),
(46, '24', '30', '32', 121, 'workmen-and-employee', 'form-d', '', '46', 'VIKRAM KUMAR', '5764GJHG475', 'U6586HM6799', '5SAGH6886', '57658237218878', 'NEW DELHI', 'vikram@gmail.com', '32183634', '32162321', '21313', 'NA', 'NA', 'NA', 'NA', '528136821738', 'IDFC BANK', 'IDFC312736', 'sign_6504459dd6aa61694778781.png', 'VIKRAM KUMAR', 'EMPLOYEE', 'DELHI', 'DELHI', '2023-09-15', '1', '6504455ccef611694778716', '6251094783', '', '', '', '', '1', '1', '2023-09-15 17:23:17', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 17:21:56', '2023-09-15 17:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_other_document_mdls`
--

CREATE TABLE `form_d_other_document_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_d_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_other_document_mdls`
--

INSERT INTO `form_d_other_document_mdls` (`id`, `user_id`, `form_d_selected_id`, `form_d_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(41, 56, '41', 41, '1', '6463351772c6b1684223255.png', '1', '646334307f21c1684223024', '127.0.0.1', '2023-05-16 07:47:35', '2023-05-16 07:47:35'),
(43, 56, '43', 43, '1', '6482d4f8c4b571686295800.png', '2', '6482d4e32736e1686295779', '127.0.0.1', '2023-06-09 07:30:00', '2023-09-27 09:11:48'),
(44, 118, '44', 44, 'document1', '64f301c1b8a461693647297.docx', '1', '64f2f4403ece41693643840', '122.161.53.123', '2023-09-02 09:34:57', '2023-09-04 09:40:17'),
(45, 118, '44', 44, 'document 2', '64f301c1bf9a21693647297.pptx', '1', '64f2f4403ece41693643840', '122.161.53.123', '2023-09-02 09:34:57', '2023-09-04 09:40:17'),
(46, 121, '46', 46, 'BANK STATEMENT', '65044591e76051694778769.png', '1', '6504455ccef611694778716', '122.161.50.102', '2023-09-15 11:52:49', '2023-09-15 11:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `form_d_senction_mdls`
--

CREATE TABLE `form_d_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_d_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_d_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_d_senction_mdls`
--

INSERT INTO `form_d_senction_mdls` (`id`, `user_id`, `form_d_selected_id`, `form_d_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(9, 118, '44', 44, '2023-09-15', '5400', '1', '64f2f4403ece41693643840', '122.161.53.123', '2023-09-02 09:35:37', '2023-09-04 09:40:29'),
(10, 118, '44', 44, '2023-09-15', '95000', '1', '64f2f4403ece41693643840', '122.161.53.123', '2023-09-02 09:35:37', '2023-09-04 09:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_approval_mdls`
--

CREATE TABLE `form_e_approval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `claim_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_approval_mdls`
--

INSERT INTO `form_e_approval_mdls` (`id`, `company`, `irp`, `user_id`, `form_e_id`, `admin_id`, `claim_amt`, `approved_total_amount`, `rejected_total_amount`, `pending_total_amount`, `claim_nature`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(12, '16', '27', '99', 61, 7, '966106', '200000', '300000', '121212', 'hello worle', '23434', '343', '1', '34', '434', '34234', 'tet', '1', 'latest', '2023-05-04 12:47:21', '2023-05-04 12:47:21'),
(13, '3', '15', '56', 62, 7, '10000', '1000', '200', '300', '', '', '', '', '', '', '', '', '1', 'updated', '2023-06-07 07:30:47', '2023-06-07 07:30:47'),
(14, '3', '15', '56', 62, 7, '10000', '1000', '200', '300', '', '', '', '1', '', '', '', '', '1', 'latest', '2023-10-03 10:14:31', '2023-10-03 10:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_declaration_table_mdls`
--

CREATE TABLE `form_e_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_e_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_declaration_table_mdls`
--

INSERT INTO `form_e_declaration_table_mdls` (`id`, `user_id`, `form_e_selected_id`, `form_e_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(2, 56, '62', 62, '2023-05-16', 'tet1', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 07:12:43', '2023-05-17 07:49:19'),
(3, 56, '62', 63, '2023-05-16', 'tet1', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 09:13:40', '2023-05-17 09:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_employee_detail_mdls`
--

CREATE TABLE `form_e_employee_detail_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_e_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_id` bigint(20) UNSIGNED NOT NULL,
  `emp_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_details` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amt_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_employee_detail_mdls`
--

INSERT INTO `form_e_employee_detail_mdls` (`id`, `user_id`, `form_e_selected_id`, `form_e_id`, `emp_type`, `employee_name`, `id_number`, `id_details`, `total_amt`, `due_amt_period`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(313, 56, '57', 57, '', 'karan', '1', '234234234234', '100', '5year', '1', '642baff6035fe1680584694', '::1', '2023-04-04 05:05:23', '2023-04-04 05:05:23'),
(314, 56, '57', 57, '', 'raja', '2', '452352345345', '300', '3months', '1', '642baff6035fe1680584694', '::1', '2023-04-04 05:05:23', '2023-04-04 05:05:23'),
(321, 56, '57', 58, '', 'karan1', '1', '234234234234', '200', '5year', '1', '642baff6035fe1680584694', '::1', '2023-04-04 05:18:19', '2023-04-04 05:18:19'),
(322, 56, '57', 58, '', 'raja1', '2', '452352345345', '400', '3months', '1', '642baff6035fe1680584694', '::1', '2023-04-04 05:18:19', '2023-04-04 05:18:19'),
(324, 56, '59', 59, 'employee', 'ramesh', '1', '234234234', '7877987', '4 months', '1', '6440f48897d231681978504', '127.0.0.1', '2023-04-20 08:15:26', '2023-04-20 08:15:26'),
(327, 56, '59', 60, 'employee', 'ramesh', '1', '234234234', '7877987', '4 months', '1', '6440f48897d231681978504', '127.0.0.1', '2023-04-20 09:45:16', '2023-04-20 09:45:16'),
(328, 56, '59', 60, 'workman', 'vishal', '2', '23423434', '200000', '6 months', '1', '6440f48897d231681978504', '127.0.0.1', '2023-04-20 09:45:16', '2023-04-20 09:45:16'),
(331, 99, '61', 61, 'employee', 'vikrant', '1', 'information about pan card', '6500', '8900', '1', '644a7794541b01682601876', '122.161.53.234', '2023-04-27 13:24:49', '2023-04-27 13:24:49'),
(332, 99, '61', 61, 'workman', 'shruti', '3', '1345686756543536', '959606', 'info', '1', '644a7794541b01682601876', '122.161.53.234', '2023-04-27 13:24:49', '2023-04-27 13:24:49'),
(334, 56, '62', 63, 'employee', 'ramesh', '1', '234234234', '10000', '2month', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 09:14:18', '2023-05-17 09:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_file_mdls`
--

CREATE TABLE `form_e_file_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-e',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_signature` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification) ',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest ',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_file_mdls`
--

INSERT INTO `form_e_file_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_e_selected_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `operational_creditor_signature`, `place`, `insolvency_commencement_date`, `select_option`, `unique_id`, `user_unique_id`, `year`, `dat`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(57, '2', '13', '14', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_642bb013532851680584723.jpg', 'delhi', '', '', '642baff6035fe1680584694', '', '', '', '', '', '1', '1', '2023-04-04 10:35:50', '2023-04-04', '2', '2', '1', 'first', '::1', '2023-04-04 10:35:26', '2023-04-04 10:35:50'),
(58, '2', '13', '14', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_642bb013532851680584723.jpg', 'delhi', '', '', '642baff6035fe1680584694', '', '', '', '', '', '1', '1', '2023-04-04 10:48:25', '2023-04-04', '2', '2', '2', 'latest', '::1', '2023-04-04 10:48:21', '2023-04-04 10:48:25'),
(59, '2', '13', '14', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '59', 'on', '', '', '', '', '', '', '', 'work_purchase_order_6440f5296f0f31681978665.png', '', '', '', '', '', '', '', '', '', '', 'sign_6440f49e4df031681978526.jpeg', '', '', '', '6440f48897d231681978504', '', '', '', '', '', '1', '1', '2023-04-20 13:52:49', '2023-04-20', '2', '2', '1', 'first', '127.0.0.1', '2023-04-20 13:47:45', '2023-04-20 13:52:49'),
(60, '2', '13', '14', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '59', 'on', '', '', '', '', '', '', '', 'work_purchase_order_6440f5296f0f31681978665.png', '', '', '', '', '', '', '', '', '', '', 'sign_6440f49e4df031681978526.jpeg', '', '', '', '6440f48897d231681978504', '', '', '', '', '', '1', '1', '2023-04-20 15:15:31', '2023-04-20', '2', '2', '2', 'latest', '127.0.0.1', '2023-04-20 15:15:21', '2023-04-20 15:15:31'),
(61, '16', '27', '22', 99, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '61', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_644a77a1daefd1682601889.png', '', '', '', '644a7794541b01682601876', '', '', '', '', '', '1', '1', '2023-04-27 18:55:04', '2023-04-27', '2', '2', '1', 'latest', '122.161.53.234', '2023-04-27 18:54:56', '2023-04-27 18:55:04'),
(62, '3', '15', '15', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '62', 'on', '', '', '', '', '', '', '', 'work_purchase_order_64647e59a51c51684307545.png', '', '', '', '', '', '', '', '', '', '', 'sign_64647e6b869301684307563.jpg', 'delhi', '2023-01-01', '1', '64647e488fdd51684307528', '', '', '', '', '', '1', '1', '2023-05-17 13:19:32', '2023-05-17', '2', '2', '1', 'first', '127.0.0.1', '2023-05-17 13:16:40', '2023-05-17 13:19:32'),
(63, '3', '15', '15', 56, 'authorised-representative-of-workmen-and-employee', 'form-e', '', '62', '', 'on', '', '', '', '', '', '', '', 'invoice_64649ad4865571684314836.png', '', '', '', '', '', '', '', '', '', 'sign_64649aea1e5e91684314858.jpg', 'delhi3', '2023-01-01', '2', '64647e488fdd51684307528', '', '', '', '', '', '1', '1', '2023-05-17 14:44:48', '2023-05-17', '2', '2', '2', 'latest', '127.0.0.1', '2023-05-17 14:43:56', '2023-05-17 14:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_other_document_mdls`
--

CREATE TABLE `form_e_other_document_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_e_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_other_document_mdls`
--

INSERT INTO `form_e_other_document_mdls` (`id`, `user_id`, `form_e_selected_id`, `form_e_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(82, 56, '59', 59, '1', '6440f4b21f0791681978546.png', '1', '6440f48897d231681978504', '127.0.0.1', '2023-04-20 08:15:46', '2023-04-20 08:15:46'),
(83, 56, '59', 60, '1', '6440f4b21f0791681978546.png', '1', '6440f48897d231681978504', '127.0.0.1', '2023-04-20 09:45:04', '2023-04-20 09:45:21'),
(84, 56, '62', 62, '1', '64647e59b70761684307545.png', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 07:12:25', '2023-05-17 07:46:40'),
(85, 56, '62', 63, '1', '64647e59b70761684307545.png', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 09:13:40', '2023-05-17 09:13:56'),
(86, 56, '62', 63, '2', '64649ad49cdd91684314836.jpg', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 09:13:56', '2023-05-17 09:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `form_e_senction_mdls`
--

CREATE TABLE `form_e_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_e_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_e_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_e_senction_mdls`
--

INSERT INTO `form_e_senction_mdls` (`id`, `user_id`, `form_e_selected_id`, `form_e_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(3, 56, '62', 63, '2023-05-10', '234234', '1', '64647e488fdd51684307528', '127.0.0.1', '2023-05-17 09:14:18', '2023-05-17 09:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `form_f_approval_mdls`
--

CREATE TABLE `form_f_approval_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_amt_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_nature` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_party` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voting_shares` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contingent_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_dues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for approved, 2 for pending, 3 for rejected',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_f_approval_mdls`
--

INSERT INTO `form_f_approval_mdls` (`id`, `company`, `irp`, `user_id`, `form_f_id`, `admin_id`, `name`, `claim_amt`, `claim_amt_desc`, `approved_total_amount`, `rejected_total_amount`, `pending_total_amount`, `claim_nature`, `security_interest`, `guarantee_amt`, `related_party`, `voting_shares`, `contingent_amt`, `mutual_dues`, `reason`, `status`, `formType`, `created_at`, `updated_at`) VALUES
(6, '16', '27', '56', 26, 7, 'Ankush', '450000', 'total amount', '100000000000000', '1000000', '300000000000', '432', '234', '445', '1', '45', '23', '23', 'taea', '1', 'latest', '2023-05-04 12:56:30', '2023-05-04 12:56:30'),
(7, '3', '15', '56', 35, 7, 'SDF', '342', 'adf', '21100', '210', '310', '', '', '', '', '', '', '', '', '1', 'updated', '2023-08-08 12:24:34', '2023-08-08 12:24:34'),
(8, '3', '15', '56', 35, 7, 'SDFAKJ', '342', 'adf', '21100', '210', '310', '', '', '', '', '', '', '', '', '1', 'updated', '2023-08-08 13:13:59', '2023-08-08 13:13:59'),
(9, '3', '15', '56', 35, 7, 'SDF0090', '342', 'adf', '21100', '210', '310', '', '', '', '', '', '', '', '', '1', 'latest', '2023-08-08 13:14:13', '2023-08-08 13:14:13'),
(10, '2', '13', '56', 24, 7, 'raju', '50000000', 'yort', '', '', '', '', '', '', '', '', '', '', '', '1', 'latest', '2023-08-08 13:15:56', '2023-08-08 13:15:56'),
(11, '15', '27', '108', 25, 7, 'NAKUL LAWARIA2', '6000', 'FAN MOTOR AND OTHER', '', '', '', '', '', '', '', '', '', '', '', '1', 'latest', '2023-08-08 13:17:28', '2023-08-08 13:17:28'),
(12, '24', '30', '121', 40, 7, 'VIKRAM KUMAR', '4776798', 'NA', '', '', '', '', '', '', '1', '', '', '', '', '1', 'latest', '2023-10-03 10:17:04', '2023-10-03 10:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `form_f_declaration_table_mdls`
--

CREATE TABLE `form_f_declaration_table_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_f_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_f_declaration_table_mdls`
--

INSERT INTO `form_f_declaration_table_mdls` (`id`, `user_id`, `form_f_selected_id`, `form_f_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(10, 56, '35', 35, '2023-05-02', 'sdffgfg2', '1', '6465ee456395c1684401733', '127.0.0.1', '2023-05-18 09:22:31', '2023-05-19 07:43:04'),
(11, 118, '36', 36, '2023-09-13', '14000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-02 10:01:00', '2023-09-04 07:13:15'),
(12, 118, '36', 36, '2023-09-13', '14000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-02 10:01:05', '2023-09-04 07:13:15'),
(13, 118, '36', 37, '2023-09-13', '14000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:51', '2023-09-04 07:42:00'),
(14, 118, '36', 37, '2023-09-13', '14000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:51', '2023-09-04 07:42:00'),
(15, 118, '38', 38, '2023-09-04', '54120', '1', '64f5ac39c409d1693822009', '122.161.53.123', '2023-09-04 10:13:07', '2023-09-04 10:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `form_f_files_mdls`
--

CREATE TABLE `form_f_files_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_f_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_id` bigint(20) UNSIGNED NOT NULL,
  `work_purchase_order` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_purchase_order_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoices_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_confirmation_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_correspondence_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation_letter_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_statement_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ledger_copy_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computation_sheet_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_file` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_f_files_mdls`
--

INSERT INTO `form_f_files_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_f_selected_id`, `form_f_id`, `work_purchase_order`, `invoices`, `balance_confirmation`, `any_correspondence`, `authorisation_letter`, `bank_statement`, `ledger_copy`, `computation_sheet`, `work_purchase_order_file`, `invoices_file`, `balance_confirmation_file`, `any_correspondence_file`, `authorisation_letter_file`, `bank_statement_file`, `ledger_copy_file`, `computation_sheet_file`, `pan_number_file`, `passport_file`, `aadhar_card`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(23, '2', '13', '14', 56, '24', 24, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '642ab4e6161fc1680520422', '::1', '2023-04-03 11:14:09', '2023-04-03 11:14:09'),
(24, '15', '27', '20', 108, '25', 25, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '644a71a6779cf1682600358', '122.161.53.234', '2023-04-27 12:59:43', '2023-04-27 12:59:43'),
(25, '16', '27', '22', 56, '26', 26, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '644b628337aa31682662019', '122.161.53.234', '2023-04-28 06:11:57', '2023-04-28 06:11:57'),
(32, '3', '15', '15', 56, '35', 35, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '6465ee456395c1684401733', '127.0.0.1', '2023-05-19 07:42:53', '2023-05-19 07:42:53'),
(33, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.50.71', '2023-09-02 09:56:47', '2023-09-02 09:56:47'),
(34, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 05:56:31', '2023-09-04 05:56:31'),
(35, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 06:19:23', '2023-09-04 06:19:23'),
(36, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 06:23:20', '2023-09-04 06:23:20'),
(37, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:10:58', '2023-09-04 07:10:58'),
(38, '14', '27', '19', 118, '36', 36, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:13:12', '2023-09-04 07:13:12'),
(39, '14', '27', '19', 118, '36', 37, '', 'on', '', '', '', '', '', '', '', 'invoice_64f306df30d4e1693648607.pdf', '', '', '', '', '', '', 'pan_64f306df39aec1693648607.docx', '', '', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:55', '2023-09-04 07:41:55'),
(40, '14', '27', '19', 118, '38', 38, 'on', 'on', '', '', '', '', '', '', 'work_purchase_order_64f5ad89289d91693822345.png', 'invoice_64f5ad892b7a11693822345.docx', '', '', '', '', '', '', 'pan_64f5ad892f54b1693822345.png', 'passport_64f5ad89312321693822345.jpg', 'aadhar_64f5ad8931f321693822345.jpg', '1', '64f5ac39c409d1693822009', '122.161.53.123', '2023-09-04 10:12:25', '2023-09-04 10:12:25'),
(41, '23', '31', '31', 120, '39', 39, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '65043c55bb6001694776405', '122.161.50.102', '2023-09-15 11:13:30', '2023-09-15 11:13:30'),
(42, '24', '30', '32', 121, '40', 40, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pan_650446aa694651694779050.docx', 'passport_650446aa69e691694779050.png', 'aadhar_650446aa6abbb1694779050.png', '1', '650446724db1a1694778994', '122.161.50.102', '2023-09-15 11:57:30', '2023-09-15 11:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `form_f_other_document_mdls`
--

CREATE TABLE `form_f_other_document_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_f_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_f_other_document_mdls`
--

INSERT INTO `form_f_other_document_mdls` (`id`, `user_id`, `form_f_selected_id`, `form_f_id`, `document_name`, `file`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(23, 108, '25', 25, 'INVOICE', '', '1', '644a71a6779cf1682600358', '122.161.53.234', '2023-04-27 12:59:43', '2023-04-27 12:59:43'),
(24, 56, '26', 26, 'Aadhar Card', '644b63013993b1682662145.pdf', '1', '644b628337aa31682662019', '122.161.53.234', '2023-04-28 06:09:05', '2023-04-28 06:11:57'),
(38, 118, '38', 38, 'Add Other Important Documents', '64f5ad8932b121693822345.pdf', '1', '64f5ac39c409d1693822009', '122.161.53.123', '2023-09-04 10:12:25', '2023-09-04 10:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `form_f_senction_mdls`
--

CREATE TABLE `form_f_senction_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_f_selected_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senction_amt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_f_senction_mdls`
--

INSERT INTO `form_f_senction_mdls` (`id`, `user_id`, `form_f_selected_id`, `form_f_id`, `date`, `senction_amt`, `submitted`, `unique_id`, `rem_addr`, `created_at`, `updated_at`) VALUES
(16, 56, '35', 35, '2023-05-03', 'test2', '1', '6465ee456395c1684401733', '127.0.0.1', '2023-05-18 09:22:31', '2023-05-19 07:43:04'),
(17, 118, '36', 36, '2023-09-08', '450000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-02 10:01:00', '2023-09-04 07:13:15'),
(19, 118, '36', 36, '2023-09-08', '4800', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-02 10:01:05', '2023-09-04 07:13:15'),
(20, 118, '36', 36, '2023-09-08', '4000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-02 10:01:05', '2023-09-04 07:13:15'),
(21, 118, '36', 37, '2023-09-08', '450000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:51', '2023-09-04 07:42:00'),
(22, 118, '36', 37, '2023-09-08', '4800', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:51', '2023-09-04 07:42:00'),
(23, 118, '36', 37, '2023-09-08', '4000', '1', '64f306b2525a71693648562', '122.161.53.123', '2023-09-04 07:41:51', '2023-09-04 07:42:00'),
(24, 118, '38', 38, '2023-09-04', '5400', '1', '64f5ac39c409d1693822009', '122.161.53.123', '2023-09-04 10:13:05', '2023-09-04 10:13:05'),
(25, 118, '38', 38, '2023-09-05', '9800', '1', '64f5ac39c409d1693822009', '122.161.53.123', '2023-09-04 10:13:07', '2023-09-04 10:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `form_modification_mdls`
--

CREATE TABLE `form_modification_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'request sent date',
  `rem_addr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 - approved, 2 - not approved',
  `approval_person_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'approved person id',
  `approval_by_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'approved time',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 - read, 2 - unread',
  `request_sent_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'request to edit form time',
  `request_seen_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_update_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 - updated, 2 - not updated',
  `form_update_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_modification_mdls`
--

INSERT INTO `form_modification_mdls` (`id`, `user_id`, `form_type`, `form_id`, `msg`, `date`, `rem_addr`, `approval_status`, `approval_person_id`, `approval_by_date`, `status`, `request_sent_time`, `request_seen_time`, `form_update_status`, `form_update_time`) VALUES
(178, 56, 'Form-B Update Request', '162', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-09', '127.0.0.1', '1', '7', '2023-05-09 16:18:50', '1', '2023-05-09 16:18:41', '2023-05-09 16:18:48', '2', ''),
(179, 56, 'Form-B Update Request', '167', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-10', '127.0.0.1', '1', '7', '2023-05-10 10:24:16', '1', '2023-05-10 10:23:59', '2023-05-10 10:24:05', '1', '2023-05-10 11:39:36'),
(180, 56, 'Form-B Update Request', '167', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-10', '127.0.0.1', '1', '7', '2023-05-10 11:59:35', '1', '2023-05-10 11:59:26', '2023-05-10 11:59:33', '2', ''),
(181, 56, 'Form-B Update Request', '173', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-10', '127.0.0.1', '1', '7', '2023-05-10 12:06:11', '1', '2023-05-10 12:05:56', '2023-05-10 12:06:08', '1', '2023-05-10 12:11:58'),
(182, 56, 'Form-B Update Request', '175', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-10', '127.0.0.1', '1', '7', '2023-05-10 12:15:46', '1', '2023-05-10 12:15:37', '2023-05-10 12:15:42', '1', '2023-05-10 12:17:11'),
(183, 56, 'Form-B Update Request', '177', '<p>Dinesh has sent request to update Form-B.</p>', '2023-05-12', '127.0.0.1', '1', '7', '2023-05-12 13:10:04', '1', '2023-05-12 13:09:36', '2023-05-12 13:09:54', '2', ''),
(184, 56, 'Form-C Update Request', '125', '<p>Dinesh has sent request to update Form-C.</p>', '2023-05-13', '127.0.0.1', '1', '7', '2023-05-13 13:03:53', '1', '2023-05-13 13:03:48', '2023-05-13 13:03:50', '2', ''),
(185, 56, 'Form-D Update Request', '41', '<p>Dinesh has sent request to update Form-D.</p>', '2023-05-16', '127.0.0.1', '1', '7', '2023-05-16 13:56:19', '1', '2023-05-16 13:56:12', '2023-05-16 13:56:14', '2', ''),
(186, 56, 'Form-E Update Request', '62', '<p>Dinesh has sent request to update Form-E.</p>', '2023-05-17', '127.0.0.1', '1', '7', '2023-05-17 13:43:23', '1', '2023-05-17 13:43:16', '2023-05-17 13:43:20', '1', '2023-05-17 14:44:49'),
(187, 56, 'Form-F Update Request', '27', '<p>Dinesh has sent request to update Form-F.</p>', '2023-05-18', '127.0.0.1', '1', '7', '2023-05-18 13:04:30', '1', '2023-05-18 13:04:21', '2023-05-18 13:04:27', '2', ''),
(188, 56, 'Form-CA Update Request', '46', '<p>Dinesh has sent request to update Form-CA.</p>', '2023-05-20', '127.0.0.1', '1', '7', '2023-05-20 11:06:57', '1', '2023-05-20 11:06:51', '2023-05-20 11:06:55', '1', '2023-05-20 11:28:41'),
(189, 56, 'Form-B Update Request', '180', '<p>Dinesh has sent request to update Form-B.</p>', '2023-06-03', '127.0.0.1', '1', '7', '2023-06-03 14:42:08', '1', '2023-06-03 14:42:00', '2023-06-03 14:42:07', '1', '2023-06-03 15:33:36'),
(190, 56, 'Form-C Update Request', '155', '<p>Dinesh has sent request to update Form-C.</p>', '2023-06-05', '127.0.0.1', '1', '7', '2023-06-05 12:00:14', '1', '2023-06-05 12:00:08', '2023-06-05 12:00:12', '2', ''),
(191, 56, 'Form-C Update Request', '157', '<p>Dinesh has sent request to update Form-C.</p>', '2023-06-05', '127.0.0.1', '1', '7', '2023-06-05 12:39:15', '1', '2023-06-05 12:39:08', '2023-06-05 12:39:13', '1', '2023-06-05 13:11:54'),
(192, 113, 'Form-B Update Request', '191', '<p>Sukhman has sent request to update Form-B.</p>', '2023-08-10', '122.161.50.89', '1', '7', '2023-08-10 11:30:41', '1', '2023-08-10 11:23:27', '2023-08-10 11:24:24', '2', ''),
(193, 118, 'Form-B Update Request', '192', '<p>Vikas Singh has sent request to update Form-B.</p>', '2023-09-04', '122.161.53.123', '1', '7', '2023-09-04 13:19:21', '1', '2023-09-04 13:16:19', '2023-09-04 13:19:14', '1', '2023-09-04 13:20:28'),
(194, 123, 'Form-B Update Request', '198', '<p>Yash has sent request to update Form-B.</p>', '2023-09-19', '122.161.53.189', '1', '31', '2023-09-19 14:30:17', '1', '2023-09-19 14:29:31', '2023-09-19 14:29:42', '1', '2023-09-19 14:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `general_info_mdls`
--

CREATE TABLE `general_info_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_of_ipa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_of_ipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_valid_afa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afa_certificate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afa_valid_upto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cpe_earned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibbi_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'panel url',
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-admin,\r\n2-ip,\r\n3-ipe\r\n\r\n\r\n',
  `sub_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'main ip id',
  `authorised_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-enable,\r\n2-disable,\r\n3-block',
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'created by',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1-deleted, 2-not deleted',
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_info_mdls`
--

INSERT INTO `general_info_mdls` (`id`, `member_of_ipa`, `member_of_ipe`, `have_valid_afa`, `afa_certificate_no`, `afa_valid_upto`, `total_cpe_earned`, `logo`, `company_name`, `first_name`, `last_name`, `address`, `email`, `mobile`, `username`, `password`, `pwd`, `ibbi_reg_no`, `token`, `gender`, `url`, `user_type`, `sub_user`, `authorised_person`, `rights`, `banners`, `profile_pic`, `link`, `rem_addr`, `status`, `user_id`, `flag`, `date`, `availability`, `created_at`, `updated_at`, `deleted_by`, `deleted_time`) VALUES
(7, '', '', '', '', '', '', '', 'Sabre Edge IT Solutions', 'admin', '', '3208, 2nd Floor, Mahindra Park, Near Pitampura, Delhi-110034', 'dineshkumar@jigsaw.edu.in', '9899800842', 'admin', 'dinesh', '$2y$10$skuEXdGJGhJ4ubkiConr2uF2lZp5/YgT7.0vHlPi5qaA.RFFxmdte', '', '', '', 'admin', '1', '', '', '', '[]', '', '', '122.161.50.102', '1', '', '2', '', '', '', '2023-09-16 19:20:54', '', ''),
(13, '', '', '', '', '', '', '', '', 'raj', '', 'k-8, rohini delhi', 'raj@gmail.com', '2342342343', 'raj', 'raj1', '$2y$10$6IalBuG1xMnn8I9KTJ3HSu1BnGf0DVes9sJQntJoi0/cITYMNMmqC', 'ibbi reg no', '', '', 'ip', '2', '', '', '', '', '63fef64f0e5871677653583.png', '', '127.0.0.1', '1', '7', '2', '2022-12-31', '', '', '2023-03-16 13:08:28', '', ''),
(15, '', '', '', '', '', '', '', '', 'kamal', '', 'kailash colony', 'kamal@gmail.com', '2342342343', 'kamal23', 'kamal23', '$2y$10$.3klu36fmJBPTY07cNdObO1OCOwlcLDiw007peiVxMm9H3kbCzHyy', '', '', '', 'ip', '2', '', '', '', '', '63ff4ab8074931677675192.jpg', '', '122.161.50.89', '1', '7', '2', '2023-02-08', '', '', '2023-08-10 11:36:28', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', 'sdf', 'asdf@gmail.com', '2342342343', 'sdf', 'asjdfh', '$2y$10$Wg8/ZDbn9.ncfJuwGbNkYeHAjTDOP.lVfDdx.BW.ktrsrI4Z2ngtW', 'sdf', '', '', 'ip', '2', '', '', '', '', '63eb3891873981676359825.gif', '', '127.0.0.1', '1', '7', '1', '2023-02-14', '', '2023-02-14 13:00:25', '2023-02-14 13:00:37', '7', '2023-02-14 13:00:37'),
(17, '', '', '', '', '', '', '', '', 'Rajesh gocher', '', 'bh-pitam pur', 'rajesh@gmail.com', '4353454354', 'rajesh', 'rajesh', '$2y$10$kJQtpO5NJIOwHkIcJ5ly5u90XOmsK/UtOMDmP/cn4Ryg0t8SnHHkK', '', '', '', 'ip', '2', '', '', '', '', '', '', '103.195.201.10', '1', '7', '1', '2023-02-16', '', '2023-02-16 10:35:19', '2023-04-22 19:39:53', '7', '2023-04-22 19:39:53'),
(18, '', '', '', '', '', '', '', '', 'Poonam Kumari', '', '43-hj, bhajan pu', 'poonam@gmail.com', '2342342343', 'poonam', 'poonam', '$2y$10$jVPP.ieOpZrWSwyov8jWNeEwlIs0a.NKEN.ndnXuxffPdg5mNJy3O', '', '', '', 'ip', '2', '', '', '', '', '', '', '127.0.0.1', '1', '7', '2', '2023-02-16', '', '2023-02-16 10:36:39', '2023-03-16 13:08:43', '', ''),
(19, '', '', '', '', '', '', '', '', 'Neha Kumari', '', 'jh-787, karol bagh', 'neha@gmail.com', '2342342343', 'Neha Kumari', 'neha', '$2y$10$U3Z91SlARtYm0vXcP2xzw.DmADPLoSOpuDHgH4Mx2lex2w9xy4t8S', '', '', '', 'ip', '2', '', '', '', '', '', '', '127.0.0.1', '1', '7', '2', '2023-02-16', '', '2023-02-16 10:38:06', '2023-04-05 11:05:37', '', ''),
(22, '', '', '', '', '', '', '', '', 'pawan', '', 'sjdhf', 'pawan@gmail.com', '2342342343', 'pawan', 'pawan', '$2y$10$DChQoPR3n/qsswY4nLvAWe4KHKy4cX7/cec8Hk7uckLqTCrq6ykJ2', '', '', '', 'ip', '2', '13', '', '', '', '', '', '::1', '1', '13', '2', '2023-03-18', '', '2023-03-18 10:56:12', '', '', ''),
(23, '', '', '', '', '', '', '', '', 'sfsdf', '', 'asdf', '', '', '', '', '$2y$10$XesDTdYOBaGoB6sKoP92keizAObBYf2t6IIA2UQF85GZnfgse1Mfy', '', '', '', 'ip', '2', '', '', '', '', '', '', '127.0.0.1', '1', '7', '1', '2023-04-05', '', '2023-04-05 12:35:36', '2023-04-21 14:46:56', '7', '2023-04-21 14:46:56'),
(24, '', '', '', '', '', '', '', '', 'sdfsadf', '', '', '', '', '', '', '$2y$10$BZDQ2VCo7E//7lS3mhsBB.zoHCs.u6xrK0VRN2fxq8Tj3x3C2nBsy', '', '', '', 'ip', '2', '', 'fsdf', '', '', '', '', '127.0.0.1', '1', '7', '1', '2023-04-05', '', '2023-04-05 12:36:05', '2023-04-21 14:46:51', '7', '2023-04-21 14:46:51'),
(25, '', '', '', '', '', '', '', '', 'viraj', '', 'xyz', 'viraj@gmail.com', '2342342343', 'viraj1', 'viraj1', '$2y$10$yT5qrlDx0au6siXiqmIeHOx.C8M3QSU9GETX2HZVjeUPdby2vSl7K', '', '', '', 'ip', '2', '26', '', '', '', '', '', '::1', '1', '7', '2', '2023-04-21', '', '2023-04-21 16:33:35', '', '', ''),
(26, '', '', '', '', '', '', '', '', 'Vanshika', '', '3208, 2nd Floor, Mahindra Park, Near Pitampura, Delhi-110034', 'vanshika@ipsupport.in', '9899800842', 'vanshika', '12345', '$2y$10$VQINvpzwzcXEFcoFjbVTE..mlSkS7SBH4SAC0.b2NE1ocEyict45C', 'ibbi/123/456/789', '', '', 'ip', '2', '', '', '', '', '', '', '103.195.201.10', '1', '7', '2', '2023-04-23', '', '2023-04-23 17:09:27', '', '', ''),
(27, '', '', 'Yes', '', '', '', '', '', 'Praveen Kumar Aggarwal', '', '23 ,Block B ,Kaushik Enclave ,North,National Capital Territory of Delhi ,110084', 'pravag3001@gmail.com', '', 'praveen', '123458', '$2y$10$wbGuh8E6PPUuBf/a5VflvOfXAeWYY1T23yOfKvWU21r.AJUrYCzCm', 'IBBI/IPA-002/IP-N00700/2018-2019/12348', '', '', 'ip', '2', '', '', '', '', '', '', '122.161.49.183', '1', '7', '2', '2023-04-27', '', '2023-04-27 16:07:28', '2023-09-13 14:44:58', '', ''),
(28, '', '', '', '', '', '', '', '', 'Vishal singh', '', 'sdf', 'vishal@gmail.com', '', 'vishalsingh', '12345', '$2y$10$.FvAjL3KHHJSdOZADXMV8OzwxwxMG8mdtzOd0UXZwobLSWKiTw1MS', 'IBBI/IPA-001/IP-P-00929/81984', '', '', 'ip', '2', '', '', '', '', '', '', '122.161.53.108', '1', '7', '2', '2023-04-27', '', '2023-04-27 18:38:23', '2023-09-06 12:37:12', '', ''),
(29, '', '', '', '', '', '', '', '', 'Abhinav', '', 'asdfghjk', 'abhinav@gmail.com', '1234567890', 'abhinav', '12345', '$2y$10$WyoDxe7ie6Ptmxdw4e/kYOO7.LI0Bwm9ctbVaXJlqMD7ep1CIh9Qu', '', '', '', 'ip', '2', '28', '', '', '', '', '', '103.212.158.112', '1', '28', '2', '2023-04-27', '', '2023-04-27 18:59:33', '', '', ''),
(30, 'ICSI Institute of Insolvency Professionals', '', 'Yes', 'AA2/11372/02/131223/202475', '13-Dec-23', '80', '', '', 'Shailendra Singh', '', '1201-A, 1201-B, 1201-C, 12th Floor, Ashoka Estate, 24, Barakhamba Road, Connaught Place ,New Delhi,National Capital Territory of Delhi ,110001', 'shailendralaw@gmail.com', '', 'Shailendra_singh', 'Shailendra@123', '$2y$10$ES5OC5KhCpswWXZHXW16q.6qD3Ypuqy.uCqlyhuNrK5nDlUgtRpFm', 'IBBI/IPA-002/IP-N00471/2017-2018/11372', '', '', 'ip', '2', '', '', '', '', '', '', '122.161.53.189', '1', '7', '2', '2018-01-04', '', '2023-09-15 10:46:42', '2023-09-18 15:17:46', '', ''),
(31, '', '', '', '', '', '', '', '', 'Rashi Gupta', '', 'New Delhi', 'rashi_agarwal85@yahoo.co.in', '', 'Rashi_gupta', 'Rashi@123', '$2y$10$BswiuzTYQOolYh.wlmJ2G.mhlxaq/kM/82i5Sh04YMyFuAvfKy72.', '', '', '', 'ip', '2', '', '', '', '', '', '', '122.161.53.243', '1', '7', '2', '', '', '2023-09-15 10:54:46', '2023-09-15 10:55:39', '', ''),
(32, 'Indian Institute of Insolvency Professionals of ICAI', 'Osrik Resolution Pvt Ltd', 'Yes', 'AA1/13119/02/220524/105757', '22-05-2024', '49', '', '', 'Rakesh Kumar Relan', '', '', 'rakeshkrelan@gmail.com', '9765622244', 'rakesh', 'Rakesh@123', '$2y$10$tGTsoSJu9saI/KpRLZbU/eeiZfi2PMvo431OOOnEg.nQGAkGtDGCi', 'IBBI/IPA-001/IP-P02009/2020-2021/13119', '', '', 'ip', '2', '', '', '', '', '', '', '182.69.180.169', '1', '7', '2', '2020-06-12', '', '2023-09-15 21:10:53', '', '', ''),
(38, '', '', '', '', '', '', '', '', 'raj1', '', 'ajfsh', 'raj1@gmail.com', '2342342343', 'raj1', 'raj1', '$2y$10$CYZnADM8Wun./UL/45RJ4e5Xrs5D/j/IUlLkHxQvkLukHYoVjlBt.', '', '', '', 'ip', '2', '27', '', '', '', '', '', '127.0.0.1', '1', '27', '2', '', '', '2023-10-05 12:00:19', '', '', ''),
(39, '', '', '', '', '', '', '', '', 'vijay', '', 'sdfhh', 'vijay@gmail.com', '2342342343', 'vijay', 'vijay', '$2y$10$hxL4h7JOPCoRCuQlO60MBusq5CfqeY2HcE0saIw0Clk2rfA4Ae08u', '', '', '', 'ip', '2', '27', '', '', '', '', '', '127.0.0.1', '1', '27', '2', '', '', '2023-10-06 13:30:12', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ip_mdls`
--

CREATE TABLE `ip_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_admin_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'who is currently logged in',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibbi_reg_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'main ip id',
  `sub_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sub-user id',
  `rights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-enable, 2-disable, 3-block',
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-deleted, 2-not deleted',
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"4aeed309-d976-4808-b312-d91840c32abf\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:11:{s:7:\\\"user_id\\\";i:44;s:4:\\\"name\\\";s:4:\\\"ravi\\\";s:4:\\\"desc\\\";s:121:\\\"<p style=\'color:green;\'>Hi ravi, Your OTP is 939950 for claimprocess registration. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:3:\\\"otp\\\";i:939950;s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9205016987\\\";s:8:\\\"rem_addr\\\";s:3:\\\"::1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-up\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:9:\\\"mail_type\\\";s:12:\\\"registration\\\";}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1667374581, 1667374581),
(2, 'default', '{\"uuid\":\"1caa50f9-ad5f-41ab-8a88-671f7758dcdc\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:11:{s:7:\\\"user_id\\\";i:44;s:4:\\\"name\\\";s:4:\\\"ravi\\\";s:4:\\\"desc\\\";s:128:\\\"<p style=\'color:green;\'>Hi ravi, Your OTP is 703996 for claimprocess registration second. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:3:\\\"otp\\\";i:703996;s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9205016987\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-up\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:9:\\\"mail_type\\\";s:12:\\\"registration\\\";}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1667375549, 1667375549),
(3, 'default', '{\"uuid\":\"034bc5c6-4b5c-4d54-a998-eb2c521088d2\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:11:{s:7:\\\"user_id\\\";i:44;s:4:\\\"name\\\";s:4:\\\"ravi\\\";s:4:\\\"desc\\\";s:121:\\\"<p style=\'color:green;\'>Hi ravi, Your OTP is 687107 for claimprocess registration. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:3:\\\"otp\\\";i:687107;s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9205016987\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:38:\\\"http:\\/\\/localhost\\/claim2\\/resend-sign-up\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:9:\\\"mail_type\\\";s:12:\\\"registration\\\";}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1667375857, 1667375857),
(4, 'default', '{\"uuid\":\"a8e3555a-d1a3-4734-9360-90e7f625e857\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:11:{s:7:\\\"user_id\\\";i:45;s:4:\\\"name\\\";s:5:\\\"rahul\\\";s:4:\\\"desc\\\";s:122:\\\"<p style=\'color:green;\'>Hi rahul, Your OTP is 503407 for claimprocess registration. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:15:\\\"rahul@gmail.com\\\";s:3:\\\"otp\\\";i:503407;s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"2342342343\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-up\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:9:\\\"mail_type\\\";s:12:\\\"registration\\\";}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:15:\\\"rahul@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1667380833, 1667380833),
(5, 'default', '{\"uuid\":\"00715515-a595-4c7d-9533-c8f04b10e43a\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:11:{s:7:\\\"user_id\\\";i:46;s:4:\\\"name\\\";s:6:\\\"yogesh\\\";s:4:\\\"desc\\\";s:123:\\\"<p style=\'color:green;\'>Hi yogesh, Your OTP is 757440 for claimprocess registration. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:16:\\\"yogesh@gmail.com\\\";s:3:\\\"otp\\\";i:757440;s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"2342342343\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-up\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:9:\\\"mail_type\\\";s:12:\\\"registration\\\";}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:16:\\\"yogesh@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1667381620, 1667381620),
(6, 'default', '{\"uuid\":\"9f96acd3-7cec-4387-9400-405c2289a68a\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 635584 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:635584;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669613286, 1669613286),
(7, 'default', '{\"uuid\":\"3e3171b8-35a9-4703-b429-389b812d081b\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 270182 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:270182;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669613518, 1669613518),
(8, 'default', '{\"uuid\":\"2359e75b-54ad-4dd2-ac7f-39f5a93bc2eb\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 706113 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:706113;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669614792, 1669614792),
(9, 'default', '{\"uuid\":\"792d70eb-eba9-4f7c-b509-14eac73b04b6\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 167100 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:167100;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669615062, 1669615062),
(10, 'default', '{\"uuid\":\"7129f3af-c359-43df-beac-0ae8011de01b\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 613245 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:613245;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669615356, 1669615356),
(11, 'default', '{\"uuid\":\"d0cb8961-3a26-42b5-b14d-be84bdd65c4b\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 188210 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:188210;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669615657, 1669615657),
(12, 'default', '{\"uuid\":\"eb178555-0d9c-4810-9b82-761ae5807dc8\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 107056 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:107056;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669615830, 1669615830),
(13, 'default', '{\"uuid\":\"031b00a3-982d-4b36-9c9a-60551aa4610f\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 831043 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:831043;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669616039, 1669616039),
(14, 'default', '{\"uuid\":\"85780fe6-870e-4cc9-b838-fb762bb3a497\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 240007 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:240007;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669616355, 1669616355),
(15, 'default', '{\"uuid\":\"b479f36a-cab3-4752-b361-fa06a5609bc7\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 912316 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:912316;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669616498, 1669616498),
(16, 'default', '{\"uuid\":\"8a32bc2d-4e3e-4ee9-a01f-1add52e0d0e3\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 246100 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:246100;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669617127, 1669617127),
(17, 'default', '{\"uuid\":\"487f7588-e43e-41b2-a6d3-3f84db7be36d\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 602837 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:602837;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669617275, 1669617275),
(18, 'default', '{\"uuid\":\"6c0cb283-6069-462b-85ec-ab512eb04642\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 341977 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:341977;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669618389, 1669618389),
(19, 'default', '{\"uuid\":\"08acbc04-08b7-4216-855b-b500fa1de098\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 728824 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:728824;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669618729, 1669618729),
(20, 'default', '{\"uuid\":\"40aae669-097d-4831-b7c5-264b569e45f4\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669619632, 1669619632),
(21, 'default', '{\"uuid\":\"0101a6d9-14da-43d4-a23e-c508d34c0d86\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669619941, 1669619941),
(22, 'default', '{\"uuid\":\"4e6f77f0-392f-412b-afaf-7f09105b53ab\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":14:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669620342, 1669620342),
(23, 'default', '{\"uuid\":\"7c368623-2aea-45fe-8257-1323a7662cc4\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669620667, 1669620667),
(24, 'default', '{\"uuid\":\"6f29f8ad-42d9-4be7-be0b-b830a9bdbddc\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669620794, 1669620794),
(25, 'default', '{\"uuid\":\"b0c341e2-ea8a-447e-b860-c366a3672ec2\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669620842, 1669620842),
(26, 'default', '{\"uuid\":\"e2c080f3-fb39-4461-b42e-9e12eb748db2\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669621227, 1669621227),
(27, 'default', '{\"uuid\":\"0cac6ae4-2009-47ea-a397-def7a50d3409\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669621750, 1669621750),
(28, 'default', '{\"uuid\":\"48a30a01-9b52-45dc-b54b-d7cefd3a8d37\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669621934, 1669621934),
(29, 'default', '{\"uuid\":\"edbbc2a5-afbd-41d0-b832-81d9dd575967\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669622422, 1669622422),
(30, 'default', '{\"uuid\":\"155f4821-d343-4c02-af24-26fd9755c8ef\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:2:{s:7:\\\"user_id\\\";i:1;s:4:\\\"name\\\";s:6:\\\"DINESH\\\";}s:7:\\\"subject\\\";s:4:\\\"test\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669622701, 1669622701),
(31, 'default', '{\"uuid\":\"7263aba5-d727-4cb4-90b9-02df10a78005\",\"displayName\":\"App\\\\Mail\\\\userSignUpMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:23:\\\"App\\\\Mail\\\\userSignUpMail\\\":4:{s:4:\\\"data\\\";a:10:{s:7:\\\"user_id\\\";i:43;s:4:\\\"name\\\";s:6:\\\"dinesh\\\";s:4:\\\"desc\\\";s:116:\\\"<p style=\'color:green;\'>Hi dinesh, Your OTP is 382127 for claimprocess login. This is valid for 10 minutes only.<\\/p>\\\";s:5:\\\"email\\\";s:28:\\\"dinesh.sharma11013@gmail.com\\\";s:12:\\\"company_name\\\";s:12:\\\"claimprocess\\\";s:6:\\\"mobile\\\";s:10:\\\"9711013016\\\";s:8:\\\"rem_addr\\\";s:9:\\\"127.0.0.1\\\";s:3:\\\"url\\\";s:31:\\\"http:\\/\\/localhost\\/claim2\\/sign-in\\\";s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:3:\\\"otp\\\";i:382127;}s:7:\\\"subject\\\";s:31:\\\"claimprocess - OTP Notification\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"dineshkumar@jigsaw.edu.in\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 0, NULL, 1669628086, 1669628086);

-- --------------------------------------------------------

--
-- Table structure for table `llp_master_data`
--

CREATE TABLE `llp_master_data` (
  `id` int(11) NOT NULL,
  `ip_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registeration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_subcategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_of_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorised_capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_up_capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_incorporation` date DEFAULT NULL,
  `registeration_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_other_than_ro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whether_listed_or_not` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_compilance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suspended_at_stock_exchange` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_last_agm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_balancesheet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_status_for_efilling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `llp_master_data`
--

INSERT INTO `llp_master_data` (`id`, `ip_id`, `company_name`, `roc_code`, `registeration_number`, `company_category`, `company_subcategory`, `class_of_company`, `authorised_capital`, `paid_up_capital`, `number_of_member`, `date_of_incorporation`, `registeration_address`, `address_other_than_ro`, `email_id`, `whether_listed_or_not`, `active_compilance`, `suspended_at_stock_exchange`, `date_of_last_agm`, `date_of_balancesheet`, `company_status_for_efilling`, `cin`) VALUES
(4, '15', 'sabredge', '7', '123', 'it', 'sabcat', 'development', '1000000000', '5000', '13', '2023-06-27', 'register_address', 'address', 'e@gmail.com', 'g@gmail.com', 'active', '8', '2023-06-28', '2023-06-29', 'fc', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `log_mdls`
--

CREATE TABLE `log_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mthd` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_output` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `err` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `err_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_mdls`
--

INSERT INTO `log_mdls` (`id`, `page_type`, `user_id`, `admin_id`, `page_name`, `page_url`, `mthd`, `action`, `action_output`, `err`, `err_msg`, `rem_addr`, `date`, `created_at`, `updated_at`) VALUES
(217, 'signup', '', '', 'User-signup', 'http://localhost/claim3/sign-up', '', 'Insert', 'Fail', '', '', '127.0.0.1', '2023-04-07', '2023-04-07 14:26:11', ''),
(218, 'signup', '', '', 'User-signup', 'http://localhost/claim3/sign-up', '', 'Insert', 'Fail', '', '', '127.0.0.1', '2023-04-07', '2023-04-07 14:27:12', ''),
(219, 'signup', '', '', 'User-signup', 'http://localhost/claim3/sign-up', '', 'Insert', 'Fail', '', '', '127.0.0.1', '2023-04-07', '2023-04-07 14:28:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `mailing_detials_mdls`
--

CREATE TABLE `mailing_detials_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exact_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailing_detials_mdls`
--

INSERT INTO `mailing_detials_mdls` (`id`, `from`, `to`, `title`, `subject`, `desc`, `path`, `files`, `date`, `exact_time`, `rem_addr`, `created_at`, `updated_at`) VALUES
(1, '7', 'dinesh.sharma11013@gmail.com', 'User Claim Amount Approval', 'sdf', '<!--  <br><br><br> -->\n        <p>            \n       Dear Mr. …,</p>\n <p>This is in reference to the claim filed by you under ……. in respect of your outstanding dues against M/s ………. (Under CIRP). The said claim has been provisionally verified on the basis of records and information available and submitted by you and their scrutiny by me. Details of claims submitted by you and the claims provisionally admitted are mentioned below:</p>\n\n<table style=\"border-color: 1px solid black;\">\n  <tr>\n <th> Unique Identification No. </th> <th style=\"width:200px\"> Amount Claimed </th> <th style=\"width:200px\"> Amount Provisionally admitted </th> <th style=\"width:200px\"> Amount Not Admitted</th>\n</tr>\n<tr>\n  <td></td>\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"margin-left: 20px;\">Interest</span> </td> \n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \n  </tr>\n  <tr>\n    <td></td>\n            <td>\n              </td> \n           \n           <td>\n            </td> \n           \n            <td>\n               </td> \n</tr>\n</table>\n\n<p> \nThere is a difference of amount claimed and admitted on account of the reasons:\n1.  Receipts of payments are only for Rs. 1,28,41,688 as such the total principal has not been admitted\n2.  Please note that you have claimed the entire amount inclusive of service tax, kindly note that we can admit only the principal amount exclusive of service tax as service tax is the statutory liability of the Corporate Debtor as such there is a difference between the Principal amount claimed and Principal amount provisionally admitted.\n3.  Further there is a difference in the interest claimed and admitted on account of the difference in principal amount provisionally admitted.\n</p>\n<p> \nKindly note that this is only a provisional admission of the claim and will undergo change(s) based on the further documents submitted by you or as available for the Corporate Debtor.\n </p>\n <p>\n \nDisclaimer: Your claim has been accepted/ admitted on provisional basis based on documents and information submitted by you. We have not yet received any data from the Corporate Debtor (SIPL) to enable us to cross verify the claims with the records and books of the Corporate Debtor. Hence this admitted amount may undergo change(s) after cross verification from the appropriate data available with me from corporate debtor or any alternate authentic source. In case you have any additional corroborative information/records same may please be furnished at the earliest. \n</p>', '/access/media/approval/1677564668', '1677564668144544410963fd9afc3d9a7.jpg, 167756466831042856363fd9afc3e3e1.jpg, 167756466822263556463fd9afc3e92b.png, 167756466815622172063fd9afc3ffe7.jpg', '2023-02-28', '2023-02-28 11:41:08', '127.0.0.1', '2023-02-28 11:41:08', ''),
(2, '7', '43', 'User Claim Amount Approval', 'sdf', '<!--  <br><br><br> -->\r\n        <p>            \r\n       Dear Mr. …,</p>\r\n <p>This is in reference to the claim filed by you under ……. in respect of your outstanding dues against M/s ………. (Under CIRP). The said claim has been provisionally verified on the basis of records and information available and submitted by you and their scrutiny by me. Details of claims submitted by you and the claims provisionally admitted are mentioned below:</p>\r\n\r\n<table style=\"border-color: 1px solid black;\">\r\n  <tr>\r\n <th> Unique Identification No. </th> <th style=\"width:200px\"> Amount Claimed </th> <th style=\"width:200px\"> Amount Provisionally admitted </th> <th style=\"width:200px\"> Amount Not Admitted</th>\r\n</tr>\r\n<tr>\r\n  <td></td>\r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"margin-left: 20px;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n  </tr>\r\n  <tr>\r\n    <td></td>\r\n            <td>\r\n              </td> \r\n           \r\n           <td>\r\n            </td> \r\n           \r\n            <td>\r\n               </td> \r\n</tr>\r\n</table>\r\n\r\n<p> \r\nThere is a difference of amount claimed and admitted on account of the reasons:\r\n1.  Receipts of payments are only for Rs. 1,28,41,688 as such the total principal has not been admitted\r\n2.  Please note that you have claimed the entire amount inclusive of service tax, kindly note that we can admit only the principal amount exclusive of service tax as service tax is the statutory liability of the Corporate Debtor as such there is a difference between the Principal amount claimed and Principal amount provisionally admitted.\r\n3.  Further there is a difference in the interest claimed and admitted on account of the difference in principal amount provisionally admitted.\r\n</p>\r\n<p> \r\nKindly note that this is only a provisional admission of the claim and will undergo change(s) based on the further documents submitted by you or as available for the Corporate Debtor.\r\n </p>\r\n <p>\r\n \r\nDisclaimer: Your claim has been accepted/ admitted on provisional basis based on documents and information submitted by you. We have not yet received any data from the Corporate Debtor (SIPL) to enable us to cross verify the claims with the records and books of the Corporate Debtor. Hence this admitted amount may undergo change(s) after cross verification from the appropriate data available with me from corporate debtor or any alternate authentic source. In case you have any additional corroborative information/records same may please be furnished at the earliest. \r\n</p>', '/access/media/approval/1677565090', '167756509086324819663fd9ca202d8f.jpg, 1677565090122880940463fd9ca203615.jpg, 1677565090114068313963fd9ca203ae4.png, 1677565090193495127663fd9ca204f3a.jpg', '2023-02-28', '2023-02-28 11:48:10', '127.0.0.1', '2023-02-28 11:48:10', ''),
(3, '7', '43', 'User Claim Amount Approval', 'sdf', '<!--  <br><br><br> -->\r\n        <p>            \r\n       Dear Mr. …,</p>\r\n <p>This is in reference to the claim filed by you under ……. in respect of your outstanding dues against M/s ………. (Under CIRP). The said claim has been provisionally verified on the basis of records and information available and submitted by you and their scrutiny by me. Details of claims submitted by you and the claims provisionally admitted are mentioned below:</p>\r\n\r\n<table style=\"border-color: 1px solid black;\">\r\n  <tr>\r\n <th> Unique Identification No. </th> <th style=\"width:200px\"> Amount Claimed </th> <th style=\"width:200px\"> Amount Provisionally admitted </th> <th style=\"width:200px\"> Amount Not Admitted</th>\r\n</tr>\r\n<tr>\r\n  <td></td>\r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"margin-left: 20px;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n  </tr>\r\n  <tr>\r\n    <td></td>\r\n            <td>\r\n              </td> \r\n           \r\n           <td>\r\n            </td> \r\n           \r\n            <td>\r\n               </td> \r\n</tr>\r\n</table>\r\n\r\n<p> \r\nThere is a difference of amount claimed and admitted on account of the reasons:\r\n1.  Receipts of payments are only for Rs. 1,28,41,688 as such the total principal has not been admitted\r\n2.  Please note that you have claimed the entire amount inclusive of service tax, kindly note that we can admit only the principal amount exclusive of service tax as service tax is the statutory liability of the Corporate Debtor as such there is a difference between the Principal amount claimed and Principal amount provisionally admitted.\r\n3.  Further there is a difference in the interest claimed and admitted on account of the difference in principal amount provisionally admitted.\r\n</p>\r\n<p> \r\nKindly note that this is only a provisional admission of the claim and will undergo change(s) based on the further documents submitted by you or as available for the Corporate Debtor.\r\n </p>\r\n <p>\r\n \r\nDisclaimer: Your claim has been accepted/ admitted on provisional basis based on documents and information submitted by you. We have not yet received any data from the Corporate Debtor (SIPL) to enable us to cross verify the claims with the records and books of the Corporate Debtor. Hence this admitted amount may undergo change(s) after cross verification from the appropriate data available with me from corporate debtor or any alternate authentic source. In case you have any additional corroborative information/records same may please be furnished at the earliest. \r\n</p>', '/access/media/approval/1677566828', '1677566828100175941163fda36c42a9c.jpg, 1677566828184454721263fda36c43252.jpg, 1677566828192633152163fda36c436f3.png, 1677566828140206583763fda36c43beb.jpg', '2023-02-28', '2023-02-28 12:17:08', '127.0.0.1', '2023-02-28 12:17:08', ''),
(4, '7', '43', 'User Claim Amount Approval', 'sdf', '<!--  <br><br><br> -->\r\n        <p>            \r\n       Dear Mr. …,</p>\r\n <p>This is in reference to the claim filed by you under ……. in respect of your outstanding dues against M/s ………. (Under CIRP). The said claim has been provisionally verified on the basis of records and information available and submitted by you and their scrutiny by me. Details of claims submitted by you and the claims provisionally admitted are mentioned below:</p>\r\n\r\n<table style=\"border-color: 1px solid black;\">\r\n  <tr>\r\n <th> Unique Identification No. </th> <th style=\"width:200px\"> Amount Claimed </th> <th style=\"width:200px\"> Amount Provisionally admitted </th> <th style=\"width:200px\"> Amount Not Admitted</th>\r\n</tr>\r\n<tr>\r\n  <td></td>\r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"margin-left: 20px;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n           <td><span style=\"float: left;\">Principal</span> -- <span style=\"float: right;\">Interest</span> </td> \r\n  </tr>\r\n  <tr>\r\n    <td></td>\r\n            <td>\r\n              </td> \r\n           \r\n           <td>\r\n            </td> \r\n           \r\n            <td>\r\n               </td> \r\n</tr>\r\n</table>\r\n\r\n<p> \r\nThere is a difference of amount claimed and admitted on account of the reasons:\r\n1.  Receipts of payments are only for Rs. 1,28,41,688 as such the total principal has not been admitted\r\n2.  Please note that you have claimed the entire amount inclusive of service tax, kindly note that we can admit only the principal amount exclusive of service tax as service tax is the statutory liability of the Corporate Debtor as such there is a difference between the Principal amount claimed and Principal amount provisionally admitted.\r\n3.  Further there is a difference in the interest claimed and admitted on account of the difference in principal amount provisionally admitted.\r\n</p>\r\n<p> \r\nKindly note that this is only a provisional admission of the claim and will undergo change(s) based on the further documents submitted by you or as available for the Corporate Debtor.\r\n </p>\r\n <p>\r\n \r\nDisclaimer: Your claim has been accepted/ admitted on provisional basis based on documents and information submitted by you. We have not yet received any data from the Corporate Debtor (SIPL) to enable us to cross verify the claims with the records and books of the Corporate Debtor. Hence this admitted amount may undergo change(s) after cross verification from the appropriate data available with me from corporate debtor or any alternate authentic source. In case you have any additional corroborative information/records same may please be furnished at the earliest. \r\n</p>', '/access/media/approval/1677566971', '16775669712108054063fda3fb2a33d.jpg, 1677566971174990215463fda3fb2aae4.jpg, 167756697182597548863fda3fb2ae34.png, 167756697146498520263fda3fb2bdb2.jpg', '2023-02-28', '2023-02-28 12:19:31', '127.0.0.1', '2023-02-28 12:19:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `mail_sent_mdls`
--

CREATE TABLE `mail_sent_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `output` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_sent_mdls`
--

INSERT INTO `mail_sent_mdls` (`id`, `user_id`, `mail_type`, `mail_from`, `mail_to`, `subject`, `desc`, `name`, `email`, `directory`, `files`, `url`, `rem_addr`, `output`, `error`, `error_msg`, `date`, `created_at`, `updated_at`) VALUES
(485, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 944333 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '122.161.53.189', 'success', '', '', '2023-09-20', '2023-09-20 07:41:41', '2023-09-20 07:41:41'),
(486, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 140598 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '122.161.53.189', 'success', '', '', '2023-09-20', '2023-09-20 07:45:36', '2023-09-20 07:45:36'),
(487, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 560012 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '122.161.53.189', 'success', '', '', '2023-09-20', '2023-09-20 08:09:54', '2023-09-20 08:09:54'),
(488, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 877511 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '122.161.53.189', 'success', '', '', '2023-09-20', '2023-09-20 08:11:19', '2023-09-20 08:11:19'),
(489, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 493542 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '122.161.53.189', 'success', '', '', '2023-09-20', '2023-09-20 08:32:11', '2023-09-20 08:32:11'),
(490, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 328344 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 17:49:59', '2023-09-21 17:49:59'),
(491, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 482870 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 17:55:05', '2023-09-21 17:55:05'),
(492, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 507797 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 18:02:49', '2023-09-21 18:02:49'),
(493, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 782008 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 18:06:27', '2023-09-21 18:06:27'),
(494, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 761512 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 18:07:34', '2023-09-21 18:07:34'),
(495, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 538426 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://demo-claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 18:09:40', '2023-09-21 18:09:40'),
(496, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 442621 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-21', '2023-09-21 18:10:27', '2023-09-21 18:10:27'),
(497, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 398255 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '162.12.245.194', 'success', '', '', '2023-09-22', '2023-09-21 19:56:49', '2023-09-21 19:56:49'),
(498, '56', 'sign-in', 'mail@ipsupport.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 729882 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 04:48:14', '2023-09-22 04:48:14'),
(499, '56', 'sign-in', 'mail@ipsupport.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 235135 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 04:50:26', '2023-09-22 04:50:26'),
(500, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 330443 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 04:52:52', '2023-09-22 04:52:52'),
(501, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 138178 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 04:54:19', '2023-09-22 04:54:19'),
(502, '56', 'sign-in', 'mail@ipsupport.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 547961 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 05:33:20', '2023-09-22 05:33:20'),
(503, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 828852 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 05:34:02', '2023-09-22 05:34:02'),
(504, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 978641 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 05:51:39', '2023-09-22 05:51:39'),
(505, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 552532 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 05:52:31', '2023-09-22 05:52:31'),
(506, '103', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dineshkumar@jigsaw.edu.in', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi vishal test, Your OTP is 455244 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'vishal test', 'dineshkumar@jigsaw.edu.in', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 06:00:16', '2023-09-22 06:00:16'),
(507, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 775512 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'https://claimprocess.ipsupport.in/sign-in', '122.161.50.7', 'success', '', '', '2023-09-22', '2023-09-22 07:09:28', '2023-09-22 07:09:28'),
(508, '56', 'sign-in', 'dineshkumar@jigsaw.edu.in', 'dinesh.sharma11013@gmail.com', 'Sabre Edge IT Solutions - OTP Notification', '<p style=\'color:green;\'>Hi dinesh, Your OTP is 942473 for Sabre Edge IT Solutions login. This is valid for 10 minutes only.</p>', 'dinesh', 'dinesh.sharma11013@gmail.com', '', '', 'http://localhost/claim/sign-in', '127.0.0.1', 'success', '', '', '2023-09-25', '2023-09-25 10:36:17', '2023-09-25 10:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_23_061434_create_claimant_mdls_table', 1),
(6, '2022_07_23_062333_create_provisional_form_b_mdls_table', 1),
(7, '2022_07_26_110354_create_admin_mdls_table', 1),
(8, '2022_07_26_115025_create_general_info_mdls_table', 1),
(10, '2022_08_05_104555_create_form_a_s_table', 1),
(12, '2022_08_19_053539_create_user_mdls_table', 1),
(13, '2022_08_19_072306_create_ar_mdls_table', 1),
(14, '2022_08_19_081606_create_user_type_mdls_table', 1),
(15, '2022_08_19_084645_create_authentication_mdls_table', 1),
(16, '2022_08_22_065956_create_jobs_table', 1),
(17, '2022_08_22_071138_create_jobs_table', 2),
(18, '2022_08_23_123348_create_mail_sent_mdls_table', 2),
(75, '2022_11_16_150648_create_form_c_a_aproval_mdls_table', 36),
(92, '2022_12_07_114230_create_log_mdls_table', 52),
(93, '2022_09_03_085950_create_operational_creditor_mdls_table', 53),
(94, '2022_11_12_161024_create_form_b_approval_mdls_table', 54),
(95, '2022_09_03_090648_create_form_b_files_mdls_table', 55),
(96, '2022_09_16_124726_create_form_b_other_documents_mdls_table', 56),
(98, '2022_12_08_173046_create_company_dtls_table_old', 58),
(104, '2022_12_08_173046_create_company_dtls_table', 59),
(110, '2022_09_20_061432_create_finanicial_creditor_form_c_mdls_table', 63),
(111, '2022_09_20_064026_create_form_c_files_mdls_table', 64),
(112, '2022_09_20_064228_create_form_c_other_document_mdls_table', 65),
(113, '2022_11_17_145750_create_form_c_aproval_mdls_table', 66),
(114, '2022_09_26_093352_create_financial_creditor_form_ca_mdls_table', 67),
(115, '2022_09_26_093534_create_form_ca_files_mdls_table', 68),
(116, '2022_09_26_101100_create_form_ca_other_document_mdls_table', 69),
(117, '2022_11_17_171502_create_form_c_a_aproval_mdls_table', 70),
(118, '2022_11_30_101235_create_form_d_mdls_table', 71),
(119, '2022_11_30_102902_create_form_d_files_mdls_table', 72),
(120, '2022_11_30_103211_create_form_d_other_document_mdls_table', 73),
(121, '2022_12_01_083758_create_form_d_aproval_mdls_table', 74),
(122, '2022_09_28_053816_create_other_creditor_form_f_mdls_table', 75),
(123, '2022_09_28_054648_create_form_f_files_mdls_table', 76),
(124, '2022_09_28_054831_create_form_f_other_document_mdls_table', 77),
(125, '2022_11_24_145113_create_form_f_approval_mdls_table', 78),
(126, '2022_10_03_103245_create_form_e_file_mdls_table', 79),
(127, '2022_10_03_103702_create_form_e_employee_detail_mdls_table', 80),
(129, '2022_11_24_124520_create_form_e_approval_mdls_table', 82),
(130, '2022_10_03_104129_create_form_e_other_document_mdls_table', 83),
(131, '2022_12_30_130640_create_ip_mdls_table', 84),
(140, '2023_01_03_161102_create_form_modification_mdls_table', 85),
(143, '2022_08_17_104220_create_form_a_mdls_table', 86),
(147, '2022_08_04_112507_create_sabredgerep_mdls_table', 87),
(148, '2022_12_16_172154_create_assign_company_mdls_table', 88),
(149, '2023_02_08_161712_create_ar_creditor_class_mdls_table', 89),
(150, '2023_02_28_112452_create_mailing_detials_mdls_table', 90),
(151, '2023_03_21_111447_create_form_b_senction_mdls_table', 91),
(152, '2023_03_22_102441_create_form_b_declarationtables_mdls_table', 92),
(153, '2023_03_22_102840_create_form_b_declaration_table_mdls_table', 93),
(154, '2023_03_23_103110_create_form_c_senction_mdls_table', 94),
(155, '2023_03_23_103649_create_form_c_declaration_table_mdls_table', 95),
(156, '2023_03_25_102310_create_form_f_senction_mdls_table', 96),
(157, '2023_03_25_102649_create_form_f_declaration_table_mdls_table', 97),
(158, '2023_03_28_104233_create_form_c_a_senction_mdls_table', 98),
(159, '2023_03_28_104758_create_form_c_a_declaration_table_mdls_table', 99),
(160, '2023_03_29_120753_create_form_d_senction_mdls_table', 100),
(161, '2023_03_29_121114_create_form_d_declaration_table_mdls_table', 101),
(162, '2023_03_30_103400_create_form_e_senction_mdls_table', 102),
(163, '2023_03_30_103707_create_form_e_declaration_table_mdls_table', 103),
(164, '2023_04_07_152035_create_user_form_submission_auth_mdls_table', 104),
(165, '2023_10_05_104359_create_todo_mdls_table', 105);

-- --------------------------------------------------------

--
-- Table structure for table `operational_creditor_mdls`
--

CREATE TABLE `operational_creditor_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'for ip\r\n',
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-b',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_b_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_correspondence_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principle_amount` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_dispute_deatails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debt_incurred_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_mutual_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_security_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_attached_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_signature` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claimant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_person_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification)',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operational_creditor_mdls`
--

INSERT INTO `operational_creditor_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_b_selected_id`, `operational_creditor_name`, `operational_creditor_address`, `identification_number`, `operational_creditor_correspondence_address`, `operational_creditor_email`, `total_amount`, `principle_amount`, `interest`, `document_details`, `any_dispute_deatails`, `debt_incurred_details`, `any_mutual_details`, `any_security_details`, `account_number`, `bank_name`, `ifsc_code`, `document_attached_list`, `operational_creditor_signature`, `claimant_name`, `creditor_relation`, `signing_person_address`, `unique_id`, `user_unique_id`, `year`, `dat`, `place`, `insolvency_commencement_date`, `select_option`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(180, '11', '13', '14', 56, 'operational-creditor', 'form-b', '', '180', 'ramesh', 'asdf', '324234', '', 'dinesh.sharma11013@gmail.com', '114', '112', '2', '', '', '', 'asdf', '', '', '', '', '', 'sign_647af6e0c06b51685780192.jpg', 'DINESH', 'gdf', 'jkjlkj', '647aedf8a6a201685777912', 'b0319a7c56', '', '', 'delhi', '2023-04-15', '2', '', '', '1', '1', '2023-06-03 13:48:01', '2023-06-03', '2', '2', '1', 'first', '127.0.0.1', '2023-06-03 13:08:32', '2023-06-03 13:48:01'),
(182, '11', '13', '14', 56, 'operational-creditor', 'form-b', '', '180', 'ramesh', 'asdf', '324234', '', 'dinesh.sharma11013@gmail.com2', '114', '112', '2', '', '', '', 'asdf', '', '', '', '', '', 'sign_647af6e0c06b51685780192.jpg', 'DINESH', 'gdf', 'jkjlkj', '647aedf8a6a201685777912', 'b0319a7c56', '', '', 'delhi', '2023-04-15', '1', '', '', '1', '1', '2023-06-03 15:33:35', '2023-06-03', '2', '2', '2', 'latest', '127.0.0.1', '2023-06-03 13:08:32', '2023-06-03 15:33:35'),
(183, '3', '15', '15', 56, 'operational-creditor', 'form-b', '', '183', 'asdf', '', '', '', 'dinesh.sharma11013@gmail.com', '4357', '4234', '123', 'asdf', '', '', '', '', '', '', '', '', 'sign_647d71b422b631685942708.jpg', 'DINESH', '', 'jkjlkj', '647d71b41e80e1685942708', '3891540627', '', '', '', '2023-01-01', '1', '', '', '1', '1', '2023-08-09 13:11:56', '2023-08-09', '2', '2', '1', 'latest', '122.161.50.89', '2023-06-05 10:55:08', '2023-08-09 13:11:56'),
(190, '15', '27', '21', 116, 'operational-creditor', 'form-b', '', '190', 'only shriya', '23- hijs jost building , nj', 'onlyshriya', '', '222323232@jigsaw.edu.in', '356', '23', '333', 'N/A', '', '', '', '', '', '', '', '', 'sign_64d0a12424dac1691394340.png', 'MM', '', '', '64d0a1035bf351691394307', '8621794530', '', '', '', '2023-04-27', '1', '', '', '2', '2', '2023-08-07 13:15:07', '2023-08-07', '2', '2', '2', 'latest', '122.161.50.221', '2023-08-07 13:15:07', '2023-08-07 13:15:40'),
(191, '3', '15', '15', 113, 'operational-creditor', 'form-b', '', '191', 'akshit enterprise', '2349-B,', 'Kilostr2390PO', '', 'sukhmanp141@gmail.com', '7679', '6789', '890', 'N/A', 'N?A', '', '', '', '', '', '', '', 'sign_64d1dddae790e1691475418.png', 'SUKHMAN', '', '', '64d1ddcd9421e1691475405', '8127509643', '', '', 'karol bagh', '2023-01-01', '1', '', '', '1', '1', '2023-08-10 11:23:15', '2023-08-10', '2', '2', '1', 'latest', '122.161.50.89', '2023-08-08 11:46:45', '2023-08-10 11:23:15'),
(192, '14', '27', '19', 118, 'operational-creditor', 'form-b', '', '192', 'Akash', 'A- Block Pitampura delhi 110087', '8745185412845120', '', 'developer@gmail.com', '8040', '7500', '540', 'Pan card\r\n\r\naadhar card \r\nphoto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '916010040853982', 'Axis bank', 'UTIB0000096', '', 'sign_64f2e0acf39f11693638828.jpeg', 'VIKAS SINGH', 'self', 'A-229 begum vihar ext. begumpur delhi 110086', '64f2df0f708d01693638415', '2583649071', '', '', 'Delhi', '2023-04-27', '1', '', '', '1', '1', '2023-09-04 13:14:58', '2023-09-04', '2', '2', '1', 'first', '122.161.53.123', '2023-09-02 12:36:55', '2023-09-04 13:14:58'),
(193, '14', '27', '19', 118, 'operational-creditor', 'form-b', '', '192', 'Akash singh', 'A- Block Pitampura delhi 110087', '8745185412845120', '', 'developer@gmail.com', '8040', '7500', '540', 'Pan card\r\n\r\naadhar card \r\nphoto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '916010040853982', 'Axis bank', 'UTIB0000096', '', 'sign_64f2e0acf39f11693638828.jpeg', 'VIKAS SINGH', 'self', 'A-229 begum vihar ext. begumpur delhi 110086', '64f2df0f708d01693638415', '2583649071', '', '', 'Delhi', '2023-04-27', '1', '', '', '1', '1', '2023-09-04 13:20:28', '2023-09-04', '2', '2', '2', 'latest', '122.161.53.123', '2023-09-02 12:36:55', '2023-09-04 13:20:28'),
(194, '23', '31', '31', 120, 'operational-creditor', 'form-b', '', '194', 'Mohan Lal', '', '', '', 'mohan@gmail.com', '8380608', '8379173', '1435', 'Aadhar Card, PAN Card, Bank Statement', '', '', '', '', '876543221532', 'HDFC Bank', 'hdfc824713', '', 'sign_650424bc3abda1694770364.jpeg', 'MOHAN LAL KUMAR', 'Creditor', 'New Delhi', '6504245949dc91694770265', '8310649527', '', '', 'New Delhi', '2023-09-15', '1', '', '', '1', '1', '2023-09-15 15:36:20', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 15:01:05', '2023-09-15 15:36:20'),
(195, '24', '30', '32', 121, 'operational-creditor', 'form-b', '', '195', 'Vikram Kumar', 'NA', '254GHFDF67574', '', 'vikram@gmail.com', '580136', '543560', '36576', 'NA', 'NA', 'NA', 'NA', 'NA', '25436869878', 'IDFC BANK', 'IDFC676478', '', 'sign_650440a2318c61694777506.png', 'VIKRAM KUMAR', 'CREDITOR', 'DELHI', '65044072e29a81694777458', '9246381750', '', '', '', '2023-09-15', '1', '', '', '1', '1', '2023-09-15 17:06:17', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 17:00:58', '2023-09-15 17:06:17'),
(196, '24', '30', '32', 121, 'operational-creditor', 'form-b', '', '196', 'vikram', '', '', '', 'vikram@gmail.com', '6429144', '6387492', '41652', '', '', '', '', '', '', '', '', '', 'sign_650819d4e6d5c1695029716.jpeg', 'VIKRAM KUMAR', '', '', '650819c2ea69b1695029698', '0169384275', '', '', '', '2023-09-15', '1', '', '', '1', '1', '2023-09-18 15:05:21', '2023-09-18', '2', '2', '1', 'latest', '122.161.53.189', '2023-09-18 15:04:58', '2023-09-18 15:05:21'),
(197, '23', '31', '31', 123, 'operational-creditor', 'form-b', '', '197', 'Yash', 'ijandsxj', '12345', '', 'godigital@jigsaw.edu.in', '2445', '1234', '1211', 'EJLSNX', 'isjd', '9jin', 'jinq', '9jids', '91823431221', 'idhsjbnm', '12342EHDSJN', '', 'sign_65094fe8000ca1695109096.jpeg', 'YASH', 'IJESD', 'EUDNSXJC', '65094fccb05391695109068', '3984671520', '', '', 'WEIJDD', '2023-09-15', '1', '', '', '1', '1', '2023-09-19 13:08:39', '2023-09-19', '2', '2', '1', 'latest', '122.161.53.189', '2023-09-19 13:07:48', '2023-09-19 13:08:39'),
(198, '23', '31', '31', 123, 'operational-creditor', 'form-b', '', '198', 'Yash', '', 'jsa', '', 'godigital@jigsaw.edu.in', '246', '123', '123', '', '', '', '', '', '', '', '', '', 'sign_650960ec22bbc1695113452.jpeg', 'YASH', '', '', '6509606b88a831695113323', '7543028916', '', '', '', '2023-09-15', '1', '', '', '1', '1', '2023-09-19 14:21:17', '2023-09-19', '2', '2', '1', 'first', '122.161.53.189', '2023-09-19 14:18:43', '2023-09-19 14:21:17'),
(199, '23', '31', '31', 123, 'operational-creditor', 'form-b', '', '198', 'Yash', '', 'jsa', '', 'godigital@jigsaw.edu.in', '246', '123', '123', '', 'dsaxjzafi', 'dsihzxn', '', '', '', '', '', '', 'sign_650960ec22bbc1695113452.jpeg', 'YASH', '', '', '6509606b88a831695113323', '7543028916', '', '', '', '2023-09-15', '1', '', '', '1', '1', '2023-09-19 14:31:58', '2023-09-19', '2', '2', '2', 'latest', '122.161.53.189', '2023-09-19 14:18:43', '2023-09-19 14:31:58'),
(200, '11', '13', '14', 56, 'operational-creditor', 'form-b', '', '200', 'asdf', '', 'sdf', '', 'dinesh.sharma11013@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', 'sign_6513e0e9980aa1695801577.jpeg', 'DINESH', '', 'jkjlkj', '6513d83a628cd1695799354', '2701893564', '', '', '', '2023-04-15', '1', '', '', '2', '2', '2023-09-27 12:52:34', '2023-09-27', '2', '2', '2', 'latest', '127.0.0.1', '2023-09-27 12:52:34', '2023-09-27 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `other_creditor_form_f_mdls`
--

CREATE TABLE `other_creditor_form_f_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `irp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formA` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `form_type` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-f',
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_f_selected_id` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_identification_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_amt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_amt_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_mutual_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_held` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_ifsc_code` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_signature` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_position` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signing_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insolvency_commencement_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select_option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `updated_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'updated by admin',
  `submitted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `mailed` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for active, 2 for deactive',
  `dat_update_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'done by user',
  `flag` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for seen, 2 for unseen (for notification) ',
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 Yes, 2 No',
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for new, 2 for updated',
  `formType` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT 'first,updated,latest ',
  `rem_addr` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_creditor_form_f_mdls`
--

INSERT INTO `other_creditor_form_f_mdls` (`id`, `company`, `irp`, `formA`, `user_id`, `form_type`, `formName`, `ar`, `form_f_selected_id`, `fc_name`, `fc_identification_number`, `fc_address`, `fc_email`, `claim_amt`, `claim_amt_desc`, `document_details`, `claim_details`, `other_mutual_details`, `security_held`, `bank_account_number`, `bank_name`, `bank_ifsc_code`, `fc_signature`, `signing_person_name`, `creditor_position`, `signing_address`, `place`, `insolvency_commencement_date`, `select_option`, `unique_id`, `user_unique_id`, `year`, `dat`, `admin_id`, `updated_date`, `submitted`, `mailed`, `dat_update_user`, `date`, `flag`, `deleted`, `status`, `formType`, `rem_addr`, `created_at`, `updated_at`) VALUES
(24, '2', '13', '14', 56, 'other-creditor', 'form-f', '', '24', 'hari', '23423424', 'mirza pur', 'dinesh.sharma1103@gmail.com', '50000000', 'jasdfhkjahsdjkfhakjshdfh', '', '', '', '', '', '', '', 'sign_642ab4fbef9381680520443.jpg', 'raju', 'manager', 'cp', '', '', '1', '642ab4e6161fc1680520422', '', '', '', '', '', '1', '1', '2023-04-03 16:44:18', '2023-04-03', '2', '2', '1', 'latest', '::1', '2023-04-03 16:44:03', '2023-04-03 16:44:18'),
(25, '15', '27', '20', 108, 'other-creditor', 'form-f', '', '25', 'KANWAR PAL', 'PHONE NUMBER- 9899296785', 'J2/424, DEV NAGAR, KAROL BAGH, DELHI - 110005', 'nakul.lawarai1@yahoo.com', '6000', 'FAN MOTOR AND OTHER', 'AC INVOICE', 'DATE OF CHARGES- 09-05-2022', 'NA', 'NA', '0253051467123', 'ICICI BANK', 'ICIC0000253', 'sign_644a71b254e0b1682600370.jpeg', 'NAKUL LAWARIA', 'SON OF KANWAR PAL', 'J2/424, DEV NAGAR, KAROL BAGH, DELHI - 110005', 'DELHI', '', '1', '644a71a6779cf1682600358', '', '', '', '', '', '1', '1', '2023-04-27 18:29:53', '2023-04-27', '2', '2', '1', 'latest', '122.161.53.234', '2023-04-27 18:29:18', '2023-04-27 18:29:53'),
(26, '16', '27', '22', 56, 'other-creditor', 'form-f', '', '26', 'akansha singh', 'AASD2309SGH', '4-A Mansi appartment, Mansarovar garden, south delhi-110020', 'dinesh.sharma11013@gmail.com', '450000', 'total amount', 'N/A', 'N/A', 'N/A', 'N/A', '900222603769', 'CANARA', 'CNRB38260PD', 'sign_644b639ba23f61682662299.jfif', 'Ankush', 'Financial Creditor', 'g-4 Paras Colony, Laxmi Park, New Delhi-110029', 'Mansarovar Garden', '', '1', '644b628337aa31682662019', '', '', '', '', '', '1', '1', '2023-04-28 11:42:20', '2023-04-28', '2', '2', '1', 'latest', '122.161.53.234', '2023-04-28 11:36:59', '2023-04-28 11:42:20'),
(35, '3', '15', '15', 56, 'other-creditor', 'form-f', '', '35', 'sdf', '', '', 'dinesh.sharma11013@gmail.com', '342', 'adf', '', '', '', '', '', '', '', 'sign_6465ee57cfed11684401751.jpg', 'SDF', 'sdf', 'df', 'asdf', '2023-01-01', '1', '6465ee456395c1684401733', '', '', '', '', '', '1', '1', '2023-05-19 13:14:59', '2023-05-19', '2', '2', '1', 'latest', '127.0.0.1', '2023-05-18 14:52:13', '2023-05-19 13:14:59'),
(36, '14', '27', '19', 118, 'other-creditor', 'form-f', '', '36', 'GOLU', '8754214512458751245', 'Delhi', 'developer@gmail.com', '1000', 'Description of the claim', 'Details of documents by reference to which claim can be substantiated', 'claim when the claim arose if golu is not pay claim amount then golu is give home paper', '. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim', 'ny relation of the title arrangement in respect of goods or properties to which the claim refers', '9412051205120', 'canara bank', 'cana5412054120', 'sign_64f308c1c26271693649089.jpeg', 'GOLU', 'Friend', 'Dwarka sec 8 delhi 110086', 'delhi', '2023-04-27', '1', '64f306b2525a71693648562', '2109346857', '', '', '', '', '1', '1', '2023-09-04 12:44:15', '2023-09-04', '2', '2', '1', 'first', '122.161.53.123', '2023-09-02 15:26:02', '2023-09-04 12:44:15'),
(37, '14', '27', '19', 118, 'other-creditor', 'form-f', '', '36', 'GOLU', '8754214512458751245', 'Delhi', 'developer@gmail.com', '1000', 'Description of the claim', 'Details of documents by reference to which claim can be substantiated', 'claim when the claim arose if golu is not pay claim amount then golu is give home paper', '. Details of any mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the creditor which may be set-off against the claim', 'ny relation of the title arrangement in respect of goods or properties to which the claim refers', '9412051205120', 'canara bank', 'cana5412054120', 'sign_64f308c1c26271693649089.jpeg', 'GOLU', 'Friend', 'Dwarka sec 8 delhi 110086', 'delhi', '2023-04-27', '1', '64f306b2525a71693648562', '2109346857', '', '', '', '', '1', '1', '2023-09-04 13:12:05', '2023-09-04', '2', '2', '1', 'latest', '122.161.53.123', '2023-09-02 15:26:02', '2023-09-04 13:12:05'),
(38, '14', '27', '19', 118, 'other-creditor', 'form-f', '', '38', 'Vikash', '847561230asdf512', 'Delhi', 'developer@gmail.com', '400', 'Delhi', 'Details of documents by reference to which claim can be substantiated', 'Details of how and when the claim arose', 'mutual credit, mutual debts, or other mutual dealings between the corporate debtor and the cre', 'any security held, the value of security and its date, or', '916010040853982', 'HDFC BANK', 'utib0000096', 'sign_64f5adb1e82921693822385.jpg', 'AAKASH', 'RELATION TO CREDITOR', 'DELHI', 'DELHI', '2023-04-27', '1', '64f5ac39c409d1693822009', '7952043186', '', '', '', '', '1', '1', '2023-09-04 15:43:17', '2023-09-04', '2', '2', '1', 'latest', '122.161.53.123', '2023-09-04 15:36:49', '2023-09-04 15:43:17'),
(39, '23', '31', '31', 120, 'other-creditor', 'form-f', '', '39', 'MOHAN LAL KUMAR', '', '', 'mohan@gmail.com', '71253712', 'NA', 'NA', 'NA', 'NA', 'NA', '76576323', '', '', 'sign_65043c5e9f8a21694776414.png', 'MOHAN LAL KUMAR', 'CREDITOR', 'NEW DELHI', '', '2023-09-15', '1', '65043c55bb6001694776405', '4073982561', '', '', '', '', '1', '1', '2023-09-15 16:43:38', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 16:43:25', '2023-09-15 16:43:38'),
(40, '24', '30', '32', 121, 'other-creditor', 'form-f', '', '40', 'VIKRAM KUMAR', 'UTI576437579J', 'NEW DELHI', 'vikram@gmail.com', '4776798', 'NA', 'NA', 'NA', 'NA', 'NA', '87574636587', 'PUNJAB NATIONAL BANK', 'PNB46535467', 'sign_650446ad8b5f91694779053.png', 'VIKRAM KUMAR', 'CREDITOR', 'NEW DELHI', '', '2023-09-15', '1', '650446724db1a1694778994', '0214739586', '', '', '', '', '1', '1', '2023-09-15 17:27:38', '2023-09-15', '2', '2', '1', 'latest', '122.161.50.102', '2023-09-15 17:26:34', '2023-09-15 17:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provisional_form_b_mdls`
--

CREATE TABLE `provisional_form_b_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorised_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized_person_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operational_creditor_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorized_representative_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_details_reference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_any_dispute` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debt_incurred_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutual_credit_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_of_documents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sabredgerep_mdls`
--

CREATE TABLE `sabredgerep_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `update_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 for yes, 2 for no',
  `deleted_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sabredgerep_mdls`
--

INSERT INTO `sabredgerep_mdls` (`id`, `company_id`, `name`, `design`, `contact`, `signature`, `rem_addr`, `status`, `created_time`, `created_by_id`, `update_time`, `updated_by`, `deleted`, `deleted_time`, `deleted_by`) VALUES
(5, 12, 'Akash', 'Software developer', '7777777777', '', '103.212.158.106', '1', '2023-06-27 13:06:59', 28, '2023-06-27 13:07:34', '28', '1', '2023-06-27 13:09:19', '28'),
(6, 12, 'Akash', 'software developer', '7777777777', '649a92410c8ee1687851585.jpg', '103.212.158.106', '1', '2023-06-27 13:09:45', 28, '', '', '1', '2023-06-27 13:09:58', '28'),
(7, 7, '10', 'software developer', '7777777770', '', '103.212.158.106', '1', '2023-06-27 13:10:16', 28, '2023-08-10 14:15:51', '7', '2', '', ''),
(8, 3, '10', 'cheche', '9999999900', '', '122.161.48.202', '1', '2023-06-28 13:16:12', 15, '2023-08-10 14:16:04', '7', '2', '', ''),
(9, 19, '10', 'software developer', '8520741099', '64f5b3625c4931693823842.jpg', '122.161.53.123', '1', '2023-09-04 16:07:22', 7, '', '', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_line`
--

CREATE TABLE `time_line` (
  `id` int(11) NOT NULL,
  `Section_Regulation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Activity_Steps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Forms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `To_Whom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Within_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Timelines` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Due_Date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Revised_Dates_as_per_form_` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Actual_Date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Reason_for_delay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_line`
--

INSERT INTO `time_line` (`id`, `Section_Regulation`, `Activity_Steps`, `Forms`, `To_Whom`, `Role`, `Within_days`, `Timelines`, `Due_Date`, `Revised_Dates_as_per_form_`, `Actual_Date`, `Reason_for_delay`, `Site`, `Format`) VALUES
(1, 'Sec. 7, 9 & 10/ Sec. 34', 'Consent for CIRP', '2/ AA/ Info', 'FC/OC/CD', 'IRP/ RP/ Liq.', '', 'A', 'Saturday, 0 January, 1900', '', '', '', 'nclt.gov.in/nclat.gov.in', 'Form-2'),
(2, 'IBBI circular 14th August, 2018', 'Intimation to IBBI', 'IP-1', 'IBBI', 'IRP/RP/Lqdr', '3 D of consent', 'A+3', 'Tuesday, 3 January, 1900', '', '', '', '', ''),
(3, 'Sec. 16(1)', 'DOC & Apt. of IRP', 'X', 'X', 'IRP', 'DOC (date of RO) & IRP app.', 'T', 'Activity/Steps', '', '', '', '', ''),
(4, 'Reg. 6(1)', 'PA: Two News Papers', 'Form A', 'NewsPaper', 'IRP', '3 D of RO', 'T+3', '#VALUE!', '', '', '', '', ''),
(5, 'Circular dated 16.01.18', 'RD with the CD.', 'website', 'IPA', 'IRP', '3 D of RO', 'T+3', '#VALUE!', '', '', '', '', ''),
(6, 'Monitoring Policy', 'PA', 'website', 'IPA', 'IRP', '7 D of RO', 'T+7', '#VALUE!', '', '', '', '', ''),
(7, 'Circular dated 14.08.19', 'PA', 'CIRP-1', 'IBBI', 'IRP', '7 D of PA', 'T+10', '#VALUE!', '', '', '', '', ''),
(8, 'Sec. 15(1)(c)/ Reg. 6(2)(c)  and 12 (1)', 'Submission of Claims', 'X', 'X', 'IRP', '14 D of IRP app.', 'T+14', '#VALUE!', '', '', '', '', ''),
(9, 'Reg. 13(1)', 'Verification of Claims', 'X', 'X', 'IRP', '7 D of last date of ROC', 'T+21', '#VALUE!', '', '', '', '', ''),
(10, 'Sec. 21(6A) (b) / Reg. 16A', 'App. for Apt. of AR', 'X', 'X', 'IRP', '2 D of VOC', 'T+23', '#VALUE!', '', '', '', '', ''),
(11, 'Reg. 17(1)', 'Report of CCoC', 'X', 'NCLT', 'IRP', '2 D of VOC', 'T+23', '#VALUE!', '', '', '', '', ''),
(12, 'Reg. 13(2)(ca) of CIRP Reg.', 'List of Creditors', 'website', 'IBBI', 'IRP/ RP.', 'X', 'T+ 23', '#VALUE!', '', '', '', '', ''),
(13, 'Sec. 22(1) / Reg. 19(2)', 'Notice to FC for COC Meeting', 'X', 'COC', 'IRP', '2 D of Co. of COC or before 5 days before COC Meeting', 'T+25', '#VALUE!', '', '', '', '', ''),
(14, 'Circular dated 16.01.18', 'RD with the FC/COC', 'Website', 'IPA', 'IRP', '3 D of Co. of COC', 'T+26', '#VALUE!', '', '', '', '', ''),
(15, 'Sec. 22(1) / Reg. 19(2)', '1st  meeting of the CoC', 'X', 'X', 'IRP', '7 D of Co. of COC or 30 D of RO', 'T+30', '#VALUE!', '', '', '', '', ''),
(16, 'Circular dated 16.01.18', 'RD with other professional (Transaction Auditor)', 'Website', 'IPA/All Stakeholders', 'IRP', '3 D of app.', 'E+3', '#VALUE!', '', '', '', '', ''),
(17, 'Sec.', 'Apt. of OP', 'Website', 'IPA ', 'IRP', '3 D of app.', 'E+3', '#VALUE!', '', '', '', '', ''),
(18, 'Sec. 22(2)', 'Resolution to appoint RP by the CoC, Intimation or Confirmation to NCLT', 'X', 'X', 'IRP', '1st Meeting of COC', 'T+30', '#VALUE!', '', '', '', '', ''),
(19, 'Sec. 22(2)', 'Minutes of COC', 'Minutes', 'COC', 'IRP', '48 hrs of 1st meeting of COC', 'T+32', '#VALUE!', '', '', '', '', ''),
(20, 'Sec. 28', 'Evoting on activities for approval', 'Evoting', 'COC', 'IPR', 'e voting for minimum 24 hrs or as decided by COC', 'T+33', '#VALUE!', '', '', '', '', ''),
(21, 'Reg.', 'Cost disclosure:\n-IP\n-IP Entity\n-Fee of Professionals engaged by him', 'Website', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(22, 'Circular dated 14.08.19', 'CIRP 2 (IRP)\n(From PA till replacement of IRP)', 'CIRP 2', 'IBBI', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(23, 'Sec. 208 (2)(d)', 'Detail of Claim of Creditors', 'Email', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(24, 'Sec. 208 (2)(d)', 'Detail of Apt. of AR', 'Email', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(25, 'Sec. 208 (2)(d)', 'Detail of COC', 'Email', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(26, 'Sec. 208 (2)(d)', 'Detail of Ist meeting of COC', 'Email', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(27, 'Sec. 208 (2)(d)', 'Document submitted before AA', 'Email', 'IPA ', 'IRP', '7 D of DO', 'T+40', '#VALUE!', '', '', '', '', ''),
(28, 'Circular dated 14.08.19', 'CIRP 6 \n(Event Specific)', 'CIRP 6', 'IBBI', 'IRP', '7 D of E', 'E+7', '#VALUE!', '', '', '', '', ''),
(29, 'Sec. 7, 9 & 10/ Sec. 34', 'Consent for CIRP', '2/ AA/ Info', 'FC/OC/CD', 'IRP/ RP/ Liq.', '', 'A', 'Saturday, 0 January, 1900', '', '', '', '', ''),
(30, 'IBBI circular 14th August, 2018', 'Appointment of RP', 'IP-1', 'IBBI', 'RP', '7 D of E', 'E+7', '#VALUE!', '', '', '', '', ''),
(31, 'Reg. 17(3)', 'IRP performs the functions of RP till the RP is appointed.', 'X', 'X', 'IRP', 'IRP continuing as RP', 'T+40', '#VALUE!', '', '', '', '', ''),
(32, 'Reg. 27', 'Apt. of valuer', 'X', 'X', 'RP', '7 D of RP app. Not later than 47th DOC', 'T+47', '#VALUE!', '', '', '', '', ''),
(33, 'Circular dated 16.01.18', 'RD with RV', 'website', 'IPA/All Stakeholders', 'RP', '3 D of app. of RV', 'T+50', '#VALUE!', '', '', '', '', ''),
(34, 'Sec. 12(A)/ Reg. 30A', 'Submission of App. for withdrawal of App. admitted', 'X', 'X', 'RP', 'Before issue of EoI', 'W', 'CIRP Commencement date', '', '', '', '', ''),
(35, 'Sec. 208 (2)(d)', 'Detail of withdrawl of App.', 'Website', 'IPA ', 'RP', '7 D of E', 'W+7', '#VALUE!', '', '', '', '', ''),
(36, 'Sec. 12(A)/ Reg. 30A', 'CoC to dispose of the withdrawl application', 'X', 'X', 'RP', '7 D of RO or 7 D of Co. of COC, later', 'W+7', '#VALUE!', '', '', '', '', ''),
(37, 'Sec. 12(A)/ Reg. 30A', 'Filing application of withdrawal, if approved by CoC with 90% majority voting, by RP to AA', 'X', 'X', 'RP', '3 D of approval of COC', 'W+10', '#VALUE!', '', '', '', '', ''),
(38, 'Reg. 36 (1)', 'Submission of IM to CoC (Ensure confidentialy Undertaking in Place)', 'X', 'COC', 'RP', '2 week of app. Of RP, not later than 54th DOC', 'T+54', '#VALUE!', '', '', '', '', ''),
(39, 'Circular dated 14.08.19', 'Submission of IM to CoC', 'CIRP-3', 'IBBI', 'RP', '7 D of E', 'T+61', '#VALUE!', '', '', '', '', ''),
(40, 'Reg. 35A', 'RP to form an opinion on preferential and other transactions', 'X', 'X', 'RP', '75 of DOC', 'T+75', '#VALUE!', '', '', '', '', ''),
(41, 'Reg. 36A', 'Invitation of EOI, publish Form G in two news papers', 'Form G', 'IBBI/News', 'RP', '75 of DOC', 'T+75', '#VALUE!', '', '', '', '', ''),
(42, 'Reg. 12(2)', 'Submission of claims', 'X', 'X', 'RP', 'upto 90th DOC', 'T+90', '#VALUE!', '', '', '', '', ''),
(43, 'Reg. 36A', 'Submission of EoI', 'X', 'X', 'RP', 'At least 15 D from issue of EoI ', 'T+90', '#VALUE!', '', '', '', '', ''),
(44, 'Reg. 13(1)', 'VOC   received   under regulation 12 (2)', 'X', 'X', 'RP', '7 D of RO', 'T+97', '#VALUE!', '', '', '', '', ''),
(45, 'Reg. 36A', 'PL of RAs by RP', 'X', 'RA', 'RP', '10 D from the last day of receipt of EoI', 'T+100', '#VALUE!', '', '', '', '', ''),
(46, 'Reg. 36A', 'Submission of objections to PL', 'X', 'X', 'RP', '5 D of PL', 'T+105', '#VALUE!', '', '', '', '', ''),
(47, 'Reg. 36B', 'Issue of RFRP, including Evaluation Matrix and IM', 'X', 'RA', 'RP', '5 D of PL', 'T+105', '#VALUE!', '', '', '', '', ''),
(48, 'Circular dated 14.08.19', 'Issue of RFRP, including Evaluation Matrix and IM reporting', 'CIRP-4', 'IBBI', 'RP', '7 D of E', 'T+112', '#VALUE!', '', '', '', '', ''),
(49, 'Reg. 36A', 'Final List of RAs by RP', 'X', 'COC', 'RP', '10D of Obj.', 'T+115', '#VALUE!', '', '', '', '', ''),
(50, 'Reg. 35A', 'RP to make a determination on preferential and other transactions', 'email', 'IBBI', 'RP', '115 D of DOC', 'T+115', '#VALUE!', '', '', '', '', ''),
(51, 'Circular dated 16.01.18', 'RD with RA\'s', 'website', 'IPA/All Stakeholders', 'RP', '3 D of final list', 'T+118', '#VALUE!', '', '', '', '', ''),
(52, 'Reg. 35A', 'RP to file app. to AA for appropriate relief', 'X', 'NCLT', 'RP', '135 of DOC', 'T+135', '#VALUE!', '', '', '', '', ''),
(53, 'Reg. 36B', 'Receipt of Resolution Plans', 'X', 'X', 'RP', 'Atleast 30D of RFRP', 'T+135', '#VALUE!', '', '', '', '', ''),
(54, 'Circular dated 14.08.19', 'Reporting of PUFE Trasaction ', 'CIRP-8', 'IBBI', 'RP', 'Within 140th days', 'T+140', '#VALUE!', '', '', '', '', ''),
(55, 'Reg. 39(4)', 'Submission  of  CoC  approved  Resolution Plan to AA', 'X', 'NCLT', 'RP', 'after approval by COC, 15 days from Completion date.', 'T+165', '#VALUE!', '', '', '', '', ''),
(56, 'Sec. 31(1)', 'Approval of resolution plan by AA', 'X', 'X', 'RP', 'X', 'T+180', '#VALUE!', '', '', '', '', ''),
(57, 'Circular dated 14.08.19', 'Approval of resolution plan by AA-Reporting', 'CIRP-5', 'IBBI', 'RP', 'Within 7 days', 'E+7', '#VALUE!', '', '', '', '', ''),
(58, '', 'Exclusion of time approved by NCLT', 'X', 'NCLT', 'RP', '', '', '', '', '', '', '', ''),
(59, 'Sec. 12', 'Extension of time approved by NCLT', 'X', 'NCLT', 'RP', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_table_filed`
--

CREATE TABLE `time_table_filed` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `consent_for_IRP` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intimation_to_ibbi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_apt_of_irp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_table_filed`
--

INSERT INTO `time_table_filed` (`id`, `form_id`, `consent_for_IRP`, `intimation_to_ibbi`, `doc_apt_of_irp`, `insert_date`, `added_on`) VALUES
(1, 60, 'done', '', '', '2023-05-29', '2023-05-29 01:31:48'),
(6, 61, 'done', '', '', NULL, '2023-06-14 12:35:34'),
(7, 62, 'done', '', '', NULL, '2023-08-07 12:47:16'),
(8, 63, 'done', '', '', NULL, '2023-09-04 06:30:10'),
(9, 64, 'done', '', '', '2023-09-19', '2023-09-19 06:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `todo_mdls`
--

CREATE TABLE `todo_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_main_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','completed','in_process','not_done') COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_type` enum('first','updated','latest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'latest' COMMENT '''first'', ''updated'', ''latest''',
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `set_as_draft` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo_mdls`
--

INSERT INTO `todo_mdls` (`id`, `task_main_id`, `task`, `assigned_to`, `message`, `status`, `task_type`, `start_date`, `end_date`, `set_as_draft`, `rem_addr`, `created_at`, `updated_at`, `deleted_at`, `created_by_id`, `updated_by`, `deleted_by`) VALUES
(6, '6', 'test1', '38', 'asdf', 'in_process', 'first', '2023-10-12', '2023-10-18', '', '127.0.0.1', '2023-10-06 17:07:15', '', '', 27, '', ''),
(9, '6', 'test1', '38', 'asdf', 'in_process', 'updated', '2023-10-12', '2023-10-18', '', '::1', '2023-10-06 17:07:15', '2023-10-06 17:30:36', '', 27, '38', ''),
(12, '6', 'test1', '38', 'asdf dsdf', 'pending', 'updated', '2023-10-12', '2023-10-18', '', '::1', '2023-10-06 17:07:15', '2023-10-06 17:56:26', '', 27, '38', ''),
(13, '6', 'test1', '38', 'asdf dsdf sdfsdf', 'not_done', 'latest', '2023-10-12', '2023-10-18', '', '127.0.0.1', '2023-10-06 17:07:15', '2023-10-06 17:56:40', '2023-10-07 11:16:44', 27, '38', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form_submission_auth_mdls`
--

CREATE TABLE `user_form_submission_auth_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_form_submission_auth_mdls`
--

INSERT INTO `user_form_submission_auth_mdls` (`id`, `company_id`, `forms`, `type`, `status`, `rem_addr`, `date`, `created_at`, `updated_at`) VALUES
(10, '7', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'email', '', '127.0.0.1', '2023-04-08', '2023-04-08 16:43:01', '2023-04-12 14:51:54'),
(12, '2', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'email', '', '127.0.0.1', '2023-04-14', '2023-04-14 12:20:26', '2023-04-14 12:40:36'),
(13, '19', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'email', '', '122.161.50.221', '2023-08-08', '2023-08-08 11:30:15', ''),
(14, '3', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.50.102', '2023-08-09', '2023-08-09 13:11:47', '2023-09-15 15:30:54'),
(16, '14', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.53.123', '2023-09-04', '2023-09-04 12:44:08', ''),
(17, '15', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.53.123', '2023-09-04', '2023-09-04 16:09:14', ''),
(18, '23', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.50.102', '2023-09-15', '2023-09-15 15:29:51', ''),
(19, '21', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.50.102', '2023-09-15', '2023-09-15 15:30:36', ''),
(20, '11', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.50.102', '2023-09-15', '2023-09-15 15:31:16', ''),
(21, '13', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.50.102', '2023-09-15', '2023-09-15 15:31:47', ''),
(22, '24', 'form-b, form-c, form-d, form-e, form-f, form-ca', 'none', '', '122.161.53.189', '2023-09-15', '2023-09-15 17:05:53', '2023-09-18 14:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_mdls`
--

CREATE TABLE `user_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'created_by',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondance_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('claimant','coc') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'claimant',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-for active\r\n2-deactive\r\n',
  `auth_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_check` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forgot_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1-deleted, 2-not deleted',
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_mdls`
--

INSERT INTO `user_mdls` (`id`, `admin_id`, `name`, `email`, `mobile`, `alt_mobile`, `address`, `city`, `state`, `correspondance_address`, `pincode`, `unique_id`, `password`, `pwd`, `creditor_type`, `user_type`, `img`, `auth_type`, `rem_addr`, `date`, `status`, `auth_id`, `auth_check`, `forgot_link`, `created_at`, `updated_at`, `deleted`, `deleted_by`, `deleted_time`) VALUES
(56, '7', 'dinesh', 'dinesh.sharma11013@gmail.com', '9711013016', '', 'jkjlkj', '', '', '', '', 'dinesh', 'dinesh1', '$2y$10$u0W9YzumbPFhyd7AJX./Kes6td/B0oP5M0O2e3NIRJc.qKccivkMK', '', 'claimant', '', 'none', '127.0.0.1', '2023-09-25', '1', '', '1', '', '2023-03-30 13:53:13', '2023-09-25 16:06:53', '2', '', ''),
(99, '7', 'Vidisha', 'mail@ipsupport.in', '9899800842', '', '', '', '', '', '', 'vidisha', '12345', '$2y$10$5BEwjKm8L4iPOBwkcFsBpudghhfBP/4hy0yfZGcWTWCS/Ftbygnfq', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-23 17:40:52', '2023-04-27 18:51:53', '2', '', ''),
(100, '7', 'Vidit', 'vanshika@jigsawabacus.com', '9899800843', '', '65 street, junkfoord, suitzela, venezuela', 'venezuela', '', '', '', 'vidit123', '12345', '$2y$10$obcPlS3pxAkeIfZJdeHZSOcQjmFwCyJXB/t1dk274NbtK9iOM01iu', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-28', '1', '', '1', 'NypHkTPzUFKv0XdEftV2', '2023-04-23 17:58:44', '2023-04-28 15:33:10', '2', '', ''),
(101, 'Unauthourised User', 'Aparna', 'Aparna@gmail.com', '1212121212', '', '', '', '', '', '', 'Aparna', '12345', '$2y$10$N1wSqYfJ9..E7L1c0o.JOOt1zjo7j3qiFrb78X06Ij2Hagubh/SEu', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-27 16:09:01', '', '1', '7', '2023-04-27 16:32:48'),
(102, 'Unauthourised User', 'Poonam Goyal', 'goyal.2901@gmail.com', '9998600002', '', '301/22, Paras Cottage , Rajendra Nagar, Kurukshetra Pin code -136118', '', '', '', '', 'Poonam goyal', '12345', '$2y$10$y72pmlxv/HGkPPhDzBKOFuM/I6aECRfCVvR4/Q/UT0bGvOwI.pANC', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-27 16:36:04', '2023-04-27 16:37:52', '2', '', ''),
(103, '7', 'vishal test', 'dineshkumar@jigsaw.edu.in', '8908765245', '', 'paschim vihar', '', '', '', '', 'vishal', 'vishal1', '$2y$10$YEZqeHojn1poQclCW0aMweHt3TqgcqVZjPeQb2c/zGAwRYdY.PzDO', '', 'claimant', '', 'both', '122.161.50.7', '2023-09-22', '1', '', '1', '', '2023-04-27 16:53:48', '2023-09-22 11:29:50', '2', '', ''),
(104, '7', 'VANSHAJ GOYAL', 'vgoyal11@gmail.com', '1234567891', '', 'B-181 B, BanjaraGali, Haiderpur, North West Delhi- 110088', '', '', '', '', 'vgoyal', '12345', '$2y$10$jrltHAvaQpYnX3zdVp/uLu07weIKcMHNzIohLWyEjksvjV3rFME2C', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-27 17:27:15', '2023-04-27 17:46:20', '1', '7', '2023-04-27 17:55:10'),
(106, '7', 'Vanshaj Goyal', 'vgoyal1901@gmail.com', '1234567890', '', 'b-137, Ambika Enclave, GH8, Paschim Vihar, Delhi - 110063', '', '', '', '', 'vgoyal', '12345', '$2y$10$HlE6fFMptdaUnDizucFzgeWKJPWUDBjdS3pp63TovA/SG/5uOMa9G', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-27 17:49:32', '', '2', '', ''),
(107, '27', 'diksha', 'diksha@gmail.com', '768799879', '', 'scfdr3', '', '', '', '', 'diksha123', 'diksha', '$2y$10$PN38opxKB7kYs6eO.2wcgO50SlX7Z8eF9WNLAXsqyRVfJyK50ejnS', '', 'claimant', '', 'none', '122.161.53.234', '2023-04-27', '1', '', '1', '', '2023-04-27 17:52:43', '', '2', '', ''),
(108, '27', 'N.S Reddy', 'nsreddy1@gmail.com', '9540489727', '', 'deifu', '', '', '', '', 'nsreddy', '12345', '$2y$10$nxYztcuUFBbdMk4ZFYPX/uNBn7MsAEL5.rI8NZc1udnl1JQmFFtP6', '', 'claimant', '', 'none', '127.0.0.1', '2023-10-04', '1', '', '1', '', '2023-04-27 18:04:42', '2023-10-04 16:12:26', '2', '', ''),
(109, '7', 'arvind', 'arvind@gmail.com', '9027894670', '', 'd4- shakti colony,  dwarka , new delhi-110034', '', '', '', '', 'arvind', '12345', '$2y$10$bM/dpaaqZ2CjwAg03vBg0eDgDP/h2IzSi37MBgykSPmdphHweA2t6', '', 'claimant', '', 'none', '122.161.53.108', '2023-04-28', '1', '', '1', '', '2023-04-28 11:20:42', '2023-09-05 11:50:50', '2', '', ''),
(110, '7', 'naveen', 'naveen@gmail.com', '9655623089', '', '', '', '', '', '', 'naveen', 'naveen1', '$2y$10$h9NQGsR70UfstvyIgHvPnOHZKyYPmf7Fj3WWU8KeF0/1OHhWR.3qW', '', 'claimant', '', 'none', '122.161.53.108', '2023-08-07', '1', '', '1', '', '2023-05-01 11:07:51', '2023-09-05 11:50:50', '2', '', ''),
(111, '7', 'mohan', 'test@gmail.com', '9999999999', '', '', '', '', '', '', 'test23y8y', '12345', '$2y$10$ekYTUE0SRGk0r.nIK/9TOOeodL08INMpbUzeab/xoWPL/XcQ03TKa', '', 'claimant', '', 'both', '122.161.53.108', '2023-08-08', '1', '', '1', '', '2023-06-21 13:29:39', '2023-09-05 11:50:50', '2', '', ''),
(112, '7', 'golu', 'golukumar1242001@gmail.com', '9315254310', '', '', '', '', '', '', 'golu@123', '2345', '$2y$10$.qRJzxEpUVtxDVEdpgrxLOGdrVquNgLmN2JudILmLVQa2Oe8LIZIy', '', 'claimant', '', 'both', '122.161.53.108', '2023-06-21', '1', '', '1', '', '2023-06-21 13:31:06', '2023-09-05 11:50:50', '2', '', ''),
(113, '7', 'Sukhman', 'sukhmanp141@gmail.com', '9540489727', '', '', '', '', '', '', 'sukhman', '12345', '$2y$10$HLVUNDwc8WN2..j3.xlgKubkXIZrPP.GlkcwwHEOoeGTB4tROJIQW', '', 'claimant', '', 'none', '122.161.53.108', '2023-08-08', '1', '', '1', '', '2023-06-21 13:35:58', '2023-09-05 11:50:50', '2', '', ''),
(114, '7', 'Aokishta', 'vani@gmail.com', '2345678', '', '', '', '', '', '', 'vanshika', '234', '$2y$10$gyyuXOz62sAzOsvA5c4IluuQOeDkYT/OSy8zxNqU8X3f3RCcVGQNW', '', 'claimant', '', 'email', '122.161.53.108', '2023-08-10', '1', '', '1', 'USxBCe85Emdp6q3NPnak', '2023-06-23 11:02:16', '2023-09-05 11:50:50', '2', '', ''),
(115, '7', 'Bhushan', 'b@gmail.com', '2345678901', '', '', '', '', '', '', 'bbbbbb', '2345', '$2y$10$ioW0lNGXg1KU6wb7uMI5E.JK3vchKVNRcENY2T882od/mkd6kAJsi', '', 'claimant', '', 'both', '122.161.53.108', '2023-08-08', '1', '', '1', '', '2023-06-28 11:05:59', '2023-09-05 11:50:50', '2', '', ''),
(116, '7', 'Mukesh', 'webdeveloper@jigsaw.edu.in', '2345678901', '', '', '', '', '', '', 'mmmm34', '12345678', '$2y$10$WU.gwlRfrioS3QmyqFqKtOz9TwYj6P2Zm5wiPNzQJlfDjB8eRZaxW', '', 'claimant', '', 'none', '122.161.53.108', '2023-08-08', '1', '', '1', '', '2023-06-28 16:12:23', '2023-09-05 11:50:50', '2', '', ''),
(117, '7', 'Vaibhav', 'golukumar1242001@gmail.com', '7777712903', '', '', '', '', '', '', 'vaibhav123', 'hh22333', '$2y$10$X9JPTrse5Tfo3cizCm9p6u3DDkZ/bQ5BTSY7fM5shbsDPW7.bqhiC', '', 'claimant', '', 'none', '122.161.53.108', '2023-08-08', '1', '', '1', '', '2023-06-28 16:13:58', '2023-09-05 11:50:50', '2', '', ''),
(118, 'Unauthourised User', 'Vikas singh', 'developer@gmail.com', '7701931016', '', 'A-229 begum vihar ext. begumpur delhi 110086', 'Delhi', 'Delhi', 'sdf', '10074', 'vikassharma', '1234', '$2y$10$TvcL6BQrRsCsK2dYmWMH5eN0QvQwjlTB/c4wHFFsagIYsTtG7OyMS', '', 'claimant', '', 'none', '122.161.53.108', '2023-09-04', '1', '', '1', '', '2023-09-02 12:00:55', '2023-09-05 11:50:50', '1', '7', '2023-09-05 11:51:03'),
(119, '7', 'Vikram', 'vik@gmail.com', '7777777777', '', 'Delhi', '', '', '', '', 'vikram', '1234', '$2y$10$7Ly7wlm1ruKcKKSwASo4zOqpwviNfUzcf2NuCQAur3Q2.A.ezc5Jm', '', 'claimant', '', 'none', '122.161.53.108', '2023-09-05', '1', '', '1', '', '2023-09-05 11:53:10', '', '2', '', ''),
(120, '31', 'Mohan lal Kumar', 'mohan@gmail.com', '', '', '', '', '', '', '', 'Mohan_lal', '12345', '$2y$10$Q9XY5goC.oNjH8tV9poLFOTJQsKh45EZBmRRJ8r17PfN5vP.xqX0e', '', 'claimant', '', 'none', '122.161.53.243', '2023-09-15', '1', '', '1', '', '2023-09-15 11:01:51', '', '2', '', ''),
(121, '30', 'Vikram Kumar', 'vikram@gmail.com', '', '', '', '', '', '', '', 'Vikram_kumar', '12345', '$2y$10$gBpjm5Nb4YBoIKG5ID.2l.U3jlNytR4swWeCHcldj.n9d065just2', '', 'claimant', '', 'none', '122.161.50.102', '2023-09-15', '1', '', '1', '', '2023-09-15 16:56:18', '', '2', '', ''),
(122, 'Unauthourised User', 'Vidit', 'vanshika@jigsawabacus.com', '9899800842', '', '', '', '', '', '', 'vidit1234', 'vanshika', '$2y$10$Ij50Z6TyQ7foGwKbFXJBluUizU0vUnQaRYZzfKs2BNoRRSzPZyowG', '', 'claimant', '', 'none', '122.161.50.102', '2023-09-16', '1', '', '1', '', '2023-09-15 22:06:18', '2023-09-16 10:34:50', '2', '', ''),
(123, 'Unauthourised User', 'yash', 'godigital@jigsaw.edu.in', '9818998865', '', '', '', '', '', '', 'admin@123', 'qwerty', '$2y$10$Oq3eoJlFqa/sONi.GPsyIesnZxhTU3kyNFt3JVvfHxgbPpzcFZefC', '', 'claimant', '', 'none', '122.161.53.189', '2023-09-19', '1', '', '1', '', '2023-09-19 12:30:09', '2023-09-19 12:31:11', '2', '', ''),
(124, '7', 'Name of the corporate debtor: Shubhkamna Pvt. Ltd.; Date of commencement of CIRP: 2023-09-15; List of creditors as on: 2023-10-03;', '', '', '', '', '', '', '', '', 'x3nkfwa1', 'p456l2', '$2y$10$pmoMfgzctpxUm0ma2TQ0DeAcbCfSXqZqXsCkNSrwYrPEXdW77tUMa', '', 'claimant', '', '', '', '2023-10-04 15:32:33', '1', '', '1', '', '2023-10-04 15:32:33', '2023-10-04 15:32:33', '2', '', ''),
(125, '7', 'List of other creditors (Other than financial creditors and operational creditors)', '', '', '', '', '', '', '', '', 'yveu0k3c', '60w23q', '$2y$10$0pXA/ODnjXPOFXUjeKbTvel9MWvNi7olwRs4Ew9T6uGeVb2CLpBa.', '', 'claimant', '', '', '', '2023-10-04 15:32:33', '1', '', '1', '', '2023-10-04 15:32:33', '2023-10-04 15:32:33', '2', '', ''),
(126, '7', 'Sl.\n No.', 'Details of claim received', 'Name of Creditor', '', '', '', '', '', '', 'Details of claim admitted', 'dcqvhk', '$2y$10$PPx7dH1BmHyWb2i811YAi.saxBsjOVOEVeinBAxjV4r7LZmxkJpw2', '', 'claimant', '', '', '', '2023-10-04 15:32:33', '1', '', '1', '', '2023-10-04 15:32:33', '2023-10-04 15:32:33', '2', '', ''),
(127, '7', '', 'Date of receipt', '', '', 'Amount claimed', '', '', '', '', 'Amount of claim admitted', 'Nature of claim', '$2y$10$i.1X7c0QvP0kooIw6hZ.9Oz8FTZ1kZY1EdYQH4S/vmrs.8KJ3E5aC', '', 'claimant', '', '', '', '2023-10-04 15:32:34', '1', '', '1', '', '2023-10-04 15:32:34', '2023-10-04 15:32:34', '2', '', ''),
(128, '7', '1', '2023-09-15 17:26:34', 'VIKRAM KUMAR', '', '4776798', '', '', '', '', '8bqgkwon', 'hevami', '$2y$10$64GC7DzpFMrzJMfPbC/WxOVeHZS4TjSEj8QLMBO8c1GqRJ.OgvLPa', '', 'claimant', '', '', '', '2023-10-04 15:32:34', '1', '', '1', '', '2023-10-04 15:32:34', '2023-10-04 15:32:34', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_mdls`
--

CREATE TABLE `user_type_mdls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rem_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT '1-yes\r\n2-no',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type_mdls`
--

INSERT INTO `user_type_mdls` (`id`, `created_by`, `name`, `status`, `rem_addr`, `date`, `created_at`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(3, '7', 'financial creditors', '1', '127.0.0.1', '2022-08-19', '2022-08-19 02:59:38', '2022-08-19 03:13:29', '', '2', '', ''),
(4, '7', 'homebuyers', '1', '127.0.0.1', '2022-08-19', '2022-08-19 02:59:49', '2022-08-19 03:13:15', '', '2', '', ''),
(7, '7', 'IRP', '1', '122.161.53.108', '2023-09-05', '2023-09-05 11:17:24', '2023-09-05 11:17:50', '7', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workmen_and_employee_form_details`
--

CREATE TABLE `workmen_and_employee_form_details` (
  `id` int(11) NOT NULL,
  `user_mdls_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `principle` int(11) DEFAULT NULL,
  `intrest` int(11) DEFAULT NULL,
  `details_of_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dispute_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_arose_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutual_credit_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_in_block_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_to_creditor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_person_signing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted` int(11) NOT NULL COMMENT '1 means submitted and 2 mean not submitted',
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workmen_and_employee_form_details`
--

INSERT INTO `workmen_and_employee_form_details` (`id`, `user_mdls_id`, `name`, `pancard_no`, `passport_no`, `voter_id_no`, `aadhar_no`, `address`, `email`, `total_amount`, `principle`, `intrest`, `details_of_documents`, `dispute_details`, `claim_arose_details`, `mutual_credit_details`, `account_no`, `bank_name`, `ifsc_code`, `signature`, `name_in_block_letter`, `relation_to_creditor`, `address_person_signing`, `day`, `month`, `year`, `submitted`, `added_on`) VALUES
(82, 43, 'dinesh', NULL, NULL, NULL, NULL, 'sdf', 'dinesh.sharma11013@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image\\1669800602529.png', 'DINESH', NULL, NULL, '30', '11', '22', 1, '2022-11-30'),
(83, 43, 'dinesh', NULL, NULL, NULL, NULL, 'sdf', 'dinesh.sharma11013@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image\\1669802774972.jpg', 'DINESH', NULL, NULL, '30', '11', '22', 2, '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `work_and_employee_from_step_four_doc`
--

CREATE TABLE `work_and_employee_from_step_four_doc` (
  `id` int(11) NOT NULL,
  `workmen_and_employee_form_details_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `work_order_purchase_order_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoices_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_confirmation_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_correspondence_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorisation_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_statement_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_of_ledger_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `computation_sheet_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted` int(11) NOT NULL COMMENT '1 means submit and 2 means not submit',
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_and_employee_from_step_four_doc`
--

INSERT INTO `work_and_employee_from_step_four_doc` (`id`, `workmen_and_employee_form_details_id`, `user_id`, `work_order_purchase_order_image`, `invoices_image`, `balance_confirmation_image`, `any_correspondence_image`, `authorisation_image`, `bank_statement_image`, `copy_of_ledger_image`, `computation_sheet_image`, `pan_number_image`, `passport_image`, `aadhar_card`, `submitted`, `added_on`) VALUES
(136, 82, 43, 'work_order_purchase\\1669801864416.jpg', 'work_order_purchase\\1669801864892.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'work_order_purchase\\1669801864726.jpg', 'work_order_purchase\\1669801864726.jpg', 'work_order_purchase\\1669801864124.png', 1, '2022-11-30 09:50:16'),
(137, 83, 43, 'work_order_purchase\\1669802626769.jpg', 'work_order_purchase\\1669802626817.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-11-30 10:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `work_and_employee_multi_docs`
--

CREATE TABLE `work_and_employee_multi_docs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_and_employee_from_step_four_doc_id` int(11) DEFAULT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted` int(11) NOT NULL COMMENT '1 means submit and 2 means not submit',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_and_employee_multi_docs`
--

INSERT INTO `work_and_employee_multi_docs` (`id`, `user_id`, `work_and_employee_from_step_four_doc_id`, `document_name`, `document_image`, `submitted`, `added_on`) VALUES
(235, 43, 136, '111', 'work_order_purchase\\1669801816760.jpg', 1, '2022-11-30 09:50:16'),
(236, 43, 136, '22', 'work_order_purchase\\1669801816767.png', 1, '2022-11-30 09:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mdls`
--
ALTER TABLE `admin_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ar_creditor_class_mdls`
--
ALTER TABLE `ar_creditor_class_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ar_creditor_class_mdls_ar_id_foreign` (`ar_id`),
  ADD KEY `ar_creditor_class_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `ar_mdls`
--
ALTER TABLE `ar_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_company_mdls`
--
ALTER TABLE `assign_company_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_company_mdls_company_id_foreign` (`company_id`),
  ADD KEY `assign_company_mdls_ip_id_foreign` (`ip_id`),
  ADD KEY `assign_company_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `authentication_mdls`
--
ALTER TABLE `authentication_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claimant_mdls`
--
ALTER TABLE `claimant_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_dtls`
--
ALTER TABLE `company_dtls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financial_creditor_form_ca_mdls`
--
ALTER TABLE `financial_creditor_form_ca_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financial_creditor_form_ca_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `finanicial_creditor_form_c_mdls`
--
ALTER TABLE `finanicial_creditor_form_c_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finanicial_creditor_form_c_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `form2_in_matter_corporate_debtors`
--
ALTER TABLE `form2_in_matter_corporate_debtors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_in_matter_corporate_debtors_ip_id_foreign` (`ip_id`),
  ADD KEY `form2_in_matter_corporate_debtors_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdls`
--
ALTER TABLE `form2_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `form2_mdl_any_other_individiual_processes`
--
ALTER TABLE `form2_mdl_any_other_individiual_processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_any_other_individiual_processes_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_ar_details`
--
ALTER TABLE `form2_mdl_ar_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_ar_details_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_disclosures`
--
ALTER TABLE `form2_mdl_disclosures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_disclosures_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_documents`
--
ALTER TABLE `form2_mdl_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_documents_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_individiual_bank_cruptancies`
--
ALTER TABLE `form2_mdl_individiual_bank_cruptancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_individiual_bank_cruptancies_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_individiual_rps`
--
ALTER TABLE `form2_mdl_individiual_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_individiual_rps_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_irps`
--
ALTER TABLE `form2_mdl_irps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_irps_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_liquidator_volutaries`
--
ALTER TABLE `form2_mdl_liquidator_volutaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_liquidator_volutaries_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form2_mdl_rps`
--
ALTER TABLE `form2_mdl_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_mdl_rps_form2_id_foreign` (`form2_id`);

--
-- Indexes for table `form_2_mdl_liquidator_voluntary`
--
ALTER TABLE `form_2_mdl_liquidator_voluntary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_aa_mdls`
--
ALTER TABLE `form_aa_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_aa_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `form_aa_mdl_any_others`
--
ALTER TABLE `form_aa_mdl_any_others`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_aa_mdl_any_others_form_aa_id_foreign` (`form_aa_id`);

--
-- Indexes for table `form_a_mdls`
--
ALTER TABLE `form_a_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_a_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `form_a_s`
--
ALTER TABLE `form_a_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_b_approval_mdls`
--
ALTER TABLE `form_b_approval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_b_approval_mdls_form_b_id_foreign` (`form_b_id`),
  ADD KEY `form_b_approval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_b_declaration_table_mdls`
--
ALTER TABLE `form_b_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_b_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_b_declaration_table_mdls_form_b_id_foreign` (`form_b_id`);

--
-- Indexes for table `form_b_files_mdls`
--
ALTER TABLE `form_b_files_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_b_files_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_b_files_mdls_form_b_id_foreign` (`form_b_id`);

--
-- Indexes for table `form_b_other_documents_mdls`
--
ALTER TABLE `form_b_other_documents_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_b_other_documents_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_b_other_documents_mdls_form_b_id_foreign` (`form_b_id`);

--
-- Indexes for table `form_b_senction_mdls`
--
ALTER TABLE `form_b_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_b_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_b_senction_mdls_form_b_id_foreign` (`form_b_id`);

--
-- Indexes for table `form_ca_files_mdls`
--
ALTER TABLE `form_ca_files_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_ca_files_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_ca_files_mdls_form_ca_id_foreign` (`form_ca_id`);

--
-- Indexes for table `form_ca_other_document_mdls`
--
ALTER TABLE `form_ca_other_document_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_ca_other_document_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_ca_other_document_mdls_form_ca_id_foreign` (`form_ca_id`);

--
-- Indexes for table `form_c_aproval_mdls`
--
ALTER TABLE `form_c_aproval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_aproval_mdls_form_c_id_foreign` (`form_c_id`),
  ADD KEY `form_c_aproval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_c_a_aproval_mdls`
--
ALTER TABLE `form_c_a_aproval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_a_aproval_mdls_form_ca_id_foreign` (`form_ca_id`),
  ADD KEY `form_c_a_aproval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_c_a_declaration_table_mdls`
--
ALTER TABLE `form_c_a_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_a_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_a_declaration_table_mdls_form_ca_id_foreign` (`form_ca_id`);

--
-- Indexes for table `form_c_a_senction_mdls`
--
ALTER TABLE `form_c_a_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_a_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_a_senction_mdls_form_ca_id_foreign` (`form_ca_id`);

--
-- Indexes for table `form_c_declaration_table_mdls`
--
ALTER TABLE `form_c_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_declaration_table_mdls_form_c_id_foreign` (`form_c_id`);

--
-- Indexes for table `form_c_files_mdls`
--
ALTER TABLE `form_c_files_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_files_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_files_mdls_form_c_id_foreign` (`form_c_id`);

--
-- Indexes for table `form_c_other_document_mdls`
--
ALTER TABLE `form_c_other_document_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_other_document_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_other_document_mdls_form_c_id_foreign` (`form_c_id`);

--
-- Indexes for table `form_c_senction_mdls`
--
ALTER TABLE `form_c_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_c_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_c_senction_mdls_form_c_id_foreign` (`form_c_id`);

--
-- Indexes for table `form_d_aproval_mdls`
--
ALTER TABLE `form_d_aproval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_aproval_mdls_form_d_id_foreign` (`form_d_id`),
  ADD KEY `form_d_aproval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_d_declaration_table_mdls`
--
ALTER TABLE `form_d_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_d_declaration_table_mdls_form_d_id_foreign` (`form_d_id`);

--
-- Indexes for table `form_d_files_mdls`
--
ALTER TABLE `form_d_files_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_files_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_d_files_mdls_form_d_id_foreign` (`form_d_id`);

--
-- Indexes for table `form_d_mdls`
--
ALTER TABLE `form_d_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_d_other_document_mdls`
--
ALTER TABLE `form_d_other_document_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_other_document_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_d_other_document_mdls_form_d_id_foreign` (`form_d_id`);

--
-- Indexes for table `form_d_senction_mdls`
--
ALTER TABLE `form_d_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_d_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_d_senction_mdls_form_d_id_foreign` (`form_d_id`);

--
-- Indexes for table `form_e_approval_mdls`
--
ALTER TABLE `form_e_approval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_approval_mdls_form_e_id_foreign` (`form_e_id`),
  ADD KEY `form_e_approval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_e_declaration_table_mdls`
--
ALTER TABLE `form_e_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_e_declaration_table_mdls_form_e_id_foreign` (`form_e_id`);

--
-- Indexes for table `form_e_employee_detail_mdls`
--
ALTER TABLE `form_e_employee_detail_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_employee_detail_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_e_employee_detail_mdls_form_e_id_foreign` (`form_e_id`);

--
-- Indexes for table `form_e_file_mdls`
--
ALTER TABLE `form_e_file_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_file_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_e_other_document_mdls`
--
ALTER TABLE `form_e_other_document_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_other_document_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_e_other_document_mdls_form_e_id_foreign` (`form_e_id`);

--
-- Indexes for table `form_e_senction_mdls`
--
ALTER TABLE `form_e_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_e_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_e_senction_mdls_form_e_id_foreign` (`form_e_id`);

--
-- Indexes for table `form_f_approval_mdls`
--
ALTER TABLE `form_f_approval_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_f_approval_mdls_form_f_id_foreign` (`form_f_id`),
  ADD KEY `form_f_approval_mdls_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `form_f_declaration_table_mdls`
--
ALTER TABLE `form_f_declaration_table_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_f_declaration_table_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_f_declaration_table_mdls_form_f_id_foreign` (`form_f_id`);

--
-- Indexes for table `form_f_files_mdls`
--
ALTER TABLE `form_f_files_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_f_files_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_f_files_mdls_form_f_id_foreign` (`form_f_id`);

--
-- Indexes for table `form_f_other_document_mdls`
--
ALTER TABLE `form_f_other_document_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_f_other_document_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_f_other_document_mdls_form_f_id_foreign` (`form_f_id`);

--
-- Indexes for table `form_f_senction_mdls`
--
ALTER TABLE `form_f_senction_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_f_senction_mdls_user_id_foreign` (`user_id`),
  ADD KEY `form_f_senction_mdls_form_f_id_foreign` (`form_f_id`);

--
-- Indexes for table `form_modification_mdls`
--
ALTER TABLE `form_modification_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_modification_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `general_info_mdls`
--
ALTER TABLE `general_info_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_mdls`
--
ALTER TABLE `ip_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `llp_master_data`
--
ALTER TABLE `llp_master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_mdls`
--
ALTER TABLE `log_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailing_detials_mdls`
--
ALTER TABLE `mailing_detials_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_sent_mdls`
--
ALTER TABLE `mail_sent_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operational_creditor_mdls`
--
ALTER TABLE `operational_creditor_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operational_creditor_mdls_user_id_foreign` (`user_id`);

--
-- Indexes for table `other_creditor_form_f_mdls`
--
ALTER TABLE `other_creditor_form_f_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_creditor_form_f_mdls_user_id_foreign` (`user_id`);

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
-- Indexes for table `provisional_form_b_mdls`
--
ALTER TABLE `provisional_form_b_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sabredgerep_mdls`
--
ALTER TABLE `sabredgerep_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sabredgerep_mdls_company_id_foreign` (`company_id`),
  ADD KEY `sabredgerep_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `time_line`
--
ALTER TABLE `time_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table_filed`
--
ALTER TABLE `time_table_filed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_mdls`
--
ALTER TABLE `todo_mdls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todo_mdls_created_by_id_foreign` (`created_by_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_form_submission_auth_mdls`
--
ALTER TABLE `user_form_submission_auth_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mdls`
--
ALTER TABLE `user_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type_mdls`
--
ALTER TABLE `user_type_mdls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workmen_and_employee_form_details`
--
ALTER TABLE `workmen_and_employee_form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_and_employee_from_step_four_doc`
--
ALTER TABLE `work_and_employee_from_step_four_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_and_employee_multi_docs`
--
ALTER TABLE `work_and_employee_multi_docs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mdls`
--
ALTER TABLE `admin_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ar_creditor_class_mdls`
--
ALTER TABLE `ar_creditor_class_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ar_mdls`
--
ALTER TABLE `ar_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_company_mdls`
--
ALTER TABLE `assign_company_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `authentication_mdls`
--
ALTER TABLE `authentication_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `claimant_mdls`
--
ALTER TABLE `claimant_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_dtls`
--
ALTER TABLE `company_dtls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_creditor_form_ca_mdls`
--
ALTER TABLE `financial_creditor_form_ca_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `finanicial_creditor_form_c_mdls`
--
ALTER TABLE `finanicial_creditor_form_c_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `form2_in_matter_corporate_debtors`
--
ALTER TABLE `form2_in_matter_corporate_debtors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form2_mdls`
--
ALTER TABLE `form2_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `form2_mdl_any_other_individiual_processes`
--
ALTER TABLE `form2_mdl_any_other_individiual_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `form2_mdl_ar_details`
--
ALTER TABLE `form2_mdl_ar_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `form2_mdl_disclosures`
--
ALTER TABLE `form2_mdl_disclosures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `form2_mdl_documents`
--
ALTER TABLE `form2_mdl_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form2_mdl_individiual_bank_cruptancies`
--
ALTER TABLE `form2_mdl_individiual_bank_cruptancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `form2_mdl_individiual_rps`
--
ALTER TABLE `form2_mdl_individiual_rps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `form2_mdl_irps`
--
ALTER TABLE `form2_mdl_irps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `form2_mdl_liquidator_volutaries`
--
ALTER TABLE `form2_mdl_liquidator_volutaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `form2_mdl_rps`
--
ALTER TABLE `form2_mdl_rps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `form_2_mdl_liquidator_voluntary`
--
ALTER TABLE `form_2_mdl_liquidator_voluntary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `form_aa_mdls`
--
ALTER TABLE `form_aa_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_aa_mdl_any_others`
--
ALTER TABLE `form_aa_mdl_any_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form_a_mdls`
--
ALTER TABLE `form_a_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `form_a_s`
--
ALTER TABLE `form_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_b_approval_mdls`
--
ALTER TABLE `form_b_approval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `form_b_declaration_table_mdls`
--
ALTER TABLE `form_b_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `form_b_files_mdls`
--
ALTER TABLE `form_b_files_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `form_b_other_documents_mdls`
--
ALTER TABLE `form_b_other_documents_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `form_b_senction_mdls`
--
ALTER TABLE `form_b_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `form_ca_files_mdls`
--
ALTER TABLE `form_ca_files_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `form_ca_other_document_mdls`
--
ALTER TABLE `form_ca_other_document_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `form_c_aproval_mdls`
--
ALTER TABLE `form_c_aproval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `form_c_a_aproval_mdls`
--
ALTER TABLE `form_c_a_aproval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `form_c_a_declaration_table_mdls`
--
ALTER TABLE `form_c_a_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_c_a_senction_mdls`
--
ALTER TABLE `form_c_a_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_c_declaration_table_mdls`
--
ALTER TABLE `form_c_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `form_c_files_mdls`
--
ALTER TABLE `form_c_files_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `form_c_other_document_mdls`
--
ALTER TABLE `form_c_other_document_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `form_c_senction_mdls`
--
ALTER TABLE `form_c_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `form_d_aproval_mdls`
--
ALTER TABLE `form_d_aproval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `form_d_declaration_table_mdls`
--
ALTER TABLE `form_d_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_d_files_mdls`
--
ALTER TABLE `form_d_files_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `form_d_mdls`
--
ALTER TABLE `form_d_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `form_d_other_document_mdls`
--
ALTER TABLE `form_d_other_document_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `form_d_senction_mdls`
--
ALTER TABLE `form_d_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_e_approval_mdls`
--
ALTER TABLE `form_e_approval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `form_e_declaration_table_mdls`
--
ALTER TABLE `form_e_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_e_employee_detail_mdls`
--
ALTER TABLE `form_e_employee_detail_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `form_e_file_mdls`
--
ALTER TABLE `form_e_file_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `form_e_other_document_mdls`
--
ALTER TABLE `form_e_other_document_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `form_e_senction_mdls`
--
ALTER TABLE `form_e_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_f_approval_mdls`
--
ALTER TABLE `form_f_approval_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_f_declaration_table_mdls`
--
ALTER TABLE `form_f_declaration_table_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form_f_files_mdls`
--
ALTER TABLE `form_f_files_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `form_f_other_document_mdls`
--
ALTER TABLE `form_f_other_document_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `form_f_senction_mdls`
--
ALTER TABLE `form_f_senction_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `form_modification_mdls`
--
ALTER TABLE `form_modification_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `general_info_mdls`
--
ALTER TABLE `general_info_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ip_mdls`
--
ALTER TABLE `ip_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `llp_master_data`
--
ALTER TABLE `llp_master_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_mdls`
--
ALTER TABLE `log_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `mailing_detials_mdls`
--
ALTER TABLE `mailing_detials_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail_sent_mdls`
--
ALTER TABLE `mail_sent_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `operational_creditor_mdls`
--
ALTER TABLE `operational_creditor_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `other_creditor_form_f_mdls`
--
ALTER TABLE `other_creditor_form_f_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provisional_form_b_mdls`
--
ALTER TABLE `provisional_form_b_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sabredgerep_mdls`
--
ALTER TABLE `sabredgerep_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time_line`
--
ALTER TABLE `time_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `time_table_filed`
--
ALTER TABLE `time_table_filed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `todo_mdls`
--
ALTER TABLE `todo_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_form_submission_auth_mdls`
--
ALTER TABLE `user_form_submission_auth_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_mdls`
--
ALTER TABLE `user_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `user_type_mdls`
--
ALTER TABLE `user_type_mdls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workmen_and_employee_form_details`
--
ALTER TABLE `workmen_and_employee_form_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `work_and_employee_from_step_four_doc`
--
ALTER TABLE `work_and_employee_from_step_four_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `work_and_employee_multi_docs`
--
ALTER TABLE `work_and_employee_multi_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ar_creditor_class_mdls`
--
ALTER TABLE `ar_creditor_class_mdls`
  ADD CONSTRAINT `ar_creditor_class_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_company_mdls`
--
ALTER TABLE `assign_company_mdls`
  ADD CONSTRAINT `assign_company_mdls_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company_dtls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_company_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_company_mdls_ip_id_foreign` FOREIGN KEY (`ip_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `financial_creditor_form_ca_mdls`
--
ALTER TABLE `financial_creditor_form_ca_mdls`
  ADD CONSTRAINT `financial_creditor_form_ca_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `finanicial_creditor_form_c_mdls`
--
ALTER TABLE `finanicial_creditor_form_c_mdls`
  ADD CONSTRAINT `finanicial_creditor_form_c_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form2_in_matter_corporate_debtors`
--
ALTER TABLE `form2_in_matter_corporate_debtors`
  ADD CONSTRAINT `form2_in_matter_corporate_debtors_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form2_in_matter_corporate_debtors_ip_id_foreign` FOREIGN KEY (`ip_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdls`
--
ALTER TABLE `form2_mdls`
  ADD CONSTRAINT `form2_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_any_other_individiual_processes`
--
ALTER TABLE `form2_mdl_any_other_individiual_processes`
  ADD CONSTRAINT `form2_mdl_any_other_individiual_processes_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_ar_details`
--
ALTER TABLE `form2_mdl_ar_details`
  ADD CONSTRAINT `form2_mdl_ar_details_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_disclosures`
--
ALTER TABLE `form2_mdl_disclosures`
  ADD CONSTRAINT `form2_mdl_disclosures_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_documents`
--
ALTER TABLE `form2_mdl_documents`
  ADD CONSTRAINT `form2_mdl_documents_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_individiual_bank_cruptancies`
--
ALTER TABLE `form2_mdl_individiual_bank_cruptancies`
  ADD CONSTRAINT `form2_mdl_individiual_bank_cruptancies_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_individiual_rps`
--
ALTER TABLE `form2_mdl_individiual_rps`
  ADD CONSTRAINT `form2_mdl_individiual_rps_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_irps`
--
ALTER TABLE `form2_mdl_irps`
  ADD CONSTRAINT `form2_mdl_irps_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_liquidator_volutaries`
--
ALTER TABLE `form2_mdl_liquidator_volutaries`
  ADD CONSTRAINT `form2_mdl_liquidator_volutaries_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form2_mdl_rps`
--
ALTER TABLE `form2_mdl_rps`
  ADD CONSTRAINT `form2_mdl_rps_form2_id_foreign` FOREIGN KEY (`form2_id`) REFERENCES `form2_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_aa_mdls`
--
ALTER TABLE `form_aa_mdls`
  ADD CONSTRAINT `form_aa_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_aa_mdl_any_others`
--
ALTER TABLE `form_aa_mdl_any_others`
  ADD CONSTRAINT `form_aa_mdl_any_others_form_aa_id_foreign` FOREIGN KEY (`form_aa_id`) REFERENCES `form_aa_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_b_approval_mdls`
--
ALTER TABLE `form_b_approval_mdls`
  ADD CONSTRAINT `form_b_approval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_b_approval_mdls_form_b_id_foreign` FOREIGN KEY (`form_b_id`) REFERENCES `operational_creditor_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_b_declaration_table_mdls`
--
ALTER TABLE `form_b_declaration_table_mdls`
  ADD CONSTRAINT `form_b_declaration_table_mdls_form_b_id_foreign` FOREIGN KEY (`form_b_id`) REFERENCES `operational_creditor_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_b_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_b_files_mdls`
--
ALTER TABLE `form_b_files_mdls`
  ADD CONSTRAINT `form_b_files_mdls_form_b_id_foreign` FOREIGN KEY (`form_b_id`) REFERENCES `operational_creditor_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_b_files_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_b_other_documents_mdls`
--
ALTER TABLE `form_b_other_documents_mdls`
  ADD CONSTRAINT `form_b_other_documents_mdls_form_b_id_foreign` FOREIGN KEY (`form_b_id`) REFERENCES `operational_creditor_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_b_other_documents_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_b_senction_mdls`
--
ALTER TABLE `form_b_senction_mdls`
  ADD CONSTRAINT `form_b_senction_mdls_form_b_id_foreign` FOREIGN KEY (`form_b_id`) REFERENCES `operational_creditor_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_b_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_ca_files_mdls`
--
ALTER TABLE `form_ca_files_mdls`
  ADD CONSTRAINT `form_ca_files_mdls_form_ca_id_foreign` FOREIGN KEY (`form_ca_id`) REFERENCES `financial_creditor_form_ca_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_ca_files_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_ca_other_document_mdls`
--
ALTER TABLE `form_ca_other_document_mdls`
  ADD CONSTRAINT `form_ca_other_document_mdls_form_ca_id_foreign` FOREIGN KEY (`form_ca_id`) REFERENCES `financial_creditor_form_ca_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_ca_other_document_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_c_aproval_mdls`
--
ALTER TABLE `form_c_aproval_mdls`
  ADD CONSTRAINT `form_c_aproval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_aproval_mdls_form_c_id_foreign` FOREIGN KEY (`form_c_id`) REFERENCES `finanicial_creditor_form_c_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_c_a_aproval_mdls`
--
ALTER TABLE `form_c_a_aproval_mdls`
  ADD CONSTRAINT `form_c_a_aproval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_a_aproval_mdls_form_ca_id_foreign` FOREIGN KEY (`form_ca_id`) REFERENCES `financial_creditor_form_ca_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_c_a_declaration_table_mdls`
--
ALTER TABLE `form_c_a_declaration_table_mdls`
  ADD CONSTRAINT `form_c_a_declaration_table_mdls_form_ca_id_foreign` FOREIGN KEY (`form_ca_id`) REFERENCES `financial_creditor_form_ca_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_a_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_c_a_senction_mdls`
--
ALTER TABLE `form_c_a_senction_mdls`
  ADD CONSTRAINT `form_c_a_senction_mdls_form_ca_id_foreign` FOREIGN KEY (`form_ca_id`) REFERENCES `financial_creditor_form_ca_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_a_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_c_declaration_table_mdls`
--
ALTER TABLE `form_c_declaration_table_mdls`
  ADD CONSTRAINT `form_c_declaration_table_mdls_form_c_id_foreign` FOREIGN KEY (`form_c_id`) REFERENCES `finanicial_creditor_form_c_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_c_files_mdls`
--
ALTER TABLE `form_c_files_mdls`
  ADD CONSTRAINT `form_c_files_mdls_form_c_id_foreign` FOREIGN KEY (`form_c_id`) REFERENCES `finanicial_creditor_form_c_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_files_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_c_other_document_mdls`
--
ALTER TABLE `form_c_other_document_mdls`
  ADD CONSTRAINT `form_c_other_document_mdls_form_c_id_foreign` FOREIGN KEY (`form_c_id`) REFERENCES `finanicial_creditor_form_c_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_other_document_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_c_senction_mdls`
--
ALTER TABLE `form_c_senction_mdls`
  ADD CONSTRAINT `form_c_senction_mdls_form_c_id_foreign` FOREIGN KEY (`form_c_id`) REFERENCES `finanicial_creditor_form_c_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_c_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_d_aproval_mdls`
--
ALTER TABLE `form_d_aproval_mdls`
  ADD CONSTRAINT `form_d_aproval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_d_aproval_mdls_form_d_id_foreign` FOREIGN KEY (`form_d_id`) REFERENCES `form_d_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_d_declaration_table_mdls`
--
ALTER TABLE `form_d_declaration_table_mdls`
  ADD CONSTRAINT `form_d_declaration_table_mdls_form_d_id_foreign` FOREIGN KEY (`form_d_id`) REFERENCES `form_d_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_d_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_d_files_mdls`
--
ALTER TABLE `form_d_files_mdls`
  ADD CONSTRAINT `form_d_files_mdls_form_d_id_foreign` FOREIGN KEY (`form_d_id`) REFERENCES `form_d_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_d_files_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_d_mdls`
--
ALTER TABLE `form_d_mdls`
  ADD CONSTRAINT `form_d_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_d_other_document_mdls`
--
ALTER TABLE `form_d_other_document_mdls`
  ADD CONSTRAINT `form_d_other_document_mdls_form_d_id_foreign` FOREIGN KEY (`form_d_id`) REFERENCES `form_d_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_d_other_document_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_d_senction_mdls`
--
ALTER TABLE `form_d_senction_mdls`
  ADD CONSTRAINT `form_d_senction_mdls_form_d_id_foreign` FOREIGN KEY (`form_d_id`) REFERENCES `form_d_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_d_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_e_approval_mdls`
--
ALTER TABLE `form_e_approval_mdls`
  ADD CONSTRAINT `form_e_approval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_e_approval_mdls_form_e_id_foreign` FOREIGN KEY (`form_e_id`) REFERENCES `form_e_file_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_e_declaration_table_mdls`
--
ALTER TABLE `form_e_declaration_table_mdls`
  ADD CONSTRAINT `form_e_declaration_table_mdls_form_e_id_foreign` FOREIGN KEY (`form_e_id`) REFERENCES `form_e_file_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_e_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_e_employee_detail_mdls`
--
ALTER TABLE `form_e_employee_detail_mdls`
  ADD CONSTRAINT `form_e_employee_detail_mdls_form_e_id_foreign` FOREIGN KEY (`form_e_id`) REFERENCES `form_e_file_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_e_employee_detail_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_e_file_mdls`
--
ALTER TABLE `form_e_file_mdls`
  ADD CONSTRAINT `form_e_file_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_e_other_document_mdls`
--
ALTER TABLE `form_e_other_document_mdls`
  ADD CONSTRAINT `form_e_other_document_mdls_form_e_id_foreign` FOREIGN KEY (`form_e_id`) REFERENCES `form_e_file_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_e_other_document_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_e_senction_mdls`
--
ALTER TABLE `form_e_senction_mdls`
  ADD CONSTRAINT `form_e_senction_mdls_form_e_id_foreign` FOREIGN KEY (`form_e_id`) REFERENCES `form_e_file_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_e_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_f_approval_mdls`
--
ALTER TABLE `form_f_approval_mdls`
  ADD CONSTRAINT `form_f_approval_mdls_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_f_approval_mdls_form_f_id_foreign` FOREIGN KEY (`form_f_id`) REFERENCES `other_creditor_form_f_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_f_declaration_table_mdls`
--
ALTER TABLE `form_f_declaration_table_mdls`
  ADD CONSTRAINT `form_f_declaration_table_mdls_form_f_id_foreign` FOREIGN KEY (`form_f_id`) REFERENCES `other_creditor_form_f_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_f_declaration_table_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_f_files_mdls`
--
ALTER TABLE `form_f_files_mdls`
  ADD CONSTRAINT `form_f_files_mdls_form_f_id_foreign` FOREIGN KEY (`form_f_id`) REFERENCES `other_creditor_form_f_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_f_files_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_f_other_document_mdls`
--
ALTER TABLE `form_f_other_document_mdls`
  ADD CONSTRAINT `form_f_other_document_mdls_form_f_id_foreign` FOREIGN KEY (`form_f_id`) REFERENCES `other_creditor_form_f_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_f_other_document_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_f_senction_mdls`
--
ALTER TABLE `form_f_senction_mdls`
  ADD CONSTRAINT `form_f_senction_mdls_form_f_id_foreign` FOREIGN KEY (`form_f_id`) REFERENCES `other_creditor_form_f_mdls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_f_senction_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_modification_mdls`
--
ALTER TABLE `form_modification_mdls`
  ADD CONSTRAINT `form_modification_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operational_creditor_mdls`
--
ALTER TABLE `operational_creditor_mdls`
  ADD CONSTRAINT `operational_creditor_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_creditor_form_f_mdls`
--
ALTER TABLE `other_creditor_form_f_mdls`
  ADD CONSTRAINT `other_creditor_form_f_mdls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_mdls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sabredgerep_mdls`
--
ALTER TABLE `sabredgerep_mdls`
  ADD CONSTRAINT `sabredgerep_mdls_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company_dtls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sabredgerep_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todo_mdls`
--
ALTER TABLE `todo_mdls`
  ADD CONSTRAINT `todo_mdls_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `general_info_mdls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
