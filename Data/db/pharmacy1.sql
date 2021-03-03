-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 08:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `whereUser` (IN `user_id` INT(11))  BEGIN   
      SELECT * FROM medicine_category WHERE id = user_id;  
      END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `id_stock` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ahmad`
--

CREATE TABLE `ahmad` (
  `id` int(100) NOT NULL,
  `id_stock` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `s_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'hind'),
(2, 'alman');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) DEFAULT 0,
  `delete_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `delete_status`, `delete_date`) VALUES
(1, 'admin', 'admin', '2017-06-06 11:23:04', 0, NULL),
(2, 'role 1', 'role 1', '2019-04-08 10:51:05', 0, NULL),
(3, 'role2', 'role2', '2019-04-08 10:52:00', 0, NULL),
(4, 'role 3', 'role 3', '2019-04-08 10:54:18', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `s_price` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `barcode`, `name`, `s_price`, `p_price`, `type`, `expire`, `add_date`, `quantity`, `brand`) VALUES
(2, '13213213131', 'nababa', '0', '', 'volvo', '2020-10-31', '0000-00-00', '1222', 'saab'),
(3, '11', 'qw', '12000', '12000', 'فرۆشگای ئاری', '2020-10-21', '0000-00-00', '-18', 'alman'),
(15, '13213213131', 'mhamadqaas', '0', '', 'mhamad', '2020-10-31', '2020-10-21 ', '12', 'saab'),
(16, '1111', 'فرۆشگای ئاری', '20', '', 'mhamad', '2020-10-31', '2020-10-21 ', '11', 'saab'),
(17, '3876534', 'mhaa', '25.000', '', 'hind', '2020-11-21', '2020-10-22 ', '12', ''),
(18, '3876534', 'mhamad', '4', '', 'mhamad', '2020-10-27', '2020-10-22 ', '12', 'saab'),
(19, '3876534', 'mhamadasa', '12.000', '', 'hind', '2020-10-07', '2020-10-22 ', '13', ''),
(20, '3876534', 'mhamadwq', '12.000', '', 'mhamad', '2020-10-28', '2020-10-22 ', '111', 'saab'),
(21, '387', 'mhaaasa', '12.000', '', 'فرۆشگای ئاری', '2020-10-20', '2020-10-22 ', '0', 'alman'),
(23, '4231989', 'ahmad', '12.000', '', 'mhamad', '2020-11-17', '2020-11-04 ', '1', 'saab'),
(24, '213322311', 'paracitamol', '6.000', '', 'hind', '2020-11-17', '2020-11-05 ', '0', ''),
(25, '1213543644', 'paracitamol', '5.000', '', 'mhamad', '2020-11-05', '2020-11-05', '-4', 'saab'),
(27, '63839884092', 'amitazol', '5000', '', 'فرۆشگای ئاری', '2020-01-21', '2020-11-09 ', '187', 'alman'),
(28, '4535343422', 'gaha', '14000', '12000', 'فرۆشگای ئاری', '2020-12-30', '2020-12-13 ', '14', 'alman');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_name` varchar(15) NOT NULL,
  `added_date` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `name`, `short_name`, `added_date`, `delete_status`) VALUES
