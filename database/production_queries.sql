-- how to get these queries locally
-- $ php artisan migrate:reset
-- $ php artisan migrate --pretend OR $ php.exe artisan migrate --pretend --no-ansi > migrate.sql

-- EXECUTED QUERIES at production
ALTER TABLE `posts` ADD `seen_by_user_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `posts` ADD constraint `posts_seen_by_user_id_foreign` foreign key (`seen_by_user_id`) references `users` (`id`) on delete cascade;

ALTER TABLE `comments` ADD `seen_by_user_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `conversation_id`;
ALTER TABLE `comments` ADD constraint `comments_seen_by_user_id_foreign` foreign key (`seen_by_user_id`) references `users` (`id`) on delete cascade;


-- QUERIES TO BE EXECUTED at production
ALTER TABLE `conversations` ADD `seen_by_user_id` BIGINT UNSIGNED NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `conversations` ADD constraint `conversations_seen_by_user_id_foreign` foreign key (`seen_by_user_id`) references `users` (`id`) on delete cascade;