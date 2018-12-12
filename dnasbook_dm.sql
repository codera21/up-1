-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2018 at 12:00 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnasbook_dm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `lang` enum('en','fr') NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `slug`, `lang`) VALUES
(1, 'Why DNAsbook Digital Marketing?', '<p style=\"margin-left:0px; margin-right:0px\">Why opportunity &quot;4&quot;? Where the idea of Opportunity &quot;5&quot; came from? Thomas, CEO/Founder of Opportunity &quot;4&quot; was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he gave an example....</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">He said the best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. This means that the best way to help someone is to make sure that after the help the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today. How?</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><a href=\"https://www.youtube.com/watch?v=OLSqdQCzCgo&amp;t=26s\">Watch This Video</a></p>', 'why-dnasbook-digital-marketing', 'en'),
(2, 'Pourquoi l\'Opportunité \"4\"?', '<p style=\"margin-left:0px; margin-right:0px\">D&#39;o&ugrave; vient l&#39;id&eacute;e d&#39;Opportunit&eacute; &quot;5&quot;? Thomas, PDG / fondateur d&rsquo;Opportunity &quot;4&quot;, &eacute;coutait un pr&eacute;sident africain un jour dans son adolescence et ce dernier a dit quelque chose qui a chang&eacute; sa vie! Le pr&eacute;sident pronon&ccedil;ait un discours sur la mani&egrave;re dont les Africains peuvent s&#39;entraider, comment mieux aider les personnes dans le besoin! R&eacute;pondant &agrave; sa propre question, il a donn&eacute; un exemple ...</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">Il a d&eacute;clar&eacute; que la meilleure fa&ccedil;on d&#39;aider une personne qui a besoin de poisson pour survivre est &quot;de ne pas lui apporter du poisson chaque les jour mais l&#39;amener au poisson&quot;. Cela signifie que la meilleure fa&ccedil;on d&rsquo;aider une personne est de s&rsquo;assurer qu&rsquo;apr&egrave;s l&rsquo;aide, que cette personne devienne autonome et capable de prendre soin d&#39;elle-m&ecirc;me. Ce discours devient le &quot;p&egrave;re&quot; de Opportunity &quot;4&quot; aujourd&#39;hui. Comment?</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><a href=\"https://www.youtube.com/watch?v=BbTvxmOCO9g&amp;t=132s\">Regarde cette video!</a></p>', 'pourquoi-l-opportunit-4', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `ads_banners_pages`
--

CREATE TABLE `ads_banners_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_728_90` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `see_more_ads` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `see_more_text` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `banner_300_250` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `banner_160_600` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_banners` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads_banners_pages`
--

INSERT INTO `ads_banners_pages` (`id`, `page`, `title`, `banner_728_90`, `see_more_ads`, `see_more_text`, `banner_300_250`, `banner_160_600`, `text_banners`, `created_at`, `updated_at`) VALUES
(1, 'https://www.dnasbookdigimarket.com', 'Testing Page', 'NO', 'YES', 'NO', 'YES', '1', 'YES', '2018-01-21 14:26:48', '2018-11-01 19:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `account_title`, `account_no`, `created_at`, `updated_at`) VALUES
(3, 'Bank of Nepal', 'Current', '1111111111111111', '2018-07-30 08:36:42', '2018-07-30 08:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `billing_profiles`
--

CREATE TABLE `billing_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc_number` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc_expiry` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc_security` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deleted` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies_photo`
--

CREATE TABLE `companies_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_photo`
--

INSERT INTO `companies_photo` (`id`, `name`, `photo_url`, `user_id`, `created_at`, `updated_at`) VALUES
(31, NULL, 'https://127.0.0.1:8000/uploads/company_photo/20180714_164215_460102914.jpg', 17, NULL, NULL),
(47, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20180814_030400_c227e568-187b-42cb-a123-b2c684771434.jpg', 54, NULL, NULL),
(45, 'picturee', 'https://dnasbookdigimarket.com/uploads/company_photo/20180729_015736_Untitled.png', 38, NULL, NULL),
(46, 'nasdf', 'https://www.dnasbookdigimarket.com/uploads/company_photo/20180814_030346_9a47876a-3620-4d39-96b5-095447817d3a.jpg', 54, NULL, NULL),
(65, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20181128_025030_Automated WebinarW.jpg', 2, NULL, NULL),
(48, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20180814_030412_9a47876a-3620-4d39-96b5-095447817d3a.jpg', 54, NULL, NULL),
(49, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20180814_030423_finding-dory-movie.jpg', 54, NULL, NULL),
(50, 'ASDASD', 'https://dnasbookdigimarket.com/uploads/company_photo/20181001_180324_laravel.png', 1, NULL, NULL),
(51, 'Atul Nepal', 'https://dnasbookdigimarket.com/uploads/company_photo/20181001_180338_MySQL.png', 1, NULL, NULL),
(52, 'aa', 'https://dnasbookdigimarket.com/uploads/company_photo/20181001_180359_elephpant_281_193.png', 1, NULL, NULL),
(53, 'aQQ', 'https://dnasbookdigimarket.com/uploads/company_photo/20181001_180450_twilio-logo-red.png', 1, NULL, NULL),
(59, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20181120_202022_Automated WebinarW.jpg', 7, NULL, NULL),
(66, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20181128_025050_fees.jpg', 2, NULL, NULL),
(67, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20181128_025108_842 100.jpg', 2, NULL, NULL),
(68, NULL, 'https://www.dnasbookdigimarket.com/uploads/company_photo/20181128_025113_842 100.jpg', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies_profiles`
--

CREATE TABLE `companies_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_moto` varchar(255) DEFAULT NULL,
  `description` longtext,
  `company_description_title` varchar(255) NOT NULL DEFAULT 'Description',
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company_image_title` varchar(255) NOT NULL DEFAULT 'Company Images',
  `photo_url` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies_profiles`
--

INSERT INTO `companies_profiles` (`id`, `name`, `company_moto`, `description`, `company_description_title`, `address`, `contact`, `email`, `company_image_title`, `photo_url`, `user_id`, `created_at`) VALUES
(1, 'Simple Prabidhi', 'Why Over-complicate ?', '<p><strong>Simple Prabidhi&nbsp;</strong>is&nbsp;small but growing and&nbsp;ambitious web development and mobile application development company. We provide quality sofware solutions for your business problem. We are a self displined team that is dedicated to meeting the deadline.&nbsp;&nbsp;</p>\r\n\r\n<p>Our team handles every project with personal care. Our designs not only reflect your business objectives but also help drive your business.</p>\r\n\r\n<p>We provide you sofware products that are highly suited to your custom needs.</p>', 'Company  Descriptions', 'Thapathali', '9808417239', 'a@a.com', 'Images Gallery', 'https://www.dnasbookdigimarket.com/uploads/back_photo/20180718_170752_20180718_121006_office.jpg', 1, NULL),
(3, 'DNAsbook', 'Results Are Guaranteed!', '<p>At Opportunity &quot;4&quot;, we know that everybody or almost everybody needs financial help to realize his dreams, this means everybody has dreams, desires or whatever you call it but most of time, it is money that blocks all this! Listen, we have help here for you to meet your financial needs, whether you believe it or not, it is true what you are reading! In fact, we don&#39;t need your believe to help you with your financial needs! Just take the actions we are going to ask you and leave the rest to us! We are not going to ask you money, only actions, we are giving you money, not you giving us money! Is it clear? Now let&#39;s go!</p>', 'DNAsbook General', '160 Grumman Ave, Apt 207 Newark NJ 07112', '908 249 7637', 'yahiadjipe@yahoo.com', 'DNAsbook General', 'https://www.dnasbookdigimarket.com/uploads/back_photo/20180723_153457_wanderurlaub-grossarl-wanderhotel-alte-post-5-1900x700.jpg', 2, NULL),
(4, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 6, NULL),
(5, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 5, NULL),
(6, 'DNAsbook', 'Results Are Guaranteed!', '<p>Why Opportunity &quot;4&quot;? Where the idea of Opportunity &quot;4&quot; came from? Thomas, CEO/Founder of Opportunity &quot;4&quot; was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he gave an example....</p>\r\n\r\n<p>He said the best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. This means that the best way to help someone is to make sure that after the help the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today.</p>\r\n\r\n<p>Mr KITTAH KODJO, nous avons remarqu&eacute; que depuis un certain temps, vous avez de probl&egrave;mes &agrave; payer vos loyers et ceci devient de plus en plus chronique.&nbsp;</p>\r\n\r\n<p>vous &ecirc;tes en retard de 2 mois sur le paiement de vos loyers maintenant, en effet nos dossiers nous indiquent que vous n&rsquo;avez pas pay&eacute; les loyers de Fevrier 2018 et Juin 2018. ceci est une preuve ind&eacute;niable que vous trouvez de plus en plus difficile de payer vos loyers. Vous ne pouvez pas &ecirc;tre dans nos locaux sans paiement de loyers pendant 2 mois.</p>\r\n\r\n<p>Vu la situation, nous vous donnons un delai de 3&nbsp; mois, du 1er Juillet 2018 au 30 Septembre 2018 pour lib&eacute;rer la chambre. A cette date (30 Septembre 2018), vous auriez br&ucirc;l&eacute; 24 000 cfa (3 mois de loyers (Juillet, Aout et Septembre 2018) dans les 6 mois de guarantie. Il vous restera alors 24 000 cfa &agrave; cette date si la chambre est laiss&eacute;e dans de bonnes conditions.&nbsp;</p>\r\n\r\n<p>Ce pr&eacute;avis est irr&eacute;versible et nous vous d&eacute;mandons de prendre vos dispositions pour sortir &agrave; cette date (30 Septembre 2018), faute de quoi, nous serons oblig&eacute;s de vous sortir de la chambre par force &agrave; vos frais; dans ce cas, le contrat d&rsquo;expulsion vous sera appliqu&eacute; dans toute sa force.</p>\r\n\r\n<p>Selon les termes du contrat de location (Articles 15, 17, 19 et 20), vos devez vider les lieux, remettre les cl&eacute;s et les locaux inspect&eacute;s avant toute remise du reste de caution. Tout dommage caus&eacute; &agrave; la chambre qui ne ressort pas d&rsquo;une usure normale, comme vous le savez, doit &ecirc;tre r&eacute;par&eacute; &agrave; vos frais, donc dans le reste de votre caution avant de vous remettre le reste. Toute chambre laiss&eacute;e non-nettoy&eacute;e est nettoy&eacute;e au frais du locataire.&nbsp;</p>\r\n\r\n<p>Si vous avez des questions, adressez-vous &agrave; Mr Kpetigo, Tel. 90 30 30 94.&nbsp;</p>\r\n\r\n<p>Depuis d&eacute;cembre 2017, des conflits entre les Hemas et les Lendus, deux communaut&eacute;s vivant dans la province d&rsquo;Ituri situ&eacute;e dans le nord-est du Congo, ont fait de nombreux morts et ont pouss&eacute; des dizaines de milliers de personnes &agrave; se d&eacute;placer. Parmi les victimes de cette escalade de violence, on compte de nombreux T&eacute;moins de J&eacute;hovah.</p>\r\n\r\n<p>Des milliers de r&eacute;fugi&eacute;s congolais ont fui en Ouganda pour &eacute;chapper aux troubles, y compris 192&nbsp;T&eacute;moins vivant dans deux camps de r&eacute;fugi&eacute;s pr&egrave;s de la fronti&egrave;re congolaise. En juin 2018, 1&nbsp;098&nbsp;autres T&eacute;moins ont fui la zone de conflit et se sont rendus &agrave; Bunia, capitale de l&rsquo;Ituri. Malheureusement, un couple ainsi que trois jeunes enfants de T&eacute;moins sont morts en raison de complications de sant&eacute;. Toutefois, aucun de nos fr&egrave;res et s&oelig;urs n&rsquo;a &eacute;t&eacute; tu&eacute; lors des massacres.</p>\r\n\r\n<p><a href=\"https://assetsnffrgf-a.akamaihd.net/assets/m/702018152/univ/wpub/702018152_univ_cnt_01_xl.jpg\" target=\"_blank\"><img src=\"https://assetsnffrgf-a.akamaihd.net/assets/m/702018152/univ/wpub/702018152_univ_cnt_01_lg.jpg\" /></a></p>\r\n\r\n<p>Salle d&rsquo;assembl&eacute;es de Bunia&nbsp;: Photo de fr&egrave;res et s&oelig;urs lendus qui ont fui diff&eacute;rentes r&eacute;gions de l&rsquo;Ituri.</p>\r\n\r\n<p>Les maisons de nombreux T&eacute;moins qui ont fui le conflit ont &eacute;t&eacute; pill&eacute;es ou enti&egrave;rement br&ucirc;l&eacute;es. De plus, un grand nombre de leurs cultures, qui constituent leur principale source de revenu, ont &eacute;t&eacute; d&eacute;truites.</p>\r\n\r\n<p>Depuis le d&eacute;but des combats, les T&eacute;moins vivant en dehors de la zone de conflit apportent une aide pratique &agrave; leurs fr&egrave;res sinistr&eacute;s. Certains ont pr&ecirc;t&eacute; leur v&eacute;hicule pour que leurs fr&egrave;res et s&oelig;urs soient &eacute;vacu&eacute;s en lieu s&ucirc;r (voir photo ci-dessus). En outre, malgr&eacute; leurs moyens limit&eacute;s, 205&nbsp;familles T&eacute;moins de Bunia ont fourni argent, nourriture et logement &agrave; leurs fr&egrave;res r&eacute;fugi&eacute;s. Bien que les deux camps de r&eacute;fugi&eacute;s de Bunia aient une grande capacit&eacute; d&rsquo;accueil, tous les T&eacute;moins d&eacute;plac&eacute;s sont h&eacute;berg&eacute;s par des membres de l&rsquo;assembl&eacute;e locale (<a href=\"https://www.jw.org/fr/publications/bible/nwt/livres/proverbes/17/#v20017017\" target=\"_blank\">Proverbes 17:17</a>).</p>\r\n\r\n<p>Le Comit&eacute; de la filiale du Congo a mis en place un comit&eacute; de secours pour fournir des produits de premi&egrave;re n&eacute;cessit&eacute; &agrave; nos fr&egrave;res et s&oelig;urs. Un repr&eacute;sentant de la filiale a aussi rendu visite aux T&eacute;moins sinistr&eacute;s pour leur apporter des encouragements &agrave; l&rsquo;aide de la Bible.</p>\r\n\r\n<p>M&ecirc;me s&rsquo;ils ont d&ucirc; fuir le Congo, les fr&egrave;res et s&oelig;urs r&eacute;fugi&eacute;s &agrave; Bunia, ou dans d&rsquo;autres r&eacute;gions, continuent d&rsquo;assister aux offices des assembl&eacute;es locales et de parler activement aux autres de la bonne nouvelle. Entre f&eacute;vrier et avril 2018, plus de 270&nbsp;cours bibliques ont &eacute;t&eacute; commenc&eacute;s dans les camps de r&eacute;fugi&eacute;s.</p>\r\n\r\n<p>Nous prions J&eacute;hovah pour qu&rsquo;il continue de donner &agrave; nos fr&egrave;res et s&oelig;urs du Congo la paix de l&rsquo;esprit et pour qu&rsquo;il b&eacute;nisse les op&eacute;rations de secours en faveur des sinistr&eacute;s. Nous attendons tous avec impatience le jour o&ugrave; le royaume de Dieu viendra et procurera &agrave; tous les serviteurs de J&eacute;hovah une s&eacute;curit&eacute; durable et &laquo;&nbsp;un endroit paisible&nbsp;&raquo; (<a href=\"https://www.jw.org/fr/publications/bible/nwt/livres/Isa%C3%AFe/32/#v23032017-v23032018\" target=\"_blank\">Isa&iuml;e 32:17, 18</a>).</p>\r\n\r\n<p>&nbsp;</p>', 'Our Company Description and Our Affiliate Link', '160 Grumman Ave, Apt 207 Newark NJ 07112', '908 249 7637', 'yahiadjipe@yahoo.com', 'Our Products!', 'https://www.dnasbookdigimarket.com/uploads/back_photo/20181120_201755_wanderurlaub-grossarl-wanderhotel-alte-post-5-1900x700.jpg', 7, NULL),
(7, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 8, NULL),
(8, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 9, NULL),
(9, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 10, NULL),
(10, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 35, NULL),
(11, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 32, NULL),
(20, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 46, NULL),
(13, 'The Company7', 'live for god lead for nepal', '<p>This is simple company page</p>', 'Description', 'Thapathali', 'nepal is awesoem', NULL, 'Company Images', NULL, 38, NULL),
(14, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 33, NULL),
(15, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 34, NULL),
(16, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 37, NULL),
(17, '', NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 43, NULL),
(19, 'this is testing', 'This is testing', '<p>This is testing</p>', 'Description', 'this is testing', '98121001800', 'This is testing', 'Company Images', NULL, 45, NULL),
(21, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 47, NULL),
(22, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 48, NULL),
(23, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 49, NULL),
(24, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 50, NULL),
(25, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 51, NULL),
(26, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 52, NULL),
(27, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 53, NULL),
(28, 'Manav private', 'magis be more do more', '<p>this is my company</p>', 'Description', 'sindhuli', 'sindhuli', 'ashishss3236b@gmail.com', 'Company Images', 'https://www.dnasbookdigimarket.com/uploads/back_photo/20180814_030202_thumb-1920-710865.jpg', 54, NULL),
(29, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 55, NULL),
(30, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 56, NULL),
(31, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 57, NULL),
(32, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 58, NULL),
(33, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 59, NULL),
(34, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 60, NULL),
(35, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 61, NULL),
(36, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 62, NULL),
(37, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 63, NULL),
(38, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 64, NULL),
(39, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 65, NULL),
(40, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 66, NULL),
(41, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 67, NULL),
(42, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 68, NULL),
(43, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 69, NULL),
(44, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 70, NULL),
(45, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 71, NULL),
(46, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 72, NULL),
(47, 'Hello', 'Hello World', '<p>Hello Worldddd</p>', 'Description', 'thapathali', '1111111111', 'atul.nepal@gmail.com', 'Company Images', 'http://dnasbookdigimarket.com/uploads/back_photo/20180901_055735_Sketch (1).png', 73, NULL),
(48, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 74, NULL),
(49, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 75, NULL),
(50, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 76, NULL),
(51, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 77, NULL),
(52, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 78, NULL),
(53, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 79, NULL),
(54, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 80, NULL),
(55, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 81, NULL),
(56, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 82, NULL),
(57, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 83, NULL),
(58, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 84, NULL),
(59, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 85, NULL),
(60, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 86, NULL),
(61, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 87, NULL),
(62, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 88, NULL),
(63, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 89, NULL),
(64, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 90, NULL),
(65, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 91, NULL),
(66, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 92, NULL),
(67, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 93, NULL),
(68, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 94, NULL),
(69, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 95, NULL),
(70, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 96, NULL),
(71, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 97, NULL),
(72, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 98, NULL),
(73, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 99, NULL),
(74, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 100, NULL),
(75, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 101, NULL),
(76, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 102, NULL),
(77, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 103, NULL),
(78, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 104, NULL),
(79, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 105, NULL),
(80, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 106, NULL),
(81, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 107, NULL),
(82, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 108, NULL),
(83, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 109, NULL),
(84, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 110, NULL),
(85, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 111, NULL),
(86, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 112, NULL),
(87, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 113, NULL),
(88, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 114, NULL),
(89, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 115, NULL),
(90, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 116, NULL),
(91, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 117, NULL),
(92, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 118, NULL),
(93, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 119, NULL),
(94, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 120, NULL),
(95, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 121, NULL),
(96, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 122, NULL),
(97, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 123, NULL),
(98, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 124, NULL),
(99, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 125, NULL),
(100, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 126, NULL),
(101, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 127, NULL),
(102, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 128, NULL),
(103, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 129, NULL),
(104, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 130, NULL),
(105, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 131, NULL),
(106, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 132, NULL),
(107, NULL, NULL, NULL, 'Description', NULL, NULL, NULL, 'Company Images', NULL, 133, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` enum('fr','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `slug`, `answer`, `created_at`, `updated_at`, `lang`) VALUES
(1, '1) What is Opportunity \"4\"?', '1-what-is-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>1) What is Opportunity &quot;4&quot;?</p>\r\n\r\n<p>Opportunity &quot;4&quot; is a software put together to help common people, everyday people who are trying to make the two ends meet, who are trying to put food on the table of the family ...... to get helped and in turn help other people to find this opportunity and free them financially! Selfish people cannot succeed in Opportunity &quot;4&quot;! The more you share Opportunity &quot;4&quot;, the more users subscribe under you, the more benefits you get!</p>', '2017-10-16 14:19:30', '2018-07-04 03:35:00', 'en'),
(4, '3) How Opportunity \"4\" pays your monthly fees?', '3-how-opportunity-4-pays-your-monthly-fees', '<p>&nbsp;</p>\r\n\r\n<p>3) How Opportunity &quot;4&quot; pays your monthly fees?</p>\r\n\r\n<p>Opportunity &quot;4&quot; pays your monthly fees from the time you have 10 subcribers in your team, no matter what level!&nbsp;(from level 1 to level 4). Why? Because for&nbsp;10 subscribers in your team, the system returns to you as benefit every month the amount of the monthly fee. You will begin making money in the system from the 11th subscriber in your group. The golden beginning in Opportunity &quot;4&quot; is to bring 20 subscribers in the system in your very 1st month, in the month you enter the system. Why? Please, see next question!</p>', '2018-07-05 03:32:21', '2018-09-11 22:27:48', 'en'),
(6, '4) How to NEVER pay fees in Opportunity \"4\"?', '4-how-to-never-pay-fees-in-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>4) How to NEVER pay fees in Opportunity &quot;4&quot;?</p>\r\n\r\n<p>To never pay fees in Opportunity &quot;4&quot;, you HAVE to bring 20 active subscribers into the system before the end of the month you enter Opportunity &quot;4&quot;! These 20 active subcribers might not be brought into the system by you only, as long as you have 20 active subcribers in your group, no matter what level they locate (from level 1 to 4), you are fine!&nbsp;Why? The percentage of the fees of the 20 active subscribers in your group will amount 2 times the monthly fees. Then at the end of the month,&nbsp;the system reimburses the fees you paid to enter the Opportunity &quot;4&quot; and you have another monthly fee for the next month fees payment. As you can see, it is like you never pay fees in the system because you are reimbursed the one you paid to enter the system and are given another monthly fee for the next month!</p>', '2018-07-05 04:01:20', '2018-09-11 22:27:10', 'en'),
(2, '2) Why Opportunity \"4\"?', '2-why-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>2) Why Opportunity &quot;4&quot;?</p>\r\n\r\n<p>Opportunity &quot;4&quot; is primarily created to help poor continents, specially Africa. We do believe at Opportunity &quot;4&quot; that all over the world, in both poor and rich countries, people have &quot;dreams&quot; and talents but these get put on hold or lost because of financial means. We believe that poor people from the poor areas of the world are, in no way, lesser than people from rich areas, what makes the difference is opportunities, the advantage people in rich areas have on people in poor areas of the world is rich areas have more opportunities than poor areas. To be born in a poor area&nbsp;is not a choice, it is a pure hazard, it is not even a God decision like some people might believe it, you find it out at birth! The same way you don&#39;t choose your parents and country, the same way you are not in control of your place of birth, you cannot even change it at your birth, you might leave it if you choose to but you cannot change.&nbsp;</p>\r\n\r\n<p>Opportunity &quot;4&quot; was created to give to poor areas of the world an opportunity their birth area might not give to them: easy financial means. We believe this will allow them to pursue their dreams and work on their talents we are so convinced they have.</p>', '2018-07-04 03:21:48', '2018-10-31 07:21:42', 'en'),
(7, '5) What is an active subscriber?', '5-what-is-an-active-subscriber', '<p>&nbsp;</p>\r\n\r\n<p>5) What is an active subscriber?</p>\r\n\r\n<p>An active subcriber is the subscriber who pays the monthly fees on time. You are only paid your benefits at the end of the month if you are active.</p>', '2018-07-05 04:05:11', '2018-09-11 22:26:52', 'en'),
(8, '6) Does Opportunity \"4\" involve sale?', '6-does-opportunity-4-involve-sale', '<p>&nbsp;</p>\r\n\r\n<p>6) Does Opportunity &quot;4&quot; involve sale?</p>\r\n\r\n<p>No! You don&#39;t have to sell anything in Opportunity &quot;4&quot;. The only thing you need to do is to share this opportunity, the more you share it, the bigger your benefits become!</p>', '2018-07-05 17:45:36', '2018-09-11 22:25:12', 'en'),
(9, '7) What is multiple accounts in Opportunity \"4\"?', '7-what-is-multiple-accounts-in-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>7) What is multiple accounts in Opportunity &quot;4&quot;?</p>\r\n\r\n<p>Opportunity &quot;4&quot; allows you to have as many as accounts you want. As long as you pay the fees of your accounts, you benefit from all of them. Why multiple accounts? Please, read the next question!</p>', '2018-07-05 18:05:58', '2018-09-11 22:25:47', 'en'),
(10, '8) Why having multiple accounts in Opportunity \"4\"?', '8-why-having-multiple-accounts-in-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>8) Why having multiple accounts in Opportunity &quot;4&quot;?</p>\r\n\r\n<p>We have challenges in Opportunity &quot;4&quot;. An account can only benefit from the challenges once, but if you have multiple accounts, you can benefit from the same challenge as many times as the number of your accounts when&nbsp;your accounts qualify.</p>', '2018-07-05 18:22:23', '2018-09-11 22:24:30', 'en'),
(11, '9) What are the challenges that we have in Opportunity \"4\"?', '9-what-are-the-challenges-that-we-have-in-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>9) What are the challenges that we have in Opportunity &quot;4&quot;?</p>\r\n\r\n<p>These are the challenges we have in Opportunity &quot;4&quot;? Please <a href=\"https://www.dnasbookdigimarket.com/pages/the-3-opportunity-4-challenges-and-their-rewards\">click here</a>!</p>\r\n\r\n<p>For an explanation in a video, please&nbsp;<a href=\"https://www.dnasbookdigimarket.com/user-academy/view/48\">click here</a>!</p>', '2018-07-05 23:27:17', '2018-09-11 22:26:29', 'en'),
(20, '1) Qu\'est-ce que l\'Opportunité \"4\"?', '1-qu-est-ce-que-l-opportunit-4', '<p><a name=\"1) Qu\'est-ce que l\'Opportunité \"></a></p>\r\n\r\n<div><a name=\"1) Qu\'est-ce que l\'Opportunité \">1) Qu&#39;est-ce que l&#39;Opportunit&eacute; &quot;4&quot;?</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a name=\"1) Qu\'est-ce que l\'Opportunité \"> </a></div>\r\n\r\n<div><a name=\"1) Qu\'est-ce que l\'Opportunité \">Opportunity &quot;4&quot; est un logiciel con&ccedil;u pour aider les gens ordinaires, les gens ordinaires qui essaient de joindre les deux bouts chaque jour, qui essaient de mettre de la nourriture sur la table de la famille ...... pour &ecirc;tre aid&eacute; et &agrave; tour aider les autres &agrave; trouver cette Opportunit&eacute; et les lib&eacute;rer financi&egrave;rement! Les personnes &eacute;go&iuml;stes ne peuvent pas r&eacute;ussir dans Opportunity &quot;4&quot;! Plus vous partagez l&#39;opportunit&eacute; &quot;4&quot;, plus nombreux sont les utilisateurs qui s&#39;abonnent sous vous, plus vous y b&eacute;n&eacute;ficiez d&#39;avantage!</a></div>', NULL, NULL, 'fr'),
(21, '2) Pourquoi l\'Opportunité \"4\"?', '2-pourquoi-l-opportunit-4', '<p>&nbsp;</p>\r\n\r\n<div><a name=\"2) Pourquoi l\'Opportunité \">2) Pourquoi l&#39;Opportunit&eacute; &quot;4&quot;?</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a name=\"2) Pourquoi l\'Opportunité \"> </a></div>\r\n\r\n<div><a name=\"2) Pourquoi l\'Opportunité \">L&#39;Opportunit&eacute; &quot;4&quot; est principalement cr&eacute;&eacute;e pour aider les continents pauvres, en particulier l&rsquo;Afrique. Nous pensons, &agrave; l&#39;Opportunit&eacute; &quot;4&quot;, que partout dans le monde, dans les pays riches comme dans les pays pauvres, les gens ont des &quot;r&ecirc;ves&quot; et des talents, mais ceux-ci sont laiss&eacute;s non r&eacute;alis&eacute;s ou perdus par manque de moyens financiers. Nous pensons que les pauvres des r&eacute;gions pauvres du monde ne sont en aucun cas inf&eacute;rieurs &agrave; ceux des r&eacute;gions riches. Ce qui fait la diff&eacute;rence, ce sont les opportunit&eacute;s qui s&#39;offrent &agrave; eux. L&#39;avantage que les habitants des r&eacute;gions riches ont sur les habitants des r&eacute;gions pauvres du monde est ce qu&#39;ils ont plus d&#39;opportunit&eacute;s que les zones pauvres. Na&icirc;tre dans une r&eacute;gion pauvre n&#39;est pas un choix, c&#39;est un pur hazard, ce n&#39;est m&ecirc;me pas une volont&eacute; divine, comme certaines personnes pourraient le croire, vous le d&eacute;couvrez &agrave; la naissance! De la m&ecirc;me mani&egrave;re que vous ne choisissez pas vos parents et votre pays, de la m&ecirc;me mani&egrave;re vous ne contr&ocirc;lez pas votre lieu de naissance, vous ne pouvez m&ecirc;me pas le changer &agrave; votre naissance, vous pouvez le laisser si vous le souhaitez mais vous ne pouvez pas le changer.....</a></div>\r\n\r\n<div><a name=\"2) Pourquoi l\'Opportunité \"> </a></div>\r\n\r\n<div><a name=\"2) Pourquoi l\'Opportunité \">L&#39;Opportunit&eacute; &quot;4&quot; a &eacute;t&eacute; cr&eacute;&eacute;e pour donner aux r&eacute;gions pauvres du monde une opportunit&eacute; que leur r&eacute;gion de naissance ne leur offrirait peut-&ecirc;tre pas: des moyens financiers faciles. Nous pensons que cela leur permettra de poursuivre leurs r&ecirc;ves et de mettre &agrave; profit leurs talents que nous sommes tellement convaincus qu&#39;ils ont!.</a></div>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li><a name=\"1) Qu\'est-ce que l\'Opportunité \"></a>\r\n\r\n	<div><a name=\"1) Qu\'est-ce que l\'Opportunité \"> </a></div>\r\n	</li>\r\n</ul>', NULL, NULL, 'fr'),
(22, '3) Commentaire Opportunité \"4\" règle vos frais mensuels?', '3-commentaire-opportunit-4-r-gle-vos-frais-mensuels', '<p>&nbsp;</p>\r\n\r\n<div><a name=\"3) Commentaire l\'Opportunité \">3) Commentaire Opportunit&eacute; &quot;4&quot; r&egrave;gle vos frais mensuels?</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a name=\"3) Commentaire l\'Opportunité \"> </a></div>\r\n\r\n<div><a name=\"3) Commentaire l\'Opportunité \">L&#39;Opportunit&eacute; &quot;4&quot; paie vos frais mensuels &agrave; partir de l&#39;instant o&ugrave; vous avez 10 abonn&eacute;s dans votre &eacute;quipe, quel soit leur niveau! (du niveau 1 au niveau 4). Pourquoi? Parce que pour 10 membres de votre &eacute;quipe, le syst&egrave;me vous paie chaque mois le montant des frais mensuels. Vous commencez &agrave; gagner de l&#39;argent dans le syst&egrave;me &agrave; partir du 11eme abonn&eacute; dans votre groupe. Un bon d&eacute;but dans l&#39;Opportunit&eacute; &quot;4&quot; consiste &agrave; amener 20 abonn&eacute;s dans le syst&egrave;me d&egrave;s le premier mois, le mois o&ugrave; vous entrez dans le syst&egrave;me. Pourquoi? S&#39;il vous pla&icirc;t, voir la question 4!</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \"></a>\r\n\r\n	<div><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \"> </a></div>\r\n	</li>\r\n</ul>', NULL, NULL, 'fr'),
(23, '4) Comment ne JAMAIS payer de frais dans l\'opportunité \"4\"?', '4-comment-ne-jamais-payer-de-frais-dans-l-opportunit-4', '<p><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \"></a></p>\r\n\r\n<div><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \">4) Comment ne JAMAIS payer de frais dans l&#39;opportunit&eacute; &quot;4&quot;?</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \"> </a></div>\r\n\r\n<div><a name=\"4) Comment ne JAMAIS payer de frais dans l\'Opportunité \">Pour ne jamais payer de frais dans l&#39;Opportunit&eacute; &quot;4&quot;, vous devez amener 20 abonn&eacute;s actifs dans le syst&egrave;me avant la fin du mois durant lequel vous entrez dans l&#39;Opportunit&eacute; &quot;4&quot;! Ces 20 abonn&eacute;s actifs peuvent ne pas &ecirc;tre introduits dans le syst&egrave;me par vous m&ecirc;me, tant que vous avez 20 abonn&eacute;s actifs dans votre groupe, quel que soit le niveau ils se trouvent (du niveau 1 au niveau 4), vous &ecirc;tes bien! Pourquoi? Le pourcentage des frais des 20 abonn&eacute;s actifs de votre groupe sera &eacute;gal &agrave; 2 fois les frais mensuels. Ainsi, &agrave; la fin du mois, le syst&egrave;me rembourse les frais que vous avez pay&eacute;s pour entrer dans l&#39;Opportunit&eacute; &quot;4&quot; et vous disposez d&#39;un autre frais mensuel pour le paiement des frais du mois suivant. Comme vous pouvez le constater, c&#39;est comme si vous n&#39;aviez jamais pay&eacute; de frais dans le syst&egrave;me, car nous vous remboursons les frais que vous avez pay&eacute; pour entrer dans le syst&egrave;me et vous recevez un autre frais mensuel pour le mois suivant!</a></div>\r\n\r\n<div>&nbsp;</div>', NULL, NULL, 'fr'),
(24, '5) Qu\'est-ce qu\'un abonné actif?', '5-qu-est-ce-qu-un-abonn-actif', '<p><a name=\"5) Qu\'est-ce qu\'un abonné actif?\"></a>5) Qu&#39;est-ce qu&#39;un abonn&eacute; actif?</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><a name=\"5) Qu\'est-ce qu\'un abonné actif?\">Un abonn&eacute; actif est l&rsquo;abonn&eacute; qui paie les frais mensuels &agrave; temps &agrave; la fin du mois. Vos commissions ne vous sont vers&eacute;es &agrave; la fin du mois que si vous &ecirc;tes actif.</a></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">&nbsp;</p>', NULL, NULL, 'fr'),
(25, '6) Vend-on quelque chose dans l’Opportunité \"4\"?', '6-vend-on-quelque-chose-dans-l-opportunit-4', '<p><a name=\"6) Vend-on quelque chose dans l’Opportunité \"></a></p>\r\n\r\n<div><a name=\"6) Vend-on quelque chose dans l’Opportunité \">6) Vend-on quelque chose dans l&rsquo;Opportunit&eacute; &quot;4&quot;?</a></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><a name=\"6) Vend-on quelque chose dans l’Opportunité \"> </a></div>\r\n\r\n<div><a name=\"6) Vend-on quelque chose dans l’Opportunité \">Non! Vous n&#39;avez rien &agrave; vendre dans l&#39;Opportunit&eacute; &quot;4&quot;. La seule chose que vous devez faire est de partager cette opportunit&eacute;, plus vous la partagez, plus vos commissions deviennent importantes!</a></div>\r\n\r\n<div>&nbsp;</div>', NULL, NULL, 'fr'),
(26, '7) C\'est quoi la pluralité de comptes dans l\'Opportunité \"4\"?', '7-c-est-quoi-la-pluralit-de-comptes-dans-l-opportunit-4', '<p>&nbsp;</p>\r\n\r\n<p><a name=\"7) C\'est quoi la pluralité de comptes dans l\'Opportunité \"></a>7) C&#39;est quoi la pluralit&eacute; de comptes dans l&#39;Opportunit&eacute; &quot;4&quot;?</p>\r\n\r\n<p><a name=\"7) C\'est quoi la pluralité de comptes dans l\'Opportunité \">L&#39;Opportunit&eacute; &quot;4&quot; vous permet d&#39;avoir autant de comptes que vous voulez. Tant que vous payez les frais de vos comptes, vous b&eacute;n&eacute;ficiez de tous ces comptes. Pourquoi plusieurs comptes? S&#39;il vous pla&icirc;t, lisez la question 8!</a></p>\r\n\r\n<ul style=\"list-style-type:none\">\r\n	<li><a name=\"8) Pourquoi avoir plusieurs comptes dans l\'Opportunité \"></a>\r\n\r\n	<div><a name=\"8) Pourquoi avoir plusieurs comptes dans l\'Opportunité \"> </a></div>\r\n	</li>\r\n</ul>', NULL, NULL, 'fr'),
(27, '8) Pourquoi avoir plusieurs comptes dans l\'Opportunité \"4\"?', '8-pourquoi-avoir-plusieurs-comptes-dans-l-opportunit-4', '<p>&nbsp;</p>\r\n\r\n<p><a name=\"8) Pourquoi avoir plusieurs comptes dans l\'Opportunité \"></a>8) Pourquoi avoir plusieurs comptes dans l&#39;Opportunit&eacute; &quot;4&quot;?</p>\r\n\r\n<div><a name=\"8) Pourquoi avoir plusieurs comptes dans l\'Opportunité \">Nous avons des d&eacute;fis dans l&#39;Opportunit&eacute; &quot;4&quot;. Un compte ne peut b&eacute;n&eacute;ficier des d&eacute;fis qu&#39;une seule fois, mais si vous avez plusieurs comptes, vous pouvez b&eacute;n&eacute;ficier du m&ecirc;me d&eacute;fi autant de fois de comptes que vous avez lorsque vos comptes sont qualifi&eacute;s.</a></div>\r\n\r\n<div>&nbsp;</div>', NULL, NULL, 'fr'),
(28, '9) Quels sont les défis que nous avons dans Opportunity \"4\"?', '9-quels-sont-les-d-fis-que-nous-avons-dans-opportunity-4', '<p>&nbsp;</p>\r\n\r\n<p>9) Quels sont les d&eacute;fis que nous avons dans Opportunity &quot;4&quot;?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ce sont les d&eacute;fis que nous avons dans l&#39;opportunit&eacute; &quot;4&quot;? <a href=\"https://www.dnasbookdigimarket.com/pages/les-3-defis-dans-opportunity-4\">Cliquez ici s&#39;il vous plait!</a></p>\r\n\r\n<p>Pour une explication dans une vid&eacute;o, <a href=\"https://www.dnasbookdigimarket.com/user-academy/view/50\">cliquez ici!</a></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `goal_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` enum('en','fr') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `goal_question`, `created_at`, `updated_at`, `lang`) VALUES
(24, 'Quels sont vos objectifs en adhérant l\'Opportunité \"4\" dans 2 ou 3 ans?', NULL, NULL, 'fr'),
(25, 'Quels sont vos plans MAINTENANT pour atteindre ces objectifs dans 2 ou 3 ans?', NULL, NULL, 'fr'),
(4, 'Do you know what it means that \"every subscriber at your 4 levels of benefits has the same monetary value for you\"? If you know, explain below, please! If you don\'t, write below \"Going to look for it\" and go and actually look for the answer for your success in Opportunity!', '2018-06-06 01:55:53', '2018-10-30 18:18:16', 'en'),
(5, 'Opportunity \"4\" pays your monthly fees every month. Do you know from which number of subscribers in your group (at your 4 levels) you stop paying monthly fees from your pocket? (If you don\'t, write below \"Going to look for it\" and go and actually look for the answer for your success in Opportunity!)', '2018-06-06 01:57:11', '2018-10-30 18:17:38', 'en'),
(6, 'You can never pay fees from your packet in Opportunity \"4\"! Do you know how? Please, explain how below! (If you don\'t, write below \"Going to look for it\" and go and actually look for the answer for your success in Opportunity!)', '2018-06-06 01:57:49', '2018-10-30 18:16:42', 'en'),
(7, 'What is Rule 20/20? Do you know your success in Opportunity lies on applying Rule 20/20? If you know, how do you apply Rule 20/20? (It is critical that you know how to apply Rule 20/20 to succeed quickly in Opportunity \"4\"!)', '2018-06-06 01:59:11', '2018-10-30 18:15:50', 'en'),
(8, 'What are your plans in place NOW to reach those goals in 2 or 3 years?', '2018-06-06 01:59:45', '2018-10-30 18:14:52', 'en'),
(9, 'What are your goals joining Opportunity \"4\" in 2 or 3 years from now?', '2018-06-06 02:00:46', '2018-10-30 18:14:10', 'en'),
(10, 'What are your goals joining Opportunity \"4\"?', '2018-06-06 02:01:42', '2018-10-30 18:13:19', 'en'),
(11, 'What is Opportunity \"4\" and what makes you join Opportunity \"4\"?', '2018-06-06 02:03:21', '2018-10-30 18:12:06', 'en'),
(12, 'Do you know it doesn\'t take money to succeed in Opportunity \"4\"? If you Know, what it takes to succeed in Opportunity \"4\"? (If you don\'t, write below \"Going to look for it\" and go and actually look for the answer for your success in Opportunity!)', '2018-06-06 02:04:37', '2018-10-30 18:11:28', 'en'),
(20, 'Quels sont vos objectifs en vous adhérant Opportunity \"4\"?', NULL, NULL, 'fr'),
(21, 'Qu\'est-ce que l\'Opportunité \"4\" et qu\'est-ce qui vous fait adhérer à l\'Opportunité \"4\"?', NULL, NULL, 'fr'),
(22, 'Who, besides you, will benefit from your success from Opportunity \"4\"?', NULL, NULL, 'en'),
(23, 'Do you have any plan for helping the community?', NULL, NULL, 'en'),
(26, 'Qu\'est-ce que la règle 20/20? Savez-vous que votre succès dans Opportunité \"4\" dépend 100% de l\'application de la règle 20/20? Si vous le savez, dites-nous comment appliquer la règle 20/20 en bas? (Il est essentiel que vous sachiez comment appliquer la règle 20/20 pour réussir rapidement dans l’opportunité \"4\"! Si vous ne le savez pas, écrivez ci-dessous \"Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\") et allez vraiment chercher la réponse à cette question pour votre succès dans l\'Opportunité \"4\"!)', NULL, NULL, 'fr'),
(27, 'Savez-vous que vous n\'avez pas besoin d\'argent pour réussir dans l\'Opportunity \"4\"? Si vous le savez, dites-nous ce qu\'il faut pour réussir dans Opportunity \"4\" en bas? (Si vous ne le savez pas, écrivez ci-dessous \"Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\") et allez vraiment chercher la réponse à cette question pour votre succès dans l\'Opportunité \"4\"!)', NULL, NULL, 'fr'),
(28, 'Vous pouvez ne jamais payer des frais mensuels dans Opportunity \"4\"! Savez-vous comment? Si vous le savez, s\'il vous plaît, expliquez comment ci-dessous! (Si vous ne le savez pas, écrivez ci-dessous \"Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\") et allez vraiment chercher la réponse à cette question pour votre succès dans l\'Opportunité \"4\"!)', NULL, NULL, 'fr'),
(29, 'Opportunity \"4\" paie vos frais mensuels tous les mois. Savez-vous à partir de combien d\'abonnés dans votre groupe (à vos 4 niveaux) vous arrêtez de payer des frais mensuels de votre poche? (Si vous ne le savez pas, écrivez ci-dessous \"Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\") et allez vraiment chercher la réponse à cette question pour votre succès dans l\'Opportunité \"4\"!)', NULL, NULL, 'fr'),
(30, 'Savez-vous ce que cela signifie que \"chaque abonné à vos 4 niveaux de benefices a la même valeur monétaire pour vous\"? Si vous le savez, expliquez ci-dessous, s\'il vous plaît! (Si vous ne le savez pas, écrivez ci-dessous \"Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\") et allez vraiment chercher la réponse à cette question pour votre succès dans l\'Opportunité \"4\"!)', NULL, NULL, 'fr'),
(31, 'Qui, à part vous, bénéficiera de votre succès dans Opportunity \"4\"?', NULL, NULL, 'fr'),
(32, 'Avez-vous un plan pour aider la communauté?', NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_percentage` decimal(5,2) NOT NULL,
  `active` enum('YES','NO') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_title`, `level_percentage`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Level One', '10.00', 'YES', '2017-10-16 13:35:25', '2017-10-16 13:35:25'),
(2, 'Level Two', '10.00', 'YES', '2017-10-16 13:35:41', '2018-06-02 01:02:13'),
(3, 'Level Three', '10.00', 'YES', '2017-10-16 13:38:16', '2018-05-14 12:00:06'),
(4, 'Level Four', '10.00', 'YES', '2017-11-27 23:42:39', '2017-11-27 23:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `sub_group_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_type` enum('VIDEO','COURSE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `payment_type` enum('RECURRING','ONE TIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_payment_button` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `group_id`, `sub_group_id`, `title`, `slug`, `description`, `material_type`, `video_url`, `course_url`, `price`, `payment_type`, `enable_payment_button`, `paypal_plan_id`, `created_at`, `updated_at`, `thumbnail_url`) VALUES
(55, 11, 1, '3- How To Calculate the $842 100?', '3-how-to-calculate-the-usd842-100', '<p>See how you can calculate the $842 100 at the end of the 4th month!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4EnglishWorldCalculMoneyAfter4Months.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-12-04 05:21:05', '2018-12-04 05:21:05', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181204_002105_Calculating the $842 100 1 .png'),
(27, 11, 1, '1-Automatic Webinar!', '1-automatic-webinar', '<p>This automatic webinar will show you &quot;Why Opportunity &quot;4&quot;?&quot;, &quot;Where this idea came from?&quot;, &quot;How you can benefit from it NOW?&quot;</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4EnglishWorldWebinarReducedFinal.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-07-27 00:16:01', '2018-11-27 04:54:24', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181126_235424_Automated WebinarW2.jpg'),
(28, 11, 11, '2- We pay your monthly fees!', '2-we-pay-your-monthly-fees', '<p>See How We Pay Your Monthly Fees!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4EnglishWorldFeesFinal.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-07-27 00:26:27', '2018-11-09 09:38:25', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_043825_We pay your fees monthly1.jpg'),
(40, 14, 15, '2) Nous payons vos frais mensuels! Comment? Regardez la video!', '2-nous-payons-vos-frais-mensuels-comment-regardez-la-video', '<p>A l&#39;Opportunity &quot;4&quot;, nous payons vos frais mensuels! Comment le faisons-nous et comment vous pouvez en profiter? Regardez la vid&eacute;o pour en savoir!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4FrenchWordPayerFraisFinal.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-10 04:21:24', '2018-11-09 16:51:55', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_115155_Nous payons vos frais mensuels2.jpg'),
(38, 14, 14, '1) Opportunity \"4\": Séminaire Automatique en Ligne.', '1-opportunity-4-seminaire-automatique-en-ligne', '<p>Ce s&eacute;minaire en ligne vous parle d&#39;un r&eacute;sum&eacute; succinct de l&#39;historique de l&#39;Opportuniy &quot;4&quot;, de son fondateur, qui il est, d&#39;o&ugrave; lui est venue l&#39;id&eacute;e et l&#39;objectif principal derri&egrave;re la mise au point, la cr&eacute;ation de l&#39;Opportunity &quot;4&quot; et comment vous pouvez commencer &agrave; en profiter aujourd&#39;hui!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4FrenchWorldWebinarFinal.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-08-28 20:44:19', '2018-11-09 16:44:10', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_114410_Seminaire automatique world1.jpg'),
(48, 11, 11, '5) Multiple Accounts & Challenges in Opportunity \"4\"!', '5-multiple-accounts-and-challenges-in-opportunity-4', '<p>Why multiple accounts in Opportunity &quot;4&quot;? We want you to benefit from Opportunity &quot;4&quot; the most! Multiple accounts allows you to have access to some amazing rewards in Opportunity &quot;4&quot; unlimited times! What are these rewards, how do you get access to them, how multiple accounts in Opportunity &quot;4&quot; changes the whole game? Watch this video!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4EnglishWorldChallengesAndRewards.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-18 17:51:03', '2018-11-09 09:47:00', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_044700_Multiple accounts and reward1.1jpg.jpg'),
(42, 14, 13, '3) Comment gagner $842 100 à la fin du quatrième mois?', '3-comment-gagner-usd842-100-a-la-fin-du-quatrieme-mois', '<p>Comment gagner <strong>$842 100.00</strong>&nbsp;&agrave; la fin du quatri&egrave;me mois? C&#39;est facile de le faire! Il faut seulement appliquer la r&egrave;gle 20/20! Comment? Regargez le vid&eacute;o!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4FrenchWorldCalculMoney4Month.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-12 02:28:00', '2018-11-09 16:59:59', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_115959_Calculating the $842 100 1.png'),
(44, 14, 13, '4) Ne jamais payer de frais dans l\'Opportunity \"4\"! Comment?', '4-ne-jamais-payer-de-frais-dans-l-opportunity-4-comment', '<p>Comment ne jamais payer les frais dans opportunity &quot;4&quot;? C&#39;est aussi loin que nous allons, vous pouvez ne jamais payer de frais dans l&#39;Opportunity &quot;4&quot;! Comment? La vid&eacute;o vous l&#39;explique! Pr&ecirc;tez attention!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4FrenchWorldNeJamaisPayerFraisEtNeMembreGratuit.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-12 02:54:32', '2018-11-09 17:03:18', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_120318_Never pay fees1.1jpg.jpg'),
(47, 11, 11, '4) How to never pay fees in Opportunity \"4\"?', '4-how-to-never-pay-fees-in-opportunity-4', '<p>How to never pay fees in Opportunity &quot;4&quot;? If you apply Rule 20/20, you will never pay fees in Opportunity &quot;4&quot;! Yes! It is that far we go! Just follow Rule 20/20, you will never pay fees in Opportunity &quot;4&quot;! How? Watch this video to see how!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4EnglishWorldNeverPayFeesAndHaveFreeMember.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-12 18:32:09', '2018-11-09 09:43:50', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_044350_Never pay fees1.jpg'),
(50, 14, 13, '5) Pluralité de Comptes, Défis et Récompenses dans Opportunity \"4\"!', '5-pluralite-de-comptes-defis-et-recompenses-dans-opportunity-4', '<p>Pluralit&eacute; de Comptes, D&eacute;fis et Recompenses dans Opportunity &quot;4&quot;! Oui, nous vous permettons d&#39;avoir plusieurs comptes dans Opportunity &quot;4&quot;! Pourquoi? C&#39;est pour une bonne raison, la vid&eacute;o vous la dit!</p>', 'VIDEO', 'https://www.dnasbookdigimarket.com/uploads/materials/Opportunity4FrenchWorldPluralitedeComptesDefisEtRecompenses.mp4', NULL, 0.00, 'ONE TIME', 'YES', NULL, '2018-09-20 01:26:02', '2018-11-09 17:07:43', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181109_120743_Multiple accounts and reward.1jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material_group`
--

CREATE TABLE `material_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `payment_type` enum('RECURRING','ONE TIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_payment_button` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` enum('en','fr') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_group`
--

INSERT INTO `material_group` (`id`, `title`, `slug`, `price`, `payment_type`, `enable_payment_button`, `paypal_plan_id`, `created_at`, `updated_at`, `group_thumbnail_url`, `lang`) VALUES
(11, 'OPPORTUNITY \"4\"', 'opportunity-4', 0.00, 'ONE TIME', 'YES', NULL, '2018-07-26 23:55:58', '2018-11-27 04:52:27', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181126_235227_Opportunity 4 thumbail.gif', 'en'),
(12, 'CPA', 'cpa', 0.00, 'RECURRING', 'YES', NULL, '2018-08-22 04:16:21', '2018-08-22 04:26:15', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20180822_002615_Introductory.jpg', 'en'),
(14, 'Opportunité \"4\"', 'opportunite-4', 0.00, 'ONE TIME', 'YES', NULL, '2018-08-28 20:32:47', '2018-11-27 04:50:39', 'https://www.dnasbookdigimarket.com/uploads/thumbnails/20181126_235039_Opportunity 4 Francais.jpg', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `material_sub_group`
--

CREATE TABLE `material_sub_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `payment_type` enum('RECURRING','ONE TIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_payment_button` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_sub_group`
--

INSERT INTO `material_sub_group` (`id`, `group_id`, `title`, `slug`, `price`, `payment_type`, `enable_payment_button`, `paypal_plan_id`, `created_at`, `updated_at`) VALUES
(1, 11, 'OPPORTUNITY \"4\"', 'opportunity-4', 0.00, 'ONE TIME', 'YES', NULL, '2018-11-27 04:53:11', '2018-11-27 04:53:11'),
(2, 14, 'OPPORTUNITE \"4\"', 'opportunite-4', 0.00, 'ONE TIME', 'YES', NULL, '2018-11-27 04:53:41', '2018-11-27 04:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `from_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `to_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `readed` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `from_username`, `to_user_id`, `to_username`, `subject`, `message`, `deleted`, `readed`, `created_at`, `updated_at`) VALUES
(48, 2, 'ahiadjipe', 9, 'ownrox', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(47, 2, 'ahiadjipe', 8, 'ahiadjipecharles', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(46, 2, 'ahiadjipe', 7, 'ahiadjipecaleb', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(45, 2, 'ahiadjipe', 6, 'ahiadjipeagnes', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(44, 1, 'admin', 5, 'tariq', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(43, 1, 'admin', 2, 'ahiadjipe', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(42, 1, 'admin', 99, 'ramam', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(41, 1, 'admin', 97, 'Paul', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(40, 1, 'admin', 131, 'Yawaahiadjipexanudf', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(39, 1, 'admin', 133, 'Yawaahiadjipexanuu', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(38, 1, 'admin', 124, 'ashish34', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(37, 1, 'admin', 125, 'atul_grepsr', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(36, 1, 'admin', 103, 'abbasjami47', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(35, 1, 'admin', 51, 'anmolanmol', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(34, 1, 'admin', 43, 'anmoldhungana', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(33, 1, 'admin', 129, 'atul336', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(32, 1, 'admin', 104, 'avialex85', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(31, 1, 'admin', 45, 'ashish336b1', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(30, 1, 'admin', 10, 'Scott1111', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(29, 1, 'admin', 9, 'ownrox', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(28, 1, 'admin', 8, 'ahiadjipecharles', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(27, 1, 'admin', 7, 'ahiadjipecaleb', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(26, 1, 'admin', 6, 'ahiadjipeagnes', 'This is group message testing', 'This is also group message testing', 'NO', 'NO', '2018-12-07 18:42:48', NULL),
(49, 2, 'ahiadjipe', 10, 'Scott1111', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(50, 2, 'ahiadjipe', 45, 'ashish336b1', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(51, 2, 'ahiadjipe', 104, 'avialex85', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(52, 2, 'ahiadjipe', 129, 'atul336', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(53, 2, 'ahiadjipe', 43, 'anmoldhungana', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(54, 2, 'ahiadjipe', 51, 'anmolanmol', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(55, 2, 'ahiadjipe', 103, 'abbasjami47', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(56, 2, 'ahiadjipe', 125, 'atul_grepsr', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(57, 2, 'ahiadjipe', 124, 'ashish34', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(58, 2, 'ahiadjipe', 133, 'Yawaahiadjipexanuu', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(59, 2, 'ahiadjipe', 131, 'Yawaahiadjipexanudf', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(60, 2, 'ahiadjipe', 97, 'Paul', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL),
(61, 2, 'ahiadjipe', 99, 'ramam', 'Why are tacking money from my commissions', 'Hello everybody!', 'NO', 'NO', '2018-12-08 14:34:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(40, '2014_10_12_000000_create_users_table', 31),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(35, '2017_09_07_035222_create_user_comments_table', 27),
(44, '2017_11_21_043947_create_payments_details_table', 32),
(7, '2017_09_07_035704_create_user_goals_table', 5),
(8, '2017_09_07_035916_create_news_table', 6),
(9, '2017_09_07_040056_create_faqs_table', 7),
(23, '2017_09_07_040422_create_levels_table', 18),
(11, '2017_09_07_040703_create_user_levels_table', 9),
(52, '2017_09_07_040801_create_user_commissions_table', 35),
(29, '2017_09_24_174144_create_material_sub_group_table', 23),
(28, '2017_09_24_173834_create_material_group_table', 23),
(45, '2017_11_23_052120_create_payment_profiles_table', 33),
(18, '2017_09_30_175254_add_paid_for_to_user_payments_table', 15),
(34, '2017_10_08_172715_add_parent_id_to_users_table', 26),
(22, '2017_09_07_035443_create_goals_table', 17),
(46, '2017_11_21_043828_create_payments_table', 34),
(31, '2017_09_24_174859_create_material_table', 24),
(36, '2017_11_04_165444_create_states_table', 28),
(37, '2017_11_04_173650_create_country_table', 29),
(38, '2017_11_04_174214_create_billing_profile_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang` enum('fr','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`, `lang`) VALUES
(1, 'Why Opportunity \"4\"?', 'why-opportunity-4', '<p>Why Opportunity &quot;4&quot;? Where the idea of Opportunity &quot;4&quot; came from? Thomas, CEO/Founder of Opportunity &quot;4&quot; was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he said this:</p>\r\n\r\n<p>The best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. This means that the best way to help someone is to make sure that after the help the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today.</p>', '2017-10-15 12:45:24', '2018-07-05 00:55:22', 'en'),
(2, 'Pourquoi Opportunity \"4\"?', 'pourquoi-opportunity-4', '<p>Pourquoi Opportunity &quot;4&quot;? D&#39;o&ugrave; vient l&#39;id&eacute;e de l&#39;opportunit&eacute; &quot;4&quot;? Thomas, PDG / fondateur d&rsquo;Opportunity &quot;4&quot;, &eacute;coutait un pr&eacute;sident africain un jour dans son adolescence et ce dernier a dit quelque chose qui a chang&eacute; sa vie! Le pr&eacute;sident pronon&ccedil;ait un discours sur la mani&egrave;re dont les Africains peuvent s&#39;entraider, comment mieux aider les personnes dans le besoin! R&eacute;pondant &agrave; sa propre question, il dit ceci:</p>\r\n\r\n<p>Le meilleur moyen d&rsquo;aider une personne qui a besoin de poisson &agrave; survivre est &quot;de ne pas apporter de poisson &agrave; la personne tous les jours, mais bien de l&rsquo;amener &agrave; la p&ecirc;che&quot;. Cela signifie que le meilleur moyen d&rsquo;aider une personne est de s&rsquo;assurer qu&rsquo;apr&egrave;s l&rsquo;aide, cette personne devient autonome et capable de prendre soin de elle-m&ecirc;me et d&rsquo;aider les autres &agrave; se soigner &eacute;galement. Ce discours devient le &quot;p&egrave;re&quot; de Opportunity &quot;4&quot; aujourd&#39;hui.</p>', '2018-11-01 19:39:25', '2018-11-01 19:39:25', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `offline_pay`
--

CREATE TABLE `offline_pay` (
  `id` int(12) NOT NULL,
  `name_of_subscriber` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `bank_slip_no` varchar(255) NOT NULL,
  `amount_paid` int(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `receipt_photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offline_pay`
--

INSERT INTO `offline_pay` (`id`, `name_of_subscriber`, `country`, `bank_slip_no`, `amount_paid`, `payment_type`, `account_no`, `receipt_photo`) VALUES
(20, 'Authorlamo', 'seeria', '12', 10000, 'bank', '12', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_130704_Capture.PNG'),
(13, 'Author', 'nepal', '12121212', 10000, 'bank', 'abhishek.bhandari336@gmail.com', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181124_045345_2018-11-24.png'),
(14, 'Yaovi', 'United States', 'AS1256HJ546HGYT', 50, 'Bank', '01237465UI765', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181126_233559_Automated WebinarW1.jpg'),
(15, 'asdf', 'asdf', '2323121324', 10000, 'bank', 'sdf', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_103330_Capture.PNG'),
(16, 'lamo', 'lamo', '11111111', 50000, 'bank', '45454545', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_103527_Capture.PNG'),
(17, 'haddi', 'haddi', '45', 10000, 'bank', '45', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_124812_Capture.PNG'),
(18, 'haddilamo', 'haddilamo', 'haddilamo', 20000, 'haddilamo', 'haddilamo', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_125918_Capture.PNG'),
(19, 'Authorsdfd', 'Nepal', '12121212', 2332323, 'bank', 'aabb@gmail.com', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_130052_Capture.PNG'),
(21, 'ladodal', 'nepal', '336', 20000, 'bank', '336', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_130838_Capture.PNG'),
(22, 'testing', 'Testo', '1212', 20000, 'Bank', '3030', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181127_145620_Capture.PNG'),
(23, 'Yaovi', 'United States', 'AS1256HJ546HGYT', 50, 'Well Fargo', 'yahiadjipe@yahoo.com', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181128_172100_Automated WebinarW1.jpg'),
(24, 'DNAsbook', 'United States', 'AS1256HJ546HGYT34', 1000, 'Capital One', 'yahiadjipe@yahoo.com', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181204_021340_Automated WebinarW2.jpg'),
(25, 'DNAsbook', 'United States', 'AS1256HJ546HGYTdfg2345', 100000, 'Capital One', '234567890', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181211_210058_Automatic Webinar.jpg'),
(26, 'DNAsbook', 'United States', 'AS1256HJ546HGYTdfg2345', 100000, 'Capital One', '234567890', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181211_210119_Automatic Webinar.jpg'),
(27, 'om', 'nawa', '1010101010', 101, 'Shiwaye', '10101010101', 'https://www.dnasbookdigimarket.com/uploads/receipt_photo/20181212_162320_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` enum('PUBLISHED','DRAFT','TRASHED') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_sidebar_block_id` int(11) DEFAULT NULL,
  `right_sidebar_block_id` int(11) DEFAULT NULL,
  `type` enum('PAGE','BLOCK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` enum('NO SIDEBAR','LEFT SIDEBAR','RIGHT SIDEBAR','LEFT & RIGHT SIDEBARS') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language` enum('en','fr') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `status`, `parent_id`, `title`, `slug`, `content`, `left_sidebar_block_id`, `right_sidebar_block_id`, `type`, `layout`, `created_at`, `updated_at`, `language`) VALUES
(1, NULL, NULL, 'Our Services Title', 'our-services-title', '<p><a href=\"http://www.dnasbookdigimarket.com/page-one-edit\">Click to view Second Page</a></p>\r\n\r\n<p><a href=\"http://www.gmail.com\" target=\"_blank\">Click to view GMail</a></p>', NULL, NULL, 'BLOCK', NULL, '2017-12-11 12:12:29', '2018-11-01 19:51:33', 'fr'),
(2, 'PUBLISHED', NULL, 'Page One Edit', 'page-one-edit', '<h1>this is sample content for page One</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong><strong>Lisez attentivement les diff&eacute;rents contrats, leurs termes et conditions! Faites votre chois de contrat et remplissez-en sa&nbsp;<strong>pr&eacute;application</strong>&nbsp;en ligne. Attendez une r&eacute;ponse du si&egrave;ge mondial de DNAsbook General, USA, par email (par l&#39;email que vous avez mis sur votre pr&eacute;application), laquelle r&eacute;ponse vous dira si votre application est accept&eacute;e ou pas. Au cas o&uacute; il y a des insuffisances, on vous dira&nbsp;quelles en sont les raisons. Si vous avez besoin de choses suppl&eacute;mentaires pour vous faire qualifier, l&#39;email vous le dira. Si dans 2 semaines (14 jours) vous n&#39;avez pas re&ccedil;u de r&eacute;ponse, contactez-nous (dnasbookcom@dnasbook.com) sans tarder!</strong></strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 'PAGE', 'RIGHT SIDEBAR', '2017-12-11 12:44:51', '2018-06-12 00:09:15', 'en'),
(4, 'PUBLISHED', NULL, 'Home', 'home', '<div>\r\n<div>\r\n<div style=\"margin-left:0px\">\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div><strong>ABOUT US</strong></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- No Footer -->\r\n\r\n<p><img alt=\"\" src=\"https://static.wixstatic.com/media/ea71bb_e7959a5be116482b9727a9be900d2d35~mv2_d_5454_3840_s_4_2.jpg\" style=\"float:right; height:221px; width:314px\" /></p>\r\n\r\n<p>&nbsp;Why Opportunity &quot;4&quot;?</p>\r\n\r\n<p>Where the idea of Opportunity &quot;4&quot; came from? Thomas, CEO/Founder</p>\r\n\r\n<p>of Opportunity &quot;4&quot;&nbsp;was listening to an&nbsp;African president one</p>\r\n\r\n<p>day&nbsp;in his early teenage years and the president said something that&nbsp;</p>\r\n\r\n<p>changed his&nbsp;life! The president was giving a speech on how Africans</p>\r\n\r\n<p>can help each other, how best&nbsp;they can help someone in need!</p>\r\n\r\n<p>Answering his own question, he gave an example....</p>\r\n\r\n<p>​</p>\r\n\r\n<p>He said the best way to help someone in need of fish to survive is</p>\r\n\r\n<p>&quot;not bringing fishes to the person everyday but is to bring</p>\r\n\r\n<p>the person to the fish&quot;. This means that the best way to help someone</p>\r\n\r\n<p>is to make sure that after the help the person becomes independent,&nbsp;</p>\r\n\r\n<p>can be able to take care of himself and help other people to&nbsp;</p>\r\n\r\n<p>care of themselves too.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today. How?</p>', NULL, 1, 'PAGE', 'RIGHT SIDEBAR', '2017-12-15 22:19:46', '2018-06-12 02:10:14', 'en'),
(5, 'PUBLISHED', NULL, 'About Us', 'about-us', '<p>&nbsp;</p>\r\n\r\n<h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <em><strong>Why&nbsp;DNAsbook Digital Marketing?</strong></em></h1>\r\n\r\n<p>Why opportunity &quot;4&quot;? Where the idea of Opportunity &quot;5&quot; came from? Thomas, CEO/Founder of Opportunity &quot;4&quot; was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he gave an example....</p>\r\n\r\n<p>He said the best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. This means that the best way to help someone is to make sure that after the help the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today. How?</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=OLSqdQCzCgo&amp;t=2s\" target=\"_blank\">Watch This Video</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-07-01 00:59:59', '2018-07-11 07:46:13', 'en'),
(6, NULL, NULL, 'Why Opportunity \"4\"?', 'why-opportunity-4', '<p>Why Opportunity &quot;4&quot;? Where the idea of Opportunity &quot;4&quot; came from? Thomas, CEO/Founder of Opportunity &quot;4&quot; was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he said this:</p>\r\n\r\n<p>The best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. This means that the best way to help someone is to make sure that after the help the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today.</p>', NULL, NULL, 'BLOCK', NULL, '2018-07-05 00:57:10', '2018-11-01 19:51:23', 'fr'),
(21, 'PUBLISHED', NULL, 'The 3 Opportunity 4 challenges and Their Rewards', 'the-3-opportunity-4-challenges-and-their-rewards', '<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>1) Rule 100/30 for 3 months</div>\r\n\r\n<div>4) 90 000 x 30 = 2 700 000; 2 700 000 x $50 = 135 000 000; $135 000 000 x 10% = $13 500 000</div>\r\n\r\n<div>3) 3 000 x 30 = 90 000; $90 000 x $50 = $4 500 000; $4 500 000 x 10% = $450 000</div>\r\n\r\n<div>2) 100 x 30 = 3 000; $3 000 x $50 = $150 000; $150 000 x 10% = $15 000</div>\r\n\r\n<div>1) 100; 100 x $50 = $5 000; $5 000 x 10% = $500</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $500 + $15 000 + $450 000 + $13 500 000 = $13 965 500</div>\r\n\r\n<div>You must maintain this for 3 months: $13 965 500 x 3 = $41 896 500</div>\r\n\r\n<div>If you earn $14 000 000 or more for 3 months, then you successfully reach the challenge 1!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Rewards: $1 000 000 towards the purchase of a luxury car, house, boat etc...</div>\r\n\r\n<div>Want to take the money cash? Please, see conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>2) Rule 200/60 for 2 months</div>\r\n\r\n<div>4) 720 000 x 60 = 43 200 000; $43 200 000 x $50 = $2 160 000 000; $ 2 160 000 000 x 10% = $216 000 000</div>\r\n\r\n<div>3) 12 000 x 60 = 720 000; 720 000 x $50 = $36 000 000; $36 000 000 x 10% = $3 600 000</div>\r\n\r\n<div>2) 200 x 60 = 12 000; 12 000 x $50 = $600 000; $600 000 x 10% = $60 000</div>\r\n\r\n<div>1) 200; 200 x $50 = $10 000; $10 000 x 10% = $1 000</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $1 000 + $60 000 + $3 600 000 + $216 000 000 = $219 661 000</div>\r\n\r\n<div>You must maintain this for 2 months: $439 322 000</div>\r\n\r\n<div>If you earn $220 000 000 or more for 2 months, then you successfully reach the challenge 2!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Rewards: $2 000 000 towards the purchase of a luxury car, house, boat etc...</div>\r\n\r\n<div>Want to take the money cash? Please, see conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>3) Rule 300/90 for just one month</div>\r\n\r\n<div>4) 2 430 000 x 90 = 218 700 000; 218 700 000 x $50 = $10 935 000 000; $10 935 000 000 x 10% = $1 093 500 000</div>\r\n\r\n<div>3) 27 000 x 90 = 2 430 000; 2 430 000 x $50 = $121 500 000; $121 500 000 x 10% = $12 150 000</div>\r\n\r\n<div>2) 300 x 90 = 27 000; 27 000 x $50 = $1 350 000; $1 350 000 x 10% = $135 000</div>\r\n\r\n<div>1) 300; 300 x $50 = $15 000; $15 000 x 10% = $1 500</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $ 1 500 + $135 000 + $12 150 000 + $1 093 500 000 = $1 105 786 500</div>\r\n\r\n<div>Just for one month!</div>\r\n\r\n<div>If you earn $1 200 000 000 or more for just one month, then you successfully reach the challenge 3!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Reward: $3 000 000 towards the purchase of a luxury car, house, boat et...</div>\r\n\r\n<div>Want to take the money cash? Please, see conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>There are termes and conditions governing these challenges.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>For an explanation in a video, please <a href=\"https://www.dnasbookdigimarket.com/user-academy/view/48\">click here</a>!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-11-14 21:08:42', '2018-11-14 21:16:17', 'en'),
(8, 'PUBLISHED', NULL, 'Testing Page with French', 'testing-page-with-french', '<p>asdfasdfasdfasdfasd</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-07-11 08:48:50', '2018-07-11 08:48:50', 'fr'),
(9, 'PUBLISHED', 5, 'Why Opportunity  4 was created', 'why-opportunity-4-was-created', '<h1>&nbsp;</h1>\r\n\r\n<p>Why Opportunity &quot;4&quot;? Where the idea of Opportunity &quot;4&quot; came from? I&nbsp;was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he gave an example....</p>\r\n\r\n<p>He said the best way to help someone in need of fish to survive is &quot;not bringing fishes to the person everyday but is to bring the person to the fish&quot;. How can you bring someone to the fish? You bring someone to the fish if you bring the person to&nbsp;the river, to the see or to wherever you fish and teach&nbsp;the person how to fish himself, that is the&nbsp;best way to help someone. If you help someone this way, after the help, the person becomes independent, can be able to take care of himself and help other people to care of themselves too. That speech becomes the &quot;father&quot; of Opportunity &quot;4&quot; today. How?</p>\r\n\r\n<p>In my tennage years, acquiring good education was the goal with the believe that good education automatically gives good job, future etc... Unfortunately, we quickly realized that it was not the case! People went to school but could not find job. Why? The government was and is still today the principal source of jobs with better benefits. The private sector was not and is still not today developed. People was discouraged and left school. Results: Poverty!&nbsp;</p>\r\n\r\n<p>I began thinking of a possible solution..... And I happened to come to USA. When looking for possible reasons why USA is so economically powerful, I noticed the private sector specially the entrepreneurship. This particularly retains my attention because if we can develop the private sector in Africa through entrepreneurship, our financial problems might find serious solutions if not resolved. It is&nbsp;thinking about this that I came up with Opportunity &quot;4&quot;. It is American entrepeneurship &quot;africanized&quot; to the point that I even eliminate for users the monthly fee&nbsp;payments (they are generated by the system for the users). All this is possible by using a famous rule I invented: Rule 20/20.</p>\r\n\r\n<p>With rule 20/20 applied to Opportunity &quot;4&quot;, you can be able to generate $842 100 at the end of your 4th month entering the system. If you follow rule 20/20 as explained, the $842 100 are guaranteed at the end of the 4th month! <a href=\"http://www.dnasbookdigimarket.com/user-academy/view/15\">Watch this video to see how!</a></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-07-11 12:27:10', '2018-11-14 20:04:18', 'en'),
(12, NULL, NULL, 'unemployed', 'unemployed', '<p>safasdfasdfasf</p>', NULL, NULL, 'BLOCK', NULL, '2018-11-01 19:51:45', '2018-11-01 19:51:45', 'fr'),
(22, 'PUBLISHED', NULL, 'Les 3 defis dans Opportunity 4', 'les-3-defis-dans-opportunity-4', '<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>1) R&egrave;gle 100/30 pour 3 mois</div>\r\n\r\n<div>4) 90 000 x 30 = 2 700 000; 2 700 000 x $50 = 135 000 000; $135 000 000 x 10% = $13 500 000</div>\r\n\r\n<div>3) 3 000 x 30 = 90 000; $90 000 x $50 = $4 500 000; $4 500 000 x 10% = $450 000</div>\r\n\r\n<div>2) 100 x 30 = 3 000; $3 000 x $50 = $150 000; $150 000 x 10% = $15 000</div>\r\n\r\n<div>1) 100; 100 x $50 = $5 000; $5 000 x 10% = $500</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $500 + $15 000 + $450 000 + $13 500 000 = $13 965 500</div>\r\n\r\n<div>Vous devez maintenir ce niveau pour 3 mois cons&eacute;cutifs: $13 965 500 x 3 = $41 896 500</div>\r\n\r\n<div>Si vous gagnez $14 000 000 ou au delas pour 3 mois cons&eacute;cutifs alors vous avez relev&eacute; le d&eacute;fi 1!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>R&eacute;compenses: $1 000 000 pour l&#39;achat d&#39;une voiture de luxe, maison, bateau etc ...</div>\r\n\r\n<div>Vous voulez plut&ocirc;t prendre l&#39;argent en esp&egrave;ces? S&#39;il vous pla&icirc;t, lisez les conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>2) R&egrave;gle 200/60 pour 2 mois</div>\r\n\r\n<div>4) 720 000 x 60 = 43 200 000; $43 200 000 x $50 = $2 160 000 000; $ 2 160 000 000 x 10% = $216 000 000</div>\r\n\r\n<div>3) 12 000 x 60 = 720 000; 720 000 x $50 = $36 000 000; $36 000 000 x 10% = $3 600 000</div>\r\n\r\n<div>2) 200 x 60 = 12 000; 12 000 x $50 = $600 000; $600 000 x 10% = $60 000</div>\r\n\r\n<div>1) 200; 200 x $50 = $10 000; $10 000 x 10% = $1 000</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $1 000 + $60 000 + $3 600 000 + $216 000 000 = $219 661 000</div>\r\n\r\n<div>Vous devez maintenir ce niveau pour 2 mois cons&eacute;cutifs: $219 661 000 x 2 = $439 322 000</div>\r\n\r\n<div>Si vous gagnez $220 000 000 ou au-del&agrave; pour 2 mois cons&eacute;cutifs alors vous avez relev&eacute; le d&eacute;fi 2!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>R&eacute;compenses: $2 000 000 pour l&#39;achat d&#39;une voiture de luxe, maison, bateau etc ...</div>\r\n\r\n<div>Vous voulez plut&ocirc;t prendre l&#39;argent en esp&egrave;ces? S&#39;il vous pla&icirc;t, lisez les conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>3) R&egrave;gle 300/90 pour tout juste un mois</div>\r\n\r\n<div>4) 2 430 000 x 90 = 218 700 000; 218 700 000 x $50 = $10 935 000 000; $10 935 000 000 x 10% = $1 093 500 000</div>\r\n\r\n<div>3) 27 000 x 90 = 2 430 000; 2 430 000 x $50 = $121 500 000; $121 500 000 x 10% = $12 150 000</div>\r\n\r\n<div>2) 300 x 90 = 27 000; 27 000 x $50 = $1 350 000; $1 350 000 x 10% = $135 000</div>\r\n\r\n<div>1) 300; 300 x $50 = $15 000; $15 000 x 10% = $1 500</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Total: $ 1 500 + $135 000 + $12 150 000 + $1 093 500 000 = $1 105 786 500</div>\r\n\r\n<div>Pour tout just un mois!</div>\r\n\r\n<div>Si vous gagnez $1 200 000 000 ou au-del&agrave; pour 1 mois alors vous avez avez relev&eacute; le d&eacute;fi 3!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>R&eacute;compenses: $3 000 000 pour l&#39;achat d&#39;une voiture de luxe, maison, bateau etc ...</div>\r\n\r\n<div>Vous voulez plut&ocirc;t prendre l&#39;argent en esp&egrave;ces? S&#39;il vous pla&icirc;t, lisez les conditions!</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Il y a des termes et conditions qui r&eacute;gissent ces d&eacute;fis.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Pour une explication en video, <a href=\"https://www.dnasbookdigimarket.com/user-academy/view/50\">cliquez ici!</a></div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-11-14 21:26:03', '2018-11-14 21:36:57', 'fr'),
(17, 'PUBLISHED', NULL, 'Testing Software Page', 'testing-software-page', '<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://translate.google.com/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Google Translate</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://translate.google.com/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://translate.google.com/</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Google&#39;s free service instantly <strong>translates</strong> words, phrases, and web pages between English and over 100 other languages.</div>\r\n</div>\r\n</div>\r\n\r\n<table class=\"nrgt\" style=\"border:undefined; margin-left:22px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div>\r\n			<h3><a class=\"l\" href=\"https://translate.google.com/?sl=pl\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Spanish</a></h3>\r\n\r\n			<div>\r\n			<div>Google&#39;s free service instantly translates words, phrases, and ...</div>\r\n			</div>\r\n			</div>\r\n			</td>\r\n			<td>\r\n			<div>\r\n			<h3><a class=\"l\" href=\"https://translate.google.com/?tl=hi\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">English</a></h3>\r\n\r\n			<div>\r\n			<div>... phrases, and web pages between English and over 100 ...</div>\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<div>\r\n			<h3><a class=\"l\" href=\"https://translate.google.com/community\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Translate Community</a></h3>\r\n\r\n			<div>\r\n			<div>Teach Google Translate how to speak your language better. It&#39;s ...</div>\r\n			</div>\r\n			</div>\r\n			</td>\r\n			<td>\r\n			<div>\r\n			<h3><a class=\"l\" href=\"https://translate.google.com/?tl=fa\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Persian</a></h3>\r\n\r\n			<div>\r\n			<div>French. Detect language. Persian. English. Spanish. Translate text ...</div>\r\n			</div>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n			<div><a class=\"fl\" href=\"https://www.google.com/search?q=+site:google.com+translate&amp;sa=X&amp;ved=2ahUKEwj9poW5hdTeAhWEdN8KHftvDfMQrAN6BAgAEBA\" style=\"text-decoration-line:none; color:#1a0dab; cursor:pointer\">More results from google.com &raquo;</a></div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<h2>Web results</h2>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://www.translate.com/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Translate</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://www.translate.com/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://www.translate.com/</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div><strong>Translate</strong> offers both professional human and machine translations between 75 languages. Translators can also edit paid jobs via our online portal.</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<div>\r\n<h3><a href=\"https://itunes.apple.com/us/app/google-translate/id414706506?mt=8\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Google Translate on the App Store - iTunes - Apple</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://itunes.apple.com/us/app/google-translate/id414706506?mt=8\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://itunes.apple.com/us/app/google-translate/id414706506?mt=8</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>Rating: 4.5 - &lrm;25,917 reviews - &lrm;Free - &lrm;iOS - &lrm;Reference</div>\r\nRead reviews, compare customer ratings, see screenshots, and learn more about Google <strong>Translate</strong>. Download Google <strong>Translate</strong> and enjoy it on your iPhone, ...</div>\r\n\r\n<div>\r\n<div style=\"margin-left:-15px; margin-right:-15px\">\r\n<div>\r\n<div>\r\n<h4 style=\"margin-left:0px; margin-right:20px\">People also search for</h4>\r\n\r\n<div style=\"margin-left:0px\">\r\n<div><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=bing%20translate&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAB6BAgBEAE\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">bing translate</a><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=spanish%20dictionary&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAF6BAgBEAI\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">spanish dictionary</a><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=word%20reference&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAJ6BAgBEAM\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">word reference</a></div>\r\n\r\n<div><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=video%20lte%20download&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAN6BAgBEAQ\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">video lte download</a><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=download%20google%20app%20for%20iphone&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAR6BAgBEAU\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">download google app for iphone</a><a class=\"exp-r\" href=\"https://www.google.com/search?lei=NirsW_2zK4Tp_Qb737WYDw&amp;q=gmail%20app%20store&amp;ved=2ahUKEwjUt7-5hdTeAhVDT98KHVJxCcMQsKwBKAV6BAgBEAY\" style=\"display:block; margin-right:16px; margin-bottom:0px; color:#660099; cursor:pointer; text-decoration-line:none\">gmail app store</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://dictionary.cambridge.org/translate/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">TRANSLATE in English, Spanish, French and more with Cambridge</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://dictionary.cambridge.org/translate/\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://dictionary.cambridge.org/translate/</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Get a quick, free <strong>translation</strong>! First, choose your From and To languages. Then, type your text&mdash;up to 160 characters each time, up to 2,000 per day&mdash;and click on ...</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://play.google.com/store/apps/details?id=com.google.android.apps.translate&amp;hl=en_US\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Google Translate - Apps on Google Play</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://play.google.com/store/apps/details?id=com.google.android.apps.translate&amp;hl=en_US\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://play.google.com/store/apps/details?id=com.google.android...translate&amp;hl...</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div><strong>Translate</strong> between 103 languages by typing &bull; Tap to <strong>Translate</strong>: Copy text in any app and your<strong>translation</strong> pops up &bull; Offline: <strong>Translate</strong> 59 languages when you ...</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"http://www.spanishdict.com/translation\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">Spanish Translation | Spanish to English to Spanish Translator</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"http://www.spanishdict.com/translation\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>www.spanishdict.com/translation</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Free Spanish <strong>translation</strong> from SpanishDict. Most accurate translations. Over 1000000 words and phrases. <strong>Translate</strong> English to Spanish to English.</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://www.theatlantic.com/technology/archive/2018/01/the-shallowness-of-google-translate/551570/\" style=\"color:#660099; cursor:pointer\">The Shallowness of Google Translate - The Atlantic</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://www.theatlantic.com/technology/archive/2018/01/the-shallowness-of-google-translate/551570/\" style=\"color:#660099; cursor:pointer\"><cite>https://www.theatlantic.com/technology/archive/2018/01/the...of...translate/551570/</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Jan 30, 2018 - However, to my surprise, during the evening&#39;s chitchat it emerged that the two friends habitually exchanged emails using Google <strong>Translate</strong>.</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h3><a href=\"https://www.deepl.com/en/translator\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\">DeepL Translator</a></h3>\r\n&nbsp;\r\n\r\n<div><a href=\"https://www.deepl.com/en/translator\" style=\"color:#660099; cursor:pointer; text-decoration-line:none\"><cite>https://www.deepl.com/en/translator</cite></a></div>\r\n\r\n<div style=\"margin-left:3px; margin-right:3px\">\r\n<div>\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Use the free DeepL Translator to <strong>translate</strong> your texts with the best machine <strong>translation</strong> available, powered by DeepL&#39;s world-leading neural network technology.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-11-14 19:08:24', '2018-11-14 19:08:24', 'en');
INSERT INTO `pages` (`id`, `status`, `parent_id`, `title`, `slug`, `content`, `left_sidebar_block_id`, `right_sidebar_block_id`, `type`, `layout`, `created_at`, `updated_at`, `language`) VALUES
(23, 'PUBLISHED', NULL, 'AFFILIATE AGREEMENT', 'affiliate-agreement', '<p>As a Opportunity &quot;4&quot; Affiliate, You have the opportunity to earn money from the monthly fees of the subscribers you bring to the training. This Agreement sets forth Your rights and obligations as a Opportunity &quot;4&quot; Affiliate. By clicking &ldquo;I Agree&rdquo; You indicate that You have read and understood this Agreement and You will be bound by its terms.</p>\r\n\r\n<p>1. PARTIES. All references to &ldquo;Opportunity &quot;4&quot;&rdquo; herein mean and refer to DNAsbook General, LLC, doing business as Opportunity &quot;4&quot;, and DNAsbook General, LLC&#39;s owner(s), parent company(ies), affiliate entities, and employees, and assigns. All references to &ldquo;You&rdquo; and &ldquo;Your&rdquo; mean and refer to that Opportunity &quot;4&quot; Affiliate who has executed this Agreement by clicking &ldquo;I Agree.&rdquo; Opportunity &quot;4&quot; and You are each referred to herein as a &ldquo;Party,&rdquo; and collectively as the &ldquo;Parties.&rdquo;</p>\r\n\r\n<p>2. INDEPENDENT CONTRACTOR. You are an independent contractor of Opportunity &quot;4&quot;. It is the express understanding and intention of the Parties that no relationship of master and servant or principal and agent shall exist between Opportunity &quot;4&quot; and You by virtue of this Affiliate Agreement.</p>\r\n\r\n<p>3. TERM AND TERMINATION. Your contract with Opportunity &quot;4&quot; begins when You click &ldquo;I Agree,&rdquo; and will continue month-to-month until either:</p>\r\n\r\n<p>A. Opportunity &quot;4&quot; cancels Your account due to Your breach of any of the terms of this Agreement. In the event this Agreement is cancelled due to Your breach, You forfeit all Commissions and Bonuses owed to You or that may in the future be owed to You.</p>\r\n\r\n<p>or</p>\r\n\r\n<p>B. Opportunity &quot;4&quot; or its successors or assigns, in its sole and absolute discretion, cancels Your Affiliate Agreement. In the event that Opportunity &quot;4&quot; or its successors or assigns cancels Your Affiliate Agreements, a written notice will be sent to the e-mail address you provided Opportunity &quot;4&quot; and that is associated with your Affiliate profile.</p>\r\n\r\n<p>4. COMPENSATION.</p>\r\n\r\n<p>A. COMMISSIONS. After You click &ldquo;I Agree&rdquo; to the terms of this Agreement, You will receive a unique Affiliate URL, which You will use to advertise Opportunity &quot;4&quot;. There are 4 levels of benefits in Opportunity &ldquo;4&rdquo;, if a user registers directly on Affiliate URL, that subscriber will be placed directly at your Level 1. The users who subscribe on your Level 1 subscribers Affiliate URL will be placed on your Level 2. The users who subscribe on your Level 2 subscribers Affiliate URL will be placed on your Level 3. The users who subscribe on your Level 3 subscribers Affiliate URL will be placed on your Level 4. Level 4 is the end of your benefits. The users who subscribe on your Level 4 subscribers Affiliate URL do not belong to you, you don&rsquo;t benefit from their fees. Every month, Opportunity &ldquo;4&rdquo; gives you 40% of the total fees collected at your 4 levels, because there are 4 levels, you get 10% of commission from each subscriber at each of the 4 levels. The commissions will be paid to you according to the means of payment you chose, the country you live in and other conditions.</p>\r\n\r\n<p>B. BONUSES. We have bonuses for subscribers. Learn more about these bonuses here! Watch this video for more explanations!</p>\r\n\r\n<p>C. TAXES. Before You can be paid any Commission or Bonuses, You must provide Opportunity &quot;4&quot; a completed W-8 or W-9, as instructed by Opportunity &quot;4&quot;. You will be deemed to have permanently waived all rights to Commissions or Bonuses that were earned more than 30 days before submitting a completed W-8 or W-9 to Opportunity &quot;4&quot;. You are responsible for any and all tax liabilities, including without limitation income tax liabilities that arise from or in any way relate to any commissions or bonuses You receive from Opportunity &quot;4&quot;. If You are not a resident of the United States, Opportunity &quot;4&quot; may withhold tax (including without limitation VAT) where required to by applicable law. Where Opportunity &quot;4&quot; is required to withhold tax, Opportunity &quot;4&quot; will document such withholding.</p>\r\n\r\n<p>D. MINIMUM COMMISSION AND BONUS PAYMENT. Your combined commission and bonus amount must equal or exceed Fifty and 00/100 Dollars ($50.00) before You receive a payment from Opportunity &quot;4&quot;. If Your combined commissions and bonuses for a given month are less than $50.00, Your commissions and bonuses will be held until Your combined commissions and bonuses equals or exceeds $50.00.</p>\r\n\r\n<p>E. COMMISSION AND BONUSES. Commissions and Bonuses are paid only for received by Opportunity &quot;4&quot;. If the fee is not actually received by Opportunity &quot;4&quot;, You will not be paid a Commission. If fees in an Account later results in a refund or charge-back, and if a commission or bonus was paid to You on that fee, then the commission or bonus will be deducted from Your future commissions. If Opportunity &quot;4&quot; determines, in its reasonable discretion, that any fee was paid fraudulently or as a result of any violation of this Agreement, no Commission or Bonus will be paid for such fees. If any Commissions or Bonuses are paid from a fee that was produced fraudulently or as a result of any violation of this Agreement, and the fraud or violation is discovered by Opportunity &quot;4&quot; after payment, such payment amounts shall be deducted from Your future commissions and bonuses and the account deleted.</p>\r\n\r\n<p>F. U.S. DOLLARS. All commissions are paid in US Dollars via PayPal or check.</p>\r\n\r\n<p>5. MARKETING AND RECRUITING.</p>\r\n\r\n<p>A. TRUTHFUL. Anything You communicate in marketing or advertising any Opportunity &quot;4&quot; service or opportunity must be true and accurate. Claims that relate to any Opportunity &quot;4&quot; service or opportunity that are untrue or fraudulent are strictly prohibited. You may not claim that any government, person, or entity endorses or supports Opportunity &quot;4&quot;. You may not use the intellectual property of any other person or entity in advertising any Opportunity &quot;4&quot; service or opportunity.</p>\r\n\r\n<p>B. DISCLAIMER. On any website that You advertise any Opportunity &ldquo;4&rdquo; service or opportunity, You must plainly display (i.e., not in a link, or in small font) the following disclaimer language:</p>\r\n\r\n<p>Disclosure: I am an independent Opportunity &quot;4&quot; Affiliate, not an employee. I receive referral payments from Opportunity &quot;4&quot;. The opinions expressed here are my own and are not official statements of Opportunity &quot;4&quot; or its parent company, DNAsbook General, LLC.</p>\r\n\r\n<p>C. NON-DISPARAGEMENT. You are not permitted to disparage the products of services of any other person or entity, including without limitation the products or services of a competitor of Opportunity &quot;4&quot;.</p>\r\n\r\n<p>D. INVENTORY LOADING/REBATES. You will not be paid any Commission or Bonus for payments made on your own User Account(s). You are not permitted to open an Opportunity &quot;4&quot; account under the name of another person or entity, or under a fictitious name. You are not permitted to open an Opportunity &quot;4&quot; account under any name merely for the purpose of obtaining Commissions, Bonuses, or any other compensation, including without limitation incentives or prizes which may be offered from time to time. Violation of this paragraph shall constitute a material breach of this Agreement, and You agree to repay to Opportunity &quot;4&quot; all Commissions and Bonuses earned as a result of any such violation.</p>\r\n\r\n<p>E. INCOME CLAIMS. If Your recruiting efforts include claims related to the potential income an Opportunity &quot;4&quot; Affiliate can make, or if You make reference to income You have made, or if You make reference to any lifestyle opportunities You have because of Opportunity &quot;4&quot;, the following guidelines must be adhered to:</p>\r\n\r\n<p>1. Your statements must be completely true and accurate and supported by evidence;</p>\r\n\r\n<p>2. If You use a hypothetical scenario, You must clearly label it as a hypothetical scenario; and</p>\r\n\r\n<p>3. Your statements must be accompanied by the Opportunity &quot;4&quot; income disclosure statement.</p>\r\n\r\n<p>6. Opportunity &quot;4&quot;&rsquo; INTELLECTUAL PROPERTY. No logo, tagline, trademark, trade name, copyrighted material, patent, trade dress, trade secret, or confidential information (collectively, the &ldquo;Opportunity &quot;4&quot; Intellectual Property&rdquo;) owned by Opportunity &quot;4&quot; may be used, copied, or reproduced by You except as set forth below. No Opportunity &quot;4&quot; Intellectual Property (or any mark confusingly similar to any Opportunity &quot;4&quot; Intellectual Property) is to be advertised for sale or registered as a domain name by You in any fashion.</p>\r\n\r\n<p>You may use the Opportunity &quot;4&quot;TM mark to advertise Opportunity &quot;4&quot;. Any time You use the Opportunity &quot;4&quot;TM mark, You must do so in a way that is not likely to confuse readers or cause them to think that You are speaking for Opportunity &quot;4&quot;. Whether Your use of Opportunity &quot;4&quot;TM is confusing will be determined by Opportunity &quot;4&quot; in Opportunity &quot;4&quot;&rsquo; sole and absolute discretion. The following guidelines, which may be changed or added to at any time, are designed to help avoid reader confusion:</p>\r\n\r\n<p>- You must not use the &ldquo;voice&rdquo; of, or purport to speak on behalf of, Opportunity &quot;4&quot;.</p>\r\n\r\n<p>- Any time You use the word &ldquo;Opportunity &quot;4&quot;&rdquo; it must be immediately followed by the letters &ldquo;TM&rdquo; in superscript caps.</p>\r\n\r\n<p>- When used in prose, Opportunity &quot;4&quot;TM must be used in the same font as the rest of the prose.</p>\r\n\r\n<p>- When used other than in prose, Opportunity &quot;4&quot;TM must be used in the font employed by Opportunity &quot;4&quot;&rsquo; corporate marketing in Opportunity &quot;4&quot;&rsquo; corporate logo.</p>\r\n\r\n<p>- On any website or social media platform on which You use the word Opportunity &quot;4&quot;TM, you must include the disclosure identified in paragraph 5(D) above.</p>\r\n\r\n<p>- You may use only such other images, photographs, and trademarks as Opportunity &quot;4&quot; expressly authorizes in writing.</p>\r\n\r\n<p>- If you have any questions regarding your use of any Opportunity &quot;4&quot; mark, please contact: yahiadjipe@yahoo.com</p>\r\n\r\n<p>7. RELEASE/AUTHORIZATION TO USE PHOTOGRAPHS. You grant Opportunity &quot;4&quot; permission to use any and all photographs taken by Opportunity &quot;4&quot; or its agents or employees, or submitted by You to Opportunity &quot;4&quot; (hereinafter &ldquo;Photographs&rdquo;) in any Media (including print, internet, film, television and no matter how distributed or published) for any purpose, which may include, but shall not be limited to, advertising, promotion, marketing and packaging of Opportunity &quot;4&quot; or any product or service sold and marketed by Opportunity &quot;4&quot;. You agree that this authorization to use Photographs may be assigned by Opportunity &quot;4&quot; to any other party. You agree that that the Photographs may be combined with other Photographs, sounds, text and graphics, and that the Photographs may be manipulated, cropped, altered or modified in Opportunity &quot;4&quot;&rsquo; sole discretion. You agree not to charge a royalty or fee, and not to make any other monetary assessment against Opportunity &quot;4&quot; in exchange for this Release and Assignment. You hereby release and forever discharge Opportunity &quot;4&quot; from any and all liability and from any damages You may suffer as a result of the use of the Photographs. You further acknowledge and agree that this Release is binding upon Your heirs and assigns. You agree that this Release is irrevocable.</p>\r\n\r\n<p>8. PROHIBITED ACTIVITY. Opportunity &quot;4&quot; has the right to terminate this Agreement at any time if You engage or have ever engaged in any of the following:</p>\r\n\r\n<p>A. HARMFUL ACTS. Any dishonest or unethical business practice; any violation of the law; infliction of harm to DNAsbook General, LLC&#39;s reputation; and the violation of the rights of Opportunity &quot;4&quot; or any third party.</p>\r\n\r\n<p>B. &ldquo;SPAMMING&rdquo; AND UNSOLICITED COMMUNICATIONS. Any communications sent or authorized by You reasonably deemed &ldquo;spamming,&rdquo; or any other unsolicited solicitations (including without limitation postings on social media or third party blogs) will be deemed a material threat to DNAsbook General, LLC&#39;s reputation and to the rights of third parties. It is Your obligation, exclusively, to ensure that all business communications comply with state and local anti-spamming or analogous laws.</p>\r\n\r\n<p>C. OFFENSIVE COMMUNICATIONS. Any communication sent, posted, or authorized by You, including without limitation postings on any website operated by You, or social media or blog, which are: sexually explicit, obscene, or pornographic; offensive, profane, hateful, threatening, harmful, defamatory, libelous, harassing, or discriminatory; graphically violent; solicitous of unlawful behavior; or that violates the intellectual property rights of another.</p>\r\n\r\n<p>9. INDEMNITY. You agree to protect, defend, indemnify and hold harmless Opportunity &quot;4&quot;, its officers, directors, employees, owner(s), and parent company(ies) and assigns from and against all claims, demands, and causes of action of every kind and character without limit arising out of the Your conduct. Your indemnity obligation includes, but is not limited to, any third party claim against Opportunity &quot;4&quot; for liability for payments for, damages caused by, or other liability relating to, You.</p>\r\n\r\n<p>10. NO WARRANTY; NO LEADS. Opportunity &quot;4&quot; does not promise, guarantee or warrant Your business success, income, or sales. You understand and acknowledge that Opportunity &quot;4&quot; will not at any time provide sales leads or referrals to You. Additionally, Opportunity &quot;4&quot;&rsquo; WEBSITES AND SERVICES ARE PROVIDED &ldquo;AS IS&rdquo; WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION IMPLIED WARRANTIES OF TITLE, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. Opportunity &quot;4&quot; MAKES NO REPRESENTATION OR WARRANTY AS TO THE ACCURACY, RELIABILITY, TIMELINESS OR COMPLETENESS OF ANY MATERIAL ON OR ACCESSIBLE THROUGH ANY Opportunity &quot;4&quot; WEBSITE OR SERVICE. ANY RELIANCE ON OR USE OF SUCH MATERIALS SHALL BE AT YOUR SOLE RISK. Opportunity &quot;4&quot; MAKES NO REPRESENTATION OR WARRANTY (A) THAT ANY Opportunity &quot;4&quot; WEBSITE OR SERVICE WILL BE AVAILABLE ON A TIMELY BASIS, OR THAT ACCESS TO ANY Opportunity &quot;4&quot; WEBSITE OR SERVICE WILL BE UNINTERRUPTED, ERROR-FREE OR SECURE; (B) THAT DEFECTS OR ERRORS WILL BE CORRECTED; OR (C) THAT ANY Opportunity &quot;4&quot;&rsquo; WEBSITE OR THE SERVERS OR NETWORKS THROUGH WHICH ANY Opportunity &quot;4&quot;&rsquo; WEBSITE IS MADE AVAILABLE ARE SECURE OR FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. APPLICABLE LAW MAY NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES, SO THE ABOVE EXCLUSION MAY NOT APPLY TO YOU.</p>\r\n\r\n<p>11. LIMITATION OF LIABILITY. YOU AGREE THAT IN NO EVENT SHALL Opportunity &quot;4&quot;&rsquo; LIABILITY TO YOU FOR ANY CLAIM OF ANY KIND OR DESCRIPTION EXCEED THE AMOUNT OF THREE (3) TIMES THE COMMISSIONS AND BONUS PAYMENTS PAID TO YOU FOR THE MONTH PRECEDING THE DATE IN WHICH THE FACTS GIVING RISE TO A CLAIM AGAINST Opportunity &quot;4&quot; OCCURRED. YOU WAIVE ANY RIGHT TO SPECIAL, INDIRECT OR CONSEQUENTIAL DAMAGES OF ANY KIND OR DESCRIPTION.</p>\r\n\r\n<p>12. FORCE MAJEURE. Opportunity &quot;4&quot; will not be responsible to You for any delay, damage, or failure caused by or occasioned by a Force Majeure Event. As used in this Agreement, &ldquo;Force Majeure Event&rdquo; shall mean: any act of God, act of nature or the elements, terrorism, insurrection, revolution or civil strife, piracy, civil war or hostile action, labor strikes, acts of public enemies, federal or state laws, rules and regulations of any governmental authorities having jurisdiction over the premises, inability to procure material, equipment, or necessary labor in the open market, acute and unusual labor, material, or equipment shortages, or any other causes beyond the control of Opportunity &quot;4&quot;. Delays due to any of the above causes shall not be deemed to be a breach of or failure to perform under this Agreement. Opportunity &quot;4&quot; shall not be required against its will to adjust any labor or other similar dispute except in accordance with applicable law.</p>\r\n\r\n<p>13. ASSIGNMENT. Opportunity &quot;4&quot; may assign its rights under this Agreement at any time, without notice to You. Your rights arising under this Agreement cannot be assigned by without Opportunity &quot;4&quot;&rsquo; or its assigns express written consent.</p>\r\n\r\n<p>14. ARBITRATION, GOVERNING LAW, AND ATTORNEYS&rsquo; FEES.</p>\r\n\r\n<p>A. ARBITRATION. Any claim or grievance of any kind, nature or description that You have against Opportunity &quot;4&quot; including, but not limited to, economic losses, personal injury, or property damage, shall be resolved exclusively in binding arbitration in Essex county, Newark, NJ. You agree not to file suit against Opportunity &quot;4&quot; or any of its affiliates, subsidiaries, officers, directors, employees, successors, or assigns. The arbitration will take place before a neutral arbitrator (hereafter, &ldquo;Arbitrator&rdquo;) agreed upon by You and Opportunity &quot;4&quot;. In the event that You and Opportunity &quot;4&quot; are unable to reach agreement on an Arbitrator, You and Opportunity &quot;4&quot; will each select an arbitrator, and the two of them will select the Arbitrator, who must be a resident of Essex county, Newark, NJ. The arbitrators selected by You and Opportunity &quot;4&quot; will have no further involvement in the arbitration. The Arbitrator will determine the rules governing arbitration. The decision of the Arbitrator will be final and binding on You and Opportunity &quot;4&quot; and may be reduced to a judgment in any court of competent jurisdiction. This agreement to arbitrate survives any termination or expiration of the Agreement.</p>\r\n\r\n<p>B. GOVERNING LAW. This Agreement shall be governed, construed, and interpreted in accordance with the laws of the State of New Jersey without regard to any choice of law provisions.</p>\r\n\r\n<p>C. WAIVER OF CLASS ACTION CLAIMS. You understand and agree that You will not have the right to participate in a representative capacity or as a member of any class of claimants pertaining to any claims that may arise under, or be in any way related to, this Agreement. There is no right or authority for any claim You have against Opportunity &quot;4&quot; to be brought on a class action basis or on any basis involving claims brought in a purported representative capacity on behalf of the general public, or on behalf of other persons or entities similarly situated. Claims brought against Opportunity &quot;4&quot; may not be joined or consolidated with claims brought by anyone else.</p>\r\n\r\n<p>D. LIMITATIONS PERIOD. Any claim brought in arbitration must be brought within the time period set forth in any statute of limitations that, but for this agreement to arbitrate, would apply to the claims asserted in any arbitration proceeding.</p>\r\n\r\n<p>E. INJUNCTIVE RELIEF. Nothing in this Agreement prevents Opportunity &quot;4&quot; from applying to and obtaining from any court having jurisdiction a temporary injunction, preliminary injunction, permanent injunction, or other relief available to protect Opportunity &quot;4&quot;&rsquo; rights prior to, during, or following any arbitration proceeding.</p>\r\n\r\n<p>F. ATTORNEYS&rsquo; FEES. You agree that in the event of any arbitration or litigation, each Party will each bear its own costs and attorneys&rsquo; fees, regardless of who is deemed the prevailing party. The foregoing notwithstanding, if either Your or Opportunity &quot;4&quot; commences an action in a court of law or equity and the responding Party successfully moves such court to compel arbitration, the Party who moved for the order compelling arbitration shall be entitled to recover its reasonable costs and attorneys&rsquo; fees incurred on the motion to compel from the other Party.</p>\r\n\r\n<p>G. REFUND: There is no fees refund when paid. Why? Your monthly fees payment is for your access to our online training program. These fees are paid monthly for services you have been consuming on our site and other sources of information. If you don&#39;t want to pay the monthly fees anymore, just cancel your account or just wait for a month without paying and your account will be locked automatically.</p>\r\n\r\n<p>H. FEE PAYMENTS: No one is allowed to pay his fees to any employee in our offices around the world. Our monthly fees are paid online on our site or paid by our subscribers personally or through someone on one of our bank accounts indicated for him in his area. Any fees paid to anyone in our offices will be at risk of the payer, that fee will demanded from the subscriber or his account blocked, his commissions suspended according to our policies.</p>\r\n\r\n<p>15. ENTIRE AGREEMENT. This Agreement, along with Opportunity &quot;4&quot;&rsquo; standard Terms and Conditions represents the entire agreement between the Parties and supersede any other written or oral agreement between the Parties as pertaining to Your rights and responsibilities as a Opportunity &quot;4&quot; Affiliate.</p>\r\n\r\n<p>16. MODIFICATION/AMENDMENTS. This Agreement and Opportunity &quot;4&quot;&rsquo; standard Terms and Conditions may be modified by Opportunity &quot;4&quot; at any time, with or without prior notice to You. Amendments or Modifications to this Agreement or the Terms and Conditions will be binding on You when they are sent to You via e-mail, or are posted in the affiliate center. No amendment to this Agreement or the Terms and Conditions shall be valid unless authored or signed by Opportunity &quot;4&quot;. Your continued acceptance of Commission or Bonus payments constitutes Your acceptance to any modifications or amendments to this Agreement.</p>\r\n\r\n<p>17. NO WAIVER. No waiver by Opportunity &quot;4&quot; of any right reserved or granted to Opportunity &quot;4&quot; under this Agreement shall be effective unless the waiver is in writing and signed by an authorized representative of Opportunity &quot;4&quot;.</p>\r\n\r\n<p>18. NOTICE. Any notice required to be given to Opportunity &quot;4&quot; under or related to this Agreement shall be in writing, addressed as follows:</p>\r\n\r\n<p>DNAsbook General, LLC</p>\r\n\r\n<p>160 Grumman Ave, #207</p>\r\n\r\n<p>Newark, NJ 07112</p>\r\n\r\n<p>yahiadjipe@yahoo.com</p>\r\n\r\n<p>Opportunity &quot;4&quot; will send notices to You at the e-mail address You provided to Opportunity &quot;4&quot;. Any notices shall be deemed delivered to You when sent by Opportunity &quot;4&quot;. You are solely responsible for addressing any technical failures related to Your e-mail address or server, and for reading any e-mail sent to You.</p>\r\n\r\n<p>19. SEVERANCE. In the event any provision of this Agreement is inconsistent with or contrary to any applicable law, rule, or regulation, the provision shall be deemed to be modified to the extent required to comply with the law, rule, or regulation, and this Agreement and the Terms and Conditions, as so modified, shall continue in full force and effect.</p>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-11-28 13:51:23', '2018-12-06 04:58:45', 'en');
INSERT INTO `pages` (`id`, `status`, `parent_id`, `title`, `slug`, `content`, `left_sidebar_block_id`, `right_sidebar_block_id`, `type`, `layout`, `created_at`, `updated_at`, `language`) VALUES
(24, 'PUBLISHED', NULL, 'Contrat affiliation', 'contrat-affiliation', '<p>En tant qu&rsquo;affili&eacute; de l&rsquo;Opportunity &quot;4&quot;, vous avez la possibilit&eacute; de gagner de l&rsquo;argent gr&acirc;ce aux frais mensuels des abonn&eacute;s que vous apportez &agrave; la formation. Le pr&eacute;sent contrat d&eacute;finit vos droits et obligations en tant qu&rsquo;affili&eacute; de l&rsquo;opportunit&eacute; &quot;4&quot;. En cliquant sur &laquo;J&#39;accepte&raquo;, vous indiquez que vous avez lu et compris le pr&eacute;sent contrat et que vous serez li&eacute; par ses conditions.</p>\r\n\r\n<p>1. PARTIES. Toutes les r&eacute;f&eacute;rences &agrave; &quot;Opportunit&eacute;&quot; 4 &quot;&quot; dans le pr&eacute;sent document signifient et font r&eacute;f&eacute;rence &agrave; DNAsbook General, LLC, faisant affaire sous le nom de Opportunity &quot;4&quot;, et au (x) propri&eacute;taire (s), &agrave; la (aux) soci&eacute;t&eacute; (s) m&egrave;re (s), aux entit&eacute;s du m&ecirc;me groupe et aux employ&eacute;s de DNAsbook General LLC, et attribue. Toutes les r&eacute;f&eacute;rences &agrave; &laquo;vous&raquo; et &laquo;votre&raquo; signifient et font r&eacute;f&eacute;rence &agrave; cet affili&eacute; &laquo;4&raquo; de l&#39;opportunit&eacute; qui a sign&eacute; le pr&eacute;sent accord en cliquant sur &laquo;J&#39;accepte&raquo;. L&#39;opportunit&eacute; &laquo;4&raquo; et vous &ecirc;tes chacun d&eacute;sign&eacute; dans le pr&eacute;sent contrat en tant que &laquo;partie&raquo;, et collectivement en tant que &laquo;parties&raquo;.</p>\r\n\r\n<p>2. ENTREPRENEUR IND&Eacute;PENDANT. Vous &ecirc;tes un entrepreneur ind&eacute;pendant de Opportunity &quot;4&quot;. C&rsquo;est la compr&eacute;hension et l&rsquo;intention explicites des Parties qu&rsquo;aucune relation de ma&icirc;tre &agrave; serviteur ou de mandant &agrave; mandataire ne doit exister entre Opportunity &quot;4&quot; et Vous en vertu du pr&eacute;sent Contrat d&rsquo;affiliation.</p>\r\n\r\n<p>3. DUR&Eacute;E ET R&Eacute;SILIATION. Votre contrat avec l&#39;opportunit&eacute; &quot;4&quot; commence lorsque vous cliquez sur &quot;J&#39;accepte&quot; et continue chaque mois jusqu&#39;&agrave; ce que:</p>\r\n\r\n<p>A. La possibilit&eacute; &quot;4&quot; annule votre compte en raison d&#39;une violation des termes du pr&eacute;sent accord. Si le pr&eacute;sent contrat est annul&eacute; en raison de votre violation, vous perdez toutes les commissions et primes qui vous sont dues ou qui pourraient vous &ecirc;tre dues &agrave; l&#39;avenir.</p>\r\n\r\n<p>ou</p>\r\n\r\n<p>B. L&#39;opportunit&eacute; &quot;4&quot; ou ses successeurs ou ayants droit, &agrave; sa seule et absolue discr&eacute;tion, annule votre contrat d&#39;affiliation. Dans le cas o&ugrave; l&#39;opportunit&eacute; &quot;4&quot; ou ses successeurs ou ayants droit annuleraient vos accords d&#39;affiliation, un avis &eacute;crit sera envoy&eacute; &agrave; l&#39;adresse de messagerie que vous avez fournie &agrave; l&#39;opportunit&eacute; &quot;4&quot; et associ&eacute;e &agrave; votre profil d&#39;affili&eacute;.</p>\r\n\r\n<p>4. INDEMNISATION.</p>\r\n\r\n<p>A. COMMISSIONS. Apr&egrave;s avoir cliqu&eacute; sur &laquo;J&#39;accepte&raquo; pour les termes de cet accord, vous recevrez une URL d&#39;affiliation unique, que vous utiliserez pour annoncer l&#39;opportunit&eacute; &quot;4&quot;. L&#39;opportunit&eacute; &laquo;4&raquo; offre 4 niveaux d&#39;avantages. Si un utilisateur s&#39;enregistre directement sur l&#39;URL de l&#39;affili&eacute;, cet abonn&eacute; sera plac&eacute; directement sur votre niveau 1. Les utilisateurs qui s&#39;abonnent sur votre abonn&eacute; de niveau 1 L&#39;URL de l&#39;affili&eacute; sera plac&eacute; sur votre niveau 2. Les utilisateurs qui s&#39;abonnent &agrave; votre URL de partenaire pour les abonn&eacute;s de niveau 2 seront plac&eacute;s sur votre niveau 3. Les utilisateurs qui s&#39;abonnent &agrave; votre URL de partenaire pour les abonn&eacute;s de niveau 3 seront plac&eacute;s sur votre niveau 4. Le niveau 4 correspond &agrave; la fin de vos avantages. Les utilisateurs qui s&rsquo;abonnent &agrave; votre URL d&rsquo;affiliation ne vous appartiennent pas, vous ne b&eacute;n&eacute;ficiez pas de leurs frais. Chaque mois, l&#39;opportunit&eacute; &laquo;4&raquo; vous rapporte 40% du total des frais collect&eacute;s &agrave; vos 4 niveaux, car il y a 4 niveaux, vous obtenez 10% de la commission de chaque abonn&eacute; &agrave; chacun des 4 niveaux. Les commissions vous seront vers&eacute;es en fonction du moyen de paiement que vous avez choisi, du pays dans lequel vous vivez et d&#39;autres conditions.</p>\r\n\r\n<p>B. BONUS. Nous avons des bonus pour les abonn&eacute;s. En savoir plus sur ces bonus ici! Regardez cette vid&eacute;o pour plus d&#39;explications!</p>\r\n\r\n<p>C. TAXES. Avant que vous puissiez recevoir une commission ou des primes, vous devez fournir &agrave; l&rsquo;opportunit&eacute; &quot;4&quot; un W-8 ou un W-9 d&ucirc;ment rempli, comme indiqu&eacute; par l&rsquo;opportunit&eacute; &quot;4&quot;. Vous serez r&eacute;put&eacute; avoir renonc&eacute; de mani&egrave;re permanente &agrave; tous les droits sur les commissions ou les bonus gagn&eacute;s plus de 30 jours avant de soumettre un W-8 ou un W-9 &agrave; l&#39;opportunit&eacute; &quot;4&quot; d&ucirc;ment rempli. Vous &ecirc;tes responsable de tous les passifs d&#39;imp&ocirc;ts, y compris, sans limitation, les passifs d&#39;imp&ocirc;ts r&eacute;sultant de, ou li&eacute;s de quelque mani&egrave;re que ce soit, aux commissions ou aux bonus que Vous recevez de Opportunity &quot;4&quot;. Si vous n&#39;&ecirc;tes pas un r&eacute;sident des &Eacute;tats-Unis, Opportunity &quot;4&quot; peut retenir l&#39;imp&ocirc;t (y compris, sans limitation, la TVA) dans les cas o&ugrave; la loi en vigueur l&#39;exige. Lorsque l&#39;opportunit&eacute; &quot;4&quot; est requise pour retenir l&#39;imp&ocirc;t, l&#39;opportunit&eacute; &quot;4&quot; documentera cette retenue.</p>\r\n\r\n<p>D. COMMISSION MINIMUM ET PAIEMENT DE BONUS. Le montant de votre commission et de votre bonus combin&eacute;s doit &ecirc;tre &eacute;gal ou sup&eacute;rieur &agrave; cinquante et &agrave; 00/100 dollars (50,00 $) avant que vous ne receviez un paiement de la part de l&#39;opportunit&eacute; &quot;4&quot;. Si vos commissions et bonus combin&eacute;s pour un mois donn&eacute; sont inf&eacute;rieurs &agrave; 50,00 $, vos commissions et bonus seront conserv&eacute;s jusqu&#39;&agrave; ce que vos commissions et bonus combin&eacute;s soient &eacute;gaux ou sup&eacute;rieurs &agrave; 50,00 $.</p>\r\n\r\n<p>E. COMMISSION ET BONUS. Les commissions et les bonus ne sont pay&eacute;s que pour ceux re&ccedil;us par Opportunity &quot;4&quot;. Si les frais ne sont pas effectivement re&ccedil;us par l&#39;opportunit&eacute; &quot;4&quot;, vous ne recevrez pas de commission. Si des frais dans un compte entra&icirc;nent ult&eacute;rieurement un remboursement ou une facturation, et si une commission ou un bonus vous a &eacute;t&eacute; vers&eacute; au titre de ces frais, la commission ou le bonus sera alors d&eacute;duit de vos futures commissions. Si Opportunity &quot;4&quot; d&eacute;termine, &agrave; sa discr&eacute;tion raisonnable, que des frais ont &eacute;t&eacute; pay&eacute;s de mani&egrave;re frauduleuse ou &agrave; la suite d&#39;une violation du pr&eacute;sent Contrat, aucune commission ni aucun Bonus ne seront vers&eacute;s pour ces frais. Si des commissions ou des primes sont pay&eacute;es &agrave; partir d&rsquo;une commission produite frauduleusement ou &agrave; la suite de toute violation du pr&eacute;sent Contrat, et que la fraude ou la violation est d&eacute;couverte par Opportunity &quot;4&quot; apr&egrave;s le paiement, le montant de ce paiement sera d&eacute;duit de Vos futures commissions et bonus et le compte supprim&eacute;.</p>\r\n\r\n<p>F. DOLLARS US. Toutes les commissions sont pay&eacute;es en dollars am&eacute;ricains via PayPal ou par ch&egrave;que.</p>\r\n\r\n<p>5. COMMERCIALISATION ET RECRUTEMENT.</p>\r\n\r\n<p>A. V&Eacute;RITABLE Tout ce que vous communiquez dans le marketing ou la publicit&eacute; d&#39;un service ou d&#39;une opportunit&eacute; de Opportunit&eacute; &quot;4&quot; doit &ecirc;tre vrai et pr&eacute;cis. Les r&eacute;clamations relatives &agrave; un service ou une opportunit&eacute; non conforme ou frauduleuse de Opportunity &quot;4&quot; sont strictement interdites. Vous ne pouvez pas pr&eacute;tendre qu&#39;un gouvernement, une personne ou une entit&eacute; ait approuv&eacute; ou soutenu l&#39;opportunit&eacute; &quot;4&quot;. Vous ne pouvez pas utiliser la propri&eacute;t&eacute; intellectuelle d&#39;une autre personne ou entit&eacute; pour annoncer un service ou une opportunit&eacute; de Opportunit&eacute; &quot;4&quot;.</p>\r\n\r\n<p>B. AVERTISSEMENT. Sur tout site Web sur lequel vous publiez un service ou une opportunit&eacute; Opportunity &laquo;4&raquo;, vous devez clairement afficher (c&#39;est-&agrave;-dire pas dans un lien ou dans une petite police) le langage de non-responsabilit&eacute; suivant:</p>\r\n\r\n<p>Divulgation: Je suis une opportunit&eacute; ind&eacute;pendante &quot;4&quot; affili&eacute;e, pas un employ&eacute;. Je re&ccedil;ois des paiements de recommandation de l&#39;opportunit&eacute; &quot;4&quot;. Les opinions exprim&eacute;es ici sont les miennes et ne constituent pas des d&eacute;clarations officielles d&rsquo;Opportunity &quot;4&quot; ou de sa soci&eacute;t&eacute; m&egrave;re, DNAsbook General, LLC.</p>\r\n\r\n<p>C. NON-DISPARAGEMENT. Vous n&#39;&ecirc;tes pas autoris&eacute; &agrave; d&eacute;nigrer les produits de services de toute autre personne ou entit&eacute;, y compris, sans limitation, les produits ou services d&#39;un concurrent d&#39;Opportunity &quot;4&quot;.</p>\r\n\r\n<p>D. CHARGEMENT DE L&rsquo;INVENTAIRE / RABAIS. Aucune commission ni prime ne vous sera vers&eacute;e pour les paiements effectu&eacute;s sur votre (vos) compte (s) d&#39;utilisateur. Vous n&#39;&ecirc;tes pas autoris&eacute; &agrave; ouvrir un compte d&#39;opportunit&eacute; &quot;4&quot; sous le nom d&#39;une autre personne ou entit&eacute;, ou sous un nom fictif. Vous n&#39;&ecirc;tes pas autoris&eacute; &agrave; ouvrir un compte Opportunity &quot;4&quot; sous un nom quelconque dans le seul but d&#39;obtenir des commissions, des bonus ou toute autre compensation, y compris, sans limitation, des incitations ou des prix pouvant &ecirc;tre offerts de temps &agrave; autre. La violation de ce paragraphe constituera une violation substantielle du pr&eacute;sent Accord, et vous acceptez de rembourser &agrave; Opportunity &quot;4&quot; toutes les Commissions et Bonus gagn&eacute;s &agrave; la suite d&#39;une telle violation.</p>\r\n\r\n<p>E. REVENDICATIONS DE REVENU. Si vos efforts de recrutement incluent des revendications li&eacute;es au revenu potentiel qu&#39;une opportunit&eacute; &quot;4&quot; peut faire, ou si vous faites r&eacute;f&eacute;rence &agrave; un revenu que vous avez g&eacute;n&eacute;r&eacute;, ou si vous faites r&eacute;f&eacute;rence &agrave; des opportunit&eacute;s de style de vie que vous avez en raison de cette opportunit&eacute; &quot;4&quot;, Les directives suivantes doivent &ecirc;tre respect&eacute;es:</p>\r\n\r\n<p>1. Vos d&eacute;clarations doivent &ecirc;tre compl&egrave;tement vraies et exactes et s&#39;appuyer sur des preuves;</p>\r\n\r\n<p>2. Si vous utilisez un sc&eacute;nario hypoth&eacute;tique, vous devez clairement le qualifier de sc&eacute;nario hypoth&eacute;tique; et</p>\r\n\r\n<p>3. Vos relev&eacute;s doivent &ecirc;tre accompagn&eacute;s de la d&eacute;claration de revenus relative &agrave; Opportunity &quot;4&quot;.</p>\r\n\r\n<p>6. Occasion &quot;4&quot; &rsquo;PROPRI&Eacute;T&Eacute; INTELLECTUELLE. Aucun logo, slogan, marque commerciale, nom commercial, &eacute;l&eacute;ment prot&eacute;g&eacute; par le droit d&#39;auteur, brevet, habillage commercial, secret commercial ou information confidentielle (collectivement d&eacute;nomm&eacute;e &ldquo;Opportunity&quot; 4 &quot;Propri&eacute;t&eacute; intellectuelle&quot;) appartenant &agrave; Opportunity &quot;4&quot; ne peut &ecirc;tre utilis&eacute;, copi&eacute; ou reproduit par vous, sauf indication contraire ci-dessous. Aucune opportunit&eacute; &quot;4&quot; La propri&eacute;t&eacute; intellectuelle (ou toute marque ressemblant de mani&egrave;re confuse &agrave; une opportunit&eacute; &quot;4&quot; Propri&eacute;t&eacute; intellectuelle) ne doit en aucun cas &ecirc;tre mise en vente ou enregistr&eacute;e en tant que nom de domaine.</p>\r\n\r\n<p>Vous pouvez utiliser la marque d&#39;opportunit&eacute; &quot;4&quot; TM pour annoncer l&#39;opportunit&eacute; &quot;4&quot;. Chaque fois que vous utilisez la marque Opportunity &quot;4&quot; TM, vous devez le faire d&#39;une mani&egrave;re qui ne risque pas de d&eacute;router les lecteurs ou de les amener &agrave; penser que vous parlez pour l&#39;opportunit&eacute; &quot;4&quot;. Si votre utilisation de Opportunity &quot;4&quot; TM est source de confusion, elle sera d&eacute;termin&eacute;e par Opportunity &quot;4&quot; dans Opportunity &quot;4&quot; &#39;&agrave; la seule et absolue discr&eacute;tion. Les directives suivantes, qui peuvent &ecirc;tre modifi&eacute;es ou compl&eacute;t&eacute;es &agrave; tout moment, sont con&ccedil;ues pour &eacute;viter toute confusion du lecteur:</p>\r\n\r\n<p>- Vous ne devez pas utiliser la &laquo;voix&raquo; de, ni pr&eacute;tendre parler en son nom, l&#39;opportunit&eacute; &laquo;4&raquo;.</p>\r\n\r\n<p>- Chaque fois que vous utilisez le mot &laquo;Opportunit&eacute;&quot; 4 &quot;&raquo;, il doit &ecirc;tre imm&eacute;diatement suivi des lettres &quot;TM&quot; en majuscules.</p>\r\n\r\n<p>- Lorsqu&#39;il est utilis&eacute; en prose, Opportunity &quot;4&quot; TM doit &ecirc;tre utilis&eacute; dans la m&ecirc;me police que le reste de la prose.</p>\r\n\r\n<p>- Lorsqu&rsquo;il est utilis&eacute; &agrave; des fins autres que la prose, Opportunity &quot;4&quot; TM doit &ecirc;tre utilis&eacute; dans la police de caract&egrave;res utilis&eacute;e par le logo de Opportunity &quot;4&quot; &rsquo;dans le logo de l&rsquo;entreprise Opportunity&quot; 4 &quot;.</p>\r\n\r\n<p>- Sur tout site Web ou plate-forme de m&eacute;dia social sur lequel vous utilisez le mot Opportunity &quot;4&quot; TM, vous devez inclure la divulgation identifi&eacute;e au paragraphe 5 (D) ci-dessus.</p>\r\n\r\n<p>- Vous ne pouvez utiliser que d&#39;autres images, photographies et marques commerciales autoris&eacute;es express&eacute;ment par &eacute;crit par Opportunity &quot;4&quot;.</p>\r\n\r\n<p>- Si vous avez des questions concernant l&rsquo;utilisation de la marque Opportunity &quot;4&quot;, veuillez contacter: yahiadjipe@yahoo.com</p>\r\n\r\n<p>7. LIBERATION / AUTORISATION D&#39;UTILISER DES PHOTOGRAPHIES. Vous accordez &agrave; Opportunity &quot;4&quot; la permission d&#39;utiliser toutes les photographies prises par Opportunity &quot;4&quot; ou ses agents ou employ&eacute;s, ou que vous avez soumises &agrave; Opportunity &quot;4&quot; (ci-apr&egrave;s d&eacute;nomm&eacute;es &quot;Photographies&quot;) sur tout support (y compris la copie, Internet, le film). , t&eacute;l&eacute;vision et quelle que soit la mani&egrave;re dont ils sont distribu&eacute;s ou publi&eacute;s) &agrave; quelque fin que ce soit, ce qui peut inclure, sans toutefois s&#39;y limiter, la publicit&eacute;, la promotion, le marketing et l&#39;emballage de Opportunity &quot;4&quot; ou tout produit ou service vendu et commercialis&eacute; par Opportunity &quot;4&quot; . Vous acceptez que cette autorisation d&#39;utilisation de Photographies puisse &ecirc;tre attribu&eacute;e par l&#39;opportunit&eacute; &quot;4&quot; &agrave; une autre partie. Vous convenez que les photographies peuvent &ecirc;tre combin&eacute;es avec d&rsquo;autres photographies, sons, textes et graphiques, et que les photographies peuvent &ecirc;tre manipul&eacute;es, recadr&eacute;es, modifi&eacute;es ou modifi&eacute;es &agrave; la discr&eacute;tion de Opportunit&eacute; &quot;4&quot;. Vous vous engagez &agrave; ne pas facturer de redevance ni de frais, et &agrave; ne proc&eacute;der &agrave; aucune autre &eacute;valuation mon&eacute;taire en fonction de l&#39;opportunit&eacute; &quot;4&quot; en &eacute;change de cette renonciation et de cette cession. Par la pr&eacute;sente, vous d&eacute;gagez et d&eacute;gagez &agrave; tout jamais Opportunity &quot;4&quot; de toute responsabilit&eacute; et de tout dommage que vous pourriez subir du fait de l&rsquo;utilisation des photographies. De plus, vous reconnaissez et acceptez que cette renonciation lie vos h&eacute;ritiers et vos ayants droit. Vous acceptez que cette version est irr&eacute;vocable.</p>\r\n\r\n<p>8. ACTIVIT&Eacute; INTERDITE. La possibilit&eacute; &quot;4&quot; a le droit de r&eacute;silier le pr&eacute;sent contrat &agrave; tout moment si vous vous engagez ou avez d&eacute;j&agrave; exerc&eacute; l&#39;une des activit&eacute;s suivantes:</p>\r\n\r\n<p>A. ACTES NUISIBLES. Toute pratique commerciale malhonn&ecirc;te ou contraire &agrave; l&#39;&eacute;thique; toute violation de la loi; atteinte &agrave; la r&eacute;putation de DNAsbook General, LLC; et la violation des droits de Opportunity &quot;4&quot; ou de tout tiers.</p>\r\n\r\n<p>B. COMMUNICATIONS &laquo;SPAMMING&raquo; ET NON SOLLICIT&Eacute;ES. Toute communication envoy&eacute;e ou autoris&eacute;e par Vous raisonnablement consid&eacute;r&eacute;e comme du &laquo;spam&raquo; ou toute autre sollicitation non sollicit&eacute;e (y compris, sans limitation, la publication de messages sur les r&eacute;seaux sociaux ou les blogs de tiers) sera consid&eacute;r&eacute;e comme une menace mat&eacute;rielle pour la r&eacute;putation de DNAsbook General, LLC et les droits de tiers. . Il est de votre responsabilit&eacute; exclusive de vous assurer que toutes les communications commerciales sont conformes aux lois antispam, nationales et locales ou aux lois analogues.</p>\r\n\r\n<p>C. COMMUNICATIONS OFFENSIVES. Toute communication envoy&eacute;e, publi&eacute;e ou autoris&eacute;e par Vous, y compris, sans limitation, les publications sur tout site Web que vous exploitez, sur les m&eacute;dias sociaux ou sur les blogs, qui sont: sexuellement explicites, obsc&egrave;nes ou pornographiques; offensant, profane, haineux, mena&ccedil;ant, pr&eacute;judiciable, diffamatoire, calomnieux, harcelant ou discriminatoire; graphiquement violent; attentif &agrave; un comportement ill&eacute;gal; ou qui viole les droits de propri&eacute;t&eacute; intellectuelle d&#39;autrui.</p>\r\n\r\n<p>9. INDEMNIT&Eacute;. Vous acceptez de prot&eacute;ger, de d&eacute;fendre, d&rsquo;indemniser et de pr&eacute;server la responsabilit&eacute; de l&rsquo;opportunit&eacute; &quot;4&quot;, de ses dirigeants, administrateurs, employ&eacute;s, propri&eacute;taire (s) et soci&eacute;t&eacute; (s) m&egrave;re (s), et c&egrave;de toutes les actions en justice, demandes et causes d&rsquo;action. nature et caract&egrave;re sans limite d&eacute;coulant de Votre conduite. Votre obligation d&rsquo;indemnisation inclut, mais ne se limite pas &agrave;, toute r&eacute;clamation d&rsquo;un tiers contre Opportunity &laquo;4&raquo; en ce qui concerne la responsabilit&eacute; du paiement des dommages, des dommages caus&eacute;s par ou de toute autre responsabilit&eacute; en rapport avec vous.</p>\r\n\r\n<p>10. AUCUNE GARANTIE; PAS DE LEADS. L&#39;opportunit&eacute; &quot;4&quot; ne garantit ni ne garantit le succ&egrave;s de votre entreprise, vos revenus ou vos ventes. Vous comprenez et reconnaissez que l&#39;opportunit&eacute; &quot;4&quot; ne vous fournira &agrave; aucun moment des prospects ou des r&eacute;f&eacute;rences. En outre, les sites Web et les services Opportunity &quot;4&quot; sont fournis &quot;tels quels&quot;, sans garantie d&#39;aucune sorte, qu&#39;elle soit explicite ou implicite, y compris, sans limitation, les garanties de propri&eacute;t&eacute;, de qualit&eacute; marchande, d&#39;ad&eacute;quation &agrave; un objectif particulier et de non-responsabilit&eacute;. L&#39;opportunit&eacute; &quot;4&quot; NE FOURNIT AUCUNE REPR&Eacute;SENTATION OU GARANTIE QUANT &Agrave; L&#39;EXACTITUDE, &Agrave; LA FIABILIT&Eacute;, &Agrave; L&#39;OPPORTUNIT&Eacute; OU &Agrave; L&#39;EXACTITUDE DE TOUT MAT&Eacute;RIAU SUR OU N&#39;EST ACCESSIBLE QUE PAR L&#39;OPPORTUNIT&Eacute; &quot;4&quot; SUR LE SITE WEB OU LE SERVICE. TOUTE CONFIANCE SUR OU L&rsquo;UTILISATION DE TELS MAT&Eacute;RIAUX EST &Agrave; VOTRE SEUL RISQUE. L&#39;opportunit&eacute; &quot;4&quot; NE DONNE AUCUNE REPR&Eacute;SENTATION OU GARANTIE A) QUE LE SITE WEB OU LE SERVICE &quot;4&quot; SERA DISPONIBLE &Agrave; TEMPS, OU QUE L&#39;ACC&Egrave;S &Agrave; UNE Opportunit&eacute; &quot;4&quot; LE SITE WEB OU LE SERVICE SERA ININTERROMPU, SANS ERREUR ou S&Eacute;CURIS&Eacute; ; (B) QUE LES DEFAUTS OU LES ERREURS SERONT CORRIGES; OU (C) QUE LE SITE WEB &quot;4&quot; &#39;OU LES SERVEURS OU LES R&Eacute;SEAUX PAR LEQUEL QUELQUE SITE WEB &quot;4&quot; &rsquo;RENDU DISPONIBLE SOIENT S&Eacute;CURIS&Eacute;S OU EXEMPT DE VIRUS OU D&rsquo;AUTRES COMPOSANTS NUISIBLES. LA LOI APPLICABLE PEUT NE PAS PERMETTRE L&#39;EXCLUSION DES GARANTIES IMPLICITES, DE SORTE QUE L&#39;EXCLUSION CI-DESSUS PEUT NE PAS VOUS &Ecirc;TRE APPLICABLE.</p>\r\n\r\n<p>11. LIMITATION DE RESPONSABILIT&Eacute;. VOUS ACCEPTEZ EN AUCUN CAS QUE LA RESPONSABILITE &quot;4&quot; &quot;DE VOTRE RECLAMATION OU DE TOUTE DESCRIPTION ne d&eacute;passe le montant de trois (3) fois les commissions et paiements vers&eacute;s pour vous pour le mois qui a pr&eacute;c&eacute;d&eacute; la date &agrave; laquelle les faits DONNER LIEU &Agrave; UNE R&Eacute;CLAMATION CONTRE LA POSSIBILIT&Eacute; &quot;4&quot;. VOUS PENSEZ UN DROIT &Agrave; DES DOMMAGES SP&Eacute;CIAUX, INDIRECTS OU INDIRECTS DE TOUT GENRE OU DE SA DESCRIPTION.</p>\r\n\r\n<p>12. FORCE MAJEURE. L&#39;opportunit&eacute; &quot;4&quot; ne sera pas responsable envers vous pour tout retard, dommage ou d&eacute;faillance caus&eacute; ou provoqu&eacute; par un cas de force majeure. Dans le pr&eacute;sent Accord, on entend par &laquo;cas de force majeure&raquo;: tout acte de Dieu, acte de la nature ou des &eacute;l&eacute;ments, terrorisme, insurrection, r&eacute;volution ou guerre civile, piraterie, guerre civile ou action hostile, gr&egrave;ve du travail, actes commis par des ennemis publics , lois f&eacute;d&eacute;rales ou nationales, r&egrave;gles et r&eacute;glementations de toute autorit&eacute; gouvernementale ayant juridiction sur les lieux, incapacit&eacute; &agrave; se procurer du mat&eacute;riel, de l&#39;&eacute;quipement ou la main-d&#39;&oelig;uvre n&eacute;cessaire sur le march&eacute; libre, p&eacute;nurie aigu&euml; ou inhabituelle de main-d&#39;&oelig;uvre, de mat&eacute;riel ou d&#39;&eacute;quipement, ou toute autre cause le contr&ocirc;le de l&#39;opportunit&eacute; &quot;4&quot;. Les retards dus &agrave; l&#39;une des causes ci-dessus ne seront pas consid&eacute;r&eacute;s comme une violation ou un manquement &agrave; l&#39;ex&eacute;cution en vertu du pr&eacute;sent Contrat. La possibilit&eacute; &quot;4&quot; n&#39;est pas requise contre son gr&eacute; pour r&eacute;gler un conflit du travail ou un conflit similaire, sauf en conformit&eacute; avec la loi applicable.</p>\r\n\r\n<p>13. CESSION. L&#39;opportunit&eacute; &quot;4&quot; peut c&eacute;der ses droits en vertu du pr&eacute;sent Contrat &agrave; tout moment, sans pr&eacute;avis. Vos droits d&eacute;coulant du pr&eacute;sent Contrat ne peuvent &ecirc;tre c&eacute;d&eacute;s par sans possibilit&eacute; &quot;4&quot; ou son consentement &eacute;crit expr&egrave;s.</p>\r\n\r\n<p>14. ARBITRAGE, LOI APPLICABLE ET HONORAIRES DES AVOCATS.</p>\r\n\r\n<p>A. ARBITRAGE. Toute r&eacute;clamation ou tout grief de quelque nature que ce soit, nature ou description que Vous avez contre Opportunity &quot;4&quot;, y compris, mais sans s&#39;y limiter, les pertes &eacute;conomiques, les blessures corporelles ou les dommages mat&eacute;riels, doit &ecirc;tre r&eacute;solu exclusivement par arbitrage ex&eacute;cutoire dans le comt&eacute; d&#39;Essex, Newark, NJ . Vous acceptez de ne pas intenter de poursuites contre Opportunity &quot;4&quot; ou l&#39;un de ses affili&eacute;s, filiales, dirigeants,</p>\r\n\r\n<p>administrateurs, employ&eacute;s, successeurs ou ayants droit. L&#39;arbitrage se d&eacute;roulera devant un arbitre neutre (ci-apr&egrave;s d&eacute;nomm&eacute; &laquo;l&#39;arbitre&raquo;), agr&eacute;&eacute; par vous et Opportunity &laquo;4&raquo;. Si vous et l&#39;opportunit&eacute; &quot;4&quot; ne parvenez pas &agrave; vous mettre d&#39;accord sur un arbitre, vous et l&#39;opportunit&eacute; &quot;4&quot; choisirez chacun un arbitre et les deux d&#39;entre eux choisiront l&#39;arbitre, qui doit &ecirc;tre un r&eacute;sident du comt&eacute; d&#39;Essex, Newark, NJ. Les arbitres s&eacute;lectionn&eacute;s par vous et Opportunity &quot;4&quot; ne participeront plus &agrave; l&#39;arbitrage. L&#39;arbitre d&eacute;terminera les r&egrave;gles r&eacute;gissant l&#39;arbitrage. La d&eacute;cision de l&#39;arbitre sera finale et contraignante pour vous et Opportunity &quot;4&quot; et pourra &ecirc;tre r&eacute;duite &agrave; un jugement rendu par tout tribunal comp&eacute;tent. Cet accord d&#39;arbitrage survit &agrave; toute r&eacute;siliation ou expiration de l&#39;accord.</p>\r\n\r\n<p>B. LOI APPLICABLE. Le pr&eacute;sent Contrat est r&eacute;gi, interpr&eacute;t&eacute; et interpr&eacute;t&eacute; conform&eacute;ment aux lois de l&#39;&Eacute;tat du New Jersey, sans &eacute;gard aux dispositions relatives au choix de la loi.</p>\r\n\r\n<p>C. RENONCIATION AUX REVENDICATIONS EN ACTION COLLECTIVE. Vous comprenez et acceptez que Vous n&#39;aurez pas le droit de participer en qualit&eacute; de repr&eacute;sentant ou en tant que membre d&#39;une cat&eacute;gorie de r&eacute;clamants dans le cadre de r&eacute;clamations pouvant survenir en vertu de la pr&eacute;sente convention ou en relation avec celle-ci. Il n&rsquo;ya aucun droit ou autorit&eacute; pour une r&eacute;clamation quelconque que vous avez contre Opportunity &quot;4&quot; pour &ecirc;tre intent&eacute;e sur la base d&rsquo;un recours collectif ou pour des motifs impliquant des r&eacute;clamations intent&eacute;es &agrave; titre de repr&eacute;sentant pour le compte du grand public, ou pour le compte d&rsquo;autres personnes ou entit&eacute;s similaires situ&eacute;es. Les r&eacute;clamations d&eacute;pos&eacute;es contre Opportunity &quot;4&quot; ne peuvent &ecirc;tre jointes ou regroup&eacute;es avec des r&eacute;clamations d&eacute;pos&eacute;es par des tiers.</p>\r\n\r\n<p>D. P&Eacute;RIODE DE LIMITATIONS. Toute r&eacute;clamation soumise &agrave; l&#39;arbitrage doit &ecirc;tre pr&eacute;sent&eacute;e dans le d&eacute;lai imparti par toute loi de prescription qui, sans l&#39;arbitrage de cet accord, s&#39;appliquerait aux r&eacute;clamations formul&eacute;es dans le cadre d&#39;une proc&eacute;dure d&#39;arbitrage.</p>\r\n\r\n<p>E. SOULAGEMENT INJONCTIF. Rien dans le pr&eacute;sent Contrat n&#39;emp&ecirc;che Opportunity &quot;4&quot; de demander &agrave; un tribunal comp&eacute;tent d&#39;obtenir une injonction temporaire, une injonction provisoire, une injonction permanente ou tout autre redressement disponible pour prot&eacute;ger ses droits avant, pendant ou apr&egrave;s un arbitrage. en cours.</p>\r\n\r\n<p>F. HONORAIRES DES AVOCATS. Vous convenez qu&#39;en cas d&#39;arbitrage ou de litige, chaque partie assumera ses propres frais et honoraires d&#39;avocat, quel que soit le choix de la partie gagnante. Ind&eacute;pendamment de ce qui pr&eacute;c&egrave;de, si vous ou Opportunity &quot;4&quot; intente une action devant un tribunal de droit ou en &eacute;quit&eacute; et que la partie d&eacute;fenderesse le fait pour obliger ce tribunal &agrave; exiger l&rsquo;arbitrage, la Partie qui a demand&eacute; l&rsquo;ordonnance de forclusion est habilit&eacute;e &agrave; recouvrer ses droits raisonnables. les frais et honoraires d&#39;avocats engag&eacute;s pour la requ&ecirc;te en revendication de la part de l&#39;autre partie.</p>\r\n\r\n<p>G. REMBOURSEMENT: Il n&#39;y a pas de remboursement de frais au moment du paiement. Pourquoi? Le paiement de vos frais mensuels concerne votre acc&egrave;s &agrave; notre programme de formation en ligne. Ces frais sont pay&eacute;s mensuellement pour les services que vous avez consomm&eacute;s sur notre site et d&#39;autres sources d&#39;informations. Si vous ne souhaitez plus payer les frais mensuels, annulez simplement votre compte ou attendez un mois sans payer et votre compte sera automatiquement verrouill&eacute;.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H. PAIEMENTS DES FRAIS MENSUELS: Personne n&#39;est autoris&eacute; &agrave; payer ses honoraires &agrave; un employ&eacute; de nos bureaux dans le monde entier. Nos frais mensuels sont pay&eacute;s en ligne sur notre site ou par nos abonn&eacute;s personnellement ou par l&#39;interm&eacute;diaire de quelqu&#39;un qui poss&egrave;de l&#39;un de nos comptes bancaires indiqu&eacute; pour lui dans sa r&eacute;gion. Tous les frais pay&eacute;s &agrave; n&#39;importe qui dans nos bureaux seront &agrave; risque du payeur, ces frais seront exig&eacute;s du souscripteur ou de son compte bloqu&eacute;, ses commissions suspendues conform&eacute;ment &agrave; nos politiques.</p>\r\n\r\n<p>15. INT&Eacute;GRALIT&Eacute; DE L&#39;ACCORD. Le pr&eacute;sent Accord, ainsi que les Conditions g&eacute;n&eacute;rales standard de Opportunit&eacute; &quot;4&quot;, repr&eacute;sentent l&rsquo;int&eacute;gralit&eacute; de l&rsquo;accord entre les Parties et remplacent tout autre accord &eacute;crit ou oral entre les Parties en ce qui concerne Vos droits et responsabilit&eacute;s en tant qu&rsquo;affili&eacute; de la Opportunit&eacute; &quot;4&quot;.</p>\r\n\r\n<p>16. MODIFICATION / AMENDEMENTS. Les pr&eacute;sentes conditions g&eacute;n&eacute;rales &laquo;4&raquo; du contrat et de l&rsquo;opportunit&eacute; peuvent &ecirc;tre modifi&eacute;es &agrave; tout moment par &laquo;4&raquo;, avec ou sans pr&eacute;avis. Les modifications apport&eacute;es au pr&eacute;sent Contrat ou aux Conditions g&eacute;n&eacute;rales vous lieront lorsqu&#39;elles vous seront envoy&eacute;es par courrier &eacute;lectronique ou dans le centre d&#39;affiliation. Aucun amendement &agrave; cet Accord ou aux Termes et Conditions ne sera valide s&#39;il n&#39;a pas &eacute;t&eacute; &eacute;crit ou sign&eacute; par Opportunity &quot;4&quot;.</p>\r\n\r\n<p>Votre acceptation continue des paiements de commission ou de bonus constitue votre acceptation de toute modification apport&eacute;e au pr&eacute;sent contrat.</p>\r\n\r\n<p>17. PAS DE RENONCIATION. Aucune renonciation par opportunit&eacute; &quot;4&quot; d&#39;un droit r&eacute;serv&eacute; ou conf&eacute;r&eacute; &agrave; Opportunity &quot;4&quot; en vertu du pr&eacute;sent Contrat ne sera effective que si la renonciation est &eacute;crite et sign&eacute;e par un repr&eacute;sentant autoris&eacute; de Opportunity &quot;4&quot;.</p>\r\n\r\n<p>18. AVIS. Tout avis devant &ecirc;tre donn&eacute; &agrave; l&#39;opportunit&eacute; &quot;4&quot; en vertu ou li&eacute; &agrave; cet accord doit &ecirc;tre &eacute;crit, adress&eacute; comme suit:</p>\r\n\r\n<p>DNAsbook General, LLC</p>\r\n\r\n<p>160 avenue Grumman, n &deg; 207</p>\r\n\r\n<p>Newark, NJ 07112</p>\r\n\r\n<p>yahiadjipe@yahoo.com</p>\r\n\r\n<p>L&#39;opportunit&eacute; &quot;4&quot; vous enverra des notifications &agrave; l&#39;adresse de messagerie que vous avez fournie &agrave; l&#39;opportunit&eacute; &quot;4&quot;. Tout avis sera r&eacute;put&eacute; avoir &eacute;t&eacute; remis &agrave; vous lorsqu&#39;il aura &eacute;t&eacute; envoy&eacute; par Opportunit&eacute; &quot;4&quot;. Vous &ecirc;tes seul responsable de la r&eacute;solution des probl&egrave;mes techniques li&eacute;s &agrave; votre adresse de messagerie ou &agrave; votre serveur, ainsi que de la lecture de tout courrier &eacute;lectronique qui vous est envoy&eacute;.</p>\r\n\r\n<p>19. S&Eacute;ANCE. Si une disposition de la pr&eacute;sente convention est incompatible ou contraire &agrave; une loi, r&egrave;gle ou r&eacute;glementation applicable, elle est r&eacute;put&eacute;e avoir &eacute;t&eacute; modifi&eacute;e dans la mesure n&eacute;cessaire pour se conformer &agrave; la loi, &agrave; la r&egrave;gle ou &agrave; la r&eacute;glementation, et les Termes et Conditions, ainsi modifi&eacute;s, resteront pleinement en vigueur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, 1, 'PAGE', 'RIGHT SIDEBAR', '2018-12-01 06:18:17', '2018-12-06 04:59:19', 'fr'),
(25, 'PUBLISHED', NULL, 'Terms and conditions', 'terms-and-conditions', '<p>This is terms and conditons of dnaasbook digi market</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-12-11 15:39:11', '2018-12-11 15:39:24', 'en'),
(26, 'PUBLISHED', NULL, 'Terms and conditions', 'terms-and-conditions', '<p>this is for french language terms and conditions just edit content from admin dashboard</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-12-12 21:03:30', '2018-12-12 21:03:30', 'fr'),
(27, 'PUBLISHED', NULL, 'Privacy policy', 'privacy-policy', '<p>this is for english page just edit content of this page from admin dashboard</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-12-12 21:10:06', '2018-12-12 21:10:06', 'en'),
(28, 'PUBLISHED', NULL, 'Privacy policy', 'privacy-policy', '<p>this is french privacy and policy page just edit content of this page&nbsp;</p>', NULL, NULL, 'PAGE', 'NO SIDEBAR', '2018-12-12 21:12:27', '2018-12-12 21:12:27', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_slip_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` enum('OFFLINE','ONLINE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('RECURRING','ONE TIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_for` enum('GROUP','LEVEL','MATERIAL','SUBSCRIPTION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` double(8,2) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('APPROVED','REJECTED','PENDING','VERIFYING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `bank_slip_no`, `bank_id`, `payment_profile_id`, `paypal_plan_id`, `payment_mode`, `payment_type`, `paid_for`, `amount_paid`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(18, 7, NULL, NULL, NULL, NULL, 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'APPROVED', NULL, NULL),
(17, 6, NULL, NULL, NULL, NULL, 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'APPROVED', NULL, NULL),
(16, 2, NULL, NULL, NULL, NULL, 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'APPROVED', NULL, NULL),
(14, 1, NULL, NULL, NULL, NULL, 'ONLINE', 'ONE TIME', 'GROUP', 0.10, '', 'APPROVED', '2018-08-28 18:45:06', NULL),
(8, 10, 'dfdfdf', '3', '1', NULL, 'OFFLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'PENDING', '2018-06-07 23:49:33', '2018-06-07 23:49:33'),
(7, 5, '1234', '3', 'I-VD2L6T9DWWR9', 'P-5PC78733R5765663HZAAIS5A', 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'APPROVED', '2018-06-07 23:48:00', '2018-06-07 23:48:00'),
(19, 8, NULL, NULL, NULL, NULL, 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 50.00, '', 'APPROVED', NULL, NULL),
(28, 131, NULL, NULL, 'I-1V4BAXR814MA', NULL, 'ONLINE', 'RECURRING', 'SUBSCRIPTION', 54.00, '', 'APPROVED', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments_details`
--

CREATE TABLE `payments_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sub_group_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `subscription_fee` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_details`
--

INSERT INTO `payments_details` (`id`, `user_id`, `group_id`, `sub_group_id`, `material_id`, `subscription_fee`, `start_date`, `end_date`, `amount`, `discount`, `transaction_id`, `created_at`, `updated_at`) VALUES
(7, 2, NULL, NULL, NULL, 'YES', '2018-09-01 00:00:00', '2018-09-30 23:59:59', 50.00, NULL, 16, NULL, NULL),
(5, 1, 11, NULL, NULL, 'NO', '2018-08-28 00:00:00', NULL, 0.10, NULL, 14, NULL, NULL),
(3, 5, NULL, NULL, NULL, 'YES', '2018-06-07 19:52:31', '2018-07-07 19:52:31', 50.00, NULL, 9, '2018-06-07 23:52:31', '2018-06-07 23:52:31'),
(4, 5, NULL, NULL, NULL, 'YES', '2018-06-07 19:53:05', '2018-07-07 19:53:05', 50.00, NULL, 10, '2018-06-07 23:53:05', '2018-06-07 23:53:05'),
(8, 6, NULL, NULL, NULL, 'YES', '2018-09-01 00:00:00', '2018-09-30 23:59:59', 50.00, NULL, 17, NULL, NULL),
(9, 7, NULL, NULL, NULL, 'YES', '2018-09-01 00:00:00', '2018-09-30 23:59:59', 50.00, NULL, 18, NULL, NULL),
(10, 8, NULL, NULL, NULL, 'YES', '2018-09-01 00:00:00', '2018-09-30 23:59:59', 50.00, NULL, 19, NULL, NULL),
(11, 51, 1, 1, 1, 'YES', '2018-10-09 00:00:00', '2018-10-15 00:00:00', 12333.00, 12.00, 12121212, NULL, NULL),
(20, 131, NULL, NULL, NULL, 'YES', '2018-12-01 00:00:00', '2018-12-31 23:59:59', 54.00, NULL, 28, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_profiles`
--

CREATE TABLE `payment_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_profile_id` int(11) DEFAULT NULL,
  `customerpayment_profile_id` int(11) DEFAULT NULL,
  `payment_type` enum('CARD','ONLINE BANK','OFFLINE BANK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_date` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_routing_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deleted` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_profiles`
--

INSERT INTO `payment_profiles` (`id`, `user_id`, `customer_profile_id`, `customerpayment_profile_id`, `payment_type`, `card_no`, `card_exp_date`, `bank_name`, `bank_routing_no`, `bank_account_no`, `name`, `address`, `city`, `state`, `zip`, `phone`, `default`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'OFFLINE BANK', '', NULL, 'Bank Al Habib', '12312', '12312312', 'Tariq Ali Khan', 'Khan Villa', 'Multan', 'AL', '60000', '1234567899', 'NO', 'NO', '2017-11-29 17:05:36', '2018-11-28 19:45:16'),
(3, 1, NULL, NULL, 'CARD', '1231313', '06-2017', NULL, NULL, NULL, 'Visa', 'khan villa', 'Multan', 'AL', '60000', '1234567899', 'YES', 'NO', '2017-11-29 23:08:09', '2018-11-28 19:45:16'),
(4, 2, NULL, NULL, 'CARD', '4117744060764466', '01-2022', NULL, NULL, NULL, 'Yaovi Ahiadjipe', '160 Grumman Ave, Apt 207', 'Newark', 'NJ', '07112', '9082497637', 'YES', 'NO', '2018-07-25 01:41:50', '2018-07-25 02:05:04'),
(5, 2, NULL, NULL, 'OFFLINE BANK', '', NULL, 'Bank of America', '021200339', '381028438577', 'Yaovi Ahiadjipe', '160 Grumman Ave, Apt 207', 'Newark', 'NJ', '07112', '9082497637', 'NO', 'NO', '2018-07-25 01:44:58', '2018-07-25 02:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_subscription`
--

CREATE TABLE `paypal_subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_profile_id` varchar(100) NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_subscription`
--

INSERT INTO `paypal_subscription` (`id`, `user_id`, `customer_profile_id`, `status`, `created_at`) VALUES
(2, 131, 'I-1V4BAXR814MA', 'Active', '2018-12-03 03:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testomonials`
--

CREATE TABLE `testomonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testomonial` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testomonials`
--

INSERT INTO `testomonials` (`id`, `name`, `testomonial`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Yaovi Ahiadjipe', 'Why Opportunity \"4\"? Where the idea of Opportunity \"4\" came from? Thomas, CEO/Founder of Opportunity \"4\" was listening to an African president one day in his early teenage years and the president said something that changed his life! The president was giving a speech on how Africans can help each other, how best they can help someone in need! Answering his own question, he gave an example....', '7', NULL, NULL),
(13, 'Ashish', 'asdkfjh askddljf kladf klasjdf akdjf kalds klasjd lksjdf kljasd fkljsdf lkasjd fklasd lkasdjf klasdjf lkasjdf klajsdf lkajdsf kljasdf jlkasdjf klasjdf lkajsdf klajsdf kjlasdfj lkasjdf lksjdf lksjdf klsdjf lkjdf klsdjf slkdjf sdkljf sdlkjf skldjf skldjf skdljf skldjf sdkljf slkdjf sdlkjf lksdjf ksldjf', '1', NULL, NULL),
(14, 'This is testingf', 'this is testing', '45', NULL, NULL),
(15, 'amaa', 'this is good', '54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_hangout_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `is_active` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `prevent_users_to_see_email` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `prevent_users_to_see_phone` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `prevent_users_to_comments_messages` enum('YES','NO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_now` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `first_name`, `last_name`, `photo`, `username`, `email`, `password`, `phone`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `timezone`, `facebook_url`, `twitter_url`, `instagram_url`, `snapchat_url`, `skype_id`, `google_hangout_id`, `bio`, `is_admin`, `is_active`, `prevent_users_to_see_email`, `prevent_users_to_see_phone`, `prevent_users_to_comments_messages`, `remember_token`, `created_at`, `updated_at`, `verified`, `verification_token`, `not_now`) VALUES
(1, NULL, 'Yaovi', 'Ahiadjipe', 'https://www.dnasbookdigimarket.com/uploads/profile/20181130_201451_My-rewards.jpg', 'admin', 'yahiadjipe@yahoo.com', '$2y$10$wD9pGgfVW7U8vo1MNliVKOoz/dciMR3DB5dOJvTeoyI3DqXtbmMVy', '9082497637', '160 Grumman Ave, Apt 207', NULL, 'Newark', 'AL', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 'YES', 'NO', 'NO', 'NO', 'Dq8yreX9QFLK4rcUCIVRqoEi03J4tCj4384cx3L6jD3DGHerSB2sV9YNaHfv', NULL, '2018-12-12 12:30:30', 1, NULL, 0),
(2, 1, 'Yaovi', 'Ahiadjipe', 'https://www.dnasbookdigimarket.com/uploads/profile/20181201_161100_a95dc30b-9ad2-4737-8a25-2944303e7023-bathroom-budgeting.jpg', 'ahiadjipe', 'usahiadjipe@gmail.com', '$2y$10$U8u5dM91qQ.rSIZlEuvjkuTy34yoDgm6WW.daJtyQa6gey7itHsq.', '9082497637', '160 Grumman Ave, Apt 207', NULL, 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'GboitYui5rTGI33CLHsIcKloKSBDxAY83TjLe4A49E6MfZWxqJg6tKoAbeUu', '2018-06-04 01:30:41', '2018-12-01 21:11:00', 1, NULL, 1),
(6, 2, 'Yawa Xanu', 'Ahiadjipe', NULL, 'ahiadjipeagnes', 'usahiadjipeagnes@gmail.com', '$2y$10$f7cbS53GewKepCWlZ5VnSuiobEfBPzDqJ9xCDkcn8Rp55EF2KcSAO', '9082497637', '160 Grumman Ave, Apt 207', NULL, 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'y5QoZ2c6WzNXLN3Sevib7f35ELNlwnE3ctEjN72wdRXGG0ebChDfu8CA7Gzn', '2018-06-06 00:58:03', '2018-12-04 07:11:44', 1, NULL, 1),
(5, 1, 'Tariq', 'Khan', NULL, 'tariq', 'tariqalikhan19@gmail.com', '$2y$10$oMrlu66qh4zDICoYbjAKMuONxy7HVb3czDm7gXTum8zvZ8iAiPu6e', '1234567899', 'asdfadf', NULL, 'Houston', 'TX', '77001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-06-05 23:53:16', '2018-06-07 23:53:05', 1, '2a1ff49145520a2e0fff529b770c6572b5035bfa9187dd8dfa41a9def4d8c8d3', 0),
(7, 2, 'Caleb', 'Ahiadjipe', NULL, 'ahiadjipecaleb', 'usahiadjipecaleb@gmail.com', '$2y$10$PaeyV8CFTVvfr6JG73qs2.P8UDzVVZyn2pV3Sq/gN8RqO94aQ7lWm', '9082497637', '160 Grumman Ave, Apt 207', NULL, 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'MGFxCcFeMiOwcgVwlMhGKMbuAsg0Z4OP5sc2523UoaOripyW1fechVPjhgbz', '2018-06-06 01:04:53', '2018-12-04 07:17:48', 1, NULL, 1),
(8, 2, 'Charles', 'Ahiadjipe', NULL, 'ahiadjipecharles', 'usahiadjipecharles@gmail.com', '$2y$10$U41h7ZvCxcrB3ZcAvz8M3uyaIb1KX2EViga8T6Qa.pBFeBZMnhhWe', '9082497637', '160 Grumman Ave, Apt 207', NULL, 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'zVWFFjpgU5nN3KspOJJtYmdxAugFb7s8agEjZLBT8iZ7xXOWnpr4w5tKaMSr', '2018-06-06 01:12:43', '2018-11-28 07:00:52', 1, NULL, 1),
(9, 2, 'Kantmani', 'Jangid', NULL, 'ownrox', 'kantmaniji@gmail.com', '$2y$10$MeD8n2K.ssO4Ytrr2bIvy.oCE92lFx8Fs5y6TvH3DoDCb4dhAI8g2', '9829163123', 'A-36, padam vihar, rajat path, mansarovar', NULL, 'Jaipur', 'Rajasthan', '30202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-06-18 09:38:29', '2018-06-24 22:58:05', 1, NULL, 0),
(10, 2, 'Scott', 'Brody', NULL, 'Scott1111', 'scott@brodywebdesign.com', '$2y$10$fCw/fgJN7zp6nypvGvbpZu4KiULrJCzF2kmNIBtaPfZUUrHD3KGtK', '6603302022', 'Phoenix Arizona Glendale', 'PO Box 111', 'Phoenix', 'Arizona', '51234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-06-18 20:16:36', '2018-06-24 22:59:07', 0, '4e45e023788b1f52b7a28efebd7821358ee3c72ef5b4bf0d315e70fe75b65c6a', 0),
(45, 2, 'Ashish', 'Bhandari', NULL, 'ashish336b1', 'ashish336bb@gmail.com', '$2y$10$j83byFGhy/ifkncRI9q5ie0r2I292SRI31XCtxiH35J2aveNDmPAC', '8998789778', 'kathamdf, asdf', 'kathamdf, asdf', 'dsf', 'sdfasdf', '33333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'yCWsVv1PfTgXKvnRtBWZuap8WHFZpFq1NbHW9x7SVWyG8YrqswbzknagSfHG', '2018-07-24 14:26:26', '2018-07-24 14:26:26', 1, NULL, 1),
(104, 2, 'avnendra', 'kumar', NULL, 'avialex85', 'avialex85@gmail.com', '$2y$10$cM6eapPN.1b4AISX8rqshueAE2qRYglmnr87z5JLqDnu6Y5dk47Ji', '9876543212', 'b-14 sector 67 noida', 'Noida', 'Noida', 'UP', '20130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', '9sq5IAt7QCmjwd41be4wLVSfom9UQOw0B2ptGAZ6pfCDAGCUrSB35KdUJJHY', '2018-11-10 17:06:58', '2018-11-10 17:09:12', 1, NULL, 1),
(129, 2, 'Atul', 'Nepal', NULL, 'atul336', 'atul@gmail.com', '$2y$10$FAOFeT29ZP.e8MBAHHoPc.9WBdSzTSqN3fR7ZbKSYCTlGTlp5uc3m', '98121212', 'Sindhuli', 'sindhulio', 'sindhuli', 'sindhli', '11111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-11-29 20:40:16', '2018-11-29 20:40:16', 1, 'f858e3989e5e0d14953ce11856ef6d19f258d5bfa42e351a6da11f30eb85ae6d', 1),
(43, 2, 'Anmol', 'dhungana', NULL, 'anmoldhungana', 'anmoldhungana@gmail.com', '$2y$10$X9fHPLYOXFaGMGspuo5hJO51O113viJ/LIZDTDCKsw8u38PaxynT.', '2323242', 'sindhuli', 'sindhuli', 'sinhuli', 'sindhuli', '22222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-07-23 18:50:13', '2018-07-23 18:50:13', 0, 'c3b10d8fd0a77ee416f40d640fe884b4d6860ba9f5e30f5a6b77eea8846e20a0', 0),
(51, 2, 'anmol', 'anmol', NULL, 'anmolanmol', 'epo.lito111@gmail.com', '$2y$10$VY7Ek1CKcLTD.mzcePti5elTa6DjE6I2E7sSw.gLN944yJRnPKRZK', '3434343434', 'sindhuli', 'sindhuli', 'sinhuli', 'sindhuli', '11111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'os3ZtBw9yQhfTiMn3Fop8orf0Vp68khHGsFLpYcQ5v4wWsoEnY8fBASa8Yna', '2018-08-12 20:50:34', '2018-08-12 20:50:34', 1, NULL, 0),
(103, 2, 'Abbas', 'jami', NULL, 'abbasjami47', 'abbasjami47@gmail.com', '$2y$10$tkOLu01CG62yTOy8/7dgeOzMd3qvrzq27XbJ2EcLDdnTf8rOThKqu', '1233456887', 'Lahore pakistan', NULL, 'lahore', 'Punjab', '63200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'xbPtnGwHquj530EZPRk1w0BYs0QxR0gdPgawZXdUmyBSJULkjHNNvbvrQYzf', '2018-11-10 12:49:16', '2018-11-10 12:49:16', 0, '363c9ce804d7b909829f77c29a74a780515e8bbc1debd118fd1a7dcb8cf00fc3', 0),
(125, 2, 'Atul', 'Nepal', NULL, 'atul_grepsr', 'atul.nepal@gmail.com', '$2y$10$rBtZvOe51SDWkPV/BHIJLehCiMoT2uvqwe2X1BFtAq88YurZFIlS6', '9808417239', '123 Main St', NULL, 'Buffallo', 'Ny', '14203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-11-27 20:02:11', '2018-11-27 20:02:11', 1, NULL, 0),
(124, 2, 'Ashish', 'Bhandari', 'https://www.dnasbookdigimarket.com/uploads/profile/20181211_050603_a.jpg', 'ashish34', 'ashish336b@gmail.com', '$2y$10$L/81Qzc.lVVlQ.v7zx8MmOlHh8rxJK/U1vRYfefbD6ZkNm8OMP2vi', '1212122121', 'Sindhuli', 'sindhuli', 'sindhuli', 'sindhuli', '11111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 'YES', 'NO', 'NO', 'NO', 'rE95GNcERqE9mbBYnyxkMSXHibX8zpelAfwml1ml0Vmo80tjGiCKrumfojEF', '2018-11-27 16:18:15', '2018-12-11 10:06:03', 1, NULL, 0),
(133, 2, 'Test', 'Testnow', NULL, 'Yawaahiadjipexanuu', 'yahiadjipe@gmail.com', '$2y$10$v74vBys0a0YzxMfyazvEuuRdSrliNkO0AgpfwwdvgYGQsUEmf5xVu', '9082497637', '160 Grumman Ave', 'APT 207', 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'EqPY8g4PQ7C2ym3QyFPLUCo8EK0oOleLmqMtnokWoixW1rMSI8dR7NfK71Z3', '2018-12-04 07:00:48', '2018-12-04 07:00:48', 1, NULL, 1),
(131, 2, 'DNAsbook', 'DNAs', NULL, 'Yawaahiadjipexanudf', 'dnasbook@gmail.com', '$2y$10$EADRcYPAzp/oqxiyfDLsPecLgjhv1XA6oWBtRKyJ0RAHcxqenBgn.', '9082497637', '160 Grumman Ave, Apt 207', 'APT 207', 'Newark', 'NJ', '07112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'q978ZPAaI7ace7taxgpJbmoyAbHM6jgWenzmHoLCYny5PE2ko17igPHGB6ZC', '2018-12-03 03:28:44', '2018-12-03 03:28:44', 1, NULL, 1),
(97, 2, 'Paul', 'AHIADJIPE', NULL, 'Paul', 'ahiadjipepaul@gmail.com', '$2y$10$MnqBoMvGVOG.3QUEUMKG2eyCSRgP4yIS6mAXgstIfjxXYVEV8Qi2a', '07964075', '124 Latrille Ave', NULL, 'Abidjan', 'Cote d\'Ivoire', '08877', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', 'zrHIm1nygC6h7z5C2OlUFZ9aZBxeKxjJCunAl4CspGXZztyX8aGo7BR3LI0w', '2018-10-23 14:31:39', '2018-10-23 14:31:39', 1, NULL, 1),
(99, 2, 'ashish', 'ashish', NULL, 'ramam', 'ashish@gmail.com', '$2y$10$wLxGbiV3gAohgEHKwIRhH.29hQUiK4IJQGAFjQJiuxaJTmwyKJUPK', '9348394839', 'sindhli', 'sindhuli', 'sindhuli', 'sindhuli', '33333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', 'YES', 'NO', 'NO', 'NO', NULL, '2018-10-24 08:21:41', '2018-10-24 08:21:41', 0, '03f534f4576bef57f66f4f91183dd432e8baf3bb4235fdbbd606d83c1fb3920a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commenting_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_commissions`
--

CREATE TABLE `user_commissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `payer_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `payment` double(8,2) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `transaction_type` enum('COMMISSION_FROM_CUSTOMER','COMMISSION_FROM_ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'COMMISSION_FROM_CUSTOMER',
  `commission_amount` double(8,2) DEFAULT NULL,
  `opening_balance` double(8,2) DEFAULT NULL,
  `closing_balance` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_commissions`
--

INSERT INTO `user_commissions` (`id`, `receiver_id`, `payer_id`, `payment_id`, `payment`, `level_id`, `transaction_type`, `commission_amount`, `opening_balance`, `closing_balance`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 7, 50.00, 1, 'COMMISSION_FROM_CUSTOMER', 5.00, NULL, 5.00, '2018-06-07 23:48:00', '2018-06-07 23:48:00'),
(2, 1, 5, 9, 50.00, 1, 'COMMISSION_FROM_CUSTOMER', 5.00, 5.00, 10.00, '2018-06-07 23:52:31', '2018-06-07 23:52:31'),
(3, 1, 5, 10, 50.00, 1, 'COMMISSION_FROM_CUSTOMER', 5.00, 10.00, 15.00, '2018-06-07 23:53:05', '2018-06-07 23:53:05'),
(4, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 0.00, 15.00, '2018-09-30 04:00:02', NULL),
(5, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15.00, 30.00, '2018-09-30 04:01:01', NULL),
(6, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 30.00, 45.00, '2018-09-30 04:02:02', NULL),
(7, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 45.00, 60.00, '2018-09-30 04:03:01', NULL),
(8, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 60.00, 75.00, '2018-09-30 04:04:01', NULL),
(9, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 75.00, 90.00, '2018-09-30 04:05:02', NULL),
(10, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 90.00, 105.00, '2018-09-30 04:06:01', NULL),
(11, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 105.00, 120.00, '2018-09-30 04:07:01', NULL),
(12, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 120.00, 135.00, '2018-09-30 04:08:02', NULL),
(13, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 135.00, 150.00, '2018-09-30 04:09:01', NULL),
(14, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 150.00, 165.00, '2018-09-30 04:10:01', NULL),
(15, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 165.00, 180.00, '2018-09-30 04:11:02', NULL),
(16, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 180.00, 195.00, '2018-09-30 04:12:01', NULL),
(17, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 195.00, 210.00, '2018-09-30 04:13:01', NULL),
(18, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 210.00, 225.00, '2018-09-30 04:14:02', NULL),
(19, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 225.00, 240.00, '2018-09-30 04:15:01', NULL),
(20, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 240.00, 255.00, '2018-09-30 04:16:01', NULL),
(21, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 255.00, 270.00, '2018-09-30 04:17:02', NULL),
(22, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 270.00, 285.00, '2018-09-30 04:18:01', NULL),
(23, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 285.00, 300.00, '2018-09-30 04:19:01', NULL),
(24, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 300.00, 315.00, '2018-09-30 04:20:02', NULL),
(25, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 315.00, 330.00, '2018-09-30 04:21:01', NULL),
(26, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 330.00, 345.00, '2018-09-30 04:22:02', NULL),
(27, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 345.00, 360.00, '2018-09-30 04:23:01', NULL),
(28, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 360.00, 375.00, '2018-09-30 04:24:01', NULL),
(29, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 375.00, 390.00, '2018-09-30 04:25:02', NULL),
(30, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 390.00, 405.00, '2018-09-30 04:26:01', NULL),
(31, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 405.00, 420.00, '2018-09-30 04:27:01', NULL),
(32, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 420.00, 435.00, '2018-09-30 04:28:02', NULL),
(33, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 435.00, 450.00, '2018-09-30 04:29:01', NULL),
(34, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 450.00, 465.00, '2018-09-30 04:30:01', NULL),
(35, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 465.00, 480.00, '2018-09-30 04:31:02', NULL),
(36, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 480.00, 495.00, '2018-09-30 04:32:01', NULL),
(37, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 495.00, 510.00, '2018-09-30 04:33:01', NULL),
(38, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 510.00, 525.00, '2018-09-30 04:34:02', NULL),
(39, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 525.00, 540.00, '2018-09-30 04:35:01', NULL),
(40, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 540.00, 555.00, '2018-09-30 04:36:02', NULL),
(41, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 555.00, 570.00, '2018-09-30 04:37:01', NULL),
(42, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 570.00, 585.00, '2018-09-30 04:38:01', NULL),
(43, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 585.00, 600.00, '2018-09-30 04:39:01', NULL),
(44, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 600.00, 615.00, '2018-09-30 04:40:02', NULL),
(45, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 615.00, 630.00, '2018-09-30 04:41:01', NULL),
(46, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 630.00, 645.00, '2018-09-30 04:42:02', NULL),
(47, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 645.00, 660.00, '2018-09-30 04:43:01', NULL),
(48, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 660.00, 675.00, '2018-09-30 04:44:01', NULL),
(49, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 675.00, 690.00, '2018-09-30 04:45:02', NULL),
(50, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 690.00, 705.00, '2018-09-30 04:46:01', NULL),
(51, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 705.00, 720.00, '2018-09-30 04:47:01', NULL),
(52, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 720.00, 735.00, '2018-09-30 04:48:02', NULL),
(53, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 735.00, 750.00, '2018-09-30 04:49:01', NULL),
(54, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 750.00, 765.00, '2018-09-30 04:50:01', NULL),
(55, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 765.00, 780.00, '2018-09-30 04:51:02', NULL),
(56, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 780.00, 795.00, '2018-09-30 04:52:01', NULL),
(57, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 795.00, 810.00, '2018-09-30 04:53:01', NULL),
(58, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 810.00, 825.00, '2018-09-30 04:54:02', NULL),
(59, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 825.00, 840.00, '2018-09-30 04:55:01', NULL),
(60, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 840.00, 855.00, '2018-09-30 04:56:01', NULL),
(61, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 855.00, 870.00, '2018-09-30 04:57:02', NULL),
(62, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 870.00, 885.00, '2018-09-30 04:58:01', NULL),
(63, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 885.00, 900.00, '2018-09-30 04:59:01', NULL),
(64, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 900.00, 915.00, '2018-09-30 05:00:02', NULL),
(65, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 915.00, 930.00, '2018-09-30 05:01:01', NULL),
(66, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 930.00, 945.00, '2018-09-30 05:02:02', NULL),
(67, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 945.00, 960.00, '2018-09-30 05:03:01', NULL),
(68, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 960.00, 975.00, '2018-09-30 05:04:01', NULL),
(69, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 975.00, 990.00, '2018-09-30 05:05:02', NULL),
(70, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 990.00, 1005.00, '2018-09-30 05:06:01', NULL),
(71, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1005.00, 1020.00, '2018-09-30 05:07:01', NULL),
(72, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1020.00, 1035.00, '2018-09-30 05:08:02', NULL),
(73, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1035.00, 1050.00, '2018-09-30 05:09:01', NULL),
(74, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1050.00, 1065.00, '2018-09-30 05:10:01', NULL),
(75, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1065.00, 1080.00, '2018-09-30 05:11:02', NULL),
(76, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1080.00, 1095.00, '2018-09-30 05:12:01', NULL),
(77, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1095.00, 1110.00, '2018-09-30 05:13:01', NULL),
(78, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1110.00, 1125.00, '2018-09-30 05:14:02', NULL),
(79, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1125.00, 1140.00, '2018-09-30 05:15:01', NULL),
(80, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1140.00, 1155.00, '2018-09-30 05:16:01', NULL),
(81, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1155.00, 1170.00, '2018-09-30 05:17:02', NULL),
(82, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1170.00, 1185.00, '2018-09-30 05:18:01', NULL),
(83, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1185.00, 1200.00, '2018-09-30 05:19:01', NULL),
(84, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1200.00, 1215.00, '2018-09-30 05:20:02', NULL),
(85, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1215.00, 1230.00, '2018-09-30 05:21:01', NULL),
(86, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1230.00, 1245.00, '2018-09-30 05:22:02', NULL),
(87, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1245.00, 1260.00, '2018-09-30 05:23:01', NULL),
(88, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1260.00, 1275.00, '2018-09-30 05:24:01', NULL),
(89, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1275.00, 1290.00, '2018-09-30 05:25:02', NULL),
(90, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1290.00, 1305.00, '2018-09-30 05:26:01', NULL),
(91, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1305.00, 1320.00, '2018-09-30 05:27:01', NULL),
(92, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1320.00, 1335.00, '2018-09-30 05:28:02', NULL),
(93, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1335.00, 1350.00, '2018-09-30 05:29:01', NULL),
(94, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1350.00, 1365.00, '2018-09-30 05:30:01', NULL),
(95, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1365.00, 1380.00, '2018-09-30 05:31:02', NULL),
(96, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1380.00, 1395.00, '2018-09-30 05:32:01', NULL),
(97, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1395.00, 1410.00, '2018-09-30 05:33:01', NULL),
(98, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1410.00, 1425.00, '2018-09-30 05:34:02', NULL),
(99, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1425.00, 1440.00, '2018-09-30 05:35:01', NULL),
(100, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1440.00, 1455.00, '2018-09-30 05:36:01', NULL),
(101, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1455.00, 1470.00, '2018-09-30 05:37:02', NULL),
(102, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1470.00, 1485.00, '2018-09-30 05:38:01', NULL),
(103, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1485.00, 1500.00, '2018-09-30 05:39:01', NULL),
(104, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1500.00, 1515.00, '2018-09-30 05:40:02', NULL),
(105, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1515.00, 1530.00, '2018-09-30 05:41:01', NULL),
(106, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1530.00, 1545.00, '2018-09-30 05:42:02', NULL),
(107, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1545.00, 1560.00, '2018-09-30 05:43:01', NULL),
(108, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1560.00, 1575.00, '2018-09-30 05:44:01', NULL),
(109, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1575.00, 1590.00, '2018-09-30 05:45:02', NULL),
(110, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1590.00, 1605.00, '2018-09-30 05:46:01', NULL),
(111, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1605.00, 1620.00, '2018-09-30 05:47:01', NULL),
(112, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1620.00, 1635.00, '2018-09-30 05:48:02', NULL),
(113, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1635.00, 1650.00, '2018-09-30 05:49:01', NULL),
(114, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1650.00, 1665.00, '2018-09-30 05:50:01', NULL),
(115, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1665.00, 1680.00, '2018-09-30 05:51:02', NULL),
(116, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1680.00, 1695.00, '2018-09-30 05:52:01', NULL),
(117, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1695.00, 1710.00, '2018-09-30 05:53:01', NULL),
(118, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1710.00, 1725.00, '2018-09-30 05:54:02', NULL),
(119, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1725.00, 1740.00, '2018-09-30 05:55:01', NULL),
(120, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1740.00, 1755.00, '2018-09-30 05:56:02', NULL),
(121, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1755.00, 1770.00, '2018-09-30 05:57:01', NULL),
(122, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1770.00, 1785.00, '2018-09-30 05:58:01', NULL),
(123, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1785.00, 1800.00, '2018-09-30 05:59:02', NULL),
(124, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1800.00, 1815.00, '2018-09-30 06:00:01', NULL),
(125, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1815.00, 1830.00, '2018-09-30 06:01:02', NULL),
(126, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1830.00, 1845.00, '2018-09-30 06:02:01', NULL),
(127, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1845.00, 1860.00, '2018-09-30 06:03:01', NULL),
(128, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1860.00, 1875.00, '2018-09-30 06:04:01', NULL),
(129, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1875.00, 1890.00, '2018-09-30 06:05:02', NULL),
(130, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1890.00, 1905.00, '2018-09-30 06:06:01', NULL),
(131, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1905.00, 1920.00, '2018-09-30 06:07:02', NULL),
(132, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1920.00, 1935.00, '2018-09-30 06:08:01', NULL),
(133, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1935.00, 1950.00, '2018-09-30 06:09:01', NULL),
(134, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1950.00, 1965.00, '2018-09-30 06:10:02', NULL),
(135, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1965.00, 1980.00, '2018-09-30 06:11:01', NULL),
(136, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1980.00, 1995.00, '2018-09-30 06:12:01', NULL),
(137, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 1995.00, 2010.00, '2018-09-30 06:13:02', NULL),
(138, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2010.00, 2025.00, '2018-09-30 06:14:01', NULL),
(139, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2025.00, 2040.00, '2018-09-30 06:15:01', NULL),
(140, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2040.00, 2055.00, '2018-09-30 06:16:02', NULL),
(141, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2055.00, 2070.00, '2018-09-30 06:17:01', NULL),
(142, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2070.00, 2085.00, '2018-09-30 06:18:01', NULL),
(143, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2085.00, 2100.00, '2018-09-30 06:19:02', NULL),
(144, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2100.00, 2115.00, '2018-09-30 06:20:01', NULL),
(145, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2115.00, 2130.00, '2018-09-30 06:21:02', NULL),
(146, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2130.00, 2145.00, '2018-09-30 06:22:01', NULL),
(147, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2145.00, 2160.00, '2018-09-30 06:23:01', NULL),
(148, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2160.00, 2175.00, '2018-09-30 06:24:01', NULL),
(149, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2175.00, 2190.00, '2018-09-30 06:25:02', NULL),
(150, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2190.00, 2205.00, '2018-09-30 06:26:01', NULL),
(151, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2205.00, 2220.00, '2018-09-30 06:27:02', NULL),
(152, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2220.00, 2235.00, '2018-09-30 06:28:01', NULL),
(153, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2235.00, 2250.00, '2018-09-30 06:29:01', NULL),
(154, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2250.00, 2265.00, '2018-09-30 06:30:02', NULL),
(155, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2265.00, 2280.00, '2018-09-30 06:31:01', NULL),
(156, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2280.00, 2295.00, '2018-09-30 06:32:01', NULL),
(157, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2295.00, 2310.00, '2018-09-30 06:33:02', NULL),
(158, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2310.00, 2325.00, '2018-09-30 06:34:01', NULL),
(159, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2325.00, 2340.00, '2018-09-30 06:35:01', NULL),
(160, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2340.00, 2355.00, '2018-09-30 06:36:01', NULL),
(161, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2355.00, 2370.00, '2018-09-30 06:37:01', NULL),
(162, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2370.00, 2385.00, '2018-09-30 06:38:01', NULL),
(163, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2385.00, 2400.00, '2018-09-30 06:39:02', NULL),
(164, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2400.00, 2415.00, '2018-09-30 06:40:01', NULL),
(165, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2415.00, 2430.00, '2018-09-30 06:41:02', NULL),
(166, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2430.00, 2445.00, '2018-09-30 06:42:01', NULL),
(167, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2445.00, 2460.00, '2018-09-30 06:43:01', NULL),
(168, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2460.00, 2475.00, '2018-09-30 06:44:02', NULL),
(169, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2475.00, 2490.00, '2018-09-30 06:45:01', NULL),
(170, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2490.00, 2505.00, '2018-09-30 06:46:01', NULL),
(171, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2505.00, 2520.00, '2018-09-30 06:47:02', NULL),
(172, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2520.00, 2535.00, '2018-09-30 06:48:02', NULL),
(173, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2535.00, 2550.00, '2018-09-30 06:49:01', NULL),
(174, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2550.00, 2565.00, '2018-09-30 06:50:01', NULL),
(175, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2565.00, 2580.00, '2018-09-30 06:51:01', NULL),
(176, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2580.00, 2595.00, '2018-09-30 06:52:01', NULL),
(177, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2595.00, 2610.00, '2018-09-30 06:53:01', NULL),
(178, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2610.00, 2625.00, '2018-09-30 06:54:02', NULL),
(179, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2625.00, 2640.00, '2018-09-30 06:55:01', NULL),
(180, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2640.00, 2655.00, '2018-09-30 06:56:02', NULL),
(181, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2655.00, 2670.00, '2018-09-30 06:57:01', NULL),
(182, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2670.00, 2685.00, '2018-09-30 06:58:01', NULL),
(183, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2685.00, 2700.00, '2018-09-30 06:59:02', NULL),
(184, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2700.00, 2715.00, '2018-09-30 07:00:01', NULL),
(185, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2715.00, 2730.00, '2018-09-30 07:01:01', NULL),
(186, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2730.00, 2745.00, '2018-09-30 07:02:02', NULL),
(187, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2745.00, 2760.00, '2018-09-30 07:03:01', NULL),
(188, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2760.00, 2775.00, '2018-09-30 07:04:01', NULL),
(189, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2775.00, 2790.00, '2018-09-30 07:05:02', NULL),
(190, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2790.00, 2805.00, '2018-09-30 07:06:01', NULL),
(191, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2805.00, 2820.00, '2018-09-30 07:07:01', NULL),
(192, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2820.00, 2835.00, '2018-09-30 07:08:02', NULL),
(193, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2835.00, 2850.00, '2018-09-30 07:09:01', NULL),
(194, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2850.00, 2865.00, '2018-09-30 07:10:02', NULL),
(195, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2865.00, 2880.00, '2018-09-30 07:11:01', NULL),
(196, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2880.00, 2895.00, '2018-09-30 07:12:01', NULL),
(197, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2895.00, 2910.00, '2018-09-30 07:13:02', NULL),
(198, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2910.00, 2925.00, '2018-09-30 07:14:01', NULL),
(199, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2925.00, 2940.00, '2018-09-30 07:15:01', NULL),
(200, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2940.00, 2955.00, '2018-09-30 07:16:02', NULL),
(201, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2955.00, 2970.00, '2018-09-30 07:17:01', NULL),
(202, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2970.00, 2985.00, '2018-09-30 07:18:01', NULL),
(203, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 2985.00, 3000.00, '2018-09-30 07:19:02', NULL),
(204, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3000.00, 3015.00, '2018-09-30 07:20:01', NULL),
(205, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3015.00, 3030.00, '2018-09-30 07:21:01', NULL),
(206, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3030.00, 3045.00, '2018-09-30 07:22:02', NULL),
(207, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3045.00, 3060.00, '2018-09-30 07:23:01', NULL),
(208, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3060.00, 3075.00, '2018-09-30 07:24:01', NULL),
(209, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3075.00, 3090.00, '2018-09-30 07:25:02', NULL),
(210, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3090.00, 3105.00, '2018-09-30 07:26:01', NULL),
(211, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3105.00, 3120.00, '2018-09-30 07:27:01', NULL),
(212, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3120.00, 3135.00, '2018-09-30 07:28:02', NULL),
(213, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3135.00, 3150.00, '2018-09-30 07:29:01', NULL),
(214, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3150.00, 3165.00, '2018-09-30 07:30:02', NULL),
(215, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3165.00, 3180.00, '2018-09-30 07:31:01', NULL),
(216, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3180.00, 3195.00, '2018-09-30 07:32:01', NULL),
(217, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3195.00, 3210.00, '2018-09-30 07:33:01', NULL),
(218, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3210.00, 3225.00, '2018-09-30 07:34:01', NULL),
(219, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3225.00, 3240.00, '2018-09-30 07:35:01', NULL),
(220, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3240.00, 3255.00, '2018-09-30 07:36:02', NULL),
(221, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3255.00, 3270.00, '2018-09-30 07:37:01', NULL),
(222, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3270.00, 3285.00, '2018-09-30 07:38:01', NULL),
(223, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3285.00, 3300.00, '2018-09-30 07:39:02', NULL),
(224, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3300.00, 3315.00, '2018-09-30 07:40:01', NULL),
(225, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3315.00, 3330.00, '2018-09-30 07:41:01', NULL),
(226, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3330.00, 3345.00, '2018-09-30 07:42:02', NULL),
(227, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3345.00, 3360.00, '2018-09-30 07:43:01', NULL),
(228, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3360.00, 3375.00, '2018-09-30 07:44:01', NULL),
(229, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3375.00, 3390.00, '2018-09-30 07:45:02', NULL),
(230, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3390.00, 3405.00, '2018-09-30 07:46:01', NULL),
(231, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3405.00, 3420.00, '2018-09-30 07:47:01', NULL),
(232, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3420.00, 3435.00, '2018-09-30 07:48:02', NULL),
(233, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3435.00, 3450.00, '2018-09-30 07:49:01', NULL),
(234, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3450.00, 3465.00, '2018-09-30 07:50:02', NULL),
(235, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3465.00, 3480.00, '2018-09-30 07:51:01', NULL),
(236, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3480.00, 3495.00, '2018-09-30 07:52:01', NULL),
(237, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3495.00, 3510.00, '2018-09-30 07:53:02', NULL),
(238, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3510.00, 3525.00, '2018-09-30 07:54:01', NULL),
(239, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3525.00, 3540.00, '2018-09-30 07:55:01', NULL),
(240, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3540.00, 3555.00, '2018-09-30 07:56:01', NULL),
(241, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3555.00, 3570.00, '2018-09-30 07:57:01', NULL),
(242, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3570.00, 3585.00, '2018-09-30 07:58:01', NULL),
(243, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3585.00, 3600.00, '2018-09-30 07:59:02', NULL),
(244, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3600.00, 3615.00, '2018-09-30 08:00:02', NULL),
(245, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3615.00, 3630.00, '2018-09-30 08:01:01', NULL),
(246, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3630.00, 3645.00, '2018-09-30 08:02:02', NULL),
(247, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3645.00, 3660.00, '2018-09-30 08:03:01', NULL),
(248, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3660.00, 3675.00, '2018-09-30 08:04:01', NULL),
(249, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3675.00, 3690.00, '2018-09-30 08:05:02', NULL),
(250, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3690.00, 3705.00, '2018-09-30 08:06:01', NULL),
(251, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3705.00, 3720.00, '2018-09-30 08:07:01', NULL),
(252, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3720.00, 3735.00, '2018-09-30 08:08:02', NULL),
(253, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3735.00, 3750.00, '2018-09-30 08:09:01', NULL),
(254, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3750.00, 3765.00, '2018-09-30 08:10:01', NULL),
(255, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3765.00, 3780.00, '2018-09-30 08:11:01', NULL),
(256, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3780.00, 3795.00, '2018-09-30 08:12:01', NULL),
(257, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3795.00, 3810.00, '2018-09-30 08:13:01', NULL),
(258, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3810.00, 3825.00, '2018-09-30 08:14:02', NULL),
(259, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3825.00, 3840.00, '2018-09-30 08:15:01', NULL),
(260, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3840.00, 3855.00, '2018-09-30 08:16:02', NULL),
(261, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3855.00, 3870.00, '2018-09-30 08:17:01', NULL),
(262, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3870.00, 3885.00, '2018-09-30 08:18:01', NULL),
(263, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3885.00, 3900.00, '2018-09-30 08:19:01', NULL),
(264, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3900.00, 3915.00, '2018-09-30 08:20:02', NULL),
(265, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3915.00, 3930.00, '2018-09-30 08:21:01', NULL),
(266, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3930.00, 3945.00, '2018-09-30 08:22:02', NULL),
(267, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3945.00, 3960.00, '2018-09-30 08:23:01', NULL),
(268, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3960.00, 3975.00, '2018-09-30 08:24:01', NULL),
(269, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3975.00, 3990.00, '2018-09-30 08:25:02', NULL),
(270, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 3990.00, 4005.00, '2018-09-30 08:26:01', NULL),
(271, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4005.00, 4020.00, '2018-09-30 08:27:01', NULL),
(272, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4020.00, 4035.00, '2018-09-30 08:28:02', NULL),
(273, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4035.00, 4050.00, '2018-09-30 08:29:01', NULL),
(274, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4050.00, 4065.00, '2018-09-30 08:30:01', NULL),
(275, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4065.00, 4080.00, '2018-09-30 08:31:01', NULL),
(276, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4080.00, 4095.00, '2018-09-30 08:32:01', NULL),
(277, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4095.00, 4110.00, '2018-09-30 08:33:01', NULL),
(278, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4110.00, 4125.00, '2018-09-30 08:34:01', NULL),
(279, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4125.00, 4140.00, '2018-09-30 08:35:01', NULL),
(280, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4140.00, 4155.00, '2018-09-30 08:36:02', NULL),
(281, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4155.00, 4170.00, '2018-09-30 08:37:01', NULL),
(282, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4170.00, 4185.00, '2018-09-30 08:38:01', NULL),
(283, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4185.00, 4200.00, '2018-09-30 08:39:02', NULL),
(284, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4200.00, 4215.00, '2018-09-30 08:40:01', NULL),
(285, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4215.00, 4230.00, '2018-09-30 08:41:01', NULL),
(286, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4230.00, 4245.00, '2018-09-30 08:42:02', NULL),
(287, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4245.00, 4260.00, '2018-09-30 08:43:01', NULL),
(288, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4260.00, 4275.00, '2018-09-30 08:44:01', NULL),
(289, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4275.00, 4290.00, '2018-09-30 08:45:02', NULL),
(290, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4290.00, 4305.00, '2018-09-30 08:46:01', NULL),
(291, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4305.00, 4320.00, '2018-09-30 08:47:01', NULL),
(292, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4320.00, 4335.00, '2018-09-30 08:48:02', NULL),
(293, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4335.00, 4350.00, '2018-09-30 08:49:01', NULL),
(294, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4350.00, 4365.00, '2018-09-30 08:50:02', NULL),
(295, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4365.00, 4380.00, '2018-09-30 08:51:01', NULL),
(296, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4380.00, 4395.00, '2018-09-30 08:52:01', NULL),
(297, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4395.00, 4410.00, '2018-09-30 08:53:02', NULL),
(298, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4410.00, 4425.00, '2018-09-30 08:54:01', NULL),
(299, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4425.00, 4440.00, '2018-09-30 08:55:01', NULL),
(300, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4440.00, 4455.00, '2018-09-30 08:56:02', NULL),
(301, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4455.00, 4470.00, '2018-09-30 08:57:01', NULL),
(302, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4470.00, 4485.00, '2018-09-30 08:58:01', NULL),
(303, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4485.00, 4500.00, '2018-09-30 08:59:02', NULL),
(304, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4500.00, 4515.00, '2018-09-30 09:00:01', NULL),
(305, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4515.00, 4530.00, '2018-09-30 09:01:02', NULL),
(306, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4530.00, 4545.00, '2018-09-30 09:02:01', NULL),
(307, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4545.00, 4560.00, '2018-09-30 09:03:01', NULL),
(308, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4560.00, 4575.00, '2018-09-30 09:04:02', NULL),
(309, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4575.00, 4590.00, '2018-09-30 09:05:01', NULL),
(310, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4590.00, 4605.00, '2018-09-30 09:06:01', NULL),
(311, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4605.00, 4620.00, '2018-09-30 09:07:02', NULL),
(312, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4620.00, 4635.00, '2018-09-30 09:08:01', NULL),
(313, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4635.00, 4650.00, '2018-09-30 09:09:01', NULL),
(314, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4650.00, 4665.00, '2018-09-30 09:10:02', NULL),
(315, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4665.00, 4680.00, '2018-09-30 09:11:01', NULL),
(316, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4680.00, 4695.00, '2018-09-30 09:12:02', NULL),
(317, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4695.00, 4710.00, '2018-09-30 09:13:01', NULL),
(318, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4710.00, 4725.00, '2018-09-30 09:14:01', NULL),
(319, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4725.00, 4740.00, '2018-09-30 09:15:02', NULL),
(320, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4740.00, 4755.00, '2018-09-30 09:16:01', NULL),
(321, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4755.00, 4770.00, '2018-09-30 09:17:01', NULL),
(322, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4770.00, 4785.00, '2018-09-30 09:18:02', NULL),
(323, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4785.00, 4800.00, '2018-09-30 09:19:01', NULL),
(324, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4800.00, 4815.00, '2018-09-30 09:20:01', NULL),
(325, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4815.00, 4830.00, '2018-09-30 09:21:01', NULL),
(326, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4830.00, 4845.00, '2018-09-30 09:22:01', NULL),
(327, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4845.00, 4860.00, '2018-09-30 09:23:01', NULL),
(328, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4860.00, 4875.00, '2018-09-30 09:24:02', NULL),
(329, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4875.00, 4890.00, '2018-09-30 09:25:01', NULL),
(330, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4890.00, 4905.00, '2018-09-30 09:26:02', NULL),
(331, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4905.00, 4920.00, '2018-09-30 09:27:01', NULL),
(332, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4920.00, 4935.00, '2018-09-30 09:28:01', NULL),
(333, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4935.00, 4950.00, '2018-09-30 09:29:02', NULL),
(334, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4950.00, 4965.00, '2018-09-30 09:30:01', NULL),
(335, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4965.00, 4980.00, '2018-09-30 09:31:01', NULL),
(336, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4980.00, 4995.00, '2018-09-30 09:32:02', NULL),
(337, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 4995.00, 5010.00, '2018-09-30 09:33:01', NULL),
(338, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5010.00, 5025.00, '2018-09-30 09:34:01', NULL),
(339, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5025.00, 5040.00, '2018-09-30 09:35:02', NULL),
(340, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5040.00, 5055.00, '2018-09-30 09:36:01', NULL),
(341, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5055.00, 5070.00, '2018-09-30 09:37:01', NULL),
(342, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5070.00, 5085.00, '2018-09-30 09:38:01', NULL),
(343, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5085.00, 5100.00, '2018-09-30 09:39:01', NULL),
(344, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5100.00, 5115.00, '2018-09-30 09:40:02', NULL),
(345, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5115.00, 5130.00, '2018-09-30 09:41:01', NULL),
(346, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5130.00, 5145.00, '2018-09-30 09:42:01', NULL),
(347, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5145.00, 5160.00, '2018-09-30 09:43:02', NULL),
(348, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5160.00, 5175.00, '2018-09-30 09:44:01', NULL),
(349, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5175.00, 5190.00, '2018-09-30 09:45:01', NULL),
(350, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5190.00, 5205.00, '2018-09-30 09:46:02', NULL),
(351, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5205.00, 5220.00, '2018-09-30 09:47:01', NULL),
(352, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5220.00, 5235.00, '2018-09-30 09:48:01', NULL),
(353, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5235.00, 5250.00, '2018-09-30 09:49:02', NULL),
(354, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5250.00, 5265.00, '2018-09-30 09:50:01', NULL),
(355, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5265.00, 5280.00, '2018-09-30 09:51:01', NULL),
(356, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5280.00, 5295.00, '2018-09-30 09:52:02', NULL),
(357, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5295.00, 5310.00, '2018-09-30 09:53:01', NULL),
(358, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5310.00, 5325.00, '2018-09-30 09:54:01', NULL),
(359, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5325.00, 5340.00, '2018-09-30 09:55:02', NULL),
(360, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5340.00, 5355.00, '2018-09-30 09:56:01', NULL),
(361, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5355.00, 5370.00, '2018-09-30 09:57:01', NULL),
(362, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5370.00, 5385.00, '2018-09-30 09:58:02', NULL),
(363, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5385.00, 5400.00, '2018-09-30 09:59:01', NULL),
(364, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5400.00, 5415.00, '2018-09-30 10:00:02', NULL),
(365, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5415.00, 5430.00, '2018-09-30 10:01:01', NULL),
(366, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5430.00, 5445.00, '2018-09-30 10:02:01', NULL),
(367, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5445.00, 5460.00, '2018-09-30 10:03:02', NULL),
(368, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5460.00, 5475.00, '2018-09-30 10:04:01', NULL),
(369, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5475.00, 5490.00, '2018-09-30 10:05:01', NULL),
(370, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5490.00, 5505.00, '2018-09-30 10:06:02', NULL),
(371, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5505.00, 5520.00, '2018-09-30 10:07:01', NULL),
(372, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5520.00, 5535.00, '2018-09-30 10:08:01', NULL),
(373, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5535.00, 5550.00, '2018-09-30 10:09:02', NULL),
(374, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5550.00, 5565.00, '2018-09-30 10:10:01', NULL),
(375, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5565.00, 5580.00, '2018-09-30 10:11:02', NULL),
(376, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5580.00, 5595.00, '2018-09-30 10:12:01', NULL),
(377, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5595.00, 5610.00, '2018-09-30 10:13:01', NULL),
(378, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5610.00, 5625.00, '2018-09-30 10:14:01', NULL),
(379, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5625.00, 5640.00, '2018-09-30 10:15:02', NULL),
(380, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5640.00, 5655.00, '2018-09-30 10:16:01', NULL),
(381, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5655.00, 5670.00, '2018-09-30 10:17:02', NULL),
(382, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5670.00, 5685.00, '2018-09-30 10:18:01', NULL),
(383, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5685.00, 5700.00, '2018-09-30 10:19:01', NULL),
(384, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5700.00, 5715.00, '2018-09-30 10:20:02', NULL),
(385, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5715.00, 5730.00, '2018-09-30 10:21:01', NULL),
(386, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5730.00, 5745.00, '2018-09-30 10:22:01', NULL),
(387, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5745.00, 5760.00, '2018-09-30 10:23:02', NULL),
(388, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5760.00, 5775.00, '2018-09-30 10:24:01', NULL),
(389, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5775.00, 5790.00, '2018-09-30 10:25:01', NULL),
(390, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5790.00, 5805.00, '2018-09-30 10:26:02', NULL),
(391, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5805.00, 5820.00, '2018-09-30 10:27:01', NULL),
(392, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5820.00, 5835.00, '2018-09-30 10:28:01', NULL),
(393, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5835.00, 5850.00, '2018-09-30 10:29:02', NULL),
(394, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5850.00, 5865.00, '2018-09-30 10:30:01', NULL),
(395, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5865.00, 5880.00, '2018-09-30 10:31:02', NULL),
(396, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5880.00, 5895.00, '2018-09-30 10:32:01', NULL),
(397, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5895.00, 5910.00, '2018-09-30 10:33:01', NULL),
(398, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5910.00, 5925.00, '2018-09-30 10:34:02', NULL),
(399, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5925.00, 5940.00, '2018-09-30 10:35:01', NULL),
(400, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5940.00, 5955.00, '2018-09-30 10:36:01', NULL),
(401, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5955.00, 5970.00, '2018-09-30 10:37:02', NULL),
(402, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5970.00, 5985.00, '2018-09-30 10:38:01', NULL),
(403, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 5985.00, 6000.00, '2018-09-30 10:39:01', NULL),
(404, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6000.00, 6015.00, '2018-09-30 10:40:02', NULL),
(405, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6015.00, 6030.00, '2018-09-30 10:41:01', NULL),
(406, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6030.00, 6045.00, '2018-09-30 10:42:01', NULL),
(407, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6045.00, 6060.00, '2018-09-30 10:43:02', NULL),
(408, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6060.00, 6075.00, '2018-09-30 10:44:01', NULL),
(409, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6075.00, 6090.00, '2018-09-30 10:45:01', NULL),
(410, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6090.00, 6105.00, '2018-09-30 10:46:02', NULL),
(411, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6105.00, 6120.00, '2018-09-30 10:47:01', NULL),
(412, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6120.00, 6135.00, '2018-09-30 10:48:01', NULL),
(413, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6135.00, 6150.00, '2018-09-30 10:49:02', NULL),
(414, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6150.00, 6165.00, '2018-09-30 10:50:01', NULL),
(415, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6165.00, 6180.00, '2018-09-30 10:51:02', NULL),
(416, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6180.00, 6195.00, '2018-09-30 10:52:01', NULL),
(417, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6195.00, 6210.00, '2018-09-30 10:53:01', NULL),
(418, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6210.00, 6225.00, '2018-09-30 10:54:02', NULL),
(419, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6225.00, 6240.00, '2018-09-30 10:55:01', NULL),
(420, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6240.00, 6255.00, '2018-09-30 10:56:01', NULL),
(421, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6255.00, 6270.00, '2018-09-30 10:57:02', NULL),
(422, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6270.00, 6285.00, '2018-09-30 10:58:01', NULL),
(423, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6285.00, 6300.00, '2018-09-30 10:59:01', NULL),
(424, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6300.00, 6315.00, '2018-09-30 11:00:02', NULL),
(425, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6315.00, 6330.00, '2018-09-30 11:01:01', NULL),
(426, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6330.00, 6345.00, '2018-09-30 11:02:02', NULL),
(427, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6345.00, 6360.00, '2018-09-30 11:03:01', NULL),
(428, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6360.00, 6375.00, '2018-09-30 11:04:01', NULL),
(429, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6375.00, 6390.00, '2018-09-30 11:05:02', NULL),
(430, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6390.00, 6405.00, '2018-09-30 11:06:01', NULL),
(431, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6405.00, 6420.00, '2018-09-30 11:07:01', NULL),
(432, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6420.00, 6435.00, '2018-09-30 11:08:02', NULL),
(433, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6435.00, 6450.00, '2018-09-30 11:09:01', NULL),
(434, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6450.00, 6465.00, '2018-09-30 11:10:01', NULL),
(435, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6465.00, 6480.00, '2018-09-30 11:11:02', NULL),
(436, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6480.00, 6495.00, '2018-09-30 11:12:01', NULL),
(437, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6495.00, 6510.00, '2018-09-30 11:13:01', NULL),
(438, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6510.00, 6525.00, '2018-09-30 11:14:02', NULL),
(439, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6525.00, 6540.00, '2018-09-30 11:15:01', NULL),
(440, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6540.00, 6555.00, '2018-09-30 11:16:01', NULL),
(441, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6555.00, 6570.00, '2018-09-30 11:17:02', NULL),
(442, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6570.00, 6585.00, '2018-09-30 11:18:01', NULL),
(443, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6585.00, 6600.00, '2018-09-30 11:19:01', NULL),
(444, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6600.00, 6615.00, '2018-09-30 11:20:02', NULL),
(445, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6615.00, 6630.00, '2018-09-30 11:21:01', NULL),
(446, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6630.00, 6645.00, '2018-09-30 11:22:02', NULL),
(447, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6645.00, 6660.00, '2018-09-30 11:23:01', NULL),
(448, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6660.00, 6675.00, '2018-09-30 11:24:01', NULL),
(449, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6675.00, 6690.00, '2018-09-30 11:25:02', NULL),
(450, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6690.00, 6705.00, '2018-09-30 11:26:01', NULL),
(451, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6705.00, 6720.00, '2018-09-30 11:27:01', NULL),
(452, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6720.00, 6735.00, '2018-09-30 11:28:02', NULL),
(453, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6735.00, 6750.00, '2018-09-30 11:29:01', NULL),
(454, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6750.00, 6765.00, '2018-09-30 11:30:02', NULL),
(455, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6765.00, 6780.00, '2018-09-30 11:31:01', NULL),
(456, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6780.00, 6795.00, '2018-09-30 11:32:01', NULL),
(457, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6795.00, 6810.00, '2018-09-30 11:33:02', NULL),
(458, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6810.00, 6825.00, '2018-09-30 11:34:01', NULL);
INSERT INTO `user_commissions` (`id`, `receiver_id`, `payer_id`, `payment_id`, `payment`, `level_id`, `transaction_type`, `commission_amount`, `opening_balance`, `closing_balance`, `created_at`, `updated_at`) VALUES
(459, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6825.00, 6840.00, '2018-09-30 11:35:01', NULL),
(460, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6840.00, 6855.00, '2018-09-30 11:36:02', NULL),
(461, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6855.00, 6870.00, '2018-09-30 11:37:01', NULL),
(462, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6870.00, 6885.00, '2018-09-30 11:38:01', NULL),
(463, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6885.00, 6900.00, '2018-09-30 11:39:02', NULL),
(464, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6900.00, 6915.00, '2018-09-30 11:40:01', NULL),
(465, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6915.00, 6930.00, '2018-09-30 11:41:01', NULL),
(466, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6930.00, 6945.00, '2018-09-30 11:42:02', NULL),
(467, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6945.00, 6960.00, '2018-09-30 11:43:02', NULL),
(468, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6960.00, 6975.00, '2018-09-30 11:44:01', NULL),
(469, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6975.00, 6990.00, '2018-09-30 11:45:01', NULL),
(470, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 6990.00, 7005.00, '2018-09-30 11:46:02', NULL),
(471, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7005.00, 7020.00, '2018-09-30 11:47:01', NULL),
(472, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7020.00, 7035.00, '2018-09-30 11:48:01', NULL),
(473, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7035.00, 7050.00, '2018-09-30 11:49:02', NULL),
(474, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7050.00, 7065.00, '2018-09-30 11:50:01', NULL),
(475, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7065.00, 7080.00, '2018-09-30 11:51:01', NULL),
(476, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7080.00, 7095.00, '2018-09-30 11:52:01', NULL),
(477, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7095.00, 7110.00, '2018-09-30 11:53:01', NULL),
(478, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7110.00, 7125.00, '2018-09-30 11:54:01', NULL),
(479, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7125.00, 7140.00, '2018-09-30 11:55:02', NULL),
(480, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7140.00, 7155.00, '2018-09-30 11:56:01', NULL),
(481, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7155.00, 7170.00, '2018-09-30 11:57:02', NULL),
(482, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7170.00, 7185.00, '2018-09-30 11:58:01', NULL),
(483, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7185.00, 7200.00, '2018-09-30 11:59:01', NULL),
(484, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7200.00, 7215.00, '2018-09-30 12:00:02', NULL),
(485, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7215.00, 7230.00, '2018-09-30 12:01:01', NULL),
(486, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7230.00, 7245.00, '2018-09-30 12:02:01', NULL),
(487, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7245.00, 7260.00, '2018-09-30 12:03:01', NULL),
(488, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7260.00, 7275.00, '2018-09-30 12:04:01', NULL),
(489, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7275.00, 7290.00, '2018-09-30 12:05:02', NULL),
(490, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7290.00, 7305.00, '2018-09-30 12:06:01', NULL),
(491, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7305.00, 7320.00, '2018-09-30 12:07:01', NULL),
(492, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7320.00, 7335.00, '2018-09-30 12:08:02', NULL),
(493, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7335.00, 7350.00, '2018-09-30 12:09:01', NULL),
(494, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7350.00, 7365.00, '2018-09-30 12:10:01', NULL),
(495, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7365.00, 7380.00, '2018-09-30 12:11:02', NULL),
(496, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7380.00, 7395.00, '2018-09-30 12:12:01', NULL),
(497, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7395.00, 7410.00, '2018-09-30 12:13:01', NULL),
(498, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7410.00, 7425.00, '2018-09-30 12:14:02', NULL),
(499, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7425.00, 7440.00, '2018-09-30 12:15:01', NULL),
(500, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7440.00, 7455.00, '2018-09-30 12:16:01', NULL),
(501, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7455.00, 7470.00, '2018-09-30 12:17:02', NULL),
(502, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7470.00, 7485.00, '2018-09-30 12:18:01', NULL),
(503, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7485.00, 7500.00, '2018-09-30 12:19:02', NULL),
(504, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7500.00, 7515.00, '2018-09-30 12:20:01', NULL),
(505, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7515.00, 7530.00, '2018-09-30 12:21:01', NULL),
(506, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7530.00, 7545.00, '2018-09-30 12:22:02', NULL),
(507, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7545.00, 7560.00, '2018-09-30 12:23:01', NULL),
(508, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7560.00, 7575.00, '2018-09-30 12:24:01', NULL),
(509, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7575.00, 7590.00, '2018-09-30 12:25:02', NULL),
(510, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7590.00, 7605.00, '2018-09-30 12:26:01', NULL),
(511, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7605.00, 7620.00, '2018-09-30 12:27:02', NULL),
(512, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7620.00, 7635.00, '2018-09-30 12:28:01', NULL),
(513, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7635.00, 7650.00, '2018-09-30 12:29:01', NULL),
(514, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7650.00, 7665.00, '2018-09-30 12:30:07', NULL),
(515, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7665.00, 7680.00, '2018-09-30 12:31:01', NULL),
(516, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7680.00, 7695.00, '2018-09-30 12:32:01', NULL),
(517, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7695.00, 7710.00, '2018-09-30 12:33:02', NULL),
(518, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7710.00, 7725.00, '2018-09-30 12:34:01', NULL),
(519, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7725.00, 7740.00, '2018-09-30 12:35:01', NULL),
(520, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7740.00, 7755.00, '2018-09-30 12:36:01', NULL),
(521, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7755.00, 7770.00, '2018-09-30 12:37:01', NULL),
(522, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7770.00, 7785.00, '2018-09-30 12:38:01', NULL),
(523, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7785.00, 7800.00, '2018-09-30 12:39:02', NULL),
(524, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7800.00, 7815.00, '2018-09-30 12:40:01', NULL),
(525, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7815.00, 7830.00, '2018-09-30 12:41:02', NULL),
(526, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7830.00, 7845.00, '2018-09-30 12:42:01', NULL),
(527, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7845.00, 7860.00, '2018-09-30 12:43:01', NULL),
(528, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7860.00, 7875.00, '2018-09-30 12:44:02', NULL),
(529, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7875.00, 7890.00, '2018-09-30 12:45:01', NULL),
(530, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7890.00, 7905.00, '2018-09-30 12:46:01', NULL),
(531, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7905.00, 7920.00, '2018-09-30 12:47:02', NULL),
(532, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7920.00, 7935.00, '2018-09-30 12:48:01', NULL),
(533, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7935.00, 7950.00, '2018-09-30 12:49:01', NULL),
(534, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7950.00, 7965.00, '2018-09-30 12:50:02', NULL),
(535, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7965.00, 7980.00, '2018-09-30 12:51:01', NULL),
(536, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7980.00, 7995.00, '2018-09-30 12:52:01', NULL),
(537, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 7995.00, 8010.00, '2018-09-30 12:53:02', NULL),
(538, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8010.00, 8025.00, '2018-09-30 12:54:01', NULL),
(539, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8025.00, 8040.00, '2018-09-30 12:55:01', NULL),
(540, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8040.00, 8055.00, '2018-09-30 12:56:01', NULL),
(541, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8055.00, 8070.00, '2018-09-30 12:57:01', NULL),
(542, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8070.00, 8085.00, '2018-09-30 12:58:01', NULL),
(543, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8085.00, 8100.00, '2018-09-30 12:59:02', NULL),
(544, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8100.00, 8115.00, '2018-09-30 13:00:01', NULL),
(545, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8115.00, 8130.00, '2018-09-30 13:01:02', NULL),
(546, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8130.00, 8145.00, '2018-09-30 13:02:01', NULL),
(547, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8145.00, 8160.00, '2018-09-30 13:03:01', NULL),
(548, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8160.00, 8175.00, '2018-09-30 13:04:02', NULL),
(549, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8175.00, 8190.00, '2018-09-30 13:05:01', NULL),
(550, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8190.00, 8205.00, '2018-09-30 13:06:01', NULL),
(551, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8205.00, 8220.00, '2018-09-30 13:07:02', NULL),
(552, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8220.00, 8235.00, '2018-09-30 13:08:01', NULL),
(553, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8235.00, 8250.00, '2018-09-30 13:09:01', NULL),
(554, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8250.00, 8265.00, '2018-09-30 13:10:02', NULL),
(555, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8265.00, 8280.00, '2018-09-30 13:11:01', NULL),
(556, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8280.00, 8295.00, '2018-09-30 13:12:02', NULL),
(557, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8295.00, 8310.00, '2018-09-30 13:13:01', NULL),
(558, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8310.00, 8325.00, '2018-09-30 13:14:01', NULL),
(559, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8325.00, 8340.00, '2018-09-30 13:15:02', NULL),
(560, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8340.00, 8355.00, '2018-09-30 13:16:01', NULL),
(561, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8355.00, 8370.00, '2018-09-30 13:17:01', NULL),
(562, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8370.00, 8385.00, '2018-09-30 13:18:02', NULL),
(563, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8385.00, 8400.00, '2018-09-30 13:19:01', NULL),
(564, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8400.00, 8415.00, '2018-09-30 13:20:01', NULL),
(565, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8415.00, 8430.00, '2018-09-30 13:21:02', NULL),
(566, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8430.00, 8445.00, '2018-09-30 13:22:01', NULL),
(567, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8445.00, 8460.00, '2018-09-30 13:23:01', NULL),
(568, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8460.00, 8475.00, '2018-09-30 13:24:02', NULL),
(569, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8475.00, 8490.00, '2018-09-30 13:25:01', NULL),
(570, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8490.00, 8505.00, '2018-09-30 13:26:02', NULL),
(571, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8505.00, 8520.00, '2018-09-30 13:27:01', NULL),
(572, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8520.00, 8535.00, '2018-09-30 13:28:01', NULL),
(573, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8535.00, 8550.00, '2018-09-30 13:29:01', NULL),
(574, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8550.00, 8565.00, '2018-09-30 13:30:02', NULL),
(575, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8565.00, 8580.00, '2018-09-30 13:31:01', NULL),
(576, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8580.00, 8595.00, '2018-09-30 13:32:02', NULL),
(577, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8595.00, 8610.00, '2018-09-30 13:33:01', NULL),
(578, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8610.00, 8625.00, '2018-09-30 13:34:01', NULL),
(579, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8625.00, 8640.00, '2018-09-30 13:35:02', NULL),
(580, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8640.00, 8655.00, '2018-09-30 13:36:01', NULL),
(581, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8655.00, 8670.00, '2018-09-30 13:37:01', NULL),
(582, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8670.00, 8685.00, '2018-09-30 13:38:02', NULL),
(583, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8685.00, 8700.00, '2018-09-30 13:39:01', NULL),
(584, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8700.00, 8715.00, '2018-09-30 13:40:01', NULL),
(585, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8715.00, 8730.00, '2018-09-30 13:41:02', NULL),
(586, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8730.00, 8745.00, '2018-09-30 13:42:01', NULL),
(587, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8745.00, 8760.00, '2018-09-30 13:43:01', NULL),
(588, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8760.00, 8775.00, '2018-09-30 13:44:02', NULL),
(589, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8775.00, 8790.00, '2018-09-30 13:45:01', NULL),
(590, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8790.00, 8805.00, '2018-09-30 13:46:02', NULL),
(591, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8805.00, 8820.00, '2018-09-30 13:47:01', NULL),
(592, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8820.00, 8835.00, '2018-09-30 13:48:01', NULL),
(593, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8835.00, 8850.00, '2018-09-30 13:49:01', NULL),
(594, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8850.00, 8865.00, '2018-09-30 13:50:02', NULL),
(595, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8865.00, 8880.00, '2018-09-30 13:51:01', NULL),
(596, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8880.00, 8895.00, '2018-09-30 13:52:02', NULL),
(597, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8895.00, 8910.00, '2018-09-30 13:53:01', NULL),
(598, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8910.00, 8925.00, '2018-09-30 13:54:01', NULL),
(599, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8925.00, 8940.00, '2018-09-30 13:55:02', NULL),
(600, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8940.00, 8955.00, '2018-09-30 13:56:01', NULL),
(601, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8955.00, 8970.00, '2018-09-30 13:57:01', NULL),
(602, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8970.00, 8985.00, '2018-09-30 13:58:02', NULL),
(603, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 8985.00, 9000.00, '2018-09-30 13:59:01', NULL),
(604, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9000.00, 9015.00, '2018-09-30 14:00:02', NULL),
(605, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9015.00, 9030.00, '2018-09-30 14:01:01', NULL),
(606, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9030.00, 9045.00, '2018-09-30 14:02:01', NULL),
(607, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9045.00, 9060.00, '2018-09-30 14:03:02', NULL),
(608, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9060.00, 9075.00, '2018-09-30 14:04:01', NULL),
(609, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9075.00, 9090.00, '2018-09-30 14:05:01', NULL),
(610, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9090.00, 9105.00, '2018-09-30 14:06:01', NULL),
(611, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9105.00, 9120.00, '2018-09-30 14:07:01', NULL),
(612, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9120.00, 9135.00, '2018-09-30 14:08:01', NULL),
(613, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9135.00, 9150.00, '2018-09-30 14:09:02', NULL),
(614, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9150.00, 9165.00, '2018-09-30 14:10:01', NULL),
(615, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9165.00, 9180.00, '2018-09-30 14:11:02', NULL),
(616, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9180.00, 9195.00, '2018-09-30 14:12:01', NULL),
(617, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9195.00, 9210.00, '2018-09-30 14:13:01', NULL),
(618, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9210.00, 9225.00, '2018-09-30 14:14:02', NULL),
(619, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9225.00, 9240.00, '2018-09-30 14:15:01', NULL),
(620, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9240.00, 9255.00, '2018-09-30 14:16:01', NULL),
(621, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9255.00, 9270.00, '2018-09-30 14:17:02', NULL),
(622, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9270.00, 9285.00, '2018-09-30 14:18:01', NULL),
(623, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9285.00, 9300.00, '2018-09-30 14:19:02', NULL),
(624, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9300.00, 9315.00, '2018-09-30 14:20:01', NULL),
(625, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9315.00, 9330.00, '2018-09-30 14:21:01', NULL),
(626, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9330.00, 9345.00, '2018-09-30 14:22:02', NULL),
(627, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9345.00, 9360.00, '2018-09-30 14:23:01', NULL),
(628, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9360.00, 9375.00, '2018-09-30 14:24:01', NULL),
(629, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9375.00, 9390.00, '2018-09-30 14:25:02', NULL),
(630, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9390.00, 9405.00, '2018-09-30 14:26:01', NULL),
(631, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9405.00, 9420.00, '2018-09-30 14:27:02', NULL),
(632, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9420.00, 9435.00, '2018-09-30 14:28:01', NULL),
(633, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9435.00, 9450.00, '2018-09-30 14:29:01', NULL),
(634, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9450.00, 9465.00, '2018-09-30 14:30:02', NULL),
(635, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9465.00, 9480.00, '2018-09-30 14:31:01', NULL),
(636, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9480.00, 9495.00, '2018-09-30 14:32:01', NULL),
(637, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9495.00, 9510.00, '2018-09-30 14:33:02', NULL),
(638, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9510.00, 9525.00, '2018-09-30 14:34:01', NULL),
(639, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9525.00, 9540.00, '2018-09-30 14:35:01', NULL),
(640, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9540.00, 9555.00, '2018-09-30 14:36:01', NULL),
(641, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9555.00, 9570.00, '2018-09-30 14:37:01', NULL),
(642, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9570.00, 9585.00, '2018-09-30 14:38:01', NULL),
(643, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9585.00, 9600.00, '2018-09-30 14:39:02', NULL),
(644, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9600.00, 9615.00, '2018-09-30 14:40:01', NULL),
(645, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9615.00, 9630.00, '2018-09-30 14:41:02', NULL),
(646, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9630.00, 9645.00, '2018-09-30 14:42:01', NULL),
(647, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9645.00, 9660.00, '2018-09-30 14:43:01', NULL),
(648, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9660.00, 9675.00, '2018-09-30 14:44:02', NULL),
(649, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9675.00, 9690.00, '2018-09-30 14:45:01', NULL),
(650, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9690.00, 9705.00, '2018-09-30 14:46:01', NULL),
(651, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9705.00, 9720.00, '2018-09-30 14:47:02', NULL),
(652, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9720.00, 9735.00, '2018-09-30 14:48:01', NULL),
(653, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9735.00, 9750.00, '2018-09-30 14:49:01', NULL),
(654, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9750.00, 9765.00, '2018-09-30 14:50:02', NULL),
(655, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9765.00, 9780.00, '2018-09-30 14:51:01', NULL),
(656, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9780.00, 9795.00, '2018-09-30 14:52:01', NULL),
(657, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9795.00, 9810.00, '2018-09-30 14:53:02', NULL),
(658, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9810.00, 9825.00, '2018-09-30 14:54:01', NULL),
(659, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9825.00, 9840.00, '2018-09-30 14:55:02', NULL),
(660, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9840.00, 9855.00, '2018-09-30 14:56:01', NULL),
(661, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9855.00, 9870.00, '2018-09-30 14:57:01', NULL),
(662, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9870.00, 9885.00, '2018-09-30 14:58:02', NULL),
(663, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9885.00, 9900.00, '2018-09-30 14:59:01', NULL),
(664, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9900.00, 9915.00, '2018-09-30 15:00:02', NULL),
(665, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9915.00, 9930.00, '2018-09-30 15:01:02', NULL),
(666, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9930.00, 9945.00, '2018-09-30 15:02:01', NULL),
(667, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9945.00, 9960.00, '2018-09-30 15:03:01', NULL),
(668, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9960.00, 9975.00, '2018-09-30 15:04:01', NULL),
(669, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9975.00, 9990.00, '2018-09-30 15:05:01', NULL),
(670, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 9990.00, 10005.00, '2018-09-30 15:06:01', NULL),
(671, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10005.00, 10020.00, '2018-09-30 15:07:02', NULL),
(672, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10020.00, 10035.00, '2018-09-30 15:08:01', NULL),
(673, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10035.00, 10050.00, '2018-09-30 15:09:01', NULL),
(674, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10050.00, 10065.00, '2018-09-30 15:10:02', NULL),
(675, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10065.00, 10080.00, '2018-09-30 15:11:01', NULL),
(676, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10080.00, 10095.00, '2018-09-30 15:12:01', NULL),
(677, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10095.00, 10110.00, '2018-09-30 15:13:02', NULL),
(678, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10110.00, 10125.00, '2018-09-30 15:14:01', NULL),
(679, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10125.00, 10140.00, '2018-09-30 15:15:01', NULL),
(680, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10140.00, 10155.00, '2018-09-30 15:16:01', NULL),
(681, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10155.00, 10170.00, '2018-09-30 15:17:01', NULL),
(682, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10170.00, 10185.00, '2018-09-30 15:18:01', NULL),
(683, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10185.00, 10200.00, '2018-09-30 15:19:02', NULL),
(684, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10200.00, 10215.00, '2018-09-30 15:20:01', NULL),
(685, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10215.00, 10230.00, '2018-09-30 15:21:02', NULL),
(686, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10230.00, 10245.00, '2018-09-30 15:22:01', NULL),
(687, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10245.00, 10260.00, '2018-09-30 15:23:01', NULL),
(688, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10260.00, 10275.00, '2018-09-30 15:24:02', NULL),
(689, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10275.00, 10290.00, '2018-09-30 15:25:01', NULL),
(690, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10290.00, 10305.00, '2018-09-30 15:26:01', NULL),
(691, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10305.00, 10320.00, '2018-09-30 15:27:02', NULL),
(692, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10320.00, 10335.00, '2018-09-30 15:28:01', NULL),
(693, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10335.00, 10350.00, '2018-09-30 15:29:01', NULL),
(694, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10350.00, 10365.00, '2018-09-30 15:30:02', NULL),
(695, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10365.00, 10380.00, '2018-09-30 15:31:01', NULL),
(696, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10380.00, 10395.00, '2018-09-30 15:32:01', NULL),
(697, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10395.00, 10410.00, '2018-09-30 15:33:02', NULL),
(698, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10410.00, 10425.00, '2018-09-30 15:34:01', NULL),
(699, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10425.00, 10440.00, '2018-09-30 15:35:02', NULL),
(700, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10440.00, 10455.00, '2018-09-30 15:36:01', NULL),
(701, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10455.00, 10470.00, '2018-09-30 15:37:01', NULL),
(702, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10470.00, 10485.00, '2018-09-30 15:38:02', NULL),
(703, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10485.00, 10500.00, '2018-09-30 15:39:01', NULL),
(704, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10500.00, 10515.00, '2018-09-30 15:40:01', NULL),
(705, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10515.00, 10530.00, '2018-09-30 15:41:02', NULL),
(706, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10530.00, 10545.00, '2018-09-30 15:42:01', NULL),
(707, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10545.00, 10560.00, '2018-09-30 15:43:01', NULL),
(708, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10560.00, 10575.00, '2018-09-30 15:44:02', NULL),
(709, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10575.00, 10590.00, '2018-09-30 15:45:01', NULL),
(710, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10590.00, 10605.00, '2018-09-30 15:46:01', NULL),
(711, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10605.00, 10620.00, '2018-09-30 15:47:02', NULL),
(712, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10620.00, 10635.00, '2018-09-30 15:48:01', NULL),
(713, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10635.00, 10650.00, '2018-09-30 15:49:01', NULL),
(714, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10650.00, 10665.00, '2018-09-30 15:50:02', NULL),
(715, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10665.00, 10680.00, '2018-09-30 15:51:01', NULL),
(716, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10680.00, 10695.00, '2018-09-30 15:52:02', NULL),
(717, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10695.00, 10710.00, '2018-09-30 15:53:01', NULL),
(718, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10710.00, 10725.00, '2018-09-30 15:54:01', NULL),
(719, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10725.00, 10740.00, '2018-09-30 15:55:02', NULL),
(720, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10740.00, 10755.00, '2018-09-30 15:56:01', NULL),
(721, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10755.00, 10770.00, '2018-09-30 15:57:01', NULL),
(722, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10770.00, 10785.00, '2018-09-30 15:58:02', NULL),
(723, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10785.00, 10800.00, '2018-09-30 15:59:01', NULL),
(724, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10800.00, 10815.00, '2018-09-30 16:00:02', NULL),
(725, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10815.00, 10830.00, '2018-09-30 16:01:01', NULL),
(726, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10830.00, 10845.00, '2018-09-30 16:02:01', NULL),
(727, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10845.00, 10860.00, '2018-09-30 16:03:02', NULL),
(728, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10860.00, 10875.00, '2018-09-30 16:04:01', NULL),
(729, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10875.00, 10890.00, '2018-09-30 16:05:01', NULL),
(730, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10890.00, 10905.00, '2018-09-30 16:06:02', NULL),
(731, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10905.00, 10920.00, '2018-09-30 16:07:01', NULL),
(732, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10920.00, 10935.00, '2018-09-30 16:08:01', NULL),
(733, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10935.00, 10950.00, '2018-09-30 16:09:02', NULL),
(734, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10950.00, 10965.00, '2018-09-30 16:10:01', NULL),
(735, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10965.00, 10980.00, '2018-09-30 16:11:02', NULL),
(736, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10980.00, 10995.00, '2018-09-30 16:12:01', NULL),
(737, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 10995.00, 11010.00, '2018-09-30 16:13:01', NULL),
(738, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11010.00, 11025.00, '2018-09-30 16:14:02', NULL),
(739, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11025.00, 11040.00, '2018-09-30 16:15:01', NULL),
(740, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11040.00, 11055.00, '2018-09-30 16:16:02', NULL),
(741, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11055.00, 11070.00, '2018-09-30 16:17:01', NULL),
(742, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11070.00, 11085.00, '2018-09-30 16:18:01', NULL),
(743, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11085.00, 11100.00, '2018-09-30 16:19:02', NULL),
(744, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11100.00, 11115.00, '2018-09-30 16:20:01', NULL),
(745, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11115.00, 11130.00, '2018-09-30 16:21:01', NULL),
(746, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11130.00, 11145.00, '2018-09-30 16:22:02', NULL),
(747, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11145.00, 11160.00, '2018-09-30 16:23:01', NULL),
(748, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11160.00, 11175.00, '2018-09-30 16:24:01', NULL),
(749, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11175.00, 11190.00, '2018-09-30 16:25:02', NULL),
(750, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11190.00, 11205.00, '2018-09-30 16:26:02', NULL),
(751, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11205.00, 11220.00, '2018-09-30 16:27:01', NULL),
(752, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11220.00, 11235.00, '2018-09-30 16:28:01', NULL),
(753, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11235.00, 11250.00, '2018-09-30 16:29:02', NULL),
(754, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11250.00, 11265.00, '2018-09-30 16:30:01', NULL),
(755, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11265.00, 11280.00, '2018-09-30 16:31:02', NULL),
(756, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11280.00, 11295.00, '2018-09-30 16:32:01', NULL),
(757, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11295.00, 11310.00, '2018-09-30 16:33:01', NULL),
(758, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11310.00, 11325.00, '2018-09-30 16:34:02', NULL),
(759, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11325.00, 11340.00, '2018-09-30 16:35:02', NULL),
(760, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11340.00, 11355.00, '2018-09-30 16:36:01', NULL),
(761, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11355.00, 11370.00, '2018-09-30 16:37:02', NULL),
(762, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11370.00, 11385.00, '2018-09-30 16:38:01', NULL),
(763, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11385.00, 11400.00, '2018-09-30 16:39:01', NULL),
(764, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11400.00, 11415.00, '2018-09-30 16:40:02', NULL),
(765, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11415.00, 11430.00, '2018-09-30 16:41:01', NULL),
(766, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11430.00, 11445.00, '2018-09-30 16:42:01', NULL),
(767, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11445.00, 11460.00, '2018-09-30 16:43:02', NULL),
(768, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11460.00, 11475.00, '2018-09-30 16:44:01', NULL),
(769, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11475.00, 11490.00, '2018-09-30 16:45:01', NULL),
(770, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11490.00, 11505.00, '2018-09-30 16:46:01', NULL),
(771, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11505.00, 11520.00, '2018-09-30 16:47:01', NULL),
(772, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11520.00, 11535.00, '2018-09-30 16:48:01', NULL),
(773, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11535.00, 11550.00, '2018-09-30 16:49:02', NULL),
(774, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11550.00, 11565.00, '2018-09-30 16:50:01', NULL),
(775, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11565.00, 11580.00, '2018-09-30 16:51:02', NULL),
(776, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11580.00, 11595.00, '2018-09-30 16:52:01', NULL),
(777, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11595.00, 11610.00, '2018-09-30 16:53:01', NULL),
(778, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11610.00, 11625.00, '2018-09-30 16:54:02', NULL),
(779, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11625.00, 11640.00, '2018-09-30 16:55:01', NULL),
(780, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11640.00, 11655.00, '2018-09-30 16:56:01', NULL),
(781, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11655.00, 11670.00, '2018-09-30 16:57:02', NULL),
(782, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11670.00, 11685.00, '2018-09-30 16:58:01', NULL),
(783, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11685.00, 11700.00, '2018-09-30 16:59:01', NULL),
(784, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11700.00, 11715.00, '2018-09-30 17:00:02', NULL),
(785, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11715.00, 11730.00, '2018-09-30 17:01:01', NULL),
(786, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11730.00, 11745.00, '2018-09-30 17:02:02', NULL),
(787, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11745.00, 11760.00, '2018-09-30 17:03:01', NULL),
(788, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11760.00, 11775.00, '2018-09-30 17:04:01', NULL),
(789, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11775.00, 11790.00, '2018-09-30 17:05:02', NULL),
(790, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11790.00, 11805.00, '2018-09-30 17:06:01', NULL),
(791, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11805.00, 11820.00, '2018-09-30 17:07:01', NULL),
(792, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11820.00, 11835.00, '2018-09-30 17:08:02', NULL),
(793, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11835.00, 11850.00, '2018-09-30 17:09:01', NULL),
(794, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11850.00, 11865.00, '2018-09-30 17:10:02', NULL),
(795, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11865.00, 11880.00, '2018-09-30 17:11:01', NULL),
(796, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11880.00, 11895.00, '2018-09-30 17:12:01', NULL),
(797, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11895.00, 11910.00, '2018-09-30 17:13:02', NULL),
(798, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11910.00, 11925.00, '2018-09-30 17:14:01', NULL),
(799, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11925.00, 11940.00, '2018-09-30 17:15:01', NULL),
(800, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11940.00, 11955.00, '2018-09-30 17:16:02', NULL),
(801, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11955.00, 11970.00, '2018-09-30 17:17:01', NULL),
(802, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11970.00, 11985.00, '2018-09-30 17:18:01', NULL),
(803, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 11985.00, 12000.00, '2018-09-30 17:19:02', NULL),
(804, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12000.00, 12015.00, '2018-09-30 17:20:01', NULL),
(805, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12015.00, 12030.00, '2018-09-30 17:21:02', NULL),
(806, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12030.00, 12045.00, '2018-09-30 17:22:01', NULL),
(807, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12045.00, 12060.00, '2018-09-30 17:23:01', NULL),
(808, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12060.00, 12075.00, '2018-09-30 17:24:01', NULL),
(809, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12075.00, 12090.00, '2018-09-30 17:25:02', NULL),
(810, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12090.00, 12105.00, '2018-09-30 17:26:01', NULL),
(811, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12105.00, 12120.00, '2018-09-30 17:27:02', NULL),
(812, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12120.00, 12135.00, '2018-09-30 17:28:01', NULL),
(813, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12135.00, 12150.00, '2018-09-30 17:29:01', NULL),
(814, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12150.00, 12165.00, '2018-09-30 17:30:02', NULL),
(815, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12165.00, 12180.00, '2018-09-30 17:31:01', NULL),
(816, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12180.00, 12195.00, '2018-09-30 17:32:01', NULL),
(817, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12195.00, 12210.00, '2018-09-30 17:33:02', NULL),
(818, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12210.00, 12225.00, '2018-09-30 17:34:01', NULL),
(819, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12225.00, 12240.00, '2018-09-30 17:35:01', NULL),
(820, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12240.00, 12255.00, '2018-09-30 17:36:01', NULL),
(821, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12255.00, 12270.00, '2018-09-30 17:37:01', NULL),
(822, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12270.00, 12285.00, '2018-09-30 17:38:01', NULL),
(823, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12285.00, 12300.00, '2018-09-30 17:39:02', NULL),
(824, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12300.00, 12315.00, '2018-09-30 17:40:01', NULL),
(825, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12315.00, 12330.00, '2018-09-30 17:41:02', NULL),
(826, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12330.00, 12345.00, '2018-09-30 17:42:01', NULL),
(827, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12345.00, 12360.00, '2018-09-30 17:43:01', NULL),
(828, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12360.00, 12375.00, '2018-09-30 17:44:02', NULL),
(829, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12375.00, 12390.00, '2018-09-30 17:45:01', NULL),
(830, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12390.00, 12405.00, '2018-09-30 17:46:01', NULL),
(831, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12405.00, 12420.00, '2018-09-30 17:47:02', NULL),
(832, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12420.00, 12435.00, '2018-09-30 17:48:01', NULL),
(833, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12435.00, 12450.00, '2018-09-30 17:49:01', NULL),
(834, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12450.00, 12465.00, '2018-09-30 17:50:02', NULL),
(835, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12465.00, 12480.00, '2018-09-30 17:51:01', NULL),
(836, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12480.00, 12495.00, '2018-09-30 17:52:01', NULL),
(837, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12495.00, 12510.00, '2018-09-30 17:53:02', NULL),
(838, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12510.00, 12525.00, '2018-09-30 17:54:01', NULL),
(839, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12525.00, 12540.00, '2018-09-30 17:55:01', NULL),
(840, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12540.00, 12555.00, '2018-09-30 17:56:01', NULL),
(841, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12555.00, 12570.00, '2018-09-30 17:57:01', NULL),
(842, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12570.00, 12585.00, '2018-09-30 17:58:01', NULL),
(843, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12585.00, 12600.00, '2018-09-30 17:59:02', NULL),
(844, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12600.00, 12615.00, '2018-09-30 18:00:01', NULL),
(845, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12615.00, 12630.00, '2018-09-30 18:01:02', NULL),
(846, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12630.00, 12645.00, '2018-09-30 18:02:01', NULL),
(847, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12645.00, 12660.00, '2018-09-30 18:03:01', NULL),
(848, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12660.00, 12675.00, '2018-09-30 18:04:02', NULL),
(849, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12675.00, 12690.00, '2018-09-30 18:05:01', NULL),
(850, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12690.00, 12705.00, '2018-09-30 18:06:01', NULL),
(851, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12705.00, 12720.00, '2018-09-30 18:07:02', NULL),
(852, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12720.00, 12735.00, '2018-09-30 18:08:01', NULL),
(853, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12735.00, 12750.00, '2018-09-30 18:09:01', NULL),
(854, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12750.00, 12765.00, '2018-09-30 18:10:02', NULL),
(855, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12765.00, 12780.00, '2018-09-30 18:11:01', NULL),
(856, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12780.00, 12795.00, '2018-09-30 18:12:02', NULL),
(857, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12795.00, 12810.00, '2018-09-30 18:13:01', NULL),
(858, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12810.00, 12825.00, '2018-09-30 18:14:01', NULL),
(859, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12825.00, 12840.00, '2018-09-30 18:15:02', NULL),
(860, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12840.00, 12855.00, '2018-09-30 18:16:01', NULL),
(861, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12855.00, 12870.00, '2018-09-30 18:17:01', NULL),
(862, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12870.00, 12885.00, '2018-09-30 18:18:02', NULL),
(863, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12885.00, 12900.00, '2018-09-30 18:19:01', NULL),
(864, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12900.00, 12915.00, '2018-09-30 18:20:02', NULL),
(865, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12915.00, 12930.00, '2018-09-30 18:21:01', NULL),
(866, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12930.00, 12945.00, '2018-09-30 18:22:01', NULL),
(867, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12945.00, 12960.00, '2018-09-30 18:23:02', NULL),
(868, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12960.00, 12975.00, '2018-09-30 18:24:01', NULL),
(869, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12975.00, 12990.00, '2018-09-30 18:25:01', NULL),
(870, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 12990.00, 13005.00, '2018-09-30 18:26:02', NULL),
(871, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13005.00, 13020.00, '2018-09-30 18:27:01', NULL),
(872, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13020.00, 13035.00, '2018-09-30 18:28:01', NULL),
(873, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13035.00, 13050.00, '2018-09-30 18:29:02', NULL),
(874, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13050.00, 13065.00, '2018-09-30 18:30:01', NULL),
(875, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13065.00, 13080.00, '2018-09-30 18:31:02', NULL),
(876, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13080.00, 13095.00, '2018-09-30 18:32:01', NULL),
(877, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13095.00, 13110.00, '2018-09-30 18:33:01', NULL),
(878, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13110.00, 13125.00, '2018-09-30 18:34:02', NULL),
(879, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13125.00, 13140.00, '2018-09-30 18:35:01', NULL),
(880, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13140.00, 13155.00, '2018-09-30 18:36:01', NULL),
(881, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13155.00, 13170.00, '2018-09-30 18:37:02', NULL),
(882, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13170.00, 13185.00, '2018-09-30 18:38:01', NULL),
(883, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13185.00, 13200.00, '2018-09-30 18:39:01', NULL),
(884, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13200.00, 13215.00, '2018-09-30 18:40:02', NULL),
(885, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13215.00, 13230.00, '2018-09-30 18:41:01', NULL),
(886, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13230.00, 13245.00, '2018-09-30 18:42:01', NULL),
(887, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13245.00, 13260.00, '2018-09-30 18:43:02', NULL),
(888, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13260.00, 13275.00, '2018-09-30 18:44:01', NULL),
(889, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13275.00, 13290.00, '2018-09-30 18:45:01', NULL),
(890, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13290.00, 13305.00, '2018-09-30 18:46:02', NULL),
(891, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13305.00, 13320.00, '2018-09-30 18:47:01', NULL),
(892, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13320.00, 13335.00, '2018-09-30 18:48:01', NULL),
(893, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13335.00, 13350.00, '2018-09-30 18:49:02', NULL),
(894, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13350.00, 13365.00, '2018-09-30 18:50:01', NULL),
(895, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13365.00, 13380.00, '2018-09-30 18:51:02', NULL),
(896, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13380.00, 13395.00, '2018-09-30 18:52:01', NULL),
(897, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13395.00, 13410.00, '2018-09-30 18:53:01', NULL),
(898, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13410.00, 13425.00, '2018-09-30 18:54:01', NULL),
(899, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13425.00, 13440.00, '2018-09-30 18:55:02', NULL),
(900, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13440.00, 13455.00, '2018-09-30 18:56:01', NULL),
(901, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13455.00, 13470.00, '2018-09-30 18:57:02', NULL),
(902, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13470.00, 13485.00, '2018-09-30 18:58:01', NULL),
(903, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13485.00, 13500.00, '2018-09-30 18:59:01', NULL),
(904, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13500.00, 13515.00, '2018-09-30 19:00:02', NULL),
(905, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13515.00, 13530.00, '2018-09-30 19:01:01', NULL),
(906, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13530.00, 13545.00, '2018-09-30 19:02:01', NULL),
(907, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13545.00, 13560.00, '2018-09-30 19:03:02', NULL),
(908, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13560.00, 13575.00, '2018-09-30 19:04:01', NULL),
(909, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13575.00, 13590.00, '2018-09-30 19:05:01', NULL),
(910, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13590.00, 13605.00, '2018-09-30 19:06:01', NULL);
INSERT INTO `user_commissions` (`id`, `receiver_id`, `payer_id`, `payment_id`, `payment`, `level_id`, `transaction_type`, `commission_amount`, `opening_balance`, `closing_balance`, `created_at`, `updated_at`) VALUES
(911, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13605.00, 13620.00, '2018-09-30 19:07:01', NULL),
(912, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13620.00, 13635.00, '2018-09-30 19:08:01', NULL),
(913, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13635.00, 13650.00, '2018-09-30 19:09:02', NULL),
(914, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13650.00, 13665.00, '2018-09-30 19:10:01', NULL),
(915, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13665.00, 13680.00, '2018-09-30 19:11:02', NULL),
(916, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13680.00, 13695.00, '2018-09-30 19:12:01', NULL),
(917, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13695.00, 13710.00, '2018-09-30 19:13:01', NULL),
(918, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13710.00, 13725.00, '2018-09-30 19:14:02', NULL),
(919, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13725.00, 13740.00, '2018-09-30 19:15:01', NULL),
(920, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13740.00, 13755.00, '2018-09-30 19:16:01', NULL),
(921, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13755.00, 13770.00, '2018-09-30 19:17:02', NULL),
(922, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13770.00, 13785.00, '2018-09-30 19:18:01', NULL),
(923, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13785.00, 13800.00, '2018-09-30 19:19:01', NULL),
(924, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13800.00, 13815.00, '2018-09-30 19:20:02', NULL),
(925, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13815.00, 13830.00, '2018-09-30 19:21:01', NULL),
(926, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13830.00, 13845.00, '2018-09-30 19:22:01', NULL),
(927, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13845.00, 13860.00, '2018-09-30 19:23:02', NULL),
(928, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13860.00, 13875.00, '2018-09-30 19:24:01', NULL),
(929, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13875.00, 13890.00, '2018-09-30 19:25:01', NULL),
(930, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13890.00, 13905.00, '2018-09-30 19:26:01', NULL),
(931, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13905.00, 13920.00, '2018-09-30 19:27:01', NULL),
(932, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13920.00, 13935.00, '2018-09-30 19:28:01', NULL),
(933, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13935.00, 13950.00, '2018-09-30 19:29:01', NULL),
(934, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13950.00, 13965.00, '2018-09-30 19:30:01', NULL),
(935, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13965.00, 13980.00, '2018-09-30 19:31:02', NULL),
(936, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13980.00, 13995.00, '2018-09-30 19:32:01', NULL),
(937, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 13995.00, 14010.00, '2018-09-30 19:33:01', NULL),
(938, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14010.00, 14025.00, '2018-09-30 19:34:02', NULL),
(939, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14025.00, 14040.00, '2018-09-30 19:35:01', NULL),
(940, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14040.00, 14055.00, '2018-09-30 19:36:01', NULL),
(941, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14055.00, 14070.00, '2018-09-30 19:37:02', NULL),
(942, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14070.00, 14085.00, '2018-09-30 19:38:01', NULL),
(943, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14085.00, 14100.00, '2018-09-30 19:39:01', NULL),
(944, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14100.00, 14115.00, '2018-09-30 19:40:02', NULL),
(945, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14115.00, 14130.00, '2018-09-30 19:41:01', NULL),
(946, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14130.00, 14145.00, '2018-09-30 19:42:01', NULL),
(947, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14145.00, 14160.00, '2018-09-30 19:43:02', NULL),
(948, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14160.00, 14175.00, '2018-09-30 19:44:01', NULL),
(949, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14175.00, 14190.00, '2018-09-30 19:45:01', NULL),
(950, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14190.00, 14205.00, '2018-09-30 19:46:01', NULL),
(951, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14205.00, 14220.00, '2018-09-30 19:47:01', NULL),
(952, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14220.00, 14235.00, '2018-09-30 19:48:02', NULL),
(953, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14235.00, 14250.00, '2018-09-30 19:49:01', NULL),
(954, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14250.00, 14265.00, '2018-09-30 19:50:01', NULL),
(955, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14265.00, 14280.00, '2018-09-30 19:51:02', NULL),
(956, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14280.00, 14295.00, '2018-09-30 19:52:01', NULL),
(957, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14295.00, 14310.00, '2018-09-30 19:53:01', NULL),
(958, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14310.00, 14325.00, '2018-09-30 19:54:02', NULL),
(959, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14325.00, 14340.00, '2018-09-30 19:55:01', NULL),
(960, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14340.00, 14355.00, '2018-09-30 19:56:01', NULL),
(961, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14355.00, 14370.00, '2018-09-30 19:57:02', NULL),
(962, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14370.00, 14385.00, '2018-09-30 19:58:01', NULL),
(963, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14385.00, 14400.00, '2018-09-30 19:59:01', NULL),
(964, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14400.00, 14415.00, '2018-09-30 20:00:02', NULL),
(965, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14415.00, 14430.00, '2018-09-30 20:01:01', NULL),
(966, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14430.00, 14445.00, '2018-09-30 20:02:01', NULL),
(967, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14445.00, 14460.00, '2018-09-30 20:03:02', NULL),
(968, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14460.00, 14475.00, '2018-09-30 20:04:01', NULL),
(969, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14475.00, 14490.00, '2018-09-30 20:05:02', NULL),
(970, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14490.00, 14505.00, '2018-09-30 20:06:01', NULL),
(971, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14505.00, 14520.00, '2018-09-30 20:07:01', NULL),
(972, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14520.00, 14535.00, '2018-09-30 20:08:02', NULL),
(973, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14535.00, 14550.00, '2018-09-30 20:09:01', NULL),
(974, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14550.00, 14565.00, '2018-09-30 20:10:01', NULL),
(975, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14565.00, 14580.00, '2018-09-30 20:11:02', NULL),
(976, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14580.00, 14595.00, '2018-09-30 20:12:01', NULL),
(977, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14595.00, 14610.00, '2018-09-30 20:13:01', NULL),
(978, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14610.00, 14625.00, '2018-09-30 20:14:02', NULL),
(979, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14625.00, 14640.00, '2018-09-30 20:15:01', NULL),
(980, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14640.00, 14655.00, '2018-09-30 20:16:01', NULL),
(981, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14655.00, 14670.00, '2018-09-30 20:17:02', NULL),
(982, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14670.00, 14685.00, '2018-09-30 20:18:01', NULL),
(983, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14685.00, 14700.00, '2018-09-30 20:19:01', NULL),
(984, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14700.00, 14715.00, '2018-09-30 20:20:02', NULL),
(985, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14715.00, 14730.00, '2018-09-30 20:21:01', NULL),
(986, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14730.00, 14745.00, '2018-09-30 20:22:02', NULL),
(987, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14745.00, 14760.00, '2018-09-30 20:23:01', NULL),
(988, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14760.00, 14775.00, '2018-09-30 20:24:01', NULL),
(989, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14775.00, 14790.00, '2018-09-30 20:25:02', NULL),
(990, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14790.00, 14805.00, '2018-09-30 20:26:01', NULL),
(991, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14805.00, 14820.00, '2018-09-30 20:27:01', NULL),
(992, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14820.00, 14835.00, '2018-09-30 20:28:02', NULL),
(993, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14835.00, 14850.00, '2018-09-30 20:29:01', NULL),
(994, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14850.00, 14865.00, '2018-09-30 20:30:01', NULL),
(995, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14865.00, 14880.00, '2018-09-30 20:31:02', NULL),
(996, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14880.00, 14895.00, '2018-09-30 20:32:01', NULL),
(997, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14895.00, 14910.00, '2018-09-30 20:33:01', NULL),
(998, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14910.00, 14925.00, '2018-09-30 20:34:02', NULL),
(999, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14925.00, 14940.00, '2018-09-30 20:35:01', NULL),
(1000, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14940.00, 14955.00, '2018-09-30 20:36:02', NULL),
(1001, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14955.00, 14970.00, '2018-09-30 20:37:01', NULL),
(1002, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14970.00, 14985.00, '2018-09-30 20:38:01', NULL),
(1003, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 14985.00, 15000.00, '2018-09-30 20:39:01', NULL),
(1004, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15000.00, 15015.00, '2018-09-30 20:40:02', NULL),
(1005, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15015.00, 15030.00, '2018-09-30 20:41:01', NULL),
(1006, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15030.00, 15045.00, '2018-09-30 20:42:02', NULL),
(1007, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15045.00, 15060.00, '2018-09-30 20:43:01', NULL),
(1008, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15060.00, 15075.00, '2018-09-30 20:44:01', NULL),
(1009, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15075.00, 15090.00, '2018-09-30 20:45:02', NULL),
(1010, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15090.00, 15105.00, '2018-09-30 20:46:01', NULL),
(1011, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15105.00, 15120.00, '2018-09-30 20:47:01', NULL),
(1012, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15120.00, 15135.00, '2018-09-30 20:48:02', NULL),
(1013, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15135.00, 15150.00, '2018-09-30 20:49:01', NULL),
(1014, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15150.00, 15165.00, '2018-09-30 20:50:01', NULL),
(1015, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15165.00, 15180.00, '2018-09-30 20:51:01', NULL),
(1016, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15180.00, 15195.00, '2018-09-30 20:52:01', NULL),
(1017, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15195.00, 15210.00, '2018-09-30 20:53:01', NULL),
(1018, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15210.00, 15225.00, '2018-09-30 20:54:02', NULL),
(1019, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15225.00, 15240.00, '2018-09-30 20:55:01', NULL),
(1020, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15240.00, 15255.00, '2018-09-30 20:56:02', NULL),
(1021, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15255.00, 15270.00, '2018-09-30 20:57:01', NULL),
(1022, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15270.00, 15285.00, '2018-09-30 20:58:01', NULL),
(1023, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15285.00, 15300.00, '2018-09-30 20:59:02', NULL),
(1024, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15300.00, 15315.00, '2018-09-30 21:00:01', NULL),
(1025, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15315.00, 15330.00, '2018-09-30 21:01:02', NULL),
(1026, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15330.00, 15345.00, '2018-09-30 21:02:01', NULL),
(1027, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15345.00, 15360.00, '2018-09-30 21:03:01', NULL),
(1028, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15360.00, 15375.00, '2018-09-30 21:04:02', NULL),
(1029, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15375.00, 15390.00, '2018-09-30 21:05:01', NULL),
(1030, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15390.00, 15405.00, '2018-09-30 21:06:01', NULL),
(1031, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15405.00, 15420.00, '2018-09-30 21:07:02', NULL),
(1032, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15420.00, 15435.00, '2018-09-30 21:08:01', NULL),
(1033, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15435.00, 15450.00, '2018-09-30 21:09:01', NULL),
(1034, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15450.00, 15465.00, '2018-09-30 21:10:02', NULL),
(1035, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15465.00, 15480.00, '2018-09-30 21:11:01', NULL),
(1036, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15480.00, 15495.00, '2018-09-30 21:12:01', NULL),
(1037, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15495.00, 15510.00, '2018-09-30 21:13:02', NULL),
(1038, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15510.00, 15525.00, '2018-09-30 21:14:01', NULL),
(1039, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15525.00, 15540.00, '2018-09-30 21:15:02', NULL),
(1040, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15540.00, 15555.00, '2018-09-30 21:16:01', NULL),
(1041, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15555.00, 15570.00, '2018-09-30 21:17:01', NULL),
(1042, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15570.00, 15585.00, '2018-09-30 21:18:02', NULL),
(1043, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15585.00, 15600.00, '2018-09-30 21:19:01', NULL),
(1044, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15600.00, 15615.00, '2018-09-30 21:20:01', NULL),
(1045, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15615.00, 15630.00, '2018-09-30 21:21:02', NULL),
(1046, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15630.00, 15645.00, '2018-09-30 21:22:01', NULL),
(1047, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15645.00, 15660.00, '2018-09-30 21:23:01', NULL),
(1048, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15660.00, 15675.00, '2018-09-30 21:24:02', NULL),
(1049, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15675.00, 15690.00, '2018-09-30 21:25:01', NULL),
(1050, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15690.00, 15705.00, '2018-09-30 21:26:01', NULL),
(1051, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15705.00, 15720.00, '2018-09-30 21:27:02', NULL),
(1052, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15720.00, 15735.00, '2018-09-30 21:28:01', NULL),
(1053, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15735.00, 15750.00, '2018-09-30 21:29:01', NULL),
(1054, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15750.00, 15765.00, '2018-09-30 21:30:02', NULL),
(1055, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15765.00, 15780.00, '2018-09-30 21:31:01', NULL),
(1056, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15780.00, 15795.00, '2018-09-30 21:32:02', NULL),
(1057, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15795.00, 15810.00, '2018-09-30 21:33:01', NULL),
(1058, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15810.00, 15825.00, '2018-09-30 21:34:01', NULL),
(1059, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15825.00, 15840.00, '2018-09-30 21:35:02', NULL),
(1060, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15840.00, 15855.00, '2018-09-30 21:36:01', NULL),
(1061, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15855.00, 15870.00, '2018-09-30 21:37:01', NULL),
(1062, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15870.00, 15885.00, '2018-09-30 21:38:02', NULL),
(1063, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15885.00, 15900.00, '2018-09-30 21:39:01', NULL),
(1064, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15900.00, 15915.00, '2018-09-30 21:40:01', NULL),
(1065, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15915.00, 15930.00, '2018-09-30 21:41:01', NULL),
(1066, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15930.00, 15945.00, '2018-09-30 21:42:01', NULL),
(1067, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15945.00, 15960.00, '2018-09-30 21:43:01', NULL),
(1068, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15960.00, 15975.00, '2018-09-30 21:44:02', NULL),
(1069, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15975.00, 15990.00, '2018-09-30 21:45:01', NULL),
(1070, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 15990.00, 16005.00, '2018-09-30 21:46:02', NULL),
(1071, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16005.00, 16020.00, '2018-09-30 21:47:01', NULL),
(1072, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16020.00, 16035.00, '2018-09-30 21:48:01', NULL),
(1073, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16035.00, 16050.00, '2018-09-30 21:49:02', NULL),
(1074, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16050.00, 16065.00, '2018-09-30 21:50:01', NULL),
(1075, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16065.00, 16080.00, '2018-09-30 21:51:01', NULL),
(1076, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16080.00, 16095.00, '2018-09-30 21:52:02', NULL),
(1077, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16095.00, 16110.00, '2018-09-30 21:53:01', NULL),
(1078, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16110.00, 16125.00, '2018-09-30 21:54:01', NULL),
(1079, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16125.00, 16140.00, '2018-09-30 21:55:02', NULL),
(1080, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16140.00, 16155.00, '2018-09-30 21:56:01', NULL),
(1081, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16155.00, 16170.00, '2018-09-30 21:57:01', NULL),
(1082, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16170.00, 16185.00, '2018-09-30 21:58:02', NULL),
(1083, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16185.00, 16200.00, '2018-09-30 21:59:01', NULL),
(1084, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16200.00, 16215.00, '2018-09-30 22:00:02', NULL),
(1085, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16215.00, 16230.00, '2018-09-30 22:01:01', NULL),
(1086, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16230.00, 16245.00, '2018-09-30 22:02:01', NULL),
(1087, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16245.00, 16260.00, '2018-09-30 22:03:02', NULL),
(1088, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16260.00, 16275.00, '2018-09-30 22:04:01', NULL),
(1089, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16275.00, 16290.00, '2018-09-30 22:05:01', NULL),
(1090, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16290.00, 16305.00, '2018-09-30 22:06:01', NULL),
(1091, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16305.00, 16320.00, '2018-09-30 22:07:01', NULL),
(1092, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16320.00, 16335.00, '2018-09-30 22:08:01', NULL),
(1093, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16335.00, 16350.00, '2018-09-30 22:09:02', NULL),
(1094, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16350.00, 16365.00, '2018-09-30 22:10:01', NULL),
(1095, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16365.00, 16380.00, '2018-09-30 22:11:02', NULL),
(1096, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16380.00, 16395.00, '2018-09-30 22:12:01', NULL),
(1097, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16395.00, 16410.00, '2018-09-30 22:13:01', NULL),
(1098, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16410.00, 16425.00, '2018-09-30 22:14:02', NULL),
(1099, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16425.00, 16440.00, '2018-09-30 22:15:01', NULL),
(1100, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16440.00, 16455.00, '2018-09-30 22:16:01', NULL),
(1101, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16455.00, 16470.00, '2018-09-30 22:17:02', NULL),
(1102, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16470.00, 16485.00, '2018-09-30 22:18:01', NULL),
(1103, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16485.00, 16500.00, '2018-09-30 22:19:01', NULL),
(1104, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16500.00, 16515.00, '2018-09-30 22:20:02', NULL),
(1105, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16515.00, 16530.00, '2018-09-30 22:21:01', NULL),
(1106, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16530.00, 16545.00, '2018-09-30 22:22:02', NULL),
(1107, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16545.00, 16560.00, '2018-09-30 22:23:01', NULL),
(1108, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16560.00, 16575.00, '2018-09-30 22:24:01', NULL),
(1109, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16575.00, 16590.00, '2018-09-30 22:25:02', NULL),
(1110, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16590.00, 16605.00, '2018-09-30 22:26:01', NULL),
(1111, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16605.00, 16620.00, '2018-09-30 22:27:01', NULL),
(1112, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16620.00, 16635.00, '2018-09-30 22:28:02', NULL),
(1113, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16635.00, 16650.00, '2018-09-30 22:29:01', NULL),
(1114, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16650.00, 16665.00, '2018-09-30 22:30:01', NULL),
(1115, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16665.00, 16680.00, '2018-09-30 22:31:01', NULL),
(1116, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16680.00, 16695.00, '2018-09-30 22:32:01', NULL),
(1117, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16695.00, 16710.00, '2018-09-30 22:33:01', NULL),
(1118, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16710.00, 16725.00, '2018-09-30 22:34:01', NULL),
(1119, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16725.00, 16740.00, '2018-09-30 22:35:01', NULL),
(1120, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16740.00, 16755.00, '2018-09-30 22:36:02', NULL),
(1121, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16755.00, 16770.00, '2018-09-30 22:37:01', NULL),
(1122, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16770.00, 16785.00, '2018-09-30 22:38:01', NULL),
(1123, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16785.00, 16800.00, '2018-09-30 22:39:01', NULL),
(1124, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16800.00, 16815.00, '2018-09-30 22:40:02', NULL),
(1125, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16815.00, 16830.00, '2018-09-30 22:41:01', NULL),
(1126, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16830.00, 16845.00, '2018-09-30 22:42:02', NULL),
(1127, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16845.00, 16860.00, '2018-09-30 22:43:01', NULL),
(1128, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16860.00, 16875.00, '2018-09-30 22:44:01', NULL),
(1129, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16875.00, 16890.00, '2018-09-30 22:45:02', NULL),
(1130, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16890.00, 16905.00, '2018-09-30 22:46:01', NULL),
(1131, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16905.00, 16920.00, '2018-09-30 22:47:01', NULL),
(1132, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16920.00, 16935.00, '2018-09-30 22:48:02', NULL),
(1133, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16935.00, 16950.00, '2018-09-30 22:49:01', NULL),
(1134, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16950.00, 16965.00, '2018-09-30 22:50:01', NULL),
(1135, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16965.00, 16980.00, '2018-09-30 22:51:01', NULL),
(1136, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16980.00, 16995.00, '2018-09-30 22:52:01', NULL),
(1137, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 16995.00, 17010.00, '2018-09-30 22:53:01', NULL),
(1138, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17010.00, 17025.00, '2018-09-30 22:54:02', NULL),
(1139, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17025.00, 17040.00, '2018-09-30 22:55:01', NULL),
(1140, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17040.00, 17055.00, '2018-09-30 22:56:02', NULL),
(1141, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17055.00, 17070.00, '2018-09-30 22:57:01', NULL),
(1142, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17070.00, 17085.00, '2018-09-30 22:58:01', NULL),
(1143, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17085.00, 17100.00, '2018-09-30 22:59:02', NULL),
(1144, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17100.00, 17115.00, '2018-09-30 23:00:01', NULL),
(1145, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17115.00, 17130.00, '2018-09-30 23:01:01', NULL),
(1146, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17130.00, 17145.00, '2018-09-30 23:02:02', NULL),
(1147, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17145.00, 17160.00, '2018-09-30 23:03:01', NULL),
(1148, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17160.00, 17175.00, '2018-09-30 23:04:01', NULL),
(1149, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17175.00, 17190.00, '2018-09-30 23:05:02', NULL),
(1150, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17190.00, 17205.00, '2018-09-30 23:06:01', NULL),
(1151, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17205.00, 17220.00, '2018-09-30 23:07:02', NULL),
(1152, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17220.00, 17235.00, '2018-09-30 23:08:01', NULL),
(1153, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17235.00, 17250.00, '2018-09-30 23:09:01', NULL),
(1154, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17250.00, 17265.00, '2018-09-30 23:10:02', NULL),
(1155, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17265.00, 17280.00, '2018-09-30 23:11:01', NULL),
(1156, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17280.00, 17295.00, '2018-09-30 23:12:01', NULL),
(1157, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17295.00, 17310.00, '2018-09-30 23:13:02', NULL),
(1158, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17310.00, 17325.00, '2018-09-30 23:14:01', NULL),
(1159, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17325.00, 17340.00, '2018-09-30 23:15:01', NULL),
(1160, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17340.00, 17355.00, '2018-09-30 23:16:02', NULL),
(1161, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17355.00, 17370.00, '2018-09-30 23:17:01', NULL),
(1162, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17370.00, 17385.00, '2018-09-30 23:18:01', NULL),
(1163, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17385.00, 17400.00, '2018-09-30 23:19:02', NULL),
(1164, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17400.00, 17415.00, '2018-09-30 23:20:01', NULL),
(1165, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17415.00, 17430.00, '2018-09-30 23:21:02', NULL),
(1166, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17430.00, 17445.00, '2018-09-30 23:22:01', NULL),
(1167, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17445.00, 17460.00, '2018-09-30 23:23:01', NULL),
(1168, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17460.00, 17475.00, '2018-09-30 23:24:01', NULL),
(1169, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17475.00, 17490.00, '2018-09-30 23:25:02', NULL),
(1170, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17490.00, 17505.00, '2018-09-30 23:26:01', NULL),
(1171, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17505.00, 17520.00, '2018-09-30 23:27:02', NULL),
(1172, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17520.00, 17535.00, '2018-09-30 23:28:01', NULL),
(1173, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17535.00, 17550.00, '2018-09-30 23:29:01', NULL),
(1174, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17550.00, 17565.00, '2018-09-30 23:30:02', NULL),
(1175, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17565.00, 17580.00, '2018-09-30 23:31:01', NULL),
(1176, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17580.00, 17595.00, '2018-09-30 23:32:01', NULL),
(1177, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17595.00, 17610.00, '2018-09-30 23:33:02', NULL),
(1178, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17610.00, 17625.00, '2018-09-30 23:34:01', NULL),
(1179, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17625.00, 17640.00, '2018-09-30 23:35:01', NULL),
(1180, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17640.00, 17655.00, '2018-09-30 23:36:02', NULL),
(1181, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17655.00, 17670.00, '2018-09-30 23:37:01', NULL),
(1182, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17670.00, 17685.00, '2018-09-30 23:38:01', NULL),
(1183, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17685.00, 17700.00, '2018-09-30 23:39:02', NULL),
(1184, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17700.00, 17715.00, '2018-09-30 23:40:01', NULL),
(1185, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17715.00, 17730.00, '2018-09-30 23:41:02', NULL),
(1186, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17730.00, 17745.00, '2018-09-30 23:42:01', NULL),
(1187, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17745.00, 17760.00, '2018-09-30 23:43:01', NULL),
(1188, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17760.00, 17775.00, '2018-09-30 23:44:02', NULL),
(1189, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17775.00, 17790.00, '2018-09-30 23:45:01', NULL),
(1190, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17790.00, 17805.00, '2018-09-30 23:46:02', NULL),
(1191, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17805.00, 17820.00, '2018-09-30 23:47:01', NULL),
(1192, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17820.00, 17835.00, '2018-09-30 23:48:01', NULL),
(1193, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17835.00, 17850.00, '2018-09-30 23:49:01', NULL),
(1194, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17850.00, 17865.00, '2018-09-30 23:50:02', NULL),
(1195, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17865.00, 17880.00, '2018-09-30 23:51:01', NULL),
(1196, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17880.00, 17895.00, '2018-09-30 23:52:02', NULL),
(1197, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17895.00, 17910.00, '2018-09-30 23:53:01', NULL),
(1198, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17910.00, 17925.00, '2018-09-30 23:54:01', NULL),
(1199, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17925.00, 17940.00, '2018-09-30 23:55:02', NULL),
(1200, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17940.00, 17955.00, '2018-09-30 23:56:01', NULL),
(1201, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17955.00, 17970.00, '2018-09-30 23:57:01', NULL),
(1202, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17970.00, 17985.00, '2018-09-30 23:58:02', NULL),
(1203, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 17985.00, 18000.00, '2018-09-30 23:59:01', NULL),
(1204, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18000.00, 18015.00, '2018-10-01 00:00:02', NULL),
(1205, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18015.00, 18030.00, '2018-10-01 00:01:02', NULL),
(1206, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18030.00, 18045.00, '2018-10-01 00:02:01', NULL),
(1207, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18045.00, 18060.00, '2018-10-01 00:03:01', NULL),
(1208, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18060.00, 18075.00, '2018-10-01 00:04:02', NULL),
(1209, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18075.00, 18090.00, '2018-10-01 00:05:01', NULL),
(1210, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18090.00, 18105.00, '2018-10-01 00:06:02', NULL),
(1211, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18105.00, 18120.00, '2018-10-01 00:07:01', NULL),
(1212, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18120.00, 18135.00, '2018-10-01 00:08:01', NULL),
(1213, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18135.00, 18150.00, '2018-10-01 00:09:01', NULL),
(1214, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18150.00, 18165.00, '2018-10-01 00:10:02', NULL),
(1215, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18165.00, 18180.00, '2018-10-01 00:11:01', NULL),
(1216, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18180.00, 18195.00, '2018-10-01 00:12:02', NULL),
(1217, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18195.00, 18210.00, '2018-10-01 00:13:01', NULL),
(1218, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18210.00, 18225.00, '2018-10-01 00:14:01', NULL),
(1219, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18225.00, 18240.00, '2018-10-01 00:15:02', NULL),
(1220, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18240.00, 18255.00, '2018-10-01 00:16:01', NULL),
(1221, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18255.00, 18270.00, '2018-10-01 00:17:01', NULL),
(1222, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18270.00, 18285.00, '2018-10-01 00:18:02', NULL),
(1223, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18285.00, 18300.00, '2018-10-01 00:19:01', NULL),
(1224, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18300.00, 18315.00, '2018-10-01 00:20:01', NULL),
(1225, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18315.00, 18330.00, '2018-10-01 00:21:01', NULL),
(1226, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18330.00, 18345.00, '2018-10-01 00:22:01', NULL),
(1227, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18345.00, 18360.00, '2018-10-01 00:23:01', NULL),
(1228, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18360.00, 18375.00, '2018-10-01 00:24:01', NULL),
(1229, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18375.00, 18390.00, '2018-10-01 00:25:01', NULL),
(1230, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18390.00, 18405.00, '2018-10-01 00:26:02', NULL),
(1231, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18405.00, 18420.00, '2018-10-01 00:27:01', NULL),
(1232, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18420.00, 18435.00, '2018-10-01 00:28:01', NULL),
(1233, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18435.00, 18450.00, '2018-10-01 00:29:02', NULL),
(1234, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18450.00, 18465.00, '2018-10-01 00:30:01', NULL),
(1235, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18465.00, 18480.00, '2018-10-01 00:31:01', NULL),
(1236, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18480.00, 18495.00, '2018-10-01 00:32:02', NULL),
(1237, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18495.00, 18510.00, '2018-10-01 00:33:01', NULL),
(1238, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18510.00, 18525.00, '2018-10-01 00:34:01', NULL),
(1239, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18525.00, 18540.00, '2018-10-01 00:35:02', NULL),
(1240, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18540.00, 18555.00, '2018-10-01 00:36:01', NULL),
(1241, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18555.00, 18570.00, '2018-10-01 00:37:01', NULL),
(1242, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18570.00, 18585.00, '2018-10-01 00:38:02', NULL),
(1243, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18585.00, 18600.00, '2018-10-01 00:39:01', NULL),
(1244, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18600.00, 18615.00, '2018-10-01 00:40:01', NULL),
(1245, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18615.00, 18630.00, '2018-10-01 00:41:01', NULL),
(1246, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18630.00, 18645.00, '2018-10-01 00:42:01', NULL),
(1247, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18645.00, 18660.00, '2018-10-01 00:43:02', NULL),
(1248, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18660.00, 18675.00, '2018-10-01 00:44:01', NULL),
(1249, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18675.00, 18690.00, '2018-10-01 00:45:01', NULL),
(1250, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18690.00, 18705.00, '2018-10-01 00:46:01', NULL),
(1251, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18705.00, 18720.00, '2018-10-01 00:47:02', NULL),
(1252, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18720.00, 18735.00, '2018-10-01 00:48:01', NULL),
(1253, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18735.00, 18750.00, '2018-10-01 00:49:01', NULL),
(1254, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18750.00, 18765.00, '2018-10-01 00:50:02', NULL),
(1255, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18765.00, 18780.00, '2018-10-01 00:51:01', NULL),
(1256, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18780.00, 18795.00, '2018-10-01 00:52:02', NULL),
(1257, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18795.00, 18810.00, '2018-10-01 00:53:01', NULL),
(1258, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18810.00, 18825.00, '2018-10-01 00:54:01', NULL),
(1259, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18825.00, 18840.00, '2018-10-01 00:55:02', NULL),
(1260, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18840.00, 18855.00, '2018-10-01 00:56:01', NULL),
(1261, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18855.00, 18870.00, '2018-10-01 00:57:01', NULL),
(1262, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18870.00, 18885.00, '2018-10-01 00:58:02', NULL),
(1263, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18885.00, 18900.00, '2018-10-01 00:59:01', NULL),
(1264, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18900.00, 18915.00, '2018-10-01 01:00:02', NULL),
(1265, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18915.00, 18930.00, '2018-10-01 01:01:02', NULL),
(1266, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18930.00, 18945.00, '2018-10-01 01:02:01', NULL),
(1267, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18945.00, 18960.00, '2018-10-01 01:03:01', NULL),
(1268, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18960.00, 18975.00, '2018-10-01 01:04:02', NULL),
(1269, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18975.00, 18990.00, '2018-10-01 01:05:01', NULL),
(1270, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 18990.00, 19005.00, '2018-10-01 01:06:01', NULL),
(1271, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19005.00, 19020.00, '2018-10-01 01:07:02', NULL),
(1272, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19020.00, 19035.00, '2018-10-01 01:08:01', NULL),
(1273, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19035.00, 19050.00, '2018-10-01 01:09:01', NULL),
(1274, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19050.00, 19065.00, '2018-10-01 01:10:02', NULL),
(1275, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19065.00, 19080.00, '2018-10-01 01:11:01', NULL),
(1276, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19080.00, 19095.00, '2018-10-01 01:12:02', NULL),
(1277, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19095.00, 19110.00, '2018-10-01 01:13:01', NULL),
(1278, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19110.00, 19125.00, '2018-10-01 01:14:01', NULL),
(1279, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19125.00, 19140.00, '2018-10-01 01:15:02', NULL),
(1280, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19140.00, 19155.00, '2018-10-01 01:16:01', NULL),
(1281, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19155.00, 19170.00, '2018-10-01 01:17:01', NULL),
(1282, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19170.00, 19185.00, '2018-10-01 01:18:02', NULL),
(1283, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19185.00, 19200.00, '2018-10-01 01:19:01', NULL),
(1284, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19200.00, 19215.00, '2018-10-01 01:20:01', NULL),
(1285, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19215.00, 19230.00, '2018-10-01 01:21:02', NULL),
(1286, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19230.00, 19245.00, '2018-10-01 01:22:01', NULL),
(1287, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19245.00, 19260.00, '2018-10-01 01:23:01', NULL),
(1288, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19260.00, 19275.00, '2018-10-01 01:24:02', NULL),
(1289, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19275.00, 19290.00, '2018-10-01 01:25:01', NULL),
(1290, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19290.00, 19305.00, '2018-10-01 01:26:01', NULL),
(1291, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19305.00, 19320.00, '2018-10-01 01:27:02', NULL),
(1292, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19320.00, 19335.00, '2018-10-01 01:28:01', NULL),
(1293, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19335.00, 19350.00, '2018-10-01 01:29:01', NULL),
(1294, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19350.00, 19365.00, '2018-10-01 01:30:02', NULL),
(1295, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19365.00, 19380.00, '2018-10-01 01:31:01', NULL),
(1296, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19380.00, 19395.00, '2018-10-01 01:32:02', NULL),
(1297, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19395.00, 19410.00, '2018-10-01 01:33:01', NULL),
(1298, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19410.00, 19425.00, '2018-10-01 01:34:01', NULL),
(1299, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19425.00, 19440.00, '2018-10-01 01:35:02', NULL),
(1300, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19440.00, 19455.00, '2018-10-01 01:36:01', NULL),
(1301, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19455.00, 19470.00, '2018-10-01 01:37:02', NULL),
(1302, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19470.00, 19485.00, '2018-10-01 01:38:01', NULL),
(1303, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19485.00, 19500.00, '2018-10-01 01:39:01', NULL),
(1304, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19500.00, 19515.00, '2018-10-01 01:40:02', NULL),
(1305, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19515.00, 19530.00, '2018-10-01 01:41:01', NULL),
(1306, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19530.00, 19545.00, '2018-10-01 01:42:01', NULL),
(1307, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19545.00, 19560.00, '2018-10-01 01:43:02', NULL),
(1308, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19560.00, 19575.00, '2018-10-01 01:44:01', NULL),
(1309, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19575.00, 19590.00, '2018-10-01 01:45:01', NULL),
(1310, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19590.00, 19605.00, '2018-10-01 01:46:02', NULL),
(1311, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19605.00, 19620.00, '2018-10-01 01:47:01', NULL),
(1312, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19620.00, 19635.00, '2018-10-01 01:48:01', NULL),
(1313, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19635.00, 19650.00, '2018-10-01 01:49:02', NULL),
(1314, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19650.00, 19665.00, '2018-10-01 01:50:01', NULL),
(1315, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19665.00, 19680.00, '2018-10-01 01:51:02', NULL),
(1316, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19680.00, 19695.00, '2018-10-01 01:52:01', NULL),
(1317, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19695.00, 19710.00, '2018-10-01 01:53:01', NULL),
(1318, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19710.00, 19725.00, '2018-10-01 01:54:01', NULL),
(1319, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19725.00, 19740.00, '2018-10-01 01:55:02', NULL),
(1320, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19740.00, 19755.00, '2018-10-01 01:56:01', NULL),
(1321, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19755.00, 19770.00, '2018-10-01 01:57:02', NULL),
(1322, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19770.00, 19785.00, '2018-10-01 01:58:01', NULL),
(1323, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19785.00, 19800.00, '2018-10-01 01:59:01', NULL),
(1324, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19800.00, 19815.00, '2018-10-01 02:00:02', NULL),
(1325, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19815.00, 19830.00, '2018-10-01 02:01:01', NULL),
(1326, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19830.00, 19845.00, '2018-10-01 02:02:02', NULL),
(1327, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19845.00, 19860.00, '2018-10-01 02:03:01', NULL),
(1328, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19860.00, 19875.00, '2018-10-01 02:04:01', NULL),
(1329, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19875.00, 19890.00, '2018-10-01 02:05:02', NULL),
(1330, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19890.00, 19905.00, '2018-10-01 02:06:01', NULL),
(1331, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19905.00, 19920.00, '2018-10-01 02:07:01', NULL),
(1332, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19920.00, 19935.00, '2018-10-01 02:08:02', NULL),
(1333, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19935.00, 19950.00, '2018-10-01 02:09:01', NULL),
(1334, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19950.00, 19965.00, '2018-10-01 02:10:01', NULL),
(1335, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19965.00, 19980.00, '2018-10-01 02:11:02', NULL),
(1336, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19980.00, 19995.00, '2018-10-01 02:12:01', NULL),
(1337, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 19995.00, 20010.00, '2018-10-01 02:13:01', NULL),
(1338, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20010.00, 20025.00, '2018-10-01 02:14:02', NULL),
(1339, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20025.00, 20040.00, '2018-10-01 02:15:01', NULL),
(1340, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20040.00, 20055.00, '2018-10-01 02:16:02', NULL),
(1341, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20055.00, 20070.00, '2018-10-01 02:17:01', NULL),
(1342, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20070.00, 20085.00, '2018-10-01 02:18:01', NULL),
(1343, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20085.00, 20100.00, '2018-10-01 02:19:01', NULL),
(1344, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20100.00, 20115.00, '2018-10-01 02:20:02', NULL),
(1345, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20115.00, 20130.00, '2018-10-01 02:21:01', NULL),
(1346, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20130.00, 20145.00, '2018-10-01 02:22:02', NULL),
(1347, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20145.00, 20160.00, '2018-10-01 02:23:01', NULL),
(1348, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20160.00, 20175.00, '2018-10-01 02:24:01', NULL),
(1349, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20175.00, 20190.00, '2018-10-01 02:25:02', NULL),
(1350, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20190.00, 20205.00, '2018-10-01 02:26:01', NULL),
(1351, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20205.00, 20220.00, '2018-10-01 02:27:01', NULL),
(1352, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20220.00, 20235.00, '2018-10-01 02:28:02', NULL),
(1353, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20235.00, 20250.00, '2018-10-01 02:29:01', NULL),
(1354, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20250.00, 20265.00, '2018-10-01 02:30:01', NULL),
(1355, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20265.00, 20280.00, '2018-10-01 02:31:01', NULL);
INSERT INTO `user_commissions` (`id`, `receiver_id`, `payer_id`, `payment_id`, `payment`, `level_id`, `transaction_type`, `commission_amount`, `opening_balance`, `closing_balance`, `created_at`, `updated_at`) VALUES
(1356, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20280.00, 20295.00, '2018-10-01 02:32:01', NULL),
(1357, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20295.00, 20310.00, '2018-10-01 02:33:01', NULL),
(1358, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20310.00, 20325.00, '2018-10-01 02:34:02', NULL),
(1359, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20325.00, 20340.00, '2018-10-01 02:35:01', NULL),
(1360, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20340.00, 20355.00, '2018-10-01 02:36:02', NULL),
(1361, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20355.00, 20370.00, '2018-10-01 02:37:01', NULL),
(1362, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20370.00, 20385.00, '2018-10-01 02:38:01', NULL),
(1363, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20385.00, 20400.00, '2018-10-01 02:39:02', NULL),
(1364, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20400.00, 20415.00, '2018-10-01 02:40:01', NULL),
(1365, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20415.00, 20430.00, '2018-10-01 02:41:01', NULL),
(1366, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20430.00, 20445.00, '2018-10-01 02:42:02', NULL),
(1367, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20445.00, 20460.00, '2018-10-01 02:43:01', NULL),
(1368, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20460.00, 20475.00, '2018-10-01 02:44:01', NULL),
(1369, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20475.00, 20490.00, '2018-10-01 02:45:02', NULL),
(1370, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20490.00, 20505.00, '2018-10-01 02:46:01', NULL),
(1371, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20505.00, 20520.00, '2018-10-01 02:47:01', NULL),
(1372, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20520.00, 20535.00, '2018-10-01 02:48:02', NULL),
(1373, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20535.00, 20550.00, '2018-10-01 02:49:01', NULL),
(1374, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20550.00, 20565.00, '2018-10-01 02:50:02', NULL),
(1375, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20565.00, 20580.00, '2018-10-01 02:51:01', NULL),
(1376, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20580.00, 20595.00, '2018-10-01 02:52:01', NULL),
(1377, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20595.00, 20610.00, '2018-10-01 02:53:02', NULL),
(1378, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20610.00, 20625.00, '2018-10-01 02:54:01', NULL),
(1379, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20625.00, 20640.00, '2018-10-01 02:55:01', NULL),
(1380, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20640.00, 20655.00, '2018-10-01 02:56:02', NULL),
(1381, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20655.00, 20670.00, '2018-10-01 02:57:01', NULL),
(1382, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20670.00, 20685.00, '2018-10-01 02:58:01', NULL),
(1383, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20685.00, 20700.00, '2018-10-01 02:59:02', NULL),
(1384, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20700.00, 20715.00, '2018-10-01 03:00:01', NULL),
(1385, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20715.00, 20730.00, '2018-10-01 03:01:02', NULL),
(1386, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20730.00, 20745.00, '2018-10-01 03:02:01', NULL),
(1387, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20745.00, 20760.00, '2018-10-01 03:03:01', NULL),
(1388, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20760.00, 20775.00, '2018-10-01 03:04:01', NULL),
(1389, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20775.00, 20790.00, '2018-10-01 03:05:02', NULL),
(1390, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20790.00, 20805.00, '2018-10-01 03:06:01', NULL),
(1391, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20805.00, 20820.00, '2018-10-01 03:07:02', NULL),
(1392, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20820.00, 20835.00, '2018-10-01 03:08:01', NULL),
(1393, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20835.00, 20850.00, '2018-10-01 03:09:01', NULL),
(1394, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20850.00, 20865.00, '2018-10-01 03:10:02', NULL),
(1395, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20865.00, 20880.00, '2018-10-01 03:11:01', NULL),
(1396, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20880.00, 20895.00, '2018-10-01 03:12:01', NULL),
(1397, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20895.00, 20910.00, '2018-10-01 03:13:02', NULL),
(1398, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20910.00, 20925.00, '2018-10-01 03:14:01', NULL),
(1399, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20925.00, 20940.00, '2018-10-01 03:15:01', NULL),
(1400, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20940.00, 20955.00, '2018-10-01 03:16:01', NULL),
(1401, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20955.00, 20970.00, '2018-10-01 03:17:01', NULL),
(1402, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20970.00, 20985.00, '2018-10-01 03:18:01', NULL),
(1403, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 20985.00, 21000.00, '2018-10-01 03:19:02', NULL),
(1404, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21000.00, 21015.00, '2018-10-01 03:20:01', NULL),
(1405, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21015.00, 21030.00, '2018-10-01 03:21:02', NULL),
(1406, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21030.00, 21045.00, '2018-10-01 03:22:01', NULL),
(1407, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21045.00, 21060.00, '2018-10-01 03:23:01', NULL),
(1408, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21060.00, 21075.00, '2018-10-01 03:24:02', NULL),
(1409, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21075.00, 21090.00, '2018-10-01 03:25:01', NULL),
(1410, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21090.00, 21105.00, '2018-10-01 03:26:01', NULL),
(1411, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21105.00, 21120.00, '2018-10-01 03:27:02', NULL),
(1412, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21120.00, 21135.00, '2018-10-01 03:28:01', NULL),
(1413, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21135.00, 21150.00, '2018-10-01 03:29:01', NULL),
(1414, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21150.00, 21165.00, '2018-10-01 03:30:02', NULL),
(1415, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21165.00, 21180.00, '2018-10-01 03:31:01', NULL),
(1416, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21180.00, 21195.00, '2018-10-01 03:32:02', NULL),
(1417, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21195.00, 21210.00, '2018-10-01 03:33:01', NULL),
(1418, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21210.00, 21225.00, '2018-10-01 03:34:01', NULL),
(1419, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21225.00, 21240.00, '2018-10-01 03:35:02', NULL),
(1420, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21240.00, 21255.00, '2018-10-01 03:36:01', NULL),
(1421, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21255.00, 21270.00, '2018-10-01 03:37:01', NULL),
(1422, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21270.00, 21285.00, '2018-10-01 03:38:02', NULL),
(1423, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21285.00, 21300.00, '2018-10-01 03:39:01', NULL),
(1424, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21300.00, 21315.00, '2018-10-01 03:40:01', NULL),
(1425, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21315.00, 21330.00, '2018-10-01 03:41:02', NULL),
(1426, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21330.00, 21345.00, '2018-10-01 03:42:01', NULL),
(1427, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21345.00, 21360.00, '2018-10-01 03:43:01', NULL),
(1428, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21360.00, 21375.00, '2018-10-01 03:44:02', NULL),
(1429, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21375.00, 21390.00, '2018-10-01 03:45:01', NULL),
(1430, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21390.00, 21405.00, '2018-10-01 03:46:02', NULL),
(1431, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21405.00, 21420.00, '2018-10-01 03:47:01', NULL),
(1432, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21420.00, 21435.00, '2018-10-01 03:48:01', NULL),
(1433, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21435.00, 21450.00, '2018-10-01 03:49:01', NULL),
(1434, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21450.00, 21465.00, '2018-10-01 03:50:02', NULL),
(1435, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21465.00, 21480.00, '2018-10-01 03:51:01', NULL),
(1436, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21480.00, 21495.00, '2018-10-01 03:52:02', NULL),
(1437, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21495.00, 21510.00, '2018-10-01 03:53:01', NULL),
(1438, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21510.00, 21525.00, '2018-10-01 03:54:01', NULL),
(1439, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21525.00, 21540.00, '2018-10-01 03:55:02', NULL),
(1440, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21540.00, 21555.00, '2018-10-01 03:56:01', NULL),
(1441, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21555.00, 21570.00, '2018-10-01 03:57:01', NULL),
(1442, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21570.00, 21585.00, '2018-10-01 03:58:02', NULL),
(1443, 2, 1, NULL, 15.00, NULL, 'COMMISSION_FROM_ADMIN', 15.00, 21585.00, 21600.00, '2018-10-01 03:59:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_goals`
--

CREATE TABLE `user_goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `user_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_goals`
--

INSERT INTO `user_goals` (`id`, `user_id`, `goal_id`, `user_answer`, `created_at`, `updated_at`) VALUES
(805, 101, 12, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(803, 101, 10, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(13, 2, 1, 'Yes', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(14, 2, 2, 'Yes', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(15, 2, 3, 'Want to make money online!', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(16, 2, 4, 'Vaccations', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(17, 2, 5, 'Don\'t know!', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(18, 2, 6, 'Any amount', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(19, 2, 7, 'My family', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(20, 2, 8, 'Any Money', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(21, 2, 9, 'Any money', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(22, 2, 10, 'Success', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(23, 2, 11, 'To help other people!', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(24, 2, 12, 'To help other people!', '2018-06-24 23:53:59', '2018-06-24 23:53:59'),
(25, 27, 1, 'sdfsad', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(26, 27, 2, 'safasdf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(27, 27, 3, 'safsad', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(28, 27, 4, 'safsad', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(29, 27, 5, 'safsad', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(30, 27, 6, 'safdf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(31, 27, 7, 'asfasdf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(32, 27, 8, 'asdfasdf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(33, 27, 9, 'asdfasd', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(34, 27, 10, 'sasadf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(35, 27, 11, 'safdsfda', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(36, 27, 12, 'safsadf', '2018-06-27 07:49:13', '2018-06-27 07:49:13'),
(37, 29, 1, 'safsadfsda', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(38, 29, 2, 'sdafasdfsdf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(39, 29, 3, 'sdafsdafsdfa', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(40, 29, 4, 'sdafsadf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(41, 29, 5, 'sadfsdaf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(42, 29, 6, 'sadfsadfdsa', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(43, 29, 7, 'sadfsadf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(44, 29, 8, 'asfsadfsdaf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(45, 29, 9, 'asfsdaf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(46, 29, 10, 'asfsadfsd', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(47, 29, 11, 'asfsadfsfa', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(48, 29, 12, 'sadfasdf', '2018-06-27 08:21:18', '2018-06-27 08:21:18'),
(49, 30, 1, 'sfdasfsda', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(50, 30, 2, 'sdafsdafsda', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(51, 30, 3, 'sasdafsdaf', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(52, 30, 4, 'safsdfsdaf', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(53, 30, 5, 'sdfsdasdf', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(54, 30, 6, 'safsdafsdaf', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(55, 30, 7, 'sfdsdafsdaf', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(56, 30, 8, 'sfsadfsad', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(57, 30, 9, 'dfssdafsda', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(58, 30, 10, 'sdfasfs', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(59, 30, 11, 'sdafsfsa', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(60, 30, 12, 'sfdsfsd', '2018-06-27 14:46:10', '2018-06-27 14:46:10'),
(81, 31, 9, '$5000', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(80, 31, 8, '$2000', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(79, 31, 7, 'My familly', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(78, 31, 6, 'Make $800 000 in 4 months', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(77, 31, 5, 'Vaccations!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(76, 31, 4, 'Vaccations in countries I like!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(75, 31, 3, 'Want to make more money online!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(74, 31, 2, 'It was difficult!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(73, 31, 1, 'Yes!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(82, 31, 10, 'Financial progress!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(83, 31, 11, 'To help other people after being helped!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(84, 31, 12, 'To help other people!', '2018-06-27 17:10:31', '2018-06-27 17:10:31'),
(85, 33, 1, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(86, 33, 2, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(87, 33, 3, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(88, 33, 4, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(89, 33, 5, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(90, 33, 6, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(91, 33, 7, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(92, 33, 8, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(93, 33, 9, 'eys', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(94, 33, 10, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(95, 33, 11, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(96, 33, 12, 'yes', '2018-06-28 21:24:05', '2018-06-28 21:24:05'),
(97, 34, 1, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(98, 34, 2, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(99, 34, 3, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(100, 34, 4, 'eys', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(101, 34, 5, 'eys', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(102, 34, 6, 'eys', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(103, 34, 7, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(104, 34, 8, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(105, 34, 9, 'eys', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(106, 34, 10, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(107, 34, 11, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(108, 34, 12, 'yes', '2018-06-28 21:31:34', '2018-06-28 21:31:34'),
(109, 35, 1, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(110, 35, 2, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(111, 35, 3, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(112, 35, 4, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(113, 35, 5, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(114, 35, 6, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(115, 35, 7, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(116, 35, 8, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(117, 35, 9, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(118, 35, 10, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(119, 35, 11, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(120, 35, 12, 'yes', '2018-07-03 20:57:31', '2018-07-03 20:57:31'),
(144, 37, 12, 'this is for testing purpose after testing one time', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(143, 37, 11, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(142, 37, 10, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(141, 37, 9, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(140, 37, 8, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(139, 37, 7, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(138, 37, 6, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(137, 37, 5, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(136, 37, 4, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(135, 37, 3, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(134, 37, 2, 'This is for testing', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(133, 37, 1, 'no things', '2018-07-03 22:32:46', '2018-07-03 22:32:46'),
(290, 48, 2, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(289, 48, 1, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(420, 38, 12, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(419, 38, 11, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(418, 38, 10, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(417, 38, 9, 'eys', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(416, 38, 8, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(415, 38, 7, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(414, 38, 6, 'eys', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(413, 38, 5, 'eys', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(804, 101, 11, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(802, 101, 9, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(801, 101, 8, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(800, 101, 7, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(799, 101, 6, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(412, 38, 4, 'eys', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(241, 41, 1, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(242, 41, 2, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(243, 41, 3, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(244, 41, 4, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(245, 41, 5, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(246, 41, 6, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(247, 41, 7, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(248, 41, 8, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(249, 41, 9, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(250, 41, 10, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(251, 41, 11, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(252, 41, 12, '', '2018-07-21 22:43:44', '2018-07-21 22:43:44'),
(411, 38, 3, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(410, 38, 2, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(409, 38, 1, 'yes', '2018-08-31 04:53:08', '2018-08-31 04:53:08'),
(291, 48, 3, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(292, 48, 4, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(293, 48, 5, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(294, 48, 6, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(295, 48, 7, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(296, 48, 8, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(297, 48, 9, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(298, 48, 10, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(299, 48, 11, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(300, 48, 12, 'yes', '2018-07-31 11:15:19', '2018-07-31 11:15:19'),
(325, 57, 1, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(326, 57, 2, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(327, 57, 3, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(328, 57, 4, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(329, 57, 5, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(330, 57, 6, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(331, 57, 7, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(332, 57, 8, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(333, 57, 9, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(334, 57, 10, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(335, 57, 11, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(336, 57, 12, 'yes', '2018-08-17 21:44:46', '2018-08-17 21:44:46'),
(349, 66, 1, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(350, 66, 2, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(351, 66, 3, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(352, 66, 4, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(353, 66, 5, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(354, 66, 6, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(355, 66, 7, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(356, 66, 8, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(357, 66, 9, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(358, 66, 10, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(359, 66, 11, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(360, 66, 12, 'Okay', '2018-08-18 10:47:36', '2018-08-18 10:47:36'),
(361, 69, 1, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(362, 69, 2, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(363, 69, 3, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(364, 69, 4, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(365, 69, 5, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(366, 69, 6, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(367, 69, 7, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(368, 69, 8, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(369, 69, 9, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(370, 69, 10, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(371, 69, 11, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(372, 69, 12, '', '2018-08-18 17:58:18', '2018-08-18 17:58:18'),
(373, 67, 1, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(374, 67, 2, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(375, 67, 3, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(376, 67, 4, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(377, 67, 5, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(378, 67, 6, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(379, 67, 7, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(380, 67, 8, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(381, 67, 9, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(382, 67, 10, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(383, 67, 11, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(384, 67, 12, 'Yes', '2018-08-18 18:07:08', '2018-08-18 18:07:08'),
(480, 70, 12, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(479, 70, 11, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(478, 70, 10, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(477, 70, 9, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(476, 70, 8, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(475, 70, 7, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(474, 70, 6, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(473, 70, 5, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(472, 70, 4, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(471, 70, 3, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(470, 70, 2, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(469, 70, 1, 'yes', '2018-08-31 22:06:43', '2018-08-31 22:06:43'),
(516, 71, 12, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(515, 71, 11, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(514, 71, 10, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(513, 71, 9, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(512, 71, 8, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(511, 71, 7, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(510, 71, 6, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(509, 71, 5, 'helllo world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(508, 71, 4, 'helllo world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(507, 71, 3, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(506, 71, 2, 'hello world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(505, 71, 1, 'hello  world', '2018-08-31 22:33:46', '2018-08-31 22:33:46'),
(468, 72, 12, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(467, 72, 11, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(466, 72, 10, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(465, 72, 9, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(464, 72, 8, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(463, 72, 7, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(462, 72, 6, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(461, 72, 5, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(460, 72, 4, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(459, 72, 3, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(458, 72, 2, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(457, 72, 1, 'yes', '2018-08-31 22:05:06', '2018-08-31 22:05:06'),
(517, 73, 1, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(518, 73, 2, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(519, 73, 3, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(520, 73, 4, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(521, 73, 5, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(522, 73, 6, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(523, 73, 7, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(524, 73, 8, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(525, 73, 9, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(526, 73, 10, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(527, 73, 11, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(528, 73, 12, 'yes', '2018-09-01 09:55:54', '2018-09-01 09:55:54'),
(529, 74, 1, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(530, 74, 2, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(531, 74, 3, 'hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(532, 74, 4, 'Helllo', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(533, 74, 5, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(534, 74, 6, 'Helllo', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(535, 74, 7, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(536, 74, 8, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(537, 74, 9, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(538, 74, 10, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(539, 74, 11, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(540, 74, 12, 'Hello', '2018-09-01 10:08:08', '2018-09-01 10:08:08'),
(541, 75, 1, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(542, 75, 2, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(543, 75, 3, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(544, 75, 4, 'ehllo', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(545, 75, 5, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(546, 75, 6, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(547, 75, 7, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(548, 75, 8, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(549, 75, 9, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(550, 75, 10, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(551, 75, 11, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(552, 75, 12, 'hello', '2018-09-01 13:18:17', '2018-09-01 13:18:17'),
(553, 76, 1, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(554, 76, 2, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(555, 76, 3, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(556, 76, 4, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(557, 76, 5, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(558, 76, 6, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(559, 76, 7, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(560, 76, 8, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(561, 76, 9, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(562, 76, 10, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(563, 76, 11, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(564, 76, 12, 'yes', '2018-09-01 20:48:21', '2018-09-01 20:48:21'),
(565, 77, 1, 'yes', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(566, 77, 2, 'mon', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(567, 77, 3, 'moom', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(568, 77, 4, 'tom', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(569, 77, 5, 'kogg', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(570, 77, 6, 'tyyy', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(571, 77, 7, 'iop', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(572, 77, 8, 'dfg', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(573, 77, 9, 'jkio', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(574, 77, 10, 'jkio', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(575, 77, 11, 'rtyu', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(576, 77, 12, 'fgyh', '2018-09-01 20:58:56', '2018-09-01 20:58:56'),
(577, 7, 1, 'yes', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(578, 7, 2, 'sdf', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(579, 7, 3, 'sdfg', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(580, 7, 4, 'dfgy', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(581, 7, 5, 'dsfg', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(582, 7, 6, 'wert', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(583, 7, 7, 'fghj', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(584, 7, 8, 'erty', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(585, 7, 9, 'ghjk', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(586, 7, 10, 'dfgh', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(587, 7, 11, 'ghjk', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(588, 7, 12, 'errty', '2018-09-01 21:09:49', '2018-09-01 21:09:49'),
(589, 6, 1, 'yed', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(590, 6, 2, 'gfh', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(591, 6, 3, 'ght', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(592, 6, 4, 'hjyu', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(593, 6, 5, 'rty', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(594, 6, 6, 'yhju', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(595, 6, 7, 'frty', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(596, 6, 8, 'gtyu', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(597, 6, 9, 'gtyu', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(598, 6, 10, 'ghyu', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(599, 6, 11, 'rfgh', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(600, 6, 12, 'ghjk', '2018-09-01 21:15:37', '2018-09-01 21:15:37'),
(601, 8, 1, 'yfg', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(602, 8, 2, 'rtyu', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(603, 8, 3, 'erty', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(604, 8, 4, 'fgty', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(605, 8, 5, 'erty', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(606, 8, 6, 'erty', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(607, 8, 7, 'erty', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(608, 8, 8, 'dfgh', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(609, 8, 9, 'dfgh', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(610, 8, 10, 'edfgh', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(611, 8, 11, 'dfghj', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(612, 8, 12, 'dfghj', '2018-09-02 00:24:25', '2018-09-02 00:24:25'),
(613, 78, 1, 'dert', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(614, 78, 2, 'swer', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(615, 78, 3, 'swer', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(616, 78, 4, 'gtyu', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(617, 78, 5, 'gtyu', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(618, 78, 6, 'gtyu', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(619, 78, 7, 'fgty', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(620, 78, 8, 'frty', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(621, 78, 9, 'rty', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(622, 78, 10, 'frty', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(623, 78, 11, 'erty', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(624, 78, 12, 'rtyu', '2018-09-02 04:30:51', '2018-09-02 04:30:51'),
(625, 79, 1, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(626, 79, 2, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(627, 79, 3, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(628, 79, 4, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(629, 79, 5, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(630, 79, 6, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(631, 79, 7, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(632, 79, 8, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(633, 79, 9, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(634, 79, 10, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(635, 79, 11, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(636, 79, 12, 'nope', '2018-09-04 08:11:52', '2018-09-04 08:11:52'),
(637, 82, 1, 'ert', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(638, 82, 2, 'dfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(639, 82, 3, 'dsf', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(640, 82, 4, 'dfgh', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(641, 82, 5, 'sdfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(642, 82, 6, 'dsfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(643, 82, 7, 'dsfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(644, 82, 8, 'sdfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(645, 82, 9, 'sdfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(646, 82, 10, 'sdfg', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(647, 82, 11, 'dfgh', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(648, 82, 12, 'wert', '2018-09-07 19:32:21', '2018-09-07 19:32:21'),
(649, 83, 1, 'wer', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(650, 83, 2, 'asdf', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(651, 83, 3, 'asdf', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(652, 83, 4, 'asdfg', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(653, 83, 5, 'asdfg', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(654, 83, 6, 'asdfg', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(655, 83, 7, 'dfgh', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(656, 83, 8, 'rtyu', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(657, 83, 9, 'ghjk', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(658, 83, 10, 'erty', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(659, 83, 11, 'yuiop', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(660, 83, 12, 'sdfgh', '2018-09-07 20:35:05', '2018-09-07 20:35:05'),
(661, 84, 1, 'erty', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(662, 84, 2, 'sdfg', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(663, 84, 3, 'sdftyu', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(664, 84, 4, 'ascvb', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(665, 84, 5, 'dfghj', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(666, 84, 6, 'yuiol', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(667, 84, 7, 'oiuyt', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(668, 84, 8, 'olkj', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(669, 84, 9, 'qwevb', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(670, 84, 10, 'hjmko', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(671, 84, 11, 'ujhkl', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(672, 84, 12, 'fghjkloi', '2018-09-07 21:22:56', '2018-09-07 21:22:56'),
(673, 85, 1, 'gftre', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(674, 85, 2, 'kjiut', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(675, 85, 3, 'lkoiuy', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(676, 85, 4, 'jhuyt', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(677, 85, 5, 'kjiuyt', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(678, 85, 6, 'kiuojh', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(679, 85, 7, 'lpoujh', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(680, 85, 8, 'kjiuhgf', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(681, 85, 9, 'lkoiuhg', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(682, 85, 10, 'lkoijhg', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(683, 85, 11, 'jiuygf', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(684, 85, 12, 'kjiuytgffdr', '2018-09-07 23:18:14', '2018-09-07 23:18:14'),
(685, 86, 1, 'aaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(686, 86, 2, 'aaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(687, 86, 3, 'aaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(688, 86, 4, 'aaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(689, 86, 5, 'aaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(690, 86, 6, 'aaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(691, 86, 7, 'aaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(692, 86, 8, 'aaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(693, 86, 9, 'aaaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(694, 86, 10, 'aaaaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(695, 86, 11, 'aaaaaaaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(696, 86, 12, 'aaaaaaaaaa', '2018-10-05 06:18:07', '2018-10-05 06:18:07'),
(697, 88, 1, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(698, 88, 2, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(699, 88, 3, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(700, 88, 4, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(701, 88, 5, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(702, 88, 6, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(703, 88, 7, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(704, 88, 8, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(705, 88, 9, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(706, 88, 10, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(707, 88, 11, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(708, 88, 12, 'yes', '2018-10-14 17:58:42', '2018-10-14 17:58:42'),
(709, 89, 1, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(710, 89, 2, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(711, 89, 3, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(712, 89, 4, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(713, 89, 5, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(714, 89, 6, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(715, 89, 7, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(716, 89, 8, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(717, 89, 9, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(718, 89, 10, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(719, 89, 11, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(720, 89, 12, 'yes', '2018-10-14 18:24:17', '2018-10-14 18:24:17'),
(721, 90, 1, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(722, 90, 2, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(723, 90, 3, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(724, 90, 4, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(725, 90, 5, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(726, 90, 6, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(727, 90, 7, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(728, 90, 8, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(729, 90, 9, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(730, 90, 10, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(731, 90, 11, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(732, 90, 12, 'http://www.dnasbookdigimarket.com/register/89', '2018-10-14 18:37:59', '2018-10-14 18:37:59'),
(733, 91, 1, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(734, 91, 2, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(735, 91, 3, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(736, 91, 4, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(737, 91, 5, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(738, 91, 6, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(739, 91, 7, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(740, 91, 8, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(741, 91, 9, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(742, 91, 10, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(743, 91, 11, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(744, 91, 12, 'http://www.dnasbookdigimarket.com/register/90', '2018-10-14 18:45:25', '2018-10-14 18:45:25'),
(745, 92, 1, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(746, 92, 2, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(747, 92, 3, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(748, 92, 4, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(749, 92, 5, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(750, 92, 6, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(751, 92, 7, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(752, 92, 8, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(753, 92, 9, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(754, 92, 10, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(755, 92, 11, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(756, 92, 12, 'http://www.dnasbookdigimarket.com/register/91', '2018-10-14 18:51:28', '2018-10-14 18:51:28'),
(757, 94, 1, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(758, 94, 2, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(759, 94, 3, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(760, 94, 4, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(761, 94, 5, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(762, 94, 6, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(763, 94, 7, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(764, 94, 8, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(765, 94, 9, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(766, 94, 10, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(767, 94, 11, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(768, 94, 12, 'http://www.dnasbookdigimarket.com/register/92', '2018-10-14 19:06:39', '2018-10-14 19:06:39'),
(769, 97, 1, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(770, 97, 2, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(771, 97, 3, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(772, 97, 4, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(773, 97, 5, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(774, 97, 6, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(775, 97, 7, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(776, 97, 8, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(777, 97, 9, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(778, 97, 10, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(779, 97, 11, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(780, 97, 12, 'Yes', '2018-10-23 14:37:42', '2018-10-23 14:37:42'),
(798, 101, 5, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(797, 101, 4, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(796, 100, 21, 'Yes', '2018-10-30 16:48:25', '2018-10-30 16:48:25'),
(795, 100, 20, 'Yes', '2018-10-30 16:48:25', '2018-10-30 16:48:25'),
(794, 100, 19, 'Yes', '2018-10-30 16:48:25', '2018-10-30 16:48:25'),
(793, 100, 18, 'Yes', '2018-10-30 16:48:25', '2018-10-30 16:48:25'),
(806, 101, 22, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(807, 101, 23, 'Yes', '2018-10-30 18:34:52', '2018-10-30 18:34:52'),
(808, 102, 24, 'Oui', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(809, 102, 25, 'Oui', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(810, 102, 20, 'Oui', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(811, 102, 21, 'Oui', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(812, 102, 26, 'Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\"', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(813, 102, 27, 'Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\"', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(814, 102, 28, 'Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\"', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(815, 102, 29, 'Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\"', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(816, 102, 30, 'Je vais aller chercher la réponse à cette question sur le site de l\'Opportunité \"4\" ou auprès de celui qui m\'a introduit à l\'Opportunité \"4\"', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(817, 102, 31, 'Mes enfants', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(818, 102, 32, 'Oui, aider les ecoles!', '2018-10-30 18:45:16', '2018-10-30 18:45:16'),
(819, 104, 4, 'tesy', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(820, 104, 5, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(821, 104, 6, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(822, 104, 7, 'tesy', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(823, 104, 8, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(824, 104, 9, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(825, 104, 10, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(826, 104, 11, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(827, 104, 12, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(828, 104, 22, 'test', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(829, 104, 23, 'tesy', '2018-11-10 17:14:13', '2018-11-10 17:14:13'),
(830, 106, 4, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(831, 106, 5, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(832, 106, 6, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(833, 106, 7, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(834, 106, 8, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(835, 106, 9, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(836, 106, 10, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(837, 106, 11, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(838, 106, 12, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(839, 106, 22, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(840, 106, 23, 'yes', '2018-11-11 23:45:36', '2018-11-11 23:45:36'),
(841, 107, 4, 'Tu', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(842, 107, 5, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(843, 107, 6, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(844, 107, 7, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(845, 107, 8, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(846, 107, 9, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(847, 107, 10, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(848, 107, 11, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(849, 107, 12, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(850, 107, 22, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(851, 107, 23, 'Yes', '2018-11-12 00:03:27', '2018-11-12 00:03:27'),
(852, 108, 4, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(853, 108, 5, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(854, 108, 6, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(855, 108, 7, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(856, 108, 8, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(857, 108, 9, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(858, 108, 10, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(859, 108, 11, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(860, 108, 12, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(861, 108, 22, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(862, 108, 23, 'Yes', '2018-11-12 00:10:38', '2018-11-12 00:10:38'),
(863, 109, 4, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(864, 109, 5, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(865, 109, 6, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(866, 109, 7, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(867, 109, 8, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(868, 109, 9, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(869, 109, 10, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(870, 109, 11, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(871, 109, 12, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(872, 109, 22, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(873, 109, 23, 'Yes', '2018-11-12 00:15:52', '2018-11-12 00:15:52'),
(874, 110, 4, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(875, 110, 5, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(876, 110, 6, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(877, 110, 7, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(878, 110, 8, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(879, 110, 9, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(880, 110, 10, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(881, 110, 11, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(882, 110, 12, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(883, 110, 22, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(884, 110, 23, 'Yes', '2018-11-12 00:19:50', '2018-11-12 00:19:50'),
(885, 111, 4, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(886, 111, 5, 'ya', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(887, 111, 6, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(888, 111, 7, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(889, 111, 8, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(890, 111, 9, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(891, 111, 10, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(892, 111, 11, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(893, 111, 12, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(894, 111, 22, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(895, 111, 23, 'yes', '2018-11-12 01:00:42', '2018-11-12 01:00:42'),
(896, 112, 4, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(897, 112, 5, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(898, 112, 6, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(899, 112, 7, 'yed', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(900, 112, 8, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(901, 112, 9, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(902, 112, 10, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(903, 112, 11, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(904, 112, 12, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(905, 112, 22, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(906, 112, 23, 'yes', '2018-11-12 01:05:22', '2018-11-12 01:05:22'),
(907, 113, 4, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(908, 113, 5, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(909, 113, 6, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(910, 113, 7, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(911, 113, 8, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(912, 113, 9, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(913, 113, 10, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(914, 113, 11, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(915, 113, 12, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(916, 113, 22, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(917, 113, 23, 'look for the answer for your success in Opportunity!', '2018-11-14 00:51:58', '2018-11-14 00:51:58'),
(918, 114, 4, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(919, 114, 5, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(920, 114, 6, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(921, 114, 7, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(922, 114, 8, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(923, 114, 9, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(924, 114, 10, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(925, 114, 11, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(926, 114, 12, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(927, 114, 22, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(928, 114, 23, 'look for the answer for your success in Opportunity!', '2018-11-14 01:00:25', '2018-11-14 01:00:25'),
(929, 115, 4, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(930, 115, 5, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(931, 115, 6, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(932, 115, 7, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(933, 115, 8, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(934, 115, 9, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(935, 115, 10, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(936, 115, 11, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(937, 115, 12, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(938, 115, 22, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(939, 115, 23, 'look for the answer for your success in Opportunity!', '2018-11-14 01:13:36', '2018-11-14 01:13:36'),
(961, 116, 23, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(960, 116, 22, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(959, 116, 12, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(958, 116, 11, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(957, 116, 10, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(956, 116, 9, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(955, 116, 8, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(954, 116, 7, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(953, 116, 6, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(952, 116, 5, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(951, 116, 4, 'look for the answer for your success in Opportunity!', '2018-11-14 01:25:34', '2018-11-14 01:25:34'),
(1016, 45, 23, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1015, 45, 22, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1014, 45, 12, 'sdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1013, 45, 11, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1012, 45, 10, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1011, 45, 9, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1010, 45, 8, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1009, 45, 7, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1008, 45, 6, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1007, 45, 5, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1006, 45, 4, 'asdf', '2018-11-18 18:19:19', '2018-11-18 18:19:19'),
(1017, 117, 4, 'asdfasd', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1018, 117, 5, 'sdfsadf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1019, 117, 6, 'asdfdsf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1020, 117, 7, 'sadfsadf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1021, 117, 8, 'asdfasdf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1022, 117, 9, 'sdfasdf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1023, 117, 10, 'asdfadsf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1024, 117, 11, 'sdfasdf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1025, 117, 12, 'asdfasdf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1026, 117, 22, 'asdfsadf', '2018-11-18 18:33:49', '2018-11-18 18:33:49');
INSERT INTO `user_goals` (`id`, `user_id`, `goal_id`, `user_answer`, `created_at`, `updated_at`) VALUES
(1027, 117, 23, 'sadfsdf', '2018-11-18 18:33:49', '2018-11-18 18:33:49'),
(1028, 118, 4, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1029, 118, 5, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1030, 118, 6, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1031, 118, 7, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1032, 118, 8, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1033, 118, 9, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1034, 118, 10, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1035, 118, 11, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1036, 118, 12, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1037, 118, 22, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1038, 118, 23, 'look for the answer for your success in Opportunity!', '2018-11-21 18:46:54', '2018-11-21 18:46:54'),
(1039, 119, 4, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1040, 119, 5, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1041, 119, 6, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1042, 119, 7, 'sdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1043, 119, 8, 'dsf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1044, 119, 9, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1045, 119, 10, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1046, 119, 11, 'asd', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1047, 119, 12, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1048, 119, 22, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1049, 119, 23, 'asdf', '2018-11-23 18:45:39', '2018-11-23 18:45:39'),
(1050, 120, 4, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1051, 120, 5, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1052, 120, 6, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1053, 120, 7, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1054, 120, 8, 'adsf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1055, 120, 9, 'sadf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1056, 120, 10, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1057, 120, 11, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1058, 120, 12, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1059, 120, 22, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1060, 120, 23, 'asdf', '2018-11-24 11:44:10', '2018-11-24 11:44:10'),
(1061, 121, 4, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1062, 121, 5, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1063, 121, 6, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1064, 121, 7, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1065, 121, 8, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1066, 121, 9, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1067, 121, 10, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1068, 121, 11, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1069, 121, 12, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1070, 121, 22, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1071, 121, 23, 'look for the answer for your success in Opportunity!', '2018-11-26 00:40:26', '2018-11-26 00:40:26'),
(1072, 122, 4, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1073, 122, 5, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1074, 122, 6, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1075, 122, 7, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1076, 122, 8, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1077, 122, 9, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1078, 122, 10, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1079, 122, 11, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1080, 122, 12, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1081, 122, 22, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1082, 122, 23, 'look for the answer for your success in Opportunity!', '2018-11-26 00:44:49', '2018-11-26 00:44:49'),
(1083, 124, 4, 'adsfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1084, 124, 5, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1085, 124, 6, 'asdfdsaf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1086, 124, 7, 'sdafasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1087, 124, 8, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1088, 124, 9, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1089, 124, 10, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1090, 124, 11, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1091, 124, 12, 'sadfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1092, 124, 22, 'asdfasdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1093, 124, 23, 'asfsdf', '2018-11-27 16:18:57', '2018-11-27 16:18:57'),
(1094, 126, 4, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1095, 126, 5, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1096, 126, 6, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1097, 126, 7, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1098, 126, 8, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1099, 126, 9, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1100, 126, 10, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1101, 126, 11, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1102, 126, 12, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1103, 126, 22, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1104, 126, 23, 'the answer for your success in Opportunity!', '2018-11-28 07:07:38', '2018-11-28 07:07:38'),
(1105, 127, 4, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1106, 127, 5, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1107, 127, 6, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1108, 127, 7, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1109, 127, 8, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1110, 127, 9, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1111, 127, 10, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1112, 127, 11, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1113, 127, 12, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1114, 127, 22, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1115, 127, 23, 'what do you do, who do you spend time with, etc', '2018-11-28 22:19:47', '2018-11-28 22:19:47'),
(1116, 128, 4, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1117, 128, 5, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1118, 128, 6, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1119, 128, 7, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1120, 128, 8, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1121, 128, 9, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1122, 128, 10, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1123, 128, 11, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1124, 128, 12, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1125, 128, 22, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1126, 128, 23, 'the answer for your success in Opportunity!', '2018-11-29 07:16:38', '2018-11-29 07:16:38'),
(1127, 129, 4, 'asdfas', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1128, 129, 5, 'asdfasf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1129, 129, 6, 'asdfadsf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1130, 129, 7, 'asdasfd', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1131, 129, 8, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1132, 129, 9, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1133, 129, 10, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1134, 129, 11, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1135, 129, 12, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1136, 129, 22, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1137, 129, 23, 'asdfasdf', '2018-11-29 20:41:39', '2018-11-29 20:41:39'),
(1138, 130, 4, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1139, 130, 5, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1140, 130, 6, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1141, 130, 7, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1142, 130, 8, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1143, 130, 9, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1144, 130, 10, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1145, 130, 11, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1146, 130, 12, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1147, 130, 22, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1148, 130, 23, 'the answer for your success in Opportunity', '2018-12-01 20:58:56', '2018-12-01 20:58:56'),
(1149, 131, 4, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1150, 131, 5, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1151, 131, 6, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1152, 131, 7, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1153, 131, 8, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1154, 131, 9, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1155, 131, 10, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1156, 131, 11, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1157, 131, 12, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1158, 131, 22, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1159, 131, 23, 'the answer for your success in Opportunity', '2018-12-03 03:31:55', '2018-12-03 03:31:55'),
(1160, 132, 4, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1161, 132, 5, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1162, 132, 6, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1163, 132, 7, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1164, 132, 8, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1165, 132, 9, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1166, 132, 10, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1167, 132, 11, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1168, 132, 12, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1169, 132, 22, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1170, 132, 23, 'the answer for your success in Opportunity', '2018-12-03 03:45:23', '2018-12-03 03:45:23'),
(1171, 133, 4, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1172, 133, 5, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1173, 133, 6, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1174, 133, 7, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1175, 133, 8, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1176, 133, 9, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1177, 133, 10, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1178, 133, 11, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1179, 133, 12, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1180, 133, 22, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52'),
(1181, 133, 23, 'the answer for your success in Opportunity!', '2018-12-04 07:04:52', '2018-12-04 07:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_banners_pages`
--
ALTER TABLE `ads_banners_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_profiles`
--
ALTER TABLE `billing_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_photo`
--
ALTER TABLE `companies_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_profiles`
--
ALTER TABLE `companies_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_group`
--
ALTER TABLE `material_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_sub_group`
--
ALTER TABLE `material_sub_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_pay`
--
ALTER TABLE `offline_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_details`
--
ALTER TABLE `payments_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_profiles`
--
ALTER TABLE `payment_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_subscription`
--
ALTER TABLE `paypal_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testomonials`
--
ALTER TABLE `testomonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_commissions`
--
ALTER TABLE `user_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_goals`
--
ALTER TABLE `user_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ads_banners_pages`
--
ALTER TABLE `ads_banners_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `billing_profiles`
--
ALTER TABLE `billing_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companies_photo`
--
ALTER TABLE `companies_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `companies_profiles`
--
ALTER TABLE `companies_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `material_group`
--
ALTER TABLE `material_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `material_sub_group`
--
ALTER TABLE `material_sub_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `offline_pay`
--
ALTER TABLE `offline_pay`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payments_details`
--
ALTER TABLE `payments_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `payment_profiles`
--
ALTER TABLE `payment_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paypal_subscription`
--
ALTER TABLE `paypal_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testomonials`
--
ALTER TABLE `testomonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_commissions`
--
ALTER TABLE `user_commissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1444;
--
-- AUTO_INCREMENT for table `user_goals`
--
ALTER TABLE `user_goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1182;
--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
