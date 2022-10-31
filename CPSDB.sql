-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2022 at 04:59 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.6

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
(1, 'Computing Conference - 2023', '2023-01-10', '2023-01-18', 1, '2022-10-31 08:09:40', '2022-10-31 08:09:40'),
(2, 'Agriculture - 2022', '2023-12-13', '2022-12-30', 1, '2022-10-31 08:16:05', '2022-10-31 08:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `markings`
--

CREATE TABLE `markings` (
  `id` bigint UNSIGNED NOT NULL,
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

INSERT INTO `markings` (`id`, `review_status`, `marking_submission_id`, `marking_review_user_id`, `marking_conference_id`, `created_at`, `updated_at`) VALUES
(1, 'Accepted', 5, 13, 2, NULL, NULL),
(2, 'PartiallyAccepted', 7, 13, 1, NULL, NULL),
(3, 'PartiallyAccepted', 2, 12, 1, NULL, NULL),
(4, 'Rejected', 6, 12, 2, NULL, NULL),
(5, 'Rejected', 1, 12, 1, NULL, NULL),
(6, 'Accepted', 1, 11, 1, NULL, NULL),
(7, 'PartiallyAccepted', 2, 11, 1, NULL, NULL),
(8, 'Accepted', 7, 14, 1, NULL, NULL),
(9, 'PartiallyAccepted', 4, 15, 2, NULL, NULL),
(10, 'Accepted', 3, 15, 1, NULL, NULL),
(11, 'Accepted', 3, 16, 1, NULL, NULL),
(12, 'Accepted', 6, 11, 2, NULL, NULL),
(13, 'PartiallyAccepted', 5, 14, 2, NULL, NULL),
(14, 'Rejected', 4, 16, 2, NULL, NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_02_112140_create_users_table', 1),
(3, '2022_10_02_112310_create_universities_table', 1),
(4, '2022_10_02_112334_create_conferences_table', 1),
(5, '2022_10_02_112350_create_tracks_table', 1),
(6, '2022_10_02_131325_create_university_admins_table', 1),
(7, '2022_10_06_163722_create_submissions_table', 1),
(8, '2022_10_11_200456_create_reviewer_infos_table', 1),
(9, '2022_10_12_152932_create_reviews_table', 1),
(10, '2022_10_13_190825_create_markings_table', 1);

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
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review_user_id`, `review_submission_id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 11, 1, NULL, '2022-10-31 10:44:13', '2022-10-31 10:44:13'),
(2, 12, 2, NULL, '2022-10-31 10:44:45', '2022-10-31 10:44:45'),
(3, 16, 3, NULL, '2022-10-31 10:45:00', '2022-10-31 10:45:00'),
(4, 14, 7, NULL, '2022-10-31 10:45:15', '2022-10-31 10:45:15'),
(5, 15, 4, NULL, '2022-10-31 10:45:38', '2022-10-31 10:45:38'),
(6, 13, 5, NULL, '2022-10-31 10:45:49', '2022-10-31 10:45:49'),
(7, 12, 6, NULL, '2022-10-31 10:46:01', '2022-10-31 10:46:01'),
(8, 12, 1, NULL, '2022-10-31 10:46:19', '2022-10-31 10:46:19'),
(9, 11, 2, NULL, '2022-10-31 10:46:28', '2022-10-31 10:46:28'),
(10, 15, 3, NULL, '2022-10-31 10:46:38', '2022-10-31 10:46:38'),
(11, 13, 7, NULL, '2022-10-31 10:46:46', '2022-10-31 10:46:46'),
(12, 16, 4, 'yyy', '2022-10-31 10:56:37', '2022-10-31 10:56:37'),
(13, 14, 5, NULL, '2022-10-31 10:56:54', '2022-10-31 10:56:54'),
(14, 11, 6, NULL, '2022-10-31 10:57:07', '2022-10-31 10:57:07');

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
(1, 'An Advance Cryptographic Solutions in Cloud Computing Security', 'Cryptographically cloud computing may be an innovative safe cloud computing design. Cloud computing may be a huge size dispersed computing model that ambitious by the economy of the level. It integrates a group of inattentive virtualized animatedly scalable and managed possessions like computing control storage space platform and services. External end users will approach to resources over the net victimization fatal particularly mobile terminals, Cloud\'s architecture structures are advances in on-demand new trends. That are the belongings are animatedly assigned to a user per his request and hand over when the task is finished. So, this paper projected biometric coding to boost the confidentiality in Cloud computing for biometric knowledge. Also, this paper mentioned virtualization for Cloud computing also as statistics coding. Indeed, this paper overviewed the safety weaknesses of Cloud computing and the way biometric coding will improve the confidentiality in Cloud computing atmosphere. Excluding this confidentiality is increased in Cloud computing by victimization biometric coding for biometric knowledge. The novel approach of biometric coding is to reinforce the biometric knowledge confidentiality in Cloud computing. Implementation of identification mechanism can take the security of information and access management in the cloud to a higher level. This section discusses, however, a projected statistics system with relation to alternative recognition systems to date is a lot of advantageous and result oriented as a result of it does not work on presumptions: it\'s distinctive and provides quick and contact less authentication. Thus, this paper reviews the new discipline techniques accustomed to defend methodology encrypted info in passing remote cloud storage.', 'cloud computing, cryptography, computer security, biometric', '1667226757_711-1636-1-PB.pdf', 1, 4, 1, '2022-10-31 14:32:37', '2022-10-31 14:32:37'),
(2, 'Quantum computing: pro and con', 'I assess the potential of quantum computation. Broad and important applications must be found to justify construction of a quantum computer; I review some of the known quantum algorithms and consider the prospects for finding new ones. Quantum computers are notoriously susceptible to making errors; I discuss recently developed fault–tolerant procedures that enable a quantum computer with noisy gates to perform reliably. Quantum computing hardware is still in its infancy; I comment on the specifications that should be met by future hardware. Over the past few years, work on quantum computation has erected a new classification of computational complexity, has generated profound insights into the nature of decoherence, and has stimulated the formulation of new techniques in high–precision experimental physics. A broad interdisciplinary effort will be needed if quantum computers are to fulfil their destiny as the world\'s fastest computing devices. This paper is an expanded version of remarks that were prepared for a panel discussion at the ITP Conference on Quantum Coherence and Decoherence, December 1996.', 'Quantum computing', '1667226954_rspa.1998.0171.pdf', 4, 5, 1, '2022-10-31 14:35:54', '2022-10-31 14:35:54'),
(3, 'A Software Architecture for Dependable and Evolvable Industrial Computing Systems.', 'The downtime of a large industrial operation is often prohibitively expensive and a failure of a mission critical system could have disastrous consequences. Lacking an effective approach to mitigate the risks in system upgrades or to introduce third party supplied open system components, many industrial systems and defense systems are forced to keep outdated computing hardware and software. A paradigm shift is needed, from a focus on enabling technologies for completely new installations to one which is designed to mitigate the risk and cost of bringing new technology into functioning systems. Innovative technology is needed to support the task of technology insertion. Quickly and reliably turning unparalleled American innovations into industrial competitiveness and defense technological superiority is of strategic importance. The Simplex architecture has been developed to support safe and reliable online upgrade of hardware and software components in spite of errors in the new modules. This paper gives a brief overview of the underlying technologies.', 'SOFTWARE ENGINEERING, COMPUTER ARCHITECTURE, INDUSTRIAL EQUIPMENT, COMPUTER PROGRAMS', '1667227229_ADA301169.pdf', 5, 6, 1, '2022-10-31 14:40:29', '2022-10-31 14:40:29'),
(4, 'Agricultural Productivity and Poverty Alleviation: What Role for Technological Innovation', 'The role of agriculture in economic development remains much debated. This paper takes an empirical perspective and focuses on the relationships between agriculture productivity and poverty reduction. The contribution of agriculture sector to poverty is shown to depend on its own growth performance, its indirect impact on growth in other sectors, the extent to which poor people participate in the sector, and the size of the sector in the overall economy. Bringing together these different effects and taking into consideration the role played by technological innovation, we use an aggregate annual panel data, on a sample composed of 32Sub- SaharanAfrica (SSA) countries, from 1990-2011 to estimate a simultaneous equation model that capture the interrelationship between agriculture productivity, technological innovation and poverty. Findings show first that agricultural productivity contributes significantly to economic growth and poverty in SSA.', 'Agriculture Productivity, Economic Growth, Technological Innovation, Poverty, Simultaneous Equation Model, SSA.', '1667227559_4b20eeda644f846690cf8e25e1c71c33.pdf', 7, 7, 2, '2022-10-31 14:45:59', '2022-10-31 14:45:59'),
(5, 'Ecosystem accounting to support the Common Agricultural Policy', 'The System of Environmental-Economic Accounting - Ecosystem Accounting (SEEA EA) provides an integrated\r\nstatistical framework which organizes spatially explicit data on environmental quality, natural capital and\r\necosystem services and links this information to economic activities such as agriculture. In this paper we assess\r\nhow the SEEA EA can support the monitoring and evaluation of environmental objectives of the Common\r\nAgricultural Policy (CAP). We focus on the Netherlands, for which an elaborate set of SEEA EA accounts has been\r\npublished, and the themes of nitrogen pollution and farmland biodiversity. We studied the completeness of in-\r\ndicators included in the accounts, their quality and analysed how the accounts could support agri-environmental\r\nreporting, agri-environmental measures effectiveness assessments, and results-based payments to farmers. As a\r\nreference we used the Driving forces – Pressures – State – Impacts - Responses (DPSIR) framework. The Dutch\r\nSEEA EA accounts only include half of the indicators which we considered essential to assess the effects of\r\nfarming on natural capital and ecosystem services for the two studied environmental themes. However, most\r\ngaps in the accounts could be filled with other publicly available environmental monitoring data. Regarding N\r\npollution, the availability and reliability of indicators at landscape and farm scales are not sufficient to support\r\nthe assessment of agri-environmental measures effectiveness and results-based payments to decrease N pollution.\r\nThe accounts have a higher potential to support the assessment of measures to conserve farmland biodiversity, in\r\nparticular due to high resolution maps of ecosystem extent and ecosystem services flows. The potential of the\r\nSEEA EA accounts may be more limited in other countries where ecosystem accounting has only recently started.\r\nHowever, the SEEA EA is also implemented at the European Union scale, so that SEEA EA indicators will\r\ngradually become available for all European countries. To enhance the relevance of the SEEA EA in the agri-\r\nenvironmental policy area, we recommend to integrate information on farming emissions (externalities) recor-\r\nded in the SEEA Central Framework with SEEA EA accounts and evaluate the applicability of SEEA EA accounts\r\nfor case studies at landscape and farm scales. Our research shows that the Dutch SEEA EA accounts, com-\r\nplemented with other data sources, have potential to strongly enhance the CAP monitoring and evaluation\r\nframework but further steps need to be taken to fill data gaps.', 'Agri-environment measures, CAP, SEEA EA, Natural capital, Ecosystem services, Farming externalities', '1667228839_ADA301169.pdf', 8, 8, 2, '2022-10-31 15:07:19', '2022-10-31 15:07:19'),
(6, 'Agricultural Market Information Services in Developing Countries', 'Access to agricultural markets and marketing information are essential factors in promoting competitive markets and improving agricultural sector development. The agricultural sector employs majorities in developing countries and it contributes greatly to the development of these countries. Unluckily, majorities of the farmers are smallholders living in isolated rural areas and thus lack appropriate access to markets for their products and also they are deprived of agricultural market information. As a lack of these, smallholder farmers are exploited by greedy traders and receive low prices for their agricultural produce. This study has explored the use of agricultural market information services in linking smallholder farmers to markets, especially in sub-Sahara developing countries. Origin of, the needs for, and the current status of agricultural market information services in developing countries are clearly presented. Lastly, the study explored the limitation of the success of most agricultural market information services in sub-Sahara developing countries.', 'agricultural support', '1667229055_JA_CoCSE_2014.pdf', 9, 9, 2, '2022-10-31 15:10:55', '2022-10-31 15:10:55'),
(7, 'Supercomputer performance evaluation and the Perfect Benchmarks', 'In the past three years, the Perfect BenchmarkTM Suite has evolved from a supercomputer performance evaluation plan, presented by Kuck and Sameh at the 1987 International Conference on Supercomputing, to a vigorous international activity. This paper surveys the current state of this supercomputer performance evaluation effort with particular focus on the adopted methodology. While there has been considerable success in achieving the goals of the plan, some issues remain unresolved, and new questions have surfaced.', 'Supercomputer', '1667229230_77726.255163.pdf', 6, 7, 1, '2022-10-31 15:13:50', '2022-10-31 15:13:50');

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
(1, 'Cloud Computing', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(2, 'Server Computer', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(3, 'Mining Computer', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(4, 'Quantum Computing', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(5, 'Industrial Computer', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(6, 'Super Computer', 1, '2022-10-31 08:09:41', '2022-10-31 08:09:41'),
(7, 'Agricultural productivity and innovation', 2, '2022-10-31 08:16:05', '2022-10-31 08:16:05'),
(8, 'Agricultural policy monitoring and evaluation', 2, '2022-10-31 08:16:05', '2022-10-31 08:16:05'),
(9, 'Agricultural Market Information System', 2, '2022-10-31 08:16:05', '2022-10-31 08:16:05'),
(10, 'Agriculture and the Environment', 2, '2022-10-31 08:16:06', '2022-10-31 08:16:06'),
(11, 'Agricultural Trade', 2, '2022-10-31 08:16:06', '2022-10-31 08:16:06');

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
(1, 'Premier University, Chittagong', '145855', 2, '2022-10-30 19:49:28', '2022-10-30 19:49:28');

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
(1, 2, 1, '2022-10-30 19:49:28', '2022-10-30 19:49:28'),
(2, 3, 1, '2022-10-31 14:11:11', '2022-10-31 14:11:11');

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
(1, 'admin', 'admin@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', '2022-10-30 16:41:01', '2022-10-30 16:41:01'),
(2, 'PUC', 'puc@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-30 19:49:28', '2022-10-30 19:49:28'),
(3, 'PUC - A', 'puc.a@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'uni_admin', '2022-10-31 08:11:11', '2022-10-31 08:11:11'),
(4, 'Mohiuddin Tamim', 'mohiuddin@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:18:23', '2022-10-31 14:18:23'),
(5, 'Zubayer Bin Rashid', 'zubayer@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:19:14', '2022-10-31 14:19:14'),
(6, 'Omi Biswas', 'omi@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:19:41', '2022-10-31 14:19:41'),
(7, 'MORSALA BINTA BASAR', 'morsalatasrin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:23:32', '2022-10-31 14:23:32'),
(8, 'Joya Dhar', 'joyadhar00@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:24:26', '2022-10-31 14:24:26'),
(9, 'Moinul Ehtesam', 'ehtesam0@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:25:30', '2022-10-31 14:25:30'),
(10, 'Tonmoy Chakraborty', 'chakrabortytonmoy98@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'author', '2022-10-31 14:26:21', '2022-10-31 14:26:21'),
(11, 'Anik Sen', 'aniksen@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:13:54', '2022-10-31 16:13:54'),
(12, 'Minhaj Hosen', 'minhajhosen@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:22:09', '2022-10-31 16:22:09'),
(13, 'Faisal Ahmed', 'faisalahmed@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:31:50', '2022-10-31 16:31:50'),
(14, 'Sabrina Tarannum', 'sabrinatarannum@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:32:34', '2022-10-31 16:32:34'),
(15, 'Kingshuk Dhar', 'kingshukdhar@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:34:10', '2022-10-31 16:34:10'),
(16, 'Taufique Sayeed', 'taufiquesayeed@papercut.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviewer', '2022-10-31 16:39:22', '2022-10-31 16:39:22');

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
  ADD KEY `markings_marking_conference_id_foreign` (`marking_conference_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `markings`
--
ALTER TABLE `markings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer_infos`
--
ALTER TABLE `reviewer_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university_admins`
--
ALTER TABLE `university_admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
