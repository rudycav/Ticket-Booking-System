-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 04:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `card_name` varchar(20) NOT NULL,
  `card` varchar(20) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  `cvv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `name`, `email`, `address`, `city`, `state`, `zip`, `card_name`, `card`, `exp_month`, `exp_year`, `cvv`) VALUES
(52, 'Rudy Bi', 'rudy.bi@baruchmail.c', 'sdsd', 'fadfdfdfdf', 'fd', '22122', 'rudy', '123123123123', '', '2312', '323'),
(53, 'rudy', 'cavrudy@gmail.com', 'rgrg', 'brooklyn', 'NY', '45455', 'rudy', '343244324234', 'oct', '1232', '232'),
(54, 'cis', 'cis', '', '', '', '', 'cis', '', 'cis', '', ''),
(55, 'john', 'john', '', '', '', '', 'john', '', '', '', ''),
(56, 'brown', 'brown@', '', '', '', '', 'brown', '', 'brown', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `datecreation` date NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `datecreation`, `username`) VALUES
(101, 'New Order', '2020-11-26', 'cavrudy@gmail.com'),
(102, 'New Order', '2020-11-30', 'cavrudy@gmail.com'),
(103, 'New Order', '2020-11-30', 'cis5800'),
(104, 'New Order', '2020-11-30', 'john'),
(105, 'New Order', '2020-11-30', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `productid` int(11) NOT NULL,
  `ordersid` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`productid`, `ordersid`, `price`, `quantity`, `email`) VALUES
(17, 101, '40000', 1, 'cavrudy@gmail.com'),
(23, 102, '1500', 1, 'cavrudy@gmail.com'),
(17, 103, '40000', 1, 'cis5800'),
(18, 104, '5000', 1, 'john'),
(23, 105, '1500', 1, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `seating` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `price`, `seating`, `date`, `location`, `time`) VALUES
(14, 'image/rockets_lakers.jpg', 'Rockets Vs Lakers Game 7', '50000', '6G', 'June 10, 2022', 'Houston Stadium', '2000'),
(15, 'image/rockets_lakers.jpg', 'Rockets Vs Lakers Game 7', '30000', '8H', 'June 10, 2022', 'Houston Stadium', '2000'),
(16, 'image/rockets_lakers.jpg', 'Rockets Vs Lakers Game 7', '20000', '8G', 'June 10, 2022', 'Houston Stadium', '2000'),
(17, 'image/rockets_lakers.jpg', 'Rockets Vs Lakers Game 7', '40000', '7J', 'June 10, 2022', 'Houston Stadium', '2000'),
(18, 'image/jb.jpg', 'Justin Bieber World Tour', '5000', '1F', 'July 20, 2022', 'Poplar Creek Music Theater', '2100'),
(19, 'image/jb.jpg', 'Justin Bieber World Tour', '2000', '4C', 'July 20, 2022', 'Poplar Creek Music Theater', '2100'),
(20, 'image/jb.jpg', 'Justin Bieber World Tour', '1500', '9G', 'July 20, 2022', 'Poplar Creek Music Theater', '2100'),
(21, 'image/jb.jpg', 'Justin Bieber World Tour', '900', '10K', 'July 20, 2022', 'Poplar Creek Music Theater', '2100'),
(22, 'image/blackpink.jpg', 'Black Pink 2022', '2000', '9B', 'July 15, 2022', 'Coachella Valley Festival', '2100'),
(23, 'image/blackpink.jpg', 'Black Pink 2022', '1500', '14J', 'July 15, 2022', 'Coachella Valley Festival', '2100'),
(24, 'image/blackpink.jpg', 'Black Pink 2022', '1000', '17C', 'July 15, 2022', 'Coachella Valley Festival', '2100'),
(25, 'image/blackpink.jpg', 'Black Pink 2022', '1000', '18C', 'July 15, 2022', 'Coachella Valley Festival', '2100'),
(26, 'image/rockets_celtics.jpg', 'Rockets Vs Celtics Game 1', '20000', '2D', 'April 20, 2023', 'LA Staples Center', '2000'),
(28, 'image/rockets_celtics.jpg', 'Rockets Vs Celtics Game 1', '1500', '4D', 'April 20, 2023', 'LA Staples Center', '2000'),
(30, 'image/rockets_celtics.jpg', 'Rockets Vs Celtics Game 1', '1200', '6I', 'April 20, 2023', 'LA Staples Center', '2000'),
(31, 'image/rockets_celtics.jpg', 'Rockets Vs Celtics Game 1', '1000', '9C', 'April 20, 2023', 'LA Staples Center', '2000'),
(32, 'image/week.jpg', 'The Weeknd After Hours', '4000', '3G', 'August 2, 2022', 'Orpheum Theatre', '2000'),
(33, 'image/week.jpg', 'The Weeknd After Hours', '3500', '6G', 'August 2, 2022', 'Orpheum Theatre', '2000'),
(34, 'image/week.jpg', 'The Weeknd After Hours', '3000', '8G', 'August 2, 2022', 'Orpheum Theatre', '2000'),
(35, 'image/week.jpg', 'The Weeknd After Hours', '2500', '10J', 'August 2, 2022', 'Orpheum Theatre', '2000'),
(36, 'image/khabib.jpg', 'Khabib Nurmagomedov Vs Tony Ferguson', '20000', '5G', 'March 28, 2023', 'MGM Grand Stadium', '2000'),
(37, 'image/khabib.jpg', 'Khabib Nurmagomedov Vs Tony Ferguson', '17000', '7G', 'March 28, 2023', 'MGM Grand Stadium', '2000'),
(38, 'image/khabib.jpg', 'Khabib Nurmagomedov Vs Tony Ferguson', '15000', '9G', 'March 28, 2023', 'MGM Grand Stadium', '2000'),
(39, 'image/khabib.jpg', 'Khabib Nurmagomedov Vs Tony Ferguson', '13000', '11H', 'March 28, 2023', 'MGM Grand Stadium', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `email`, `pass`, `first`, `last`) VALUES
(22, 'user', 'cavrudy@gmail.com', 'rudy', 'r', 'b'),
(23, 'admin', 'cinthia.delacruz@baruchmail.cuny.edu', 'cinthia', 'c', 'd'),
(24, 'admin', 'MAMADOU.DIALLO13@baruchmail.cuny.edu', 'mamadou', 'm', 'd'),
(25, 'admin', 'DAPHNE.GAO@baruchmail.cuny.edu ', 'daphne', 'd', 'g'),
(26, 'admin', 'Jackson.Gable@baruch.cuny.edu', 'jackson', 'j', 'g'),
(27, 'user', 'bob@yahoo.com', 'bob', 'b', 'b'),
(28, 'user', 'sally@yahoo.com', 'sally', 's', 's'),
(29, 'user', 'jack@yahoo.com', 'jack', 'j', 'j'),
(30, 'user', 'john@yahoo.com', 'john', 'j', 'j'),
(31, 'user', 'cinthiajdelacruz@gmail.com', 'cinthia', 'c', 'd'),
(32, 'user', 'jackson.gable97@gmail.com', 'jackson', 'j', 'g'),
(33, 'user', 'musadiallo95@gmail.com', 'mamadou', 'm', 'd'),
(34, 'user', 'daphgao@gmail.com', 'daphne', 'd', 'g'),
(35, 'admin', 'rudy.bi@baruchmail.cuny.edu', 'rudy', 'r', 'b'),
(44, 'admin', 'Rudolph.Brown1@baruch.cuny.edu', 'rudolf', 'r', 'b'),
(45, '', 'cis5800', 'cis5800', 'cis', 'cis'),
(46, '', 'john', 'john', 'john', 'john '),
(47, '', 'brown', 'brown', 'brown', 'brown');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`productid`,`ordersid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first` (`first`),
  ADD KEY `last` (`last`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
