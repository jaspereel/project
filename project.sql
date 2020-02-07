-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `name`, `account`, `password`) VALUES
(1, '管理者', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- 資料表結構 `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_date` date NOT NULL,
  `customer_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_require` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_flag` int(11) NOT NULL,
  `reply_date` date NOT NULL,
  `reply_person` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `contact`
--

INSERT INTO `contact` (`id`, `customer_date`, `customer_name`, `customer_email`, `customer_phone`, `customer_require`, `reply_flag`, `reply_date`, `reply_person`, `reply_content`) VALUES
(2, '2020-01-27', 'jasper', 'linux8376@gmail.com', '0912345678', '測試用訊息!', 1, '2020-01-29', '管理者', '回覆訊息0248');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `last_name`, `first_name`, `gender`, `birthday`, `phone`, `address`) VALUES
(2, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '李', '品賢', '男', '2019-12-30', '0912345678', '新北市泰山區致遠新村55之1號'),
(4, 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '李', '大明', '男', '2020-01-01', '0900000123', '新北市泰山區致遠新村55之1號'),
(5, 'test1@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '白', '老鼠', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(6, 'test2@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '王', '大熊', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(7, 'test3@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(8, 'test4@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(9, 'test5@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(10, 'test6@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(11, 'test7@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(12, 'test8@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號'),
(13, 'test9@test.com', '81dc9bdb52d04dc20036dbd8313ed055', '測', '試者', '男', '2020-01-01', '0987878787', '新北市泰山區致遠新村55之1號');

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_picture_url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `title`, `start_day`, `end_day`, `content`, `title_picture_url`) VALUES
(5, '【住房專案】新春住房專案，過年來台北玩首選J’s Hotel！', '2020-01-10', '2020-01-24', '<p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">方案說明│2020新春住房專案</span></p></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">活動期間：</span>2020.01.23(小年夜)～<span class=\"ql-color-#2d2926\" style=\"outline: none;\">2020.01.29(年初五)</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">適用對象：</span>透過官網訂房之自由行住宿，始符合補助資格</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">專案房價：</span><span style=\"outline: none; font-weight: normal;\">二人成行，含早餐者每晚每房</span><span style=\"outline: none; font-weight: 700;\">&nbsp;</span>NT$3,000 + 10% 元起</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"letter-spacing: 1.4px; outline: none;\">二人成行，不含早餐</span><span style=\"letter-spacing: 1.4px;\">每晚</span><span style=\"letter-spacing: 1.4px; outline: none;\">每房</span><span style=\"letter-spacing: 1.4px; outline: none; font-weight: 700;\">&nbsp;</span><span style=\"letter-spacing: 1.4px;\">NT$2,600 + 10% 元起</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"letter-spacing: 1.4px; font-weight: 700;\">專案內容：</span><br></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"font-weight: 700; letter-spacing: 1.4px;\">專案好禮：</span><span style=\"letter-spacing: 1.4px; font-weight: normal;\">九吋米老鼠玩偶一隻或知名品牌聯名新春福袋一個(二選一)</span><span style=\"letter-spacing: 1.4px;\"><br></span><br></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">注意事項：</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">1. 訂房相關問題歡迎致電訂房組詢問。</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">2. 專案期間入住響應環保住宿者(僅補充MINI BAR.更換毛巾及清潔垃圾桶)，不續住打掃者，每房現折<span style=\"letter-spacing: 1.4px;\">NT$200元</span><span style=\"letter-spacing: 1.4px;\">。(請於入住時告知櫃台CHECK IN人員)。</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">3. 本專案不得與其他優惠方案併行使用。</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">4. 升等房型，需補貼房型差額<span class=\"ql-color-#2d2926\" style=\"outline: none;\">。</span></p><p><p></p><p></p><p></p></p>', '1579048205_cnyroom.jpg'),
(13, '【國旅優惠】秋冬遊補助延長 享NT$1,000住宿補助及NT$200夜市抵用券', '2020-01-15', '2020-01-31', '<p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">方案說明│交通部觀光局擴大國旅秋冬遊住宿優惠</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">活動期間：</span>2019.09.01～<span class=\"ql-color-#2d2926\" style=\"outline: none;\">2020.01.31</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">適用日期：</span>平日（周日至周五），周六與國定連續假期不適用</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">適用對象：</span>透過官網訂房之自由行住宿，始符合補助資格</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">補助金額：</span>國人不分年齡皆可享 ▶ 每房每晚最高折抵NT$1,000</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\"><span style=\"outline: none; font-weight: 700;\">注意事項：</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">1. 詳細申請流程請上交通部觀光局活動專頁（<a href=\"https://fallwintertour.tbroc.gov.tw/\" target=\"_blank\" style=\"outline: none; color: rgb(45, 41, 38);\">https://fallwintertour.tbroc.gov.tw/</a>）查詢。</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">2.&nbsp;<span class=\"ql-color-#2d2926\" style=\"outline: none;\">使用住宿券、預訂團購專案、環台呷GOGO專案、第三方線上訂房平台、公司行號恕不適用；旅行社國旅訂房請向各旅行社洽詢。</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">3. 每位民眾憑身分證字號限享有1次優惠（折抵1房1晚的住宿費）。</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">4.&nbsp;<span class=\"ql-color-#2d2926\" style=\"outline: none;\">旅客需於入住前或入住當日至「擴大國旅秋冬遊住宿」活動專區（</span><a href=\"https://fallwintertour.tbroc.gov.tw/customer_apply_page\" target=\"_blank\" class=\"ql-color-#2d2926\" style=\"outline: none; color: rgb(45, 41, 38);\">https://fallwintertour.tbroc.gov.tw/customer_apply_page</a><span class=\"ql-color-#2d2926\" style=\"outline: none;\">），掃描並上傳身分證、健保卡或駕照（任一）正面圖檔，建立旅客資料檔案。</span></p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">5. 入住時請提供身分證、健保卡或駕照予櫃檯人員核對身分，以確保補助權益。</p><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">6. 為使補助流程順暢，請自行備妥證件影本，並於入住當天完成補助程序，逾時恕不受理。</p><h3 style=\"outline: none; font-size: 16px; line-height: 1.5; letter-spacing: 1.6px; padding-bottom: 10px; margin-block-start: 0px; margin-block-end: 0px; font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif;\"><span class=\"ql-color-#2d2926\" style=\"outline: none; font-weight: 700; background-color: inherit; color: rgb(255, 0, 0);\">7. 經濟部加碼限額夜市抵用券已發放完畢。</span></h3><p style=\"outline: none; margin-block-start: 0px; margin-block-end: 0px; padding-bottom: 14px; color: rgb(45, 41, 38); font-family: &quot;Noto Sans TC&quot;, &quot;Noto Sans SC&quot;, &quot;Noto Sans&quot;, &quot;Noto Sans JP&quot;, &quot;Noto Sans KR&quot;, &quot;PingFang TC&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; letter-spacing: 1.4px;\">8. 活動服務諮詢專線：台北市02 – 27219730、02 – 27587207；新北市02 – 29603456 分機 4174；宜蘭縣03 – 9251000 分機 3881-3883、3885、3886、1881。</p>', '1579063342_2020.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_person` int(11) NOT NULL,
  `room_size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_stock` int(11) NOT NULL,
  `bed_size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `picture_url_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_url_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_url_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_url_4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `room`
--

INSERT INTO `room` (`id`, `name`, `max_person`, `room_size`, `total_stock`, `bed_size`, `price`, `picture_url_1`, `picture_url_2`, `picture_url_3`, `picture_url_4`, `introduction`, `equipment`) VALUES
(1, '經典雙人房(單床)', 2, '15.2～16.4㎡', 10, '140 × 200 ㎝', 3000, 'A1.jpg', 'A2.jpg', 'A3.jpg', 'A4.jpg', '經典雙人客房擁有寬敞的空間及良好的採光，提供賓客舒適便利的住宿體驗。客房內提供軟硬適中的兩張單人床、羽絨被、以及各式各樣的枕頭選單任君挑選，另配備有獨立淋浴間和浴缸，以及多種先進的視聽設備，包括平面液晶電視及高速無線網路連接…等等。', '客房設備\r\n浴缸 電視 萬用轉接頭 礦泉水、茶包 牙刷組(牙膏/牙刷/牙線) 梳妝組(化妝棉/棉棒組/梳子/髮圈) 沐浴組(沐浴/洗髮/潤髮/洗面) 擦澡巾 浴缸 電視 萬用轉接頭 礦泉水 茶包 牙刷組 擦澡巾 髮圈 潤髮乳 洗面乳'),
(2, '經典雙人房(雙床)', 2, '21.9㎡', 10, '110 × 200 ㎝', 3400, 'B1.jpg', 'B2.jpg', 'B3.jpg', 'B4.jpg', '經典雙人客房擁有寬敞的空間及良好的採光，提供賓客舒適便利的住宿體驗。客房內提供軟硬適中的兩張單人床、羽絨被、以及各式各樣的枕頭選單任君挑選，另配備有獨立淋浴間和浴缸，以及多種先進的視聽設備，包括平面液晶電視及高速無線網路連接…等等。', '客房設備\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水、茶包\r\n牙刷組(牙膏/牙刷/牙線)\r\n梳妝組(化妝棉/棉棒組/梳子/髮圈)\r\n沐浴組(沐浴/洗髮/潤髮/洗面)\r\n擦澡巾\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水\r\n茶包\r\n牙刷組\r\n擦澡巾\r\n髮圈\r\n潤髮乳\r\n洗面乳'),
(3, '高級雙人房', 2, '45.5㎡', 8, '140 × 200 ㎝', 6800, 'D1.jpg', 'D2.jpg', 'D3.jpg', 'D4.jpg', '高級雙人客房擁有明亮寬敞的空間及日式風情的榻榻米休憩空間，提供賓客舒適便利的住宿體驗，並可一覽大台北地區的迷人夜景。客房內提供軟硬適中的兩張加大單人床、羽絨被、以及各式各樣的枕頭選單任君挑選，另配備有獨立淋浴間和浴缸，以及多種先進的視聽設備，包括平面液晶電視及高速無線網路連接…等等。', '客房設備\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水、茶包\r\n牙刷組(牙膏/牙刷/牙線)\r\n梳妝組(化妝棉/棉棒組/梳子/髮圈)\r\n沐浴組(沐浴/洗髮/潤髮/洗面)\r\n擦澡巾\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水\r\n茶包\r\n牙刷組\r\n擦澡巾\r\n髮圈\r\n潤髮乳\r\n洗面乳'),
(4, '舒適三人房', 3, '26.3㎡', 8, '110 × 200 ㎝', 4800, 'C1.jpg', 'C2.jpg', 'C3.jpg', 'C4.jpg', '舒適三人客房擁有寬敞的空間及良好的採光，，讓您入住時不會感到擁擠並提供賓客舒適便利的住宿體驗。客房內提供軟硬適中的兩張單人床、羽絨被、以及各式各樣的枕頭選單任君挑選，另配備有獨立淋浴間和浴缸，以及多種先進的視聽設備，包括平面液晶電視及高速無線網路連接…等等。', '客房設備\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水、茶包\r\n牙刷組(牙膏/牙刷/牙線)\r\n梳妝組(化妝棉/棉棒組/梳子/髮圈)\r\n沐浴組(沐浴/洗髮/潤髮/洗面)\r\n擦澡巾\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水\r\n茶包\r\n牙刷組\r\n擦澡巾\r\n髮圈\r\n潤髮乳\r\n洗面乳'),
(5, '舒適四人房', 4, '35.4㎡', 8, '160 × 200 ㎝', 6400, 'E1.jpg', 'E2.jpg', 'E3.jpg', 'E4.jpg', '舒適四人客房擁有寬敞的空間及良好的採光，讓您入住時不會感到擁擠並提供賓客舒適便利的住宿體驗。客房內提供軟硬適中的兩張單人床、羽絨被、以及各式各樣的枕頭選單任君挑選，另配備有獨立淋浴間和浴缸，以及多種先進的視聽設備，包括平面液晶電視及高速無線網路連接…等等。', '客房設備\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水、茶包\r\n牙刷組(牙膏/牙刷/牙線)\r\n梳妝組(化妝棉/棉棒組/梳子/髮圈)\r\n沐浴組(沐浴/洗髮/潤髮/洗面)\r\n擦澡巾\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水\r\n茶包\r\n牙刷組\r\n擦澡巾\r\n髮圈\r\n潤髮乳\r\n洗面乳'),
(6, '無障礙客房', 2, '24.0㎡', 1, '110 × 200 ㎝', 3200, 'F1.jpg', 'F2.jpg', 'F3.jpg', 'F4.jpg', '無障礙客房打造對身障朋友一個舒適的環境，即使坐輪椅的賓客也可輕鬆出入。室內為消除高低不平的無障礙設計，而且在浴室內各處都設有扶手。此外，還在房內四個地方設有緊急時可及時與工作人員聯絡的按鈕，即使一個人也能放心入住。', '客房設備\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水、茶包\r\n牙刷組(牙膏/牙刷/牙線)\r\n梳妝組(化妝棉/棉棒組/梳子/髮圈)\r\n沐浴組(沐浴/洗髮/潤髮/洗面)\r\n擦澡巾\r\n浴缸\r\n電視\r\n萬用轉接頭\r\n礦泉水\r\n茶包\r\n牙刷組\r\n擦澡巾\r\n髮圈\r\n潤髮乳\r\n洗面乳');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
