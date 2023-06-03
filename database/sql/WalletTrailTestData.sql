-- Dump for WalletTrail

use wallettrail;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
('Test', 'test@test.com', NULL, '$2y$10$VLeaQszoNDbOh1JiSK6TEeYoFJaCNGpS.FXDYtAlWiWjdW5djaro2', NULL, '2022-11-25 17:03:24', '2022-11-25 17:03:24', 2);

-- --------------------------------------------------------

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
('Salary', 2, 1, '2022-11-26 09:18:46', '2022-11-26 15:24:04'),
('Gift', 2, 1, '2022-11-29 06:41:40', '2022-11-29 06:41:40'),
('Rental', 2, 1, '2022-12-06 09:16:26', '2022-12-06 09:16:26'),
('Shopping', 2, 2, '2022-12-06 09:17:14', '2022-12-06 09:17:14'),
('Food', 2, 2, '2022-12-06 09:17:19', '2022-12-06 09:17:19'),
('Grocery', 2, 2, '2022-12-06 09:17:30', '2022-12-06 09:17:30'),
('Gas', 2, 2, '2022-12-06 09:17:37', '2022-12-06 09:17:37'),
('Rent', 2, 2, '2022-12-06 09:17:49', '2022-12-06 09:17:49');

-- --------------------------------------------------------

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`date`, `amount`, `category_id`, `user_id`, `transaction_type`, `created_at`, `updated_at`) VALUES
('2022-11-17', '200', 14, 2, 'expense', '2022-12-06 09:32:45', '2022-12-06 09:32:45'),
('2022-12-02', '100', 17, 2, 'expense', '2022-12-06 09:32:54', '2022-12-06 09:32:54'),
('2022-11-17', '45', 16, 2, 'expense', '2022-12-06 09:33:07', '2022-12-06 09:33:07'),
('2022-12-04', '36', 16, 2, 'expense', '2022-12-06 09:33:20', '2022-12-06 09:33:20'),
('2022-12-01', '600', 18, 2, 'expense', '2022-12-06 09:33:35', '2022-12-06 09:33:35'),
('2022-11-01', '600', 18, 2, 'expense', '2022-12-06 09:33:46', '2022-12-06 09:33:46'),
('2022-11-01', '5000', 1, 2, 'income', '2022-12-06 09:34:17', '2022-12-06 09:34:17'),
('2022-12-01', '5000', 1, 2, 'income', '2022-12-06 09:34:26', '2022-12-06 09:34:26'),
('2022-12-02', '200', 13, 2, 'income', '2022-12-06 09:34:39', '2022-12-06 09:34:39'),
('2022-11-23', '120', 11, 2, 'income', '2022-12-06 09:34:51', '2022-12-06 09:34:51');

-- --------------------------------------------------------

