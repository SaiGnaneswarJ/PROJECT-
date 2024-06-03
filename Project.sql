-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 11:14 AM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cust_name`, `email`, `mobile`, `address`, `age`, `gender`, `username`, `password`) VALUES
(2, 'Sai Gnaneswar', 'saignaneswar@gmail.com', '8919110988', 'Hyderabad', 26, 'Male', 'Sai1804', 'Sai@1804'),
(16, 'Arun', 'arun@gmail.com', '8974532541', 'Tirupati', 30, 'male', 'Arun30', 'Arun@30'),
(17, 'Tharun', 'tharun@gmail.com', '8974565489', 'Banglore', 26, 'male', 'Tharun28', 'Tharun@28'),
(18, 'Gayatri', 'gayatri@gmail.com', '9568432561', 'Banglore', 31, 'female', 'Gayatri31', 'Gayatri@31'),
(19, 'Yaswanth', 'yaswanth@gmail.com', '8919110988', 'Hyderabad', 24, 'male', 'yaswanthg', 'Kspl@1234');

-- --------------------------------------------------------

--
-- Table structure for table `Logindata`
--

CREATE TABLE `Logindata` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Logindata`
--

INSERT INTO `Logindata` (`id`, `username`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'Gana1804', 'Gnaneswar', 'Jalari', 'gnaneswar@gmail.com', 'Gana@123'),
(3, 'Harish1204', 'Harish', 'Chowdary', 'harish@gmail.com', 'Harish@1204'),
(4, 'Hemanth20', 'Hemanth', 'Kumar', 'hemanth@gmail.com', 'Hemanth@20'),
(7, 'Jayanth24', 'Jayanth', 'Kumar', 'jayanth@gmail.com', 'Jay@24'),
(8, 'Jayaram1254', 'Jayaram', 'Chowdary', 'jayaram@gmail.com', 'Jayaram@1254');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `skucode` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `product_name`, `skucode`, `price`, `total_price`) VALUES
(1, 1000000002, 3, 'Chair', 'CHR-00123', '800', '800'),
(2, 1000000002, 4, 'Table Fan', 'FAN-12546', '1989', '1989'),
(3, 1000000003, 3, 'Chair', 'CHR-00123', '800', '800'),
(4, 1000000004, 13, 'Bottle', 'BOT-36925', '599', '599'),
(5, 1000000005, 16, 'LED BULB', 'LED-00015', '699', '699'),
(6, 1000000006, 13, 'Bottle', 'BOT-36925', '599', '599'),
(7, 1000000007, 3, 'Chair', 'CHR-00123', '800', '800'),
(8, 1000000008, 7, 'Table Fan', 'TABFAN-012453', '2199', '2199'),
(9, 1000000008, 7, 'Table Fan', 'TABFAN-012453', '2199', '2199');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `shippingMethod` varchar(50) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `street`, `country`, `state`, `city`, `pincode`, `mobile`, `shippingMethod`, `paymentMethod`) VALUES
(1000000002, 2, 'gnaneswar', 'saignaneswar@gmail.com', 'street1,sknagar', 'India', 'Andhra pradesh', 'chittoor', '517130', '8919110988', 'FreeDelivery', 'COD'),
(1000000003, 16, 'harish', 'harish@gmail.com', 'patrikanagar,hitech city', 'India', 'Telengana', 'Hyderabad', '500081', '8974565489', 'FreeDelivery', 'COD'),
(1000000004, 16, 'aravindh', 'aravindh@gmail.com', 'krpuram', 'India', 'Telengana', 'Hyderabad', '500018', '8745765874', 'FedEx', 'CheckCashOrder'),
(1000000005, 16, 'yeswanth', 'yeswanth@gmail.com', 'durgamcheruvu', 'India', 'Telengana', 'Hyderabad', '500081', '8949587498', 'FreeDelivery', 'COD'),
(1000000006, 2, 'karthik', 'karthik@gmail.com', 'hv colony', 'India', 'Andhra pradesh', 'Tirupati', '517153', '8889547894', 'FreeDelivery', 'COD'),
(1000000007, 2, 'harish', 'saignaneswar@gmail.com', 'street1,sknagar', 'United Kingdom', 'New York', 'chittoor', '517101', '8889547894', 'FedEx', 'COD'),
(1000000008, 2, 'harsha', 'harsha@gmail.com', 'rv village', 'India', 'Andhra pradesh', 'tirupati', '517101', '8889547894', 'FedEx', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `method`) VALUES
(1, 'cash on delivery'),
(2, 'check/moneyorder'),
(5, 'paytm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `skucode` varchar(100) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `skucode`, `pro_name`, `price`, `image`) VALUES
(2, 'TAB-00001', 'Table', '1522', 'table.jpeg'),
(3, 'CHR-00123', 'Chair', '800', 'chair1.jpeg'),
(4, 'FAN-12546', 'Table Fan', '1989', 'tablefan.jpeg'),
(7, 'TABFAN-012453', 'Table Fan', '2199', 'tablefan1.jpeg'),
(8, 'BAG-11223', 'Bag', '699', 'bag.jpeg'),
(9, 'BAG-001452', 'Traveling Bag', '1199', 'bagimage.jpeg'),
(10, 'CHR-14524', 'Wooden Chair', '859', 'chair.jpg'),
(11, 'TAB-12345', 'Table', '1239', 'table2.jpg'),
(12, 'KEY-01278', 'Keyboard', '799', 'keyboard.jpg'),
(13, 'BOT-36925', 'Bottle', '599', 'bottle.jpg'),
(14, 'BOT-12456', 'BOTTLE', '899', 'bottle1.jpg'),
(15, 'LED-00012', 'Led Bulb', '299', 'led.jpg'),
(16, 'LED-00015', 'LED BULB', '699', 'led1.jpeg'),
(17, 'KE-001', 'KETTLE', '326', 'Butterfly-Electric-Kettle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int NOT NULL,
  `shippingmethod` varchar(100) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `shippingmethod`, `price`) VALUES
(1, 'fedex', 100),
(2, 'freedelivery', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Logindata`
--
ALTER TABLE `Logindata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_KEY` (`username`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key` (`order_id`),
  ADD KEY `product_foreignkey` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_FOREIGN_KEY` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueKey` (`skucode`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Logindata`
--
ALTER TABLE `Logindata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000009;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `Foreign_key` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_foreignkey` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `USER_FOREIGN_KEY` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
