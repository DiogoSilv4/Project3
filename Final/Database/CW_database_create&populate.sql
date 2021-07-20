-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 07, 2021 at 06:52 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CW_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `category_image` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Environment', './categoriesImages/environment.jpg'),
(2, 'Government', './categoriesImages/Government.jpg'),
(3, 'Technologies', './categoriesImages/technologies.jpg'),
(4, 'Popular Brands', './categoriesImages/popularbrands.jpg'),
(5, 'Society', './categoriesImages/society.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `commenText` text NOT NULL,
  `comment_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commenText`, `comment_date`, `user_id`, `theory_id`) VALUES
(1, 'Yes, i totally believe in this!', '2021-02-07', 1, 8),
(2, 'This seems like is very much unlikely to have happen', '2021-02-07', 1, 13),
(3, 'This is stupid!', '2021-02-07', 1, 1),
(10, 'This is fake!!! of course they went to the moon', '2021-02-07', 1, 11),
(12, 'The government is hiding this from you, do you really believe that if they wanted this to be a secret it wouldn\'t', '2021-02-07', 2, 1),
(13, 'I\'d actually consider this to be true ', '2021-02-07', 2, 2),
(14, 'Yeah... this seems really possible', '2021-02-07', 2, 3),
(15, 'I don\'t think this actually happened', '2021-02-07', 2, 4),
(16, 'yeah, seems very unlikely that aliens haven\'t contacted us so far', '2021-02-07', 2, 8),
(17, 'Yo this is crazy!! Unbelievable!!', '2021-02-07', 2, 12),
(18, 'Ok, now people are just inventing thing out of thin air', '2021-02-07', 2, 9),
(19, 'Of course global warming is true, just look at the facts', '2021-02-07', 2, 10),
(20, 'I just can\'t believe that there are more believers than non-believers in this theory', '2021-02-07', 3, 1),
(21, 'The CIA objective is to protect, there is no way that they would do illegal experiments', '2021-02-07', 3, 2),
(22, 'yeah, i think that too', '2021-02-07', 3, 3),
(23, 'However come up with this is crazy', '2021-02-07', 3, 4),
(24, 'How dare you? The government exists to protect us from this kind of stuff, not cause it', '2021-02-07', 3, 5),
(25, 'This is impossible, technology haven\'t reach this level ', '2021-02-07', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `quizAnswers`
--

CREATE TABLE `quizAnswers` (
  `quiz_id` int(11) NOT NULL,
  `quiz_answwer` tinyint(1) DEFAULT NULL,
  `quiz_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizAnswers`
--

INSERT INTO `quizAnswers` (`quiz_id`, `quiz_answwer`, `quiz_date`, `user_id`, `theory_id`) VALUES
(1, 1, '2021-02-06', 2, 6),
(2, 1, '2021-02-06', 2, 5),
(3, 1, '2021-02-06', 2, 3),
(4, 1, '2021-02-06', 2, 12),
(5, 1, '2021-02-06', 2, 10),
(6, 1, '2021-02-06', 2, 2),
(7, 1, '2021-02-06', 2, 1),
(8, 1, '2021-02-06', 2, 9),
(9, 1, '2021-02-06', 2, 7),
(10, 1, '2021-02-06', 2, 4),
(11, 1, '2021-02-06', 2, 13),
(12, 1, '2021-02-06', 2, 11),
(13, 1, '2021-02-06', 2, 8),
(14, 0, '2021-02-06', 3, 1),
(15, 0, '2021-02-06', 3, 5),
(16, 0, '2021-02-06', 3, 11),
(17, 0, '2021-02-06', 3, 8),
(18, 0, '2021-02-06', 3, 12),
(19, 0, '2021-02-06', 3, 13),
(20, 0, '2021-02-06', 3, 4),
(21, 0, '2021-02-06', 3, 3),
(22, 0, '2021-02-06', 3, 2),
(23, 0, '2021-02-06', 3, 6),
(24, 0, '2021-02-06', 3, 9),
(25, 0, '2021-02-06', 3, 10),
(26, 0, '2021-02-06', 3, 7),
(27, 1, '2021-02-06', 4, 12),
(28, 0, '2021-02-06', 4, 13),
(29, 1, '2021-02-06', 4, 7),
(30, 0, '2021-02-06', 4, 9),
(31, 1, '2021-02-06', 4, 4),
(32, 0, '2021-02-06', 4, 5),
(33, 1, '2021-02-06', 4, 8),
(34, 0, '2021-02-06', 4, 10),
(35, 1, '2021-02-06', 4, 3),
(36, 0, '2021-02-06', 4, 11),
(37, 1, '2021-02-06', 4, 6),
(38, 0, '2021-02-06', 4, 2),
(39, 1, '2021-02-06', 4, 1),
(40, 1, '2021-02-06', 5, 12),
(41, 0, '2021-02-06', 5, 3),
(42, 0, '2021-02-06', 5, 10),
(43, 1, '2021-02-06', 5, 1),
(44, 0, '2021-02-06', 5, 11),
(45, 1, '2021-02-06', 5, 7),
(46, 1, '2021-02-06', 5, 13),
(47, 0, '2021-02-06', 5, 4),
(48, 1, '2021-02-06', 5, 6),
(49, 0, '2021-02-06', 5, 8),
(50, 0, '2021-02-06', 5, 9),
(51, 1, '2021-02-06', 5, 2),
(52, 1, '2021-02-06', 5, 5),
(53, 1, '2021-02-06', 6, 9),
(54, 0, '2021-02-06', 6, 3),
(55, 1, '2021-02-06', 6, 10),
(56, 1, '2021-02-06', 6, 8),
(57, 1, '2021-02-06', 6, 1),
(58, 0, '2021-02-06', 6, 6),
(59, 1, '2021-02-06', 6, 12),
(60, 0, '2021-02-06', 6, 5),
(61, 1, '2021-02-06', 6, 2),
(62, 1, '2021-02-06', 6, 4),
(63, 0, '2021-02-06', 6, 7),
(64, 1, '2021-02-06', 6, 11),
(65, 0, '2021-02-06', 6, 13),
(66, 0, '2021-02-06', 7, 11),
(67, 1, '2021-02-06', 7, 8),
(68, 1, '2021-02-06', 7, 10),
(69, 0, '2021-02-06', 7, 13),
(70, 1, '2021-02-06', 7, 12),
(71, 1, '2021-02-06', 7, 3),
(72, 0, '2021-02-06', 7, 9),
(73, 1, '2021-02-06', 7, 5),
(74, 1, '2021-02-06', 7, 1),
(75, 0, '2021-02-06', 7, 4),
(76, 1, '2021-02-06', 7, 2),
(77, 0, '2021-02-06', 7, 7),
(78, 0, '2021-02-06', 7, 6),
(79, 1, '2021-02-06', 8, 9),
(80, 1, '2021-02-06', 8, 6),
(81, 0, '2021-02-06', 8, 11),
(82, 0, '2021-02-06', 8, 12),
(83, 1, '2021-02-06', 8, 8),
(84, 1, '2021-02-06', 8, 3),
(85, 1, '2021-02-06', 8, 10),
(86, 1, '2021-02-06', 8, 5),
(87, 0, '2021-02-06', 8, 13),
(88, 1, '2021-02-06', 8, 2),
(89, 0, '2021-02-06', 8, 4),
(90, 0, '2021-02-06', 8, 1),
(91, 0, '2021-02-06', 8, 7),
(92, 1, '2021-02-06', 9, 5),
(93, 1, '2021-02-06', 9, 12),
(94, 0, '2021-02-06', 9, 6),
(95, 0, '2021-02-06', 9, 1),
(96, 1, '2021-02-06', 9, 3),
(97, 0, '2021-02-06', 9, 4),
(98, 0, '2021-02-06', 9, 10),
(99, 1, '2021-02-06', 9, 7),
(100, 1, '2021-02-06', 9, 9),
(101, 1, '2021-02-06', 9, 13),
(102, 0, '2021-02-06', 9, 11),
(103, 1, '2021-02-06', 9, 8),
(104, 0, '2021-02-06', 9, 2),
(105, 0, '2021-02-06', 10, 5),
(106, 1, '2021-02-06', 10, 7),
(107, 1, '2021-02-06', 10, 10),
(108, 0, '2021-02-06', 10, 13),
(109, 1, '2021-02-06', 10, 1),
(110, 0, '2021-02-06', 10, 11),
(111, 0, '2021-02-06', 10, 4),
(112, 1, '2021-02-06', 10, 12),
(113, 1, '2021-02-06', 10, 3),
(114, 0, '2021-02-06', 10, 8),
(115, 1, '2021-02-06', 10, 9),
(116, 0, '2021-02-06', 10, 2),
(117, 0, '2021-02-06', 10, 6),
(118, 1, '2021-02-06', 11, 2),
(119, 0, '2021-02-06', 11, 5),
(120, 1, '2021-02-06', 11, 9),
(121, 1, '2021-02-06', 11, 7),
(122, 0, '2021-02-06', 11, 3),
(123, 0, '2021-02-06', 11, 4),
(124, 0, '2021-02-06', 11, 1),
(125, 0, '2021-02-06', 11, 13),
(126, 1, '2021-02-06', 11, 11),
(127, 1, '2021-02-06', 11, 6),
(128, 1, '2021-02-06', 11, 10),
(129, 1, '2021-02-06', 11, 8),
(130, 1, '2021-02-06', 11, 12),
(131, 1, '2021-02-07', 1, 2),
(132, 0, '2021-02-07', 1, 7),
(133, 0, '2021-02-07', 1, 1),
(134, 0, '2021-02-07', 1, 4),
(135, 0, '2021-02-07', 1, 12),
(136, 0, '2021-02-07', 1, 11),
(137, 0, '2021-02-07', 1, 5),
(138, 1, '2021-02-07', 1, 9),
(139, 1, '2021-02-07', 1, 13),
(140, 1, '2021-02-07', 1, 10),
(141, 1, '2021-02-07', 1, 3),
(142, 1, '2021-02-07', 1, 8),
(143, 0, '2021-02-07', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `theory`
--

CREATE TABLE `theory` (
  `theory_id` int(11) NOT NULL,
  `theory_name` varchar(60) NOT NULL,
  `theory_statement` text NOT NULL,
  `theory_explanation` text,
  `theory_date` date DEFAULT NULL,
  `showcaseImage` varchar(60) DEFAULT NULL,
  `theory_image` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theory`
--

INSERT INTO `theory` (`theory_id`, `theory_name`, `theory_statement`, `theory_explanation`, `theory_date`, `showcaseImage`, `theory_image`) VALUES
(1, 'Flat Earth Theory', 'The Earth is flat and not actually a sphere', 'The flat Earth model is an archaic conception of Earths shape as a plane or disk. Many ancient cultures subscribed to a flat Earth cosmography, including Greece until the classical period (323 BC), the Bronze Age and Iron Age civilizations of the Near East until the Hellenistic period (31 BC), India until the Gupta period (early centuries AD), and China until the 17th century.\nThe Flat Earth theory contains several supporting experiments, observations, and sub- theories that refute common arguments for a round earth. One of the most famous pieces of evidence supporting the Flat Earth theory is the Bedford Level experiment. English writer and inventor Samuel Birley Rowbotham conducted a series of experiments in which he observed a sailboat traveling down a six-mile length of the Old Bedford River to measure the earth’s curvature. Rowbotham believed that after the sailboat had traveled six miles from him, he would no longer be able to see the boat because of the curvature of the earth. When Rowbotham was able to see the sailboat after it had traveled well over six miles, he claimed that the earth must be flat. Other observations like Rowbotham’s such as our inability to see the earth’s curvature and to feel the earth’s rotation have led people to believe the earth is not round.\nExplaining the evidence supporting a round earth model to a Flat Earther is no simple task. One of the most common questions Flat Earthers hear is “Why haven’t we fallen off the edge?” Flat Earthers believe that Antarctica forms an ice wall around the edge of the Earth that keeps the water in and keeps us from falling off. Another common piece of evidence used to refute the Flat Earth theory is gravity. Masses as large as the earth and other planets are round due to the fact that their gravitational fields pull their mass to the center of gravity. This argument does not work on Flat Earthers either because they simply do not believe in gravity. Instead of objects falling toward the earth’s core, they believe that the flat earth actually accelerates upward at a speed of 9.8 meters per second. In regards to the seasons, Flat Earthers will tell you that the sun travels in a circular path above the earth to create a day and night cycle and the seasons change as the sun nears and moves away from the Earth. It appears that Flat Earthers have an argument prepared for every scientific fact you throw at them.', '0000-00-00', './showcase_images/flat_earth_theory.jpg', './Images_theories/flatearthTHEORY.jpg'),
(2, 'MK Ultra', 'The CIA was testing Mind Control on human subjects with LSD in the 1950’s', 'Project MKUltra (or MK-Ultra), also called the CIA mind control program, is the code name given to a program of experiments on human subjects that were designed and undertaken by the U.S. Central Intelligence Agency, some of which were illegal. \nExperiments on humans were intended to identify and develop drugs and procedures to be used in interrogations in order to weaken the individual and force confessions through mind control. The project was organized through the Office of Scientific Intelligence of the CIA and coordinated with the United States Army Biological Warfare Laboratories. Other code names for drug-related experiments were Project Bluebird and Project Artichoke.\nThe operation was officially sanctioned in 1953, reduced in scope in 1964 and further curtailed in 1967. It was officially halted in 1973. The program also engaged in illegal activities, including the use of U.S. and Canadian citizens as its unwitting test subjects, which led to controversy regarding its legitimacy MKUltra used numerous methods to manipulate its subjects mental states and brain functions. Techniques included the covert administration of high doses of psychoactive drugs (especially LSD) and other chemicals, electroshocks, hypnosis, sensory deprivation, isolation, verbal and sexual abuse, as well as other forms of torture. The scope of Project MKUltra was broad, with research undertaken at more than 80 institutions, including colleges and universities, hospitals, prisons, and pharmaceutical companies. The CIA operated using front organizations, although sometimes top officials at these institutions were aware of the CIAs involvement. Project MKUltra was first brought to public attention in 1975 by the Church Committee of the United States Congress and Gerald Fords United States Presidents Commission on CIA activities within the United States (also known as the Rockefeller Commission). Investigative efforts were hampered by CIA Director Richard Helmss order that all MKUltra files be destroyed in 1973; the Church Committee and Rockefeller Commission investigations relied on the sworn testimony of direct participants and on the relatively small number of documents that survived Helmss destruction order. In 1977, a Freedom of Information Act request uncovered a cache of 20,000 documents relating to project MKUltra which led to Senate hearings later that year. Some surviving information regarding MKUltra was declassified in July 2001. In December 2018, declassified documents included a letter to an unidentified doctor discussing work on six dogs made to run, turn and stop via remote control and brain implants', '1950-01-01', './showcase_images/mk-ultra.jpg', './Images_theories/mkultraTHEORY.jpg'),
(3, 'New Coke', 'Coca cola intentionally changed the formula, so when costumers were upset and they changed back the original formula was not the same', 'The company intentionally changed the formula, hoping consumers would be upset with the company, and demand the original formula to return, which in turn would cause sales to spike. Keough answered this speculation by saying \"We are not that dumb, and we are not that smart.\"\nThe putative switch was planned all along to cover the change from sugar-sweetened Coke to much less expensive high-fructose corn syrup (HFCS), a theory that was supposedly given credence by the apparently different taste of Coke Classic when it first hit the market (the U.S. sugar trade association took out a full-page ad lambasting Coke for using HFCS in all bottling of the old formula when it was reintroduced). In fact, Coca-Cola began allowing bottlers to remove up to half of the products cane sugar as early as 1980, five years before the introduction of New Coke. By the time the new formula was introduced, most bottlers had already sweetened Coca-Cola entirely with HFCS.\nIt provided cover for the final removal of all coca derivatives from the product to placate the Drug Enforcement Administration, which was trying to eradicate the plant worldwide to combat an increase in cocaine trafficking and consumption. While Cokes executives were indeed relieved the new formula contained no coca and concerned about the long-term future of the Peruvian government-owned coca fields that supplied it in the face of increasing DEA pressure to end cultivation of the crop, according to author Mark Pendergrast there was no direct pressure from the DEA on Coca-Cola to do so. This theory was endorsed in a Time article, as well as by historian Bartow Elmore, who claims the reformulation was made in response to the escalating War on Drugs by the Reagan Administration.', '1915-01-01', './showcase_images/new_coke.jpg', './Images_theories/cokeTHEORY.jpg'),
(4, 'Clintons', 'The Clinton family have assassinated fifty or more of their associates', 'Clinton Body Count is a debunked conspiracy theory asserting that former U.S. President Bill Clinton and his wife Hillary Clinton have assassinated fifty or more of their associates. \nMany parts of it have been advanced by Newsmax publisher Christopher Ruddy, Congresswoman Marjorie Taylor Greene, and others. Such accusations have been around at least since the 1990s, when a film called The Clinton Chronicles, produced by Larry Nichols and promoted by Rev. Jerry Falwell, accused Bill Clinton of multiple crimes including murder. This conspiracy theory has been debunked by the Lakeland Ledger, the Chicago Tribune, Snopes and others, who point to detailed death records, the unusually large circle of associates that a president is likely to have, and the facts that many of the people listed had been misidentified, or were still alive. Others had no known link to the Clintons.', '1915-01-01', './showcase_images/clintons.jpg', './Images_theories/clintonsTHEORY.jpg'),
(5, '9/11', '9/11 was a controlled demolition and not a terrorist attack', 'There are many conspiracy theories that attribute the planning and execution of the September 11 attacks against the United States to parties other than, or in addition to, al-Qaeda, including that there was advance knowledge of the attacks among high-level government officials. Government investigations and independent reviews have rejected these theories. Proponents of these theories assert that there are inconsistencies in the commonly accepted version, or that there exists evidence that was ignored, concealed, or overlooked.\nThe most prominent conspiracy theory is that the collapse of the Twin Towers and 7 World Trade Center were the result of controlled demolitions rather than structural failure due to impact and fire. Another prominent belief is that the Pentagon was hit by a missile launched by elements from inside the U.S. government or that a commercial airliner was allowed to do so via an effective stand-down of the American military. Possible motives claimed by conspiracy theorists for such actions include justifying the invasions of Afghanistan and Iraq (even though the U.S. government\nconcluded Iraq was not involved in the attacks) to advance their geostrategic interests, such as plans to construct a natural gas pipeline through Afghanistan.Other conspiracy theories revolve around authorities having advance knowledge of the attacks and deliberately ignoring or assisting the attackers.\nThe National Institute of Standards and Technology (NIST) and the technology magazine Popular Mechanics have investigated and rejected the claims made by 9/11 conspiracy theorists. The 9/11 Commission and most of the civil engineering community accept that the impacts of jet aircraft at high speeds in combination with subsequent fires, not controlled demolition, led to the collapse of the Twin Towers, but some conspiracy theory groups, including Architects & Engineers for 9/11 Truth, disagree with the arguments made by NIST and Popular Mechanics.', '2001-09-11', './showcase_images/911THEORYLIST.jpg', './Images_theories/911THEORY.jpg'),
(6, 'Phantom Time Hypothesis', 'There are 297 years missing from our history, so we’re not in 2021', 'The phantom time hypothesis is a historical conspiracy theory asserted by Heribert Illig. First published in 1991, it hypothesizes a conspiracy by the Holy Roman Emperor Otto III, Pope Sylvester II, and possibly the Byzantine Emperor Constantine VII, to fabricate the Anno Domini dating system retrospectively, in order to place them at the special year of AD 1000, and to rewrite history to legitimize Ottos claim to the Holy Roman Empire. Illig believed that this was achieved through the alteration, misrepresentation and forgery of documentary and physical evidence. According to this scenario, the entire Carolingian period, including the figure of Charlemagne, is a fabrication, with a \"phantom time\" of 297 years (AD 614–911) added to the Early Middle Ages.\nThe hypothesis has never attracted any support from historians.\nThe bases of Illigs hypothesis include: The scarcity of archaeological evidence that can be reliably dated to the period AD 614–911, the perceived inadequacies of radiometric and dendrochronological methods of dating this period, and the over-reliance of medieval historians on written sources. The presence of Romanesque architecture in tenth-century Western Europe, suggesting the Roman era was not as long ago as conventionally thought. The relation between the Julian calendar, Gregorian calendar and the underlying astronomical solar or tropical year. The Julian calendar, introduced by Julius Caesar, was long known to introduce a discrepancy from the tropical year of\naround one day for each century that the calendar was in use. By the time the Gregorian calendar was introduced in AD 1582, Illig alleges that the old Julian calendar should have produced a discrepancy of thirteen days between it and the real (or tropical) calendar. Instead, the astronomers and mathematicians working for Pope Gregory XIII had found that the civil calendar needed to be adjusted by only ten days. (The Julian calendar day Thursday, 4 October 1582 was followed by the first day of the Gregorian calendar, Friday, 15 October 1582). From this, Illig concludes that the AD era had counted roughly three centuries which never existed.', '1991-01-01', './showcase_images/phantomtimeTHEORYLIST.jpg', './Images_theories/phantomtimeTHEORY.jpg'),
(7, 'New World Order', 'There is a secret emergin totalitarian world government plotting to eventually control the world', 'The New World Order (NWO) is a conspiracy theory which hypothesizes a secretly emerging totalitarian world government.\nThe common theme in conspiracy theories about a New World Order is that a secretive power elite with a globalist agenda is conspiring to eventually rule the world through an authoritarian world government—which will replace sovereign nation- states—and an all-encompassing propaganda whose ideology hails the establishment of the New World Order as the culmination of history progress. Many influential historical and contemporary figures have therefore been alleged to be part of a cabal that operates through many front organizations to orchestrate significant political and financial events, ranging from causing systemic crises to pushing through controversial policies, at both national and international levels, as steps in an ongoing plot to achieve world domination.\nBefore the early 1990s, New World Order conspiracism was limited to two American countercultures, primarily the militantly anti-government right and secondarily that part of fundamentalist Christianity concerned with the end-time emergence of the Antichrist. Skeptics, such as Michael Barkun and Chip Berlet, observed that right-wing populist conspiracy theories about a New World Order had not only been embraced by many seekers of stigmatized knowledge but had seeped into popular culture, thereby inaugurating a period during the late 20th and early 21st centuries in the United States where people are actively preparing for apocalyptic millenarian scenarios. Those political scientists are concerned that mass hysteria over New World Order conspiracy theories could eventually have devastating effects on American political life, ranging from escalating lone-wolf terrorism to the rise to power of authoritarian ultranationalist demagogues.', '2000-01-01', './showcase_images/newworldorderTHEORYLIST.jpg', './Images_theories/newworldorderTHEORY.jpg'),
(8, 'UFO', 'We are not the only intelligent species in the universe and atleast one of the others has visited us', 'Among the foremost concerns of conspiracy theorists are questions of alien life; for example, allegations of government cover-ups of the supposed Roswell UFO incident or activity at Area 51. Also disseminated are theories concerning so-called \"men in black\", who allegedly silence witnesses.\nMultiple reports of dead cattle found with absent body parts and seemingly drained of blood have emerged worldwide since at least the 1960s. This phenomenon has spawned theories variously concerning aliens and secret government or military experiments. Prominent among such theorists is Linda Moulton Howe, author of Alien Harvest (1989).\nMany conspiracy theories have drawn inspiration from the writings of ancient astronaut proponent Zecharia Sitchin, who declared that the Anunnaki from Sumerian mythology were actually a race of extraterrestrial beings who came to Earth around 500,000 years ago in order to mine gold. In his 1994 book Humanity\"s Extraterrestrial Origins: ET Influences on Humankind\"s Biological and Cultural Evolution, Arthur Horn proposed that the Anunnaki were a race of blood-drinking, shape-shifting alien reptiles. This theory was adapted and elaborated on by British conspiracy theorist David Icke, who maintains that the Bush family, Margaret Thatcher, Bob Hope, and the British Royal Family, among others, are or were such creatures, or have been under their control. Ickes critics have suggested that \"reptilians\" may be seen as an antisemitic code word; a charge he has denied.', '1989-01-01', './showcase_images/ufoTHEORYLIST.jpg', './Images_theories/ufoTHEORY.jpg'),
(9, 'Chemtrails', 'Aircraft trails leave chemical agents in the sky with some sort of unknown goal', 'The chemtrail conspiracy theory posits the erroneous belief that long-lasting condensation trails are \"chemtrails\" consisting of chemical or biological agents left in the sky by high-flying aircraft, sprayed for nefarious purposes undisclosed to the\ngeneral public. Believers in this conspiracy theory say that while normal contrails dissipate relatively quickly, contrails that linger must contain additional substances. Those who subscribe to the theory speculate that the purpose of the chemical release may be solar radiation management, weather modification, psychological manipulation, human population control, biological or chemical warfare, or testing of biological or chemical agents on a population, and that the trails are causing respiratory illnesses and other health problems.\nThe claim has been dismissed by the scientific community. There is no evidence that purported chemtrails differ from normal water-based contrails routinely left by high- flying aircraft under certain atmospheric conditions. Although proponents have tried to prove that chemical spraying occurs, their analyses have been flawed or based on misconceptions. Because of the persistence of the conspiracy theory and questions about government involvement, scientists and government agencies around the world have repeatedly explained that the supposed chemtrails are in fact normal contrails.\nThe term chemtrail is a portmanteau of the words chemical and trail, just as contrail is a portmanteau of condensation and trail.', '2000-01-01', './showcase_images/chemtrailsTHEORYLIST.jpg', './Images_theories/chemtrailsTHEORY.jpg'),
(10, 'Global Warming', 'The Earth is getting warmer due to human activity', 'Political conspiracy theories against global warming\nAiming at global governance: In a speech given to the US Senate Committee on the Environment and Public Works on July 28, 2003, entitled \"The Science of Climate Change\", Senator James Inhofe (Republican, for Oklahoma) concluded by asking the\nfollowing question: \"With all of the hysteria, all of the fear, all of the phony science, could it be that man-made global warming is the greatest hoax ever perpetrated on the American people?\" He further stated, \"some parts of the IPCC process resembled a Soviet-style trial, in which the facts are predetermined, and ideological purity trumps technical and scientific rigor.\" Inhofe has suggested that supporters of the Kyoto Protocol such as Jacques Chirac are aiming at global governance. William M. Gray said in 2006 that global warming became a political cause because of the lack of any other enemy following the end of the Cold War. He went on to say that its purpose was to exercise political influence, to try to introduce world government, and to control people, adding, \"I have a demonic view on this.\" The TV documentary The Great Global Warming Swindle was made by Martin Durkin, who called global warming \"a multi- billion-dollar worldwide industry, created by fanatically anti-industrial environmentalists.\" In the Washington Times in 2007 he said that his film would change history, and predicted that \"in five years the idea that the greenhouse effect is the main reason behind global warming will be seen as total bunk.\"\nLiberal extremists: There are theories claiming that \"climate change is a hoax perpetrated by leftist radicals to undermine local sovereignty\", or \"climate science is less about science and more about socialist ideology\". In 2017, James Inhofe told the 12th International Conference on Climate Change \"The liberal extremists are not going to give up. Obama has built a culture of radical alarmists, and they’ll be back. You and I and the American people have won a great victory, but the war goes on. Stay vigilant.\"\nChina is behind it: In 2010, Donald Trump claimed that \"With the coldest winter ever recorded, with snow setting record levels up and down the coast, the Nobel committee should take the Nobel Prize back from Al Gore....Gore wants us to clean up our factories and plants in order to protect us from global warming, when China and other countries couldn’t care less. It would make us totally noncompetitive in the manufacturing world, and China, Japan and India are laughing at America’s stupidity.\" Then in 2012, he tweeted that \"The concept of global warming was created by and for the Chinese in order to make U.S. manufacturing non-competitive.\" Later in 2016 during his presidential campaign he suggested that his 2012 tweet was a joke saying that \"Obviously, I joke. But this is done for the benefit of China, because China does not do anything to help climate change. They burn everything you could burn; they couldn’t care less. They have very—you know, their standards are nothing. But they— in the meantime, they can undercut us on price. So it’s very hard on our business.\"\nTo promote nuclear power: One of the claims made in The Great Global Warming Swindle is that the \"threat of global warming is an attempt to promote nuclear power\".\nConspiracy theories in favor of global warming. In 2006, the documentary Who Killed the Electric Car? and later others claimed that Chevron prohibits the advanced battery technologies (such as large-format NiMH batteries) to be used in electric vehicles (attempting to hide the technology was also claimed). The main evidence behind this theory is the patent infringement lawsuits against auto companies. GM acquired 60% of Ovonicss battery development, then shut it down and later sold it to the oil company Texaco which was later acquired by Chevron. Multiple patent infringement lawsuits were filed by Chevron against auto or battery companies such as Toyota and Panasonic. This claim is more about the financial benefits of oil companies over monopoly of fuel industry but its indirectly related to its effect on global warming.\nIn 2016, J. Marvin Herndon published an article in the journal Frontiers in Public Health which was later retracted by the journal due to not meeting the standards of the journal. The paper claims that there is widespread governmental effort around the world to do geoengineering and weather modification that can possibly result in global warming among other things. This article contributes to Chemtrail conspiracy theory which was believed by nearly 17% of people in 2011 according to an international survey.\nIn 2017, J. Marvin Herndon claimed that an oily-ashy substance, that was accidently released by an aircraft in 2016 and fell on seven residences and vehicles in Michigan (USA), resembles cryoconite holes observed on melting glaciers indicating a deliberate effort to hasten global warming.', '2003-07-28', './showcase_images/globalwarmingTHEORYLIST.jpg', './Images_theories/globalwarmingTHEORY.jpg'),
(11, 'Moon Landing', 'The moon landings from 1969 to 1972 never actually happened', 'Moon landing conspiracy theories claim that some or all elements of the Apollo program and the associated Moon landings were hoaxes staged by NASA, possibly with\nthe aid of other organizations. The most notable claim is that the six crewed landings (1969–1972) were faked and that twelve Apollo astronauts did not actually walk on the Moon. Various groups and individuals have made claims since the mid-1970s that NASA and others knowingly misled the public into believing the landings happened, by manufacturing, tampering with, or destroying evidence including photos, telemetry tapes, radio and TV transmissions, and Moon rock samples.\nMuch third-party evidence for the landings exists, and detailed rebuttals to the hoax claims have been made. Since the late 2000s, high-definition photos taken by the Lunar Reconnaissance Orbiter (LRO) of the Apollo landing sites have captured the lander modules and the tracks left by the astronauts. In 2012, images were released showing five of the six Apollo missions American flags erected on the Moon still standing; the exception is that of Apollo 11, which has lain on the lunar surface since being accidentally blown over by the takeoff rockets exhaust.\nConspiracists have managed to sustain public interest in their theories for more than 40 years, despite the rebuttals and third-party evidence. Opinion polls taken in various locations have shown that between 6% and 20% of Americans, 25% of Britons, and 28% of Russians surveyed believe that the crewed landings were faked. Even as late as 2001, the Fox television network documentary Conspiracy Theory: Did We Land on the Moon? claimed NASA faked the first landing in 1969 to win the Space Race.', '1969-01-01', './showcase_images/moonTHEORYLIST.jpg', './Images_theories/moonTHEORY.jpg'),
(12, 'Psychotronic torture', 'government agents make use of electromagnetic radiation, radar, and surveillance techniques to transmit sounds and thoughts into peoples heads, affect peoples bodies, and harass people.', 'Mind control conspiracy advocates believe they have found references to secret weapons in government programs such as \"Project Pandora,\" a DARPA research effort into biological and behavioral effects of microwave radiation commissioned after the Moscow Signal incident, when the U.S. embassy in Moscow was bombarded with microwaves by the Soviets beginning in 1953. It was discovered that the Soviets intent\nwas eavesdropping and electronic jamming rather than mind control. Project Pandora studied the effects of occupational radiation exposure, and the project s scientific review committee concluded that microwave radiation could not be used for mind control. Conspiracy advocates also frequently cite the 2002 Air Force Research Laboratory patent for using microwaves to send spoken words into someone s head. Although there is no evidence that mind control using microwaves exists, rumors of continued classified research fuel the worries of people who believe they are being targeted.\nIn 1987, a U.S. National Academy of Sciences report commissioned by the Army Research Institute noted psychotronics as one of the \"colorful examples\" of claims of psychic warfare that first surfaced in anecdotal descriptions, newspapers, and books during the 1980s. The report cited alleged psychotronic weapons such as a \"hyperspatial nuclear howitzer and beliefs that Russian psychotronic weapons were responsible for Legionnaires disease and the sinking of the USS Thresher among claims that -range from incredible to the outrageously incredible.- The committee observed that although reports and stories as well as imagined potential uses for such weapons by military decision makers exist, -nothing approaching scientific literature supports the claims of psychotronic weaponry.-\nPsychotronic weapons were reportedly being studied by the Russian Federation during the 1990s with military analyst Lieutenant Colonel Timothy L. Thomas saying in 1998 that there was a strong belief in Russia that weapons for attacking the mind of a soldier were a possibility, although no working devices were reported. In Russia, a group called -Victims of Psychotronic Experimentation- attempted to recover damages from the Federal Security Service during the mid-1990s for alleged infringement of their civil liberties including -beaming rays- at them, putting chemicals in the water, and using magnets to alter their minds. These fears may have been inspired by revelations of secret research into -psychotronic- psychological warfare techniques during the early 1990s, with Vladimir Lopatkin, a State Duma committee member in 1995, surmising -something that was secret for so many years is the perfect breeding ground for conspiracy theories.\"', '1990-01-01', './showcase_images/psychotronicTHEORYLIST.jpg', './Images_theories/psychotronicTHEORY.jpg'),
(13, 'Philadelphia Experiment', 'The U.S managed to make a ship invisible in 1943', 'The Philadelphia Experiment is an alleged military experiment supposed to have been carried out by the U.S. Navy at the Philadelphia Naval Shipyard in Philadelphia, Pennsylvania, United States, sometime around October 28, 1943. The U.S. Navy\ndestroyer escort USS Eldridge was claimed to have been rendered invisible (or \"cloaked\") to enemy devices.\nThe story first appeared in 1955, in letters of unknown origin sent to UFO writer Morris K. Jessup. It is widely understood to be a hoax; the U.S. Navy maintains that no such experiment was ever conducted, that the details of the story contradict well- established facts about USS Eldridge, and that the alleged claims do not conform to known physical laws.', '2000-01-01', './showcase_images/philadelphiaTHEORYLIST.jpg', './Images_theories/philadelphiaTHEORY.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theory__categories`
--

CREATE TABLE `theory__categories` (
  `theory_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theory__categories`
--

INSERT INTO `theory__categories` (`theory_id`, `category_id`) VALUES
(2, 2),
(4, 2),
(5, 2),
(6, 5),
(7, 5),
(8, 5),
(1, 1),
(10, 1),
(9, 1),
(3, 4),
(11, 3),
(12, 3),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `theory__user`
--

CREATE TABLE `theory__user` (
  `favorite_theory` tinyint(1) DEFAULT NULL,
  `theory_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theory__user`
--

INSERT INTO `theory__user` (`favorite_theory`, `theory_id`, `user_id`) VALUES
(1, 2, 1),
(1, 3, 1),
(0, 4, 1),
(0, 6, 1),
(0, 7, 1),
(1, 1, 1),
(1, 13, 1),
(0, 8, 1),
(0, 11, 1),
(1, 10, 1),
(0, 5, 1),
(0, 1, 2),
(0, 2, 2),
(0, 3, 2),
(0, 4, 2),
(0, 7, 2),
(0, 8, 2),
(0, 12, 2),
(0, 9, 2),
(0, 10, 2),
(0, 1, 3),
(0, 2, 3),
(0, 3, 3),
(0, 4, 3),
(0, 5, 3),
(0, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_password` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `email`, `user_password`) VALUES
(1, 'admin', 'admin@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'user1', 'user1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'user2', 'user2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'user3', 'user3@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'user4', 'user4@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'user5', 'user5@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'user6', 'user6@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(8, 'user7', 'user7@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'user8', 'user8@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(10, 'user9', 'user9@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(11, 'user10', 'user10@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `UserFK_` (`user_id`),
  ADD KEY `TheoryFK_` (`theory_id`);

--
-- Indexes for table `quizAnswers`
--
ALTER TABLE `quizAnswers`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `UserFK` (`user_id`),
  ADD KEY `TheoryFK` (`theory_id`);

--
-- Indexes for table `theory`
--
ALTER TABLE `theory`
  ADD PRIMARY KEY (`theory_id`);

--
-- Indexes for table `theory__categories`
--
ALTER TABLE `theory__categories`
  ADD KEY `TheoriesFK` (`theory_id`),
  ADD KEY `CategoryFK` (`category_id`);

--
-- Indexes for table `theory__user`
--
ALTER TABLE `theory__user`
  ADD KEY `Theory_FK` (`theory_id`),
  ADD KEY `User_FK` (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quizAnswers`
--
ALTER TABLE `quizAnswers`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `theory`
--
ALTER TABLE `theory`
  MODIFY `theory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `TheoryFK_` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`theory_id`),
  ADD CONSTRAINT `UserFK_` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `quizAnswers`
--
ALTER TABLE `quizAnswers`
  ADD CONSTRAINT `TheoryFK` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`theory_id`),
  ADD CONSTRAINT `UserFK` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);

--
-- Constraints for table `theory__categories`
--
ALTER TABLE `theory__categories`
  ADD CONSTRAINT `CategoryFK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `TheoriesFK` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`theory_id`);

--
-- Constraints for table `theory__user`
--
ALTER TABLE `theory__user`
  ADD CONSTRAINT `Theory_FK` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`theory_id`),
  ADD CONSTRAINT `User_FK` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
