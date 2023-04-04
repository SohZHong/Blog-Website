-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2023 at 03:57 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrilah`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE IF NOT EXISTS `blog_category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`) VALUES
(1, 'Product Showcase'),
(3, 'Techniques'),
(4, 'Discussion'),
(5, 'Dairy'),
(6, 'Organic'),
(7, 'Livestock'),
(8, 'Subsistence Farming'),
(10, 'Farmings');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
CREATE TABLE IF NOT EXISTS `blog_post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_thumbnail` varchar(255) DEFAULT NULL,
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `post_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_status` int DEFAULT '0',
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`post_id`, `post_title`, `post_thumbnail`, `post_content`, `post_created`, `post_status`, `user_id`, `category_id`, `views`) VALUES
(1, 'Green World', '1.png', '         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id molestie mi. Aenean ac justo ac arcu ultrices lacinia et vel leo. Fusce quis lectus a arcu fermentum facilisis. Nam eget quam non ex tincidunt consectetur eu id eros. Quisque eget turpis sagittis, bibendum tortor sollicitudin, fermentum felis. Vestibulum ut felis eget erat elementum imperdiet. Sed sed gravida velit, id volutpat turpis. Curabitur dignissim enim sed arcu pretium, nec dictum nibh varius. Nulla sit amet condimentum magna. Nullam hendrerit sagittis elit vitae gravida. Etiam scelerisque luctus magna quis sodales. Sed tellus eros, tempus ac blandit vitae, viverra vehicula arcu.\r\n\r\n         Vestibulum ut hendrerit nulla, et mollis sapien. Curabitur tristique, neque eu sagittis pulvinar, metus turpis ultricies leo, id venenatis leo nibh vel eros. Mauris mollis lacinia mi id bibendum. Vestibulum at tortor ligula. Nulla ut risus augue. Duis ante odio, ornare ut augue vitae, imperdiet iaculis turpis. Duis lorem est, sollicitudin sollicitudin nulla in, lacinia ornare tellus. Vivamus et eros ultricies, malesuada velit quis, malesuada orci. Donec vitae interdum orci. Curabitur iaculis lectus a dignissim vulputate. Aliquam facilisis massa a sapien suscipit, sit amet suscipit enim imperdiet. Integer purus mi, gravida in turpis at, egestas tempor diam.', '2023-01-19 20:59:56', 1, 1, 1, 54),
(2, 'The importance of greenery', '2.png', 'Ut vitae posuere ex. Duis eleifend sem a ultrices posuere. Quisque nulla lectus, placerat a massa at, porttitor blandit arcu. Mauris faucibus massa nisl, vitae euismod metus suscipit quis. Mauris viverra purus sed tincidunt rutrum. \r\n\r\nVivamus ac odio ultricies, suscipit tellus eu, scelerisque tellus. Donec ut urna iaculis orci vulputate molestie. Aliquam finibus suscipit nisi. Morbi interdum consequat enim. In hac habitasse platea dictumst. Maecenas nec ante ligula. \r\n\r\nDonec vitae neque ullamcorper, facilisis diam at, ullamcorper quam. Duis auctor, dui ut convallis vestibulum, lectus nibh gravida sapien, ut lobortis tortor velit non urna. Mauris efficitur est non nulla varius scelerisque. Vivamus vitae metus efficitur, ultrices metus sed, porta ligula.', '2023-01-19 21:00:52', 1, 1, 4, 39),
(3, 'Green Grass', '3.png', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas sed dui sit amet ligula pellentesque tempus vel vel metus. Sed eros diam, fringilla sed bibendum lobortis, venenatis in sem. \r\n\r\nQuisque a convallis ligula. Maecenas sodales magna mi. Integer et posuere leo. Proin vestibulum quis mauris a tincidunt. Morbi facilisis est vel arcu ultrices scelerisque. Nulla rutrum, libero vel interdum ornare, nulla turpis lacinia libero, a volutpat est neque rhoncus urna. Aliquam erat volutpat. Proin quis turpis quis neque dictum vestibulum. Mauris risus lectus, accumsan eget tincidunt id, laoreet id arcu. Nullam non turpis risus. Duis tempor porta turpis, id pellentesque mauris', '2023-01-19 21:02:08', 1, 3, 1, 11),
(4, 'Sunset', '4.png', 'Duis quis tellus laoreet, eleifend dui sed, faucibus magna. Etiam finibus blandit odio, eget mollis ex imperdiet a. Fusce pretium velit in est pretium, et ultrices mi auctor. Sed sit amet turpis viverra, dignissim tellus in, sollicitudin ante. Suspendisse potenti. Nullam in diam vel lorem aliquam sollicitudin. Pellentesque accumsan vitae dolor a lobortis. Quisque vulputate erat ut elit pulvinar, id lobortis mi luctus. Nam sit amet est non mi rutrum egestas vitae eget arcu. Vivamus mollis, velit non tempor porttitor, magna est placerat erat, et commodo velit libero sit amet nibh. Aenean nunc lacus, vehicula sit amet lectus et, placerat tincidunt ligula. Nulla at dignissim quam. Duis mollis leo at ante interdum pretium. Maecenas nec ullamcorper urna, et porta risus.\r\n\r\nVestibulum ac purus et elit vehicula tempor in non risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec elit neque, efficitur in semper vel, bibendum in ipsum. Fusce in placerat purus, nec elementum urna. Nunc pharetra euismod est, eget blandit justo consequat a. Mauris et lectus eget lacus imperdiet porta non id velit. Cras consectetur lorem dapibus, iaculis odio nec, finibus odio. Nunc ornare leo ut laoreet accumsan. Proin nunc nibh, tempus non nibh sit amet, laoreet mollis purus. Vivamus quis risus id purus elementum sollicitudin. Morbi maximus, ante a lacinia condimentum, arcu ante condimentum diam, eu pharetra diam dui vel felis.', '2023-01-19 21:02:47', 1, 3, 1, 63),
(5, 'Techniques of Maintaining a Plantation', '5.png', 'Suspendisse vulputate ex vitae leo pretium facilisis. Integer eget lectus eleifend, volutpat erat sit amet, viverra augue. Nulla mollis non elit ut egestas. Nunc sed lorem tortor. Sed vitae lacus eget neque molestie efficitur vel eu nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce et placerat erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed blandit rhoncus turpis, nec rhoncus nibh feugiat et. Vestibulum tristique vulputate orci vitae vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam lacus mi, mollis a tortor et, interdum pharetra felis. Mauris tempus sit amet tortor vitae suscipit. Donec suscipit turpis at facilisis gravida.', '2023-01-19 21:04:06', 1, 4, 3, 7),
(6, 'Utilizing Nature', '6.png', 'Donec eleifend interdum sodales. Pellentesque laoreet justo egestas, molestie diam vitae, convallis sem. Vestibulum commodo velit eu massa luctus, nec consequat nisl tempus. Fusce feugiat, risus non auctor vestibulum, libero lacus finibus purus, sed ornare felis sem ut metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus nec ipsum sagittis, molestie urna a, condimentum eros. Aliquam sed mauris non dui tempus gravida vulputate non dui.', '2023-01-19 21:04:45', 1, 4, 7, 0),
(7, 'Wheat After A Year\'s Harvest', '7.png', 'Proin feugiat lacus dictum massa dignissim, molestie euismod libero semper. Proin feugiat rutrum urna, at scelerisque lorem. Cras convallis iaculis felis, vitae mattis metus elementum in. Phasellus non ornare enim. In vehicula dignissim elit at ornare. Donec vehicula cursus massa, sed varius neque venenatis in. Pellentesque ultrices, dolor et vestibulum rhoncus, tortor felis sodales massa, sed fringilla nulla eros nec metus. Curabitur non tortor malesuada, suscipit massa non, finibus diam. Donec et nunc eget dolor tincidunt gravida non vitae mi. Mauris dolor orci, molestie eget dapibus vel, blandit sed nisi. Integer egestas eros vel sollicitudin varius. Nulla nisi dui, tempus eu metus non, viverra congue mauris. Phasellus tempus lectus nibh, non pulvinar velit sollicitudin eget. Duis tempor scelerisque tortor, a lobortis odio ullamcorper in.', '2023-01-19 21:05:26', 1, 5, 1, 0),
(8, 'Layout of My Farm', '8.png', 'Proin feugiat lacus dictum massa dignissim, molestie euismod libero semper. Proin feugiat rutrum urna, at scelerisque lorem. Cras convallis iaculis felis, vitae mattis metus elementum in. Phasellus non ornare enim. In vehicula dignissim elit at ornare. Donec vehicula cursus massa, sed varius neque venenatis in. Pellentesque ultrices, dolor et vestibulum rhoncus, tortor felis sodales massa, sed fringilla nulla eros nec metus. Curabitur non tortor malesuada, suscipit massa non, finibus diam. Donec et nunc eget dolor tincidunt gravida non vitae mi. Mauris dolor orci, molestie eget dapibus vel, blandit sed nisi. Integer egestas eros vel sollicitudin varius. Nulla nisi dui, tempus eu metus non, viverra congue mauris. Phasellus tempus lectus nibh, non pulvinar velit sollicitudin eget. Duis tempor scelerisque tortor, a lobortis odio ullamcorper in. ', '2023-01-19 21:05:57', 1, 5, 4, 2),
(9, 'Techniques for Maintaining Your Farm', '9.png', 'Suspendisse pulvinar posuere pulvinar. Integer a efficitur est, in rutrum magna. In et odio tristique, iaculis nisi sed, sagittis enim. Praesent a elit elementum, pretium justo at, cursus eros. Praesent pellentesque gravida diam, sed tristique urna varius non. Curabitur placerat, mi non fringilla iaculis, lectus ex varius odio, consequat ultricies enim quam et lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus.', '2023-01-19 21:06:44', 1, 9, 3, 2),
(10, 'Best way to raise livestocks', '11.png', 'Vivamus at ipsum tortor. Suspendisse cursus libero eu mi suscipit, ut sollicitudin ipsum interdum. Proin tempus purus id volutpat dapibus. Maecenas a ante vitae nunc placerat consequat. Nulla pharetra lectus non nibh blandit iaculis. Duis tempus viverra velit eu luctus. Pellentesque laoreet, tortor sed tempus ultrices, magna elit placerat risus, ac tempor ligula erat sed dolor. Donec euismod, erat elementum scelerisque gravida, est nunc gravida sem, at imperdiet est purus vel dui. Praesent vel dui lacinia, sagittis nulla pulvinar, consectetur nulla. Etiam mollis nec tortor ac aliquet. In hac habitasse platea dictumst. Sed at tortor nisi. Donec mi urna, ullamcorper ultricies tortor eget, feugiat consequat elit. Maecenas consectetur rutrum est, vitae porttitor risus maximus vitae. Proin rhoncus massa sit amet lectus condimentum, et porta velit dignissim.', '2023-01-19 21:07:38', 1, 9, 4, 0),
(11, 'How to improve your farming efficiency?', '12.png', 'Pellentesque luctus vestibulum ipsum, nec ullamcorper purus ultrices a. Duis nec magna non mi blandit facilisis ut vel eros. Cras porta convallis neque quis vulputate. Donec sapien nisl, elementum non ornare vel, ultricies sollicitudin nulla. Fusce eleifend massa urna, id condimentum tortor euismod non.', '2023-01-19 21:08:24', 1, 8, 4, 0),
(12, 'My Cow Larry', '13.png', 'Mauris justo neque, tincidunt nec sapien ac, molestie porta erat. Integer pulvinar, lectus pulvinar mattis facilisis, ipsum diam semper ipsum, efficitur accumsan enim metus eget arcu. Pellentesque tincidunt pellentesque massa, non cursus risus suscipit pretium. Integer et lectus quis eros convallis volutpat. Nulla vel vestibulum lectus, non eleifend massa. Etiam accumsan, metus ut fringilla suscipit, ex massa lacinia elit, gravida dictum mauris magna sed odio. Sed in ultrices dui, in sagittis mi. Vivamus aliquam elit et ante tincidunt, consectetur tincidunt tortor lacinia. In finibus tortor vel neque vestibulum porta. Vivamus faucibus leo magna, ut tincidunt ante eleifend in. Nunc imperdiet, neque in finibus iaculis, est erat interdum nisi, nec interdum ipsum enim eu diam.', '2023-01-19 21:08:46', 1, 8, 7, 4),
(13, 'My Sheep Herd during the day', '14.png', 'Fusce venenatis ex nec quam dapibus consectetur. Vestibulum eget quam eu magna tempor convallis et id ex. Vestibulum ac eros nisl. Sed vel condimentum orci. Integer imperdiet eu risus eu tincidunt. In hac habitasse platea dictumst. Donec et est elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam non dui eu elit congue consectetur quis id sem. Cras pretium in arcu et consectetur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi quis augue leo. Nulla scelerisque mollis accumsan. Vestibulum risus ipsum, semper in maximus vel, porta sit amet mauris. Cras a sollicitudin libero.', '2023-01-19 21:09:57', 1, 33, 7, 2),
(14, 'Daily Picture of my herd', '15.png', 'In ut rhoncus est, vitae placerat diam. Nam sollicitudin vestibulum nulla, non tempor diam efficitur tincidunt. In erat ex, pharetra id viverra vitae, varius sit amet elit. Vivamus pulvinar tortor mi, quis tempus eros laoreet eu. Sed euismod commodo mauris, a malesuada neque semper sed. Vestibulum consequat erat ut arcu ullamcorper tincidunt eu non est. Maecenas tincidunt aliquam ipsum, condimentum gravida est aliquam nec.', '2023-01-19 21:10:44', 1, 33, 7, 2),
(15, 'Cow or Sheep Milk?', '16.png', 'Sed viverra, orci quis scelerisque mollis, lectus tellus sagittis elit, id varius diam urna et urna. Sed at semper tellus. In egestas tristique fringilla. Phasellus dictum velit ut hendrerit accumsan. Aliquam fringilla eleifend enim eu iaculis. Duis convallis tincidunt imperdiet. In et est non mi tincidunt facilisis. Vestibulum at ornare ante. Vivamus sed sem ante. Vivamus porta diam vel arcu volutpat, id dignissim ipsum sagittis. Cras ac erat tincidunt, scelerisque purus sit amet, aliquet est.\r\n\r\nNunc vitae tempor purus. Mauris tincidunt arcu nec semper egestas. Vivamus consectetur vestibulum lorem, ac consectetur diam tempor non. Duis pulvinar rutrum placerat. In lobortis ligula non finibus efficitur. Ut egestas urna sit amet sapien pretium, vitae aliquet ex elementum. Quisque ac ante nunc. Integer vitae efficitur urna. Fusce nisi turpis, vehicula at lorem ut, commodo dictum nulla. Nam fermentum orci vitae lacinia varius. Donec facilisis turpis ac dolor molestie, sit amet suscipit massa lacinia. Integer a eleifend erat. Vivamus placerat vestibulum ullamcorper.', '2023-01-19 21:11:27', 1, 38, 5, 0),
(16, 'My Tea Farm', '17.png', 'Nunc efficitur efficitur ligula, vel consequat massa commodo vitae. Pellentesque dui tortor, ornare ac est ut, rutrum mattis massa. Proin tristique nec mi eu dapibus. Suspendisse tellus odio, cursus vitae augue vel, semper sagittis nisi. Maecenas eleifend, felis ac aliquam malesuada, purus mauris pretium libero, sed molestie elit eros quis nibh. Quisque sed leo arcu. Suspendisse eget velit quis tortor varius lobortis. Etiam non ante enim. Fusce velit odio, semper eget rutrum eget, consectetur quis erat. Duis faucibus, est nec posuere pharetra, sem justo sollicitudin ipsum, at fringilla turpis neque quis tellus. Morbi quis tortor dui. Vestibulum sed accumsan eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '2023-01-19 21:11:52', 1, 38, 8, 7),
(17, 'How do I utilize organic geritilizer?', '19.png', ' Curabitur feugiat at eros blandit consectetur. Vivamus tristique finibus malesuada. Nullam rhoncus lorem id felis malesuada ullamcorper. Maecenas maximus purus a ante sagittis, vitae malesuada mi interdum. Maecenas mollis, justo sit amet lacinia pharetra, lectus eros finibus eros, quis mattis lacus lacus nec tellus. Mauris erat dolor, condimentum at elementum quis, placerat ac metus. Cras ac massa gravida, vulputate risus quis, placerat sapien. Nunc blandit elit vitae ultrices elementum. Mauris malesuada velit at leo placerat lacinia. Nam condimentum id odio blandit condimentum. Proin nibh erat, dapibus sed mollis ut, euismod ut nisi. Etiam ac volutpat metus, convallis dictum lacus.', '2023-01-19 21:12:49', 1, 38, 4, 65),
(19, 'Deer Farming', 'WhatsApp Image 2022-06-14 at 2.47.07 PM.jpeg', 'In rutrum lectus ut purus vestibulum, et venenatis turpis fermentum. Pellentesque ullamcorper suscipit lectus, sed maximus mauris. Maecenas euismod ultricies venenatis. Nullam nunc felis, faucibus sed ligula ut, bibendum euismod justo. Nulla non purus nec lorem egestas pellentesque. Sed ullamcorper accumsan massa, ut facilisis lorem. Donec rhoncus velit in nibh iaculis, eget condimentum sapien sagittis. Aenean auctor lobortis nibh a tincidunt. Nulla ac nibh lorem. Vivamus consequat nunc quis ante blandit porta. Donec scelerisque, orci ut cursus vestibulum, ante diam sodales ex, eget ultrices magna nibh et lacus. In hac habitasse platea dictumst. Phasellus eu dui ac leo rutrum vehicula.', '2023-01-20 15:49:59', 0, 38, 7, 0),
(20, 'I love plants', '20.png', 'plants are love plants are live ', '2023-01-20 21:27:07', 1, 44, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `post_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment` longtext,
  `cr_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `comment`, `cr_date`, `status`) VALUES
