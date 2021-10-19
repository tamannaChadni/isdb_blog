-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 10:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isdb_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Programming'),
(2, 'Politics'),
(3, 'Language'),
(4, 'Literature'),
(5, 'Philosophy'),
(6, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(9, 'keya', 'koli', 'koli@gmail.com', 'it is so nice', 1, '2021-10-14 14:56:19'),
(10, 'jeba', 'jui', 'jui@gmail.com', 'notun notun ktha', 1, '2021-10-14 14:56:48'),
(11, 'hena', 'mou', 'mou@gmail.com', 'mou is ggoooogggg', 1, '2021-10-14 15:23:06'),
(12, 'Bertha', 'Taft', 'tasnim001it@gmail.com', 'hi l like u', 0, '2021-10-14 19:51:38'),
(13, 'Bertha', 'Taft', 'tasnim001it@gmail.com', 'hi l like u', 0, '2021-10-14 19:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(11, 'Privacy policy & terms', '<p><span>You can use our services in a variety of ways to manage your privacy. For example, you can sign up for a Google Account if you want to create and manage content like emails and photos, or see more relevant search results. And you can use many Goo'),
(12, 'Activities', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam molestie tortor at ante pellentesque egestas. Suspendisse elementum dapibus quam, vel posuere mauris mattis eu. Duis condimentum elit a tortor pharetra, in rutrum purus gravida. Integer tel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat_id`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 1, 'The future of World', '<p><span>Programming is&nbsp;</span><strong>the process of creating a set of instructions that tell a computer how to perform a task</strong><span>. Programming can be done using a variety of computer programming languages, such as JavaScript, Python, and C++.</span><span>Computer&nbsp;</span><span>programming</span><span>&nbsp;is the process that professionals use to write code that instructs how a computer, application or software program performs.</span><span>In general, the&nbsp;</span><span>programmer\'s</span><span>&nbsp;job is to convert problem solutions into instructions for the computer.</span></p>\r\n<p>Graduates entering an ever-more-competitive job market are often unaware of the skills and values they offer employers. The challenge is greater with emerging job roles that require certifications and both multidisciplinary skills and specialist knowledge, even for entry-level positions.</p>\r\n<p>We seek to empower our graduates and maximise their career prospects. New research has enabled us to harness the power of artificial intelligence for a custom-designed course planning and recommendation system for students based on the skills their desired jobs actually require. We named these curriculum delivery models JobFit and ModuLearn.</p>', 'upload/0e7940df8d.png', 'Admin', 'programming, html', '2021-10-15 15:04:10'),
(2, 1, ' Working with Objects in Java', '<p>When you write a Java program, you define a set of classes. As you learned during Day 1, &ldquo;Getting Started with Java,&rdquo; a class is a template used to create one or more objects. These objects, which also are called&nbsp;<em>instances</em>, are self-contained elements of a program with related features and data. For the most part, you use the class merely to create instances and then work with those instances. In this section, you learn how to create a new object from any given class.</p>\r\n<p>When using strings during Day 2, &ldquo;The ABCs of Programming,&rdquo; you learned that a string literal (a series of characters enclosed in double quotation marks) can be used to create a new instance of the class&nbsp;<tt>String</tt>&nbsp;with the value of that string.</p>\r\n<p>The&nbsp;<tt>String</tt>&nbsp;class is unusual in that respect. Although it&rsquo;s a class, it can be assigned a value with a literal as if it was a primitive data type. This shortcut is available only for strings and classes that represent primitive data types, such as&nbsp;<tt>Integer</tt>&nbsp;and&nbsp;<tt>Double</tt>. To create instances for all other classes, the&nbsp;<tt>new</tt>&nbsp;operator is used.</p>', 'upload/720d2f3c2e.png', 'Admin', 'java, software', '2021-10-15 15:05:44'),
(3, 1, 'Efficient Windows PowerShell Administration with WMI and CIM', '<p>Let\'s imagine that you and I started a business manufacturing and selling network interface cards (NICs). Industry standards would be pretty important to us, right? How could we make it easier for our Ethernet NICs to work natively with systems based on, say, Windows, Linux, and OS X? What about compatibility with different network architectures, protocols, and client/server applications? (Whoa&mdash;I\'m glad we don\'t really need to worry about&nbsp;<em>that</em>&nbsp;particular set of problems!)</p>\r\n<p>Windows systems administrators rely on several&nbsp;<a href=\"http://www.dmtf.org/\">Distributed Management Task Force</a>&nbsp;(DMTF) industry standards to make our lives easier. The DMTF is an industry consortium whose membership includes major computer hardware and software manufacturers. Their goal is to agree on standards so their products work together as seamlessly as possible.</p>\r\n<p>In this article, we\'ll look at how to apply a couple of key DMTF standards to help us be more effective with Windows PowerShell&ndash;based systems administration.</p>', 'upload/dfc59e0226.jpg', 'Admin', 'c#, microsoft', '2021-10-15 15:07:11'),
(4, 2, 'president can name  A commission formed to study potential changes to the Supreme Court', '<div class=\"wDYxhc\" lang=\"en-BD\" data-md=\"61\">\r\n<div class=\"LGOjhe\" data-attrid=\"wa:/description\" data-hveid=\"CAYQAA\"><span class=\"ILfuVd\"><span class=\"hgKElc\">Politics (from Greek: &Pi;&omicron;&lambda;&iota;&tau;&iota;&kappa;ά, politik&aacute;, \'affairs of the cities\') is the set of activities that are associated with making decisions in groups, or other forms of power relations between individuals, such as the distribution of resources or status.</span></span></div>\r\n<div><span class=\"ILfuVd\"><span class=\"hgKElc\"><br /></span></span></div>\r\n</div>\r\n<div class=\"g\">\r\n<div data-hveid=\"CAMQAA\" data-ved=\"2ahUKEwiP_fLv2czzAhUG4jgGHaDBAVwQFSgAegQIAxAA\">&nbsp;<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit </span></div>\r\n</div>', 'upload/eaeb262d3f.jpg', 'Admin', 'politics, court', '2021-10-15 15:14:46'),
(5, 3, 'Language, a system of conventional spoken, manual (signed), or written symbols by means of which human beings express themselves.', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>&nbsp;</div>', 'upload/6c3a6ab6ba.jpg', 'Admin', 'language', '2021-10-15 15:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'A way to say what you\'re doing', 'Every language changes with time. Take a look at this list!', 'upload/e8d27bf05a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
