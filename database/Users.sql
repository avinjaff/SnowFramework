--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(13) NOT NULL,
  `Firstname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Lastname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `NationalCode` varchar(45) DEFAULT NULL,
  `BinImage` longblob,
  `Type` varchar(10) DEFAULT 'USER',
  `IsActive` bit(1) DEFAULT b'0',
  `HashPassword` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`);


ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
