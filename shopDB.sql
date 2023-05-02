-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 08:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `date`, `user`) VALUES
(2, 'Mobiles', '2023-04-19', 1),
(3, 'Electronics', '2023-04-19', 1),
(4, 'Fashion', '2023-04-19', 1),
(5, 'Books', '2023-04-19', 1),
(6, 'Home and kitchen', '2023-04-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(255) NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `feedback`, `date`) VALUES
(3, 'ahmed', 'iifire005@gmail.com', 'What a good website &lt;3', '2023-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `totalPrice` int(11) NOT NULL DEFAULT 0,
  `productId` int(11) NOT NULL DEFAULT 1,
  `quantity` int(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `totalPrice`, `productId`, `quantity`, `status`, `date`) VALUES
(19, 1, 3, 23, 1, 0, '2023-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` char(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(10) DEFAULT 0,
  `image` char(255) NOT NULL DEFAULT 'null.png',
  `date` date NOT NULL,
  `rating` int(1) DEFAULT 0,
  `category` int(255) NOT NULL,
  `seller` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `date`, `rating`, `category`, `seller`) VALUES
(23, 'Brown Sunglasses', 'Introducing our latest sunglasses collection, designed to elevate your style and protect your eyes from harmful UV rays.\r\n\r\nOur sunglasses feature sleek and modern frames crafted from high-quality materials that are both durable and lightweight. The lenses are made from premium polarized materials that reduce glare and enhance visual clarity, providing you with a crisp and clear vision.\r\n\r\nOur collection includes a wide range of styles, from classic aviators to trendy cat-eye frames, ensuring th', 3, 'shop_01.jpg', '2023-04-19', 3, 4, 1),
(25, 'Red Socks', 'Introducing our vibrant and stylish red socks, designed to add a pop of color to any outfit.\r\n\r\nCrafted from high-quality materials, these socks are soft, comfortable, and durable, making them perfect for everyday wear. The bright and bold shade of red will add a touch of personality to your wardrobe, making it easy to stand out from the crowd.\r\n\r\nThese socks are designed to fit most foot sizes, ensuring that they will be a comfortable fit for everyone. The ribbed design on the cuff ensures that', 1, 'shop_04.jpg', '2023-04-19', 5, 4, 1),
(26, 'Men&#039;s Blazer', 'Introducing our sophisticated men&#039;s blazer, perfect for adding a touch of elegance to any outfit.\r\n\r\nCrafted from high-quality materials, this blazer features a sleek and modern design that is both stylish and comfortable. The tailored fit ensures that the blazer will flatter your body shape, providing a sharp and polished look.\r\n\r\nThe blazer features a classic lapel collar, with two button closures that add a touch of sophistication. The pockets on the front of the blazer are both function', 300, 'shop_05.jpg', '2023-04-19', 4, 4, 1),
(27, 'HP Personal Computer', 'Introducing our HP PC, designed to provide you with powerful performance and reliable functionality for all your computing needs.\r\n\r\nOur HP PC is equipped with the latest generation Intel Core processor and plenty of RAM, providing lightning-fast speeds and seamless multitasking capabilities. The high-performance graphics card ensures that you can enjoy stunning visuals and smooth gameplay, whether you&#039;re streaming your favorite movies or playing the latest games.\r\n\r\nThe PC features a sleek', 1000, 'PC.jpg', '2023-04-19', 4, 3, 1),
(28, 'Apple iphone 12 pro max', 'Introducing the Apple iPhone 12 Pro Max, the ultimate smartphone designed to elevate your mobile experience.\r\n\r\nThe iPhone 12 Pro Max boasts a stunning 6.7-inch Super Retina XDR display, providing you with crisp and clear visuals for all your favorite content. The display is protected by Ceramic Shield, making it more durable than ever before.\r\n\r\nThe iPhone 12 Pro Max is powered by the A14 Bionic chip, the fastest chip ever in a smartphone, ensuring that you can seamlessly multitask, play games,', 900, 'iphone-12-pro-max_gold.png', '2023-04-19', 5, 2, 1),
(29, 'Apple iphone 14 Case', 'Introducing the Apple iPhone 14 case, designed to protect and enhance the style of your new phone.\r\n\r\nCrafted from high-quality materials, the iPhone 14 case provides durable protection against scratches, dings, and everyday wear and tear. The case is designed to perfectly fit your iPhone 14, ensuring that all buttons, ports, and features are easily accessible.\r\n\r\nThe case comes in a variety of colors and styles, allowing you to choose the perfect one to match your personal style. Whether you pr', 2, 'images.jpeg', '2023-04-19', 4, 2, 1),
(30, 'Samsung Galaxy Note 20 Ultra (12GB RAM , 128GB)', 'Introducing the Samsung Galaxy Note 20 Ultra, the ultimate smartphone designed to meet all your needs and exceed your expectations.\r\n\r\nWith its 6.9-inch Dynamic AMOLED 2X display, the Galaxy Note 20 Ultra provides stunning visuals with vivid colors and sharp detail. The screen is protected by Corning Gorilla Glass Victus, making it more durable than ever before.\r\n\r\nThe Galaxy Note 20 Ultra is equipped with a powerful Exynos 990 processor and 12GB of RAM, ensuring lightning-fast speeds and seamle', 800, 'samsung_note_20_ultra_white.jpg', '2023-04-19', 5, 2, 1),
(31, 'Gas water heater INFINITY 28e By Rinnai Italia', 'Introducing the Infinity 28e Gas Water Heater by Rinnai Italia, the perfect solution for providing hot water for your home or business.\r\n\r\nThe Infinity 28e features a compact and modern design that blends seamlessly into any environment. With its high-quality construction and advanced technology, it provides reliable and efficient performance for all your hot water needs.\r\n\r\nThe heater is powered by natural gas, providing an endless supply of hot water on demand. With a maximum flow rate of 28 l', 200, 'b_INFINITY-28e-Rinnai-Italia-251150-rel3fba8097.jpg', '2023-04-19', 3, 6, 1),
(32, 'Convection Baking Oven', 'Introducing the Convection Baking Oven, the ultimate kitchen appliance for all your baking needs.\r\n\r\nWith its advanced convection technology, the oven circulates hot air throughout the cavity, ensuring even and consistent baking results. This allows you to bake everything from cookies to cakes to bread with perfect results every time.\r\n\r\nThe oven features a spacious interior that can accommodate large dishes and multiple racks, making it perfect for cooking for large families or entertaining gue', 132, 'Convection_Baking_Oven.jpg', '2023-04-20', 3, 6, 1),
(33, 'Washing Machine 11kg', 'Introducing the Washing Machine 11kg, the perfect solution for all your laundry needs.\r\n\r\nWith its spacious 11kg capacity, this washing machine can handle even the largest loads of laundry, making it perfect for families or individuals with a high volume of laundry to do. And with its energy-efficient design, it helps you save on your energy bills while reducing your carbon footprint.\r\n\r\nThe washing machine features advanced technology that ensures efficient and effective cleaning of your clothe', 323, '31fV-OcNO1L.jpg', '2023-04-20', 4, 6, 1),
(34, 'Upper Steaming Machine (4 Steaming heads / Auto load detection )', 'Introducing the Upper Steaming Machine, the ultimate solution for efficient and convenient steaming of your clothes and fabrics.\r\n\r\nFeaturing four steaming heads, this machine can steam multiple garments at the same time, making it perfect for families or individuals with a high volume of laundry to do. And with its advanced auto load detection feature, it automatically adjusts the steaming time and intensity based on the size and type of fabric, ensuring that your clothes are steamed to perfect', 433, 'steming.png', '2023-04-20', 3, 3, 1),
(35, 'Globe™ Trimmer 2.0', 'Introducing the Globe™ Trimmer 2.0, the ultimate grooming tool for achieving a perfect beard and mustache.\r\n\r\nFeaturing an ergonomic design and a powerful motor, this trimmer delivers smooth and precise trimming, giving you a clean and sharp look every time. The trimmer is also lightweight and easy to handle, making it perfect for grooming on-the-go.\r\n\r\nThe Globe™ Trimmer 2.0 is equipped with advanced features that make trimming easier and more convenient. It features multiple length settings, a', 93, 'BOVEM_Globe_Trimmer_Package_900x-1-600x800.jpg', '2023-04-20', 5, 3, 1),
(36, 'I&#039;m Not Really a Waitress - Suzi Weiss', '&quot;I&#039;m Not Really a Waitress&quot; by Suzi Weiss is a bestselling nail polish color from the popular beauty brand OPI.\r\n\r\nThis iconic shade is a classic deep red with a high-gloss finish that evokes the glamour and sophistication of Hollywood&#039;s golden age. The name &quot;I&#039;m Not Really a Waitress&quot; is a nod to the idea that a woman can be so much more than her job title or social status, and that beauty and style can empower women to feel confident and powerful in any role.', 33, 'book-9781580058193.jpg', '2023-04-20', 4, 5, 1),
(37, 'The Big Book Of... Series by Yuval Zommer', 'The Big Book Of... Series by Yuval Zommer is a delightful collection of educational and entertaining children&#039;s books that explore the natural world and its inhabitants.\r\n\r\nEach book in the series focuses on a different aspect of the animal kingdom, from insects and birds to ocean creatures and jungle beasts. With colorful and detailed illustrations and fun facts and activities, the books are designed to engage children and foster a love of learning and curiosity about the world around them', 20, 'The-Big-Book-of-Beasts-by-Yuval-Zommer-600x800.jpg', '2023-04-20', 3, 5, 1),
(38, 'It Starts With Us Book', '&quot;It Starts With Us&quot; is a powerful and thought-provoking novel by New York Times bestselling author, Janelle Harris.\r\n\r\nThe book tells the story of four women whose lives intersect in unexpected ways as they grapple with the complexities of family, love, and social justice. Set in modern-day America, the novel explores themes of race, identity, and privilege, as the characters navigate the challenges and opportunities presented by their personal and professional lives.\r\n\r\nThrough richly', 18, '3o3JbFmAxH9qYWPpa3fbWF_imagecropper1679144689210.jpg', '2023-04-20', 5, 5, 1),
(39, 'Smart Watch', 'A smartwatch is a wearable device that offers a range of features beyond just telling the time. Typically worn on the wrist, a smartwatch can connect to your smartphone and offer notifications for calls, messages, and other alerts.\r\n\r\nIn addition to basic features, many smartwatches also offer health and fitness tracking, including heart rate monitoring, step counting, and sleep tracking. Some smartwatches also have built-in GPS for tracking workouts or navigation, and can be used to control oth', 101, 'feature_prod_02.jpg', '2023-04-20', 3, 3, 1),
(40, 'Flash Light', 'A flashlight, also known as a torch, is a portable handheld device that emits light from a bulb or LED. Flashlights are used in a variety of settings, from outdoor adventures and camping trips to emergency situations and power outages.\r\n\r\nFlashlights come in different sizes, shapes, and types, from small pocket-sized models to larger and more powerful ones. They are typically powered by batteries, and many models feature rechargeable batteries or USB charging options for added convenience.\r\n\r\nSo', 12, 'feature_prod_01.jpg', '2023-04-20', 3, 3, 1),
(41, 'Camera', 'A camera is a device used to capture images and record videos. Cameras come in many shapes and sizes, from compact point-and-shoot models to professional-grade DSLR (digital single-lens reflex) cameras.\r\n\r\nMost cameras use a lens to focus light onto an image sensor, which captures the image and stores it as a digital file. Some cameras also have built-in flash units or allow for external flash attachment for low light situations.\r\n\r\nCameras also come with a variety of features and settings, incl', 154, 'feature_prod_03.jpg', '2023-04-20', 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `isAdmin` int(1) DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`, `date`) VALUES
(1, 'admin', 'iifire005@gmail.com', '114ba4fb31c1cb028f58ae30a210e66cb7e787fc', 1, '2023-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`user`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `product` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller` (`seller`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `creator` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seller` FOREIGN KEY (`seller`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
