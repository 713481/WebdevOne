-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 02, 2025 at 12:27 AM
-- Server version: 11.7.2-MariaDB-ubu2404
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `type`, `label`, `value`) VALUES
(1, 'address', 'Our Address', 'Spitsbergen 6, 1505 EH Zaandam, Netherlands'),
(2, 'phone', 'Call Us', '+31 6 12345678'),
(3, 'email', 'Email Us', 'info@restaurantpeking.nl'),
(4, 'opening_hours', 'Opening Hours', 'Monday–Sunday: 12:00–22:00'),
(5, 'map_url', 'Map Location', 'https://www.google.com/maps/place//data=!4m2!3m1!1s0x47c5fd2d0397e705:0xb6ddae7de59393cd?sa=X&ved=1t:8290&ictx=111'),
(6, 'website', 'Visit Our Website', 'https://www.restaurantpeking.nl'),
(7, 'facebook', 'Facebook', 'https://www.facebook.com/restaurantpeking'),
(8, 'instagram', 'Instagram', 'https://www.instagram.com/restaurantpeking');

-- --------------------------------------------------------

--
-- Table structure for table `highlighted_items`
--

CREATE TABLE `highlighted_items` (
  `id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `highlighted_items`
--

INSERT INTO `highlighted_items` (`id`, `menu_item_id`, `position`) VALUES
(7, 11, 1),
(8, 8, 2),
(9, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(6,2) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `allergens` varchar(255) DEFAULT NULL,
  `category_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `discount_price`, `category`, `image_url`, `allergens`, `category_order`) VALUES
