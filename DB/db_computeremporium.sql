-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 05:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_computeremporium`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(8, 'Admin', 'admin@gmail.com', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `tracking_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(9, 'Power Supplies'),
(10, 'Fans'),
(11, 'Cases'),
(12, 'Mother Board'),
(13, 'Gaming Gear'),
(14, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(30) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(3, 'Ernakulam'),
(4, 'Kottayam'),
(6, 'Idukki'),
(11, 'Palakkad'),
(12, 'Thiruvananthapuram'),
(13, 'Kollam'),
(14, 'Alappuzha'),
(15, 'Pathanamthitta'),
(16, 'Thrissur'),
(17, 'Malappuram'),
(18, 'Kozhikode'),
(19, 'Wayanad'),
(20, 'Kannur'),
(21, 'Kasaragod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `place_pincode` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(1, 'kochi', 0, 3),
(2, 'Kattapana', 0, 6),
(6, 'Muvattupuzha', 0, 3),
(8, 'Thiruvalla', 0, 4),
(9, 'Palakkad', 0, 11),
(10, 'Kollam', 0, 13),
(11, 'Thiruvananthapuram', 0, 12),
(12, 'Alappuzha', 0, 14),
(13, 'Pathanamthitta', 0, 15),
(14, 'Thrissur', 0, 16),
(15, 'Malappuram', 0, 17),
(16, 'Kozhikode', 0, 18),
(17, 'Wayanad', 0, 19),
(18, 'Kannur', 0, 20),
(19, 'Kasargod', 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_photo` varchar(300) NOT NULL,
  `product_price` int(11) NOT NULL,
  `subCategory_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_desc`, `product_photo`, `product_price`, `subCategory_id`, `shop_id`) VALUES
(15, 'C550 Bronze', 'The C550 Bronze offers entry-level high-performance power for any gamer looking to start their PC gaming journey.\r\n\r\nUp to 88% efficiency at 50% load exceeds 80 Plus Bronze standards, reducing energy waste and heat.\r\nA 120mm fluid dynamic bearing fan delivers low-noise performance with enhanced longevity.\r\nDC-to-DC conversion ensures consistent power delivery to GPUs up to 220W, such as the RTX 3070.\r\nTested for safety at up to 40°C, and features over-temperature and over-current protections.\r\nMain PSU cables are nylon-sleeved for durability with a matte black finish to match any build.', 'br550.avif', 5999, 23, 25),
(16, 'C750 Bronze', 'The C750 Bronze offers entry-level high-performance power for any gamer looking to start their PC gaming journey.\r\n\r\nUp to 88% efficiency at 50% load exceeds 80 Plus Bronze standards, reducing energy waste and heat.\r\nA 120mm fluid dynamic bearing fan delivers low-noise performance with enhanced longevity.\r\nDC-to-DC conversion ensures consistent power delivery to GPUs up to 220W, such as the RTX 3070.\r\nTested for safety at up to 40°C, and features over-temperature and over-current protections.\r\nMain PSU cables are nylon-sleeved for durability with a matte black finish to match any build.', 'br750.avif', 7999, 23, 25),
(17, 'C1200 Gold ATX 3.1', 'Designed for maximum performance with minimal noise, NZXT C Series Gold ATX 3.1 PSUs are ready to fuel the demands of top-tier GPUs and CPUs.\r\n\r\nCompliant with the ATX 3.1 standard to fuel high-performance PC components with stability, efficiency, and power spike resistance.\r\nDurable, heat-resistant 12V-2x6 connector pumps up to 600 watts to NVIDIA® GeForce RTX™ 40 Series graphics cards.\r\n135mm fluid dynamic bearing fan with Zero Fan Mode is completely silent when under 50% load.\r\n100% premium Japanese capacitors improve hold-up time and minimal ripple noise, ensuring reliable and stable power delivery.', 'gl1200.avif', 11999, 24, 25),
(18, 'C1000 Gold ATX 3.1', 'Designed for maximum performance with minimal noise, NZXT C Series Gold ATX 3.1 PSUs are ready to fuel the demands of top-tier GPUs and CPUs.\r\n\r\nCompliant with the ATX 3.1 standard to fuel high-performance PC components with stability, efficiency, and power spike resistance.\r\nDurable, heat-resistant 12V-2x6 connector pumps up to 600 watts to NVIDIA® GeForce RTX™ 40 Series graphics cards.\r\n135mm fluid dynamic bearing fan with Zero Fan Mode is completely silent when under 50% load.\r\n100% premium Japanese capacitors improve hold-up time and minimal ripple noise, ensuring reliable and stable power delivery.', 'gl1000.avif', 10099, 24, 25),
(19, 'C1500 Platinum ATX 3.1', 'The NZXT C1500 Platinum PSU offers highly efficient, digitally-controlled power, ATX 3.1 compliance, and PCIe 5.1 connectivity with a high-performance magnetic levitation fan.\r\n\r\nDesigned with ATX 3.1 and PCIe 5.1 compliance to power current and future generations of high-performance GPUs and CPUs.\r\nIncludes two 16-pin 12V-2x6 PCIe 5.1 cables, each capable of delivering over 600 watts to power-hungry GPUs.\r\nDigital power enables precise voltage regulation, resulting in higher efficiency and lower ripple noise.\r\nExceeding 80 Plus Platinum standards, the 94% efficiency reduces power consumption for lower monthly bills and cooler, quieter operation.', 'pl1500.avif', 16999, 25, 25),
(20, 'H9 Elite', 'The H9 Elite is designed to show off every angle of your build with a tempered glass top panel and a built-in RGB & Fan Controller. The unique wraparound glass design with a dual-chamber layout is the perfect showcase for premium components.', 'h9.avif', 11999, 20, 25),
(21, 'H7', 'The H7 Elite is designed to show off every angle of your build with a tempered glass top panel and a built-in RGB & Fan Controller. The unique wraparound glass design with a dual-chamber layout is the perfect showcase for premium components.', 'h7.avif', 9999, 21, 25),
(22, 'H7 Flow', 'The H7 Elite is designed to show off every angle of your build with a tempered glass top panel and a built-in RGB & Fan Controller. The unique wraparound glass design with a dual-chamber layout is the perfect showcase for premium components.', '1712947394-h7-flow-rgb-hero-white.avif', 9999, 21, 25),
(24, 'H6 FLow', 'Experience peak performance within an innovative compact dual-chamber. Prioritizing GPU cooling, the H6 Flows panoramic glass showcases the interior while freeing up space for improved airflow.', 'h6fl.avif', 7000, 22, 25),
(26, 'N7 B650E', 'Leverage the full value of your Intel Ryzen™ 9000, 8000, and 7000 Series Processors with the AMD B650 chipset. The N7 B650E features upgraded compatibility as well as N7 favorites, such as digital RGB and fan control, Wi-Fi 6e, and more.', '1664351983-n7-b650e-black-hero.avif', 19299, 26, 25),
(27, 'N9 Z890', 'Leverage the full value of your AMD Ryzen™ 9000, 8000, and 7000 Series Processors with the AMD B650 chipset. The N7 B650E features upgraded compatibility as well as N7 favorites, such as digital RGB and fan control, Wi-Fi 6e, and more.', '1728396628-n9-z890-hero-front-angled-white.avif', 18999, 27, 25),
(28, 'Capsule Mini + Relay Headset', 'Bundle together and save 41% on the Capsule Mini microphone and Relay Headset.', '1727772519-mini-capsule-relay-headset-w.avif', 7999, 29, 25),
(29, 'Capsule', 'Bundle together and save 41% on the Capsule Mini microphone and Relay Headset.', '1673560297-peripherals_audio_capsule-mini_w_hero_png.avif', 5999, 29, 25),
(30, 'Function 2', 'Experience lightning-fast performance with the NZXT Function 2. Its high-speed, linear optical switches and 8,000 Hz polling rate eliminate lag, while hot-swappable switches allow for easy customization.\r\n\r\nNZXT Swift Optical Switches have a linear, lightweight feel with a 0.2 ms response time, 100-million key press guarantee, and 1 mm or 1.5 mm adjustable actuation.\r\n8,000 Hz polling rate transmits input signals 8x faster than most gaming keyboards, ensuring lightning-fast responsiveness.', '1707523165-function-2-hero-white.avif', 3999, 28, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_content` varchar(200) NOT NULL,
  `rating_datetime` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_password` varchar(50) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_status` int(11) NOT NULL DEFAULT 0,
  `shop_logo` varchar(300) NOT NULL,
  `shop_proof` varchar(300) NOT NULL,
  `shop_contact` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_email`, `shop_password`, `shop_address`, `place_id`, `shop_status`, `shop_logo`, `shop_proof`, `shop_contact`, `district_id`) VALUES
(25, 'Akshay', 'akshaysr855@gmail.com', 'Akshay@6677', 'jhvasvxuhh', 1, 1, '', '', '7894561235', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_qty`, `stock_date`, `product_id`, `shop_id`) VALUES
(4, 10, '2025-01-03', 15, 0),
(5, 10, '2025-01-03', 16, 0),
(6, 1, '2025-01-05', 17, 0),
(7, 3, '2025-01-05', 19, 0),
(8, 10, '2025-01-05', 20, 0),
(9, 1, '2025-01-05', 22, 0),
(10, 10, '2025-01-05', 24, 0),
(11, 2, '2025-01-05', 26, 0),
(12, 10, '2025-01-05', 27, 0),
(13, 10, '2025-01-05', 28, 0),
(14, 10, '2025-01-05', 29, 0),
(15, 1, '2025-01-05', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subCategory_id` int(11) NOT NULL,
  `subCategory_name` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subCategory_id`, `subCategory_name`, `category_id`) VALUES
(17, 'RGB', 10),
(18, 'Quiet Airflow', 10),
(19, 'Static Pressure', 10),
(20, 'H9 Series', 11),
(21, 'H7 Series', 11),
(22, 'H6 Series', 11),
(23, 'Bronze', 9),
(24, 'Gold', 9),
(25, 'Platinum', 9),
(26, 'Intel', 12),
(27, 'AMD', 12),
(28, 'Keyboard', 13),
(29, 'Audio', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_address`, `user_password`, `place_id`, `user_number`) VALUES
(25, 'Akshai ', 'akshai@gmail.com', 'asd', 'Akshai@123', 1, '9946656696');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subCategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
