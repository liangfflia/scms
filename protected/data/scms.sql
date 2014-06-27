-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2014 at 11:38 AM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii-pics`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerClass` varchar(63) NOT NULL,
  `ownerId` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `title` varchar(127) NOT NULL,
  `description` varchar(500) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `ownerClass`, `ownerId`, `level`, `title`, `description`, `dateAdded`, `isActive`, `position`) VALUES
(8, 'Photo', 0, 1, 'Демотиваторы', '', '2013-12-23 16:07:24', 1, 2),
(9, 'News', 0, 1, 'Тест', '', '2013-12-23 16:32:45', 1, 4),
(7, 'Photo', 0, 1, 'Обои', '', '2013-12-23 16:07:16', 1, 1),
(10, 'Articles', 0, 1, 'Ремонт', '', '2014-03-12 19:59:48', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countyId` int(11) NOT NULL,
  `title` varchar(127) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=702 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `countyId`, `title`) VALUES
(1, 1, 'Бар'),
(2, 1, 'Бершадь'),
(3, 1, 'Браилов'),
(4, 1, 'Брацлав'),
(5, 1, 'Вапнярка'),
(6, 1, 'Вендичаны'),
(7, 1, 'Винница'),
(8, 1, 'Гайсин'),
(9, 1, 'Гнивань'),
(10, 1, 'Дашев'),
(11, 1, 'Жмеринка'),
(12, 1, 'Ильинцы'),
(13, 1, 'Казатин'),
(14, 1, 'Калиновка'),
(15, 1, 'Крыжополь'),
(16, 1, 'Ладыжин'),
(17, 1, 'Липовец'),
(18, 1, 'Литин'),
(19, 1, 'Могилев-подольский'),
(20, 1, 'Мурованные куриловцы'),
(21, 1, 'Немиров'),
(22, 1, 'Оратов'),
(23, 1, 'Песчанка'),
(24, 1, 'Погребище'),
(25, 1, 'Теплик'),
(26, 1, 'Томашполь'),
(27, 1, 'Тростянец'),
(28, 1, 'Тульчин'),
(29, 1, 'Тывров'),
(30, 1, 'Фрунзовка'),
(31, 1, 'Шаргород'),
(32, 1, 'Ямполь '),
(33, 2, 'Берестечко'),
(34, 2, 'Владимир-волынский'),
(35, 2, 'Голобы'),
(36, 2, 'Головно'),
(37, 2, 'Горохов'),
(38, 2, 'Заболотье'),
(39, 2, 'Иваничи'),
(40, 2, 'Камень-каширский'),
(41, 2, 'Киверцы'),
(42, 2, 'Ковель'),
(43, 2, 'Локачи'),
(44, 2, 'Луцк'),
(45, 2, 'Любешов'),
(46, 2, 'Любомль'),
(47, 2, 'Маневичи'),
(48, 2, 'Нововолынск'),
(49, 2, 'Ратно'),
(50, 2, 'Рожище'),
(51, 2, 'Старая выжевка'),
(52, 2, 'Турийск '),
(53, 3, 'Апостолово'),
(54, 3, 'Аулы'),
(55, 3, 'Брагиновка'),
(56, 3, 'Васильковка'),
(57, 3, 'Верхнеднепровск'),
(58, 3, 'Верховцево'),
(59, 3, 'Вольногорск'),
(60, 3, 'Гвардейское'),
(61, 3, 'Губиниха'),
(62, 3, 'Демурино'),
(63, 3, 'Днепродзержинск'),
(64, 3, 'Днепропетровск'),
(65, 3, 'Желтые воды'),
(66, 3, 'Зеленодольск'),
(67, 3, 'Ингулец'),
(68, 3, 'Калинино'),
(69, 3, 'Карнауховка'),
(70, 3, 'Кривой рог'),
(71, 3, 'Кринички'),
(72, 3, 'Магдалиновка'),
(73, 3, 'Марганец'),
(74, 3, 'Межевая'),
(75, 3, 'Никополь'),
(76, 3, 'Новомосковск'),
(77, 3, 'Орджоникидзе'),
(78, 3, 'Павлоград'),
(79, 3, 'Першотравенск'),
(80, 3, 'Петропавловка'),
(81, 3, 'Покровское'),
(82, 3, 'Пятихатки'),
(83, 3, 'Синельниково'),
(84, 3, 'Софиевка'),
(85, 3, 'Томаковка'),
(86, 3, 'Царичанка'),
(87, 3, 'Широкое '),
(88, 4, 'Авдеевка'),
(89, 4, 'Александровка'),
(90, 4, 'Алексеево-дружковка'),
(91, 4, 'Амвросиевка'),
(92, 4, 'Андреевка'),
(93, 4, 'Артемово'),
(94, 4, 'Артемовск'),
(95, 4, 'Безыменное'),
(96, 4, 'Беленькое'),
(97, 4, 'Белицкое'),
(98, 4, 'Благодатное'),
(99, 4, 'Былбасовка'),
(100, 4, 'Великая новоселка'),
(101, 4, 'Волноваха'),
(102, 4, 'Володарское'),
(103, 4, 'Гольмовский'),
(104, 4, 'Горбачево-михайловка'),
(105, 4, 'Горловка'),
(106, 4, 'Гродовка'),
(107, 4, 'Грузско-зорянское'),
(108, 4, 'Дебальцево'),
(109, 4, 'Дзержинск'),
(110, 4, 'Димитров'),
(111, 4, 'Доброполье'),
(112, 4, 'Докучаевск'),
(113, 4, 'Донецк'),
(114, 4, 'Донецкая'),
(115, 4, 'Донское'),
(116, 4, 'Дробышево'),
(117, 4, 'Дружковка'),
(118, 4, 'Енакиево'),
(119, 4, 'Жданов'),
(120, 4, 'Ждановка'),
(121, 4, 'Желанное'),
(122, 4, 'Зугрэс'),
(123, 4, 'Иловайск'),
(124, 4, 'Карло-либкнехтовск'),
(125, 4, 'Карло-марксово'),
(126, 4, 'Кировск'),
(127, 4, 'Константиновка'),
(128, 4, 'Краматорск'),
(129, 4, 'Красноармейск'),
(130, 4, 'Красный лиман'),
(131, 4, 'Макеевка'),
(132, 4, 'Мариуполь'),
(133, 4, 'Марьинка'),
(134, 4, 'Николаевка'),
(135, 4, 'Новоазовск'),
(136, 4, 'Новоэкономическое'),
(137, 4, 'Першотравневое'),
(138, 4, 'Селидово'),
(139, 4, 'Славянск'),
(140, 4, 'Снежное'),
(141, 4, 'Старобешево'),
(142, 4, 'Тельманово'),
(143, 4, 'Торез'),
(144, 4, 'Угледар'),
(145, 4, 'Фрунзовка'),
(146, 4, 'Харцызск'),
(147, 4, 'Шахтерск'),
(148, 4, 'Ясиноватая '),
(149, 5, 'Андрушевка'),
(150, 5, 'Барановка'),
(151, 5, 'Белая криница'),
(152, 5, 'Бердичев'),
(153, 5, 'Броницкая гута'),
(154, 5, 'Брусилов'),
(155, 5, 'Быковка'),
(156, 5, 'Володарск-волынский'),
(157, 5, 'Городница'),
(158, 5, 'Гришковцы'),
(159, 5, 'Дзержинск'),
(160, 5, 'Довбыш'),
(161, 5, 'Емильчино'),
(162, 5, 'Житомир'),
(163, 5, 'Иванополь'),
(164, 5, 'Каменный брод'),
(165, 5, 'Коростень'),
(166, 5, 'Коростышев'),
(167, 5, 'Лугины'),
(168, 5, 'Любар'),
(169, 5, 'Малин'),
(170, 5, 'Новоград-волынский'),
(171, 5, 'Овруч'),
(172, 5, 'Олевск'),
(173, 5, 'Попельня'),
(174, 5, 'Радомышль'),
(175, 5, 'Ружин'),
(176, 6, 'Берегово'),
(177, 6, 'Буштына'),
(178, 6, 'Великий березный'),
(179, 6, 'Великий бычков'),
(180, 6, 'Виноградов'),
(181, 6, 'Воловец'),
(182, 6, 'Иршава'),
(183, 6, 'Межгорье'),
(184, 6, 'Мукачево'),
(185, 6, 'Перечин'),
(186, 6, 'Рахов'),
(187, 6, 'Свалява'),
(188, 6, 'Тячев'),
(189, 6, 'Ужгород'),
(190, 7, 'Акимовка'),
(191, 7, 'Андреевка'),
(192, 7, 'Балабино'),
(193, 7, 'Бердянск'),
(194, 7, 'Васильевка'),
(195, 7, 'Веселое'),
(196, 7, 'Вольнянск'),
(197, 7, 'Гуляйполе'),
(198, 7, 'Днепрорудный'),
(199, 7, 'Запорожье'),
(200, 7, 'Каменка-днепровская'),
(201, 7, 'Куйбышево'),
(202, 7, 'Мелитополь'),
(203, 7, 'Михайловка'),
(204, 7, 'Новониколаевка'),
(205, 7, 'Орехов'),
(206, 7, 'Пологи'),
(207, 7, 'Приазовское'),
(208, 7, 'Приморск'),
(209, 7, 'Токмак'),
(210, 7, 'Энергодар '),
(211, 8, 'Богородчаны'),
(212, 8, 'Болехов'),
(213, 8, 'Брошнев-осада'),
(214, 8, 'Букачевцы'),
(215, 8, 'Бурштын'),
(216, 8, 'Бытков'),
(217, 8, 'Верховина'),
(218, 8, 'Войнилов'),
(219, 8, 'Ворохта'),
(220, 8, 'Выгода'),
(221, 8, 'Галич'),
(222, 8, 'Гвоздец'),
(223, 8, 'Городенка'),
(224, 8, 'Делятин'),
(225, 8, 'Долина'),
(226, 8, 'Заболотов'),
(227, 8, 'Ивано-франковск'),
(228, 8, 'Калуж'),
(229, 8, 'Калуш'),
(230, 8, 'Коломыя'),
(231, 8, 'Косов'),
(232, 8, 'Надворна'),
(233, 8, 'Надворная'),
(234, 8, 'Рогатин'),
(235, 8, 'Рожнятов'),
(236, 8, 'Снятын'),
(237, 8, 'Станиславов'),
(238, 8, 'Тлумач'),
(239, 8, 'Тысменица'),
(240, 8, 'Яремча '),
(241, 9, 'Барышевка'),
(242, 9, 'Белая церковь'),
(243, 9, 'Березань'),
(244, 9, 'Богуслав'),
(245, 9, 'Борисполь'),
(246, 9, 'Боровая'),
(247, 9, 'Бородянка'),
(248, 9, 'Боярка'),
(249, 9, 'Бровары'),
(250, 9, 'Васильков'),
(251, 9, 'Володарка'),
(252, 9, 'Ворзель'),
(253, 9, 'Вышгород'),
(254, 9, 'Гребенки'),
(255, 9, 'Дымер'),
(256, 9, 'Згуровка'),
(257, 9, 'Иванков'),
(258, 9, 'Ирпень'),
(259, 9, 'Кагарлык'),
(260, 9, 'Калиновка'),
(261, 9, 'Киев'),
(262, 9, 'Киевская'),
(263, 9, 'Кодра'),
(264, 9, 'Козин'),
(265, 9, 'Макаров'),
(266, 9, 'Мироновка'),
(267, 9, 'Обухов'),
(268, 9, 'Переяслав-хмельницкий'),
(269, 9, 'Ракитное'),
(270, 9, 'Сквира'),
(271, 9, 'Славутич'),
(272, 9, 'Ставище'),
(273, 9, 'Тараща'),
(274, 9, 'Тетиев'),
(275, 9, 'Фастов'),
(276, 9, 'Яготин '),
(277, 10, 'Александрия'),
(278, 10, 'Александровка'),
(279, 10, 'Бобринец'),
(280, 10, 'Гайворон'),
(281, 10, 'Голованевск'),
(282, 10, 'Добровеличковка'),
(283, 10, 'Долинская'),
(284, 10, 'Елизаветградка'),
(285, 10, 'Завалье'),
(286, 10, 'Знаменка'),
(287, 10, 'Знаменка-вторая'),
(288, 10, 'Капитановка'),
(289, 10, 'Кировоград'),
(290, 10, 'Компанеевка'),
(291, 10, 'Малая виска'),
(292, 10, 'Новгородка'),
(293, 10, 'Новоархангельск'),
(294, 10, 'Новомиргород'),
(295, 10, 'Новоукраинка'),
(296, 10, 'Ольшанка'),
(297, 10, 'Онуфриевка'),
(298, 10, 'Петрово'),
(299, 10, 'Светловодск'),
(300, 10, 'Ульяновка'),
(301, 10, 'Устиновка '),
(302, 11, 'Азовское'),
(303, 11, 'Алупка'),
(304, 11, 'Алушта'),
(305, 11, 'Армянск'),
(306, 11, 'Багерово'),
(307, 11, 'Балаклава'),
(308, 11, 'Бахчисарай'),
(309, 11, 'Белогорск'),
(310, 11, 'Гаспра'),
(311, 11, 'Гвардейское'),
(312, 11, 'Гурзуф'),
(313, 11, 'Джанкой'),
(314, 11, 'Евпатория'),
(315, 11, 'Зуя'),
(316, 11, 'Керчь'),
(317, 11, 'Кировское'),
(318, 11, 'Коктебель'),
(319, 11, 'Красногвардейское'),
(320, 11, 'Красноперекопск'),
(321, 11, 'Ленино'),
(322, 11, 'Массандра'),
(323, 11, 'Нижнегорский'),
(324, 11, 'Первомайское'),
(325, 11, 'Раздольное'),
(326, 11, 'Саки'),
(327, 11, 'Севастополь'),
(328, 11, 'Симеиз'),
(329, 11, 'Симферополь'),
(330, 11, 'Советский'),
(331, 11, 'Судак'),
(332, 11, 'Феодосия'),
(333, 11, 'Форос'),
(334, 11, 'Щёлкино'),
(335, 11, 'Ялта'),
(336, 12, 'Алексадровск'),
(337, 12, 'Алчевск'),
(338, 12, 'Антрацит'),
(339, 12, 'Артемовск'),
(340, 12, 'Байрачки'),
(341, 12, 'Беловодск'),
(342, 12, 'Белое'),
(343, 12, 'Белокуракино'),
(344, 12, 'Белолуцк'),
(345, 12, 'Бирюково'),
(346, 12, 'Боково-платово'),
(347, 12, 'Боровское'),
(348, 12, 'Брянка'),
(349, 12, 'Бугаевка'),
(350, 12, 'Вахрушево'),
(351, 12, 'Великий лог'),
(352, 12, 'Вергулевка'),
(353, 12, 'Волчеяровка'),
(354, 12, 'Ворошиловград'),
(355, 12, 'Врубовка'),
(356, 12, 'Георгиевка'),
(357, 12, 'Горское'),
(358, 12, 'Зимогорье'),
(359, 12, 'Золотое'),
(360, 12, 'Зоринск'),
(361, 12, 'Изварино'),
(362, 12, 'Калиново'),
(363, 12, 'Камышеваха'),
(364, 12, 'Кировск'),
(365, 12, 'Коммунарск'),
(366, 12, 'Краснодон'),
(367, 12, 'Красный луч'),
(368, 12, 'Кременная'),
(369, 12, 'Лисичанск'),
(370, 12, 'Луганск'),
(371, 12, 'Лутугино'),
(372, 12, 'Марковка'),
(373, 12, 'Меловое'),
(374, 12, 'Новоайдар'),
(375, 12, 'Новопсков'),
(376, 12, 'Первомайск'),
(377, 12, 'Перевальск'),
(378, 12, 'Попасная'),
(379, 12, 'Ровеньки'),
(380, 12, 'Рубежное'),
(381, 12, 'Сватово'),
(382, 12, 'Свердловск'),
(383, 12, 'Северодонецк'),
(384, 12, 'Славяносербск'),
(385, 12, 'Станично-луганское'),
(386, 12, 'Старобельск'),
(387, 12, 'Стаханов'),
(388, 12, 'Счастье'),
(389, 12, 'Троицкое '),
(390, 13, 'Белз'),
(391, 13, 'Бобрка'),
(392, 13, 'Борислав'),
(393, 13, 'Броды'),
(394, 13, 'Буск'),
(395, 13, 'Великие мосты'),
(396, 13, 'Верхнее синевидное'),
(397, 13, 'Винники'),
(398, 13, 'Глиняны'),
(399, 13, 'Горняк'),
(400, 13, 'Дашава'),
(401, 13, 'Добротвор'),
(402, 13, 'Дрогобыч'),
(403, 13, 'Жидачов'),
(404, 13, 'Жовква'),
(405, 13, 'Золочев'),
(406, 13, 'Ивано-франково'),
(407, 13, 'Каменка-бугская'),
(408, 13, 'Красне'),
(409, 13, 'Львов'),
(410, 13, 'Моршин'),
(411, 13, 'Мостиска'),
(412, 13, 'Нестеров'),
(413, 13, 'Николаев'),
(414, 13, 'Новый роздил'),
(415, 13, 'Перемышляны'),
(416, 13, 'Пустомыты'),
(417, 13, 'Рава русская'),
(418, 13, 'Радехов'),
(419, 13, 'Самбор'),
(420, 13, 'Сколе'),
(421, 13, 'Сокаль'),
(422, 13, 'Старый самбор'),
(423, 13, 'Стрый'),
(424, 13, 'Трускавец'),
(425, 13, 'Турка'),
(426, 13, 'Яворов '),
(427, 14, 'Арбузинка'),
(428, 14, 'Баштанка'),
(429, 14, 'Березнеговатое'),
(430, 14, 'Братское'),
(431, 14, 'Веселиново'),
(432, 14, 'Вознесенск'),
(433, 14, 'Доманевка'),
(434, 14, 'Еланец'),
(435, 14, 'Казанка'),
(436, 14, 'Коблево'),
(437, 14, 'Кривое озеро'),
(438, 14, 'Николаев'),
(439, 14, 'Новая одесса'),
(440, 14, 'Новый буг'),
(441, 14, 'Очаков'),
(442, 14, 'Первомайск'),
(443, 14, 'Снигиревка'),
(444, 14, 'Южноукраинск'),
(445, 15, 'Аккерман'),
(446, 15, 'Ананьев'),
(447, 15, 'Арциз'),
(448, 15, 'Балта'),
(449, 15, 'Белгород-днестровский'),
(450, 15, 'Беляевка'),
(451, 15, 'Березино'),
(452, 15, 'Березовка'),
(453, 15, 'Болград'),
(454, 15, 'Великая михайловка'),
(455, 15, 'Великодолининское'),
(456, 15, 'Вилково'),
(457, 15, 'Затишье'),
(458, 15, 'Измаил'),
(459, 15, 'Ильичевск'),
(460, 15, 'Килия'),
(461, 15, 'Кодыма'),
(462, 15, 'Коминтерновское'),
(463, 15, 'Котовск'),
(464, 15, 'Красные окны'),
(465, 15, 'Любашевка'),
(466, 15, 'Николаевка'),
(467, 15, 'Овидиополь'),
(468, 15, 'Одесса'),
(469, 15, 'Раздельная'),
(470, 15, 'Рени'),
(471, 15, 'Саврань'),
(472, 15, 'Сарата'),
(473, 15, 'Тарутино'),
(474, 15, 'Татарбунары'),
(475, 15, 'Теплодар'),
(476, 15, 'Фрунзовка'),
(477, 15, 'Ширяево'),
(478, 15, 'Южный '),
(479, 16, 'Белики'),
(480, 16, 'Великая багачка'),
(481, 16, 'Гадяч'),
(482, 16, 'Глобино'),
(483, 16, 'Гоголево'),
(484, 16, 'Градижск'),
(485, 16, 'Гребенка'),
(486, 16, 'Диканька'),
(487, 16, 'Зеньков'),
(488, 16, 'Карловка'),
(489, 16, 'Кобеляки'),
(490, 16, 'Козельщина'),
(491, 16, 'Комсомольск'),
(492, 16, 'Котельва'),
(493, 16, 'Кременчуг'),
(494, 16, 'Лохвица'),
(495, 16, 'Лубны'),
(496, 16, 'Миргород'),
(497, 16, 'Новые санжары'),
(498, 16, 'Оржица'),
(499, 16, 'Пирянтин'),
(500, 16, 'Пирятин'),
(501, 16, 'Полтава'),
(502, 16, 'Решетиловка'),
(503, 16, 'Семеновка'),
(504, 16, 'Фрунзовка'),
(505, 16, 'Шишаки '),
(506, 17, 'Владимирец'),
(507, 17, 'Гоща'),
(508, 17, 'Демидовка'),
(509, 17, 'Дубно'),
(510, 17, 'Дубровица'),
(511, 17, 'Заречное'),
(512, 17, 'Здолбунов'),
(513, 17, 'Клевань'),
(514, 17, 'Клесов'),
(515, 17, 'Корец'),
(516, 17, 'Костополь'),
(517, 17, 'Кузнецовск'),
(518, 17, 'Млинов'),
(519, 17, 'Острог'),
(520, 17, 'Радивилов'),
(521, 17, 'Ровно'),
(522, 17, 'Сарны '),
(523, 18, 'Ахтырка'),
(524, 18, 'Белополье'),
(525, 18, 'Бурынь'),
(526, 18, 'Великая писаревка'),
(527, 18, 'Ворожба'),
(528, 18, 'Воронеж'),
(529, 18, 'Глухов'),
(530, 18, 'Дружба'),
(531, 18, 'Знобь-новгородское'),
(532, 18, 'Конотоп'),
(533, 18, 'Краснополье'),
(534, 18, 'Кровелец'),
(535, 18, 'Лебедин'),
(536, 18, 'Липовая долина'),
(537, 18, 'Недригайлов'),
(538, 18, 'Путивль'),
(539, 18, 'Ромны'),
(540, 18, 'Середина-буда'),
(541, 18, 'Сумы'),
(542, 18, 'Тростянец'),
(543, 18, 'Шостка'),
(544, 18, 'Шурупинское'),
(545, 18, 'Ямполь '),
(546, 19, 'Бережаны'),
(547, 19, 'Борщев'),
(548, 19, 'Бучач'),
(549, 19, 'Великие борки'),
(550, 19, 'Вишневец'),
(551, 19, 'Гримайлов'),
(552, 19, 'Гусятин'),
(553, 19, 'Залещики'),
(554, 19, 'Заложцы'),
(555, 19, 'Збараж'),
(556, 19, 'Зборов'),
(557, 19, 'Козлов'),
(558, 19, 'Козова'),
(559, 19, 'Кременец'),
(560, 19, 'Лановцы'),
(561, 19, 'Монастыриска'),
(562, 19, 'Подволочиск'),
(563, 19, 'Теребовля'),
(564, 19, 'Тернополь'),
(565, 19, 'Шумское '),
(566, 20, 'Балаклея'),
(567, 20, 'Барвенково'),
(568, 20, 'Близнюки'),
(569, 20, 'Богодухов'),
(570, 20, 'Борки'),
(571, 20, 'Боровая'),
(572, 20, 'Буды'),
(573, 20, 'Валки'),
(574, 20, 'Великий бурлук'),
(575, 20, 'Волчанск'),
(576, 20, 'Готвальд'),
(577, 20, 'Гуты'),
(578, 20, 'Дергачи'),
(579, 20, 'Зачепиловка'),
(580, 20, 'Зидьки'),
(581, 20, 'Золочев'),
(582, 20, 'Изюм'),
(583, 20, 'Казачья лопань'),
(584, 20, 'Кегичевка'),
(585, 20, 'Красноград'),
(586, 20, 'Краснокутск'),
(587, 20, 'Купянск'),
(588, 20, 'Лозовая'),
(589, 20, 'Люботин'),
(590, 20, 'Мерефа'),
(591, 20, 'Новая водолага'),
(592, 20, 'Первомайский'),
(593, 20, 'Песочин'),
(594, 20, 'Сахновщина'),
(595, 20, 'Фрунзовка'),
(596, 20, 'Харьков'),
(597, 20, 'Шевченково '),
(598, 21, 'Аскания-нова'),
(599, 21, 'Белозерка'),
(600, 21, 'Берислав'),
(601, 21, 'Великая александровка'),
(602, 21, 'Великая лепетиха'),
(603, 21, 'Верхний рогачик'),
(604, 21, 'Высокополье'),
(605, 21, 'Геническ'),
(606, 21, 'Голая пристань'),
(607, 21, 'Горностаевка'),
(608, 21, 'Днепряны'),
(609, 21, 'Каланчак'),
(610, 21, 'Калининское'),
(611, 21, 'Каховка'),
(612, 21, 'Нижние серогозы'),
(613, 21, 'Новая каховка'),
(614, 21, 'Нововоронцовка'),
(615, 21, 'Новотроицкое'),
(616, 21, 'Скадовск'),
(617, 21, 'Фрунзовка'),
(618, 21, 'Херсон'),
(619, 21, 'Цюрупинск'),
(620, 22, 'Антонины'),
(621, 22, 'Базалия'),
(622, 22, 'Белогорье'),
(623, 22, 'Виньковцы'),
(624, 22, 'Волочиск'),
(625, 22, 'Городок'),
(626, 22, 'Грицев'),
(627, 22, 'Деражня'),
(628, 22, 'Дунаевцы'),
(629, 22, 'Изяслав'),
(630, 22, 'Каменец-подольский'),
(631, 22, 'Красилов'),
(632, 22, 'Летичев'),
(633, 22, 'Нетешин'),
(634, 22, 'Новая ушица'),
(635, 22, 'Полонное'),
(636, 22, 'Славута'),
(637, 22, 'Старая синява'),
(638, 22, 'Староконстантинов'),
(639, 22, 'Теофиполь'),
(640, 22, 'Фрунзовка'),
(641, 22, 'Хмельницкий'),
(642, 22, 'Шепетовка'),
(643, 22, 'Ярмолинцы '),
(644, 23, 'Ватутино'),
(645, 23, 'Городище'),
(646, 23, 'Драбов'),
(647, 23, 'Ерки'),
(648, 23, 'Жашков'),
(649, 23, 'Зараевск'),
(650, 23, 'Звенигородка'),
(651, 23, 'Золотоноша'),
(652, 23, 'Каменка'),
(653, 23, 'Канев'),
(654, 23, 'Катеринополь'),
(655, 23, 'Корсунь-шевченковский'),
(656, 23, 'Лысянка'),
(657, 23, 'Маньковка'),
(658, 23, 'Монастырище'),
(659, 23, 'Смела'),
(660, 23, 'Тальное'),
(661, 23, 'Умань'),
(662, 23, 'Черкассы'),
(663, 23, 'Шпола '),
(664, 24, 'Батурин'),
(665, 24, 'Бахмач'),
(666, 24, 'Бобровица'),
(667, 24, 'Борзна'),
(668, 24, 'Варва'),
(669, 24, 'Городня'),
(670, 24, 'Добрянка'),
(671, 24, 'Ичня'),
(672, 24, 'Козелец'),
(673, 24, 'Короп'),
(674, 24, 'Корюковка'),
(675, 24, 'Куликовка'),
(676, 24, 'Мена'),
(677, 24, 'Нежин'),
(678, 24, 'Новгород северский'),
(679, 24, 'Носовка'),
(680, 24, 'Прилуки'),
(681, 24, 'Припять'),
(682, 24, 'Репки'),
(683, 24, 'Семеновка'),
(684, 24, 'Сосница'),
(685, 24, 'Талалаевка'),
(686, 24, 'Чернигов'),
(687, 24, 'Щорс '),
(688, 25, 'Берегомет'),
(689, 25, 'Вашковцы'),
(690, 25, 'Вижница'),
(691, 25, 'Герца'),
(692, 25, 'Глыбокая'),
(693, 25, 'Заставна'),
(694, 25, 'Кельменцы'),
(695, 25, 'Кицмань'),
(696, 25, 'Новоселица'),
(697, 25, 'Путила'),
(698, 25, 'Сокиряны'),
(699, 25, 'Сторожинец'),
(700, 25, 'Фрунзовка'),
(701, 25, 'Черновцы');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerClass` varchar(63) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `user` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(500) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `ownerClass`, `ownerId`, `status`, `user`, `email`, `dateAdded`, `text`, `isActive`, `position`) VALUES
(16, 'News', 198, 1, 'egweg', '', '2013-12-18 14:56:38', 'wegw', 1, 0),
(15, 'News', 198, 1, 'aqaq', '', '2013-12-18 14:55:27', 'wgweg', 1, 0),
(14, 'News', 198, 1, 'admin', '', '2013-12-16 16:31:58', 'fs', 1, 0),
(18, '', 0, 0, 'ss', '', '2014-06-15 21:33:05', 'ssssssss', 0, 0),
(19, '', 0, 0, 'ss', '', '2014-06-15 21:33:08', 'sssssss', 0, 0),
(20, '', 0, 0, 'sssss', '', '2014-06-15 21:33:11', 'ssssssss', 0, 0),
(21, '', 0, 0, 'sssss', '', '2014-06-15 21:33:15', 'ssssssss', 0, 0),
(22, '', 0, 0, 'ssss', '', '2014-06-15 21:33:18', 'ssssssss', 0, 0),
(23, '', 0, 0, 'ssss', '', '2014-06-15 21:33:21', 'sssss', 0, 0),
(24, '', 0, 0, 'sssss', '', '2014-06-15 21:33:27', 'ssssss', 0, 0),
(25, '', 0, 0, 'ssss', '', '2014-06-15 21:33:30', 'sssssss', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_county`
--

CREATE TABLE IF NOT EXISTS `tbl_county` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_county`
--

INSERT INTO `tbl_county` (`id`, `title`) VALUES
(1, 'Винницкая'),
(2, 'Волынская'),
(3, 'Днепропетровская'),
(4, 'Донецкая'),
(5, 'Житомирская'),
(6, 'Закарпатская'),
(7, 'Запорожская'),
(8, 'Ивано-Франковская'),
(9, 'Киевская'),
(10, 'Кировоградская'),
(11, 'АР Крым'),
(12, 'Луганская'),
(13, 'Львовская'),
(14, 'Николаевская'),
(15, 'Одесская'),
(16, 'Полтавская'),
(17, 'Ровенская'),
(18, 'Сумская'),
(19, 'Тернопольская'),
(20, 'Харьковская'),
(21, 'Херсонская'),
(22, 'Хмельницкая'),
(23, 'Черкасская'),
(24, 'Черниговская'),
(25, 'Черновицкая');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fav_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_fav_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) NOT NULL,
  `alias` varchar(127) NOT NULL,
  `stdField` varchar(32) NOT NULL,
  `fields` varchar(127) NOT NULL,
  `position` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_fav_menu`
--

INSERT INTO `tbl_fav_menu` (`id`, `title`, `alias`, `stdField`, `fields`, `position`, `isActive`) VALUES
(1, 'Новости', 'fav/news', 'news', '', 1, 1),
(2, 'Фотогалерея', 'fav/photos', 'photos', '', 2, 1),
(3, 'Статьи', 'fav/articles', 'articles', '', 3, 1),
(4, 'Видеогалерея', 'fav/videos', 'videos', '', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE IF NOT EXISTS `tbl_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`id`, `title`, `alias`, `group`, `isActive`, `position`) VALUES
(2, 'Страницы', 'page', NULL, 1, 3),
(12, 'Менеджер Меню', 'manager', NULL, 1, 1),
(14, 'Пользователи', 'users', '', 1, 13),
(15, 'Комментарии', 'comments', '', 1, 14),
(16, 'Категории', 'category', '', 1, 15),
(19, 'Фотогалерея', 'photo', '', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `url`, `position`, `isVisible`) VALUES
(19, 'Новости', '/news', 2, 1),
(21, 'Статьи', '/articles', 3, 1),
(24, 'Фотогалерея', '/photo', 4, 1),
(25, 'Главная', '/', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateAdded` timestamp NULL DEFAULT NULL,
  `dateUpdated` timestamp NULL DEFAULT NULL,
  `metaTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metaDesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metaKeywords` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownerId` int(11) DEFAULT '0',
  `ownerClass` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annotation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `alias`, `view`, `dateAdded`, `dateUpdated`, `metaTitle`, `metaDesc`, `metaKeywords`, `ownerId`, `ownerClass`, `annotation`, `text`, `isActive`) VALUES
