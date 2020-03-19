-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 09:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `active_constituents` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sale` tinyint(1) DEFAULT 0,
  `sale_percent` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `active_constituents`, `img`, `price`, `description`, `sale`, `sale_percent`) VALUES
(1, 'Bioderma Sensibo', 'glycerin, cetearyl isononanoate, isohexadecane, glycol palmitate', '/pharma/assets/images/products/bioderma_sensibo.png', 300, 'Sensibio Light is a moisturising soothing treatment that biologically strengthens the skin\'s resistance to attacks and increases the tolerance threshold of sensitive and intolerant skin.', 1, 0.75),
(2, 'Chanca Piedra', 'chanca piedra extract', '/pharma/assets/images/products/chanca_piedra.png', 120, 'Chanca Piedra has been used by the indigenous peoples of the Amazon for treatment and removal of kidney stones and gallstones.\r\nOur Chanca Piedra contains 120 tablets serving 800 MG per easy to swallow tablets which is the highest in the market.', 0, NULL),
(3, 'Umcka', 'Pelargonium sidoides (EPs 7630) 1X', '/pharma/assets/images/products/umcka.png', 80, 'Homeopathic - Shortens the duration and reduces the severity of throat, nasal and bronchial irritations, Cherry flavor.', 0, NULL),
(4, 'Puritans Pride Triple Omega 3-6-9', 'Omega 3-6-9 Fish,Flax,Borage Oils', '/pharma/assets/images/products/trible_omega.png', 450, 'Promotes heart and cardiovascular health\r\nSupports cellular and metabolic function\r\nEnhanced with Flaxseed Oil, Fish Oil, Evening Primrose Oil, Borage Oil and Vitamin E\r\nNo Artificial Flavor or Sweetener, No Preservatives, No Sugar, No Starch, No Milk, No Lactose, No Gluten, No Wheat, No Yeast, No Fish. Sodium Free.\r\n', 1, 0.9),
(5, 'Osteocare', 'Calcium,Zinc,Copper,Soy,Omega-3', '/pharma/assets/images/products/osteocare.png', 50, 'Calcium is crucial to everyone. So Osteocare Original is scientifically developed to complement your dietary intake at every stage of life.', 1, 0.9),
(6, 'Cetyl Pure', 'myristoleate,cetylated fatty acid', '/pharma/assets/images/products/cetyl_pure.png', 27, 'Natrol® CetylPure® is an exclusive and patented blend of cetyl myristoleate, a cetylated fatty acid. This unique natural compound was discovered and isolated an American scientist in the 1970s.', 0, NULL),
(7, 'Cla Core', 'Whey Protein', '/pharma/assets/images/products/cla_core.png', 200, 'Muscle Pharm Combat 100% Whey 5 lbs is an ultra-filtered low carb high protein supplement that consists of 25g of protein per serving\r\nIt is free of gluten and does not contain any artificial dye or colour\r\nThe protein contained in Muscle Pharm Combat 100% Whey is sourced from Whey Protein Isolate and Whey Protein Concentrate\r\nIncreases Metabolic Rate; Reduces Body Fat', 1, 0.7),
(8, 'Ibuprofen 400mg', 'ibuprofen', '/pharma/assets/images/products/ibuprofen.png', 35, 'Pain reliever, fever reducer NSAID with good quality.', 0, NULL),
(9, 'Vit D3 5000', 'Vit D3 5000 IU(Cholecalciferol)', '/pharma/assets/images/products/vit_d_5000.png', 200, 'All Puritan’s Pride Vitamin D formulas are Sunvite® D3, a potent and active form of Vitamin D. Together with Calcium, Vitamin D helps develop strong bones and teeth, and also assists in immune system health.**\r\nVitamin D3 is a more potent and bioavailable form compared to D2.', 1, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
