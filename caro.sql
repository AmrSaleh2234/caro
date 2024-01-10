-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2024 at 09:41 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caro`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE IF NOT EXISTS `actions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `actionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_id` bigint UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actions_actionable_type_actionable_id_index` (`actionable_type`,`actionable_id`),
  KEY `actions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `activity_loggable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_loggable_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_logs_activity_loggable_type_activity_loggable_id_index` (`activity_loggable_type`,`activity_loggable_id`),
  KEY `activity_logs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `additions`
--

DROP TABLE IF EXISTS `additions`;
CREATE TABLE IF NOT EXISTS `additions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` double DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addition_product`
--

DROP TABLE IF EXISTS `addition_product`;
CREATE TABLE IF NOT EXISTS `addition_product` (
  `addition_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`addition_id`,`product_id`),
  KEY `addition_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'house',
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `geo_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `attachmentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachmentable_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachments_attachmentable_type_attachmentable_id_index` (`attachmentable_type`,`attachmentable_id`),
  KEY `attachments_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `attachment` mediumtext COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polygon` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_child_id` bigint UNSIGNED DEFAULT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `offer_price` double DEFAULT NULL,
  `price` double NOT NULL DEFAULT '1',
  `amount` double NOT NULL DEFAULT '1',
  `amount_addition` double NOT NULL DEFAULT '0',
  `price_addition` double NOT NULL DEFAULT '0',
  `offer_amount` double NOT NULL DEFAULT '0',
  `offer_amount_add` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '1',
  `total` double NOT NULL DEFAULT '1',
  `total_price` double NOT NULL DEFAULT '1',
  `note` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_product_child_id_foreign` (`product_child_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_additions`
--

DROP TABLE IF EXISTS `cart_item_additions`;
CREATE TABLE IF NOT EXISTS `cart_item_additions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `addition_id` bigint UNSIGNED NOT NULL,
  `cart_item_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL DEFAULT '1',
  `amount` double NOT NULL DEFAULT '1',
  `total` double NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_item_additions_cart_item_id_foreign` (`cart_item_id`),
  KEY `cart_item_additions_addition_id_foreign` (`addition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

DROP TABLE IF EXISTS `car_brands`;
CREATE TABLE IF NOT EXISTS `car_brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

DROP TABLE IF EXISTS `car_models`;
CREATE TABLE IF NOT EXISTS `car_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `car_brand_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `icon` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `category_product_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `shipping` double DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polygon` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `shipping`, `latitude`, `longitude`, `polygon`, `order_id`, `active`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"الرياض\",\"en\":\"Riyadh\"}', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-05 08:54:22', '2023-12-05 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `attachment` mediumtext COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` bigint UNSIGNED DEFAULT NULL,
  `currency_type` tinyint NOT NULL DEFAULT '2',
  `phone_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_currency_id_foreign` (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `currency_id`, `currency_type`, `phone_code`, `image`, `order_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'SA', '{\"ar\":\"السعودية\",\"en\":\"Saudi\"}', 1, 2, '966', '/uploads/flags/sa.png', 1, 1, '2023-12-05 08:54:22', '2023-12-05 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `discount` double NOT NULL DEFAULT '1',
  `min_order` double NOT NULL DEFAULT '1',
  `max_discount` double NOT NULL DEFAULT '1',
  `user_limit` int NOT NULL DEFAULT '0',
  `use_limit` int NOT NULL DEFAULT '0',
  `use_count` int NOT NULL DEFAULT '0',
  `count_used` int NOT NULL DEFAULT '0',
  `date_start` timestamp NULL DEFAULT NULL,
  `date_expire` timestamp NULL DEFAULT NULL,
  `day_start` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_expire` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish` tinyint NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '1',
  `order_id` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_group`
--

DROP TABLE IF EXISTS `coupon_group`;
CREATE TABLE IF NOT EXISTS `coupon_group` (
  `group_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`coupon_id`,`group_id`),
  KEY `coupon_group_group_id_foreign` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `order_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'SAR', '{\"ar\":\"ريال\",\"en\":\"SAR\"}', 1, 1, '2023-12-05 08:54:22', '2023-12-05 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `imei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devices_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `favorite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  KEY `favorites_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featureables`
--

DROP TABLE IF EXISTS `featureables`;
CREATE TABLE IF NOT EXISTS `featureables` (
  `feature_id` bigint UNSIGNED NOT NULL,
  `featureable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featureable_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`feature_id`,`featureable_id`,`featureable_type`),
  KEY `featureables_featureable_type_featureable_id_index` (`featureable_type`,`featureable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `group_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `group_user_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `loggable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loggable_id` bigint UNSIGNED DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_old` mediumtext COLLATE utf8mb4_unicode_ci,
  `value` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_loggable_type_loggable_id_index` (`loggable_type`,`loggable_id`),
  KEY `logs_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

DROP TABLE IF EXISTS `ltm_translations`;
CREATE TABLE IF NOT EXISTS `ltm_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

DROP TABLE IF EXISTS `metas`;
CREATE TABLE IF NOT EXISTS `metas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `metaable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaable_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metas_metaable_type_metaable_id_index` (`metaable_type`,`metaable_id`),
  KEY `metas_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_01_12_000000_create_services_table', 1),
(5, '2019_02_12_000000_create_additions_table', 1),
(6, '2019_02_12_000000_create_branches_table', 1),
(7, '2019_02_12_000000_create_brands_table', 1),
(8, '2019_02_12_000000_create_cars_table', 1),
(9, '2019_02_12_000000_create_colors_table', 1),
(10, '2019_02_12_000000_create_polishes_table', 1),
(11, '2019_02_12_000000_create_sizes_table', 1),
(12, '2019_02_12_000000_create_units_table', 1),
(13, '2019_02_12_112748_create_payments_table', 1),
(14, '2019_02_12_112752_create_carts_table', 1),
(15, '2019_02_12_112752_create_orders_table', 1),
(16, '2019_02_12_132752_create_products_table', 1),
(17, '2019_02_12_134110_create_product_gallery_table', 1),
(18, '2019_02_12_134357_create_rates_table', 1),
(19, '2019_02_12_134553_create_favorites_table', 1),
(20, '2019_02_12_134737_create_actions_table', 1),
(21, '2019_02_12_134737_create_items_table', 1),
(22, '2019_02_12_143247_create_settings_table', 1),
(23, '2019_02_12_143411_create_contacts_table', 1),
(24, '2019_02_12_144632_create_coupons_table', 1),
(25, '2019_05_15_143247_create_addresses_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2020_07_13_000000_create_activity_logs_table', 1),
(29, '2020_07_13_000000_create_logs_table', 1),
(30, '2020_07_17_000000_create_metas_table', 1),
(31, '2021_02_12_134737_create_attachments_table', 1),
(32, '2022_05_09_000000_create_tracker_table', 1),
(33, '2022_05_15_143247_create_devices_table', 1),
(34, '2022_10_12_000000_create_pages_table', 1),
(35, '2022_10_12_000000_create_sliders_table', 1),
(36, '2022_11_12_000000_create_categories_tables', 1),
(37, '2022_11_13_080008_laratrust_setup_tables', 1),
(38, '2022_11_13_110033_create_notifications_table', 1),
(39, '2023_05_29_074451_create_features_table', 1),
(40, '2023_05_29_074451_create_tags_table', 1),
(41, '2023_05_29_074451_create_terms_table', 1),
(42, '2023_06_12_134737_create_item_additions_table', 1),
(43, '2023_10_12_000000_create_order_rejects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_id` bigint UNSIGNED DEFAULT NULL,
  `cancel_by` bigint UNSIGNED DEFAULT NULL,
  `cancel_date` timestamp NULL DEFAULT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `shipping` double NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `paid` double NOT NULL DEFAULT '0',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'request',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order_reject_id` bigint UNSIGNED DEFAULT NULL,
  `polygon` mediumtext COLLATE utf8mb4_unicode_ci,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `delivery_note` mediumtext COLLATE utf8mb4_unicode_ci,
  `admin_note` mediumtext COLLATE utf8mb4_unicode_ci,
  `reject_note` mediumtext COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_child_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `offer_price` double DEFAULT NULL,
  `price` double NOT NULL DEFAULT '1',
  `amount` double NOT NULL DEFAULT '1',
  `amount_addition` double NOT NULL DEFAULT '0',
  `price_addition` double NOT NULL DEFAULT '0',
  `offer_amount` double NOT NULL DEFAULT '0',
  `offer_amount_add` double NOT NULL DEFAULT '0',
  `total_amount` double NOT NULL DEFAULT '1',
  `total` double NOT NULL DEFAULT '1',
  `total_price` double NOT NULL DEFAULT '1',
  `note` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_product_child_id_foreign` (`product_child_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_additions`
--

DROP TABLE IF EXISTS `order_item_additions`;
CREATE TABLE IF NOT EXISTS `order_item_additions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `addition_id` bigint UNSIGNED NOT NULL,
  `order_item_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL DEFAULT '1',
  `amount` double NOT NULL DEFAULT '1',
  `total` double NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_item_additions_order_item_id_foreign` (`order_item_id`),
  KEY `order_item_additions_addition_id_foreign` (`addition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_metas`
--

DROP TABLE IF EXISTS `order_metas`;
CREATE TABLE IF NOT EXISTS `order_metas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `geo_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_metas_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_rejects`
--

DROP TABLE IF EXISTS `order_rejects`;
CREATE TABLE IF NOT EXISTS `order_rejects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'request',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_statuses_order_id_foreign` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `icon` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'additions.index', 'view', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(2, 'additions.create,additions.store', 'create', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(3, 'additions.edit,additions.update', 'edit', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(4, 'additions.show', 'show', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(5, 'additions.status', 'status', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(6, 'additions.delete', 'delete', 'additions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(7, 'activity_logs.index', 'view', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(8, 'activity_logs.create,activity_logs.store', 'create', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(9, 'activity_logs.edit,activity_logs.update', 'edit', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(10, 'activity_logs.show', 'show', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(11, 'activity_logs.status', 'status', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(12, 'activity_logs.delete', 'delete', 'activity_logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(13, 'actions.index', 'view', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(14, 'actions.create,actions.store', 'create', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(15, 'actions.edit,actions.update', 'edit', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(16, 'actions.show', 'show', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(17, 'actions.status', 'status', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(18, 'actions.delete', 'delete', 'actions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(19, 'addresses.index', 'view', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(20, 'addresses.create,addresses.store', 'create', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(21, 'addresses.edit,addresses.update', 'edit', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(22, 'addresses.show', 'show', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(23, 'addresses.status', 'status', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(24, 'addresses.delete', 'delete', 'addresses', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(25, 'branches.index', 'view', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(26, 'branches.create,branches.store', 'create', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(27, 'branches.edit,branches.update', 'edit', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(28, 'branches.show', 'show', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(29, 'branches.status', 'status', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(30, 'branches.delete', 'delete', 'branches', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(31, 'brands.index', 'view', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(32, 'brands.create,brands.store', 'create', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(33, 'brands.edit,brands.update', 'edit', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(34, 'brands.show', 'show', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(35, 'brands.status', 'status', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(36, 'brands.delete', 'delete', 'brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(37, 'carts.index', 'view', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(38, 'carts.create,carts.store', 'create', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(39, 'carts.edit,carts.update', 'edit', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(40, 'carts.show', 'show', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(41, 'carts.status', 'status', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(42, 'carts.delete', 'delete', 'carts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(43, 'categories.index', 'view', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(44, 'categories.create,categories.store', 'create', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(45, 'categories.edit,categories.update', 'edit', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(46, 'categories.show', 'show', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(47, 'categories.status', 'status', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(48, 'categories.delete', 'delete', 'categories', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(49, 'cities.index', 'view', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(50, 'cities.create,cities.store', 'create', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(51, 'cities.edit,cities.update', 'edit', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(52, 'cities.show', 'show', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(53, 'cities.status', 'status', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(54, 'cities.delete', 'delete', 'cities', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(55, 'contacts.index', 'view', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(56, 'contacts.create,contacts.store', 'create', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(57, 'contacts.edit,contacts.update', 'edit', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(58, 'contacts.show', 'show', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(59, 'contacts.status', 'status', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(60, 'contacts.delete', 'delete', 'contacts', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(61, 'coupons.index', 'view', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(62, 'coupons.create,coupons.store', 'create', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(63, 'coupons.edit,coupons.update', 'edit', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(64, 'coupons.show', 'show', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(65, 'coupons.status', 'status', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(66, 'coupons.delete', 'delete', 'coupons', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(67, 'countries.index', 'view', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(68, 'countries.create,countries.store', 'create', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(69, 'countries.edit,countries.update', 'edit', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(70, 'countries.show', 'show', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(71, 'countries.status', 'status', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(72, 'countries.delete', 'delete', 'countries', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(73, 'currencies.index', 'view', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(74, 'currencies.create,currencies.store', 'create', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(75, 'currencies.edit,currencies.update', 'edit', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(76, 'currencies.show', 'show', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(77, 'currencies.status', 'status', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(78, 'currencies.delete', 'delete', 'currencies', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(79, 'groups.index', 'view', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(80, 'groups.create,groups.store', 'create', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(81, 'groups.edit,groups.update', 'edit', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(82, 'groups.show', 'show', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(83, 'groups.status', 'status', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(84, 'groups.delete', 'delete', 'groups', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(85, 'notifications.index', 'view', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(86, 'notifications.create,notifications.store', 'create', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(87, 'notifications.edit,notifications.update', 'edit', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(88, 'notifications.show', 'show', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(89, 'notifications.status', 'status', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(90, 'notifications.delete', 'delete', 'notifications', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(91, 'orders.index', 'view', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(92, 'orders.create,orders.store', 'create', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(93, 'orders.edit,orders.update', 'edit', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(94, 'orders.show', 'show', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(95, 'orders.status', 'status', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(96, 'orders.delete', 'delete', 'orders', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(97, 'order_rejects.index', 'view', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(98, 'order_rejects.create,order_rejects.store', 'create', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(99, 'order_rejects.edit,order_rejects.update', 'edit', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(100, 'order_rejects.show', 'show', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(101, 'order_rejects.status', 'status', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(102, 'order_rejects.delete', 'delete', 'order_rejects', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(103, 'payments.index', 'view', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(104, 'payments.create,payments.store', 'create', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(105, 'payments.edit,payments.update', 'edit', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(106, 'payments.show', 'show', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(107, 'payments.status', 'status', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(108, 'payments.delete', 'delete', 'payments', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(109, 'pages.index', 'view', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(110, 'pages.create,pages.store', 'create', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(111, 'pages.edit,pages.update', 'edit', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(112, 'pages.show', 'show', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(113, 'pages.status', 'status', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(114, 'pages.delete', 'delete', 'pages', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(115, 'products.index', 'view', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(116, 'products.create,products.store', 'create', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(117, 'products.edit,products.update', 'edit', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(118, 'products.show', 'show', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(119, 'products.status', 'status', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(120, 'products.delete', 'delete', 'products', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(121, 'reviews.index', 'view', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(122, 'reviews.create,reviews.store', 'create', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(123, 'reviews.edit,reviews.update', 'edit', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(124, 'reviews.show', 'show', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(125, 'reviews.status', 'status', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(126, 'reviews.delete', 'delete', 'reviews', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(127, 'favorites.index', 'view', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(128, 'favorites.create,favorites.store', 'create', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(129, 'favorites.edit,favorites.update', 'edit', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(130, 'favorites.show', 'show', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(131, 'favorites.status', 'status', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(132, 'favorites.delete', 'delete', 'favorites', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(133, 'regions.index', 'view', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(134, 'regions.create,regions.store', 'create', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(135, 'regions.edit,regions.update', 'edit', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(136, 'regions.show', 'show', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(137, 'regions.status', 'status', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(138, 'regions.delete', 'delete', 'regions', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(139, 'sizes.index', 'view', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(140, 'sizes.create,sizes.store', 'create', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(141, 'sizes.edit,sizes.update', 'edit', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(142, 'sizes.show', 'show', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(143, 'sizes.status', 'status', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(144, 'sizes.delete', 'delete', 'sizes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(145, 'wallets.index', 'view', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(146, 'wallets.create,wallets.store', 'create', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(147, 'wallets.edit,wallets.update', 'edit', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(148, 'wallets.show', 'show', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(149, 'wallets.status', 'status', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(150, 'wallets.delete', 'delete', 'wallets', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(151, 'roles.index', 'view', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(152, 'roles.create,roles.store', 'create', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(153, 'roles.edit,roles.update', 'edit', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(154, 'roles.show', 'show', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(155, 'roles.status', 'status', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(156, 'roles.delete', 'delete', 'roles', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(157, 'points.index', 'view', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(158, 'points.create,points.store', 'create', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(159, 'points.edit,points.update', 'edit', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(160, 'points.show', 'show', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(161, 'points.status', 'status', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(162, 'points.delete', 'delete', 'points', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(163, 'users.index', 'view', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(164, 'users.create,users.store', 'create', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(165, 'users.edit,users.update', 'edit', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(166, 'users.show', 'show', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(167, 'users.status', 'status', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(168, 'users.delete', 'delete', 'users', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(169, 'units.index', 'view', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(170, 'units.create,units.store', 'create', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(171, 'units.edit,units.update', 'edit', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(172, 'units.show', 'show', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(173, 'units.status', 'status', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(174, 'units.delete', 'delete', 'units', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(175, 'logs.index', 'view', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(176, 'logs.create,logs.store', 'create', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(177, 'logs.edit,logs.update', 'edit', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(178, 'logs.show', 'show', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(179, 'logs.status', 'status', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(180, 'logs.delete', 'delete', 'logs', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(181, 'terms.index', 'view', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(182, 'terms.create,terms.store', 'create', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(183, 'terms.edit,terms.update', 'edit', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(184, 'terms.show', 'show', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(185, 'terms.status', 'status', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(186, 'terms.delete', 'delete', 'terms', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(187, 'tags.index', 'view', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(188, 'tags.create,tags.store', 'create', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(189, 'tags.edit,tags.update', 'edit', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(190, 'tags.show', 'show', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(191, 'tags.status', 'status', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(192, 'tags.delete', 'delete', 'tags', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(193, 'features.index', 'view', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(194, 'features.create,features.store', 'create', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(195, 'features.edit,features.update', 'edit', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(196, 'features.show', 'show', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(197, 'features.status', 'status', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(198, 'features.delete', 'delete', 'features', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(199, 'car_brands.index', 'view', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(200, 'car_brands.create,car_brands.store', 'create', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(201, 'car_brands.edit,car_brands.update', 'edit', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(202, 'car_brands.show', 'show', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(203, 'car_brands.status', 'status', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(204, 'car_brands.delete', 'delete', 'car_brands', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(205, 'car_models.index', 'view', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(206, 'car_models.create,car_models.store', 'create', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(207, 'car_models.edit,car_models.update', 'edit', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(208, 'car_models.show', 'show', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(209, 'car_models.status', 'status', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(210, 'car_models.delete', 'delete', 'car_models', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(211, 'colors.index', 'view', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(212, 'colors.create,colors.store', 'create', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(213, 'colors.edit,colors.update', 'edit', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(214, 'colors.show', 'show', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(215, 'colors.status', 'status', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(216, 'colors.delete', 'delete', 'colors', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(217, 'plishes.index', 'view', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(218, 'plishes.create,plishes.store', 'create', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(219, 'plishes.edit,plishes.update', 'edit', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(220, 'plishes.show', 'show', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(221, 'plishes.status', 'status', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(222, 'plishes.delete', 'delete', 'plishes', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(223, 'services.index', 'view', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(224, 'services.create,services.store', 'create', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(225, 'services.edit,services.update', 'edit', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(226, 'services.show', 'show', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(227, 'services.status', 'status', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(228, 'services.delete', 'delete', 'services', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(229, 'translations.index', 'view', 'translations', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(230, 'tables.index', 'view', 'tables', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(231, 'images.index', 'view', 'images', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(232, 'settings.index', 'view', 'settings', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(233, 'dashboard', 'view', 'dashboard', '2023-12-05 08:58:54', '2023-12-05 08:58:54'),
(234, 'statistics', 'view', 'statistics', '2023-12-05 08:58:54', '2023-12-05 08:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
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
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `point` double NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `points_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polishes`
--

DROP TABLE IF EXISTS `polishes`;
CREATE TABLE IF NOT EXISTS `polishes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `unit_id` bigint UNSIGNED DEFAULT NULL,
  `polish_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `max_amount` double DEFAULT NULL,
  `max_addition` tinyint DEFAULT NULL,
  `max_addition_free` tinyint DEFAULT NULL,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_amount` double DEFAULT NULL,
  `offer_amount_add` double DEFAULT NULL,
  `offer_percent` double DEFAULT NULL,
  `price` double NOT NULL DEFAULT '1',
  `start` double NOT NULL DEFAULT '1',
  `skip` double NOT NULL DEFAULT '1',
  `rate_count` int DEFAULT NULL,
  `rate_all` double DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `order_limit` double DEFAULT NULL,
  `order_max` double DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_expire` timestamp NULL DEFAULT NULL,
  `day_start` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_expire` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prepare_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `is_late` tinyint NOT NULL DEFAULT '0',
  `is_size` tinyint NOT NULL DEFAULT '0',
  `is_max` tinyint NOT NULL DEFAULT '0',
  `filter` tinyint NOT NULL DEFAULT '0',
  `offer` tinyint NOT NULL DEFAULT '0',
  `sale` tinyint NOT NULL DEFAULT '0',
  `shipping` double DEFAULT '0',
  `feature` tinyint NOT NULL DEFAULT '0',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE IF NOT EXISTS `product_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `product_galleries_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_metas`
--

DROP TABLE IF EXISTS `product_metas`;
CREATE TABLE IF NOT EXISTS `product_metas` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_metas_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `shipping` double DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polygon` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_city_id_foreign` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_parent_id` bigint UNSIGNED DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '1',
  `comment` mediumtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_order_id_foreign` (`order_id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `reviews_product_parent_id_foreign` (`product_parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2023-12-05 08:54:22', '2023-12-05 08:54:22'),
(2, 'manger', 'Manger', 'Manger', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(3, 'account_admin', 'Account Admin', 'Account Admin', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(4, 'office_admin', 'Office Admin', 'Office Admin', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(5, 'account_manger', 'Account Manger', 'Account Manger', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(6, 'office_manger', 'Office Manger', 'Office Manger', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(7, 'account', 'Account', 'Account', '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(8, 'office', 'Office', 'Office', '2023-12-05 08:54:23', '2023-12-05 08:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `icon` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `autoload` tinyint NOT NULL DEFAULT '0',
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `type`, `key`, `value`, `locale`, `autoload`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'setting', 'site_open', 'site_open', 'yes', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(2, 'setting', 'site_title', 'site_title', 'Systemira', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(3, 'setting', 'site_url', 'site_url', 'http://127.0.0.1:8000', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(4, 'setting', 'website_url', 'website_url', 'http://127.0.0.1:8000', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(5, 'setting', 'admin_url', 'admin_url', 'admin', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(6, 'setting', 'admin_language', 'admin_language', 'ar', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(7, 'setting', 'site_email', 'site_email', 'info@systemira.com', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(8, 'setting', 'site_phone', 'site_phone', '01029936932', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(9, 'setting', 'table_limit', 'table_limit', '100', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(10, 'setting', 'ssl_certificate', 'ssl_certificate', 'no', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(11, 'setting', 'logo_image', 'logo_image', '', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(12, 'social', 'facebook', 'facebook', 'https://www.facebook.com', 'en', 1, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(13, 'social', 'twitter', 'twitter', 'https://www.twitter.com', 'en', 1, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(14, 'social', 'youtube', 'youtube', 'https://youtube.com', 'en', 1, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(15, 'social', 'instagram', 'instagram', 'https://instagram.com', 'en', 1, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(16, 'social', 'whatsapp', 'whatsapp', '01029936932', 'en', 1, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(17, 'setting', 'user_type_debug', 'user_type_debug', 'super_admin,admin', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(18, 'setting', 'user_id_debug', 'user_id_debug', '1', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23'),
(19, 'setting', 'app_debug', 'app_debug', 'yes', 'en', 0, NULL, '2023-12-05 08:54:23', '2023-12-05 08:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `icon` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

DROP TABLE IF EXISTS `taggables`;
CREATE TABLE IF NOT EXISTS `taggables` (
  `tag_id` bigint UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`tag_id`,`taggable_id`,`taggable_type`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termables`
--

DROP TABLE IF EXISTS `termables`;
CREATE TABLE IF NOT EXISTS `termables` (
  `term_id` bigint UNSIGNED NOT NULL,
  `termable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termable_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`term_id`,`termable_id`,`termable_type`),
  KEY `termables_termable_type_termable_id_index` (`termable_type`,`termable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `order_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_first` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_last` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_active` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_expire` timestamp NULL DEFAULT NULL,
  `sms_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code_expire` timestamp NULL DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL,
  `group_id` bigint UNSIGNED DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polygon` mediumtext COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `active` tinyint NOT NULL DEFAULT '1',
  `vip` tinyint NOT NULL DEFAULT '0',
  `all_branch` tinyint NOT NULL DEFAULT '0',
  `is_message` tinyint NOT NULL DEFAULT '0',
  `is_notify` tinyint NOT NULL DEFAULT '0',
  `is_client` tinyint NOT NULL DEFAULT '0',
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `is_store` tinyint NOT NULL DEFAULT '0',
  `is_delivery` tinyint NOT NULL DEFAULT '0',
  `is_available` tinyint NOT NULL DEFAULT '0',
  `wallet` double NOT NULL DEFAULT '0',
  `point` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `name_first`, `name_last`, `email`, `password`, `email_verified_at`, `type`, `image`, `phone`, `last_active`, `remember_token`, `code`, `code_expire`, `sms_code`, `sms_code_expire`, `country_id`, `city_id`, `branch_id`, `address_id`, `group_id`, `latitude`, `longitude`, `polygon`, `birth_date`, `gender`, `locale`, `active`, `vip`, `all_branch`, `is_message`, `is_notify`, `is_client`, `is_admin`, `is_store`, `is_delivery`, `is_available`, `wallet`, `point`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mohamedelsherbiny', 'mohamedelsherbiny', 'mohamed', 'elsherbiny', 'mohamed.elsherbiny@systemira.com', '$2y$10$S4z2qmH4cZiBJTZcfLwFuuk2H8ZBdi.PWcG3v6jwwsLkE9thBcFku', NULL, 'super_admin', NULL, '01029936932', NULL, NULL, NULL, NULL, '130689', '2029-12-31 22:00:00', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'en', 1, 1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '2023-12-05 08:54:23', '2023-12-05 08:54:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `wallet` double NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `addition_product`
--
ALTER TABLE `addition_product`
  ADD CONSTRAINT `addition_product_addition_id_foreign` FOREIGN KEY (`addition_id`) REFERENCES `additions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addition_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_child_id_foreign` FOREIGN KEY (`product_child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item_additions`
--
ALTER TABLE `cart_item_additions`
  ADD CONSTRAINT `cart_item_additions_addition_id_foreign` FOREIGN KEY (`addition_id`) REFERENCES `additions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_additions_cart_item_id_foreign` FOREIGN KEY (`cart_item_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupon_group`
--
ALTER TABLE `coupon_group`
  ADD CONSTRAINT `coupon_group_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coupon_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `featureables`
--
ALTER TABLE `featureables`
  ADD CONSTRAINT `featureables_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_child_id_foreign` FOREIGN KEY (`product_child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item_additions`
--
ALTER TABLE `order_item_additions`
  ADD CONSTRAINT `order_item_additions_addition_id_foreign` FOREIGN KEY (`addition_id`) REFERENCES `additions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_additions_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_metas`
--
ALTER TABLE `order_metas`
  ADD CONSTRAINT `order_metas_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_metas`
--
ALTER TABLE `product_metas`
  ADD CONSTRAINT `product_metas_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_product_parent_id_foreign` FOREIGN KEY (`product_parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `termables`
--
ALTER TABLE `termables`
  ADD CONSTRAINT `termables_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
