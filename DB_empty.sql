-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: db14
-- Время создания: Сен 04 2015 г., 19:14
-- Версия сервера: 5.5.28-log
-- Версия PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



--
-- Структура таблицы `art_item`
--

CREATE TABLE IF NOT EXISTS `art_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_full` text NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `img` varchar(155) NOT NULL,
  `hit` int(1) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `art_item`
--

INSERT INTO `art_item` (`id`, `connect`, `caption`, `seolink`, `desc_full`, `desc_short`, `show`, `date`, `img`, `hit`, `p1`, `meta_t`, `meta_k`, `meta_d`, `see`, `pos`) VALUES
(1, ';3;', 'Доставка', 'dostavka', '<p>Доставка.</p>\r\n<p>При заказе на сумму свыше 5000 грн - мы доставим продукцию к Вам в офис, в пределах г.Киева.</p>\r\n<p>При заказе на сумму меньше, чем 5000 грн.:&nbsp;</p>\r\n<p>- стоимость доставки к вам в офис 150,00 грн в пределах г.Киева ( вес не должен превышать 30 кг).&nbsp;</p>\r\n<p>- самовывоз из нашего офиса/склада. Вы можете получить продукцию, приехав к нам в офис по адресу г.Киев, пр-т Воссоединения 19, оф.114&nbsp;</p>', '', 1, '2015-03-26 10:36:52', '', 0, '', 'Доставка', '', 'Доставим в любую точку Галактики', 0, 1421222123),
(2, ';3;', 'О компании', 'o-kompanii', '<div>Компания ООО &laquo;POS STORE&raquo; представитель POS Holding Group (Литва) на территории Украины. POS Holding Group имеет собственное производство - &nbsp;завод по производству POS материалов и изделий из пластмассы LITPOLSTAR (Литва). Работает с 1994 года. Современное высокотехнологическое оборудование позволяет выполнять заказы любой сложности, &nbsp;и в короткие сроки. Европейское качество продукции &nbsp;подтверждается стандартами &nbsp;ISO 9001:2008, ISO 14001:2004, OHSAS 18001.&nbsp;</div>\r\n<p><span>&nbsp;</span>Без POS материалов не может существовать ни один современный успешный магазин или другой торговый объект. Наша продукция широко используется в розничной &nbsp;торговле и актуальна для продуктовых супермаркетов, аптек, магазинов бытовой техники и электроники, строительных супермаркетов, магазинов &nbsp;одежды, товары для дома, детских магазинов, магазинов &nbsp;всех форматов, дистрибуторов, производителей, ресторанов, кафе, кондитерских, рекламных компаний и других торговых объектов.</p>\r\n<p>1. Пластиковые рамки и защитные карманы</p>\r\n<p>2. Стойки и крепления пластиковых рамок.</p>\r\n<p>3. Таблички для надписей и маркеры.</p>\r\n<p>4. Держатели ценников и рекламных вставок.</p>\r\n<p>5. Кассеты цен.</p>\r\n<p>6. Полочные ценникодержатели.</p>\r\n<p>7. Карманы с магнитом и скотчем.</p>\r\n<p>8. Крепления для воблеров, стопперов и шелфтокеров</p>\r\n<p>9. Крепления для плакатов.</p>\r\n<p>10. Подвесные системы.</p>\r\n<p>11. Полочные разделители.</p>\r\n<p>12. Информационные держатели из акрила и ПВХ.</p>\r\n<p>13. Держатели для буклетов.</p>\r\n<p>14. Покупательские корзинки.</p>\r\n<p>15. Антикражные средства.</p>\r\n<p>16. Перекидные системы.</p>\r\n<p>17. Другая продукция из пластмассы.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '', 1, '2015-03-26 10:35:56', '', 0, '', 'О компании', '', 'Компания ООО «POS STORE» представитель POS Holding Group (Литва) на территории Украины. POS Holding Group имеет собственное производство -  завод по производству POS материалов и изделий из пластмассы LITPOLSTAR (Литва). Работает с 1994 года. Современное высокотехнологическое оборудование позволяет выполнять заказы любой сложности,  и в короткие сроки. Европейское качество продукции  подтверждается стандартами  ISO 9001:2008, ISO 14001:2004, OHSAS 18001.', 0, 1421188170),
(3, ';3;', 'Контакты', 'kontakty', '<div style="font-size:14px;color:#d91219;font-weight: 900;">Нужна помощь с выбором</div>\r\n<div style="height:20px;">&nbsp;</div>\r\n<table>\r\n    <tbody>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_skype.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;"><a href="skype:artemchuk-oa?call">artemchuk-oa</a></td>\r\n        </tr>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_mail.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;"><a href="mailto:artemchukalex@gmail.com">artemchukalex@gmail.com</a></td>\r\n        </tr>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_phone1.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;">+38(044)500-16-73</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_phone.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;">+38(067)264-60-61 Александр</td>\r\n        </tr>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_phone.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;">+38(093) 864-33-18 Анастасия </td>\r\n        </tr>\r\n        <tr>\r\n            <td style="padding:5px 0px;"><img src="/design/img/ico_phone.png" alt="" /></td>\r\n            <td style="vertical-align: middle;padding-left:10px;">+38(093) 864-33-19 Татьяна</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<div style="height:30px;">&nbsp;</div>\r\n<div style="font-size:14px;color:#d91219;font-weight: 900;">Адрес и карта проезда</div>\r\n<div style="height:20px;">&nbsp;</div>\r\n<div>г.Киев, 02160<br />\r\nпросп. Воссоединения 19, оф.114</div>\r\n<div style="height:30px;">&nbsp;</div>\r\n<div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2541.3084538105136!2d30.615281813493013!3d50.43535500000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c567b2a9fbab%3A0x5b22471b06e2cf44!2z0L_RgNC-0YHQvy4g0JLQvtC30Lcn0ZTQtNC90LDQvdC90Y8sIDE5LCDQmtC40ZfQsg!5e0!3m2!1sru!2sua!4v1426511686943" width="780" height="450" frameborder="0" style="border:0"></iframe></div>', '', 1, '2015-05-05 18:49:35', '', 0, '', 'Контакты', '', '', 0, 1421221965),
(4, ';3;', 'Карта проезда', 'karta-proezda', '', '', 1, '2015-01-14 09:53:29', '', 0, '', 'Карта проезда', '', '', 0, 1421221994),
(5, ';3;', 'Оплата', 'oplata', '<p>&nbsp;&middot; Оплата 100%, при наличии продукции на складе. Отгрузка продукции - на следующий день, после получения оплаты.</p>\r\n<div>&middot; Предоплата 70%, при отсутствии продукции на складе. Финальная оплата в течение 5 календарных дней, после получения продукции.</div>\r\n<div>&middot; Форма оплаты - безналичный расчет.</div>\r\n<div>&middot;&nbsp;<span class="apple-converted-space"><span lang="RU" style="font-size:9.5pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;\r\ncolor:#222222;background:white;mso-ansi-language:RU">&nbsp;</span></span><b>Акции, скидки,&nbsp;наличие товара,&nbsp;&nbsp;стоимость</b><span class="apple-converted-space">&nbsp;уточнять по телефону <strong>+38<span class="apple-converted-space">&nbsp;(<span class="skypec2ctextspan"><span skypeaction="skype_dropdown" style="bottom: auto !important;cursor:pointer !important;background-attachment:\r\nscroll;background-position-x:0px;background-position-y:0px;clip:auto;\r\nfloat:none;list-style-position:outside;overflow:hidden;right:auto;word-spacing:\r\nnormal;z-index:0"><span style="bottom: auto !important;cursor:pointer !important;\r\nbackground-attachment:scroll;background-position-x:0px;background-position-y:\r\n0px;clip:auto;float:none;list-style-position:outside;overflow:hidden;\r\nright:auto;word-spacing:normal;z-index:0" id="non_free_num_ui">044)500-16-73</span></span></span></span></strong>&nbsp;</span>или у Вашего персонального менеджера<font color="#222222" face="Arial, sans-serif"><span style="font-size: 12.6667px; line-height: 14.5667px; background-color: rgb(255, 255, 255);">.</span></font></div>\r\n<p class="MsoNormal"><span lang="RU"><o:p></o:p></span></p>', '', 1, '2015-08-20 11:44:48', '', 0, '', 'Оплата', '', '', 0, 1421222037),
(6, ';3;', 'Условия заказа', 'usloviya-zakaza', '<p>&nbsp;Условия заказа.</p>\r\n<div>&middot;<span class="Apple-tab-span" style="white-space:pre">	</span>Оформление контракта на поставку продукции.</div>\r\n<div>&middot;<span class="Apple-tab-span" style="white-space:pre">	</span>Оплата 100%, при наличии продукции на складе. Отгрузка продукции - на следующий день, после получения оплаты.</div>\r\n<div>&middot;<span class="Apple-tab-span" style="white-space:pre">	</span>Предоплата 70%, при отсутствии продукции на складе. Финальная оплата в течение 5 календарных дней, после получения продукции.</div>\r\n<div>&middot;<span class="Apple-tab-span" style="white-space:pre">	</span>Форма оплаты - безналичное перечисление на счет POS STORE.</div>', '', 1, '2015-03-26 10:36:32', '', 0, '', 'Условия заказа', '', '', 0, 1421222009);

-- --------------------------------------------------------

--
-- Структура таблицы `art_tag`
--

CREATE TABLE IF NOT EXISTS `art_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `art_tag`
--

INSERT INTO `art_tag` (`id`, `connect`, `caption`, `seolink`, `desc_short`, `desc_full`, `img`, `show`, `hit`, `level`, `meta_t`, `meta_k`, `meta_d`, `date`, `see`, `pos`) VALUES
(1, ';5;4;', 'Новости и Статьи', 'article', '', '', '', 1, 0, 1, 'Новости', '', '', '2015-01-14 00:24:21', 0, 1421166827),
(2, ';3;', 'Страницы', 'page', '', '', '', 1, 0, 1, 'Страницы', '', '', '2015-01-13 18:45:08', 0, 1421166840),
(3, ';2;', 'Информация', 'info', '', '', '', 1, 0, 2, 'Инфо', '', '', '2015-01-13 18:41:26', 0, 1421166962),
(4, ';1;', 'Новости', 'novosti', '', '', '', 1, 0, 2, 'Новости', '', '', '2015-01-14 00:04:43', 0, 1421166980),
(5, ';1;', 'Статьи', 'stati', '', '', '', 1, 0, 2, 'Статьи', '', '', '2015-01-13 18:36:28', 0, 1421166988);

-- --------------------------------------------------------

--
-- Структура таблицы `cart_item`
--

CREATE TABLE IF NOT EXISTS `cart_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_full` text NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `img` varchar(155) NOT NULL,
  `hit` int(1) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `cart_item`
--


--
-- Структура таблицы `cart_tag`
--

CREATE TABLE IF NOT EXISTS `cart_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `cart_tag`
--

INSERT INTO `cart_tag` (`id`, `connect`, `caption`, `seolink`, `desc_short`, `desc_full`, `img`, `show`, `hit`, `level`, `meta_t`, `meta_k`, `meta_d`, `date`, `see`, `pos`) VALUES
(1, ';3;4;7;8;', 'Заказы', 'zakazy', '', '', '', 1, 0, 1, 'Заказы', '', '', '2015-03-24 19:49:00', 0, 1427219475),
(2, ';5;9;', 'Архив', 'arkhiv', '', '', '', 1, 0, 1, 'Архив', '', '', '2015-03-24 19:49:13', 0, 1427219340),
(3, ';1;', 'Новый', 'novye', '', '', '', 1, 0, 2, 'Новые', '', '', '2015-03-24 19:53:26', 0, 1427219570),
(4, ';1;', 'Обработан', 'obrabotannye', '', '', '', 1, 0, 2, 'Обработанные', '', '', '2015-03-24 19:50:38', 0, 1427219419),
(5, ';2;', 'Доставлен', 'dostavlen', '', '', '', 1, 0, 2, 'Доставлен', '', '', '2015-03-24 19:51:01', 0, 1427219461),
(7, ';1;', 'Оплачен', 'otpravlen', '', '', '', 1, 0, 2, 'Отправлен', '', '', '2015-03-25 04:05:06', 0, 1427219396),
(8, ';1;', 'Отгружен', 'otgruzhen', '', '', '', 1, 0, 2, 'Отгружен', '', '', '2015-03-25 04:05:19', 0, 1427249119),
(9, ';2;', 'Отказ', 'otkaz', '', '', '', 1, 0, 2, 'Отказ', '', '', '2015-03-25 04:05:38', 0, 1427249138);

-- --------------------------------------------------------

--
-- Структура таблицы `cfg_global`
--

CREATE TABLE IF NOT EXISTS `cfg_global` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) NOT NULL,
  `function_description` varchar(255) NOT NULL,
  `showing` enum('Y','N') NOT NULL DEFAULT 'N',
  `enable` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `cfg_global`
