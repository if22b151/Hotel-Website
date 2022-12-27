-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2022 at 02:21 AM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `fk_userid`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `fk_roomtypeid` int(11) NOT NULL,
  `fk_optionsid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reservation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `arrive_day` date NOT NULL,
  `depart_day` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(3) NOT NULL,
  `plz` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsid` int(11) NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `release_date` date NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(127) NOT NULL,
  `article_title` text NOT NULL,
  `article_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsid`, `fk_userid`, `release_date`, `image_path`, `article_title`, `article_text`) VALUES
(2, 0, '2022-12-26', '/news/1672017478.jpg', 'Städte von Morgen', 'Schon heute können Sie in unserem Hotel den Städten der Zukunft nähertreten! \r\n\r\nFestgehalten auf großflächigem Aquarell sind diese über die nächsten 4 Wochen als Teil der Ausstellung \"Städte von Morgen: Eine Visio\" großzügig an den Wänden unseres Interieurs verteilt. \r\nBuchen Sie noch heute und lassen Sie sich von diesen atemberaubenden Zukunftsvisionen inspirieren! \r\n\r\n- Ihr Hotel-Team');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionsid` int(11) NOT NULL,
  `pet` tinyint(1) NOT NULL,
  `parking_spot` tinyint(1) NOT NULL,
  `breakfast` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Personid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Personid`, `firstname`, `lastname`, `gender`) VALUES