(1, 'asd', 'asd', NULL, '2014-06-26 22:28:44', NULL, NULL, '', NULL, 0, NULL, '', '<span class="redactor_placeholder" data-redactor="verified" contenteditable="false">Контент</span>', 1),
(3, 'as', 'qqqqq', NULL, '2014-06-26 22:28:51', NULL, NULL, '', NULL, 0, NULL, '', '<span class="redactor_placeholder" data-redactor="verified" contenteditable="false">Контент</span>', 1),
(4, 'тестовая', 'test-page', NULL, '2014-06-26 22:28:55', NULL, NULL, '', NULL, 0, NULL, '', '<p><span class="redactor_placeholder" data-redactor="verified" contenteditable="false">Контент</span></p>', 1),
(5, 'test33', 'aaaaaa', NULL, '2014-06-16 00:13:28', '2014-06-16 00:13:28', NULL, NULL, NULL, 1, NULL, NULL, '', 1),
(8, 'тест', 'тест', NULL, NULL, NULL, NULL, '', NULL, 5, NULL, '', '<p>тест</p>', 1),
(9, 'ттттттт', 'тттттттттт', NULL, NULL, NULL, NULL, 'тттттттттт', NULL, 8, NULL, 'ттттттт', '<p>тттттттт</p>', 1),
(12, 'aa', 'aaaaaaa', NULL, NULL, NULL, NULL, 'aaaaa', NULL, 8, NULL, '', '<p>a</p>', 1),
(19, 'ge', 'ge', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>fdfn</p>', 1),
(20, 'reh', 'hre', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>reh</p>', 1),
(21, 'reh', 'erh', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>reh</p>', 1),
(22, 'hreh', 'hrer', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>her</p>', 1),
(23, 'reh', 'rhe', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>e</p>', 1),
(27, 'qrq', 'dfhdfh', NULL, NULL, NULL, NULL, '', NULL, 8, NULL, '', '<p>dfh</p>', 1),
(28, 'asfg', 'gqqgnb', NULL, NULL, NULL, NULL, '', NULL, 3, NULL, '', '<p>f</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id`, `title`, `catId`, `src`, `thumb`, `text`, `isActive`) VALUES
(4, 'фыв', 8, '', '', '', 1),
(5, 'йуцйм', 8, 'files/photos/52b86f021ae92.png', 'files/photos/thumbs/52b86f021af1f.png', '', 1),
(6, 'циуиуц', 7, 'files/photos/52b86f09b522c.png', 'files/photos/thumbs/52b86f09b52df.png', '', 1),
(17, 'кекте', 8, 'files/photos/52b86fb6b2e49.png', 'files/photos/thumbs/52b86fb6b2ed8.png', '', 1),
(18, 'фвфы', 8, 'files/photos/52b86fbd34a39.png', 'files/photos/thumbs/52b86fbd34ac2.png', '', 1),
(19, 'как оно работает?', 7, 'files/photos/531b342f0d24b.JPG', 'files/photos/thumbs/531b342f0d2a4.JPG', 'О_о', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate_news`
--

CREATE TABLE IF NOT EXISTS `tbl_rate_news` (
  `newsId` int(11) NOT NULL,
  `positive` int(11) NOT NULL,
  `negative` int(11) NOT NULL,
  UNIQUE KEY `newsId` (`newsId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rate_news`
--

INSERT INTO `tbl_rate_news` (`newsId`, `positive`, `negative`) VALUES
(197, 5, 2),
(198, 5, 3),
(203, 10, 1),
(202, 11, 8),
(200, 7, 3),
(199, 11, 5),
(201, 10, 21),
(52, 2, 3),
(206, 3, 1),
(75, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resources`
--

CREATE TABLE IF NOT EXISTS `tbl_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) NOT NULL,
  `ownerClass` varchar(31) NOT NULL,
  `source` varchar(500) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_resources`
--

INSERT INTO `tbl_resources` (`id`, `ownerId`, `ownerClass`, `source`, `dateAdded`, `dateUpdated`, `isActive`) VALUES
(16, 30, '3', 'files/autoboard/thumbs/52d92c1a3a23f.jpg', '2014-01-17 15:11:54', '0000-00-00 00:00:00', 1),
(15, 29, '3', 'files/autoboard/thumbs/52d92b1771ffe.png', '2014-01-17 15:07:35', '0000-00-00 00:00:00', 1),
(14, 28, '3', 'NULL', '2014-01-17 14:47:00', '0000-00-00 00:00:00', 1),
(13, 27, '3', 'files/autoboard/thumbs/52d821647de29.png', '2014-01-16 20:13:56', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resource_classes`
--

CREATE TABLE IF NOT EXISTS `tbl_resource_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_resource_classes`
--

INSERT INTO `tbl_resource_classes` (`id`, `title`) VALUES
(3, 'Autoboard');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `group`, `alias`, `title`, `value`) VALUES
(1, 'slider', 'slider-height', 'Высота слайдера', '275'),
(2, 'slider', 'slider-background', 'Фон', 'test bg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE IF NOT EXISTS `tbl_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ownerId` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_submenu`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(5) NOT NULL,
  `firstName` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middleName` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `login`, `email`, `password`, `role`, `firstName`, `lastName`, `middleName`, `countryId`, `cityId`, `address`, `zip`, `dateAdded`, `dateUpdated`) VALUES
(1, 'admin', 'test@test.com', 'adpexzg3FUZAk', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-12-10 18:51:49', '0000-00-00 00:00:00'),
(2, 'test', 'aaa@aaa.com', 'teH0wLIpW0gyQ', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-12-11 19:20:51', '0000-00-00 00:00:00'),
(18, 'slavke', 'slavutych@list.ru', '12IbR.gJ8wcpc', 3, 'v', 'k', NULL, NULL, NULL, NULL, NULL, '2014-03-17 17:52:47', '0000-00-00 00:00:00'),
(19, 'Slavutych', 'asdas@asda2.com', '$1$i72.Do5.$qgi5UVHtFU3zOku7PAuQq.', 3, 'slavik', 'konovalenko', NULL, NULL, NULL, NULL, NULL, '2014-03-18 01:31:56', '2014-03-22 21:29:32'),
(20, 'slavik1', 'slavke@mail.ru', '77XJfY1ekq/8k', 3, 'slavik', 'ko', NULL, NULL, NULL, NULL, NULL, '2014-03-19 03:27:09', '0000-00-00 00:00:00'),
(21, 'slavke2', 'slavke@mail.ru', '74FzVyRCSZfhM', 3, 'slavik', 'ko', NULL, NULL, NULL, NULL, NULL, '2014-03-22 21:34:08', '2014-03-22 21:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_fav`
--

CREATE TABLE IF NOT EXISTS `tbl_user_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerClass` varchar(64) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user_fav`
--

INSERT INTO `tbl_user_fav` (`id`, `ownerClass`, `userId`, `itemId`, `dateAdded`) VALUES
(1, 'News', 20, 213, '2014-03-19 02:29:43'),
(3, 'News', 19, 200, '2014-03-20 16:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_status`
--

CREATE TABLE IF NOT EXISTS `tbl_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user_status`
--

