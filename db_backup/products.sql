-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 06:03 PM
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
  `sale_percent` double DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `active_constituents`, `img`, `price`, `description`, `sale`, `sale_percent`) VALUES
(1, 'Natrol Cetyl Pure 120 cap', 'Cetyl myristoleate complex,Cetyl myristoleate', '/pharma/assets/images/products/cetyl_pure.png', 150, 'For joint health and comfort helps nourish cartilage natrol cetylpure is an exclusive and patented blend of cetyl myristoleate, a naturally occurring fatty acid. This revolutionary compound works to lubricate joints and helps to promote mobile joint function. Cetylpure is a cutting-edge compound that promotes the relief of joint discomfort following exercise. With age, the ability to produce some of the nutrients necessary for joint function and cartilage building declines. Natrol cetylpure helps to nourish and maintain the natural lubricating fluid in joints and cartilage. Free from yeast, wheat, corn, milk, egg, soy, glutens, artificial colours and flavours added suger starch and preservatives.', 1, 0.8),
(2, 'Bioderma Sensibio H2O Cleanser', 'fructooligosaccharides, mannitol, xylitol, rhamnose, cucumis sativus', '/pharma/assets/images/products/bioderma_sensibo.png', 350, 'Sensibio H2O is the 1st and only dermatological micellar water perfectly compatible with the skin: its fatty acid esters, the constituent elements of micelles, are similar to the phospholipids of the skin cell membranes and naturally help rebuild the skin\'s hydrolipidic film.\r\n', 1, 0.6),
(3, 'Chanca Piedra', 'Chanca Piedra powder', '/pharma/assets/images/products/chanca_piedra.png', 120, 'Chanca Piedra has been used by the indigenous peoples of the Amazon for treatment and removal of kidney stones and gallstones.\r\nOur Chanca Piedra contains 120 tablets serving 800 MG per easy to swallow tablets which is the highest in the market\r\nMillions of Americans suffer from kidney stone or gallstone problems luckily nature has a remedy to help.\r\nManufactured in accordance with Good Manufacturing Practices (GMP) in a FDA registered facility. Vegan, Gluten Free, Non-GMO. Manufactured in the USA made with Raw Peruvian Chanca Piedra', 0, 1),
(4, 'CLA Core', 'Conjugated Linoleic Acid,Avocado Oil,Extra Virgin Olive Oil', '/pharma/assets/images/products/cla_core.png', 320, 'MusclePharm CLA Core is a naturally-occurring fatty acid found in meat, dairy, and safflower oil. MusclePharm CLA Core is the highest quality, purity- and potency-conjugated linolenic acid (CLA) available. It\'s formulated to fit the fat-reducing, lean-muscle maintenance needs of an individual.', 0, 1),
(5, 'Ibuprofen Tablets 200 mg', 'Ibuprofen', '/pharma/assets/images/products/ibuprofen.png', 100, 'Ibuprofen Tablets 200 mg are used as a pain reliever and fever reducer (NSAID) for adults and children 12 years and over.', 0, 1),
(6, 'Osteocare Plus', 'Soy,Omega 3,Zinc,Ca,DHA', '/pharma/assets/images/products/osteocare.png', 150, 'Far from your average Calcium tablet, Osteocare Plus gives you advanced, comprehensive support with our trusted Osteocare formula plus Soy Isoflavones and Omega-3 capsules.', 0, 1),
(7, 'Trible Omega', 'Cholesterol,PUFA,Saturated Fat,Borage Seed oil,Fish oil,Protein', '/pharma/assets/images/products/trible_omega.png', 400, 'There are ‘bad’ fats, which include trans fats that are found in foods like french fries and donuts. And then there are ‘good’ fats. These are fatty acids—omega-3, omega-6 and omega-9—that are important for metabolic and cellular health. Omega-3 fatty acids are in fish such as salmon, anchovies and trout, as well as walnuts and flaxseed. Omega-6 and Omega-9 are found in nuts and vegetable oils. Fatty acids support the overall well-being of the body. Omega-3 supports the health of your heart*, joints and skin. Their role in heart health is particularly noteworthy*. The National Institutes of Health recognizes that Omega-3 from fish oil can be beneficial for several cardiovascular measures. Supportive but not conclusive research shows that consumption of EPA and DHA Omega-3 fatty acids may reduce the risk of coronary heart disease.* They also help maintain triglyceride levels that are already within a normal range.', 0, 1),
(8, 'Umcka', 'PELARGONIUM SIDOIDES 1X', '/pharma/assets/images/products/umcka.png', 200, 'Discover Nature’s Way® to shorten the duration and lessen the severity of colds or treat your flu†† symptoms. Umcka®, with Pelargonium sidoides root extract, is a remedy you can feel good about because it’s homeopathic and clinically proven to be effective. Carefully sourced for uncompromising quality, it’s cold and flu†† care the way nature intended.', 1, 0.75),
(9, 'Vitamin D 5000', 'Cholecalciferol', '/pharma/assets/images/products/vit_d_5000.png', 350, 'Vitamin D plays an important role throughout life, beginning with fetal development.* Unlike many vitamin D supplements, Thorne\'s contain no lactose or preservatives (BHA, BHT, sodium benzoate, etc).', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
