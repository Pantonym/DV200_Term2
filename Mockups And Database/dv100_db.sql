-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 02:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dv100_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `RecepID` int(11) NOT NULL,
  `DoctorRoom` varchar(5) NOT NULL,
  `AppointmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppointmentID`, `DoctorID`, `PatientID`, `RecepID`, `DoctorRoom`, `AppointmentDate`) VALUES
(1, 1, 3, 1, 'DR1', '2023-08-12'),
(2, 2, 5, 1, 'DR2', '2023-06-14'),
(3, 1, 1, 1, 'DR1', '2023-06-13'),
(4, 7, 7, 1, 'DR7', '2023-06-13'),
(5, 3, 3, 1, 'DR3', '2023-06-22'),
(6, 3, 9, 1, 'DR3', '2023-06-14'),
(7, 2, 5, 1, 'DR2', '2023-06-20'),
(8, 4, 2, 1, 'DR4', '2023-06-21'),
(9, 6, 2, 1, 'DR6', '2023-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ProfileImg` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `Specialization` text NOT NULL,
  `DoctorRoom` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ProfileImg`, `Name`, `Surname`, `Age`, `Gender`, `Email`, `Password`, `PhoneNumber`, `DoctorID`, `Specialization`, `DoctorRoom`) VALUES
('IMG-64916d084cd101.03882223.jpg', 'Sara', 'Andrews', 31, 'F', 'Sandrews@yahoo.co.za', 'DrEV123', '0716324938', 1, 'Cardiology', 'DR1'),
('IMG-64916cf47f1725.74141068.jpg', 'Johnathan', 'Viljoen', 31, 'M', 'JViljoen@gmail.com', 'dhdsjfvhsvfe3', '0183647675', 2, 'Pediatry', 'DR2'),
('IMG-64916cec7f6d13.62213099.jpg', 'Angela', 'Johanssen', 34, 'F', 'AJohanssen@gmail.com', 'Angela1123', '6542345656', 3, 'Cardiology', 'DR3'),
('IMG-64916d2159e4d7.99124754.jpg', 'Gerald', 'Rivers', 29, 'M', 'GRGeneral@gmail.com', 'jsfvbefyb7878', '7875652424', 4, 'General Practitioner', 'DR4'),
('IMG-64916d2f89efb8.35247417.jpg', 'Nicholas', 'Gage', 55, 'O', 'NicholasOnly@gmail.com', 'Password', '0715657890', 5, 'Hematologist', 'DR5'),
('IMG-64916d3c46fc25.43331861.jpg', 'Dieter', 'Walker', 34, 'M', 'Dieter@gmail.com', 'drgbsertb56', '0765457816', 6, 'Orthodontist', 'DR6'),
('IMG-64916d4619a590.78812206.jpg', 'Hannah', 'Monta', 35, 'F', 'HannahDoctor@gmail.com', 'rbgdr567683345fjh', '0716762890', 7, 'Optometrist', 'DR7');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ProfileImg` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `MedicalAidNumber` varchar(18) NOT NULL,
  `PrevAppointments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ProfileImg`, `Name`, `Surname`, `Age`, `Gender`, `Email`, `Password`, `PhoneNumber`, `PatientID`, `MedicalAidNumber`, `PrevAppointments`) VALUES
