-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 04 2023 г., 11:46
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 19, 12, 'Райан Гослинг, в фильме \"Драйв\"', '2023-08-03 15:13:33', '2023-08-03 15:13:33'),
(2, 19, 10, 'Привет, как дела?', '2023-08-04 06:18:21', '2023-08-04 06:18:21'),
(3, 23, 22, 'Хорошая новость', '2023-08-04 08:13:32', '2023-08-04 08:13:32'),
(4, 23, 22, 'dfgdf', '2023-08-04 08:20:32', '2023-08-04 08:20:32'),
(5, 23, 22, 'dfgfd', '2023-08-04 08:20:34', '2023-08-04 08:20:34'),
(6, 23, 22, 'dfsf', '2023-08-04 08:20:36', '2023-08-04 08:20:36'),
(7, 23, 22, 'Хорошая новость', '2023-08-04 08:13:32', '2023-08-04 08:13:32'),
(8, 23, 22, 'dfgdf', '2023-08-04 08:20:32', '2023-08-04 08:20:32'),
(9, 23, 22, 'dfgfd', '2023-08-04 08:20:34', '2023-08-04 08:20:34'),
(10, 23, 22, 'dfsf', '2023-08-04 08:20:36', '2023-08-04 08:20:36'),
(11, 23, 22, 'dfgfd', '2023-08-04 08:20:34', '2023-08-04 08:20:34'),
(12, 23, 22, 'dfsf', '2023-08-04 08:20:36', '2023-08-04 08:20:36');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `news_id`, `created_at`, `updated_at`) VALUES
(4, 19, 10, '2023-08-04 06:15:37', '2023-08-04 06:15:37'),
(5, 23, 22, '2023-08-04 08:15:44', '2023-08-04 08:15:44');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_08_02_163349_create_news_table', 2),
(10, '2023_08_02_170242_create_comments_table', 2),
(11, '2023_08_04_100835_create_likes_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `description` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `img`, `user_id`, `description`, `short_description`, `likes`, `created_at`, `updated_at`) VALUES
(10, 'Важная информация', '/storage/img/XsAYEnLM3MfVFY6UUwdr19Wtoo4ORxwqP4nD7ZYG.png', 19, 'Это нужно для очистки кэша настроек конфига. Если вы заметили, что ваши временные метки по-прежнему неверны после изменения часового пояса в', 'Есть два способа обновить код. 1. Откройте файл app.php , который находится в каталоге конфигурации вашего проекта. Перейдите на страницу и проверьте часовой пояс приложения , где вы найдете', 2, '2023-08-03 07:19:48', '2023-08-04 08:09:00'),
(12, 'Textus', NULL, 19, 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.\r\n\r\nСуществуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная). Имманентный подход подразумевает отношение к тексту как к автономной', 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.', 0, '2023-08-03 07:49:59', '2023-08-03 07:49:59'),
(13, 'Важная информация', '/storage/img/FNROejXAdTHzTgTKpSBTJWxhPHIo73w6xzLlo443.png', 19, 'Это нужно для очистки кэша настроек конфига. Если вы заметили, что ваши временные метки по-прежнему неверны после изменения часового пояса в', 'Есть два способа обновить код. 1. Откройте файл app.php , который находится в каталоге конфигурации вашего проекта. Перейдите на страницу и проверьте часовой пояс приложения , где вы найдете', 2, '2023-08-03 07:19:48', '2023-08-04 06:15:37'),
(14, 'Зубенко', NULL, 19, 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.\r\n\r\nСуществуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная). Имманентный подход подразумевает отношение к тексту как к автономной', 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.', 0, '2023-08-03 07:49:59', '2023-08-03 07:49:59'),
(15, 'Михаил', '/storage/img/FNROejXAdTHzTgTKpSBTJWxhPHIo73w6xzLlo443.png', 19, 'Это нужно для очистки кэша настроек конфига. Если вы заметили, что ваши временные метки по-прежнему неверны после изменения часового пояса в', 'Есть два способа обновить код. 1. Откройте файл app.php , который находится в каталоге конфигурации вашего проекта. Перейдите на страницу и проверьте часовой пояс приложения , где вы найдете', 2, '2023-08-03 07:19:48', '2023-08-04 06:15:37'),
(16, 'Петрович', '/storage/img/FNROejXAdTHzTgTKpSBTJWxhPHIo73w6xzLlo443.png', 19, 'Это нужно для очистки кэша настроек конфига. Если вы заметили, что ваши временные метки по-прежнему неверны после изменения часового пояса в', 'Есть два способа обновить код. 1. Откройте файл app.php , который находится в каталоге конфигурации вашего проекта. Перейдите на страницу и проверьте часовой пояс приложения , где вы найдете', 2, '2023-08-03 07:19:48', '2023-08-04 06:15:37'),
(17, 'Что такое текст', NULL, 19, 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.\r\n\r\nСуществуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная). Имманентный подход подразумевает отношение к тексту как к автономной', 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.', 0, '2023-08-03 07:49:59', '2023-08-03 07:49:59'),
(18, 'Зубенко', NULL, 19, 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.\r\n\r\nСуществуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная). Имманентный подход подразумевает отношение к тексту как к автономной', 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.', 0, '2023-08-03 07:49:59', '2023-08-03 07:49:59'),
(19, 'Как изменить время', '/storage/img/FNROejXAdTHzTgTKpSBTJWxhPHIo73w6xzLlo443.png', 19, 'Это нужно для очистки кэша настроек конфига. Если вы заметили, что ваши временные метки по-прежнему неверны после изменения часового пояса в', 'Есть два способа обновить код. 1. Откройте файл app.php , который находится в каталоге конфигурации вашего проекта. Перейдите на страницу и проверьте часовой пояс приложения , где вы найдете', 2, '2023-08-03 07:19:48', '2023-08-04 06:15:37'),
(20, 'Ненужная информация', NULL, 19, 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.\r\n\r\nСуществуют две основные трактовки понятия «текст»: имманентная (расширенная, философски нагруженная) и репрезентативная (более частная). Имманентный подход подразумевает отношение к тексту как к автономной', 'Текст (от лат. textus — ткань; сплетение, сочетание) — зафиксированная на каком-либо материальном носителе человеческая мысль; в общем плане связная и полная последовательность символов.', 0, '2023-08-03 07:49:59', '2023-08-03 07:49:59'),
(22, 'Hello world++', '/storage/img/BFlzDnh1a8HXj46F8KrPX2WBUVOcZ9fWE34Le4Zk.jpg', 23, 'Программа, результатом работы которой является вывод на экран или иное устройство фразы «Hello, world!». Также используются вариации с другой пунктуацией или регистром - например, «Hello World». Обычно это первый пример программы в учебниках по программированию, и для многих студентов такая программа является первым опытом при изучении нового языка.', 'Программа, результатом работы которой является вывод на экран или иное устройство фразы «Hello, world!». Также используются вариации с другой пунктуацией или регистром - например, «Hello World', 1, '2023-08-04 07:47:20', '2023-08-04 08:15:44');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'capitan', 'germ4n.budantsev@yandex.ru', '2023-08-02 08:24:57', '$2y$10$2.SG5AO00WlsdPZz.Gho7ezTuBopofZy7o3wdlxeYZb1OH3xSVgu6', 'wFw5N3HvS9rFnbsMRQq2UbATfIJdJdoX5M074BfCfDgNG4GdpwknyH4bjWpr', '2023-08-02 08:23:34', '2023-08-04 07:05:14'),
(23, 'ilians', 'ilya.budantsev@mail.ru', '2023-08-04 07:46:03', '$2y$10$LX16zxdVkklHFFI9dgJ91elnQzF8ThG.boDKCU2wwFg1YdHcbjfq.', 'MESp5xponLmfCD3r0S9jXoxhdpHck4mBTudMx1nP5OUJWaSQQmWVSRnG1wRH', '2023-08-04 07:45:31', '2023-08-04 08:25:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_news_id_foreign` (`news_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_news_id_foreign` (`news_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
