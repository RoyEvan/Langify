-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 03:55 PM
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
  `ASSIGNMENT_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `courses_taken`
--

CREATE TABLE `courses_taken` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `IS_FINISHED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `MATERIAL_ID` int(11) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `MATERIAL_TITLE` varchar(32) NOT NULL,
  `MATERIAL_DESC` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `ASSIGNMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `MATERIAL_ID` int(11) NOT NULL AUTO_INCREMENT;

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


