-- Run this only when upgrading an existing TFA2 database manually.
USE `it0049_pos`;

ALTER TABLE `users`
  ADD COLUMN `avatar` VARCHAR(255) NULL AFTER `full_name`;
