-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 10:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workstreet`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `listing_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(255) NOT NULL,
  `update_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `title`, `tags`, `description`, `created_by`, `created_at`, `updated_at`, `update_flg`) VALUES
(25, 'IT Manager', 'PHP, Javascript, Ajax', 'Nike, Inc. (/ˈnaɪki/ or /ˈnaɪk/)[note 1] is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. The company is headquartered near Beaverton, Oregon, in the Portland metropolitan area.[3] It is the world&#039;s largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment, with revenue in excess of US$37.4 billion in its fiscal year 2020 (ending May 31, 2020).[4] As of 2020, it employed 76,700 people worldwide.[5] In 2020 the brand alone was valued in excess of $32 billion, making it the most valuable brand among sports businesses.[6] Previously, in 2017, the Nike brand was valued at $29.6 billion.[7] Nike ranked 89th in the 2018 Fortune 500 list of the largest United States corporations by total revenue.', '3', '2022-07-18 06:29:17', '2022-07-18 08:34:39', 2),
(26, 'IT Supervisor', 'Python, Javascript, OOP', 'Nike, Inc. (/ˈnaɪki/ or /ˈnaɪk/)[note 1] is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services. The company is headquartered near Beaverton, Oregon, in the Portland metropolitan area.[3] It is the world&#039;s largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment, with revenue in excess of US$37.4 billion in its fiscal year 2020 (ending May 31, 2020).[4] As of 2020, it employed 76,700 people worldwide.[5] In 2020 the brand alone was valued in excess of $32 billion, making it the most valuable brand among sports businesses.[6] Previously, in 2017, the Nike brand was valued at $29.6 billion.[7] Nike ranked 89th in the 2018 Fortune 500 list of the largest United States corporations by total revenue.', '1', '2022-07-18 06:35:16', '2022-09-27 14:32:48', 2),
(27, 'Mobile App Developer', 'Java, Javascript, Kotlin', 'The company was founded on January 25, 1964, as &quot;Blue Ribbon Sports&quot;, by Bill Bowerman and Phil Knight, and officially became Nike, Inc. on May 30, 1971. The company takes its name from Nike, the Greek goddess of victory.[9] Nike markets its products under its own brand, as well as Nike Golf, Nike Pro, Nike+, Air Jordan, Nike Blazers, Air Force 1, Nike Dunk, Air Max, Foamposite, Nike Skateboarding, Nike CR7,[10] and subsidiaries including Jordan Brand and Converse. Nike also owned Bauer Hockey from 1995 to 2008, and previously owned Cole Haan, Umbro, and Hurley International.[11] In addition to manufacturing sportswear and equipment, the company operates retail stores under the Niketown name. Nike sponsors many high-profile athletes and sports teams around the world, with the highly recognized trademarks of &quot;Just Do It&quot; and the Swoosh logo.', '3', '2022-07-18 06:38:06', '2022-07-18 14:44:48', 1),
(30, 'Full Stack Web Developer', 'React.js, Node.js, MongoDB', 'The advantage of being a full stack web developer is:\r\nYou can master all the techniques involved in a development project.\r\nYou can make a prototype very rapidly.\r\nYou can provide help to all the team members.\r\nYou can reduce the cost of the project.\r\nYou can reduce the time used for team communication.\r\nYou can switch between front and back end development based on requirements.\r\nYou can better understand all aspects of new and upcoming technologies.', '6', '2022-07-18 07:13:13', '2022-07-18 15:31:26', 1),
(31, 'Junior System Developer', 'PHP, Java, Visual Basic', 'Fresh graduate of any 4-year Bachelor\'s or College Degree course and/or career shifters of any industry, provided that the applicant is willing to be trained and have interest in system development can apply.', '7', '2022-07-18 08:20:51', '2022-07-18 16:33:41', 1),
(32, 'Web Developer', 'HTML, CSS, Javascript', 'As a programmer, you will mainly be involved in WEB system development projects. * You will acquire skills and take on jobs according to your aptitude through programming training for about 3 months. * We will form a project team for development. * You can also aim to advance your career to SE in the future. * Both men and women are active. * For inexperienced people, there is a substantial trainee system.', '3', '2022-07-19 03:26:34', '2022-07-19 11:26:34', 1),
(33, 'Core PHP Developer', 'PHP, MySQL, OOP', 'A popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.', '9', '2022-07-19 05:25:01', '2022-07-19 13:25:01', 1),
(34, 'Software Developer', 'Laravel, React Js, Spring', 'I&#039;m building a website which includes a login page. I need to redirect the user to their profile page once they&#039;ve logged in successfully, but I don&#039;t know how to do that in PHP (It&#039;s my first site).\r\n\r\nI&#039;ve searched the internet and have been told that the header() function should do the trick, but it will only work if I haven&#039;t outputted any information before using it.', '3', '2022-09-23 01:30:41', '2022-09-26 13:25:51', 1),
(35, 'Senior Ajax Developer', 'PHP, Javascript, Ajax', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6', '2022-09-26 00:20:10', '2022-09-27 14:29:19', 1),
(36, 'Python Developers', 'Python, Django, Javascript', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '11', '2022-09-26 01:44:26', '2022-09-27 14:38:03', 2),
(37, 'test', 'test, test1, test2', 'sdasdasdasdsad', '1', '2022-09-27 07:19:32', '2022-09-27 15:19:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`listing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
