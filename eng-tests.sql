-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 10:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eng-tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(255) NOT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(255) NOT NULL,
  `is_correct` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `text`, `question_id`, `is_correct`) VALUES
(2, 'like', 2, b'1'),
(3, 'listen', 5, b'1'),
(4, 'wears', 6, b'1'),
(5, 'last Friday', 7, b'0'),
(6, 'next Friday', 7, b'0'),
(7, 'every Friday', 7, b'1'),
(8, 'never', 8, b'0'),
(9, 'already', 8, b'1'),
(10, 'usually', 8, b'0'),
(11, 'often', 4, b'1'),
(12, 'last Monday', 4, b'0'),
(13, 'now', 4, b'0'),
(14, 'Do you speak English?', 9, b'1'),
(15, 'Where does she ride her bike?', 11, b'1'),
(16, 'When does he go home?', 10, b'1'),
(17, 'My father doesn\'t make breakfast.', 12, b'1'),
(18, 'They aren\'t eleven.', 13, b'1'),
(19, 'Danny doesn\'t phone his father on Sundays.', 14, b'1'),
(20, 'We do not use a computer.', 15, b'1'),
(21, 'Johnny doesn\'t swim in the lake.', 16, b'1'),
(22, 'They\'re from Budapest, Hungary.', 17, b'1'),
(23, 'We opened the door.', 18, b'1'),
(24, 'Richard played in the garden.', 19, b'1'),
(25, 'Did you see the bird?', 20, b'1'),
(26, 'I wanted a car.', 21, b'1'),
(27, 'I did not get up early.', 22, b'1'),
(28, 'We lost the game.', 23, b'1'),
(29, 'were', 24, b'1'),
(30, 'was', 25, b'1'),
(31, 'were', 26, b'1'),
(32, 'What did he click?', 27, b'1'),
(33, 'Who robbed a bank?', 28, b'1'),
(34, 'How did they welcome the new pupil?', 29, b'1'),
(35, 'The ship did not disappear.', 30, b'1'),
(36, 'Amy was not depressed.', 31, b'1'),
(37, 'The passengers did not panic.', 32, b'1'),
(38, 'had given', 33, b'1'),
(39, 'had seen', 34, b'1'),
(40, 'had forgotten', 35, b'1'),
(41, 'had not ordered', 36, b'1'),
(42, 'had not worn', 37, b'1'),
(43, 'had not helped', 38, b'1'),
(44, 'Had you finished', 39, b'1'),
(45, 'Why had you cleaned', 40, b'1'),
(46, 'Where had she lived', 41, b'1'),
(51, 'Local Area Network', 44, b'1'),
(52, 'Central Processing Unit', 45, b'1'),
(53, 'File Transfer Protocol', 46, b'1'),
(54, 'Operating system', 47, b'1'),
(55, 'Web browser', 48, b'1'),
(56, 'Hacker', 49, b'1'),
(57, 'encryption', 50, b'1'),
(58, 'object-oriented programming', 51, b'1'),
(59, 'Domain Name System', 52, b'1'),
(60, 'Optical Character Recognition', 54, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Tenses', NULL),
(2, 'Present Simple', 1),
(3, 'Simple Past', 1),
(4, 'Past Perfect', 1),
(11, 'Business', NULL),
(12, 'Internet technologies', 11),
(13, 'Financial planning', 11),
(14, 'Digital marketing', 11),
(15, 'Business consulting', 11);

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(255) NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `assignment` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(50) NOT NULL,
  `type_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `text`, `assignment`, `order`, `type_id`, `category_id`) VALUES
(1, 'Form of Affirmative Sentences', 'Put the verbs into the correct form.', 1, 1, 2),
(2, 'Signal Words', 'Find the signal words for simple present.', 2, 2, 2),
(3, 'Questions', 'Make questions.', 3, 1, 2),
(4, 'Negative Sentences', 'Make negative sentences.', 4, 1, 2),
(5, 'Long and Short Forms', 'Rewrite the sentences in the short form (where the long form is given) or in the long form (where the short form is given).', 5, 1, 2),
(6, 'Sentences into simple past.', 'Put the sentences into simple past.', 1, 1, 3),
(7, 'Write sentences', 'Write sentences in simple past.', 2, 1, 3),
(8, '„Was“ or „Were“?', NULL, 3, 1, 3),
(9, 'Questions', 'Ask for the part of the sentence in parentheses.', 4, 1, 3),
(10, 'Negative Sentences', 'Make negative sentences.', 5, 1, 3),
(11, 'Positive sentences ', 'Complete the sentences in Past Perfect Simple (positive).', 1, 1, 4),
(12, 'Negative sentences ', 'Complete the sentences in Past Perfect Simple (negative).', 2, 1, 4),
(13, 'Questions', 'Complete the questions in Past Perfect Simple.', 3, 1, 4),
(17, 'Abrevations', 'Write the full text of the abbreviation', 1, 1, 12),
(18, 'Definitions', '\r\nComplete the definition', 2, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `exercises_types`
--

CREATE TABLE `exercises_types` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exercises_types`
--

INSERT INTO `exercises_types` (`id`, `name`) VALUES
(1, 'text'),
(2, 'radio');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(255) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`) VALUES
(1, 'Home', 'home'),
(2, 'All tests', 'tests.index'),
(3, 'Quick reminders', 'reminders');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `message`, `user_id`) VALUES
(5, 'aleksandar123@gmail.com', 'Great tests... I would like to know more about jobs related to the IT sector.', NULL),
(6, 'tara.stokic@gmail.com', 'Hi, I\'ve been taking your tests and I\'m having trouble with grammar, do you have online classes?', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `exercise_id` int(255) NOT NULL,
  `text_first` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_second` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `explanation` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exercise_id`, `text_first`, `text_second`, `explanation`) VALUES
(2, 1, 'I (to like)', 'lemonade very much.', 'Use the infinite form with the first person singular (I).'),
(4, 2, 'Which is a signal word for simple present?', NULL, '\'often\' indicates that the action takes place regularly, that\'s why it\'s a signal word for simple present.\r\n\'last Monday\' is a signal word for simple past; \'now\' is a signal word for present progressive.'),
(5, 1, 'The girls always (to listen)', 'to pop music.', 'Use the infinite form with the plural (the girls).'),
(6, 1, 'Janet never (to wear)', 'jeans.', 'Use the infinite form + s with the third person singular (Janet).'),
(7, 2, 'Which is a signal word for simple present?', NULL, '\'every Friday\' indicates that the action takes place regularly, that\'s why it\'s a signal word for simple present.'),
(8, 2, 'Which is not a signal word for simple present?', NULL, '\'already\' has happened, that\'s why it\'s a signal word for present perfect progressive.'),
(9, 3, 'you / to speak / English', NULL, 'Do + you + infinitive'),
(10, 3, 'when / he / to go / home', NULL, 'interrogative + does + he + infinitive'),
(11, 3, 'where / she / to ride / her bike', NULL, 'interrogative + does + she + infinitive'),
(12, 4, 'My father makes breakfast.', NULL, 'For the negative form of \'make\' you need the auxiliary \'do\'. In the third person singular (my father), \'do\' becomes \'does\'.'),
(13, 4, 'They are eleven.', NULL, 'The negative of the verb \'be\' is formed by adding n\'t (not).'),
(14, 4, 'Danny phones his father on Sundays.', NULL, 'For the negative form of \'phone\' you need the auxiliary \'do\'. In the third person singular (Danny), \'do\' becomes \'does\'.'),
(15, 5, 'We don\'t use a computer.', NULL, 'we don\'t = we do not'),
(16, 5, 'Johnny does not swim in the lake.', NULL, 'does not = doesn\'t'),
(17, 5, 'They are from Budapest, Hungary.', NULL, 'they are = they\'re'),
(18, 6, 'We open the door.', NULL, 'If we put a present-tense sentence into simple past, we have to modify the main verb. regular verb: just add ed'),
(19, 6, 'Richard plays in the garden.', NULL, 'positive sentence - we have to modify the main verb. irregular verb: add ed to the infinite form (play).\r\nNote! In the 3rd person singular in simple present, there is an \'s\' at the end of the verb; the \'s\' must be dropped before adding \'ed\'.'),
(20, 6, 'Do you see the bird?', NULL, 'If we put a present-tense question into simple past, we simply have to modify the auxiliary verb: Do/Does becomes Did'),
(21, 7, 'I / a car / want', NULL, 'positive sentence, regular verb: add'),
(22, 7, 'not / I / early / get up', NULL, 'negative sentence: put did not before the infinite form of the main verb.'),
(23, 7, 'we / the game / lose', NULL, 'positive sentence, irregular verb: lose - lost'),
(24, 8, 'You', 'in Australia last year.', 'Use were you/we/they or a plural noun.'),
(25, 8, 'Charly Chaplin', 'a famous actor.', 'Use was for I/he/she/it or a singular noun.'),
(26, 8, 'Lisa and James', 'at home.', 'Use were for you/we/they, a plural noun or several nouns in an enumeration.'),
(27, 9, 'He clicked (the mouse button).', NULL, 'interrogative - auxiliary - subject - infinite main verb'),
(28, 9, '(Robby Robber) robbed a bank. ', NULL, 'In a subject question, we do not use an auxiliary verb; we simply replace the subject with who/what.'),
(29, 9, 'They welcomed the new pupil (warmly).', NULL, 'interrogative - auxiliary - subject - infinite main verb'),
(30, 10, 'The ship disappeared.', NULL, 'subject - auxiliary verb (did) - not - infinite form of the main verb'),
(31, 10, 'Amy was depressed.', NULL, 'If the verb is a form of be, we place not behind the verb.'),
(32, 10, 'The passengers panicked.', NULL, 'subject - auxiliary verb (did) - not - infinite form of the main verb'),
(33, 11, 'I lost the key that he (give)', 'to me.', 'had + past participle \r\nirregular verb - see 3rd column in list of irregular verbs'),
(34, 11, 'She told me that she (see) ', 'a ghost.', 'had + past participle\r\nirregular verb - see 3rd column in list of irregular verbs'),
(35, 11, 'We could not send you a postcard because we (forget)', 'our address book.', 'had + past participle\r\nirregular verb - see 3rd column in list of irregular verbs'),
(36, 12, 'The waiter served something that we (not / order) ', '.', 'had + not + past participle\r\nregular verb - just add \'ed\''),
(37, 12, 'She put on the red dress, which she (not / wear)', 'for ages.', 'had + not + past participle\r\nirregular verb - see 3rd column in list of irregular verbs'),
(38, 12, 'His mother was angry because he (not / help)', 'her with the shopping.', 'had + not + past participle\r\nregular verb - just add \'ed\''),
(39, 13, '(you / finish)', 'your homework before you went to the cinema?', 'Had + subject + past participle\r\nregular verb - just add \'ed\''),
(40, 13, '(why / you / clean)', ' the bathroom before you bathed the dog?', 'interrogative + had + subject + past participle\r\nregular verb - just add \'ed\''),
(41, 13, '(where / she / live)', ' before she moved to Chicago?', 'interrogative + had + subject + past participle\r\nregular verb ending in \'e\' - only add \'d\''),
(44, 17, 'LAN', NULL, 'L - Local, A - Area, N - Network'),
(45, 17, 'CPU', NULL, 'C - Central, P - Processing, U - Unit'),
(46, 17, 'FTP', NULL, 'F - File, T - Transfer, P - Protocol'),
(47, 18, NULL, 'is a set of programs that controls software and hardware resources of a computer system.', 'Operating system is a set of programs that controls software and hardware resources of a computer system.'),
(48, 18, NULL, 'is a program used for displaying web pages.', 'Web browser is a program used for displaying web pages.'),
(49, 18, NULL, 'a person who uses their computer skills for illegal actions.', 'Hacker a person who uses their computer skills for illegal actions.'),
(50, 18, 'Changing data into a secret code is', '', 'Changing data into a secret code is encryption.'),
(51, 18, 'Programming that allows creation of objects that interact with each other and can be used as the foundation for others is called ', NULL, 'Programming that allows creation of objects that interact with each other and can be used as the foundation for others is called object-oriented programming.'),
(52, 17, 'DNS', NULL, 'D - Domain, N - Name, S - System'),
(54, 17, 'OCR', NULL, 'O - Optical, C - Character, R - Recognition');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(255) NOT NULL,
  `path` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `path`, `alt`) VALUES
(1, 'present_simple.jpg', 'Present Simple Reminder'),
(2, 'be-going-to_form-new.jpg', 'Be going to reminder'),
(3, 'english-word-order.jpg', 'English word order reminder'),
(4, 'present-simple-form.jpg', 'Present simple form'),
(5, '1693652224_was-were_new.jpg', 'Was Were'),
(6, '1693661599_adjectives-english.png', 'Adjectives'),
(7, '1693661632_at-in-on_time_new.png', 'At/in/on time'),
(10, '1694346347_future-forms_will_going-to-present-continuous.jpg', 'Future forms'),
(11, '1694346418_past-events.png', 'Past events'),
(12, '1694346446_present-continuous.png', 'Present continuous'),
(13, '1694346468_subject-questions.png', 'Subject questions');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `result` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `category_id`, `result`, `date`) VALUES
(2, 1, 2, 20, '2023-08-02 12:26:30'),
(3, 1, 2, 80, '2023-08-03 13:22:45'),
(4, 1, 3, 66.666666666667, '2023-08-03 13:25:35'),
(17, 1, 12, 100, '2023-09-24 19:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`) VALUES
(1, 'Jovana', 'Bosnic', 'bosnicjovana98@gmail.com', 'd7c9aa725b1bdbf94b08502780f0341a', 1),
(2, 'Jovana', 'Bosnić', 'jovana.bosnic.90.18@ict.edu.rs', 'd7c9aa725b1bdbf94b08502780f0341a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `exercises_types`
--
ALTER TABLE `exercises_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exercises_types`
--
ALTER TABLE `exercises_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `exercises_types` (`id`),
  ADD CONSTRAINT `exercises_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tests_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
