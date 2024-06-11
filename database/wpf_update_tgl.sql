/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_project_wpf
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_project_wpf` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_project_wpf`;

/*Table structure for table `assignment_files` */

DROP TABLE IF EXISTS `assignment_files`;

CREATE TABLE `assignment_files` (
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `ASSIGNMENT_FILE_PATH` varchar(256) NOT NULL,
  KEY `FK_RELATIONSHIP_8` (`ASSIGNMENT_ID`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ASSIGNMENT_ID`) REFERENCES `assignments` (`ASSIGNMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `assignment_files` */

/*Table structure for table `assignments` */

DROP TABLE IF EXISTS `assignments`;

CREATE TABLE `assignments` (
  `ASSIGNMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_ID` varchar(5) NOT NULL,
  `ASSIGNMENT_TITLE` varchar(32) NOT NULL,
  `ASSIGNMENT_DESC` varchar(255) NOT NULL,
  `DEADLINE` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ASSIGNMENT_ID`),
  KEY `FK_RELATIONSHIP_5` (`COURSE_ID`),
  CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `assignments` */

insert  into `assignments`(`ASSIGNMENT_ID`,`COURSE_ID`,`ASSIGNMENT_TITLE`,`ASSIGNMENT_DESC`,`DEADLINE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(33,'C0001','Week 0','Week 0 - Basic English','2024-05-15 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(34,'C0003','Week 0','Week 0 - Basic Mandarin','2024-05-15 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(35,'C0004','Week 0','Week 0 - Complex Mandarin','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(36,'C0002','Week 0','Week 0 - Complex English','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(37,'C0006','Week 0','Week 0 - Complex Spanish','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(38,'C0008','Week 0','Week 0 - Complex Japanese','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(39,'C0005','Week 0','Week 0 - Basic Spanish','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(40,'C0007','Week 0','Week 0 - Basic Japanese','2024-06-09 19:55:14','2024-05-15 19:55:14',NULL,NULL),
(41,'C0001','Week 1','Week 1 - Basic English','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(42,'C0003','Week 1','Week 1 - Basic Mandarin','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(43,'C0004','Week 1','Week 1 - Complex Mandarin','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(44,'C0002','Week 1','Week 1 - Complex English','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(45,'C0006','Week 1','Week 1 - Complex Spanish','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(46,'C0008','Week 1','Week 1 - Complex Japanese','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(47,'C0005','Week 1','Week 1 - Basic Spanish','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(48,'C0007','Week 1','Week 1 - Basic Japanese','2024-06-09 19:55:14','2024-05-22 19:55:14',NULL,NULL),
(49,'C0001','Week 2','Week 2 - Basic English','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(50,'C0003','Week 2','Week 2 - Basic Mandarin','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(51,'C0004','Week 2','Week 2 - Complex Mandarin','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(52,'C0002','Week 2','Week 2 - Complex English','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(53,'C0006','Week 2','Week 2 - Complex Spanish','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(54,'C0008','Week 2','Week 2 - Complex Japanese','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(55,'C0005','Week 2','Week 2 - Basic Spanish','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(56,'C0007','Week 2','Week 2 - Basic Japanese','2024-06-09 19:55:14','2024-05-29 19:55:14',NULL,NULL),
(57,'C0001','Week 3','Week 3 - Basic English','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(58,'C0003','Week 3','Week 3 - Basic Mandarin','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(59,'C0004','Week 3','Week 3 - Complex Mandarin','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(60,'C0002','Week 3','Week 3 - Complex English','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(61,'C0006','Week 3','Week 3 - Complex Spanish','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(62,'C0008','Week 3','Week 3 - Complex Japanese','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(63,'C0005','Week 3','Week 3 - Basic Spanish','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL),
(64,'C0007','Week 3','Week 3 - Basic Japanese','2024-06-09 19:55:14','2024-06-09 19:55:14',NULL,NULL);

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `COURSE_ID` varchar(5) NOT NULL,
  `TEACHER_ID` varchar(8) NOT NULL,
  `COURSE_NAME` varchar(32) NOT NULL,
  `COURSE_DESC` varchar(64) DEFAULT NULL,
  `COURSE_LEVEL` int(11) NOT NULL,
  `COURSE_CLASS` varchar(6) NOT NULL,
  `COURSE_DAY` varchar(9) NOT NULL,
  `COURSE_LENGTH` float NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`COURSE_ID`),
  KEY `FK_RELATIONSHIP_3` (`TEACHER_ID`),
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`TEACHER_ID`) REFERENCES `teachers` (`TEACHER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `courses` */

insert  into `courses`(`COURSE_ID`,`TEACHER_ID`,`COURSE_NAME`,`COURSE_DESC`,`COURSE_LEVEL`,`COURSE_CLASS`,`COURSE_DAY`,`COURSE_LENGTH`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('C0001','T2024001','English','You will learn basic English for daily life!',1,'A-201','Monday',1.5,'2024-06-09 19:55:14',NULL,NULL),
('C0002','T2024001','English','You will learn complex English for complex conversations!',2,'A-202','Thursday',2.5,'2024-06-09 19:55:14',NULL,NULL),
('C0003','T2024002','Mandarin','You will learn basic Mandarin for daily life!',1,'A-203','Monday',1.5,'2024-06-09 19:55:14',NULL,NULL),
('C0004','T2024002','Mandarin','You will learn complex Mandarin for complex conversations!',2,'A-204','Tuesday',2.5,'2024-06-09 19:55:14',NULL,NULL),
('C0005','T2024003','Spanish','You will learn basic Spanish for daily life!',1,'A-205','Saturday',1.5,'2024-06-09 19:55:14',NULL,NULL),
('C0006','T2024003','Spanish','You will learn complex Spanish for complex conversations!',2,'A-206','Thursday',2.5,'2024-06-09 19:55:14',NULL,NULL),
('C0007','T2024004','Japanese','You will learn basic Japanese for daily life!',1,'A-207','Saturday',1.5,'2024-06-09 19:55:14',NULL,NULL),
('C0008','T2024004','Japanese','You will learn complex Japanese for complex conversations!',2,'A-208','Friday',2.5,'2024-06-09 19:55:14',NULL,NULL);

/*Table structure for table `courses_taken` */

DROP TABLE IF EXISTS `courses_taken`;

CREATE TABLE `courses_taken` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `COURSE_ID` varchar(5) NOT NULL,
  `IS_FINISHED` tinyint(1) NOT NULL,
  PRIMARY KEY (`STUDENT_ID`,`COURSE_ID`),
  KEY `FK_RELATIONSHIP_2` (`COURSE_ID`),
  CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`),
  CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `courses_taken` */

insert  into `courses_taken`(`STUDENT_ID`,`COURSE_ID`,`IS_FINISHED`) values 
('S2400001','C0001',0),
('S2400001','C0005',1),
('S2400001','C0006',0),
('S2400001','C0007',0),
('S2400002','C0001',1),
('S2400002','C0002',0),
('S2400002','C0003',1),
('S2400002','C0004',0),
('S2400003','C0001',0),
('S2400003','C0003',0),
('S2400003','C0005',1),
('S2400003','C0006',0),
('S2400003','C0007',1),
('S2400003','C0008',0),
('S2400004','C0001',1),
('S2400004','C0002',0),
('S2400004','C0003',0),
('S2400004','C0005',0);

/*Table structure for table `finished_assignments` */

DROP TABLE IF EXISTS `finished_assignments`;

CREATE TABLE `finished_assignments` (
  `ASSIGNMENT_ID` int(11) NOT NULL,
  `STUDENT_ID` varchar(8) NOT NULL,
  `FILE_PATH` varchar(255) NOT NULL,
  `SCORE` float NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`),
  KEY `FK_RELATIONSHIP_9` (`FILE_PATH`),
  KEY `FK_ASSIGN_STUDENT` (`ASSIGNMENT_ID`),
  CONSTRAINT `FK_ASSIGN_STUDENT` FOREIGN KEY (`ASSIGNMENT_ID`) REFERENCES `assignments` (`ASSIGNMENT_ID`),
  CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`STUDENT_ID`) REFERENCES `students` (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `finished_assignments` */

/*Table structure for table `material_files` */

DROP TABLE IF EXISTS `material_files`;

CREATE TABLE `material_files` (
  `MATERIAL_ID` int(11) NOT NULL,
  `MATERIAL_FILE_PATH` varchar(256) NOT NULL,
  KEY `FK_RELATIONSHIP_6` (`MATERIAL_ID`),
  CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`MATERIAL_ID`) REFERENCES `materials` (`MATERIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `material_files` */

/*Table structure for table `materials` */

DROP TABLE IF EXISTS `materials`;

CREATE TABLE `materials` (
  `MATERIAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COURSE_ID` varchar(5) NOT NULL,
  `MATERIAL_TITLE` varchar(32) NOT NULL,
  `MATERIAL_DESC` varchar(256) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`MATERIAL_ID`),
  KEY `FK_RELATIONSHIP_4` (`COURSE_ID`),
  CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`COURSE_ID`) REFERENCES `courses` (`COURSE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `materials` */

insert  into `materials`(`MATERIAL_ID`,`COURSE_ID`,`MATERIAL_TITLE`,`MATERIAL_DESC`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(35,'C0001','Week 0','Introduction to English!','2024-05-15 19:55:14',NULL,NULL),
(36,'C0003','Week 0','Introduction to Mandarin!','2024-05-15 19:55:14',NULL,NULL),
(37,'C0004','Week 0','Introduction to Complex Mandarin!','2024-05-15 19:55:14',NULL,NULL),
(38,'C0002','Week 0','Introduction to Complex English!','2024-05-15 19:55:14',NULL,NULL),
(39,'C0006','Week 0','Introduction to Complex Spanish!','2024-05-15 19:55:14',NULL,NULL),
(40,'C0008','Week 0','Introduction to Complex Japanese!','2024-05-15 19:55:14',NULL,NULL),
(41,'C0005','Week 0','Introduction to Spanish','2024-05-15 19:55:14',NULL,NULL),
(42,'C0007','Week 0','Introduction to Japanese!','2024-05-15 19:55:14',NULL,NULL),
(43,'C0001','Week 1','Basic English Sentences and Questions','2024-05-22 19:55:14',NULL,NULL),
(44,'C0003','Week 1','Basic Mandarin Sentences and Questions','2024-05-22 19:55:14',NULL,NULL),
(45,'C0004','Week 1','Talk about our holidays in Mandarin!','2024-05-22 19:55:14',NULL,NULL),
(46,'C0002','Week 1','Talk about our holidays in English!','2024-05-22 19:55:14',NULL,NULL),
(47,'C0006','Week 1','Talk about our holidays in Spanish!','2024-05-22 19:55:14',NULL,NULL),
(48,'C0008','Week 1','Talk about our holidays in Japanese!','2024-05-22 19:55:14',NULL,NULL),
(49,'C0005','Week 1','Basic Spanish Sentences and Questions','2024-05-22 19:55:14',NULL,NULL),
(50,'C0007','Week 1','Basic Japanese Sentences and Questions','2024-05-22 19:55:14',NULL,NULL),
(51,'C0001','Week 2','Basic Tenses in English!','2024-05-29 19:55:14',NULL,NULL),
(52,'C0003','Week 2','Speaking Basic Sentences in Mandarin!','2024-05-29 19:55:14',NULL,NULL),
(53,'C0004','Week 2','Making Poetry in Mandarin!','2024-05-29 19:55:14',NULL,NULL),
(54,'C0002','Week 2','Making Poetry in English!','2024-05-29 19:55:14',NULL,NULL),
(55,'C0006','Week 2','Making Poetry in Spanish!','2024-05-29 19:55:14',NULL,NULL),
(56,'C0008','Week 2','Making Poetry in Japanese!','2024-05-29 19:55:14',NULL,NULL),
(57,'C0005','Week 2','Speaking Basic Sentences in Spanish!','2024-05-29 19:55:14',NULL,NULL),
(58,'C0007','Week 2','Speaking Basic Sentences in Japanese!','2024-05-29 19:55:14',NULL,NULL),
(59,'C0001','Week 3','Talk about our family and friends in English!','2024-06-09 19:55:14',NULL,NULL),
(60,'C0003','Week 3','Writing basic sentences and a story about family in Mandarin!','2024-06-09 19:55:14',NULL,NULL),
(61,'C0004','Week 3','Guess these chinese songs lyrics!','2024-06-09 19:55:14',NULL,NULL),
(62,'C0002','Week 3','Guess what is the meaniong of these English songs!','2024-06-09 19:55:14',NULL,NULL),
(63,'C0006','Week 3','Guess what is the meaniong of these Spanish songs!','2024-06-09 19:55:14',NULL,NULL),
(64,'C0008','Week 3','Guess what is the meaniong of these Japanese songs!','2024-06-09 19:55:14',NULL,NULL),
(65,'C0005','Week 3','Talk about our family and friends in Spanish!','2024-06-09 19:55:14',NULL,NULL),
(66,'C0007','Week 3','Talk about our family and friends in Japanese!','2024-06-09 19:55:14',NULL,NULL);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `STUDENT_ID` varchar(8) NOT NULL,
  `STUDENT_USERNAME` varchar(16) NOT NULL,
  `STUDENT_PASSWORD` varchar(255) NOT NULL,
  `STUDENT_NAME` varchar(64) NOT NULL,
  `STUDENT_EMAIL` varchar(32) NOT NULL,
  `STUDENT_ADDRESS` varchar(128) NOT NULL,
  `STUDENT_PHONE` varchar(13) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `students` */

insert  into `students`(`STUDENT_ID`,`STUDENT_USERNAME`,`STUDENT_PASSWORD`,`STUDENT_NAME`,`STUDENT_EMAIL`,`STUDENT_ADDRESS`,`STUDENT_PHONE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('S2400001','AlbertV24','$2y$12$nzoRLLC7f3mKBncx1naM3uZaxMaPvdjOCiKzVzIR570CDRjp6pnvC','Albert Valentino Utomo','albert.v22@mhs.istts.ac.id','Jalan Yang Penuh Kenangan No. 6-10 Blok A','81322310662','2024-06-09 19:55:14',NULL,NULL),
('S2400002','KevinJo24','$2y$12$4Kjc7Sd0k/YGnFnlcrYXQOH2hrNN5u7smnLFfnfcDcj6B92PLRoHS','Kevin Jonathan','kevin.j22@mhs.istts.ac.id','Jalan Kenangan No. 45-47','81322310664','2024-06-09 19:55:14',NULL,NULL),
('S2400003','Raymond24','Raymond@345','Raymond Lyanto Hoentoro','raymond.l22@mhs.istts.ac.id','Jalan Tidak Buntu No. 73-79','81322310667','2024-06-09 19:55:14',NULL,NULL),
('S2400004','RoyEvan24','Roy@123','Roy Evan Wiguna','roy.e22@mhs.istts.ac.id','Jalan Ku Berpisah Dengan Mu No. 73-77','81322310670','2024-06-09 19:55:14',NULL,NULL);

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `TEACHER_ID` varchar(8) NOT NULL,
  `TEACHER_USERNAME` varchar(16) NOT NULL,
  `TEACHER_PASSWORD` varchar(255) NOT NULL,
  `TEACHER_NAME` varchar(64) NOT NULL,
  `TEACHER_EMAIL` varchar(32) NOT NULL,
  `TEACHER_ADDRESS` varchar(128) NOT NULL,
  `TEACHER_PHONE` varchar(13) NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`TEACHER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`TEACHER_ID`,`TEACHER_USERNAME`,`TEACHER_PASSWORD`,`TEACHER_NAME`,`TEACHER_EMAIL`,`TEACHER_ADDRESS`,`TEACHER_PHONE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('T2024001','Albert','$2y$12$nzoRLLC7f3mKBncx1naM3uZaxMaPvdjOCiKzVzIR570CDRjp6pnvC','Albert Valentino','albert.v22@teach.istts.ac.id','Jalan Yang Penuh Kenangan No. 6-10 Blok A','81322310662','2024-06-09 19:55:14',NULL,NULL),
('T2024002','Kevin','Kevin@234','Kevin Jonathan','kevin.j22@teach.istts.ac.id','Jalan Kenangan No. 45-47','81322310664','2024-06-09 19:55:14',NULL,NULL),
('T2024003','Raymond','Raymond@345','Raymond Lyanto','raymond.l22@teach.istts.ac.id','Jalan Tidak Buntu No. 73-79','81322310667','2024-06-09 19:55:14',NULL,NULL),
('T2024004','Roy','Roy@123','Roy Evan','roy.e22@teach.istts.ac.id','Jalan Ku Berpisah Dengan Mu No. 73-77','81322310670','2024-06-09 19:55:14',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
