-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 02:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voyager`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_desc`) VALUES
(1, '2 Camere99999', 'Apartamente si case care includ 2 camere'),
(3, '2 room', 'Apartamente si case care includ 2 camere'),
(4, 'Birourii', 'Spatiu comercial pentru birouri'),
(5, 'Spatiu Comercial', 'Spatiu Comercial'),
(6, 'SpaÅ£ii industriale', 'SpaÅ£ii industriale');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `description` text,
  `name` varchar(255) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `featured` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `caption`, `alt_text`, `description`, `name`, `post_id`, `featured`) VALUES
(1, 'titlu', 'caption', 'alt text', 'description', 'slider-011.png', 0, '27-_large_image_2.jpg'),
(2, 'titlu', 'caption', 'alt text', 'description', 'slider-022.png', 0, '27-_large_image_2.jpg'),
(3, 'titlu', 'caption', 'alt text', 'description', 'slider-033.png', 0, '27-_large_image_2.jpg'),
(4, 'titlesasasa', 'caption2', 'This is a image', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg', 22, '27-_large_image_2.jpg'),
(5, 'titlesasasa', 'caption2', 'This is a image', 'description', '59422474_2132763283468540_3192819159599677440_o.png', 22, '27-_large_image_2.jpg'),
(6, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg', 22, '27-_large_image_2.jpg'),
(7, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', '59422474_2132763283468540_3192819159599677440_o.png', 22, '27-_large_image_2.jpg'),
(8, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', 'banner-01.png', 22, '27-_large_image_2.jpg'),
(9, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg', 22, '27-_large_image_2.jpg'),
(10, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', '59422474_2132763283468540_3192819159599677440_o.png', 22, '27-_large_image_2.jpg'),
(11, 'titlesasasa', 'Legenda', 'alt textsasasa', 'description', 'banner-01.png', 22, '27-_large_image_2.jpg'),
(12, 'app property 14 50', 'caption2', 'This is a image', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg', 22, '27-_large_image_2.jpg'),
(13, 'app property 14 50', 'caption2', 'This is a image', 'description', '59422474_2132763283468540_3192819159599677440_o.png', 22, '27-_large_image_2.jpg'),
(14, 'app property 14 50', 'caption2', 'This is a image', 'description', 'banner-08.png', 22, '27-_large_image_2.jpg'),
(15, 'app property 14 50', 'caption2', 'This is a image', 'description', 'banner-big-sale.png', 22, '27-_large_image_2.jpg'),
(16, 'app property 14 50', 'caption2', 'This is a image', 'description', 'bg.jpg', 22, '27-_large_image_2.jpg'),
(17, 'app property 14 50', 'caption2', 'This is a image', 'description', 'category-wall-01.png', 22, '27-_large_image_2.jpg'),
(18, '', '', '', '', 'Array', 22, '27-_large_image_2.jpg'),
(19, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 22, '27-_large_image_2.jpg'),
(20, 'Testting fullccccc', 'Legenda', 'This is a image', 'description', 'slider-011.png,slider-022.png,slider-033.png,template-1599667.png', 22, '27-_large_image_2.jpg'),
(21, '', '', '', '', '', 22, '27-_large_image_2.jpg'),
(22, '', '', '', '', '', 22, '27-_large_image_2.jpg'),
(23, '', '', '', '', '', 22, '27-_large_image_2.jpg'),
(24, 'titlesasasa', 'caption2', 'This is a image', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 23, '27-_large_image_2.jpg'),
(25, '', '', '', '', '', 23, '27-_large_image_2.jpg'),
(26, 'titlesasasa', 'caption2', 'alt textsasasa', 'description', 'slider-011.png,slider-022.png,slider-033.png', 25, '27-_large_image_2.jpg'),
(27, 'titlesasasa', 'caption2', 'This is a image', 'description', '', 26, '27-_large_image_2.jpg'),
(28, 'titlesasasa', 'caption2', 'This is a image', 'description', '', 26, '27-_large_image_2.jpg'),
(29, 'titlesasasa', 'caption2', 'This is a image', 'description', '_large_image_1.jpg', 27, '27-_large_image_2.jpg'),
(30, 'titlesasasa', 'caption2', 'This is a image', 'description', '_large_image_1.jpg', 27, '27-_large_image_2.jpg'),
(31, 'titlesasasa', 'caption2', 'This is a image', 'description', '_large_image_1.jpg', 27, '27-_large_image_2.jpg'),
(32, 'Testting fullccccc', 'Legenda', 'alt textsasasa', 'description', '_large_image_1.jpg,image_1.jpg,image_2.jpg,image_3.jpg,image_4.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(33, 'Testting fullccccc', 'Legenda', 'alt textsasasa', 'description', '_large_image_1.jpg,image_1.jpg,image_2.jpg,image_3.jpg,image_4.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(34, '', '', '', '', '_large_image_1.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(35, '', '', '', '', '_large_image_1.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(36, '', '', '', '', '_large_image_1.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(37, '', '', '', '', '_large_image_1.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(38, '', '', '', '', '', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(39, '', '', '', '', '', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(40, '', '', '', '', 'mountains-4369251.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(41, '', '', '', '', 'mountains-4369251.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(42, '', '', '', '', 'mountains-4369251.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(43, 'titlesasasa', 'caption2', 'This is a image', 'description', 'mountains-4369251.jpg', 28, '28-Algorithms and Data Structures - Niklaus Wirth.pdf'),
(44, '', '', '', '', 'mountains-4369251.jpg', 28, NULL),
(45, '', '', '', '', 'mountains-4369251.jpg', 28, NULL),
(46, 'Banner 08sasasasa', 'caption2', 'This is a image', 'description', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, '30-mountains-4369251.jpg'),
(47, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg', 30, '30-mountains-4369251.jpg'),
(48, '', '', '', '', 'profile_pic.jpg,profule_pic.jpg', 30, '30-mountains-4369251.jpg'),
(49, '', '', '', '', 'profile_pic.jpg,profule_pic.jpg', 30, '30-mountains-4369251.jpg'),
(50, '', '', '', '', 'profile_pic.jpg,profule_pic.jpg', 30, '30-mountains-4369251.jpg'),
(51, '', '', '', '', 'profile_pic.jpg,profule_pic.jpg', 30, '30-mountains-4369251.jpg'),
(52, '', '', '', '', 'mountains-4369251.jpg', 30, '30-mountains-4369251.jpg'),
(53, '', '', '', '', 'profile_pic.jpg', 30, '30-mountains-4369251.jpg'),
(54, '', '', '', '', 'profile_pic.jpg', 30, '30-mountains-4369251.jpg'),
(55, '', '', '', '', 'profile_pic.jpg', 30, '30-mountains-4369251.jpg'),
(56, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, '30-mountains-4369251.jpg'),
(57, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, '30-mountains-4369251.jpg'),
(58, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, '30-mountains-4369251.jpg'),
(59, '', '', '', '', 'banner-01.png', 30, NULL),
(60, '', '', '', '', 'banner-01.png', 30, NULL),
(61, '', '', '', '', 'banner-01.png', 30, NULL),
(62, '', '', '', '', 'banner-01.png', 30, NULL),
(63, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, NULL),
(64, '', '', '', '', '56656079_2406517249359281_6562977780844199936_n.jpg,59422474_2132763283468540_3192819159599677440_o.png,banner-01.png', 30, NULL),
(65, '', '', '', '', 'LIST-1.png', 31, '31-image-1.jpg'),
(66, 'Banner 08sasasasa', 'Legenda', 'This is a image', 'description', 'template-1599667.png', 31, '31-image-1.jpg'),
(67, '16 00', 'caption2', 'This is a image', 'description', 'images-3.jpg,images-4 copy.jpg,images-4.jpg', 31, '31-image-1.jpg'),
(68, '16 05', 'caption2', 'This is a image', 'description', 'netgear.JPG,slide_1.jpg,slide_2.jpg,slide_3.jpg', 32, '32-images-41.jpg'),
(69, '', '', '', '', 'images-31.jpg', 32, NULL),
(70, '16 20', 'caption2', 'This is a image', 'description', 'images-10.jpg,images-11 copy.jpg,images-11.jpg', 35, '35-images-13.jpg'),
(71, '16 55', 'asdsd', 'sadsad', 'dsadsad', 'images-1.jpg', 36, '36-images-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(33) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_featured` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photo`, `caption`, `type`, `size`, `alt_text`, `post_id`, `user_id`, `is_featured`) VALUES
(1, '14slider-022.png', NULL, 'image/png', 219816, 'This is a image alt', NULL, 14, NULL),
(2, '1414slider-022.png', NULL, 'image/png', 218000, 'This is a image alt', NULL, 14, NULL),
(3, '14slider-022.png', NULL, 'image/jpeg', 77148, 'This is a image alt', NULL, 14, NULL),
(5, 'images-4.jpg', NULL, 'image/jpeg', 23270, NULL, NULL, 0, NULL),
(6, 'test', NULL, 'image/jpeg', 64136, '', NULL, 14, NULL),
(7, '14images-4.jpg', '14images-4.jpg', 'image/jpeg', 23270, NULL, NULL, 14, NULL),
(8, '14images-22.jpg', '14images-22.jpg', 'image/jpeg', 21133, NULL, NULL, 14, NULL),
(9, '14girlincar.jpg', '14girlincar.jpg', 'image/jpeg', 588765, NULL, NULL, 14, NULL),
(10, '14guitar.jpg', '14guitar.jpg', 'image/jpeg', 409715, NULL, NULL, 14, NULL),
(11, '14hearthand.jpg', '14hearthand.jpg', 'image/jpeg', 274586, NULL, NULL, 14, NULL),
(12, '14ipad.png', '14ipad.png', 'image/png', 486613, NULL, NULL, 14, NULL),
(13, '14iphone-1.png', '14iphone-1.png', 'image/png', 170633, NULL, NULL, 14, NULL),
(14, '14lady-guitar.jpg', '14lady-guitar.jpg', 'image/jpeg', 658084, NULL, NULL, 14, NULL),
(15, '14macbook-2.png', '14macbook-2.png', 'image/png', 1137994, NULL, 39, 14, NULL),
(16, '14mic.jpg', '14mic.jpg', 'image/jpeg', 477837, NULL, 39, 14, NULL),
(17, '14programming.jpg', '14programming.jpg', 'image/jpeg', 729313, NULL, 39, 14, NULL),
(18, '14spiderweb.jpg', '14spiderweb.jpg', 'image/jpeg', 312429, NULL, 39, 14, NULL),
(19, '14logo.png', '14logo.png', 'image/png', 3621, NULL, 40, 14, NULL),
(20, '14stars.jpg', '14stars.jpg', 'image/jpeg', 2239524, NULL, 40, 14, NULL),
(21, '14woman-camera.jpg', '14woman-camera.jpg', 'image/jpeg', 935393, NULL, 40, 14, NULL),
(22, '14banjo.jpg', '14banjo.jpg', 'image/jpeg', 707578, NULL, 40, 14, NULL),
(23, '14brad-elvis.png', '14brad-elvis.png', 'image/png', 600586, NULL, 40, 14, NULL),
(24, '14chalkboard.jpg', '14chalkboard.jpg', 'image/jpeg', 904410, NULL, 40, 14, NULL),
(25, '14concert.jpg', '14concert.jpg', 'image/jpeg', 175230, NULL, 41, 14, NULL),
(26, '14girlincar.jpg', '14girlincar.jpg', 'image/jpeg', 588765, NULL, 41, 14, NULL),
(27, '14guitar.jpg', '14guitar.jpg', 'image/jpeg', 409715, NULL, 41, 14, NULL),
(28, '14hearthand.jpg', '14hearthand.jpg', 'image/jpeg', 274586, NULL, 41, 14, 'yes'),
(29, '14spiderweb.jpg', '14spiderweb.jpg', 'image/jpeg', 312429, NULL, 42, 14, NULL),
(30, '14stage.jpg', '14stage.jpg', 'image/jpeg', 1775358, NULL, 42, 14, NULL),
(91, '141.png', '141.png', 'image/png', 684882, NULL, 48, 14, NULL),
(92, '142.png', '142.png', 'image/png', 669979, NULL, 48, 14, NULL),
(96, '14product-image-269035310_grande.jpg', '14banner1.png', 'image/png', 622020, NULL, 48, 14, 'yes'),
(99, '14mini-banner3.png', '14mini-banner3.png', 'image/png', 435197, NULL, 48, 14, NULL),
(100, '14mini-banner1.png', '14mini-banner1.png', 'image/png', 210473, NULL, 49, 14, NULL),
(101, '14mini-banner2.png', '14mini-banner2.png', 'image/png', 698333, NULL, 49, 14, 'yes'),
(102, '14SplitShire_IMG_4788-1-1024x683.jpg', '14SplitShire_IMG_4788-1-1024x683.jpg', 'image/jpeg', 120794, NULL, 50, 14, NULL),
(103, '14StockSnap_9EBTRPN0IA.jpg', '14StockSnap_9EBTRPN0IA.jpg', 'image/jpeg', 1301401, NULL, 50, 14, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `expiration` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `rooms` tinyint(4) DEFAULT NULL,
  `partitions` varchar(255) DEFAULT NULL,
  `comfort` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `surface` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `commission` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `construction_year` varchar(255) DEFAULT NULL,
  `total_floors` varchar(255) DEFAULT NULL,
  `description` text,
  `contact_number` int(15) DEFAULT NULL,
  `orientation` varchar(255) DEFAULT NULL,
  `bathrooms` tinyint(4) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `field_type` varchar(255) DEFAULT NULL,
  `field_classification` varchar(255) DEFAULT NULL,
  `commercial_space` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `category_id`, `date_created`, `expiration`, `type`, `transaction`, `title`, `rooms`, `partitions`, `comfort`, `floor`, `surface`, `price`, `commission`, `address`, `construction_year`, `total_floors`, `description`, `contact_number`, `orientation`, `bathrooms`, `options`, `field_type`, `field_classification`, `commercial_space`) VALUES
(1, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(2, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', 'Banner 08sasasasa', 1, 'decomandat', 'lux', 'masarda', '11', '30', '13', 'Bd 1Decembrie', '1941-1977', '12', 'test', 749257545, 'east', 3, '', 'test', 'test', 'test'),
(3, 7, NULL, '0000-00-00', '1570802187', 'spatiu comercial', 'rent', 'titlesasasa', 2, 'nedecomandat', '2', 'masarda', '11', '30', '13', 'Strada StÃ¢njeneilor, 13', 'mai vechi de 1941', '12', 'test', 731832488, 'east', 3, '', 'test', 'test', 'test'),
(4, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(5, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(6, NULL, NULL, NULL, '1570802187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(7, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(8, NULL, NULL, NULL, '1570802187', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(9, NULL, NULL, '0000-00-00', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(10, NULL, NULL, '2019-08-07', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(11, NULL, NULL, '2019-08-07', '1570802187', 'apartament', 'rent', '', 1, 'decomandat', '1', 'parter', '', '0', '', '', 'mai nou de 2000', '', '', 0, '', 1, '', '', '', ''),
(12, 14, NULL, NULL, '1570802187', 'apartament', NULL, 'Property 14 53', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 14, NULL, NULL, '1570802187', 'teren', NULL, '14 54', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, NULL, NULL, '1570802187', 'apartament', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 14, NULL, NULL, '1570802187', 'casa', NULL, 'Testting fullllllllll', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 14, NULL, NULL, '1570802187', 'casa', NULL, 'Testting fullllllllll', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 14, NULL, NULL, '1570802187', 'casa', NULL, 'Testting fullllllllll', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 14, NULL, NULL, '1570802187', 'teren', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 14, NULL, NULL, '1570802187', 'teren', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'sp commercial', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Spatiu Commercial 16 55', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'property 07 29', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 14, NULL, NULL, '1570802187', 'apartament', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Testting fullccccc', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Testting fullccccc', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'titlesasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 14, NULL, NULL, '1570802187', 'spatiu comercial', NULL, 'Banner 08sasasasa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 14, NULL, '2019-08-12', '1570802187', 'spatiu comercial', 'rent', '16 09', 3, 'partial compartimentat', NULL, '2', '10000', '30', '13', NULL, 'mai vechi de 1941', NULL, 'description', 731832488, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 14, NULL, '2019-08-12', '1570802187', 'spatiu comercial', 'sale', '16 15', 1, 'open space', NULL, '1', '10000', '30.000', '13', NULL, 'mai nou de 2000', NULL, 'description', 731832488, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 14, NULL, '2019-08-12', '1570802187', 'spatiu comercial', 'rent', 'titlesasasa', 1, 'open space', NULL, '1', '10000', '30.000', '13', NULL, 'mai nou de 2000', NULL, 'description', 731832488, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 14, NULL, '2019-08-12', '1570802187', 'spatiu comercial', 'rent', 'titlesasasa', 2, 'flexibil', NULL, '3', '11', '111111', '13', NULL, '1990-2000', NULL, 'description', 731832488, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 14, 1, '2019-08-12', '1568210460', 'spatiu comercial', 'rent', '', 1, 'open space', NULL, '1', '', '', '', NULL, 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 14, 1, '2019-08-12', '1566483056', 'spatiu comercial', 'rent', 'titlesasasa', 1, 'open space', NULL, '1', '', '', '', NULL, 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 14, 1, '2019-08-12', '1566483277', 'spatiu comercial', 'rent', 'Banner 08sasasasa', 1, 'open space', NULL, '1', '', '', '', NULL, 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 14, 1, '2019-08-12', '1566483329', 'spatiu comercial', 'rent', '', 1, 'open space', NULL, '1', '', '', '', NULL, 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 14, 3, '2019-08-12', '1566483342', 'spatiu comercial', 'rent', '', 1, 'open space', NULL, '1', '', '', '', NULL, 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 14, NULL, NULL, '', 'apartament', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 14, 5, '2019-08-13', '1566559649', 'spatiu comercial', 'rent', '14 03', 2, 'compartimentat', NULL, '4', '1000022', '30.00033', '13', NULL, '1990-2000', NULL, 'description', 731832488, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 14, 0, '2019-08-13', '1570802187', 'spatiu comercial', 'rent', 'Adress test', 1, 'open space', NULL, '1', '11', '', '', 'strada stanjeneilor 4 sinaia', 'mai nou de 2000', NULL, '', 749257545, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 14, 0, '2019-08-13', '1566562759', 'spatiu comercial', 'rent', '', 1, 'open space', NULL, '1', '', '', '', '', 'mai nou de 2000', NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `validation_code` text,
  `active` tinyint(4) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `role`, `user_image`, `bio`, `username`, `password`, `validation_code`, `active`, `date_created`, `phone_number`, `interests`, `birthday`) VALUES
(1, 'Lapos', 'Alexandruvsasa', 'lapos.alexgabriel@gmail.com', 'admin', 'Fallenfal-59422474_2132763283468540_3192819159599677440_o.png', 'This is a demo bio\r\n\r\n5', 'Fallenfal33', '67f62413663b89ea025a35d9915f8a76ffe959c5', '0', 1, '0000-00-00', '7318324880', '', '2018-12-26'),
(4, 'Lapos', 'Alexa', 'test@gmail.com', 'broker', 'ninja100-56656079_2406517249359281_6562977780844199936_n.jpg', '', 'ninja100', '9f5d0c6d315cc4f543c374d46aa3803890961f92', '0', 1, NULL, '', '', '2018-12-26'),
(6, 'Lapos', 'Alexandru', 'sa@sd.com', 'client', NULL, '', 'aaaqqq', '4de4d95fc854e7883bec112a191c867c0678ca42', 'da60342f82a3c3d0ada3b66ee9c7bd898334c950', 0, NULL, '', '', '0000-00-00'),
(7, 'dsds', 'dsdsd', 'sqs@gg.com', 'client', NULL, NULL, 'dsdsd', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'ef84f454abc7d181c80b3860bf8abdbb8e74e7bc', 0, NULL, NULL, NULL, NULL),
(8, 'dasds', 'dsads', 'asasa@dsssd.com', 'client', NULL, NULL, 'fasf', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '9ed8fa2943585cb7cf637e2f1e475554b11e7650', 0, NULL, NULL, NULL, NULL),
(9, 'fsfsefsefse', 'fsefsef', 'adwdawdaw@fdggdfgh', 'client', NULL, NULL, 'sefesfse', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'd33a78babfbd33461e5815989024672a34c1ee23', 0, NULL, NULL, NULL, NULL),
(12, 'Lapos', 'Alex', 'asasa@re', 'client', 'Alexandru-', 'This is a bio descpription of the user', 'Alexandru', '55ba32eb8f33850c911d178404f6f9b523314965', '0', 1, '0000-00-00', '0731832488', '2 camere', '1988-09-06'),
(14, 'Lapos', 'Alexandru', 'lapos.alex88@gmail.com', 'admin', NULL, NULL, 'ninja10000', '640fb06193d8f2177c0fbf84f172dc686d33dd00', '0', 1, NULL, NULL, NULL, NULL),
(15, 'Lapos', 'Alexandru', 'tessst@gmail.com', 'client', NULL, NULL, 'ninja10000000', '640fb06193d8f2177c0fbf84f172dc686d33dd00', '230b8d37f5b0f53007f16a3fdbe611a44c455cf7', 0, '2019-07-23', NULL, NULL, NULL),
(16, 'Lapos', 'Alexandru', '', '', '59422474_2132763283468540_3192819159599677440_o.png', '', 'jawron100', 'qwerty', '', 0, '0000-00-00', '', '', '0000-00-00'),
(29, 'Lapos', 'mumu', 'date@date.com', 'client', 'date-new-59422474_2132763283468540_3192819159599677440_o.png', 'date example', 'date-new', '598b7719f69e72c53cf8d207cbe86371dbdfd17e', '0', 1, '2019-07-26', '', 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', '0000-00-00'),
(30, 'lapos', 'new user', '', 'client', 'ninj989898-56656079_2406517249359281_6562977780844199936_n.jpg', '', 'ninj989898', '640fb06193d8f2177c0fbf84f172dc686d33dd00', '', 0, NULL, '', '', '0000-00-00'),
(32, 'Lapos', 'Alexandru', 'work.alexgabriel@gmail.com', 'client', NULL, NULL, 'WORK', '640fb06193d8f2177c0fbf84f172dc686d33dd00', '0', 1, '2019-08-06', NULL, NULL, NULL),
(33, 'Lapos', 'Alexandru', '', '', NULL, '', 'dadawd', 'spider', '', 0, NULL, '', NULL, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
