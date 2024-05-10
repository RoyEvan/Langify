-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 05:41 PM
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
-- Database: `db_project_wpf`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `ASSIGNMENT_TITLE` varchar(32) NOT NULL,
  `ASSIGNMENT_DESC` varchar(255) NOT NULL,
  `DEADLINE` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`ASSIGNMENT_ID`, `COURSE_ID`, `ASSIGNMENT_TITLE`, `ASSIGNMENT_DESC`, `DEADLINE`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'C0001', 'Week 0', 'Week 0 - Basic English', NULL, NULL, NULL, NULL),
(2, 'C0003', 'Week 0', 'Week 0 - Basic Mandarin', NULL, NULL, NULL, NULL),
(3, 'C0004', 'Week 0', 'Week 0 - Complex Mandarin', NULL, NULL, NULL, NULL),
(4, 'C0002', 'Week 0', 'Week 0 - Complex English', NULL, NULL, NULL, NULL),
(5, 'C0006', 'Week 0', 'Week 0 - Complex Spanish', NULL, NULL, NULL, NULL),
(6, 'C0008', 'Week 0', 'Week 0 - Complex Japanese', NULL, NULL, NULL, NULL),
(7, 'C0005', 'Week 0', 'Week 0 - Basic Spanish', NULL, NULL, NULL, NULL),
(8, 'C0007', 'Week 0', 'Week 0 - Basic Japanese', NULL, NULL, NULL, NULL),
(9, 'C0001', 'Week 1', 'Week 1 - Basic English', NULL, NULL, NULL, NULL),
(10, 'C0003', 'Week 1', 'Week 1 - Basic Mandarin', NULL, NULL, NULL, NULL),
(11, 'C0004', 'Week 1', 'Week 1 - Complex Mandarin', NULL, NULL, NULL, NULL),
(12, 'C0002', 'Week 1', 'Week 1 - Complex English', NULL, NULL, NULL, NULL),
(13, 'C0006', 'Week 1', 'Week 1 - Complex Spanish', NULL, NULL, NULL, NULL),
(14, 'C0008', 'Week 1', 'Week 1 - Complex Japanese', NULL, NULL, NULL, NULL),
(15, 'C0005', 'Week 1', 'Week 1 - Basic Spanish', NULL, NULL, NULL, NULL),
(16, 'C0007', 'Week 1', 'Week 1 - Basic Japanese', NULL, NULL, NULL, NULL),
(17, 'C0001', 'Week 2', 'Week 2 - Basic English', NULL, NULL, NULL, NULL),
(18, 'C0003', 'Week 2', 'Week 2 - Basic Mandarin', NULL, NULL, NULL, NULL),
(19, 'C0004', 'Week 2', 'Week 2 - Complex Mandarin', NULL, NULL, NULL, NULL),
(20, 'C0002', 'Week 2', 'Week 2 - Complex English', NULL, NULL, NULL, NULL),
(21, 'C0006', 'Week 2', 'Week 2 - Complex Spanish', NULL, NULL, NULL, NULL),
(22, 'C0008', 'Week 2', 'Week 2 - Complex Japanese', NULL, NULL, NULL, NULL),
(23, 'C0005', 'Week 2', 'Week 2 - Basic Spanish', NULL, NULL, NULL, NULL),
(24, 'C0007', 'Week 2', 'Week 2 - Basic Japanese', NULL, NULL, NULL, NULL),
(25, 'C0001', 'Week 3', 'Week 3 - Basic English', NULL, NULL, NULL, NULL),
(26, 'C0003', 'Week 3', 'Week 3 - Basic Mandarin', NULL, NULL, NULL, NULL),
(27, 'C0004', 'Week 3', 'Week 3 - Complex Mandarin', NULL, NULL, NULL, NULL),
(28, 'C0002', 'Week 3', 'Week 3 - Complex English', NULL, NULL, NULL, NULL),
(29, 'C0006', 'Week 3', 'Week 3 - Complex Spanish', NULL, NULL, NULL, NULL),
(30, 'C0008', 'Week 3', 'Week 3 - Complex Japanese', NULL, NULL, NULL, NULL),
(31, 'C0005', 'Week 3', 'Week 3 - Basic Spanish', NULL, NULL, NULL, NULL),
(32, 'C0007', 'Week 3', 'Week 3 - Basic Japanese', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_files`
--

CREATE TABLE `assignment_files` (
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `ASSIGNMENT_FILE_PATH` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSE_ID` varchar(5) NOT NULL,
  `TEACHER_ID` varchar(8) NOT NULL,
  `COURSE_NAME` varchar(32) NOT NULL,
  `COURSE_DESC` varchar(64) DEFAULT NULL,
  `COURSE_LEVEL` int(11) NOT NULL,
  `COURSE_CLASS` varchar(6) NOT NULL,
  `COURSE_DAY` varchar(9) NOT NULL,
  `COURSE_LENGTH` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_ID`, `TEACHER_ID`, `COURSE_NAME`, `COURSE_DESC`, `COURSE_LEVEL`, `COURSE_CLASS`, `COURSE_DAY`, `COURSE_LENGTH`) VALUES
('C0001', 'T2024001', 'English', 'You will learn basic English for daily life!', 1, 'A-201', 'Monday', 1.5),
('C0002', 'T2024001', 'English', 'You will learn complex English for complex conversations!', 2, 'A-202', 'Thursday', 2.5),
('C0003', 'T2024002', 'Mandarin', 'You will learn basic Mandarin for daily life!', 1, 'A-203', 'Monday', 1.5),
('C0004', 'T2024002', 'Mandarin', 'You will learn complex Mandarin for complex conversations!', 2, 'A-204', 'Tuesday', 2.5),
('C0005', 'T2024003', 'Spanish', 'You will learn basic Spanish for daily life!', 1, 'A-205', 'Saturday', 1.5),
('C0006', 'T2024003', 'Spanish', 'You will learn complex Spanish for complex conversations!', 2, 'A-206', 'Thursday', 2.5),
('C0007', 'T2024004', 'Japanese', 'You will learn basic Japanese for daily life!', 1, 'A-207', 'Saturday', 1.5),
('C0008', 'T2024004', 'Japanese', 'You will learn complex Japanese for complex conversations!', 2, 'A-208', 'Friday', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `courses_taken`
--

CREATE TABLE `courses_taken` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `IS_FINISHED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_taken`
--

INSERT INTO `courses_taken` (`STUDENT_ID`, `COURSE_ID`, `IS_FINISHED`) VALUES
('S2400001', 'C0001', 0),
('S2400001', 'C0005', 1),
('S2400001', 'C0006', 0),
('S2400001', 'C0007', 0),
('S2400002', 'C0001', 1),
('S2400002', 'C0002', 0),
('S2400002', 'C0003', 1),
('S2400002', 'C0004', 0),
('S2400003', 'C0001', 0),
('S2400003', 'C0003', 0),
('S2400003', 'C0005', 1),
('S2400003', 'C0006', 0),
('S2400003', 'C0007', 1),
('S2400003', 'C0008', 0),
('S2400004', 'C0001', 1),
('S2400004', 'C0002', 0),
('S2400004', 'C0003', 0),
('S2400004', 'C0005', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finished_assignments`
--

CREATE TABLE `finished_assignments` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `SCORE` float NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `MATERIAL_ID` int(11) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `MATERIAL_TITLE` varchar(32) NOT NULL,
  `MATERIAL_DESC` varchar(256) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`MATERIAL_ID`, `COURSE_ID`, `MATERIAL_TITLE`, `MATERIAL_DESC`, `CREATED_AT`, `UPDATED_AT`, `DELETED_AT`) VALUES
