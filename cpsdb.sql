-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 06:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `title`, `submission_deadline`, `conference_date`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 'Teaching computer - Premier University - 2022', '2022-10-27', '2022-11-03', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(2, 'Social Experiment - Premier University - 2022', '2022-11-03', '2022-11-10', 1, '2022-10-13 09:55:03', '2022-10-13 09:55:03'),
(3, 'The pulse of the computer - 2022', '2022-10-25', '2022-11-03', 2, '2022-10-13 10:01:07', '2022-10-13 10:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(46, '2022_10_02_112140_create_users_table', 1),
(47, '2022_10_02_112310_create_universities_table', 1),
(48, '2022_10_02_112334_create_conferences_table', 1),
(49, '2022_10_02_112350_create_tracks_table', 1),
(50, '2022_10_02_131325_create_university_admins_table', 1),
(51, '2022_10_06_163722_create_submissions_table', 1),
(52, '2022_10_11_200456_create_reviewer_infos_table', 1),
(53, '2022_10_12_152932_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `reviewer_infos`
--

CREATE TABLE `reviewer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_user_id` bigint(20) UNSIGNED NOT NULL,
  `expert_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_user_id` bigint(20) UNSIGNED NOT NULL,
  `review_submission_id` bigint(20) UNSIGNED NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review_user_id`, `review_submission_id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 'We are from Premier University, Chittagong', '2022-10-13 10:51:51', '2022-10-13 10:51:51'),
(2, 13, 3, 'We are from Premier University, Chittagong', '2022-10-13 10:53:27', '2022-10-13 10:53:27'),
(3, 13, 4, 'We are from Premier University, Chittagong', '2022-10-13 10:53:35', '2022-10-13 10:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `submissions_conference_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `title`, `abstract`, `tags`, `file_name`, `track_id`, `user_id`, `submissions_conference_id`, `created_at`, `updated_at`) VALUES
(1, 'A Perspective on Range Finding Techniques for Computer Vision', 'In recent times a great deal of interest has been shown, amongst the computer vision and robotics research community, in the acquisition of range data for supporting scene analysis leading to remote (noncontact) determination of configurations and space filling extents of three-dimensional object assemblages. This paper surveys a variety of approaches to generalized range finding and presents a perspective on their applicability and shortcomings in the context of computer vision studies.', 'Computer vision, Layout , Humans, Stereo vision, Convergence', '1665678103_A Perspective on Range Finding Techniques for Computer Vision.pdf', 2, 9, 1, '2022-10-13 16:21:43', '2022-10-13 16:21:43'),
(2, 'From information security to cyber security', 'The term cyber security is often used interchangeably with the term information security. This paper argues that, although there is a substantial overlap between cyber security and information security, these two concepts are not totally analogous. Moreover, the paper posits that cyber security goes beyond the boundaries of traditional information security to include not only the protection of information resources, but also that of other assets, including the person him/herself. In information security, reference to the human factor usually relates to the role(s) of humans in the security process. In cyber security this factor has an additional dimension, namely, the humans as potential targets of cyber attacks or even unknowingly participating in a cyber attack. This additional dimension has ethical implications for society as a whole, since the protection of certain vulnerable groups, for example children, could be seen as a societal responsibility.', 'Information security, Cyber security, Cybersecurity, Cyber-Security, Computer security, Risk Threat, Vulnerability', '1665678320_From information security to cyber security.pdf', 13, 9, 3, '2022-10-13 16:25:20', '2022-10-13 16:25:20'),
(3, 'Matrix Organization: A Social Experiment', 'A social experiment was used to assess the effects of matrix structure on organizational processes, role perceptions, and work attitudes. Tests of hypotheses employed a nonequivalent control group design with statistical procedures simulating a complementary, quasi-experimental design termed treatment-effect correlations. Implementing matrix structure caused predicted increases in the quantity of communications, but decreased the quality of these communications. Negative effects on relevant role perceptions, work attitudes, and coordination also occurred. Implications of these findings are discussed in relation to the literature on matrix organization, and suggestions for further research are advanced.', 'Social Experiment, Marketing', '1665679467_Matrix Organization A Social Experiment.pdf', 7, 10, 2, '2022-10-13 16:44:27', '2022-10-13 16:44:27'),
(4, 'COUNSELING AND MONITORING OF UNEMPLOYED WORKERS: THEORY AND EVIDENCE FROM A CONTROLLED SOCIAL EXPERIMENT', 'We investigate the effect of counseling and monitoring on the individual transition rate to employment. We theoretically analyze these policies in a job search model with two search channels and endogenous search effort. In the empirical analysis we use unique administrative and survey data concerning a social experiment with full randomization and compliance. The results do not provide evidence that counseling and monitoring affect the exit rate to work. Monitoring causes a shift from informal to formal job search. We combine our empirical results with the results from our theoretical analysis and the existing empirical literature, to establish a comprehensive analysis of the effectiveness of these policies.', 'COUNSELING, MONITORING', '1665679691_THEORY AND EVIDENCE FROM A CONTROLLED SOCIAL EXPERIMENT.pdf', 9, 11, 2, '2022-10-13 16:48:11', '2022-10-13 16:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `conference_id`, `created_at`, `updated_at`) VALUES
(1, 'Natural language processing', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(2, 'Computer vision', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(3, 'Neural network', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(4, 'Machine Learning', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(5, 'Artificial Intelligence', 1, '2022-10-13 09:50:12', '2022-10-13 09:50:12'),
(6, 'Attachment theory', 2, '2022-10-13 09:55:03', '2022-10-13 09:55:03'),
(7, 'Corporal punishment and criminal activity', 2, '2022-10-13 09:55:03', '2022-10-13 09:55:03'),
(8, 'Persuasion in modern advertisement', 2, '2022-10-13 09:55:03', '2022-10-13 09:55:03'),
(9, 'Cognitive dissonance', 2, '2022-10-13 09:55:04', '2022-10-13 09:55:04'),
(10, 'Quantum System', 3, '2022-10-13 10:01:07', '2022-10-13 10:01:07'),
(11, 'Distributed Computing', 3, '2022-10-13 10:01:07', '2022-10-13 10:01:07'),
(12, 'Parallel Computing', 3, '2022-10-13 10:01:07', '2022-10-13 10:01:07'),
(13, 'Cyber Security', 3, '2022-10-13 10:01:07', '2022-10-13 10:01:07'),
(14, 'Cloud Computing', 3, '2022-10-13 10:01:07', '2022-10-13 10:01:07'),
(15, 'Internet of Things', 3, '2022-10-13 10:01:08', '2022-10-13 10:01:08'),
(16, 'Big Data Analytics', 3, '2022-10-13 10:01:08', '2022-10-13 10:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Premier University, Chittagong', 'Prabartak Circle, 1/A O.R. Nizam Rd, Chattogram 4203', 2, '2022-10-13 15:37:22', '2022-10-13 15:37:22'),
(2, 'University of Chittagong', 'Chittagong University Rd, 4331', 3, '2022-10-13 15:38:24', '2022-10-13 15:38:24'),
(3, 'University of Dhaka', 'Nilkhet Rd, Dhaka 1000', 4, '2022-10-13 15:39:02', '2022-10-13 15:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `university_admins`
--

CREATE TABLE `university_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_admins`
--

INSERT INTO `university_admins` (`id`, `user_id`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-10-13 15:37:22', '2022-10-13 15:37:22'),
(2, 3, 2, '2022-10-13 15:38:24', '2022-10-13 15:38:24'),
(3, 4, 3, '2022-10-13 15:39:03', '2022-10-13 15:39:03'),
(6, 7, 1, '2022-10-13 15:44:19', '2022-10-13 15:44:19'),
(7, 8, 2, '2022-10-13 15:56:32', '2022-10-13 15:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@papercut.com', '6358f9d2cd004e8abe72021c8aa4983412ba860c', 'admin', '2022-10-13 14:35:13', '2022-10-13 14:35:13'),
(2, 'PUC', 'puc@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-13 15:37:22', '2022-10-13 15:37:22'),
(3, 'CU', 'cu@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-13 15:38:24', '2022-10-13 15:38:24'),
(4, 'DU', 'du@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-13 15:39:02', '2022-10-13 15:39:02'),
(7, 'PUC - A', 'puc.a@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-13 09:44:19', '2022-10-13 09:44:19'),
(8, 'CU - A', 'cu.a@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-13 09:56:32', '2022-10-13 09:56:32'),
(9, 'Mohiuddin Tamim', 'mohiuhere@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-13 16:03:19', '2022-10-13 16:03:19'),
(10, 'Zubayer Bin Rashid', 'zubayer@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-13 16:03:49', '2022-10-13 16:03:49'),
(11, 'Omi Biswas', 'omi@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-13 16:04:29', '2022-10-13 16:04:29'),
(12, 'Anik Sen', 'aniksen@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-13 16:12:07', '2022-10-13 16:12:07'),
(13, 'Minhaj Hossain', 'minhajhossain@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-13 16:13:16', '2022-10-13 16:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conferences_university_id_foreign` (`university_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviewer_infos`
--
ALTER TABLE `reviewer_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewer_infos_reviewer_user_id_foreign` (`reviewer_user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_review_user_id_foreign` (`review_user_id`),
  ADD KEY `reviews_review_submission_id_foreign` (`review_submission_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_track_id_foreign` (`track_id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`),
  ADD KEY `submissions_submissions_conference_id_foreign` (`submissions_conference_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_conference_id_foreign` (`conference_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universities_user_id_foreign` (`user_id`);

--
-- Indexes for table `university_admins`
--
ALTER TABLE `university_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_admins_user_id_foreign` (`user_id`),
  ADD KEY `university_admins_university_id_foreign` (`university_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer_infos`
--
ALTER TABLE `reviewer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_admins`
--
ALTER TABLE `university_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `reviewer_infos`
--
ALTER TABLE `reviewer_infos`
  ADD CONSTRAINT `reviewer_infos_reviewer_user_id_foreign` FOREIGN KEY (`reviewer_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_review_submission_id_foreign` FOREIGN KEY (`review_submission_id`) REFERENCES `submissions` (`id`),
  ADD CONSTRAINT `reviews_review_user_id_foreign` FOREIGN KEY (`review_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_submissions_conference_id_foreign` FOREIGN KEY (`submissions_conference_id`) REFERENCES `conferences` (`id`),
  ADD CONSTRAINT `submissions_track_id_foreign` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`id`),
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `university_admins`
--
ALTER TABLE `university_admins`
  ADD CONSTRAINT `university_admins_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `university_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