(1, 'Loempia met kip', 'Kiploempia met diverse groenten.', 6.00, NULL, 'Starters', '/assets/img/menu/67eb46612c24b-Loempia met kip.jpeg', 'Ei, Gluten, Melk, Mosterd, Selderij, Sesam, Soja, Schelpdieren, Sulfiet', 1),
(2, 'Mini loempia\'s (8 stuks)', 'Kleine loempia\'s met chilisaus.', 6.00, NULL, 'Starters', '/assets/img/menu/67eb4676d8fd4-Mini loempia\'s.jpg', 'Gluten, Melk, Sesam, Soja, Sulfiet', 1),
(3, 'Spring Rolls', 'Crispy rolls stuffed with shredded vegetables, served with sweet chili sauce.', 4.50, NULL, 'Starters', '/assets/img/menu/67eb46a9ede77-Spring Rolls.jpg', 'Gluten, Soy', 1),
(4, 'Peking Duck Pancakes', 'Slices of Peking duck served with hoisin sauce, pancakes, and cucumber.', 9.99, 8.00, 'Starters', '/assets/img/menu/67ec74af06f51-Peking Duck Pancakes.jpg', 'Gluten, Soy', 1),
(5, 'Hot and Sour Soup', 'Spicy and tangy soup with tofu, mushrooms, and bamboo shoots.', 10.50, NULL, 'Starters', '/assets/img/menu/67eb46461e943-Hot and Sour Soup.jpg', 'Soy', 1),
(6, 'Prawn Toast', 'Fried bread topped with minced prawns and sesame seeds.', 6.99, NULL, 'Starters', '/assets/img/menu/67eb46987bf00-Prawn Toast.jpg', 'Gluten, Shellfish, Sesame', 1),
(7, 'Kung Pao Chicken', 'Stir-fried chicken with peanuts, chili peppers, and vegetables in a savory sauce.', 12.99, NULL, 'Main Dishes', '/assets/img/menu/67eb460fc1154-Kung Pao Chicken.jpg', 'Peanuts, Soy', 3),
(8, 'Beef with Broccoli', 'Tender beef slices stir-fried with broccoli in a garlic soy sauce.', 13.99, NULL, 'Main Dishes', '/assets/img/menu/67eb45d15d5d2-Beef with Broccoli.jpg', 'Soy, Gluten', 3),
(9, 'Sweet and Sour Pork', 'Crispy pork pieces coated in a tangy sweet and sour sauce.', 12.50, NULL, 'Main Dishes', '/assets/img/menu/67eb46360b76f-Sweet and Sour Pork.jpg', 'Gluten, Soy', 3),
(10, 'Mapo Tofu', 'Silken tofu in a spicy Sichuan-style sauce with minced pork.', 11.99, NULL, 'Main Dishes', '/assets/img/menu/67eb462416536-Mapo Tofu.webp', 'Soy, Gluten', 3),
(11, 'Chow Mein', 'Stir-fried noodles with chicken, vegetables, and soy sauce.', 11.50, NULL, 'Main Dishes', '/assets/img/menu/67eb45eac4234-Chow Mein.webp', 'Gluten, Soy', 3),
(12, 'Fried Rice', 'Classic fried rice with shrimp, egg, peas, and soy sauce.', 10.99, NULL, 'Main Dishes', '/assets/img/menu/67eb45ffbbe86-Fried Rice.jpg', 'Soy, Egg', 3),
(13, 'Sesame Balls', 'Glutinous rice balls filled with sweet red bean paste and rolled in sesame seeds.', 5.50, NULL, 'Desserts', '/assets/img/menu/67ec750809d78-sesameballs.webp', 'Sesame', 5),
(14, 'Mango Pudding', 'Smooth mango pudding topped with fresh mango slices.', 4.99, NULL, 'Desserts', '/assets/img/menu/67eb450624e4b-mangopudding.jpg', 'Milk', 5),
(15, 'Fried Ice Cream', 'Vanilla ice cream coated in batter and deep-fried.', 7.50, NULL, 'Desserts', '/assets/img/menu/67ec74ffce5e2-fried-ice-cream-3.jpg', 'Gluten, Milk', 5),
(16, 'Jasmine Tea', 'Fragrant jasmine tea served hot.', 2.50, NULL, 'Drinks', '/assets/img/menu/67eb45861c182-Jasmine-Tea-main_600x.webp', 'None', 4),
(17, 'Chrysanthemum Tea', 'Light and floral chrysanthemum tea, served hot or cold.', 2.99, NULL, 'Drinks', '/assets/img/menu/67eb456e71901-Chrysanthemum Tea.jpg', 'None', 4),
(18, 'Plum Juice', 'Sweet and tangy plum juice served chilled.', 3.50, NULL, 'Drinks', '/assets/img/menu/67eb45c0c0d76-Plum Juice.jpg', 'None', 4),
(19, 'Lychee Lemonade', 'Refreshing lemonade infused with lychee syrup.', 3.99, NULL, 'Drinks', '/assets/img/menu/67eb45a1672f5-Lychee Lemonade.webp', 'None', 4),
(37, 'Teriyaki Chicken', 'Teriyaki Chickeeeeeen', 25.00, NULL, 'Main Dishes', '/assets/img/menu/67ec74f0d2614-teriyaki chicken.jpg', 'Chicken, Soy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Alex', 'test@test.nl', 'This is a test message!!', '2025-04-01 01:10:14'),
(2, 'Sophie Bakker', 'sophie@example.com', 'Can I book a table for 4 this Friday evening?', '2025-04-01 01:11:41'),
(3, 'Mark de Vries', 'mark@outlook.com', 'Do you have vegan options?', '2025-03-31 01:11:41'),
(4, 'Emily Janssen', 'emilyj@sample.nl', 'Amazing food last night. Compliments to the chef!', '2025-03-30 01:11:41'),
(5, 'Daan Willems', 'daan@wmail.com', 'I lost my umbrella at your place yesterday. Did someone find it?', '2025-03-29 01:11:41'),
(6, 'Nina Smits', 'nina@xs4all.nl', 'Can I bring my dog to the restaurant terrace?', '2025-03-28 01:11:41'),
(7, 'Tom Peeters', 'tom.p@example.com', 'The reservation system gave me an error. Please assist.', '2025-03-27 01:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `order_time` datetime DEFAULT current_timestamp(),
  `status` enum('open','in progress','served','paid','cancelled') DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_item_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `num_guests` int(11) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `special_request` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `table_id`, `reservation_date`, `reservation_time`, `num_guests`, `status`, `special_request`, `created_at`) VALUES
