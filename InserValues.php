<?php

$query ='CREATE TABLE `resultmanagmentsystem`.`Variables` ( `ID` INT(3) NOT NULL AUTO_INCREMENT , `Type` VARCHAR(255) NOT NULL , `Width` INT(3) NOT NULL , `Decimals` INT(255) NOT NULL , `Label` TEXT CHARACTER SET hebrew COLLATE hebrew_general_ci NOT NULL , `Values` VARCHAR(255) NOT NULL DEFAULT 'None' , `Missing` VARCHAR(255) NOT NULL DEFAULT 'None' , `Columns` INT(3) NOT NULL , `Align` VARCHAR(255) NOT NULL , `Measure` VARCHAR(255) NOT NULL , `Role` VARCHAR(255) NOT NULL DEFAULT 'Input' , `Tags` VARCHAR(255) NOT NULL , `Abbreviation` VARCHAR(255) NOT NULL , `Name` VARCHAR(255) NOT NULL , hadchosen INT(10) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = MyISAM;';

//$query1 = 'INSERT INTO `variables` (`ID`, `Type`, `Width`, `Decimals`, `Label`, `Values`, `Missing`, `Columns`, `Align`, `Measure`, `Role`, `Tags`, `Abbreviation`, `Name`) VALUES (NULL, 'String', '324', '0', '', 'None', 'None', '8', 'Left', 'Nominal', 'Input', 'student, Talmed, Stud', 'student', 'student');';
?>
