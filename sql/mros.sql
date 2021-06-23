-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 07:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mros`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `sn` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `asset_name` varchar(50) NOT NULL,
  `asset_id` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `assigned_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `entity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`sn`, `emp_id`, `asset_name`, `asset_id`, `dept`, `request_date`, `assigned_date`, `status`, `entity`) VALUES
(13, '910', 'Email id - rohit.kumar@ifim.edu.in', 'asdfg', 'IT', '2020-11-18', '2020-11-18', 2, 'IFIM B School'),
(14, '910', 'ID Card -full name- Rohit Kumar.', 'dafesgd', 'IT', '2020-11-18', '2020-11-18', 2, 'IFIM B School');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(21) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `budget` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `entity`, `month`, `budget`) VALUES
(16, 'IFIM B School', 1, 2),
(17, 'IFIM B School', 2, 134000),
(18, 'IFIM B School', 3, 111000),
(19, 'IFIM B School', 4, 123000),
(20, 'IFIM B School', 5, 143000),
(21, 'IFIM B School', 6, 123400),
(22, 'IFIM B School', 7, 400000),
(23, 'IFIM B School', 8, 200000),
(24, 'IFIM B School', 9, 98366),
(25, 'IFIM B School', 10, 89534),
(26, 'IFIM B School', 11, 89000),
(27, 'IFIM B School', 12, 89000);

-- --------------------------------------------------------

--
-- Table structure for table `budgetchanges`
--

CREATE TABLE `budgetchanges` (
  `id` int(11) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `budget` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgetchanges`
--

INSERT INTO `budgetchanges` (`id`, `entity`, `budget`, `month`, `reason`, `date`) VALUES
(25, 'IFIM B School', 1000, 'January', 'test1', '2020-09-29 12:27:09.279403'),
(26, 'IFIM B School', 999, 'January', 'haha', '2020-09-29 12:29:58.040707'),
(27, 'IFIM B School', 998998, 'January', 'TEST2', '2020-09-29 13:12:34.666187'),
(28, 'IFIM B School', 1999, 'February', 'TEST3', '2020-09-29 13:15:03.528179'),
(29, 'IFIM B School', 1999, 'February', 'TEST3', '2020-09-29 13:16:13.773713'),
(30, 'IFIM B School', 999, 'January', 'teastQDSSD', '2020-09-29 13:35:24.289725'),
(31, 'IFIM B School', 999, 'January', 'QFEDKSGLASKF ', '2020-09-29 13:36:51.934185'),
(32, 'IFIM B School', 23456, 'March', 'SDFG', '2020-09-29 13:37:18.991019'),
(33, 'IFIM B School', 23445, 'February', 'haha', '2020-10-03 08:25:14.832335'),
(34, 'IFIM B School', 23, 'February', 'haha cx \r\ndfghd \r\nhv', '2020-10-03 08:26:18.890149'),
(35, 'IFIM B School', 11, 'January', 'sfgdh', '2020-10-03 08:35:34.995243'),
(36, 'IFIM B School', 12, 'January', 'rtghj', '2020-10-03 08:36:36.308173'),
(37, 'IFIM B School', 13, 'January', 'wesgfd', '2020-10-03 08:36:46.575687'),
(38, 'IFIM B School', 13, 'January', 'wesgfd', '2020-10-03 08:36:56.692567'),
(39, 'IFIM B School', 123, 'February', 'ee', '2020-10-03 08:37:20.087182'),
(40, 'IFIM B School', 11, 'February', 'sdfg', '2020-10-03 08:37:33.421863'),
(41, 'IFIM B School', 11, 'January', 'wefgh', '2020-10-03 08:39:29.057655'),
(42, 'IFIM B School', 12, 'January', 'asdfg', '2020-10-03 08:39:38.347252'),
(43, 'IFIM B School', 13, 'January', 'sdfg\r\nhgjk', '2020-10-03 08:39:50.291777'),
(44, 'IFIM B School', 122, 'February', 'erfgh', '2020-10-03 08:40:29.348251'),
(45, 'IFIM B School', 123, 'February', 'avvd \r\nk', '2020-10-03 08:40:44.116329'),
(46, 'IFIM B School', 124, 'February', 'sdfg', '2020-10-03 08:40:54.139152'),
(47, 'IFIM B School', 123456, 'April', 'test 1', '2020-10-03 08:41:29.538985'),
(48, 'IFIM B School', 123457, 'April', 'tetstdkmf\r\ndd\r\ndf', '2020-10-03 08:41:59.329216'),
(49, 'IFIM B School', 1233143, 'May', 'fas', '2020-10-03 08:42:11.385111'),
(50, 'IFIM B School', 123455, 'April', 'hello, this is regarding the EC meeting held on oct 2nd which is on holiday....................', '2020-10-03 08:51:59.592985'),
(51, 'IFIM B School', 123465, 'April', 'testing transactions', '2020-10-03 12:34:27.562823'),
(52, 'IFIM B School', 5000, 'November', 'Due to extension of the program, head count as well as additional budget request need to be accommodated', '2020-10-30 11:49:17.343034'),
(53, 'IFIM B School', 12345, 'December', 'sdfghgf', '2020-10-30 12:28:29.927522'),
(54, 'IFIM B School', 120000, '9', 'EC Meeting', '2020-11-12 08:10:28.005995'),
(55, 'IFIM B School', 120000, '10', 'EC Meeting', '2020-11-12 08:10:28.121913'),
(56, 'IFIM B School', 120000, '11', 'EC Meeting', '2020-11-12 08:10:28.238348'),
(57, 'IFIM B School', 120000, '12', 'EC Meeting', '2020-11-12 08:10:28.390143'),
(58, 'IFIM B School', 2, '1', 'dd', '2020-11-20 09:17:39.110496'),
(59, 'IFIM B School', 200000, 'November', 'test transactions', '2020-11-20 10:06:08.399235'),
(60, 'IFIM B School', 200000, 'December', 'test transactions', '2020-11-20 10:06:08.487599'),
(61, 'IFIM B School', 200000, 'January', 'test transactions', '2020-11-20 10:06:08.576541'),
(62, 'IFIM B School', 200000, 'February', 'test transactions', '2020-11-20 10:06:08.765284'),
(63, 'IFIM B School', 200000, 'March', 'test transactions', '2020-11-20 10:06:08.920258');

