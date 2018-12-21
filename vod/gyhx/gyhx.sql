-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-04-22 17:35:46
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gyhx`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `messageID` int(32) NOT NULL,
  `messageTitle` varchar(64) NOT NULL,
  `messageContent` varchar(512) NOT NULL,
  `messageImgAdd` varchar(64) NOT NULL,
  `messageType` int(8) NOT NULL,
  `messageDateTime` int(64) NOT NULL,
  `messageName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`messageID`, `messageTitle`, `messageContent`, `messageImgAdd`, `messageType`, `messageDateTime`, `messageName`) VALUES
(7, '正紧的走进景区1', '古堰画乡景区，位于浙江省丽水市莲都区碧湖镇和大港头镇境内，距丽水市区二十公里，核心区块包括大港头、堰头、坪地和保定范围，历史文化积淀深厚，氛围浓厚。龙丽、丽龙高速公路在此有出口，53，50省道贯穿全境，通过金温铁路丽水站接轨全国铁路大动脉，交通便捷，距中国最大的小商品城义乌只有100多公里。古堰画乡把一个生态和人文的丽水完整地传达给世人。', 'image/message_img/152415621267384.jpg', 1, 1524156212, 'root'),
(8, '景点对焦正紧的1', '古堰画乡庙会活动首先举行抬龙王、穆龙的雕像和高举历代先贤画像的游行队伍，以及跑马灯、荷花灯、打莲香、篾龙、布龙、狮子灯、腰鼓等多支文艺队伍，共277人。古堰先贤巡游队伍和文艺踩街队伍从保定村出发,沿古堰画乡游步道到堰头村龙庙返回到古堰画乡码头。举行了隆重的祭拜古堰先贤仪式。然后，丽水鼓词、处州乱弹(班师回朝、八仙镇水牛)、翻龙泉、跑马灯、荷花灯等队伍现场进行了现场表演。观众达10000余人。', 'image/message_img/152415653338056.jpg', 2, 1524156533, 'root'),
(9, '景点对焦正紧的2', '双龙庙会的举办是了为贯彻落实党中央“保护发展文化遗产，共建精神家园”的指示，根据《通济堰规》关于“祀龙王、司马、丞相，所以报功”的规定，为了秉承1500年“祭拜先贤贯彻堰规保堰护堰”的优良传统，弘扬中华民族天地人和团结奋斗的伟大精神，继承通济堰优良传统，弘扬爱国爱堰，艰苦奋斗伟大精神，为推进丽水旅游事业作出贡献，并为2011年双龙庙会申报省级“非遗”作好准备。在中断60多年后的今天举行庙会活动，隆重祭拜龙王，祭拜詹南二司马、何澹等24位修堰先贤和为修堰牺牲的穆龙公，具有现实和深远的历史意义，很受当地百姓欢迎。', 'image/message_img/152415660220953.jpg', 2, 1524156602, 'root'),
(10, '文化产业正紧的1', '古堰画乡庙会活动首先举行抬龙王、穆龙的雕像和高举历代先贤画像的游行队伍，以及跑马灯、荷花灯、打莲香、篾龙、布龙、狮子灯、腰鼓等多支文艺队伍，共277人。古堰先贤巡游队伍和文艺踩街队伍从保定村出发,沿古堰画乡游步道到堰头村龙庙返回到古堰画乡码头。举行了隆重的祭拜古堰先贤仪式。然后，丽水鼓词、处州乱弹(班师回朝、八仙镇水牛)、翻龙泉、跑马灯、荷花灯等队伍现场进行了现场表演。观众达10000余人。', 'image/message_img/152415677236716.jpg', 3, 1524156772, 'root'),
(11, '文化产业正紧的2', '古堰画乡庙会活动首先举行抬龙王、穆龙的雕像和高举历代先贤画像的游行队伍，以及跑马灯、荷花灯、打莲香、篾龙、布龙、狮子灯、腰鼓等多支文艺队伍，共277人。古堰先贤巡游队伍和文艺踩街队伍从保定村出发,沿古堰画乡游步道到堰头村龙庙返回到古堰画乡码头。举行了隆重的祭拜古堰先贤仪式。然后，丽水鼓词、处州乱弹(班师回朝、八仙镇水牛)、翻龙泉、跑马灯、荷花灯等队伍现场进行了现场表演。观众达10000余人。', 'image/message_img/152415682584698.jpg', 3, 1524156825, 'root'),
(12, '不正经的消息1', '不正经的内容1', 'image/message_img/152415701591026.jpg', 1, 1524157015, 'root'),
(13, '不正经3', '不正经的内容3', 'image/message_img/152415773853569.jpg', 3, 1524157738, 'root'),
(14, '第三类', 'threemessage', 'image/message_img/152423964053769.jpg', 3, 1524239640, 'root');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userID` int(16) NOT NULL COMMENT '用户ID',
  `userName` varchar(64) NOT NULL COMMENT '用户名',
  `userPassWord` varchar(64) NOT NULL,
  `iconAdd` varchar(128) NOT NULL COMMENT '头像地址',
  `class` int(8) NOT NULL COMMENT '等级',
  `phoneNum` varchar(64) NOT NULL COMMENT '手机号码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPassWord`, `iconAdd`, `class`, `phoneNum`) VALUES
(1, 'root', 'e10adc3949ba59abbe56e057f20f883e', 'image/user_icon/root.jpg', 2, 'image/user_icon/152370996396025.png'),
(2, 'wjrccc', '9097c077ce7fde526c049885ede55237', 'image/user_icon/152371065213372.jpg', 1, '18357790241'),
(4, '申请的管理员2', 'e10adc3949ba59abbe56e057f20f883e', 'image/user_icon/152433219516731.jpg', 1, '18357790241'),
(5, 'sq1', 'e10adc3949ba59abbe56e057f20f883e', 'image/user_icon/152433231619711.jpg', 1, '18357790241');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD UNIQUE KEY `messageID` (`messageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(16) NOT NULL AUTO_INCREMENT COMMENT '用户ID', AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
