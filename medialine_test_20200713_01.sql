-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 01:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medialine_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'First news on the website', 'first-news-on-the-website', '1121Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta tempus risus, et ultricies ligula vehicula sit amet. Sed viverra suscipit libero, eget semper quam vehicula a. Sed sit amet finibus quam, sit amet viverra felis. Duis ornare libero ut massa semper vestibulum. Proin sodales, odio et scelerisque interdum, dolor nisi euismod nulla, vel aliquam arcu felis at dui. Donec vehicula enim vel consequat varius. Donec fringilla enim vitae nulla gravida laoreet. Quisque eget tellus eleifend, pellentesque erat ut, tempus orci. Sed vel libero mi. Pellentesque sagittis nibh vel ligula pretium, vel vestibulum libero placerat.', 7, 1594288710, 1594305881),
(3, 'Third news on the web', 'third-news-on-the-web', '1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros purus, iaculis in leo dapibus, molestie rutrum tortor. Phasellus tincidunt tellus non condimentum facilisis. Donec in pulvinar ipsum. In venenatis sit amet eros eget porttitor. Duis fringilla tortor sit amet mi placerat elementum. Sed eleifend tellus ac hendrerit efficitur. Nulla tristique, mauris in volutpat fermentum, massa sapien interdum augue, sed ultrices justo velit non urna. Cras a gravida eros. Fusce in scelerisque dui. Sed vel dui in nisi auctor eleifend quis et sapien.\r\n\r\nQuisque viverra eros in diam dictum fermentum vel eu velit. Nullam maximus metus id enim euismod, ut tempus nunc laoreet. Ut viverra finibus justo id scelerisque. Mauris tempor eros nec pulvinar placerat. In id mauris vestibulum, congue mi sit amet, tristique risus. Proin elementum in urna sed bibendum. Donec dapibus quam eget mi lobortis sollicitudin pellentesque ac massa. Sed sed commodo nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vitae orci vitae nisi vestibulum interdum. Donec interdum neque a interdum luctus. Nulla sed ex sem. Mauris feugiat neque risus. Aenean maximus aliquam feugiat.\r\n\r\nUt semper, purus a consectetur aliquet, dolor neque tincidunt nisl, sit amet scelerisque orci arcu eu risus. Nam eu turpis nisl. Nulla ut hendrerit ipsum. Sed nec libero ultricies, pretium lacus nec, condimentum nisi. Cras sit amet elementum mauris, et tempor mauris. Fusce sagittis, eros eu tincidunt feugiat, odio metus malesuada quam, at molestie leo quam nec libero. Phasellus a aliquam nisi, nec aliquam nulla. Phasellus in convallis erat, eget efficitur enim. Nunc id hendrerit risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer metus mi, fringilla in nisl at, scelerisque dictum orci. Quisque nec pharetra nulla. Phasellus viverra placerat odio ut dictum. Nam condimentum, nulla efficitur facilisis tincidunt, ligula nulla maximus neque, eu luctus est eros et nunc.\r\n\r\nIn ultrices magna vel libero maximus, eget consectetur lacus dictum. Sed convallis volutpat volutpat. Phasellus blandit a nisl vitae dictum. Quisque gravida sit amet ante non finibus. Quisque sem ligula, scelerisque sed interdum id, blandit id nulla. Nullam viverra dui urna, quis vulputate sem bibendum at. Maecenas massa quam, mollis eget lectus at, dignissim vulputate elit. Etiam pulvinar dolor ut pharetra hendrerit. In finibus nec ex a cursus. Suspendisse auctor, lectus eget cursus elementum, tortor leo hendrerit mi, ut placerat mi ligula a libero. Fusce augue nulla, convallis congue elit et, faucibus posuere urna. Vivamus dapibus fermentum velit a iaculis. Ut at mi nec ligula tempor auctor sed ut mauris. Nunc luctus magna et est rhoncus, vel eleifend enim tempus. Sed consectetur bibendum varius. Nam iaculis pretium lacinia.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros purus, iaculis in leo dapibus, molestie rutrum tortor. Phasellus tincidunt tellus non condimentum facilisis. Donec in pulvinar ipsum. In venenatis sit amet eros eget porttitor. Duis fringilla tortor sit amet mi placerat elementum. Sed eleifend tellus ac hendrerit efficitur. Nulla tristique, mauris in volutpat fermentum, massa sapien interdum augue, sed ultrices justo velit non urna. Cras a gravida eros. Fusce in scelerisque dui. Sed vel dui in nisi auctor eleifend quis et sapien.\r\n\r\nQuisque viverra eros in diam dictum fermentum vel eu velit. Nullam maximus metus id enim euismod, ut tempus nunc laoreet. Ut viverra finibus justo id scelerisque. Mauris tempor eros nec pulvinar placerat. In id mauris vestibulum, congue mi sit amet, tristique risus. Proin elementum in urna sed bibendum. Donec dapibus quam eget mi lobortis sollicitudin pellentesque ac massa. Sed sed commodo nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vitae orci vitae nisi vestibulum interdum. Donec interdum neque a interdum luctus. Nulla sed ex sem. Mauris feugiat neque risus. Aenean maximus aliquam feugiat.\r\n\r\nUt semper, purus a consectetur aliquet, dolor neque tincidunt nisl, sit amet scelerisque orci arcu eu risus. Nam eu turpis nisl. Nulla ut hendrerit ipsum. Sed nec libero ultricies, pretium lacus nec, condimentum nisi. Cras sit amet elementum mauris, et tempor mauris. Fusce sagittis, eros eu tincidunt feugiat, odio metus malesuada quam, at molestie leo quam nec libero. Phasellus a aliquam nisi, nec aliquam nulla. Phasellus in convallis erat, eget efficitur enim. Nunc id hendrerit risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer metus mi, fringilla in nisl at, scelerisque dictum orci. Quisque nec pharetra nulla. Phasellus viverra placerat odio ut dictum. Nam condimentum, nulla efficitur facilisis tincidunt, ligula nulla maximus neque, eu luctus est eros et nunc.\r\n\r\nIn ultrices magna vel libero maximus, eget consectetur lacus dictum. Sed convallis volutpat volutpat. Phasellus blandit a nisl vitae dictum. Quisque gravida sit amet ante non finibus. Quisque sem ligula, scelerisque sed interdum id, blandit id nulla. Nullam viverra dui urna, quis vulputate sem bibendum at. Maecenas massa quam, mollis eget lectus at, dignissim vulputate elit. Etiam pulvinar dolor ut pharetra hendrerit. In finibus nec ex a cursus. Suspendisse auctor, lectus eget cursus elementum, tortor leo hendrerit mi, ut placerat mi ligula a libero. Fusce augue nulla, convallis congue elit et, faucibus posuere urna. Vivamus dapibus fermentum velit a iaculis. Ut at mi nec ligula tempor auctor sed ut mauris. Nunc luctus magna et est rhoncus, vel eleifend enim tempus. Sed consectetur bibendum varius. Nam iaculis pretium lacinia.', 7, 1594291751, 1594295523),
(5, 'Mehdi Achour', 'mehdi-achour', 'In general you should switch all namespaces used from yii\\bootstrap to yii\\bootstrap4. If I’m not mistaken every old Bootstrap 3 class has its new version in Bootstrap 4 package so it should be enough but of course it’s always better to verify and look for those exceptional differences.', 7, 1594299514, 1594299514),
(7, 'Lorem Ipsum', 'lorem-ipsum', '1In et diam ac ipsum vehicula aliquet. Aliquam erat volutpat. Quisque interdum magna ut diam tincidunt semper sed vel turpis. Ut in dictum purus, eu faucibus mauris. Curabitur et diam non libero posuere elementum in eget ante. Integer felis tellus, maximus ut tortor vitae, posuere cursus neque. Cras molestie arcu sed eros tristique fermentum. Etiam dapibus congue nisl, nec suscipit arcu imperdiet eu. Integer gravida maximus dui eget rhoncus.', 8, 1594303022, 1594305495),
(8, 'Designing with Tailwind CSS', 'designing-with-tailwind-css', '123Designing with Tailwind CSS is a free video series that teaches you how to build fully responsive, professionally designed UIs from scratch using Tailwind CSS.\r\n\r\nTogether we’ll build Workcation, a property rental app loaded with interesting details that will help you master Tailwind in no time.', 8, 1594303102, 1594551662);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`category_id`, `article_id`) VALUES
(2, 1),
(2, 7),
(2, 8),
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `user_id`, `parent_id`, `description`, `updated_at`, `created_at`) VALUES
(2, 'Общество', 'obshchestvo', 8, 0, 'О́бщество, или социум — человеческая общность, специфику которой представляют отношения людей между собой, их формы взаимодействия и объединения.', 1594550745, 1594377033),
(3, 'Городская жизнь', 'gorodskaya-zhizn', 8, 2, 'Калинингра́д — город в России, административный центр Калининградской области, являющийся самым западным областным центром Российской Федерации[7]. До 4 июля 1946 года город имел название Кёнигсбе́рг (нем. Königsberg), ранее фигурировало название Короле́вец (польск. Królewiec); до 1255 года — Твангсте́ (прусск. Twangste, Tuwangste, Twānksta).', 1594379702, 1594377389),
(4, 'Выборы', 'vybory', 8, 2, 'Выборы — одна из наиболее распространённых форм участия людей (граждан и так далее) в общественно-политической жизни государства, страны, региона (региональные выборы) организации и так далее, важный институт функционирования политической системы и политического режима, их легитимности.', 1594379712, 1594377557),
(6, 'День города', 'den-goroda', 8, 0, 'День города — ежегодный праздник практически всех относительно крупных городов (России и бывшего СССР), приуроченный, как правило, к выходным (воскресным) дням.  Обновлено', 1594577354, 1594379838),
(7, 'Салюты', 'salyuty', 8, 6, 'Оружейный салют, или артиллерийский салют — церемониальная стрельба холостыми зарядами из артиллерийских орудий или стрелкового оружия.', 1594593322, 1594379864),
(8, 'Детские площадки', 'det-skiye-ploshchadki', 8, 6, 'Детская площадка — территория, на которой расположены элементы детского уличного игрового оборудования с целью организации содержательного досуга. Игровое оборудование, в свою очередь, представляет собой набор конструктивных сооружений, способствующих физическому и умственному развитию, оказывая при этом благоприятное воздействие на социальную адаптацию ребёнка.', 1594556622, 1594379910),
(9, 'Спорт', 'sport', 8, 0, 'Спорт представляет собой специфический род физической или интеллектуальной активности, совершаемой с целью соревнования, а также целенаправленной подготовки к ним путём разминки, тренировки.', 1594381130, 1594381130),
(10, 'Турниры', 'turniry', 8, 9, 'Cпортивные соревнования по игровым видам спорта с большим числом участников (игроков или команд).', 1594569663, 1594381340),
(11, 'Марафоны', 'marafony', 8, 0, 'Марафо́н (греч. Μαραθών [Marathṓn]) — дисциплина лёгкой атлетики, представляющая собой забег на дистанцию 42 километра 195 метров. Ведущие мировые марафоны проводятся под эгидой и по правилам, разработанным Ассоциацией международных марафонов и пробегов (AIMS). Правила AIMS подтверждены Международной ассоциацией легкоатлетических федераций (IAAF).', 1594593238, 1594381355),
(12, '0-3 года', '0-3-goda', 8, 8, '', 1594511193, 1594510618),
(13, '3-7 года', '3-7-goda', 8, 8, '', 1594510639, 1594510639);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1594201814),
('m200708_090024_create_user_table', 1594202004),
('m200708_150452_create_categories_table', 1594224418),
('m200709_090337_create_article_table', 1594286424),
('m200710_123840_create_article_category_table', 1594385453);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `access_token`) VALUES
(7, 'admin', '$2y$13$SrLxi3owXdI349uhN80JlObMHRltFKJRFt5cee05JFOd6X21oal0O', 'hh4Ii6soo7VLdFmVZaOqnzaw6GbfcYWd', '_7i8DDRIW8_aJwKyeEDa24QplcapOLc8'),
(8, 'stepan', '$2y$13$VZxxKkJvOyua.BfVbTg6n.TiV0M.OHoaY13N5ieH3dQth9shdbbsG', '0iXyqVZklmyqBpjX2GVAgxp0WCbcbYU-', 'gKm80ztUeabwM1AbRLo0UOX1qV3jdTHD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx-article-user_id` (`user_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`category_id`,`article_id`),
  ADD KEY `fk-article_category-article_id` (`article_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx-category-user_id` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk-article-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `fk-article_category-article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-article_category-category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk-category-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
