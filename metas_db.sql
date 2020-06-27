-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 07:55 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `uname` varchar(25) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `control` varchar(25) NOT NULL,
  `ipaddress` longtext NOT NULL,
  `lastdatetimelogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`uname`, `pwd`, `control`, `ipaddress`, `lastdatetimelogin`) VALUES
('MyAdmin', 'hello1', 'Admin', '::1', '2020-06-26 06:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addmore`
--

CREATE TABLE `tbl_addmore` (
  `addmore_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `small_desc` longtext,
  `extra_desc` longtext,
  `extra_icon` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addmore`
--

INSERT INTO `tbl_addmore` (`addmore_id`, `page_id`, `title`, `small_desc`, `extra_desc`, `extra_icon`) VALUES
(1, 2, 'LIMITED STUDENTS', '', '', 'book490.png'),
(2, 2, 'ONLINE HELP', '', '', 'help608.png'),
(3, 2, 'ONLINE PAYMENT', '', '', 'paypal274.png'),
(4, 2, 'CALL +91 7782256558', '', '', 'phone (1)562.png'),
(5, 3, 'Our Mission', '<p>TO TOUCH THE LIVES AND TO TRANSFORM PEOPLE BY TEACHING, BY HEALING AND BY CREATING A BETTER COMMUNITY FOR MAN AND GOD</p>\r\n', '', '7571.jpeg'),
(6, 3, 'Our Vision', '<p>TO BECOME A DYNAMIC GLOBAL INSTITUTION AND A CENTER FOR EXCELLENCE</p>\r\n', '', '8658.jpeg'),
(7, 4, 'LIMITED STUDENTS', '<p>Lorem ipsum dolor sit amet, consectetur.</p>\r\n', '', 'book490987.png'),
(8, 4, 'ONLINE HELP', '<p>Lorem ipsum dolor sit amet, consectetur.</p>\r\n', '', 'help608564.png'),
(9, 4, 'ONLINE PAYMENT', '<p>Lorem ipsum dolor sit amet, consectetur.</p>\r\n', '', 'paypal274851.png'),
(10, 4, 'SUPPORTIVE FACULTY', '<p>Lorem ipsum dolor sit amet, consectetur.</p>\r\n', '', 'phone (1)562137.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(100) NOT NULL,
  `blog_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `blog_image` varchar(300) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `bdate` datetime DEFAULT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `pdf_file` longtext,
  `blog_video` longtext,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `multi_images` longtext,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogcategory`
--

CREATE TABLE `tbl_blogcategory` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `career_id` int(11) NOT NULL,
  `career_title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career_info`
--

CREATE TABLE `tbl_career_info` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cphone` varchar(10) NOT NULL,
  `cexperience` varchar(30) NOT NULL,
  `capply` varchar(50) NOT NULL,
  `cresume` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `multi_images` longtext,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `brand` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_parent_id`, `cat_name`, `cat_description`, `cat_image`, `multi_images`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `recordListingID`, `slug`, `brand`) VALUES
(1, 0, 'Commerce', NULL, '', '', 'Commerce', 'Commerce', 'Commerce', NULL, 'Commerce', NULL),
(2, 0, 'Management', NULL, '', '', 'Management', 'Management', 'Management', NULL, 'Management', NULL),
(3, 0, 'Nursing', NULL, '', '', 'Nursing', 'Nursing', 'Nursing', NULL, 'Nursing', NULL),
(4, 0, 'Value Added Courses', NULL, '', '', 'Value Added Courses', 'Value Added Courses', 'Value Added Courses', NULL, 'value-added-courses', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_user`
--

CREATE TABLE `tbl_category_user` (
  `cat_id` int(11) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  `cat_image` varchar(250) NOT NULL,
  `is_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(500) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `desc_client` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_meet`
--

CREATE TABLE `tbl_company_meet` (
  `cm_id` int(11) NOT NULL,
  `emp_name` varchar(25) NOT NULL,
  `company_name` longtext NOT NULL,
  `meet_date` date NOT NULL,
  `description` longtext NOT NULL,
  `multi_images` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `con_id` int(11) NOT NULL,
  `maptag` longtext NOT NULL,
  `contact_desc` longtext NOT NULL,
  `email` longtext NOT NULL,
  `contact_no` longtext NOT NULL,
  `opening_hours` varchar(100) NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`con_id`, `maptag`, `contact_desc`, `email`, `contact_no`, `opening_hours`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`) VALUES
(1, '', 'Add', 'info@metascollege.com', '9876543210', 'Mon-Fri 8:00 to 2:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactdetails`
--

CREATE TABLE `tbl_contactdetails` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dmenu`
--

CREATE TABLE `tbl_dmenu` (
  `menu_id` int(100) NOT NULL,
  `menu_parent_id` int(100) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_fa` varchar(100) DEFAULT NULL,
  `menu_class` varchar(100) DEFAULT NULL,
  `menu_link` varchar(100) DEFAULT NULL,
  `menu_page_id` varchar(100) DEFAULT NULL,
  `menu_description` longtext,
  `menu_image` longtext NOT NULL,
  `recordListingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE `tbl_download` (
  `download_id` int(100) NOT NULL,
  `download_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `download_image` varchar(300) NOT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `pdf_file` longtext,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downloadcategory`
--

CREATE TABLE `tbl_downloadcategory` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `program_name` varchar(100) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(10) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `speaker` varchar(50) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) DEFAULT NULL,
  `meta_tag_title` varchar(50) DEFAULT NULL,
  `meta_tag_description` varchar(500) DEFAULT NULL,
  `meta_tag_keywords` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favicon`
--

CREATE TABLE `tbl_favicon` (
  `fav_id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favicon`
--

INSERT INTO `tbl_favicon` (`fav_id`, `size`, `relation`, `image_name`) VALUES
(1, '25x25', 'favicon', 'favicon778.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(100) NOT NULL,
  `gallery_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `gallery_image` varchar(300) NOT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `multi_images` longtext,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `logo_id` int(11) NOT NULL,
  `image_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logo_id`, `image_name`) VALUES
(1, 'logoMetas518.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `news_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(100) NOT NULL,
  `news` longtext NOT NULL,
  `emails` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter_emails`
--

CREATE TABLE `tbl_newsletter_emails` (
  `email_id` int(11) NOT NULL,
  `name` longtext,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(1000) DEFAULT NULL,
  `page_desc` longtext,
  `page_parent_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `meta_tag_title` varchar(500) DEFAULT NULL,
  `meta_tag_description` varchar(2000) DEFAULT NULL,
  `meta_tag_keywords` varchar(1000) DEFAULT NULL,
  `multi_images` longtext,
  `slug` longtext,
  `recordListingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`page_id`, `page_name`, `page_desc`, `page_parent_id`, `image`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `multi_images`, `slug`, `recordListingID`) VALUES
(1, 'Home', '', 0, '', 'Home', 'Home', 'Home', '', 'Home', 0),
(2, 'Below slider', '', 1, '', 'Below slider', 'Below slider', 'Below slider', '', 'Below slider', 0),
(3, 'WELCOME TO METAS ADVENTIST COLLEGE', '<p>The Metas Group of Institutions is a part of the vast array Educational and Medical institutions run by the Seventh Day Adventist Organisation. Worldwide they are operating 5590 educational establishments, including 114 universities and colleges.</p>\r\n', 1, '', '', '', '', '', 'WELCOME TO METAS ADVENTIST COLLEGE', 0),
(4, 'WHY CHOOSE METAS?', '<p>The Metas Group of Institutions is a part of the vast array Educational and Medical institutions run by the Seventh Day Adventist Organisation. Worldwide they are operating 5590 educational establishments, including 114 universities and colleges. There are 162 hospitals and sanatoriums as well as 102 nursing homes.</p>\r\n\r\n<p>The operations of Surat is managed by Medical Educational Trust Association Surat of Seventh-day Adventist. Metas is one of the oldest educational and medical institutions operating in the city of Surat. Metas Adventist Hospital and Metas Adventist School are in operation since 1923 &amp; 1942 respectively.</p>\r\n', 1, 'about917.png', 'WHY CHOOSE METAS?', 'WHY CHOOSE METAS?', 'WHY CHOOSE METAS?', '', 'WHY CHOOSE METAS?', 0),
(5, 'Course', '', 0, 'bg1125.jpeg', 'Course', 'Course', 'Course', '', 'Course', 0),
(6, 'Faculties', '<p>Faculties</p>\r\n', 0, 'bg6312.jpeg', 'Faculties', 'Faculties', 'Faculties', '', 'Faculties', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(100) NOT NULL,
  `product_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `pdf_file` longtext,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `multi_images` longtext,
  `slug` varchar(100) DEFAULT NULL,
  `date` int(50) NOT NULL,
  `month` text NOT NULL,
  `year` int(50) NOT NULL,
  `product_video` longtext NOT NULL,
  `product_map` longtext NOT NULL,
  `course_admission_process` longtext NOT NULL,
  `course_application_process` longtext NOT NULL,
  `course_e_and_s_process` longtext NOT NULL,
  `course_faculty_profile_link` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `description`, `cat_id`, `product_image`, `price`, `recordListingID`, `pdf_file`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `multi_images`, `slug`, `date`, `month`, `year`, `product_video`, `product_map`, `course_admission_process`, `course_application_process`, `course_e_and_s_process`, `course_faculty_profile_link`) VALUES
(1, 'BCOM', '<p style=\"text-align:justify\">Bachelor of Commerce program at Christ (Deemed to be University) offers significant flexibility and diversity for students.&nbsp;The program is designed with special focus on finance, accounting and analytics. Students will acquire the skills and knowledge to meet the challenges of a changing business environment and financial markets, develop the ability to critically analyse emerging business issues, and interpret insights from huge amount of financial data. The University also gives special importance to expose student community to scholarly research in the national and global business arena. Achieving these academic and professional qualities will lead a commerce graduate to a wide range of business-related professions and careers, or progress to more advanced studies.</p>\r\n\r\n<p style=\"text-align:justify\">The degree comprises core courses on Commerce embedded with courses like Introduction to Business Analytics, Data Visualisation softwares, Basics of R programming. The discipline specific mandatory courses include Applied Excel, Financial modelling etc. which are geared towards analysis of financial data. Inter-disciplinary open electives, skill enhancement certificate programs certified by Moody&rsquo;s Analytics, projects and internships are certain other unique aspects of this program.</p>\r\n', '1,', 'img1237.jpeg', NULL, 0, 'sample26725.pdf,', 'BCOM', 'BCOM', 'BCOM', '', 'BCOM', 0, '', 0, '', '', '<p style=\"text-align:justify\">Candidates will be intimated about the selection status through application status page on the University website www.lavasa.christuniversity.in. The merit cut off will be declared on the 4th day after the declaration of class 12 results (Maharashtra HSC/CBSE/ISC). Other Boards whose results may be declared after the above mentioned Boards will be considered subject to availability of seats.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Note:</strong>&nbsp;Candidates must note that if selected, admission is provisional and subject to University rules.</p>\r\n\r\n<p style=\"text-align:justify\">Details on how to process admission will be available on Offer of Admission through &lsquo;Application Status&rsquo; link on the University website.</p>\r\n\r\n<p style=\"text-align:justify\">Candidates are required to choose the preferred date and time from available options to facilitate smooth admission process. Admission must be processed at the Office of Admissions, Central Block, CHRIST (Deemed to be University), Hosur Road, Bengaluru &ndash; 560029.</p>\r\n\r\n<p style=\"text-align:justify\">As per UGC guidelines, fee payment has to be made through online mode. Payment options and details will be provided to selected candidates through &lsquo;Offer of Admission&rsquo; on &lsquo;Application status&rsquo; on the University website. Fees for first year including Admission Registration fee must be paid in full as part of the admission process.</p>\r\n\r\n<p style=\"text-align:justify\">Admission will not be processed without the presence of the candidate and the mandatory ORIGINAL DOCUMENTS and one set of photocopies mentioned below;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Class 10 Marks Statement (Mandatory).</li>\r\n	<li style=\"text-align:justify\">Class 12 Marks Statement (Internet printout) (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;Transfer Certificate (TC) from the last qualified institution (Mandatory).</li>\r\n	<li style=\"text-align:justify\">Migration Certificate of Class XII (applicable for all candidates except Maharashtra State Board) (Mandatory).</li>\r\n	<li style=\"text-align:justify\">One Stamp size and One passport size photograph formal dress with white background (Mandatory). &nbsp;</li>\r\n	<li style=\"text-align:justify\">Two Copies of the Online Payment Receipt (Mandatory).</li>\r\n	<li style=\"text-align:justify\">Copy of valid ID proof (Aadhar Card / Aadhar Enrolment Receipt).</li>\r\n	<li style=\"text-align:justify\">Candidates falling under any of these categories (NRI / PIO / OCI / SAARC / AFRICA / ASEAN / OTHER FOREIGN NATIONALS) have to submit:</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">&nbsp;Copy of Passport and Visa Details (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;PIO / OCI have to produce the copy of PIO / OCI card whichever is applicable (Mandatory).&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</li>\r\n	<li style=\"text-align:justify\">&nbsp;Medical Fitness Certificate (MFC) from any recognized medical practitioner certified by the Medical Council of India and</li>\r\n	<li style=\"text-align:justify\">&nbsp;Resident Permit (RP) (If available while applying)</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">All mandatory documents must be submitted for verification during the admission process. An undertaking for pending original documents unavailable currently [applicable only for candidates writing / passing their exam in March &ndash; June 2020], must be submitted to the Office of Admissions. These documents must be submitted on or before July 15, 2020. Failure to submit the pending documents will be treated as unsuccessful in the qualifying examination or considered &ldquo;Not Eligible&rdquo; and admission will be terminated from CHRIST (Deemed to be University) without any claim.</p>\r\n\r\n<p style=\"text-align:justify\">All admitted students must open an account at South Indian Bank, CHRIST (Deemed to be University) Branch as part of the admission process and must carry relevant ID proof (Aadhar Card and Pan Card). The University ID card is a smart card, which is both an ID cum ATM card with a chip containing the student personal details. All transactions within the University campus after commencement of classes, including fee payment will be processed only through this card. It is also an access card for Library and other restricted places.<br />\r\nSelected candidates who fall under International student category (ISC) should register with the Foreigner Regional Registration Officer (FRRO / FRO) of the Local Police in Pune, India within 14 working days from the date of admission or arriving in Pune.<br />\r\nThe date of commencement of the academic Year 2020 - 2021 will be intimated during the admission process.</p>\r\n', '<p style=\"text-align:justify\">All applicants using online mode must visit the&nbsp;online application page.&nbsp; Register by entering your NAME (as printed on Class 10 Marks Card) EMAIL-ID and set password.&nbsp; (The email id and mobile number provided will be used for sending confirmation and application status-update messages).</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Applications can be filled online prior to the declaration of class XII results and saved. Class XII marks can be entered only after verification of self-attested internet printout of the XII results.</strong></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><strong>&nbsp;Guidelines to applicants:</strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">To fill the application you must have a copy of statement of marks of Class 10, Class 12 (Can be entered only after results are declared) (Mandatory).</li>\r\n	<li style=\"text-align:justify\">Fill-in all the details in the &ldquo;detailed application&rdquo; page. Scan and upload recent passport size photograph (3.5 cms x 4.5 cms formal dress with white background) and click &ldquo;Submit&rdquo;. On clicking Submit, a viewable and editable page will appear on screen. In case you need to make any corrections you may edit the data/details and then click &ldquo;Confirm Submission&rdquo;.</li>\r\n	<li style=\"text-align:justify\">Application registration fee may be paid through Credit / Debit Card / Net banking facility (for online applicants only).</li>\r\n	<li style=\"text-align:justify\">Choose the payment option and fill-in the required details to process the &ldquo;Application processing fee&rdquo;. The application will be submitted online after payment of application processing fee.</li>\r\n	<li style=\"text-align:justify\">After the payment is successful you will receive the application number with the option to save your application form (if filling the application prior to the declaration of class XII result).</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Candidates must submit the filled-in application forms along with the supporting documents (duly self attested) within 3 days of the declaration of Maharashtra HSC/ISC/CBSE results in person/ Parents / Guardian. Applications not submitted to the Office of Admissions within 3 days from the declaration of class XII results (Karnataka PUC/CBSE/ISC) will not be considered for the merit list. Other Boards whose results may be declared after the above mentioned Boards will be considered subject to availability of seats.</li>\r\n	<li style=\"text-align:justify\">&nbsp;No application will be considered if submitted by COURIER or POST.</li>\r\n	<li style=\"text-align:justify\">&nbsp;Documents to be submitted in Person / Parents / Guardian:</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">&nbsp;Photocopy of Class 10 Marks Card (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;Internet copy of Class 12 Marks Card self attested (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;Valid Category Certificate (For candidates from Karnataka PU applying under various categories) (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;Baptism Certificate from the Parish Priest / Pastor for Karnataka Christian Students (Mandatory).</li>\r\n	<li style=\"text-align:justify\">&nbsp;Registration Payment Receipt from ICAI (Applicable for BCom F &amp; A only).</li>\r\n	<li style=\"text-align:justify\">&nbsp;1 recent passport size and 1 stamp size photographs in formal dress of (Photo size of 35mm x 45mm with white background only - Standard Indian Passport Format only). The application may be rejected if the photograph is not according to the specification.</li>\r\n	<li style=\"text-align:justify\">&nbsp;Copy of signed application form. Keep a copy of the application form for further reference.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Candidates falling under any of these categories (NRI / PIO / OCI / SAARC / AFRICA / ASEAN / OTHER FOREIGN NATIONALS) have to submit:</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">&nbsp;Copy of Passport and Visa Details&nbsp;<strong>(Mandatory).&nbsp;&nbsp;</strong>&nbsp;&nbsp;</li>\r\n	<li style=\"text-align:justify\">&nbsp;Candidates applying under PIO or OCI have to produce the copy of PIO or OCI card whichever is</li>\r\n	<li style=\"text-align:justify\">applicable&nbsp;<strong>(Mandatory).</strong></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Candidates, who are unable to print the application form due to system / power / internet failure, may log on to the &ldquo;Application Status&rdquo; link and enter your email id, password and captcha details to view and print the application form.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>After processing the Application Forms, the cut off percentage will be declared and displayed on the University notice board / University website. No postal / telephonic / e-mail communication will be given from the University. The University does not authorize any individual or organization to operate on its behalf.</strong></p>\r\n', '<p style=\"text-align:justify\"><strong>ELIGIBILITY</strong><br />\r\nPass in class 12 (10+2) is the minimum eligibility for applying / admission.</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Students pursuing International curriculum must note that eligibility is according to AIU stipulations</li>\r\n	<li style=\"text-align:justify\">Applicants pursuing IB curriculum must have 3 HL and 3 SL with 24 credits.</li>\r\n	<li style=\"text-align:justify\">Applicants pursuing GCE / Edexcel must have a minimum of 3 A levels grade not less than C.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><strong>SELECTION PROCESS</strong></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\">Selection for the programme will be based on the performance in class XII.&nbsp; After processing the Application forms of candidates whose supporting documents are submitted to the office within 3 days of the declaration of the class XII result (Maharashtra HSC/ISC/CBSE), the cut off percentage will be declared and displayed on the University notice board/University website. No postal/telephonic/e-mail communication will be given from the University. Other Boards whose results may be declared after the above mentioned Boards will be considered subject to availability of seats. The University does not authorize any individual or organization to operate on its behalf.</li>\r\n	<li style=\"text-align:justify\">Candidate will be intimated through appstat link: http://applavasa.christuniversity.in/ on the University website www.lavasa.christuniversity.in. No other communication will be made.</li>\r\n	<li style=\"text-align:justify\">Candidates failing to submit the application within the stipulated date and time will be considered as &ldquo;Not Selected&rdquo;.</li>\r\n	<li style=\"text-align:justify\">Candidates not submitting the category certificate from the concerned Maharashtra authorities will fall under general merit.</li>\r\n	<li style=\"text-align:justify\">Only Natives of Maharashtra, who can produce relevant documents from their Parish Priest/Pastor, will be considered under &ldquo;CHRISTIANITY CATHOLIC&rdquo; and &ldquo;CHRISTIANITY NON-CATHOLIC&rdquo; category.</li>\r\n	<li style=\"text-align:justify\">6) BCom Regular Programme classes are held from 9.00 AM to 4.00 PM. Students applying to BCom shall give an undertaking that, they do not intend to pursue CA programme (The new pattern of CA programme enables article ship immediately after the CPT and hence students cannot attend the regular BCom classes).</li>\r\n</ol>\r\n', './faculties/BCOM'),
(2, 'BBA', '', '2,', 'img2286.jpeg', NULL, 0, '', 'BBA', 'BBA', 'BBA', '', 'BBA', 0, '', 0, '', '', '', '', '', ''),
(3, 'MBA', '', '2,', 'img3246.jpeg', NULL, 0, '', 'MBA', 'MBA', 'MBA', '', 'MBA', 0, '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(100) NOT NULL,
  `project_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `project_image` varchar(300) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `pdf_file` longtext,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `multi_images` longtext,
  `slug` varchar(100) DEFAULT NULL,
  `date` int(50) NOT NULL,
  `month` text NOT NULL,
  `year` int(50) NOT NULL,
  `project_video` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_category`
--

CREATE TABLE `tbl_project_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `service_title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int(11) NOT NULL,
  `comm_percentage` int(11) NOT NULL,
  `advance_pay_percentage` int(11) NOT NULL,
  `paypal_business_id` varchar(500) DEFAULT NULL,
  `paypal_url` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `image_name` varchar(40) NOT NULL,
  `image_title` varchar(49) NOT NULL,
  `desc_slider` longtext NOT NULL,
  `meta_tag_title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `link_url` varchar(200) NOT NULL,
  `bg_image` varchar(200) DEFAULT NULL,
  `recordListingID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socialmedia`
--

CREATE TABLE `tbl_socialmedia` (
  `social_id` int(11) NOT NULL,
  `image_name` varchar(40) NOT NULL,
  `icon_name` varchar(40) DEFAULT NULL,
  `social_title` varchar(49) NOT NULL,
  `description` longtext NOT NULL,
  `link_url` varchar(200) NOT NULL,
  `recordListingID` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` varchar(100) DEFAULT NULL,
  `submenu_name` varchar(100) DEFAULT NULL,
  `submenu_fa` varchar(100) DEFAULT NULL,
  `submenu_class` varchar(100) DEFAULT NULL,
  `submenu_link` varchar(100) DEFAULT NULL,
  `submenu_page_id` varchar(100) DEFAULT NULL,
  `submenu_description` longtext,
  `submenu_image` longtext,
  `recordListingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(11) NOT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  `team_title` varchar(200) DEFAULT NULL,
  `description` longtext,
  `instagram` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `meta_tag_title` varchar(500) DEFAULT NULL,
  `meta_tag_description` varchar(2000) DEFAULT NULL,
  `meta_tag_keywords` varchar(1000) DEFAULT NULL,
  `recordListingID` int(11) DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `team_degree` varchar(500) NOT NULL,
  `team_position` varchar(500) NOT NULL,
  `team_email` varchar(100) NOT NULL,
  `team_qualification` longtext NOT NULL,
  `team_articles` longtext NOT NULL,
  `team_presentations` longtext NOT NULL,
  `team_invites` longtext NOT NULL,
  `team_thesis` longtext NOT NULL,
  `team_workshops` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `image_name`, `team_title`, `description`, `instagram`, `facebook`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `recordListingID`, `slug`, `cat_id`, `team_degree`, `team_position`, `team_email`, `team_qualification`, `team_articles`, `team_presentations`, `team_invites`, `team_thesis`, `team_workshops`) VALUES
(1, 'user.jpg', 'Jasper Appadurai M', '<p>HR Manager</p>\r\n', NULL, NULL, 'Jasper Appadurai M', 'Jasper Appadurai M', 'Jasper Appadurai M', 0, 'Jasper-Appadurai-M', '5,', '', '', '', '', '', '', '', '', ''),
(2, 'user.jpg', 'V S Wungmakhok', '<p>HR Personnel</p>\r\n', NULL, NULL, 'V S Wungmakhok', 'V S Wungmakhok', 'V S Wungmakhok', 0, 'V-S-Wungmakhok', '5,', '', '', '', '', '', '', '', '', ''),
(3, 'user.jpg', 'Agnew H Jacob', '<p>Vice Precident</p>\r\n\r\n<p>B.Com, MBA</p>\r\n', NULL, NULL, 'Agnew H Jacob', 'Agnew H Jacob', 'Agnew H Jacob', 0, 'Agnew-H-Jacob', '4,', '', '', '', '', '', '', '', '', ''),
(4, 'user.jpg', 'P V Nageshwarao', '<p>Assoc. Vice President</p>\r\n', NULL, NULL, 'P V Nageshwarao', 'P V Nageshwarao', 'P V Nageshwarao', 0, 'P-V-Nageshwarao', '4,', '', '', '', '', '', '', '', '', ''),
(5, 'user.jpg', 'Prabir Ghosh', '<p>Accountant</p>\r\n', NULL, NULL, 'Prabir Ghosh', 'Prabir Ghosh', 'Prabir Ghosh', 0, 'Prabir-Ghosh', '4,', '', '', '', '', '', '', '', '', ''),
(6, 'user.jpg', 'Partik P Parmar', '<p>Accountant</p>\r\n', NULL, NULL, 'Partik P Parmar', 'Partik P Parmar', 'Partik P Parmar', 0, 'Partik-P-Parmar', '4,', '', '', '', '', '', '', '', '', ''),
(7, 'user.jpg', 'Ranga Rao Abbadasari', '', NULL, NULL, 'Ranga Rao Abbadasari', 'Ranga Rao Abbadasari', 'Ranga Rao Abbadasari', 0, 'RANGA-RAO-ABBADASARI', '4,', '', '', '', '', '', '', '', '', ''),
(8, 'user.jpg', 'Akhil L J', '<p>Cashier</p>\r\n', NULL, NULL, 'Akhil L J', 'Akhil L J', 'Akhil L J', 0, 'Akhil-L-J', '4,', '', '', '', '', '', '', '', '', ''),
(9, 'user.jpg', 'Mathew Thomas', '<p>Accountant</p>\r\n', NULL, NULL, 'Mathew Thomas', 'Mathew Thomas', 'Mathew Thomas', 0, 'Mathew-Thomas', '4,', '', '', '', '', '', '', '', '', ''),
(10, 'user.jpg', 'Syam Prasad G', '<p>Assoc. Vice President</p>\r\n', NULL, NULL, 'Syam Prasad G', 'Syam Prasad G', 'Syam Prasad G', 0, 'Syam-Prasad-G', '6,', '', '', '', '', '', '', '', '', ''),
(11, 'user.jpg', 'Dr. Priya Narayan', '<p>Assoc. professor</p>\r\n', NULL, NULL, 'Dr. Priya Narayan', 'Dr. Priya Narayan', 'Dr. Priya Narayan', 0, 'Dr-Priya-Narayan', '6,', '', '', '', '', '', '', '', '', ''),
(12, 'user.jpg', 'Kishore babu Kalapala', '<p>Assoc. Registrar</p>\r\n', NULL, NULL, 'Kishore babu Kalapala', 'Kishore babu Kalapala', 'Kishore babu Kalapala', 0, 'Kishore-babu-Kalapala', '3,', '', '', '', '', '', '', '', '', ''),
(13, 'user.jpg', 'Franklin Narayan', '<p>Asst. Registrar</p>\r\n', NULL, NULL, 'Franklin Narayan', 'Franklin Narayan', 'Franklin Narayan', 0, 'Franklin-Narayan', '3,', '', '', '', '', '', '', '', '', ''),
(14, 'user.jpg', 'Ravi Kumar Batha', '<p>Registrar</p>\r\n', NULL, NULL, 'Ravi Kumar Batha', 'Ravi Kumar Batha', 'Ravi Kumar Batha', 0, 'Ravi-Kumar-Batha', '3,', '', '', '', '', '', '', '', '', ''),
(15, 'user.jpg', 'MR. LYNNEL CORNELIOUS KISKU', '<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p style=\"text-align:justify\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', NULL, NULL, 'MR. LYNNEL CORNELIOUS KISKU', 'MR. LYNNEL CORNELIOUS KISKU', 'MR. LYNNEL CORNELIOUS KISKU', 0, 'MR. LYNNEL CORNELIOUS KISKU', '8,', 'BCOM', 'Professor', 'vkantliwala@gmail.com', '<table cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">NAME</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">PROGRAM</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">INSTITUTION/UNIVERSITY</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">YEAR OF PASSING</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">PG</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">MBA</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">NORTH EAST HILL UNIVERSITY (NEHU)</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">2010</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">DEGREE</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">BBA</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">MANIPAL ACADEMY OF HIGHER EDUCATION (MAHE)</span></span></span></td>\r\n			<td><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">2008</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<table cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">SL.NO</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">NAME OF THE WORKSHOP/ FDP/ TRAINING PROGRAM</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">NAME OF THE ORGANISER</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">LEVEL</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">DATE</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">1</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo; Research Methodology and Statistical Analysis&rdquo;&nbsp;</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Department of Human Resource Development, Veer Narmad South Gujarat University&nbsp;</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">State</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">6th April, 2015&nbsp;</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">2</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo;Data Analytics Using R&rdquo;&nbsp;</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Department of Human Resource Development, Veer Narmad South Gujarat University</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">State</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">15-17 October,2018</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">3</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo;Educating Generation Z&rdquo;&nbsp;</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Metas Adventist College and Topline Business Development Services, Surat</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">State</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">23rd October,2018&nbsp;</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<table cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">SL.NO</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">TYPE OF PROGRAM</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">ROLE</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">NAME OF PORGRAM</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap; width:64px\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">TITLE OF PAPER</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">1</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Conference</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">participant</span></span></span></td>\r\n			<td colspan=\"2\" style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo;Changing Paradigms in managing Global Business&rdquo;&nbsp;</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">2</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Conference</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">participant</span></span></span></td>\r\n			<td colspan=\"2\" style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo;Emerging Trends in Commerce and Management&rdquo;&nbsp;</span></span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; height:19px; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">3</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">Conference</span></span></span></td>\r\n			<td style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">participant</span></span></span></td>\r\n			<td colspan=\"2\" style=\"border-bottom:none; border-left:none; border-right:none; border-top:none; vertical-align:bottom; white-space:nowrap\"><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">&ldquo;Innovation and Entrepreneurship in Commerce and Management&rdquo;&nbsp;</span></span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_category`
--

CREATE TABLE `tbl_team_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team_category`
--

INSERT INTO `tbl_team_category` (`cat_id`, `cat_parent_id`, `cat_name`, `cat_description`, `cat_image`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `recordListingID`, `slug`) VALUES
(1, 0, 'Teaching', NULL, '', 'Teaching', 'Teaching', 'Teaching', NULL, 'Teaching'),
(2, 0, 'Non-teaching', NULL, '', 'Non-teaching', 'Non-teaching', 'Non-teaching', NULL, 'Non-teaching'),
(3, 2, 'Registrar', NULL, '', 'Registrar', 'Registrar', 'Registrar', NULL, 'Registrar'),
(4, 2, 'Accounts', NULL, '', 'Accounts', 'Accounts', 'Accounts', NULL, 'Accounts'),
(5, 2, 'Human Resource', NULL, '', 'Human Resource', 'Human Resource', 'Human Resource', NULL, 'Human Resource '),
(6, 2, 'Examination', NULL, '', 'Examination', 'Examination', 'Examination', NULL, 'Examination'),
(7, 1, 'Commerce', NULL, '', 'Commerce', 'Commerce', 'Commerce', NULL, 'Commerce'),
(8, 7, 'BCOM', NULL, '', 'BCOM', 'BCOM', 'BCOM', NULL, 'BCOM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT '0',
  `test_image` longtext,
  `test_video` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(500) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `desc_vendor` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` int(100) NOT NULL,
  `video_name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `cat_id` varchar(1000) NOT NULL,
  `recordListingID` int(11) NOT NULL DEFAULT '0',
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `video_url` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_category`
--

CREATE TABLE `tbl_video_category` (
  `cat_id` int(100) NOT NULL,
  `cat_parent_id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` longtext,
  `cat_image` longtext NOT NULL,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(2000) NOT NULL,
  `meta_tag_keywords` varchar(1000) NOT NULL,
  `recordListingID` int(11) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_addmore`
--
ALTER TABLE `tbl_addmore`
  ADD PRIMARY KEY (`addmore_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `tbl_blogcategory`
--
ALTER TABLE `tbl_blogcategory`
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `tbl_career_info`
--
ALTER TABLE `tbl_career_info`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_category_user`
--
ALTER TABLE `tbl_category_user`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_company_meet`
--
ALTER TABLE `tbl_company_meet`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_contactdetails`
--
ALTER TABLE `tbl_contactdetails`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_dmenu`
--
ALTER TABLE `tbl_dmenu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `tbl_downloadcategory`
--
ALTER TABLE `tbl_downloadcategory`
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_favicon`
--
ALTER TABLE `tbl_favicon`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `gallery_id` (`gallery_id`);

--
-- Indexes for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_newsletter_emails`
--
ALTER TABLE `tbl_newsletter_emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `product_id` (`project_id`);

--
-- Indexes for table `tbl_project_category`
--
ALTER TABLE `tbl_project_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tbl_team_category`
--
ALTER TABLE `tbl_team_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `tbl_video_category`
--
ALTER TABLE `tbl_video_category`
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_addmore`
--
ALTER TABLE `tbl_addmore`
  MODIFY `addmore_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blogcategory`
--
ALTER TABLE `tbl_blogcategory`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_career_info`
--
ALTER TABLE `tbl_career_info`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category_user`
--
ALTER TABLE `tbl_category_user`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_meet`
--
ALTER TABLE `tbl_company_meet`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contactdetails`
--
ALTER TABLE `tbl_contactdetails`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dmenu`
--
ALTER TABLE `tbl_dmenu`
  MODIFY `menu_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `download_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_downloadcategory`
--
ALTER TABLE `tbl_downloadcategory`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_favicon`
--
ALTER TABLE `tbl_favicon`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_newsletter_emails`
--
ALTER TABLE `tbl_newsletter_emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project_category`
--
ALTER TABLE `tbl_project_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_team_category`
--
ALTER TABLE `tbl_team_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video_category`
--
ALTER TABLE `tbl_video_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
