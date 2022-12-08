CREATE TABLE `careers` (
  `id` INT(20) UNSIGNED PRIMARY KEY,
  `description` VARCHAR(250) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `students` (
  `id` int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(250) NOT NULL,
  `lastname` VARCHAR(250) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `gender` CHAR(1) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `career_id` INT(20) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (career_id) REFERENCES careers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `careers` (`id`, `description`, `created_at`, `updated_at`) VALUES ('101', 'Sistemas Computacionales', '2022-12-07 18:48:27', '2022-12-07 18:48:27'); 
INSERT INTO `careers` (`id`, `description`, `created_at`, `updated_at`) VALUES ('102', 'Contaduría', '2022-12-07 18:48:27', '2022-12-07 18:48:27'); 
INSERT INTO `careers` (`id`, `description`, `created_at`, `updated_at`) VALUES ('103', 'Administración', '2022-12-07 18:48:27', '2022-12-07 18:48:27'); 

INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`, `created_at`, `updated_at`) VALUES ('501', 'Jaime', 'Santos', 'jaime@unach.mx', 'm', '1', '101', '2022-12-14 19:54:51', '2022-12-08 19:54:51'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`, `created_at`, `updated_at`) VALUES ('502', 'Brenda', 'Camacho', 'brenda@unach.mx', 'm', '1', '101', '2022-12-14 19:54:51', '2022-12-08 19:54:51'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`, `created_at`, `updated_at`) VALUES ('503', 'Sofía', 'Pineda', 'sofia@unach.mx', 'f', '1', '102', '2022-12-14 19:54:51', '2022-12-08 19:54:51'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`, `created_at`, `updated_at`) VALUES ('504', 'Jorge', 'Molina', 'jorge@unach.mx', 'm', '1', '103', '2022-12-14 19:54:51', '2022-12-08 19:54:51'); 
INSERT INTO `students` (`id`, `name`, `lastname`, `email`, `gender`, `active`, `career_id`, `created_at`, `updated_at`) VALUES ('505', 'Marcos', 'Grajales', 'marcos@unach.mx', 'm', '1', '103', '2022-12-14 19:54:51', '2022-12-08 19:54:51'); 