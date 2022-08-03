-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 07:19 PM
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
-- Database: `updatedcod`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `a_id` int(11) NOT NULL,
  `money` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `c_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`c_id`, `ref_id`, `name`) VALUES
(1, 18, 'ABBOTTABAD'),
(2, 92, 'ABDUL HAKEEM'),
(3, 96, 'ADDA SHAIKH WAHAN'),
(4, 97, 'ADDA SIRAJ'),
(5, 102, 'AHMEDPUR EAST'),
(6, 105, 'AJNIA WALA'),
(7, 107, 'AKHTAR ABAD'),
(8, 108, 'AKORA KHATTAK'),
(9, 111, 'ALIPUR'),
(10, 110, 'ALIPUR CHATHA'),
(11, 112, 'ALLAH ABAD'),
(12, 113, 'AMANGARH'),
(13, 114, 'ARIFWALA'),
(14, 42, 'ATTOCK'),
(15, 116, 'AYUBIA'),
(16, 120, 'BADDOMALHI'),
(17, 119, 'BADIN'),
(18, 121, 'BAFFA'),
(19, 38, 'BAGH (AJK)'),
(20, 46, 'BAHAWALNAGAR'),
(21, 19, 'BAHAWALPUR'),
(22, 123, 'BAHTAR MORE'),
(23, 124, 'BAIG PUR'),
(24, 127, 'BALAMBAT'),
(25, 87, 'BANNU'),
(26, 128, 'BARA MARKET'),
(27, 131, 'BARIKOT'),
(28, 134, 'BASHARAT'),
(29, 136, 'BASIRPUR'),
(30, 137, 'BASTI MALOOK'),
(31, 139, 'BATKHELA'),
(32, 122, 'BHAGTANWALA'),
(33, 51, 'BHAI PHERU'),
(34, 63, 'BHAKKAR'),
(35, 147, 'BHALWAAL'),
(36, 129, 'BHARA KAHU'),
(37, 151, 'BHERA'),
(38, 152, 'BHIKKI'),
(39, 155, 'BHOWANA'),
(40, 160, 'BHURBUN (P.C. HOTEL)'),
(41, 163, 'BONGA HAYAT'),
(42, 167, 'BUCHEKE'),
(43, 168, 'BUNER'),
(44, 65, 'BUREWALA'),
(45, 171, 'CADET COLLEGE SUNNY BANK'),
(46, 174, 'CHAK JHUMRA'),
(47, 175, 'CHAK PARANA'),
(48, 178, 'CHAKLALA'),
(49, 179, 'CHAKRI'),
(50, 73, 'CHAKWAL'),
(51, 181, 'CHAMAN'),
(52, 184, 'CHANGA MANGA'),
(53, 186, 'CHAR BAGH'),
(54, 187, 'CHARSADDA'),
(55, 189, 'CHAWINDA'),
(56, 69, 'CHICHAWATNI'),
(57, 191, 'CHINIOT'),
(58, 193, 'CHISTIAN'),
(59, 196, 'CHOA SAIDAN SHAH'),
(60, 197, 'CHOBARA'),
(61, 205, 'CHOWK AZAM'),
(62, 206, 'CHOWK PANDORI '),
(63, 211, 'CHUNIAN'),
(64, 216, 'DAKWALA'),
(65, 217, 'DALBANDIN'),
(66, 220, 'DAOOD ZAI'),
(67, 222, 'DARGAI'),
(68, 223, 'DARYA KHAN'),
(69, 225, 'DASKA'),
(70, 226, 'DAUL TALA'),
(71, 75, 'DEHARKI'),
(72, 33, 'DEPALPUR'),
(73, 229, 'DERA ALLAH YAR'),
(74, 24, 'DERA GHAZI KHAN'),
(75, 21, 'DERA ISMAIL KHAN'),
(76, 230, 'DERA MURAD JAMALI'),
(77, 232, 'DEWALAY'),
(78, 235, 'DHABJEE'),
(79, 240, 'DHUDIAL'),
(80, 242, 'DIJKOT'),
(81, 243, 'DINA '),
(82, 245, 'DISTT. COMPLEX'),
(83, 246, 'DOABA'),
(84, 249, 'DONGA BONGA'),
(85, 252, 'DULLE WALA'),
(86, 253, 'DUNIAPUR'),
(87, 254, 'F.F.C. PLANT'),
(88, 20, 'FAISALABAD'),
(89, 255, 'FAQIRWALI'),
(90, 256, 'FAROKA'),
(91, 257, 'FAROOQABAD'),
(92, 259, 'FATEH JANG'),
(93, 260, 'FATEH PUR'),
(94, 263, 'FAZIL PUR'),
(95, 266, 'FEROZ WATWAN'),
(96, 267, 'FKPCL POWER PLANT'),
(97, 47, 'FORT ABBAS'),
(98, 270, 'GAGGO MANDI'),
(99, 272, 'GAMBAT'),
(100, 273, 'GAMBER'),
(101, 275, 'GARHA MORE'),
(102, 280, 'GATWALA 199 / RB'),
(103, 281, 'GHAKKAR MANDI'),
(104, 284, 'GHARIBWAL CEMENT'),
(105, 285, 'GHARO'),
(106, 287, 'GHAZIABAD'),
(107, 288, 'GHIKA GALI '),
(108, 289, 'GHORA GALI'),
(109, 85, 'GHOTKI'),
(110, 290, 'GHOUR GHUSTI'),
(111, 44, 'GILGIT'),
(112, 49, 'GOJRA'),
(113, 292, 'GOLARCHI'),
(114, 295, 'GOTH MACHI'),
(115, 50, 'GUJAR KHAN'),
(116, 15, 'GUJRANWALA'),
(117, 39, 'GUJRAT'),
(118, 298, 'GULYANA'),
(119, 22, 'GWADAR'),
(120, 25, 'HAFIZABAD'),
(121, 300, 'HAJEERA'),
(122, 302, 'HAKEEM ABAD'),
(123, 303, 'HALA'),
(124, 308, 'HANGU'),
(125, 309, 'HARAPPA'),
(126, 70, 'HARIPUR'),
(127, 310, 'HARNAL'),
(128, 79, 'HAROONABAD'),
(129, 311, 'HASEEB WAQAS MILLS'),
(130, 312, 'HASIL PUR'),
(131, 41, 'HASSAN ABDAL'),
(132, 314, 'HATIA BALA'),
(133, 67, 'HATTAR'),
(134, 316, 'HAVELI LAKHA'),
(135, 768, 'HAVELIAN'),
(136, 317, 'HAZARA UNIVERSITY'),
(137, 318, 'HAZRO'),
(138, 319, 'HEAD BALOKI ROAD'),
(139, 321, 'HEADMARALA'),
(140, 324, 'HUJRA SHAH MUKEEM'),
(141, 326, 'HUSRI'),
(142, 10, 'HYDERABAD'),
(143, 327, 'IQBAL ABAD'),
(144, 328, 'IQBAL NAGAR'),
(145, 3, 'ISLAMABAD'),
(146, 80, 'JACOBABAD'),
(147, 331, 'JAHANIAN'),
(148, 334, 'JALALPURPIRWALA'),
(149, 336, 'JAMPUR'),
(150, 337, 'JAMSHERO'),
(151, 339, 'JANDIA SHER KHAN'),
(152, 45, 'JARANWALA'),
(153, 341, 'JATOI'),
(154, 342, 'JEHANGIRA'),
(155, 344, 'JHABRAN MANDI'),
(156, 52, 'JHANG'),
(157, 16, 'JHELUM'),
(158, 351, 'JOHARABAD'),
(159, 355, 'KABIRWALA'),
(160, 358, 'KAHAUTA'),
(161, 367, 'KALAT'),
(162, 368, 'KALLAR KAHAR'),
(163, 369, 'KALLAR SYEDDAN'),
(164, 370, 'KALOR KOT'),
(165, 83, 'KAMALIA'),
(166, 66, 'KAMOKE'),
(167, 371, 'KAMRA'),
(168, 372, 'KAND KOT'),
(169, 374, 'KANDIARO'),
(170, 375, 'KANGAN PUR'),
(171, 376, 'KANGRA'),
(172, 377, 'KANJU'),
(173, 378, 'KANYAL'),
(174, 379, 'KAPCO POWER PLANT'),
(175, 2, 'KARACHI'),
(176, 384, 'KAROOR PAKA'),
(177, 385, 'KAROR LAL EASAN'),
(178, 388, 'KASHMORE'),
(179, 389, 'KASSOWAL'),
(180, 6, 'KASUR'),
(181, 394, 'KHAIR PUR'),
(182, 395, 'KHAIRPUR MEERUS'),
(183, 396, 'KHAIRPUR TAMEWALI'),
(184, 57, 'KHANEWAL'),
(185, 403, 'KHANKA DOGRAN'),
(186, 68, 'KHANPUR'),
(187, 84, 'KHARIAN'),
(188, 410, 'KHAS BEHAAL'),
(189, 412, 'KHOAZA KHAILA'),
(190, 415, 'KHOSKI'),
(191, 416, 'KHUDIAN KHAS'),
(192, 417, 'KHURRIANWALA'),
(193, 89, 'KHUSHAB'),
(194, 418, 'KHUZDAR'),
(195, 419, 'KHWERA'),
(196, 37, 'KOHAT'),
(197, 40, 'KOT ADDU'),
(198, 424, 'KOT CHUTTA'),
(199, 429, 'KOT MOMIN'),
(200, 430, 'KOT PINDI DAS'),
(201, 431, 'KOT RADHA KISHAN'),
(202, 432, 'KOT SAMABAH'),
(203, 90, 'KOTLI (AJK)'),
(204, 438, 'KOTLI BEHRAM'),
(205, 439, 'KOTLI LOHARAN'),
(206, 440, 'KOTRI'),
(207, 441, 'KUCHLAK'),
(208, 442, 'KULACHI'),
(209, 444, 'KUNDIAN'),
(210, 1, 'LAHORE'),
(211, 450, 'LAKKI MARWAT '),
(212, 36, 'LALA MUSA'),
(213, 451, 'LALIAN'),
(214, 453, 'LALLIANI'),
(215, 454, 'LALPIR (THERMAL POWER)'),
(216, 82, 'LARKANA'),
(217, 456, 'LAWRENCE PUR'),
(218, 32, 'LAYYAH'),
(219, 457, 'LIAQAT PUR'),
(220, 458, 'LODHRAN'),
(221, 459, 'LORALAI'),
(222, 462, 'LOWER TOPA'),
(223, 463, 'MACHIKEY'),
(224, 465, 'MAILSI'),
(225, 469, 'MALAKAND'),
(226, 473, 'MANA WLA'),
(227, 474, 'MANAWALA'),
(228, 26, 'MANDI BAHAUDDIN'),
(229, 475, 'MANDI SAFDAR ABAD'),
(230, 476, 'MANDI USMAN WALA'),
(231, 477, 'MANDIAN'),
(232, 478, 'MANDRA'),
(233, 480, 'MANGA MANDI'),
(234, 481, 'MANGLA (AJK)'),
(235, 482, 'MANGLA CANTT (AJK)'),
(236, 487, 'MANKERA'),
(237, 488, 'MANKYLA STATION'),
(238, 489, 'MANSEHRA'),
(239, 76, 'MARDAN'),
(240, 490, 'MARI'),
(241, 491, 'MASAR CAMP'),
(242, 492, 'MASTUNG'),
(243, 493, 'MATIYARI'),
(244, 495, 'MATTA'),
(245, 497, 'MEHRAB PUR'),
(246, 48, 'MIAN CHANNU'),
(247, 499, 'MIAN WALI QURESHAIN'),
(248, 500, 'MIANI'),
(249, 31, 'MIANWALI'),
(250, 502, 'MINCHINABAD'),
(251, 503, 'MINGORA'),
(252, 504, 'MIR PUR METHELO'),
(253, 17, 'MIRPUR (AJK)'),
(254, 53, 'MIRPUR KHAS'),
(255, 508, 'MITHA TIWANA'),
(256, 513, 'MORE AIMANABAD'),
(257, 514, 'MORE KHUNDA'),
(258, 516, 'MORO'),
(259, 517, 'MOTRA'),
(260, 518, 'MUCH'),
(261, 12, 'MULTAN'),
(262, 54, 'MURIDKE'),
(263, 61, 'MURREE'),
(264, 74, 'MUZAFFARABAD (AJK)'),
(265, 55, 'MUZAFFARGARH'),
(266, 88, 'NANKANA SAHIB'),
(267, 60, 'NAROWAL'),
(268, 525, 'NAUSHKI'),
(269, 71, 'NAWABSHAH'),
(270, 528, 'NAWAN SHEHR'),
(271, 529, 'NAWAY KALI'),
(272, 530, 'NEW INDUSTRIAL AREA '),
(273, 532, 'NIZAMABAD'),
(274, 535, 'NONAR'),
(275, 536, 'NOOR COLONY'),
(276, 537, 'NOOR KOT'),
(277, 538, 'NOORPUR'),
(278, 539, 'NOORPUR THAL'),
(279, 78, 'NOWSHERA'),
(280, 541, 'NOWSHERA KALAN'),
(281, 542, 'NOWSHERA VIRKAN'),
(282, 543, 'NOWSHERO FEROZE'),
(283, 544, 'NRTC (TELECOM STAFF COLLEGE)'),
(284, 29, 'OKARA'),
(285, 547, 'OLD HALA'),
(286, 549, 'P.O.F. (FACTORY &amp; COLONY)'),
(287, 550, 'PABI'),
(288, 552, 'PAHARPUR'),
(289, 62, 'PAKPATTAN'),
(290, 556, 'PANOAQIL'),
(291, 558, 'PAROA'),
(292, 560, 'PASROOR'),
(293, 561, 'PASROOR ROAD AND VILLAGES'),
(294, 563, 'PATOKI'),
(295, 564, 'PATRIATA'),
(296, 565, 'PEER MAHAL'),
(297, 8, 'PESHAWAR'),
(298, 566, 'PEZU'),
(299, 567, 'PHALIA'),
(300, 59, 'PIND DADAN KHAN'),
(301, 570, 'PINDI GHEB'),
(302, 571, 'PINDI GUJRAN'),
(303, 573, 'PIPLAN'),
(304, 574, 'PIR BABA'),
(305, 579, 'PISHIN'),
(306, 580, 'PITARO'),
(307, 582, 'PMA KAKUL'),
(308, 588, 'PUNGIRAYIN'),
(309, 591, 'PUNWAN'),
(310, 594, 'QABAL'),
(311, 595, 'QABOOLA SHARIF'),
(312, 597, 'QADIR PUR RAWAN'),
(313, 598, 'QAIDABAD'),
(314, 599, 'QAMAR MASHANI'),
(315, 603, 'QILA DEEDAR SING'),
(316, 604, 'QILA SAIB SINGH'),
(317, 9, 'QUETTA'),
(318, 28, 'RAHIM YAR KHAN'),
(319, 606, 'RAIWIND'),
(320, 608, 'RAJA JANG'),
(321, 610, 'RAJAN PUR'),
(322, 611, 'RAJANA'),
(323, 612, 'RAJAR'),
(324, 615, 'RAMAK'),
(325, 616, 'RANI PUR'),
(326, 617, 'RAO KHAN WALA'),
(327, 619, 'RATO DEARO'),
(328, 64, 'RAWALAKOT (AJK)'),
(329, 4, 'RAWALPINDI'),
(330, 621, 'RAWAT'),
(331, 622, 'RENALA KHURD'),
(332, 623, 'RISALPUR'),
(333, 626, 'ROHRI'),
(334, 628, 'RUBWA'),
(335, 30, 'SADIQABAD'),
(336, 632, 'SAFDARABAD'),
(337, 11, 'SAHIWAL'),
(338, 636, 'SAIDU SHARIF'),
(339, 637, 'SAJAWAL'),
(340, 639, 'SAKRAND'),
(341, 641, 'SAMANDARI'),
(342, 646, 'SANGAR'),
(343, 648, 'SANGLA HILL'),
(344, 651, 'SANJWAL'),
(345, 654, 'SARAYE NORANG'),
(346, 655, 'SARDAR GARH'),
(347, 656, 'SARDARYAB'),
(348, 13, 'SARGODHA'),
(349, 658, 'SARI ALAMGIR'),
(350, 660, 'SAWABI'),
(351, 661, 'SAWAT'),
(352, 664, 'SEHWAN SHARIF'),
(353, 665, 'SHABQADAR'),
(354, 666, 'SHADAD KOT'),
(355, 668, 'SHADIWAL'),
(356, 671, 'SHAH PUR CHAKAR'),
(357, 673, 'SHAHDAD PUR'),
(358, 674, 'SHAHKOT'),
(359, 676, 'SHAHPUR SADDAR'),
(360, 58, 'SHAKARGARH'),
(361, 679, 'SHAM KOT'),
(362, 680, 'SHAMS ABAD'),
(363, 682, 'SHEEDO'),
(364, 7, 'SHEIKHUPURA'),
(365, 684, 'SHERGARH'),
(366, 685, 'SHEWA ADDA'),
(367, 81, 'SHIKARPUR'),
(368, 686, 'SHIMLA HILL'),
(369, 687, 'SHORKOT'),
(370, 688, 'SHUJABAD'),
(371, 14, 'SIALKOT'),
(372, 690, 'SIHALA'),
(373, 692, 'SILANWALI'),
(374, 695, 'SIRAYE MUHAJIR'),
(375, 696, 'SKARDU'),
(376, 697, 'SMAAL IND ESTATE. DASKA'),
(377, 700, 'SOHAWA ONLY MAIN GT ROAD'),
(378, 5, 'SUKKUR'),
(379, 705, 'SUMBRIAL'),
(380, 706, 'SUNDER ADDA'),
(381, 72, 'SWABI'),
(382, 709, 'TAKHT-E-BHAI'),
(383, 710, 'TALAGUNG'),
(384, 711, 'TALHAR'),
(385, 713, 'TALVANDI'),
(386, 77, 'TANDLIAWALA'),
(387, 715, 'TANDO ADAM'),
(388, 717, 'TANDO ALLAHYAR'),
(389, 720, 'TANDO JAM'),
(390, 722, 'TANDO MOHD KHAN'),
(391, 723, 'TANGI'),
(392, 56, 'TANK'),
(393, 725, 'TARNOL'),
(394, 727, 'TAUNSA SHARIF'),
(395, 728, 'TAXLA'),
(396, 86, 'THATTA'),
(397, 732, 'THEENG MORE (ALLAHABAD)'),
(398, 734, 'TIBBA SULTANPURA'),
(399, 736, 'TIMARGARAH'),
(400, 34, 'TOBA TEK SINGH'),
(401, 737, 'TOPI (GIK UNIVERSITY AREA ONLY)*'),
(402, 738, 'TRANDA SAWAY KHAN'),
(403, 23, 'TURBAT'),
(404, 741, 'UBARO'),
(405, 743, 'UCH SHRIF'),
(406, 745, 'UGGOKE'),
(407, 35, 'VEHARI'),
(408, 749, 'VILLAGE SIAL'),
(409, 43, 'WAH CANTT'),
(410, 750, 'WAN RAHDA RAM'),
(411, 752, 'WAPDA COLONY (AJK)'),
(412, 753, 'WARBATTAN'),
(413, 755, 'WAZIRABAD'),
(414, 756, 'YAZMAN'),
(415, 757, 'ZAFARWAL'),
(416, 759, 'ZHOB'),
(424, 761, 'UMERKOT'),
(423, 760, 'SIBI');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `number` varchar(30) NOT NULL,
  `cnic` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `addkg` int(11) NOT NULL,
  `khi_rtn` int(11) NOT NULL,
  `pricenwd` int(11) NOT NULL,
  `addkgnwd` int(11) NOT NULL,
  `nwd_rtn` int(11) NOT NULL,
  `flyer_small` varchar(255) NOT NULL,
  `flyer_medium` varchar(233) NOT NULL,
  `flyer_large` varchar(233) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bank_acc_title` varchar(255) DEFAULT NULL,
  `bank_acc_num` int(11) DEFAULT NULL,
  `easypaisa_acc_title` varchar(255) DEFAULT NULL,
  `easypaisa_acc_num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `name`, `username`, `password`, `company_name`, `address`, `number`, `cnic`, `price`, `addkg`, `khi_rtn`, `pricenwd`, `addkgnwd`, `nwd_rtn`, `flyer_small`, `flyer_medium`, `flyer_large`, `email`, `bankname`, `bank_acc_title`, `bank_acc_num`, `easypaisa_acc_title`, `easypaisa_acc_num`) VALUES
(34, 'Rajesh kumar', 'a', 'h', 'a', 'h', '03402782636', 'h', 0, 0, 0, 0, 0, 0, 'h', 'h', 'h', 'rajeshkumar1612169@gmail.com', 'h', 'h', 0, 'h', 0),
(35, 'Rajesh kumar', 'a', 'h', 'a', 'h', '03402782636', 'h', 0, 0, 0, 0, 0, 0, 'h', 'h', 'h', 'rajeshkumar1612169@gmail.com', 'h', 'h', 0, 'h', 0),
(37, 'Shahzaib', 'Shahzaib', '112233', 'Ad', '1', '03323699436', '1', 1, 1, 0, 0, 0, 0, 'Q', 'Q', 'Q', 'shahzaib.khan0345@gmail.com', '1', '1', 1, 'Q', 0),
(36, 'Rajesh kumar', 'sd', 'J', '23', 'J', '03402782636', 'J', 0, 0, 0, 0, 0, 0, 'J', 'J', 'J', 'rajeshkumar1612169@gmail.com', 'J', 'J', 0, 'J', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_invoice`
--