(1, 'tab', 'tab', '0000-00-00', 1),
(2, 'Injuries', 'Injuries', '0000-00-00', 0),
(3, 'Cancer', 'Cancer', '0000-00-00', 0),
(4, 'Animal diseases', 'AD', '0000-00-00', 0),
(5, 'Growth disorders', 'GD', '0000-00-00', 0),
(6, 'Rare diseases', 'RD', '0000-00-00', 0),
(7, 'Neoplasms', 'Neo', '0000-00-00', 0),
(8, 'Inflammations', 'Inflam', '0000-00-00', 0),
(9, 'Sleep disorders', 'SD', '0000-00-00', 0),
(11, 'Infectious diseases', 'ID', '2019-04-02', 0),
(12, 'sdfsdfsdf', 'sdf', '2019-04-02', 0),
(13, 'cvnvcnvncvncvn', 'cnv', '2019-04-02', 0),
(14, 'fghjgjhfgjh', 'fgh', '2019-04-02', 0),
(16, 'mhamad', 'mhamad', '2020-10-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mhamad`
--

CREATE TABLE `mhamad` (
  `id` int(100) NOT NULL,
  `id_stock` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `s_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, '2020_12_13_173105_post', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id` int(5) NOT NULL,
  `header` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id`, `header`, `title`, `description`) VALUES
(1, 'Modal Header Title', 'Hello, this is version 2.0 and I am still working on this.\r\n', 'Please don\'t forget to give credit to original developer because I really worked hard to develop this project and please don\'t forget to like and share it if you found it useful :) For students or anyone else who needs program or source code for thesis writing or any Professional Software Development,Website Development,Mobile Apps Development at affordable cost contact me at Email : mayuri.infospace@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `name`, `type`, `brand`) VALUES
(1, 'فرۆشگای ئاری', 'mhamad', 'saab'),
(2, 'فرۆشگای ئاری', 'mhamad', 'saab'),
(3, 'mhamad', 'volvo', 'audi'),
(4, 'qw', 'tab', 'saab'),
(5, 'mhamad', 'volvo', 'audi'),
(6, 'فرۆشگای ئاری', 'mhamad', 'saab'),
(10, 'mhaa', 'mhamad', 'saab'),
(11, 'nababa', 'mhamad', 'saab'),
(12, 'paracitamol', 'asa', 'sas'),
(13, 'amitazol', 'mhamad', 'saab'),
(14, 'paracitamol', 'فرۆشگای ئاری', 'hind');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `role_name`) VALUES
(1, 'manage_medicinals', 'Manage Medicinals', 'Manage Medicinals', NULL),
(2, 'manage_pos', 'Manage POS', 'Manage POS', NULL),
(3, 'manage_roles', 'Manage User Roles', 'Manage User Roles', NULL),
(4, 'manage_users', 'Manage Users', 'Manage Users', NULL),
(5, 'manage_sales', 'Manage Sales', 'Manage Sales', NULL),
(6, 'manage_categories', 'Manage Categories', 'Manage Categories', NULL),
(7, 'manage_suppliers', 'Manage Suppliers', 'Manage Suppliers', NULL),
(8, 'manage_customers', 'Manage Customers', 'Manage Customers', NULL),
(9, 'manage_reports', 'Manage Reports', 'Manage Reports', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(7, 5, 1),
(8, 6, 1),
(9, 7, 1),
(10, 8, 1),
(11, 9, 1),
(16, 6, 3),
(17, 7, 3),
(18, 3, 4),
(19, 4, 4),
(20, 8, 4),
(21, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(100) NOT NULL,
  `id_stock` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `s_price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `profit` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `with_discount` varchar(255) NOT NULL,
  `expire` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_stock`, `name`, `p_price`, `s_price`, `profit`, `quantity`, `subtotal`, `with_discount`, `expire`, `type`, `brand`, `sale_date`, `sale_month`) VALUES
(136, '28', 'gaha', '12000', '14000', '4000', '2', '28000', '28000', '2020-12-15', 'فرۆشگای ئاری', 'alman', '2020-12-16', '2020-12 '),
(137, '3', 'qw', '12000', '12000', '0', '2', '24000', '24000', '2020-10-21', 'فرۆشگای ئاری', 'alman', '2020-12-17', '2020-12 '),
(138, '28', 'gaha', '12000', '14000', '4000', '2', '28000', '28000', '2020-12-15', 'فرۆشگای ئاری', 'alman', '2020-12-17', '2020-12 '),
(139, '3', 'qw', '12000', '12000', '0', '3', '36000', '36000', '2020-10-21', 'فرۆشگای ئاری', 'alman', '2020-12-20', '2020-12 '),
(140, '3', 'qw', '12000', '12000', '0', '2', '24000', '24000', '2020-10-21', 'فرۆشگای ئاری', 'alman', '2020-12-21', '2020-12 '),
(141, '3', 'qw', '12000', '12000', '-1000', '2', '24000', '23000', '2020-10-21', 'فرۆشگای ئاری', 'alman', '2020-12-30', '2020-12 '),
(142, '3', 'qw', '12000', '12000', '-1000', '3', '36000', '35000', '2020-10-21', 'فرۆشگای ئاری', 'alman', '2021-02-28', '2021-02 ');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL,
  `fevicon` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `login_image` varchar(100) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `currency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `fevicon`, `logo`, `title`, `login_image`, `footer`, `currency`) VALUES
(1, 'fevicon-179.png', 'logo-597.png', 'Pharmacy', 'login_image-324.png', 'Footer', 'Rs.');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `telephone`, `email`, `info`) VALUES
(2, 'mhamad jamal', 'bakrajo', '+9647508974440', 'mhamadjamal946@gmail.com', 'xvxvxvx'),
(3, 'mhamad jamal', 'bakrajo', '+9647508974440', 'mhamadjamal946@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `avator` varchar(255) DEFAULT NULL,
  `group_id` int(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `login`, `role`, `avator`, `group_id`, `delete_status`) VALUES
(1, 'admin@admin.com', '$2y$10$eqnU/hsNjq3M7h3TvFfwYOKIP/6jHmzBLEFiHyhMaKjf4X3HenLWa', 'admin', '36112.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '001', 'Invalid email or password', 'warning'),
(2, '002', 'Settings are updated', 'success'),
(3, '003', 'Record Added Successfully', 'success'),
(4, '004', 'Record Successfully Updated', 'success'),
(5, '005', 'Record Sudccessfully Deleted', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(2, 'htacce'),
(3, 'فرۆشگای ئاری');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `password`, `role`) VALUES
(64, 'mhamad', '1212', 'admin'),
(65, 'ahmad', '1212', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ahmad`
--
ALTER TABLE `ahmad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhamad`
--
ALTER TABLE `mhamad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `ahmad`
--
ALTER TABLE `ahmad`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mhamad`
--
ALTER TABLE `mhamad`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