(1, 'C0001', 'Week 0', 'Introduction to English!', NULL, NULL, NULL),
(2, 'C0003', 'Week 0', 'Introduction to Mandarin!', NULL, NULL, NULL),
(3, 'C0004', 'Week 0', 'Introduction to Complex Mandarin!', NULL, NULL, NULL),
(4, 'C0002', 'Week 0', 'Introduction to Complex English!', NULL, NULL, NULL),
(5, 'C0006', 'Week 0', 'Introduction to Complex Spanish!', NULL, NULL, NULL),
(6, 'C0008', 'Week 0', 'Introduction to Complex Japanese!', NULL, NULL, NULL),
(7, 'C0005', 'Week 0', 'Introduction to Spanish', NULL, NULL, NULL),
(8, 'C0007', 'Week 0', 'Introduction to Japanese!', NULL, NULL, NULL),
(9, 'C0001', 'Week 1', 'Basic English Sentences and Questions', NULL, NULL, NULL),
(10, 'C0003', 'Week 1', 'Basic Mandarin Sentences and Questions', NULL, NULL, NULL),
(11, 'C0004', 'Week 1', 'Talk about our holidays in Mandarin!', NULL, NULL, NULL),
(12, 'C0002', 'Week 1', 'Talk about our holidays in English!', NULL, NULL, NULL),
(13, 'C0006', 'Week 1', 'Talk about our holidays in Spanish!', NULL, NULL, NULL),
(14, 'C0008', 'Week 1', 'Talk about our holidays in Japanese!', NULL, NULL, NULL),
(15, 'C0005', 'Week 1', 'Basic Spanish Sentences and Questions', NULL, NULL, NULL),
(16, 'C0007', 'Week 1', 'Basic Japanese Sentences and Questions', NULL, NULL, NULL),
(17, 'C0001', 'Week 2', 'Basic Tenses in English!', NULL, NULL, NULL),
(18, 'C0003', 'Week 2', 'Speaking Basic Sentences in Mandarin!', NULL, NULL, NULL),
(19, 'C0004', 'Week 2', 'Making Poetry in Mandarin!', NULL, NULL, NULL),
(20, 'C0002', 'Week 2', 'Making Poetry in English!', NULL, NULL, NULL),
(21, 'C0006', 'Week 2', 'Making Poetry in Spanish!', NULL, NULL, NULL),
(22, 'C0008', 'Week 2', 'Making Poetry in Japanese!', NULL, NULL, NULL),
(23, 'C0005', 'Week 2', 'Speaking Basic Sentences in Spanish!', NULL, NULL, NULL),
(24, 'C0007', 'Week 2', 'Speaking Basic Sentences in Japanese!', NULL, NULL, NULL),
(25, 'C0001', 'Week 3', 'Talk about our family and friends in English!', NULL, NULL, NULL),
(26, 'C0003', 'Week 3', 'Writing basic sentences and a story about family in Mandarin!', NULL, NULL, NULL),
(27, 'C0004', 'Week 3', 'Guess these chinese songs lyrics!', NULL, NULL, NULL),
(28, 'C0002', 'Week 3', 'Guess what is the meaniong of these English songs!', NULL, NULL, NULL),
(29, 'C0006', 'Week 3', 'Guess what is the meaniong of these Spanish songs!', NULL, NULL, NULL),
(30, 'C0008', 'Week 3', 'Guess what is the meaniong of these Japanese songs!', NULL, NULL, NULL),
(31, 'C0005', 'Week 3', 'Talk about our family and friends in Spanish!', NULL, NULL, NULL),
(32, 'C0007', 'Week 3', 'Talk about our family and friends in Japanese!', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_files`
--

CREATE TABLE `material_files` (
  `MATERIAL_ID` int(11) NOT NULL,
  `MATERIAL_FILE_PATH` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `STUDENT_USERNAME` varchar(16) NOT NULL,
  `STUDENT_NAME` varchar(64) NOT NULL,
  `STUDENT_EMAIL` varchar(32) NOT NULL,
  `STUDENT_ADDRESS` varchar(128) NOT NULL,
  `STUDENT_PHONE` varchar(13) NOT NULL,
  `STUDENT_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`STUDENT_ID`, `STUDENT_USERNAME`, `STUDENT_NAME`, `STUDENT_EMAIL`, `STUDENT_ADDRESS`, `STUDENT_PHONE`, `STUDENT_PASSWORD`) VALUES
