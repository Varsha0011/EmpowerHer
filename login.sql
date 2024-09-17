-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 06:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_items`
--

CREATE TABLE `art_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `art_uploads`
--

CREATE TABLE `art_uploads` (
  `id` int(11) NOT NULL,
  `art_title` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 'qdeeas', 'dsgffhgjhmhjm');

-- --------------------------------------------------------

--
-- Table structure for table `new_j_listings`
--

CREATE TABLE `new_j_listings` (
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `pay` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `age_group` varchar(50) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_j_listings`
--

INSERT INTO `new_j_listings` (`name`, `description`, `job_id`, `location`, `pay`, `skills`, `age_group`, `employer`, `contact`) VALUES
('Handloom Weaver', 'Weaving and creating handloom products', 1, 'Varanasi, Uttar Pradesh', '₹7,000 - ₹10,000', 'Weaving, attention to detail, color coordination', '18-45', 'Varanasi Handloom Association', '1234567890'),
('Dairy Farm Worker', 'Assisting in the daily operations of a dairy farm', 2, 'Anand, Gujarat', '₹8,000 - ₹12,000', 'Animal handling, dairy farming, attention to detail', '20-50', 'Amul Dairy Cooperative', '0987654321'),
('Organic Farmer', 'Cultivating organic crops and managing farm activities', 3, 'Nashik, Maharashtra', '₹5,000 - ₹8,000', 'Organic farming, soil management', '22-50', 'Nashik Organic Farms', '1122334455'),
('Tailor', 'Sewing and tailoring garments', 4, 'Jaipur, Rajasthan', '₹6,000 - ₹9,000', 'Sewing, tailoring, fabric knowledge', '18-40', 'Jaipur Textile Hub', '9988776655'),
('Handicraft Artisan', 'Creating handicraft items such as pottery and jewelry', 5, 'Jodhpur, Rajasthan', '₹5,000 - ₹7,000', 'Artistic skills, pottery, jewelry making', '18-45', 'Jodhpur Handicraft Association', '7766554433'),
('Silk Worm Raiser', 'Raising silkworms for silk production', 6, 'Mysore, Karnataka', '₹7,000 - ₹10,000', 'Silkworm raising, attention to detail', '20-50', 'Mysore Silk Cooperative', '5544332211'),
('Poultry Farm Worker', 'Managing the day-to-day operations of a poultry farm', 7, 'Hyderabad, Telangana', '₹6,000 - ₹8,000', 'Animal handling, poultry farming', '20-50', 'Hyderabad Poultry Farms', '6677889900'),
('Agricultural Equipment Operator', 'Operating and maintaining agricultural machinery', 8, 'Ludhiana, Punjab', '₹8,000 - ₹12,000', 'Machine operation, basic maintenance', '20-45', 'Punjab Agro Machinery', '3344556677'),
('Herbal Medicine Collector', 'Collecting herbs and medicinal plants', 9, 'Ooty, Tamil Nadu', '₹5,000 - ₹7,000', 'Botany knowledge, plant identification', '18-45', 'Ooty Herbal Cooperative', '2233445566'),
('Textile Dyer', 'Dyeing fabrics using natural and synthetic dyes', 10, 'Surat, Gujarat', '₹7,000 - ₹9,000', 'Dyeing techniques, fabric handling', '18-40', 'Surat Textile Association', '8899001122');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Ajay Kumar', 'ajay@gmail.com', '12345'),
(2, 'Amit', 'amit@gmail.com', '1234'),
(3, 'Keerti Panwar', 'keerti@gmail.com', '$2y$10$g.xv9BS7DZbZ0KT/.fkGouuD8duIUWY2lDntZ7ZXDDUW6h09ZDiqe'),
(4, 'Ankita', 'ankita@gmail.com', '$2y$10$ZuWPf98dGPFogVM8MoKGxOVZ4v1mXD.WrJQ7rwfvdYLWMpyEyRhtK'),
(5, 'Keerti Panwar', 'keerti1234@gmail.com', '$2y$10$PL6oQH71xCh3F3BALBuVYu6SLn2AVQ41o.i5vi2LosRIWEh1H.0Zi'),
(6, 'varsha', 'varsha@gmail.com', '$2y$10$IvLV.NEa0cQHea3SZfhzIun3Sg/yzUCPDF9DwsWhg/EsmSfsVp7Am'),
(7, 'Varsha ', 'varshat@gmail.com', '$2y$10$8rNmP867B6pyzw7MSRiepO8ZseFPR3uaWCyxeHYZa4YCGXZ63GWse'),
(8, 'Yashika', 'Yashika1234@gmail.com', '$2y$10$CYtth7n7Y5XP/Z3cILbTO.OVeMPsAbTHUOXGjO9ogjO2M8Cs18oh2'),
(9, 'Varsha0000@gmail.com', 'varsha000@gmail.com', '$2y$10$wbHz/fB0sf1SD8GMwb0wue7Yjp3uFvvyuQf5709pca6l9Z56aXKHi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_items`
--
ALTER TABLE `art_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art_uploads`
--
ALTER TABLE `art_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_j_listings`
--
ALTER TABLE `new_j_listings`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_items`
--
ALTER TABLE `art_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `art_uploads`
--
ALTER TABLE `art_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_j_listings`
--
ALTER TABLE `new_j_listings`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
