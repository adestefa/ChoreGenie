-- phpMyAdmin SQL Dump
-- version 2.6.1-pl2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 17, 2005 at 08:41 AM
-- Server version: 4.0.22
-- PHP Version: 4.3.11
-- 
-- Database: `choreg36_chores`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `account`
-- 

CREATE TABLE `account` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `exchangeRate` float NOT NULL default '0.25',
  `balance` mediumint(9) NOT NULL default '0',
  `dateCreated` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `account`
-- 

INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (4, 36, 0.25, 11, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (5, 37, 1, 221, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (16, 44, 0.25, 5, '2005-08-15');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (15, 43, 0.25, 5, '2005-08-15');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (14, 42, 0.25, 5, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (13, 41, 1, 105, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (10, 38, 0.25, 101, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (11, 39, 0.25, 21, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (12, 40, 0.25, 95, '0000-00-00');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (17, 57, 0.25, 5, '2005-08-15');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (18, 58, 0.25, 5, '2005-08-15');
INSERT INTO `account` (`id`, `userID`, `exchangeRate`, `balance`, `dateCreated`) VALUES (19, 70, 0.25, 5, '2005-08-15');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `authorID` mediumint(9) NOT NULL default '0',
  `typeID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` (`id`, `name`, `description`, `image`, `authorID`, `typeID`) VALUES (1, 'Pets and bedding', 'The care and maintenance of family Pets and related items.', '', 37, 1);
INSERT INTO `category` (`id`, `name`, `description`, `image`, `authorID`, `typeID`) VALUES (2, 'Kitchen/Dining', 'Chores and activities related to Kitchen and Dining rooms, including dishes, tables floors and other surfaces.', '', 37, 1);
INSERT INTO `category` (`id`, `name`, `description`, `image`, `authorID`, `typeID`) VALUES (3, 'Attic/Basement', 'Chores and activities in the Attic or Basement.', '', 37, 1);
INSERT INTO `category` (`id`, `name`, `description`, `image`, `authorID`, `typeID`) VALUES (4, 'Personal space', 'Chores and activites related to the maintenance of a persons Household space in including room or portion of room.', '', 37, 1);
INSERT INTO `category` (`id`, `name`, `description`, `image`, `authorID`, `typeID`) VALUES (5, 'Family space', 'Chores and activities related to the maintenance of a shared space like a Den or playroom.', '', 37, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `category_chore_rel`
-- 

CREATE TABLE `category_chore_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `choreID` mediumint(9) NOT NULL default '0',
  `categoryID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `category_chore_rel`
-- 

INSERT INTO `category_chore_rel` (`id`, `choreID`, `categoryID`) VALUES (1, 12, 1);
INSERT INTO `category_chore_rel` (`id`, `choreID`, `categoryID`) VALUES (2, 15, 1);
INSERT INTO `category_chore_rel` (`id`, `choreID`, `categoryID`) VALUES (3, 17, 1);
INSERT INTO `category_chore_rel` (`id`, `choreID`, `categoryID`) VALUES (4, 18, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `chore`
-- 

CREATE TABLE `chore` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `dateCreated` date NOT NULL default '0000-00-00',
  `name` varchar(50) NOT NULL default '',
  `description` text,
  `image` varchar(100) default NULL,
  `point_value` mediumint(9) NOT NULL default '1',
  `complexityID` mediumint(9) NOT NULL default '0',
  `categoryID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `chore`
-- 

INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (12, 15, '2005-05-11', 'sweep the upstairs', 'Sweep the upstairs wood floors including the dinning room, tv area, stairs, hallway.', '', 9, 4, 0);
INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (14, 15, '2005-05-11', 'clean the kitchen', 'this includes the counter tops, table and under the TV. Wash all dishes and clean the stove if needed.', '', 15, 8, 0);
INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (15, 15, '2005-05-11', 'make your bed', 'this includes cleaning your bed headboard and floor', '', 7, 6, 0);
INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (17, 15, '2005-05-11', 'clean up the yard', 'clean the front and back yards including putting away bikes and toys and picking up garbage.', '', 15, 6, 0);
INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (18, 37, '2005-07-29', 'Clean the bird cage', 'Change the paper and scrape the purches and clean the foor and water cups.', '', 10, 4, 0);
INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`, `categoryID`) VALUES (19, 37, '2005-08-14', 'No Temper Tantrums', 'Do not act out of control or show singns of rage to others in the group. You must control your actions regardless of the emotions you may feel.', 'http://images.google.com/imgres?imgurl=http://www.mofizixgr4fix.com/images/tantrum.gif&imgrefurl=htt', 20, 10, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `chorePoint`
-- 

CREATE TABLE `chorePoint` (
  `id` mediumint(9) NOT NULL auto_increment,
  `dateCreated` date NOT NULL default '0000-00-00',
  `adminID` mediumint(9) NOT NULL default '0',
  `value` int(11) NOT NULL default '0',
  `userID` mediumint(9) default NULL,
  `serial` varchar(20) NOT NULL default '0',
  `dateExchanged` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=218846 ;

-- 
-- Dumping data for table `chorePoint`
-- 

INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218726, '2003-09-04', 7, 1, 37, '97FE31349939', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218727, '2003-09-04', 7, 1, 37, '97FE31384515', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218728, '2003-09-04', 7, 1, 37, '97FE31333527', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218729, '2003-09-04', 7, 1, 0, '97FE31343368', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218730, '2003-09-04', 7, 1, 36, '97FE31391233', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218731, '2003-09-04', 7, 100, 37, '97FE31317877', '2005-06-11');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218732, '2003-09-04', 7, 1, 36, '97FE31354620', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218733, '2003-09-04', 7, 1, 36, '97FE31311695', '2005-05-13');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218734, '2003-09-04', 7, 1000000, 38, '97FE31332498', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218735, '2003-09-04', 7, 1000000, 38, '97FE31391398', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218736, '2003-09-04', 7, 2147483647, 38, '97FE3133989', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218737, '2003-09-04', 7, 2147483647, 38, '97FE31342432', '2005-05-17');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218738, '2003-09-04', 7, 2147483647, 39, '97FE31340479', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218739, '2003-09-04', 7, 1, 38, '97FE31350536', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218740, '2003-09-04', 7, 100, 38, '97FE31315995', '2005-05-15');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218741, '2003-09-04', 7, 100, 0, '97FE31332414', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218742, '2003-09-04', 7, 1, 0, '97FE31361122', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218743, '2003-09-04', 7, 1, 0, '97FE31340854', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218744, '2003-09-04', 7, 1, 0, '97FE31326940', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218745, '2003-09-04', 7, 1, 37, '97FE31362455', '2005-06-11');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218746, '2003-09-04', 7, 1, 0, '97FE31392092', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218747, '2003-09-04', 7, 1, 40, '97FE31343753', '2005-07-14');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218748, '2003-09-04', 7, 1, 0, '97FE31356245', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218749, '2003-09-04', 7, 1, 0, '97FE31358431', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218750, '2003-09-04', 7, 1, 0, '97FE31391542', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218751, '2003-09-04', 7, 1, 0, '97FE31382611', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218752, '2003-09-04', 7, 1, 0, '97FE31319933', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218753, '2003-09-04', 7, 1, 0, '97FE31359720', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218754, '2003-09-04', 7, 1, 0, '97FE31320886', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218755, '2003-09-04', 7, 1, 40, '97FE31371645', '2005-07-14');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218756, '2003-09-04', 7, 1, 0, '97FE31393527', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218757, '2003-09-04', 7, 1, 0, '97FE3133753', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218758, '2003-09-04', 7, 1, 0, '97FE31374093', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218759, '2003-09-04', 7, 1, 0, '97FE31380923', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218760, '2003-09-04', 7, 1, 0, '97FE31353362', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218761, '2003-09-04', 7, 1, 0, '97FE31378260', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218762, '2003-09-04', 7, 1, 0, '97FE31373907', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218763, '2003-09-04', 7, 1, 0, '97FE31392823', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218764, '2003-09-04', 7, 1, 0, '97FE31359026', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218765, '2003-09-04', 7, 1, 0, '97FE31310046', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218766, '2003-09-04', 7, 1, 0, '97FE3133839', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218767, '2003-09-04', 7, 1, 0, '97FE31363015', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218768, '2003-09-04', 7, 1, 0, '97FE31352479', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218769, '2003-09-04', 7, 1, 0, '97FE31344318', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218770, '2003-09-04', 7, 1, 0, '97FE31329903', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218771, '2003-09-04', 7, 1, 0, '97FE31384826', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218772, '2003-09-04', 7, 1, 0, '97FE31393084', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218773, '2003-09-04', 7, 1, 0, '97FE3137378', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218774, '2003-09-04', 7, 1, 0, '97FE31325680', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218775, '2003-09-04', 7, 1, 0, '97FE31336377', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218776, '2003-09-04', 7, 1, 0, '97FE31369833', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218777, '2003-09-04', 7, 1, 0, '97FE31334124', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218778, '2003-09-04', 7, 1, 0, '97FE31380130', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218779, '2003-09-04', 7, 1, 0, '97FE31326079', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218780, '2003-09-04', 7, 1, 0, '97FE3138908', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218781, '2003-09-04', 7, 1, 0, '97FE31371672', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218782, '2003-09-04', 7, 1, 0, '97FE3138690', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218783, '2003-09-04', 7, 1, 0, '97FE31328841', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218784, '2003-09-04', 7, 1, 0, '97FE31347745', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218785, '2003-09-04', 7, 1, 0, '97FE31345928', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218786, '2003-09-04', 7, 1, 0, '97FE31347908', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218787, '2003-09-04', 7, 1, 0, '97FE31351566', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218788, '2003-09-04', 7, 1, 0, '97FE31340856', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218789, '2003-09-04', 7, 1, 0, '97FE31383028', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218790, '2003-09-04', 7, 1, 0, '97FE31337978', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218791, '2003-09-04', 7, 1, 0, '97FE31343648', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218792, '2003-09-04', 7, 1, 0, '97FE31352079', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218793, '2003-09-04', 7, 1, 0, '97FE31354812', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218794, '2003-09-04', 7, 1, 0, '97FE31370836', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218795, '2003-09-04', 7, 1, 0, '97FE31384215', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218796, '2003-09-05', 7, 1, 0, '159970723555', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218797, '2003-09-05', 7, 1, 0, '159970792920', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218798, '2003-09-05', 7, 1, 0, '159970762676', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218799, '2003-09-05', 7, 1, 0, '159970776701', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218800, '2003-09-05', 7, 1, 0, '159970730994', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218801, '2003-09-05', 7, 1, 0, '159970747322', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218802, '2003-09-05', 7, 1, 0, '159970751501', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218803, '2003-09-05', 7, 1, 0, '159970795882', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218804, '2003-09-05', 7, 1, 0, '159970794850', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218805, '2003-09-05', 7, 1, 0, '15997079969', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218806, '2003-09-05', 0, 1, 0, 'C06010792083', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218807, '2003-09-05', 0, 1, 0, 'C06010790816', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218808, '2003-09-05', 0, 1, 0, 'C06010796842', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218809, '2003-09-05', 0, 1, 0, 'C06010737466', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218810, '2003-09-05', 0, 1, 0, 'C06010728131', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218811, '2003-09-05', 0, 1, 0, 'C06010724540', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218812, '2003-09-05', 0, 1, 0, 'C06010738110', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218813, '2003-09-05', 0, 1, 0, 'C0601079453', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218814, '2003-09-05', 0, 1, 0, 'C06010785783', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218815, '2003-09-05', 0, 1, 0, 'C06010790471', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218816, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218817, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218818, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218819, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218820, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218821, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218822, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218823, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218824, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218825, '2003-09-05', 0, 1, 0, '', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218826, '2003-09-05', 0, 1, 0, '757A30A1900', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218827, '2003-09-05', 0, 1, 0, '757A30A39805', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218828, '2003-09-05', 0, 1, 0, '757A30A40431', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218829, '2003-09-05', 0, 1, 0, '757A30A96274', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218830, '2003-09-05', 0, 1, 0, '757A30A21914', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218831, '2003-09-05', 0, 1, 0, '757A30A98428', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218832, '2003-09-05', 0, 1, 0, '757A30A85758', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218833, '2003-09-05', 0, 1, 0, '757A30A37423', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218834, '2003-09-05', 0, 1, 0, '757A30A33524', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218835, '2003-09-05', 0, 1, 0, '757A30A50606', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218836, '2003-09-07', 0, 1, 0, 'F4291F130150', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218837, '2003-09-07', 0, 1, 0, 'F4291F182264', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218838, '2003-09-07', 0, 1, 0, 'F4291F180180', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218839, '2003-09-07', 0, 1, 0, 'F4291F160221', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218840, '2003-09-07', 0, 1, 0, 'F4291F140602', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218841, '2003-09-07', 0, 1, 0, 'F4291F163101', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218842, '2003-09-07', 0, 1, 0, 'F4291F12767', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218843, '2003-09-07', 0, 1, 0, 'F4291F19044', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218844, '2003-09-07', 0, 1, 0, 'F4291F180205', '0000-00-00');
INSERT INTO `chorePoint` (`id`, `dateCreated`, `adminID`, `value`, `userID`, `serial`, `dateExchanged`) VALUES (218845, '2003-09-07', 0, 1, 0, 'F4291F156453', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `chore_category_rel`
-- 

CREATE TABLE `chore_category_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `choreID` mediumint(9) NOT NULL default '0',
  `categoryID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `chore_category_rel`
-- 

INSERT INTO `chore_category_rel` (`id`, `choreID`, `categoryID`) VALUES (1, 12, 1);
INSERT INTO `chore_category_rel` (`id`, `choreID`, `categoryID`) VALUES (2, 15, 1);
INSERT INTO `chore_category_rel` (`id`, `choreID`, `categoryID`) VALUES (3, 17, 1);
INSERT INTO `chore_category_rel` (`id`, `choreID`, `categoryID`) VALUES (4, 18, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `chore_group_rel`
-- 

CREATE TABLE `chore_group_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `choreID` mediumint(9) NOT NULL default '0',
  `groupID` mediumint(9) NOT NULL default '0',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `chore_group_rel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `contact`
-- 

CREATE TABLE `contact` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `first` varchar(100) NOT NULL default '',
  `last` varchar(100) NOT NULL default '',
  `phone` varchar(20) NOT NULL default '',
  `street` varchar(100) NOT NULL default '',
  `city` varchar(100) NOT NULL default '',
  `state` char(2) NOT NULL default '',
  `zip` varchar(100) NOT NULL default '',
  `Country` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `contact`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `frequency`
-- 

CREATE TABLE `frequency` (
  `id` mediumint(9) NOT NULL auto_increment,
  `interval` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `frequency`
-- 

INSERT INTO `frequency` (`id`, `interval`) VALUES (1, 'once a day');
INSERT INTO `frequency` (`id`, `interval`) VALUES (2, 'once a week');
INSERT INTO `frequency` (`id`, `interval`) VALUES (3, 'once a month');
INSERT INTO `frequency` (`id`, `interval`) VALUES (4, 'once a year');
INSERT INTO `frequency` (`id`, `interval`) VALUES (5, 'every Monday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (6, 'every Tuesday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (7, 'every Wednesday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (8, 'every Thursday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (9, 'every Friday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (10, 'every Saturday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (11, 'every Sunday');
INSERT INTO `frequency` (`id`, `interval`) VALUES (12, 'every morning');
INSERT INTO `frequency` (`id`, `interval`) VALUES (13, 'every evening');
INSERT INTO `frequency` (`id`, `interval`) VALUES (14, 'many times a day');

-- --------------------------------------------------------

-- 
-- Table structure for table `group`
-- 

CREATE TABLE `group` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `typeID` mediumint(9) NOT NULL default '0',
  `description` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `group`
-- 

INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (1, 'Destefano', '2005-05-18 00:00:00', 1, '');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (2, 'Sky', '2005-05-18 00:00:00', 1, '');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (3, 'Class 303', '2005-08-15 00:00:00', 2, '');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (4, 'Mr D', '2005-08-15 00:00:00', 2, '');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (5, 'Belvu 101', '0000-00-00 00:00:00', 3, 'cell block 2A');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (6, 'Belvu 101', '0000-00-00 00:00:00', 3, 'cell block 2A');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (7, 'Jamie''s Kids', '0000-00-00 00:00:00', 3, 'A rat-tag bunch of torn kids.');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (8, 'Doe', '0000-00-00 00:00:00', 0, 'The John Doe Family.');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (9, 'Doe', '0000-00-00 00:00:00', 0, 'The John Doe Family.');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (10, 'Doe', '0000-00-00 00:00:00', 0, 'The John Doe Family.');
INSERT INTO `group` (`id`, `name`, `timestamp`, `typeID`, `description`) VALUES (11, 'bRONXVILLE', '0000-00-00 00:00:00', 3, 'FU');

-- --------------------------------------------------------

-- 
-- Table structure for table `group_chore_rel`
-- 

CREATE TABLE `group_chore_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `choreID` mediumint(9) NOT NULL default '0',
  `groupID` mediumint(9) NOT NULL default '0',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `group_chore_rel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `group_prize_rel`
-- 

CREATE TABLE `group_prize_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `prizeID` mediumint(9) NOT NULL default '0',
  `groupID` mediumint(9) NOT NULL default '0',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `group_prize_rel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `log`
-- 

CREATE TABLE `log` (
  `id` mediumint(9) NOT NULL auto_increment,
  `timestamp` datetime default NULL,
  `userID` mediumint(9) NOT NULL default '0',
  `action` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `log`
-- 

INSERT INTO `log` (`id`, `timestamp`, `userID`, `action`) VALUES (8, '2005-05-13 23:53:08', 36, 'illegal redemption attempt');
INSERT INTO `log` (`id`, `timestamp`, `userID`, `action`) VALUES (7, '2005-05-13 23:51:34', 36, 'illegal redemption attempt');
INSERT INTO `log` (`id`, `timestamp`, `userID`, `action`) VALUES (5, '2005-05-13 23:46:27', 36, 'illegal redemption attempt');
INSERT INTO `log` (`id`, `timestamp`, `userID`, `action`) VALUES (6, '2005-05-13 23:46:54', 36, 'illegal redemption attempt');
INSERT INTO `log` (`id`, `timestamp`, `userID`, `action`) VALUES (9, NULL, 39, 'illegal redemption attempt');

-- --------------------------------------------------------

-- 
-- Table structure for table `orders`
-- 

CREATE TABLE `orders` (
  `id` mediumint(9) NOT NULL auto_increment,
  `prizeID` mediumint(9) NOT NULL default '0',
  `userID` mediumint(9) NOT NULL default '0',
  `dateCreated` date NOT NULL default '0000-00-00',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `userID` (`userID`)
) TYPE=MyISAM AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `orders`
-- 

INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (1, 37, 37, '2005-06-11', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (2, 2, 37, '2005-06-12', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (3, 42, 37, '2005-07-07', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (4, 43, 40, '2005-07-11', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (16, 1, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (19, 2, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (18, 31, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (15, 37, 1, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (20, 42, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (21, 34, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (22, 36, 37, '2005-07-22', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (23, 42, 37, '2005-07-25', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (24, 33, 37, '2005-08-13', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (25, 48, 37, '2005-08-14', 5);
INSERT INTO `orders` (`id`, `prizeID`, `userID`, `dateCreated`, `stateID`) VALUES (26, 1, 37, '2005-08-15', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `prize`
-- 

CREATE TABLE `prize` (
  `id` mediumint(9) NOT NULL auto_increment,
  `authorID` mediumint(9) NOT NULL default '0',
  `dateCreated` date NOT NULL default '0000-00-00',
  `name` varchar(200) NOT NULL default '',
  `description` longtext,
  `moneyValue` mediumint(10) unsigned NOT NULL default '1',
  `image` longtext,
  `url` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=49 ;

-- 
-- Dumping data for table `prize`
-- 

INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (1, 7, '0000-00-00', 'pick of gameboy advance game.', 'Gameboy advance game of your choice. d', 25, 'http://www.ebgames.com/ebx_assets/thumbnails/225767.gif', 'http://www.google.com/froogle?q=super+game+boy+game');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (2, 7, '0000-00-00', 'comic book', 'Your choice of comic book.', 5, 'http://www.sachsreport.com/doom%20the%20comic%20book.jpg', '');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (33, 15, '2005-05-11', 'Episode III Game', 'Choose your side, follow the Dark Side or save the galaxy from darkness', 49, 'http://shop.starwars.com/kernel/imageload?table=cat_images;ttl2=15;like_search=1;key1=1664_t;key2=-100_t', 'http://www.google.com/froogle?q=Episode+III+Game&btnG=Search+Froogle');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (31, 15, '2005-05-12', 'Easton BZ700 Triple 7 Scandium Alloy Senior Large Baseball Bat', 'Add high-tech scandium alloy to an extended barrel design and you get a bat with great performance that''s still durable and affordable. Ultra lightweight for players preferring a lighter bat.\r\nDetermine what bat size is best for \r\n', 94, 'http://i.walmart.com/i/p/00/08/59/25/87/0008592587466_215X215.jpg', 'http://www.walmart.com/catalog/product.gsp?product_id=2569885&cat=4162&type=21&dept=4125&path=0%3A4125%3A4161%3A4162%3A131873');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (34, 15, '2005-05-11', 'Mac Mini', '1.25GHz PowerPC G4\r\n256MB DDR333 SDRAM\r\nATI Radeon 9200 with 32MB DDR video memory\r\n40GB Ultra ATA hard drive\r\nCombo drive\r\nDVI or VGA video output\r\nAirPort Extreme and Bluetooth optiona', 499, 'http://images.apple.com/r/store/infoblock/macmini/images/carrying_box_050111.gif', 'http://store.apple.com/1-800-MY-APPLE/WebObjects/AppleStore.woa/70803/wo/je7CtRpf0aTT2JaQ9WK1NRr0uWQ/0.0.11.1.0.6.23.1.3.1.0.0.0.1.0');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (36, 15, '0000-00-00', 'Apple iPod shuffle 512MB', 'Portable MP3, AAC, AIFF & WAV Player with 512MB Flash Memory for Mac or Windows \r\n', 100, 'http://www.sweetwater.com/images/items/iPodShuf500M.jpg', 'http%3A//www.sweetwater.com/store/detail/%2520iPodShuf500M/');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (37, 39, '0000-00-00', 'SPECK PRODUCTS IM-ST1P SkinTight Mini iPod Skin - Pink', 'Newly designed rubberized skin for the much anticipated Mini iPod / Protects your player from dust, knocks and scratches', 19, 'http://images.jr.com/productimages/SCDIMST1P.PNG?CELL=175,175&QLT=67&FTR=7&CVT=jpeg', 'http://www.jr.com/JRProductPage.process?Product_Code=SCD+IM-ST1P&JRSource=google.datafeed');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (40, 38, '2005-05-15', 'used commodore 64', 'Newer version of Commodore 64. Functionally identical to the original Commodore 64 except newer design and appearance. Uses all regular Commodore accessories and peripherals. Power supply included. 30 day guarantee.', 109, 'http://www.oldsoftware.com/images/64csm.jpg', 'http://www.oldsoftware.com/Commodore.html');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (41, 38, '2005-05-15', 'ThinkPad T42', 'ThinkPad T42 (IBM Think Express Program)', 974, 'https://www-131.ibm.com/content/product_images/en_US/IMG1071_MKT_IMG_FILENAME_1.gif', 'https://www-131.ibm.com/webapp/wcs/stores/servlet/ProductDisplay?productId=8770315&storeId=10025076&langId=-1&catalogId=-840&dualCurrId=130');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (47, 40, '0000-00-00', 'RC Boat Mini', 'Introducing the RC Boat Mini Speed Boat full function Radio Control', 100, 'http://www.savontv.com/im/nwimages/rc-baot-mini-3.jpg', 'http://www.savontv.com/rc-boat-mini.html');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (48, 37, '2005-08-14', 'Xbox All-In-One Bundle With Bonus 48 Game Case!', 'Includes Bonus 48-disc Xbox game case...a 14.82 value!\r\n\r\n', 204, 'http://i.walmart.com/i/p/11/12/99/61/82/1112996182707_215X215.jpg', 'http://www.walmart.com/catalog/product.gsp?dest=9999999997&product_id=3533440&sourceid=0100000030660804502498');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (46, 37, '0000-00-00', 'Dinner with mom', 'Have a night alone with Mom.\r\n', 2, 'http://images.google.com/images?q=tbn:EFEl0KC08qcJ:www.visitmontserrat.com/Romantic%2520couple%25202.jpg', 'http://www.cnn.com');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (39, 39, '0000-00-00', 'iPod Mini 4GB, Green', 'Like any classic fashion icon, iPod mini in kicked-up colors goes with everything: Macs, PCs, sequins and tees. And with up to 18 hours of battery life, it’ll outlast the latest trend. \r\n', 200, 'http://service.pcconnection.com/images/inhouse/5591655.jpg', 'http://www.pcconnection.com/ProductDetail?sku=5591655&SourceID=k22350');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (42, 31, '2005-10-10', 'Rawlings OLB3 Official League Recreational Play Baseball', 'As an official size and weight baseball, the Rawlings® OLB3 Recreational Play Baseball has been designed with a synthetic leather cover for easy gripping and firm handling. Its solid core cork and rubber center, and poly finish wind enhance durability.', 0, 'http://mlb.imageg.net/graphics/product_images/p182778reg.jpg', 'http://shop.mlb.com/product/index.jsp?productId=59035');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (43, 37, '0000-00-00', ' Forest Animals Stained Glass Coloring Book (Paperback)', 'Dimensions (in Inches) 5.75H x 4.25L x 0.25T\r\n', 5, 'http://ak.buy.com/db_assets/prod_images/839/30084839.jpg', 'http://www.buy.com/retail/product.asp?sku=30084839&dcaid=1688');
INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES (44, 37, '2005-10-10', 'Coral Cove Toddler Girls Lovely Flower 1 Pc Bathing Suit', 'Dive into summer with this trendy swim suit from Coral Cove! Flowers with embroidered stems and appliqued petals add pizzazz to this cheery bathing suit. Contrast straps tie together in the back to help prevent straps from sliding off the shoulder. Suit is lined in the front. Exterior is 82% nylon, 18% spandex. Lining is 100% polyester. Hand wash.\r\n', 12, 'http://store1.yimg.com/I/kidsurplus_1845_64782569', 'http://www.kidsurplus.com/bwi-40006106.html');

-- --------------------------------------------------------

-- 
-- Table structure for table `state`
-- 

CREATE TABLE `state` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `state`
-- 

INSERT INTO `state` (`id`, `name`) VALUES (1, 'active');
INSERT INTO `state` (`id`, `name`) VALUES (2, 'inactive');
INSERT INTO `state` (`id`, `name`) VALUES (3, 'add');
INSERT INTO `state` (`id`, `name`) VALUES (4, 'remove');
INSERT INTO `state` (`id`, `name`) VALUES (5, 'owe prize');
INSERT INTO `state` (`id`, `name`) VALUES (6, 'prize given');

-- --------------------------------------------------------

-- 
-- Table structure for table `style`
-- 

CREATE TABLE `style` (
  `id` smallint(6) NOT NULL default '0',
  `css` text NOT NULL,
  `template` text NOT NULL,
  `name` varchar(20) NOT NULL default '',
  `description` text NOT NULL,
  `image` varchar(20) NOT NULL default '',
  `author` varchar(20) NOT NULL default '',
  `rating` char(1) NOT NULL default '',
  `date` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `style`
-- 

INSERT INTO `style` (`id`, `css`, `template`, `name`, `description`, `image`, `author`, `rating`, `date`) VALUES (0, '/styles/default.css\r\n\r\n', '/templates/layout/default.tmpl', 'default', 'This is the plain version', 'screen1.gif', 'Anthony DeStefano', '1', '2003-08-17 00:00:00');
INSERT INTO `style` (`id`, `css`, `template`, `name`, `description`, `image`, `author`, `rating`, `date`) VALUES (1, '/styles/style_1.css\r\n\r\n', '/templates/layout/style_1.tmpl', 'plain', 'd', 'd', 'adsf', '2', '00:55:05');

-- --------------------------------------------------------

-- 
-- Table structure for table `type`
-- 

CREATE TABLE `type` (
  `id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `authorID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `type`
-- 

INSERT INTO `type` (`id`, `name`, `description`, `image`, `authorID`) VALUES (1, 'Household-Family', 'Chores based on average household family.', '', 0);
INSERT INTO `type` (`id`, `name`, `description`, `image`, `authorID`) VALUES (2, 'School-Classroom', 'Chores and activities related to teaching including Public and Private Schools.', '', 0);
INSERT INTO `type` (`id`, `name`, `description`, `image`, `authorID`) VALUES (3, 'Behavior Modification-Social work', 'Chores and activities based around Behavior Modification.', '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` mediumint(14) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `username` varchar(20) NOT NULL default '',
  `rating` varchar(10) NOT NULL default '',
  `admin` char(1) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` text NOT NULL,
  `style` smallint(6) NOT NULL default '0',
  `typeID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM AUTO_INCREMENT=74 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (37, 'Anthony', 'god', '10', '1', 'anthony.destefano@gmail.com', 'go', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (36, 'test', 'test', '3', '1', 'test@me.com', 'go', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (38, 'Anthony', 'hunter', '10', '1', 'we@stupidpeople.net', 'pupp1es', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (39, 'Alyssa', 'alyssa', '10', '0', 'BOO@hoo.com', 'test', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (40, 'nick', 'nick', '4', '', 'nicholas.destefano@gmail.com', 'nick', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (41, 'Harley', 'Harley', '10', '', 'mets82595@yahoo.com', 'go', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (69, 'Jim', 'jim', '-1', '1', 'jim@gmail.com', 'jim', 0, 2);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (70, 'kim', 'kim', '3', '0', 'kim@gmail.com', 'kim', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (71, 'Ron', 'Mr Teacher', '-1', '1', 'teacher@you.com', 'teacher', 0, 2);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (72, 'John', 'TestDad', '-1', '1', 'testdad@go.com', 'testdad', 0, 1);
INSERT INTO `user` (`id`, `name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES (73, 'Jane', 'TestMOM', '-1', '1', 'testmom@you.com', 'testmom', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_chore_rel`
-- 

CREATE TABLE `user_chore_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `choreID` mediumint(9) NOT NULL default '0',
  `frequencyID` mediumint(9) NOT NULL default '0',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `user_chore_rel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_contact`
-- 

CREATE TABLE `user_contact` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `first` varchar(100) NOT NULL default '',
  `last` varchar(100) NOT NULL default '',
  `phone` varchar(20) NOT NULL default '',
  `street` varchar(100) NOT NULL default '',
  `city` varchar(100) NOT NULL default '',
  `state` char(2) NOT NULL default '',
  `zip` varchar(100) NOT NULL default '',
  `Country` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `user_contact`
-- 

INSERT INTO `user_contact` (`id`, `userID`, `first`, `last`, `phone`, `street`, `city`, `state`, `zip`, `Country`) VALUES (1, 69, 'Jim', 'Door', '333-333-3333', '32 Someplace drive', 'Bronx', 'NY', '122223', 'us-en');
INSERT INTO `user_contact` (`id`, `userID`, `first`, `last`, `phone`, `street`, `city`, `state`, `zip`, `Country`) VALUES (2, 71, 'Ron', 'Dimitry', '323-103-3029', '3243 Grand place', 'Bx', 'NY', '125356', 'us-en');
INSERT INTO `user_contact` (`id`, `userID`, `first`, `last`, `phone`, `street`, `city`, `state`, `zip`, `Country`) VALUES (3, 72, 'John', 'Semouyr', '323-233-0333', '311 Main street', 'Glendale', 'NJ', '2353353', 'us-en');
INSERT INTO `user_contact` (`id`, `userID`, `first`, `last`, `phone`, `street`, `city`, `state`, `zip`, `Country`) VALUES (4, 73, 'Jane', 'Doe', '323-232-3232', '32 West Drive, apt 33', 'Queens', 'NY', '135332', 'uy-es');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_group_rel`
-- 

CREATE TABLE `user_group_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `familyID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `user_group_rel`
-- 

INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (6, 15, 1);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (5, 15, 2);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (4, 15, 1);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (7, 37, 1);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (8, 36, 2);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (9, 38, 1);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (10, 40, 1);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (11, 37, 2);
INSERT INTO `user_group_rel` (`id`, `userID`, `familyID`) VALUES (12, 39, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_prize_rel`
-- 

CREATE TABLE `user_prize_rel` (
  `id` mediumint(9) NOT NULL auto_increment,
  `userID` mediumint(9) NOT NULL default '0',
  `prizeID` mediumint(9) NOT NULL default '0',
  `stateID` mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=73 ;

-- 
-- Dumping data for table `user_prize_rel`
-- 

INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (71, 41, 48, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (65, 38, 34, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (67, 38, 37, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (57, 39, 37, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (56, 39, 36, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (70, 41, 36, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (72, 41, 42, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (64, 40, 47, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (48, 37, 34, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (55, 37, 41, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (12, 40, 33, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (13, 40, 31, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (63, 40, 41, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (15, 40, 34, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (66, 38, 36, 1);
INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES (69, 41, 34, 1);
