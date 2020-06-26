SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+10:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videosales_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `vs_users`
--

CREATE TABLE `vs_users` (
  `userId` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vs_users`
--

INSERT INTO `vs_users` (`userId`, `firstname`, `surname`, `role`, `email`, `password`) VALUES
(1, 'Ethan', 'Admin', 'admin', 'admin@videosales.com.au', '$2y$10$I9BXHiAqnGQp1ynAKgrGQudzuvSAnQDv21V2GJ/K/tf0DexWxaMzi'),
(2, 'Ethan', 'Standard', 'standard', 'user@videosales.com.au', '$2y$10$I9BXHiAqnGQp1ynAKgrGQudzuvSAnQDv21V2GJ/K/tf0DexWxaMzi');

-- --------------------------------------------------------

--
-- Table structure for table `vs_listings`
--

CREATE TABLE `vs_listings` (
  `listingId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `videoUrl` varchar(255) DEFAULT NULL,
  `publicId` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vs_listings`
--

INSERT INTO `vs_listings` (`listingId`, `title`, `price`, `suburb`, `state`, `description`, `videoUrl`, `videoPublicId`, `status`, `categoryId`, `userId`, `created`, `updated`) VALUES
(1, 'Ford Festiva For Sale', '5000.00', 'West Hoxton', 'NSW', '1996 Ford Festiva Trio.', 'https://res.cloudinary.com/demo/video/upload/dog.mp4', '12345', '0', '1', '1', '2020-06-01 09:00:00', NULL),
(2, 'T-Shirt For Sale', '50.00', 'Cecil Hills', 'NSW', 'Premium Custom T-Shirt For Sale', 'https://res.cloudinary.com/demo/video/upload/dog.mp4', '6789', '0', '2', '2', '2020-06-01 09:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vs_categories`
--

CREATE TABLE `vs_categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vs_categories`
--

INSERT INTO `vs_categories` (`categoryId`, `title`, `created`, `updated`) VALUES
(1, 'Cars', '2020-06-01 09:00:00', NULL),
(2, 'Clothes', '2020-06-01 09:01:00', NULL),
(3, 'Electronics', '2020-06-01 09:02:00', NULL),
(4, 'Garden', '2020-06-01 09:03:00', NULL),
(5, 'Kitchen', '2020-06-01 09:04:00', NULL),
(6, 'Other', '2020-06-01 09:05:00', NULL);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `vs_users`
--
ALTER TABLE `vs_users`
  ADD PRIMARY KEY (`userId`);
--
-- Indexes for table `vs_listings`
--
ALTER TABLE `vs_listings`
  ADD PRIMARY KEY (`listingId`);
--
-- Indexes for table `vs_categories`
--
ALTER TABLE `vs_categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vs_users`
--
ALTER TABLE `vs_users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT for table `vs_users`
--
ALTER TABLE `vs_listings`
  MODIFY `listingId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- AUTO_INCREMENT for table `vs_categories`
--
ALTER TABLE `vs_categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vs_listings`
--
ALTER TABLE `vs_listings`
  ADD CONSTRAINT `vs_listings_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `vs_categories` (`categoryId`),
  ADD CONSTRAINT `vs_listings_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `vs_users` (`userId`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