(14, 12, 38, 'Hello\r\n', '2023-01-20 14:24:08', 0),
(2, 2, 5, 'Hello\r\n', '2023-01-20 12:18:54', 0),
(3, 2, 5, 'Hello\r\n', '2023-01-20 12:19:10', 0),
(4, 2, 5, 'Abuqueque\r\n<3', '2023-01-20 12:29:29', 0),
(12, 17, 5, 'Hello john\r\n', '2023-01-20 13:05:42', 0),
(9, 2, 1, '0821h198313', '2023-01-20 12:41:09', 0),
(8, 2, 1, 'My goodness\r\n', '2023-01-20 12:38:20', 0),
(11, 17, 5, 'Hello John\r\n', '2023-01-20 13:00:29', 0),
(13, 16, 5, 'Nice Farm', '2023-01-20 13:07:05', 0),
(15, 17, 8, 'I am Jun Shen\r\n', '2023-01-20 14:35:07', 0),
(16, 14, 38, 'Nice Sheep\r\n', '2023-01-20 15:53:04', 1),
(17, 13, 38, 'Hello Sean', '2023-01-20 15:53:21', 1),
(18, 17, 1, 'Wei Wei\r\n', '2023-01-20 17:43:40', 0),
(19, 1, 44, 'Wow i love your blog!\r\n', '2023-01-20 21:25:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `sup_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `subject` text,
  `description` longtext,
  PRIMARY KEY (`sup_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`sup_id`, `user_id`, `name`, `email`, `contact_number`, `subject`, `description`) VALUES
(19, 44, 'Doe darren', 'johndoe@gmail.com', '0125070061', '123', '1222223'),
(22, 1, 'Soh Zhe Hong', 'sohzhehong09@gmail.com', '+60125070061', '123', '123'),
(21, NULL, 'SOH ZHE HONG', 'sohzhehong09@gmail.com', '0125070061', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user',
  `user_profile` varchar(50) NOT NULL DEFAULT 'no_image.jpg',
  `user_title` varchar(100) NOT NULL DEFAULT 'Your Average Blogger',
  `user_bios` varchar(255) NOT NULL DEFAULT 'Sharing the pleasure of agriculture with like-minded people	',
  `security_quest` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `security_answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `notification` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_password`, `user_email`, `user_role`, `user_profile`, `user_title`, `user_bios`, `security_quest`, `security_answer`, `notification`) VALUES
(1, 'Zhe Hong', 'Soh', '1234567', 'sohzhehong09@gmail.com', 'admin', 'Logo.png', 'Your Average Male', 'Sharing', 'Q3', 'Ang', -3),
(3, 'Adam', 'Crus', 'crusadam1', 'crusadam1@gmail.com', 'admin', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q4', 'Catholic', 0),
(4, 'Wei Hup', 'Tan', 'tan12345', 'tanweihup@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q2', 'Dog', 0),
(5, 'Jun Ian', 'Sia', '12345678', 'siaji526@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger Sia Jun Ian', 'Sharing the pleasure of agriculture with like-minded people.', 'Q5', 'Benz', 0),
(9, 'Nicholas', 'Tan', 'nicholastan123', 'nicholastan@gmail.com', 'admin', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'Klang', 0),
(8, 'Jun Shen', 'Wong', 'blazemochi', 'junshenwong@gmail.com', 'admin', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'Selangor', 0),
(33, 'Kai Zher', 'Ho ', 'seanhoe', 'seanhoekaizher@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'KL', 2),
(34, 'ZHE HONG', 'SOH', '123456789', 'sohzhehong10@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q4', 'Catholic', 0),
(39, 'John', 'Snow', 'johnsnow', 'johnsnow@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q5', 'Toyota', 0),
(38, 'John', 'Paulose', 'johnpaulose1', 'johnpaulose@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q4', 'Catholic', 0),
(40, 'Individual', 'Jun Sia', 'individual@gmail.com', 'IDK@gmail.com', 'user', 'Is-boosting-safe-in-Valorant.jpg', 'Your Average ', 'asdqp0dihqr', 'Q1', 'Selangor', 0),
(41, 'ZHE HONG', 'SOH', 'Selangor', 'sohzhehong13@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'Selangor', 0),
(42, 'valid@gmail.com', 'valid@gmail.com', 'johndoe', 'valid@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'Selangor', 0),
(43, 'qwe', 'qwe', '12345678', 'qwe@gmail.com', 'user', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'selangor', 0),
(44, 'darren', 'Doe', 'johndoe1234', 'johndoe@gmail.com', 'user', 'profile.png', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'selangor', 0),
(45, 'John', 'John', '1234567', 'johndoe1@gmail.com', 'admin', 'no_image.jpg', 'Your Average Blogger', 'Sharing the pleasure of agriculture with like-minded people	', 'Q1', 'Penang', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