-- --------------------------------------------------------

--
-- Table structure for table `budgetrequests`
--

CREATE TABLE `budgetrequests` (
  `id` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `hc` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `requested_by` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgetrequests`
--

INSERT INTO `budgetrequests` (`id`, `budget`, `hc`, `reason`, `entity`, `requested_by`, `status`, `date`) VALUES
(1, 5000, 1, 'No sufficient budget starting from November', 'IFIM B School', 'anandarup@ifim.edu.in', 2, '2020-11-24 09:51:15'),
(2, 50000, 1, 'EC meeting', 'IFIM B School', 'anandarup@ifim.edu.in', 1, '2020-11-12 08:09:15'),
(3, 83333, 0, 'we are asst prof for a crore ad budget u from jan', 'IFIM B School', 'anandrup@ifim.edu.in', 1, '2020-12-02 10:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `olr_id` int(100) NOT NULL,
  `education_detail_type` varchar(30) NOT NULL,
  `inst_name` text NOT NULL,
  `board` text NOT NULL,
  `duration` varchar(100) NOT NULL,
  `percentage` varchar(20) NOT NULL,
  `obtained` text NOT NULL,
  `course_type` text NOT NULL,
  `majored_in` varchar(100) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pin` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `mark_sheet` text NOT NULL,
  `degree` text NOT NULL,
  `provisional_degree` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`olr_id`, `education_detail_type`, `inst_name`, `board`, `duration`, `percentage`, `obtained`, `course_type`, `majored_in`, `reg_no`, `street`, `city`, `state`, `pin`, `contact`, `mark_sheet`, `degree`, `provisional_degree`) VALUES
