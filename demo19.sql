-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 05:16 PM
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
-- Database: `demo19`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `subtitle` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `button` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `seo`, `subtitle`, `img`, `button`, `link`, `status`) VALUES
(4, 'banner', 'banner', '', '1598351058.jpg', '', '', 1),
(5, 'banner', 'banner', '', '1598351067.jpg', '', '', 1),
(6, 'banner', 'banner', '', '1598351073.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `category` int(5) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `seo`, `category`, `body`, `img`, `dt`, `status`) VALUES
(1, 'Test', 'test', 1, '<p>Test</p>\r\n', '1577877324.png', '26-01-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`id`, `title`, `seo`, `status`) VALUES
(1, 'Category 1', 'category-1', 1),
(2, 'Category 2', 'category-2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE `blogcomment` (
  `id` int(12) NOT NULL,
  `user` varchar(100) NOT NULL,
  `blog` int(15) DEFAULT NULL,
  `email` varchar(110) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `dt` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) NOT NULL,
  `fname` varchar(222) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `dt` varchar(222) NOT NULL,
  `dt_from` varchar(200) NOT NULL,
  `dt_to` varchar(222) NOT NULL,
  `night` int(5) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `email` varchar(256) NOT NULL,
  `city` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `msg` text NOT NULL,
  `price` varchar(222) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `total` varchar(222) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `payment_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_id`, `fname`, `lname`, `dt`, `dt_from`, `dt_to`, `night`, `phone`, `email`, `city`, `country`, `msg`, `price`, `tax`, `total`, `payment_id`, `payment_status`) VALUES
(2, '7181858211', 'A Das', '', '25-09-2019', 'Wed Sep 25 2019', 'Sat Sep 28 2019', 3, '7688990000', 'admin@gmail.com', '', 'India', '', '3200', '384', '3584', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdate_temp`
--

CREATE TABLE `bookingdate_temp` (
  `id` int(5) NOT NULL,
  `dt_from` varchar(200) NOT NULL,
  `dt_to` varchar(200) NOT NULL,
  `day` int(5) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(5) NOT NULL,
  `package` int(5) NOT NULL,
  `night` int(5) NOT NULL,
  `adult` int(5) NOT NULL,
  `child` int(5) NOT NULL,
  `baby` int(5) NOT NULL,
  `price` varchar(200) NOT NULL,
  `b_id` int(5) NOT NULL,
  `dt_from_sec` varchar(200) NOT NULL,
  `dt_to_sec` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `package`, `night`, `adult`, `child`, `baby`, `price`, `b_id`, `dt_from_sec`, `dt_to_sec`) VALUES
(1, 1, 0, 1, 0, 0, '1600', 2, '1569362400', '1569621600'),
(2, 1, 0, 2, 1, 0, '1600', 2, '1569362400', '1569621600');

-- --------------------------------------------------------

--
-- Table structure for table `booking_temp`
--

CREATE TABLE `booking_temp` (
  `id` int(5) NOT NULL,
  `package` int(5) NOT NULL,
  `type` int(5) NOT NULL COMMENT '0=non ac, 1=ac',
  `night` int(5) NOT NULL,
  `adult` int(5) NOT NULL,
  `child` int(5) NOT NULL,
  `baby` int(5) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dt_from_sec` varchar(200) NOT NULL,
  `dt_to_sec` varchar(222) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `parent` int(100) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `seo`, `parent`, `status`) VALUES
(4, 'Category 1', 'categoery-1', 0, 1),
(5, 'Category 2', 'categoery-2', 0, 1),
(6, 'Category 3', 'categoery-3', 0, 1),
(7, 'Sub-Categoery1', 'sub-categoery1', 4, 1),
(8, 'Sub-Categoery 2', 'sub-categoery-2', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(12) NOT NULL,
  `seo` varchar(250) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `metakey` varchar(200) NOT NULL,
  `metatag` text NOT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8 NOT NULL,
  `banner` varchar(200) NOT NULL,
  `parent` int(5) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(256) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `seo`, `title`, `metakey`, `metatag`, `subtitle`, `banner`, `parent`, `body`, `img`, `status`) VALUES
(13, 'learn-at-your-place-!', 'LEARN AT YOUR PLACE !', '', '', '', '', 0, '<ul>\r\n	<li>Select a course of your choice !</li>\r\n	<li>Enquire and get to know more about it !</li>\r\n	<li>Enroll and get started with learning !</li>\r\n</ul>\r\n', '1598359915.png', 1),
(14, 'we-are-in-the-business-of-hosting-great-ideas.', 'We are in the business of hosting great ideas.', '', '', '', '', 0, '<p>Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clita ponderum ne duo, simul appellantur reprehendunt mea an. An gloriatur vulputate eos, an sed fuisset vituperatoribus, tation tritani prodesset ex sed. Impedit torquatos sed ad, vel ad placerat necessitatibus, in quo inani eligendi.</p>\r\n\r\n<p>Cum copiosae pertinacia ei, admodum volumus cum ut, erat nonumy his te. Iudico praesent sed id, nam error consequat reprehendunt no. Nostrud nostrum tacimates mei ut, debet facilisi in ius, dolor accusam omittam eu sea. His harum verterem ocurreret ei.</p>\r\n', '1598353614.jpg', 1),
(15, 'why-choose-us?', 'Why choose us?', '', '', '', '', 0, '<h4>Mission</h4>\r\n\r\n<p>Cum copiosae pertinacia ei, admodum volumus cum ut, erat nonumy his te. Iudico praesent sed id, nam error consequat reprehendunt no. Nostrud nostrum tacimates mei ut, debet facilisi in ius, dolor accusam omittam eu sea. His harum verterem ocurreret ei.</p>\r\n\r\n<h4>Vision</h4>\r\n\r\n<p>An per ancillae concludaturque, senserit rationibus referrentur ne pro, ius omnis complectitur ex. Per ut vocibus contentiones. Oporteat vituperata ut nec, an dicit accusamus definiebas est, ne vix mentitum luptatum. Duo in wisi justo aperiam. Reprimique consectetuer pro ea, civibus commune oportere pri id.</p>\r\n\r\n<h4>Guaranteed Job</h4>\r\n\r\n<p>Impedit epicurei intellegam an eos, id fierent consequat definitiones est. Ne his primis invenire. Ea fugit tantas noster vis, scripta ornatus voluptua quo an. Nusquam salutatus duo ei, semper maiorum eu mea.</p>\r\n', '1598353634.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(12) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=contact,1=nquery',
  `item` int(5) NOT NULL,
  `enq_date` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `type`, `item`, `enq_date`) VALUES
(1, 'sourav', 'friendsourav97@gmail.com', '9903304214', 'problem', 'big problem', 1, 0, '11.22.2019'),
(2, 'sourav', 'friendsourav97@gmail.com', '09903304214', 'problem', 'bnb', 0, 0, '25-08-2020'),
(3, 'sourav', 'friendsourav97@gmail.com', '09903304214', '', 'Core Java Programming', 0, 0, '25-08-2020'),
(4, 'sourav', 'friendsourav97@gmail.com', '09903304214', '', 'Core Java Programming', 0, 0, '25-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `seo` varchar(200) NOT NULL,
  `category` int(5) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `link`, `seo`, `category`, `body`, `img`, `dt`, `status`) VALUES
(1, 'Core Java Programming', '', 'core-java-programming', 1, '<h3>Training Details</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, ius minim gubergren ad. At mei sumo sonet audiam, ad mutat elitr platonem vix. Ne nisl idque fierent vix. Ferri clita ponderum ne duo, simul appellantur reprehendunt mea an. An gloriatur vulputate eos, an sed fuisset vituperatoribus, tation tritani prodesset ex sed. Impedit torquatos sed ad, vel ad placerat necessitatibus, in quo inani eligendi.</p>\r\n\r\n<h3>About Online Android Training &amp; Placement Course :</h3>\r\n\r\n<p>Cum copiosae pertinacia ei, admodum volumus cum ut, erat nonumy his te. Iudico praesent sed id, nam error consequat reprehendunt no. Nostrud nostrum tacimates mei ut, debet facilisi in ius, dolor accusam omittam eu sea. His harum verterem ocurreret ei.</p>\r\n', '1598354752.jpg', '', 1),
(2, 'Asp. Net Programming', '', 'asp.-net-programming', 1, '<p>To provide you with the knowledge and skill-set specific to Asp. Net Programming .</p>\r\n', '1598355455.jpg', '', 1),
(3, 'Data Structures with C Programming', '', 'data-structures-with-c-programming', 3, '<p>To provide you with the knowledge and skill-set specific to Data Structures with C.</p>\r\n', '1598355482.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursecategory`
--

CREATE TABLE `coursecategory` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursecategory`
--

INSERT INTO `coursecategory` (`id`, `title`, `seo`, `status`) VALUES
(1, 'IT & Software', 'itsoftware', 1),
(2, 'Electrical Engineering', 'electrical-engineering', 1),
(3, 'Civil Engineering', 'civil-engineering', 1),
(4, 'Clinical Research', 'clinical-research', 1),
(5, 'Mechanical Engineering', 'mechanical-engineering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_feature`
--

CREATE TABLE `course_feature` (
  `id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_value` text NOT NULL,
  `c_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_feature`
--

INSERT INTO `course_feature` (`id`, `c_id`, `c_name`, `c_value`, `c_title`) VALUES
(1, 1, 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', ''),
(2, 1, 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', ''),
(3, 1, 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `seo`, `body`, `status`) VALUES
(1, 'Smoke Sensor', 'smoke-sensor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0),
(2, 'ceodscd', 'ceo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.ccCsdc</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `seo`, `img`, `status`) VALUES
(2, 'lorem ipsumaa', 'lorem-ipsum', '1575457732.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_feature`
--

CREATE TABLE `hotel_feature` (
  `id` int(5) NOT NULL,
  `p_title` varchar(250) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_feature` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_feature`
--

INSERT INTO `hotel_feature` (`id`, `p_title`, `p_id`, `p_feature`) VALUES
(3, '', 1, 'Free Parking'),
(4, '', 1, 'Front Desk 24 Hours'),
(5, '', 1, 'Room Service 24 hours'),
(6, '', 1, 'Medical');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallery`
--

CREATE TABLE `hotel_gallery` (
  `id` int(5) NOT NULL,
  `p_title` varchar(250) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `p_title`, `p_id`, `p_img`) VALUES
(1, '', 1, '1550318087hotel_a.jpg'),
(3, '', 1, '1550318087hotel_c.jpg'),
(5, '', 1, '1550318601hotel_b.jpg'),
(6, '', 1, '1550318601hotel_a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(5) NOT NULL,
  `item` varchar(50) NOT NULL,
  `order` int(5) NOT NULL,
  `forr` int(5) NOT NULL COMMENT '0=Admin,1=Front'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_management`
--

CREATE TABLE `menu_management` (
  `id` int(5) NOT NULL,
  `menu_name` int(5) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `orderr` int(5) NOT NULL,
  `sub` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_management`
--

INSERT INTO `menu_management` (`id`, `menu_name`, `title`, `orderr`, `sub`) VALUES
(175, 3, 'Contact Us', 3, 0),
(174, 3, 'Testimonial', 2, 0),
(173, 3, 'News', 1, 0),
(172, 2, 'cms_9', 4, 0),
(171, 2, 'cms_8', 3, 0),
(170, 2, 'Gallery', 2, 0),
(169, 2, 'Home', 1, 0),
(290, 1, 'Gallery', 6, 0),
(289, 1, 'Product', 5, 0),
(288, 1, 'News', 7, 0),
(287, 1, 'Home', 1, 0),
(305, 7, 'a_logout', 1, 0),
(304, 7, 'a_changepassword', 1, 0),
(303, 7, 'a_members', 1, 0),
(302, 7, 'a_banner', 1, 0),
(301, 7, 'a_media', 1, 0),
(300, 7, 'a_enquiry', 1, 0),
(299, 7, 'a_cms', 1, 0),
(298, 7, 'a_menu', 1, 0),
(297, 7, 'a_site_details', 1, 0),
(296, 7, 'a_dashboard', 1, 0),
(291, 1, 'Contact Us', 9, 0),
(292, 1, 'Blog', 8, 0),
(293, 1, 'cms_9', 2, 0),
(294, 1, 'cms_11', 3, 0),
(295, 1, 'cms_12', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `seo`, `body`, `img`, `dt`, `status`) VALUES
(3, 'lorem ipsumaa', 'lorem-ipsum', '<p>The is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).aa</p>\r\n', '1575462698.jpg', '08-01-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `typ` int(4) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`id`, `title`, `seo`, `typ`, `status`) VALUES
(1, 'Home', 'home', 0, 1),
(2, 'News', 'news', 0, 1),
(3, 'Testimonial', 'testimonial', 0, 1),
(4, 'Product', 'product', 1, 1),
(5, 'Gallery', 'gallery', 0, 1),
(6, 'Trips', 'trips', 1, 1),
(7, 'Contact Us', 'contact-us', 0, 1),
(8, 'Blog', 'blog', 1, 1),
(9, 'FAQ', 'faq', 0, 1),
(14, 'WHY JOIN US', 'whyjoinus', 1, 1),
(15, 'Course', 'course', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `metakey` varchar(200) NOT NULL,
  `metatag` text NOT NULL,
  `seo` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `body` text,
  `img` varchar(256) DEFAULT NULL,
  `isfeatured` int(5) NOT NULL,
  `dt` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `metakey`, `metatag`, `seo`, `category`, `body`, `img`, `isfeatured`, `dt`, `status`) VALUES
(8, 'Smoke Sensor', 'Lorem ipsum', 'Lorem ipsum dolor sit amet', 'smoke-sensor', '-4-7-', '<p>Tnd a search for lorem ipsum&nbsp;will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>\r\n', '1585228904.jpg', 0, '06-12-19 10:52:40AM', 1),
(9, 'aaaaa', '', '', 'aaaaa', '', '<p>aaa</p>\r\n', '1576671946.jpeg', 1, '18-12-19 12:25:46PM', 1),
(10, 'Abstract', '', '', 'abstract', '-4-5-7-8-', '<p>aaa</p>\r\n', '1576780458.png', 1, '19-12-19 06:34:18PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(100) NOT NULL,
  `category` int(100) NOT NULL,
  `p_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category`, `p_id`) VALUES
(7, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `id` int(12) NOT NULL,
  `p_title` varchar(250) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_feature` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(12) NOT NULL,
  `p_title` varchar(250) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `id` int(12) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tagline` varchar(256) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email_footer` varchar(256) NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `about` text NOT NULL,
  `fb` varchar(250) NOT NULL,
  `tw` varchar(250) NOT NULL,
  `yt` varchar(250) NOT NULL,
  `wa` varchar(100) NOT NULL,
  `insta` varchar(200) NOT NULL,
  `app` text NOT NULL,
  `sms_key` varchar(200) NOT NULL,
  `sms_sender` varchar(100) NOT NULL,
  `api_key` varchar(200) NOT NULL,
  `secret_key` varchar(200) NOT NULL,
  `oth` varchar(256) NOT NULL,
  `google_analytics` varchar(200) NOT NULL,
  `facebook_pixal` varchar(200) NOT NULL,
  `live_chat` varchar(200) NOT NULL,
  `other_link` varchar(200) NOT NULL,
  `prn` varchar(50) NOT NULL,
  `lnkd` varchar(50) NOT NULL,
  `fav` varchar(100) NOT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`id`, `title`, `tagline`, `email`, `email_footer`, `phone`, `address`, `about`, `fb`, `tw`, `yt`, `wa`, `insta`, `app`, `sms_key`, `sms_sender`, `api_key`, `secret_key`, `oth`, `google_analytics`, `facebook_pixal`, `live_chat`, `other_link`, `prn`, `lnkd`, `fav`, `logo`) VALUES
(1, 'Demo', 'Demo19', 'friendsourav97@gmail.com', 'friendsourav97@gmail.com', '+91-0123456789', ' Abc Road, sample place, demo place', 'Demo is a leading training and career development company.With experience more than 15 years, Demo has focused on training engineers in IT, Mechanical, Electrical and Clinical Research.\r\n\r\nWe look forward to add value and augment their success and in the process, become one of the prime technological institution/university.', '#', '#', '', '#', '#', '#', '#', '#', '29b34070bf5867b7d36bf2586c4f4855', '40d161c14f252cc781066e0c685f5f4d', '#', '', '', '', '', '', '', '1598350960f.ico', '1598350944l.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `seo`, `designation`, `body`, `img`, `status`) VALUES
(2, 'Someone famous', 'someone-famous', 'none', '<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>\r\n', '1598353390.jpg', 1),
(3, 'Someone famous', 'lorem-ipsum-dolor-sit-amet,-consectetur-adipiscing-elit.-etiam-auctor-nec-lacus-ut-tempor.-mauris.', 'none', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>\r\n', '1598353416.jpg', 1),
(4, 'Someone famous', 'someone-famous', 'none', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>\r\n', '1598353437.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seo` varchar(256) NOT NULL,
  `category` varchar(200) DEFAULT NULL,
  `trip_type` int(5) NOT NULL,
  `descc` text,
  `forr` varchar(100) NOT NULL,
  `pr` varchar(100) NOT NULL,
  `pnt` varchar(100) NOT NULL,
  `s_dt` varchar(100) NOT NULL,
  `e_dt` varchar(100) NOT NULL,
  `terms` text NOT NULL,
  `policy` text NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  `dt` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `seo`, `category`, `trip_type`, `descc`, `forr`, `pr`, `pnt`, `s_dt`, `e_dt`, `terms`, `policy`, `img`, `dt`, `status`) VALUES
(1, 'Sumatra, Indonesia Bird Photography Tour', 'sumatra-indonesia-bird-photography-tour', '2', 0, 'The island is home to 201 mammal species and 580 bird species, such as the Sumatran ground cuckoo. There are 9 endemic mammal species on mainland Sumatra and 14 more endemic to the nearby Mentawai Islands.There are about 300 freshwater fish species in Sumatra. There are 93 amphibian species in Sumatra, 21 of which are endemic to Sumatra.<br><br> The Sumatran tiger, Sumatran rhinoceros, Sumatran elephant, Sumatran ground cuckoo, and Sumatran orangutan are all critically endangered, indicating the highest level of threat to their survival. In October 2008, the Indonesian government announced a plan to protect Sumatra@@@s remaining forests.<br><br> The island includes more than 10 national parks, including 3 which are listed as the Tropical Rainforest Heritage of Sumatra World Heritage Site ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ Gunung Leuser National Park, Kerinci Seblat National Park and Bukit Barisan Selatan National Park. The Berbak National Park is one of three national parks in Indonesia listed as a wetland of international importance under the Ramsar Convention.', '7 Days', 'USD 1530', 'Padang Airport (Minangkabau International Airport)', 'Starting 16 July 2019', '16 to 23 July 2019', 'Cost:USD 1530 per person\r\nPayments and Cancellation Policy:\r\n\r\nPayments Policies:\r\n\r\n    Please Pay 25% of the Trip Cost During the Booking\r\n    Please Pay 50% befor', 'Payments Policies:\r\n\r\n    Please Pay 25% of the Trip Cost During the Booking\r\n    Please Pay 50% before the 4 months of the Trip\r\n    Please Pay the rest/remainin', '1561458939f.jpg', '25-06-2019', 1),
(5, 'dd', 'dd', '1', 1, '<p>aaa</p>\r\n', '', '1000', '', '', '', '', '', '', '27-12-2019', 1),
(6, 'Test', 'test', '1', 1, '<p>aaa</p>\r\n', '3', '999', 'Garia-Patuli', '1st Jan,2020', '3', 'aa', 'aa', '1577613297f.jpg', '29-12-2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_cancel_policy`
--

CREATE TABLE `trip_cancel_policy` (
  `id` int(5) NOT NULL,
  `cancel_title` varchar(250) NOT NULL,
  `t_id` int(11) NOT NULL,
  `cancel_policy` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_cancel_policy`
--

INSERT INTO `trip_cancel_policy` (`id`, `cancel_title`, `t_id`, `cancel_policy`) VALUES
(22, '', 5, 'c'),
(21, '', 5, 'b'),
(20, '', 5, 'a'),
(23, '', 5, 'd'),
(24, '', 5, 'a'),
(25, '', 5, 'b'),
(26, '', 5, 'a'),
(27, '', 5, 'b'),
(28, '', 5, 'aa'),
(29, '', 5, 'b'),
(30, '', 5, 'a'),
(31, '', 5, 'b'),
(32, '', 6, 'a'),
(33, '', 6, 'b'),
(35, '', 6, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `trip_category`
--

CREATE TABLE `trip_category` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_category`
--

INSERT INTO `trip_category` (`id`, `title`, `seo`, `status`) VALUES
(1, 'Winter Tour', 'seasonal-tour', 1),
(2, 'Summer Tour', 'summer-tour', 1),
(3, 'Office Tour', 'office-tour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_feature`
--

CREATE TABLE `trip_feature` (
  `id` int(5) NOT NULL,
  `itinerary_title` varchar(250) NOT NULL,
  `t_id` int(11) NOT NULL,
  `itinerary_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `itinerary_value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_feature`
--

INSERT INTO `trip_feature` (`id`, `itinerary_title`, `t_id`, `itinerary_name`, `itinerary_value`) VALUES
(5, '', 5, 'a', 'b'),
(6, '', 5, 'c', 'd'),
(7, '', 5, 'a', 'b'),
(8, '', 5, 'h', 'j'),
(9, '', 5, '', ''),
(10, '', 5, '', ''),
(11, '', 5, '', ''),
(12, '', 6, 'a', 'b'),
(14, '', 6, 'e', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `trip_gallery`
--

CREATE TABLE `trip_gallery` (
  `id` int(5) NOT NULL,
  `t_title` varchar(250) NOT NULL,
  `t_id` int(11) NOT NULL,
  `t_img` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_gallery`
--

INSERT INTO `trip_gallery` (`id`, `t_title`, `t_id`, `t_img`) VALUES
(2, '', 5, '1577471191_inactv.png'),
(4, '', 6, '1577613297_rrr.jpg'),
(5, '', 6, '1577613297_blog-04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trip_pay_policy`
--

CREATE TABLE `trip_pay_policy` (
  `id` int(5) NOT NULL,
  `pay_title` varchar(250) NOT NULL,
  `t_id` int(11) NOT NULL,
  `t_policy` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_pay_policy`
--

INSERT INTO `trip_pay_policy` (`id`, `pay_title`, `t_id`, `t_policy`) VALUES
(2, '', 3, ''),
(3, '', 4, ''),
(29, '', 5, 'a'),
(28, '', 5, 'b'),
(27, '', 5, 'c'),
(26, '', 5, 'd'),
(30, '', 5, 'c'),
(40, '', 5, 'aa'),
(32, '', 5, 'y'),
(33, '', 5, 'u'),
(34, '', 5, 'c'),
(35, '', 5, 'd'),
(36, '', 6, 'a'),
(37, '', 6, 'b'),
(39, '', 6, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `trip_type`
--

CREATE TABLE `trip_type` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_type`
--

INSERT INTO `trip_type` (`id`, `title`, `seo`, `status`) VALUES
(1, 'North East Tour', 'index-banner-1', 1),
(2, 'South Indian Tour', 'south-indian-tour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `seo` varchar(250) NOT NULL,
  `img` varchar(200) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `user_level` int(11) NOT NULL COMMENT '1=Admin,2=Affiliate,3=Franchise,0=Cust',
  `dt` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fname`, `lname`, `address`, `seo`, `img`, `phone`, `city`, `state`, `pin`, `user_level`, `dt`, `status`) VALUES
(1, 'admin', 'admin', 'development.preconet@gmail.com', 'Preconet', '', '', '', '', '+91 9876543210', '', '', '', 1, '', 1),
(6, 'subadmin', 'subadmin', 'amit@gmail.com', 'Amit M', '', 'Garia', '', '', '9903304214', 'baruipur', 'west bengala', '700144', 2, '', 1),
(8, 'test', 'test', 'test@gmail.com', 'Sourav Naskar', '', 'Patuli', '', '', '9903304214', 'Kolkata', 'WB', '700144', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `whyjoinus`
--

CREATE TABLE `whyjoinus` (
  `id` int(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seo` varchar(200) NOT NULL,
  `category` int(5) NOT NULL,
  `body` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whyjoinus`
--

INSERT INTO `whyjoinus` (`id`, `title`, `seo`, `category`, `body`, `img`, `dt`, `status`) VALUES
(1, 'Unlimited Placement Calls', 'unlimited-placement-calls', 0, '<p>Get the limitless interview calls till the time you won&#39;t get placed.</p>\r\n', '', '', 1),
(2, 'Job Aimed Training With Success Guarantee', 'job-aimed-training-with-success-guarantee', 0, '<p>We provide worldclass training programmes with a 100% successful placement guarantee.</p>\r\n', '', '', 1),
(3, 'Tie-up with 500 Plus Clients', 'tie-up-with-500-plus-clients', 0, '<p>We are associated with 500 Plus MNC and MLC companies of various domains across the globe</p>\r\n', '', '', 1),
(4, 'Learn From Industry Experts', 'learn-from-industry-experts', 0, '<p>Get the world class training from our Industry Expert with the Corporate Environment.</p>\r\n', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `whyjoinuscategory`
--

CREATE TABLE `whyjoinuscategory` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `seo` varchar(100) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingdate_temp`
--
ALTER TABLE `bookingdate_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_temp`
--
ALTER TABLE `booking_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursecategory`
--
ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_feature`
--
ALTER TABLE `course_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_feature`
--
ALTER TABLE `hotel_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_management`
--
ALTER TABLE `menu_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_cancel_policy`
--
ALTER TABLE `trip_cancel_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_category`
--
ALTER TABLE `trip_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_feature`
--
ALTER TABLE `trip_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_pay_policy`
--
ALTER TABLE `trip_pay_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_type`
--
ALTER TABLE `trip_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyjoinus`
--
ALTER TABLE `whyjoinus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whyjoinuscategory`
--
ALTER TABLE `whyjoinuscategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingdate_temp`
--
ALTER TABLE `bookingdate_temp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_temp`
--
ALTER TABLE `booking_temp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coursecategory`
--
ALTER TABLE `coursecategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_feature`
--
ALTER TABLE `course_feature`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel_feature`
--
ALTER TABLE `hotel_feature`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_management`
--
ALTER TABLE `menu_management`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip_cancel_policy`
--
ALTER TABLE `trip_cancel_policy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip_feature`
--
ALTER TABLE `trip_feature`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trip_pay_policy`
--
ALTER TABLE `trip_pay_policy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `trip_type`
--
ALTER TABLE `trip_type`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `whyjoinus`
--
ALTER TABLE `whyjoinus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `whyjoinuscategory`
--
ALTER TABLE `whyjoinuscategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
