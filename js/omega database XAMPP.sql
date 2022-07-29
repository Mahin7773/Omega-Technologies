-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 11:52 AM
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
-- Database: `omega`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `username`, `message`, `time`) VALUES
(7, 'mahin7773', 'hello', '2022-07-20 08:24:19'),
(8, 'mahin7773', 'confirm my order please', '2022-07-20 08:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `location`, `item`, `quantity`, `price`, `total`) VALUES
(2, 'mahin7773', 'bangladesh', 'Intel Core i7 12700k 12th gen Processor (Unlocked)', 1, 40000, 40000),
(3, 'mahin7773', 'bangladesh', 'Intel Core i9 12900k 12th gen Processor (Unlocked)', 1, 65000, 65000),
(6, 'mahin7773', 'khulna', 'Intel Core i5 12400 12th gen Processor', 1, 18500, 18500),
(7, 'mahin7773', 'khulna', 'Intel Core i7 12700k 12th gen Processor (Unlocked)', 1, 40000, 40000),
(8, 'mahin7773', 'khulna', 'Intel Core i9 12900k 12th gen Processor (Unlocked)', 1, 65000, 65000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `name`, `image`, `price`, `description`) VALUES
(1, 'processor', 'Intel Core i5 12400 12th gen Processor', 'images/i5.jpg', 18500, '6 core$12 threads$65W TDP'),
(2, 'processor', 'Intel Core i7 12700k 12th gen Processor (Unlocked)', 'images/i7.webp', 40000, '12 cores (8p+4e)$20 threads$125W TDP'),
(3, 'processor', 'Intel Core i9 12900k 12th gen Processor (Unlocked)', 'images/i9.webp', 65000, '16 cores(8p+8e)$24 threads$125W TDP'),
(4, 'processor', 'AMD Ryzen 5 5600x', 'images/5600x.jpg', 20000, '6 core$12 threads$65W TDP'),
(5, 'processor', 'AMD Ryzen 7 5800x', 'images/5800x.jpg', 45000, '8 core$16 threads$95W TDP'),
(6, 'cooler', 'Cooler Master Hyper 212 Evo Air Cooler', 'images/hyper212.jpg', 2500, 'Support for AM4,LGA-1151,LGA-1200$120 x 84 x 160 mm (L*H*W)$468g(heatsink)+166g(fan)'),
(7, 'cooler', 'Noctua NH-D15 Chromax Premium Black CPU Cooler', 'images/nh-d15.webp', 9500, 'Support for AM4,LGA-1151,LGA-1700$6 heatpipes$165 x 150 x 161 mm (L*H*W)'),
(8, 'cooler', 'NZXT Kraken X53 RGB 240mm All-in-One Liquid CPU Cooler', 'images/kraken-x53.jpg', 15500, '2 x Aer RGB 2 120 Fans$Fan Speed: 500 - 1,500 + 300 RPM$Compatible with Intel and AMD'),
(9, 'motherboard', 'Asus Prime Z690-A Intel 12th Gen ATX Motherboard', 'images/z690.jpg', 30500, 'Intel LGA 1700 socket: Ready for 12th Gen Intel processors$16+1 DrMOS, ProCool sockets$Supports DDR5 memory, PCIe 5.0$Large VRM heatsinks, M.2 heatsinks'),
(10, 'motherboard', 'Gigabyte X570S AERO G AMD ATX Motherboard', 'images/x570s.jpg', 34000, 'Support Ryzen 5000, 4000G, 3000, 3000G, 2000, 2000G series processors$Dual-Channel DDR4 memory, 4 DIMMs$NVMe PCIe x4 M.2 connectors'),
(11, 'ram', 'Corsair DOMINATOR PLATINUM RGB 32GB (2x16GB) DDR5 5600MHz C36 RAM Kit White', 'images/dominator.jpg', 40000, 'Memory Type: DDR5$Memory Size: 32GB (2x16GB)$Number of Pins: 288 Pin$Latency: 36-36-36-76'),
(12, 'ram', 'Corsair VENGEANCE RGB PRO 32GB (2 x 16GB) DDR4 3200MHz C16 RAM Kit', 'images/vengeance.jpg', 14500, 'Memory Size: 32GB (2 x 16GB)$Memory Type: DDR4$Bus Speed(MHz) 3200MHz$Number of Pins: 288 Pin'),
(13, 'hdd', 'Seagate Internal 1TB SATA Barracuda HDD', 'images/seagate.jpg', 3800, 'Capacity:1TB$Interface: SATA 6Gb/s$Latency Average: 6Gb/s$Rotational Speed: 7200 RPM'),
(14, 'hdd', 'Western Digital 2TB Blue Desktop HDD', 'images/wd.jpg', 5200, 'Capacity: 2000 GB$Interface: SATA 6 Gb/s$Rotational Speed: RPM- 5400'),
(15, 'ssd', 'Samsung 980 Pro 500GB PCIe 4.0 M.2 NVMe SSD', 'images/980-pro.jpg', 10450, 'Capacity: 500GB, Form Factor M.2$Interface Type: PCIe 4.0 x4$Read Speed: Up to 7,000 MB/s$Write Speed: Up to 5,100 MB/s'),
(16, 'ssd', 'Samsung 970 EVO Plus NVMe M.2 250GB SSD', 'images/970-plus.png', 5100, 'Capacity 250GB$Form Factor M.2 (2280)$Interface PCIe Gen 3.0 x 4, NVMe 1.3'),
(17, 'gpu', 'ASUS ROG Strix NVIDIA GeForce RTX 3090 OC Edition 24GB Gaming Graphics Card', 'images/rtx-3090.jpg', 275000, 'NVIDIA Ampere Streaming Multiprocessors$2nd Gen RT Cores & 3rd Gen Tensor Cores$Axial-tech Fan Design, 2.9-slot$Super Alloy Power II, GPU Tweak II'),
(18, 'gpu', 'Asus TUF Gaming RTX 3070 OC Edition 8GB GDDR6 Graphics Card', 'images/rtx-3070.jpg', 95000, 'NVIDIA Ampere Streaming Multiprocessors$2nd Gen RT & 3rd Gen Tensor Cores$Axial-tech Fan Design, GPU Tweak II$Military-grade Capacitors'),
(19, 'gpu', 'ASUS Dual GeForce RTX 3050 OC Edition 8GB GDDR6 Graphics Card', 'images/rtx-3050.jpg', 52500, 'Boost Clock: 1852 MHz (OC mode)/1822 MHz (Gaming mode)$Memory Speed: 14 Gbps$Output: 1x HDMI 2.1, 3x DP 1.4a$Axial-tech fan design'),
(20, 'psu', 'Corsair RM850x 850Watt 80 Plus Gold Certified Power Supply White', 'images/rm-850x.jpg', 14500, 'Elegant White Colored PSU Casing$100% premium hi-end CAPACITORS$Zero RPM Fan Mode'),
(21, 'psu', 'Cooler Master MWE Gold 750 V2 Full Modular 750W 80 Plus Gold Power Supply', 'images/750w.jpg', 10200, '80 Plus Gold Efficiency, 2 EPS Connectors$120mm HDB Fan$High Temperature Resilience$Full Modular Cabling'),
(22, 'casing', 'Gigabyte C200 Glass Mid Tower Casing', 'images/c200.jpg', 4200, 'Type: Mid Tower$Motherboard: mini-ITX/m-ATX/ATX$PSU Shroud Design$Tempered Glass Front panel'),
(23, 'casing', 'Lian Li O11 Dynamic XL ROG Certified Full Tower Case (Black)', 'images/o11dxl.jpg', 18500, 'Supported Motherboard: E-ATX/ ATX/ M-ATX/ ITX$Tempered Glass: 4.0mm (Left and Front)$GPU: 446 mm, PSU: 220 mm (max 280mm)$6 x 2.5\" Drive Bays'),
(24, 'fan', 'Corsair LL120 RGB 120mm Dual Light Loop White', 'images/ll120.jpg', 8000, 'Fan speed: 360 RPM to 2,200 RPM$Dual RGB Lighting Loop$Striking White Housing$Complete PWM Control'),
(25, 'fan', 'Noctua NF-A12x25 Premium Quiet Cooling Fan', 'images/nf-a12.jpg', 2000, 'Fan Size : 120x120x25 mm$4 Pin PWM$Speed : 2000 RPM$Includes anti-vibration mounts'),
(26, 'monitor', 'ASUS TUF Gaming VG30VQL1A 29.5\" HDR Ultrawide Curved Monitor', 'images/vg30vql1a.jpg', 48300, 'Display: 29.5Inch WFHD (2560 x 1080)$Refresh Rate: 200 Hz$Response Time: 4ms(GtG), 1ms(MPRT)$Curvature: 1500R'),
(27, 'monitor', 'ASUS ProArt PA247CV 23.8\" FHD IPS LED Professional Monitor', 'images/pa247cv.jpg', 41000, '23.8-inch Full HD (1920 x 1080) LED backlight display$Calman Verified with factory calibrated$75Hz refresh rate and Adaptive-Sync technology$Ergonomic stand design'),
(28, 'monitor', 'BenQ GW2480 24 inch Full HD Eye-Care Business IPS Monitor', 'images/gw2480.jpg', 20200, 'Stunning FHD (1920x1080) Display$Wide Viewing Angle IPS Panel$Edge to Edge Slim Bezel Design$Brightness Intelligence Technology'),
(30, 'processor', 'i3 10100', 'images/i3.jpg', 10200, 'klsdfklasdfksdf$kasdfklsdfk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'mahin7773', 'mahinmtk65@gmail.com', '1234'),
(2, 'admin', 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`item`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`,`price`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item`) REFERENCES `products` (`name`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
