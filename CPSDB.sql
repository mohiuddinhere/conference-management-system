-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2022 at 04:47 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CPSDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `title`, `submission_deadline`, `conference_date`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 'Technology and Computer science 2022', '2022-11-23', '2022-11-30', 1, '2022-11-11 09:52:05', '2022-11-11 09:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `markings`
--

CREATE TABLE `markings` (
  `id` bigint UNSIGNED NOT NULL,
  `result_adequate` int NOT NULL,
  `contribution` int NOT NULL,
  `literature_review` int NOT NULL,
  `review_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marking_submission_id` bigint UNSIGNED NOT NULL,
  `marking_review_user_id` bigint UNSIGNED NOT NULL,
  `marking_conference_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markings`
--

INSERT INTO `markings` (`id`, `result_adequate`, `contribution`, `literature_review`, `review_status`, `marking_submission_id`, `marking_review_user_id`, `marking_conference_id`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 5, 'Accepted', 1, 12, 1, NULL, NULL),
(2, 4, 5, 4, 'PartiallyAccepted', 1, 13, 1, NULL, NULL),
(3, 3, 4, 3, 'Rejected', 2, 14, 1, NULL, NULL),
(4, 3, 3, 3, 'Rejected', 2, 13, 1, NULL, NULL),
(5, 3, 4, 5, 'Accepted', 1, 15, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(39, '2022_10_02_112140_create_users_table', 1),
(40, '2022_10_02_112310_create_universities_table', 1),
(41, '2022_10_02_112334_create_conferences_table', 1),
(42, '2022_10_02_112350_create_tracks_table', 1),
(43, '2022_10_02_131325_create_university_admins_table', 1),
(44, '2022_10_06_163722_create_submissions_table', 1),
(45, '2022_10_11_200456_create_reviewer_infos_table', 1),
(46, '2022_10_12_152932_create_reviews_table', 1),
(47, '2022_10_13_190825_create_markings_table', 1),
(48, '2022_11_07_051730_create_unique_identifiers_table', 1),
(49, '2022_11_08_173529_create_submission_teams_table', 1),
(50, '2022_11_10_065923_create_results_table', 1),
(52, '2022_11_12_130544_create_traffic_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint UNSIGNED NOT NULL,
  `submission_result_id` bigint UNSIGNED NOT NULL,
  `review_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `submission_result_id`, `review_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'accepted', NULL, NULL),
(2, 2, 'rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_infos`
--

CREATE TABLE `reviewer_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `reviewer_user_id` bigint UNSIGNED NOT NULL,
  `expert_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `review_user_id` bigint UNSIGNED NOT NULL,
  `review_submission_id` bigint UNSIGNED NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review_user_id`, `review_submission_id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 13, 1, '12/09/2022', '2022-11-11 11:13:11', '2022-11-11 11:13:11'),
(2, 12, 1, '12/09/2022', '2022-11-11 11:14:50', '2022-11-11 11:14:50'),
(3, 13, 2, '12/09/2022', '2022-11-11 11:15:13', '2022-11-11 11:15:13'),
(4, 14, 2, '12/09/2022', '2022-11-11 11:15:31', '2022-11-11 11:15:31'),
(5, 15, 1, '12/09/2022', '2022-11-12 04:47:48', '2022-11-12 04:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `submissions_conference_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `title`, `abstract`, `tags`, `file_name`, `track_id`, `user_id`, `submissions_conference_id`, `created_at`, `updated_at`) VALUES
(1, 'Compiler transformations for high-performance computing', 'In the last three decades a large number of compiler transformations for optimizing programs have been implemented. Most optimizations for uniprocessors reduce the number of instructions executed by the program using transformations based on the analysis of scalar quantities and data-flow techniques. In contrast, optimizations for high-performance superscalar, vector, and parallel processors maximize parallelism and memory locality with transformations that rely on tracking the properties of arrays using loop dependence analysis.\r\nThis survey is a comprehensive overview of the important high-level program restructuring techniques for imperative languages, such as C and Fortran. Transformations for both sequential and various types of parallel architectures are covered in depth. We describe the purpose of each transformation, explain how to determine if it is legal, and give an example of its application.\r\n\r\nProgrammers wishing to enhance the performance of their code can use this survey to improve their understanding of the optimizations that compilers can perform, or as a reference for techniques to be applied manually. Students can obtain an overview of optimizing compiler technology. Compiler writers can use this survey as a reference for most of the important optimizations developed to date, and as bibliographic reference for the details of each optimization. Readers are expected to be familiar with modern computer architecture and basic program compilation techniques.', 'Compiler,High-performance,Program Compilation', '1668183534_1903610201763_CN.pdf', 1, 6, 1, '2022-11-11 16:18:54', '2022-11-11 16:18:54'),
(2, 'Recent Developments in High Performance Computing for Remote Sensing', 'Remote sensing data have become very widespread in recent years, and the exploitation of this technology has gone from developments mainly conducted by government intelligence agencies to those carried out by general users and companies. There is a great deal more to remote sensing data than meets the eye, and extracting that information turns out to be a major computational challenge. For this purpose, high performance computing (HPC) infrastructure such as clusters, distributed networks or specialized hardware devices provide important architectural developments to accelerate the computations related with information extraction in remote sensing. In this paper, we review recent advances in HPC applied to remote sensing problems; in particular, the HPC-based paradigms included in this review comprise multiprocessor systems, large-scale and heterogeneous networks of computers, grid and cloud computing environments, and hardware systems such as field programmable gate arrays (FPGAs) and graphics processing units (GPUs). Combined, these parts deliver a snapshot of the state-of-the-art and most recent developments in those areas, and offer a thoughtful perspective of the potential and emerging challenges of applying HPC paradigms to remote sensing problems.', 'Cloud, distributed computing infrastructures (DCIs),field programmable gate arrays (FPGAs), graphics processing units (GPUs), high performance computing (HPC)', '1668186150_77726.255163.pdf', 2, 8, 1, '2022-11-11 17:02:30', '2022-11-11 17:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `submission_teams`
--

CREATE TABLE `submission_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_teams_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_teams_orcidID` bigint UNSIGNED NOT NULL,
  `submission_paper_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submission_teams`
--

INSERT INTO `submission_teams` (`id`, `name`, `submission_teams_email`, `submission_teams_orcidID`, `submission_paper_id`, `created_at`, `updated_at`) VALUES
(1, 'Zubayer Bin Rashid', 'zubayer102019@gmail.com', 4973275262465512, 1, NULL, NULL),
(2, 'Omi Biswas', 'amibiswas9999@gmail.com', 6138311986327433, 1, NULL, NULL),
(3, 'Mohiuddin Tamim', 'mohiuddintamim999@gmail.com', 4295095562540451, 1, NULL, NULL),
(4, 'Moinul Ehtesam', 'ehtesam0@gmail.com', 8056258908906585, 2, NULL, NULL),
(5, 'Mohiuddin Tamim', 'mohiuddintamim999@gmail.com', 4295095562540451, 2, NULL, NULL),
(6, 'Zubayer Bin Rashid', 'zubayer102019@gmail.com', 4973275262465512, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `conference_id`, `created_at`, `updated_at`) VALUES
(1, 'High-performance computing', 1, '2022-11-11 09:52:06', '2022-11-11 09:52:06'),
(2, 'Software engineering and programming', 1, '2022-11-11 09:52:06', '2022-11-11 09:52:06'),
(3, 'AI and robotics', 1, '2022-11-11 09:52:06', '2022-11-11 09:52:06'),
(4, 'Role of human-computer interaction', 1, '2022-11-11 09:52:06', '2022-11-11 09:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_logs`
--

CREATE TABLE `traffic_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traffic_logs`
--

INSERT INTO `traffic_logs` (`id`, `user_id`, `created_at`) VALUES
(1, 1, '2022-11-12 14:03:33'),
(2, 2, '2022-11-12 14:04:49'),
(3, 6, '2022-11-12 14:05:04'),
(4, 1, '2022-11-12 14:05:21'),
(5, 1, '2022-11-12 14:43:27'),
(6, 1, '2022-11-12 14:45:33'),
(7, 1, '2022-11-12 14:47:09'),
(8, 6, '2022-11-12 15:19:20'),
(9, 1, '2022-11-12 15:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `unique_identifiers`
--

CREATE TABLE `unique_identifiers` (
  `id` bigint UNSIGNED NOT NULL,
  `users_uniqueIdentifier_id` bigint UNSIGNED NOT NULL,
  `author_orcidID` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unique_identifiers`
--

INSERT INTO `unique_identifiers` (`id`, `users_uniqueIdentifier_id`, `author_orcidID`, `created_at`, `updated_at`) VALUES
(1, 6, 4295095562540451, NULL, NULL),
(2, 7, 6138311986327433, NULL, NULL),
(3, 8, 4973275262465512, NULL, NULL),
(4, 9, 8056258908906585, NULL, NULL),
(5, 10, 7824983813077847, NULL, NULL),
(6, 11, 1497470825859187, NULL, NULL),
(7, 16, 1416647825456304, NULL, NULL),
(8, 17, 8002216104462189, NULL, NULL),
(9, 18, 7587318191487970, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Premier University, Chittagong', 'Prabartak Circle, 1/A O.R. Nizam Rd, Chattogram 4203', 2, '2022-11-11 15:41:56', '2022-11-11 15:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `university_admins`
--

CREATE TABLE `university_admins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `university_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_admins`
--

INSERT INTO `university_admins` (`id`, `user_id`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-11-11 15:41:56', '2022-11-11 15:41:56'),
(3, 4, 1, '2022-11-11 15:44:47', '2022-11-11 15:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', '2022-10-13 15:39:47', '2022-11-11 15:39:47'),
(2, 'PUC - Admin', 'puc@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-11-10 15:41:56', '2022-11-11 15:41:56'),
(4, 'PUC - Admin2', 'puc2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-28 09:44:47', '2022-11-11 09:44:47'),
(6, 'Mohiuddin Tamim', 'mohiuddintamim999@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-03 15:57:02', '2022-11-11 15:57:02'),
(7, 'Omi Biswas', 'amibiswas9999@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-11 15:57:29', '2022-11-11 15:57:29'),
(8, 'Zubayer Bin Rashid', 'zubayer102019@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-11 15:58:13', '2022-11-11 15:58:13'),
(9, 'Moinul Ehtesam', 'ehtesam0@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-11 15:58:47', '2022-11-11 15:58:47'),
(10, 'Tonmoy Chakraborty', 'chakrabortytonmoy98@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-11 15:59:15', '2022-11-11 15:59:15'),
(11, 'Joya Dhar', 'joyadhar00@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-11 15:59:42', '2022-11-11 15:59:42'),
(12, 'Anik Sen', 'aniksen@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-11-11 16:01:06', '2022-11-11 16:01:06'),
(13, 'Taufique Sayeed', 'taufiquesayeed@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-11-11 16:02:21', '2022-11-11 16:02:21'),
(14, 'Kingshuk Dhar', 'kingshukdhar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-11-11 16:03:04', '2022-11-11 16:03:04'),
(15, 'Sheikh Rukunuddin Osmani', 'osmani@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-11-11 16:03:25', '2022-11-11 16:03:25'),
(16, 'Mohiuddin', 'mohiu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-12 14:45:23', '2022-11-12 14:45:23'),
(17, 'Roksana Afrin', 'roksanaafrin47@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-12 14:46:36', '2022-11-12 14:46:36'),
(18, 'Basit Karim', 'basitkarim.bk@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-11-12 14:47:02', '2022-11-12 14:47:02');

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
-- Indexes for table `markings`
--
ALTER TABLE `markings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markings_marking_submission_id_foreign` (`marking_submission_id`),
  ADD KEY `markings_marking_review_user_id_foreign` (`marking_review_user_id`),
  ADD KEY `markings_marking_conference_id_foreign` (`marking_conference_id`),
  ADD KEY `markings_review_status_index` (`review_status`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_submission_result_id_foreign` (`submission_result_id`);

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
-- Indexes for table `submission_teams`
--
ALTER TABLE `submission_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_teams_submission_teams_orcidid_foreign` (`submission_teams_orcidID`),
  ADD KEY `submission_teams_submission_paper_id_foreign` (`submission_paper_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_conference_id_foreign` (`conference_id`);

--
-- Indexes for table `traffic_logs`
--
ALTER TABLE `traffic_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unique_identifiers`
--
ALTER TABLE `unique_identifiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_identifiers_users_uniqueidentifier_id_foreign` (`users_uniqueIdentifier_id`),
  ADD KEY `unique_identifiers_author_orcidid_index` (`author_orcidID`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `markings`
--
ALTER TABLE `markings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviewer_infos`
--
ALTER TABLE `reviewer_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submission_teams`
--
ALTER TABLE `submission_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `traffic_logs`
--
ALTER TABLE `traffic_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unique_identifiers`
--
ALTER TABLE `unique_identifiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_admins`
--
ALTER TABLE `university_admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `markings`
--
ALTER TABLE `markings`
  ADD CONSTRAINT `markings_marking_conference_id_foreign` FOREIGN KEY (`marking_conference_id`) REFERENCES `conferences` (`id`),
  ADD CONSTRAINT `markings_marking_review_user_id_foreign` FOREIGN KEY (`marking_review_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `markings_marking_submission_id_foreign` FOREIGN KEY (`marking_submission_id`) REFERENCES `submissions` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_submission_result_id_foreign` FOREIGN KEY (`submission_result_id`) REFERENCES `submissions` (`id`);

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
-- Constraints for table `submission_teams`
--
ALTER TABLE `submission_teams`
  ADD CONSTRAINT `submission_teams_submission_paper_id_foreign` FOREIGN KEY (`submission_paper_id`) REFERENCES `submissions` (`id`),
  ADD CONSTRAINT `submission_teams_submission_teams_orcidid_foreign` FOREIGN KEY (`submission_teams_orcidID`) REFERENCES `unique_identifiers` (`author_orcidID`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`);

--
-- Constraints for table `unique_identifiers`
--
ALTER TABLE `unique_identifiers`
  ADD CONSTRAINT `unique_identifiers_users_uniqueidentifier_id_foreign` FOREIGN KEY (`users_uniqueIdentifier_id`) REFERENCES `users` (`id`);

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
