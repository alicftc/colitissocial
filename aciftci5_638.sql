-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2022 at 09:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aciftci5_638`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_entries`
--

CREATE TABLE `blog_entries` (
  `entry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `entry` text NOT NULL,
  `image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_entries`
--

INSERT INTO `blog_entries` (`entry_id`, `user_id`, `subject`, `entry`, `image`) VALUES
(1, 1, 'How am I doing?', 'I have been feeling a lot better recently. Glad to share ', NULL),
(2, 1, 'Everything seems okay', 'Keep using your medicine on time and do sports guys! It seems to be working. Cheers ', NULL),
(3, 2, 'A new medicine', 'I recently started using Lialda. Let\'s see how it will work', NULL),
(8, 11, 'enable world-class e-tailers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL),
(9, 16, 'incentivize cutting-edge niches', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL),
(10, 14, 'strategize back-end niches', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL),
(11, 13, 'optimize sticky interfaces', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL),
(12, 11, 'synergize customized relationships', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `circle_participants`
--

CREATE TABLE `circle_participants` (
  `participant_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `circle_participants`
--

INSERT INTO `circle_participants` (`participant_id`, `circle_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 8),
(5, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `conversation_circles`
--

CREATE TABLE `conversation_circles` (
  `circle_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `seat_capacity` int(11) NOT NULL,
  `meeting_day` varchar(20) NOT NULL,
  `meeting_time` varchar(10) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `door_number` varchar(10) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation_circles`
--

INSERT INTO `conversation_circles` (`circle_id`, `name`, `seat_capacity`, `meeting_day`, `meeting_time`, `phone_number`, `email_address`, `website`, `street`, `building`, `door_number`, `zip_code`, `city`, `state`) VALUES
(1, 'Harlem Circle', 15, 'Wednesday', '6:00 PM', '141223534234', 'harlem@circle.com', 'harlemcircle.com', 'East 125th', '23', 'A5', '10035', 'New York', 'New York'),
(2, 'Chelsea Circle', 20, 'Friday', '7:00 PM', '5032034242', 'chelsea@circle.com', 'chelseacircle.com', 'West 14th', '1245', '45', '11203', 'New York', 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `door_number` varchar(10) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `surname`, `phone_number`, `email_address`, `speciality`, `street`, `building`, `door_number`, `zip_code`, `city`, `state`) VALUES
(1, 'Ron', 'Palmon', '2325354', 'ronpalmon@dr.com', 'Gastroentrology', 'Park Avenue', '1049', '1C', '12039', 'New York', 'New York'),
(2, 'Peter', 'Chang', '414343252313', 'peterchang@dr.com', 'Internal Medicine', '7th Avenue', '1268', '4A', '13023', 'New York', 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drug_id` int(11) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `drug_type` varchar(20) NOT NULL,
  `drug_link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name`, `drug_type`, `drug_link`) VALUES
(1, 'Entyvio', 'Infusion', 'https://www.drugs.com/entyvio.html'),
(2, 'Lialda', 'Pill', 'https://www.drugs.com/lialda.html'),
(3, 'Prednisone', 'Steroids', 'https://www.drugs.com/prednisone.html');

-- --------------------------------------------------------

--
-- Table structure for table `drug_use`
--

CREATE TABLE `drug_use` (
  `usage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug_use`
--

INSERT INTO `drug_use` (`usage_id`, `user_id`, `drug_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 8, 1),
(5, 1, 2),
(6, 8, 3),
(27, 13, 1),
(28, 16, 2),
(29, 16, 3),
(30, 16, 3),
(31, 12, 2),
(32, 14, 1),
(33, 13, 2),
(34, 16, 1),
(35, 10, 2),
(36, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `relationship_id` int(11) NOT NULL,
  `sending_used_id` int(11) NOT NULL,
  `receiving_user_id` int(11) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`relationship_id`, `sending_used_id`, `receiving_user_id`, `creation_date`) VALUES
(1, 1, 2, '2022-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `patient_doctor`
--

CREATE TABLE `patient_doctor` (
  `relationship_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_since` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`relationship_id`, `user_id`, `doctor_id`, `patient_since`) VALUES
(1, 1, 1, NULL),
(2, 2, 2, NULL),
(3, 2, 1, NULL),
(4, 8, 1, '2022-03-01'),
(5, 11, 2, '2022-03-10'),
(6, 12, 1, '2022-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `disease_type` varchar(20) NOT NULL,
  `diagnosis_date` date NOT NULL,
  `diagnosis_proof` longblob DEFAULT NULL,
  `user_picture` longblob DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL,
  `door_number` varchar(10) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `surname`, `login_email`, `login_password`, `disease_type`, `diagnosis_date`, `diagnosis_proof`, `user_picture`, `street`, `building`, `door_number`, `zip_code`, `city`, `state`) VALUES
(1, 'alicif', 'Ali', 'Ciftci', 'ciftciali94@gmail.com', 'mypassword', 'Pancolitis', '2022-03-01', NULL, NULL, 'West 147th', '205', '6', '10039', 'New York', 'New York'),
(2, 'jacky1', 'Jacky ', 'Bier', 'jbier@gmail.com', 'mypassword', 'Proctitis', '2022-02-01', NULL, NULL, 'Hart Street', '32', '3', '11206', 'New York', 'New York'),
(8, 'alibaba', 'Ali', 'Baba', 'aciftci5@pratt.edu', 'd8a2a65b039710aed1e0902d0e24e473', 'Extensive colitis', '2022-02-04', NULL, NULL, '205 W 147th St', '205', '6', '10039', 'New York', 'New York'),
(10, 'someuser', 'Mack ', 'Williams', 'mwilliams@gmail.com', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoiditis', '2022-02-15', NULL, NULL, 'Mack Street', '24', '89 C', '19235', 'Minneapolis', 'Minnesota '),
(11, 'ascrivinor0', 'Annetta', 'Melledy', 'ascrivinor0@about.me', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2022-02-15', NULL, NULL, 'Wayridge', 'Scrivinor', '65', 'T23', 'Cork', 'Tambovka'),
(12, 'djedrasik0', 'Dorothee', 'Sellack', 'djedrasik0@example.com', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2021-08-23', NULL, NULL, 'Del Mar', 'Jedrasik', '85', '04439', 'Duqiao', 'Xinji'),
(13, 'lhaggus1', 'Lambert', 'Warstall', 'lhaggus1@reuters.com', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2022-01-27', NULL, NULL, '8th', 'Haggus', '95', '39363', 'Tubigan', 'Gachalá'),
(14, 'hconachy2', 'Holli', 'Hebblewaite', 'hconachy2@t-online.de', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2021-10-20', NULL, NULL, 'Arkansas', 'Conachy', '58', '54697', 'Paobokol', 'Al Quwaysimah'),
(15, 'kclaydon3', 'Kerry', 'Bento', 'kclaydon3@parallels.com', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2022-01-21', NULL, NULL, 'Aberg', 'Claydon', '18', '96603', 'Jingyang', 'Strel\'na'),
(16, 'mmithun4', 'Muhammad', 'Smowton', 'mmithun4@bluehost.com', 'd8a2a65b039710aed1e0902d0e24e473', 'Proctosigmoidosis', '2022-02-27', NULL, NULL, 'Reindahl', 'Mithun', '83', '25695', 'Xianyan', 'Xiaozhen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_entries`
--
ALTER TABLE `blog_entries`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `FK - UserID` (`user_id`);

--
-- Indexes for table `circle_participants`
--
ALTER TABLE `circle_participants`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `FK-CircleID` (`circle_id`),
  ADD KEY `FK-UserID` (`user_id`);

--
-- Indexes for table `conversation_circles`
--
ALTER TABLE `conversation_circles`
  ADD PRIMARY KEY (`circle_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drug_use`
--
ALTER TABLE `drug_use`
  ADD PRIMARY KEY (`usage_id`),
  ADD KEY `FK - UserID` (`user_id`),
  ADD KEY `FK - DrugID` (`drug_id`);

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`relationship_id`),
  ADD KEY `FK-Sending User` (`sending_used_id`),
  ADD KEY `FK-Receiving User` (`receiving_user_id`);

--
-- Indexes for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  ADD PRIMARY KEY (`relationship_id`),
  ADD KEY `FK - UserID` (`user_id`),
  ADD KEY `FK - DoctorID` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_entries`
--
ALTER TABLE `blog_entries`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `circle_participants`
--
ALTER TABLE `circle_participants`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversation_circles`
--
ALTER TABLE `conversation_circles`
  MODIFY `circle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `drug_use`
--
ALTER TABLE `drug_use`
  MODIFY `usage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_entries`
--
ALTER TABLE `blog_entries`
  ADD CONSTRAINT `blog_entries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `circle_participants`
--
ALTER TABLE `circle_participants`
  ADD CONSTRAINT `circle_participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `circle_participants_ibfk_2` FOREIGN KEY (`circle_id`) REFERENCES `conversation_circles` (`circle_id`);

--
-- Constraints for table `drug_use`
--
ALTER TABLE `drug_use`
  ADD CONSTRAINT `drug_use_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `drug_use_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`drug_id`);

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`sending_used_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`receiving_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `patient_doctor`
--
ALTER TABLE `patient_doctor`
  ADD CONSTRAINT `patient_doctor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `patient_doctor_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
