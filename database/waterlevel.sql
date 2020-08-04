-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2020 lúc 04:35 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `waterlevel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `stt` int(11) NOT NULL,
  `ma_tram` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`stt`, `ma_tram`, `name`, `email`, `password`, `level`) VALUES
(1, '0', NULL, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, '74129', NULL, '74129yenbai@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, '74146', NULL, '74146tuyenquang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, '74155', NULL, '74155vuquang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, '74154', NULL, '74154phutho@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, '74156', NULL, '74156viettri@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, '74162', NULL, '74162sontay@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, '74165', NULL, '74165hanoi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, '74166', NULL, '74166thuongcat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(10, '74183', NULL, '74183@namdinh@gmail.com\r\n', 'e10adc3949ba59abbe56e057f20f883e', 0),
(11, '74197', NULL, '74197quyetchien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, '74198', NULL, '74198balat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(25, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muc_nuoc`
--

CREATE TABLE `muc_nuoc` (
  `id` int(11) NOT NULL,
  `ma_tram` int(11) DEFAULT NULL,
  `ngay_do` date DEFAULT NULL,
  `thoi_gian_do` time DEFAULT NULL,
  `muc_nuoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muc_nuoc`
--

INSERT INTO `muc_nuoc` (`id`, `ma_tram`, `ngay_do`, `thoi_gian_do`, `muc_nuoc`) VALUES
(1, 74129, '2020-07-30', '00:00:00', '12'),
(2, 74129, '2020-07-30', '00:00:00', '11'),
(3, 74129, '2020-07-30', '13:00:00', '11'),
(4, 74129, '2020-07-30', '22:00:00', '15'),
(5, 74129, '2020-07-30', '22:00:00', '16'),
(6, 74129, '2020-07-30', '13:00:00', '10'),
(7, 74129, '2020-07-27', '00:00:00', '11'),
(8, 74129, '2020-07-30', '00:00:00', '16'),
(9, 74146, '2020-07-14', '13:00:00', '17'),
(10, 74146, '2020-07-30', '07:00:00', '32'),
(11, 74162, '2020-07-30', '16:00:00', '16'),
(12, 74155, '2020-07-15', '00:00:00', '20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_tram`
--

CREATE TABLE `thong_tin_tram` (
  `stt` int(11) NOT NULL,
  `ma_tram` int(11) DEFAULT NULL,
  `name_tram` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ten_tram` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `lat` float(10,6) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL,
  `cap_bao_dong_1` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `cap_bao_dong_2` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `cap_bao_dong_3` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_tram`
--

INSERT INTO `thong_tin_tram` (`stt`, `ma_tram`, `name_tram`, `ten_tram`, `lat`, `lon`, `cap_bao_dong_1`, `cap_bao_dong_2`, `cap_bao_dong_3`, `color`) VALUES
(1, 74129, 'yen_bai', 'Yên Bái', 21.700001, 104.849991, '30', '31', '32', '#00FF00'),
(2, 74146, 'tuyen_quang', 'Tuyên Quang', 21.816660, 105.216660, '22', '24', '26', '#ff1414'),
(3, 74155, 'vu_quang', 'Vụ Quang', 21.566669, 105.250000, '18.3', '19.5', '20.5', '#ffe23f'),
(4, 74154, 'phu_tho', 'Phú Thọ', 21.383329, 105.216690, '17.5', '18.3', '19', '#00FF00'),
(5, 74156, 'viet_tri', 'Việt Trì', 21.283331, 105.416702, '17.3', '14.9', '15.9', '#00FF00'),
(6, 74162, 'son_tay', 'Sơn Tây', 21.149990, 105.500000, '12.4', '13.4', '14.4', '#ff1414'),
(7, 74165, 'ha_noi', 'Hà Nội', 21.016661, 105.849991, '9.5', '10.5', '11.5', '#00FF00'),
(8, 74166, 'thuong_cat', 'Thượng Cát', 20.649990, 106.049988, '9', '10', '11', '#00FF00'),
(9, 74183, 'nam_dinh', 'Nam Định', 20.416670, 106.166702, '3.2', '3.8', '4.3', '#00FF00'),
(10, 74197, 'quyet_chien', 'Quyết Chiến', 20.500000, 106.250000, '2.7', '3.3', '3.9', '#00FF00'),
(11, 74198, 'ba_lat', 'Ba Lạt', 20.316660, 106.516670, '2', '2.3', '2.6', '#00FF00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`stt`) USING BTREE;

--
-- Chỉ mục cho bảng `muc_nuoc`
--
ALTER TABLE `muc_nuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_tin_tram`
--
ALTER TABLE `thong_tin_tram`
  ADD PRIMARY KEY (`stt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `muc_nuoc`
--
ALTER TABLE `muc_nuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `thong_tin_tram`
--
ALTER TABLE `thong_tin_tram`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
