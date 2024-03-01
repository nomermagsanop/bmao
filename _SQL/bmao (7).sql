-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 10:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmao`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay_records`
--

CREATE TABLE `barangay_records` (
  `id` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `event` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `custom_message` text NOT NULL,
  `formatted_date` varchar(255) NOT NULL,
  `formatted_time` varchar(255) NOT NULL,
  `formatted_date2` varchar(255) NOT NULL,
  `formatted_time2` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `active_farmers_list` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_records`
--

INSERT INTO `barangay_records` (`id`, `contact`, `event`, `location`, `custom_message`, `formatted_date`, `formatted_time`, `formatted_date2`, `formatted_time2`, `full_name`, `brgy`, `active_farmers_list`, `status`, `delete_flag`) VALUES
(105, '09957310087', 'HYBRID SEEDS DISTRIBUTION', 'PCB COVER COURT', 'yrrrrrr', 'January 17, 2024', '7:00 AM', 'January 18, 2024', '8:00 AM', 'TAUGTOG BARANGAY  STAFF ', 'TAUGTOG', '1. NOMER VILLANUEVA MAGSANOP \n2. GLEN ANTIQUERA ANDALES \n3. ALJAY DIAL DEVILLAS \n4. ANGELO BARCASE MAGSANOP \n5. ROSEANN VILLANUEVA MAGSANOP \n6. DANI RONQUILLO BORBON \n7. JULY ENCARNACION ASUNCION \n8. SERAFIN  DAYO MAGSANOP \n9. ROMAN VILLANUEVA MAGSANOP \n1', 'NOTIFIED', 0),
(106, '09957310087', 'HYBRID SEEDS DISTRIBUTION', 'PLAZA 2', 'ccc', 'January 17, 2024', '7:00 AM', 'January 18, 2024', '8:00 AM', 'TAUGTOG BARANGAY  STAFF ', 'TAUGTOG', '1. NOMER VILLANUEVA MAGSANOP \n2. GLEN ANTIQUERA ANDALES \n3. ALJAY DIAL DEVILLAS \n4. ANGELO BARCASE MAGSANOP \n5. ROSEANN VILLANUEVA MAGSANOP \n6. DANI RONQUILLO BORBON \n7. JULY ENCARNACION ASUNCION \n8. SERAFIN  DAYO MAGSANOP \n9. ROMAN VILLANUEVA MAGSANOP \n1', 'NOTIFIED', 0),
(107, '09957310087', 'NITROGEN-FIXING FERTILIZER DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', 'bring id', 'January 17, 2024', '8:00 AM', 'January 18, 2024', '5:00 PM', 'TAUGTOG BARANGAY  STAFF ', 'TAUGTOG', '1. NOMER VILLANUEVA MAGSANOP \n2. GLEN ANTIQUERA ANDALES \n3. ALJAY DIAL DEVILLAS \n4. ANGELO BARCASE MAGSANOP \n5. ROSEANN VILLANUEVA MAGSANOP \n6. DANI RONQUILLO BORBON \n7. JULY ENCARNACION ASUNCION \n8. SERAFIN  DAYO MAGSANOP \n9. ROMAN VILLANUEVA MAGSANOP \n1', 'NOTIFIED', 0),
(108, '09957310087', 'NITROGEN-FIXING FERTILIZER DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', 'SAMPLERE', 'January 17, 2024', '8:00 AM', 'January 18, 2024', '5:00 PM', 'TAUGTOG BARANGAY  STAFF ', 'TAUGTOG', '1. GLEN ANTIQUERA ANDALES \n2. ALJAY DIAL DEVILLAS \n3. ANGELO BARCASE MAGSANOP \n4. ROSEANN VILLANUEVA MAGSANOP \n5. DANI RONQUILLO BORBON \n6. JULY ENCARNACION ASUNCION \n7. SERAFIN  DAYO MAGSANOP \n8. ROMAN VILLANUEVA MAGSANOP \n9. ESPERANZA PELAYO TANDOC \n10.', 'NOTIFIED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_start_time` time DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_end_time` time DEFAULT NULL,
  `event_location` text DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `program_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_event_master`
--

INSERT INTO `calendar_event_master` (`event_id`, `event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`, `event_location`, `event_description`, `program_id`, `status`) VALUES
(449, '2024-01-17', '08:00:00', '2024-01-18', '17:00:00', 'a:2:{i:0;s:6:\"BANCAL\";i:1;s:6:\"BANGAN\";}', '', '37', 'PENDING'),
(450, '2024-01-20', '08:00:00', '2024-01-21', '17:00:00', 'a:2:{i:0;s:8:\"SANTIAGO\";i:1;s:17:\"TAMPO (POBLACION)\";}', '', '35', 'ACCOMPLISHED'),
(451, '2024-01-30', '13:00:00', '2024-01-31', '17:00:00', 'a:2:{i:0;s:5:\"PAREL\";i:1;s:7:\"PAUDPOD\";}', '', '34', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `controlno` varchar(255) DEFAULT NULL,
  `rnumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `land_size` varchar(250) DEFAULT NULL,
  `upload_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `first_name`, `middle_name`, `last_name`, `extension_name`, `dob`, `sex`, `email`, `contact`, `emergency_contact`, `controlno`, `rnumber`, `address`, `brgy`, `land_size`, `upload_url`, `status`, `delete_flag`, `created_at`) VALUES
(58, 'NOMER', 'VILLANUEVA', 'MAGSANOP', '', '2023-10-13', 'MALE', 'NOMER@SAMPLE.COM', '09957310087', '', '1', '1', 'TAUGTOG', 'TAUGTOG', '1', '12345.webp', 'ACTIVE', 1, '2024-01-13 16:37:39'),
(59, 'GLEN', 'ANTIQUERA', 'ANDALES', '', '2023-10-25', '', 'GLENANDALES@GMAIL.COM', '09999999988', '09999999988', '2', '2', 'NTRA PUROK 8', 'TAUGTOG', '2', '2323.webp', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(62, 'ALJAY', 'DIAL', 'DEVILLAS', '', '2023-10-02', 'MALE', 'ALJAY@GMAIL.COM', '09799999999', '09799999999', '3', '3', 'PUROK 13', 'TAUGTOG', '5', '51234.png', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(66, 'ANGELO', 'BARCASE', 'MAGSANOP', '', '2023-11-18', 'MALE', 'ANGELO@SAMPLE.COM', '09455876558', '09455876558', '4', '4', 'PROPER', 'TAUGTOG', '6', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(81, 'ROSEANN', 'VILLANUEVA', 'MAGSANOP', '', '2023-10-19', 'FEMALE', 'ROSEANN@GMAIL.COM', '09699999999', '09699999999', '5', '5', 'PUROK 5 PROPER', 'TAUGTOG', '5', '1234567890.webp', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(82, 'DANI', 'RONQUILLO', 'BORBON', '', '2023-10-10', 'FEMALE', 'DANICA@GMAIL.COM', '09599999999', '09599999999', '6', '6', 'PUROK 2', 'TAUGTOG', '2', '797878756.webp', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(84, 'JULY', 'ENCARNACION', 'ASUNCION', '', '2023-10-21', 'MALE', 'JULIO@GMAIL.COM', '09672586000', '09672586000', '7', '7', 'NTRA PUROK 5', 'TAUGTOG', '2', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(87, 'SERAFIN', ' DAYO', 'MAGSANOP', '', '1978-11-12', 'MALE', 'MAGANOP@GMAIL.COM', '09499999999', '09499999999', '8', '8', 'PUROK 5 ', 'TAUGTOG', '4', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(89, 'ROMAN', 'VILLANUEVA', 'MAGSANOP', '', '2023-12-07', 'MALE', 'ROMANM@GMAIL.COM', '09599999999', '09599999999', '9', '9', 'PROPER', 'TAUGTOG', '5', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(90, 'ESPERANZA', 'PELAYO', 'TANDOC', '', '2023-11-07', 'FEMALE', 'ESPE@GMAIL.COM', '09399999999', '09399999999', '10', '10', 'NTRA', 'TAUGTOG', '6', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(91, 'TAK', 'CUS', 'DOCS', '', '2023-11-16', 'MALE', 'TAK@GMAIL.COM', '09957310087', '09957310087', '11', '11', 'PROPER', 'BANCAL', '1', '', 'INACTIVE', 0, '2024-01-13 16:37:39'),
(94, 'MARVIN', 'F', 'NIEVES', '', '2023-11-23', 'MALE', 'MARVIN@GMAIL.COM', '09978347765', '09978347765', '12', '12', 'PROPER', 'BANCAL', '77', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(95, 'AERON', 'S', 'PASCUA', '', '2023-11-30', 'MALE', 'AERON@GMAIL', '09299999999', '09299999999', '13', '13', 'PUROK 1', 'BANCAL', '5', '', 'INACTIVE', 0, '2024-01-13 16:37:39'),
(96, 'LEAH', 'M', 'PARAS', '', '2023-11-23', 'FEMALE', 'LEAH@GMAIL.COM', '09199999999', '09199999999', '14', '14', 'PUROK 1', 'BANCAL', '10', '', 'INACTIVE', 0, '2024-01-13 16:37:39'),
(97, 'RICHELLE', 'D', 'CORPUZ', '', '2023-12-01', 'FEMALE', 'R@GMAIL.COM', '09206221111', '09206221111', '15', '15', 'PUROK3', 'BANCAL', '.5', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(98, 'TIM', 'M', 'CASSIDY', '', '2023-11-30', 'MALE', 'TIM@GMAIL.COM', '09215838999', '09215838999', '16', '16', 'PUROK 1', 'BANCAL', '1', '', 'ACTIVE', 0, '2024-01-13 16:37:39'),
(99, 'TINO', 'DOCUTIN', 'DIOHEN', 'II', '2024-01-12', 'MALE', 'TINO@GMAIL.COM', '08888888888', '08888888888', '17', '17', 'PANGLAN', 'TAUGTOG', '2', '', 'ACTIVE', 0, '2024-01-13 16:43:13'),
(100, 'KRISTINE MAE', 'DOCS', 'DIOHEN', '', '2024-01-12', 'FEMALE', 'KMAE@GMAIL.COM', '09111111111', '09111111111', '18', '18', 'PANGLAN', 'TAUGTOG', '1', '12.png', 'ACTIVE', 0, '2024-01-13 17:01:58'),
(101, 'RALPH', 'DOCUTIN', 'CUSTODIO', '', '2024-01-11', 'MALE', 'RALP@GMAIL.COM', '42322242341', '42322242341', '19', '19', 'NTRA PUROK6', 'BANCAL', '2', '', 'INACTIVE', 0, '2024-01-13 21:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `farmers_records`
--

CREATE TABLE `farmers_records` (
  `id` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `custom_message` text NOT NULL,
  `formatted_date` varchar(255) NOT NULL,
  `formatted_time` varchar(255) NOT NULL,
  `formatted_date2` varchar(255) NOT NULL,
  `formatted_time2` varchar(255) NOT NULL,
  `land_size` varchar(255) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers_records`
--

INSERT INTO `farmers_records` (`id`, `contact`, `emergency_contact`, `event`, `location`, `custom_message`, `formatted_date`, `formatted_time`, `formatted_date2`, `formatted_time2`, `land_size`, `farmer_id`, `status`) VALUES
(1199, '09957310087', '', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '15kg', 58, 'RECEIVED'),
(1200, '09999999988', '09999999988', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '30kg', 59, 'RECEIVED'),
(1201, '09799999999', '09799999999', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '75kg', 62, 'RECEIVED'),
(1202, '09978347765', '09978347765', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '1100kg', 94, 'RECEIVED'),
(1203, '09978347765', '09978347765', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '1100kg', 94, 'NOT RECEIVED'),
(1204, '09206221111', '09206221111', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '10kg', 97, 'NOT RECEIVED'),
(1205, '09215838999', '09215838999', 'ORGANIC SEEDS DISTRIBUTION', 'BOTOLAN PEOPLE PLAZA', '', 'January 30, 2024', '1:00 PM', 'January 31, 2024', '5:00 PM', '15kg', 98, 'RECEIVED');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `staff_id`, `farmer_id`, `contact`, `emergency_contact`, `created_at`) VALUES
(26, 24, 58, '09957310087', '09455876558', '2024-01-13 23:38:28'),
(27, 24, 66, '09455876558', '09455876558', '2024-01-14 08:24:28'),
(28, 24, 58, '09957310087', '09957310087', '2024-01-14 08:24:37'),
(29, 27, 59, '09999999988', '09999999988', '2024-01-15 20:55:22'),
(30, 27, 59, '09999999999', '09999999999', '2024-01-16 08:31:52'),
(31, 27, 59, '09999999988', '09999999988', '2024-01-17 09:11:47'),
(32, 24, 95, '09299999999', '09299999999', '2024-01-20 12:05:28'),
(33, 24, 91, '09957310087', '09957310087', '2024-01-20 12:05:35'),
(34, 24, 101, '42322242341', '42322242341', '2024-01-20 12:05:46'),
(35, 24, 95, '09299999999', '09299999999', '2024-01-20 12:05:53'),
(36, 24, 96, '09199999999', '09199999999', '2024-01-20 12:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `personnel_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `mun` varchar(255) DEFAULT NULL,
  `rank_id` varchar(255) DEFAULT NULL,
  `upload_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`personnel_id`, `first_name`, `middle_name`, `last_name`, `extension_name`, `dob`, `sex`, `email`, `contact`, `address`, `brgy`, `mun`, `rank_id`, `upload_url`) VALUES
(17, 'RAMON', 'D', 'DOLOJAN', '', '2023-11-30', 'MALE', 'ramon@gmail.com', '09816228111', 'PUROK 2', 'OWAOG-NIBLOC', 'SANTA CRUZ', '19', '2666818.webp'),
(18, 'CARMELITA ', 'D', 'GALAC', '', '2023-11-24', 'FEMALE', 'carmelita@gmail.com', '99999999977', 'PUROK 2', 'NACOLCOL', 'SAN FELIPE', '10', '6231736.webp'),
(19, 'JANET ', 'D', ' RAYMUNDO', '', '2023-11-17', 'FEMALE', 'janet@gmail.com', '99999999666', 'PUROK1', 'BENEG', 'MASINLOC', '11', 'webp'),
(20, 'NOMER', 'VILLANUEVA', 'MAGSANOP', '', '2023-11-23', 'MALE', 'nomermagsanop@pcb.edu.ph', '09957310087', 'PUROK 5 PROPER', 'TAMPO (POBLACION)', 'BOTOLAN', '7', '798540.webp'),
(21, 'VANGIE', 'DOCUTIN', 'DIOHEN', '', '2023-12-01', 'FEMALE', 'VANGIEDOCUTIN@GMAIL.COM', '09816228111', 'PUROK 2', 'DANACBUNGA', 'BOTOLAN', '1', '3531306.webp');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `prog_name` varchar(250) NOT NULL,
  `prog_descrip` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `upload_url` varchar(255) NOT NULL,
  `prog_loc` varchar(255) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `prog_name`, `prog_descrip`, `status`, `upload_url`, `prog_loc`, `delete_flag`) VALUES
(34, 'ORGANIC SEEDS DISTRIBUTION', 'ORGANIC SEEDS DISTRIBUTION IN BOTOLAN EMPOWERS LOCAL FARMERS WITH UNTREATED, NON-GENETICALLY MODIFIED SEEDS, FOSTERING SUSTAINABLE AND ECO-FRIENDLY AGRICULTURAL PRACTICES. THIS INITIATIVE SUPPORTS BIODIVERSITY, SOIL HEALTH, AND THE CULTIVATION OF', 'ACTIVE', '656611408abf6.jpg', 'BOTOLAN PEOPLE PLAZA', 0),
(35, 'HYBRID SEEDS DISTRIBUTION', 'THE HYBRID SEEDS DISTRIBUTION INITIATIVE IN BOTOLAN EMPOWERS LOCAL FARMERS BY PROVIDING ACCESS TO HIGH-YIELDING HYBRID SEEDS, OPTIMIZING CROP PRODUCTIVITY AND RESILIENCE. THIS PROGRAM AIMS TO ENHANCE AGRICULTURAL SUSTAINABILITY, ENSURING FARMERS HAVE', 'INACTIVE', '65661177b07f2.jpg', 'PCB COVER COURT', 0),
(36, 'UREA FERTILIZER DISTRIBUTION', '(UREA) FERTILIZER DISTRIBUTION IN BOTOLAN EMPOWERS LOCAL FARMERS BY PROVIDING ESSENTIAL UREA FERTILIZERS TO ENHANCE SOIL FERTILITY, PROMOTING ROBUST CROP GROWTH AND INCREASED AGRICULTURAL YIELDS. THIS INITIATIVE SUPPORTS SUSTAINABLE FARMING PRACTICES', 'ACTIVE', '656611c1e55cb.jpg', 'PLAZA 2', 0),
(37, 'NITROGEN-FIXING FERTILIZER DISTRIBUTION', 'THE NITROGEN-FIXING FERTILIZER DISTRIBUTION INITIATIVE IN BOTOLAN EMPOWERS LOCAL FARMERS BY PROVIDING FERTILIZERS ENRICHED WITH NITROGEN-FIXING BACTERIA, FOSTERING SOIL HEALTH AND ENHANCING CROP YIELDS. THIS SUSTAINABLE APPROACH AIMS TO OPTIMIZE AGRI', 'INACTIVE', '656611f1f1fbe.jpg', 'PLAZA 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_name` varchar(250) NOT NULL,
  `rank_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`rank_id`, `rank_name`, `rank_description`) VALUES
(1, 'SENIOR AGRICULTURIST', 'A Senior Agriculturist oversees advanced agricultural operations, managing crop production, implementing innovative farming techniques, and providing expertise to optimize yields and sustainability.'),
(3, 'AGRICULTURAL TECHNOLOGIST II', 'An Agricultural Technologist II conducts advanced-level research and implements innovative technologies to enhance agricultural practices and productivity.'),
(4, 'AGRICULTURAL TECHNOLOGIST', 'An Agricultural Technologist applies technology and scientific principles to enhance and optimize agricultural processes, improving crop yields and farm efficiency.'),
(5, 'AGRICULTURAL TECHNICIAN', 'An Agricultural Technician assists in the implementation of farming practices, conducts field tests, and maintains equipment to support efficient agricultural operations.'),
(6, 'LOCAL FARMER TECHNICIAN', 'A local farmer technician provides on-site technical support and maintenance for agricultural equipment, ensuring optimal functionality for farm operations.'),
(7, 'NURSERY OPERATION & MAINTENANCE', 'The nursery operation and maintenance involve overseeing the care, cultivation, and upkeep of plants, ensuring optimal growth conditions and facility functionality.'),
(8, 'BOOK KEEPER & OFFICE CUSTODIAN RSBSA FOCAL PERSON', '\"Responsible for maintaining accurate financial records as a bookkeeper and overseeing office cleanliness and organization as the office custodian RSBSA focal person.\"'),
(10, 'ADMIN AIDE II', 'Administrative Aide 2: Provides advanced administrative support, manages complex tasks, coordinates projects, and assists in higher-level decision-making within the organization.'),
(11, 'MUNICIPAL AGRICULTURIST', '\"Municipal agriculture involves managing and promoting agricultural activities within a city or municipality to enhance local food production and sustainability.\"'),
(19, 'ADMIN AIDE 1', '\"An Administrative Aide 1 provides entry-level clerical and administrative support, performing tasks such as filing, data entry, scheduling, and assisting with communication and record-keeping.\"');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `upload_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `extension_name`, `dob`, `sex`, `email`, `contact`, `address`, `brgy`, `role`, `upload_url`) VALUES
(5, 'STAFF', 'YzEzMWNlNTQxYjQzNWMxMTk2NGRhZjUzYWZlNDg4MWQ=', 'OFFICE', '', 'STAFF', '', '2023-07-13', 'MALE', 'STAFF@GMAIL.COM', '8888888888', 'NTRA', 'BANCAL', 'OFFICE STAFF', '5742146.png'),
(24, 'ADMIN', 'NzQ5NTJkYTBlMTVkOWMxOGZjMjBiMGYyNjQyMzQ2OWE=', 'BMAO', '', 'ADMIN', '', '2023-11-17', 'MALE', 'ADMIN@GMAIL.COM', '09957310087', 'PUROK 5', 'PAREL', 'ADMINISTRATOR', '4411667.webp'),
(26, 'NOMER', 'OGQyMWU3MzQwOWE1MzE5ZjQzNzA1YjdlNGJhNmY4N2M=', 'NOMER', 'VILLANUEVA', 'MAGSANOP', '', '2023-11-28', 'MALE', 'NOMER@SAMPLE.COM', '09957310087', 'TAUGTOG', 'TAUGTOG', 'ADMINISTRATOR', '6492008.jpg'),
(27, 'TAUGTOG', 'ODY4YmQ4MWE3ZTczNTY4ZDMxMmRiYjgzODUxMDY1MmI=', 'BARANGAY ', 'STAFF', 'TAUGTOG', '', '2023-11-15', 'MALE', 'TAUGTOG@GMAIL.COM', '09957310087', 'TAUGTOG', 'TAUGTOG', 'BARANGAY STAFF', '6250193.webp'),
(30, 'BANCAL', 'MzlkMTFlYjc4ZDZkNGU3YjNlY2IxOGM3M2YyMDljNzY=', 'BARANGAY', 'STAFF', 'BANCAL', '', '2023-12-22', 'FEMALE', 'BANCAL@GMAIL.COM', '09957310087', 'BANCAL', 'BANCAL', 'BARANGAY STAFF', '4684517.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_records`
--
ALTER TABLE `barangay_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `farmers_records`
--
ALTER TABLE `farmers_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay_records`
--
ALTER TABLE `barangay_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `farmers_records`
--
ALTER TABLE `farmers_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1206;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
