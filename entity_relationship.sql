-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 02:05 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entity_relationship`
--

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE `communications` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `job_roles` varchar(155) NOT NULL,
  `regions` varchar(155) NOT NULL,
  `category` varchar(155) NOT NULL,
  `published` datetime NOT NULL,
  `published_by` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communications_emails`
--

CREATE TABLE `communications_emails` (
  `id` int(11) NOT NULL,
  `communications_id` int(11) NOT NULL,
  `email_list` varchar(255) NOT NULL,
  `email_template` varchar(255) NOT NULL,
  `scheduled_send` varchar(55) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `sent` datetime NOT NULL,
  `sent_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communications_metadata`
--

CREATE TABLE `communications_metadata` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `section_type` varchar(155) NOT NULL,
  `section_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communications_sms`
--

CREATE TABLE `communications_sms` (
  `id` int(11) NOT NULL,
  `communications_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sms_list_id` int(11) NOT NULL,
  `frequency` varchar(155) NOT NULL,
  `created` datetime NOT NULL,
  `sent` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communications_tags`
--

CREATE TABLE `communications_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_content`
--

CREATE TABLE `email_content` (
  `id` int(11) NOT NULL,
  `email_subject` varchar(155) NOT NULL,
  `email_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_lists`
--

CREATE TABLE `email_lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(155) NOT NULL,
  `list_count` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `template_name` varchar(155) NOT NULL,
  `template_filepath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_lists`
--

CREATE TABLE `sms_lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(155) NOT NULL,
  `list_count` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_list_users`
--

CREATE TABLE `sms_list_users` (
  `user_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sso_guid` text NOT NULL,
  `created` datetime NOT NULL,
  `last_access` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sso_guid`, `created`, `last_access`) VALUES
(1, '3', '2020-02-03 10:14:56', '2020-02-03 10:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `job_role` varchar(155) NOT NULL,
  `preferred_email` text NOT NULL,
  `sms_option` varchar(55) NOT NULL,
  `sms_frequency` varchar(255) NOT NULL,
  `sms_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `job_role`, `preferred_email`, `sms_option`, `sms_frequency`, `sms_number`) VALUES
(3, 'Manager', 'sooraj-op@allthingsmedia.com', 'yes', 'arn:aws:sns:us-west-2:075850309310:NewTopic:f73c2f71-953b-4e44-b833-f03c4006b3a0', '9524249190');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communications`
--
ALTER TABLE `communications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communications_emails`
--
ALTER TABLE `communications_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communications_id` (`communications_id`);

--
-- Indexes for table `communications_metadata`
--
ALTER TABLE `communications_metadata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `communications_sms`
--
ALTER TABLE `communications_sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communications_id` (`communications_id`),
  ADD KEY `sms_list_id` (`sms_list_id`);

--
-- Indexes for table `communications_tags`
--
ALTER TABLE `communications_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `email_content`
--
ALTER TABLE `email_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_lists`
--
ALTER TABLE `email_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_lists`
--
ALTER TABLE `sms_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_list_users`
--
ALTER TABLE `sms_list_users`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communications`
--
ALTER TABLE `communications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communications_emails`
--
ALTER TABLE `communications_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communications_metadata`
--
ALTER TABLE `communications_metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communications_sms`
--
ALTER TABLE `communications_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communications_tags`
--
ALTER TABLE `communications_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_content`
--
ALTER TABLE `email_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_lists`
--
ALTER TABLE `email_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms_lists`
--
ALTER TABLE `sms_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms_list_users`
--
ALTER TABLE `sms_list_users`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `communications_emails`
--
ALTER TABLE `communications_emails`
  ADD CONSTRAINT `communications_emails_ibfk_1` FOREIGN KEY (`communications_id`) REFERENCES `communications` (`id`);

--
-- Constraints for table `communications_metadata`
--
ALTER TABLE `communications_metadata`
  ADD CONSTRAINT `communications_metadata_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `communications` (`id`);

--
-- Constraints for table `communications_sms`
--
ALTER TABLE `communications_sms`
  ADD CONSTRAINT `communications_sms_ibfk_1` FOREIGN KEY (`communications_id`) REFERENCES `communications` (`id`),
  ADD CONSTRAINT `communications_sms_ibfk_2` FOREIGN KEY (`sms_list_id`) REFERENCES `sms_lists` (`id`);

--
-- Constraints for table `communications_tags`
--
ALTER TABLE `communications_tags`
  ADD CONSTRAINT `communications_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `communications` (`id`),
  ADD CONSTRAINT `communications_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `sms_list_users`
--
ALTER TABLE `sms_list_users`
  ADD CONSTRAINT `sms_list_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_details` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
