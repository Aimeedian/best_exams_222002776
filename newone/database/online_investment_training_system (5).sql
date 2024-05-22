-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 11:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_investment_training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(230) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(2, 'uwineza', 'kk@gmail.com', '123'),
(3, 'kiza', 'kiza@gmail.com', 'mama'),
(4, 'fidela', 'ff@gmail.com', '123'),
(5, 'ki', 'ki@gmail.com', 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `CertificateID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `Grade` varchar(120) DEFAULT NULL,
  `CompletionDate` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`CertificateID`, `UserID`, `CourseID`, `Grade`, `CompletionDate`, `Duration`) VALUES
(5, 2, 9, 'B', '2024-05-22', 12);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `CommentText` text DEFAULT NULL,
  `CommentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `CourseID`, `CommentText`, `CommentDate`) VALUES
(4, 2, 10, 'nbgfcdxcvchvhvidbcv', '2024-05-21 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `Description`, `InstructorID`, `StartDate`, `EndDate`, `Duration`, `Price`) VALUES
(9, 'maths', 'hgvbgf', 2, '2024-05-21', '2024-05-28', 10, 1200.00),
(12, 'saving', 'welcome in investiment platform enjoying your saving', 3, '2024-05-21', '2024-05-28', 10, 12000.00),
(14, 'zxcvbhnjmk,l', 'xdcfghjkl', 3, '2024-05-14', '2024-05-28', 12, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `EnrollmentID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `EnrollmentDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CompletionStatus` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`EnrollmentID`, `UserID`, `CourseID`, `EnrollmentDate`, `CompletionStatus`) VALUES
(1, 1, 2, '2024-05-04 22:00:00', ''),
(2, 1, 1, '2024-06-07 22:00:00', ''),
(3, 1, 1, '2024-06-07 22:00:00', 'competence'),
(4, 2, 1, '2024-05-12 22:00:00', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `InstructorID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`InstructorID`, `Name`, `gender`, `telephone`, `Email`, `address`, `Specialization`, `password`) VALUES
(2, 'uwineza', 'female', '0987909809', 'uwineza@gmail.com', 'huye', 'math', 'mama'),
(3, 'uwineza', 'female', '0987654332', 'uwineza12@gmail.com', 'kigali', 'businesss', '123\r\n'),
(4, 'aimee', 'female', '0987654321', 'aimee@gmail.com', 'kigali', 'investment planning', '123\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `investment_planning_resources`
--

CREATE TABLE `investment_planning_resources` (
  `ResourceID` int(11) NOT NULL,
  `ResourceType` varchar(50) NOT NULL,
  `ResourceTitle` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `UploadedBy` varchar(100) DEFAULT NULL,
  `UploadDate` date DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `LessonID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investment_planning_resources`
--

INSERT INTO `investment_planning_resources` (`ResourceID`, `ResourceType`, `ResourceTitle`, `Description`, `URL`, `UploadedBy`, `UploadDate`, `CourseID`, `LessonID`) VALUES
(2, 'personal reason', 'mjhgfd', 'mnhgfd', 'cxcvb', NULL, '2024-05-22', 12, 3),
(3, 'computer', 'learning resource', 'well received ', ' bgfdsasdfgh', NULL, '2024-05-22', 12, 2),
(4, 'learning', 'maths', ',mjhg', 'nhgf', NULL, '2024-05-22', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `LessonID` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `LessonTitle` varchar(100) NOT NULL,
  `Content` text DEFAULT NULL,
  `VideoURL` varchar(255) DEFAULT NULL,
  `QuizID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`LessonID`, `CourseID`, `LessonTitle`, `Content`, `VideoURL`, `QuizID`) VALUES
(2, 1, 'maths', 'use all rules and regulation well', 'b', 1),
(3, 10, ' hgfdxzxdfgh', 'dressed well', 'nnn', 1),
(4, 9, 'hello every one ', 'my course have aims of bring new experts in business formation you are welcome ', 'hn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `QuizID` int(11) NOT NULL,
  `CourseID` int(11) DEFAULT NULL,
  `QuizTitle` varchar(100) NOT NULL,
  `Questions` text DEFAULT NULL,
  `Answers` text DEFAULT NULL,
  `CorrectAnswers` text DEFAULT NULL,
  `Mark` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`QuizID`, `CourseID`, `QuizTitle`, `Questions`, `Answers`, `CorrectAnswers`, `Mark`) VALUES
(1, 1, 'as designede', 'what is legal??', 'legal is act', 'yes no', 0),
(3, NULL, 'quiz one', 'what is your nature language ', 'it is kinyarwanda', 'correct', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `TraineeID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`TraineeID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`) VALUES
(5, 'uwinezavbb', 'claire', 'cc@gmail.com', '0987657890', 'huye'),
(6, 'uwineza', 'claire', 'anitha@gmail.com', '0987654321', 'huye'),
(7, 'kamena', 'ss', 'kamena@gmail.com', '098765432', 'kigali');

-- --------------------------------------------------------

--
-- Table structure for table `userprogresses`
--

CREATE TABLE `userprogresses` (
  `ProgressID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `LessonID` int(11) DEFAULT NULL,
  `LastAccessed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CompletionStatus` varchar(100) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `DateStarted` date DEFAULT NULL,
  `DateCompleted` date DEFAULT NULL,
  `Notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userprogresses`
--

INSERT INTO `userprogresses` (`ProgressID`, `UserID`, `CourseID`, `LessonID`, `LastAccessed`, `CompletionStatus`, `Score`, `DateStarted`, `DateCompleted`, `Notes`) VALUES
(1, 5, 9, 2, '2024-05-29 20:51:32', 'she get pass in all course and gains more knowledge', 56, '2024-05-14', '2024-05-28', 'deserved better'),
(2, 2, 12, 2, '2024-05-28 20:53:53', 'you beter design well structure', 50, '2024-05-01', '2024-05-08', 'ok good');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Address` varchar(120) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Address`, `Email`, `Password`, `CreationDate`, `Role`) VALUES
(1, 'nhgjhygfdmnbv', '\\zxcvb', 'berwa@gmail.com', '$2y$10$erueI4FyqUe/O2sGQBe/3exhqd7ScaYAHW6nHttZQHLM.s.5HlzcO', '2024-05-03 22:00:00', ''),
(2, 'fideline', 'gicumbi', 'fideline@gmail.com', '$2y$10$8Nq6cceCYOnGCHFLZE4XgeBw0Ihxflpkb.N3/RWYv78wC.igtaKTa', '2024-05-07 22:00:00', 'manager'),
(3, 'uwera', 'huye', 'uweradd@gmail', '$2y$10$R2thGjmYmbNKD6HVgsfjPOeIMjjk3WiEUd0/4zt1tI79Zgf5XQ5gi', '2024-05-13 22:00:00', 'manager'),
(4, 'keza aime', 'kigali', 'keza@gmail.com', '$2y$10$O7io5wPiyVtHDZjtLcy1v.1QQ58/QVhcglWSBICHnevE9pfnmnoGO', '2024-05-13 22:00:00', 'trainee'),
(5, 'Erick kigali', 'kigali', 'erick@gmail.com', '$2y$10$R4a5juzaTI8IutC0nHTZOeziog5VVLaNw0Ue9W0Zshuf.BuxX8Vky', '2024-05-13 22:00:00', 'trainee'),
(6, 'christian', 'kgl', 'berwa1@gmail.com', '$2y$10$F3X2mTafPlhl3qM6QeQ5ju0skrRkXKMUS1GAiL82VGdd3mq0Hsha6', '2024-05-20 22:00:00', 'user'),
(7, 'aimee desire', 'rusizi', 'desire@gmail.com', '$2y$10$ZBe3QYUZIblPH2DxdpjtJOWbITNR68rY/Rf7Y0yLRHCjydImg3H4m', '2024-05-21 22:00:00', 'manager'),
(8, 'leontine', 'kigali', 'leontine@gmail.com', '$2y$10$q5agokpAaPemmxsl3/.W4ekBiAsWvMNKAH585qVYQqG1qJzwzY8p6', '2024-05-21 22:00:00', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`CertificateID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `InstructorID` (`InstructorID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `investment_planning_resources`
--
ALTER TABLE `investment_planning_resources`
  ADD PRIMARY KEY (`ResourceID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `LessonID` (`LessonID`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`LessonID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `QuizID` (`QuizID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`TraineeID`);

--
-- Indexes for table `userprogresses`
--
ALTER TABLE `userprogresses`
  ADD PRIMARY KEY (`ProgressID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `LessonID` (`LessonID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `CertificateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investment_planning_resources`
--
ALTER TABLE `investment_planning_resources`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `LessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `QuizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `TraineeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userprogresses`
--
ALTER TABLE `userprogresses`
  MODIFY `ProgressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructors` (`InstructorID`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `investment_planning_resources`
--
ALTER TABLE `investment_planning_resources`
  ADD CONSTRAINT `investment_planning_resources_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`),
  ADD CONSTRAINT `investment_planning_resources_ibfk_2` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`);

--
-- Constraints for table `userprogresses`
--
ALTER TABLE `userprogresses`
  ADD CONSTRAINT `userprogresses_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `userprogresses_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`),
  ADD CONSTRAINT `userprogresses_ibfk_3` FOREIGN KEY (`LessonID`) REFERENCES `lessons` (`LessonID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
