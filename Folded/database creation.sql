DROP DATABASE dbFolded;
CREATE DATABASE dbFolded;

USE dbFolded;

CREATE TABLE tblAccount(
acc_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
acc_email VARCHAR(255),
acc_name VARCHAR(255),
acc_password VARCHAR(255),
acc_type VARCHAR(10),
acc_code VARCHAR(255));

CREATE TABLE tblQuestion(
que_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
que_question VARCHAR(255),
que_option_one VARCHAR(255),
que_option_two VARCHAR(255),
que_option_three VARCHAR(255),
que_answer VARCHAR(255));

CREATE TABLE tblComp(
com_entry_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
com_question_id int,
com_answer VARCHAR(10),
com_classroom VARCHAR(255),
com_school VARCHAR(255),
com_student_email VARCHAR(255),
com_school_contact VARCHAR(255),
FOREIGN KEY (com_question_id)
REFERENCES tblquestion(que_id));

CREATE TABLE tblTrack(
tra_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
tra_account_id INT,
tra_teacher_code INT,
tra_guide VARCHAR(255),
tra_page_no INT,
FOREIGN KEY (tra_teacher_code)
REFERENCES tblaccount(acc_id),
FOREIGN KEY (tra_account_id)
REFERENCES tblaccount(acc_id)
);


CREATE TABLE tblComment(
com_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
com_account_id INT,
com_guide VARCHAR(255),
com_comment VARCHAR(255),
com_timestamp TIMESTAMP,
FOREIGN KEY (com_account_id)
REFERENCES tblaccount(acc_id)
);

INSERT INTO tblQuestion(que_question, que_option_one, que_option_two, que_option_three, que_answer)
VALUES
('Where did Origami originate from','Japan','Canada','India','Japan'),
('What is the most popular animal origami model','Cat','Frog','Swan','Swan'),
('What does "Ori" mean in the word origami?','Folding','Cutting','Paper','Paper');
INSERT INTO tblaccount
VALUES('1','NoTeacher','NoTeacher','NoTeacher','No','NoTeacher'),
('2','Teacher@gmail.com','Todd','123','Teacher',''),
('3','Dave@gmail.com','Dave','123','Student','2'),
('4','Tom@gmail.com','Tom','123','Student','2'),
('5','Bob@gmail.com','Bob','123','Student','2'),
('6','Sue@gmail.com','Sue','123','Student','2');
INSERT INTO tbltrack
VALUES('1','3','2','plane','3'),
('2','4','2','plane','2'),
('3','5','2','swan','3'),
('4','6','2','boat','2');

