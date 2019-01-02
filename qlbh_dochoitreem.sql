/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : qlbh_dochoitreem

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 29/11/2018 15:38:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Xe', 'Đồ chơi xe trớn và xe điều kiển');
INSERT INTO `category` VALUES (2, 'Búp bê', 'Đồ chơi búp bê cho bé');
INSERT INTO `category` VALUES (3, 'Robot', 'Đồ chơi Robot các loại');
INSERT INTO `category` VALUES (4, 'Gấu bông', 'Thú nhồi bông siêu dễ thương');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `orderTime` date NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'chờ duyệt',
  `deliveryAddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `deliveryDays` int(11) NULL DEFAULT 2,
  `total` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (3, 'abc', '2018-11-29', 'chờ duyệt', 'Nguyễn Văn Cừ, Quận 5, TP HCM', 2, 1000);
INSERT INTO `order` VALUES (4, 'abc', '2018-11-29', 'đang giao', 'Nguyễn Văn Cừ, Quận 5, TP HCM', 2, 500);
INSERT INTO `order` VALUES (5, 'abc', '2018-11-29', 'chờ duyệt', 'Nguyễn Văn Cừ, Quận 5, TP HCM', 2, 1500);

-- ----------------------------
-- Table structure for orderdetail
-- ----------------------------
DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL,
  `orderID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orderdetail
-- ----------------------------
INSERT INTO `orderdetail` VALUES (1, 'X00001', 1, 3);
INSERT INTO `orderdetail` VALUES (2, 'X00002', 2, 3);
INSERT INTO `orderdetail` VALUES (3, 'X00002', 1, 4);
INSERT INTO `orderdetail` VALUES (4, 'BB0001', 2, 5);
INSERT INTO `orderdetail` VALUES (5, 'RB0001', 5, 5);

