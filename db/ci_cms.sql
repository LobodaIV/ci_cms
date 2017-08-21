-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 19 2017 г., 16:58
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ci_cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `tag`, `pubdate`, `body`, `created`, `modified`) VALUES
(2, 'Drinking a few times a week \'reduces diabetes risk\'', 'diabets', '2016-12-01', '<p class=\"story-body__introduction\">People who drink three to four times a week are less likely to develop type 2 diabetes than those who never drink, Danish researchers suggest.</p>\r\n<p>Wine appears to be particularly beneficial, probably as it plays a role in helping to manage blood sugar, the study, published in&nbsp;<a class=\"story-body__link-external\" href=\"http://www.diabetologia-journal.org/\">Diabetologia,</a>&nbsp;says.</p>\r\n<p>They surveyed more than 70,000 people on their alcohol intake - how much and how often they drank.</p>\r\n<p>But experts said this wasn\'t a \"green light\" to drink more than recommended.</p>\r\n<p>And Public Health England warned that consuming alcohol contributed to a vast number of other serious diseases, including some cancers, heart and liver disease.</p>\r\n<p>\"People should keep this in mind when thinking about how much they drink,\" a spokeswoman said.</p>', '2017-07-30 15:30:55', '2017-07-31 12:06:20'),
(4, 'Antibody helps keep man\'s HIV at bay for 10 months', 'antibody', '2017-07-30', '<p><span style=\"font-family: georgia, palatino, serif; font-size: 12pt;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce egestas nec lorem id tempor. Suspendisse a odio tincidunt, aliquet mi et, tempor ipsum. Suspendisse potenti. Nam lacinia, velit sed aliquam dictum, sem massa placerat sapien, ac sodales ligula lacus vel nulla. Ut tristique leo quis ligula tempus mollis. Duis a arcu tortor. Sed eget justo euismod, congue orci sit amet, feugiat magna. Cras in nulla eleifend, dictum ante ac, rutrum magna. Nullam molestie sollicitudin elit, nec maximus neque eleifend eu. Fusce mollis odio eget blandit tincidunt. Fusce quam arcu, mattis at nisl ut, venenatis gravida neque. Sed fringilla justo lorem, vel lacinia eros feugiat id. Vestibulum convallis, eros eu vehicula placerat, turpis mi euismod mauris, ut malesuada nisl ligula et tortor.</span></p>', '2017-07-30 15:35:27', '2017-07-31 12:03:19'),
(5, 'Has the Charlie Gard case changed everything?', 'charlie-gard', '2017-08-22', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce egestas nec lorem id tempor. Suspendisse a odio tincidunt, aliquet mi et, tempor ipsum. Suspendisse potenti. Nam lacinia, velit sed aliquam dictum, sem massa placerat sapien, ac sodales ligula lacus vel nulla. Ut tristique leo quis ligula tempus mollis. Duis a arcu tortor. Sed eget justo euismod, congue orci sit amet, feugiat magna. Cras in nulla eleifend, dictum ante ac, rutrum magna. Nullam molestie sollicitudin elit, nec maximus neque eleifend eu. Fusce mollis odio eget blandit tincidunt. Fusce quam arcu, mattis at nisl ut, venenatis gravida neque. Sed fringilla justo lorem, vel lacinia eros feugiat id. Vestibulum convallis, eros eu vehicula placerat, turpis mi euismod mauris, ut malesuada nisl ligula et tortor.</span></p>', '2017-07-30 15:38:33', '2017-07-31 12:02:53'),
(6, 'Should you finish a course of antibiotics?', 'antibiotics', '2017-05-08', '<p class=\"story-body__introduction\">It is time to reconsider the widespread advice that people should always complete an entire course of antibiotics, experts in the BMJ say.</p>\r\n<p>They argue there is not enough evidence to back the idea that stopping pills early encourages antibiotic resistance.</p>\r\n<p>Instead, they suggest, more studies need to be done to see if stopping once feeling better can help cut antibiotic use.</p>\r\n<p>But GPs urge people not to change their behaviour in the face of one study.</p>\r\n<p>Prof Helen Stokes-Lampard, leader of the Royal College of General Practitioners, said an improvement in symptoms did not necessarily mean the infection had been completely eradicated.</p>\r\n<p>\"It\'s important that patients have clear messages, and the mantra to always take the full course of antibiotics is well known - changing this will simply confuse people.\"</p>', '2017-07-31 15:05:53', '2017-07-31 12:05:53'),
(7, 'Count drop \'could make humans extinct\'', 'extinct', '2017-07-31', '<p class=\"story-body__introduction\">Humans could become extinct if sperm counts in men continue to fall at current rates, a doctor has warned.</p>\r\n<p>Researchers assessing the results of nearly 200 studies say sperm counts among men from North America, Europe, Australia, and New Zealand, seem to have halved in less than 40 years.</p>\r\n<p>Some experts are sceptical of the&nbsp;<a class=\"story-body__link-external\" href=\"https://academic.oup.com/DocumentLibrary/humupd/PR/dmx022_final.pdf\">Human Reproduction Update</a>&nbsp;findings.</p>\r\n<p>But lead researcher Dr Hagai Levine said he was \"very worried\" about what might happen in the future.</p>\r\n<p>The assessment, one of the largest ever undertaken, brings together the results of 185 studies between 1973 and 2011.</p>\r\n<p>Dr Levine, an epidemiologist, told the BBC that if the trend continued humans would become extinct.</p>', '2017-07-31 15:07:20', '2017-07-31 12:07:20'),
(8, 'Drugs cocktail \'cut HIV deaths by 27%\'', 'drugs-coctails', '2017-07-31', '<p class=\"story-body__introduction\">More than 10,000 lives a year could be saved with a simple change to HIV medication, doctors say.</p>\r\n<p>HIV is often diagnosed late, when it has already ravaged the immune system, leaving people vulnerable.</p>\r\n<p>To counter this, researchers tried prescribing a cocktail of drugs at the start of HIV therapy to treat \"opportunistic\" infections.</p>\r\n<p><a class=\"story-body__link-external\" href=\"http://www.nejm.org/doi/full/10.1056/NEJMoa1615822\">The results, published in the New England Journal of Medicine</a>, showed deaths fell by 27%.</p>\r\n<p>HIV itself does not kill. Instead, it leaves the body exposed to dangerous bacterial infections such as tuberculosis or pneumonia as well as fungi that can cause cryptococcal meningitis.</p>\r\n<p>But starting antiretroviral therapy poses risks too. The drugs restore the immune system, but if it suddenly realises there is an infection, then it can launch such a strong attack - in the brain, for example - that this can occasionally be deadly too.</p>\r\n<p>So, the trial gave patients with a CD count - used to measure the health of the immune system - below 100 a mix of drugs, including antibiotics, alongside standard antiretroviral medication for HIV.</p>\r\n<p>Patients with a CD count below 50 are six times more likely to die within 24 weeks than those with a count above 100.</p>', '2017-07-31 15:08:09', '2017-07-31 12:08:09'),
(9, 'Japanese woman dies from tick disease after cat bite', 'disease', '2017-07-31', '<p class=\"story-body__introduction\">A Japanese woman died last year of a tick-borne disease after being bitten by a stray cat, Japan\'s health ministry says, in what could be the first such mammal-to-human transmission.</p>\r\n<p>The unnamed woman in her 50s had been helping the apparently sick cat.</p>\r\n<p>Ten days later she died of Severe Fever with Thrombocytopenia Syndrome (SFTS), which is carried by ticks.</p>\r\n<p>With no tick bite detected, doctors assume the illness could have been contracted via the cat.</p>\r\n<p>\"No reports on animal-to-human transmission cases have been made so far,\" a Japanese health ministry official told the AFP news agency.</p>\r\n<p>\"It\'s still not confirmed the virus came from the cat, but it\'s possible that it is the first case,\" the official added.</p>\r\n<p>SFTS is a relatively new infectious disease emerging in China, Korea and Japan.</p>', '2017-07-31 15:08:59', '2017-07-31 12:08:59'),
(10, 'South African child \'virtually cured\' of HIV', 'african-child', '2017-07-31', '<p class=\"story-body__introduction\">A nine-year-old infected with HIV at birth has spent most of their life without needing any treatment, say doctors in South Africa.</p>\r\n<p>The child, whose identity is being protected, was given a burst of treatment shortly after birth.</p>\r\n<p>They have since been off drugs for eight-and-a-half years without symptoms or signs of active virus.</p>\r\n<p>The family is said to be \"really delighted\".</p>\r\n<p>Most people need treatment every day to prevent HIV destroying the immune system and causing Aids.</p>\r\n<p>Understanding how the child is protected could lead to new drugs or a vaccine for stopping HIV.</p>\r\n<p>The child caught the infection from their mother around the time of birth in 2007. They had very high levels of HIV in the blood.</p>\r\n<p>Early antiretroviral therapy was not standard practice at the time, but was given to the child from nine weeks old as part of a clinical trial.</p>\r\n<p>Levels of the virus became undetectable, treatment was stopped after 40 weeks and unlike anybody else on the study - the virus has not returned.</p>\r\n<p>Early therapy which attacks the virus before it has a chance to fully establish itself has been implicated in child \"cure\" cases twice before.</p>', '2017-07-31 15:09:36', '2017-07-31 12:09:36'),
(11, 'I write letters to people with anorexia', 'anorexia', '2017-07-31', '<p><strong>Nineteen-year-old Nina Commons writes letters to people battling eating disorders.</strong></p>\r\n<p>She launched&nbsp;<a href=\"https://letterswithwings.com/\">Letters With Wings</a>&nbsp;with the aim of \"taking someone\'s mind off their illness for a few minutes\".</p>\r\n<p>\"I want to provide support and make them think, \'I\'m great,\'\" she tells Newsbeat.</p>\r\n<p>It is estimated that more than 1.6 million people in the UK are affected by eating disorders.</p>\r\n<p><strong>If you want help with eating disorders, take a look at these&nbsp;</strong><a href=\"http://www.bbc.co.uk/programmes/articles/5fj8NWvMMwcjLsYmzCzttvS/eating-disorders\">BBC Advice</a><strong>pages.</strong></p>\r\n<p>Nina struggled with anorexia nervosa for more than two years from the age of 16.</p>\r\n<p>She is now healthy but says she wants to help others \"know how amazing and brave they are by using words and drawings\".</p>\r\n<p>\"One of my closest friends is in intensive care from an eating disorder and I have a drawing from her in my room.</p>\r\n<p>\"I think such a creative piece to look at just speaks so many words.</p>\r\n<p>\"I want to help others like her and show they\'re not alone.</p>\r\n<p>\"I want to use what I battled through as an advantage and help those suffering\".</p>', '2017-07-31 15:10:47', '2017-07-31 12:10:47'),
(12, 'President\'s daughter sparks breastfeeding debate with photo', 'presidents-daughter', '2017-07-31', '<p class=\"story-body__introduction\">A picture of the Kyrgyz president\'s youngest daughter feeding her baby dressed in her underwear has sparked a debate about breastfeeding and sexualisation.</p>\r\n<p>Aliya Shagieva posted the photo on social media back in April with the caption: \'I will feed my child whenever and wherever he needs to be fed.\'</p>\r\n<p>She took the post down after being accused of immoral behaviour, but in an exclusive interview with the BBC she said the row was a result of a culture which hyper-sexualised the female form.</p>\r\n<p>\"This body I\'ve been given is not vulgar. It is functional, its purpose is to fulfil the physiological needs of my baby, not to be sexualised,\" she told BBC Kyrgyz.</p>', '2017-07-31 15:12:07', '2017-07-31 12:12:07');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('12d33b37a3b153d803e06b42e285d0cb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503150833, ''),
('35bcfc6ba0abdf952f2a067c572b7ad2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147444, ''),
('430a889675aa226125949ec001315f2f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147481, ''),
('4a2157f9e0a81f233d8c3b0efba45f55', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147290, ''),
('6dca4608e44a610090898da008beda76', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147410, ''),
('721385015936c785ca1a346cc6a5d4f0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147256, ''),
('7f72db834a3e5ba424245a4075cfb658', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147321, ''),
('7fab7d33196c5fab859bb6d344677a87', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147322, ''),
('86c4c89229864db0189bbfe476e42610', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147443, ''),
('89f356c28e69a3669b61fa730f68a242', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147299, ''),
('8d1b65bc71e657055bdf0bfb44e4fd1a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147284, ''),
('90970faf4633d733493e5165657e208a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147409, ''),
('9d70bc8292fb47956a00beeca6146ca1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147255, ''),
('a87d73b3320fd8d8ca4160b7f120062b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147479, ''),
('a98667aed547355f40836e861b25c0c5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147337, ''),
('ad513489110e3b6cb1ef91c5b25631ca', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147310, ''),
('c0eeaf89f83cd1155abac9fbdef974a6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147292, ''),
('c14f82c8631a5e0aae44341fca4e5a34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147446, ''),
('cd699e5d5ad14f95f4fa77790bf54eb0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147273, ''),
('d706b0d4726825f37d5f70a015bb7fe1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147478, ''),
('ddd0a42a2ec8bdb6628a3ae4edd07358', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147322, ''),
('f7080a5be76ef1a78d66d47dfdbf4781', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', 1503147300, '');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(6);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `body` text NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `template` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `tag`, `order`, `body`, `parent_id`, `template`) VALUES
(1, 'Home', 'home', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tristique eros at imperdiet ullamcorper. Aliquam placerat dignissim odio in blandit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quis nibh dictum, porta est ac, vestibulum mi. Etiam porttitor, odio nec venenatis consequat, dolor ligula hendrerit eros, vitae ornare turpis metus at ex. Nullam non felis id diam vulputate placerat. Etiam iaculis mauris leo, et consectetur ligula pellentesque id. Mauris et enim ac ante eleifend aliquam et at neque. Vestibulum at eros et urna eleifend aliquam.</p>', 0, 'home'),
(6, 'Contact', 'contact', 4, '<p>Contact page</p>', 9, 'page'),
(9, 'About', 'about', 3, '<p>About page</p>', 0, ''),
(11, 'News archive', 'news', 2, '<p>news here</p>', 0, 'news_archive');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES
(1, 'igore4ek061@gmail.com', '900f580019cd3141e90ffa47c63a463b40b55a9f62d66c370e63c48d620d4acf74f63457f47f11557ece45b8a5ef47fdaf9c8bf7f7447c5ab0a05f5008311966', 'Igor Loboda'),
(2, 'andy@gmail.com', 'bc2437b0a2d54c5d8a433ef01ede4efb0069bcd2e97edc37098ff68add1f19aa33f06d7e53bf76a4dda6ac230b8ca19ed2d50ccd96903fef0c537e62e449050a', 'Andy Bro');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
