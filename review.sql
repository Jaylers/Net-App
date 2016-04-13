-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 11:24 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviesreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewid` int(6) NOT NULL,
  `reviewname` varchar(30) COLLATE utf8_estonian_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail` varchar(20000) COLLATE utf8_estonian_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_estonian_ci NOT NULL,
  `rate` int(2) NOT NULL,
  `owner` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewid`, `reviewname`, `datetime`, `detail`, `image`, `rate`, `owner`) VALUES
(1, 'Batman2', '2016-04-13 05:28:43', 'เริ่มต้นในปี พ.ศ. 2482 (ค.ศ 1939) ค่ายพิมพ์ เนชันแนล พับบลิคเคชั่น (National Publication) (ปัจจุบันเปลี่ยนมาเป็น ดีซี คอมิคส์) ซึ่งปัจจุบันเป็นส่วนหนึ่งของบริษัท ไทม์วอร์เนอร์ (Time Warner) ได้ประสบความสำเร็จจากเรื่องซุปเปอร์แมนในต้องการตัวละครเพิ่ม บ็อบ เคน ได้สร้างตัวละครซุปเปอร์ฮีโร่ชื่อ เบิร์ดแมน (Birdman)', 'http://www.studiocity-macau.com/uploads/images/SC/Entertainment/Batman/batman_pricing_box.png', 8, 1),
(2, 'Superman', '2016-04-14 00:00:00', 'ซูเปอร์แมน คือตัวละครจากหนังสือการ์ตูนซูเปอร์ฮีโร่ ผลงานของ ดีซี คอมิคส์สำนักพิมพ์ยักษ์ใหญ่ของอเมริกา[1][2][3][4] ออกแบบโดยนักเขียนชาวอเมริกาเจอร์รี ชีเกลและนักวาดภาพชาวอเมริกาเชื้อสายแคนาดาโจ ชูสเตอร์ในปี ค.ศ. 1932 ขณะที่ทั้งคู่พักอาศัยอยู่ในเมืองคลีฟแลนด์ รัฐโอไฮโอ จนกระทั่งในปี 1938 ทั้งคู่ได้ขายผลงานชิ้นนี้ให้กับสำนักพิมพ์ ดีแทคทีฟ คอมิคส์ (ภายหลังเปลี่ยนชื่อเป็นดีซี คอมิคส์) ตัวละครนี้ได้ปรากฏตัวครั้งแรกในหนังสือแอคชั่น คอมิคส์ ฉบับที่ 1 (มิถุนายน ค.ศ. 1938) และยังถูกนำไปทำเป็นซีรีส์ทางวิทยุ ,โทรทัศน์, ภาพยนตร์, การ์ตูนช่องในหนังสือพิมพ์, และวิดีโอเกมส์ เรื่องราวของซูเปอร์แมนนั้นประสบความสำเร็จอย่างมาก ซูเปอร์แมนนั้นได้ถูกจัดอันดับให้เป็นซูเปอร์ฮีโร่ที่ยิ่งใหญ่ที่สุดของหนังสือการ์ตูนอเมริกา.[1] ซูเปอร์แมนปรากฏตัวด้วยชุดที่โดดเด่นและมีเอกลักษณ์ประจำตัวด้วยชุด สีน้ำเงิน, แดงและเหลือง รวมถึง ผ้าคลุม, และเครื่องหมายตัว"S" บนหน้าอก[5][6] สัญลักษณ์ตัว S นี้ได้กลายเป็นสัญลักษณ์ประจำตัวของซูเปอร์แมนที่นำไปใช้ในสื่อต่างๆมาจนถึงปัจจุบัน[7]', 'https://upload.wikimedia.org/wikipedia/th/7/72/Superman.jpg', 7, 2),
(3, 'ธอร์ เทพเจ้าสายฟ้า	 ', '2016-04-13 11:20:35', '	ตัวละครเอกของเรื่องนี้คือ ธอร์ (คริส เฮมส์เวิร์ธ) ทายาทเทพเจ้าซึ่งเป็นนักรบผู้แกร่งกล้าแต่หยิ่งทะนง ผู้ซึ่งการกระทำไร้การยั้งคิดของเขาได้จุดเพลิงสงครามโบราณให้ลุกโชนขึ้นมาอีกครั้ง ธอร์ถูก โอดิน (แอนโธนี ฮ็อปกินส์) เทพบิดาของเขาขับไล่ลงมาสู่โลกมนุษย์ และจำต้องใช้ชีวิตอยู่ท่ามกลางมวลมนุษย์ เจน ฟอสเตอร์ (นาตาลี พอร์ตแมน) นักวิทยาศาสตร์สาวสวย ได้กลายเป็นรักแรกของเขา ระหว่างที่อยู่บนโลกมนุษย์นี้เองที่ธอร์ได้เรียนรู้ว่า การเป็นวีรบุรุษที่แท้จริงนั้นเป็นเช่นไรเมื่อวายร้ายที่อันตรายที่สุดจากโลกของเขาได้ส่งกองกำลังที่เก่งกล้าสามารถที่สุดของแอสการ์ดมาจู่โจมโลกมนุษย์', 'http://i.imgur.com/Bmg3j3X.jpg', 9, 1),
(4, 'มหาประลัยคนเกราะเหล็ก 2', '2016-04-13 11:21:36', 'เรื่องราวภาคต่อที่คนทั่วโลกได้ทราบกันแล้วว่า มหาเศรษฐียอดนักประดิษฐ์อาวุธ โทนี่ สตาร์ค (แสดงโดย โรเบิร์ต ดาวน์นี่ย์) เปิดเผยตัวเองว่าเขาคือไอรอนแมน ซูเปอร์ฮีโร่ที่ช่วยปกป้องโลก เขาได้รับแรงกดดันจากทางรัฐบาล สื่อมวลชน และสาธารณชนต่าง ๆ ให้เปิดเผยเทคโนโลยีในการสร้างไอรอน แมน ให้กับกองทัพ แต่โทนี่เองกลับไม่ต้องการที่จะเผยความลับที่ซ่อนอยู่เบื้องหลังเกราะเหล็ก นี้ เนื่องจากกลัวว่าเทคโนโลยีนี้จะตกไปอยู่ในมือของคนชั่ว มีเพียงสาวคนสนิท เพพเพอร์ พอทส์ (แสดงโดย กวินเนท พัลโทรว์) และเพื่อนตายอย่าง เจมส์ "โรดดี้" โรดส์ (แสดงโดย ดอน ชีเดล) เท่านั้นที่เห็นด้วยกับเขา โทนี่จึงพยายามคิดค้นพัฒนาชุดเกราะเหล็กขึ้นใหม่ เพื่อเตรียมรับมือกับศัตรูหน้าใหม่ที่กำลังจะปรากฏ', 'https://www.mastermovie-hd.com/wp-content/uploads/2014/06/Iron-Man-2-%E0%B9%84%E0%B8%AD%E0%B8%A3%E0%B8%AD%E0%B8%99%E0%B9%81%E0%B8%A1%E0%B8%99-%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%84%E0%B8%99%E0%B9%80%E0%B8%81%E0%B8%A3%E0%B8%B2%E0%B8%B0%E0%B9%80%E0%B8%AB%E0%B8%A5%E0%B9%87%E0%B8%81-e1402855089823.jpg', 8, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
