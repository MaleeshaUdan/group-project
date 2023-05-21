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

--
-- Triggers `staff`
--

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
  `number_of_credits` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `year_of_study`, `semester`, `subject_name`, `number_of_credits`) VALUES
('ACU1113', '1', 1, 'English  Language 1', 0),
('ACU1212', '1', 2, 'Social Harmony  and Active  Citizenship ', 0),
('ACU2113', '2', 1, 'English  Language 11', 0),
('ACU2212', '2', 2, 'Communication  and Soft Skills', 0),
('ACU3112', '3', 1, 'Career Guidance ', 0),
('ACU3212', '3', 2, 'Management and Entrepreneurial  Skills  ', 0),
('ACU3222', '3', 2, 'Research  Methodology  and Scientific  Writing ', 0),
('IT1113', '1', 1, 'Fundamentals of Information Technology', 3),
('IT1122', '1', 1, 'Foundation of Mathematics  ', 2),
('IT1134', '1', 1, 'Fundamentals of programming ', 4),
('IT1144', '1', 1, 'Fundamentals of web programming  ', 4),
('IT1152', '1', 1, 'Essentials of Statistics ', 2),
('IT1262', '1', 2, 'Mathematics for Computing', 3),
('IT1214', '1', 2, 'Object Oriented Design  and Programming ', 4),
('IT1223 ', '1', 2, 'Database  Management Systems', 3),
('IT1232', '1', 2, 'Project Management ', 2),
('IT1242', '1', 2, 'Principles of Computer Networks', 2),
('IT1252', '1', 2, 'Electronics and Device  Interfacing ', 2),
('IT2114', '2', 1, 'Data Structures  ', 4),
('IT2122', '2', 1, 'Software Engineering ', 2),
('IT2133', '2', 1, 'Advanced Web Programming', 3),
('IT2143', '2', 1, 'Visual Programming ', 3),
('IT2153', '2', 1, 'Computer Graphics ', 3),
('IT2212', '2', 2, 'Management Information Systems ', 2),
('IT2223', '2', 2, 'Design and Analysis of Algorithms ', 2),
('IT2234', '2', 2, 'Web Services and Server  Technologies ', 4),
('IT2244', '2', 2, 'Operating Systems ', 4),
('IT2252', '2', 2, 'Social  and Professional Issues in IT ', 2),
('IT3113', '3', 1, 'Knowledge Based Systems and Logic Programming ', 3),
('IT3122', '3', 1, 'Computer Security ', 2),
('IT3133', '3', 1, 'Mobile Communication  and Computing  ', 3),
('IT3143', '3', 1, 'Digital Image Processing ', 3),
('IT3152', '3', 1, 'Software Quality Assurance ', 2),
('IT3162', '3', 1, 'Group  Project ', 2),
('IT3213', '3', 2, 'Human Computer Iteraction ', 3),
('IT3223', '3', 2, 'Advanced Database Management Systems ', 3),
('IT3232', '3', 2, 'E-Commerce ', 2),
('IT3243', '3', 2, 'Parallel Computing ', 3),
('IT3252', '3', 2, 'Multimedia  Computing ', 2),
('IT3262', '3', 2, 'Operations Research ', 2),
('IT4113', '4', 1, 'Computer  Organisation  and Architecture ', 3),
('IT4123', '4', 1, 'Agent Based Computing ', 3),
('IT4133', '4', 1, 'Bioinformatics and Computational  Biology  ', 3),
('IT4142', '4', 1, 'Compiler Design ', 2),
('IT4153', '4', 1, 'Advanced Computer Networks', 3),
('IT4216', '4', 2, 'Research Project  ', 6),
('IT4226', '4', 2, 'Industrial Training ', 6);

--
-- Indexes for dumped tables
--

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
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
