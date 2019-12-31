-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2019 at 05:59 PM
-- Server version: 5.7.27-ndb-7.5.15
-- PHP Version: 7.2.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminreplies`
--

CREATE TABLE `adminreplies` (
  `id` int(10) NOT NULL,
  `contact_us_id` int(10) NOT NULL,
  `admin_note` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_name`, `banner_url`, `created_at`, `updated_at`) VALUES
(25, 'banner2d', 'images/frontendimage/banners/banner2d.jpg', '2019-10-09 04:48:31.000000', '2019-10-31 03:54:05.000000'),
(26, 'banner3', 'images/frontendimage/banners/banner3.jpeg', '2019-10-09 05:48:39.000000', '2019-11-12 23:30:05.000000'),
(27, 'Banner3.jpg', 'images/frontendimage/banners/Banner3.jpg', '2019-12-11 22:25:47.000000', '2019-12-11 22:25:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mobile', 'Mobiles', 0, NULL, '2019-12-16 02:19:20', '2019-12-16 02:22:33'),
(2, 1, 'mi', 'mi mobiles', 0, NULL, '2019-12-16 02:19:51', '2019-12-16 02:19:51'),
(3, 1, 'apple', 'apple mobiles', 0, NULL, '2019-12-16 02:20:14', '2019-12-16 02:20:14'),
(4, 0, 'books', 'books', 0, NULL, '2019-12-16 02:20:53', '2019-12-16 02:20:53'),
(5, 4, 'story book', 'story books', 0, NULL, '2019-12-16 02:21:19', '2019-12-16 02:21:19'),
(6, 4, 'adventure books', 'adventure books', 0, NULL, '2019-12-16 02:22:15', '2019-12-16 02:22:15'),
(7, 0, 'man', 'man', 0, NULL, '2019-12-16 02:22:29', '2019-12-16 02:22:29'),
(8, 7, 'clothing for man(Tshirt)', 'tshirt', 0, NULL, '2019-12-16 02:23:13', '2019-12-16 02:23:13'),
(9, 0, 'woman', 'female', 0, NULL, '2019-12-16 02:24:16', '2019-12-16 02:24:16'),
(10, 9, 'clothing for woman', 'female product', 0, NULL, '2019-12-16 02:25:20', '2019-12-16 02:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE `configures` (
  `id` int(10) NOT NULL,
  `define_key` varchar(255) NOT NULL,
  `define_values` varchar(255) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `define_key`, `define_values`, `created_at`, `updated_at`) VALUES