('S2400001', 'AlbertV24', 'Albert@456', 'Albert Valentino Utomo', 'albert.v22@mhs.istts.ac.id', 'Jalan Yang Pe', '81322310662'),
('S2400002', 'KevinJo24', 'Kevin@234', 'Kevin Jonathan', 'kevin.j22@mhs.istts.ac.id', 'Jalan Kenanga', '81322310664'),
('S2400003', 'Raymond24', 'Raymond@345', 'Raymond Lyanto Hoentoro', 'raymond.l22@mhs.istts.ac.id', 'Jalan Tidak B', '81322310667'),
('S2400004', 'RoyEvan24', 'Roy@123', 'Roy Evan Wiguna', 'roy.e22@mhs.istts.ac.id', 'Jalan Ku Berp', '81322310670');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TEACHER_ID` varchar(8) NOT NULL,
  `TEACHER_USERNAME` varchar(16) NOT NULL,
  `TEACHER_NAME` varchar(64) NOT NULL,
  `TEACHER_EMAIL` varchar(32) NOT NULL,
  `TEACHER_ADDRESS` varchar(128) NOT NULL,
  `TEACHER_PHONE` varchar(13) NOT NULL,
  `TEACHER_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TEACHER_ID`, `TEACHER_USERNAME`, `TEACHER_NAME`, `TEACHER_EMAIL`, `TEACHER_ADDRESS`, `TEACHER_PHONE`, `TEACHER_PASSWORD`) VALUES
('T2024001', 'Albert', 'Albert@456', 'Albert Valentino', 'albert.v22@teach.istts.ac.id', 'Jalan Yang Pe', '81322310662'),
('T2024002', 'Kevin', 'Kevin@234', 'Kevin Jonathan', 'kevin.j22@teach.istts.ac.id', 'Jalan Kenanga', '81322310664'),
('T2024003', 'Raymond', 'Raymond@345', 'Raymond Lyanto', 'raymond.l22@teach.istts.ac.id', 'Jalan Tidak B', '81322310667'),
('T2024004', 'Roy', 'Roy@123', 'Roy Evan', 'roy.e22@teach.istts.ac.id', 'Jalan Ku Berp', '81322310670');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`ASSIGNMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_5` (`COURSE_ID`);

--
-- Indexes for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD KEY `FK_RELATIONSHIP_8` (`ASSIGNMENT_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSE_ID`),
  ADD KEY `FK_RELATIONSHIP_3` (`TEACHER_ID`);

--
-- Indexes for table `courses_taken`
--
ALTER TABLE `courses_taken`
  ADD PRIMARY KEY (`STUDENT_ID`,`COURSE_ID`),
  ADD KEY `FK_RELATIONSHIP_2` (`COURSE_ID`);

--
-- Indexes for table `finished_assignments`
--
ALTER TABLE `finished_assignments`
  ADD PRIMARY KEY (`STUDENT_ID`,`ASSIGNMENT_ID`),
  ADD KEY `FK_RELATIONSHIP_9` (`ASSIGNMENT_ID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`MATERIAL_ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`COURSE_ID`);

--
-- Indexes for table `material_files`
--
ALTER TABLE `material_files`
  ADD KEY `FK_RELATIONSHIP_6` (`MATERIAL_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TEACHER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `ASSIGNMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `MATERIAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`);

--
-- Constraints for table `assignment_files`
--
ALTER TABLE `assignment_files`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ASSIGNMENT_ID`) REFERENCES `assignments` (`ASSIGNMENT_ID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`TEACHER_ID`) REFERENCES `teachers` (`TEACHER_ID`);

--
-- Constraints for table `courses_taken`
--
ALTER TABLE `courses_taken`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`);

--
-- Constraints for table `finished_assignments`
--
ALTER TABLE `finished_assignments`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ASSIGNMENT_ID`) REFERENCES `assignments` (`ASSIGNMENT_ID`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`);

--
-- Constraints for table `material_files`
--
ALTER TABLE `material_files`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`MATERIAL_ID`) REFERENCES `materials` (`MATERIAL_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
