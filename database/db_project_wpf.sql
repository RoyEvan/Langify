DROP DATABASE db_project_wpf;
CREATE DATABASE db_project_wpf;
/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     3/05/2024 4:04:52 PM                         */
/*==============================================================*/


DROP TABLE IF EXISTS ASSIGNMENTS;

DROP TABLE IF EXISTS ASSIGNMENT_FILES;

DROP TABLE IF EXISTS COURSES;

DROP TABLE IF EXISTS COURSES_TAKEN;

DROP TABLE IF EXISTS MATERIALS;

DROP TABLE IF EXISTS MATERIAL_FILES;

DROP TABLE IF EXISTS STUDENTS;

drop table if exists TEACHERS;

/*==============================================================*/
/* Table: ASSIGNMENTS                                           */
/*==============================================================*/
create table ASSIGNMENTS
(
   ASSIGNMENT_ID        int not null,
   COURSE_ID            varchar(3) not null,
   ASSIGNMENT_TITLE     varchar(32) not null,
   ASSIGNMENT_DESC      varchar(255) not null,
   primary key (ASSIGNMENT_ID)
);

/*==============================================================*/
/* Table: ASSIGNMENT_FILES                                      */
/*==============================================================*/
create table ASSIGNMENT_FILES
(
   ASSIGNMENT_ID        int not null,
   ASSIGNMENT_FILE_PATH varchar(256) not null
);

/*==============================================================*/
/* Table: COURSES                                               */
/*==============================================================*/
create table COURSES
(
   COURSE_ID            varchar(3) not null,
   TEACHER_ID           varchar(8) not null,
   TEACHER_USERNAME     varchar(16) not null,
   COURSE_NAME          varchar(32) not null,
   COURSE_DESC          varchar(64),
   COURSE_LEVEL         int not null,
   COURSE_CLASS         varchar(6) not null,
   COURSE_DAY           varchar(9) not null,
   COURSE_LENGTH        float not null,
   primary key (COURSE_ID)
);

/*==============================================================*/
/* Table: COURSES_TAKEN                                         */
/*==============================================================*/
create table COURSES_TAKEN
(
   STUDENT_ID           varchar(8) not null,
   STUDENT_USERNAME     varchar(16) not null,
   COURSE_ID            varchar(3) not null,
   primary key (STUDENT_ID, STUDENT_USERNAME, COURSE_ID)
);

/*==============================================================*/
/* Table: MATERIALS                                             */
/*==============================================================*/
create table MATERIALS
(
   MATERIAL_ID          int not null,
   COURSE_ID            varchar(3) not null,
   MATERIAL_TITLE       varchar(32) not null,
   MATERIAL_DESC        varchar(256) not null,
   primary key (MATERIAL_ID)
);

/*==============================================================*/
/* Table: MATERIAL_FILES                                        */
/*==============================================================*/
create table MATERIAL_FILES
(
   MATERIAL_ID          int not null,
   MATERIAL_FILE_PATH   varchar(256) not null
);

/*==============================================================*/
/* Table: STUDENTS                                              */
/*==============================================================*/
create table STUDENTS
(
   STUDENT_ID           varchar(8) not null,
   USERNAME             varchar(16) not null,
   PASSWORD             varchar(255) not null,
   STUDENT_NAME         varchar(64) not null,
   STUDENT_EMAIL        varchar(32) not null,
   STUDENT_ADDRESS      varchar(128) not null,
   STUDENT_PHONE        varchar(13) not null,
   primary key (STUDENT_ID, STUDENT_USERNAME)
);

/*==============================================================*/
/* Table: TEACHERS                                              */
/*==============================================================*/
create table TEACHERS
(
   TEACHER_ID           varchar(8) not null,
   USERNAME             varchar(16) not null,
   PASSWORD             varchar(255) not null,
   TEACHER_NAME         varchar(64) not null,
   TEACHER_EMAIL        varchar(32) not null,
   TEACHER_ADDRESS      varchar(128) not null,
   TEACHER_PHONE        varchar(13) not null,
   primary key (TEACHER_ID, TEACHER_USERNAME)
);

alter table ASSIGNMENTS add constraint FK_RELATIONSHIP_5 foreign key (COURSE_ID)
      references COURSES (COURSE_ID) on delete restrict on update restrict;

alter table ASSIGNMENT_FILES add constraint FK_RELATIONSHIP_8 foreign key (ASSIGNMENT_ID)
      references ASSIGNMENTS (ASSIGNMENT_ID) on delete restrict on update restrict;

alter table COURSES add constraint FK_RELATIONSHIP_3 foreign key (TEACHER_ID, TEACHER_USERNAME)
      references TEACHERS (TEACHER_ID, TEACHER_USERNAME) on delete restrict on update restrict;

alter table COURSES_TAKEN add constraint FK_RELATIONSHIP_1 foreign key (STUDENT_ID, STUDENT_USERNAME)
      references STUDENTS (STUDENT_ID, STUDENT_USERNAME) on delete restrict on update restrict;

alter table COURSES_TAKEN add constraint FK_RELATIONSHIP_2 foreign key (COURSE_ID)
      references COURSES (COURSE_ID) on delete restrict on update restrict;

alter table MATERIALS add constraint FK_RELATIONSHIP_4 foreign key (COURSE_ID)
      references COURSES (COURSE_ID) on delete restrict on update restrict;

alter table MATERIAL_FILES add constraint FK_RELATIONSHIP_6 foreign key (MATERIAL_ID)
      references MATERIALS (MATERIAL_ID) on delete restrict on update restrict;