(1, 'Admin_notification', 'hii shopping site', NULL, '2019-10-07 02:48:16'),
(2, 'Admin_email', 'demo@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(500) NOT NULL,
  `admin_note` text,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `percent_off` int(100) NOT NULL,
  `no_of_uses` int(10) NOT NULL,
  `created_by` int(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modified_by` int(10) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `percent_off`, `no_of_uses`, `created_by`, `created_at`, `modified_by`, `updated_at`) VALUES
(1, 'welcome', 30, 0, 2, '2019-11-08 01:00:43.000000', 2, '2019-12-02 05:39:33.000000'),
(2, 'welcome20', 50, 1, 2, '2019-11-08 02:33:39.000000', NULL, '2019-11-08 02:33:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) NOT NULL,
  `email_name` varchar(100) NOT NULL,
  `email_header` text NOT NULL,
  `email_main_content` text,
  `email_footer` text NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email_name`, `email_header`, `email_main_content`, `email_footer`, `created_at`, `updated_at`) VALUES
(1, 'Registration Email', '', '<p>To log in when visiting our site just click&nbsp;Login&nbsp;or&nbsp;My Account&nbsp;at the top of every page, and then enter your email address and password.</p>\r\n\r\n\r\n<p>When you log in to your account, you will be able to do the following:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Proceed through checkout faster when making a purchase</p>\r\n	</li>\r\n	<li>\r\n	<p>Check the status of orders</p>\r\n	</li>\r\n	<li>\r\n	<p>View past orders</p>\r\n	</li>\r\n	<li>\r\n	<p>Make changes to your account information</p>\r\n	</li>\r\n	<li>\r\n	<p>Change your password</p>\r\n	</li>\r\n	<li>\r\n	<p>Store alternative addresses (for shipping to multiple family members and friends!)</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>If you have any questions, please feel free to contact us at&nbsp;info@shoppingcompany.com&nbsp;or by phone at&nbsp;+91 &ndash; 22 - 40500699.</p>', '', '2019-12-04 04:06:33.000000', '2019-12-04 04:06:33.000000'),
(2, 'order Email', '<table align=\"center\" border=\"1 style=width:300px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h1>THANK YOU FOR YOUR ORDER FROM My Shopping cart.</h1>\r\n\r\n			<p>Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Call Us:</strong>&nbsp;<a href=\"\">+91 - 22 - 40500699</a><br />\r\n			<strong>Email:</strong>&nbsp;info@shoppingcompany.com</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><strong>Your order</strong><strong>&nbsp;</strong></div>', '<p>BILL TO:</p>', '2019-12-05 01:01:52.000000', '2019-12-05 01:01:52.000000'),
(3, 'order confirmation email', '<table align=\"center\" border=\"1 style=width:300px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h1>THANK YOU FOR YOUR ORDER FROM INDIA BBT.</h1>\r\n\r\n			<p>You can check the status of your order by&nbsp;<a href=\"http://ibbt.php-dev.in/customer/account/index/\">logging into your account</a>.</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p><em>Order Questions?</em></p>\r\n\r\n			<p><strong>Call Us:</strong>&nbsp;<a href=\"\">+91 - 22 - 2&shy;628 7693</a><br />\r\n			+91 - 22 - 2&shy;620 2921<br />\r\n			<strong>Email:</strong>&nbsp;<a href=\"mailto:webadmin@indiabbt.com\">webadmin@indiabbt.com</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<h3><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Your Shipment</strong><strong>&nbsp;</strong><strong>#</strong></h3>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Order&nbsp;</p>', '<p>BILL TO:</p>', '2019-12-05 06:19:46.000000', '2019-12-09 01:34:54.000000'),
(4, 'Contact us', '<p>Dear Administrator,</p>\r\n\r\n<p>Please check below details of customer.</p>', NULL, '<p>Form Posted by IP: 206.183.111.25</p>', '2019-12-06 07:12:21.000000', '2019-12-06 07:12:21.000000'),
(5, 'Contact_us_customer', '<p>Dear Customer,</p>\r\n\r\n<p>Please check below details the admin added comment.</p>', NULL, '<p>Comments by administrator:</p>\r\n\r\n<p>Form Posted by IP: 206.183.111.25</p>', '2019-12-08 22:33:19.000000', '2019-12-08 22:33:19.000000');

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
(8, '2019_10_10_034933_create_category_table', 2),
(10, '2018_12_23_120000_create_shoppingcart_table', 4),
(11, '2014_10_12_000000_create_users_table', 5),
(12, '2014_10_12_100000_create_password_resets_table', 5),
(13, '2019_09_18_093318_create_permission_tables', 5),
(14, '2019_10_10_051543_create_category_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `type` varchar(199) NOT NULL,
  `notifiable_type` varchar(200) NOT NULL,
  `notifiable_id` bigint(20) NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) NOT NULL,
  `applied_coupons` varchar(10) DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `order_status` tinyint(4) DEFAULT NULL,
  `total` int(100) NOT NULL,
  `billing_address1` varchar(200) NOT NULL,
  `billing_address2` varchar(200) NOT NULL,
  `billing_city` varchar(100) NOT NULL,
  `billing_state` varchar(100) NOT NULL,
  `billing_country` varchar(100) NOT NULL,
  `billing_zip` int(100) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(2, 'role-create', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(3, 'role-edit', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(4, 'role-delete', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(5, 'user-list', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(6, 'user-create', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(7, 'user-edit', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(8, 'user-delete', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(9, 'product-list', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(10, 'product-create', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(11, 'product-edit', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49'),
(12, 'product-delete', 'web', '2019-12-16 02:11:49', '2019-12-16 02:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `productattributes`
--

CREATE TABLE `productattributes` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modify_by` int(10) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productattributes`
--

INSERT INTO `productattributes` (`id`, `name`, `created_by`, `created_at`, `modify_by`, `updated_at`) VALUES
(1, 'size', 1, '2019-12-16 02:28:40.000000', NULL, '2019-12-16 02:28:40.000000'),
(3, 'Color', 1, '2019-12-16 02:29:11.000000', NULL, '2019-12-16 02:29:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `productattributevalues`
--

CREATE TABLE `productattributevalues` (
  `id` int(11) NOT NULL,
  `product_attribute_id` int(10) NOT NULL,
  `attribute_value` varchar(45) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modified_by` int(10) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productattributevalues`
--

INSERT INTO `productattributevalues` (`id`, `product_attribute_id`, `attribute_value`, `created_by`, `created_at`, `modified_by`, `updated_at`) VALUES
(1, 1, 'L', 1, '2019-12-16 02:28:40.000000', NULL, '2019-12-16 02:28:40.000000'),
(2, 1, 'M', 1, '2019-12-16 02:28:40.000000', NULL, '2019-12-16 02:28:40.000000'),
(3, 1, 'S', 1, '2019-12-16 02:28:40.000000', NULL, '2019-12-16 02:28:40.000000'),
(4, 3, 'red', 1, '2019-12-16 02:29:11.000000', NULL, '2019-12-16 02:29:11.000000'),
(5, 3, 'green', 1, '2019-12-16 02:29:11.000000', NULL, '2019-12-16 02:29:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_description` varchar(45) NOT NULL,
  `long_description` text NOT NULL,
  `price` float(14,2) NOT NULL,
  `special_price` float(14,2) NOT NULL,
  `special_price_from` date NOT NULL,
  `special_price_to` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `quanity` int(10) NOT NULL,
  `meta_title` varchar(45) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `long_description`, `price`, `special_price`, `special_price_from`, `special_price_to`, `status`, `quanity`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `created_at`, `modify_by`, `updated_at`) VALUES
(1, 'Redmi 8 (Sapphire Blue, 64 GB)  (4 GB RAM)', 'mi', 'ram 8gb ,cam  24mp', 8000.00, 7000.00, '2019-12-12', '2019-12-20', '0', 10, 'Mobile', 'Mobile', 'Mobile', 1, '2019-12-16 04:29:05', NULL, '2019-12-16 04:29:05'),
(2, 'note 8 GB ram 41 mp camera gaming mode', 'Mobile', '8gb ram 41 mp camera', 15000.00, 15000.00, '2019-12-19', '2019-12-15', '0', 10, 'mi', 'Mobile', 'Mobile', 1, '2019-12-16 04:33:06', 1, '2019-12-16 04:36:31'),
(3, 'apple 11 with 12 GB ram with 49 mp cameras', 'apple 11', 'apple 11 with 12gb ram with 49 mp cam', 56000.00, 56000.00, '2019-12-19', '2019-12-28', '0', 10, 'apple', 'apple', 'apple', 1, '2019-12-16 04:38:24', 1, '2019-12-16 04:39:11'),
(4, 'Jangle Book', 'story of Moglee', 'Jangle book', 800.00, 750.00, '2019-12-19', '2019-12-20', '0', 10, 'Jangle book', 'Jangle book', 'Jangle book', 1, '2019-12-16 04:42:56', NULL, '2019-12-16 04:42:56'),
(5, 'got', 'got', 'got', 400.00, 400.00, '2019-12-11', '2019-12-15', '0', 10, 'got', 'got', 'got', 1, '2019-12-16 04:43:44', NULL, '2019-12-16 04:43:44'),
(6, 'mans t shirt', 'mans t shirt', 'mans t shirt', 500.00, 500.00, '2019-12-19', '2019-12-20', '0', 10, 'mans t shirt', 'mans t shirt', 'mans t shirt', 1, '2019-12-16 04:45:43', NULL, '2019-12-16 04:45:43'),
(7, 'mans black full slave', 'mans black full slave', 'mans black full slave', 600.00, 500.00, '2019-12-25', '2019-12-31', '0', 50, 'mans black full slave', 'mans black full slave', 'mans black full slave', 1, '2019-12-16 04:47:08', NULL, '2019-12-16 04:47:08'),
(8, 'top for girls', 'top for girls', 'top for girls', 500.00, 600.00, '2019-12-19', '2019-12-21', '0', 4, 'top for girls', 'top for girls', 'top for girls', 1, '2019-12-16 04:48:35', NULL, '2019-12-16 04:48:35'),
(9, 'black dress', 'black dress', 'black dress', 400.00, 500.00, '2019-12-19', '2019-12-22', '0', 10, 'black dress', 'black dress', 'black dress', 1, '2019-12-16 04:50:29', NULL, '2019-12-16 04:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_assocs`
--

CREATE TABLE `product_attributes_assocs` (
  `id` int(10) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `product_attribute_id` int(10) DEFAULT NULL,
  `product_attribute_value_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-12-16 04:29:05', '2019-12-16 04:29:05'),
(2, 2, 2, '2019-12-16 04:33:06', '2019-12-16 04:33:06'),
(3, 3, 3, '2019-12-16 04:38:24', '2019-12-16 04:38:24'),
(4, 4, 5, '2019-12-16 04:42:56', '2019-12-16 04:42:56'),
(5, 5, 6, '2019-12-16 04:43:44', '2019-12-16 04:43:44'),
(6, 6, 8, '2019-12-16 04:45:43', '2019-12-16 04:45:43'),
(7, 7, 8, '2019-12-16 04:47:08', '2019-12-16 04:47:08'),
(8, 8, 10, '2019-12-16 04:48:35', '2019-12-16 04:48:35'),
(9, 9, 10, '2019-12-16 04:50:29', '2019-12-16 04:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modified_by` int(10) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name`, `image_url`, `status`, `created_by`, `created_at`, `modified_by`, `updated_at`) VALUES
(1, 1, 'Mobile.jpeg', 'images/frontendimage/product_image/Mobile.jpeg', '0', 1, '2019-12-16 04:29:05.000000', NULL, '2019-12-16 04:29:05.000000'),
(2, 2, 'mi2.jpg', 'images/frontendimage/product_image/mi2.jpg', '0', 1, '2019-12-16 04:33:07.000000', 1, '2019-12-16 04:36:31.000000'),
(3, 3, 'apple.jpg', 'images/frontendimage/product_image/apple.jpg', '0', 1, '2019-12-16 04:38:24.000000', 1, '2019-12-16 04:39:11.000000'),
(4, 4, 'Jangle book.jpg', 'images/frontendimage/product_image/Jangle book.jpg', '0', 1, '2019-12-16 04:42:56.000000', NULL, '2019-12-16 04:42:56.000000'),
(5, 5, 'got.jpg', 'images/frontendimage/product_image/got.jpg', '0', 1, '2019-12-16 04:43:44.000000', NULL, '2019-12-16 04:43:44.000000'),
(6, 6, 'mans t shirt.jpg', 'images/frontendimage/product_image/mans t shirt.jpg', '0', 1, '2019-12-16 04:45:43.000000', NULL, '2019-12-16 04:45:43.000000'),
(7, 7, 'tsh.jpeg', 'images/frontendimage/product_image/tsh.jpeg', '0', 1, '2019-12-16 04:47:09.000000', NULL, '2019-12-16 04:47:09.000000'),
(8, 8, 'girls.jpg', 'images/frontendimage/product_image/girls.jpg', '0', 1, '2019-12-16 04:48:35.000000', NULL, '2019-12-16 04:48:35.000000'),
(9, 9, 'black dress.jpg', 'images/frontendimage/product_image/black dress.jpg', '0', 1, '2019-12-16 04:50:29.000000', NULL, '2019-12-16 04:50:29.000000');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2019-12-16 02:11:50', '2019-12-16 02:11:50'),
(2, 'Admin', 'web', '2019-12-16 02:12:47', '2019-12-16 02:12:47'),
(3, 'InventoryManager', 'web', '2019-12-16 02:14:06', '2019-12-16 02:14:38'),
(4, 'OrderManager', 'web', '2019-12-16 02:15:19', '2019-12-16 02:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(9, 2),
(10, 2),
(9, 3),
(10, 3),
(11, 3),
(9, 4),
(10, 4),
(11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `facebook_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_confirmation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `status`, `facebook_id`, `google_id`, `role`, `email_verified_at`, `password`, `password_confirmation`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'demo', 'rushikeshsunilganesh@gmail.com', 0, NULL, NULL, 'SuperAdmin', NULL, '$2y$10$bTxb9NYldr7S3rTYLNgOKeYBIH3O7smJk1bGR3p/mvqn9SDUrTV8y', '12345678', NULL, '2019-12-16 01:56:32', '2019-12-16 01:56:32'),
(2, 'user', 'test', 'rushikesh.ganesh@neosofttech.com', 0, NULL, NULL, 'Customer', NULL, '$2y$10$v3Jk0XUK8QXlDhIcUNCxnu7SwAFwJ/TVIXHc0g2Ybewneb8a/ZyeO', '123456', '6rngKWF7B28N7bgEFGHbKeMrUQTATNrM1gCUFtYmQdZzzt7IpWPmilHOAfnI', '2019-12-16 01:57:33', '2019-12-17 06:09:18'),
(3, 'test1', 'test2', 'we@google.com', 1, NULL, NULL, 'SuperAdmin', NULL, '$2y$10$2K64sWZso.348zIh0QlPJ.Ld07ECp5jx3fhT0QrtN1OZtHZms5xc.', '123456', NULL, '2019-12-16 02:11:50', '2019-12-16 02:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `userwishlists`
--

CREATE TABLE `userwishlists` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `zip` int(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `defaultaddress` tinyint(10) NOT NULL DEFAULT '0',
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `address1`, `address2`, `zip`, `city`, `state`, `country`, `defaultaddress`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', 'demo', 422001, 'Mumbai', 'MH', 'India', 1, '2019-12-16 01:58:57.000000', '2019-12-16 01:58:57.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreplies`
--
ALTER TABLE `adminreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productattributes`
--
ALTER TABLE `productattributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productattributevalues`
--
ALTER TABLE `productattributevalues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes_assocs`
--
ALTER TABLE `product_attributes_assocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userwishlists`
--
ALTER TABLE `userwishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminreplies`
--
ALTER TABLE `adminreplies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productattributes`
--
ALTER TABLE `productattributes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productattributevalues`
--
ALTER TABLE `productattributevalues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_attributes_assocs`
--
ALTER TABLE `product_attributes_assocs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userwishlists`
--
ALTER TABLE `userwishlists`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
