-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:00 AM
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
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Iteam_Name` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Iteam_Name`, `Price`, `Quantity`, `Unit`) VALUES
('oil', 10, 4, 'Liter');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `Password`) VALUES
('binu1234', 'abcd'),
('Tasnia', 'efg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item_name`, `price`, `category`) VALUES
(1, 'Cheese Burger', 150.00, 'Burger'),
(2, 'Chiken Naga Burger', 140.00, 'Burger'),
(3, 'chicken Mini Burger', 100.00, 'Burger'),
(4, 'Chicken Fry', 120.00, 'Chicken'),
(5, 'chicken wings', 90.00, 'Chicken'),
(6, 'Chicken Lollipop', 120.00, 'Chicken'),
(7, 'Maxican Pizza 12\"', 500.00, 'Pizza'),
(8, 'Italian Pizza 12\"', 450.00, 'Pizza'),
(9, 'Meaty Onion 12\'\'', 400.00, 'Pizza'),
(10, 'Set Menu 1(Fried Rice, Fried Chicken, Vegetable)  ', 200.00, 'Set Menu'),
(11, 'Set Menu 2(Fried Rice, BBQ Chicken, chicken Vegeta', 220.00, 'Set Menu'),
(12, 'Vanila cup cake', 100.00, 'Dessert'),
(13, 'Chocolate Cup Cake', 110.00, 'Dessert'),
(14, 'Red Velvet', 130.00, 'Dessert'),
(15, 'Cup Pudding', 80.00, 'Dessert'),
(16, 'Water 500ml', 20.00, 'Drinks'),
(17, 'Coca-Cola 1glass ', 40.00, 'Drinks'),
(18, 'Fanta 1glass', 40.00, 'Drinks'),
(19, 'Cold Coffe', 80.00, 'Drinks'),
(20, 'Hot Coffe', 60.00, 'Drinks'),
(21, 'Lacchi', 70.00, 'Drinks'),
(22, 'Cocolate Milk Shake', 100.00, 'Drinks'),
(26, 'Spicy Burger', 110.00, 'Burger'),
(27, 'Lemoned', 40.00, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `First_Name` varchar(20) DEFAULT NULL,
  `Last_Name` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Number_Of_Guest` int(4) DEFAULT NULL,
  `Type_of_Table` varchar(20) DEFAULT NULL,
  `Booking_Date` date DEFAULT NULL,
  `Booking_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`First_Name`, `Last_Name`, `Email`, `Number_Of_Guest`, `Type_of_Table`, `Booking_Date`, `Booking_Time`) VALUES
('Adib ', 'Mahmud', 'adibmahmud@gamil.com', 2, 'indoor', '2023-10-26', '08:47:00'),
('nn', 'SKFJ SDH', 'abc@gmail.com', 5, 'indoor', '2024-10-04', '19:15:00'),
('Tasnia', 'Mahmud', 'meherafrozbinu@gmail.com', 1, 'indoor', '2024-10-04', '19:15:00'),
('asdqsdd', 'jjh', 'efjk@gmail.com', 3, 'indoor', '2024-10-04', '19:15:00'),
('Tasnia', 'Mollik', 'fer@gmail.com', 1, 'indoor', '0024-10-04', '19:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
