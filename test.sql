-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 04:10 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `signalement` tinyint(1) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `signalement`, `author_id`, `comment_date`) VALUES
(1, 2, 'Preum\'s', 0, 28, '2017-09-24 17:12:30'),
(2, 2, 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', 0, 29, '2017-09-24 17:21:34'),
(8, 1, 'C\'est moi !', 0, 28, '2017-09-28 19:50:14'),
(9, 2, 'Retest\r\nEncore', 0, 29, '2017-10-27 11:46:50'),
(10, 2, 'tu testes quoi ?', 0, 38, '2017-10-27 15:44:14'),
(12, 2, 'un autre test', 0, 45, '2021-03-05 18:04:33'),
(20, 1, 'on test encore', 0, 42, '2021-03-24 13:31:30'),
(36, 2, 'grgdsrgdrg', 1, 45, '2021-03-24 14:24:47'),
(37, 2, 'testestest', 0, 46, '2021-03-24 14:24:50'),
(41, 2, 'un commentaire en plus', 0, 47, '2021-03-25 23:22:36'),
(43, 1, 'ksfqjkdjfds', 0, 46, '2021-03-26 03:58:00'),
(50, 2, 'test de com', 0, 45, '2021-03-31 19:12:53'),
(51, 2, 'encore un test', 1, 46, '2021-03-31 23:51:47'),
(52, 2, 'encore un test2', 0, 46, '2021-03-31 23:52:13'),
(53, 2, 'encore un test3', 0, 46, '2021-03-31 23:52:22'),
(55, 3, 'zarzar', 0, 45, '2021-04-01 00:03:59'),
(56, 3, 'arzarazr', 0, 45, '2021-04-01 00:04:01'),
(57, 3, 'test test 3', 0, 45, '2021-04-01 00:04:37'),
(58, 2, 'on test encore et encore', 1, 45, '2021-04-01 00:05:58'),
(59, 2, 'ca marche ?\r\n', 0, 46, '2021-04-01 00:13:04'),
(60, 1, 'test test encore', 0, 46, '2021-04-01 00:25:13'),
(61, 2, 'dernier msg', 0, 46, '2021-04-01 00:28:35'),
(62, 2, 're dernier msg', 0, 46, '2021-04-01 00:30:06'),
(65, 1, 'on retest', 0, 45, '2021-04-01 00:56:48'),
(71, 14, 'nouveau billet ?\r\n', 0, 45, '2021-04-01 01:26:50'),
(72, 14, 'on test encore test test', 0, 45, '2021-04-01 01:26:57'),
(73, 4, 'test de commentaire', 0, 46, '2021-04-01 19:05:35'),
(74, 4, 'encore un test de com', 0, 46, '2021-04-01 19:05:41'),
(76, 2, 'test de nouveau com', 0, 46, '2021-04-03 16:02:08'),
(87, 36, 'test de com tralalalala', 1, 52, '2021-04-08 15:59:05'),
(88, 3, 'on test', 0, 46, '2021-04-09 16:30:28'),
(89, 36, 'test test', 0, 46, '2021-04-09 16:30:37'),
(90, 35, 'teeeeesssstttt', 0, 46, '2021-04-09 16:30:44'),
(91, 29, 'tessstttt', 0, 46, '2021-04-09 16:31:41'),
(92, 36, 'on retest', 0, 51, '2021-04-09 16:39:21'),
(93, 3, 'ca test test', 0, 51, '2021-04-09 16:39:28'),
(94, 36, 'ajout de com', 0, 46, '2021-04-09 18:23:16'),
(95, 35, ' je fais encore un test igjtheoiuzghouezqhgoesuqhgodsqhgoûrhguo^sqhgo^dfsqhgou^rsqhguropqhgof^sqhgof^sqhgfôdihgofpdghoruehgourhguorhgruohgrughfughfdjghfkjdghkfdjhgfdkhgfkjdhgkfdjhgihgiurhriudhigurhugirhsuoisgrh', 0, 50, '2021-04-19 14:59:47'),
(96, 37, 'un nouveau commentaire', 0, 46, '2021-04-23 18:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `droit` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `droit`) VALUES
(28, 'xavier', '$2y$10$MAaCzr6JQCP1dfmU77a/oeorFaWFVatbvtFaUzGATAzxH4YvWD5n.', 0),
(29, 'lolo', '$2y$10$mdZDGD4hXLP01qwGbU.tdOPWiGHKeIOIxYXSGwpQsR92qIjhCXIq6', 0),
(32, 'popo', '$2y$10$Cvy1kHRYJMxAyrdqwwtgl.b36DxdIX33X1ciN7Clb7icHBMJT6.gm', 0),
(35, 'toto', '$2y$10$ZmzRS55SpF/Jg8J90GAYFOg8jVLsaL0CodpFFlhb1tMro3uBk0Uv2', 0),
(36, 'test', '$2y$10$uaa0KJqrRw7YEnUgSHzyLOpwQGIeGFbz30nx7JTZ8rwZBYcjRrNG.', 0),
(37, 'test6', '$2y$10$vL03mp3F6871mdLUsetYJei.ys1AyHUxSDsDfmMHs1skPbFomO/K.', 0),
(38, 'gerard', '$2y$10$r/7aut4uo7iCmXLYp7I0seBGIHGUWEHdfbgIXlV1tpCZkM37a8igy', 0),
(39, 'test8', '$2y$10$.l3c0ExzpHsTErKTnsR7NOwlBMF11QKG/eu0pbSLDMrkCpic8tv/2', 0),
(40, 'test11', '$2y$10$BB71SpBZ0qDwrcoT.fWIjOwoZZWcvBRuVeTNKHuvK80oh8jplXmMm', 0),
(41, 'test12', '$2y$10$dwLFwxzGVsdsewwgVKD8Ze5di9SXqQjQZhhS3jnkXxjBz6vZf5mZO', 0),
(42, 'test10', '$2y$10$OvZbAE4CgHhSD1X6DJ4xbOWW6A.dS1Fgh8P61XEo1kwPXvZnXa47G', 0),
(44, 'test15', '$2y$10$NgiyAQveBRe6a6jK01ZbH.6.C6hRh.CD1snlb42c3IPTCicUmro/W', 0),
(45, 'test20', '$2y$10$imQHHuLySbt1wJNBvhZfWeap0l/.G/tjE1lDGV97KvAPAk1DaiDVa', 1),
(46, 'test21', '$2y$10$fR1FEyzhdAD.xTmujQOrq.ez40o2Us5G2vLOjvz2Vdh.d/8YC36JK', 0),
(47, 'test25', '$2y$10$/FxDkjqO.c2JNK/BRpAcd.QmDfeTbPFPAvbfwyKMkhIZM5Gs8eC9e', 0),
(49, 'test31', '$2y$10$DM5i.9rZwSueivwTCp/60etY3HfzotxErldmeG16F8mEPyJRHxy4.', 0),
(50, 'test32', '$2y$10$8DDYhmQgDDTO/PiAyk/kb.i8KnK4hbh7NxITptvy1vYTtavgRwzr2', 0),
(51, 'test33', '$2y$10$2SpIgwaFex5llURJsZai7OWg6RvjuEwo0yBXT99RVviMAM2TpREJ6', 0),
(52, 'test34', '$2y$10$a8JZpD4j/goTzXhHAz86M.42a.BomeFtLQHyI3PlRmZYBXfpB5k0O', 0),
(53, 'test99', '$2y$10$F2SIIXsYtPi/3.Fdox6qkeXJ.ioC32GDcv75jxtn/g1zS98c4do6i', 0),
(55, 'Jean_Forteroche', '$2y$10$nuywvjYkpC2hPVX.x4Ylfe26TN36mGHkRhbc3B622kKvLWAmOWcwm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2017-09-18 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2017-09-20 16:28:41'),
(3, 'Test de creation de billet', 'je test ici de créer un nouveau billet test test test test', '2021-03-29 01:09:24'),
(4, 'un nouveau test de creation de billet', 'je retest balbablablabla testestetergsdgokdshgjlmksfdhgmkjdfhgnmkjfdhgnmkfjdgfd', '2021-03-29 01:10:08'),
(14, 'test de billet 2', 'je test un nouveau billet test teste testestestestest', '2021-04-01 01:26:40'),
(18, 'nouveau billet', 'on retest la creation', '2021-04-02 15:10:05'),
(20, 'test de billet', 'ceci est le dernier billet\r\non test encore et&nbsp;encore', '2021-04-02 15:13:03'),
(21, 'encore un billet', 'test test\r\nencore test\r\ntetgzsgsegsdgsgreg', '2021-04-02 15:15:38'),
(22, 'test', 'testetestsqetggfsdg', '2021-04-02 15:16:10'),
(28, 'test de billet 55125', 'on retest test test test', '2021-04-04 00:06:27'),
(29, 'test billet popopop', 'testpopopopp', '2021-04-04 00:58:12'),
(35, 'test toujours', '<h2>encore un test&nbsp;</h2><br />\r\n<p>ertrgfhgthqfqgfdgfdhdfhdf</p><br />\r\n<p>fgdsgrgrgr</p>', '2021-04-04 01:09:00'),
(36, 'rerechangement de billet', '<h2>on rechange encore le billet</h2>\r\n<p>ca marche toujours&nbsp;&nbsp;<em>eezrtzergxcfdgfdgfdg<span style=\"color: #000000;\"> <span style=\"color: #2dc26b;\">on test le text color&eacute;</span>&nbsp;</span></em></p>\r\n<p><span style=\"background-color: #3598db;\"><em><span style=\"color: #000000;\">avec un backgroundcolor ca marchettttt ggdgkfdkgfdkljhkfdjhklfdjhglkdhdghhgh</span></em></span></p>\r\n<p>&nbsp;</p>', '2021-04-21 14:42:05'),
(37, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ligula sem, convallis quis nulla in, tincidunt feugiat risus. Sed consequat egestas ex, vel faucibus est sodales quis. Nulla viverra libero ac elementum faucibus. Pellentesque at cursus metus. Donec vestibulum ex ante, in pellentesque nisl varius et. Pellentesque dictum tortor tellus, non dignissim nibh elementum a. Curabitur ipsum augue, volutpat sed luctus commodo, blandit in nisi. Nullam eu dolor eget eros commodo pulvinar sit amet sed sapien. In hac habitasse platea dictumst.</p>\r\n<p>Vivamus consectetur luctus justo, sit amet tempor erat pretium ac. Nam aliquet felis vitae eros sollicitudin, non vulputate ante venenatis. Suspendisse in tempor risus. Phasellus ultricies fermentum magna, at suscipit elit tempor quis. Quisque arcu libero, porta vitae ex vel, vestibulum mollis ipsum. Proin eu turpis in lacus efficitur placerat. Maecenas id lorem leo. Praesent pellentesque sapien in ex tincidunt, eget accumsan mi dictum. Quisque efficitur diam vel velit lacinia, in iaculis sapien fringilla. Ut nec sapien sodales, posuere purus eu, interdum ipsum.</p>\r\n<p>Nam et mollis nisi. Suspendisse semper placerat lorem, in eleifend magna accumsan ut. Proin fermentum maximus ante. In pellentesque quis odio a fermentum. Quisque scelerisque neque ut augue pulvinar maximus. Mauris et urna mollis, laoreet sapien a, interdum mi. Proin ornare ex ac tellus efficitur, ut luctus turpis interdum. Nullam sit amet magna id eros dapibus auctor. Duis eget rutrum ante, vitae semper sapien.</p>\r\n<p>Pellentesque tempor laoreet semper. Curabitur feugiat gravida mauris, in scelerisque magna molestie nec. Ut ac vehicula quam. Morbi ultricies pharetra vehicula. Nullam id vulputate orci. Nunc lacinia eu tellus at congue. Morbi in augue eu ante tincidunt luctus nec nec mi. Maecenas a varius nibh. Vivamus in libero elementum, varius nulla in, rhoncus tellus. Ut risus tortor, tristique id malesuada et, porttitor non justo. Aenean iaculis urna at ligula accumsan egestas. Aenean sit amet augue nec nunc blandit egestas.</p>\r\n<p>Aliquam ac mauris dui. Fusce pellentesque efficitur diam non aliquam. Nulla faucibus finibus arcu, suscipit ultrices sapien placerat non. Fusce suscipit massa varius neque efficitur, vel fringilla diam cursus. Aliquam erat volutpat. Donec condimentum luctus sollicitudin. Donec rutrum eget lectus eget tincidunt. Donec eu nunc turpis.</p>', '2021-04-23 15:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `clef_etrangere_posts` (`post_id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `clef_etrangere_author` FOREIGN KEY (`author_id`) REFERENCES `membre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clef_etrangere_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