(1, 2, NULL, '2025-04-01', '18:00:00', 4, 'cancelled', 'Window view', '2025-03-31 21:31:33'),
(2, 2, 9, '2025-04-02', '17:00:00', 4, 'confirmed', 'windows seats please', '2025-03-31 22:05:59'),
(4, 3, 2, '2025-04-05', '18:30:00', 2, 'confirmed', 'Vegetarian menu', '2025-03-31 23:17:54'),
(5, 4, 7, '2025-04-06', '19:00:00', 4, 'confirmed', 'Birthday cake', '2025-03-31 23:17:54'),
(6, 5, NULL, '2025-04-07', '17:30:00', 3, 'pending', '', '2025-03-31 23:17:54'),
(7, 3, 6, '2025-04-03', '20:00:00', 2, 'confirmed', 'Near window if possible', '2025-03-31 23:17:54'),
(8, 4, NULL, '2025-04-08', '18:00:00', 5, 'pending', 'Quiet spot please', '2025-03-31 23:17:54'),
(9, 7, 5, '2025-04-03', '18:00:00', 5, 'confirmed', 'test', '2025-04-01 03:01:52'),
(11, 7, NULL, '2025-04-09', '17:00:00', 4, 'cancelled', 'test', '2025-04-02 00:12:58'),
(12, 7, NULL, '2025-04-10', '18:00:00', 4, 'pending', 'test', '2025-04-02 00:13:21'),
(13, 2, NULL, '2025-04-03', '03:04:00', 6, 'pending', 'test', '2025-04-02 00:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `table_id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(50) DEFAULT 'main hall',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`table_id`, `table_number`, `capacity`, `location`, `description`) VALUES
(1, 1, 2, 'window', 'Cozy 2-person window table. Great for couples.'),
(2, 2, 2, 'main hall', 'Standard 2-person table in the main hall. Easy access to bar and service.'),
(3, 3, 4, 'main hall', 'Spacious 3-person table in the main hall. Near decorative plants.'),
(4, 4, 4, 'main hall', 'Comfortable 4-person table with good lighting in the main hall.'),
(5, 5, 6, 'main hall', 'Ideal for families. 5-person table in the main hall near the entrance.'),
(6, 6, 6, 'terrace', '6-person table on the terrace. Great view and fresh air.'),
(7, 7, 4, 'terrace', 'Terrace table for 4. Shaded and breezy, best for summer days.'),
(8, 8, 2, 'window', 'Window table for 2 with privacy. Preferred by regulars.'),
(9, 9, 8, 'main hall', '8-person table in the main hall. Often used for group reservations.'),
(10, 10, 10, 'private room', 'Private room for 10. Ideal for business meetings or private events.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `message`, `user_id`, `created_at`) VALUES
(9, 'John Doe', 'john.doe@example.com', 'Absolutely loved the food! The flavors were amazing, and the service was top-notch. Will definitely come back again.', 2, '2025-04-02 15:30:00'),
(10, 'Sarah Lee', 'sarah.lee@example.com', 'The ambiance was perfect for a romantic dinner. The staff was friendly, and the food exceeded expectations. Highly recommend the sushi!', 2, '2025-04-02 16:00:00'),
(11, 'Michael Brown', 'michael.brown@example.com', 'A wonderful dining experience. The appetizers were perfect, and the main course was cooked to perfection. A must-try for food lovers!', 2, '2025-04-02 16:30:00'),
(12, 'Emma White', 'emma.white@example.com', 'The dessert was out of this world! We had the chocolate lava cake, and it was to die for. Great experience overall!', 2, '2025-04-02 17:00:00'),
(13, 'Olivia Green', 'olivia.green@example.com', 'Exceptional service and delicious food. The staff made us feel like family. The grilled salmon is a must-try!', 2, '2025-04-02 17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone_number`, `full_name`, `created_at`, `is_verified`, `role`) VALUES
(2, 'test', '$2y$12$OPIrFNRYjAX7pphMbq3SnOkY00tvENn9uM.s2TlpbP0LbBlp6dQo2', 'test@test.nl', '0642198413', 'Alex Tang', '2025-03-30 21:04:44', 0, 'admin'),
(3, 'johndoe', '$2y$10$examplehash1234567890abcdefghijklmnopqrs', 'john@example.com', '0612345678', 'John Doe', '2025-03-31 23:17:49', 1, 'user'),
(4, 'janedoe', '$2y$10$examplehash0987654321abcdefghijklmnopqrs', 'jane@example.com', '0698765432', 'Jane Doe', '2025-03-31 23:17:49', 1, 'user'),
(5, 'mikebrown', '$2y$10$examplehash1928374655abcdefghijklmnop', 'mike@example.com', '0611223344', 'Mike Brown', '2025-03-31 23:17:49', 1, 'user'),
(6, 'robben', '$2y$12$KQTsGOgR5b7gEzH6/yUeAu4EhL0yDsd5UQMqLHaWBdzukG4RsG8yS', 'robben@test.nl', NULL, 'Ro Bben Le', '2025-03-31 23:27:25', 1, 'user'),
(7, 'alex', '$2y$12$2uSf.EkIrerOaaJhiZU66u8PgrISMqjcGwYh7N1s5LolCB1ZgLFsy', 'alex-coco@live.nl', '0678932313', 'alex', '2025-04-01 02:47:04', 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlighted_items`
--
ALTER TABLE `highlighted_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`table_id`),
  ADD UNIQUE KEY `table_number` (`table_number`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `highlighted_items`
--
ALTER TABLE `highlighted_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `highlighted_items`
--
ALTER TABLE `highlighted_items`
  ADD CONSTRAINT `highlighted_items_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `restaurant_table` (`table_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
