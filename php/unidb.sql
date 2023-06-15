-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 11:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `nonacstaff`
--







CREATE TABLE `nonacstaff` (
  `stfId` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `dateOfJoining` date DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `lecId` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `university` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`lecId`, `fname`, `sname`, `gender`, `address`, `dob`, `email`, `telephone`, `nic`, `university`, `degree`) VALUES
('LEC000010', 'John', 'Miller', 'Male', '654 Cedar Street', '1985-01-15', 'johnmiller@example.com', '555-1234', '234-56-7890', 'Example University', 'Master of Arts'),
('LEC000011', 'Lisa', 'Garcia', 'Female', '987 Birch Street', '1978-06-18', 'lisagarcia@example.com', '555-2345', '345-67-8901', 'Another University', 'Master of Science'),
('LEC000012', 'Eric', 'Brown', 'Male', '357 Oak Street', '1991-09-21', 'ericbrown@example.com', '555-3456', '456-78-9012', 'Yet Another University', 'Bachelor of Arts'),
('LEC000013', 'Anna', 'Davis', 'Female', '753 Pine Street', '1983-04-11', 'annadavis@example.com', '555-4567', '567-89-0123', 'Example University', 'Bachelor of Science'),
('LEC000014', 'Matthew', 'Wilson', 'Male', '159 Elm Street', '1979-11-01', 'matthewwilson@example.com', '555-5678', '678-90-1234', 'Another University', 'Master of Arts'),
('LEC000015', 'Julia', 'Jackson', 'Female', '951 Cedar Street', '1986-03-04', 'juliajackson@example.com', '555-6789', '789-01-2345', 'Example University', 'Master of Science'),
('LEC000017', 'Karen', 'Lee', 'Female', '951 Oak Street', '1992-05-30', 'karenlee@example.com', '555-8901', '901-23-4567', 'Example University', 'Master of Arts'),
('LEC000018', 'Michael', 'Harris', 'Male', '357 Pine Street', '1987-12-14', 'michaelharris@example.com', '555-9012', '012-34-5678', 'Another University', 'Bachelor of Arts'),
('LEC000019', 'Emily', 'Smith', 'Female', '246 Cedar Street', '1999-03-08', 'emilysmith@example.com', '555-2345', '123-45-6789', 'Example University', 'Master of Science'),
('LEC000020', 'Daniel', 'Taylor', 'Male', '753 Elm Street', '1977-02-28', 'danieltaylor@example.com', '555-3456', '234-56-7890', 'Yet Another University', 'Bachelor of Science'),
('LEC000021', 'Catherine', 'Brown', 'Female', '456 Pine Street', '1982-09-12', 'catherinebrown@example.com', '555-4567', '345-67-8901', 'Example University', 'Bachelor of Science'),
('LEC000022', 'J SMITH', 'JAMES SMITH', 'Male', 'MAITHRIPALA SENANAYAKE MAWATHA', '2023-03-28', 'jsmith1256@gmail.com', '0754224225', '981942157V', 'RUHUNA', 'IT');

