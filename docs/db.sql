CREATE TABLE `careers` (
  `id` INT(20) UNSIGNED PRIMARY KEY,
  `description` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `students` (
  `id` int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(250) NOT NULL,
  `lastname` VARCHAR(250) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `gender` CHAR(1) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `career_id` INT(20) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (career_id) REFERENCES careers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `careers` (`id`, `description`) VALUES ('101', 'Sistemas Computacionales'); 
INSERT INTO `careers` (`id`, `description`) VALUES ('102', 'Contaduría'); 
INSERT INTO `careers` (`id`, `description`) VALUES ('103', 'Administración'); 

INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`) VALUES ('501', 'Jaime', 'Santos', 'jaime@unach.mx', 'm', '1', '101'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`) VALUES ('502', 'Brenda', 'Camacho', 'brenda@unach.mx', 'm', '1', '101'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`) VALUES ('503', 'Sofía', 'Pineda', 'sofia@unach.mx', 'f', '1', '102'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`) VALUES ('504', 'Jorge', 'Molina', 'jorge@unach.mx', 'm', '1', '103'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`) VALUES ('505', 'Marcos', 'Grajales', 'marcos@unach.mx', 'm', '1', '103'); 