(0, 'Secondary', 'erter', 'rwter', 'qerwtery', 'werwte', 'YES', 'REGULAR', 'reter', 'rewetr', 'erwetr', 'wqeret', 'erwetr', 'erwetry', 'erwet', 'Mark_Sheet_0.jpg', 'Degree_Certificate_0.jpg', 'Provisional_Degree_0.jpg'),
(0, 'Secondary', 'sdvb', 'wasfdf', 'A', '2', 'YES', 'REGULAR', 'aesgrd', '2345', 'waesrdt', 'waesrdt', 'wsefrgh', '345', '3567890', 'Mark_Sheet_0.jpg', 'Degree_Certificate_0.jpg', 'Provisional_Degree_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_employment`
--

CREATE TABLE `candidate_employment` (
  `olr_id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `designation_dept` varchar(30) NOT NULL,
  `ctc` varchar(30) NOT NULL,
  `employment_type` varchar(15) NOT NULL,
  `supervisor_name_designation` varchar(50) NOT NULL,
  `supervisor_number` varchar(13) NOT NULL,
  `supervisor_email` varchar(50) NOT NULL,
  `contact_now` text NOT NULL,
  `alt_date` varchar(50) NOT NULL,
  `reason_for_leaving` varchar(50) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `appointment_letter` text NOT NULL,
  `salary_slip` text NOT NULL,
  `relieving_letter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_employment`
--

INSERT INTO `candidate_employment` (`olr_id`, `company_name`, `employee_id`, `duration`, `designation_dept`, `ctc`, `employment_type`, `supervisor_name_designation`, `supervisor_number`, `supervisor_email`, `contact_now`, `alt_date`, `reason_for_leaving`, `street`, `city`, `state`, `pin`, `landline`, `appointment_letter`, `salary_slip`, `relieving_letter`) VALUES
(0, 'ewqrwte', 'ewqrwte', 'ewqrwet', 'werwet', 'wqewret', 'PERMANENT', 'erwte', 'erwe', 'qerwet', 'Yes', 'eqrw', 'eqrwe', 'erwet', 'qerwe', 'qerwet', 'erwe', 'erwet', 'Appointment_Letter_0.jpg', 'Salary_Slip_0.jpg', 'Relieving_Letter_0.jpg'),
(0, 'afegs', 'wafesg', 'faedsgfb', 'wafesfd', '567890', 'PERMANENT', 'fdgfghjn', '89078', 'asdf@1234.com', 'Yes', '2020-11-10', 'afsgd', 'dasf', 'afsegrfd', 'afsd', '345', '456', 'Appointment_Letter_0.jpg', 'Salary_Slip_0.jpg', 'Relieving_Letter_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_miscellaneous`
--

CREATE TABLE `candidate_miscellaneous` (
  `olr_id` int(11) NOT NULL,
  `question1` varchar(3) NOT NULL,
  `reason1` varchar(100) DEFAULT NULL,
  `question2` varchar(100) NOT NULL,
  `reason2` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_miscellaneous`
--

INSERT INTO `candidate_miscellaneous` (`olr_id`, `question1`, `reason1`, `question2`, `reason2`) VALUES
(2, 'No', 'N/a', 'No', 'N/a'),
(3, 'No', 'N/a', 'No', 'N/a');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_personal_info`
--

CREATE TABLE `candidate_personal_info` (
  `olr_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `father_name` text NOT NULL,
  `dob` date NOT NULL,
  `nationality` text NOT NULL,
  `gender` text NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `ssn` varchar(20) NOT NULL,
  `current_address` varchar(1000) NOT NULL,
  `permanent_address` varchar(1000) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `id_proof` text NOT NULL,
  `other_proof` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_personal_info`
--

INSERT INTO `candidate_personal_info` (`olr_id`, `name`, `father_name`, `dob`, `nationality`, `gender`, `phone_number`, `ssn`, `current_address`, `permanent_address`, `blood_group`, `photo`, `id_proof`, `other_proof`) VALUES
(2, 'ewrtyr', 'eqrwetr', '2020-11-26', 'qerwetyr', 'Male', 'rqwte', 'erwet', 'qerwet', 'ewqrwetr', '', 'profile_photo.jpg', 'identity_proof.jpg', 'Adhar.jpg'),
(3, 'asd', 'faesr', '2020-11-17', 'fwaes', 'Male', '234', '456', '3w45', '345', 'AB+', 'profile_photo.jpg', 'identity_proof.jpg', 'sqwsdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_reference`
--

CREATE TABLE `candidate_reference` (
  `olr_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `association` varchar(100) NOT NULL,
  `association_years` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_reference`
--

INSERT INTO `candidate_reference` (`olr_id`, `name`, `organization`, `designation`, `association`, `association_years`, `address`, `landline`, `mobile`) VALUES
(0, 'erw', 'eqwwre', 'ewret', 'ewerwetrfgdfhg', 'fgdfhgf', 'dgfhgn', 'dsfdgfhg', 'dsfdgfhg'),
(0, 'afsg', 'awfsedg', 'aesfgrd', 'awfesgrd', '345', 'dawsfgf', '2354678', '2343456');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_signature`
--

CREATE TABLE `candidate_signature` (
  `olr_id` int(100) NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_signature`
--

INSERT INTO `candidate_signature` (`olr_id`, `signature`) VALUES
(2, 'Candidate_Signature.jpg'),
(3, 'Candidate_Signature.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `entity` varchar(200) NOT NULL,
  `jobtype` varchar(20) NOT NULL,
  `jobmonths` varchar(20) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `ctc` int(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `name`, `entity`, `jobtype`, `jobmonths`, `pos`, `job_title`, `email`, `joining_date`, `ctc`, `status`) VALUES
('475', 'aman', 'IFIM B School', 'fulltime', '', 'cordinator', 'IT', 'aman@ifim.edu.in', '2020-12-01', 12345, 0),
('910', 'Rohit Kumar', 'IFIM B School', 'fulltime', '', '', '', 'rohit.kumar@ifim.edu.in', '2020-12-01', 34444, 10);

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` int(20) NOT NULL,
  `entity_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `entity_name`) VALUES
(15, 'IFIM B School'),
(16, 'IFIM College');

-- --------------------------------------------------------

--
-- Table structure for table `exit_interview`
--

CREATE TABLE `exit_interview` (
  `id` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `joining_date` date NOT NULL,
  `separation_date` date NOT NULL,
  `drawer_key` text NOT NULL,
  `phone` text NOT NULL,
  `card` text NOT NULL,
  `document` text NOT NULL,
  `laptop` text NOT NULL,
  `other` text NOT NULL,
  `reason` longtext NOT NULL,
  `reason1` longtext NOT NULL,
  `reason2` longtext NOT NULL,
  `reason3` longtext NOT NULL,
  `reason4` longtext NOT NULL,
  `reason5` longtext NOT NULL,
  `reason6` longtext NOT NULL,
  `reason7` longtext NOT NULL,
  `reason8` longtext NOT NULL,
  `reason9` longtext NOT NULL,
  `reason10` longtext NOT NULL,
  `reason11` longtext NOT NULL,
  `reason12` longtext NOT NULL,
  `reason13` longtext NOT NULL,
  `reason14` longtext NOT NULL,
  `reason15` longtext NOT NULL,
  `reason16` longtext NOT NULL,
  `applicant` text NOT NULL,
  `todays_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exit_interview`
--

INSERT INTO `exit_interview` (`id`, `name`, `job_title`, `dept`, `joining_date`, `separation_date`, `drawer_key`, `phone`, `card`, `document`, `laptop`, `other`, `reason`, `reason1`, `reason2`, `reason3`, `reason4`, `reason5`, `reason6`, `reason7`, `reason8`, `reason9`, `reason10`, `reason11`, `reason12`, `reason13`, `reason14`, `reason15`, `reason16`, `applicant`, `todays_date`) VALUES
('500', 'Naresh', 'IT', 'cordinator', '2020-12-27', '2020-11-29', 'NO', 'NO', 'YES', 'NO', 'NO', 'NO', 'a', 's', 'ssda', 'adsf', 'fsdg', 'adsfg', 'sadfg', 'dsfgbf', 'sdsfdg', 'sdfg', 'adsfd', 'sdfgf', 'dsfdgf', 'desf', 'esfg', 'eafsgdtbcvn', 'wdefsgrdhtfyjgukhijkl;l', 'Vanaja', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sn` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `entity` varchar(200) NOT NULL,
  `mail_id` varchar(40) NOT NULL,
  `q1` int(1) NOT NULL,
  `q2` int(1) NOT NULL,
  `q3` int(1) NOT NULL,
  `q4` int(1) NOT NULL,
  `q5` int(1) NOT NULL,
  `q6` int(1) NOT NULL,
  `q7` int(1) NOT NULL,
  `q8` int(1) NOT NULL,
  `q9` int(1) NOT NULL,
  `q10` int(1) NOT NULL,
  `q11` int(1) NOT NULL,
  `q12` int(1) NOT NULL,
  `q13` int(1) NOT NULL,
  `q14` int(1) NOT NULL,
  `comments` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sn`, `name`, `entity`, `mail_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `comments`, `status`) VALUES
(1, 'Naresh', 'IFIM B School', 'naresh@ifim.edu.in', 1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 1, 2, 1, 1, ' ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hc_changes`
--

CREATE TABLE `hc_changes` (
  `id` int(200) NOT NULL,
  `entity` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `hc` int(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hc_changes`
--

INSERT INTO `hc_changes` (`id`, `entity`, `position`, `month`, `hc`, `reason`, `date`) VALUES
(16, 'IFIM B School', 'Assistant Proffesor', '01', 2, 'I wanted', '2020-11-19 13:05:36.083214'),
(17, 'IFIM B School', 'Assistant Proffesor', '02', 5, 'as', '2020-11-19 13:08:54.975689'),
(18, 'IFIM B School', 'Assistant Proffesor', '03', 4, 'asd', '2020-11-19 13:11:26.132761'),
(19, 'IFIM B School', 'Assistant Proffesor', '04', 4, 'AS', '2020-11-19 13:11:48.483278'),
(20, 'IFIM B School', 'Assistant Proffesor', '05', 5, 'asd', '2020-11-19 13:12:00.539330'),
(21, 'IFIM B School', 'Assistant Proffesor', '05', 5, 'asfdd', '2020-11-19 13:12:16.227794'),
(22, 'IFIM B School', 'Assistant Proffesor', '05', 6, 'asd', '2020-11-19 13:12:29.325788'),
(23, 'IFIM B School', 'Assistant Proffesor', '06', 5, 'sad', '2020-11-19 13:12:40.255967'),
(24, 'IFIM B School', 'Assistant Proffesor', '07', 4, 'sdf', '2020-11-19 13:13:15.180410'),
(25, 'IFIM B School', 'Assistant Proffesor', '08', 4, 'aesrgd', '2020-11-19 13:13:26.197103'),
(26, 'IFIM B School', 'Assistant Proffesor', '09', 5, 'wdef', '2020-11-19 13:13:37.018058'),
(27, 'IFIM B School', 'Assistant Proffesor', '10', 5, 'df', '2020-11-19 13:13:46.988676'),
(28, 'IFIM B School', 'Assistant Proffesor', '10', 5, 'sdf', '2020-11-19 13:13:57.341112'),
(29, 'IFIM B School', 'Assistant Proffesor', '10', 6, 'defgr', '2020-11-19 13:14:08.900935'),
(30, 'IFIM B School', 'Assistant Proffesor', '11', 5, 'dasf', '2020-11-19 13:14:21.938063'),
(31, 'IFIM B School', 'Assistant Proffesor', '11', 4, 'adfs', '2020-11-19 13:14:31.681214'),
(32, 'IFIM B School', 'Assistant Proffesor', '12', 4, 'asdf', '2020-11-19 13:14:41.793126'),
(33, '0', '', '', 33, 'dfsd', '2020-11-20 09:28:32.499039'),
(34, '0', '', '', 33, 'dfsd', '2020-11-20 09:28:55.262568'),
(35, 'IFIM B School', 'Professor', '8', 8, 'testing 1', '2020-11-20 09:44:04.280738'),
(36, 'IFIM B School', 'Professor', '9', 8, 'testing 1', '2020-11-20 09:44:04.358983'),
(37, 'IFIM B School', 'Professor', '10', 8, 'testing 1', '2020-11-20 09:44:04.502321'),
(38, 'IFIM B School', 'Professor', '11', 8, 'testing 1', '2020-11-20 09:44:04.614352'),
(39, 'IFIM B School', 'Professor', '12', 8, 'testing 1', '2020-11-20 09:44:04.703516'),
(40, 'IFIM B School', 'Assistant Proffesor', '1', 3, 'df', '2020-11-20 09:45:12.449689'),
(41, 'IFIM B School', 'Professor', 'July', 1, 'haha', '2020-11-20 09:56:55.170336'),
(42, 'IFIM B School', 'Professor', 'August', 1, 'haha', '2020-11-20 09:56:55.281296'),
(43, 'IFIM B School', 'Professor', 'September', 1, 'haha', '2020-11-20 09:56:55.347792'),
(44, 'IFIM B School', 'Assistant Proffesor', 'July', 5, 'test', '2020-11-20 09:59:19.553012'),
(45, 'IFIM B School', 'Assistant Proffesor', 'August', 5, 'test', '2020-11-20 09:59:19.607801'),
(46, 'IFIM B School', 'Assistant Proffesor', 'September', 5, 'test', '2020-11-20 09:59:19.763727'),
(47, 'IFIM B School', 'Assistant Proffesor', 'July', 1, 'test', '2020-11-20 10:00:14.543030'),
(48, 'IFIM B School', 'Assistant Proffesor', 'August', 1, 'test', '2020-11-20 10:00:14.621072'),
(49, 'IFIM B School', 'Assistant Proffesor', 'September', 1, 'test', '2020-11-20 10:00:14.709470'),
(50, 'IFIM B School', 'Assistant Proffesor', 'April', 2, 'sdf', '2020-11-20 10:02:53.880922'),
(51, 'IFIM B School', 'Assistant Proffesor', 'May', 2, 'sdf', '2020-11-20 10:02:53.981159'),
(52, 'IFIM B School', 'Assistant Proffesor', 'June', 2, 'sdf', '2020-11-20 10:02:54.058830'),
(53, 'IFIM B School', 'Assistant Proffesor', 'December', 5, 'ghhy', '2020-11-24 10:55:26.616074'),
(54, 'IFIM B School', 'Assistant Proffesor', 'January', 5, 'ghhy', '2020-11-24 10:55:26.694420'),
(55, 'IFIM B School', 'Assistant Proffesor', 'February', 5, 'ghhy', '2020-11-24 10:55:26.738823'),
(56, 'IFIM B School', 'Assistant Proffesor', 'March', 5, 'ghhy', '2020-11-24 10:55:26.783165');

-- --------------------------------------------------------

--
-- Table structure for table `hr_email`
--

CREATE TABLE `hr_email` (
  `sn` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_email`
--

INSERT INTO `hr_email` (`sn`, `email`, `password`) VALUES
(1, 'mros@ifim.edu.in', 'Gak16248');

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school dep`
--

CREATE TABLE `ifim b school dep` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school dep`
--

INSERT INTO `ifim b school dep` (`name`) VALUES
('Accounts'),
('Administration'),
('Finance'),
('HR'),
('IT'),
('Library');

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school emp`
--

CREATE TABLE `ifim b school emp` (
  `id` int(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school emp`
--

INSERT INTO `ifim b school emp` (`id`, `name`, `email`, `emp_id`, `role`, `dep`) VALUES
(1, 'Aman', 'aman.dixit@ifim.edu.in', '172FSB7002', 'Super Admin', 'IT'),
(4, 'Anandarup', 'anandrup@ifim.edu.in', '13', 'Entity Head', 'IT'),
(5, 'Vanaja', 'vanaja@ifim.edu.in', '14', 'HR', 'HR'),
(6, 'Farhan', 'farhan.khan@ifim.edu.in', '15', 'cordinator', 'IT'),
(7, 'Pradeep', 'pradeep.d@ifim.edu.in', '16', 'IT', 'IT'),
(12, 'Rahul', 'appalapuram.srirangarahulkrishna@ifim.edu.in', '22', 'Accounts', 'Accounts'),
(13, 'Naresh', 'naresh@ifim.edu.in', '500', 'cordinator', 'IT'),
(14, 'Naresh', 'naresh@ifim.edu.in', '500', 'Department Head', 'IT'),
(15, 'aman', 'aman@ifim.edu.in', '475', 'Department Head', 'HR'),
(16, 'Vanaja', 'vanaja@ifim.edu.in', '14', 'Administrator', 'Administration');

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school headcount`
--

CREATE TABLE `ifim b school headcount` (
  `id` int(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `hc` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ifim b school headcount`
--

INSERT INTO `ifim b school headcount` (`id`, `position`, `month`, `hc`) VALUES
(62, 'Assistant Proffesor', 1, 2),
(63, 'Assistant Proffesor', 2, 2),
(64, 'Assistant Proffesor', 3, 2),
(65, 'Assistant Proffesor', 4, 4),
(66, 'Assistant Proffesor', 5, 6),
(67, 'Assistant Proffesor', 6, 5),
(68, 'Assistant Proffesor', 7, 4),
(69, 'Assistant Proffesor', 8, 4),
(70, 'Assistant Proffesor', 9, 4),
(71, 'Assistant Proffesor', 10, 4),
(72, 'Assistant Proffesor', 11, 4),
(73, 'Assistant Proffesor', 12, 4),
(74, 'Associate Professor', 1, 0),
(75, 'Associate Professor', 2, 0),
(76, 'Associate Professor', 3, 0),
(77, 'Associate Professor', 4, 0),
(78, 'Associate Professor', 5, 0),
(79, 'Associate Professor', 6, 0),
(80, 'Associate Professor', 7, 0),
(81, 'Associate Professor', 8, 0),
(82, 'Associate Professor', 9, 0),
(83, 'Associate Professor', 10, 0),
(84, 'Associate Professor', 11, 0),
(85, 'Associate Professor', 12, 0),
(86, 'Professor', 1, 1),
(87, 'Professor', 2, 1),
(88, 'Professor', 3, 1),
(89, 'Professor', 4, 0),
(90, 'Professor', 5, 0),
(91, 'Professor', 6, 0),
(92, 'Professor', 7, 0),
(93, 'Professor', 8, 8),
(94, 'Professor', 9, 5),
(95, 'Professor', 10, 3),
(96, 'Professor', 11, 3),
(97, 'Professor', 12, 3),
(98, 'Software Developer', 1, 0),
(99, 'Software Developer', 2, 0),
(100, 'Software Developer', 3, 0),
(101, 'Software Developer', 4, 0),
(102, 'Software Developer', 5, 0),
(103, 'Software Developer', 6, 0),
(104, 'Software Developer', 7, 0),
(105, 'Software Developer', 8, 0),
(106, 'Software Developer', 9, 0),
(107, 'Software Developer', 10, 0),
(108, 'Software Developer', 11, 0),
(109, 'Software Developer', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school new_emp`
--

CREATE TABLE `ifim b school new_emp` (
  `id` int(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school new_emp`
--

INSERT INTO `ifim b school new_emp` (`id`, `name`, `email`, `emp_id`, `role`, `dep`) VALUES
(1, 'aman', 'aman@ifim.edu.in', '475', 'New Employee', ''),
(2, 'Naresh', 'naresh@ifim.edu.in', '500', 'New Employee', 'IT'),
(3, 'Rohit Kumar', 'rohit.kumar@ifim.edu.in', '910', 'New Employee', '');

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school role`
--

CREATE TABLE `ifim b school role` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `generate_olr` int(2) NOT NULL,
  `accept_reject_olr` int(2) NOT NULL,
  `approve_olr` int(2) NOT NULL,
  `olr_sent_to_cand` int(2) NOT NULL,
  `view_olr` int(2) NOT NULL,
  `accounts` int(2) NOT NULL,
  `asset_req_manage` int(2) NOT NULL,
  `super_admin` int(2) NOT NULL,
  `new_emp` int(2) NOT NULL,
  `IT` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school role`
--

INSERT INTO `ifim b school role` (`id`, `name`, `generate_olr`, `accept_reject_olr`, `approve_olr`, `olr_sent_to_cand`, `view_olr`, `accounts`, `asset_req_manage`, `super_admin`, `new_emp`, `IT`) VALUES
(1, 'New Employee', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(2, 'cordinator', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(3, 'Super Admin', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(4, 'Accounts', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(5, 'Entity Head', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(6, 'HR', 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(7, 'IT', 0, 0, 0, 0, 0, 0, 1, 0, 0, 1),
(8, 'Administrator', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(9, 'Department Head', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school transaction`
--

CREATE TABLE `ifim b school transaction` (
  `id` int(11) NOT NULL,
  `budget` varchar(200) NOT NULL,
  `hc` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school transaction`
--

INSERT INTO `ifim b school transaction` (`id`, `budget`, `hc`, `reason`, `date`) VALUES
(24, '+11000', '+1/IT', 'The Budget +916.66666666667/month is Restored for the respective months- January,February,March, as Separation Process Initiated for 172FSB7002 (Requested By Vanaja)', '2020-10-21 11:21:25.265097'),
(25, '-12000', '-1/IT', 'The Budget -966.67 Reduced from November; - 1,000.00/month is Reduced for the respective months- December,January,February,March, as olr_sn_2 Requested By farhan@ifim.edu.in', '2020-10-22 12:18:37.717229'),
(26, '+12000', '+1/New Employee', 'The Budget +1000/month is Restored for the respective months-  as Separation Process Initiated for RAHUL005 (Requested By Vanaja)', '2020-10-22 13:02:51.829053'),
(27, '-100', '-1/IT', 'The Budget --0.28 Reduced from October; - 8.33/month is Reduced for the respective months- November,December,January,February,March, as olr_sn_3 Requested By farhan@ifim.edu.in', '2020-10-30 10:27:19.870840'),
(28, '-600000', '-1/IT', 'The Budget -23,333.33 Reduced from November; - 50,000.00/month is Reduced for the respective months- December,January,February,March, as olr_sn_3 Requested By farhan@ifim.edu.in', '2020-10-30 11:57:48.032230'),
(29, '+600000', '+1/IT', 'The Budget + 50000/month is Restored for the respective months- November,December,January,February,March, as olr_sn_3 has Change in Date, Requested By Vanaja', '2020-10-30 12:13:07.458522'),
(30, '-12000', '-1/Staff', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 07:57:45.275453'),
(31, '-12000', '-1/Staff', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 08:04:34.246408'),
(32, '-12000', '-1/Staff', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 08:25:10.236797'),
(33, '-480000', '-1/Staff', 'The Budget -4,000.00 Reduced from November; - 40,000.00/month is Reduced for the respective months- December,January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 10:16:49.039552'),
(34, '-480000', '-1/Staff', 'The Budget -4,000.00 Reduced from November; - 40,000.00/month is Reduced for the respective months- December,January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 10:23:22.126293'),
(35, '+480000', '+1/Staff', 'The Budget + 40000/month is Restored for the respective months- November,December,January,February,March, as olr_sn_1 has Change in Date, Requested By Vanaja', '2020-11-12 11:03:17.376344'),
(36, '-480000', '-1/Staff', 'The Budget -4,000.00 Reduced from December; - 40,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_1 Requested By farhan@ifim.edu.in', '2020-11-12 11:04:45.781898'),
(37, '+480000', '+1/cordinator', 'The Budget +40000/month is Restored for the respective months-  as Separation Process Initiated for 500 (Requested By Vanaja)', '2020-11-17 08:52:52.505036'),
(38, '-12345', '-1/Staff', 'The Budget -994.46 Reduced from December; - 1,028.75/month is Reduced for the respective months- January,February,March, as olr_sn_2 Requested By farhan@ifim.edu.in', '2020-11-17 11:26:59.869856'),
(39, '-12345', '-1/Staff', 'The Budget -994.46 Reduced from December; - 1,028.75/month is Reduced for the respective months- January,February,March, as olr_sn_2 Requested By farhan@ifim.edu.in', '2020-11-17 11:43:55.598490'),
(40, '-12345', '-1/Staff', 'The Budget -994.46 Reduced from December; - 1,028.75/month is Reduced for the respective months- January,February,March, as olr_sn_2 Requested By farhan@ifim.edu.in', '2020-11-17 11:47:50.668042'),
(41, '-12345', '-1/Staff', 'The Budget -994.46 Reduced from December; - 1,028.75/month is Reduced for the respective months- January,February,March, as olr_sn_2 Requested By farhan@ifim.edu.in', '2020-11-17 11:50:04.196837'),
(42, '-34444', '-1/Staff', 'The Budget -2,774.66 Reduced from December; - 2,870.33/month is Reduced for the respective months- January,February,March, as olr_sn_3 Requested By farhan.khan@ifim.edu.in', '2020-11-18 10:48:59.702071'),
(43, '+12345', '+1/cordinator', 'The Budget : + 0.00 Restored for ; + 1,028.75/month is Restored for the respective  months-  as Separation Process Initiated for 475 (Requested By Vanaja)', '2020-11-18 12:24:49.559004'),
(44, '-300000', '-1/Staff', 'The Budget -8,333.33 Reduced from January; - 25,000.00/month is Reduced for the respective months- February,March, as olr_sn_4 Requested By farhan.khan@ifim.edu.in', '2020-11-18 12:55:39.036701'),
(45, '-12000', '-1/Professor', 'The Budget -733.33 Reduced from January; - 1,000.00/month is Reduced for the respective months- February,March, as olr_sn_10 Requested By farhan.khan@ifim.edu.in', '2020-11-23 11:56:23.440178'),
(46, '-12000', '-1/Assistant Proffesor', 'The Budget -800.00 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_11 Requested By farhan.khan@ifim.edu.in', '2020-11-23 11:58:26.099284'),
(47, '-12000', '-1/Professor', 'The Budget -733.33 Reduced from January; - 1,000.00/month is Reduced for the respective months- February,March, as olr_sn_10 Requested By farhan.khan@ifim.edu.in', '2020-11-23 12:01:25.816237'),
(48, '-12000', '-1/Assistant Proffesor', 'The Budget -800.00 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_11 Requested By farhan.khan@ifim.edu.in', '2020-11-23 12:02:18.451447'),
(49, '-12000', '-1/Professor', 'The Budget -933.33 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_5 Requested By farhan.khan@ifim.edu.in', '2020-11-23 12:55:56.380929'),
(50, '-12000', '-1/Assistant Proffesor', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_6 Requested By farhan.khan@ifim.edu.in', '2020-11-23 13:01:29.146603'),
(51, '-12000', '-1/Assistant Proffesor', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_7 Requested By farhan.khan@ifim.edu.in', '2020-11-23 13:02:32.137382'),
(52, '-12000', '-1/Assistant Proffesor', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_8 Requested By farhan.khan@ifim.edu.in', '2020-11-23 13:12:42.324022'),
(53, '-12000', '-1/Assistant Proffesor', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_9 Requested By farhan.khan@ifim.edu.in', '2020-11-23 13:16:16.797718'),
(54, '-12000', '-1/Assistant Proffesor', 'The Budget -966.67 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_12 Requested By farhan.khan@ifim.edu.in', '2020-12-02 11:02:24.992179'),
(55, '-1200000', '-1/Professor', 'The Budget -93,333.33 Reduced from December; - 100,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_5 Requested By farhan.khan@ifim.edu.in', '2020-12-03 10:10:02.847821'),
(56, '-12000', '-1/Professor', 'The Budget -933.33 Reduced from December; - 1,000.00/month is Reduced for the respective months- January,February,March, as olr_sn_5 Requested By farhan.khan@ifim.edu.in', '2020-12-03 10:12:37.863358');

-- --------------------------------------------------------

--
-- Table structure for table `ifim b school_templates`
--

CREATE TABLE `ifim b school_templates` (
  `id` int(20) NOT NULL,
  `template_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ifim b school_templates`
--

INSERT INTO `ifim b school_templates` (`id`, `template_name`) VALUES
(1, 'ifim b school faculty');

-- --------------------------------------------------------

--
-- Table structure for table `ifim college dep`
--

CREATE TABLE `ifim college dep` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ifim college emp`
--

CREATE TABLE `ifim college emp` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ifim college headcount`
--

CREATE TABLE `ifim college headcount` (
  `id` int(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `month` int(11) NOT NULL,
  `hc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ifim college headcount`
--

INSERT INTO `ifim college headcount` (`id`, `position`, `month`, `hc`) VALUES
(1, 'Software Developer', 1, 0),
(2, 'Software Developer', 2, 0),
(3, 'Software Developer', 3, 0),
(4, 'Software Developer', 4, 0),
(5, 'Software Developer', 5, 0),
(6, 'Software Developer', 6, 0),
(7, 'Software Developer', 7, 0),
(8, 'Software Developer', 8, 0),
(9, 'Software Developer', 9, 0),
(10, 'Software Developer', 10, 0),
(11, 'Software Developer', 11, 0),
(12, 'Software Developer', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ifim college new_emp`
--

CREATE TABLE `ifim college new_emp` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ifim college role`
--

CREATE TABLE `ifim college role` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `generate_olr` int(2) NOT NULL,
  `accept_reject_olr` int(2) NOT NULL,
  `approve_olr` int(2) NOT NULL,
  `olr_sent_to_cand` int(2) NOT NULL,
  `view_olr` int(2) NOT NULL,
  `accounts` int(2) NOT NULL,
  `asset_req_manage` int(2) NOT NULL,
  `super_admin` int(2) NOT NULL,
  `new_emp` int(2) NOT NULL,
  `IT` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ifim college transaction`
--

CREATE TABLE `ifim college transaction` (
  `id` int(20) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `hc` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer_letters`
--

CREATE TABLE `offer_letters` (
  `id` int(20) NOT NULL,
  `datesubmitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cand_name` varchar(20) NOT NULL,
  `cand_address` varchar(500) NOT NULL,
  `jobtype` varchar(100) NOT NULL,
  `jobmonths` varchar(100) DEFAULT NULL,
  `pos` varchar(20) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `personal_mail_id` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `ctc` double NOT NULL,
  `probation` int(20) NOT NULL,
  `reporting_to` varchar(20) NOT NULL,
  `requested_by` varchar(200) NOT NULL,
  `replacement` varchar(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `work_time` int(20) NOT NULL,
  `work_days` int(20) NOT NULL,
  `entity_name` varchar(20) NOT NULL,
  `perks` varchar(200) DEFAULT NULL,
  `status` int(100) NOT NULL DEFAULT 0,
  `date_sent` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_letters`
--

INSERT INTO `offer_letters` (`id`, `datesubmitted`, `cand_name`, `cand_address`, `jobtype`, `jobmonths`, `pos`, `job_title`, `personal_mail_id`, `joining_date`, `ctc`, `probation`, `reporting_to`, `requested_by`, `replacement`, `expiry_date`, `work_time`, `work_days`, `entity_name`, `perks`, `status`, `date_sent`) VALUES
(2, '2020-11-17 11:04:12', 'aman', 'dsvbgfgn', 'fulltime', '', 'Staff', 'IT', 'dixitaman.nov.wwe@gmail.com', '2020-12-01', 12345, 3, 'Anandarup', 'farhan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', 'asdfg    ', 8, '2020-11-18'),
(3, '2020-11-18 10:37:32', 'Rohit Kumar', 'xyz', 'fulltime', '', 'Staff', 'IT', 'dixitaman.nov.wwe@gmail.com', '2020-12-01', 34444, 8, 'Anandarup', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', 'asd YES', 8, '2020-11-18'),
(4, '2020-11-18 12:50:25', 'Rajesh M', 'Jayanagar 4th Block,, Bangalore-78', 'parttime', '6', 'Staff', 'associate', 'rahulkrish9291@gmail.com', '2021-01-20', 300000, 2, 'Anandarup', 'farhan.khan@ifim.edu.in', 'Aman', '2020-12-13', 40, 5, 'IFIM B School', '3 Lakhs after 6 months ', 4, '2020-11-23'),
(5, '2020-12-03 10:17:30', 'rahul', '#291,sri lalitha devi nilayam, celebrity Paradise layout\r\nDoddathoguru, electronic city phase 1', 'fulltime', '', 'Faculty', 'Professor', 'rahulkrish9291@gmail.com', '2020-12-02', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-09', 40, 5, 'IFIM B School', 'testing1   ', 4, NULL),
(6, '2020-11-23 09:15:00', 'rahul krish', '#291,sri lalitha devi nilayam, celebrity Paradise layout\r\nDoddathoguru, electronic city phase 1', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkrish9291@gmail.com', '2020-12-01', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', 'perks perks ', 1, NULL),
(7, '2020-11-23 09:21:53', 'rahul krish', '#291,sri lalitha devi nilayam, celebrity Paradise layout\r\nDoddathoguru, electronic city phase 1', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkrish9291@gmail.com', '2020-12-01', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', 'perks perks ', 1, NULL),
(8, '2020-11-23 09:34:27', 'rahul krish', '9-251/1,AFGHAN STREET', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkris90@gmail.com', '2020-12-01', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', 'perks ', 1, NULL),
(9, '2020-11-23 09:43:49', 'ching chong', '9-251/1,AFGHAN STREET', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkris90@gmail.com', '2020-12-01', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', ' woww', 1, NULL),
(10, '2020-11-23 09:50:10', 'rahul', '#291,sri lalitha devi nilayam, celebrity Paradise layout\r\nDoddathoguru, electronic city phase 1', 'parttime', '3', 'Faculty', 'Professor', 'rahulkrish9291@gmail.com', '2021-01-08', 12000, 3, 'Anandarup', 'farhan.khan@ifim.edu.in', 'New Employee', '2021-01-15', 40, 5, 'IFIM B School', 'perks ', 1, NULL),
(11, '2020-11-23 09:54:15', 'rahul krish', '9-251/1,AFGHAN STREET', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkris90@gmail.com', '2020-12-06', 12000, 3, 'Anandarup', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-13', 40, 5, 'IFIM B School', ' perksss ', 1, NULL),
(12, '2020-11-23 11:15:38', 'rahul', '#291,sri lalitha devi nilayam, celebrity Paradise layout\r\nDoddathoguru, electronic city phase 1', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkris90@gmail.com', '2020-12-01', 12000, 3, 'aman', 'farhan.khan@ifim.edu.in', 'New Employee', '2020-12-08', 40, 5, 'IFIM B School', ' ', 6, '2020-12-02'),
(13, '2020-12-02 10:48:11', 'Dr.Rohan', '#24, LAASYA PASSIOn ENCLAVE, beddaspura main roAD\r\nDoddathoguru, electronic city phase 1', 'fulltime', '', 'Faculty', 'Assistant Proffesor', 'rahulkrish9291@gmail.com', '2021-01-01', 10000000.23, 3, 'Naresh', 'farhan.khan@ifim.edu.in', 'New Employee', '2021-01-08', 40, 5, 'IFIM B School', '1.iphone', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `type`, `name`) VALUES
(10, 'Faculty', 'Assistant Proffesor'),
(11, 'Faculty', 'Associate Professor'),
(12, 'Faculty', 'Professor'),
(13, 'Intern', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `position_type`
--

CREATE TABLE `position_type` (
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_type`
--

INSERT INTO `position_type` (`name`) VALUES
('Adjunct Faculty'),
('Consultancies'),
('Contract Employees'),
('Faculty'),
('Intern'),
('Staff'),
('Visiting Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `separation`
--

CREATE TABLE `separation` (
  `id` int(100) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `empname` varchar(200) NOT NULL,
  `entity` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `ctc` varchar(100) NOT NULL,
  `relievingdate` date NOT NULL,
  `requestedby` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `separation`
--

INSERT INTO `separation` (`id`, `empid`, `empname`, `entity`, `position`, `job_title`, `ctc`, `relievingdate`, `requestedby`, `date`, `type`, `status`) VALUES
(29, '500', 'Naresh', 'IFIM B School', 'cordinator', 'IT', '480000', '2020-11-29', 'Vanaja', '2020-11-17 08:51:48', 'Termination', 0),
(32, '475', 'aman', 'IFIM B School', 'cordinator', 'IT', '12345', '2020-11-30', 'Vanaja', '2020-11-18 12:19:13', 'Resignation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `budget` int(11) NOT NULL,
  `hc` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgetchanges`
--
ALTER TABLE `budgetchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgetrequests`
--
ALTER TABLE `budgetrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_miscellaneous`
--
ALTER TABLE `candidate_miscellaneous`
  ADD PRIMARY KEY (`olr_id`);

--
-- Indexes for table `candidate_personal_info`
--
ALTER TABLE `candidate_personal_info`
  ADD PRIMARY KEY (`olr_id`);

--
-- Indexes for table `candidate_signature`
--
ALTER TABLE `candidate_signature`
  ADD PRIMARY KEY (`olr_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exit_interview`
--
ALTER TABLE `exit_interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `hc_changes`
--
ALTER TABLE `hc_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_email`
--
ALTER TABLE `hr_email`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ifim b school dep`
--
ALTER TABLE `ifim b school dep`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ifim b school emp`
--
ALTER TABLE `ifim b school emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim b school headcount`
--
ALTER TABLE `ifim b school headcount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim b school new_emp`
--
ALTER TABLE `ifim b school new_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim b school role`
--
ALTER TABLE `ifim b school role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim b school transaction`
--
ALTER TABLE `ifim b school transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim b school_templates`
--
ALTER TABLE `ifim b school_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim college dep`
--
ALTER TABLE `ifim college dep`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ifim college emp`
--
ALTER TABLE `ifim college emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim college headcount`
--
ALTER TABLE `ifim college headcount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim college new_emp`
--
ALTER TABLE `ifim college new_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim college role`
--
ALTER TABLE `ifim college role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ifim college transaction`
--
ALTER TABLE `ifim college transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_letters`
--
ALTER TABLE `offer_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_type`
--
ALTER TABLE `position_type`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `separation`
--
ALTER TABLE `separation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empid` (`empid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `budgetchanges`
--
ALTER TABLE `budgetchanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `budgetrequests`
--
ALTER TABLE `budgetrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hc_changes`
--
ALTER TABLE `hc_changes`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ifim b school emp`
--
ALTER TABLE `ifim b school emp`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ifim b school headcount`
--
ALTER TABLE `ifim b school headcount`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `ifim b school new_emp`
--
ALTER TABLE `ifim b school new_emp`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ifim b school role`
--
ALTER TABLE `ifim b school role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ifim b school transaction`
--
ALTER TABLE `ifim b school transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ifim b school_templates`
--
ALTER TABLE `ifim b school_templates`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ifim college emp`
--
ALTER TABLE `ifim college emp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ifim college headcount`
--
ALTER TABLE `ifim college headcount`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ifim college new_emp`
--
ALTER TABLE `ifim college new_emp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ifim college role`
--
ALTER TABLE `ifim college role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ifim college transaction`
--
ALTER TABLE `ifim college transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `separation`
--
ALTER TABLE `separation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
