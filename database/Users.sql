CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `PrimaryNumber` varchar(13) NOT NULL,
  `Firstname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Lastname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `NationalCode` varchar(45) DEFAULT NULL,
  `Image` longblob,
  `Type` varchar(10) DEFAULT 'USER',
  `IsActive` bit(1) DEFAULT b'0',
  `Password` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;