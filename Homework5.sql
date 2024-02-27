# BRYAN KIM
# CPSC 3300
# HOMEWORK 5
# CONTINUING WITH WRITING QUERIES ABOUT THE DATABASE IN HW4 AND PRACTICING TRIGGERS
# WITH AN INVENTORY DATABASE

#1)
#CREATED TABLES FROM HOMEWORK4 FOR QUERIES
CREATE DATABASE Homework5;
USE Homework5;

CREATE TABLE STUDENTS (
	STUDENT_ID CHAR(11),
    FIRST_NAME VARCHAR(20) NOT NULL,
    LAST_NAME VARCHAR(20) NOT NULL,
    GENDER CHAR(1) NOT NULL,
    DATE_OF_BIRTH DATE NOT NULL,
    PRIMARY KEY(STUDENT_ID)
);

CREATE TABLE COURSES (
	COURSE_CODE VARCHAR(6),
    COURSE_NAME VARCHAR(70) NOT NULL,
    COURSE_LEVEL CHAR(2),
    CREDITS INT NOT NULL,
    PRIMARY KEY(COURSE_CODE)
);

CREATE TABLE REGISTRATION (
	STUDENT_ID CHAR(11),
    COURSE_CODE VARCHAR(6),
    GRADE DECIMAL(2,1) NOT NULL,
	FOREIGN KEY(STUDENT_ID) REFERENCES STUDENTS(STUDENT_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(COURSE_CODE) REFERENCES COURSES(COURSE_CODE) ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY(STUDENT_ID,COURSE_CODE)
);

#INSERT VALUES INTO STUDENTS TABLE
INSERT INTO STUDENTS VALUES
	('861103-2438','Adam','Johnson','M','1990-10-01'),
	('911212-1746','Eva','Smith','F','1991-08-20'),
	('950829-1848','Anna','Washington','F','1993-09-26'),
	('123456-0980','Eric','Alonzo','M','1990-05-26'),
	('908023-2456','Bo','Ek','M','1992-03-15'),
	('098735-3456','Danny','Goss','M','1992-02-01'),
	('124345-3430','Mike','White','M','1995-06-10'),
	('124568-1345','Emily','Young','F','1995-04-28'),
	('908409-0010','Cathy','Lee','F','1993-10-06'),
	('124587-9088','Ben','Woo','M','1992-11-30'),
	('120953-0909','Anna','Washington','F','1990-10-09'),
	('120449-1008','John','Goss','M','1995-10-26');

#INSERT VALUES INTO COURSES TABLE
INSERT INTO COURSES VALUES
	('CS056','Database Systems','G1',5),
	('CS010','C++','U1',5),
	('ENG111','English','U1',3),
	('FIN052','Finance','G1',5),
	('PHY210','Physics','U2',5),
	('CHE350','Chemistry','U3',5),
	('BIO001','Biology','U1',3),
	('CS052','Operating Systems','G1',5);

#INSERT VALUES INTO REGISTRATION TABLE
INSERT INTO REGISTRATION VALUES
	('861103-2438','CS056',4.0),
	('861103-2438','CS010',4.0),
	('861103-2438','PHY210',3.5),
	('911212-1746','ENG111',2.0),
	('950829-1848','CHE350',3.0),
	('950829-1848','BIO001',2.5),
	('123456-0980','CS052',3.5),
	('123456-0980','CS056',4.0),
	('908023-2456','PHY210',3.0),
	('908023-2456','CS056',1.0),
	('908023-2456','CS010',2.0),
	('124345-3430','FIN052',2.5),
	('124345-3430','CHE350',4.0),
	('908409-0010','CS052',2.0),
	('124587-9088','BIO001',4.0),
	('124587-9088','CS052',3.5);

#1A)
#COURSES TAKEN BY 861103-2438
SELECT C.COURSE_NAME, C.CREDITS
FROM REGISTRATION R
INNER JOIN COURSES C ON R.COURSE_CODE = C.COURSE_CODE
WHERE R.STUDENT_ID = '861103-2438';

#1B)
# NUMBER OF CREDITS FOR STUDENTS WHO ENROLLED
SELECT S.STUDENT_ID, S.LAST_NAME, S.FIRST_NAME, SUM(C.CREDITS) AS TOTAL_CREDITS
FROM STUDENTS S
RIGHT JOIN REGISTRATION R ON R.STUDENT_ID = S.STUDENT_ID
LEFT JOIN COURSES C ON R.COURSE_CODE = C.COURSE_CODE
GROUP BY S.STUDENT_ID, S.LAST_NAME, S.FIRST_NAME;

#1C)
#CREATE VIEW TO SEE EVERYONE'S GPA (IF THEY ARE ENROLLED)
CREATE VIEW STUDENTS_GPA AS
	SELECT S.LAST_NAME AS LAST_NAME, S.FIRST_NAME AS FIRST_NAME, AVG(R.GRADE) AS GPA
    FROM STUDENTS S
    RIGHT JOIN REGISTRATION R ON S.STUDENT_ID = R.STUDENT_ID
    GROUP BY S.LAST_NAME, S.FIRST_NAME;
	
#SELECT THE STUDENTS THAT HAVE THE HIGHEST GPA
SELECT LAST_NAME, FIRST_NAME, GPA
FROM STUDENTS_GPA
WHERE GPA = (SELECT MAX(GPA) 
	FROM STUDENTS_GPA);

#1D)
#CREATE A VIEW TO ACCESS A STUDENT NAME AND THEIR COURSES
CREATE VIEW STUDENTS_TO_COURSES AS
	SELECT S.FIRST_NAME AS FIRST_NAME, S.LAST_NAME AS LAST_NAME, C.COURSE_NAME AS COURSE
	FROM STUDENTS S
	RIGHT JOIN REGISTRATION R ON R.STUDENT_ID = S.STUDENT_ID
	LEFT JOIN COURSES C ON R.COURSE_CODE = C.COURSE_CODE
    GROUP BY FIRST_NAME, LAST_NAME, COURSE;

#USE THE VIEW TO FIND STUDENTS THAT TOOK DATABASES
SELECT FIRST_NAME, LAST_NAME
FROM STUDENTS_TO_COURSES
WHERE COURSE = 'Database Systems';

#1E)
#USING THE VIEW MADE IN THE LAST PART, SELECT STUDENTS THAT TOOK BOTH DATABASES AND C++
SELECT TABLE1.FIRST_NAME, TABLE1.LAST_NAME
FROM STUDENTS_TO_COURSES TABLE1
JOIN STUDENTS_TO_COURSES TABLE2 ON TABLE1.FIRST_NAME = TABLE2.FIRST_NAME AND TABLE1.LAST_NAME = TABLE2.LAST_NAME
WHERE TABLE1.COURSE = 'Database Systems' 
AND TABLE2.COURSE = 'C++';

#1F)
#CREATE A ROSTER VIEW
CREATE VIEW ROSTER AS
	SELECT S.STUDENT_ID AS STUDENT_ID, S.FIRST_NAME AS FIRST_NAME, S.LAST_NAME AS LAST_NAME, C.COURSE_CODE AS COURSE_CODE, C.COURSE_NAME AS COURSE_NAME, R.GRADE AS GRADE
	FROM STUDENTS S
	LEFT JOIN REGISTRATION R ON S.STUDENT_ID = R.STUDENT_ID
	LEFT JOIN COURSES C ON R.COURSE_CODE = C.COURSE_CODE;

#SELECT ALL STUDENTS AND DISPLAY THEIR COURSES (COURSES COME OUT AS NULL IF NOT ENROLLED)
SELECT STUDENT_ID, FIRST_NAME, LAST_NAME, COURSE_NAME, GRADE
FROM ROSTER;

#1G)
#USE THE VIEW FROM THE PREVIOUS QUESTION
SELECT FIRST_NAME, LAST_NAME, COURSE_NAME
FROM ROSTER
WHERE COURSE_CODE LIKE 'CS%';

#COPIED TABLES REPRESENTING INVENTORY AND TRANSACTION OF APPLE STORE FROM THE ASSIGNMENT
create table Inventory (
	itemid varchar(20) primary key, 
    name varchar(30),
	price decimal(6,2),
	quantity int
);

create table Transaction (
	transid int auto_increment primary key, 
    itemid varchar(20),
	quantity int,
	time datetime,
	foreign key (itemid) references Inventory(itemid)
);

create table Inventory_history (
	id int auto_increment primary key,
	itemid varchar(20),
	action varchar(20),
	oldprice decimal(6,2),
	time datetime,
	foreign key (itemid) references Inventory(itemid)
);

#2A)
#TRIGGER WHERE A ROW OF INVENTORY HISTORY IS ADDED WHEN INVENTORY IS UPDATED
DELIMITER /
CREATE TRIGGER INSERT_INVENTORY AFTER INSERT ON Inventory
FOR EACH ROW
BEGIN
	INSERT INTO Inventory_history (itemid, time, action, oldprice)
	VALUES (NEW.itemid, NOW(), 'added an item', NULL);
END;
/

#2B)
#TRIGGER WHERE THE INVENTORY QUANTITY FOR A CERTAIN ITEM IS UPDATED WHEN A TRANSACTION HAPPENS
DELIMITER /
CREATE TRIGGER CHANGE_QUANTITY AFTER INSERT ON Transaction
FOR EACH ROW
BEGIN
	UPDATE Inventory 
    SET quantity = quantity - NEW.quantity
    WHERE itemid = NEW.itemid;
END;
/

#2C)
#TRIGGER WHERE THE AN ENTRY IN INVENTORY HISTORY IS ADDED WHEN INVENTORY IS UPDATED
DELIMITER /
CREATE TRIGGER CHANGE_PRICE BEFORE UPDATE ON Inventory
FOR EACH ROW 
BEGIN
	IF NOT NEW.price = OLD.price THEN
		INSERT INTO Inventory_history (itemid, time, action, oldprice)
		VALUES ('1234567890QWERTYUIOP', NOW(), 'price change', OLD.price);
	END IF;
END;
/

#TESTING 2A'S TRIGGER
INSERT INTO Inventory (itemid, name, price, quantity)VALUES('1234567890QWERTYUIOP', 'IPHONE', 1000.00, 5);
SELECT * FROM Inventory_history;

#TESTING 2B'S TRIGGER
INSERT INTO Transaction (itemid, quantity, time) VALUES('1234567890QWERTYUIOP', 3, NOW());
SELECT * FROM Inventory;

#TESTING 2C'S TRIGGER
UPDATE Inventory
SET price = 1200.00
WHERE itemid = '1234567890QWERTYUIOP';
SELECT * FROM Inventory_history;

#USED THIS TO RESET THE DATABASE
DROP DATABASE Homework5;