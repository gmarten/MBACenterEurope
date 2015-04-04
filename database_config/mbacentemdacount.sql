-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: mbacentemdacount.mysql.db
-- Generation Time: Mar 30, 2015 at 08:52 PM
-- Server version: 5.1.73-2+squeeze+build1+1-log
-- PHP Version: 5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mbacentemdacount`
--
CREATE DATABASE IF NOT EXISTS `mbacentemdacount` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mbacentemdacount`;

-- --------------------------------------------------------

--
-- Table structure for table `candidature_ecole`
--

CREATE TABLE IF NOT EXISTS `candidature_ecole` (
  `id_ecole` int(4) NOT NULL AUTO_INCREMENT,
  `ecole_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ecole`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=322 ;

--
-- Dumping data for table `candidature_ecole`
--

INSERT INTO `candidature_ecole` (`id_ecole`, `ecole_nom`) VALUES
(224, 'Harvard Business School'),
(225, 'London Business School'),
(226, 'University of Pennsylvania, Wharton'),
(227, 'Stanford Graduate School of Business'),
(228, 'Insead'),
(229, 'Columbia Business School'),
(230, 'Iese Business School'),
(231, 'MIT Sloan'),
(232, 'University of Chicago Booth'),
(233, 'Berkeley Haas'),
(234, 'Ceibs'),
(235, 'IE Business School'),
(236, 'Cambridge Judge Business School'),
(237, 'HKUST Business School'),
(238, 'Northwestern University Kellogg'),
(239, 'HEC Paris'),
(240, 'Yale School of Management'),
(241, 'New York University Stern'),
(242, 'Esade Business School'),
(243, 'IMD'),
(244, 'Duke University Fuqua'),
(245, 'University of Oxford Said'),
(246, 'Dartmouth College Tuck'),
(247, 'University of Michigan Ross'),
(248, 'UCLA Anderson'),
(249, 'SDA Bocconi'),
(250, 'Cornell University Johnson'),
(251, 'The University of Hong Kong'),
(252, 'CUHK Business School'),
(253, 'National University of Singapore Business School'),
(254, 'University of Virginia Darden'),
(255, 'Indian School of Business'),
(256, 'Imperial College Business School'),
(257, 'Manchester Business School'),
(258, 'Carnegie Mellon Tepper'),
(259, 'The Lisbon MBA'),
(260, 'Warwick Business School'),
(261, 'University of North Carolina Kenan-Flagler'),
(262, 'Nanyang Business School'),
(263, 'University of Texas at Austin McCombs'),
(264, 'Georgetown University McDonough'),
(265, 'Rice University Jones'),
(266, 'University of California at Irvine Merage'),
(267, 'Rotterdam School of Management'),
(268, 'City University Cass'),
(269, 'Cranfield School of Management'),
(270, 'Purdue University'),
(271, 'University of Maryland Smith'),
(272, 'Lancaster University Management School'),
(273, 'University of Washington Foster'),
(274, 'University of Cape Town GSB'),
(275, 'University of Toronto Rotman'),
(276, 'Michigan State University Broad'),
(277, 'Shanghai Jiao Tong University Antai'),
(278, 'Mannheim Business School'),
(279, 'Fudan University School of Management'),
(280, 'University of Southern California Marshall'),
(281, 'Emory University Goizueta'),
(282, 'Sungkyunkwan University'),
(283, 'Vanderbilt University Owen'),
(284, 'Indiana University Kelley'),
(285, 'European School of Management and Technology'),
(286, 'University of Iowa Tippie'),
(287, 'Georgia Institute of Technology'),
(288, 'San Diego School of Business Administration'),
(289, 'University of St Gallen'),
(290, 'Macquarie Graduate School of Management'),
(291, 'Ohio State University'),
(292, 'Wisconsin School of Business'),
(293, 'University of Illinois'),
(294, 'Washington University'),
(295, 'University College Dublin Smurfit'),
(296, 'Babson College Olin'),
(297, 'AGSM at UNSW Business School'),
(298, 'SMU Cox'),
(299, 'Arizona State University'),
(300, 'Boston University School of Management'),
(301, 'Durham University Business School'),
(302, 'University of Strathclyde'),
(303, 'University of British Columbia'),
(304, 'University of Minnesota'),
(305, 'University of Bath'),
(306, 'University of Rochester'),
(307, 'Queen''s School of Business'),
(308, 'University of Alberta'),
(309, 'Pennsylvania State University Smeal'),
(310, 'University of Notre Dame'),
(311, 'Melbourne Business School'),
(312, 'Boston College'),
(313, 'George Washington University School of Business'),
(314, 'University of California, San Diego'),
(315, 'Vlerick Business School'),
(316, 'Birmingham Business School'),
(317, 'University of South Carolina'),
(318, 'University of Pittsburgh'),
(319, 'Tias Business School'),
(320, 'Western University'),
(321, 'McGill University');

-- --------------------------------------------------------

--
-- Table structure for table `candidature_program`
--

CREATE TABLE IF NOT EXISTS `candidature_program` (
  `id_program` int(4) NOT NULL,
  `nom_program` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidature_program`
--

INSERT INTO `candidature_program` (`id_program`, `nom_program`) VALUES
(1, 'MBA'),
(2, 'EMBA'),
(3, 'MS'),
(4, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(4) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(60) NOT NULL,
  `date_cours` date NOT NULL,
  `typeCours` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id_cours`, `intitule`, `date_cours`, `typeCours`) VALUES
(12, 'Math', '2015-02-21', NULL),
(47, '1-2-1 meetings with top Business School', '2015-02-21', NULL),
(67, 'hello from this place', '2015-02-21', NULL),
(68, 'Math', '2015-02-21', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `cours_has_date`
--

CREATE TABLE IF NOT EXISTS `cours_has_date` (
  `id_cours` int(4) NOT NULL,
  `date_cours` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cours_has_ecole`
--

CREATE TABLE IF NOT EXISTS `cours_has_ecole` (
  `id_cours` int(4) DEFAULT NULL,
  `id_ecole` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours_has_ecole`
--

INSERT INTO `cours_has_ecole` (`id_cours`, `id_ecole`) VALUES
(1, 22),
(1, 23),
(NULL, 24),
(NULL, 25),
(NULL, 26),
(NULL, 27),
(NULL, 28),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, NULL),
(49, NULL),
(50, NULL),
(51, NULL),
(52, NULL),
(53, NULL),
(54, NULL),
(55, NULL),
(56, NULL),
(57, NULL),
(58, NULL),
(59, NULL),
(60, NULL),
(61, NULL),
(62, NULL),
(63, NULL),
(64, NULL),
(65, NULL),
(66, NULL),
(67, NULL),
(68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id_employe` int(1) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gsm` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `actif` int(1) DEFAULT NULL,
  `id_sha` varchar(60) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `service_militaire` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_employe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id_employe`, `nom`, `prenom`, `email`, `gsm`, `password`, `actif`, `id_sha`, `adress`, `gender`, `date_naiss`, `service_militaire`) VALUES
(1, 'Truc', 'Bidule', 'clement@hotmail.com', '098709879087', '9cf95dacd226dcf43da376cdb6cbba7035218921', 1, '0', '', 1, '2012-10-09', 1),
(7, 'employe', '', 'employe@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '0', NULL, NULL, NULL, NULL),
(11, 'EmployÃ©4', '', 'employe4@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '17ba0791499db908433b80f37c5fbc89b870084b', NULL, NULL, NULL, NULL),
(12, 'clement', ' hadjeres', 'contact@clementh.com', '+33651062891', '7e51f8f07feacaffaf1d26055a896072f747c8e3', 1, '7b52009b64fd0a2a49e6d8a939753077792b0554', '23 rue de verdun', 1, '1991-10-28', 1),
(13, 'Test email hubert', '', 'testhubertmail@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'bd307a3ec329e10a2cff8fb87480823da114f8f4', NULL, NULL, NULL, NULL),
(14, 'yeyeye', '', 'yeyeye@hotmail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', NULL, NULL, NULL, NULL),
(15, 'profhubert', '', 'profhubert@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'f1abd670358e036c31296e66b3b66c382ac00812', NULL, NULL, NULL, NULL),
(16, 'huberthubert', '', 'hubertbertu@hotmail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '1574bddb75c78a6fd2251d61e2993b5146201319', NULL, NULL, NULL, NULL),
(17, 'Bertubertu', '', 'bertubert@hotmail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '0716d9708d321ffb6a00818614779e779925365c', NULL, NULL, NULL, NULL),
(18, 'qmlksjdfflkjqsldfkjqsdlkfjqslk', '', 'huhuhuhuhu@hotmail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '9e6a55b6b4563e652a23be9d623ca5055c356940', NULL, NULL, NULL, NULL),
(19, 'trauc bazar brol', '', 'brol@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f', NULL, NULL, NULL, NULL),
(20, 'hendrix', '', 'jimi@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '91032ad7bbcb6cf72875e8e8207dcfba80173f7c', NULL, NULL, NULL, NULL),
(21, 'bertubertu', '', 'blablabla@hotmail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', NULL, NULL, NULL, NULL),
(22, 'testbordel', '', 'bordel@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', NULL, NULL, NULL, NULL),
(23, 'gros bordel', '', 'bordel123@mail.com', '987098', '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'd435a6cdd786300dff204ee7c2ef942d3e9034e2', NULL, NULL, NULL, NULL),
(24, 'Bart', '', 'bart@mail.com', NULL, '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, '4d134bc072212ace2df385dae143139da74ec0ef', NULL, NULL, NULL, NULL),
(25, 'bartolomÃ©', '', 'bartolome@mail.com', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 0, 'f6e1126cedebf23e1463aee73f9df08783640400', NULL, NULL, NULL, NULL),
(26, 'test email', '', 'emaltest@hotmail.com', '09879087', '9cf95dacd226dcf43da376cdb6cbba7035218921', 1, '887309d048beef83ad3eabf2a79a64a389ab1c9f', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(4) NOT NULL AUTO_INCREMENT,
  `nom_test` varchar(10) NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `nom_test`) VALUES
(1, 'GMAT'),
(2, 'GRE'),
(3, 'TOEFL'),
(4, 'LSAT'),
(5, 'MCAT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(1) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `comments` varchar(600) DEFAULT NULL,
  `gsm` varchar(20) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `biographie` varchar(400) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `service_militaire` int(1) DEFAULT NULL,
  `plus_haut_diplome` varchar(255) DEFAULT NULL,
  `niveau_etude` varchar(255) DEFAULT NULL,
  `admission_consulting` int(1) DEFAULT NULL,
  `annee_experience_deb` int(5) DEFAULT NULL,
  `annee_experience_fin` int(4) DEFAULT NULL,
  `current_job` varchar(255) DEFAULT NULL,
  `college_industry` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `comments`, `gsm`, `location`, `type`, `biographie`, `adress`, `gender`, `date_naiss`, `date_inscription`, `service_militaire`, `plus_haut_diplome`, `niveau_etude`, `admission_consulting`, `annee_experience_deb`, `annee_experience_fin`, `current_job`, `college_industry`) VALUES
(1, 'Funcky drummer', 'Axel', 'ax_sz@hotmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'mlkqjsdflkjqsdf', '32494589365', 'Belgique Espagne', 0, 'Bla bla bla bla bla bla 5', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(2, 'Bob', 'L''éponge', 'bob@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'nouveau commentaire', '32495629126', 'Belgique', 0, 'Depuis tout petit, je fais de l''informatique', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(3, 'Didier', 'Bourdon', 'boby@hotmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'L avenir appartient à ceux qui se levent tot', '32479422270', 'Belgique', 1, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(5, 'Machin funcky spacial k', 'james', 'machin@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, '32489597961', '', NULL, 'yo', '62 avenue de woluwe saint lambert', 0, '1982-10-29', '0000-00-00', 0, 'BA', 'College', 0, 2009, 2031, 'web developper back off', 'College'),
(10, 'user', '', 'user@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, '32465578708', '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(11, 'toto', '', 'totovaalaplage@mail.', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(12, 'test1', 'machintest', 'temlkj@mail.com', 'lmkqsjdflkmj', 'lmkqsjdflkj', 'qsldkfjsqf', 'qsmldkfjq', 2, 'mlkqsjdflkjsdlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(13, 'test2', '', 'lm@mail.com', 'mlqksjdfklj', 'lkjmlkjmlkj', 'mlkjmlkj', 'lkjlkjlkj', 5, 'mlkjlkjlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(14, 'test3', 'qmlskdjflkj', 'mlkjqsdf@mail.com', 'qmlskjdfmlkjqsdf', 'mqlksjdfmlkjqsddf', 'qlmskdjflkj', 'qmlksjdfmlkj', 3, 'qmslkdjflmkjqsdflmkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(15, 'test4', 'test4', 'qsdlfkj@mail.com', 'qmlskdjfmlkj', 'qslmdkfjqmlskdjfmlkj', 'qslkdfjqsdlkfj', 'qmlksjdflkj', 4, 'mlqksjdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(16, 'test5', 'test5', 'tesmlkjmlj@mail.com', 'qmlkjsdflkmj', 'mlkqsjdflkjmlkj', 'mlkjqsdflkj', 'mmlkjlmkj', NULL, 'mlkjqsdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(17, 'test6', 'test6', 'test6@mail.com', 'mlqksjdfmlkjmlkj', 'qsdlkfjqsldkfj', 'mqlksjdflkjqsdflkj', 'qslkdfjqslkdfj', NULL, 'qsmdlkfjmlkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(18, 'qtest7', 'test7', 'test7@mail.com', 'mlkqjsdflkjqsflkj', 'qmslkjsdflkj', 'qsdflqkjsfdlkj', 'qsdklfjqsdmlkfj', NULL, 'qmslkdjfmqlksjdfklj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(19, 'test8', 'test8', 'mlqksjdflmkj@mail.co', 'qmlksjdflkj', 'qsdfmlkjqsdflkj', 'qqmlskdjflkj', 'qsldmkfjqsdflkj', NULL, 'qmlskjdfmlkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(20, 'test9', 'test9', 'qmlskdjf@mail.com', 'mlkjqsdflkjmlkj', 'mlkjqsdflkjsqddflkj', 'smqlkjsdflkj', 'mlkqjsdflkjsqdflkj', NULL, 'mlkqjsdflkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(21, 'test9', 'test9', 'test9@mail.com', 'qsdflkjqsdffklj', 'mlkqjsdflkjmlkjmlkj', 'qlmskdjfmlkj', 'lkjqsdflkjsddff', NULL, 'mlqkjsdflkjqsdflkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(22, 'test10', 'test10', 'test10@mail.com', 'mlkqjsdflkjmlkj', 'mlkjqsdflkmjsqdfmlkj', 'qlmskdjfmlkj', 'qlmksjdfmlkjmlkj', NULL, 'qmlkjsdflkjsmlfkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(23, 'test11', 'test11', 'test11@mail.com', 'mlkjqsdfmlkj', 'mlkqjsdflkjsddlkfj', 'mlkqjsdflkj', 'mqlksjdflkjqsdfj', NULL, 'qmslkdjflkjqsdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(24, 'test12', 'test12', 'test12@mail.com', 'mlkqjsdfmlkjqsdflkj', 'mlkqsjdflkjqsddflkj', 'qmlkqjsdflkj', 'lkjqsdfklmjmlkj', NULL, 'mlkqsdflkjqsdfflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(25, 'test13', 'test13', 'test13@mail.com', 'mlkqjsdfflkjmlkj', 'mqlksjdflkjsdflkj', '098790870987', 'mlkjqsldkfjmlkj', NULL, 'mlkqjsdflkjqsddflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(26, 'test14', 'test14', 'test14@mail.com', 'kljqsdlfkjqsdlkfj', 'mlqkjsdflkjsdflkj', '098790870987', 'mlkqsjfdkljqsf', NULL, 'mlkqjsdflkjqsdfflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(27, 'test1', 'machintest', 'temlkj@mail.com', 'lmkqsjdflkmj', 'lmkqsjdflkj', 'qsldkfjsqf', 'qsmldkfjq', 2, 'mlkqsjdflkjsdlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(28, 'test2', '', 'lm@mail.com', 'mlqksjdfklj', 'lkjmlkjmlkj', 'mlkjmlkj', 'lkjlkjlkj', 5, 'mlkjlkjlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(29, 'test3', 'qmlskdjflkj', 'mlkjqsdf@mail.com', 'qmlskjdfmlkjqsdf', 'mqlksjdfmlkjqsddf', 'qlmskdjflkj', 'qmlksjdfmlkj', 3, 'qmslkdjflmkjqsdflmkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(30, 'test4', 'test4', 'qsdlfkj@mail.com', 'qmlskdjfmlkj', 'qslmdkfjqmlskdjfmlkj', 'qslkdfjqsdlkfj', 'qmlksjdflkj', 4, 'mlqksjdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(31, 'test5', 'test5', 'tesmlkjmlj@mail.com', 'qmlkjsdflkmj', 'mlkqsjdflkjmlkj', 'mlkjqsdflkj', 'mmlkjlmkj', NULL, 'mlkjqsdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(32, 'test6', 'test6', 'test6@mail.com', 'mlqksjdfmlkjmlkj', 'qsdlkfjqsldkfj', 'mqlksjdflkjqsdflkj', 'qslkdfjqslkdfj', NULL, 'qsmdlkfjmlkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(33, 'qtest7', 'test7', 'test7@mail.com', 'mlkqjsdflkjqsflkj', 'qmslkjsdflkj', 'qsdflqkjsfdlkj', 'qsdklfjqsdmlkfj', NULL, 'qmslkdjfmqlksjdfklj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(34, 'test8', 'test8', 'mlqksjdflmkj@mail.co', 'qmlksjdflkj', 'qsdfmlkjqsdflkj', 'qqmlskdjflkj', 'qsldmkfjqsdflkj', NULL, 'qmlskjdfmlkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(35, 'test9', 'test9', 'qmlskdjf@mail.com', 'mlkjqsdflkjmlkj', 'mlkjqsdflkjsqddflkj', 'smqlkjsdflkj', 'mlkqjsdflkjsqdflkj', NULL, 'mlkqjsdflkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(36, 'test9', 'test9', 'test9@mail.com', 'qsdflkjqsdffklj', 'mlkqjsdflkjmlkjmlkj', 'qlmskdjfmlkj', 'lkjqsdflkjsddff', NULL, 'mlqkjsdflkjqsdflkjmlkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(37, 'test10', 'test10', 'test10@mail.com', 'mlkqjsdflkjmlkj', 'mlkjqsdflkmjsqdfmlkj', 'qlmskdjfmlkj', 'qlmksjdfmlkjmlkj', NULL, 'qmlkjsdflkjsmlfkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(38, 'test11', 'test11', 'test11@mail.com', 'mlkjqsdfmlkj', 'mlkqjsdflkjsddlkfj', 'mlkqjsdflkj', 'mqlksjdflkjqsdfj', NULL, 'qmslkdjflkjqsdflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(39, 'test12', 'test12', 'test12@mail.com', 'mlkqjsdfmlkjqsdflkj', 'mlkqsjdflkjqsddflkj', 'qmlkqjsdflkj', 'lkjqsdfklmjmlkj', NULL, 'mlkqsdflkjqsdfflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(40, 'test13', 'test13', 'test13@mail.com', 'mlkqjsdfflkjmlkj', 'mqlksjdflkjsdflkj', '098790870987', 'mlkjqsldkfjmlkj', NULL, 'mlkqjsdflkjqsddflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(41, 'test14', 'test14', 'test14@mail.com', 'kljqsdlfkjqsdlkfj', 'mlqkjsdflkjsdflkj', '098790870987', 'mlkqsjfdkljqsf', NULL, 'mlkqjsdflkjqsdfflkj', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(42, 'Vanderkluizen Axel', '', 'rastamail@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(43, 'Drumset master', '', 'drumsetmaster@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(44, 'rastaman', '', 'rastaman@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(45, 'jessica', '', 'jessica@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(46, 'testalbertest', '', 'alberttest@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', '', 0, '0000-00-00', '0000-00-00', 0, '', '', 0, 0, 0, '', ''),
(47, 'Guenther', '', 'gunviro@gmail.com', '456c19fd441c1a53f4ee7d3b4b70e52d43bd1c09', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(48, 'Vanderkluizen Axel', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(49, 'Vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(50, 'Vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(51, 'vanderkluizen ', '', 'vanderkluizen@hotmai', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(52, 'vanderkluize', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(53, 'Vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(54, 'vanderkluizen', '', 'vanderkluize@ail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(55, 'Vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(56, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(57, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(58, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(59, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(60, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(61, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(62, 'vanderkluizen', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(63, 'mqlksjdfmlkj', '', 'qsldmkfjqsldkjfqslkd', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(64, 'lkjmlkjlkjkjkjkjkjkjk', '', 'qsdfuhuhuehudhue@mai', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(65, 'qmskldjflqj', '', 'rygfyrgrfygfr@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(66, 'qmlskjfdmlkjqslfdkj', '', 'ieieieieieie@mail.co', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(67, 'qmlskjfdmlkjqslfdkj', '', 'ieieieieieie@mail.co', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(68, 'mlkjqsfdkljqsdklfj', '', 'uhuehdehduhe@mail.co', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(69, 'lqmksjdflkjqdsdlmfkj', '', 'uheuhuhduehue@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(70, 'vanderkluizen@mail.com', '', 'vanderkluizen@mail.c', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(71, 'Vanderkluizen', 'Axel', 'vanderkluizen@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, '32494589365', '', NULL, '', '62 avenue de Woluwe Saint Lambert', 0, '2015-10-29', NULL, 0, 'BS', '', 1, NULL, NULL, NULL, ''),
(72, 'Crowie', 'Rose', 'gunviro@hotmail.com', '456c19fd441c1a53f4ee7d3b4b70e52d43bd1c09', NULL, '', '', NULL, '', '', 0, '0000-00-00', NULL, 1, '', '', 1, 0, 0, '', 'College'),
(73, 'testcandidature', '', 'candidateur@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'candidature', '', 'candidate@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'candit 3', 'MLKJMLKJ', 'candid@mail.com', '7f10913539f4710e6e090bfa13f7c65e2ccb1a9d', NULL, '9870980987', '2', NULL, '', 'qsdlkfjqlkjdf', 1, '0000-00-00', NULL, 1, '', '', NULL, 2015, 2020, 'Dev web', 'College'),
(76, 'Test applyed', '', 'applyed@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Testapplyied', '', 'applyied@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'apptest', '', 'apptest@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'apptested', '', 'apptested@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'College'),
(80, 'testno_ligne', 'test2', 'noligne@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'travaille bien, va souvent Ã  la toilette et revient avec de la farine dans le nez ', '098709870987908', '', NULL, '', 'avenue du travail', 1, '2000-10-23', NULL, 0, 'BA', 'College', 0, 2000, 2010, 'Web Dev', 'Law School'),
(81, 'testeuuuu', '', 'ttttttt@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'yeah', '', 'yeah@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'blebleble', '', 'bleble@mail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Hubert Silly', '', 'hubert@mbacentereurope.eu', 'ff2b081ea4864882f981e806fc6d5d1b733ea807', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `usersalpha`
--
CREATE TABLE IF NOT EXISTS `usersalpha` (
`nom` varchar(255)
,`prenom` varchar(20)
,`biographie` varchar(400)
,`email` varchar(255)
,`gsm` varchar(20)
,`location` varchar(30)
,`comments` varchar(600)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `usersparcours`
--
CREATE TABLE IF NOT EXISTS `usersparcours` (
`nom` varchar(255)
,`prenom` varchar(20)
,`biographie` varchar(400)
,`email` varchar(255)
,`intitule` varchar(60)
,`id_cours` int(4)
,`id_user` int(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `userspartypeimportant`
--
CREATE TABLE IF NOT EXISTS `userspartypeimportant` (
`id_user` int(1)
,`nom` varchar(255)
,`prenom` varchar(20)
,`comments` varchar(600)
,`biographie` varchar(400)
,`email` varchar(255)
,`gsm` varchar(20)
,`location` varchar(30)
,`type` int(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `users_has_cours`
--

CREATE TABLE IF NOT EXISTS `users_has_cours` (
  `id_user` int(4) NOT NULL,
  `id_cours` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_cours`
--

INSERT INTO `users_has_cours` (`id_user`, `id_cours`) VALUES
(5, 0),
(5, 0),
(5, 0),
(5, 0),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 51),
(5, 52),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(5, 67),
(5, 68),
(1, 12),
(1, 47),
(1, 67),
(1, 68);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_candidature_program`
--

CREATE TABLE IF NOT EXISTS `user_has_candidature_program` (
  `id_user` int(4) NOT NULL,
  `id_program` int(4) NOT NULL,
  `taken` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_candidature_program`
--

INSERT INTO `user_has_candidature_program` (`id_user`, `id_program`, `taken`) VALUES
(75, 1, 1),
(75, 2, 0),
(75, 3, 0),
(75, 4, 0),
(76, 1, 0),
(77, 1, 0),
(78, 1, 0),
(78, 2, 0),
(78, 3, 0),
(78, 4, 0),
(79, 1, 1),
(79, 2, 0),
(79, 3, 0),
(79, 4, 0),
(80, 1, 1),
(80, 2, 1),
(80, 3, 0),
(80, 4, 1),
(81, 1, 0),
(81, 2, 0),
(81, 3, 0),
(81, 4, 0),
(82, 1, 0),
(82, 2, 0),
(82, 3, 0),
(82, 4, 0),
(83, 1, 0),
(83, 2, 0),
(83, 3, 0),
(83, 4, 0),
(84, 1, 0),
(84, 2, 0),
(84, 3, 0),
(84, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_cand_ecole`
--

CREATE TABLE IF NOT EXISTS `user_has_cand_ecole` (
  `id_user` int(4) NOT NULL,
  `id_ecole` int(4) NOT NULL,
  `no_ligne` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_cand_ecole`
--

INSERT INTO `user_has_cand_ecole` (`id_user`, `id_ecole`, `no_ligne`) VALUES
(79, 240, 1),
(79, 240, 2),
(79, 240, 3),
(79, 240, 4),
(79, 240, 5),
(80, 224, 1),
(80, 227, 2),
(80, 226, 3),
(80, 240, 4),
(80, 236, 5),
(81, 0, 1),
(81, 0, 2),
(81, 0, 3),
(81, 0, 4),
(81, 0, 5),
(82, 0, 1),
(82, 0, 2),
(82, 0, 3),
(82, 0, 4),
(82, 0, 5),
(83, 0, 1),
(83, 0, 2),
(83, 0, 3),
(83, 0, 4),
(83, 0, 5),
(84, 0, 1),
(84, 0, 2),
(84, 0, 3),
(84, 0, 4),
(84, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_planed_test`
--

CREATE TABLE IF NOT EXISTS `user_has_planed_test` (
  `id_user` int(4) NOT NULL,
  `id_test` int(4) NOT NULL,
  `taken` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_planed_test`
--

INSERT INTO `user_has_planed_test` (`id_user`, `id_test`, `taken`) VALUES
(74, 1, 0),
(73, 5, 0),
(73, 4, 0),
(73, 3, 0),
(73, 2, 0),
(73, 1, 0),
(72, 5, 0),
(72, 4, 0),
(72, 3, 0),
(72, 2, 0),
(72, 1, 0),
(71, 5, 1),
(71, 4, 1),
(71, 3, 1),
(71, 2, 0),
(71, 1, 1),
(74, 2, 0),
(74, 3, 0),
(74, 4, 0),
(74, 5, 0),
(75, 1, 1),
(75, 2, 0),
(75, 3, 0),
(75, 4, 0),
(75, 5, 0),
(76, 1, 0),
(76, 2, 0),
(76, 3, 0),
(76, 4, 0),
(76, 5, 0),
(77, 1, 0),
(77, 2, 0),
(77, 3, 0),
(77, 4, 0),
(77, 5, 0),
(78, 1, 0),
(78, 2, 0),
(78, 3, 0),
(78, 4, 0),
(78, 5, 0),
(79, 1, 0),
(79, 2, 0),
(79, 3, 0),
(79, 4, 0),
(79, 5, 0),
(80, 1, 1),
(80, 2, 0),
(80, 3, 1),
(80, 4, 1),
(80, 5, 1),
(81, 1, 0),
(81, 2, 0),
(81, 3, 0),
(81, 4, 0),
(81, 5, 0),
(82, 1, 0),
(82, 2, 0),
(82, 3, 0),
(82, 4, 0),
(82, 5, 0),
(83, 1, 0),
(83, 2, 0),
(83, 3, 0),
(83, 4, 0),
(83, 5, 0),
(84, 1, 0),
(84, 2, 0),
(84, 3, 0),
(84, 4, 0),
(84, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_score`
--

CREATE TABLE IF NOT EXISTS `user_has_score` (
  `id_user` int(4) NOT NULL,
  `id_test` int(4) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_score`
--

INSERT INTO `user_has_score` (`id_user`, `id_test`, `score`) VALUES
(73, 5, 0),
(73, 2, 0),
(5, 4, 0),
(73, 1, 0),
(73, 4, 0),
(5, 5, 17),
(73, 3, 0),
(5, 3, 15),
(5, 2, 12),
(5, 1, 15),
(74, 1, 0),
(74, 2, 0),
(74, 3, 0),
(74, 4, 0),
(74, 5, 0),
(75, 1, 12),
(75, 2, 0),
(75, 3, 0),
(75, 4, 17),
(75, 5, 20),
(76, 1, 0),
(76, 2, 0),
(76, 3, 0),
(76, 4, 0),
(76, 5, 0),
(77, 1, 0),
(77, 2, 0),
(77, 3, 0),
(77, 4, 0),
(77, 5, 0),
(78, 1, 0),
(78, 2, 0),
(78, 3, 0),
(78, 4, 0),
(78, 5, 0),
(79, 1, 0),
(79, 2, 0),
(79, 3, 0),
(79, 4, 0),
(79, 5, 0),
(80, 1, 12),
(80, 2, 19),
(80, 3, 0),
(80, 4, 0),
(80, 5, 0),
(81, 1, 0),
(81, 2, 0),
(81, 3, 0),
(81, 4, 0),
(81, 5, 0),
(82, 1, 0),
(82, 2, 0),
(82, 3, 0),
(82, 4, 0),
(82, 5, 0),
(83, 1, 0),
(83, 2, 0),
(83, 3, 0),
(83, 4, 0),
(83, 5, 0),
(84, 1, 0),
(84, 2, 0),
(84, 3, 0),
(84, 4, 0),
(84, 5, 0);

-- --------------------------------------------------------

--
-- Structure for view `coursparecole`
--
DROP TABLE IF EXISTS `coursparecole`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mbacentemdacount`@`%` SQL SECURITY DEFINER VIEW `coursparecole` AS select `cours`.`intitule` AS `intitule`,`candidature_ecole`.`ecole_nom` AS `nom` from ((`cours` join `cours_has_ecole` on((`cours_has_ecole`.`id_cours` = `cours`.`id_cours`))) join `candidature_ecole` on((`cours_has_ecole`.`id_ecole` = `candidature_ecole`.`id_ecole`)));

-- --------------------------------------------------------

--
-- Structure for view `usersalpha`
--
DROP TABLE IF EXISTS `usersalpha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mbacentemdacount`@`%` SQL SECURITY DEFINER VIEW `usersalpha` AS select `users`.`nom` AS `nom`,`users`.`prenom` AS `prenom`,`users`.`biographie` AS `biographie`,`users`.`email` AS `email`,`users`.`gsm` AS `gsm`,`users`.`location` AS `location`,`users`.`comments` AS `comments` from `users` order by `users`.`nom`;

-- --------------------------------------------------------

--
-- Structure for view `usersparcours`
--
DROP TABLE IF EXISTS `usersparcours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mbacentemdacount`@`%` SQL SECURITY DEFINER VIEW `usersparcours` AS select `users`.`nom` AS `nom`,`users`.`prenom` AS `prenom`,`users`.`biographie` AS `biographie`,`users`.`email` AS `email`,`cours`.`intitule` AS `intitule`,`cours`.`id_cours` AS `id_cours`,`users`.`id_user` AS `id_user` from ((`users` join `users_has_cours` on((`users`.`id_user` = `users_has_cours`.`id_user`))) join `cours` on((`users_has_cours`.`id_cours` = `cours`.`id_cours`))) where (`users`.`id_user` = `users_has_cours`.`id_user`);

-- --------------------------------------------------------

--
-- Structure for view `userspartypeimportant`
--
DROP TABLE IF EXISTS `userspartypeimportant`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mbacentemdacount`@`%` SQL SECURITY DEFINER VIEW `userspartypeimportant` AS select `users`.`id_user` AS `id_user`,`users`.`nom` AS `nom`,`users`.`prenom` AS `prenom`,`users`.`comments` AS `comments`,`users`.`biographie` AS `biographie`,`users`.`email` AS `email`,`users`.`gsm` AS `gsm`,`users`.`location` AS `location`,`users`.`type` AS `type` from `users` order by `users`.`type`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
