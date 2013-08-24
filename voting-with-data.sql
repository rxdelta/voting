-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2013 at 02:46 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting`
--
CREATE DATABASE IF NOT EXISTS `voting` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `voting`;

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `updatepass`(
      userID int(10),  
      oldpass VARCHAR(45),
      newpass VARCHAR(45)
) RETURNS tinyint(1)
    READS SQL DATA
BEGIN
  DECLARE no_more_rows BOOLEAN;
  DECLARE oldvote VARCHAR(45);
  DECLARE votes_cur CURSOR FOR
    SELECT
        `vote`
    FROM `uservote`
    WHERE `userID` = userID;

  if @@error_count!=0 or @@warning_count!=0 then
    return false;
  end if;
  
  set @check=(select `ID` from `user` where `ID`=userID and `password`=md5(concat(`username`,oldpass)));  
  if @@error_count!=0 or @@warning_count!=0  or @check <=0 then
    return false;
  end if;
  insert into `tmppasschange` (select userID,`electionID`,`candidateID`,md5(concat(`electionID`,`candidateID`,oldpass)) from vote);
  if @@error_count!=0 or @@warning_count!=0 then
    return false;
  end if;
  set @votescount=(SELECT
        count(`vote`)
    FROM `uservote`
    WHERE `userID` = userID);
  
  if @votescount>0 then  
      the_loop: LOOP
        FETCH  votes_cur    INTO   oldvote;
        IF no_more_rows THEN
            CLOSE votes_cur;
            LEAVE the_loop;
        END IF;

        set @newvote = (select md5(concat(`electionID`,`candidateID`,newpass)) from tmppasschange where `vote` = oldvote);
        update `uservote` set `vote` = @newvote where `vote`=oldvote;
        
        if @@error_count!=0 or @@warning_count!=0 then
          return false;
        end if;
      END LOOP the_loop;  
  end if;
  
  delete from `tmppasschange` where `userID` = userID;
  if @@error_count!=0 or @@warning_count!=0 then
    return false;
  end if;

  update user set `password` = md5(concat(`username`,newpass)) where `ID` =userID;
  if @@error_count!=0 or @@warning_count!=0 then
    return false;
  end if;
   
  return true; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8_persian_ci DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`ID`, `name`, `description`, `deleted`) VALUES
(1, 'محمد ابراهیمی', 'مدیرعامل انجمن سمپاد', NULL),
(2, 'محمود بافقی', 'کاندیدای انتخابات چهارم', NULL),
(3, 'علی بحری زاده', 'کاندیدای انتخابات چهارم', NULL),
(4, 'حامد بهادرزاده', 'کاندیدای انتخابات چهارم. فارغ التحصیل ۱۳۸۴', NULL),
(5, 'سمانه جعفری زاده', 'کاندیدای انتخابات چهارم', NULL),
(6, 'هادی خبیری', 'کاندیدای انتخابات چهارم', NULL),
(7, 'علی رفیع‌فر', 'کاندیدای انتخابات چهارم', NULL),
(8, 'محمد مهدی روشنی', 'کاندیدای انتخابات چهارم', NULL),
(9, 'سید محمدعلی مدرسی', 'کاندیدای انتخابات چهارم', NULL),
(10, 'منیره منتظری', 'کاندیدای انتخابات چهارم', NULL),
(11, 'محسن شریفی', 'کاندیدای انتخابات چهارم (بازرس)', NULL),
(12, 'امیرحسین عطائیان', 'کاندیدای انتخابات چهارم (بازرس)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `electingNumber` int(10) DEFAULT NULL,
  `name` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8_persian_ci DEFAULT NULL,
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ID`, `electingNumber`, `name`, `description`, `startTime`, `endTime`, `deleted`) VALUES
(1, 5, 'انتخابات هیئت مدیره انجمن', 'چهارمین دوره انتخابات هیات مدیره <br/> انجمن دانش‌آموختگان استعدادهای درخشان', '2013-08-27 07:00:00', '2013-08-27 11:00:00', NULL),
(2, 1, 'انتخابات بازرس هیئت مدیره انجمن', 'چهارمین دوره انتخابات بازرس هیات مدیره <br/> انجمن دانش‌آموختگان استعدادهای درخشان', '2013-08-27 07:00:00', '2013-08-27 11:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmppasschange`
--

CREATE TABLE IF NOT EXISTS `tmppasschange` (
  `userID` int(10) NOT NULL,
  `electionID` int(10) NOT NULL,
  `candidateID` int(10) NOT NULL,
  `vote` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`userID`,`electionID`,`candidateID`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `roll` enum('admin','user') COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `username`, `password`, `roll`) VALUES
(1, 'admin', 'admin', '761f749e2a021829f7dfe2dede3eb283', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `userID` int(11) NOT NULL,
  `type` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `data` varchar(2000) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `unique` (`userID`,`type`),
  KEY `fk_userdata_1` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uservote`
--

CREATE TABLE IF NOT EXISTS `uservote` (
  `userID` int(11) NOT NULL,
  `electionID` int(11) NOT NULL,
  `vote` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`userID`,`electionID`),
  KEY `fk_uservote_1` (`userID`),
  KEY `fk_uservote_2` (`electionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `electionID` int(10) NOT NULL,
  `candidateID` int(10) NOT NULL,
  `vote` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`electionID`,`candidateID`),
  KEY `fk_vote_1` (`electionID`),
  KEY `fk_vote_2` (`candidateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`electionID`, `candidateID`, `vote`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 10, 0),
(2, 11, 0),
(2, 12, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `fk_userdata_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uservote`
--
ALTER TABLE `uservote`
  ADD CONSTRAINT `fk_uservote_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uservote_2` FOREIGN KEY (`electionID`) REFERENCES `election` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_vote_1` FOREIGN KEY (`electionID`) REFERENCES `election` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vote_2` FOREIGN KEY (`candidateID`) REFERENCES `candidate` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
