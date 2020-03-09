-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 08:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rmni_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`clients_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `contact_number` bigint(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_contract`
--

CREATE TABLE IF NOT EXISTS `client_contract` (
`contract_client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `no_unit` varchar(255) NOT NULL,
  `locations_id` int(11) NOT NULL,
  `date_from_billing_period` date NOT NULL,
  `date_to_billing_period` date NOT NULL,
  `soa` varchar(255) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `contract_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_contract`
--

INSERT INTO `client_contract` (`contract_client_id`, `client_name`, `no_unit`, `locations_id`, `date_from_billing_period`, `date_to_billing_period`, `soa`, `ref_no`, `contract_number`, `username`, `password`, `usertype`, `enabled`) VALUES
(1, 'user', '1', 1, '2019-01-01', '2019-01-01', '1', '1', '1', 'user', 'user', 'admin', 1),
(2, 'apple one', '4', 0, '2020-01-01', '2020-03-31', 'undefined', '', '10001', 'apo', 'apo', 'user', 1),
(3, 'richmedia network inc', '100', 0, '2020-01-01', '2020-03-31', 'undefined', '', '123', '', '', '', 1),
(4, 'mx3', '100', 0, '2020-01-01', '2020-03-31', 'undefined', '', '123', '', '', '', 1),
(5, 'richmedia network inc', '20', 0, '2020-01-01', '2020-03-31', 'undefined', '', '1234567890', 'rmnix', 'rmnix', 'user', 1),
(6, 'Watsons', '20', 0, '2020-02-01', '2020-03-31', 'undefined', '', '111-111-111', 'watsons', 'watsons', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_contract_billing`
--

CREATE TABLE IF NOT EXISTS `client_contract_billing` (
`client_contract_billing` int(11) NOT NULL,
  `client_contract_code` varchar(255) NOT NULL,
  `monthly_start_billing` date NOT NULL,
  `monthly_end_billing` date NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `soa` varchar(255) NOT NULL,
  `client_contract_id` varchar(255) NOT NULL,
  `pdf_file_name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_contract_billing`
--

INSERT INTO `client_contract_billing` (`client_contract_billing`, `client_contract_code`, `monthly_start_billing`, `monthly_end_billing`, `ref_no`, `soa`, `client_contract_id`, `pdf_file_name`, `enabled`) VALUES
(1, '10001', '2020-01-01', '2020-01-31', '', 'apple-one-111-111-111', '2', '2020-01-01_to_2020-01-31_apple_one.pdf', 1),
(2, '10001', '2020-02-01', '2020-02-29', '', 'apple-one-000-000-000', '2', '2020-02-01_to_2020-02-29_apple_one.pdf', 1),
(3, '1234567890', '2020-01-01', '2020-01-31', '', '111-111-111', '5', '2020-01-01_to_2020-01-31_richmedia_network_inc.pdf', 1),
(4, '111-111-111', '2020-01-01', '2020-01-31', '', '123-123-123', '6', '2020-01-01_to_2020-01-31_Watsons.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contarct_and_locations`
--

CREATE TABLE IF NOT EXISTS `contarct_and_locations` (
`locations_of_contract_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `client_contract_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contarct_and_locations`
--

INSERT INTO `contarct_and_locations` (`locations_of_contract_id`, `location_id`, `client_contract_id`, `name`, `enabled`) VALUES
(1, 5, 2, '', 1),
(2, 1, 2, '', 1),
(3, 1, 3, '', 1),
(4, 5, 3, '', 1),
(5, 5, 5, '', 1),
(6, 3, 5, '', 1),
(7, 3, 6, '', 1),
(8, 5, 6, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `enabled`) VALUES
(1, 'tagbilaran', 1),
(3, 'Baguio', 1),
(5, 'Cagayan de Oro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_photo`
--

CREATE TABLE IF NOT EXISTS `saved_photo` (
`saved_photo_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `client_contract_id` varchar(255) NOT NULL,
  `location_id` varchar(255) NOT NULL,
  `type_of_ads_id` varchar(255) NOT NULL,
  `item_number` varchar(255) NOT NULL,
  `start_billing` date NOT NULL,
  `end_billing` date NOT NULL,
  `returned` int(11) NOT NULL,
  `message` text NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_photo`
--

INSERT INTO `saved_photo` (`saved_photo_id`, `photo_name`, `client_contract_id`, `location_id`, `type_of_ads_id`, `item_number`, `start_billing`, `end_billing`, `returned`, `message`, `enabled`) VALUES
(22, 'CHU587.jpg', '2', '5', '1', 'CHU587', '2020-02-01', '2020-02-29', 9, 'chu chu chu', 0),
(23, 'DFJ120.jpg', '2', '5', '1', 'DFJ120', '2020-02-01', '2020-02-29', 9, 'ddddddddddddddddddddd dddddddddddddd ddddddddddddddddddddddddd', 0),
(24, 'DFZ568.jpg', '2', '5', '1', 'DFZ568', '2020-02-01', '2020-02-29', 9, 'asasa', 0),
(25, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'sadasd asdfasdasdasd asdfasdasd', 0),
(26, 'CHU587.jpg', '2', '5', '1', 'CHU587', '2020-02-01', '2020-02-29', 0, '', 0),
(27, 'DFJ120.jpg', '2', '5', '1', 'DFJ120', '2020-02-01', '2020-02-29', 2, '', 1),
(28, 'DFZ568.jpg', '2', '5', '1', 'DFZ568', '2020-02-01', '2020-02-29', 9, 'sasasasa', 0),
(29, 'DFZ568.jpg', '2', '5', '1', 'DFZ568', '2020-02-01', '2020-02-29', 2, '', 1),
(30, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'asassasa', 0),
(31, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'asasa', 0),
(32, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'picture', 0),
(33, 'AYE341.jpg', '5', '5', '1', 'AYE341', '2020-01-01', '2020-01-31', 2, '', 1),
(34, 'AYE767.jpg', '5', '5', '1', 'AYE767', '2020-01-01', '2020-01-31', 2, '', 1),
(35, 'AYG184.jpg', '5', '5', '1', 'AYG184', '2020-01-01', '2020-01-31', 2, '', 1),
(36, 'AYH242.jpg', '5', '5', '1', 'AYH242', '2020-01-01', '2020-01-31', 2, '', 1),
(37, 'AYK835.jpg', '5', '5', '1', 'AYK835', '2020-01-01', '2020-01-31', 2, '', 1),
(38, 'AYR252.jpg', '5', '5', '1', 'AYR252', '2020-01-01', '2020-01-31', 2, '', 1),
(39, 'AYT342.jpg', '5', '5', '1', 'AYT342', '2020-01-01', '2020-01-31', 2, '', 1),
(40, 'DVA474.jpg', '5', '5', '1', 'DVA474', '2020-01-01', '2020-01-31', 2, '', 1),
(41, 'KBG708.jpg', '5', '3', '1', 'KBG708', '2020-01-01', '2020-01-31', 2, '', 1),
(42, 'KVB874.jpg', '5', '3', '1', 'KVB874', '2020-01-01', '2020-01-31', 2, '', 1),
(43, 'KVC176.jpg', '5', '3', '1', 'KVC176', '2020-01-01', '2020-01-31', 2, '', 1),
(44, 'KVG795.jpg', '5', '3', '1', 'KVG795', '2020-01-01', '2020-01-31', 2, '', 1),
(45, 'KVG918.jpg', '5', '3', '1', 'KVG918', '2020-01-01', '2020-01-31', 2, '', 1),
(46, 'KVH382.jpg', '5', '3', '1', 'KVH382', '2020-01-01', '2020-01-31', 2, '', 1),
(47, 'KVK113.jpg', '5', '3', '1', 'KVK113', '2020-01-01', '2020-01-31', 2, '', 1),
(48, 'KVM634.jpg', '5', '3', '1', 'KVM634', '2020-01-01', '2020-01-31', 2, '', 1),
(49, 'KVM727.jpg', '5', '3', '1', 'KVM727', '2020-01-01', '2020-01-31', 2, '', 1),
(50, 'KVR679.jpg', '5', '3', '1', 'KVR679', '2020-01-01', '2020-01-31', 2, '', 1),
(51, 'KVY288.jpg', '5', '3', '1', 'KVY288', '2020-01-01', '2020-01-31', 2, '', 1),
(52, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'sdsdfsdfsdfdsf', 0),
(53, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 9, 'asdfasdasasdasfafsdfsdfsdffdfdfs gubah', 0),
(54, '111.jpg', '2', '1', '1', '111', '2020-02-01', '2020-02-29', 0, '', 1),
(55, 'CHU587.jpg', '2', '5', '1', 'CHU587', '2020-02-01', '2020-02-29', 9, 'dfsdfsdf', 0),
(56, 'CHU587.jpg', '2', '5', '1', 'CHU587', '2020-01-01', '2020-01-31', 9, '', 0),
(57, '111.jpg', '2', '1', '1', '111', '2020-01-01', '2020-01-31', 2, '', 1),
(58, 'KVB874.jpg', '5', '3', '1', 'KVB874', '2020-01-01', '2020-01-31', 2, '', 1),
(59, 'LVR635.jpg', '6', '3', '1', 'LVR635', '2020-01-01', '2020-01-31', 0, '', 1),
(60, 'LVX986.jpg', '6', '3', '1', 'LVX986', '2020-01-01', '2020-01-31', 2, '', 1),
(61, 'LWC713.jpg', '6', '3', '1', 'LWC713', '2020-01-01', '2020-01-31', 2, '', 1),
(62, 'LWD387.jpg', '6', '3', '1', 'LWD387', '2020-01-01', '2020-01-31', 2, '', 1),
(63, 'LWF422.jpg', '6', '3', '1', 'LWF422', '2020-01-01', '2020-01-31', 2, '', 1),
(64, 'LWF705.jpg', '6', '3', '1', 'LWF705', '2020-01-01', '2020-01-31', 2, '', 1),
(65, 'LWG777.jpg', '6', '3', '1', 'LWG777', '2020-01-01', '2020-01-31', 2, '', 1),
(66, 'LWP552.jpg', '6', '3', '1', 'LWP552', '2020-01-01', '2020-01-31', 2, '', 1),
(67, 'LWR206.jpg', '6', '3', '1', 'LWR206', '2020-01-01', '2020-01-31', 2, '', 1),
(68, 'LWS352.jpg', '6', '3', '1', 'LWS352', '2020-01-01', '2020-01-31', 2, '', 1),
(69, 'FVE533.jpg', '6', '5', '1', 'FVE533', '2020-01-01', '2020-01-31', 2, '', 1),
(70, 'FVF364.jpg', '6', '5', '1', 'FVF364', '2020-01-01', '2020-01-31', 2, '', 1),
(71, 'FVI378.jpg', '6', '5', '1', 'FVI378', '2020-01-01', '2020-01-31', 2, '', 1),
(72, 'FVS310.jpg', '6', '5', '1', 'FVS310', '2020-01-01', '2020-01-31', 2, '', 1),
(73, 'FWB956.jpg', '6', '5', '1', 'FWB956', '2020-01-01', '2020-01-31', 2, '', 1),
(74, 'FWC758.jpg', '6', '5', '1', 'FWC758', '2020-01-01', '2020-01-31', 2, '', 1),
(75, 'FWC762.jpg', '6', '5', '1', 'FWC762', '2020-01-01', '2020-01-31', 2, '', 1),
(76, 'FWG854.jpg', '6', '5', '1', 'FWG854', '2020-01-01', '2020-01-31', 2, '', 1),
(77, 'FWH278.jpg', '6', '5', '1', 'FWH278', '2020-01-01', '2020-01-31', 2, '', 1),
(78, 'FWH684.jpg', '6', '5', '1', 'FWH684', '2020-01-01', '2020-01-31', 2, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_ads`
--

CREATE TABLE IF NOT EXISTS `type_of_ads` (
`type_of_ads_id` int(11) NOT NULL,
  `type_of_ads_serveces` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_ads`
--

INSERT INTO `type_of_ads` (`type_of_ads_id`, `type_of_ads_serveces`, `enabled`) VALUES
(1, 'transits', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_ads_requested`
--

CREATE TABLE IF NOT EXISTS `type_of_ads_requested` (
`type_of_ads_requested_id` int(11) NOT NULL,
  `client_contract_id` varchar(255) NOT NULL,
  `location_id` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `type_of_transit` varchar(255) NOT NULL,
  `type_of_ads` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_ads_requested`
--

INSERT INTO `type_of_ads_requested` (`type_of_ads_requested_id`, `client_contract_id`, `location_id`, `plate_number`, `type_of_transit`, `type_of_ads`, `enabled`) VALUES
(1, '2', '5', 'CHU587', 'jeepney', '1', 1),
(2, '2', '5', 'DFJ120', 'jeepney', '1', 1),
(3, '2', '5', 'DFZ568', 'jeepney', '1', 1),
(4, '2', '1', '111', 'jeepney', '1', 1),
(5, '5', '5', 'AYE341', 'Bus', '1', 1),
(6, '5', '5', 'AYE767', 'jeepney', '1', 1),
(7, '5', '5', 'AYG184', 'jeepney', '1', 1),
(8, '5', '5', 'AYH242', 'jeepney', '1', 1),
(9, '5', '5', 'AYK835', 'jeepney', '1', 1),
(10, '5', '5', 'AYR252', 'jeepney', '1', 1),
(11, '5', '5', 'AYT342', 'jeepney', '1', 1),
(12, '5', '5', 'DVA474', 'jeepney', '1', 1),
(13, '5', '3', 'KBG708', 'jeepney', '1', 1),
(14, '5', '3', 'KVB874', 'jeepney', '1', 1),
(15, '5', '3', 'KVC176', 'jeepney', '1', 1),
(16, '5', '3', 'KVG795', 'jeepney', '1', 1),
(17, '5', '3', 'KVG918', 'jeepney', '1', 1),
(18, '5', '3', 'KVH382', 'jeepney', '1', 1),
(19, '5', '3', 'KVK113', 'jeepney', '1', 1),
(20, '5', '3', 'KVM634', 'jeepney', '1', 1),
(21, '5', '3', 'KVM727', 'jeepney', '1', 1),
(22, '5', '3', 'KVR679', 'jeepney', '1', 1),
(23, '5', '3', 'KVY288', 'jeepney', '1', 1),
(24, '6', '3', 'LVR635', 'jeepney', '1', 1),
(25, '6', '3', 'LVX986', 'jeepney', '1', 1),
(26, '6', '3', 'LWC713', 'jeepney', '1', 1),
(27, '6', '3', 'LWD387', 'jeepney', '1', 1),
(28, '6', '3', 'LWF422', 'jeepney', '1', 1),
(29, '6', '3', 'LWF705', 'jeepney', '1', 1),
(30, '6', '3', 'LWG777', 'jeepney', '1', 1),
(31, '6', '3', 'LWP552', 'jeepney', '1', 1),
(32, '6', '3', 'LWR206', 'jeepney', '1', 1),
(33, '6', '3', 'LWS352', 'jeepney', '1', 1),
(34, '6', '3', 'LWU547', 'jeepney', '1', 1),
(35, '6', '3', 'LWY376', 'jeepney', '1', 1),
(36, '6', '3', 'LXC168', 'jeepney', '1', 1),
(37, '6', '3', 'LXE294', 'jeepney', '1', 1),
(38, '6', '5', 'FVE533', 'jeepney', '1', 1),
(39, '6', '5', 'FVF364', 'jeepney', '1', 1),
(40, '6', '5', 'FVI378', 'jeepney', '1', 1),
(41, '6', '5', 'FVS310', 'jeepney', '1', 1),
(42, '6', '5', 'FWB956', 'jeepney', '1', 1),
(43, '6', '5', 'FWC758', 'jeepney', '1', 1),
(44, '6', '5', 'FWC762', 'jeepney', '1', 1),
(45, '6', '5', 'FWG854', 'jeepney', '1', 1),
(46, '6', '5', 'FWH278', 'jeepney', '1', 1),
(47, '6', '5', 'FWH684', 'jeepney', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`users_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `client_contract_id` varchar(255) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `usertype`, `client_contract_id`, `enabled`) VALUES
(1, 'admin', 'admin', 'user', '1', 1),
(2, 'apo', 'apo', 'user', '2', 1),
(3, 'rmni', 'rmni', 'user', '5', 1),
(4, 'a', 'a', 'user', '5', 1),
(5, 'watsons', 'watsons', 'user', '6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`clients_id`);

--
-- Indexes for table `client_contract`
--
ALTER TABLE `client_contract`
 ADD PRIMARY KEY (`contract_client_id`);

--
-- Indexes for table `client_contract_billing`
--
ALTER TABLE `client_contract_billing`
 ADD PRIMARY KEY (`client_contract_billing`);

--
-- Indexes for table `contarct_and_locations`
--
ALTER TABLE `contarct_and_locations`
 ADD PRIMARY KEY (`locations_of_contract_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `saved_photo`
--
ALTER TABLE `saved_photo`
 ADD PRIMARY KEY (`saved_photo_id`);

--
-- Indexes for table `type_of_ads`
--
ALTER TABLE `type_of_ads`
 ADD PRIMARY KEY (`type_of_ads_id`);

--
-- Indexes for table `type_of_ads_requested`
--
ALTER TABLE `type_of_ads_requested`
 ADD PRIMARY KEY (`type_of_ads_requested_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client_contract`
--
ALTER TABLE `client_contract`
MODIFY `contract_client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `client_contract_billing`
--
ALTER TABLE `client_contract_billing`
MODIFY `client_contract_billing` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contarct_and_locations`
--
ALTER TABLE `contarct_and_locations`
MODIFY `locations_of_contract_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `saved_photo`
--
ALTER TABLE `saved_photo`
MODIFY `saved_photo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `type_of_ads`
--
ALTER TABLE `type_of_ads`
MODIFY `type_of_ads_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `type_of_ads_requested`
--
ALTER TABLE `type_of_ads_requested`
MODIFY `type_of_ads_requested_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
