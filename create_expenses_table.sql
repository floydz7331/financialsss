CREATE TABLE `expenses` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
);