-- ----------------------------
-- Table structure for producer
-- ----------------------------
DROP TABLE IF EXISTS `producer`;
CREATE TABLE `producer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producer
-- ----------------------------
INSERT INTO `producer` VALUES (1, 'Hải Vân', '50, Lê Khôi, P Phú Thạnh, Q Tân Phú, TP HCM', '0919323110');
INSERT INTO `producer` VALUES (2, 'Long Thủy', 'Tân Trạch, Cần Đước, Long An', '0937309930');
INSERT INTO `producer` VALUES (3, 'TM', '8H An Dương Vương, P.16, Quận 8, Hồ Chí Minh', '02839805394');
INSERT INTO `producer` VALUES (4, 'Super wings', '349, Tôn Đản, P 15, Q 4, TP HCM', '0907902742');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `category` int(20) NULL DEFAULT NULL,
  `producer` int(20) NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `add_date` date NULL DEFAULT NULL,
  `buyCount` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NULL DEFAULT NULL,
  `nation` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('X00001', 'Xe chòi chân cần cẩu', 1, 1, 'Xe chòi chân cần cẩu X00001 phù hợp với độ tuổi từ 2-7 tuổi. \r\nChất liệu nhựa ABS, \r\nPP cao cấp bảo vệ sức khỏe cho trẻ, Đây là món quà lý tưởng dành cho các bé trai, những cậu bé yêu thích xe cộ và thích sáng tạo với nhiều chi tiết có thể tháo lắp dễ dàng', 'dbImage/xe-choi-chan-can-cau-cc1388.jpg', 0, '2018-11-12', 1, 450000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('X00002', 'Xe tải đồ chơi Tipper', 1, 1, 'Xe tải đồ chơi Tipper 38142 là loại xe mô hình cho bé được mô phỏng với hình dáng của chiếc xe tải chuyên chở vật liệu,... Đây là món quà lý tưởng dành cho các bé trai, những cậu bé yêu thích xe cộ và thích sáng tạo với nhiều chi tiết có thể tháo lắp dễ dàng', 'dbImage/xe-tai-do-choi-tipper-3814sdf2-1.jpg', 0, '2018-11-12', 8, 159000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('X00003', 'Xe điều khiển Cyklone Twist', 1, 2, 'Đồ chơi xe điều khiển từ xa là dòng sản phẩm ưu tú, \nđược làm từ chất liệu an toàn, \ncác góc cạnh được bo tròn không góc cạnh\n nên phụ huynh có thể an tâm cho bé vui chơi.', 'dbImage/Xe-dieu-khien-Cyklone-Twist-Jet-Version-500x480.gif', 0, '2018-11-12', 9, 399000, 'Việt Nam', 35);
INSERT INTO `product` VALUES ('X00004', 'Xe điều khiển chó cứu hộ', 1, 2, 'Đồ chơi xe điều khiển từ xa là dòng sản phẩm ưu tú, được làm từ chất liệu an toàn, các góc cạnh được bo tròn không góc cạnh nên phụ huynh có thể an tâm cho bé vui chơi.', 'dbImage/Xe-dieu-khien-nhao-lon-cho-cuu-ho-1.jpg', 0, '2018-11-19', 0, 197000, 'Việt Nam', 23);
INSERT INTO `product` VALUES ('X00005', 'Xe điều khiển F1', 1, 2, 'Đồ chơi xe điều khiển từ xa là dòng sản phẩm ưu tú, được làm từ chất liệu an toàn, các góc cạnh được bo tròn không góc cạnh nên phụ huynh có thể an tâm cho bé vui chơi.', 'dbImage/Xa-dua-dieu-khien-F1-nguoi-khong-lo-xanh-sac-3313AB-1.jpg', 0, '2018-11-19', 0, 381000, 'Việt Nam', 24);
INSERT INTO `product` VALUES ('X00006', 'Xe điều khiển LT68', 1, 2, 'Xe điều khiển LT68-2015-1-VN là sản phẩm xe điều khiển từ xa, giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi.', 'dbImage/63151b3acfe0dbc232047b7b9fcdde6a.jpg', 0, '2018-11-19', 0, 199000, 'Việt Nam', 68);
INSERT INTO `product` VALUES ('X00007', 'Xe điều khiển Lamborgini', 1, 2, 'Xe điều khiển từ xa Lamborgini với thiết kế tinh xảo độc đáo đến từng chi tiết đảm bảo sẽ khiến bé thích mê. Đặc biệt với tính năng thông minh cửa mở tự động hiện đại, sẽ là điểm nhấn đặc biệt cho chiếc xe điều khiển từ xa của bé', 'dbImage/44d4981a9c6f4620e0a4cbc4410c21e6.jpg', 0, '2018-11-12', 0, 499000, 'Việt Nam', 100);
INSERT INTO `product` VALUES ('X00008', 'Xe bồn điều khiển', 1, 2, 'Hộp Xe Bồn Lớn điều khiển sạc LTH6668M là sản phẩm xe điều khiển từ xa, giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/435a9874a0abd4a736212a4c8fe78c1e.jpg', 3, '2018-11-12', 0, 289000, 'Việt Nam', 35);
INSERT INTO `product` VALUES ('X00009', 'Xe tải pin sạc', 1, 1, 'Xe điều khiển phá bê tông thế hệ mới an toàn cho trẻ em, giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/6b0d2c1eaf8469e05789c71f3499a32d.jpg', 2, '2018-11-12', 0, 289000, 'Việt Nam', 19);
INSERT INTO `product` VALUES ('X00010', 'Xe điều khiển Sạc HV6', 1, 1, 'Xe điều khiển sạc giúp tiết kiệm pin và an toàn, giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/3ff493d500585f2e7b665340ac8a54a3.jpg', 1, '2018-11-12', 0, 129000, 'Việt Nam', 39);
INSERT INTO `product` VALUES ('BB0001', 'Hộp búp bê Lh032', 2, 3, 'Hộp Búp Bê LH032 (TM) là món đồ chơi yêu thích của các bé gái, với búp bê cô dâu hồng xinh xắn này chắc chắn các bé sẽ thích mê. Ngoài ra sản phẩm còn có thêm các phụ kiện váy áo, phụ kiện tóc nhiều màu sắc và tinh xảo cho bé khám phá.', 'dbImage/ca0b628d00db6c68f8ff71423ec8897f.jpg', 0, '2018-11-12', 2, 169000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0002', 'Hộp búp bê Tấm đi dự tiệc', 2, 3, 'Hộp búp bê Tấm đi dự tiệc VN.024B (SH) gồm 1 búp bê xinh đẹp và các bộ váy áo, đầm thời trang nhiều màu sắc chắc chắn sẽ làm các bé thích mê. Ngoài ra sản phẩm còn có phụ kiện đi kèm như túi xách để bé thay đổi và phối đồ cho búp bê theo ý thích.', 'dbImage/442a36e3de6a5e27f4cb8a0fd8ad9482.png', 0, '2018-11-12', 7, 239000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0003', 'Thú nhồi bông búp bê nhí', 2, 3, 'Tặng con một Thú nhồi bông Búp bê nhí để con bầu bạn hằng ngày cả khi chơi lẫn lúc ngủ sẽ là lựa chọn thông thái của bố mẹ. Vì khoa học đã chứng minh, món quà này có khả năng kích thích khả năng sáng tạo và trí tưởng tượng cho bé', 'dbImage/thu-nhoi-bong-bup-be-nhi-tm.jpg', 0, '2018-11-19', 0, 179000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0004', 'Búp bê Lucy thiên thần', 2, 3, 'Búp bê Lucy thiên thần 8135 là sản phẩm hàng chất lượng tốt, với búp bê thiên thần xinh đẹp và tinh xảo này, chắc chắn sẽ làm các bé thích mê và hóa thân vào nhân vật. Búp bê như một người bạn thân thiết không thể thiếu, gắn liền với tuổi thơ của các bé gái, giúp bé phát triển khả năng sáng tạo. Sản phẩm đạt tiêu chuẩn Châu Âu, thích hợp cho bé từ 3 tuổi', 'dbImage/bup-be-lucy-thien-than-8135.jpg', 0, '2018-11-19', 0, 99000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0005', 'Búp bê nàng tiên cá Lucy', 2, 1, 'Búp bê nàng tiên cá Lucy 6021 là sản phẩm hàng chất lượng tốt, với búp bê xinh đẹp, hiện thân của nàng tiên cá trong truyền cổ tích, chắc chắn sẽ làm các bé thích mê và hóa thân vào nhân vật. Ngoài ra sản phẩm còn có thêm nhiều phụ kiện như quần áo, đầm váy để bé thỏa trí sáng tạo, thay đổi và phối hợp theo ý thích. Sản phẩm thích hợp cho bé từ 3 tuổ', 'dbImage/bup-be-nang-tien-ca-lucy-6021.jpg', 0, '2018-11-19', 0, 169000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0006', 'Búp bê bướm Lucy ', 2, 1, 'Búp bê bướm Lucy 8120 là sản phẩm hàng chất lượng tốt, với búp bê xinh đẹp và tinh xảo này, chắc chắn sẽ làm các bé thích mê và hóa thân vào nhân vật. Búp bê như một người bạn thân thiết không thể thiếu, gắn liền với tuổi thơ của các bé gái, giúp bé phát triển khả năng sáng tạo. Sản phẩm đạt tiêu chuẩn Châu Âu, thích hợp cho bé từ 3 tuổi.', 'dbImage/bup-be-buom-lucy-8120.jpg', 0, '2018-11-12', 0, 149000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0007', 'Vỉ búp bê thiên thần', 2, 1, 'Búp bê là một nàng công chúa có mái tóc thật dài và óng ả, mang đến sự thích thú cho bé khi được tự do thay những bộ trang phục thật phong cách cho nàng, giúp nàng thật lấp lánh và nổi bật trong đêm tiệc', 'dbImage/vi-bup-be-thien-than-hong-phat-ly-2310.jpg', 0, '2018-11-12', 0, 79000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0008', 'Hộp búp bê VN.025B', 2, 3, 'Hộp búp bê VN.025B - Dạo phố cùng Tấm (SH) gồm 1 búp bê xinh đẹp và các bộ váy áo, đầm thời trang nhiều màu sắc chắc chắn sẽ làm các bé thích mê. Ngoài ra sản phẩm còn có phụ kiện đi kèm như túi xách để bé thay đổi và phối đồ cho búp bê theo ý thích.', 'dbImage/hop-bup-be-vn-025b-dao-pho-cung-tam-sh.jpg', 6, '2018-11-12', 0, 199000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0009', 'Hộp Búp Bê Thời Trang', 2, 3, 'Hộp Búp Bê Thời Trang LH029 (TM) là sản phẩm hàng chất lượng tốt, gồm bộ búp bê cô dâu và chú rể xinh đẹp sẽ làm các bé thích mê và hóa thân vào nhân vật. Ngoài ra sản phẩm còn có thêm nhiều phụ kiện như quần áo, đầm váy để bé thỏa trí sáng tạo, thay đổi và phối hợp theo ý thích', 'dbImage/hop-bup-be-thoi-trang-lh029-tm.jpg', 5, '2018-11-12', 0, 336000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('BB0010', 'Hộp phụ kiện BB thời trang', 2, 3, 'Hộp phụ kiện búp bê thời trang VN.020B (SH) gồm 2 bộ váy áo đầm thời trang, cùng những phụ kiện màu sắc chắc chắn sẽ làm các bé thích mê. Bé yêu sẽ có cơ hội thỏa sức thiết kế cho bạn búp bê theo sự sáng tạo của mình', 'dbImage/hop-phu-kien-bup-be-thoi-trang-vn-020b-sh.jpg', 4, '2018-11-12', 0, 99000, 'Việt Nam', 40);
INSERT INTO `product` VALUES ('RB0001', 'Robot biến hình Told', 3, 4, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-may-bay-co-lon-Told-vui-ve-YW720222.jpg', 0, '2018-11-12', 3, 349000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0002', 'Robot biến hình xe cứu hộ', 3, 4, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-ket-hop-xe-cuu-ho-nho-Dizzy-loc-xoay-YW720314.jpg', 0, '2018-11-12', 6, 399000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0003', 'Robot biến hình thông thái ', 3, 4, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-may-bay-co-lon-Bac-thong-thai-YW710260-500x480.jpg', 0, '2018-11-12', 10, 349000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0004', 'Robot biến hình Jerome', 3, 4, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-may-bay-co-lon-Jerome-cuong-phong-YW710230.jpg', 0, '2018-11-19', 0, 349000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0005', 'Robot biến hình Paul ', 3, 4, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-may-bay-co-lon-Canh-sat-paul-YW710250-500x480.jpg', 0, '2018-11-19', 0, 349000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0006', 'Robot biến hình Flip', 3, 1, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Robot-bien-hinh-may-bay-co-lon-Flip-nhanh-nhen-YW720221-500x480.jpg', 0, '2018-11-12', 0, 349000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0007', 'Tobot biến hình R', 3, 2, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Mini-tobot-R-205401-1-500x480.jpg', 0, '2018-11-12', 0, 318000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0008', 'Tobot biến hình C', 3, 2, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Tobot-mini-C-205297-1-500x480.jpg', 9, '2018-11-12', 0, 318000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0009', 'Tobot biến hình Z', 3, 2, 'Robot cực kì cute đã đến với các em nhỏ, hãy nhanh chân lên nào, sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/tobot-mini-Z-205403-1-500x480.jpg', 8, '2018-11-12', 0, 318000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('RB0010', 'Tobot biến hình W', 3, 1, 'biến hình W chính hãng với màu tím-trắng độc đáo chắc chắn sẽ là nhân vật mới đầy sự thu hút trong bộ sưu tập Tobot của bé yêu nhà bạn,  sản phẩm có 2 dạng hình thái lắp ráp giúp trẻ tương tác trên sản phẩm. Bên cạnh việc vui chơi giải trí cho bé, sản phẩm còn giúp bé phát triển khả năng tư duy sáng tạo và học hỏi', 'dbImage/Mini-tobot-W-205296-1-500x480.jpg', 7, '2018-11-12', 0, 318000, 'Việt Nam', 50);
INSERT INTO `product` VALUES ('GB0001', 'Gấu Teddy váy màu', 4, 1, 'Gấu teddy váy nhiều màu trong tư thế đứng, được thiết kế vô cùng điệu đà với bộ lông kem siêu mềm mượt, rất phù hợp với các bé gái. Đặc biệt em gấu bông này được diện một chiếc váy xoè với đủ các màu sắc rực rỡ: hồng, tím,... cùng một chiếc nơ xinh xắn cùng màu trên đỉnh đầu', 'dbImage/gau-teddy-vay-nhieu-mau2_1536898789.jpg', 0, '2018-11-12', 4, 295000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0002', 'Gấu Teddy lông xù', 4, 1, 'Xét về kiểu dáng thì gấu Teddy nơ lông xù tương đối giống với dòng gấu bông nhỏ Head & Tales nổi tiếng mà ai cũng biết tới bởi thiết kế nhỏ gọn cho bé và chất vải lông xù siêu mượt, không rụng và sờ thì mát lạnh. Điểm khác biệt là gấu Teddy nơ xù thay vì được diện một chiếc áo len cá tính thì bạn ý lại có một chiếc nơ điệu đà ở cổ, một chiếc khuy tròn bên ngực phải', 'dbImage/gau-teddy-no-long-xu-11_1473928669.jpg', 0, '2018-11-12', 5, 165000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0003', 'Gấu váy công chúa', 4, 1, 'Lông ngắm mềm mượt, váy điệu đà, phù hợp cho bé gái. Chiếc váy có thể tách rời tiện cho việc làm sạch và bảo quản chú gấu không bị dơ, bám bẩn khi hoạt động vui chơi, an toàn hơn cho các bé', 'dbImage/gau-vay-cai-no-4_1512310051.jpg', 0, '2018-11-19', 0, 275000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0004', 'Gấu nơ tím', 4, 1, 'Hàng Việt Nam giá rẻ, lông ngắn mềm mượt trắng muốt, dáng gấu ngồi nên rất to ngang, ôm cực thích. Chú gấu có chiếc nơ xanh nhỏ xinh trên cỗ, chiếc nơ bang bông thiêu chat vào chú gấu để sản phẩm bền và đẹp hơn', 'dbImage/gau-no-tim-ngoi5_1536806205.jpg', 0, '2018-11-19', 0, 220000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0005', 'Gấu bông nơ', 4, 1, 'Dáng gấu ngồi xinh xắn. Lông ngắn siêu mềm mượt, thắt nơ điệu đà, thiết kế nhỏ xinh. Phù hợp cho bé hoặc những cô nàng thích gấu nhỏ. Chú gấu ôm trái tim to dễ thương thích hợp làm quà bày tỏ tình yêu của bạn với con mình', 'dbImage/Gau-no-ngoi-bong-4_1511596296.jpg', 0, '2018-11-12', 0, 95000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0006', 'Gấu Trắng', 4, 3, 'Gấu Trắng mềm mượt không bám buội an toàn cho trẻ em. Chú gấu với thiết kế đơn giản thích hợp cho các bé trai yêu gấu bông những vẫn không quá điệu đà, màu sắc', 'dbImage/IMG_9702_1532165974.png', 0, '2018-11-12', 0, 165000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0007', 'Gấu Teddy ngồi', 4, 3, 'Kiểu lông vảy dày đẹp và lạ mắt, ngực đính hạt, cổ quảng khăn cá tính (có thể tháo rời khăn), bên trong là 100% bông xoắn ba chiều cao cấp với độ đàn hồi cao, không xẹp và an toàn tuyệt đối. Gấu ngồi nhồi bông sẽ là món quà tuyệt vời cho bé trong các dịp sinh nhật, lễ tết, ...', 'dbImage/gau-bong-ngoi-khan-4_1489460846.jpg', 0, '2018-11-12', 0, 195000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0008', 'Gấu ngồi', 4, 3, ' Với khuôn mặt tròn trĩnh dễ thương, đôi mắt ngây thơ trong sáng với bộ lông vàng được làm từ lớp vải nhung mịn cao cấp, bên trong là 100% bông xoắn ba chiều cao cấp với độ đàn hồi cao, không xẹp và an toàn tuyệt đối. Gấu ngồi nhồi bông sẽ là món quà tuyệt vời cho bé trong các dịp sinh nhật, lễ tết, ...', 'dbImage/gau-ngoi-nhoi-bong-3_1447500408.jpg', 0, '2018-11-12', 0, 165000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0009', 'Gấu trúc nằm', 4, 3, 'Gấu Panda bán chạy nhất bởi dáng đẹp, chất mềm mịn phù hợp cho cả người lớn và trẻ em. Thiết kế dài tròn có thể ôm, gối đầu, gác chân đều rất thích, sản phẩm thích hợp cho cả những cô nàng điệu đà, yêu thích gấu bông', 'dbImage/gau-truc-nam-nhoi-bong-vip-3_1476331124.jpg', 0, '2018-11-12', 0, 120000, 'Việt Nam', 60);
INSERT INTO `product` VALUES ('GB0010', 'Gấu Pooh đỏ', 4, 3, 'Chất nhung mịn, sờ cực thích, phù hợp cho cả người lớn và trẻ con, bên trong là 100% bông xoắn ba chiều cao cấp với độ đàn hồi cao, không xẹp và an toàn tuyệt đối. Gấu ngồi nhồi bông sẽ là món quà tuyệt vời cho bé trong các dịp sinh nhật, lễ tết, ...', 'dbImage/gau-pooh-nhoi-bong-10_1444989290.jpg', 10, '2018-11-12', 0, 110000, 'Việt Nam', 60);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `role` int(11) NULL DEFAULT 2,
  `phone` int(11) NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('abc', '202cb962ac59075b964b07152d234b70', 2, 123, 'Nguyễn Văn Cừ, Quận 5, TP HCM');
INSERT INTO `user` VALUES ('admin', '202cb962ac59075b964b07152d234b70', 1, NULL, '');

SET FOREIGN_KEY_CHECKS = 1;
