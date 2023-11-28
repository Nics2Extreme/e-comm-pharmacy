-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 02:02 PM
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
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandID` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandID`, `brandName`, `brandImage`) VALUES
(7, 'The Generics Pharmacy', 'images/tgp.jpg'),
(8, '2RA\'s Pharmacy', 'images/2ra.jpg'),
(9, 'KSN Pharmacy', 'images/site_logo.jpg'),
(10, 'Live More Drug Store', 'images/site_logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `catTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `catTitle`) VALUES
(12, 'Over-the-Counter Medicines'),
(13, 'Antibiotics'),
(14, 'Vitamins'),
(15, 'Milk, Water & Energy Drinks'),
(16, 'Cosmetics/Beauty Supplements'),
(17, 'First Aid');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientID` int(11) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `clientJob` varchar(255) NOT NULL,
  `clientMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientID`, `clientName`, `clientJob`, `clientMessage`) VALUES
(1, 'Chiko Mutandwa', 'CEO of Havenly Beds', 'We try to give our customers the best service at a reasonable prices. When the customer is happy we at Havenly Beds are happy too.'),
(2, 'Ndai Sturrman', '', 'I am in love with Havenly Beds mattresses and their pillows. Beutiful and stunning!'),
(3, 'Elina Mutale', '', 'Havenly Beds products are for any modern home. Its good quality and eye catching'),
(4, 'Daliso Kabwe', '', 'Quality, durability and very stylish! The Bed Set, Pillows and Mattress Protectors still look BRAND NEW!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `inf`
--

CREATE TABLE `inf` (
  `n_id` int(11) NOT NULL,
  `notifications_name` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inf`
--

INSERT INTO `inf` (`n_id`, `notifications_name`, `message`, `active`) VALUES
(3, 'Order Completed', 'Your order has been successfully completed!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `dropoff` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customerName`, `contact`, `dropoff`, `ref`, `status`, `order_date`) VALUES
(1, 'Jhonsen Nicandro', '09983237481', '4', '', 'Confirmed', '2023-11-26 05:54:41'),
(2, 'Haruno Gio', '992323748', '14', '', 'Confirmed', '2023-11-28 12:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_name`, `quantity`, `price`) VALUES
(1, 1, 'Paracetamol Biogesic 500mg', 2, 9.25),
(2, 1, 'Advil Ibuprofen 200mg', 1, 8.75),
(3, 2, 'Paracetamol Biogesic 500mg', 1, 9.25),
(4, 2, 'Tuseran Forte 15mg', 1, 12.25);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productTitle` varchar(255) NOT NULL,
  `productCategoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `productPrice` decimal(8,2) NOT NULL,
  `productPriceDiscount` decimal(8,2) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `productShortDescription` text NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productSection` varchar(255) NOT NULL,
  `productAvailability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productCategoryID`, `brandID`, `productPrice`, `productPriceDiscount`, `productImage`, `productDescription`, `productShortDescription`, `productQuantity`, `productSection`, `productAvailability`) VALUES
(51, 'Paracetamol Biogesic 500mg', 12, 10, 10.00, 9.25, 'images/biogesic.jpg', '', '', 100, 'featured', 'In Stock'),
(52, 'Advil Ibuprofen 200mg', 12, 9, 9.00, 8.75, 'images/advil.jpg', '', '', 100, 'featured', 'In Stock'),
(53, 'Tuseran Forte 15mg', 12, 9, 14.00, 12.25, 'images/tuseran.jpg', '', '', 100, 'new', 'In Stock'),
(54, 'Co-Amoxiclav 625mg', 13, 9, 45.00, 41.00, 'images/co-amoxiclav.jpg', '', '', 100, 'featured', 'In Stock'),
(55, 'Amoxicillin 500mg', 13, 9, 10.00, 8.00, 'images/amoxicilin.jpg', '', '', 100, 'featured', 'In Stock'),
(57, 'Cefalexin 125mg/5 mL Oral Suspension 60 mL', 13, 8, 190.00, 186.00, 'images/cefalexin.jpg', 'Prescription Requiered', '', 100, 'new', 'In Stock'),
(58, 'RITEMED Vitamin B1 + Vitamin B6 + Vitamin + B12 1 Tablet ', 14, 9, 8.00, 5.25, 'images/ritemed_vitamin.jpg', '', '', 100, 'new', 'In Stock'),
(59, 'NEUROGEN Vitamin B Complex + Vitamin E 1 Tablet', 14, 9, 25.00, 20.50, 'images/neurogen.png', '', '', 100, 'bestseller', 'In Stock'),
(60, 'PHAREX Vitamin B1 + B6 +B12 Complex 1 Tablet', 14, 8, 8.00, 6.00, 'images/pharex.png', '', '', 100, 'bestseller', 'In Stock'),
(61, 'FERN C 500mg/1000 IU/ 10mg 1 Capsule', 14, 7, 15.00, 12.00, 'images/fern-c.png', '', '', 100, 'bestseller', 'In Stock'),
(62, 'NAN OptiPro Three Milk Supplement for Children 12-36 Months 900g', 15, 7, 1200.00, 1102.75, 'images/nan_pro.jpg', '', '', 100, 'featured3', 'In Stock'),
(63, 'BENZAC Benzoyl Peroxide Spots Treatment gel 5 50mgg 15g', 16, 9, 450.00, 478.75, 'images/benzac.jpg', '', '', 100, 'featured3', 'In Stock'),
(64, 'CLEENE Ethlyl Alcohol 70 solution 500ml', 17, 8, 100.00, 91.20, 'images/cleene.jpg', '', '', 100, 'featured3', 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `sliderone`
--

CREATE TABLE `sliderone` (
  `sliderone` int(11) NOT NULL,
  `slidername` varchar(255) NOT NULL,
  `sliderurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliderone`
--

INSERT INTO `sliderone` (`sliderone`, `slidername`, `sliderurl`) VALUES
(4, 'sale', 'images/banner1.jpg'),
(5, 'boost', 'images/banner2.jpg'),
(6, 'comfort', 'images/banner5.jpg'),
(7, 'salenow', 'images/banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` int(10) NOT NULL,
  `accountType` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `contact`, `accountType`, `email`, `password`) VALUES
(3, 'sam_admin', 285645393, 'admin', 'sam@gmail.com', '123456789'),
(4, 'sam_user', 285645393, 'user', 'sam@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `inf`
--
ALTER TABLE `inf`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `sliderone`
--
ALTER TABLE `sliderone`
  ADD PRIMARY KEY (`sliderone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inf`
--
ALTER TABLE `inf`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `sliderone`
--
ALTER TABLE `sliderone`
  MODIFY `sliderone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