(7, 'Casimir', 'Caselatto', 'male'),
(12, 'Carsten', 'Carlington', 'male'),
(14, 'James', 'Robinson', 'male'),
(15, 'Chloe', 'Harris', 'other'),
(16, 'William', 'Johnson', 'female'),
(17, 'Mason', 'Smith', 'male'),
(18, 'Ava', 'Martinez', 'male'),
(19, 'Ella', 'Martinez', 'other'),
(20, 'Victoria', 'Harris', 'female'),
(21, 'Emma', 'Miller', 'male'),
(22, 'Grace', 'Martinez', 'other'),
(23, 'Ava', 'Davis', 'other'),
(24, 'Avery', 'Miller', 'male'),
(25, 'Noah', 'Jones', 'male'),
(26, 'Ava', 'Davis', 'male'),
(27, 'William', 'Johnson', 'other'),
(28, 'Elijah', 'Thomas', 'other'),
(29, 'Olivia', 'Robinson', 'male'),
(30, 'William', 'Thomas', 'female'),
(31, 'Logan', 'Robinson', 'other'),
(32, 'Logan', 'Moore', 'other'),
(33, 'Liam', 'Thompson', 'other'),
(34, 'Chloe', 'Garcia', 'male'),
(35, 'Benjamin', 'Garcia', 'female'),
(36, 'Liam', 'Harris', 'other'),
(37, 'Avery', 'Thompson', 'other'),
(38, 'Mason', 'Garcia', 'female'),
(39, 'Chloe', 'Martinez', 'female'),
(40, 'Victoria', 'Davis', 'male'),
(41, 'Ava', 'Davis', 'female'),
(42, 'Ava', 'Brown', 'male'),
(43, 'Emma', 'Garcia', 'other'),
(44, 'Keluarga1', 'Admanum', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `roomtypeID` int(11) NOT NULL,
  `bezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `fk_personid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL COMMENT 'hashed',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fk_personid`, `username`, `password`, `email`) VALUES
(0, 44, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'admin@admin.admin'),
(1, 7, 'hotCasi27', 'a0829e106b4f6024b591d49acd3460b86cd0eca8a66779c0ac20eae0c23d390d2f35118cf1f49a9588f2f0680d7524bb7444e7d40eb9192baaa251028021a56c', 'hotCasi27@hotmail.com'),
(2, 12, 'hotCarsten99', 'b4d44fb5c40924e64be94aa2d1db43dafd0134bf4fd3d9b17abff3e8bdf982e0388aa41d07e74b36c46ecc3607369ca2e18b71b3c6b15180b37966019c77facc', 'hotCarsten99@hotmail.com'),
(3, 14, 'JamesRobinson27', 'ae11a0461d1a25aa54903637b49831cf69bbde9514410543b9d511be1d542eb250bbe4f7e9bf2db88d9963d13eb34f53a5be930198df5018c46f1cb62bf4c11b', 'JamesRobinson27@imaginary.com'),
(4, 15, 'ChloeHarris26', 'c6562ff0e51fe875f3476813401ee7fe7cbaf6de9f7de4e9dcdb9104213c6a5dfc6c2a63ba419a47ca3144b0005f6abdc13132624ea8c2678c93cba75fbdcc83', 'ChloeHarris26@imaginary.com'),
(5, 16, 'WilliamJohnson29', '7400a16dd2ff014978d7adda6d0c869af0a674a1e905d720e432eda869a73a821eea1a50b83047fa37ed0b984ffe4f31feaad82b2c0f5c35c7bdcf2c76d4310e', 'WilliamJohnson29@imaginary.com'),
(6, 17, 'MasonSmith53', 'f0bd4e1dbbe586cbac36d22bcb7b5bee5798ef20a114ea68fb628bc21237fbc83516ac7143a80350bb14778fd6e438d42a038c686dc17c1b8b650fb0180a9966', 'MasonSmith53@imaginary.com'),
(7, 18, 'AvaMartinez45', '58be082dbad74b64b3634d34bc9e46fe1ed3297e3f11b8671696d6b5d198c6548f3089c7564792d0edc5dc0aff1a0f311182b3ffa0f7549441b9826571b0806d', 'AvaMartinez45@imaginary.com'),
(8, 19, 'EllaMartinez3', '385cdd2a451ddf23f731cd75428d26ced4ddac1a14e94e6c786f0af2ffb0c9f3ec70d6a21a50e91feb7651037a0dc18130594d903b55083521494096aa1c1fd3', 'EllaMartinez3@imaginary.com'),
(9, 20, 'VictoriaHarris11', 'f0e7b1225551d5a5a2c0edf5e6439cc07572d54496e668cc24824a020ac474319196b1453371f451bb0cafc756771bd21363a69811d1080ca419cdb4f678a586', 'VictoriaHarris11@imaginary.com'),
(10, 21, 'EmmaMiller52', '5c27b9957984eac8d51573ed02ae4730d2d04408825b5022f0b0ae7d37c7c38b7ed46c379230dd950c3895613468741002370d2f66523b7c9efbe79633ee30a3', 'EmmaMiller52@imaginary.com'),
(11, 22, 'GraceMartinez23', 'b26f088335a784f0261baa41e3a42fdc0a404fdd4bed8ece1bf3c6571180acb458c133aa6152d661712aad8bc1e3c9bd107b94365fbff7d832d7b3926187c9c3', 'GraceMartinez23@imaginary.com'),
(12, 23, 'AvaDavis56', 'ef007eec9d55e5133d7b8e37677636ec252820831c8fa8e68c8506ff109ba550e9127dc27f8ea10ba8d171ef06bb753ffec6d0eb4bced51f15d60b187ae1e0b3', 'AvaDavis56@imaginary.com'),
(13, 24, 'AveryMiller6', 'fe0aa83cf1509abb74e636a248d832cd1238e6761bfa476588c95a014c3e64d317981477fd2c37a187e6124886fdfd2fd36ab64c02a2d68c07ed57b754480168', 'AveryMiller6@imaginary.com'),
(14, 25, 'NoahJones5', '0a66ccd9e55557e56758b6f6aa4210333255bda90e0e4e34713568c78dc2d1771b704b5b178b0a517dfbf1a9d5e12625a366768889f826634d79a6d134623c07', 'NoahJones5@imaginary.com'),
(15, 26, 'AvaDavis8', '30573b9a29cb6f957bcb164c84ced3fc67d556834661f33ff8c1c143086d9763379203335aceb4c4bf92483c618c8694612b88398667ec7092d8c8ef13c51a6e', 'AvaDavis8@imaginary.com'),
(16, 27, 'WilliamJohnson85', '935ccf275f44899e4423ac560d24f7262df7d330d5828be40816616201fc4380124ad042600999cffb06574b343d7726a875669fa38de3eb92f1b7c6d347ab4b', 'WilliamJohnson85@imaginary.com'),
(17, 28, 'ElijahThomas8', 'b50ebfe336486b460b593e3116414976920bd3a3f3429cf67675ee2cbf385db947cdb5fc4dc435fd7ae579980067968698ac42c5a780dfe5a5c9ec8dd5869864', 'ElijahThomas8@imaginary.com'),
(18, 29, 'OliviaRobinson72', 'c20b51654dd73b87c63f6adc71121a24aa6c77f1fbf0e8767903bbf8cfc7ffe81a2764c0690824ef620f831a93a0b1d7c1705deb957da15e6567d226f6f45812', 'OliviaRobinson72@imaginary.com'),
(19, 30, 'WilliamThomas92', 'bb6e9d565109f350657e0a833d2fe180c577397707c378ab269eed6d493b53104a9f8f9479183e18dbd873b8fc1f4ed2407425d25c3f93c8eec2cb1faeeaf7e4', 'WilliamThomas92@imaginary.com'),
(20, 31, 'LoganRobinson43', 'f8cfa79ccd6a969e7e71033bf58b2de8826d54c198804224a4508a8e21df27c3e04e61314b3842c5efd3b9f36c76dc5c3c363806a8f0cdfd9ce8ba4ce3ade57d', 'LoganRobinson43@imaginary.com'),
(21, 32, 'LoganMoore7', '194409eb22ba89d97c226aff17a05704e0dbadebc221c73adfa267bb32f13285d31cd8d2cf40e78de76910b637ad8afdfcd723b03fdbd2b1b44f56d5d417406b', 'LoganMoore7@imaginary.com'),
(22, 33, 'LiamThompson75', 'aacb35ae2f8f322845dcd38ae0f3f7645d614d820e6491ad53953668b754a0665d346ad250b797722e6af74404ce409fe54a724bc88caf9e55b87f34e9171dba', 'LiamThompson75@imaginary.com'),
(23, 34, 'ChloeGarcia85', '59e9cb74fd0aa77336d265bef3d61466bbe9fbe311ea2e8643e1fd44df91b2db6fd9180258a51d910abe70dd2df20899b3ca64e6e46a6525e671ddf65bd45e8c', 'ChloeGarcia85@imaginary.com'),
(24, 35, 'BenjaminGarcia3', '0f8fc63a42c0ecba0b835b799ca777e2208a2cc370d4918cb5265c2c53d9b5178f496df3e410beed3001c121a8c23168a9ac46ef22d14d386652a7bcdcb50289', 'BenjaminGarcia3@imaginary.com'),
(25, 36, 'LiamHarris46', '288b71cbbc3b3ded504e6e33708d2445ef0c1173788ad15d46d8717b12c6038103b3a364e360e07723c91f9736afb8a079f6e4a177acaed4c22afffa96317d69', 'LiamHarris46@imaginary.com'),
(26, 37, 'AveryThompson73', 'b6939104c5eab7181a7768065076310ac3fa713f3d97f37670ac41d7b570071013bf997c3360769d0df459e43fecdcb1afc2e55255ffa69e426e107180fd49a8', 'AveryThompson73@imaginary.com'),
(27, 38, 'MasonGarcia38', '7c7d7dcefddfebba31e59a06eec090795ef2328114bfdd806850e720c8df0fbce70f2c12a71e4b51ac91f8f0b07c3389aba27a928a8fc27601ba34061b46377c', 'MasonGarcia38@imaginary.com'),
(28, 39, 'ChloeMartinez72', '1b6b679a36bcd40fa1a3f20f2c95aaaaf719b1785aa38b83df57efb2bcdd85f978030c16eab860f46ae0af888cdc095c683725647bd64ab46b4839c426c61d66', 'ChloeMartinez72@imaginary.com'),
(29, 40, 'VictoriaDavis78', 'eae86a18b9926492f94c25678c4f21d7b71f0e70dc16e92b87a0ca2ebdbd846f6d219c75f8b614bba5e03ba3db454d6c7fad7619c8ca0276f9552caf86289da1', 'VictoriaDavis78@imaginary.com'),
(30, 41, 'AvaDavis9', '745a30ff54f57dc24afbdb420c59a8c2fe4ebf6b0172733e53f8ffec382960ba4bc7f15b0aa65ca8fdfb45a27aff574777f8066379e909692e5898a3ae1cc8a4', 'AvaDavis9@imaginary.com'),
(31, 42, 'AvaBrown13', '2ae54b86291b6c67be6b0467f6fbf236d4305efe67c44581f1a4b0da3f9c1126f3748cbe7a1b941e528a3ab24492365568211cecb0d2a0dafb39dc7812d6de6d', 'AvaBrown13@imaginary.com'),
(32, 43, 'EmmaGarcia85', 'e25c40ee4dc5238b154feea241e98e929c777f3d74c6c08c8cd1936c54c9531b81d853733547ad13a39403b5acfd24ac982087540f484cce4f5a9e99b411c61e', 'EmmaGarcia85@imaginary.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD KEY `fk_userid` (`fk_userid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `booking_ibfk_1` (`fk_userid`),
  ADD KEY `booking_ibfk_3` (`fk_optionsid`),
  ADD KEY `booking_ibfk_4` (`fk_roomtypeid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`),
  ADD KEY `news_ibfk_1` (`fk_userid`),
  ADD KEY `ix_news_date` (`release_date`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionsid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Personid`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`roomtypeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `user_ibfk_1` (`fk_personid`),
  ADD KEY `ix_username` (`username`),
  ADD KEY `ix_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `Personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `roomtypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`fk_optionsid`) REFERENCES `options` (`optionsid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`fk_roomtypeid`) REFERENCES `room_type` (`roomtypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`fk_userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fk_personid`) REFERENCES `person` (`Personid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;