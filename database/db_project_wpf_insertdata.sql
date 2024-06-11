/*
SQLyog Community v13.2.0 (64 bit)
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

/*Data for the table `assignments` */

insert  into `assignments`(`ASSIGNMENT_ID`,`COURSE_ID`,`ASSIGNMENT_TITLE`,`ASSIGNMENT_DESC`,`DEADLINE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(1,'C0001','Week 0','Week 0 - Basic English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(2,'C0003','Week 0','Week 0 - Basic Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(3,'C0004','Week 0','Week 0 - Complex Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(4,'C0002','Week 0','Week 0 - Complex English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(5,'C0006','Week 0','Week 0 - Complex Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(6,'C0008','Week 0','Week 0 - Complex Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(7,'C0005','Week 0','Week 0 - Basic Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(8,'C0007','Week 0','Week 0 - Basic Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(9,'C0001','Week 1','Week 1 - Basic English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(10,'C0003','Week 1','Week 1 - Basic Mandarin','2024-06-09 11:39:05','2024-06-02 06:39:05',NULL,NULL),
(11,'C0004','Week 1','Week 1 - Complex Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(12,'C0002','Week 1','Week 1 - Complex English','2024-06-09 23:59:59','2024-06-02 06:39:05',NULL,NULL),
(13,'C0006','Week 1','Week 1 - Complex Spanish','2024-06-09 23:59:59','2024-06-02 06:39:05',NULL,NULL),
(14,'C0008','Week 1','Week 1 - Complex Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(15,'C0005','Week 1','Week 1 - Basic Spanish','2024-06-16 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(16,'C0007','Week 1','Week 1 - Basic Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(17,'C0001','Week 2','Week 2 - Basic English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(18,'C0003','Week 2','Week 2 - Basic Mandarin','2024-06-16 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(19,'C0004','Week 2','Week 2 - Complex Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(20,'C0002','Week 2','Week 2 - Complex English','2024-06-09 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(21,'C0006','Week 2','Week 2 - Complex Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(22,'C0008','Week 2','Week 2 - Complex Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(23,'C0005','Week 2','Week 2 - Basic Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(24,'C0007','Week 2','Week 2 - Basic Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(25,'C0001','Week 3','Week 3 - Basic English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(26,'C0003','Week 3','Week 3 - Basic Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(27,'C0004','Week 3','Week 3 - Complex Mandarin','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(28,'C0002','Week 3','Week 3 - Complex English','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(29,'C0006','Week 3','Week 3 - Complex Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(30,'C0008','Week 3','Week 3 - Complex Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(31,'C0005','Week 3','Week 3 - Basic Spanish','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(32,'C0007','Week 3','Week 3 - Basic Japanese','2024-06-02 06:39:05','2024-06-02 06:39:05',NULL,NULL),
(33,'C0005','coba coba','coba coba tugas','2024-07-11 00:00:00','2024-06-09 08:32:02','2024-06-09 08:32:02',NULL);

/*Data for the table `courses` */

insert  into `courses`(`COURSE_ID`,`TEACHER_ID`,`COURSE_NAME`,`COURSE_DESC`,`COURSE_LEVEL`,`COURSE_CLASS`,`COURSE_DAY`,`COURSE_LENGTH`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('C0001','T2024001','English','You will learn basic English for daily life!',1,'A-201','Monday',1.5,'2024-06-02 06:39:05',NULL,NULL),
('C0002','T2024001','English','You will learn complex English for complex conversations!',2,'A-202','Thursday',2.5,'2024-06-02 06:39:05',NULL,NULL),
('C0003','T2024002','Mandarin','You will learn basic Mandarin for daily life!',1,'A-203','Monday',1.5,'2024-06-02 06:39:05',NULL,NULL),
('C0004','T2024002','Mandarin','You will learn complex Mandarin for complex conversations!',2,'A-204','Tuesday',2.5,'2024-06-02 06:39:05',NULL,NULL),
('C0005','T2024003','Spanish','You will learn basic Spanish for daily life!',1,'A-205','Saturday',1.5,'2024-06-02 06:39:05',NULL,NULL),
('C0006','T2024003','Spanish','You will learn complex Spanish for complex conversations!',2,'A-206','Thursday',2.5,'2024-06-02 06:39:05',NULL,NULL),
('C0007','T2024004','Japanese','You will learn basic Japanese for daily life!',1,'A-207','Saturday',1.5,'2024-06-02 06:39:05',NULL,NULL),
('C0008','T2024004','Japanese','You will learn complex Japanese for complex conversations!',2,'A-208','Friday',2.5,'2024-06-02 06:39:05',NULL,NULL);

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

/*Data for the table `finished_assignments` */

insert  into `finished_assignments`(`ASSIGNMENT_ID`,`STUDENT_ID`,`FILE_PATH`,`SCORE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(12,'S2400002','2',99,'2024-06-08 23:54:34',NULL,NULL),
(4,'S2400004','1',100,'2024-06-08 16:20:14',NULL,NULL);

/*Data for the table `material_files` */

insert  into `material_files`(`MATERIAL_ID`,`MATERIAL_FILE_PATH`) values 
(1,'1.html');

/*Data for the table `materials` */

insert  into `materials`(`MATERIAL_ID`,`COURSE_ID`,`MATERIAL_TITLE`,`MATERIAL_DESC`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
(1,'C0001','Week 0','Introduction to English!','2024-06-02 06:39:05',NULL,NULL),
(2,'C0003','Week 0','Introduction to Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(3,'C0004','Week 0','Introduction to Complex Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(4,'C0002','Week 0','Introduction to Complex English!','2024-06-02 06:39:05',NULL,NULL),
(5,'C0006','Week 0','Introduction to Complex Spanish!','2024-06-02 06:39:05',NULL,NULL),
(6,'C0008','Week 0','Introduction to Complex Japanese!','2024-06-02 06:39:05',NULL,NULL),
(7,'C0005','Week 0','Introduction to Spanish','2024-06-02 06:39:05',NULL,NULL),
(8,'C0007','Week 0','Introduction to Japanese!','2024-06-02 06:39:05',NULL,NULL),
(9,'C0001','Week 1','Basic English Sentences and Questions','2024-06-02 06:39:05',NULL,NULL),
(10,'C0003','Week 1','Basic Mandarin Sentences and Questions','2024-06-02 06:39:05',NULL,NULL),
(11,'C0004','Week 1','Talk about our holidays in Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(12,'C0002','Week 1','Talk about our holidays in English!','2024-06-02 06:39:05',NULL,NULL),
(13,'C0006','Week 1','Talk about our holidays in Spanish!','2024-06-02 06:39:05',NULL,NULL),
(14,'C0008','Week 1','Talk about our holidays in Japanese!','2024-06-02 06:39:05',NULL,NULL),
(15,'C0005','Week 1','Basic Spanish Sentences and Questions','2024-06-02 06:39:05',NULL,NULL),
(16,'C0007','Week 1','Basic Japanese Sentences and Questions','2024-06-02 06:39:05',NULL,NULL),
(17,'C0001','Week 2','Basic Tenses in English!','2024-06-02 06:39:05',NULL,NULL),
(18,'C0003','Week 2','Speaking Basic Sentences in Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(19,'C0004','Week 2','Making Poetry in Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(20,'C0002','Week 2','Making Poetry in English!','2024-06-02 06:39:05',NULL,NULL),
(21,'C0006','Week 2','Making Poetry in Spanish!','2024-06-02 06:39:05',NULL,NULL),
(22,'C0008','Week 2','Making Poetry in Japanese!','2024-06-02 06:39:05',NULL,NULL),
(23,'C0005','Week 2','Speaking Basic Sentences in Spanish!','2024-06-02 06:39:05',NULL,NULL),
(24,'C0007','Week 2','Speaking Basic Sentences in Japanese!','2024-06-02 06:39:05',NULL,NULL),
(25,'C0001','Week 3','Talk about our family and friends in English!','2024-06-02 06:39:05',NULL,NULL),
(26,'C0003','Week 3','Writing basic sentences and a story about family in Mandarin!','2024-06-02 06:39:05',NULL,NULL),
(27,'C0004','Week 3','Guess these chinese songs lyrics!','2024-06-02 06:39:05',NULL,NULL),
(28,'C0002','Week 3','Guess what is the meaniong of these English songs!','2024-06-02 06:39:05',NULL,NULL),
(29,'C0006','Week 3','Guess what is the meaniong of these Spanish songs!','2024-06-02 06:39:05',NULL,NULL),
(30,'C0008','Week 3','Guess what is the meaniong of these Japanese songs!','2024-06-02 06:39:05',NULL,NULL),
(31,'C0005','Week 3','Talk about our family and friends in Spanish!','2024-06-02 06:39:05',NULL,NULL),
(32,'C0007','Week 3','Talk about our family and friends in Japanese!','2024-06-02 06:39:10',NULL,NULL),
(33,'C0008','Week 4','5651612613213151516','2024-06-07 14:55:10','2024-06-07 15:01:35','2024-06-07 15:01:35'),
(34,'C0008','asdasd','48484848484','2024-06-07 14:55:21','2024-06-07 15:01:27','2024-06-07 15:01:27');

/*Data for the table `students` */

insert  into `students`(`STUDENT_ID`,`STUDENT_USERNAME`,`STUDENT_PASSWORD`,`STUDENT_NAME`,`STUDENT_EMAIL`,`STUDENT_ADDRESS`,`STUDENT_PHONE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('S2400001','AlbertV24','$2y$12$rjQKITsUL1XZmKvfP3inveTj9nBGn7syXhZxwHN3h8ITnbMwyE8HC','Albert Valentino Utomo','albert.v22@mhs.istts.ac.id','Jalan Yang Penuh Kenangan No. 6-10 Blok A','81322310662','2024-06-02 06:39:05',NULL,NULL),
('S2400002','KevinJo24','$2y$12$ntat4FFbZXf0opJSWfbOX.z/uURMWHo2Cpyw/Jj5vxlnUBBbk79LK','Kevin Jonathan','kevin.j22@mhs.istts.ac.id','Jalan Kenangan No. 45-47','81322310664','2024-06-02 06:39:05',NULL,NULL),
('S2400003','Raymond24','$2y$12$fNRqBK60hRob1Ayl8KKKjOpux3Xa0LIR.cyq2UX33nnJieD/WNSLG','Raymond Lyanto Hoentoro','raymond.l22@mhs.istts.ac.id','Jalan Tidak Buntu No. 73-79','81322310667','2024-06-02 06:39:05',NULL,NULL),
('S2400004','RoyEvan24','$2y$12$40S0zbNW0QJtS9W46Z70UO6V3fUFFwUm9j3F763tFd42uLRw4WiK.','Roy Evan Wiguna','roy.e22@mhs.istts.ac.id','Jalan Ku Berpisah Dengan Mu No. 73-77','81322310670','2024-06-02 06:39:05',NULL,NULL);

/*Data for the table `teachers` */

insert  into `teachers`(`TEACHER_ID`,`TEACHER_USERNAME`,`TEACHER_PASSWORD`,`TEACHER_NAME`,`TEACHER_EMAIL`,`TEACHER_ADDRESS`,`TEACHER_PHONE`,`CREATED_AT`,`UPDATED_AT`,`DELETED_AT`) values 
('T2024001','Albert','$2y$12$tGbz3e0d0Tou6u3Ec2lvRe7Gc4zvrTq59luDVKbR.87U1XJscK8PC','Albert Valentino','albert.v22@teach.istts.ac.id','Jalan Yang Penuh Kenangan No. 6-10 Blok A','81322310662','2024-06-02 06:39:05',NULL,NULL),
('T2024002','Kevin','$2y$12$47j15vI9M4j5MSBxmNUvouLR9ebYi6Uv.eEqhLOZCzuPNARKunBAK','Kevin Jonathan','kevin.j22@teach.istts.ac.id','Jalan Kenangan No. 45-47','81322310664','2024-06-02 06:39:05',NULL,NULL),
('T2024003','Raymond','$2y$12$JwG1FbSUlRn.TQ8komUUg.sKAD51QQlt2LFVmuIg21CRBZG8/TQ6G','Raymond Lyanto','raymond.l22@teach.istts.ac.id','Jalan Tidak Buntu No. 73-79','81322310667','2024-06-02 06:39:05',NULL,NULL),
('T2024004','Roy','$2y$12$wAiJfGeq77XeOaCB3ppY.eIwP1qDkoVsWkhqNJmixVS/y5SXL3z4m','Roy Evan','roy.e22@teach.istts.ac.id','Jalan Ku Berpisah Dengan Mu No. 73-77','81322310670','2024-06-02 06:39:05',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
