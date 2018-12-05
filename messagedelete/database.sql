



CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picpath` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `howlong` int(11) NOT NULL,
  `read` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

