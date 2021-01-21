-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 05:29 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prject_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(1, 'Samsung', '1'),
(3, 'HP', '1'),
(4, 'Adobe', '1'),
(5, 'Huawei', '1'),
(6, 'Farhad', '1'),
(11, 'NEW1', '1'),
(13, 'New11', '1'),
(15, 'Farhad1', '1'),
(18, 'Farhad123435', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(1, 0, 'Electronics', '1'),
(2, 0, 'Software', '1'),
(3, 0, 'Books', '1'),
(5, 0, 'Gadgets', '1'),
(6, 1, 'Mobile', '1'),
(7, 2, 'Antivirus', '1'),
(8, 1, 'Laptop', '1'),
(15, 2, 'Editing Software', '1'),
(19, 2, 'Pdf Creating Software', '1'),
(27, 1, 'Printer', '1'),
(38, 1, 'Mouse1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(1, 6, 1, 'Samsung Galaxy S8', 70000, 1000, '2019-05-03', '1'),
(4, 6, 1, 'Samsung Galaxy S7', 65000, 1000, '2019-04-10', '1'),
(6, 6, 1, 'Samsung Galaxy S9', 90000, 1000, '2019-04-10', '1'),
(7, 2, 3, 'Editing Software', 70000, 122, '2019-04-30', '1'),
(8, 1, 1, 'Watch1', 5000, 150, '2019-05-03', '1'),
(10, 2, 3, 'pavillion', 45000, 120, '2019-05-03', '1'),
(11, 6, 1, 'Samsung Galaxy S567', 232445, 76576, '2019-05-09', '1'),
(12, 2, 1, 'EEE', 23445, 34, '2020-04-26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(222) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Md:Abu Farhad', 'abufarhad15@gmail.com', '$2y$08$15y2j/EuJ4HxtDt3qFTbJOYVMizaYwupXS3xY8fnAQyyq2cRmqk1S', 'Admin', '2019-03-16', '2020-10-18 05:10:23', ''),
(2, 'Md:Abu Farhad', 'abu15@gmail.com', '$2y$08$S.IUL8ww/KsLsg2uv1VMYe0d4jSNB/ExESiVCsZHhkiv8BA5Pwf5O', 'Admin', '2019-03-16', '2019-03-16 00:00:00', ''),
(3, 'Md:Abu Farhad', 'abuf15@gmail.com', '$2y$08$5jVe0hOtWibVHliquF24RurAiPkGU2zH1J64A5TTZNM3wJ7UR/ITK', 'Admin', '2019-03-16', '2019-03-16 00:00:00', ''),
(4, 'Test', 'rizwan1@gmail.com', '$2y$08$wBlCaaMkATdh42iSKVqu9Om6.vT46i9eJegu7WAi8cjEU8dzT2B1a', 'Admin', '2019-03-16', '2019-03-16 00:00:00', ''),
(5, 'Test', 'rzwan1@gmail.com', '$2y$08$jYwXxw1hyrl1ocFZzlF39e1Nz3eEHBx54./s/2Z6P4LkXEhP38o6a', 'Admin', '2019-03-16', '2019-03-16 00:00:00', ''),
(6, 'Test', 'rwan1@gmail.com', '$2y$08$8yQrM6.YLZGJnTsqHToF/.0G8eXfztmLUeEG/w7u9bxjdRrr1.28W', 'Admin', '2019-03-16', '2019-03-16 00:00:00', ''),
(7, 'Test', 'ran1@gmail.com', '$2y$08$mvZ1gINFVa.Y6hkejxxD.uY6GNGxadLB5Zy7fSWtnCendHMWYhESe', 'Admin', '2019-03-17', '2019-03-17 00:00:00', ''),
(8, 'Test', 'rn1@gmail.com', '$2y$08$hHdCb.DCclg.lKoST8RZ3uEQ/5/V5.LeQKguzHIqrI/jeRHZIhYia', 'Admin', '2019-03-17', '2019-03-17 00:00:00', ''),
(9, 'Test', 'rn1@gmail.com', '$2y$08$hHdCb.DCclg.lKoST8RZ3uEQ/5/V5.LeQKguzHIqrI/jeRHZIhYia', 'Admin', '2019-03-17', '2019-03-17 00:00:00', ''),
(10, 'Test', 'ren1@gmail.com', '$2y$08$JrYV47aRF6WYZTMZ2qhzA.zfOGI.j8oU3j4.bioNojiu.ZDyz/qZe', 'Admin', '2019-03-17', '2019-03-17 00:00:00', ''),
(11, 'Test', 'reng1@gmail.com', '$2y$08$OiPysfBUvL66dkd8HB5UzeZyScUq9VRGsq1ojftWrurx5W.0hvk5G', 'Admin', '2019-03-17', '2019-03-17 11:03:25', ''),
(13, 'asdfgwd', 'sdfg@g.com', '$2y$08$a0QIMYTsey7Ad1kr355H4eufg2pcrz.2tY9p.mHu.Z4waYZg3LX9O', 'Admin', '2019-03-18', '2019-03-18 00:00:00', ''),
(14, 'farhad', 'f@g.com', '$2y$08$LA.RUBQ9dX7FG.ZBthSusempuAN1sC8pkbt6D/TfsEh3Tc5NH/UZK', 'Admin', '2019-03-18', '2019-03-18 00:00:00', ''),
(15, 'Farhad', 'a@g.com', '$2y$08$S3YlUk3WsEWrlVHP00lbe.CBpj338SHrE1dJvnhGl9GyCIqYpVAe.', 'Admin', '2019-03-18', '2019-03-18 00:00:00', ''),
(16, 'asdasd', 'as@g.com', '$2y$08$iNQXO6kSx/.0U2B6vamqNeCaqHta3j7T7D/N/3cpyee2xMzEhCfCG', 'Admin', '2019-03-18', '2019-03-18 00:00:00', ''),
(17, 'fffffffff', 'fffff@g.com', '$2y$08$6xj4JeDs7YBSVSKkTrX6t.NlkgOubzoQerCuAESvw.n3xPPakzA7C', 'Admin', '2019-03-18', '2019-06-21 07:06:09', ''),
(18, 'Farhad', 'abufarhad@gmail.com', '$2y$08$.oIYel90JCfzj0XMen1TgOMAQDzKazs2LKVkn7pE89LXT4Ljmghz6', 'Admin', '2019-03-19', '2019-03-20 12:03:31', ''),
(19, 'Farhad', 'abu@gmail.com', '$2y$08$0v69lkEtpy4ZbgmH2/tABOj6SSaoP5k.7OVTbklKFDIwKRrR.FawK', 'Admin', '2019-06-13', '2019-06-13 00:00:00', ''),
(20, 'farhad1', 'far@gmail.com', '$2y$08$7ZEsmC3srjjEXqUhd2XmFOlAUW7O/hodncZSHkWHlTH60f6di1vRm', 'Admin', '2019-06-13', '2019-06-13 00:00:00', ''),
(21, 'Farhad', 'farhad@gmail.com', '$2y$08$6jLsxpkBbbNxo3BSCII25u4Y1YTnOr1Xey44hWp8v0/BxbeAF0BLK', 'Admin', '2019-06-18', '2019-06-18 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