--

INSERT INTO `cfg_global` (`id`, `function_name`, `function_description`, `showing`, `enable`) VALUES
(1, 'multi_lang', 'Многоязычность', 'N', '0'),
(2, 'mobi', 'Мобильная версия', 'N', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `cfg_lang`
--

CREATE TABLE IF NOT EXISTS `cfg_lang` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `enable` enum('1','0') NOT NULL DEFAULT '0',
  `default` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `cfg_lang`
--

INSERT INTO `cfg_lang` (`id`, `lang`, `caption`, `enable`, `default`) VALUES
(1, 'ru', 'Русская версия', '1', '1'),
(2, 'en', 'English version', '1', '0'),
(3, 'ua', 'Українська версія', '1', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  `table` varchar(50) NOT NULL DEFAULT 'feedback',
  `date` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `why` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `your_date` varchar(255) NOT NULL,
  `your_time` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `ip` varchar(25) NOT NULL,
  `showing` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `feedback`
--



--
-- Структура таблицы `gallery_item`
--

CREATE TABLE IF NOT EXISTS `gallery_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `gallery_item`
--

--
-- Структура таблицы `gallery_tag`
--

CREATE TABLE IF NOT EXISTS `gallery_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `gallery_tag`
--



--
-- Структура таблицы `items_branch`
--

CREATE TABLE IF NOT EXISTS `items_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `seolink` varchar(200) NOT NULL,
  `showing` enum('Y','N') NOT NULL DEFAULT 'Y',
  `img` varchar(5) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `items_branch`
--



--
-- Структура таблицы `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `seolink` varchar(200) NOT NULL,
  `description` varchar(220) NOT NULL,
  `showing` enum('Y','N') NOT NULL DEFAULT 'Y',
  `date` datetime NOT NULL,
  `img` varchar(155) NOT NULL,
  `image_ext` varchar(5) NOT NULL,
  `order_show` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `items_category`
--


--
-- Структура таблицы `param_item`
--

CREATE TABLE IF NOT EXISTS `param_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_full` text NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `img` varchar(155) NOT NULL,
  `value1` varchar(100) NOT NULL,
  `value2` varchar(100) NOT NULL,
  `hit` int(1) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `param_item`


--
-- Структура таблицы `param_tag`
--

CREATE TABLE IF NOT EXISTS `param_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `param_tag`


--
-- Структура таблицы `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `word` varchar(55) NOT NULL,
  `count` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `search`
--


--
-- Структура таблицы `shop_item`
--

CREATE TABLE IF NOT EXISTS `shop_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `1Cid` varchar(255) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_full` text NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `show` int(1) NOT NULL DEFAULT '1',
  `flagman` int(1) NOT NULL,
  `good_price` tinyint(1) NOT NULL,
  `sell_out` tinyint(1) NOT NULL,
  `on_main` tinyint(1) NOT NULL,
  `price_diler` decimal(10,2) NOT NULL,
  `price_roznica` decimal(10,2) NOT NULL,
  `date` datetime DEFAULT NULL,
  `last_update` datetime NOT NULL,
  `img` varchar(155) NOT NULL,
  `article` varchar(100) NOT NULL DEFAULT '0',
  `package` varchar(50) NOT NULL DEFAULT '5',
  `order` smallint(5) unsigned NOT NULL,
  `hit` int(1) NOT NULL,
  `garantiya` int(10) unsigned NOT NULL,
  `nalichie` varchar(50) NOT NULL DEFAULT '+',
  `param_connect` varchar(255) NOT NULL DEFAULT '',
  `branch_connect` varchar(255) NOT NULL,
  `gallery_connect` varchar(255) NOT NULL,
  `companion_connect` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `p2` varchar(255) NOT NULL,
  `p3` varchar(255) NOT NULL,
  `p4` varchar(255) NOT NULL,
  `p5` varchar(255) NOT NULL,
  `p6` varchar(255) NOT NULL,
  `postavschik` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `see` int(11) NOT NULL,
  `print` enum('1','0') NOT NULL DEFAULT '1',
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `shop_item`
--



--
-- Структура таблицы `shop_setting`
--

CREATE TABLE IF NOT EXISTS `shop_setting` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `shop_setting`
--

INSERT INTO `shop_setting` (`id`, `description`, `value`) VALUES
(1, 'kurs_usd', '26'),
(2, 'min_summa_dostavki', '1500.00');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_shopping`
--

CREATE TABLE IF NOT EXISTS `shop_shopping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `pcount` int(3) DEFAULT NULL,
  `price_diler` varchar(10) NOT NULL,
  `price_roznica` varchar(50) NOT NULL,
  `ddp` int(2) NOT NULL,
  `date` datetime DEFAULT NULL,
  `zakaz` varchar(20) DEFAULT NULL,
  `zakaz_date` datetime DEFAULT NULL,
  `arhive` varchar(20) DEFAULT NULL,
  `order_number` varchar(50) NOT NULL,
  `Ymd` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `shop_tag`
--

CREATE TABLE IF NOT EXISTS `shop_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `shop_tag`
--


--
-- Структура таблицы `shop_user`
--

CREATE TABLE IF NOT EXISTS `shop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `city` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `regdate` datetime NOT NULL,
  `disabled` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `shop_user`
--


-- --------------------------------------------------------

--
-- Структура таблицы `user_action`
--

CREATE TABLE IF NOT EXISTS `user_action` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `uid` int(9) NOT NULL,
  `date` datetime NOT NULL,
  `action` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Дамп данных таблицы `user_action`
--

--
-- Структура таблицы `user_item`
--

CREATE TABLE IF NOT EXISTS `user_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(64) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `level` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL DEFAULT 'user',
  `date` datetime NOT NULL,
  `pos` int(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `ban` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `user_item`
--

INSERT INTO `user_item` (`id`, `sid`, `connect`, `level`, `name`, `surname`, `email`, `caption`, `phone`, `organization`, `address`, `job`, `date`, `pos`, `login`, `password`, `img`, `ban`) VALUES
(1, '8hhgff6quka9dntgq70df3ih57', ';3;', 9, 'Супер-Пупер Админ', '', 'you@mkr.com.ua', '', '+38 050-445-15-75', 'Мастерская комплексных решений', 'Киев, пр-кт Воссоединения 19, оф.010', 'Admin 80 lvl', '2015-01-22 23:07:28', 1418411742, 'web2net', 'c8c1a49b3e6f0906e9fe35681d75e1e4', 'web2net.jpg', 0);
-- --------------------------------------------------------

--
-- Структура таблицы `user_tag`
--

CREATE TABLE IF NOT EXISTS `user_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connect` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `seolink` varchar(255) NOT NULL,
  `desc_short` varchar(555) NOT NULL,
  `desc_full` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `show` int(1) NOT NULL,
  `hit` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `meta_t` varchar(255) NOT NULL,
  `meta_k` text NOT NULL,
  `meta_d` text NOT NULL,
  `date` datetime NOT NULL,
  `see` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `user_tag`
--

INSERT INTO `user_tag` (`id`, `connect`, `caption`, `seolink`, `desc_short`, `desc_full`, `img`, `show`, `hit`, `level`, `meta_t`, `meta_k`, `meta_d`, `date`, `see`, `pos`) VALUES
(1, ';3;4;', 'Администраторы', 'administratory', '', '', '', 1, 0, 1, 'Администраторы', '', '', '2014-12-12 21:12:25', 0, 1418411552),
(2, ';6;7;', 'Клиенты', 'klienty', '', '', '', 1, 0, 1, 'Клиенты', '', '', '2014-12-12 21:12:32', 0, 1418411545),
(3, ';1;', 'Администратор', 'administrator', '', '', '', 1, 0, 2, 'Администратор', '', '', '2014-12-12 21:13:17', 0, 1418411597),
(4, ';1;', 'Редактор', 'redaktor', '', '', '', 1, 0, 2, 'Редактор', '', '', '2014-12-12 21:13:24', 0, 1418411604),
(6, ';2;', 'VIP', 'vip', '', '', '', 1, 0, 2, 'VIP', '', '', '2014-12-14 08:30:09', 0, 1418538609),
(7, ';2;', 'Разовые', 'razovye', '', '', '', 1, 0, 2, 'Разовые', '', '', '2014-12-14 08:33:18', 0, 1418538785);