-- --------------------------------------------------------
--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `nic` varchar(15) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `academic_year` varchar(20) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  `date_of_admission` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nic`, `full_name`, `sname`, `gender`, `address`, `dob`, `email`, `telephone`, `faculty`, `department`, `academic_year`, `reg_number`, `date_of_admission`) VALUES
('981942140V', 'SHALITHA DESHAN WANASINGHE', 'S.D.K WANASINGHE', 'Male', 'BADULLA', '2023-03-20', 'shalitha@gmail.com', '0763326092', 'Applied Science', 'Physical Science', '2018/2019', '2018/ICT/95', '2023-03-14'),
('981942150V', 'TEST', 'TEST', 'Male', 'TEST', '2023-03-08', 'test@gmail.com', '0763326092', 'Applied Science', 'Physical Science', '2018/2019', '2018/ICT/01', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--
CREATE TABLE `subjects` (
  `subject_code` varchar(10) NOT NULL,
  `year_of_study` varchar(3) NOT NULL,
  `semester` int(2) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `number_of_credits` int(3) NOT NULL,
  `subject_type` varchar(10) NOT NULL,
  PRIMARY KEY (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `year_of_study`, `semester`, `subject_name`, `number_of_credits`, `subject_type`) VALUES
('AMC101', '1', 1, 'Mathematics I', 4, 'Math'),
('ENC101', '1', 1, 'Biology I', 3, 'Bio'),
('CSC101', '1', 1, 'Introduction to Programming', 3, 'IT'),
('AMC201', '2', 1, 'Mathematics II', 4, 'Math'),
('ENC201', '2', 1, 'Biology II', 3, 'Bio'),
('CSC201', '2', 1, 'Data Structures', 3, 'IT'),
('AMC301', '3', 1, 'Mathematics III', 4, 'Math'),
('ENC301', '3', 1, 'Genetics', 3, 'Bio'),
('CSC301', '3', 1, 'Database Management', 3, 'IT'),
('AMC401', '4', 1, 'Mathematics IV', 4, 'Math'),
('ENC401', '4', 1, 'Biotechnology', 3, 'Bio'),
('CSC401', '4', 1, 'Software Engineering', 3, 'IT'),
('AMC102', '1', 2, 'Mathematics II', 4, 'Math'),
('ENC102', '1', 2, 'Biology II', 3, 'Bio'),
('CSC102', '1', 2, 'Web Development', 3, 'IT'),
('AMC202', '2', 2, 'Mathematical Methods', 4, 'Math'),
('ENC202', '2', 2, 'Cell Biology', 3, 'Bio'),
('CSC202', '2', 2, 'Object-Oriented Programming', 3, 'IT'),
('AMC302', '3', 2, 'Mathematical Statistics', 4, 'Math'),
('ENC302', '3', 2, 'Ecology', 3, 'Bio'),
('CSC302', '3', 2, 'Computer Networks', 3, 'IT'),
('AMC402', '4', 2, 'Complex Analysis', 4, 'Math'),
('ENC402', '4', 2, 'Microbiology', 3, 'Bio'),
('CSC402', '4', 2, 'Artificial Intelligence', 3, 'IT');







--
-- Indexes for dumped tables
--

-- Create the 'exams' table
CREATE TABLE `exams` (
  `reg_number` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year_of_study` varchar(3) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_type` varchar(10) NOT NULL,
  `theory_marks` int,
  `practical_marks` int,
  `theory_ica01_marks` int,
  `theory_ica02_marks` int,
  `theory_ica03_marks` int,
  `practical_ica01_marks` int,
  `practical_ica02_marks` int,
  `practical_ica03_marks` int,
  `theory_grade` varchar(5),
  `practical_grade` varchar(5),
  `overall_grade` varchar(5),
  `gpa` decimal(4,2),
  PRIMARY KEY (`reg_number`, `subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `nonacstaff`
--
ALTER TABLE `nonacstaff`
  ADD PRIMARY KEY (`stfId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`lecId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `subjects`
--


ALTER TABLE `student`
  ADD UNIQUE (`reg_number`);

ALTER TABLE `subjects`
  ADD UNIQUE (`subject_code`);


-- Add foreign key references to the 'exams' table
ALTER TABLE `exams`
  ADD CONSTRAINT `fk_exams_student`
    FOREIGN KEY (`reg_number`)
    REFERENCES `student` (`reg_number`)
    ON DELETE CASCADE,
  ADD CONSTRAINT `fk_exams_subjects`
    FOREIGN KEY (`subject_code`)
    REFERENCES `subjects` (`subject_code`)
    ON DELETE CASCADE;


DELIMITER //

CREATE TRIGGER update_subject_type
BEFORE INSERT ON exams
FOR EACH ROW
BEGIN
    SET NEW.subject_type = (SELECT subject_type FROM subjects WHERE subject_code = NEW.subject_code);
END//

DELIMITER ;



ALTER TABLE exams ADD COLUMN `semester` varchar(10) NOT NULL;

DELIMITER //

CREATE TRIGGER update_semester
BEFORE INSERT ON exams
FOR EACH ROW
BEGIN
    SET NEW.semester = CASE
        WHEN NEW.subject_code LIKE '1%' THEN 'Semester 1'
        WHEN NEW.subject_code LIKE '2%' THEN 'Semester 2'
        -- Add more cases for other semesters if needed
        ELSE 'Unknown Semester'
    END;
END //

DELIMITER ;






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