('IMG-64916de2271495.18107660.jpg', 'Narfi', 'Andrews', 20, 'M', 'andrews@yahoo.co.za', 'sertbsrbt67', '0716764938', 1, '556543213456789876', '2021-01-02'),
('IMG-64916df22a3a32.13365218.jpg', 'Fred', 'Andrews', 18, 'M', 'andrewsF@yahoo.co.za', 'cfhgfghrgr', '0714764638', 2, '555643213456789876', '2021-01-02'),
('IMG-64916e023b6e01.24350968.jpg', 'Garfield', 'Johns', 27, 'M', 'andrewgarfieldfan@yahoo.co.za', 'drvgsrgv', '0791426373', 3, '556554113456789876', '2023-01-02'),
('IMG-64916e109fa9c4.62681201.jpg', 'Brenard', 'Brook', 55, 'M', 'brooklyn@gmail.com', 'thcffty5y6hht', '0791426357', 4, '126543213456789876', '2023-02-02'),
('IMG-64916e1cb4d420.30499255.jpg', 'Annie', 'Van Zijl', 65, 'F', 'gentlewomananne@gmail.com', 'gymjeregrv', '0744766938', 5, '234343213456789876', '2023-10-02'),
('IMG-64916e262b1249.14035643.jpg', 'Charlie', 'Adora', 45, 'F', 'ardora97@gmail.com', 'edebr55syb', '0716454938', 6, '126543213456789876', '2023-11-02'),
('IMG-64916e2cccbd33.72988077.jpg', 'James', 'Derohn', 24, 'M', 'nobleson@gmail.com', 'sbey5ybny', '0716764568', 7, '763543213456789876', '0000-00-00'),
('IMG-64916e39b42865.47167760.jpg', 'Higa', 'Ta Drip', 26, 'O', 'higatadrip@gmail.com', 'y5nms4yn4', '0716767938', 8, '842543213456789876', '0000-00-00'),
('IMG-64916e40ad31d9.49063579.jpg', 'Holga', 'Deran', 67, 'F', 'norweigan@gmail.com', '4ynmuse4m', '0716778938', 9, '724543213456789876', '2023-12-12'),
('IMG-64916e47b1cbc0.24116454.jpg', 'Anthony', 'Mark', 33, 'M', 'ceasarhater@gmail.com', '4smy4nys', '0756764938', 10, '523543213456789876', '0000-00-00'),
('IMG-64916e5161d720.17372534.jpg', 'Jessica', 'Richards', 32, 'F', 'jessicarichards@yahoo.co.za', 'sm4y4nsy4yn', '0714564938', 11, '523143213456789876', '0000-00-00'),
('IMG-64916e59c1ac64.07558360.jpg', 'Diana', 'Winchester', 36, 'F', 'dianaw@yahoo.co.za', 'm5usnthsrtnest', '0716763438', 12, '523143213456789876', '0000-00-00'),
('IMG-64916e61218240.02365129.jpg', 'Ignatius', 'Eldor', 32, 'M', 'ignaeldor@gmail.com', '4ynsy5vse4t', '0716514938', 13, '231343213456789876', '2021-05-02'),
('IMG-64916e683201c4.67962320.jpg', 'Kayghleighs', 'Doe', 25, 'F', 'keyghleighs@gmail.com', 'Password', '0716237938', 14, '234143213456789876', '2023-09-04'),
('IMG-64916e6e4af729.88740949.jpg', 'Samus', 'Willow', 29, 'F', 'willowypillowy@gmail.com', 'gtdt', '0716692938', 15, '634254321345678987', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `RecepID` int(11) NOT NULL,
  `ProfileImg` varchar(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Rank` varchar(20) NOT NULL,
  `SignedIn` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`RecepID`, `ProfileImg`, `Name`, `Surname`, `Age`, `Gender`, `PhoneNumber`, `Email`, `Password`, `Rank`, `SignedIn`) VALUES
(1, 'IMG-649169a535c814.85349902.jpg', 'Clint', 'Czerbowsky', 42, 'M', '023 454 5693', 'blonde24@gmail.com', '$2y$10$o.wWe8HmbQWMQGY19wKQ2.KY/.DY8rsYdtVTZxNCrS1Ic1JGdEfli', 'Head Receptionist', '0'),
(2, 'IMG-64916acf0d24f2.91497868.jpg', 'Sarah', 'Albert', 23, 'F', '021 234 8793', 'saraha@gmail.com', '$2y$10$2UA2VXEjRyNkjt//qZHqn.R/vbQDHvbNOGPtk262RWmtEJ5BqzsQ2', 'Receptionist', '0'),
(3, 'IMG-64916aeebc8911.68872983.jpg', 'Janet', 'Doe', 21, 'F', '079 413 7787', 'janet@gmail.com', '$2y$10$v4PZUA/lGCuUMCrToyFQ5elZYRD7kJjzgA96XivUSjBpBC2xT/7Jm', 'Receptionist', '0'),
(4, 'IMG-64916afb950427.29803727.jpg', 'John', 'Doe', 21, 'M', '079 423 7755', 'john@gmail.com', '$2y$10$ZQAXKZ4FRpMP.p39/kgupOcfcatGbmHsjmKZ9kDWK7nEY5taGjmbG', 'Receptionist', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `DoctorID` (`DoctorID`,`PatientID`,`RecepID`),
  ADD KEY `RecepID` (`RecepID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`RecepID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `RecepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`RecepID`) REFERENCES `receptionist` (`RecepID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