CREATE TABLE `client_invoice` (
  `ci_id` int(11) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '0' COMMENT '0=unpaid, 1=paid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_request`
--

CREATE TABLE `client_request` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `number` varchar(30) NOT NULL,
  `cnic` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `addkg` int(11) DEFAULT NULL,
  `khi_rtn` int(11) DEFAULT NULL,
  `pricenwd` int(11) DEFAULT NULL,
  `addkgnwd` int(11) DEFAULT NULL,
  `nwd_rtn` int(11) DEFAULT NULL,
  `bankname` varchar(255) NOT NULL,
  `bank_acc_title` varchar(255) NOT NULL,
  `bank_acc_num` int(11) NOT NULL,
  `easypaisa_acc_title` varchar(255) NOT NULL,
  `easypaisa_acc_num` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_request`
--

INSERT INTO `client_request` (`c_id`, `name`, `username`, `password`, `company_name`, `address`, `number`, `cnic`, `price`, `addkg`, `khi_rtn`, `pricenwd`, `addkgnwd`, `nwd_rtn`, `bankname`, `bank_acc_title`, `bank_acc_num`, `easypaisa_acc_title`, `easypaisa_acc_num`, `email`) VALUES
(5, 'Rajesh kumar', 'bjhhb', 'pass', 'hjb', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '7868687678678', NULL, NULL, NULL, NULL, NULL, NULL, 'jkhnjk', 'jkbk', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(6, 'Rajesh kumar', 'test', 'test', 'k', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '7667576756', NULL, NULL, NULL, NULL, NULL, NULL, 'asda', 'dad', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(7, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(8, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(9, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(10, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(11, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(12, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(13, 'Rajesh kumar', 'test', 'abc', 'test', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '3242', NULL, NULL, NULL, NULL, NULL, NULL, 'asdaas', 'dasasd', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(14, 'Rajesh kumar', 'ali', '1234', 'msa', 'pioneer cottage house#R-37 main university road karachi', '03402782636', '86', NULL, NULL, NULL, NULL, NULL, NULL, 'asda', 'dasdad', 0, 'Pakistan', 0, 'rajeshkumar1612169@gmail.com'),
(15, 'Rajesh kumar', 'n', 'n', 'jhh', 'pioneer cottage house#R-37 main university road karachi', 'n', 'jk', NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 0, 'n', 0, 'rajeshkumar1612169@gmail.com'),
(16, 'Rajesh kumar', 'n', 'n', 'jhh', 'pioneer cottage house#R-37 main university road karachi', 'n', 'jk', NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 0, 'n', 0, 'rajeshkumar1612169@gmail.com'),
(17, 'Rajesh kumar', 'S', 'J', 'NM', 'pioneer cottage house#R-37 main university road karachi', '03402782636', 'JJK', NULL, NULL, NULL, NULL, NULL, NULL, 'J', 'J', 0, 'J', 0, 'rajeshkumar1612169@gmail.com'),
(18, 'Rajesh kumar', 'Sj', 'j', 'S', 'pioneer cottage house#R-37 main university road karachi', '03402782636', 'S', NULL, NULL, NULL, NULL, NULL, NULL, 'j', 'j', 0, 'j', 0, 'rajeshkumar1612169@gmail.com'),
(19, 'Rajesh kumar', 'j', 'j', 'sadas', 'pioneer cottage house#R-37 main university road karachi', 'j', '3222', NULL, NULL, NULL, NULL, NULL, NULL, 'j', 'j', 0, 'j', 0, 'rajeshkumar1612169@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `c_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `consignment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`c_id`, `courier_id`, `consignment_id`, `status_id`, `date`) VALUES
(1, 2, 644, 2, '2020-12-15'),
(2, 2, 645, 2, '2020-12-15'),
(3, 2, 646, 7, '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `ntn` varchar(100) NOT NULL DEFAULT ' ',
  `sst` int(3) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `name`, `admin_name`, `email`, `password`, `address`, `phone`, `ntn`, `sst`) VALUES
(1, 'RED X COURIER', 'Shahzain Khan', 'admin@admin', '12345', 'Karachi, Pakistan', '03323699436', 'RC-001122334455', 0);

-- --------------------------------------------------------

--
-- Table structure for table `consignment`
--

CREATE TABLE `consignment` (
  `c_id` bigint(70) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `p_address` varchar(250) NOT NULL,
  `r_address` varchar(250) NOT NULL,
  `consignee_name` varchar(25) NOT NULL,
  `consignee_ref` varchar(25) DEFAULT NULL,
  `consignee_number` varchar(25) NOT NULL,
  `consignee_email` varchar(50) DEFAULT NULL,
  `consignee_address` varchar(250) NOT NULL,
  `cod` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `description` varchar(250) NOT NULL,
  `city_id` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT '1=entered in system',
  `recived_by` varchar(200) NOT NULL DEFAULT 'None',
  `received_by_CNIC` varchar(50) DEFAULT NULL,
  `invoice_id` varchar(11) NOT NULL DEFAULT '0' COMMENT '0=not invoiced',
  `loadsheet_cconsignment_id` int(11) DEFAULT NULL,
  `pick_courier` int(11) NOT NULL DEFAULT 1 COMMENT '1=none',
  `delivery_courier` int(11) NOT NULL DEFAULT 1 COMMENT '1=none'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignment`
--

INSERT INTO `consignment` (`c_id`, `shipper_id`, `p_address`, `r_address`, `consignee_name`, `consignee_ref`, `consignee_number`, `consignee_email`, `consignee_address`, `cod`, `pcs`, `weight`, `description`, `city_id`, `remark`, `booking_date`, `status_id`, `recived_by`, `received_by_CNIC`, `invoice_id`, `loadsheet_cconsignment_id`, `pick_courier`, `delivery_courier`) VALUES
(10000000, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-20', 1, 'None', NULL, '0', 1, 1, 1),
(10000001, 37, '1', '1', 'Shahzaib', '8', '000', 'shahzaib.khan0345@gmail.com', 'Pakistan quarter garden west karachi', 6, 1, '1.00', 'Qqq', 2, 'Y', '2021-05-25', 1, 'None', NULL, '0', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `c_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `number` varchar(50) NOT NULL,
  `cnic` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `d_courier`
--

CREATE TABLE `d_courier` (
  `c_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `number` varchar(50) NOT NULL,
  `cnic` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `e_id` int(11) NOT NULL,
  `ec_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cost` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `ec_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loadsheet`
--

CREATE TABLE `loadsheet` (
  `ls_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `printed` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loadsheet`
--

INSERT INTO `loadsheet` (`ls_id`, `shipper_id`, `date`, `printed`) VALUES
(1, 6, '2021-05-20', '0'),
(2, 37, '2021-05-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `loadsheet_consignment`
--

CREATE TABLE `loadsheet_consignment` (
  `ls_c_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `p_address` varchar(250) NOT NULL,
  `r_address` varchar(250) NOT NULL,
  `consignee_name` varchar(25) NOT NULL,
  `consignee_ref` varchar(25) DEFAULT NULL,
  `consignee_number` varchar(25) NOT NULL,
  `consignee_email` varchar(50) NOT NULL,
  `consignee_address` varchar(250) NOT NULL,
  `cod` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `description` varchar(250) NOT NULL,
  `city_id` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `loadsheet_cconsignment_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loadsheet_consignment`
--

INSERT INTO `loadsheet_consignment` (`ls_c_id`, `shipper_id`, `p_address`, `r_address`, `consignee_name`, `consignee_ref`, `consignee_number`, `consignee_email`, `consignee_address`, `cod`, `pcs`, `weight`, `description`, `city_id`, `remark`, `booking_date`, `loadsheet_cconsignment_id`) VALUES
(1, 3, 'Pickup address(new area karachi,pakistan)', 'Return address(new area karachi,pakistan)', 'consignee name(reciving p', 'Referance code(your ref c', 'Consignee Number(923xxxxx', 'Consignee Email(abc@gmail.com)', 'Consignee Address(blue,area,islamabad)', 0, 0, '0.00', 'description of parcel', 1, 'remarks', '2021-05-18', NULL),
(2, 3, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-18', NULL),
(3, 3, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-18', NULL),
(4, 3, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-18', NULL),
(5, 3, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-18', NULL),
(6, 3, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-18', NULL),
(30, 6, 'Pickup address(new area karachi,pakistan)', 'Return address(new area karachi,pakistan)', 'consignee name(reciving p', 'Referance code(your ref c', 'Consignee Number(923xxxxx', 'Consignee Email(abc@gmail.com)', 'Consignee Address(blue,area,islamabad)', 0, 0, '0.00', 'description of parcel', 1, 'remarks', '2021-05-20', NULL),
(28, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '1.00', 'cloth', 0, 'xall before', '2021-05-20', NULL),
(29, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '1.00', 'cloth', 0, 'xall before', '2021-05-20', NULL),
(27, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '1.00', 'cloth', 0, 'xall before', '2021-05-20', NULL),
(25, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '1.00', 'cloth', 0, 'xall before', '2021-05-20', NULL),
(26, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '1.00', 'cloth', 0, 'xall before', '2021-05-20', NULL),
(23, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-19', NULL),
(24, 6, 'Pickup address(new area karachi,pakistan)', 'Return address(new area karachi,pakistan)', 'consignee name(reciving p', 'Referance code(your ref c', 'Consignee Number(923xxxxx', 'Consignee Email(abc@gmail.com)', 'Consignee Address(blue,area,islamabad)', 0, 0, '0.00', 'description of parcel', 0, 'remarks', '2021-05-20', NULL),
(22, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-19', NULL),
(20, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-19', NULL),
(21, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-19', NULL),
(19, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-19', NULL),
(18, 6, 'Pickup address(new area karachi,pakistan)', 'Return address(new area karachi,pakistan)', 'consignee name(reciving p', 'Referance code(your ref c', 'Consignee Number(923xxxxx', 'Consignee Email(abc@gmail.com)', 'Consignee Address(blue,area,islamabad)', 0, 0, '0.00', 'description of parcel', 1, 'remarks', '2021-05-19', NULL),
(32, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-20', NULL),
(33, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-20', NULL),
(34, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-20', NULL),
(35, 6, 'north khi', 'noerth khi', 'shahzaib', '12345', '3460030690', 'asasa@gmaul.com', 'blue area ', 1000, 1, '0.00', 'cloth', 1, 'xall before', '2021-05-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `date`, `heading`, `description`) VALUES
(1, '2021-05-18', 'We Are Delivering Now All Over Karachi COD', 'We Are Delivering Now All Over Karachi COD');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `color_code` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `code`, `description`, `color_code`) VALUES
(1, 'BKD', 'BOOKED', '#fff'),
(2, 'DD', 'DELIVERED', '#dbffd4'),
(8, 'OFD', 'OUT FOR DELIVERY', '#aca7e8'),
(7, 'AVL', 'ARRIVAL', ''),
(9, 'CNA', 'CUSTOMER NOT AVAILABLE', ''),
(10, 'HD', 'HOLD', ''),
(11, 'RTN', 'RETURN', '#ffc7c7'),
(13, 'AOB', 'Arrive To Origin Branch', '#11f200'),
(23, 'MTD', 'Move To Destination', '#deb5d7'),
(17, 'RTM', 'RE-ATTEMPT', '#9be2b6'),
(18, 'OR', 'ON ROUTE', '#92eade');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_history`
--

CREATE TABLE `tracking_history` (
  `th_id` int(11) NOT NULL,
  `consignment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_history`
--

INSERT INTO `tracking_history` (`th_id`, `consignment_id`, `status_id`, `time_date`) VALUES
(1, 1, 1, '2021-05-19 19:42:31'),
(2, 10000001, 1, '2021-05-25 13:09:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client_invoice`
--
ALTER TABLE `client_invoice`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `client_request`
--
ALTER TABLE `client_request`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `consignment`
--
ALTER TABLE `consignment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `d_courier`
--
ALTER TABLE `d_courier`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loadsheet`
--
ALTER TABLE `loadsheet`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `loadsheet_consignment`
--
ALTER TABLE `loadsheet_consignment`
  ADD PRIMARY KEY (`ls_c_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tracking_history`
--
ALTER TABLE `tracking_history`
  ADD PRIMARY KEY (`th_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `client_invoice`
--
ALTER TABLE `client_invoice`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_request`
--
ALTER TABLE `client_request`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consignment`
--
ALTER TABLE `consignment`
  MODIFY `c_id` bigint(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000002;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_courier`
--
ALTER TABLE `d_courier`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loadsheet`
--
ALTER TABLE `loadsheet`
  MODIFY `ls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loadsheet_consignment`
--
ALTER TABLE `loadsheet_consignment`
  MODIFY `ls_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tracking_history`
--
ALTER TABLE `tracking_history`
  MODIFY `th_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
