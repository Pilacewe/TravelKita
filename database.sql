-- Database: `database`
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `database`;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Default Admin User (username: admin, password: admin123)
INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$UQT/pmcsXVnlh8dcN8uSS.buvk3BNtsGZ7D1VfQrxcnSVZL70EHAq', 'admin')
ON DUPLICATE KEY UPDATE `id`=`id`;

-- Table structure for table `packages`
CREATE TABLE IF NOT EXISTS `packages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `destination` VARCHAR(255) NOT NULL,
  `price` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `transactions`
CREATE TABLE IF NOT EXISTS `transactions` (
  `ID` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `alamat` TEXT NOT NULL,
  `nomor_handphone` VARCHAR(50) NOT NULL,
  `price` INT NOT NULL,
  `destination` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `history_transaction_hotel`
CREATE TABLE IF NOT EXISTS `history_transaction_hotel` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `hotel_name` VARCHAR(255) NOT NULL,
  `nama_lengkap` VARCHAR(255) NOT NULL,
  `nohp` VARCHAR(50) NOT NULL,
  `alamat` TEXT NOT NULL,
  `checkin_date` VARCHAR(50) NOT NULL,
  `checkout_date` VARCHAR(50) NOT NULL,
  `total_price` INT NOT NULL,
  `payment_method` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `history_transaction_pesawat`
CREATE TABLE IF NOT EXISTS `history_transaction_pesawat` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `airline` VARCHAR(255) NOT NULL,
  `destination` VARCHAR(255) NOT NULL,
  `customer_name` VARCHAR(255) NOT NULL,
  `seats` INT NOT NULL,
  `price` INT NOT NULL,
  `total_price` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table structure for table `history_transaction_kereta`
CREATE TABLE IF NOT EXISTS `history_transaction_kereta` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `destination` VARCHAR(255) NOT NULL,
  `customer_name` VARCHAR(255) NOT NULL,
  `seats` INT NOT NULL,
  `price` INT NOT NULL,
  `total_price` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

