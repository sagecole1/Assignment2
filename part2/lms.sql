-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 06:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `created_at`) VALUES
(19, 'Comprehensive HTML Course', 'This course covers all aspects of HTML, from basic tags to advanced features.', '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `unit_id`, `title`, `content`, `created_at`) VALUES
(146, 62, 'Lesson 1: Introduction to HTML', '<content>\n                        <text>HTML stands for HyperText Markup Language. It is the standard language for creating web pages.</text>\n                        <pre>\n&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n    &lt;head&gt;\n        &lt;title&gt;Page Title&lt;/title&gt;\n    &lt;/head&gt;\n    &lt;body&gt;\n        &lt;h1&gt;This is a Heading&lt;/h1&gt;\n        &lt;p&gt;This is a paragraph.&lt;/p&gt;\n    &lt;/body&gt;\n&lt;/html&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(147, 62, 'Lesson 2: HTML Elements', '<content>\n                        <text>An HTML element is defined by a start tag, some content, and an end tag.</text>\n                        <pre>\n&lt;tagname&gt;Content goes here...&lt;/tagname&gt;\n                        </pre>\n                        <text>For example:</text>\n                        <pre>\n&lt;p&gt;This is a paragraph.&lt;/p&gt;\n&lt;a href=\"https://www.example.com\"&gt;This is a link&lt;/a&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(148, 62, 'Lesson 3: HTML Attributes', '<content>\n                        <text>HTML attributes provide additional information about HTML elements. Attributes are always included in the opening tag and usually come in name/value pairs like: name=\"value\".</text>\n                        <pre>\n&lt;a href=\"https://www.example.com\"&gt;This is a link&lt;/a&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(149, 63, 'Lesson 1: Text Formatting', '<content>\n                        <text>HTML uses elements like &lt;b&gt; and &lt;i&gt; for formatting output, like bold or italic text.</text>\n                        <pre>\n&lt;b&gt;This text is bold&lt;/b&gt;\n&lt;i&gt;This text is italic&lt;/i&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(150, 63, 'Lesson 2: HTML Quotations', '<content>\n                        <text>HTML offers elements for quoting text:</text>\n                        <pre>\n&lt;blockquote&gt;This is a blockquote.&lt;/blockquote&gt;\n&lt;q&gt;This is an inline quotation.&lt;/q&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(151, 63, 'Lesson 3: HTML Comments', '<content>\n                        <text>HTML comments are not displayed in the browser, but they can help document your HTML source code.</text>\n                        <pre>\n&lt;!-- This is a comment --&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(152, 64, 'Lesson 1: HTML Links', '<content>\n                        <text>HTML links are hyperlinks. You can click on a link and jump to another document.</text>\n                        <pre>\n&lt;a href=\"https://www.example.com\"&gt;This is a link&lt;/a&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(153, 64, 'Lesson 2: HTML Images', '<content>\n                        <text>HTML images are defined with the &lt;img&gt; tag. The source file (src), alternative text (alt), and size (width and height) are provided as attributes:</text>\n                        <pre>\n&lt;img src=\"img.jpg\" alt=\"Description\" width=\"500\" height=\"600\"&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(154, 65, 'Lesson 1: HTML Lists', '<content>\n                        <text>HTML supports ordered, unordered, and definition lists:</text>\n                        <pre>\n&lt;ul&gt;\n    &lt;li&gt;Item 1&lt;/li&gt;\n    &lt;li&gt;Item 2&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;ol&gt;\n    &lt;li&gt;Item 1&lt;/li&gt;\n    &lt;li&gt;Item 2&lt;/li&gt;\n&lt;/ol&gt;\n\n&lt;dl&gt;\n    &lt;dt&gt;Term&lt;/dt&gt;\n    &lt;dd&gt;Definition&lt;/dd&gt;\n&lt;/dl&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(155, 65, 'Lesson 2: HTML Tables', '<content>\n                        <text>HTML tables are defined with the &lt;table&gt; tag. A table is divided into rows with the &lt;tr&gt; tag. A row is divided into data cells (th and td tags).</text>\n                        <pre>\n&lt;table&gt;\n    &lt;tr&gt;\n        &lt;th&gt;Heading 1&lt;/th&gt;\n        &lt;th&gt;Heading 2&lt;/th&gt;\n    &lt;/tr&gt;\n    &lt;tr&gt;\n        &lt;td&gt;Data 1&lt;/td&gt;\n        &lt;td&gt;Data 2&lt;/td&gt;\n    &lt;/tr&gt;\n&lt;/table&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(156, 66, 'Lesson 1: HTML Forms', '<content>\n                        <text>HTML forms are used to collect user input. The &lt;form&gt; tag is used to create an HTML form for user input:</text>\n                        <pre>\n&lt;form action=\"/submit\" method=\"post\"&gt;\n    &lt;label for=\"name\"&gt;Name:&lt;/label&gt;\n    &lt;input type=\"text\" id=\"name\" name=\"name\"&gt;\n    &lt;input type=\"submit\" value=\"Submit\"&gt;\n&lt;/form&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35'),
(157, 66, 'Lesson 2: HTML Multimedia', '<content>\n                        <text>HTML supports various multimedia elements like audio and video:</text>\n                        <pre>\n&lt;audio controls&gt;\n    &lt;source src=\"audio.mp3\" type=\"audio/mpeg\"&gt;\n&lt;/audio&gt;\n\n&lt;video width=\"320\" height=\"240\" controls&gt;\n    &lt;source src=\"video.mp4\" type=\"video/mp4\"&gt;\n&lt;/video&gt;\n                        </pre>\n                    </content>', '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `text`, `is_correct`, `created_at`) VALUES
(329, 113, 'Hyper Text Markup Language', 1, '2024-06-23 04:10:35'),
(330, 113, 'Hyperlinks and Text Markup Language', 0, '2024-06-23 04:10:35'),
(331, 114, '<p>', 1, '2024-06-23 04:10:35'),
(332, 114, '<par>', 0, '2024-06-23 04:10:35'),
(333, 114, '<pg>', 0, '2024-06-23 04:10:35'),
(334, 115, '<b>', 1, '2024-06-23 04:10:35'),
(335, 115, '<bold>', 0, '2024-06-23 04:10:35'),
(336, 115, '<strong>', 0, '2024-06-23 04:10:35'),
(337, 116, '<!-- This is a comment -->', 1, '2024-06-23 04:10:35'),
(338, 116, '<comment>This is a comment</comment>', 0, '2024-06-23 04:10:35'),
(339, 117, '<a>', 1, '2024-06-23 04:10:35'),
(340, 117, '<link>', 0, '2024-06-23 04:10:35'),
(341, 117, '<href>', 0, '2024-06-23 04:10:35'),
(342, 118, '<img src=\"img.jpg\" alt=\"Description\">', 1, '2024-06-23 04:10:35'),
(343, 118, '<img alt=\"Description\" src=\"img.jpg\">', 0, '2024-06-23 04:10:35'),
(344, 118, '<img src=\"img.jpg\" description=\"Description\">', 0, '2024-06-23 04:10:35'),
(345, 119, '<ul>', 1, '2024-06-23 04:10:35'),
(346, 119, '<ol>', 0, '2024-06-23 04:10:35'),
(347, 119, '<list>', 0, '2024-06-23 04:10:35'),
(348, 120, '<tr>', 1, '2024-06-23 04:10:35'),
(349, 120, '<td>', 0, '2024-06-23 04:10:35'),
(350, 120, '<table>', 0, '2024-06-23 04:10:35'),
(351, 121, '<form>', 1, '2024-06-23 04:10:35'),
(352, 121, '<input>', 0, '2024-06-23 04:10:35'),
(353, 121, '<submit>', 0, '2024-06-23 04:10:35'),
(354, 122, '<video></video>', 1, '2024-06-23 04:10:35'),
(355, 122, '<media></media>', 0, '2024-06-23 04:10:35'),
(356, 122, '<embed></embed>', 0, '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `text`, `created_at`) VALUES
(113, 59, 'What does HTML stand for?', '2024-06-23 04:10:35'),
(114, 59, 'Which HTML tag is used to define a paragraph?', '2024-06-23 04:10:35'),
(115, 60, 'Which HTML tag is used to define bold text?', '2024-06-23 04:10:35'),
(116, 60, 'How do you write a comment in HTML?', '2024-06-23 04:10:35'),
(117, 61, 'Which HTML tag is used to define a link?', '2024-06-23 04:10:35'),
(118, 61, 'How do you specify the alt attribute for an image?', '2024-06-23 04:10:35'),
(119, 62, 'Which HTML tag is used to define an unordered list?', '2024-06-23 04:10:35'),
(120, 62, 'How do you define a table row in HTML?', '2024-06-23 04:10:35'),
(121, 63, 'Which HTML tag is used to create a form?', '2024-06-23 04:10:35'),
(122, 63, 'How do you embed a video in HTML?', '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `unit_id`, `title`, `created_at`) VALUES
(59, 62, 'Quiz 1: HTML Basics', '2024-06-23 04:10:35'),
(60, 63, 'Quiz 2: HTML Formatting', '2024-06-23 04:10:35'),
(61, 64, 'Quiz 3: HTML Links and Images', '2024-06-23 04:10:35'),
(62, 65, 'Quiz 4: HTML Lists and Tables', '2024-06-23 04:10:35'),
(63, 66, 'Quiz 5: HTML Forms and Multimedia', '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `course_id`, `title`, `created_at`) VALUES
(62, 19, 'Unit 1: HTML Basics', '2024-06-23 04:10:35'),
(63, 19, 'Unit 2: HTML Formatting', '2024-06-23 04:10:35'),
(64, 19, 'Unit 3: HTML Links and Images', '2024-06-23 04:10:35'),
(65, 19, 'Unit 4: HTML Lists and Tables', '2024-06-23 04:10:35'),
(66, 19, 'Unit 5: HTML Forms and Multimedia', '2024-06-23 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'scole5', '$2y$10$NussmElRThsBxOahkzP0/u6nQ7SYKSBes6qG7qYsJHB0.uj03TY8G', 'sagecole1@hotmail.com', '2024-06-22 23:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
