-- IT0049 TFA3: Forms, Validation, and File Upload
-- MySQL/MariaDB export with the required schema and sample records.

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `full_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20),
  `created_at` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
  (1, 'Andrea Santos', 'andrea.santos@example.com', '0917 204 6813', '2026-09-01 09:15:00'),
  (2, 'Miguel Reyes', 'miguel.reyes@example.com', '0918 775 2194', '2026-09-03 10:40:00'),
  (3, 'Jasmine Lim', 'jasmine.lim@example.com', '0920 613 5528', '2026-09-05 14:05:00'),
  (4, 'Paolo Mendoza', 'paolo.mendoza@example.com', '0921 804 3376', '2026-09-07 16:30:00'),
  (5, 'Nicole Garcia', 'nicole.garcia@example.com', '0922 449 1820', '2026-09-09 11:20:00'),
  (6, 'Carlo Villanueva', 'carlo.villanueva@example.com', '0923 558 7041', '2026-09-11 13:50:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `avatar` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `full_name`, `avatar`, `created_at`) VALUES
  (1, 'admin.kaye', 'Kaye Domingo', NULL, '2026-08-25 08:00:00'),
  (2, 'cashier.anna', 'Anna Cruz', NULL, '2026-08-27 08:30:00'),
  (3, 'cashier.joel', 'Joel Ramos', NULL, '2026-08-29 09:10:00'),
  (4, 'manager.luis', 'Luis Navarro', NULL, '2026-09-02 10:25:00'),
  (5, 'inventory.mia', 'Mia Flores', NULL, '2026-09-06 12:15:00'),
  (6, 'support.enzo', 'Enzo Aquino', NULL, '2026-09-10 15:45:00');

SET FOREIGN_KEY_CHECKS = 1;
