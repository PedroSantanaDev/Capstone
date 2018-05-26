DROP DATABASE IF EXISTS capstone_db;

CREATE DATABASE IF NOT EXISTS capstone_db;

USE capstone_db;


/**
*Creaates user table
*/
CREATE TABLE User(	
				user_id INT(11)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_name VARCHAR(255) NOT NULL,
				security_question VARCHAR(255) NOT NULL,
				security_question_answer VARCHAR(255) NOT NULL,
				password VARCHAR(255) NOT NULL,
				user_role VARCHAR(255) NOT NULL,
				photo VARCHAR(255),
				status INT(1) NOT NULL 
);
/**
*Creates Employee table
*/
CREATE TABLE Employee(
					employee_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					user_id INT(11) UNSIGNED NOT NULL,
					FOREIGN KEY fk_Employee(user_id ) REFERENCES user(user_id),
					name VARCHAR(255) NOT NULL,
					last_name VARCHAR(255) NOT NULL,
					title VARCHAR(255) NOT NULL,
					employee_no INT(11) NOT NULL,
					hire_date DATE,
					birthdate DATE,
					address VARCHAR(255),
					city VARCHAR(255),
					province VARCHAR(255),
					postal_code VARCHAR(10),
					home_phone_no VARCHAR(20),
					cellphone_no VARCHAR(20),
					email VARCHAR(255),
					status INT(1) NOT NULL
);
/**
*Creates Message table
*/
CREATE TABLE Message(
					message_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					user_id INT(11) UNSIGNED NOT NULL,
					send_by INT(11) UNSIGNED NOT NULL,
					send_to INT(11) UNSIGNED NOT NULL,
					FOREIGN KEY fk_Message_user_id(user_id ) REFERENCES user(user_id),
					FOREIGN KEY fk_Message_send_by(send_by) REFERENCES Employee(employee_id),
					FOREIGN KEY fk_Message_send_to(send_to) REFERENCES Employee(employee_id),
					message_title VARCHAR(255) NOT NULL,
					messsage TEXT,
					date_sent DATETIME,
					status INT(1) NOT NULL

);
/**
*Creates template files
*/
CREATE TABLE Template_Files(
						ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						file_name VARCHAR(255) NOT NULL,
						file VARCHAR(255) NOT NULL,
						upload_date DATETIME,
						description TEXT,
						uploaded_by VARCHAR(255) NOT NULL
);
/**
*Creates Training meterial table
*/
CREATE TABLE Training_Material(
							ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							user_id INT(11) UNSIGNED NOT NULL,
							FOREIGN KEY fk_Training_Material_user_id(user_id ) REFERENCES user(user_id),
							file_name VARCHAR(255) NOT NULL,
							upload_date DATETIME,
							uploaded_by VARCHAR(255) NOT NULL
);
/**
*Creates Shifts table
*/
CREATE TABLE Shifts(
				shift_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				employee_id INT(11) UNSIGNED NOT NULL,
				FOREIGN KEY fk_Shits_employee_id(employee_id) REFERENCES Employee(employee_id),
				shift_start_date DATETIME,
				shift_end_date DATETOME,
				shift_name VARCHAR(255),
				created_by VARCHAR(255)

);
/**
*Creates assigned shifts table
*/
CREATE TABLE assigned_shifts(
					ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					employee_id INT(11) UNSIGNED NOT NULL,
					FOREIGN KEY fk_Current_Work_Shift_employee_id(employee_id) REFERENCES Shifts(employee_id),
					punch_in_time TIMESTAMP NOT NULL,
					shift_date DATE NOT NULL,
					punch_out_time TIMESTAMP NOT NULL			
);
CREATE TABLE Time_Off(
					ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					employee_id INT(11) UNSIGNED NOT NULL,
					FOREIGN KEY fk_Time_Off_employee_id(employee_id) REFERENCES Employee(employee_id),
					reason TEXT NOT NULL,
					time_off_start_date DATETIME NOT NULL,
					time_off_end_date DATETIME NOT NULL		
);
/**
*Creates quiz table
*/
CREATE TABLE Quiz(
				quiz_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_id INT(11) UNSIGNED NOT NULL,
				FOREIGN KEY fk_Quiz_user_id(user_id) REFERENCES User(user_id),
				title VARCHAR(255) NOT NULL,
				description TEXT,
				date_created DATETIME NOT NULL,
				created_by VARCHAR(255) NOT NULL,
				score INT(11),
				status INT(1)
);
/**
*Creates quiz questions table
*/
CREATE TABLE Quiz_Questions(
						ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						quiz_id INT(11) UNSIGNED,
						FOREIGN KEY fk_Quiz_Questions_quiz_id(quiz_id) REFERENCES Quiz(quiz_id),
						question TEXT NOT NULL,
						correct_answer TEXT NOT NULL,
						wrong_answer_1 TEXT NOT NULL,
						wrong_answer_2 TEXT NOT NULL,
						wrong_answer_3 TEXT
);